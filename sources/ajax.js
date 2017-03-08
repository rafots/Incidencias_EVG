/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){


    $('#aulaconvivencia').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("aulaConvivenciaCoord.php");
    });

    $('#crearanotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("crearanotaciones.php");
    });

    $('#anotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("anotaciones.php");
    });

    $('#anotacionesmostrar').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("anotacionesmostrar.php");
    });

    $('#misanotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("misanotaciones.php");
    });

    $('#misanotacionesmostrar').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("misanotacionesmostrar.php");
    });

    $('#eliminaranotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("eliminaranotaciones.php");
    });

    $('#modificaranotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("modificaranotaciones.php");
    });



});