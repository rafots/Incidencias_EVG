<?php

session_start();
if(!isset($_SESSION["tutor"])){
    echo "Acceso prohibido";

}else{
    $_SESSION["activa"]="t";
    echo '
     <!DOCTYPE html>
     <html lang="en">
     <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../sources/ajaxTutor.js" type="text/javascript"></script>
        <meta charset="UTF-8">
        <title>Panel Tutor</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="../sources/comun.css" rel="stylesheet">
        <script type="text/javascript" src="../sources/bootstrap.js"></script>
        
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        
     </head>
     <body>
        <div class="container caja">
            <header>
                <div class="row vertical-align text-center">
                    <div class="col-md-6 col-sm-6">
                        <img class="img-responsive img-center" src="../imagenes/logotipo.png"/>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div id="title-cdi">CONTROL DE INCIDENCIAS</div>
                    </div>
                    <div class="col-md-3 col-sm-3">';
                        if(isset($_SESSION["tutor"])){
                            echo '<a class="btn btn-primary btn-success disabled">T</a>';
                        }
                        if(isset($_SESSION["profesor"])) {
                            echo '<a class="btn btn-primary btn-success" href="profesor.php">P</a>';
                        }
                        if(isset($_SESSION["coordinador"])){
                            echo '<a class="btn btn-primary btn-success" href="coordinador.php">C</a>';
                        }
                        echo '<br/>';
                        echo $_SESSION['nombre'];
                        echo '<br/>';
                        echo 'Tutor de '.$_SESSION["idSeccion"].'';

    echo '
                    </div>
                </div>
            </header>
            
            <hr>
            
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book text-success"></span> Incidencias</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a id="incidenciasAlumnos">Por alumnos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           <a id="ultimasIncidencias">No tramitadas</a>
                                            <span class="badge">42</span>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-pencil text-success"></span> Anotaciones</a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a id="crearanotaciones">Poner anotaciones</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a id="anotaciones">Visualizar anotaciones</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a id="misanotaciones">Mis anotaciones</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>';
                    if($_SESSION["codEtapa"] != "ESO"){echo '
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-copy text-success"></span> Sanciones</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a id="create_sanction">Poner sanción</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a id="view_sanction">Visualizar sanciones</a><span class="label label-info">5</span>
                                        </td>
                                    </tr>
                                    <tr>
                                </table>
                            </div>
                        </div>
                    </div>';
                    }
                   echo '
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="cerrarSession.php"><span class="glyphicon glyphicon-log-out text-success"></span> Cerrar sesion</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 pre-scrollable" id="cuerpo">
    
            </div>
        </div>
    </div>
     </body>
</html>
    ';
}
?>