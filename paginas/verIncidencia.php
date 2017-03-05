<?php
session_start();
require_once "../procedimientos/procedimientos.php";
require_once "../consultas/verIncidencia.php";

$fila = $conexion->devolverFilas();

if(!isset($_SESSION["usuario"])){
    echo "Acceso prohibido";
}else{
    echo "
    <!DOCTYPE html>
        <head>
            <meta charset='utf-8'>
            <title>Ultimas Incidencias</title>
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
                        }
    echo "
                    </div>
                </div>
            </header>
            <div class='row'>
                <aside class='col-md-3'>
                    <a href='ultimasIncidenciasTutor.php' class='btn btn-success menu-buttons' role='button'>Ultimas incidencias</a>
                    <a href='buscarIncidencia.php' class='btn btn-success menu-buttons' role='button'>Buscar incidencias</a>
                    <a href='crearanotaciones.php' class='btn btn-success menu-buttons' role='button'>Añadir anotacion</a>
                    <a href='cerrarSession.php' class='btn btn-success menu-buttons buttons-separator' role='button'>Cerrar Sesion</a>
                </aside>
                <article class='col-md-9 articulo'>";echo "
                    <form class='form-horizontal'>                      
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Alumno:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["nombreCompleto"]."' disabled>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Tipo de incidencia:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["nombreINC"]."' disabled>
                            </div>                          
                        </div>
                        <div></div>
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Profesor:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["nombrePROF"]."' disabled>
                            </div>                           
                        </div>
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Asignatura:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["codAsignatura"]."' disabled>
                            </div>                            
                        </div>
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Fecha:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["fecha_ocurrencia"]."' disabled>
                            </div>                          
                        </div>
                        <div class='form-group'>
                            <label for='alumno' class='col-lg-3 control-label'>Hora:</label>
                            <div class='col-lg-8'>
                                <input type='text' class='form-control' id='alumno' value='".$fila["nombreHora"]."' disabled>
                            </div>
                        </div>
                        <div class='form-group'>
                            <label for='descripcion' class='col-lg-3 control-label'>Descripcion:</label>
                            <div class='col-lg-8'>
                                <textarea class='form-control' rows='5' id='descripcion' disabled>";
                                    echo $fila["descripcion"];echo "
                                </textarea>
                            </div>                     
                        </div>
                        
                        <div class='form-group text-right'>
                            <a href='ultimasIncidenciasTutor.php' class='btn btn-primary'>Volver</a>
                            <a href='leerIncidencia.php?codigo=".$codigo."' class='btn btn-primary'>Marcar como leida</a>
                            <a href='archivarIncidencia.php?codigo=".$codigo."' class='btn btn-primary'>Archivar</a>
                        </div>
                    </form>
                </article>
            </div>
        </body>
    </html>
    
    ";
}
?>