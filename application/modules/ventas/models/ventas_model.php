<?php
Class Ventas_model extends CI_Model {

  	//Obtiene descripción de los módulos y submodulos
    public function getDesd_mod_submod($submodulo)  {
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