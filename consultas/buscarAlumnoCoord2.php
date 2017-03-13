<?php
require_once "../procedimientos/procedimientos.php";

$conexion = new Procedimientos();
$conexion->conectar();
$buscarAlumno = 'SELECT nombreCompleto, usuario FROM alumnos
                      INNER JOIN secciones ON(alumnos.idSeccion = secciones.idSeccion) 
                      INNER JOIN profesores ON(secciones.tutor = profesores.idUsuario) WHERE secciones.idSeccion = "'.$_GET["idSeccion"].'"';
$conexion->consultas($buscarAlumno);
echo "
    
            <label for='alumnos'>Alumnos:</label>
                <select name='alumnos' id='alumnos' class='form-control'>";
while($fila = $conexion->devolverFilas()){

    echo "<option value=".$fila['nombreCompleto'].">";echo $fila["nombreCompleto"];
    echo "</option>";


}


