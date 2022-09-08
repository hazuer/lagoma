<!-- /.aside -->
<style>
	.form-controlv {
    display: block;
    width: 100%;
    /* height: 34px; */
    /* padding: 6px 12px; */
    font-size: 14px;
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
</style>

<section id="content">
	<section class="vbox">
		<section class="scrollable padder">

	<br>
		<div class="row"> <div class="col-sm-10"> <section class="panel panel-default"> <header class="panel-heading font-bold">Venta:00061 - Fechay hora:<?php echo date("Y/m/d H:i:s"); ?> - Atiende: <?php echo $this->session->userdata('usuario'); ?></header> <div class="panel-body"> 

		<div class="col-sm-1"> <label>Cantidad</label> <input type="text" class="form-controlv parsley-validated" placeholder="" data-required="true"> </div>
		<div class="col-sm-3"> <label>SKU</label> <input type="text" class="form-controlv parsley-validated" placeholder="Name" data-required="true"> </div>
		<div class="col-sm-5"> <label>Descripcion</label> <input type="text" class="form-controlv parsley-validated" placeholder="Name" data-required="true"> </div>
		<div class="col-sm-1"> <label>P.U.</label> <label>$6.0</label> </div>
		<div class="col-sm-1"> <label>Importe</label> <label>$12.0</label> </div>
		<div class="col-sm-1"> <label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> <button id="clone" name="clone" class="btn btn-success btn-xs" title="Clone selected products">
									<i class="fa fa-plus"></i>
									</button> </div>
		</div> </section> </div> 
		
		<div class="col-sm-2"> <section class="panel panel-default"> <header class="panel-heading font-bold">Cobro</header> <div class="panel-body" style="text-align:center;">
		<div class="col-sm-12"> <label><b>Total a cobrar</b></label></div>
			<div class="col-sm-12">
				<button type="button" class="btn btn-primary btn-sm" title="Add product">
				<i class="fa fa-usd"></i> 50.10
				</button>
			</div>
	
			
		</div> </section> </div> </div>



		<table id="tbl-product" class="table table-striped table-bordered nowrap table-hover" cellspacing="0" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>Cantidad</th>
								<th>SKU</th>
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