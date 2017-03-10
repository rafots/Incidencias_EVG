<?php
    session_start();
    require '../procedimientos/procedimientos.php';


        require "../consultas/sacarEtapa.php";
        echo '<h3>Tipos de anotaciones de la etapa '.$fila_etapa["nombre"].'</h3>
            <div>
                <h4>Tipos de anotaciones disponibles</h4>
                ';
                    require "../consultas/listadoTipoAnotaciones.php";


        echo '
            </div>
            <hr/>
            <div>
                <h4>Añadir tipo de anotacion</h4>
                <form method="post" action="../consultas/conAltaTipoAnotacion.php">
                    <label>Nombre del tipo de anotacion</label>
                    <input type="text" name="nombreTipo" required="required" class="form-control" id="exampleInputName2"/>
                    <!--<label>Etapa</label>-->
                    
                    <input type="submit" name="enviar" value="Añadir tipo de incidencia" class="btn btn-primary buttons-separator">
                </form>
                <a href="gestionTipos.php">Volver</a>
            </div>
        ';

?>


