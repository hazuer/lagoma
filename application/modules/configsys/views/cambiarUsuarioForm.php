<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
       <?php
        echo $breadcrumb;
       ?>

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
                    $this->crearelemento->Link("cambiarUsuarioAction/",url_encode($result->id_system_users),"btn btn-primary btn-xs","Entrar","fa fa-sign-in");
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