/**
 * Created by Kratos on 07/03/2017.
 */
$(document).ready(function(){
    $('#addInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("addIncidencia.php");


    });


    $('body').on('change', '#id_sec', function(){
        alert("entra");

        var val_sec = this.value;
        alert(val_sec);
        $.ajax({
            'data':{"seccion":val_sec},
            'type': 'POST',
            'url': '../consultas/listadoAlumno.php',
            'dataType':'text',
            success:function(response){
                alert("AJAX funciona");

                $('#div_alumno').html(response);
            }
        })
    });


    $('#anotaciones').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("anotaciones.php");
    });

    $('#verInc').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("verIncidencias.php");
    });
});

