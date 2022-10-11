/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

//Valida alta y edición de modulos
$(document).ready(function() {
    let  idInventarioForm = $("#idInventarioForm");
    idInventarioForm.formValidation ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            codigo_barras: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa codigo barras'
                    }
                }
            },
            cantidad: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa cantidad'
                    }
                }
            },
            articulo: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa articulo'
                    }
                }
            },
            precioNeto: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa precio neto'
                    }
                }
            },
            
        }
    });
$('#codigo_barras').focus();
});

let idInventario = $('#idInventario');
let action            = $('#action');
let codigo_barras            = $('#codigo_barras');
let cantidad            = $('#cantidad');
let articulo       = $('#articulo');
let precioNeto    = $('#precioNeto');
let puCompra             = $('#puCompra');
let stock_min        = $('#stock_min');
let estatus        = $('#estatus');

function sendData(){

    if( codigo_barras.val()=='' || cantidad.val()=='' || articulo.val()=='' || precioNeto.val()==''){
        swal("Atención!", "Campos requeridos (*)", "warning");
        return false;
    }

    let formData = new FormData();
    formData.append('idInventario',idInventario.val());
    formData.append('action',action.val());
    formData.append('codigo_barras',codigo_barras.val());
    formData.append('cantidad',cantidad.val());
    formData.append('articulo',articulo.val());
    formData.append('precioNeto',precioNeto.val());
    formData.append('puCompra',puCompra.val());
    formData.append('stock_min',stock_min.val());
    formData.append('estatus',estatus.val());
    $.ajax({
        url        : 'inventario/inventarioAction',
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
            swal.close();
           if(response.success==='true'){
                swal('Exito', response.info, "success");
                setTimeout(function(){
                   window.location.href = "inventario";
                }, 1000);
                return false;
            }else{
                swal('Error', response.info, "warning");
            }
        }).fail(function(e) {
            console.log("error",e);
        });

}

const showSwal = () => {
    swal({
        title            : "Procesando...",
        text             : "Espere por favor",
        icon             : "../assets/images/ajax-loader.gif",
        showConfirmButton: false,
        allowOutsideClick: false
    });
}