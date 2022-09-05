<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
*--------------------------------------------------------------------------------------#
*----------------- VALIDAR QUE EXISTA EL MODULO Y SUBMODULO DECLARADO -----------------#
*--------------------------------------------------------------------------------------#                                                                                                                                          
*Helper para visualizar el menu de opciones.
*@Version: 1.0                                                                
*@Date:    30-11-2016                                                         
*@Author:  Ing. Isidoro Cornelio Landa <hazuer_icl@hotmail.com>                                                  
*---------------------------------------------------------------------------------------#
*/

    if(!function_exists('navmenuitem'))
    {
        function navmenuitem($dev_id_system_submodulo, $icono, $url)
        {
 		#La función get_instance de codeigniter, la cuál devuelve el super objeto de Codeigniter.
 		#Una vez hecho esto, podemos llamar a las funciones de CI igual que lo hacemos en los 
 		#controladores o modelos, pero reemplazando el ‘$this’ por ‘$CI’, en este helper se hace
 		#uso de conexión a la base de datos y las sessiones de usuario.
 		$CI =& get_instance();  
 		$id_system_users=$CI->session->userdata('id_system_users');

		$sql="SELECT system_submodulo.submodulo,system_submodulo_privilegios.status
		FROM 
		system_submodulo
		INNER JOIN system_submodulo_privilegios ON system_submodulo.id_system_submodulo = system_submodulo_privilegios.id_submodulo
		INNER JOIN system_users ON system_submodulo_privilegios.id_user = system_users.id_system_users
		WHERE
		system_submodulo_privilegios.id_user=$id_system_users AND
		system_submodulo_privilegios.id_submodulo =$dev_id_system_submodulo AND
		system_users.status =1 AND
		system_submodulo_privilegios.status IN (1,3) 
		";
		$respuesta = $CI->db->query($sql);
        if ($respuesta->num_rows() == 0) 
        {
			 echo "";
		} else
			{
				foreach ($respuesta->result() AS $row)
				{
					$descModule= $row->submodulo;
					echo "<li> <a href='".base_url()."$url'> <i class='$icono'></i> $descModule</a></li>";
				}
			}
        }
    }
?>