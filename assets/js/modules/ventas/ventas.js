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
	
		
	let dataP = [];
    
    let addProduct =$("#addProduct");

	let cantidad =$('#cantidad');
	let codigo =$('#codigo');
	let descipcion =$('#descipcion');
	let pu =$('#pu');
	let importe =$('#importe');

    addProduct.click(function(e){
		let element = {};
		console.log('addProduct');
        element.cantidad = cantidad.val();
        element.codigo = codigo.val();
        element.descipcion = descipcion.val();
        element.pu = pu.val();
        element.importe = importe.val();
        dataP.push(element);
        console.log(dataP);
        dataPG=dataP;


		totalG = parseFloat(totalG) + parseFloat(element.importe);
		console.log(totalG);
		$("#totalg").html(totalG);

		let tblElemets = '';
	
		//$('#tbl-product').dataTable().clear().draw();
		//$('#tbl-product').DataTable();
		console.log(oTable);
		oTable.clear().draw();
		
		$('#tbl-product_wrapper').show();
		dataP.forEach(element => {
			console.log(element);
            tblElemets += '<tr>';
            tblElemets += '<td>' + element.cantidad + '</td>';
            tblElemets += '<td>' + element.codigo + '</td>';
            tblElemets += '<td>' + element.descipcion + '</td>';
            tblElemets += '<td>' + element.pu + '</td>';
            tblElemets += '<td>' + element.importe + '</td>';
			tblElemets += '<td> </td>';
            tblElemets += '</tr>';
		});

		//$('#tbl-product tbody').parents('tbody').empty();
		$('.odd').hide();
		$('#tbl-product tbody').append(tblElemets);

		//reset form add
		cantidad.val('1');
		codigo.val('');
		codigo.focus();
		descipcion.val('');
		pu.val('');
		importe.val('');
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
}(window.jQuery);


$(document).ready(function() {
	$('#tbl-product_wrapper').hide();
    $('.odd').hide();

	$("#descipcion").keyup(function () {
        $.ajax({
            type: "POST",
            url: "ventas/GetCountryName",
            data: {
                keyword: $("#descipcion").val()
            },
            dataType: "json",
            success: function (data) {
                if (data.length > 0) {
                    $('#DropdownDescripcion').empty();
                    $('#descipcion').attr("data-toggle", "dropdown");
                    $('#DropdownDescripcion').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#descipcion').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownDescripcion').append('<li role="displayCountries" ><a role="menuitem DropdownDescripcionli" class="dropdownlivalue" data-idinventario="'+value['idInventario']+'" data-precioneto="'+value['precioNeto']+'">' + value['articulo'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtDescripcion').on('click', 'li a', function () {
        $('#descipcion').val($(this).text());
		$('#codigo').val($(this).data("idinventario"));
		$('#pu').val($(this).data("precioneto"));
		let c = $('#cantidad').val();
		let pu= $(this).data("precioneto");
		let importe = c*pu;
		$('#lpreciou').html(pu);
		$('#limporte').html(importe);
		$('#importe').val(importe);
		
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
                    $('#codigo').attr("data-toggle", "dropdown");
                    $('#DropdownCodigo').dropdown('toggle');
                }
                else if (data.length == 0) {
                    $('#codigo').attr("data-toggle", "");
                }
                $.each(data, function (key,value) {
                    if (data.length >= 0)
                        $('#DropdownCodigo').append('<li role="displayCountries" ><a role="menuitem DropdownCodigoli" class="dropdownlivalue" data-articulo="'+value['articulo']+'" data-precioneto="'+value['precioNeto']+'">' + value['idInventario'] + '</a></li>');
                });
            }
        });
    });
    $('ul.txtCodigo').on('click', 'li a', function () {
        $('#codigo').val($(this).text());
		console.log($(this).data("articulo"));
		console.log($(this).data("precioneto"));
		$('#descipcion').val($(this).data("articulo"));
		$('#pu').val($(this).data("precioneto"));
		let c = $('#cantidad').val();
		let pu= $(this).data("precioneto");
		let importe = c*pu;
		$('#lpreciou').html(pu);
		$('#limporte').html(importe);
		$('#importe').val(importe);
    });

});

