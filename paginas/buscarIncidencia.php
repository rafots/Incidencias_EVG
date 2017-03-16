<?php
session_start();
require_once "../procedimientos/procedimientos.php";
require_once "../consultas/buscarAlumno.php";
echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="../sources/ajaxTutor.js"></script>';

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    echo "
    <article class='col-sd-7 articulo'>
        <div class='form-group'>
            <label for='alumno'>Alumno:</label>
                <select name='nombreAlumno' id='alumno' class='form-control'>";
                    while($fila = $conexion->devolverFilas()){
                        echo "<option>";echo $fila["nombreCompleto"]; echo "</option>";
                    }echo "
                </select>
        </div>
        <div class='form-group text-right'>
            <input type='submit' name='submit' value='Buscar' class='btn btn-success' id='botonBuscar'>
        </div>
        
        <div name='formularioBuscar' id='formularioBuscar'>
        
        </div>
    </article>";

echo "
</body>";
}

?>