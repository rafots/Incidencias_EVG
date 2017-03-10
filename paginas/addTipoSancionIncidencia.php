<?php
    session_start();
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
                <h3>Tipos de sanciones por incidencias</h3>
                <h4>Tipos de sanciones por incidencias disponibles</h4>
                ';
                    require "../consultas/listadoTipoSancionInc.php";
                echo '
            </div>
            <hr/>
            <div>
                <form method="post" action="../consultas/conAltaTipoSancionIncidencia.php">
                    <div>
                        <label>Selecciona el tipo de sancion</label>
                        <select name="tipoSancion">
                            ';
                                require "../consultas/addTipoSancionIncidencia/listadoTipoSancion.php";
                            echo '
                        </select>
                    </div>
                    <div>
                        <label>Selecciona el tipo de incidencia</label>
                        <select name="tipoIncidencia">
                           ';
                                require "../consultas/addIncidencia/listadoTipoInc.php";
                            echo '
                        </select>
                    </div>
                    
                    <!--<label>Etapa</label>-->
                    ';
                    if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                    {
                        echo '<p>Se ha introducido con exito el tipo de sancion por incidencia.</p>';
                    }
                    echo '
                    <input type="submit" name="enviar" value="Añadir tipo" class="btn btn-primary buttons-separator">
                </form>
                <a href="coordinador.php">Volver</a>
            </div>
        ';
    }
?>


