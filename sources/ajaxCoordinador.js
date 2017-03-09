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

    $('#otras').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("otrasIncidenciasCoor.php");
    })

    $('#sanc_ult_hora').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("listSanccionesUltimaHora.php");
    })

    $('#sanc_aula_convivencia').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("listSanccionesAulaConv.php");
    })

    $('#create_sanction').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("formNewSancion.php");
    })

});















