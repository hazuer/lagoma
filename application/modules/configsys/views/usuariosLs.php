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
				<?php $this->crearelemento->LoadModal("usuariosForm/",url_encode(0),"btn btn-info","Agregar usuario","fa fa-plus");?>
			</div>

			<div class="col-sm-12">
				<section class="panel panel-default">
					<header class="panel-heading font-bold">Listado de usuarios</header>  

					<div class="table-responsive">
						<table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
							<thead>
								<tr>
									<th>id_system_users</th>
									<th>Nombre completo</th>
									<th>Usuario</th>
									<th>Status</th>
									<th aling="center"> </th>
								</tr>
							</thead>
							<tbody>
								<?php
								foreach($results AS $result) {
								echo"<tr>
									<td style='text-align:center;'>".$result->id_system_users."</td>
									<td>".$result->nombrecompleto."</td>
									<td>".$result->usuario."</td>
									<td>".$result->status."</td>
									<td align='center'>";
									$this->crearelemento->LoadModal("usuariosForm/",url_encode($result->id_system_users),"btn btn-default btn-xs","Editar","fa fa-edit");
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

