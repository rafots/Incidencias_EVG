<?php
session_start();
require_once "../procedimientos/procedimientos.php";
require_once "../consultas/buscarAlumnoCoord.php";
echo '
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="../sources/ajaxCoordinador.js"></script>';

if(!isset($_SESSION["usuario"])){
    echo "Acceso Prohibido";
}else{
    echo "
    <article class='col-sd-7 articulo' id='articuloPrincipal'>
        <div class='form-group'>
            <label for='secciones'>Secciones:</label>
                <select name='secciones' id='secciones' class='form-control'>";
    echo "<option>";echo 'Seleccionar Seccion'; echo "</option>";
    while($fila = $conexion->devolverFilas()){
        echo "<option value=".$_fila['idSeccion'].">";echo $fila["idSeccion"]; echo "</option>";
    }echo "
                </select>
        </div>
        <div name='formularioBuscar' id='formularioBuscar'>
        <div class='form-group' id='divAlumnos'>      
        </div>
        </div>
  
        

      <div class='form-group text-right'>
            <input type='hidden' name='submit' value='Buscar' class='btn btn-success' id='botonBuscar'>
        </div>
       
    </article>";

    echo "
    </div>
</div>
</body>";
}

?>