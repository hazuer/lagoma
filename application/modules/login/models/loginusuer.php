<?php
Class Loginusuer extends CI_Model
{
  #Método que retorna:
  #Un recordser de los datos de usuario si nombre de usuario y contraseña son validos
  #FALSE si el nombre de usuario y contraseña son incorrectos

  function sqlLogin($username, $password)
  {
    $this -> db -> SELECT('id_system_users, usuario, password, id_persona');
    $this -> db -> FROM('system_users');
    $this -> db -> WHERE('usuario', $username);
    $this -> db -> WHERE('password', MD5($password));
    $this -> db -> WHERE('status', 1);
    $this -> db -> LIMIT(1);

    #$query = $this->db->query("SELECT id_system_users, usuario, password FROM system_users WHERE usuario='$username' AND password=MD5('$password') LIMIT 1");

    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return FALSE;
    }
  }
}
?>