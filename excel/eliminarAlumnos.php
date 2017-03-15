<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 15/03/2017
 * Time: 23:19
 */
require '../procedimientos/procedimientos.php';
$obj = new procedimientos();
$obj->conectar();
$query = "SET FOREIGN_KEY_CHECKS=0;";
$query .= "DELETE FROM alumnos;";
$query .= "SET FOREIGN_KEY_CHECKS=1";
$obj->multiConsultas($query);
header('Location: ../paginas/Importaciones.php');