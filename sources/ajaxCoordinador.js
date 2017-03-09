/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){
    $('#tipoInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addTipoInc.php");
    })

    $('#tipoAnotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addTipoAnotacion.php");
    })

    $('#tipoSancion').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addTipoSancion.php");
    })

    $('#tipoSancionInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addTipoSancionIncidencia.php");
    })

    $('#cuerpo alterTipoInc').on("click",function(e){
        e.preventDefault();
        alert("me cago en la puta");
    })

    $('#sanc_ult_hora').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("listSanccionesUltimaHora.php");
    })

    $('#sanc_aula_convivencia').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("listSanccionesAulaConv.php");
    })

});















