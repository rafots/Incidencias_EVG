<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$objeto = new procedimientos();
$objeto->conectar();
$consulta="INSERT  INTO  secciones VALUES (
  '".$_POST["idSecc"]."', '".$_POST["name"]."', ".$_POST["profesor"].",'".$_POST["etapa"]."' );";

$objeto->consultas($consulta);

header("Location: ../paginas/gestor.php");
?>