<?php
    require_once '../procedimientos/procedimientos.php';
        $objeto = new procedimientos();
        $objeto->conectar();
        if (isset($_GET["numAnotacion"]))
            $_SESSION["anot"] = $_GET["numAnotacion"];
        $consulta2 = "Update anotaciones SET leida=1 WHERE numAnotacion='" . $_SESSION["anot"] . "'";
        $objeto->consultas($consulta2);
        $consulta = "Select tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as 'Nia del alumno',nombreCompleto,secciones.nombre,secciones.idSeccion, numAnotacion

from anotaciones inner join tipos_Anotaciones
on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion
inner JOIN alumnos
on anotaciones.nia = alumnos.nia
inner join  secciones
on secciones.idSeccion = alumnos.idSeccion
WHERE anotaciones.usercreacion like ='c'";
        $objeto->consultas($consulta);




?>