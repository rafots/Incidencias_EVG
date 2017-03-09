/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function(){


    $('#aulaconvivencia').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("aulaConvivenciaCoord.php");
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    $('#clases').on("change",function(e){
        e.preventDefault();

        var selectedValue = this.value;
        var parametros = {
            "idSeccion" : selectedValue
        };
        //make the ajax call
        $.ajax({
            url: '../consultas/consultarAlumnos.php',
            type: 'GET',
            data: parametros,
            success: function(parametros) {
                $('#alumnos').remove();
                $('#ajaxx').append(parametros);

            }
        });

    });
    $('#easy').on("click",function(e){
        e.preventDefault();

        var date = $('#alumm').find('tbody tr td:first').html();
        var parametros = {
            "idIncidencia" : date
        };
        //make the ajax call
        $.ajax({
            url: '../paginas/buscarIncidencia.php',
            type: 'GET',
            data: parametros,
            success: function(parametros) {
                e.preventDefault();
                $('#contenidoAlum').empty();
                $('#contenidoAlum').append(parametros);

            }
        });
        $('#cerrarModal').on("click",function(e){
            $('#contenidoAlum').empty();
        });

    });
    $('#alumnos').on("change",function(e){
        e.preventDefault();

        var selectedValue = this.value;
        var parametros = {
            "nia" : selectedValue
        };
        //make the ajax call
        $.ajax({
            url: '../consultas/consultarIncidenciasAlumnos.php',
            type: 'GET',
            data: parametros,
            success: function(parametros) {
                $('#inciAlum').empty();
                $('#inciAlum').append(parametros);

            }
        });

    });
    $('#parteseducativos').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("partesEducativosCoord.php");
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
    $('#consultaralumno').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("../consultas/consultarClases.php");
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