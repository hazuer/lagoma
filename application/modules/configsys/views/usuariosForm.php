<?php
	if ($idParameter==0) {
		$id_system_users = "";
		$id_persona      = "";
		$usuario         = "";
		$status          = "";
		$titleForm       = "Agregar usuario";
		$titleButton     = "Agregar";
		$action          = "new";
		$editarCampo     = True;
		$status          = "selecciona";
		$titleBtn        = "Agregar";
	}
	else {
		extract(get_object_vars($results[0]));
		$titleForm   = "Datos del usuario";
		$titleButton = "Actualizar";
		$action      = "edit";
		$editarCampo = False;
		$titleBtn    = "Actualizar";
	}
?>
<div class="modal" id="ajaxModal" aria-hidden="true" style="display: none;"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button> 
				<h4 class="modal-title"><?php echo $titleForm;?></h4>
			</div>
			<form class="form-horizontal" id="validaUsuarios" onsubmit="return false">
				<div class="modal-body">

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
					<div class="form-group">
						<label class="col-md-4 control-label">*Nombre:</label>
						<div class="col-md-8">
							<?php
							$atribInput = [
							"type"      => "text",
							"id"        => "nombre",
							"name"      => "nombre",
							"value"     => $nombre,
							"class"     => "form-control",
							"autofocus" => ""];
							$this->crearelemento->Input($atribInput);
							?>
							<?php echo form_error('nombre'); ?>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Ap. Paterno:</label>
						<div class="col-md-8">
							<?php
							$atribInput = [
							"type"      => "text",
							"id"        => "ap_paterno",
							"name"      => "ap_paterno",
							"value"     => $ap_paterno,
							"class"     => "form-control",
							"autofocus" => ""];
							$this->crearelemento->Input($atribInput);
							?>
							<?php echo form_error('ap_paterno'); ?>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Ap. Materno:</label>
						<div class="col-md-8">
							<?php
							$atribInput = [
							"type"      => "text",
							"id"        => "ap_materno",
							"name"      => "ap_materno",
							"value"     => $ap_materno,
							"class"     => "form-control",
							"autofocus" => ""];
							$this->crearelemento->Input($atribInput);
							?>
							<?php echo form_error('ap_materno'); ?>
							</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">*CURP:</label>
						<div class="col-md-8">
							<?php
							$atribInput = [
							"type"      => "text",
							"id"        => "curp",
							"name"      => "curp",
							"value"     => $curp,
							"class"     => "form-control",
							"autofocus" => ""];
							$this->crearelemento->Input($atribInput);
							?>
							<?php echo form_error('curp'); ?>
							</div>
					</div>

					<div class="form-group">
						<label class="col-md-4 control-label">*Usuario:</label>
						<div class="col-md-8">
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
						<label class="col-md-4 control-label">*Constraseña:</label>
						<div class="col-md-8">
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
				if(!$editarCampo) {
				?>
					<div class="form-group">
						<label class="col-md-4 control-label">Status:</label>
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
<script src="<?php echo base_url(); ?>assets/js/modules/configsys/usuariosForm.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>