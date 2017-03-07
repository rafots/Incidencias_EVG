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
            <h3>Tipos de sanciones</h3>
                <div>
                    <h4>Tipos de sanciones disponibles</h4>
                    <?php
                        require "../consultas/listadoTipoSancion.php";
                    ?>
                </div>
                <div>
                    <h4>Añadir nuevo tipo de sancion</h4>
                    <form method="post" action="../consultas/conAltaTipoSancion.php">
                        <label>Nombre del tipo de sancion</label>
                        <input type="text" name="nombreTipo"/>
                        <!--<label>Etapa</label>-->
                        
                        
                        ';
                        if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                        {
                            echo '<p>Se ha introducido con exito el tipo de sancion.</p>';

                        }
                        echo '
                        <input type="submit" name="enviar" value="Añadir tipo">
                    </form>
                    <a href="gestionTipos.php">Volver</a>
                </div>
        ';
    }
?>


