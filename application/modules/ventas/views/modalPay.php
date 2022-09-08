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
			<form class="form-horizontal" id="validaUsuarios" onsubmit="return false">
				<div class="modal-body">
				<div class="row">
				<div class="col-sm-1"></div>
					<div class="col-sm-10">
					<div class="form-group">
						<div class="col-sm-4">
							<label>Total:</label>
							<input type="text" class="form-control parsley-validated" readonly data-required="true" value="$30.00">
						</div>
						<div class="col-sm-4">
							<label>Efectivo:</label>
							<input type="text" class="form-control parsley-validated" data-required="true">
						</div>
						<div class="col-sm-4">
							<label>Cambio:</label>
							<input type="text" class="form-control parsley-validated" readonly data-required="true" value="$10.00">
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
							"onclick" => "sendData()",
						];
						$this->crearelemento->Button($atribButton, $titleBtn, "fa fa-usd");
					?>
					<a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</a>
				</div>
			</form>
		</div>
	</div>
</div>
