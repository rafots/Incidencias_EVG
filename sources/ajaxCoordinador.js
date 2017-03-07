/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){

    $('#tipoInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("../paginas/addTipoInc.php");
    });







});