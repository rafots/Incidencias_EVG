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
        require_once 'procedimientos.php';
        $bd = new conexion();
        $objeto = new procedimientos();
        $objeto->conectar();
        $i=0;

        visualizar($objeto,$opc);
    }

    function tutor($opc){
        require_once 'procedimientos.php';
        $bd = new conexion();
        $objeto = new procedimientos();
        $objeto->conectar();
        $i=0;

        visualizar($objeto,$opc);
    }

    function visualizar($objeto,$opc){

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
                        </aside>';
                        $anyo=date("Y");
                        $mes=date("m");
                        $dia=date("d");
                        $hora=date("H");
                        $minutos=date("i");
                        $segundos=date("s");
                        $fecha="".$anyo."-".$mes."-".$dia." "."".$hora.":".$minutos.":".$segundos."";
                        echo'<article class="col-md-9 articulo">';
                        echo' <form action="crearanotaciones.php" method="post" ">
                                    <label>NumeroAnotacion</label>
                                    <input type="text" name="numInc">
                                    <label>Tipo al que pertenece</label>';
                                    $consulta="Select * from tipos_anotaciones";
                                    $objeto->consultas($consulta);
                                    echo'<select name="tipo">';
                                    while($fila=$objeto->devolverfilas()){
                                        echo'<option value="'.$fila["tipoAnotacion"].'">'.$fila["nombre"].'</option>';
                                    }
                               echo'</select><br/>
                                    <label>NIA</label>
                                    <input type="text" name="nia">
                                    <label>Habilitar Profesores</label>
                                    <input type="checkbox" name="profesores">
                                    <input type="submit" name="boton" value="Crear anotacion">';
                        if(isset($_POST["boton"])){
                            $cero=0;
                            $prof=0;
                            if(isset($_POST["profesores"]))
                                $prof=1;
                            $query="Insert into anotaciones VALUES (".$_POST["numInc"].",".$_POST["tipo"].",'".$_POST["nia"]."','".$fecha."','".$opc."', ".$cero.",".$prof.")";
                            $objeto->consultas($query);
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