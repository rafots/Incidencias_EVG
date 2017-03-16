<?php
    require_once '../procedimientos/procedimientos.php';
    $objeto = new procedimientos();
    $objeto->conectar();
    $consulta="Select tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as 'Nia del alumno',nombreCompleto,secciones.nombre,secciones.idSeccion, numAnotacion,substring(hora_Registro ,1,10) as fecha,descripcion

from (SELECT * FROM anotaciones LIMIT 10) anotaciones inner join tipos_Anotaciones
on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion
inner JOIN alumnos
on anotaciones.nia = alumnos.nia
inner join  secciones
on secciones.idSeccion = alumnos.idSeccion
WHERE anotaciones.usercreacion like 't'";
    $objeto->consultas($consulta);
?>