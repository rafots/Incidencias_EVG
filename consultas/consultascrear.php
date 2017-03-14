<?php
session_start();
require_once "../procedimientos/procedimientos.php";
$obj = new procedimientos();
$obj->conectar();

$consultacrearanot = "Insert into anotaciones VALUES ('DEFAULT','" . $_GET["tipo"] . "','" . $_GET["nia"] . "','" .date("Y-m-d H"). "','" . $_SESSION["activa"] . "', " . 0 . ",NULL)";
$obj->consultas($consultacrearanot);
echo $consultacrearanot;



?>