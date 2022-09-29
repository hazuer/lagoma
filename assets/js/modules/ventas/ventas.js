/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
let oTable ='';
let dataPG =[];
let totalG = '';
+function ($) { "use strict";
	$(function(){
		oTable = $('#tbl-product').DataTable({
			"dom": '<"top"f>rt<"bottom"pi><"clear">',
			"scrollCollapse": false,
			"paging": false,
			"searching": false,
			//"scrollX": false,
			"columns" : [
				{title: `Id`, name    : `name`, data         : `name`},
				{title: `Codigo`, name    : `name`, data         : `name`},
				{title: `Description`, name : `content`, data      : `content`},
				{title: `Cantidad`, name      : `id`, data           : `id`},
				{title: `Precio Unitario`, name    : `type_business`, data: `type_business`},
				{title: `Importe`, name: `pdate`, data        : `pdate`},
			],
			"columnDefs": [
				//{"orderable": false,'targets': 0,'checkboxes': {'selectRow': true}},
				{ "orderable": false,"targets": 0 },
				{ "orderable": false,"targets": 1 },
				{ "orderable": false,"targets": 2 },
				{ "orderable": false,"targets": 3 },
				{ "orderable": false,"targets": 4 }
			],
			'select': {
				'style': 'multi'
			},
			//'order': [[1, 'asc']]
			});
		let addProduct     = $('#addProduct');
		let cantidad       = $('#cantidad');
		let codigo         = $('#codigo');
		let idInventario        = $('#idInventario');
		let description    = $('#description');
		let precioUnitario = $('#precioUnitario');
		let importe        = $('#importe');
		let lbPrecioUnitario = $('#lbPrecioUnitario');
		let lbImporte      = $('#lbImporte');
		let lbTotal        = $('#lbTotal').html('0.00');
		let dataP = [];

		addProduct.click(function(e){
			if(cantidad.val()=='' || codigo.val()=='' || description.val()=='' || precioUnitario.val()=='' || importe.val()=='' || idInventario.val()==''){
				swal("Atención!", "Debes agregar o seleccionar un producto del inventario", "warning");
				return false;
			}
			let element = {};
			element.cantidad = cantidad.val();
			element.idInventario = idInventario.val();
			element.codigo = codigo.val();
			element.description = description.val();
			element.pu = precioUnitario.val();
			element.importe = importe.val();
			dataP.push(element);
			dataPG=dataP;

			let tblElemets = '';

			oTable.clear().draw();

			$('#tbl-product_wrapper').show();
			let t = parseFloat(0);
			dataP.forEach(element => {
				tblElemets += '<tr>';
				tblElemets += '<td>' + element.idInventario + '</td>';
				tblElemets += '<td>' + element.codigo + '</td>';
				tblElemets += '<td>' + element.description + '</td>';
				tblElemets += '<td>' + element.cantidad + '</td>';
				tblElemets += '<td>' + '$'+Number(element.pu).toFixed(2) + '</td>';
				tblElemets += '<td>' + '$'+Number((element.cantidad*element.pu)).toFixed(2)+ '</td>';
				tblElemets += '</tr>';
				t=parseFloat(t+(element.cantidad*element.pu));
			});
			$('#tbl-product_info').hide();
			lbTotal.html(Number(t).toFixed(2));
			$('#total-show').val(t);

			$('.odd').hide();
			$('#tbl-product tbody').append(tblElemets);

			//reset form add
			cantidad.val('1');
			idInventario.val('');
			codigo.val('');
			codigo.focus();
			description.val('');
			precioUnitario.val('');
			importe.val('');
			lbPrecioUnitario.html('$0.00');
			lbImporte.html('$0.00');
		});

	});
	
}(window.jQuery);


$(document).ready(function() {

	let lbPrecioUnitario = $('#lbPrecioUnitario').html('$0.00');
	let lbImporte        = $('#lbImporte').html('$0.00');

	$('#tbl-product_wrapper').hide();
    $('.odd').hide();
	$('#tbl-product_info').hide();

	let cantidad       = $('#cantidad');
	let codigo         = $('#codigo');
	let description    = $('#description');
	let precioUnitario = $('#precioUnitario');
	let importe        = $('#importe');
	let idInventario        = $('#idInventario');

	description.keyup(function () {
		console.log(description.val());
        $.ajax({
            type: "POST",
            url: "ventas/GetCountryName",
            data: {
                keyword: description.val()
            },
            dataType: "json",
            success: function (data) {
				console.log(data.length);
                if (data.length > 0) {
					console.log('mayor a 0');
                    $('#DropdownDescripcion').empty();
                    description.attr("data-toggle", "dropdown");
                    $('#DropdownDescripcion').dropdown('toggle');
                }
                else if (data.length == 0) {
					console.log('igual a 0');
                    description.attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
					console.log('each',value['articulo']);
                    if (data.length >= 0)
                        $('#DropdownDescripcion').append('<li role="displayCountries" ><a role="menuitem DropdownDescripcionli" class="dropdownlivalue" data-idinventario="'+value['idInventario']+'" data-precioneto="'+value['precioNeto']+'" data-codigobarras="'+value['codigo_barras']+'" data-idinventario="'+value['idInventario']+'">' + value['articulo'] + '</a></li>');
                });
				/*let x=description.val();
				if (x.length % 2 == 0){
				console.log('even');
				}
				else{
				console.log('odd');
				$('#description').click();
				}*/
				/*setTimeout(function(){
					$('#description').click();
				 }, 50);*/
				
            },complete: function(data) {
				console.log("SEMPRE FUNFA!");
				/*setTimeout(function(){
					$('#description').click();
				 }, 500);*/
			}
        });
    });


	$("#description").change(function () {
		precioUnitario.val('');
		importe.val('');
		lbPrecioUnitario.html('$0.00');
		lbImporte.html('$0.00');
	});
	$("#codigo").change(function () {
		precioUnitario.val('');
		importe.val('');
		lbPrecioUnitario.html('$0.00');
		lbImporte.html('$0.00');
	});

	$("#cantidad").keyup(function () {
		if($(this).val()==0){
			$("#cantidad").val(1);
		}

		if(precioUnitario.val()!='' && importe.val()!=''){
			console.log('recalcular keyup');
			let cant = parseFloat(cantidad.val());
			let pu = parseFloat(precioUnitario.val());
			let imp = parseFloat(cant*pu);
			importe.val(imp);
			lbPrecioUnitario.html('$'+Number(pu).toFixed(2));
			lbImporte.html('$'+Number(imp).toFixed(2));
		}
	});

	$("#cantidad").change(function () {
		if($(this).val()==0){
			$("#cantidad").val(1);
		}

		if(precioUnitario.val()!='' && importe.val()!=''){
			console.log('recalcular change');
			let cant = parseFloat(cantidad.val());
			let pu = parseFloat(precioUnitario.val());
			let imp = parseFloat(cant*pu);
			importe.val(imp);
			lbPrecioUnitario.html('$'+Number(pu).toFixed(2));
			lbImporte.html('$'+Number(imp).toFixed(2));
		}
	});

    $('ul.txtDescripcion').on('click', 'li a', function () {
		let cant = parseFloat(cantidad.val());
		let cod= $(this).data("codigobarras");
        let desc=$(this).text();
		let pu = parseFloat($(this).data("precioneto"));
		let idInv = $(this).data("idinventario");
		fillClicProduct(cant,cod,desc,pu,idInv);
    });

	$("#codigo").keyup(function () {
		console.log($("#codigo").val());
        $.ajax({
            type: "POST",
            url: "ventas/getCodeB",
            data: {
                keyword: $("#codigo").val()
            },
            dataType: "json",
            success: function (data) {
				console.log(data.length);
                if (data.length > 0) {
					console.log('mayor a 0');
                    $('#DropdownCodigo').empty();
                    codigo.attr("data-toggle", "dropdown");
                    $('#DropdownCodigo').dropdown('toggle');
                }
                else if (data.length == 0) {
					console.log('igual a 0');
                    codigo.attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
					console.log('each',value['articulo']);
                    if (data.length >= 0)
                        $('#DropdownCodigo').append('<li role="displayCountries" ><a role="menuitem DropdownCodigoli" class="dropdownlivalue" data-articulo="'+value['articulo']+'" data-precioneto="'+value['precioNeto']+'" data-codigobarras="'+value['codigo_barras']+'" data-idinventario="'+value['idInventario']+'">' + value['codigo_barras'] + '</a></li>');
                });
            }
        });
    });

    $('ul.txtCodigo').on('click', 'li a', function () {
		let cant = parseFloat(cantidad.val());
        let cod  = $(this).text();
		let desc = $(this).data("articulo");
		let pu   = parseFloat($(this).data("precioneto"));
		let idInv = $(this).data("idinventario");

		fillClicProduct(cant,cod,desc,pu,idInv);
    });

	function fillClicProduct(cant, cod, desc, pu,idInv){
		let imp = parseFloat(cant*pu);
		codigo.val(cod);
		description.val(desc);
		precioUnitario.val(pu);
		importe.val(imp);
		idInventario.val(idInv);

		lbPrecioUnitario.html('$'+Number(pu).toFixed(2));
		lbImporte.html('$'+Number(imp).toFixed(2));
		cantidad.focus();

	}

	$('#btn-modal-cobro').click(function(e){
		console.log('total',$('#total-show').val());
		if($('#total-show').val()==''){
			swal("Atención!", "No es posible efectuar el cobro por $0.00 pesos", "warning");
			return false;
		}
		$('#efectivo').val('');
		$('#nota').val('');
		$('#lbCambio').html('$0.00');
		$('#cambio').val('');
		let lbMTotal = $('#lbMTotal');
		lbMTotal.html('$'+Number($('#total-show').val()).toFixed(2));
		$('#mTotal').val(Number($('#total-show').val()).toFixed(2));
		setTimeout(() => {
			$('#efectivo').focus();
		}, "500");
	});

	$('#efectivo').keyup(function(e){
		console.log('here press key up');
		console.log($(this).val());
		let mt=$('#mTotal').val();
		let cap = $(this).val();
		if(cap==''){
			$('#lbCambio').html('$0.00');
			return false;
		}
		let cambio = parseFloat(cap-mt);
		console.log(cambio);
		$('#lbCambio').html('$'+Number(cambio).toFixed(2));
		$('#cambio').val(Number(cambio).toFixed(2));
	});
	$('#efectivo').change(function(e){
		console.log('here change');
		console.log($(this).val());
		let mt=$('#mTotal').val();
		let cap = $(this).val();
		if(cap==''){
			$('#lbCambio').html('$0.00');
			return false;
		}
		let cambio = parseFloat(cap-mt);
		console.log(cambio);
		$('#lbCambio').html('$'+Number(cambio).toFixed(2));
		$('#cambio').val(Number(cambio).toFixed(2));
	});

	$('#btn-pay').click(function(e){
		let efectivo = $('#efectivo');
		let cambio = $('#cambio');

		if( efectivo.val()==''){
			swal("Atención!", "Ingresa el efectivo", "warning");
			return false;
		}

		let p = Math.sign(cambio.val());
		console.log(p);
		if( p==-1){
			swal("Atención!", "Pago incompleto, favor de verificar", "warning");
			return false;
		}
		let pagoP =0;
		if($("#pagoP").is(':checked')){
			pagoP=1;
		}
		let detalle = JSON.stringify(dataPG);
		let formData = new FormData();
		formData.append('total',$('#mTotal').val());
		formData.append('efectivo',$('#efectivo').val());
		formData.append('cambio',$('#cambio').val());
		formData.append('nota',$('#nota').val());
		formData.append('detalle',detalle);
		formData.append('pagop',pagoP);

		$.ajax({
			url: "ventas/store",
			type       : 'POST',
			data       : formData,
			cache      : false,
			contentType: false,
			processData: false,
			beforeSend: function() {
			  showSwal();
			  $('.swal-button-container').hide();
			}
		  })
		  .done(function(response) {
			//console.log(response);
				swal.close();
			   if(response.success==='true'){
				
				let msjCambio='Regrese pronto';
				if($('#cambio').val()!='0.00'){
					msjCambio="Su cambio $"+cambio.val()+" \n Regrese pronto";
				}
				console.log(msjCambio);
					//swal("Gracias por su compra",msjCambio +'<div id="newv"></div>', "success");
					/*setTimeout(function(){
					   window.location.href = "ventas";
					}, 5000);*/
					//$('.swal-button-container').hide();
					/*swal({
						title: 'Gracias por su compra',
						text: msjCambio,
						type: 'success',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'new vent!'
					  }).then(function() {
						swal(
						  'Deleted!',
						  'Your file has been deleted.',
						  'success'
						)
					  });*/
					  $("#exampleModal").modal('hide');
					  swal({
						icon: "success",
						title: 'Gracias por su compra',
						text: msjCambio,
						closeOnClickOutside: false,
						closeOnEsc: false,
						buttons: {
							newventa: {
							  text: "Nueva venta",
							  value: "newventa",
							},
						  }
					  }).then(function() {
						/*swal(
						  'Deleted!',
						  'Your file has been deleted.',
						  'success'
						)*/
						window.location.href = "ventas";
					  });
					
					return false;
				}else{
					swal('Error', response.info, "warning");
				}
			}).fail(function(e) {
				console.log("error",e);
			});

		
		//console.log('continue');
		//console.log(dataPG);

	});

	$('.swal-button--newventa').click(function(e){
		console.log('reload');
	});

	const showSwal = () => {
		swal({
			title            : "Procesando...",
			text             : "Espere por favor",
			icon             : "../assets/images/ajax-loader.gif",
			showConfirmButton: false,
			allowOutsideClick: false
		});
	}

});

