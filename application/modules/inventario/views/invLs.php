
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <?php
      echo $breadcrumb;
      ?>

      <div class="m-b-md">
         <h3 class="m-b-none">Listado de articulos</h3>
      </div>

      <div class="col-sm-12">
        <?php $this->crearelemento->Link("inventario/invForm/",url_encode(0),"btn btn-info","Agregar nuevo producto","fa fa-plus");?>
      </div>

      <div class="col-sm-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Listado</header>  
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="datatables_1">
              <thead>
                <tr>
                  <th>Cantidad</th>
                  <th>Articulo</th>
                  <th>Precio Neto </th>
                  <th>Precio Compra</th>
                  <th>Existencia</th>
                  <th aling="center"> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($results AS $result)
                {
                echo"<tr>
                  <td>".$result->cantidad."</td>
                  <td>".$result->articulo."</td>
                  <td>".$result->precioNeto."</td>
                  <td>".$result->puCompra."</td>
                  <td>".$result->existencia."</td>
                  <td align='center'>";
                    $this->crearelemento->Link("inventario/invForm/",url_encode($result->idInventario),"btn btn-primary btn-xs","Editar","fa fa-edit");
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