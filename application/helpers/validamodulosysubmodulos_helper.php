<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
*--------------------------------------------------------------------------------------#
*----------------- VALIDAR QUE EXISTA EL MODULO Y SUBMODULO DECLARADO -----------------#
*--------------------------------------------------------------------------------------#                                                                                                                                          
*Helper para validar que el modulo o submodolo este registrado en la base de datos.
*@Version: 1.0                                                                
*@Date:    29-06-2016                                                         
*@Author:  Ing. Isidoro Cornelio Landa <hazuer_icl@hotmail.com>                                                  
*---------------------------------------------------------------------------------------#
*/

    if(!function_exists('validamodulosysubmodulos'))
    {
        function validamodulosysubmodulos($dev_id_system_modulos, $dev_id_system_submodulo)
        {
	 		#La función get_instance de codeigniter, la cuál devuelve el super objeto de Codeigniter.
	 		#Una vez hecho esto, podemos llamar a las funciones de CI igual que lo hacemos en los 
	 		#controladores o modelos, pero reemplazando el ‘$this’ por ‘$CI’, en este helper se hace
	 		#uso de conexión a la base de datos y las sessiones de usuario.
	 		$CI =& get_instance();  
	 		$id_system_users=$CI->session->userdata('id_system_users');
	 		
	 		#---------------------------------------------------------------------------------------#
			#----------------------------------------- MODULOS -------------------------------------#
			#---------------------------------------------------------------------------------------#
			if(empty($dev_id_system_modulos) OR $dev_id_system_modulos==0)
			{
				$msj_system_modulos="La asignación del modulo dev_id_system_modulos no esta declarado";
				echo "<span style='color:red;'><h2>$msj_system_modulos</h2></span>";
			}else
				{
					#Validar que el id_system_modulos exista en la tabla de system_modulos
					$sqlMod = "SELECT id_system_modulos,modulo FROM system_modulos WHERE id_system_modulos=$dev_id_system_modulos";
					$query = $CI->db->query($sqlMod, array($dev_id_system_modulos));
					
					if($query->num_rows()==0)
					{
						echo "<span style='color:red;'>No se ha creado el modulo dev_id_system_modulos: $dev_id_system_modulos</span>";
					}else
						{
							
							#$row = $query->row();
							#echo "<span style='color:blue;'><h2>Modulo:". $row->modulo."</h2></span>";

							#---------------------------------------------------------------------------------------#
							#----------------------------- PERMISOS MODULO - USUARIOS ------------------------------#
							#---------------------------------------------------------------------------------------#
							#Consultar si el usuario tiene privilegios de:
							#1-Permitido
							#2-Bloqueado
							$sql = "SELECT system_modulos.modulo, system_modulos_privilegios.status
							FROM system_modulos_privilegios
							INNER JOIN system_modulos ON system_modulos_privilegios.id_modulo = system_modulos.id_system_modulos
							INNER JOIN system_users ON system_modulos_privilegios.id_user = system_users.id_system_users
							WHERE
							system_modulos_privilegios.id_user=$id_system_users AND
							system_modulos_privilegios.id_modulo=$dev_id_system_modulos AND
							system_users.status=1 AND
							system_modulos_privilegios.status=1";
					        $respuesta = $CI->db->query($sql);
					        if ($respuesta->num_rows() == 0) 
					        {
					            #echo"<br /><span style='color:red;'><b>Atención:</b> No tiene privilegios de acceso para consultar este modulo [dev_id_system_modulos:$dev_id_system_modulos]</span>";
								 redirect('notauthorized/notauthorized/', 'refresh'); //Pagina notauthorized.php
					        }
					        #---------------------------------------------------------------------------------------#

						}
				}
			#---------------------------------------------------------------------------------------#
			


			#---------------------------------------------------------------------------------------#
			#-------------------------------------- MODULOS SUB ------------------------------------#
			#---------------------------------------------------------------------------------------#

			if(empty($dev_id_system_submodulo) OR $dev_id_system_submodulo==0 OR $dev_id_system_submodulo=="")
			{
				$msj_system_modulos_sub="<br />La asignación dev_id_system_submodulo no esta declarada";
				#echo "<span style='color:red;''><h4>$msj_system_modulos_sub</h4></span>";
			}else
				{
					# Validar que el id_system_submodulo exista
					$sql = "SELECT id_system_submodulo,submodulo FROM system_submodulo WHERE id_system_submodulo=?";
					$query = $CI->db->query($sql, array($dev_id_system_submodulo));

					if($query->num_rows()==0)
					{
						#echo "<span style='color:red;'><br />No se ha creado el submodulo dev_id_system_submodulo: $dev_id_system_submodulo</span>";
					}else
						{
							/*
							$row = $query->row();
							echo "<span style='color:blue;'><h2>Submodulo:". $row->submodulo."</h2></span>";
							*/

							#---------------------------------------------------------------------------------------#
							#--------------------------- PERMISOS SUBMODULO - USUARIOS -----------------------------#
							#---------------------------------------------------------------------------------------#
							#Consultar si el usuario tiene privilegios de:
							#1:Lectura y escritura -Permitido
							#2:No autorizado -Bloqueado
							#3:Solo lectura -Solo consulta
							$sql="SELECT system_submodulo.submodulo,system_submodulo_privilegios.status
							FROM 
							system_submodulo
							INNER JOIN system_submodulo_privilegios ON system_submodulo.id_system_submodulo = system_submodulo_privilegios.id_submodulo
							INNER JOIN system_users ON system_submodulo_privilegios.id_user = system_users.id_system_users
							WHERE
							system_submodulo_privilegios.id_user=$id_system_users AND
							system_submodulo_privilegios.id_submodulo =$dev_id_system_submodulo AND
							system_users.status =1 AND
							system_submodulo_privilegios.status IN (1,3) AND
							system_submodulo.id_modulo=$dev_id_system_modulos";
							$respuesta = $CI->db->query($sql);
					        if ($respuesta->num_rows() == 0) 
					        {
								 //echo"<br /><span style='color:red;'><b>Atencion:</b> No tiene privilegios de acceso para consultar este sub-modulo [dev_id_system_submodulo:$dev_id_system_submodulo]</span>";
								 redirect('notauthorized/notauthorized/', 'refresh'); //Pagina notauthorized.php
								 //exit();
							} else
								{
									foreach ($respuesta->result() AS $row)
									{
           							$nombreSubmoduloPriv= $row->submodulo;
           							$psmu= $row->status;

           							#Obtenemos el valor del estatus del privilegio para poder activar el modo:
           							#1:Lectura y escritura -Permitido 
           							#3:Solo lectura -Solo consulta 
           							#De los input,textarea,select y botones
           							#Esta session "psmu" Privilegios Sumodulos Usuario se utiliza en helper formprivilegios
           							$CI->session->set_userdata('psmu', $psmu);           			
        							}
								}
							#---------------------------------------------------------------------------------------#
						}
				}
			#---------------------------------------------------------------------------------------#
        }
    }
?>