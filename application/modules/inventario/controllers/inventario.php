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

    function invForm($idParameter) {
        $this->data['idSubModule'] = 12;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        $idParameter = url_decode($idParameter); //Decodificamos el parametro recibido

        $this->data['idParameter'] = $idParameter;
        if($idParameter!=0) {
            $this->data['results'] = $this->inventario_model->get_allData("inventario","idInventario",$idParameter);
        }

        $this->load->view('inventario/invForm',$this->data); 
    }

    function inventarioAction() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=12;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        $this->form_validation->set_rules('codigo_barras', 'codigo_barras', 'trim|required|xss_clean');
        $this->form_validation->set_rules('cantidad', 'cantidad ', 'trim|required|xss_clean');
        $this->form_validation->set_rules('articulo', 'articulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('precioNeto', 'precioNeto', 'trim|required|xss_clean');

        extract( $this->input->post(), EXTR_OVERWRITE);
        header('Content-Type: application/json; charset=utf-8');

        $result = [
			'success'  => 'false',
			'info'     => 'Error de validación de datos',
			'message'  => ''
		];

        if($this->form_validation->run() == FALSE) {
            echo json_encode($result);
            die();
        }

        $datos = array('codigo_barras' => $codigo_barras,
        'cantidad'    => $cantidad,
        'articulo' => $articulo,
        'precioNeto'          => $precioNeto,
        'puCompra'          => $puCompra,
        'stock_min'     => $stock_min,
        'estatus'     => $estatus);

        if ($action=="new") {
            $datos['idInventario'] = null;
            $this->db->INSERT('inventario', $datos);
            $getLastInserted=$this->db->insert_id();

            $result = [
                'success'  => 'true',
                'info'     => 'Registro guardado de forma exitosa',
                'message'  => $getLastInserted
            ];

        } else if($action=="edit") {
            $this->db->WHERE('idInventario', $idInventario);
            $this->db->UPDATE('inventario', $datos);
            $result = [
                'success'  => 'true',
                'info'     => 'Registro actualizado',
                'message'  => ''
            ];
        }
        echo json_encode($result);
        die();
    }


}
?>