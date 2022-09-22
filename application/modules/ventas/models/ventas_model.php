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

    public function GetRow($keyword) {        
        #$this->db->order_by('id', 'DESC');
        #$this->db->like("articulo", $keyword);
       # var_dump($this->db);
       $sqlExistPerson = "SELECT idInventario, articulo, precioNeto FROM inventario WHERE articulo like'%$keyword%' AND cantidad>0 LIMIT 10";
        $respExistP     = $this->db->query($sqlExistPerson);
       # return $this->db->get('inventario');
       return $respExistP->result();
    }

    public function getCode($code) {
        #$this->db->order_by('id', 'DESC');
        #$this->db->like("articulo", $code);
       # var_dump($this->db);
       $sqlExistPerson = "SELECT idInventario, articulo, precioNeto FROM inventario WHERE idInventario =$code AND cantidad>0 LIMIT 10";
        $respExistP    = $this->db->query($sqlExistPerson);
       # return $this->db->get('inventario');
       return $respExistP->result();
    }

    public function getNumVenta()  {
        $sqlNumVenta = "select max(idVenta)+1 id from venta;";
        $rst     = $this->db->query($sqlNumVenta);

        return $rst->result();
    }

}
?>
