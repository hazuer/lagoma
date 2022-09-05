<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Correspondencia extends CI_Controller {

	public $data = array();

	public function __construct()
	{
		parent::__construct();

        #Se incluye el control de session del usuario
        controlsessiones();

		$this->load->model('model_correspondencia', '', TRUE); // Cargamos el modelo para inicio

        $this->load->model('model_correspondencia', '', TRUE); 

        $this->data['navPrincipal'] = "correspondencia/navCorrespondencia";
        $this->data['idModule']     =5;
        $this->data['activeTab']    =$this->data['idModule'];

	}

	 public function index()
	{
		
		#Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=14;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='correspondencia/bandejaEntrada';

		$this->data['desc_mod_submod'] = $this->model_correspondencia->getDesd_mod_submod($this->data['idSubModule']);        

        $this->load->view('main_template',$this->data); 

		
	}

	 public function bandejaSalida()
	{
		
		#Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=14;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] ='correspondencia/bandejaSalida';

        $this->load->view('main_template',$this->data); 

		
	}

	
}
?>