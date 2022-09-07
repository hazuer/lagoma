<div class="modal" id="ajaxModal" aria-hidden="true" style="display: none;"></div>
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">×</button> 
            <h4 class="modal-title"><?php echo $titleForm;?></h4>
         </div>
         <div class="modal-body">
            . . . 
         </div>
         <div class="modal-footer">
				<?php
					$atribButton = [
						"type"    => "submit",
						"id"      => "guardar",
						"name"    => "guardar",
						"value"   => "guardar",
						"class"   => "btn btn-primary",
						"onclick" => "sendData()",
					];
					$this->crearelemento->Button($atribButton, $titleBtn, "fa fa-save");
				?>
				<a href="#" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cerrar</a>
			</div>
      </div>
   </div>
</div>
