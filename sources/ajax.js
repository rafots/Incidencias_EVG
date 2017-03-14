/**
 * Created by Rafa on 05/03/2017.
 */
$(document).ready(function() {


    $('#aulaconvivencia').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("aulaConvivenciaCoord.php");
    });
    $('#parteDisciplinario').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("parteDisciplinario.php");
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus()
    })
    $('#parteseducativos').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("partesEducativosCoord.php");
    });

    $('#crearanotaciones').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("crearanotaciones.php");
    });

    $('#anotaciones').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("anotaciones.php");
    });

    $('#anotacionesmostrar').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("anotacionesmostrar.php");
    });
    $('#consultaralumno').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("../paginas/buscarIncidenciasAlumno.php");
    });

    $('#misanotaciones').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("misanotaciones.php");
    });

    $('#misanotacionesmostrar').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("misanotacionesmostrar.php");
    });

    $('#eliminaranotaciones').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("eliminaranotaciones.php");
    });

    $('#modificaranotaciones').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("modificaranotaciones.php");
    });

    $('#formulario').on("click", function (e) {
        e.preventDefault();
        $("#cuerpo").load("crearanotaciones.php");
    });

    $('#desplegable1').change(function(e){
        e.preventDefault();
        var seccion = $('#desplegable1').find(":selected").text();
        $.ajax({
            type:"GET",
            url: '../consultas/recogealumno.php?idSeccion='+seccion,
            success: function(data) {
                e.preventDefault();
                $('#alumnos').empty();
                $('#alumnos').append(data);
                $('#botonBuscar').attr('type', 'submit');

            }
        });
    });

    $('#botonBuscar').on("click", function (e) {
        e.preventDefault();

        var nombre = $('#desplegable2').find(":selected").text();
        //make the ajax call
        $.ajax({
            type: "GET",
            url: '../consultas/consulta.php?nombre=' + nombre,
            success: function (data) {
                e.preventDefault();
                $('#cuerpo').append('<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>');
                $('#cuerpo').append('<script type="text/javascript" src="../sources/ajaxCoordinador.js"></script>');
                $('#cuerpo').html(data);
                $('#cuerpo').append('<button id="volverBuscarAlumnos">Volver</button>');
            }
        });

    });

});

