 <?php
    require_once "validaranotaciones.php";
echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>';
echo '<script src="../sources/ajax.js" type="text/javascript"></script>';
    function coordinador(){

        require "../consultas/consultaanotaciontutor.php";

        visualizar($objeto);
    }

    function tutor(){
        require "../consultas/consultaanotacioncoordinador.php";
        visualizar($objeto);
    }

    function profesor(){
        require_once "../consultas/consultaanotacionprofesor.php";
        visualizar($objeto);
    }

    function visualizar($objeto)
    {
        if($_SESSION["activa"]=='c' || $_SESSION["activa"]=='t'){
            echo '<label class="btn btn-toolbar bg-primary" data-toggle="collapse" data-target="#demo1">Anotaciones leidas </label>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <label class="btn btn-toolbar bg-primary" type="text"  data-toggle="collapse" data-target="#demo2"> Anotaciones no leidas</label>';
        }else{
            echo '<label class="btn btn-toolbar bg-primary"  data-toggle="collapse" data-target="#demo1">Anotaciones</label>';
        }

        echo'
        <div id="demo1" class="collapse"><br>';
        echo '<table class="table table-bordered">';
        echo '<tr>
           <th>Descripcion de la anotacion:</th>
           <th>Nombre del Alumno:</th>  
           <th>Fecha:</th>  
           <th>Detalle</th>
        </tr>';
        while ($fila = $objeto->devolverfilas()) {
            echo '<tr>';
            echo '<th>' . $fila["tipoAnotaciones"] . '</th>';
            echo '<th>' . $fila["nombreCompleto"] . '</th>';
            echo '<th>' . $fila["fecha"]. '</th>';


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
                                            <label for='alumno' class='col-md-3 control-label'>Fecha:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["fecha"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-lg-12 control-label'>Alumno:</label>
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
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Descripcion:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["descripcion"] . "' disabled>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>

                                </div>
                            </div>
                        </div>
                    </div>";
        }
        echo '</table>';
        echo '</div><br>
        <div id="demo2" class="collapse">';
        if($_SESSION["activa"]=='c' || $_SESSION["activa"]=='t'){
            if($_SESSION["activa"]=='c'){
                require_once "../consultas/anotacionesleidascoord.php";
            }else{
                require_once "../consultas/anotacionesleidastutor.php";
            }
            echo '<table class="table table-bordered">';
            echo '<tr>
           <th>Descripcion de la anotacion:</th>
           <th>Nombre del Alumno:</th>  
           <th>Fecha:</th>  
           <th>Detalle</th>
        </tr>';
            while ($fila = $objeto->devolverfilas()) {
                echo '<tr>';
                echo '<th>' . $fila["tipoAnotaciones"] . '</th>';
                echo '<th>' . $fila["nombreCompleto"] . '</th>';
                echo '<th>' . $fila["fecha"]. '</th>';


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
                                            <label for='alumno' class='col-md-3 control-label'>Fecha:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["fecha"] . "' disabled>
                                                </div>
                                        </div>
                                        <div class='form-group'>
                                            <label for='alumno' class='col-lg-12 control-label'>Alumno:</label>
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
                                        <div class='form-group'>
                                            <label for='alumno' class='col-md-12 control-label'>Descripcion:</label>
                                                <div class='col-lg-12'>
                                                    <input type='text' class='form-control' id='alumno' value='" . $fila["descripcion"] . "' disabled>
                                                </div>
                                        </div>
                                    </form>
                                </div>
                                <div class='modal-footer'>
                                    <button type='button' class='btn btn-default' data-dismiss='modal'>Cerrar</button>
                                    <a class='btn btn-default' href='marcarleida.php?anot=".$fila["numAnotacion"]."'>Marcar como leida</a>

                                </div>
                            </div>
                        </div>
                    </div>";
            }
            echo '</table>';
        }




        echo'</div>';
    }
?>