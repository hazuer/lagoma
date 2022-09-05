<?php
Class Configsys_model extends CI_Model {

	function get_todosLosModulos() {
		#Ordernar los datos
		$this->db->order_by('id_system_modulos', 'ASC');
		#Obtener todos los registros de la tabla system_modulos
		$query = $this->db->get('system_modulos')->result();
		return $query;
	}

	function get_todosLosSubModulos() {
		$sqlSubModulos="SELECT 
		system_submodulo.id_system_submodulo, 
		system_submodulo.submodulo,
		system_modulos.modulo 
		FROM system_submodulo,system_modulos 
		WHERE system_submodulo.id_modulo=system_modulos.id_system_modulos";
		$query = $this->db->query($sqlSubModulos);
		return $query->result();
	}

	function get_todosLosUsuarios() {
		$this->db->order_by('id_system_users', 'ASC');
		$query = $this->db->get('system_users')->result();
		return $query;
	}

	function get_todosLosUsuariosConNombre() {
		$sqlUsuarios="SELECT 
		system_users.id_system_users, 
		CONCAT_WS(' ',persona.ap_paterno,persona.ap_materno, persona.nombre) AS nombrecompleto, 
		system_users.usuario, 
		CASE WHEN system_users.status=0 THEN '<span style=color:red;>Inactivo</span>' ELSE 'Activo' END AS status 
		FROM persona,system_users 
		WHERE system_users.id_persona=persona.id_persona 
		ORDER BY nombrecompleto ASC";
		$query = $this->db->query($sqlUsuarios);
		return $query->result();
	}

	function get_allData($tbl,$campo,$idParameter) {
		$this->db-> SELECT('*');
		$this->db-> FROM($tbl);
		$this->db-> WHERE($campo, $idParameter);
		$query = $this ->db-> get();
		return $query->result();
	}

	//Obtiene descripción de los módulos y submodulos
	public function getDesd_mod_submod($submodulo) {
		$query = $this->db->select('a.id_modulo, a.id_system_submodulo, a.submodulo, b.modulo, b.desc_modulo')
		->from('system_submodulo as a')
		->join('system_modulos as b', 'a.id_modulo = b.id_system_modulos')
		->where('a.id_system_submodulo', $submodulo)
		->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		}
		return false;
	}

}
?>