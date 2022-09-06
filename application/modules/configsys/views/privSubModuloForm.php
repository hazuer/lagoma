<!-- /.aside --> 
<section id="content">
  <section class="vbox">
     <section class="scrollable padder">
        <?php
        echo $breadcrumb;
       ?>

      <div class="m-b-md">
         <h3 class="m-b-none"><?php echo $submodulo;?></h3>
      </div>

      <div class="col-sm-12">
        <a href="<?php echo base_url();?>configsys/privSubModuloLs" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
      </div>

      <div class="col-md-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Privilegios <?php echo $submodulo;?></header> 
          <?php $attributes = array('class' => 'form-horizontal', 'id' => 'myform'); ?> 
          <?php echo form_open('configsys/privSubModuloAction',$attributes) ?>         
            <div class="table-responsive">
              <?php 
              $atribInput = [
              "type"  => "hidden",
              "id"    => "id_system_submodulo",
              "name"  => "id_system_submodulo",
              "value" => $id_system_submodulo]; 
              $this->crearelemento->Input($atribInput);
              $atribInput = [
              "type"  => "hidden",
              "id"    => "submodulo",
              "name"  => "submodulo",
              "value" => $submodulo]; 
              $this->crearelemento->Input($atribInput);
              ?>
              <table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
                <thead>
                  <tr>
                    <th>id_system_users</th>
                    <th>Usuario</th>
                    <th>Permitido</th>
                    <th>Bloqueado</th>
                    <th>Solo consulta</th>
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
                      $acceso= getLsPrivilegiosSubMod ($result->id_system_users,$id_system_submodulo);
                      switch ($acceso) 
                        {
                          case 1:
                          $Permitido    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1' checked>";
                          $Bloqueado    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2'>";
                          $soloConsulta ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='3'>";
                          $Sin_agregar  ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0'>";
                          break;
                          case 2:
                          $Permitido    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1'>";
                          $Bloqueado    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2' checked>";
                          $soloConsulta ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='3'>";
                          $Sin_agregar  ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0'>";
                          break;
                          
                          case 3:
                          $Permitido    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1'>";
                          $Bloqueado    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2'>";
                          $soloConsulta ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='3' checked>";
                          $Sin_agregar  ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0'>";
                          break;
                          
                          default:
                          $Permitido    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='1'>";
                          $Bloqueado    ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='2'>";
                          $soloConsulta ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='3'>";
                          $Sin_agregar  ="<input type='radio' class='radio' name='id_user_array[$result->id_system_users]' value='0' checked>";
                          break;
                        }
                       
                         echo"<td align='center'>$Permitido</td>
                        <td align='center'>$Bloqueado</td>
                        <td align='center'>$soloConsulta</td>
                        <td align='center'>$Sin_agregar</td>";
                        }
                  ?>
                </tbody>
              </table>
            </div>
            
            <br>
            <div class="col-lg-offset-5 col-lg-2">
              <?php 
               $atribButton = [
              "type"  => "submit",
              "id"    => "cambiar",
              "name"  => "cambiar",
              "value" => "cambiar",
              "class" => "btn btn-primary btn-lg btn-block"];
              $this->crearelemento->Button($atribButton,"Guardar","fa fa-save"); 
              ?>
            </div>
          </form>
        </section>
      </div>

<?php
function getLsPrivilegiosSubMod ($id_user,$id_system_submodulo)
 {
    $CI =& get_instance();  
    #Listar permisos por modulo para los usuarios
    $sql_visualizar_modulo="SELECT
    system_modulos.id_system_modulos,
    system_submodulo.id_system_submodulo,
    system_submodulo_privilegios.status
    FROM system_submodulo
    INNER JOIN system_modulos ON system_submodulo.id_modulo = system_modulos.id_system_modulos
    INNER JOIN system_submodulo_privilegios ON system_submodulo.id_system_submodulo = system_submodulo_privilegios.id_submodulo
    INNER JOIN system_users ON system_submodulo_privilegios.id_user = system_users.id_system_users
    WHERE
    system_submodulo_privilegios.id_user=$id_user AND
    system_submodulo_privilegios.id_submodulo=$id_system_submodulo";
    $respuesta = $CI->db->query($sql_visualizar_modulo);
    if ($respuesta->num_rows() == 1)
     {
       foreach ($respuesta->result() AS $row)
       {
          $estatusSubModulo= $row->status;
          return $estatusSubModulo;
       }
      }
  } 
?>   
    </section>
  </section>
</section>