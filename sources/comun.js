/**
 * Created by 2daw01 on 03/03/2017.
 */


$(document).ready(function(){

    $('#initial-date').on("change",function(){

        var texto_fecha_inicial = this.value;
        console.log(texto_fecha_inicial);

        $('#end-date').val(texto_fecha_inicial);

    });

    $('#end-date').on("blur",function(){

        var fecha_fin = this.value;
        var fecha_inicio = $('#initial-date');

    });

});