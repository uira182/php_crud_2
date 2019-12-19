/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function enviar_imagem(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#prodImg').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function() { 
    $(".item3").on( "click", function() {
        $(".compraBoxProd").toggleClass("blu");
    });
});

$("#Arquivo").change(function () {
    enviar_imagem(this);
});