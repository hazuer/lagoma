//Alta y edicion de usuarios
$(document).ready(function() {
    let validaUsuarios = $("#validaUsuarios");
    validaUsuarios.formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            nombre: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir el nombre de la persona'
                    }
                }
            },
            curp: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir la curp'
                    }
                }
            },
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir el nombre de usuario'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Debe escribir una contraseña'
                    }
                }
            }
        }
    });
});




let id_system_users = $('#id_system_users');
let id_persona      = $('#id_persona');
let action          = $('#action');
let nombre          = $('#nombre');
let ap_paterno      = $('#ap_paterno');
let ap_materno      = $('#ap_materno');
let curp            = $('#curp');
let usuario         = $('#usuario');
let password        = $('#password');
let statusu          = $('#status');

function sendData(){

    if( nombre.val()=='' || curp.val()=='' || usuario.val()=='' || password.val()==''){
        swal("Attention!", "Required fields (*)", "warning");
        return false;
    }

    let formData = new FormData();
    formData.append('id_system_users',id_system_users.val());
    formData.append('id_persona',id_persona.val());
    formData.append('action',action.val());
    formData.append('nombre',nombre.val());
    formData.append('ap_paterno',ap_paterno.val());
    formData.append('ap_materno',ap_materno.val());
    formData.append('curp',curp.val());
    formData.append('usuario',usuario.val());
    formData.append('password',password.val());
    formData.append('status',statusu.val());

    $.ajax({
        url        : 'usuariosAction',
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
                  window.location.href = "usuariosLs";
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