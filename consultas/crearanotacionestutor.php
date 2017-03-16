<?php
require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$consulta="SELECT * from alumnos where idSeccion like'".$_SESSION["idSeccion"]."'";
$objeto->consultas($consulta);