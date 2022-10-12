<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src=" <?php echo base_url(); ?>assets/js/datatables_export/dataTables.buttons.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/jszip.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/pdfmake.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/vfs_fonts.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/buttons.html5.min.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo base_url(); ?>assets/js/datatables_export/buttons.print.min.js"></script>

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
        <section class="panel panel-default">
          <header class="panel-heading font-bold">Productos con stock min</header>  
          
          <div class="table-responsive">
            <table class="table table-striped table-bordered m-b-none" data-ride="dataTablesButons">
              <thead>
                <tr>
				<th>Código de Barras</th>
				<th>Stock Mín.</th>
				<th>Cantidad</th>
				<th>Articulo</th>
				<th>Precio Compra</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach($results AS $result) {
                echo"<tr>
                <td>".$result->codigo_barras."</td>
				<td><b style='color:red;'>".$result->stock_min."</b></td>
				<td>".$result->cantidad."</td>
                  <td>".$result->articulo."</td>
                  <td>".$result->puCompra."</td>
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

<script src ="<?php echo base_url(); ?>assets/js/datatables/jquery.dataTables.buttons.js"></script>