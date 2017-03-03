<?php
    session_start();
    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    if(!isset($_SESSION['coordinador']) || $_SESSION['coordinador']!=1) {
        echo 'Acceso prohibido';

    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Panel</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
        <link type="text/css" href="../sources/comun.css" rel="stylesheet">
        <script type="text/javascript" src="../sources/bootstrap.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
                    <button class=" btn btn-primary btn-success">P</button>
                    <button class=" btn btn-primary btn-success" disabled="disabled">C</button>
                </div>
            </div>
        </header>
        <!-- /CABECERA -->

        <!-- CUERPO DE LA PÁGINA -->
        <div class="row">
            <aside class="col-md-3">
                <!--
                *
                * Estos botones son simplemente de ejemplo
                *
                -->
                <a href="#" class="btn btn-success menu-buttons" role="button">Incidencias destacables</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Historial alumnos</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Aula de convivencia</a>
                <a href="gestionTipos.php" class="btn btn-success menu-buttons" role="button">Tipos Incidencias</a>
                <a href="#" class="btn btn-success menu-buttons" role="button">Cerrar sesión</a>
            </aside>
            <article class="col-md-9 articulo">

                <h3>Tipos de incidencias</h3>
                <?php

                    $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
                    $resultado=$conectar->query($consulta);
                    $fila=$resultado->fetch_array();

                    $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
                    $resultado_etapa=$conectar->query($consulta_etapa);
                    $fila_etapa=$resultado_etapa->fetch_array();

                    $consulta="SELECT tipo_sancion_incidencias.tipoSancion, tipo_sancion.nombre AS SANCION, tipo_sancion_incidencias.idTipo, tipo_incidencias.nombre AS INCIDENCIA
                                FROM tipo_sancion_incidencias
                                    INNER JOIN tipo_incidencias
                                        ON tipo_incidencias.idTipo=tipo_sancion_incidencias.idTipo
                                    INNER JOIN tipo_sancion
                                        ON tipo_sancion.tipoSancion=tipo_sancion_incidencias.tipoSancion
                            WHERE tipo_incidencias.codEtapa='".$fila_etapa["codEtapa"]."'";

                    $resultado=$conectar->query($consulta);
                    echo '<table>';
                    if($fila_tabla=$resultado->fetch_array())
                    {
                        if(empty($fila_tabla))
                        {
                            echo '<tr>';
                            echo '<td colspan="2">No se encuentran tipos de sanciones</td>';
                            echo '</tr>';
                        }
                        echo '<tr>';
                        echo '<td>'.$fila_tabla["SANCION"].'</td>';
                        echo '<td>'.$fila_tabla["INCIDENCIA"].'</td>';
                        echo '<td><a href="alterTipoSancionIncForm.php?sancionAnt="'.$fila_tabla["SANCION"].'">Modificar</a></td>';
                        echo '</tr>';

                        if(!empty($fila_tabla))
                        {
                            while($fila_tabla=$resultado->fetch_array())
                            {
                                echo '<tr>';
                                echo '<td>'.$fila_tabla["SANCION"].'</td>';
                                echo '<td>'.$fila_tabla["INCIDENCIA"].'</td>';
                                echo '<td><a href="alterTipoSancionIncForm.php?sancionAnt="'.$fila_tabla["SANCION"].'">Modificar</a></td>';
                                echo '</tr>';
                            }
                        }
                    }
                    echo '</table>';
                    if(isset($_GET["modificar"]))
                    {
                        echo '<p>Se ha modificado el tipo de sancion con exito</p>';
                    }

                ?>
            </article>
        </div>
        <!-- /CUERPO DE LA PÁGINA -->
    </div>

    </body>
</html>