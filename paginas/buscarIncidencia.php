<?php
session_start();
require_once "../procedimientos/procedimientos.php";
require_once "../consultas/buscarAlumno.php";

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    echo "
     <!DOCTYPE html>
     <head>
        <meta charset='UTF-8'>
        <title>Panel Tutor</title>
        <meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no'>
        <link type='text/css' href='../sources/bootstrap.css' rel='stylesheet'>
        <link type='text/css' href='../sources/comun.css' rel='stylesheet'>
        <script type='text/javascript' src='../sources/bootstrap.js'></script>
        <script type='https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
     </head>
     <body>
        <div class='container caja'>
            <header>
                <div class='row vertical-align text-center'>
                    <div class='col-md-6 col-sm-6'>
                        <img class='img-responsive img-center' src='../imagenes/logotipo.png'/>
                    </div>
                    <div class='col-md-3 col-sm-3'>
                        <div id='title-cdi'>CONTROL DE INCIDENCIAS</div>
                    </div>
                    <div class='col-md-3 col-sm-3'>";
                        if(isset($_SESSION["tutor"])){
                            echo "<a class='btn btn-primary btn-success disabled'>T</a>";
                        }
                        if(isset($_SESSION["coordinador"])){
                            echo "<a class='btn btn-primary btn-success' href='coordinador.php'>C</a>";
                        }
                        if(isset($_SESSION["profesor"])) {
                            echo "<a class='btn btn-primary btn-success' href='profesor.php'>P</a>";
                        }echo "
                    </div>
                </div>
            </header>
            
            <div class='row'>
                <aside class='col-md-3'>
                    <a href='ultimasIncidenciasTutor.php' class='btn btn-success menu-buttons' role='button'>Ultimas incidencias</a>
                    <a href='#' class='btn btn-success menu-buttons' role='button'>Buscar incidencias</a>
                    <a href='crearanotaciones.php' class='btn btn-success menu-buttons' role='button'>Añadir anotacion</a>
                    <a href='cerrarSession.php' class='btn btn-success menu-buttons buttons-separator' role='button'>Cerrar Sesion</a>
                </aside>
                <article class='col-md-9 articulo'>
                    <form action='#' method='post'>
                        <div class='form-group'>
                            <label for='alumno'>Alumno:</label>
                            <select name='nombreAlumno' id='alumno' class='form-control'>";
                            while($fila = $conexion->devolverFilas()){
                                echo "<option>";echo $fila["nombreCompleto"]; echo "</option>";
                            }echo "
                            </select>
                        </div>
                        <div class='form-group text-right'>
                            <input type='submit' name='submit' value='Buscar' class='btn btn-primary'>
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
                                }
                            echo"</tr>
                        </table>
                </article>";
                    }
echo "
             </div>
        </div>
</body>";
}

?>