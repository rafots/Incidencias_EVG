<?php
session_start();
if(isset($_SESSION['profesor']))
{
    require "../procedimientos/procedimientos.php";
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
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
    <script type="text/javascript" src="calendario.hs"></script>
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
            <aside class="col-sm-3 col-md-3 " >
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
                                            <a href="addIncidencia.php">Crear Incidencia</a>
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
                
            </aside>
            ';
                        echo '<div class="col-sm-9 col-md-9 ">';
                        echo '<h3>Añadir incidencia</h3>';

                        echo '<form method="post" action="../consultas/conAddIncidencia.php">';
                        echo '<div>';
                        echo '<label>Alumno</label>';
                        echo '<select name="nia">';
                        $consulta_alumnos="SELECT * FROM alumnos";
                        $resultado_alumnos=$conectar->query($consulta_alumnos);
                        while($fila_alumnos=$resultado_alumnos->fetch_array()){
                            echo '<option value="'.$fila_alumnos["nia"].'">'.$fila_alumnos["nombreCompleto"].'</option>';
                        }

                        echo '</select>';
                        echo '</div>';
                        echo '<div>';
                        echo '<label>Tipo de incidencia</label>';
                        echo '<select name="tipo_inc">';
                        $consulta_tipo_inc="SELECT * FROM tipo_incidencias";
                        $resultado_tipo_inc=$conectar->query($consulta_tipo_inc);
                        while($fila_tipo_inc=$resultado_tipo_inc->fetch_array()){
                            echo '<option value="'.$fila_tipo_inc["idTipo"].'">'.$fila_tipo_inc["nombre"].'</option>';
                        }
                        echo '</select>';
                        echo '</div>';
                        echo '<div>';
                        echo '<label>Asignatura</label>';
                        echo '<input type="text" name="asignatura" class="form-control"/>';
                        echo '</div>';
                        echo '<div>';
                        echo '<label>Hora</label>';
                        echo '<select name="hora">';
                        $consulta_horas="SELECT * FROM horas";
                        $resultado_horas=$conectar->query($consulta_horas);
                        while($fila_horas=$resultado_horas->fetch_array()){
                            echo '<option value="'.$fila_horas["idHora"].'">'.$fila_horas["nombre"].'</option>';
                        }
                        echo '</select>';
                        echo '</div>';
                        echo '<div>';
                        echo '<label>Fecha de la incidencia</label>';
                        echo '<input type="text" name="fecha_incidencia"/>';
                        echo '</div>';
                        echo '<div>';
                        echo '<label>Descripción de la incidencia</label>';
                        echo '<input type="text" name="descripcion"/>';
                        echo '</div>';
                        echo '<div>';
                        echo '<input type="submit" value="Enviar incidencia"/>';
                        echo '</div>';
                        echo '</form>';
                        echo '</div>';
                        echo '

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
