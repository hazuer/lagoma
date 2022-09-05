 <?php 
  if($idParameter==0)
  {
    $id_system_submodulo =$idParameter;
    $submodulo           ="Agregar submodulo";
    $id_modulo           ="";
    $titleForm           ="Agregar submodulo";
    $action              ="new";
    $titleBtn            ="Agregar";
  }else
  {
     extract(get_object_vars($results[0]));
     $titleForm ="Editar submodulo";
     $action    ="edit";
     $titleBtn  ="Actualizar";
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
         <h3 class="m-b-none"><?php echo $submodulo;?></h3>
    </div>

    <div class="col-sm-12">
      <a href="<?php echo base_url();?>configsys/submodulosLs" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
    </div>

    <div class="col-sm-12">
      <section class="panel panel-default">
        <header class="panel-heading font-bold"><?php echo $titleForm;?></header>
        <div class="panel-body">
          <?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaSubmodulo'); ?>
          <?php echo form_open('configsys/submoduloAction', $attributes) ?>
          <?php
          $atribInput = [
          "type"  => "hidden",
          "id"    => "id_system_submodulo",
          "name"  => "id_system_submodulo",
          "value" => $id_system_submodulo];
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
              $atribSelect = [
              "id"    => "id_modulo",
              "name"  => "id_modulo",
              "class" => "form-control"];

              $sqlSelect = "SELECT id_system_modulos,modulo FROM system_modulos ORDER BY modulo ASC";

              $this->crearelemento->Select($atribSelect,$id_modulo,$sqlSelect);
              ?>
              <?php echo form_error('id_modulo'); ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-2 control-label">Submodulo:</label>
            <div class="col-md-10">
              <?php 
              $atribTextarea = [
              "id"    => "submodulo",
              "name"  => "submodulo",
              "class" => "form-control",
              "rows"  => 3];  
              $this->crearelemento->Textarea($atribTextarea,$submodulo);?>
              <?php echo form_error('submodulo'); ?>
            </div>
          </div>
        
          <div class="form-group">
           <div class="col-lg-offset-5 col-lg-2">
              <?php 
               $atribButton = [
              "type"  => "submit",
              "id"    => "guardar",
              "name"  => "guardar",
              "value" => "guardar",
              "class" => "btn btn-primary btn-lg btn-block"];
              $this->crearelemento->Button($atribButton,$titleBtn,"fa fa-save"); 
              ?>
          </div>
        </div>
        </form>
        </div>
      </section>
    </div>
        
    </section>
  </section>
</section>

<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validate_wizard.js"></script>