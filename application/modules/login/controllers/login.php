<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller  {

	function __construct() {
		parent::__construct();
		$this->load->model('loginusuer','',TRUE);
		date_default_timezone_set('America/Mexico_City');
	}
	#Por default la function index cargara el archivo que se le indique en la vista	
	#http://localhost/sid2/
	#Si accedemos a http://localhost/sid2/ y no hay function index marcara el error 404 Page Not Found

	#Si no hay una funcion con el nombre de index se debera acceder de la siguiente manera
	#http://localhost/sid2/index.php/"nombre_del_archivo_controlador"/"nombre de la funcion del controlador"

	#CLIO050282
	#Función principal para el inicio de sessión de usuario
	#La función index es la que se ejecuta primero, a no ser que exista otra función y se carge desde la url con nombre del cotrolador/"nombre_funcion"
	function index() {
		$data['titlePage']         ='Inicio de sesión';
		$data['descTitle']         ="Inicio de sesión";
		$data['contenidoPrincial'] ='login'; #Nombre de la vista
		$this->load->view('template_login',$data);
	}

	function valida_login() {

		#Se aplica una lista de validaciones que debe cumplir cada campo del formulario.
		#set_rules: recibe tres parámetros-> Primero se especifica el nombre del campo, como segundo parametro una definicion del elemento y tercero  las normas que debe pasar
		#trim:Devuelve una cadena con los espacios en blanco eliminados del inicio y final de un string.
		#required:Hara que el campo sea obligatorio, que no este vacío.
		#xss_clean:Evitar que se puedan hacer ataques Cross-site scripting, inyecciones de código sqli.

		$this->form_validation->set_rules('username', 'Usuario', 'trim|required|xss_clean');
		$this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean|callback_consultaClavesUsuario');
		#La palabra callback y el guión bajo seguido de un "nombre"(consultaClavesUsuario) es la forma de decirle al framework que hay una función de validación 

		#Se comprueba si el formulario enviado paso o no la validación.
		#Aca se compara el valor devuelto por el método run de la libreria y la llamadas a las funciones
		if($this->form_validation->run() == FALSE) {
			#Si no paso la validacion, volvemos a cargar el inicio de sesión
			$data['titlePage']         ='Inicio de sesión';
			$data['descTitle']         ="Inicio de sesión";
			$data['contenidoPrincial'] ='login'; #Nombre de la vista
			$this->load->view('template_login',$data);
		} else {
			#Si todo va bien,
			#cargamos el valor de la clase al slide
			$this->session->set_userdata('classaside',"bg-dark lter aside-md hidden-print hidden-xs");
			#redireccionamos a:
			if($this->session->userdata('id_system_users')==1) { #Usuario administrador
				redirect('configsys/', 'refresh'); //Pagina de configuración del sistema
			}
			else {
				redirect('inicio/', 'refresh'); //Pagina de inicio
			}
		}
	}

	#Función de validación 
	#Solamente se incluye el nombre de la función sin usar la palabra callback ni el guión bajo
	#function consultaClavesUsuario($password) #De esta manera ya va implicito el campo (password) de donde se invoca la función
	function consultaClavesUsuario() {
		#Obtenemos los valores de usuario y contraseña enviados por el metodo post
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		#Obtenemos el resultado de la validacion de los datos
		$result = $this->loginusuer->sqlLogin($username, $password);

		#Si hay datos de usuario
		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
					'id_system_users' => $row->id_system_users,
					'usuario'         => $row->usuario,
					'id_persona'      => $row->id_persona,
					'logueado'        => "SI",
					'ultimoAcceso'    =>date("Y-n-j H:i:s")   //Defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
				);
				$this->session->set_userdata($sess_array);
			}
			return TRUE;
		}
		else {
			$this->form_validation->set_message('consultaClavesUsuario', '<br /><span style="color:red;">El usuario o la contraseña son incorrectos.</span>');
			return FALSE;
		}
	}

	#Método para cerrar la sesión de usuario
	function logout() {
		$this->session->set_userdata('logueado', "NO");
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}

}