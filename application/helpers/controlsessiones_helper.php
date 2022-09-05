<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
/**
*--------------------------------------------------------------------------------------#
*--------------------------------- SESIONES DE USUARIO --------------------------------#
*--------------------------------------------------------------------------------------#                                                                                                                                          
*Helper que gestiona el tiempo de vida de la sesión de usuario.
*@Version: 1.0                                                                
*@Date:    29-06-2016                                                         
*@Author:  Ing. Isidoro Cornelio Landa <hazuer_icl@hotmail.com>                                                  
*---------------------------------------------------------------------------------------#
*/
    #Controlar las sessiones de usuario
    if(!function_exists('controlsessiones'))
    {
        function controlsessiones()
        {
        	date_default_timezone_set('America/Mexico_City');
        	//Configuracion Regional y definicion de la fecha
			setlocale (LC_TIME,"spanish");
	 		#La función get_instance de codeigniter, la cuál devuelve el super objeto de Codeigniter.
	 		#Una vez hecho esto, podemos llamar a las funciones de CI igual que lo hacemos en los 
	 		#controladores o modelos, pero reemplazando el ‘$this’ por ‘$CI’, en este helper se hace
	 		#uso de sessiones de usuario.
			$CI = & get_instance();
			       
			//Antes de hacer los cálculos, compruebo que el usuario está logueado
			if ($CI->session->userdata('logueado')!="SI") 
			{
				#echo "<br><b><span style='color:red;'>No esta logueado</span></b>";
				redirect(base_url(), 'refresh');
			} 
			else 
			{
			 //Sino, calculamos el tiempo transcurrido
			 $fechaGuardada = $CI->session->userdata('ultimoAcceso');
			 $ahora = date("Y-n-j H:i:s");
			 $tiempo_transcurrido = (strtotime($ahora)-strtotime($fechaGuardada));
			 //Comparamos el tiempo transcurrido
			 if($tiempo_transcurrido >= 2400)
				{
				  //Sí pasaron 40 minutos o más (40min * 60seg = 2400)    
				  //echo "<br><b><span style='color:red;'>Tiempo fuera</span></b>";
				   $CI->session->set_userdata('logueado', "NO");
				   $CI->session->sess_destroy();
				   redirect(base_url(), 'refresh');
				}else
				{
					//echo "<br><b><span style='color:green;'>Actulizando tiempo de session</span></b>";
					$CI->session->set_userdata('ultimoAcceso', $ahora);
				}
			} 
			
			#Mostrar los datos de la sesión de usuario de manera global, se debe imprimir controlSessiones();
			/*foreach($CI->session->userdata as $cveAuxSys =>$valAuxSys)
	        {
	          echo "<br /><b>$cveAuxSys:</b>$valAuxSys";
	        } 
	        echo "<br><b><span style='color:blue;'>Tiempo transcurrido:".$tiempo_transcurrido."</span></b>";*/
        }
    }
?>