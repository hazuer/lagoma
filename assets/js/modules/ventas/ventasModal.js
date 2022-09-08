/*
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 */

//Valida alta y edición de modulos
$(document).ready(function() {
    let  validaPago = $("#validaPago");
    validaPago.formValidation ({
        framework: 'bootstrap',
        excluded: [':disabled'],
        icon: {
            valid: 'fa fa-check',
            invalid: 'fa fa-times',
            validating: 'fa fa-refresh'
        },
        fields: {
            efectivo: {
                validators: {
                    notEmpty: {
                        message: 'Ingresa el efectivo'
                    }
                }
            }
        }
    });

});

let efectivo = $('#efectivo');
function pay(){
    if( efectivo.val()==''){
        swal("Attention!", "Required fields (*)", "warning");
        return false;
    }

    console.log('continue');
    console.log(dataPG);
 
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