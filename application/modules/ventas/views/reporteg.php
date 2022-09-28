<!-- /.aside --> 
<section id="content">
	<section class="vbox">
		<section class="scrollable padder">
			<?php
				echo $breadcrumb;
				foreach($desc_mod_submod  as $rows):
				?>
					<div class="m-b-md">
					<h3 class="text-dark"><?php echo $rows->modulo ?><br></h3>
					<h5><?php echo $rows->submodulo ?></h5>
					</div>
				<?php
				endforeach
			?>
			<div class="col-md-12">
				<section class="panel panel-default">
					<header class="panel-heading font-bold">Todas las ventas de forma general</header>
					<div class="table-responsive">
						<table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
							<thead>
								<tr>
								<th>#Venta</th>
								<th>Fecha Venta</th>
								<th>Usuario</th>
								<th>Total</th>
								<th>Pago en Efectivo</th>
								<th>Cambio</th>
								<th># Articulos</th>
								<th>Pago Pendiente</th>
								<th>Nota</th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($results as $result) {
									echo "<tr>
										<td>".$result->idVenta."</td>
										<td>".$result->fechaVenta."</td>
										<td>".$result->usuario."</td>
										<td>".$result->total."</td>
										<td>".$result->efectivo."</td>
										<td>".$result->cambio."</td>
										<td>".$result->numArticulos."</td>
										<td>".$result->pagoP."</td>
										<td>".$result->nota."</td>
									</tr>";
								}
								?>
							</tbody>
						</table>
					</div>
				</section>
			</div>
		</section>
	</section>
</section>

