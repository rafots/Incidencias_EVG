<?php
require_once "validaranotaciones.php";

function coordinador(){
    require "../consultas/consultamianotacioncoord.php";

    visualizar($objeto);
}

function tutor(){
    require "../consultas/consultamianotaciontutor.php";

    visualizar($objeto);
}

function visualizar($objeto){
    echo'<table class="table table-bordered">
         <caption>Mis Anotaciones</caption>
        <tr>
           <th>Descripcion de la anotacion:</th>
           <th>Nombre del Alumno:</th>  
           <th>Detalle</th>
        </tr>';
    while ($fila = $objeto->devolverfilas()) {
        echo '<tr>';
        echo '<th>' . $fila["tipoAnotaciones"] . '</th>';
        echo '<th>' . $fila["nombreCompleto"] . '</th>';

        echo" <th><button type='button' class='btn btn-success btn-xs' data-toggle='modal' data-target='#Modal_".$fila["numAnotacion"]."'>
                        <span class='glyphicon glyphicon-eye-open'></span></button></th>
                </tr>
                    
                    <!-- Modal -->
                    <div class='modal fade' id='Modal_".$fila["numAnotacion"]."' tabindex='-1' role='dialog' aria-labelledby='Modal_Label_".$fila["numAnotacion"]."'>
                        <div class='modal-dialog' role='document'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                                    <h4 class='modal-title' id='Modal_Label_".$fila["numAnotacion"]."'>Detalles de las anotaciones</h4>
                                </div>
                                <div class='modal-body'>
                                    <form class='form-horizontal'>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-3 control-label'>Alumno:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombreCompleto"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-lg-12 control-label'>Tipo de anotacion:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["tipoAnotaciones"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Curso:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["idSeccion"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Nombre Curso:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["nombre"] . "' disabled>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                                    <a class='btn btn-default' href='eliminaranotaciones.php?anot=".$fila["numAnotacion"]."'>Eliminar</a>
                                </div>
                            </div>
                        </div>
                    </div>";
    }
    echo '</table>';
}

?>