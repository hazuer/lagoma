<!-- .aside --> 
<section><!--2-->
   <section class="hbox stretch"><!--3-->
               
      <aside class="<?php echo $this->session->userdata('classaside');?>" id="nav"> <!--4-->
         <section class="vbox"><!--5-->
 
            <section class="w-f scrollable">
               <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="5px" data-color="#333333">
                  <!-- nav --> 
                  <nav class="nav-primary hidden-xs">
                     <ul class="nav">
                        
<?php 
   #Acceso a los visualizar_modulos
   function visualizar_modulos ($id_system_modulos )
   {
      $CI =& get_instance();  
      $session_id_user=$CI->session->userdata('id_system_users');
      $sql_visualizar_modulo="SELECT system_modulos_privilegios.status 
      FROM system_modulos_privilegios
      INNER JOIN system_modulos ON system_modulos_privilegios.id_modulo = system_modulos.id_system_modulos
      INNER JOIN system_users ON system_modulos_privilegios.id_user = system_users.id_system_users
      WHERE
      system_modulos_privilegios.id_user=$session_id_user AND
      system_modulos_privilegios.id_modulo=$id_system_modulos   AND
      system_users.status=1 AND
      system_modulos_privilegios.status=1";

      $respuesta = $CI->db->query($sql_visualizar_modulo);
      if ($respuesta->num_rows() == 1)
      {
         foreach ($respuesta->result() AS $row)
         {
            $nombreSubmoduloPriv= $row->status;
         }
         if($nombreSubmoduloPriv==1)
            {
               return true;
            }else
               {
                  return false;
               }
      }
   } 
                      $sqlLsModules="SELECT * FROM system_modulos";
                      $rstLsModules = $this->db->query($sqlLsModules);
                      foreach ($rstLsModules->result() AS $row)
                      {
                        if(visualizar_modulos ($row->id_system_modulos))
                          {
                            echo"<li"; if($activeTab==$row->id_system_modulos){ echo " class='active'"; } echo ">";
                              echo "<a href=".base_url().$row->urlControlador.">";
                              echo "<i class='".$row->icono."'>";
                              echo "<b class='".$row->classColor."'></b> </i>";
                              echo "<span>".$row->modulo."</span>";
                              echo "</a>";
                            echo "</li>";
                          }
                      }
                      ?>
                     </ul>
                  </nav>
                  <!-- / nav --> 
               </div>
            </section>

           <footer class="footer lt hidden-xs b-t b-dark">
               <a href="#nav" data-toggle="class:nav-xs" class="pull-right btn btn-sm btn-dark btn-icon" id="persistenciaSlide"> 
               <i class="fa fa-angle-left text"></i> 
               <i class="fa fa-angle-right text-active"></i> 
               </a> 
            </footer>

            <script>
            $(document).ready(function () 
            {
              $('#persistenciaSlide').click(function () 
              {
                $.ajax(
                {
                  type: 'POST',
                  url: "<?php echo base_url();?>inicio/persistenciaSlide",
                  dataType: 'html' 
                })
                .done(function (data) 
                   {
                     //location.reload();
                   });
              });
            });
          </script>
         </section><!--5-->
      </aside><!--4-->           