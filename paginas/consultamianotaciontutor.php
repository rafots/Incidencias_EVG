<?php
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();
    $opc="t";
    $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE '".$opc."' AND leida=0";
    $objeto->consultas($consulta);
?>