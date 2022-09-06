<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <?php
      echo $breadcrumb;
      ?>
     <div class="m-b-md">
         <h3 class="m-b-none">Listado de privilegios por usuario</h3>
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
                  <td align='center'>";
                    $this->crearelemento->Link("privUsuarioForm/",url_encode($result->id_system_users)."/".url_encode($result->nombrecompleto),"btn btn-info btn-xs","Editar","fa fa-edit");
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