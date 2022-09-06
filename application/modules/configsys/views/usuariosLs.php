<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <?php
      echo $breadcrumb;
      ?>

      <div class="m-b-md">
         <h3 class="m-b-none">Listado de todos los usuarios</h3>
      </div>

      <div class="col-sm-12">
        <?php $this->crearelemento->Link("usuariosForm/",url_encode(0),"btn btn-info","Agregar usuario","fa fa-plus");?>
        <button class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg">Large modal</button>
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
                foreach($results AS $result)
                {
                echo"<tr>
                  <td style='text-align:center;'>".$result->id_system_users."</td>
                  <td>".$result->nombrecompleto."</td>
                  <td>".$result->usuario."</td>
                  <td>".$result->status."</td>
                  <td align='center'>";
                    $this->crearelemento->Link("usuariosForm/",url_encode($result->id_system_users),"btn btn-default btn-xs","Editar","fa fa-edit");
                  echo"</td>
                </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
          
        </section>
      </div>
      <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
	<div class="modal-content">

		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		<h4 class="modal-title" id="myLargeModalLabel">Large modal</h4>
		</div>
		<div class="modal-body">
		</div>
		<div class="modal-footer"> <a href="#" class="btn btn-default" data-dismiss="modal">Close</a> <a href="#" class="btn btn-primary">Save</a> </div>
	</div>
  </div>
</div>
    </section>
  </section>
</section>

