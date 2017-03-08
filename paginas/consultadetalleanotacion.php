<?php
    require_once '../procedimientos/procedimientos.php';
class consultadetalleanotacion{

    function llamar()
    {
        $objeto = new procedimientos();
        $objeto->conectar();
        if (isset($_GET["numAnotacion"]))
            $_SESSION["anot"] = $_GET["numAnotacion"];
        $consulta2 = "Update anotaciones SET leida=1 WHERE numAnotacion='" . $_SESSION["anot"] . "'";
        $objeto->consultas($consulta2);
        $consulta = "Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE numAnotacion LIKE '" . $_SESSION["anot"] . "'";
        $objeto->consultas($consulta);
    }
}
?>