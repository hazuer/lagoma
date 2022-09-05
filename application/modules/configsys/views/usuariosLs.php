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
      </div>

      <div class="col-sm-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Listado de usuarios</header>  
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="datatables_1">
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

    </section>
  </section>
</section>
<!-- Bootstrap -->
<!-- App -->
<!-- datatables -->
<script src="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.min.js"></script>
<script src ="<?php echo base_url(); ?>assets/js/datatables/demo.js" ></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/datatables/jquery.dataTables.css" type="text/css" />