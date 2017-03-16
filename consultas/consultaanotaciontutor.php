<?php
require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();
    $consulta="Select tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as 'Nia del alumno',nombreCompleto,secciones.nombre,secciones.idSeccion,numAnotacion,substring(hora_Registro,1,11)as fecha,descripcion from anotaciones
  inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion
  inner JOIN alumnos on anotaciones.nia = alumnos.nia
  inner join secciones on secciones.idSeccion = alumnos.idSeccion
  inner join etapas on secciones.codEtapa = etapas.codEtapa
WHERE anotaciones.usercreacion like 't' and etapas.codEtapa like '".$_SESSION["codEtapa"]."' and leida=1";
    $objeto->consultas($consulta);



?>