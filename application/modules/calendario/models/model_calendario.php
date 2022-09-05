<?php
class model_calendario extends CI_Model {

	private $db_b;

	public function _construct(){
		parent::_construct();
		controlsessiones();
		$this->db_b = $this->load->database('checadores', TRUE);
	}

	//catalogo de jornadas
	function cat_jornada(){
		$consulta = $this->db->get('cat_jornada');
		return $consulta->result_array();
	}

	//lista de empleados
	function empleado1($id_cat_ua, $id_cat_ua_area){
		#var_dump($id_cat_ua_area);
		#exit;
		$dat = "";
		if($id_cat_ua_area == null){
			$dat = 'empleado.id_cat_ua_area is NULL';
		}
		else{
			$dat = 'empleado.id_cat_ua_area = '.$id_cat_ua_area;
		}
		
		$this->db->select('empleado.id_persona, empleado.id_empleado, persona.nombre, persona.ap_paterno, persona.ap_materno');
		$this->db->from('empleado');
		$this->db->join('persona', "persona.id_persona = empleado.id_persona");
		$this->db->where('empleado.id_cat_ua = '.$id_cat_ua);
		$this->db->where($dat);
		
		
		$consulta = $this->db->get();

		return $consulta->result_array(); 
	}

	function empleado2($id_cat_ua, $id_cat_ua_area, $id_cat_cuadrante){
		$dat = "";
		if($id_cat_ua_area == null){
			$dat = 'empleado.id_cat_ua_area is NULL';
		}
		else{
			$dat = 'empleado.id_cat_ua_area = '.$id_cat_ua_area;
		}

		$this->db->select('empleado.id_persona, empleado.id_empleado, persona.nombre, persona.ap_paterno, persona.ap_materno');
		$this->db->from('empleado');
		$this->db->join('persona', "persona.id_persona = empleado.id_persona");
		$this->db->join('empleado_cuadrante', "empleado_cuadrante.id_empleado = empleado.id_empleado AND empleado_cuadrante.id_cat_cuadrante = ".$id_cat_cuadrante);
		$this->db->where('empleado.id_cat_ua = '.$id_cat_ua);
		$this->db->where($dat);

		$consulta = $this->db->get();
		return $consulta->result_array(); 
	}

	function obten_ua(){		
		$this->db->select('empleado.id_cat_ua, empleado.id_cat_ua_area, empleado_cuadrante.id_cat_cuadrante');
		$this->db->from('persona');
		$this->db->join('empleado', 'empleado.id_empleado = persona.id_persona');
		$this->db->join('empleado_cuadrante','empleado_cuadrante.id_empleado = empleado.id_empleado','left');
		$this->db->where('persona.id_persona = '.$this->session->userdata('id_persona').'');
		#$this->db->where('persona.id_persona = 000000009');
		#echo gettype($id_enlace);
		#exit;
		//echo $id_enlace;
		#exit;
		$consulta = $this->db->get();

		return $consulta->result_array(); 
	}

	function guarda_horario($id_empleado, $id_cat_jornada, $fecha_entrada){
		$datos = array('id_empleado_jornada' => null,
			'id_empleado' => $id_empleado,
    		'id_cat_jornada' => $id_cat_jornada,
    		'fecha_entrada' => $fecha_entrada);
		$this->db->insert('empleado_jornada', $datos);
	}

	function horario_en_mes($id_empleado, $mes_actual, $anio_actual){
		$this->db->select('empleado_jornada.id_empleado');
		$this->db->from('empleado_jornada');
		$this->db->where('empleado_jornada.fecha_entrada BETWEEN "'.$anio_actual.'-'.$mes_actual.'-'.'00" AND "'.$anio_actual.'-'.$mes_actual.'-'.'31"');
		$this->db->where('empleado_jornada.id_empleado = '.$id_empleado);
		$this->db->limit(1);
		$consulta = $this->db->get();
		return $consulta->result_array();
	}

	function consulta_horario($id_empleado){
		$this->db->select('empleado_jornada.*');
		$this->db->from('empleado_jornada');
		$this->db->where('empleado_jornada.id_empleado = '.$id_empleado);
		$consulta = $this->db->get();
		return $consulta->result_array();
	}

	function consulta_empalme($id_empleado, $fecha){
		$this->db->select('empleado_jornada.id_cat_jornada');
		$this->db->from('empleado_jornada');
		$this->db->where('empleado_jornada.id_empleado = '.$id_empleado);
		$this->db->where('empleado_jornada.fecha_entrada = "'.$fecha.'"');
		$consulta = $this->db->get();
		return $consulta->result_array();
	}

	function consulta_horario_mes($id_empleado, $fecha_min, $fecha_max){
		$this->db->select('empleado_jornada.*');
		$this->db->from('empleado_jornada');
		$this->db->where('empleado_jornada.id_empleado = '.$id_empleado);
		$this->db->where('empleado_jornada.fecha_entrada BETWEEN "'.$fecha_min.'" AND "'.$fecha_max.'"');
		$consulta = $this->db->get();
		return $consulta->result_array();
	}

	function elimina_horario($id_empleado_jornada){
		try { 
			$query_str = "DELETE FROM empleado_jornada WHERE id_empleado_jornada = ".$id_empleado_jornada; 
			$result = $this->db->query($query_str);
			if (!$result) { 
				//throw new Exception('error in query'); 
				return false; 
			} 
			return true; 
		} 
		catch (Exception $e) { 
			return false; 
		}
		
	}
} 
?>