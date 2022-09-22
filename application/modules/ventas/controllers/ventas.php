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
        $this->data['idVenta']=$this->ventas_model->getNumVenta();
        $this->load->view('main_template',$this->data);
    }

    function modal_pay() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule'] = 11;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->load->view('ventas/modalPay', $this->data);
    }

    public function GetCountryName(){
        $keyword=$this->input->post('keyword');
        $data=$this->ventas_model->GetRow($keyword);
        echo json_encode($data);
    }

    public function getCodeB(){
        $keyword=$this->input->post('keyword');
        $data=$this->ventas_model->getCode($keyword);
        echo json_encode($data);
    }

    public function store(){

        extract( $this->input->post(), EXTR_OVERWRITE);
        //echo json_encode($this->input->post());
        $details=json_decode($detalle);
        $datos = array('idVenta' => null,
        'idSystemUsersVenta'=>$this->session->userdata('id_system_users'),
        'total'    => $total,
        'efectivo' => $efectivo,
        'cambio'   => $cambio,
        'numArticulos'=>count($details),
        'nota'     => $nota);
        $this->db->INSERT('venta', $datos);
        $getLastInserted=$this->db->insert_id();

        foreach ($details as $k => $v) {
            $dtsDet = array('idVentaDetalle' => null,
            'idVenta'=>$getLastInserted,
            'idSystemUsersVentaD'=>$this->session->userdata('id_system_users'),
            'cantidad'    => $v->cantidad,
            'idInventario' => $v->codigo,
            'pu'   => $v->pu,
            'importe'=>$v->importe
            );
            $this->db->INSERT('venta_detalle', $dtsDet);
            #TODO:Descontar del inventario
            /*$upInv = array('cantidad' => "cantidad - $v->cantidad");
            $this->db->WHERE('idInventario', $v->codigo);
            $this->db->UPDATE('inventario', $upInv);*/
            $upInv = "UPDATE inventario SET cantidad=cantidad-$v->cantidad WHERE idInventario=$v->codigo";
            $this->db->query($upInv);
          }
          $result = [
            'success'  => 'true',
            'info'     => 'Registro guardado de forma exitosa',
            'message'  => $getLastInserted
        ];
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($result);

    }

}
?>