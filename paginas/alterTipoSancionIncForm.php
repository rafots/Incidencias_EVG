<?php
session_start();
require "../procedimientos/procedimientos.php";
$conexion = new procedimientos();
$conexion->conectar();
if(isset($_SESSION['coordinador']))
{
    $_SESSION["activa"]="c";

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
        //echo 'Coordinador de '.$_SESSION["codEtapa"].'';
    }
    echo '<br/>';
    echo $_SESSION['nombre'];
    echo '<br/>';
    echo 'Cordinador de '.$_SESSION["codEtapa"].'';
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
                                            <a href="" id="parteseducativos" id="parteDisciplinario">Partes educativos</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="#" id="otras">Otras</a>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel panel-default">
                        <div class="panel-heading" >
                            <h4 class="panel-title ">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive"><span class="glyphicon glyphicon-book text-success"></span>Consultas</a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse">
                            <div class="panel-body">
                                <table class="table">
                                ';
    echo'
                                    <tr>
                                        <td>
                                            <a id="consultaralumno">Por alumno</a>
                                        </td>
                                    </tr>';

    echo'         
                                    <tr>
                                        <td>
                                            <a id="acum_partes_edu">Acumulacion partes educativos</a>
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
                                            <a href="" id="view_sanction">Ver sanciones</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="" id="create_sanction">Crear sanción</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="" id="sanc_ult_hora">7ª hora</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="" id="sanc_aula_convivencia">Aula de convivencia</a> <span class="label label-info">5</span>
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
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="cerrarSession.php"><span class="glyphicon glyphicon-log-out text-success"></span> Cerrar sesion</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 col-md-8 " id="cuerpo">
               ';
                echo '<h3>Cambiar tipo de sancion y incidencia</h3>
                <form method="get" class="form-horizontal" action="../consultas/conAlterTipoSancionIncidencia.php">
                    <div>
                    ';
                            echo '<input type="hidden" name="sancionAnt" value="'.$_GET["sancionAnt"].'"/>';
                            echo '<input type="hidden" name="incAntiguo" value="'.$_GET["incAntiguo"].'"/>';
                       echo '
                        <div>
                        <label>Para la incidencia, asignarle este tipo de sancion...</label>
                        <select class="form-control" name="tipoSancionNuevo">
                        ';
                            $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
                            $conexion->consultas($consulta);
                            $fila=$conexion->devolverFilas();

                            $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
                            $conexion->consultas($consulta_etapa);
                            $fila_etapa=$conexion->devolverFilas();

                            $consulta_tipo_s="SELECT * FROM tipo_incidencias WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
                            $conexion->consultas($consulta_tipo_s);
                            while($fila_tipo_s=$conexion->devolverFilas())
                            {
                                echo '<option value="'.$fila_tipo_s["idTipo"].'">'.$fila_tipo_s["nombre"].'</option>';
                            }
                        echo '
                        </select>
                        </div>
                        <div>
                            <label>Para esta sancion, asignarle el siguiente tipo de Incidencia...</label>
                            <select class="form-control" name="tipoIncidenciaNuevo">
                            ';
                                $consulta_tipo_s="SELECT * FROM tipo_sancion";
                                $conexion->consultas($consulta_tipo_s);
                                while($fila_tipo_s=$conexion->devolverFilas())
                                {
                                    echo '<option value="'.$fila_tipo_s["tipoSancion"].'">'.$fila_tipo_s["nombre"].'</option>';
                                }

                                echo '
                            </select>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-primary buttons-separator" value="Modificar"/>
                        </div>
                        </form>
                        ';
    echo'
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
?>




