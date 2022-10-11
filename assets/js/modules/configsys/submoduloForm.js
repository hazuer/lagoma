//Validar alta y edicion de submodulos
$(document).ready(function(){
    let validaSubmodulo = $("#validaSubmodulo");
    validaSubmodulo.formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            id_modulo: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar el modulo'
                    }
                }
            },
            submodulo: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir una descripción del submodulo'
                    }
                }
            }
        }
    });
});

let id_system_submodulo = $('#id_system_submodulo');
let action              = $('#action');
let id_modulo           = $('#id_modulo');
let submodulo           = $('#submodulo');

function sendData(){

    if( id_modulo.val()=='' || submodulo.val()==''){
        swal("Atención!", "Campos requeridos (*)", "warning");
        return false;
    }

    let formData = new FormData();
    formData.append('id_system_submodulo',id_system_submodulo.val());
    formData.append('action',action.val());
    formData.append('id_modulo',id_modulo.val());
    formData.append('submodulo',submodulo.val());
    $.ajax({
        url        : 'submoduloAction',
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
                   window.location.href = "submodulosLs";
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