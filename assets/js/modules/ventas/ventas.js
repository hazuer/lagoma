/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
let oTable ='';
let dataPG =[];
let totalG = '';
+function ($) { "use strict";
//let oTable ='';
	$(function(){
		//$('#tbl-product').each(function() {
		oTable = $('#tbl-product').DataTable({
			"dom": '<"top"f>rt<"bottom"pi><"clear">',
			"scrollCollapse": false,
			"paging": false,
			"scrollX": false,
			"columns" : [
				{title: `cantidad`, name      : `id`, data           : `id`},
				{title: `codigo`, name    : `name`, data         : `name`},
				{title: `descipcion`, name : `content`, data      : `content`},
				{title: `pu`, name    : `type_business`, data: `type_business`},
				{title: `importe`, name: `pdate`, data        : `pdate`},
				//{title: `Unp date`, name: `udate`, data        : `udate`},
				//{title: `Shared`, name: `slink`, data: `slink`}
			],
			"columnDefs": [
				{"orderable": false,'targets': 0,'checkboxes': {'selectRow': true}},
				//{ "targets": [3,4,5,6], visible   : false, searchable: false, orderable: false},
				{ "orderable": false,"targets": 5 }
			],
			'select': {
				'style': 'multi'
			},
			'order': [[1, 'asc']]
			});
		//});
		let addProduct     = $('#addProduct');
		let cantidad       = $('#cantidad');
		let codigo         = $('#codigo');
		let description    = $('#description');
		let precioUnitario = $('#precioUnitario');
		let importe        = $('#importe');
		let spTotal          = $('#spTotal').html('0.00 MXN');
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

			//$('#tbl-product').dataTable().clear().draw();
			//$('#tbl-product').DataTable();
			oTable.clear().draw();

			$('#tbl-product_wrapper').show();
			let t = parseFloat(0);
			dataP.forEach(element => {
				tblElemets += '<tr>';
				tblElemets += '<td>' + element.cantidad + '</td>';
				tblElemets += '<td>' + element.codigo + '</td>';
				tblElemets += '<td>' + element.description + '</td>';
				tblElemets += '<td>' + element.pu + '</td>';
				tblElemets += '<td>' + element.importe + '</td>';
				tblElemets += '<td> </td>';
				tblElemets += '</tr>';
				t=parseFloat(t+(element.cantidad*element.pu));
			});
			spTotal.html(t.toLocaleString("es", {
				style: "currency",
				currency: "MXN"
			}));
			$('#total').val(t);
			
	
			//$('#tbl-product tbody').parents('tbody').empty();
			$('.odd').hide();
			$('#tbl-product tbody').append(tblElemets);
	
			//reset form add
			cantidad.val('1');
			codigo.val('');
			codigo.focus();
			description.val('');
			precioUnitario.val('');
			importe.val('');
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
		//let c = parseFloat(cantidad.val());
		//let pu = parseFloat($(this).data("precioneto"));
		precioUnitario.val(pu);
		importe.val(imp);
		
		lbPrecioUnitario.html(pu);
		lbImporte.html(imp);
	}

	
	$('#btn-modal').click(function(e){
		console.log('cccc');
		let amount = $('#amount');
		console.log($('#total').val());
		amount.val($('#total').val());
	});

	$('#btn-pay').click(function(e){
		let efectivo = $('#efectivo');
	
		if( efectivo.val()==''){
			swal("Attention!", "Required fields (*)", "warning");
			return false;
		}
	
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

