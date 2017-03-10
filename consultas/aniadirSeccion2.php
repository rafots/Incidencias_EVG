<?php
session_start();
require_once "../procedimientos/procedimientos.php";

$objeto = new procedimientos();
$objeto->conectar();
echo'hola';
$consulta="INSERT  INTO  secciones VALUES (
  '".$_POST["idSecc"]."', '".$_POST["name"]."', ".$_POST["profesor"].",'".$_POST["etapa"]."' );";

$objeto->consultas($consulta);
echo $consulta;
//header("Location: ../paginas/gestor.php");
?>