/**
 * Created by 2DAW03 on 07/03/2017.
 */

$(document).ready(function(){

    $('#incidenciasAlumnos').on("click", function(e){
        e.preventDefault();
        $('#cuerpo').load("buscarIncidencia.php");
    });

    $("#ultimasIncidencias").on("click", function(e){
        e.preventDefault();
        $('#cuerpo').load("ultimasIncidenciasTutor.php");
    });

    $('#crearanotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("crearanotaciones.php");
    });

    $('#anotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("anotaciones.php");
    });

    $('#misanotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("misanotaciones.php");
    });

});