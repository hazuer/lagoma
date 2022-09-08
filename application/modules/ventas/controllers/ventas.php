<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ventas extends MX_Controller  {
    public $data = [];

    function __construct() {
        parent::__construct();

        #Se incluye el control de session del usuario
        controlsessiones();

        $this->load->model('ventas_model', '', TRUE); // Cargamos el modelo para inicio

        $this->data['navPrincipal'] = "ventas/navVentas";
        $this->data['idModule']     = 3;
        $this->data['activeTab']    = $this->data['idModule'];
    }

    function index() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule'] = 11;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        = breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] = 'ventas/index';
        $this->data['desc_mod_submod']   = $this->ventas_model->getDesd_mod_submod($this->data['idSubModule']);

        $this->load->view('main_template',$this->data);
    }

    function modal_pay() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule'] = 11;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->load->view('ventas/modalPay', $this->data);
    }

}
?>