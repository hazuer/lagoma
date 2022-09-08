<?php
Class Inventario_model extends CI_Model
{

  function get_allData($tbl,$campo,$idParameter)
  {
    $this->db-> SELECT('*');
    $this->db-> FROM($tbl);
    $this->db-> WHERE($campo, $idParameter);
    $query = $this ->db-> get();

    return $query->result();

  }
  
  //Obtiene descripción de los módulos y submodulos
    public function getDesd_mod_submod($submodulo) 
    {
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

  function get_Inventario()
  {
   $sql="SELECT
    inventario.idinventario,
    inventario.cantidad,
    inventario.articulo,
    inventario.precioNeto,
    inventario.puCompra,
    inventario.porcentaje,
    inventario.puVenta,
    inventario.utilidad,
    inventario.existencia,
    inventario.efectivo
    FROM
    inventario";
    $query = $this->db->query($sql);
    return $query->result();
  }
  

}
?>