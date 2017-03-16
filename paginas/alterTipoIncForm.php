<?php

?>
<?php
session_start();
if(isset($_SESSION['coordinador']))
{


    echo'
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="../sources/ajax.js"></script>
    <meta charset="UTF-8">
    <title>Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
    <link type="text/css" href="../sources/comun.css" rel="stylesheet">
    <script type="text/javascript" src="../sources/bootstrap.js"></script>
    <script type="text/javascript" src="../sources/ajaxCoordinador.js"></script>
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
        echo '<a class=" btn btn-primary btn-success" href="profesor.php">P</a>';
    }
    if(isset($_SESSION['coordinador']))
    {
        echo '<a class=" btn btn-primary btn-success disabled">C</a>';
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
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"><span class="glyphicon glyphicon-book text-success"></span>Incidencias no tramitadas</a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in">
                            <div class="panel-body">
                                <table class="table">
                                ';
    if($_SESSION['codEtapa']=='ESO')
    {
        echo'
                                    <tr>
                                        <td>
                                            <a id="aulaconvivencia">Aula de convivencia</a>
                                        </td>
                                    </tr>';
    }

    echo'

                                    
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Partes educativos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Otras</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo"><span class="glyphicon glyphicon-pencil text-success">
                            </span>Anotaciones</a>
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
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree"><span class="glyphicon glyphicon-copy text-success">
                            </span>Sanciones</a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Poner sanción</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="http://www.jquery2dotnet.com">Visualizar sanciones</a> <span class="label label-info">5</span>
                                        </td>
                                    </tr>
                                    <tr>
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
                                            <a href="#" id="tipoInc">Tipos de Incidencias</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" id="tipoSancion">Tipos de Sanciones</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            </span><a href="#" id="tipoSancionInc">Motivos de Sanción</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" id="tipoAnotaciones">Tipos de Anotaciones</a>
                                        </td>
                                    </tr>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 " id="cuerpo">
                <div>
                    <h3>Modificar tipo de incidencia</h3>
                    <form method="get" class="form-horizontal"  action="../consultas/conAlterTipoIncidencia.php">
                    <input type="hidden" class="form-control" name="cod" value="'.$_GET["codAntiguo"].'">
                    <div>
                       <label>Nombre de tipo de incidencia</label>
                       
                       <input type="text" name="texto" class="form-control" required="required" value="'.$_GET["nombreAntiguo"].'">
                    </div>
                         <div>
                             <label>¿Quien gestiona esta incidencia?</label>';

                            if($_GET["gestionaAnt"]=="T"){
                                echo '<div>';
                                echo '<input type="radio" name="gestiona" value="T" checked="checked" class="checkbox-inline"/>Tutor';
                                echo '</div>';
                                echo '<div>';
                                echo '<input type="radio" name="gestiona" value="C" class="checkbox-inline"/>Coordinador';
                                echo '</div>';
                            }
                            else
                            {
                                echo '<div>';
                                echo '<input type="radio" name="gestiona" value="T" class="checkbox-inline"/>Tutor';
                                echo '</div>';
                                echo '<div>';
                                echo '<input type="radio" name="gestiona" value="C" checked="checked" class="checkbox-inline"/>Coordinador';
                                echo '</div>';
                            }
                             echo' 
                             <div>
                                <input type="submit" class="btn btn-primary buttons-separator" value="Modificar tipo de incidencia"/>
                             </div>
                         </div>
                     </div>
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