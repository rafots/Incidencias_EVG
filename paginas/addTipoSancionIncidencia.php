<?php
    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    if(!isset($_SESSION['coordinador']) || $_SESSION['coordinador']!=1) {
        echo 'Acceso prohibido';

    }
    else
    {
        echo '
            <div>
                <h4>Tipos de sanciones por incidencias disponibles</h4>
                <?php
                    require "../consultas/listadoTipoSancionInc.php";
                ?>
            </div>
            <div>
                <form method="post" action="../consultas/conAltaTipoSancionIncidencia.php">
                    <label>Selecciona el tipo de sancion</label>
                    <select name="tipoSancion">
                        <?php
                            require "../consultas/addTipoSancionIncidencia/listadoTipoSancion.php";
                        ?>
                    </select>
                    <label>Selecciona el tipo de sancion</label>
                    <select name="tipoIncidencia">
                        <?php
                            require "../consultas/addIncidencia/listadoTipoInc.php";
                        ?>
                    </select>
                    <!--<label>Etapa</label>-->
                    ';
                    if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                    {
                        echo '<p>Se ha introducido con exito el tipo de sancion por incidencia.</p>';
                    }
                    echo '
                    <input type="submit" name="enviar" value="Añadir tipo">
                </form>
                <a href="gestionTipos.php">Volver</a>
            </div>
        ';
    }
?>


