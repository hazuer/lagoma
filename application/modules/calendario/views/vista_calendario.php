<section id="content" class="m-t-lg">


	<script src="<?php echo base_url();?>assets/js/eventos_calendario.js "></script>
	<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url();?>assets/js/messages_es.js "></script>
	
	<link href="<?php echo base_url();?>assets/css/estilos_calendario.css" type="text/css" rel="stylesheet" />
		
	<!--<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.min.js"></script>
	<script src ="<?php echo base_url(); ?>assets/js/datatables/demo.js" ></script>
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.css" type="text/css" />-->

	<script src ="<?php echo base_url(); ?>assets/js/prueba/jquery.dataTables.min.js" ></script>
	<script src ="<?php echo base_url(); ?>assets/js/prueba/dataTables.bootstrap.min.js" ></script>
	<!--<link href="<?php echo base_url();?>assets/js/prueba/dataTables.bootstrap.min.css" type="text/css" rel="stylesheet" />-->

  <section class="vbox">
     <section class="scrollable padder">
	<div class="calendario_ajax row">
		<div class="col-sm-4">
			<ul class="list-group alt">
				<li class="list-group-item">
					<div class="row">
						<div class="col-sm-6 m-t-xs m-b-xs">
							<button id="limpia" class="btn btn-default" value="Limpiar Calendario" onclick="limpia_calendario()"><i class="fa fa-calendar-o text"></i> <span class="text">Limpiar Horario</span></button><br>
						</div>
						<div class="col-sm-6 m-t-xs m-b-xs">
							<button class="btn btn-default pull-right" id="generar_horario" style="display: none"><i class="fa fa-calendar text"></i> <span class="text">Generar Horario</span></button>
							<button class="btn btn-default pull-right" id="editar_horario" style="display: inline"><i class="fa fa-calendar text"></i> <span class="text">Editar Horario</span></button>
						</div>
					</div>
				</li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-sm-6 m-t-xs m-b-xs">
							<h5>Horario:</h5>
						</div>
						<div class="col-sm-6 m-t-xs m-b-xs">
							<select id="cat_horario" class="btn btn-info btn-sm">
								<option class="btn btn-default" value=0>>Seleccione una opción</option>
								<?php foreach ($cat_jornada as $jornada): ?>
									<option class="btn btn-default" value=<?php echo $jornada['id_cat_jornada']; ?>><?php echo $jornada['desc_jornada']; ?> </option>
									<script>llenaCat_jornada(<?php echo $jornada['id_cat_jornada'];?>, '<?php echo $jornada['hora_entrada'];?>', <?php echo $jornada['jornada'];?>, '<?php echo $jornada['desc_jornada'];?>');</script>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
				</li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-sm-6 m-t-xs m-b-xs">
							<h5>Repetición semanal: <input type="checkbox" value="rep-sem" id="rep-sem" onchange="mostrar_ocultar()"></h5>
						</div>
						<div class="col-sm-6 m-t-xs m-b-xs">
							<div class="tiempo_repeticion" id="tiempo_repeticion" style="display: none">
								<input type="radio" name="tiempo-rep" value="1" checked> Lunes-Viernes<br>
				  				<input type="radio" name="tiempo-rep" value="2"> 24 x 24<br>
				  				<input type="radio" name="tiempo-rep" value="3"> 24 x 48
							</div>
						</div>
					</div>					
				</li>
				<li class="list-group-item">
					<div class="row">
						<div class="col-sm-6 m-t-xs m-b-xs">
							<h5>Repetición mensual: <input type="checkbox" value="rep-mens" id="rep-mens" onchange="mostrar_ocultarMensual()" style="display: none"></h5>
						</div>
						<div class="col-sm-6 m-t-xs m-b-xs">
							<div class="mes_repeticion" id="mes_repeticion" style="display: none">
								<h5>Desde mes actual hasta:	<select id="repeticion_hasta_mes">
									<script>cat_mes();</script>
								</select></h5>
							</div>
						</div>
					</div>		
				</li>
				
				<li class="list-group-item" id="guardar_horario_editado" style="display: none">
					<button onclick="guardar_horario_editado()" >Guardar Horario Editado</button><br>
				</li>
			</ul>

			<div class="panel panel-default">
				<div class='table-responsive' >
					<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
						<!--<thead><tr><th>Nombre de empleado</th><th>Asigna Horario</th></tr>
						</thead>
						<tbody id="lista_emp">-->
							<script type="text/javascript">
							generar_lista_empleados(<?php echo json_encode($cat_empleado);?>);
						</script>	
						<!--</tbody>-->
					</table>
				</div>
			</div>
		</div>
		<div class="cal col-sm-8"></div>
		
	</div>
	<script type="text/javascript">
		
		var tabla = $("#example");
		$(document).ready(function()
		{
			//generar_lista_empleados(<?php echo json_encode($cat_empleado);?>);
			generar_calendario("<?php if (isset($_GET["mes"])) echo $_GET["mes"]; ?>","<?php if (isset($_GET["anio"])) echo $_GET["anio"]; ?>");
		});

 		$( document ).ajaxStop(function() {
		  
 		 	tabla.dataTable();
 		});

		$('#editar_horario').click(function(){
			generar_editar2();
			
 			tabla.dataTable().fnDestroy();
 			tabla.dataTable();			
		});

		$('#generar_horario').click(function(){
			generar_editar1();
 			tabla.dataTable().fnDestroy();
 			tabla.dataTable();
			
		});

		function actualiza_lista(id_empleado){
			guarda_horario(id_empleado);
			//console.log("actualiza");
			$( document ).ajaxStop(function() {
				tabla.dataTable().fnDestroy();
 				tabla.dataTable();
			});
		}

		$('.anterior').click(function(){
			console.log("actualiza");

			$( document ).ajaxStop(function() {
				tabla.dataTable().fnDestroy();
 				tabla.dataTable();
			});
		});

		$('.siguiente').click(function(){
			$( document ).ajaxStop(function() {
				tabla.dataTable().fnDestroy();
 				tabla.dataTable();
			});
		});
		
	</script>
</section>
</section>
</section>