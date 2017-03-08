/**
 * Created by Kratos on 07/03/2017.
 */
$(document).ready(function(){
    $('#addInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addIncidencia.php");
    });
});