<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Configsys extends CI_Controller 
{
    public $data = array();

    function __construct() 
    {
        parent::__Construct();
        #Se incluye el control de session del usuario
        controlsessiones();
        $this->load->model('configsys_model', '', TRUE); // Cargamos los modulos del sistema desde el modelo

        $this->data['navPrincipal'] = "configsys/navConfigSys";
        $this->data['idModule']     =1;
        $this->data['activeTab']    =$this->data['idModule'];
    }

    function index()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=1;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] = 'configsys/configsys';

        $this->data['desc_mod_submod'] = $this->configsys_model->getDesd_mod_submod($this->data['idSubModule']);

        $this->load->view('main_template', $this->data);
    }

    function modulosLs() {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=2;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] = 'configsys/modulosLs';
		$this->data['desc_mod_submod'] = $this->configsys_model->getDesd_mod_submod($this->data['idSubModule']);
        $this->data['results']           = $this->configsys_model->get_todosLosModulos();

        $this->load->view('main_template', $this->data);
    }

    function moduloForm($idParameter)
    {
         #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=2;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $idParameter = url_decode($idParameter); //Decodificamos el parametro recibido

        $this->data['contenidoPrincial'] = 'configsys/moduloForm';
        $this->data['idParameter']       = $idParameter;  
        if($idParameter!=0)
        {
            $this->data['results'] = $this->configsys_model->get_allData("system_modulos","id_system_modulos",$idParameter);
        }
        $this->load->view('main_template', $this->data);

    }

    function moduloAction()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=2;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $this->form_validation->set_rules('modulo', 'Modulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('desc_modulo', 'Descripcion del modulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('urlControlador', 'Debe especficar la url del controlador', 'trim|required|xss_clean');
        $this->form_validation->set_rules('icono', 'Nombre del icono', 'trim|required|xss_clean');

        extract( $this->input->post(), EXTR_OVERWRITE);

        if ($action=="new")
            {
                if($this->form_validation->run() == FALSE)
                   {

                        $this->data['idParameter']       = 0;
                        $this->load->view('main_template', $this->data);
                    }else
                        {
                             $datos = array('id_system_modulos' => null,
                             'modulo'         => $modulo,
                             'desc_modulo'    => $desc_modulo,
                             'desc_modulo'    => $desc_modulo,
                             'urlControlador' => $urlControlador,
                             'icono'          => $icono,
                             'classColor'     => $classColor);
                             $this->db->INSERT('system_modulos', $datos);  
                             $getLastInserted=$this->db->insert_id(); 
                            
                             #Damos de alta el privilegio al administrador
                             $datos = array('id_system_modulos_privilegios' => null,
                             'id_modulo' => $getLastInserted,
                             'id_user' => 1,
                             'status' => 1);
                             $this->db->INSERT('system_modulos_privilegios', $datos); 
                            
                             $getLastInserted = url_encode($getLastInserted);//Se encripta el parametro enviado

                             redirect('configsys/moduloForm/'.$getLastInserted, 'refresh');

                        }
            }else if($action=="edit")
            {
                // echo"update";
                $datos = array('modulo' => $modulo,
                'desc_modulo'    => $desc_modulo,
                'urlControlador' => $urlControlador,
                'icono'          => $icono,
                'classColor'     => $classColor);
                $this->db->WHERE('id_system_modulos', $id_system_modulos);
                $this->db->UPDATE('system_modulos', $datos);

                $id_system_modulos = url_encode($id_system_modulos);//Se encripta el parametro enviado
                redirect('configsys/moduloForm/'.$id_system_modulos, 'refresh');
            }
    }


    function submodulosLs() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=3;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']        =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        $this->data['contenidoPrincial'] = 'configsys/submodulosLs';
        $this->data['results']           = $this->configsys_model->get_todosLosSubModulos();
        
        $this->load->view('main_template', $this->data);
    }

    function submoduloForm($idParameter)
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=3;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $idParameter = url_decode($idParameter); //Decodificamos el parametro recibido

        $this->data['contenidoPrincial'] = 'configsys/submoduloForm';
        $this->data['idParameter']       = $idParameter;
        if($idParameter!=0) 
        {
            $this->data['results'] = $this->configsys_model->get_allData("system_submodulo","id_system_submodulo",$idParameter);
        }
        $this->load->view('main_template', $this->data);
    }

    function submoduloAction() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=3;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $this->form_validation->set_rules('id_modulo', 'ID del modulo', 'trim|required|xss_clean');
        $this->form_validation->set_rules('submodulo', 'submodulo', 'trim|required|xss_clean');

        extract( $this->input->post(), EXTR_OVERWRITE);

        if ($action=="new")
            {
                if($this->form_validation->run() == FALSE)
                   {
                    //echo "no pasa validacion";
                    $this->data['contenidoPrincial'] = 'configsys/submoduloForm';
                    $this->data['idParameter']       = 0;
                    $this->load->view('main_template', $this->data);
                   }else
                   {
                    //echo "new";
                    $datos = array('id_system_submodulo' => null,
                    'submodulo' => $submodulo,
                    'id_modulo' => $id_modulo);
                    $this->db->INSERT('system_submodulo', $datos);  
                    $getLastInserted=$this->db->insert_id(); 

                    #Damos de alta el privilegio al administrador
                     $datos = array('id_system_submodulo_privilegios' => null,
                     'id_submodulo' => $getLastInserted,
                     'id_user' => 1,
                     'status' => 1);
                    $this->db->INSERT('system_submodulo_privilegios', $datos); 

                    $getLastInserted = url_encode($getLastInserted);//Se encripta el parametro enviado
                    redirect('configsys/submoduloForm/'.$getLastInserted, 'refresh');
                   }
            }else if($action=="edit")
                {
                //echo $id_system_submodulo;
                $datos = array('id_modulo' => $id_modulo,
                'submodulo' => $submodulo);
                $this->db->WHERE('id_system_submodulo', $id_system_submodulo);
                $this->db->UPDATE('system_submodulo', $datos);

                $id_system_submodulo = url_encode($id_system_submodulo);//Se encripta el parametro enviado
                redirect('configsys/submoduloForm/'.$id_system_submodulo, 'refresh');
                }
    }

    function usuariosLs() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=4;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
       
        $this->data['contenidoPrincial'] = 'configsys/usuariosLs';

        $this->data['results'] = $this->configsys_model->get_todosLosUsuariosConNombre();
        $this->load->view('main_template', $this->data);
    }

    function usuariosForm($id_system_users) 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=4;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $id_system_users = url_decode($id_system_users); //Decodificamos el parametro recibido
        
        $this->data['idParameter']       = $id_system_users;
        $this->data['contenidoPrincial'] = 'configsys/usuariosForm';
        if($id_system_users!=0) 
        {               
         $this->data['results'] = $this->configsys_model->get_allData("system_users","id_system_users",$id_system_users);
        }
        $this->load->view('main_template', $this->data);
    }

    function usuariosAction()
    {
       #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=4;
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->form_validation->set_rules('id_persona', 'ID de la persona', 'trim|required|xss_clean');
        $this->form_validation->set_rules('usuario', 'Usuario', 'trim|required|xss_clean');
        $this->form_validation->set_rules('password', 'Contraseña', 'trim|required|xss_clean');

        extract( $this->input->post(), EXTR_OVERWRITE);

        if ($action=="new")
            {
                
                $this->data['idParameter']       = 0;
                $this->data['contenidoPrincial'] = 'configsys/usuariosForm';
                if($this->form_validation->run() == FALSE)
                   {
                    //echo "no pasa validacion";
                    $this->load->view('main_template', $this->data);
                   }else
                   {
                        #Validar si el usuario (id_persona) ya esta dado de alta en la tabla de usuarios
                        $sql_exist_user="SELECT id_persona FROM system_users WHERE id_persona=$id_persona";
                        $respuesta = $this->db->query($sql_exist_user);

                        if ($respuesta->num_rows() == 1)#El usuario ya existe
                        {
                            $this->load->view('main_template', $this->data);
                        }else
                        {
                            //echo"<br>el usuario no existe";
                           // echo "<br>Agregar el usuario en la tabla de system_users";
                             $datos = array('id_system_users' => null,
                            'id_persona' => $id_persona,
                            'usuario' => $usuario,
                            'password' => MD5($password),
                            'status'=>1);
                            $this->db->insert('system_users', $datos); 
                            #Obtenemos el ultimo ID
                            $getLastInserted=$this->db->insert_id(); 

                            ###PRIVILEGIOS POR MODULO -INICIO
                            $datos = array('id_system_modulos_privilegios' => null,
                            'id_modulo' => 2,
                            'id_user' => $getLastInserted,
                            'status' => 1);
                            $this->db->INSERT('system_modulos_privilegios', $datos); 

                            ###PRIVILEGIOS POR SUBMODULO
                            #8 Pagina de bienvenida al usuario
                            $datos = array('id_system_submodulo_privilegios' => null,
                            'id_submodulo' => 8,
                            'id_user' => $getLastInserted,
                            'status' => 1);
                            $this->db->INSERT('system_submodulo_privilegios', $datos);
                            #9 Cambiar clave de acceso
                            $datos = array('id_system_submodulo_privilegios' => null,
                            'id_submodulo' => 9,
                            'id_user' => $getLastInserted,
                            'status' => 1);
                            $this->db->INSERT('system_submodulo_privilegios', $datos);
                            #10 Acceso no autorizado 
                            $datos = array('id_system_submodulo_privilegios' => null,
                            'id_submodulo' => 10,
                            'id_user' => $getLastInserted,
                            'status' => 1);
                            $this->db->INSERT('system_submodulo_privilegios', $datos);

                            $getLastInserted = url_encode($getLastInserted);//Se encripta el parametro enviado
                            redirect('configsys/usuariosForm/'.$getLastInserted, 'refresh');
                        }   
                   }
            }else if($action=="edit")
                {
                    //echo"actualizar los datos de usuario";
                    /*if($this->form_validation->run() == FALSE)
                       {*/
                        // echo "<br> no paso".$id_system_users;
                        //echo "<br>".$status;
                        $datos = array('status' => $status,
                        'usuario' => $usuario,
                        'password' => MD5($password));
                        $this->db->WHERE('id_system_users', $id_system_users);
                        $this->db->UPDATE('system_users', $datos);

                        $id_system_users = url_encode($id_system_users);//Se encripta el parametro enviado
                        redirect('configsys/usuariosForm/'.$id_system_users, 'refresh');
                       /*}else{echo "demo";}*/
                }
    }

    function privModuloLs() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=5;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['contenidoPrincial'] = 'configsys/privModuloLs';
        
        $this->data['results']           = $this->configsys_model->get_todosLosModulos();
        $this->load->view('main_template', $this->data);
    }

    function privModuloForm($id_system_modulos,$modulo) 
    {
        $this->data['idSubModule']=5;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $id_system_modulos = url_decode($id_system_modulos); //Decodificamos el parametro recibido
        $modulo            = url_decode($modulo); //Decodificamos el parametro recibido

        $this->data['contenidoPrincial'] = 'configsys/privModuloForm';
        $this->data['id_system_modulos'] = $id_system_modulos;
        $this->data['modulo']            = $modulo;
        $this->data['results']           = $this->configsys_model->get_todosLosUsuarios();
        $this->load->view('main_template', $this->data);
    }

    function privModuloAction()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=5;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        /*$id_user_array = $this->input->post('id_user_array');
        $id_system_modulos = $this->input->post('id_system_modulos');
        $modulo = $this->input->post('modulo');*/

        extract( $this->input->post(), EXTR_OVERWRITE);

        //Recorrer el array de los usuarios y actualizar
        foreach ($id_user_array AS $id_user => $permiso) 
        {
            #Validar si el usuario ya esta agregado en la tabla system_modulos_privilegios
            $sql_user_exist="SELECT id_system_modulos_privilegios FROM system_modulos_privilegios WHERE id_user=$id_user AND id_modulo=$id_system_modulos";
            //--------echo" ($permiso)<br>";
            $respuesta = $this->db->query($sql_user_exist);
            if ($respuesta->num_rows() == 1)
            {
                $datos = array('status' => $permiso);
                $this->db->WHERE('id_user', $id_user);
                $this->db->WHERE('id_modulo', $id_system_modulos);
                $this->db->UPDATE('system_modulos_privilegios', $datos);
                //echo "<br> update $id_user $permiso";
            }
            else
                {
                if($permiso!=0) #Insert
                    {
                        //-->echo"new $id_user $permiso<br>";
                        $datos = array('id_system_modulos_privilegios' => null,
                        'id_modulo' => $id_system_modulos,
                        'id_user'   => $id_user,
                        'status'    => $permiso);
                        $this->db->INSERT('system_modulos_privilegios', $datos);  
                    }else
                        {
                            //echo"Nothing $id_user $permiso<br>";
                        }
                }
        }
        
        $this->data['contenidoPrincial'] = 'configsys/privModuloForm';
        $this->data['id_system_modulos'] = $id_system_modulos;
        $this->data['modulo']            = $modulo;
        $this->data['results']           = $this->configsys_model->get_todosLosUsuarios();
        $this->load->view('main_template', $this->data);
    }

    function privSubModuloLs() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=6;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $this->data['contenidoPrincial'] = 'configsys/privSubModuloLs';
        $this->data['results']           = $this->configsys_model->get_todosLosSubModulos();
        $this->load->view('main_template', $this->data);
    }

    function privSubModuloForm($id_system_submodulo,$submodulo) 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=6;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $id_system_submodulo  = url_decode($id_system_submodulo); //Decodificamos el parametro recibido
        $submodulo            = url_decode($submodulo); //Decodificamos el parametro recibido

        $this->data['contenidoPrincial']   = 'configsys/privSubModuloForm';
        $this->data['id_system_submodulo'] = $id_system_submodulo;
        $this->data['submodulo']           = $submodulo;
        $this->data['results']             = $this->configsys_model->get_todosLosUsuarios();
        $this->load->view('main_template', $this->data);
    }

    function privSubModuloAction()
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=6;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $this->data['breadcrumb']  =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        //$id_user_array = $this->input->post('id_user_array');
        //$id_system_submodulo = $this->input->post('id_system_submodulo');
        //$submodulo = $this->input->post('submodulo');
        extract( $this->input->post(), EXTR_OVERWRITE);

        foreach ($id_user_array as $id_user => $permiso) 
        {
            #echo"$id_user $permiso <br>";
            #Validar si el usuario ya esta registrado en system_submodulo_privilegios
            $sql_exist_user="SELECT id_system_submodulo_privilegios FROM system_submodulo_privilegios WHERE id_submodulo=$id_system_submodulo AND id_user=$id_user";
            $respuesta = $this->db->query($sql_exist_user);

            if ($respuesta->num_rows() == 1)#Update [permitir/bloquear]
            {
                #echo "permitir/bloquear]";
                $datos = array('status' => $permiso);
                $this->db->WHERE('id_user', $id_user);
                $this->db->WHERE('id_submodulo', $id_system_submodulo);
                $this->db->UPDATE('system_submodulo_privilegios', $datos);
            }else
                {
                #Si el permiso !=0 insertar
                if($permiso!=0) #Insert
                    {
                        #echo"new $id_user $permiso<br>";
                        $datos = array('id_system_submodulo_privilegios' => null,
                        'id_submodulo' => $id_system_submodulo,
                        'id_user'      => $id_user,
                        'status'       => $permiso);
                        $this->db->INSERT('system_submodulo_privilegios', $datos);

                    }else
                        {
                            //echo"Nothing $id_user $permiso<br>";
                        }
                }
        }
       
        $this->data['contenidoPrincial']   = 'configsys/privSubModuloForm';
        $this->data['id_system_submodulo'] = $id_system_submodulo;
        $this->data['submodulo']           = $submodulo;
        $this->data['results']             = $this->configsys_model->get_todosLosUsuarios();
        $this->load->view('main_template', $this->data);

    }

    function cambiarUsuarioForm() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=4;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['contenidoPrincial'] = 'configsys/cambiarUsuarioForm';
        $this->data['results'] = $this->configsys_model->get_todosLosUsuariosConNombre();
        $this->load->view('main_template', $this->data);
    }

    function cambiarUsuarioAction($idParameter) 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=4;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);

        $idParameter = url_decode($idParameter); //Decodificamos el parametro recibido

        $this ->db -> SELECT('id_system_users, usuario, id_persona');
        $this ->db -> FROM('system_users');
        $this ->db -> WHERE('id_system_users', $idParameter);
        $this ->db -> LIMIT(1);
        $query = $this ->db -> get();
        $result =$query->result();

        #Se redefine la nueva session con los datos del usuario seleccionado
        $sess_array = array();
        foreach($result as $row)
        {
            $sess_array = array(
             'id_system_users' => $row->id_system_users,
             'usuario'         => $row->usuario,
             'id_persona'      => $row->id_persona,
             'logueado'        => "SI",
             'ultimoAcceso'    =>date("Y-n-j H:i:s")   //Defino la fecha y hora de inicio de sesión en formato aaaa-mm-dd hh:mm:ss 
            );
            $this->session->set_userdata($sess_array);
        }
        redirect('inicio/', 'refresh'); //Pagina de inicio
    }

    function privUsuarioLs() 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=7;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $this->data['contenidoPrincial'] = 'configsys/privUsuarioLs';
        $this->data['results'] = $this->configsys_model->get_todosLosUsuariosConNombre();
        $this->load->view('main_template', $this->data);
    }

    function privUsuarioForm($idParameter,$nombreUsuario) 
    {
        #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=7;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        $idParameter = url_decode($idParameter);
        $nombreUsuario = url_decode($nombreUsuario);

        $this->data['idParameter']       = $idParameter;
        $this->data['nombreUsuario']     = $nombreUsuario;
        
        $this->data['contenidoPrincial'] = 'configsys/privUsuarioForm';
        $this->data['rstModule'] = $this->configsys_model->get_todosLosModulos();

        $this->load->view('main_template', $this->data);
    }

    function privUsuarioAction() 
    {
       #Se incluye el helper para validacion de modulos y submodulos
        $this->data['idSubModule']=7;
        validamodulosysubmodulos($this->data['idModule'],$this->data['idSubModule']);
        
        $this->data['breadcrumb'] =breadcrumb($this->data['idModule'],$this->data['idSubModule']);

        extract( $this->input->post(), EXTR_OVERWRITE);

        if (!empty($idSysModArray_array))
        {
            //-----------------------Recorrer el array de modulos-----------------------\\
            foreach ($idSysModArray_array AS $id_modulo => $permiso) 
            {
               // echo "$id_modulo => $permiso <br>";
                #Validar si el usuario ya esta agregado en la tabla system_modulos_privilegios
                $sql_user_exist="SELECT id_system_modulos_privilegios FROM system_modulos_privilegios WHERE id_user=$idParameter AND id_modulo=$id_modulo";
                $respuesta = $this->db->query($sql_user_exist);
                if ($respuesta->num_rows() == 1)
                {
                    $datos = array('status' => $permiso);
                    $this->db->WHERE('id_user', $idParameter);
                    $this->db->WHERE('id_modulo', $id_modulo);
                    $this->db->UPDATE('system_modulos_privilegios', $datos);
                    //echo "<br> update $id_user $permiso";
                }
                else
                    {
                        if($permiso!=0) #Insert
                        {
                            //-->echo"new $id_user $permiso<br>";
                            $datos = array('id_system_modulos_privilegios' => null,
                            'id_modulo' => $id_modulo,
                            'id_user'   => $idParameter,
                            'status'    => $permiso);
                            $this->db->INSERT('system_modulos_privilegios', $datos);  
                        }else
                            {
                                //echo"Nothing $idParameter $permiso<br>";
                            }
                    }
            }
        }
        #----------------------------------------------

        //-----------------------Recorrer el array de los submodulos-----------------------\\
        if (!empty($idSysSubModuleArray))
        {
            foreach ($idSysSubModuleArray AS $id_system_submodulo => $permiso) 
            {
                //echo"$id_system_submodulo $permiso <br>";
                #Validar si el usuario ya esta registrado en system_submodulo_privilegios
                $sql_exist_user="SELECT id_system_submodulo_privilegios FROM system_submodulo_privilegios WHERE id_submodulo=$id_system_submodulo AND id_user=$idParameter";
                $respuesta = $this->db->query($sql_exist_user);
                if ($respuesta->num_rows() == 1)#Update [permitir/bloquear]
                {
                    #echo "permitir/bloquear]";
                    $datos = array('status' => $permiso);
                    $this->db->WHERE('id_user', $idParameter);
                    $this->db->WHERE('id_submodulo', $id_system_submodulo);
                    $this->db->UPDATE('system_submodulo_privilegios', $datos);
                }else
                    {
                    #Si el permiso !=0 insertar
                    if($permiso!=0) #Insert
                        {
                            #echo"new $id_user $permiso<br>";
                            $datos = array('id_system_submodulo_privilegios' => null,
                            'id_submodulo' => $id_system_submodulo,
                            'id_user'      => $idParameter,
                            'status'       => $permiso);
                            $this->db->INSERT('system_submodulo_privilegios', $datos);

                        }else
                            {
                                //echo"Nothing $idParameter $permiso<br>";
                            }
                    }
            }
        }
        #----------------------------------------------

        $this->data['idParameter']       = $idParameter;
        $this->data['nombreUsuario']     = $nombreUsuario;
        
        $this->data['contenidoPrincial'] = 'configsys/privUsuarioForm';
        $this->data['rstModule'] = $this->configsys_model->get_todosLosModulos();
        $this->load->view('main_template', $this->data);
    }

}
?>