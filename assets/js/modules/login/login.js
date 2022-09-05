/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

//Validar el login del usuario
var validaLogin = $("#validaLogin");
$(document).ready(function() {
    validaLogin.formValidation ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            username: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa tu nombre de usuario'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa tu contraseña'
                    }
                }
            }
        }
    });
});
