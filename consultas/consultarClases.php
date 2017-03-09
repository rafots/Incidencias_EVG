<?php
session_start();
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 08/03/2017
 * Time: 21:56
 */
require '../procedimientos/procedimientos.php';
require_once '../consultas/requires.php';
$obj = new procedimientos();
$obj->conectar();
$query = 'SELECT * FROM secciones WHERE secciones.codEtapa = "'.$_SESSION["codEtapa"].'"';
$seleccionada = 0;
$obj->consultas($query);
echo '<div class="row">';
echo '<div class="col-md-12 text-center"><h2>Consultar incidencias</h2></div>';
echo '<div class="col-md-12 text-center">';
echo '<div class="form-group">';
echo '<select id="clases">';
echo '<option value>Seleccione una etapa</option>';
while($fila = $obj->devolverFilas())
{
    echo '<option value='.$fila["idSeccion"].'>'.$fila["idSeccion"].'</option>';
}
echo '</select>';
echo '</div>';
echo '</div>';
echo '<div class="col-md-12 text-center" id="ajaxx">';





