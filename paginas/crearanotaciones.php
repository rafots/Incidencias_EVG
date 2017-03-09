<?php
require_once "validaranotaciones.php";

    function coordinador(){
        require_once '../procedimientos/procedimientos.php';
        $objeto = new procedimientos();
        $objeto->conectar();
        $opc="c";
        visualizar($objeto,$opc);
    }

    function tutor(){
        require_once '../procedimientos/procedimientos.php';
        $objeto = new procedimientos();
        $objeto->conectar();
        $opc="t";

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

                        echo ' <form action="crearanotaciones.php" method="post" ">';
                            echo'<div class="form-group">
                                 
                                    </div>
                                    <div class="form-group">
                                    <label>Tipo al que pertenece</label>';
                                    $consulta="Select * from tipos_anotaciones";
                                    $objeto->consultas($consulta);
                                    echo'<select name="tipo" class="form-control">';
                                    while($fila=$objeto->devolverfilas()){
                                        echo'<option value="'.$fila["tipoAnotacion"].'">'.$fila["nombre"].'</option>';
                                    }

                               echo'</select></div>
                                    <div class="form-group">
                                        <label>NIA</label>
                                        <input type="text" name="nia" class="form-control">
                                    </div>
                                    <div class="form-group">
                                    <label>Habilitar Profesores</label>
                                    <input type="checkbox" name="profesores">
                                    </div>
                                    <input class="btn btn-success" type="submit" name="boton" value="Crear anotacion">';
                        if(isset($_POST["boton"])) {
                            $cero = 0;
                            $prof = 0;
                            if (isset($_POST["profesores"]))
                                $prof = 1;
                            $query = "Insert into anotaciones VALUES ('DEFAULT'," . $_POST["tipo"] . ",'" . $_POST["nia"] . "','" . $fecha . "','" . $opc . "', " . $cero . "," . $prof . ")";
                            $objeto->consultas($query);
                            if($_SESSION["activa"]=="p")
                                header('location: coordinador.php');
                            else
                                if($_SESSION["activa"]=="t")
                                    header('location: tutor.php');
                                else
                                    if($_SESSION["activa"]=="p")
                                        header('location: profesor.php');

                        }
    }

    ?>