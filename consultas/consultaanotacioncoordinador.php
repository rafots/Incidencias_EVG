<?php
require_once '../procedimientos/procedimientos.php';

        $objeto = new procedimientos();
        $objeto->conectar();
        $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE 'c'";
        $objeto->consultas($consulta);


/*Select DISTINCT tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as 'Nia del alumno',nombreCompleto,secciones.nombre,secciones.idSeccion, numAnotacion

  from anotaciones inner join tipos_Anotaciones
      on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion
  inner JOIN alumnos
      on anotaciones.nia = alumnos.nia
  inner join  secciones
      on secciones.idSeccion = alumnos.idSeccion
  WHERE anotaciones.numAnotacion=loquesea;*/
?>