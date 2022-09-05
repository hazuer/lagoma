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

    if(!function_exists('breadcrumb'))
    {
        function breadcrumb($dev_id_system_modulos, $dev_id_system_submodulo)
        {
	 		
	 		$CI =& get_instance();  
			$sql="SELECT 
			system_modulos.modulo,system_modulos.urlControlador,system_modulos.icono,system_submodulo.submodulo
			FROM 
			system_modulos,system_submodulo
			WHERE 
			system_modulos.id_system_modulos=system_submodulo.id_modulo AND
			system_modulos.id_system_modulos=$dev_id_system_modulos AND 
			system_submodulo.id_system_submodulo=$dev_id_system_submodulo";
			$respuesta = $CI->db->query($sql);
			foreach ($respuesta->result() AS $row)
			{
				$devModulo= $row->modulo;
				$devIcono= $row->icono;
				$devSubmodulo= $row->submodulo;
				$devUrlControlador=$row->urlControlador;
			}

			return "<ul class='breadcrumb no-border no-radius b-b b-light pull-in'> <li><a href='".base_url()."inicio'>SID</a></li><li><a href='".base_url()."$devUrlControlador'><i class='$devIcono'></i> $devModulo</a></li> <li class='active'>$devSubmodulo</li></ul>";
        }
    }
?>