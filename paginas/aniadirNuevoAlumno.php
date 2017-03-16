<?php
require_once "../procedimientos/procedimientos.php";
echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="../sources/ajaxGestor.js" type="text/javascript"></script>';

$conexion = new procedimientos();
$conexion->conectar();

echo '
    <h4>Nuevo Alumno</h4>
    <form class="form-horizontal" action="../consultas/addAlumno.php" method="POST">
        <div class="form-group">
            <labe for="nia">NIA: </labe>
            <input type="text" name="nia" id="nia" class="form-control" placeholder="NIA del alumno">
        </div>
        <div class="form-group">
            <labe for="nombre">Nombre: </labe>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre del alumno">
        </div>
        <div class="form-group">
            <labe for="apellidos">Apellidos: </labe>
            <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellidos del alumno">
        </div>
        <div class="form-group">
            <labe for="telefono">Telefono: </labe>
            <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono del alumno">
        </div>
        <div class="form-group">
            <labe for="sexo">Sexo: </labe>
            <input type="checkbox" name="masculino" id="masculino" checked>Hombre
            <input type="checkbox" name="femenino" id="femenino">Mujer
        </div>
        <div class="form-group">
            <labe for="sexo">Seccion: </labe>
            <select name="seccion" id="seccion" class="form-control">';
                require '../consultas/addIncidencia/listadoSecciones.php';echo'
            </select>
        </div>
        
        <div class="form-group">
            <input type="submit" name="submit" value="Añadir" class="btn btn-success">
        </div>
    </form>
        
';
