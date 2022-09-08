<?php
$titleBtn = "Cobrar";
?>
<div class="modal" id="ajaxModal" aria-hidden="true" style="display: none;"></div>
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button> 
				<h4 class="modal-title">Pago en Efectivo</h4>
			</div>
			<form class="form-horizontal" id="validaPago" onsubmit="return false">
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-1"></div>
					<div class="col-sm-10">
					<div class="form-group">
						<div class="col-sm-4">
							<label>Total:</label>
							<?php
							$atribInput = [
							"type"  => "text",
							"id"    => "password",
							"name"  => "password",
							"disabled"  => "disabled",
							"class" => "form-control"];
							$this->crearelemento->Input($atribInput);?>
						</div>
						<div class="col-sm-4">
							<label>*Efectivo:</label>
							<?php
							$atribInput = [
							"type"  => "text",
							"id"    => "efectivo",
							"name"  => "efectivo",
							"class" => "form-control"];
							$this->crearelemento->Input($atribInput);?>
						</div>
						<div class="col-sm-4">
							<label>Cambio:</label>
							<?php
							$atribInput = [
							"type"  => "text",
							"id"    => "password",
							"name"  => "password",
							"disabled"  => "disabled",
							"class" => "form-control"];
							$this->crearelemento->Input($atribInput);?>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-2 control-label">Nota:</label>
						<div class="col-md-10">
						<?php
							$atribTextarea = [
								"id"    => "desc_modulo",
								"name"  => "desc_modulo",
								"class" => "form-control",
								"rows"  => 2
							];
							$this->crearelemento->Textarea($atribTextarea,$desc_modulo);
							?>
						</div>
					</div>
				</div>
				<div class="col-sm-1"></div>
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
							"onclick" => "pay()",
						];
						$this->crearelemento->Button($atribButton, $titleBtn, "fa fa-usd");
					?>
					<a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</a>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/jquery-3.6.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modules/ventas/ventasModal.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>