
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
		<?php $this->crearelemento->LoadModal("inventario/invForm/",url_encode(0),"btn btn-info","Agregar nuevo producto","fa fa-plus");?>
      </div>

      <div class="col-sm-12">
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Todo el inventario</header>  
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="dataTablesGeneric">
              <thead>
                <tr>
				<th>Codigo de Barras</th>
				<th>Cantidad</th>
				<th>Articulo</th>
				<th>Precio Neto</th>
				<th>Precio Compra</th>
				<th>Stock Min.</th>
        <th>Estatus</th>
                  <th aling="center"> </th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($results AS $result) {
                echo"<tr>
                <td>".$result->codigo_barras."</td>
				        <td>".$result->cantidad."</td>
                  <td>".$result->articulo."</td>
                  <td>".$result->precioNeto."</td>
                  <td>".$result->puCompra."</td>
				  <td>".$result->stock_min."</td>
          <td>".$result->estatus."</td>
                  <td align='center'>";
					$this->crearelemento->LoadModal("inventario/invForm/",url_encode($result->idInventario),"btn btn-primary btn-xs","Editar","fa fa-edit");
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