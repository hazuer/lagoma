<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Capitalhumano extends MX_Controller 
{
    public $data = array();

    function __construct()
    {
      parent::__construct();

      #Se incluye el control de session del usuario
      controlsessiones();
      $this->data['navPrincipal'] = "capitalhumano/navCapitalhumano";
      $this->data['idModule']     =3;
      $this->data['activeTab']    =$this->data['idModule'];

       $this->load->model('capitalh_model', '', TRUE); 

    }

    function index()
    {
      #Se incluye el helper para validacion de modulos y submodulos
      $this->data['idSubModule']=10;
      validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

      $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
     
      $this->data['contenidoPrincial'] ='capitalhumano/capitalhumano';

      $this->data['desc_mod_submod'] = $this->capitalh_model->getDesd_mod_submod($this->data['idSubModule']);

      $this->load->view('main_template',$this->data);
    }

}
?>