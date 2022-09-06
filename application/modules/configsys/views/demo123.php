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
<div class="modal" id="ajaxModal" aria-hidden="true" style="display: none;"></div>
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button> 
            <h4 class="modal-title"><?php echo $titleForm;?></h4>
         </div>
         <div class="modal-body">
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
         <div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> <a href="#" class="btn btn-primary">Save</a> </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
