<?php

require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

if(isset($_REQUEST['idSeccion'])) {
    $consultasecc="Select idSeccion,secciones.nombre from tipos_anotaciones
inner join etapas
on tipos_anotaciones.codEtapa = etapas.codEtapa
INNER join secciones
ON etapas.codEtapa = secciones.codEtapa
where tipoAnotacion= '".$_GET["idSeccion"]."'";
    $objeto->consultas($consultasecc);
    if($objeto->numFilas()>0){
        echo '<div class="row">';
        echo '<div class="col-md-12 text-center"><h2>Secciones</h2></div>';
        echo '<div class="col-md-12 text-center">';
        echo '<div class="form-group">';
        echo '<select id="desplegable1">';
        echo '<option value>Seleccione una seccion</option>';
        while($fila = $obj->devolverFilas())
        {
            echo '<option value='.$fila["idSeccion"].'>'.$fila["idSeccion"].'</option>';
        }
        echo '</select>';
        echo '</div>';
        echo '</div>';
        echo '<div class="col-md-12 text-center" id="secciones">';
    }

}

/*
if(isset($_REQUEST['nombre'])) {
    $consultasal="Select  NIA,nombre from secciones
  inner join alumnos
  ON secciones.idSeccion = alumnos.idSeccion
    where alumnos.idSeccion like ".$_GET["nombre2"]."'";

    $objeto->consultas($consultasal);
}


if($op==3){
    $cero = 0;
    $prof = 0;
    if (isset($_POST["profesores"]))
        $prof = 1;

    $consultacrearanot = "Insert into anotaciones VALUES ('DEFAULT'," . $_POST["tipo"] . ",'" . $_POST["nia"] . "','" . $fecha . "','" . $opc . "', " . $cero . "," . $prof . ")";
    $objeto->consultas($consultacrearanot);
    if($_SESSION["activa"]=="p")
        header('location: coordinador.php');
    else
        if($_SESSION["activa"]=="t")
            header('location: tutor.php');
        else
            if($_SESSION["activa"]=="p")
                header('location: profesor.php');

}
*/
?>