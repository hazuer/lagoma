/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */
let oTable ='';
+function ($) { "use strict";
//let oTable ='';
	$(function(){
		$('#tbl-product').each(function() {
		oTable = $(this).dataTable({
			"scrollX": true,
			"columns" : [
				{title: `cantidad`, name      : `id`, data           : `id`},
				{title: `codigo`, name    : `name`, data         : `name`},
				{title: `descripcion`, name : `content`, data      : `content`},
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
		});
	});
}(window.jQuery);

let dataPG =[];
$(document).ready(function() {

    let dataP = [];
    let element = {};
    let addProduct =$("#addProduct");

    addProduct.click(function(e){
		console.log('addProduct');
        element.cantidad = 1;
        element.codigo = '65432';
        element.descripcion = 'Lapiz';
        element.pu = '1.00';
        element.importe = '1.00';
        dataP.push(element);
        console.log(dataP);
        dataPG=dataP;

		let employee_data = '';
	
		$('#tbl-product tbody').append('');
		
		dataPG.forEach(element => {
			console.log(element);
            employee_data += '<tr>';
			employee_data += '<td> </td>';
            employee_data += '<td>' + element.cantidad + '</td>';
            employee_data += '<td>' + element.codigo + '</td>';
            employee_data += '<td>' + element.descripcion + '</td>';
            employee_data += '<td>' + element.pu + '</td>';
            employee_data += '<td>' + element.importe + '</td>';
            employee_data += '</tr>';
		});
		
		$('#tbl-product tbody').append(employee_data);

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

