<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();

$buscarAlumno = "SELECT nombreCompleto, usuario FROM alumnos 
                      INNER JOIN secciones ON(alumnos.idSeccion = secciones.idSeccion) 
                      INNER JOIN profesores ON(secciones.tutor = profesores.idUsuario) WHERE usuario = '".$_SESSION["usuario"]."'";
$conexion->consultas($buscarAlumno);

?>