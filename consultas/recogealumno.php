<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$objeto->consultas("select * from alumnos WHERE idSeccion like '".$_POST["seccion"]."'");

echo '<select name="tipo" class="form-control" id="desplegable2">';
echo '<option value>Seleccione una seccion</option>';
    $query ="select * from alumnos WHERE idSeccion like '".$_POST["seccion"]."'";
    $objeto->consultas($query);
    while ($fila = $objeto->devolverfilas()) {
        echo '<option value="'.$fila["nombreCompleto"].'">'.$fila["nombreCompleto"].'</option>';
    }
    echo '</select>';

?>