<?php
session_start();
if(isset($_SESSION['profesor']))
{


echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <title>Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="../sources/comun.css" rel="stylesheet">
    <script type="text/javascript" src="../sources/bootstrap.js"></script>
    <script type="text/javascript" src="../sources/ajaxProfesor.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

<div class="container caja">
    <!-- CABECERA -->
    <header>
        <div class="row vertical-align text-center">
            <div class="col-md-6 col-sm-6">
                <img class="img-responsive img-center" src="../imagenes/logotipo.png"/>
            </div>
            <div class="col-md-3 col-sm-3">
                <div id="title-cdi">CONTROL DE INCIDENCIAS</div>
            </div>
            <div class="col-md-3 col-sm-3">
                ';
                if(isset($_SESSION['tutor']))
                {
                echo '<a class=" btn btn-primary btn-success" href="tutor.php">T</a>';
                }
                if(isset($_SESSION['profesor']))
                {
                echo '<a class=" btn btn-primary btn-success disabled" ">P</a>';
                }
                if(isset($_SESSION['coordinador']))
                {
                echo '<a class=" btn btn-primary btn-success " href="coordinador.php">C</a>';
                }
                echo '
            </div>
        </div>
    </header>
    <!-- /CABECERA -->
    <hr>
    <!-- CUERPO DE LA PÁGINA -->

    <div class="container "  >
        <div class="row " >
            <div class="col-sm-3 col-md-3 " >
                <div class="panel-group " id="accordion" >
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h4 class="panel-title ">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book text-success"></span>Incidencias</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="#" id="addInc">Crear Incidencia</a>
                                        </td>
                                    </tr>  
                                </table>
                            </div>
                        </div>
                    </div>          
                 
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour"><span class="glyphicon glyphicon-folder-open text-success">
                            </span>Gestiones</a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Ver Incidencias</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Cerrar Sesión</a>
                                        </td>
                                    </tr> 

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 " id="cuerpo">
    
            </div>

        </div>
    </div>

</body>
</html>
';
}
else
{
echo 'Acceso prohibido';
}
