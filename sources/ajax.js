/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){

    $('#crearanotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("crearanotaciones.php");
    });
});