<?php
session_start();
require_once "../procedimientos/procedimientos.php";
require_once "../consultas/buscarAlumno.php";

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    echo "
    <article class='col-sd-7 articulo'>
        <form action='tutor.php' method='post'>
            <div class='form-group'>
                <label for='alumno'>Alumno:</label>
                    <select name='nombreAlumno' id='alumno' class='form-control'>";
                        while($fila = $conexion->devolverFilas()){
                            echo "<option>";echo $fila["nombreCompleto"]; echo "</option>";
                        }echo "
                    </select>
            </div>
            <div class='form-group text-right'>
                <input type='submit' name='submit' value='Buscar' class='btn btn-success'>
            </div>     
        </form>";

    if(!isset($_POST["submit"])){

    }else{
        $incidenciasAlumno = "SELECT alumnos.nombreCompleto AS nombreAlumno, tipo_incidencias.nombre AS nombreIncidencia, profesores.nombre AS nombreProfesor, incidencias.fecha_ocurrencia AS fechaIncidencia FROM incidencias 
            INNER JOIN alumnos ON (incidencias.nia = alumnos.nia) 
            INNER JOIN tipo_incidencias ON(incidencias.idTipo = tipo_incidencias.idTipo) 
            INNER JOIN profesores ON(incidencias.usuario = profesores.idUsuario) WHERE alumnos.nombreCompleto ='".$_POST["nombreAlumno"]."'";

        $conexion->consultas($incidenciasAlumno);echo"
            <table class='table table-striped'>
                <tr>
                    <td>Alumno</td>
                    <td>Tipo incidencia</td>
                    <td>Profesor</td>
                    <td>Fecha</td>
                </tr>
                <tr>";
                    while($fila = $conexion->devolverFilas()){
                        echo "<td>".$fila["nombreAlumno"]."</td>
                              <td>".$fila["nombreAlumno"]."</td>
                              <td>".$fila["nombreProfesor"]."</td>
                              <td>".$fila["fechaIncidencia"]."</td>";
                    }echo"
                </tr>
            </table>
    </article>";
    }
echo "
    </div>
</div>
</body>";
}

?>