<?php
require_once '../procedimientos/procedimientos.php';

        $objeto = new procedimientos();
        $objeto->conectar();
        $consulta="Select tipos_anotaciones.nombre as tipoAnotaciones,tipos_anotaciones.nombre as nombre,anotaciones.nia as 'Nia del alumno',nombreCompleto, numAnotacion,substring(hora_Registro,1,11)as fecha,descripcion,alumnos.idSeccion,profesores_seccion.idSeccion from (SELECT * FROM anotaciones LIMIT 10)
    anotaciones inner join tipos_anotaciones on tipos_anotaciones.tipoAnotacion=anotaciones.tipoAnotacion
    inner join alumnos on anotaciones.nia=alumnos.nia
    inner join secciones on secciones.idSeccion=alumnos.idSeccion
    inner join profesores_seccion on secciones.idSeccion = profesores_seccion.idSeccion
where profesores_seccion.profesor='".$_SESSION["profesor"]."' and verProfesores=1";
        $objeto->consultas($consulta);
?>