
<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 16/03/2017
 * Time: 19:54
 */

require '../procedimientos/procedimientos.php';

$obj = new procedimientos();
$obj->conectar();

echo '

                    <div class="form-group">
                        <label for="student" class="col-md-3 control-label">Alumno</label>
                        <div class="col-sm-8">
                            <select id="student" name="student" class="form-control">
    
    ';
/*
 * Extraigo todos los alumnos de la etapa del coordinador
 */
    $sql_student = "SELECT alumnos.nia AS nia, alumnos.nombreCompleto AS alumno
        FROM alumnos INNER JOIN secciones ON alumnos.idSeccion = secciones.idSeccion
        WHERE secciones.idSeccion = '".$_POST["idSeccion"]."'";

echo $sql_student;

$obj->consultas($sql_student);

if($obj->numFilas() > 0){

    while($row = $obj->devolverFilas()){

        echo '<option value="'.$row["nia"].'"> '.$row["alumno"].' </option>';

    }

}else{
    echo '<option value="0">No hay alumnos</option>';
}

echo '
                            </select>
                        </div>
                    </div>';

$obj->cerrarConexion();