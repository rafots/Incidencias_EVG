<?php
    if(isset($_SESSION['profesor']))
    {
        require "../procedimientos/procedimientos.php";
        $conexion = new conexion();
        $conectar = new mysqli($conexion->getServer(),$conexion->getUser(),$conexion->getPass(),$conexion->getDb());
        echo '<div class="col-sm-9 col-md-9 ">';
        echo '<h3>Añadir incidencia</h3>';
        echo '<form method="post" action="../consultas/conAddIncidencia.php">';
        echo '<div>';
        echo '<label>Alumno</label>';
        echo '<select name="nia">';
        require "../consultas/addIncidencia/listadoAlumno.php";
        echo '</select>';
        echo '</div>';
        echo '<div>';
        echo '<label>Tipo de incidencia</label>';
        echo '<select name="tipo_inc">';
        require "../consultas/addIncidencia/listadoTipoInc.php";
        echo '</select>';
        echo '</div>';
        echo '<div>';
        echo '<label>Asignatura</label>';
        echo '<input type="text" name="asignatura" class="form-control"/>';
        echo '</div>';
        echo '<div>';
        echo '<label>Hora</label>';
        echo '<select name="hora">';
        require "../consultas/addIncidencia/listadoHoras.php";
        echo '</select>';
        echo '</div>';
        echo '<div>';
        echo '<label>Fecha de la incidencia</label>';
        echo '<input type="text" name="fecha_incidencia"/>';
        echo '</div>';
        echo '<div>';
        echo '<label>Descripción de la incidencia</label>';
        echo '<input type="text" name="descripcion"/>';
        echo '</div>';
        echo '<div>';
        echo '<input type="submit" value="Enviar incidencia"/>';
        echo '</div>';
        echo '</form>';
        echo '</div>';
}
else
{
    echo 'Acceso prohibido';
}
