<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$objeto->consultas("select * from alumnos WHERE idSeccion like '".$_POST["idseccion"]."'");

echo '<select name="tipo" class="form-control" id="desplegable2">';
echo '<option value>Seleccione una seccion</option>';
if(isset($_REQUEST['seccion']))
{
    $query ="select * from alumnos WHERE idSeccion like '".$_POST["idseccion"]."'";
    $objeto->consultas($query);
    while ($fila = $objeto->devolverfilas()) {
        echo '<option value="'.$fila["seccionid"].'">'.$_REQUEST["seccion"].'</option>';
    }
    echo '</select>';

}

?>