<?php

require_once "../procedimientos/procedimientos.php";

$conexion = new procedimientos();
$conexion->conectar();

$incidenciasAlumno = "SELECT alumnos.nombreCompleto AS nombreAlumno, tipo_incidencias.nombre AS nombreIncidencia, profesores.nombre AS nombreProfesor, incidencias.fecha_ocurrencia AS fechaIncidencia FROM incidencias 
  INNER JOIN alumnos ON (incidencias.nia = alumnos.nia) 
  INNER JOIN tipo_incidencias ON(incidencias.idTipo = tipo_incidencias.idTipo) 
  INNER JOIN profesores ON(incidencias.usuario = profesores.idUsuario) WHERE alumnos.nombreCompleto ='".$_GET["nombre"]."'";

$sancionesAlumnos = "SELECT alumnos.nombreCompleto, tipo_sancion.nombre AS nombreSancion, fecha_inicio, fecha_fin FROM sanciones
    INNER JOIN tipo_sancion ON (sanciones.tipoSancion = tipo_sancion.tipoSancion)
    INNER JOIN incidencias ON (sanciones.idIncidencia = incidencias.idIncidencia)
    INNER JOIN alumnos ON (incidencias.nia = alumnos.nia) WHERE alumnos.nombreCompleto = '".$_GET["nombre"]."'";

$anotacionesAlumno = "SELECT alumnos.nombreCompleto, tipos_anotaciones.nombre, hora_Registro FROM anotaciones
  INNER JOIN tipos_anotaciones ON (anotaciones.tipoAnotacion = tipos_anotaciones.tipoAnotacion)
  INNER JOIN alumnos ON (anotaciones.nia = alumnos.nia) WHERE alumnos.nombreCompleto = '".$_GET["nombre"]."'";

    echo '<p class="bg-success">INCIDENCIAS</p>';
    $conexion->consultas($incidenciasAlumno);
    if($conexion->filasAfectadas()){echo"
        <table class='table table-striped table-responsive' id='alumn'>
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
        </table>";
    }else{
        echo "No hay incidencias para este alumno <br/>";
    }


    echo '<p class="bg-success">SANCIONES</p>';
    $conexion->consultas($sancionesAlumnos);
    if($conexion->filasAfectadas()){echo"
        <table class='table table-striped table-responsive' id='alumn'>
            <tr>
                <td>Alumno</td>
                <td>Sancion</td>
                <td>Fecha Inicio</td>
                <td>Fecha Fin</td>
            </tr>
            <tr>";
        while($fila = $conexion->devolverFilas()){
            echo "<td>".$fila["nombreCompleto"]."</td>
                <td>".$fila["nombreSancion"]."</td>
                <td>".$fila["fecha_inicio"]."</td>
                <td>".$fila["fecha_fin"]."</td>";
        }echo"
            </tr>
        </table>";
    }else{
        echo "No hay sanciones de este alumno";
    }

    echo '<p class="bg-success">ANOTACIONES</p>';
    $conexion->consultas($anotacionesAlumno);
    if($conexion->filasAfectadas()){echo"
        <table class='table table-striped table-responsive' id='alumn'>
        <tr>
            <td>Alumno</td>
            <td>Anotacion</td>
            <td>Hora</td>
        </tr>
        <tr>";
    while($fila = $conexion->devolverFilas()){
        echo "<td>".$fila["nombreCompleto"]."</td>
            <td>".$fila["nombre"]."</td>
            <td>".$fila["hora_Registro"]."</td>
        </tr>";
    }echo"
    </table>";
    }else{
        echo "No hay anotaciones para este alumno";
    }



