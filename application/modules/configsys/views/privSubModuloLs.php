<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
       <?php
        echo $breadcrumb;
       ?>

      <div class="m-b-md">
         <h3 class="m-b-none">Listado de privilegios por submodulo</h3>
      </div>

      <div class="col-md-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Listado de privilegios por submodulo</header>
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="datatables_1">
              <thead>
                <tr>
                  <th>id_system_submodulo</th>
                  <th>Modulo</th>
                  <th>Submodulo</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($results as $result)
                {
                echo"<tr>
                  <td style='text-align:center;'>".$result->id_system_submodulo."</td>
                  <td>".$result->modulo."</td>
                  <td>".$result->submodulo."</td>
                  <td align='center'>";
                    $this->crearelemento->Link("privSubModuloForm/",url_encode($result->id_system_submodulo)."/".url_encode($result->submodulo),"btn btn-info btn-xs","Administrar","fa fa-eye");
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