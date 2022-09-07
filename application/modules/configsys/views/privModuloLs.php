<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <?php
      echo $breadcrumb;
      ?>

      <div class="m-b-md">
         <h3 class="m-b-none">Listado de privilegios por modulo</h3>
      </div>

      <div class="col-sm-12">
        <section class="panel panel-default">
        <header class="panel-heading font-bold">Listado de privilegios por modulo</header>  
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
              <thead>
                <tr>
                  <th>id_system_modulos</th>
                  <th>Modulo</th>
                  <th>Descripción</th>
                  <th aling="center"> </th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($results as $result)
                {
                echo "
                <tr>
                  <td style='text-align:center;'>".$result->id_system_modulos."</td>
                  <td>".$result->modulo."</td>
                  <td>".$result->desc_modulo."</td>
                  <td align='center'>";
                    $this->crearelemento->Link("privModuloForm/",url_encode($result->id_system_modulos)."/".url_encode($result->modulo),"btn btn-primary btn-xs","Administrar","fa fa-eye");
                  echo"</td>
                </tr> ";
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