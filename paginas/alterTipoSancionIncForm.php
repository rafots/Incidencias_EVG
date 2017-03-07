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
        <script>
            $(document).ready(function(){
                $(".ocultar").hide();
            });
        </script>
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

                <h3>Cambiar tipo de sancion y incidencia</h3>
                <form method="get" action="../consultas/conAlterTipoSancionIncidencia.php">
                    <div>
                        <?php
                            echo '<input type="text" name="sancionAnt" value="'.$_GET["sancionAnt"].'" class="ocultar"/>';
                            echo '<input type="text" name="incAntiguo" value="'.$_GET["incAntiguo"].'" class="ocultar"/>';
                        ?>
                        <label>Tipo sancion</label>
                        <select name="tipoSancionNuevo">
                            <?php
                                $consulta_tipo_s="SELECT * FROM tipo_sancion";
                                $resultado_tipo_s=$conectar->query($consulta_tipo_s);
                                while($fila_tipo_s=$resultado_tipo_s->fetch_array())
                                {
                                    echo '<option value="'.$fila_tipo_s["tipoSancion"].'">'.$fila_tipo_s["nombre"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <label>Tipo incidencias de la etapa</label>
                        <select name="tipoIncidenciaNuevo">
                            <?php
                                $consulta="SELECT idUsuario from profesores WHERE usuario='".$_SESSION["usuario"]."'";
                                $resultado=$conectar->query($consulta);
                                $fila=$resultado->fetch_array();

                                $consulta_etapa="SELECT codEtapa FROM etapas where coordinador=".$fila["idUsuario"].";";
                                $resultado_etapa=$conectar->query($consulta_etapa);
                                $fila_etapa=$resultado_etapa->fetch_array();

                                $consulta_tipo_s="SELECT * FROM tipo_incidencias WHERE codEtapa='".$fila_etapa["codEtapa"]."'";
                                $resultado_tipo_s=$conectar->query($consulta_tipo_s);
                                while($fila_tipo_s=$resultado_tipo_s->fetch_array())
                                {
                                    echo '<option value="'.$fila_tipo_s["idTipo"].'">'.$fila_tipo_s["nombre"].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" value="modificar">
                    </div>
                </form>
            </article>
        </div>
        <!-- /CUERPO DE LA PÁGINA -->
    </div>

    </body>
</html>