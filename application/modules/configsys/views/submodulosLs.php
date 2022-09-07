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
				<?php $this->crearelemento->LoadModal("submoduloForm/",url_encode(0),"btn btn-info","Agregar submodulo","fa fa-plus");?>
			</div>

			<div class="col-md-12">
				<section class="panel panel-default">
					<header class="panel-heading font-bold">Listado de submodulos</header>
					<div class="table-responsive">
						<table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
							<thead>
								<tr>
									<th>id_system_submodulo</th>
									<th>Modulo</th>
									<th>Submodulo</th>
									<th aling="center"> </th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($results as $result) {
									echo"<tr>
										<td style='text-align:center;'>".$result->id_system_submodulo."</td>
										<td>".$result->modulo."</td>
										<td>".$result->submodulo."</td>
										<td align='center'>";
										$this->crearelemento->LoadModal("submoduloForm/",url_encode($result->id_system_submodulo),"btn btn-primary btn-xs","Editar","fa fa-edit");
										echo"</td>
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