<?php 
	if($idParameter==0) {
		$id_system_modulos = $idParameter;
		$modulo            = "Agregar nuevo modulo";
		$desc_modulo       = "";
		$titleForm         = "Agregar modulo";
		$action            = "new";
		$titleBtn          = "Agregar";
		$urlControlador    = "";
		$icono             = "fa fa- icon";
	}else {
	extract(get_object_vars($results[0]));
		$titleForm = "Editar modulo";
		$action    = "edit";
		$titleBtn  = "Actualizar";
	}
?>
<div class="modal" id="addModule" aria-hidden="true" style="display: none;"></div>
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" title="Cerrar">×</button> 
            <h4 class="modal-title"><?php echo $titleForm;?></h4>
         </div>
		 <form class="form-horizontal" id="validaModulo" onsubmit="return false">
			<div class="modal-body">
				<?php
				$atribInput = [
					"type"  => "hidden",
					"id"    => "id_system_modulos",
					"name"  => "id_system_modulos",
					"value" => $id_system_modulos
				];
				$this->crearelemento->Input($atribInput);

				$atribInput = [
					"type"  => "hidden",
					"id"    => "action",
					"name"  => "action",
					"value" => $action
				];
				$this->crearelemento->Input($atribInput);
				?>
				<div class="form-group">
					<label class="col-md-2 control-label">*Modulo:</label>
					<div class="col-md-10">
						<?php
						$atribInput = [
							"type"        => "text",
							"id"          => "modulo",
							"name"        => "modulo",
							"value"       => $modulo,
							"placeholder" => $modulo,
							"class"       => "form-control"
						];
						$this->crearelemento->Input($atribInput);?>
						<?php echo form_error('modulo'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">*Desc. modulo:</label>
					<div class="col-md-10">
						<?php
						$atribTextarea = [
							"id"    => "desc_modulo",
							"name"  => "desc_modulo",
							"class" => "form-control",
							"rows"  => 3
						];
						$this->crearelemento->Textarea($atribTextarea,$desc_modulo);?>
						<?php echo form_error('desc_modulo'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">*url/controlador:</label>
					<div class="col-md-10">
						<?php
						$atribInput = [
							"type"      => "text",
							"id"        => "urlControlador",
							"name"      => "urlControlador",
							"value"     => $urlControlador,
							"class"     => "form-control"
						];
						$this->crearelemento->Input($atribInput);?>
						<?php echo form_error('urlControlador'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">*Icono:</label>
					<div class="col-md-10">
						<?php
						$atribInput = [
							"type"      => "text",
							"id"        => "icono",
							"name"      => "icono",
							"value"     => $icono,
							"class"     => "form-control"
						];
						$this->crearelemento->Input($atribInput);?>
						<?php echo form_error('icono'); ?>
					</div>
				</div>

				<div class="form-group">
					<label class="col-md-2 control-label">Class color:</label>
					<div class="col-md-10">
					<select id="classColor" name="classColor" class="form-control">
						<option value="bg-danger">bg-danger</option>
						<option value="bg-warning">bg-warning</option>
						<option value="bg-success">bg-success</option>
						<option value="bg-primary">bg-primary</option>
						<option value="primary dker">primary dker</option>
						<option value="bg-info">bg-info</option>
					</select>
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
<script src="<?php echo base_url(); ?>assets/js/modules/configsys/moduloForm.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>