<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MX_Controller 
{


    public $data = array();

    function __construct()
    {
        parent::__construct();

        #Se incluye el control de session del usuario
        controlsessiones();

        $this->load->model('inicio_model', '', TRUE); // Cargamos el modelo para inicio

        $this->data['navPrincipal'] = "inicio/navInicio";
        $this->data['idModule']     =2;
        $this->data['activeTab']    =$this->data['idModule'];

    }

    function index()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=8;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='inicio/inicio';
        
        $this->data['desc_mod_submod'] = $this->inicio_model->getDesd_mod_submod($this->data['idSubModule']);

        $this->load->view('main_template',$this->data); 
    }

    function cambiarPasswordForm()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=9;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='inicio/cambiarPasswordForm';

         $this->data['desc_mod_submod'] = $this->inicio_model->getDesd_mod_submod($this->data['idSubModule']);
         
        $id_system_users                 =$this->session->userdata('id_system_users');
        $this->data['results']           = $this->inicio_model->get_allData("system_users","id_system_users",$id_system_users);
        $this->data['msj']               ="";

        $this->load->view('main_template',$this->data); 
    }

    function cambiarPasswordAction()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=9;
        validamodulosysubmodulos($this->data['idModule'], $this->data['idSubModule']);

        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');

        extract( $this->input->post(), EXTR_OVERWRITE);

        $id_system_users                 =$this->session->userdata('id_system_users');
        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='inicio/cambiarPasswordForm';
        $this->data['results']           = $this->inicio_model->get_allData("system_users","id_system_users",$id_system_users);

        if($this->form_validation->run() == FALSE)
        {
            $this->data['msj'] ="";
        }else
            {
                $datos       = array('usuario' => $usuario,
                'password'   => MD5($password));
                $this->db->WHERE('id_system_users', $id_system_users);
                $this->db->UPDATE('system_users', $datos);
                $this->data['msj'] ="Los datos han sido actualizados";
            }
        $this->load->view('main_template',$this->data); 
    }

    function persistenciaSlide()
    {
        validamodulosysubmodulos($this->data['idModule'],8);
        $this->session->set_userdata('nVecesClic', $this->session->userdata('nVecesClic')+1);//Contador de click's
        if($this->session->userdata('nVecesClic')%2==0)
        {
           $setClass="bg-dark lter aside-md hidden-print hidden-xs"; //par
        }else
            {
                $setClass="bg-dark lter aside-md hidden-print hidden-xs nav-xs";//impar
            }
        $this->session->set_userdata('classaside', $setClass);   
    }
}
?>