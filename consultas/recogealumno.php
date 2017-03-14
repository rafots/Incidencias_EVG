<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$consulta="select * from alumnos WHERE idSeccion like '".$_GET["seccion"]."'";
$objeto->consultas($consulta);


echo '<select name="desplegable2" class="form-control" id="desplegable2">';
echo '<option value>Seleccione un alumno</option>';
    $query ="select * from alumnos WHERE idSeccion like '".$_GET["seccion"]."'";
    $objeto->consultas($query);
    while ($fila = $objeto->devolverfilas()) {
        echo '<option value="'.$fila["nia"].'">'.$fila["nombreCompleto"].'</option>';
    }
    echo '</select>';

?>