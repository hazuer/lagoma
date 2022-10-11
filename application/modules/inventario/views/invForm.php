<?php
  if($idParameter==0) {
    $idInventario = $idParameter;
	$cantidad='';
	$articulo='';
	$precioNeto='';
	$puCompra='';
	$codigo_barras='';
	$stock_min='1';
	$estatus='1';
    $submodulo           = "Agregar producto";
    $id_modulo           = "";
    $titleForm           = "Agregar producto";
    $action              = "new";
    $titleBtn            = "Agregar";
  }else {
	extract(get_object_vars($results[0]));
     $titleForm = "Editar producto";
     $action    = "edit";
     $titleBtn  = "Actualizar";
  }
?>
<div class="modal-dialog modal-lg">
	<div class="modal-content">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button> 
		<h4 class="modal-title"><?php echo $titleForm;?></h4>
		</div>
		<form class="form-horizontal" id="idInventarioForm" onsubmit="return false">
		<div class="modal-body">

			<?php
			$atribInput = [
			"type"  => "text",
			"id"    => "idInventario",
			"name"  => "idInventario",
			"value" => $idInventario];
			$this->crearelemento->Input($atribInput);
			$atribInput = [
			"type"  => "text",
			"id"    => "action",
			"name"  => "action",
			"value" => $action];
			$this->crearelemento->Input($atribInput);
			?>

			<div class="form-group">
				<label class="col-md-2 control-label">*Codigo de Barras:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "codigo_barras",
					"name"      => "codigo_barras",
					"value"     => $codigo_barras,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('codigo_barras'); ?>
				</div>
				<label class="col-md-2 control-label">*Cantidad:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "cantidad",
					"name"      => "cantidad",
					"value"     => $cantidad,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('cantidad'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">*Articulo:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "articulo",
					"name"      => "articulo",
					"value"     => $articulo,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('articulo'); ?>
				</div>
				<label class="col-md-2 control-label">*Precio Neto:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "precioNeto",
					"name"      => "precioNeto",
					"value"     => $precioNeto,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('precioNeto'); ?>
				</div>
			</div>

			<div class="form-group">
				<label class="col-md-2 control-label">Precio Compra:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "puCompra",
					"name"      => "puCompra",
					"value"     => $puCompra,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('puCompra'); ?>
				</div>
				<label class="col-md-2 control-label">Stock Minimo:</label>
				<div class="col-md-4">
					<?php
					$atribInput = [
					"type"      => "text",
					"id"        => "stock_min",
					"name"      => "stock_min",
					"value"     => $stock_min,
					"class"     => "form-control"];
					$this->crearelemento->Input($atribInput);
					?>
					<?php echo form_error('stock_min'); ?>
				</div>
			</div>

			<div class="form-group">
						<label class="col-md-2 control-label">Estatus:</label>
						<div class="col-lg-4">
							<select name="estatus" id="estatus" class="form-control">
								<option value="1" <?php if($estatus==1){echo"selected";}?>>Activo</option>
								<option value="0" <?php if($estatus==0){echo"selected";}?>>Inactivo</option>
							</select>
							<?php echo form_error('estatus'); ?>
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

<script src="<?php echo base_url(); ?>assets/js/jquery-3.6.1.js"></script>
<script src="<?php echo base_url(); ?>assets/js/modules/inventario/inventarioForm.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation.js"></script>
<script src="<?php echo base_url(); ?>assets/js/formvalidator/formvalidation-bootstrap.min.js"></script>