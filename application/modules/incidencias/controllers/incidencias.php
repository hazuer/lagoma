<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Incidencias extends CI_Controller {

	public function __construct()
	{
		date_default_timezone_set('UTC');
		parent::__construct();

		//controlsessiones();
		//validamodulosysubmodulos(3, 7);

		$this->load->model('model_incidencias');

	}

	 public function index()
	{
		
		#Se incluye el helper para validacion de modulos y submodulos
        //validamodulosysubmodulos(5, 13);

		$datos['titlePage']='Incidencias';
	    $datos['activeTab']=3;
	    $datos['descTitle']="Capital Humano";
	    $datos['descTitleSub']="Sistema de capital humano";
	    $datos['iconFa']="camera";
	    $datos['contenidoPrincial']='incidencias/vista_incidencias';
	    $datos['navPrincipal']='incidencias/navFoseg';

		$this->load->view('main_template',$datos);
	}

	
}
?>