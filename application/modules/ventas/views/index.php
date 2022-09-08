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
							<input type="text" class="form-controlv parsley-validated" data-required="true">
						</div>
						<div class="col-sm-3">
							<label>Codigo</label>
							<input type="text" class="form-controlv parsley-validated" data-required="true">
						</div>
						<div class="col-sm-5">
							<label>Descripcion</label>
							<input type="text" class="form-controlv parsley-validated" data-required="true">
						</div>
						<div class="col-sm-1">
							<label>Precio U.</label>
							<label>$6.0</label>
						</div>
						<div class="col-sm-1">
							<label>Importe</label>
							<label>$12.0</label>
						</div>
						<div class="col-sm-1">
							<label>Agregar</label>
							<button id="clone" name="clone" class="btn btn-success btn-xs" title="Agregar">
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
							<a class="btn btn-primary btn-xs" href="ventas/modal_pay" data-toggle="ajaxModal"> <i class="fa fa-usd"></i> 0.00</a>
						</div>
					</div>
				</section>
			</div>
		</div><!--/row-->

		<table id="tbl-product" class="table table-striped table-bordered nowrap table-hover" cellspacing="0" style="width:100%">
			<thead>
				<tr>
					<th>#</th>
					<th>Cantidad</th>
					<th>Codigo</th>
					<th>Descripcion</th>
					<th>P.U.</th>
					<th>Importe</th>
					<th style="text-align: center; width:10%;">
						<button id="clone" name="clone" class="btn btn-warning btn-xs" title="Clone selected products">
							<i class="fa fa-eraser"></i>
						</button>
						<button id="delete" name="delete" type="button" class="btn btn-danger btn-xs" title="Delete selected products">
							<i class="fa fa-trash-o"></i>
						</button>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td>Lapiz</td>
					<td>$0.00</td>
					<td>$0.00</td>
					<td></td>
				</tr>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td>Goma</td>
					<td>$0.00</td>
					<td>$0.00</td>
					<td></td>
				</tr>
				<tr>
					<td>1</td>
					<td>1</td>
					<td>1</td>
					<td>Torta de jamon</td>
					<td>$0.00</td>
					<td>$0.00</td>
					<td></td>
				</tr>
			</tbody>
		</table>

    </section>
  </section>
</section>