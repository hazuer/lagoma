<!-- /.aside --> 
<section id="content">
  <section class="vbox">
     <section class="scrollable padder">
        <?php
        echo $breadcrumb;
        ?>

        <div class="m-b-md">
           <h3 class="m-b-none"><?php echo $modulo;?></h3>
        </div>

        <div class="col-sm-12">
          <a href="<?php echo base_url();?>configsys/privModuloLs" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
        </div>

        <div class="col-md-12">
          <section class="panel panel-default">
            <header class="panel-heading font-bold">Privilegios <?php echo $modulo;?></header>
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); ?>
            <?php echo form_open('configsys/privModuloAction',$attributes) ?>

            <?php 
            $atribInput = [
            "type"  => "hidden",
            "id"    => "id_system_modulos",
            "name"  => "id_system_modulos",
            "value" => $id_system_modulos]; 
            $this->crearelemento->Input($atribInput);
            $atribInput = [
            "type"  => "hidden",
            "id"    => "modulo",
            "name"  => "modulo",
            "value" => $modulo]; 
            $this->crearelemento->Input($atribInput);
            ?>
            <div class="table-responsive">
              <table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
                <thead>
                  <tr>
                    <th>id_system_users</th>
                    <th>Usuario</th>
                    <th>Permitido</th>
                    <th>Bloqueado</th>
                    <th>Sin agregar</th>
                  </tr>
                </thead>
                <tbody>                      
                <?php  
                foreach($results as $result) 
                  { 
                    echo"<tr>
                    <td style='text-align:center;'>".$result->id_system_users."</td>
                    <td>".$result->usuario."</td>";
                    $acceso= getLsPrivilegiosMod ($result->id_system_users,$id_system_modulos);
                    //1-Permitido, 2-Bloqueado
                    switch ($acceso) 
                    {
                      case 1:
                      $Permitido   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1' checked>";
                      $Bloqueado   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2'>";
                      $Sin_agregar ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0'>";
                      break;
                      case 2:
                      $Permitido   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1'>";
                      $Bloqueado   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2' checked>";
                      $Sin_agregar ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0'>";
                      break;
                      
                      default:
                      $Permitido   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1'>";
                      $Bloqueado   ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2'>";
                      $Sin_agregar ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0' checked>";
                        break;
                      }
               
                    echo "<td align='center'>$Permitido</td>
                    <td align='center'>$Bloqueado</td>
                    <td align='center'>$Sin_agregar</td>
                    </tr>";
                  }
                ?>
                </tbody>
              </table>
            </div>

            <br />
            <div class="col-lg-offset-5 col-lg-2">
              <?php 
              $atribButton = [
              "type"  => "submit",
              "id"    => "guardar",
              "name"  => "guardar",
              "value" => "guardar",
              "class" => "btn btn-primary btn-lg btn-block"];
              $this->crearelemento->Button($atribButton,"Guardar","fa fa-save"); 
              ?>
            </div>
          </form>
        
          </div>
          </section>
        </div>

<?php
function getLsPrivilegiosMod ($id_user,$id_system_modulos)
 {
    $CI =& get_instance();  
    #Listar permisos por modulo para los usuarios
    $sql_permisos_usuario_modulo="SELECT
    system_modulos_privilegios.status
    FROM system_modulos_privilegios
    INNER JOIN system_modulos ON system_modulos_privilegios.id_modulo = system_modulos.id_system_modulos
    INNER JOIN system_users ON system_modulos_privilegios.id_user = system_users.id_system_users
    WHERE 
    system_modulos_privilegios.id_user=$id_user AND
    system_modulos_privilegios.id_modulo=$id_system_modulos";
    $respuesta = $CI->db->query($sql_permisos_usuario_modulo);
   if ($respuesta->num_rows() == 1)
    {
     foreach ($respuesta->result() AS $row)
     {
        $estatusModulo= $row->status;
        return $estatusModulo;
     }
    }
  } 
?>   
    </section>
  </section>
</section>