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
			<div class="col-sm-12">
				<?php $this->crearelemento->Link("moduloForm/",url_encode(0),"btn btn-info","Agregar modulo","fa fa-plus");?>
			</div>
			<div class="col-md-12">
				<section class="panel panel-default">
					<header class="panel-heading font-bold">Listado de modulos</header>
					<div class="table-responsive">
						<table class="table table-striped table-bordered m-b-none" data-ride="datatables_1">
							<thead>
								<tr>
									<th>id_system_modulos</th>
									<th>Modulo</th>
									<th>Descripci&oacute;n</th>
									<th aling="center"> </th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach ($results as $result) {
									echo "<tr>"
									. "<td style='text-align:center;'>" . $result->id_system_modulos . "</td>
									<td><small>" . $result->modulo . "</small></td>
									<td><small>" . $result->desc_modulo . "</small></td>
									<td align='center'>";
									$this->crearelemento->Link("moduloForm/",url_encode($result->id_system_modulos),"btn btn-default btn-xs","Editar","fa fa-edit");
									echo"
									</td>
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