//Validar datos al cambiar usuario y contraseña
$(document).ready(function() {
    let validaCambiarPass = $("#validaCambiarPass");
    validaCambiarPass.formValidation({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            usuario: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar nombre de usuario'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Debe ingresar contraseña'
                    }
                }
            }
        }
    });
});