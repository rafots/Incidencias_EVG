<?php
    require '../procedimientos/procedimientos.php';
    $conexion = new procedimientos();
    $conexion->conectar();
    $alta_tipo_sanc_inc="INSERT INTO tipo_sancion_incidencias VALUES (".$_POST["tipoSancion"].",".$_POST["tipoIncidencia"].")";
    $conexion->consultas($alta_tipo_sanc_inc);

    header("Location:../paginas/coordinador.php");

?>
