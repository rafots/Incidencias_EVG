<?php
echo'<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="../sources/ajaxGestor.js" type="text/javascript"></script>';
require_once "../procedimientos/procedimientos.php";
$objeto = new procedimientos();
$objeto->conectar();
$consulta=" Select * from etapas";
$objeto->consultas($consulta);
echo'<label>Nombre de la seccion</label>
<input type="text" name="name">

<label>Id de la Seccion</label>
<input type="text" name="idSecc">
<br/>';
echo'<label>Etapa</label>';
echo' <select id="sanction-type" name="sanction-type" >
      <option selected="selected"> Elige una Etapa </option>';

while($fila=$objeto->devolverFilas()){
    echo'<option value="'.$fila["codEtapa"].'">'.$fila["nombre"].'</option>';
}
    echo'</select>';

$consulta1="Select * from profesores where tutor='0' ";
$objeto->consultas($consulta1);
echo'<label>Profesor</label>';
echo' <select id="sanction-type" name="sanction-type" >
      <option selected="selected"> Elige un profesor </option>';
while($fila=$objeto->devolverFilas()){
    echo'<option value="'.$fila["idUsuario"].'">'.$fila["nombre"].'</option>';
}
echo'</select>
<button  type="button" id="aniadirSeccion2" class="btn btn-success">Añadir</button>';

?>