<?php
    session_start();
    $opc;
    if(isset($_SESSION['coordinador'])){
        $opc="c";
        coordinador($opc);
    }else{
        if(isset($_SESSION['tutor'])){
            $opc="t";
            tutor($opc);
        }else{
            session_destroy();
            echo 'no tienes permiso para acceder a esta pagina';
        }
    }

    function coordinador($opc){
        require_once '../procedimientos/procedimientos.php';
        $bd = new conexion();
        $objeto = new procedimientos();
        $objeto->conectar();
        $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE 't'";
        $objeto->consultas($consulta);
        $i=0;

        visualizar($objeto);
    }

    function tutor($opc){
        require_once '../procedimientos/procedimientos.php';
        $bd = new conexion();
        $objeto = new procedimientos();
        $objeto->conectar();
        $consulta="Select numAnotacion,tipos_Anotaciones.nombre as tipoAnotaciones,anotaciones.nia as anotacion,leida,verProfesores,nombreCompleto from anotaciones inner join tipos_Anotaciones on anotaciones.tipoAnotacion=tipos_anotaciones.tipoAnotacion inner JOIN alumnos on anotaciones.nia = alumnos.nia WHERE userCreacion LIKE 'c'";
        $objeto->consultas($consulta);
        $i=0;

        visualizar($objeto);
    }

    function visualizar($objeto){

        echo'
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <title>Anotaciones</title>
                <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
                <link type="text/css" href="../sources/bootstrap.css" rel="stylesheet">
                <link type="text/css" href="../sources/comun.css" rel="stylesheet">
                <script type="text/javascript" src="../sources/bootstrap.js"></script>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
            </head>
            <body>
            
            <div class="container caja">
                    <!-- CABECERA -->
                    <header>
                        <div class="row vertical-align text-center">
                            <div class="col-md-6 col-sm-6">
                                <img class="img-responsive img-center" src="../imagenes/logotipo.png"/>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <div id="title-cdi">CONTROL DE INCIDENCIAS</div>
                            </div>
                            <div class="col-md-3 col-sm-3">
                                <button class=" btn btn-primary btn-success">P</button>
                                <button class=" btn btn-primary btn-success" disabled="disabled">C</button>
                            </div>
                        </div>
                    </header>
                    <!-- /CABECERA -->
            
                    <!-- CUERPO DE LA PÁGINA -->
                    <div class="row">
                        <aside class="col-md-3">
                            <!--
                            *
                            * Estos botones son simplemente de ejemplo
                            *
                            -->
                            <a href="#" class="btn btn-success menu-buttons" role="button">Mi Clase </a>
                            <a href="#" class="btn btn-success menu-buttons" role="button">Historial alumnos</a>
                            <a href="#" class="btn btn-success menu-buttons" role="button">Aula de convivencia</a>
                            <a href="#" class="btn btn-success menu-buttons" role="button">Tipos Incidencias</a>
                            <a href="crearanotaciones.php" class="btn btn-success menu-buttons" role="button">Crear Anotacion</a>
                            <a href="anotaciones.php" class="btn btn-success menu-buttons" role="button">Consultar Anotaciones</a>
                            <a href="misanotaciones.php" class="btn btn-success menu-buttons" role="button">Mis Anotaciones</a>
                            <a href="#" class="btn btn-success menu-buttons" role="button">Cerrar sesión</a>
                        </aside>
                        <article class="col-md-9 articulo">';
        echo '<h4>Anotaciones</h4>';
        while($fila=$objeto->devolverFilas()){
            echo '<h7>Tipo de anotacion:'.$fila["numAnotacion"].'</h7>';
            echo '<br/>';
            echo '<h7>Descripcion de la anotacion:'.$fila["tipoAnotaciones"].'</h7>';
            echo '<br/>';
            echo '<h7>NIA del alumno implicado:'.$fila["anotacion"].'</h7>';
            echo '<br/>';
            echo '<h7>Nombre del Alumno:'.$fila["nombreCompleto"].'</h7>';
            echo '<br/>';
            echo '<a href="anotacionesmostrar.php?numAnotacion='.$fila["numAnotacion"].'">Ver la anotacion en detalle</a>';
            echo '<br/><br/>';
        }
        echo'    
                        </article>
                    </div>
                    <!-- /CUERPO DE LA PÁGINA -->
                </div>
            
            </body>
            </html>
            ';
    }

?>