<?php
require_once "validaranotaciones.php";

echo'<script type="text/javascript" src="../sources/bootstrap.js"></script>
     <script type="text/javascript" src="../sources/ajaxCoordinador.js"></script>';

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
                                    echo'<select name="tipo" class="form-control" id="desplegable1">';
                                    echo '<option value>Seleccione una seccion</option>';
                                    while($fila=$objeto->devolverfilas()){
                                        echo'<option value="'.$fila["tipoAnotacion"].'">'.$fila["nombre"].'</option>';
                                    }
                                    echo'</select>';

                                    echo'<br/>
                                    <div class="form-group">
                                    <label>Habilitar Profesores</label>
                                    <input type="checkbox" name="profesores">
                                    </div>
                                    <input class="btn btn-success" type="submit" name="boton" value="Crear anotacion">';
                        if(isset($_POST["boton"])) {

                        }
                        echo'</form>';
    }

    ?>