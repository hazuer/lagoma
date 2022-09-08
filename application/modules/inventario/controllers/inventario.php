<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario extends MX_Controller  {
    public $data = array();

    function __construct() {
        parent::__construct();

        #Se incluye el control de session del usuario
        controlsessiones();

        $this->load->model('inventario_model', '', TRUE); // Cargamos el modelo para inicio

        $this->data['navPrincipal'] = "inventario/navInventario";
        $this->data['idModule']     = 4;
        $this->data['activeTab']    = $this->data['idModule'];
    }

    function index() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule'] = 12;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='inventario/invLs';
        $this->data['desc_mod_submod'] = $this->inventario_model->getDesd_mod_submod($this->data['idSubModule']);

        $this->data['results'] = $this->inventario_model->get_Inventario();

        $this->load->view('main_template',$this->data); 
    }

    function invForm() {
        $this->data['idSubModule'] = 12;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='inventario/invForm';
        $this->data['desc_mod_submod'] = $this->inventario_model->getDesd_mod_submod($this->data['idSubModule']);

        $this->load->view('main_template',$this->data); 
    }

}
?>