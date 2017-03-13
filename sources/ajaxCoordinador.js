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

    $('#view_sanction').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("listSancionesMod.php");
    })

    $('#acum_partes_edu').on("click",function(e){
        e.preventDefault();
        $("#cuerpo").load("partesEducativosCoord.php");
    })

    


    //Para cuando el usuario hace click en modificar una sancion
    $('body').on('click', '.btn-ver-sancion', function(evt){
       var _idSancion = $(this).data('id-sancion');

        //No id? no hace nada
        if(!_idSancion) {
            console.error('No hay id de sanción como para que pueda hacer algo');
            return;
        }

        $.ajax({
            'type': 'GET',
            'url': '../paginas/formModSancion.php?idSancion=' + _idSancion
        }).done(function(response){
            $('#cuerpo').html(response);
        }).fail(function(error){
           console.error('Error -> %o', error);
        });
    });

    //Para cuando el usuario hace click en ver una sancion
    $('body').on('click', '.btn-mostrar-sancion', function(evt){
        var _idSancion = $(this).data('id-sancion');
        
        //No id? no hace nada
        if(!_idSancion) {
            console.error('No hay id de sanción como para que pueda hacer algo');
            return;
        }

        $.ajax({
            'type': 'GET',
            'url': '../consultas/visualizarDatosSancion.php?idSancion=' + _idSancion
        }).done(function(response){
            $('#cuerpo').html(response);
        }).fail(function(error){
            console.error('Error -> %o', error);
        });
    });

    //Para cuando el usuario hace click en borrar una sancion
    $('body').on('click', '.btn-delete-sancion', function(evt){
        var _idSancion = $(this).data('id-sancion');

        //No id? no hace nada
        if(!_idSancion) {
            console.error('No hay id de sanción como para que pueda hacer algo');
            return;
        }

        var _tr = $(this).parents('tr');
        _tr.addClass('hide');

        $.ajax({
            'type': 'GET',
            'url': '../consultas/deleteSancion.php?idSancion=' + _idSancion
        }).done(function(){
            _tr.remove();
        }).fail(function(error){
            _tr.removeClass('hide');
            console.error('Error -> %o', error);
        });
    });

});















