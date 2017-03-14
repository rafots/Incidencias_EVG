<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$consulta="select * from alumnos WHERE idSeccion like '".$_POST["seccion"]."'";
echo $consulta;
$objeto->consultas($consulta);


echo '<select name="tipo" class="form-control" id="desplegable2">';
echo '<option value>Seleccione una seccion</option>';
    $query ="select * from alumnos WHERE idSeccion like '".$_POST["seccion"]."'";
    $objeto->consultas($query);
    while ($fila = $objeto->devolverfilas()) {
        echo '<option value="'.$fila["nombreCompleto"].'">'.$fila["nombreCompleto"].'</option>';
    }
    echo '</select>';

?>