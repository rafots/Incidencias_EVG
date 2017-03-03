<?php
    session_start();
    require_once "../procedimientos/procedimientos.php";

    $conexion = new Procedimientos();
    $conexion->conectar();

    $sql = "SELECT alumnos.nombreCompleto, tipo_incidencias.nombre AS nombreINC, profesores.nombre AS nombrePROF FROM incidencias 
                INNER JOIN alumnos ON (alumnos.nia = incidencias.nia)
                INNER JOIN tipo_incidencias ON (tipo_incidencias.idTipo=incidencias.idTipo) 
                INNER JOIN profesores ON (profesores.idUsuario=incidencias.usuario) 
                WHERE fecha_ocurrencia <= CURRENT_DATE LIMIT 10";
    $conexion->consultas($sql);

    if(!isset($_SESSION["usuario"])){
        echo "Acceso prohibido";
    }else{
        echo "
        <!DOCTYPE html>
            <head>
                <meta charset='UTF-8'>
                <title>Ultimas incidencias</title>
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
                    <a href='#' class='btn btn-success menu-buttons' role='button'>Ultimas incidencias</a>
                    <a href='#' class='btn btn-success menu-buttons' role='button'>Buscar incidencias</a>
                    <a href='#' class='btn btn-success menu-buttons' role='button'>Añadir anotacion</a>
                    <a href='#' class='btn btn-success menu-buttons buttons-separator' role='button'>Cerrar Sesion</a>
                </aside>
                <article class='col-md-9 articulo'>";
                        echo "<table border='1'>
                                <tr>
                                    <td>Nombre del Alumnno</td>
                                    <td>Tipo de incidencia</td>
                                    <td>Profesor</td>
                                </tr>
                                <tr>";
                                    while($fila = $conexion->devolverFilas()){
                                      echo "
                                       <td>".$fila["nombreCompleto"]."</td>
                                       <td>".$fila["nombreINC"]."</td>
                                       <td>".$fila["nombrePROF"]."</td>
                                       <td><button class='glyphicon glyphicon-eye-open' aria-hidden='true'></td>
                                       <td><button class='glyphicon glyphicon-save' aria-hidden='true'></td>";
                                    }
                                echo "</tr>
                              </table>";
        echo "
                </article>
            </div>
        </div>
     </body>
        ";
    }
?>