<?php
    session_start();
    require '../procedimientos/procedimientos.php';
    $conexion = new conexion();
    $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
    echo '
            <h3>Tipos de sanciones</h3>
                <div>
                    <h4>Tipos de sanciones disponibles</h4>
                    ';
                        require "../consultas/listadoTipoSancion.php";
                    echo '
                </div>
                <hr/>
                <div>
                    <h4>Añadir nuevo tipo de sancion</h4>
                    <form method="post" action="../consultas/conAltaTipoSancion.php">
                        <label>Nombre del tipo de sancion</label>
                        <input type="text" name="nombreTipo" class="form-control" id="exampleInputName2"/>
                        <!--<label>Etapa</label>-->
                        
                        
                        ';
                        if(isset($_GET["consulta"]) && $_GET["consulta"]=='ok')
                        {
                            echo '<p>Se ha introducido con exito el tipo de sancion.</p>';

                        }
                        echo '
                        <input type="submit" name="enviar" value="Añadir tipo" class="btn btn-primary buttons-separator"/>
                    </form>
                    <a href="coordinador.php">Volver</a>
                </div>
        ';
?>


