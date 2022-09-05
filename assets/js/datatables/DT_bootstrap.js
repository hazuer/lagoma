$(document).ready( function () {
    $('#resultados').DataTable({
            "aLengthMenu": [[10, 25, 50, 100, 200, 300, -1], [10, 25, 50, 100, 200, 300, "todos"]],
            "oLanguage": {
            "sProcessing": "Procesando...",
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
                "sNext": "   <i class=\"glyphicon glyphicon-menu-right\"></i> ",
                "sPrevious": " <i class=\"glyphicon glyphicon-menu-left\"></i>   "
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
        
            
    });

} );

$(document).ready( function () {
    $('#nomenulength').DataTable({
            "paging":   false,
            searching: false,
            "aLengthMenu": false,            
            "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Total _TOTAL_ registros",
            "sInfoEmpty": "",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar en todas las columnas:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando..."      
        }     
            
    });

} );
$(document).ready( function () {
    $('#result').DataTable({
            paging:  false,
            searching: false,
            "aLengthMenu": false,
            "oLanguage": {
            "sProcessing": "Procesando...",        
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Total _TOTAL_ registros",
            "sInfoEmpty": "",
            "sInfoPostFix": "",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando..."      
        }     
            
    });

} );

$(document).ready( function () {
    $('#elementos').DataTable({
            paging:  true,
            searching: true,          
            "aLengthMenu": [[5, 10, 25, 50, 100, 200, 300, -1], [5, 10, 25, 50, 100, 200, 300, "todos"]],
            "oLanguage": {
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sProcessing": "Procesando...",        
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en esta tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",           
            "sInfoEmpty": "",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "   <i class=\"glyphicon glyphicon-menu-right\"></i> ",
                "sPrevious": " <i class=\"glyphicon glyphicon-menu-left\"></i>   "
            }
        } 
        
            
    });

} );

$(document).ready( function () {
    $('#revalidacion').DataTable({
            "aLengthMenu": [[-1], []],
            "oLanguage": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "",
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
                "sNext": "   <i class=\"glyphicon glyphicon-menu-right\"></i> ",
                "sPrevious": " <i class=\"glyphicon glyphicon-menu-left\"></i>   "
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        }
             
            
    });

} );