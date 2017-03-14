<?php
session_start();
require "../procedimientos/procedimientos.php";
$conexion=new procedimientos();
$conexion->conectar();

                echo '<h3>Gestion horas</h3>
                    <div>
                        <h4>Horas disponibles</h4>
                        ';
                            require "../consultas/listadoHoras.php";


                echo '
                    </div>
                    <hr/>
                    <div>
                        <h4>Añadir hora</h4>
                        <form method="post" action="../consultas/conAltaHora.php">
                            <label>Hora</label>
                            <input type="text" name="nombreHora" required="required" class="form-control" id="exampleInputName2"/>
                            <!--<label>Etapa</label>-->
                            
                            <input type="submit" name="enviar" value="Añadir tipo de incidencia" class="btn btn-primary buttons-separator">
                        </form>
                        <a href="gestionTipos.php">Volver</a>
                    </div>
';
?>