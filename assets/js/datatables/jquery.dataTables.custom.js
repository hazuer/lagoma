+function ($) { "use strict";

  $(function(){
 
$('[data-ride="dataTablesCustom"]').each(function () {
            var oTable = $(this).dataTable({
                
                "dom": '<"top"f>rt<"bottom"pi><"clear">',
                //"scrollY": "100%",
                "scrollCollapse": false,
                "paging": false,
                "oLanguage": {
                    "sProcessing": "Procesando...",
                    "iDisplayLength": 50,
                    "sLengthMenu": "Mostrar _MENU_ registros",
                    "sZeroRecords": "No se encontraron resultados",
                    "sEmptyTable": "Ningún dato disponible en esta tabla",
                    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sSearch": "Buscar en todas las columnas:",
                    "sUrl": "",
                    "sInfoThousands": ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst": "Primero",
                        "sLast": "Último",
                        "sNext": "Siguiente <i class=\"fa fa-long-arrow-right\"></i> ",
                        "sPrevious": " <i class=\"fa fa-long-arrow-left\"></i> Anterior   "
                    },
                    "oAria": {
                        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                }

            });
        });

  });
}(window.jQuery);