/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

//Valida alta y edición de modulos
var validaModulo = $("#validaModulo");
$(document).ready(function()  {
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