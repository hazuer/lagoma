<?php 
extract(get_object_vars($results[0]));
?>
<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <?php
      echo $breadcrumb;
      
        foreach($desc_mod_submod  as $rows): 
        ?>            
        <div class="m-b-md">            
             <h3 class="text-dark"><?php echo $rows->modulo ?><br></h3>
             <h5><?php echo $rows->submodulo ?></h5>
        </div>
        <?php 
        endforeach 
        ?>

      <div class="col-sm-12">
        <a href="<?php echo base_url();?>inicio" class="btn btn-s-md btn-danger"><i class="fa fa-chevron-left"></i> Regresar</a>
      </div>

      <div class="col-sm-12">
        <?php echo $msj; ?>
      </div>

      <div class="col-md-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Actualizar datos</header>
          <div class="panel-body">
            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaCambiarPass'); ?>
            <?php echo form_open('inicio/cambiarPasswordAction', $attributes) ?>
            <?php
            $atribInput = [
            "type"  => "hidden",
            "id"    => "id_system_users",
            "name"  => "id_system_users",
            "value" => $id_system_users];
            $this->crearelemento->Input($atribInput);
            ?>
            <div class="form-group">
              <label class="col-lg-2 control-label">Usuario:</label>
              <div class="col-lg-10">
                <?php 
                $atribInput = [
                "type"      => "text",
                "id"        => "usuario",
                "name"      => "usuario",
                "class"     => "form-control",
                "autofocus" => ""];
                $this->crearelemento->Input($atribInput);
                ?>
                <?php echo form_error('usuario'); ?>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Constraseña:</label>
              <div class="col-lg-10">
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
          
            <div class="form-group">
              <div class="col-lg-offset-5 col-lg-2">
                <?php
                $atribButton = [
                "type"  => "submit",
                "id"    => "cambiar",
                "name"  => "cambiar",
                "value" => "cambiar",
                "class" => "btn btn-primary btn-lg btn-block"];
                $this->crearelemento->Button($atribButton,"Cambiar","fa fa-check"); 
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

<script src="<?php echo base_url(); ?>assets/js/formvalidator/formValidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/framework/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/validate_wizard.js"></script>