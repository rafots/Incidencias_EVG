<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$query="DELETE from secciones where idSeccion=".$_GET["val"]."";
$objeto->consultas($query);
header('Location: ../paginas/gestor.php');