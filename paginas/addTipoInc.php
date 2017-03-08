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
        require "../consultas/sacarEtapa.php";
        echo '<h3>Tipos de incidencias de la etapa '.$fila_etapa["nombre"].'</h3>';

        echo '
                <div>
                    <h4>Tipos de incidencias disponibles</h4>
               ';

                        require "../consultas/listadoTipoInc.php";
            echo'     
                </div>
                <div>
                    <h4>Añadir tipo de incidencia</h4>
                    <form method="post" action="../consultas/altaTipoIncidencia.php">
                        <div>
                        <label>Nombre del tipo de incidencia</label>
                        <input type="text" name="nombreTipo" class="form-control" id="exampleInputName2"/>
                        ';
                        if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                        {
                            echo '<p>Se ha introducido con exito el tipo de incidencia.</p>';
                        }
                        echo '
                        </div>
                        <div>
                            <label>¿Quien va a gestionar esta incidencia?</label>
                            <select name="gestiona" class="form-control">
                                <option value="T">Tutor</option>
                                <option value="C">Coordinador</option>
                            </select>
                        </div>
                        <input type="submit" name="enviar" value="Añadir tipo" class="btn btn-primary buttons-separator">
                    </form>
                    <a href="gestionTipos.php">Volver</a>
                </div>';
    }
?>




