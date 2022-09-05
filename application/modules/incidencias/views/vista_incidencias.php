<!-- /.aside -->
<section id="content">
  <section class="vbox">
    <section class="scrollable padder">
      
      <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
        <li>SID</li>
        <li class="active"><i class="fa fa-<?php echo $iconFa ?>"></i> <?php echo $descTitle ?></a></li>
      </ul>

      <div class="m-b-md">
        <h3 class="m-b-none"><?php echo $descTitle ?></h3>
        <small><?php echo $descTitleSub ?></small>
      </div>
      

      <div class="row">
            <div class="col-sm-6 m-t-xs m-b-xs">
                <h5>Selecciona año: <select id="anio">
                  <script>//function cat_mes(){
                    var select_mes = document.getElementById("anio");
                    var pinta_texto = "";
                    
                    for(i = 2016; i <= 2030; i++){
                      pinta_texto = pinta_texto + "<option value='" + i + "'>" + i + "</option>"  
                    }           
                    select_mes.innerHTML = pinta_texto;
                //}</script>
                </select></h5>
            </div>

            <div class="col-sm-6 m-t-xs m-b-xs">
              <div class="mes_repeticion" id="mes_repeticion" >
                <h5>Selecciona mes: <select id="repeticion_hasta_mes">
                  <script>//function cat_mes(){
                    var select_mes = document.getElementById("repeticion_hasta_mes");
                    var catalogo_mes=["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",];
                    var pinta_texto = "";
                    
                    for(i = 1; i <= 12; i++){
                      pinta_texto = pinta_texto + "<option value='" + i + "'>" + catalogo_mes[i] + "</option>"  
                    }           
                    select_mes.innerHTML = pinta_texto;
                //}</script>
                </select></h5>
              </div>
            </div>
          </div> 

          <div class="col-sm-6 m-t-xs m-b-xs">
                <h5>Selecciona quincena: <select id="anio">
                  <option value="1">1er Quincena</option>                
                  <option value="2">2da Quincena</option>                
                </select></h5>
            </div>


    </section>
  </section>
</section>