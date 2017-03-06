<?php
    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    if(!isset($_SESSION['coordinador']) || $_SESSION['coordinador']!=1) {
        echo 'Acceso prohibido';

    }
    else
    {
        echo '<h3>Tipos de incidencias</h3>
                <div>
                    <h4>Tipos de incidencias disponibles</h4>
                    <?php
                        require "../consultas/listadoTipoInc.php";
                    ?>
                </div>
                <div>
                    <h4>Añadir tipo de incidencia</h4>
                    <form method="post" action="../consultas/altaTipoIncidencia.php">
                        <label>Nombre del tipo de incidencia</label>
                        <input type="text" name="nombreTipo"/>
                        ';
                        if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                        {
                            echo '<p>Se ha introducido con exito el tipo de incidencia.</p>';
                        }
                        echo '
                        <input type="submit" name="enviar" value="Añadir tipo">
                    </form>
                    <a href="gestionTipos.php">Volver</a>
                </div>';
    }
?>




