//variable baseURL
function getBaseUrl(){
	var pathArray = window.location.pathname.split('/');
	var baseUrl =window.location.protocol + "/" + pathArray[1] + "/";
	return baseUrl
}

var baseUrl = getBaseUrl();
mes_actual="";
anio_actual="";
var horario_edita = [];
var horario_dias1 = [];
var bandera_lista = true;  //bandera para editar o generar lista de empleados;
var horario_dias2 = [];
var catalogo_empleados = [];
var empleados_con_horario = [];
var empleados_sin_horario = [];
var horario_dias1 = [];
var descripcion_jornada = [];
var descripcion_jornada2 = [];
for (i = 0; i < 32; i++) {
	horario_dias1[i] = 0;
	horario_dias2[i] = 0;
	descripcion_jornada[i] = "";
	descripcion_jornada2[i] = "";
}
var cat_jornada = [];
var fecha_actual = new Date();
var id_empleado_editando = 0;
var id_user_enlace = "";

function llenaCat_jornada(id_cat_jornada, hora_entrada, jornada, desc_jornada){
	cat_jornada.push([id_cat_jornada, hora_entrada, jornada, desc_jornada]);
}

function empalme_dias(dia_anterior, dia_siguiente){
	var empalme = false;	

	for(i=0; i<cat_jornada.length;i++){
		if(cat_jornada[i][0]==dia_anterior){	//
		 hora_minuto=cat_jornada[i][1].split(":");
		 epoch = (3600 * hora_minuto[0]) + (hora_minuto[1] * 60); //convertimos a epoch la hora de entrada del dia anterior
		 epoch = epoch + (cat_jornada[i][2] * 3600); 	//sumamos las horas de jornada
		 if(epoch > 86400){						//si la jornada toma horas de un segundo dia	

		 	valor1_horas = 24 - hora_minuto[0];
		 	valor1_minutos = 60 - hora_minuto[1]; //se calcula cuantas horas son del dia anterior
		 	if(valor1_minutos != 60){				
		 		valor1_horas = valor1_horas - 1;
		 	}
		 	valor2_jornada_horas = cat_jornada[i][2] - valor1_horas; //se restan de la jornada para saber cuantas horas se toman del dia actual
		 	valor2_jornada_minutos = 60 - valor1_minutos;	//se calcula cuantas horas son tomadas del dia actual
		 	if(valor2_jornada_minutos != 0){
		 		valor2_jornada_horas =valor2_jornada_horas - 1;
		 	}
		 	epoch3 = (valor2_jornada_horas * 3600) + (valor2_jornada_minutos * 60); // horas tomadas del dia actual
		 	//console.log(dia_catalogoDespues);
		 	for (var j = 0; j < cat_jornada.length; j++) {
		 		if(cat_jornada[j][0] == dia_siguiente){
		 			hora_minuto = cat_jornada[j][1].split(":");
		 			epoch2=(3600*hora_minuto[0])+(hora_minuto[1]*60); //convertimos a epoch la hora de entrada del dia anterior

///hora de entrada la misma que la hora de salida

		 			if(epoch3 > epoch2){ //si la hora de entrada del dia actual es menor que la hora de salida del dia anterior es un empalme 
		 				empalme = true;
		 			}
		 			j=cat_jornada.length;
		 			//console.log(epoch3+" "+epoch2);
		 		}
		 	}
		}
		 
		 i=cat_jornada.length;//para que salga del ciclo
		}
	}
	return empalme;
}

function rep_lunes_viernes(){
	var bandera_rep = false;
	for (i = 0; i < 32; i++) {
		if(horario_dias1[i]!=0 || horario_dias2[i]!=0){
			bandera_rep = true;
			i=32;
		}
	}		

	if(bandera_rep == false){			
		for(j=0; j<cat_jornada.length;j++){
			if(cat_jornada[j][0]==cat_horario.options[cat_horario.selectedIndex].value){	//
				if(cat_jornada[j][2]>12){
					bandera_rep = true;
				}
					j = cat_jornada.length;
			}
		}
		if(bandera_rep == false){
			if(mes_actual == ""){
				mes_temp = fecha_actual.getMonth();
				anio_actual = fecha_actual.getFullYear();
				mes_temp = Number(mes_temp)+1;
				if(mes_temp < 10){
					mes_temp = "0"+mes_temp;
				}
			}
			else{
				mes_temp = Number(mes_actual);
			}
			var fecha_temp = new Date(anio_actual, mes_temp, 0).getDate();
			for(i = 1; i <= Number(fecha_temp); i++){
				var busca_dia = new Date(anio_actual, mes_temp-1, i, 0, 0, 0, 0);
				if(busca_dia.getDay() != 0 && busca_dia.getDay() != 6) {
					horario_dias1[i] = cat_horario.options[cat_horario.selectedIndex].value;
				   	descripcion_jornada[i] = cat_horario.options[cat_horario.selectedIndex].text;
				}
			}
			element.style.display='inline-block';
		}
		else{
			alert("No se puede agregar una jornada mayor de 12 horas a la repeticion selecdcionada");
		}
	}
	else{
		alert("El calendario tiene datos, debe limpiarlo para hacer repetición");
	}
}

function rep_24x24x48(dia, cat_horario, num_rep){
	var bandera_rep = false;
	for (i = Number(dia); i < 32; i++) {
		if(horario_dias1[i]!=0 || horario_dias2[i]!=0){
			bandera_rep = true;
			i=32;
		}
	}		

	if(bandera_rep == false){
		for(j=0; j<cat_jornada.length;j++){
			if(cat_jornada[j][0] == cat_horario.options[cat_horario.selectedIndex].value){	//
				if(cat_jornada[j][2] != 24){
					bandera_rep = true;
				}
					j = cat_jornada.length;
			}
		}

		if(mes_actual == ""){
			mes_temp = fecha_actual.getMonth();
			anio_actual = fecha_actual.getFullYear();
			mes_temp = Number(mes_temp)+1;
			if(mes_temp < 10){
				mes_temp = "0"+mes_temp;
			}
		}
		else{
			mes_temp = Number(mes_actual);
		}
		var fecha_temp = new Date(anio_actual, mes_temp, 0).getDate();

		if(bandera_rep == false){
			for(i = Number(dia); i <= Number(fecha_temp); i=i+num_rep){
				horario_dias1[i] = cat_horario.options[cat_horario.selectedIndex].value;
				descripcion_jornada[i] = cat_horario.options[cat_horario.selectedIndex].text;
			}
		}
		else{
			alert("Debe seleccionar una jornada de 24 horas");
		}

	}
	else{
		alert("El calendario tiene horarios despues de la fecha seleccionada, debe eliminarlos para aplicar la repetición");
	}

}

// AGREGAR UN EVENTO 
$(document).on("click",'a.add',function(e) 
{
	var dia = $(this).attr('rel');
	var empalme = false;
	var cambia_posicion = false;
	cat_horario = document.getElementById("cat_horario");
	element = document.getElementById("rep-mens");
	
	var check = document.getElementById("rep-sem");
	if (check.checked) {//sí hay repeticion
		var radios = document.getElementsByName('tiempo-rep');

		if (radios[0].checked) {
		  		rep_lunes_viernes(cat_horario, element);
		}
		else if (radios[1].checked) {
		 		rep_24x24x48(dia, cat_horario, 2);
		}
		else if (radios[2].checked) {
		  		rep_24x24x48(dia, cat_horario, 3);
		}
	}
	else {
		//verifica que no haya un empalme el dia anterior al seleccionado
		if(horario_dias1[dia] == 0 || horario_dias2[dia] == 0){
			if(horario_dias1[dia] != 0){ 			//compara los dos horarios del mismo dia
				for(i=0; i<cat_jornada.length;i++){
					if(cat_jornada[i][0] == horario_dias1[dia]){	//
						hora_minuto=cat_jornada[i][1].split(":");
						epoch_entrada = (3600 * hora_minuto[0]) + (hora_minuto[1] * 60); //convertimos a epoch la hora de entrada del dia anterior
						epoch_salida = epoch_entrada + (cat_jornada[i][2] * 3600); 	
						for(j = 0; j < cat_jornada.length; j++){
							if(cat_jornada[j][0] == cat_horario.options[cat_horario.selectedIndex].value){	//
								hora_minuto=cat_jornada[j][1].split(":");
								epoch_entrada2 = (3600 * hora_minuto[0]) + (hora_minuto[1] * 60); //convertimos a epoch la hora de entrada del dia anterior
								epoch_salida2 = epoch_entrada2 + (cat_jornada[j][2] * 3600);
								//console.log(epoch_entrada+" "+epoch_salida+" "+epoch_entrada2+" "+epoch_salida2);

		///hora de entrada la misma que la hora de salida

								if((epoch_entrada2 > epoch_entrada && epoch_entrada2 < epoch_salida) || (epoch_salida2 > epoch_entrada && epoch_salida2 < epoch_salida) || (epoch_entrada > epoch_entrada2 && epoch_salida < epoch_salida2) || (epoch_entrada2 > epoch_entrada && epoch_salida2 < epoch_salida)){
									empalme = true;
								}
								if(empalme == false && epoch_salida2 < epoch_entrada){
									cambia_posicion = true;
								}
								j = cat_jornada.length;
							}
						}
						i = cat_jornada.length;
					}
				}
			}

			if(horario_dias1[Number(dia)-1] != 0 && empalme == false){	// compara el horario que se asigna con el primero del dia anterior
					empalme = empalme_dias(horario_dias1[Number(dia)-1], cat_horario.options[cat_horario.selectedIndex].value);
			}
			if(horario_dias2[Number(dia)-1] != 0 && empalme == false){// compara el horario que se asigna con el segundo del dia anterior
					 empalme = empalme_dias(horario_dias2[Number(dia)-1], cat_horario.options[cat_horario.selectedIndex].value);
			}
			if(horario_dias1[Number(dia)+1] != 0 && empalme == false){// compara el horario que se asigna con el primero del dia siguiente
				empalme = empalme_dias(cat_horario.options[cat_horario.selectedIndex].value, horario_dias1[Number(dia)+1]);
			}
			if(horario_dias2[Number(dia)+1] != 0 && empalme == false){// compara el horario que se asigna con el segundo del dia siguiente
					 empalme = empalme_dias(cat_horario.options[cat_horario.selectedIndex].value, horario_dias2[Number(dia)+1]);
			}
			if (empalme == false){ //en caso de no haber encontrado ningún empalme de horario lo guarda
				if(cambia_posicion == true){ // si el horario que ya estaba es mayor al que se esta agregando se cambia de posición
					aux1 = horario_dias1[Number(dia)];
					aux2 = descripcion_jornada[Number(dia)]
					horario_dias1[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].value;
					descripcion_jornada[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].text;
					horario_dias2[Number(dia)] = aux1;
					descripcion_jornada2[Number(dia)] = aux2;
			    }
			    else{
					if(horario_dias1[dia] == 0){
				   		horario_dias1[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].value;
				   		descripcion_jornada[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].text;
				   	}
				   	else{
				   		horario_dias2[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].value;
				   		descripcion_jornada2[Number(dia)] = cat_horario.options[cat_horario.selectedIndex].text;	
				   	}	
			    }
			    element.style.display='none';
			    element.checked= false;
			    mostrar_ocultarMensual();
			}
		    else{
		    	alert("Problema de empalme con horario");
		    }
		}
		else{
			alert("fecha ya tiene horario");
		}
	}
   	generar_calendario(mes_actual, anio_actual);
});

//eliminar evento
$(document).on("click",'.eliminar_evento',function (e) 
{
	element = document.getElementById("rep-mens");
	var dia = $(this).attr('rel');
   	horario_dias1[dia] = 0;
   	horario_dias2[dia] = 0;
   	descripcion_jornada[dia] = "";	
   	descripcion_jornada2[dia] = "";

   	element.style.display='none';
	element.checked= false;
	mostrar_ocultarMensual();

   	generar_calendario(mes_actual, anio_actual);
});	

//pinta horario de un dia anterior
function pinta_horario(dia_anterior){
	var horas_dia_anterior = 0;
	for(i=0; i<cat_jornada.length;i++){
		if(cat_jornada[i][0] == dia_anterior){	//
			hora_minuto=cat_jornada[i][1].split(":");
			epoch_entrada = (3600 * hora_minuto[0]) + (hora_minuto[1] * 60); //convertimos a epoch la hora de entrada del dia anterior
			epoch_salida = epoch_entrada + (cat_jornada[i][2] * 3600);

			if(epoch_salida > 86400){
				valor1_horas = 24 - hora_minuto[0];
				valor1_minutos = 60 - hora_minuto[1]; //se calcula cuantas horas son del dia anterior
				if(valor1_minutos != 60){				
					valor1_horas = valor1_horas - 1;
				}
				valor2_jornada_horas = cat_jornada[i][2] - valor1_horas; //se restan de la jornada para saber cuantas horas se toman del dia actual
				valor2_jornada_minutos = 60 - valor1_minutos;	//se calcula cuantas horas son tomadas del dia actual
				if(valor2_jornada_minutos != 0){
					valor2_jornada_horas =valor2_jornada_horas - 1;
				}
				horas_dia_anterior = (valor2_jornada_horas * 3600) + (valor2_jornada_minutos * 60); // horas tomadas del dia actual				 	
			}
			i = cat_jornada.length;
		}
	}
	return horas_dia_anterior;
}

//pinta horario en el calendario
function textoCat_horario(dia){
	var horas_dia_anterior = 0;
	var hora_salida_diaActual = 0;
	var pinta_texto = "";
	id_dia="horario"+dia
	var div_horarios = document.getElementById(id_dia);
	if(horario_dias1[Number(dia)-1] != 0){ //verifica la salida de un dia anterior si es que la hay
		horas_dia_anterior = pinta_horario(horario_dias1[Number(dia)-1]);
	}
	if(Number(horas_dia_anterior) == 0 && horario_dias2[Number(dia)-1] != 0){ //verifica la salida de un dia anterior si es que la hay
		horas_dia_anterior = pinta_horario(horario_dias2[Number(dia)-1]);	
	}
	if(Number(horas_dia_anterior) != 0){ //pinta la salida de un dia anterior si es que la hay
		var mins = horas_dia_anterior % 60;
  		var hrs = ((horas_dia_anterior - mins) / 60)/60;
  		if(Number(hrs) < 10){
  			hrs = "0" + hrs;
  		}
  		if(Number(mins) < 10){
  			mins = "0" + mins;
  		}
		pinta_texto = pinta_texto + "<div style='color:red;'>" + hrs + ":" + mins + "</div>";
		//console.log(Number(horas_dia_anterior));
	}

	if(horario_dias1[Number(dia)] != 0){//pinta el horario del dia actual
		hora_salida_diaActual = pinta_horario(horario_dias1[Number(dia)]);
		if(hora_salida_diaActual == 0){ // si no sale el dia siguiente pinta el horario como tal
			var separa_descripcion = descripcion_jornada[dia].split("-");
			pinta_texto = pinta_texto + "<div><span style='color:blue;'>"+ separa_descripcion[0] + "</span>-";
			pinta_texto = pinta_texto + "<span style='color:red;'>"+ separa_descripcion[1] + "</span></div>";
		}
		else{//si sale el dia siguiente solo pinta la hora de entrada
			for(i=0; i<cat_jornada.length;i++){
				if(cat_jornada[i][0] == horario_dias1[Number(dia)]){	//
					pinta_texto = pinta_texto + "<div style='color:blue;'>" + cat_jornada[i][1].substring(0,5) + "</div>";
					i = cat_jornada.length;
				}
			}
		}
	}
	if(horario_dias2[Number(dia)] != 0){//pinta el horario del dia actual
		hora_salida_diaActual = pinta_horario(horario_dias2[Number(dia)]);
		if(hora_salida_diaActual == 0){ // si no sale el dia siguiente pinta el horario como tal
			var separa_descripcion = descripcion_jornada2[dia].split("-");
			pinta_texto = pinta_texto + "<div><span style='color:blue;'>" + separa_descripcion[0] + "</span>-";
			pinta_texto = pinta_texto + "<span style='color:red;'>" + separa_descripcion[1] + "</span></div>";
		}
		else{//si sale el dia siguiente solo pinta la hora de entrada
			for(i=0; i<cat_jornada.length;i++){
				if(cat_jornada[i][0] == horario_dias2[Number(dia)]){	//
					pinta_texto = pinta_texto + "<div style='color:blue;'>" + cat_jornada[i][1].substring(0,5) + "</div>";
					i = cat_jornada.length;
				}
			}
		}
	}	
   	div_horarios.innerHTML = pinta_texto;
}

//genera calendario
function llama_calendario(mes,anio)
{
	var agenda=$(".cal");
	$.ajax({
		type: "GET",
		//url: '{{ base_url('evento') }}',
		url: baseUrl+'calendario/evento',	
		data: { mes:mes,anio:anio,accion:"generar_calendario"}
	}).done(function( respuesta ) 
	{
		agenda.html(respuesta);
	});

	if(mes_actual == ""){
		mes_actual = fecha_actual.getMonth();
		anio_actual = fecha_actual.getFullYear();
		mes_actual = Number(mes_actual)+1;
		if(mes_actual < 10){
			mes_actual = "0"+mes_actual;
		}
	}
}		

function generar_calendario(mes,anio){
	llama_calendario(mes, anio);
}

//limpia los eventos del calendario
function limpia_calendario(){
	for (i = 0; i < 32; i++) {
		horario_dias1[i] = 0;
		horario_dias2[i] = 0;
		descripcion_jornada[i] = "";
		descripcion_jornada2[i] = "";
	}
	generar_calendario(mes_actual,anio_actual);
}

//muestra y oculta recuadro de repeticion semanal
function mostrar_ocultar(){
	element = document.getElementById("tiempo_repeticion");
	check = document.getElementById("rep-sem");
	if (check.checked) {
	    element.style.display='inline-block';
	}
	else {
	    element.style.display='none';
	}
}	

//muestra y oculta recuadro de repeticion mensual
function mostrar_ocultarMensual(){
	element = document.getElementById("mes_repeticion");
	check = document.getElementById("rep-mens");
	if (check.checked) {
	    element.style.display='inline-block';
	}
	else {
	    element.style.display='none';
	}
}		

//cambiar de mes
$(document).on("click",".anterior,.siguiente",function(e)
{
	/*bandera=0;
	if(id_empleado_editando != 0){
		limpia_calendario();
	}
	else{
		for (i = 0; i < 32; i++) {
			if(horario_dias1[i]!=0 || horario_dias2[i]!=0){
				bandera=1;
				i=32;
			}
		}
	}
	if(bandera==0){*/
		limpia_calendario();
		element = document.getElementById("guardar_horario_editado");
		element.style.display='none';
		id_empleado_editando = 0;

		e.preventDefault();
		var datos=$(this).attr("rel");
		var nueva_fecha=datos.split("-");
		mes_actual=nueva_fecha[1];
		anio_actual=nueva_fecha[0];
		generar_calendario(nueva_fecha[1],nueva_fecha[0]);
		generar_lista();
		cat_mes();
	/*}
	else{
		alert("Tiene datos sin guardar en el calendario")
	}*/
});

function guarda_horario2(id_empleado){
	
	var bandera_rep = 0;
	var mes_temp = "";
	cat_horario = document.getElementById("cat_horario");
	check = document.getElementById("rep-mens");

	if (check.checked) {
		var repeticion_hasta_mes = document.getElementById("repeticion_hasta_mes");
		var repeticion_mensual = repeticion_hasta_mes.options[repeticion_hasta_mes.selectedIndex].value;

		bandera_rep = Number(repeticion_mensual) - Number(mes_actual);
		if(bandera_rep <= 0){
			alert("la repetición mensual solo se aplicara al mes generado");
			bandera_rep = 0;
		}
		else{
			var incremental = 0;
			$.ajax({
				type: "GET",
				url: baseUrl + 'calendario/guarda_horario_mensual',	
				data: { id_empleado:id_empleado, anio:anio_actual, id_cat_jornada:cat_horario.options[cat_horario.selectedIndex].value, mes_min:Number(mes_actual) , mes_max:Number(repeticion_mensual)}
			}).done(function( respuesta ) 
			{
				generar_lista();
			});
		}
		
	}
	else{
		$.ajax({
			type: "GET",
			url: baseUrl+'calendario/guarda_horario',	
			data: { id_empleado:id_empleado, id_cat_jornada:horario_dias1, id_cat_jornada2:horario_dias2, fecha_entrada:anio_actual+"-"+mes_actual+"-"}
		}).done(function( respuesta ) 
		{
			//console.log("guarda");

			generar_lista();
		});
	}
}

function guarda_horario(id_empleado){
	//console.log(horario_dias1[1], horario_dias2[1], Number(mes_actual));
	var empalme = false;
	//console.log("prueba1.0")
	if(horario_dias1[1] != 0 && Number(mes_actual) != 1){
		$.ajax({
				type: "GET",
				url: baseUrl+'calendario/consulta_empalme',	
				data: { id_empleado:id_empleado, id_cat_jornada:horario_dias1[1], id_cat_jornada2:horario_dias2[1], mes:Number(mes_actual), anio:anio_actual}
		}).done(function( respuesta ) 
		{
			if(respuesta == ""){
				guarda_horario2(id_empleado);
			}
			else{
				ultima_jornada_mes = JSON.parse(respuesta);
				for(count = 0; count < ultima_jornada_mes.length; count++){
					empalme = empalme_dias(ultima_jornada_mes[count]['id_cat_jornada'], horario_dias1[1]);
					if(horario_dias2[1] != 0 && empalme == false){
						empalme = empalme_dias(ultima_jornada_mes[count]['id_cat_jornada'], horario_dias2[1]);
					}
					if(empalme == true){
						count = ultima_jornada_mes.length;
					}
				}
				if(empalme == true){
					alert("empalme con jornada del mes anterior")
				}
				else{
					guarda_horario2(id_empleado);	
				}
			}
		});
	}
	else{
		//console.log("no empalme");
		guarda_horario2(id_empleado);
	}
}

function llena_calendario_edita(){
	var hora_minuto;
	var hora_minuto2;
	var epoch_entrada1;
	var epoch_entrada2;
	limpia_calendario();
	for(i=0; i < horario_edita.length; i++){
		if(horario_edita[i]['fecha_entrada'].substring(5, 7) == mes_actual){////todos los que sean del mismo mes
			for( j = 1; j < 32; j++){
				if(Number(horario_edita[i]['fecha_entrada'].substring(8,10)) == j){
					if(horario_dias1[j] == 0){
						horario_dias1[j] = horario_edita[i]['id_cat_jornada'];
						for(k = 0; k < cat_jornada.length; k++){
							if(cat_jornada[k][0] == Number(horario_edita[i]['id_cat_jornada'])){
								descripcion_jornada[j] = cat_jornada[k][3];		
								k = cat_jornada.length;
							}
						}
					}
					else{
						for(k = 0; k < cat_jornada.length; k++){
							if(cat_jornada[k][0] == Number(horario_edita[i]['id_cat_jornada'])){
								for(l = 0; l < cat_jornada.length; l++){
									if(cat_jornada[l][0] == horario_dias1[j]){
										hora_minuto=cat_jornada[k][1].split(":");
										epoch_entrada1 = (3600 * hora_minuto[0]) + (hora_minuto[1] * 60);

										hora_minuto2=cat_jornada[l][1].split(":");
										epoch_entrada2 = (3600 * hora_minuto2[0]) + (hora_minuto2[1] * 60);

										if(epoch_entrada1 > epoch_entrada2){
											horario_dias2[j] = horario_edita[i]['id_cat_jornada'];
											descripcion_jornada2[j] = cat_jornada[k][3];
										}
										else{
											horario_dias2[j] = horario_dias1[j];
											descripcion_jornada2[j] = descripcion_jornada[j];

											horario_dias1[j] = horario_edita[i]['id_cat_jornada'];
											descripcion_jornada[j] = cat_jornada[k][3];
										}
										l=cat_jornada.length;
									}
								}
								
								k = cat_jornada.length;
							}
						}
					}
					j = 32;
				}
			}
		}
	}
	
	llama_calendario(mes_actual, anio_actual);
}


function guardar_horario_editado(){
	$.ajax({
			type: "GET",
			url: baseUrl+'calendario/guardar_horario_editado',	
			data: { id_empleado:id_empleado_editando, id_cat_jornada:horario_dias1, id_cat_jornada2:horario_dias2, anio:anio_actual, mes:mes_actual}
	}).done(function( respuesta ) 
	{
		no_eliminar = JSON.parse(respuesta);
		if(no_eliminar.length == 0){
			alert("Horario editado correctamente");
		}
		else{
			alert("No se pueden eliminar jornadas que ya cuentan con checados de los dias "+no_eliminar);
		}
		edita_horario(id_empleado_editando);
		//horario_edita = JSON.parse(respuesta);
		//llena_calendario_edita();
	});
}

function edita_horario(id_empleado){
	//guardar dato para poder cambiar de mes y editar
	id_empleado_editando = id_empleado;
	element = document.getElementById("guardar_horario_editado");
	element.style.display='inline-block';
	
	$.ajax({
			type: "GET",
			url: baseUrl+'calendario/consulta_horario',	
			data: { id_empleado:id_empleado}
	}).done(function( respuesta ) 
	{
		horario_edita = JSON.parse(respuesta);
		llena_calendario_edita();
	});
}

function tabla_lista(){
	var div_horarios = document.getElementById(example);
	//var lista_empleados=$(".lista_empleados");
	var pinta_lista = "";
	if(bandera_lista == true){
		//pinta_lista = pinta_lista + "<div class='table-responsive'><table id='lista_empleados' class='table table-striped table-bordered m-b-none' data-ride='datatables_1'><thead><tr><th>Nombre de empleado</th><th>Asigna Horario</th></tr></thead><tbody>";
		//pinta_lista = pinta_lista + "<table id='lista_empleados' class='table table-striped table-bordered' cellspacing='0' width='100%' ><thead><tr><th>Nombre de empleado</th><th>Asigna Horario</th></tr></thead><tbody>";
		//pinta_lista = pinta_lista + "<table id='lista_empleados' class='table table-striped table-bordered' cellspacing='0' width='100%' ><thead><tr><th>Nombre de empleado</th><th>Asigna Horario</th></tr></thead><tbody>";
		pinta_lista = pinta_lista + "<thead><tr><th>Nombre de empleado</th><th>Asigna Horario</th></tr></thead><tbody>";
		for(i = 0; i < empleados_sin_horario.length; i++){
			for(j = 0; j < catalogo_empleados.length; j++){
				if(empleados_sin_horario[i] == catalogo_empleados[j]['id_empleado']){
					pinta_lista = pinta_lista + "<tr><td>" + catalogo_empleados[j]['nombre'] + " " + catalogo_empleados[j]['ap_paterno'] + " " + catalogo_empleados[j]['ap_materno'] + "</td><td><button id='actualiza_lista' onclick='actualiza_lista(" + catalogo_empleados[j]['id_empleado'] + ")'>Guardar horario</button></td></tr>";
					j=catalogo_empleados.length;
				}				
			}
		}
	}
	else{
		//pinta_lista = pinta_lista + "<table id='lista_empleados' class='table table-striped table-bordered' cellspacing='0' width='100%' ><thead><tr><th>Nombre de empleado</th><th>Edita Horario</th></tr></thead><tbody>";
		pinta_lista = pinta_lista + "<thead><tr><th>Nombre de empleado</th><th>Edita Horario</th></tr></thead><tbody>";
		//pinta_lista = pinta_lista + "<div class='table-responsive'><table class='table table-striped table-bordered m-b-none' data-ride='datatables_1'><tr>Empleados con horario asignado</tr><tr><th>Nombre de empleado</th><th>Edita Horario</th></tr>";
		for(i = 0; i < empleados_con_horario.length; i++){
			for(j = 0; j < catalogo_empleados.length; j++){
				if(empleados_con_horario[i] == catalogo_empleados[j]['id_empleado']){
					pinta_lista = pinta_lista + "<tr><td>" + catalogo_empleados[j]['nombre'] + " " + catalogo_empleados[j]['ap_paterno'] + " " + catalogo_empleados[j]['ap_materno'] + "</td><td><button onclick='edita_horario(" + catalogo_empleados[j]['id_empleado'] + ")'>Editar horario</button></td></tr>";
					j=catalogo_empleados.length;
				}				
			}
		}
	}
	pinta_lista = pinta_lista + "</tbody>";
	//lista_empleados.html(pinta_lista);
	//pinta_lista = pinta_lista + "<script>var tabla = document.getElementById(lista_emp);tabla.DataTable();</script>"
	example.innerHTML=pinta_lista;
	//var tabla = document.getElementById(lista_emp);
	//tabla.DataTable();
}

function generar_lista(){
	var id_empleados = [];
	var horarios_empleados = [];
	empleados_con_horario = [];
	empleados_sin_horario = [];
	if(mes_actual == ""){
		mes_temp = fecha_actual.getMonth();
		anio_actual = fecha_actual.getFullYear();
		mes_temp = Number(mes_temp)+1;
		if(mes_temp < 10){
			mes_temp = "0"+mes_temp;
		}
	}
	else{
		mes_temp = Number(mes_actual);
	}
	
	//console.log(mes_temp, anio_actual);
	/*for(i = 0; i < catalogo_empleados.length; i++){
		id_empleados[i] = catalogo_empleados[i]['id_empleado'];
	}*/	
	//console.log(id_empleados);
	//var data = ;
	$.ajax(
	{
		type: "POST",
		url: baseUrl+'calendario/empleados_horario_mes',
		data:  { mes_actual:mes_temp, anio_actual:anio_actual, id_user_enlace:id_user_enlace}
		}).done(function( respuesta ) 
			{
				empleados_con_horario = JSON.parse(respuesta);

				for(i = 0; i < catalogo_empleados.length;i++){
					//console.log(id_empleados[i], mes_actual, anio_actual)
					if(empleados_con_horario.indexOf(catalogo_empleados[i]['id_empleado']) == -1){
						empleados_sin_horario.push(catalogo_empleados[i]['id_empleado']);
					}
				}
			//console.log(empleados_con_horario);

			//console.log(JSON.parse(respuesta));

				tabla_lista();
			});
		/*success: function(respuesta){
			console.log(respuesta);
			if(respuesta.length == 0){
				empleados_sin_horario = id_empleados;	
			}
			else{
				for(i = 0; i < respuesta[0].length; i++){
					empleados_con_horario.push(respuesta[0][i]['id_empleado']);
				}
				for(i = 0; i < respuesta[1].length; i++){
					empleados_sin_horario.push(respuesta[1][i]['id_empleado']);
				}
			}
			tabla_lista();
		},
		error: function(respuesta){
			console.log("mensaje error", respuesta);
		}
	});*/
}

function generar_lista_empleados(empleados, id_enlace){
	catalogo_empleados=empleados;
	id_user_enlace = id_enlace;
	generar_lista();	
}

function generar_editar1(){
	limpia_calendario();
	element = document.getElementById("guardar_horario_editado");
	element.style.display='none';
	boton_generar = document.getElementById("generar_horario");
	boton_editar = document.getElementById("editar_horario");
	boton_generar.style.display='none';
	boton_editar.style.display='inline';
	bandera_lista = true;
	tabla_lista();
}

function generar_editar2(){
	
	id_empleado_editando = 0;
	boton_generar = document.getElementById("generar_horario");
	boton_editar = document.getElementById("editar_horario");
	boton_generar.style.display='inline'; 
	boton_editar.style.display='none';
	bandera_lista = false;
	tabla_lista();
	limpia_calendario();
}

function cat_mes(){
	var select_mes = document.getElementById("repeticion_hasta_mes");
	var catalogo_mes=["", "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre",];
	var pinta_texto = "";
	
	if(mes_actual == ""){
		mes_temp = fecha_actual.getMonth();
		anio_actual = fecha_actual.getFullYear();
		mes_temp = Number(mes_temp)+1;
		if(mes_temp < 10){
			mes_temp = "0"+mes_temp;
		}
	}
	else{
		mes_temp = Number(mes_actual);
	}

	for(i = Number(mes_temp)+1; i <= 12; i++){
		pinta_texto = pinta_texto + "<option value='" + i + "'>" + catalogo_mes[i] + "</option>"	
	}						
	select_mes.innerHTML = pinta_texto;
}