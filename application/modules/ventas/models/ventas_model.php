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
       $sqlExistPerson = "SELECT idInventario,codigo_barras, articulo, precioNeto FROM inventario WHERE articulo like'%$keyword%' AND cantidad>0 LIMIT 10";
        $respExistP     = $this->db->query($sqlExistPerson);
       # return $this->db->get('inventario');
       return $respExistP->result();
    }

    public function getCode($code) {
        #$this->db->order_by('id', 'DESC');
        #$this->db->like("articulo", $code);
       # var_dump($this->db);
       $sqlExistPerson = "SELECT idInventario,codigo_barras, articulo, precioNeto FROM inventario WHERE codigo_barras=$code AND cantidad>0 LIMIT 10";
        $respExistP    = $this->db->query($sqlExistPerson);
       # return $this->db->get('inventario');
       return $respExistP->result();
    }

    public function getNumVenta()  {
        $sqlNumVenta = "select max(idVenta)+1 id from venta;";
        $rst     = $this->db->query($sqlNumVenta);

        return $rst->result();
    }


	function getVentaG() {
		$getAllData="SELECT  idVenta, fechaVenta, idSystemUsersVenta, system_users.usuario, total, efectivo, cambio, numArticulos, nota, if(pagoP=0,'','Pendiente') as pagoP FROM  venta, system_users  where system_users.id_system_users =idSystemUsersVenta ORDER by idVenta desc;";
		$query = $this->db->query($getAllData);
		return $query->result();
	}

    function getVentaD() {
		$getAllData="SELECT v.idVenta,v.fechaVenta,v.idSystemUsersVenta, vd.cantidad ,vd.idInventario, vd.pu, vd.importe, i.articulo  from venta v, venta_detalle vd, inventario i  where v.idVenta =vd.idVenta and vd.idInventario =i.idInventario";
		$query = $this->db->query($getAllData);
		return $query->result();
	}

}
?>
