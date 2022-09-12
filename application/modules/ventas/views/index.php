<!-- /.aside -->
<style>
	.form-controlv {
    display: block;
    width: 100%;
    font-size: 12px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
    border-radius: 4px;
    -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%);
    -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
}
table {
    border-spacing: 0;
    border-collapse: collapse;
	font-size:11px;
}
</style>

<section id="content">
	<section class="vbox">
		<section class="scrollable padder">

		<br>
		<div class="row">
			<div class="col-sm-10">
				<section class="panel panel-default">
					<header class="panel-heading font-bold" style="text-align:center;">
						Venta:00061 - Fechay hora:<?php echo date("Y/m/d H:i:s"); ?> - Atiende: <?php echo $this->session->userdata('usuario'); ?>
					</header>
					<div class="panel-body">
						<div class="col-sm-1">
							<label>Cantidad</label>
							<input id="cantidad" name="cantidad" type="text" class="form-controlv" value="1">
						</div>
						<div class="col-sm-3">
							<label>Codigo</label>
							<input id="codigo" name="codigo" type="text" class="form-controlv" autofocus>
							<ul class="dropdown-menu txtCodigo" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownCodigo"></ul>
						</div>
						<div class="col-sm-5">
							<label>Descripcion</label>
							<input id="descipcion" name="descipcion" type="text" class="form-controlv">
							<ul class="dropdown-menu txtDescripcion" style="margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu"  id="DropdownDescripcion"></ul>
						</div>
						<div class="col-sm-1">
							<label>Precio U.</label>
							<label id="lpreciou">$6.0</label>
							<input id="pu" name="pu" type="text" class="form-controlv">
						</div>
						<div class="col-sm-1">
							<label>Importe</label>
							<label id="limporte">$12.0</label>
							<input id="importe" name="importe" type="text" class="form-controlv">
						</div>
						<div class="col-sm-1">
							<label>Agregar</label>
							<button id="addProduct" name="addProduct" class="btn btn-success btn-xs" title="Agregar">
								<i class="fa fa-plus"></i>
							</button>
						</div>
					</div>
				</section>
			</div>

			<div class="col-sm-2">
				<section class="panel panel-default">
					<header class="panel-heading font-bold" style="text-align:center;">
						Cobro
					</header>
					<div class="panel-body">
						<div class="col-sm-9" style="text-align: right;">
							<label><b>TOTAL</b></label>
							<a class="btn btn-primary btn-xs" href="ventas/modal_pay" data-toggle="ajaxModal"> <i class="fa fa-usd"></i> <span id="totalg">0.00</span></a>
						</div>
					</div>
				</section>
			</div>
		</div><!--/row-->

		<table id="tbl-product" class="table table-striped table-bordered nowrap table-hover" cellspacing="0" style="width:100%">
		<thead><th>a</th>
		<th>b</th>
		<th>b</th>
		<th>b</th>
		<th>d</th><th>opc</th>
		</thead>
		</table>

    </section>
  </section>
</section>


