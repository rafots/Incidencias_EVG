<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 23:30
 */
require '../procedimientos/procedimientos.php';
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script type="text/javascript" src="../sources/ajax.js"></script>';
$obj = new procedimientos();
$obj->conectar();
if(isset($_REQUEST['idSeccion']))
{
    $query ='SELECT * FROM alumnos t1 INNER JOIN secciones t2 ON t1.idSeccion =  t2.idSeccion WHERE t2.idSeccion = "'.$_GET['idSeccion'].'"';
    $obj->consultas($query);
    echo '<div class="form-group">';
    echo '<select id="alumnos">';
    echo '<option value>Seleccione un alumno</option>';
    while($fila = $obj->devolverFilas())
    {
        echo '<option value='.$fila["nia"].'>'.$fila["nombreCompleto"].'</option>';
    }
    echo '</select>';
    echo '</div>';
    echo '</div>';
    echo '<div class="form-group" id="inciAlum">';

}