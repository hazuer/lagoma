<?php defined('BASEPATH') OR exit('No direct script access allowed');
 class Calendario extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		controlsessiones();

		date_default_timezone_set('UTC');
		
		$this->output->set_header('Access-Control-Allow-Origin: *');
		
		date_default_timezone_set('UTC');
		
		//validamodulosysubmodulos(3, 7);

		$this->load->model('model_calendario');


	}

	 public function index()
	{
		$datos['titlePage']='Calendario';
	    $datos['activeTab']=3;
	    $datos['descTitle']="Capital Humano";
	    $datos['descTitleSub']="Sistema de capital humano";
	    $datos['iconFa']="group";
	    $datos['contenidoPrincial']='calendario/vista_calendario';
	    $datos['navPrincipal']='capitalhumano/navCapitalhumano';

		$datos['cat_jornada'] = $this->model_calendario->cat_jornada();
#echo $this->session->userdata('id_persona');
#exit;
		$uas = $this->model_calendario->obten_ua();
	    if($uas[0]['id_cat_cuadrante'] == null){
	    	$datos['cat_empleado'] = $this->model_calendario->empleado1($uas[0]['id_cat_ua'], $uas[0]['id_cat_ua_area']);
	    }
	    else{
	    	$datos['cat_empleado'] = $this->model_calendario->empleado2($uas[0]['id_cat_ua'], $uas[0]['id_cat_ua_area'], $uas[0]['id_cat_cuadrante']);
	    }

		#$datos['cat_empleado'] = $this->model_calendario->empleado($this->session->userdata('id_persona'));
		//$this->load->view('vista_calendario', $datos);

		$this->load->view('main_template',$datos);
		//$this->twig->display('vista_calendario.html.twig', $datos);

	}

	public function guardar_horario_editado(){
		$id_empleado = $this->input->get('id_empleado');
	    $id_cat_jornada = $this->input->get('id_cat_jornada');
	    $id_cat_jornada2 = $this->input->get('id_cat_jornada2');
    	$mes = $this->input->get('mes');
    	$anio = $this->input->get('anio');
    	$no_eliminar = [];

    	$dias_de_mes = date('t', mktime( 0, 0, 0, $mes, 1, $anio));
    	$mes_temp = $mes;

		$datos = $this->model_calendario->consulta_horario_mes($id_empleado, $anio."-".$mes_temp."-"."01", $anio."-".$mes_temp."-".$dias_de_mes);
		for($i = 0; $i < count($datos); $i++){
			$bandera = true;
			$dia_temp = substr($datos[$i]['fecha_entrada'], 8, 2);
			if($id_cat_jornada[intval($dia_temp)] == $datos[$i]['id_cat_jornada']){
				$id_cat_jornada[intval($dia_temp)] = 0;
				$datos[$i]['id_cat_jornada'] = 0;
			}
			else if($id_cat_jornada2[intval($dia_temp)] == $datos[$i]['id_cat_jornada']){
				$id_cat_jornada2[intval($dia_temp)] = 0;
				$datos[$i]['id_cat_jornada'] = 0;
			}
			else{
				/*try{
					$this->model_calendario->elimina_horario($datos[$i]['id_empleado_jornada']);
				}
				catch(Exception $e){
					array_push($no_eliminar, $dia_temp);
				}*/
				$bandera = $this->model_calendario->elimina_horario($datos[$i]['id_empleado_jornada']);
				if($bandera == false){
					array_push($no_eliminar, $dia_temp);
				}
			}
		}
		for($i = 0; $i <32; $i++){
			if($id_cat_jornada[$i] != 0 ){
				$dia_temp = $i;
				if($i<10){
					$dia_temp = "0".$i;
				}
				$this->model_calendario->guarda_horario($id_empleado, $id_cat_jornada[$i], $anio.$mes_temp.$dia_temp);
				calculaIncidencia($id_empleado, $id_cat_jornada[$i], $anio.$mes_temp.$dia_temp);
			}
			if($id_cat_jornada2[$i] != 0 ){
				$dia_temp = $i;
				if($i<10){
					$dia_temp = "0".$i;
				}
				$this->model_calendario->guarda_horario($id_empleado, $id_cat_jornada2[$i], $anio.$mes_temp.$dia_temp);
				calculaIncidencia($id_empleado, $id_cat_jornada2[$i], $anio.$mes_temp.$dia_temp);
			}
		}

		echo json_encode($no_eliminar);
    }

	public function consulta_empalme(){
		$id_empleado = $this->input->get('id_empleado');
	    $id_cat_jornada = $this->input->get('id_cat_jornada');
	    $id_cat_jornada2 = $this->input->get('id_cat_jornada2');
    	$mes = $this->input->get('mes');
    	$anio = $this->input->get('anio');

    	$mes = $mes - 1;

    	$dias_de_mes = date('t', mktime( 0, 0, 0, $mes, 1, $anio));
    	$mes_temp = $mes;
    	if($mes_temp < 10){
    		$mes_temp = "0".$mes;
    	}

    	$datos = $this->model_calendario->consulta_empalme($id_empleado, $anio."-".$mes_temp."-".$dias_de_mes);

    	if($datos == null){
    		echo "";
    	}
    	else{
    		echo json_encode($datos);
    	}

	}

	public function consulta_horario(){
		$id_empleado = $this->input->get('id_empleado');
		$datos = $this->model_calendario->consulta_horario($id_empleado);

		echo json_encode($datos);
	}

	public function guarda_horario_mensual(){
		
		$id_empleado = $this->input->get('id_empleado');
		$anio = $this->input->get('anio');
		$id_cat_jornada = $this->input->get('id_cat_jornada');
		$mes_min = $this->input->get('mes_min');
		$mes_max = $this->input->get('mes_max');

		for($j=$mes_min; $j<=$mes_max; $j++){
			$dias_de_mes = date('t', mktime( 0, 0, 0, $j, 1, $anio));
			echo $dias_de_mes;
			for ($i=1; $i <= $dias_de_mes; $i++) { 
				if(date('w', mktime(0,0,0,$j, $i, $anio)) != 6 && date('w', mktime(0,0,0,$j, $i, $anio)) != 0){
					$dia_temp=$i;
					if($dia_temp < 10){
						$dia_temp = "0".$dia_temp;
					}
					$mes_temp=$j;
					if($mes_temp < 10){
						$mes_temp = "0".$mes_temp;
					}
					$this->model_calendario->guarda_horario($id_empleado, $id_cat_jornada, $anio.$mes_temp.$dia_temp);
					calculaIncidencia($id_empleado, $id_cat_jornada, $anio.$mes_temp.$dia_temp);
				}
			}
		}
	}

	public function guarda_horario()
	{
		$id_empleado = $this->input->get('id_empleado');
	    $id_cat_jornada = $this->input->get('id_cat_jornada');
	    $id_cat_jornada2 = $this->input->get('id_cat_jornada2');
    	$fecha_entrada = $this->input->get('fecha_entrada');

    	for ($i=0; $i < count($id_cat_jornada); $i++) { 
    		if($id_cat_jornada[$i] != 0){
    			$this->model_calendario->guarda_horario($id_empleado, $id_cat_jornada[$i], $fecha_entrada.$i);
    			calculaIncidencia($id_empleado, $id_cat_jornada[$i], $fecha_entrada.$i);
    		}
    	}

    	for ($i=0; $i < count($id_cat_jornada2); $i++) { 
    		if($id_cat_jornada2[$i] != 0){
    			$this->model_calendario->guarda_horario($id_empleado, $id_cat_jornada2[$i], $fecha_entrada.$i);
    			calculaIncidencia($id_empleado, $id_cat_jornada2[$i], $fecha_entrada.$i);
    		}
    	}
	}

	public function empleados_horario_mes()
	{
	    $id_user_enlace = $this->input->post('id_user_enlace');
	    $uas = $this->model_calendario->obten_ua();
	    if($uas[0]['id_cat_cuadrante'] == null){
	    	$empleados = $this->model_calendario->empleado1($uas[0]['id_cat_ua'], $uas[0]['id_cat_ua_area']);
	    }
	    else{
	    	$empleados = $this->model_calendario->empleado2($uas[0]['id_cat_ua'], $uas[0]['id_cat_ua_area'], $uas[0]['id_cat_cuadrante']);
	    }
		
		//$id_empleados = $this->input->post('id_empleados');
	    $mes_actual = $this->input->post('mes_actual');
	    $anio_actual = $this->input->post('anio_actual');
	    $empleados_con_horario = [];
	    //$empleados_con_horario = array();
	    $empleados_sin_horario = array();
	    $empleados_horarios = array();
    	//echo json_encode($_POST);
    	//echo count($id_empleados);
    	for ($i=0; $i < count($empleados); $i++){
    		//echo $mes_actual." ".$id_empleados[$i]." ".$anio_actual;
    		$datos = $this->model_calendario->horario_en_mes($empleados[$i]['id_empleado'], $mes_actual, $anio_actual);
    		if($datos != null){

    			array_push($empleados_con_horario, $empleados[$i]['id_empleado']);
	    	}

    	}


    	echo json_encode($empleados_con_horario);

	}

	public function evento()
	{	
		if( ! ini_get('date.timezone') )
		{
		   date_default_timezone_set('GMT');
		} 
		$CImes = $this->input->get('mes');
	    $CIanio = $this->input->get('anio');
    	$CIaccion = $this->input->get('accion');

    	//echo "<div class='yo'>".var_dump($_GET)."</div>";
		function fecha ($valor)
		{
			$timer = explode(" ",$valor);
			$fecha = explode("-",$timer[0]);
			$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
			return $fechex;
		}

		function buscar_en_array($fecha,$array)
		{
			$total_eventos=count($array);
			for($e=0;$e<$total_eventos;$e++)
			{
				if ($array[$e]["fecha"]==$fecha) return true;
			}
		}

		switch ($CIaccion)
		{
			case "generar_calendario":
			{
				$fecha_calendario=array();
				if ($CImes=="" || $CIanio=="") 
				{
					$fecha_calendario[1]=intval(date("m"));
					if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
					$fecha_calendario[0]=date("Y");
				} 
				else 
				{
					$fecha_calendario[1]=intval($CImes);
					if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
					else $fecha_calendario[1]=$fecha_calendario[1];
					$fecha_calendario[0]=$CIanio;
				}
				$fecha_calendario[2]="01";
				
				/* obtenemos el dia de la semana del 1 del mes actual */
				$primeromes=date("N",mktime(0,0,0,$fecha_calendario[1],1,$fecha_calendario[0]));

				/* sumamos uno para que empieze la semana desde el domingo*/
				$primeromes=$primeromes+1;
				if($primeromes==8){
					$primeromes=1;
				}
					
				/* comprobamos si el año es bisiesto y creamos array de días */
				if (($fecha_calendario[0] % 4 == 0) && (($fecha_calendario[0] % 100 != 0) || ($fecha_calendario[0] % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
				else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");
				
								
				$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				
				/* calculamos los días de la semana anterior al día 1 del mes en curso */
				$diasantes=$primeromes-1;
					
				/* los días totales de la tabla siempre serán máximo 42 (7 días x 6 filas máximo) */
				$diasdespues=42;
					
				/* calculamos las filas de la tabla */
				$tope=$dias[intval($fecha_calendario[1])]+$diasantes;
				if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
				else $totalfilas=intval(($tope/7));
					
				/* empezamos a pintar la tabla */
				$mesanterior=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]-1,01,$fecha_calendario[0]));
				$messiguiente=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]+1,01,$fecha_calendario[0]));
				echo "<div class='text-center' style='width:100%'><ul class='toggle pagination pagination-lg'><li><a href='#' rel='$mesanterior' class='anterior'>&laquo; Mes Anterior</a></li><li><a href='#'>Calendario de Horarios para: ".$meses[intval($fecha_calendario[1])]." de ".$fecha_calendario[0]."</a></li><li><a href='#' class='siguiente' rel='$messiguiente'>Mes Siguiente  &raquo;</a></li></ul></div>";
				//echo "<table class='fc-header' style='width:100%'><tr><td><span class=='fc-header-center'><h2>Calendario de Horarios para: ".$meses[intval($fecha_calendario[1])]." de ".$fecha_calendario[0]."</h2></span></td></tr></table>";
				if (isset($mostrar)) echo $mostrar;
					
				echo "<table class='calendario' cellspacing='0' cellpadding='0'>";
					echo "<tr><th>Domingo</th><th>Lunes</th><th>Martes</th><th>Mi&eacute;rcoles</th><th>Jueves</th><th>Viernes</th><th>S&aacute;bado</th></tr><tr>";
					
					/* inicializamos filas de la tabla */
					$tr=0;
					$dia=1;
					
					function es_finde($fecha)
					{
						$cortamos=explode("-",$fecha);
						$dia=$cortamos[2];
						$mes=$cortamos[1];
						$ano=$cortamos[0];
						$fue=date("w",mktime(0,0,0,$mes,$dia,$ano));
						if (intval($fue)==0 || intval($fue)==6) return true;
						else return false;
					}
					
					for ($i=1;$i<=$diasdespues;$i++)
					{
						if ($tr<$totalfilas)
						{
							if ($i>=$primeromes && $i<=$tope) 
							{
								echo "<td class='" ;
								/* creamos fecha completa */
								if ($dia<10) $dia_actual="0".$dia; else $dia_actual=$dia;
								$fecha_completa=$fecha_calendario[0]."-".$fecha_calendario[1]."-".$dia_actual;
								
								/* si es hoy coloreamos la celda */
								if (date("Y-m-d")==$fecha_completa) echo " hoy";
								
								echo "'>";
								
								/* recorremos el array de eventos para mostrar los eventos del día de hoy */
								echo "<div class ='numdia'>$dia</div>";

								echo "<div class='horario' id='horario".$dia."'><script>textoCat_horario($dia);</script></div><div class='horario'></div>";

								echo "<a href='#' class='add agregar_evento' rel='".$dia."'></a>";

								echo "<a href='#' class='less eliminar_evento' rel='".$dia."'></a>";
																
								echo "</td>";
								$dia+=1;
							}
							else echo "<td class='desactivada'>&nbsp;</td>";
							if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {echo "<tr>";$tr+=1;}
						}
					}
					echo "</table>";
					
					
				//echo '<table class="fc-header" style="width:100%"><tbody><tr><td class="fc-header-left"><a href="#" rel="$mesanterior" class="anterior"><i class="fa fa-chevron-left"></i></a></td><td class="fc-header-center"><span class="fc-header-title"><h2>Calendario de Horarios para: '.$meses[intval($fecha_calendario[1])].' de '.$fecha_calendario[0].'</h2></span></td><td class="fc-header-right"><a href="#" class="siguiente" rel="$messiguiente"><i class="fa fa-chevron-right"></i></a></td></tr></tbody></table>';
				//echo "<table class='fc-header' style='width:100%'><tr><td class='fc-header-left'><a href='#' rel='$mesanterior' class='anterior'>ss</a></td>";
				//echo "<td class='fc-header-right'><span class='fc-button fc-button-next fc-state-default fc-corner-left fc-corner-right'><a href='#' class='siguiente' rel='$messiguiente'>Mes Siguiente</a></span></td></tr></table>";
				//echo "<div class='text-center' style='width:100%'><ul class='toggle pagination pagination-lg'><li><a href='#' rel='$mesanterior' class='anterior'>&laquo; Mes Anterior</a></li><li><a href='#' class='siguiente' rel='$messiguiente'>Mes Siguiente  &raquo;</a></li></ul></div>";
					
				break;
			}
		}
		}
}
?>