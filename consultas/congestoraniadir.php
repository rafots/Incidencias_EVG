<?php
require_once "../procedimientos/procedimientos.php";
$objeto = new procedimientos();
$objeto->conectar();
$consulta=" Select * from etapas";
$objeto->consultas($consulta);
echo'<label>Nombre de la seccion</label>
<input type="text" name="name">
<br/><br/>
<label>Id de la Seccion</label>
<input type="text" name="idSecc">
<br/><br/>';
echo' <select id="sanction-type" name="sanction-type" class="form-control">
      <option selected="selected"> Elige una Etapa </option>';
echo'<br/><br/>';
while($fila=$objeto->devolverFilas()){
    echo'<option value="'.$fila["codEtapa"].'">'.$fila["nombre"].'</option>';
}
    echo'</select>';

$consulta1="Select * from profesores where tutor='0' ";
$objeto->consultas($consulta1);
echo'<br/><br/>';
echo' <select id="sanction-type" name="sanction-type" class="form-control">
      <option selected="selected"> Elige un profesor </option>';
while($fila=$objeto->devolverFilas()){
    echo'<option value="'.$fila["idUsuario"].'">'.$fila["nombre"].'</option>';
}
echo'</select>';
?>