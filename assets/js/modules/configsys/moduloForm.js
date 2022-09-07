/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

//Valida alta y edición de modulos
$(document).ready(function() {
    let  validaModulo = $("#validaModulo");
    validaModulo.formValidation ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            modulo: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir el nombre del modulo'
                    }
                }
            },
            desc_modulo: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir una descripción del modulo'
                    }
                }
            },
            urlControlador: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir el nombre o la url del controlador'
                    }
                }
            },
            icono: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir el nombre del icono'
                    }
                }
            }
        }
    });

});

let id_system_modulos = $('#id_system_modulos');
let action            = $('#action');
let modulo            = $('#modulo');
let desc_modulo       = $('#desc_modulo');
let urlControlador    = $('#urlControlador');
let icono             = $('#icono');
let classColor        = $('#classColor');

function sendData(){

    if( modulo.val()=='' || desc_modulo.val()=='' || urlControlador.val()=='' || icono.val()==''){
        swal("Attention!", "Required fields (*)", "warning");
        return false;
    }

    let formData = new FormData();
    formData.append('id_system_modulos',id_system_modulos.val());
    formData.append('action',action.val());
    formData.append('modulo',modulo.val());
    formData.append('desc_modulo',desc_modulo.val());
    formData.append('urlControlador',urlControlador.val());
    formData.append('icono',icono.val());
    formData.append('classColor',classColor.val());
    $.ajax({
        url        : 'moduloAction',
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
                   window.location.href = "modulosLs";
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