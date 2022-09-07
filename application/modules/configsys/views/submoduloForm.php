 <?php 
  if($idParameter==0) {
    $id_system_submodulo = $idParameter;
    $submodulo           = "Agregar submodulo";
    $id_modulo           = "";
    $titleForm           = "Agregar submodulo";
    $action              = "new";
    $titleBtn            = "Agregar";
  }else {
     extract(get_object_vars($results[0]));
     $titleForm = "Editar submodulo";
     $action    = "edit";
     $titleBtn  = "Actualizar";
  }
?>
<div class="modal" id="ajaxModal" aria-hidden="true" style="display: none;"></div>
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button> 
            <h4 class="modal-title"><?php echo $titleForm;?></h4>
         </div>
		 <form class="form-horizontal" id="validaSubmodulo" onsubmit="return false">
			<div class="modal-body">

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
					<label class="col-md-2 control-label">*Modulo:</label>
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
					<label class="col-md-2 control-label">*Submodulo:</label>
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
			</div>

			<div class="modal-footer">
				<?php
					$atribButton = [
						"type"    => "submit",
						"id"      => "guardar",
						"name"    => "guardar",
						"value"   => "guardar",
						"class"   => "btn btn-primary",
						"onclick" => "sendData()",
					];
					$this->crearelemento->Button($atribButton, $titleBtn, "fa fa-save");
				?>
				<a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</a>
			</div>
		</form>

      </div>
   </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.6.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modules/configsys/submoduloForm.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>