<?php
require_once "../procedimientos/procedimientos.php";

$conexion2 = new Procedimientos();
$conexion2->conectar();

$buscarProfesor = "SELECT nombre, usuario FROM profesores";
$conexion2->consultas($buscarProfesor);