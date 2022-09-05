<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Recursoshumanos extends MX_Controller 
{
    public $data = array();

    function __construct()
    {
      parent::__construct();

      #Se incluye el control de session del usuario
      controlsessiones();

    $this->load->model('recursosh_model', '', TRUE); // Cargamos el modelo para inicio

      $this->data['navPrincipal'] = "recursoshumanos/view_nav_rh";
      $this->data['idModule']     =4;
      $this->data['activeTab']    =$this->data['idModule'];

    }

    function index()
    {
      #Se incluye el helper para validacion de modulos y submodulos
      $this->data['idSubModule']=11;
      validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

      $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
      $this->data['contenidoPrincial'] ='recursoshumanos/recursoshumanos';
    
      $this->data['desc_mod_submod'] = $this->recursosh_model->getDesd_mod_submod($this->data['idSubModule']);

      $this->load->view('main_template',$this->data);

    }

 

}
?>