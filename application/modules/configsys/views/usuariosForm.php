 <?php
  if ($idParameter==0)
    {
      $id_system_users ="";
      $id_persona      ="";
      $usuario         ="";
      $status          ="";
      $titleForm       ="Agregar usuario";
      $titleButton     ="Agregar";
      $action          ="new";
      $editarCampo     =True;
      $status          ="selecciona";
    }
    else
    {
      extract(get_object_vars($results[0]));
      $titleForm   ="Datos del usuario";
      $titleButton ="Actualizar";
      $action      ="edit";
      $editarCampo =False;
    }
?>
<!-- /.aside --> 
<section id="content">
  <section class="vbox">
     <section class="scrollable padder">
        
      <?php
      echo $breadcrumb;
      ?>

       <div class="m-b-md">
         <h3 class="m-b-none">Datos del usuario</h3>
      </div>

        <div class="col-sm-12">
          <a href="<?php echo base_url();?>configsys/usuariosLs" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
        </div>

        <div class="col-md-12">
          <section class="panel panel-default">
            <header class="panel-heading font-bold"><?php echo $titleForm;?></header>
            <div class="panel-body">
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaUsuarios'); ?>
            <?php echo form_open('configsys/usuariosAction', $attributes) ?>
              <?php
              $atribInput = [
              "type"  => "hidden",
              "id"    => "id_system_users",
              "name"  => "id_system_users",
              "value" => $id_system_users]; 
              $this->crearelemento->Input($atribInput);
              ?>

              <?php 
              $atribInput = [
              "type"  => "hidden",
              "id"    => "action",
              "name"  => "action",
              "value" => $action];
              $this->crearelemento->Input($atribInput);
              ?>

              <?php 
              if($editarCampo)
              {
              ?>
              <div class="form-group">
                <label class="col-md-2 control-label">Nombre:</label>
                  <div class="col-md-10">
                   <?php 
                    $atribSelect = [
                    "id"    => "id_persona",
                    "name"  => "id_persona",
                    "class" => "form-control"];
                    $sqlSelect="SELECT id_persona, CONCAT_WS(' ',ap_paterno,ap_materno, nombre) AS nombrecompleto FROM persona ORDER BY ap_paterno,ap_paterno,nombre ASC";
                    $this->crearelemento->Select($atribSelect,$id_persona,$sqlSelect);
                    ?>
                    <?php echo form_error('id_persona'); ?>
                  </div>
              </div>
              <?php 
              }
              ?>

            <div class="form-group">
              <label class="col-md-2 control-label">Usuario:</label>
              <div class="col-md-10">
                <?php 
                $atribInput = [
                "type"      => "text",
                "id"        => "usuario",
                "name"      => "usuario",
                "value"     => $usuario,
                "class"     => "form-control",
                "autofocus" => ""]; 
                $this->crearelemento->Input($atribInput);
                ?>
                <?php echo form_error('usuario'); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-md-2 control-label">Constraseña:</label>
              <div class="col-md-10">
                <?php 
                $atribInput = [
                "type"  => "text",
                "id"    => "password",
                "name"  => "password",
                "class" => "form-control"];
                $this->crearelemento->Input($atribInput);?>
                 <?php echo form_error('password'); ?>
              </div>
            </div>
            <?php 
            if(!$editarCampo)
            {
            ?>
            <div class="form-group">
              <label class="col-md-2 control-label">Status:</label>
              <div class="col-lg-3">
                 <select name="status" id="status" class="form-control">
                 <option value="1" <?php if($status==1){echo"selected";}?>>Activo</option>
                 <option value="0" <?php if($status==0){echo"selected";}?>>Inactivo</option>
                 </select>
                 <?php echo form_error('status'); ?>
              </div>
            </div>
            <?php 
            }
            ?>
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-2">
                <?php 
                $atribButton = [
                "type"  => "submit",
                "id"    => "guardar",
                "name"  => "guardar",
                "value" => "guardar",
                "class" => "btn btn-primary btn-lg btn-block"];
                $this->crearelemento->Button($atribButton,$titleButton,"fa fa-save"); ?>
              </div>
            </div>

          </form>
          </div>
        </section>
      </div>
      
     </section>
  </section>
</section>

<script src="<?php echo base_url(); ?>assets/js/formvalidator/formValidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/framework/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validate_wizard.js"></script>