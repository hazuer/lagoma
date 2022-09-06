//Validar alta y edicion de submodulos
var validaSubmodulo = $("#validaSubmodulo");
$(document).ready(function(){
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