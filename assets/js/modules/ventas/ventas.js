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
			"scrollX": false,
			"columns" : [
				{title: `Cantidad`, name      : `id`, data           : `id`},
				{title: `Codigo`, name    : `name`, data         : `name`},
				{title: `Description`, name : `content`, data      : `content`},
				{title: `Precio Unitario`, name    : `type_business`, data: `type_business`},
				{title: `Importe`, name: `pdate`, data        : `pdate`},
			],
			"columnDefs": [
				{"orderable": false,'targets': 0,'checkboxes': {'selectRow': true}},
				{ "orderable": false,"targets": 5 }
			],
			'select': {
				'style': 'multi'
			},
			'order': [[1, 'asc']]
			});
		let addProduct     = $('#addProduct');
		let cantidad       = $('#cantidad');
		let codigo         = $('#codigo');
		let description    = $('#description');
		let precioUnitario = $('#precioUnitario');
		let importe        = $('#importe');
		let lbPrecioUnitario = $('#lbPrecioUnitario');
		let lbImporte      = $('#lbImporte');
		let lbTotal        = $('#lbTotal').html('0.00');
		let dataP = [];

		addProduct.click(function(e){
			let element = {};
			element.cantidad = cantidad.val();
			element.codigo = codigo.val();
			element.description = description.val();
			element.pu = precioUnitario.val();
			element.importe = importe.val();
			dataP.push(element);
			//console.log(dataP);
			dataPG=dataP;

			let tblElemets = '';

			oTable.clear().draw();

			$('#tbl-product_wrapper').show();
			let t = parseFloat(0);
			dataP.forEach(element => {
				tblElemets += '<tr>';
				tblElemets += '<td>' + element.cantidad + '</td>';
				tblElemets += '<td>' + element.codigo + '</td>';
				tblElemets += '<td>' + element.description + '</td>';
				tblElemets += '<td>' + '$'+Number(element.pu).toFixed(2) + '</td>';
				tblElemets += '<td>' + '$'+Number((element.cantidad*element.pu)).toFixed(2)+ '</td>';
				tblElemets += '<td> </td>';
				tblElemets += '</tr>';
				t=parseFloat(t+(element.cantidad*element.pu));
			});
			lbTotal.html(Number(t).toFixed(2));
			$('#total').val(t);

			$('.odd').hide();
			$('#tbl-product tbody').append(tblElemets);

			//reset form add
			cantidad.val('1');
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

	let cantidad       = $('#cantidad');
	let codigo         = $('#codigo');
	let description    = $('#description');
	let precioUnitario = $('#precioUnitario');
	let importe        = $('#importe');
	description.keyup(function () {
        $.ajax({
            type: "POST",
            url: "ventas/GetCountryName",
            data: {
                keyword: description.val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownDescripcion').empty();
                    description.attr("data-toggle", "dropdown");
                    $('#DropdownDescripcion').dropdown('toggle');
                }
                else if (data.length == 0) {
                    description.attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownDescripcion').append('<li role="displayCountries" ><a role="menuitem DropdownDescripcionli" class="dropdownlivalue" data-idinventario="'+value['idInventario']+'" data-precioneto="'+value['precioNeto']+'">' + value['articulo'] + '</a></li>');
                });
            }
        });
    });

    $('ul.txtDescripcion').on('click', 'li a', function () {
		let cant = parseFloat(cantidad.val());
		let cod= $(this).data("idinventario");
        let desc=$(this).text();
		let pu = parseFloat($(this).data("precioneto"));
		fillClicProduct(cant,cod,desc,pu);
    });

	$("#codigo").keyup(function () {
        $.ajax({
            type: "POST",
            url: "ventas/getCodeB",
            data: {
                keyword: $("#codigo").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownCodigo').empty();
                    codigo.attr("data-toggle", "dropdown");
                    $('#DropdownCodigo').dropdown('toggle');
                }
                else if (data.length == 0) {
                    codigo.attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCodigo').append('<li role="displayCountries" ><a role="menuitem DropdownCodigoli" class="dropdownlivalue" data-articulo="'+value['articulo']+'" data-precioneto="'+value['precioNeto']+'">' + value['idInventario'] + '</a></li>');
                });
            }
        });
    });

    $('ul.txtCodigo').on('click', 'li a', function () {
		let cant = parseFloat(cantidad.val());
        let cod  = $(this).text();
		let desc = $(this).data("articulo");
		let pu   = parseFloat($(this).data("precioneto"));

		fillClicProduct(cant,cod,desc,pu);
    });

	function fillClicProduct(cant, cod, desc, pu){
		let imp = parseFloat(cant*pu);
		codigo.val(cod);
		description.val(desc);
		precioUnitario.val(pu);
		importe.val(imp);

		lbPrecioUnitario.html('$'+Number(pu).toFixed(2));
		lbImporte.html('$'+Number(imp).toFixed(2));
	}

	$('#btn-modal').click(function(e){
		$('#efectivo').val('');
		$('#nota').val('');
		$('#lbCambio').html('$0.00');
		let lbMTotal = $('#lbMTotal');
		lbMTotal.html('$'+Number($('#total').val()).toFixed(2));
		console.log($('#total').val());
		$('#mTotal').val(Number($('#total').val()).toFixed(2));
	});

	$('#efectivo').keyup(function(e){
		console.log('here press');
		console.log($(this).val());
		let mt=$('#mTotal').val();
		let cap = $(this).val();
		let cambio = parseFloat(cap-mt);
		console.log(cambio);
		$('#lbCambio').html('$'+Number(cambio).toFixed(2));
	});

	$('#btn-pay').click(function(e){
		let efectivo = $('#efectivo');

		if( efectivo.val()==''){
			swal("Attention!", "Required fields (*)", "warning");
			return false;
		}

		swal("Gracias por su compra", "Su cambio $23.00 \n Regrese pronto", "success");
		console.log('continue');
		console.log(dataPG);

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

