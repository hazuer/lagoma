//Alta y edicion de usuarios
var validaUsuarios = $("#validaUsuarios   ");
$(document).ready(function() {
    validaUsuarios.formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            id_persona: {
                validators: {
                    notEmpty: {
                        message: 'Debe seleccionar el nombre de la persona'
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