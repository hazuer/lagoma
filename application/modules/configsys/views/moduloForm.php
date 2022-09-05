 <?php 
    if($idParameter==0)
    {
       $id_system_modulos =$idParameter;
       $modulo            ="Agregar nuevo modulo";
       $desc_modulo       ="";
       $titleForm         ="Agregar modulo";
       $action            ="new";
       $titleBtn          ="Agregar";
       $urlControlador    ="";
       $icono             ="fa fa- icon";
       }else
       {
       extract(get_object_vars($results[0]));
       $titleForm ="Editar modulo";
       $action    ="edit";
       $titleBtn  ="Actualizar";
    }
?>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/formvalidator/formValidation.css" type="text/css" />
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

      <div class="col-md-12">
        <a href="<?php echo base_url();?>configsys/modulosLs" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
      </div>

      <div class="col-md-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold"><?php echo $titleForm;?></header>
          <div class="panel-body">
  		    <?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaModulo'); ?>
          <?php echo form_open('configsys/moduloAction', $attributes) ?>
             <?php 
              $atribInput = [
              "type"  => "hidden",
              "id"    => "id_system_modulos",
              "name"  => "id_system_modulos",
              "value" => $id_system_modulos];
              $this->crearelemento->Input($atribInput);

              $atribInput = [
              "type"  => "hidden",
              "id"    => "action",
              "name"  => "action",
              "value" => $action];
              $this->crearelemento->Input($atribInput);
              ?>

            <div class="form-group">
              <label class="col-md-2 control-label">Modulo:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "modulo",
                "name"      => "modulo",
                "value"     => $modulo,
                "class"     => "form-control",
                "autofocus" => ""]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('modulo'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Desc. modulo:</label>
              <div class="col-md-10">
                <?php
                $atribTextarea = [
                "id"    => "desc_modulo",
                "name"  => "desc_modulo",
                "class" => "form-control",
                "rows"  => 3];  
                $this->crearelemento->Textarea($atribTextarea,$desc_modulo);?>
                <?php echo form_error('desc_modulo'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">url/controlador:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "urlControlador",
                "name"      => "urlControlador",
                "value"     => $urlControlador,
                "class"     => "form-control"]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('urlControlador'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Icono:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "icono",
                "name"      => "icono",
                "value"     => $icono,
                "class"     => "form-control"]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('icono'); ?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label">Class color:</label>
              <div class="col-md-10">
                <select name="classColor" class="form-control">
                  <option value="bg-danger">bg-danger</option>
                  <option value="bg-warning">bg-warning</option>
                  <option value="bg-success">bg-success</option>
                  <option value="bg-primary">bg-primary</option>
                  <option value="primary dker">primary dker</option>
                  <option value="bg-info">bg-info</option>
                </select>
              </div>
            </div>
 
            <div class="form-group">
              <p align="center">
                  <?php
                  $atribButton = [
                  "type" => "submit",
                  "id" => "guardar",
                  "name" => "guardar",
                  "value" => "guardar",
                  "class" => "btn btn-primary"];
                  $this->crearelemento->Button($atribButton, $titleBtn, "fa fa-save");
                  ?>
              </p>
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