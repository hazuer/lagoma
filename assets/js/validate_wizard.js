/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * 
 */

//Validar el login del usuario
var validaLogin = $("#validaLogin");
$(document).ready(function() 
{
    validaLogin.formValidation
    ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: 
        {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: 
        {
            username: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Ingresa tu nombre de usuario'
                    }
                }
            },
            password: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Ingresa tu contraseña'
                    }
                }
            }
        }
    });
});

//Valida alta y edición de modulos
var validaModulo = $("#validaModulo");
$(document).ready(function() 
{
    validaModulo.formValidation
    ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: 
        {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: 
        {
            modulo: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir el nombre del modulo'
                    }
                }
            },
            desc_modulo: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir una descripción del modulo'
                    }
                }
            },
            urlControlador: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir el nombre o la url del controlador'
                    }
                }
            },
            icono: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir el nombre del icono'
                    }
                }
            }
        }

    });
});

//Validar alta y edicion de submodulos
var validaSubmodulo = $("#validaSubmodulo   ");
$(document).ready(function() 
{
    validaSubmodulo.formValidation
    ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: 
        {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: 
        {
            id_modulo: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe seleccionar el modulo'
                    }
                }
            },
            submodulo: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir una descripción del submodulo'
                    }
                }
            }
        }

    });
});

//Alta y edicion de usuarios
var validaUsuarios = $("#validaUsuarios   ");
$(document).ready(function() 
{
    validaUsuarios.formValidation
    ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: 
        {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: 
        {
            id_persona: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe seleccionar el nombre de la persona'
                    }
                }
            },
            usuario: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir el nombre de usuario'
                    }
                }
            },
            password: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe escribir una contraseña'
                    }
                }
            }
        }

    });
});

//Validar datos al cambiar usuario y contraseña
var validaCambiarPass = $("#validaCambiarPass");
$(document).ready(function() 
{
    validaCambiarPass.formValidation
    ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: 
        {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: 
        {
            usuario: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe ingresar nombre de usuario'
                    }
                }
            },
            password: 
            {
                validators: 
                {
                    notEmpty: 
                    {
                        message: 'Debe ingresar contraseña'
                    }
                }
            }
        }

    });
});