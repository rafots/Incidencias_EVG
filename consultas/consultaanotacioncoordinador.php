<?php
require_once '../procedimientos/procedimientos.php';

        $objeto = new procedimientos();
        $objeto->conectar();
        $consulta="Select tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as 'Nia del alumno',nombreCompleto,secciones.nombre,secciones.idSeccion,numAnotacion,substring(hora_Registro,1,11)as fecha,descripcion from anotaciones
  inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion
  inner JOIN alumnos on anotaciones.nia = alumnos.nia
  inner join secciones on secciones.idSeccion = alumnos.idSeccion
WHERE  secciones.idSeccion LIKE '".$_SESSION['idSeccion']."' and leida=1";
        $objeto->consultas($consulta);
?>