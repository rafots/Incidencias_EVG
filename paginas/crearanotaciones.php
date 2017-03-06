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
        $i=0;

        visualizar($objeto,$opc);
    }

    function tutor($opc){
        require_once '../procedimientos/procedimientos.php';
        $bd = new conexion();
        $objeto = new procedimientos();
        $objeto->conectar();
        $i=0;

        visualizar($objeto,$opc);
    }

    function visualizar($objeto,$opc){

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
                ';
    }

    ?>