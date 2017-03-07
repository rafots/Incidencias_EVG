/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){

    $('#tipoInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("../paginas/addTipoInc.php");
    });

    $('#tipoAnotaciones').on("click",function(e){
       e.preventDefault();
       $("#cuerpo").load("../paginas/addTipoAnotacion.php");
    });

    $('#alterTipoInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("../paginas/alterTipoIncidencia.php");
    });








});