<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Notauthorized extends MX_Controller 
{

 function __construct()
 {
   parent::__construct();

   #Se incluye el control de session del usuario
   controlsessiones();
   
 }

 function index()
 {
    #Se incluye el helper para validacion de modulos y submodulos
    validamodulosysubmodulos(2,10);

    $data['titlePage']         ='Acceso No Autorizado . .!';
    $data['activeTab']         =0;
    $data['descTitle']         ="Acceso No Autorizado";
    $data['descTitleSub']      ="Sí requiere tener acceso a este módulo pongase en contacto con el administrador del sistema.";
    $data['iconFa']            ="user";
    $data['contenidoPrincial'] ='notauthorized/notauthorized';
    $data['navPrincipal']      ='notauthorized/navNotAuthorized';
    $this->load->view('main_template',$data);

 }

}
?>