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
				<?php $this->crearelemento->LoadModal(base_url()."configsys/demo/",url_encode(0),"btn btn-info","Agregar modulo","fa fa-plus");?>
				<a href="<?php echo base_url(); ?>configsys/demo/<?php echo url_encode(0);?>" data-toggle="ajaxModal" class="btn btn-info"><i class="fa fa-plus"></i> Agregar modulo</a>
				<button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>

			</div>

			<div class="col-md-12">
				<section class="panel panel-default">
					<header class="panel-heading font-bold">Listado de modulos</header>
					<div class="table-responsive">
						<table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
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

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
		</div>
		<div class="modal-body">
		
		<?php $attributes = array('class' => 'form-horizontal', 'id' => 'validaModulo'); ?>
          <?php echo form_open('configsys/moduloAction', $attributes) ?>
             <?php 
              $atribInput = [
              "type"  => "hidden",
              "id"    => "id_system_modulos",
              "name"  => "id_system_modulos",
              "value" => $id_system_modulos];
              $this->crearelemento->Input($atribInput);

              $atribInput = [
              "type"  => "hidden",
              "id"    => "action",
              "name"  => "action",
              "value" => $action];
              $this->crearelemento->Input($atribInput);
              ?>

            <div class="form-group">
              <label class="col-md-2 control-label">Modulo:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "modulo",
                "name"      => "modulo",
                "value"     => $modulo,
                "class"     => "form-control",
                "autofocus" => ""]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('modulo'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Desc. modulo:</label>
              <div class="col-md-10">
                <?php
                $atribTextarea = [
                "id"    => "desc_modulo",
                "name"  => "desc_modulo",
                "class" => "form-control",
                "rows"  => 3];  
                $this->crearelemento->Textarea($atribTextarea,$desc_modulo);?>
                <?php echo form_error('desc_modulo'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">url/controlador:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "urlControlador",
                "name"      => "urlControlador",
                "value"     => $urlControlador,
                "class"     => "form-control"]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('urlControlador'); ?>
              </div>
            </div>

            <div class="form-group">
              <label class="col-md-2 control-label">Icono:</label>
              <div class="col-md-10">
                <?php
                $atribInput = [
                "type"      => "text",
                "id"        => "icono",
                "name"      => "icono",
                "value"     => $icono,
                "class"     => "form-control"]; 
                $this->crearelemento->Input($atribInput);?>
                <?php echo form_error('icono'); ?>
              </div>
            </div>


            <div class="form-group">
              <label class="col-md-2 control-label">Class color:</label>
              <div class="col-md-10">
                <select name="classColor" class="form-control">
                  <option value="bg-danger">bg-danger</option>
                  <option value="bg-warning">bg-warning</option>
                  <option value="bg-success">bg-success</option>
                  <option value="bg-primary">bg-primary</option>
                  <option value="primary dker">primary dker</option>
                  <option value="bg-info">bg-info</option>
                </select>
              </div>
            </div>
 
            <div class="form-group">
              <p align="center">
                  <?php
                  $atribButton = [
                  "type" => "submit",
                  "id" => "guardar",
                  "name" => "guardar",
                  "value" => "guardar",
                  "class" => "btn btn-primary"];
                  $this->crearelemento->Button($atribButton, $titleBtn, "fa fa-save");
                  ?>
              </p>
            </div>
          </form>


		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> <a href="#" class="btn btn-primary">Save</a> </div>
	</div>
  </div>
</div>

<script src="<?php echo base_url(); ?>assets/js/modules/configsys/moduloForm.js"></script>