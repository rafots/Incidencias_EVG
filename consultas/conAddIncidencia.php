<?php
    session_start();
    /*INSERT INTO `incidencias` VALUES (NULL, '092323A', '2', '1', 'Recreo', '1', '2017-03-01', '2017-03-08 08:32:19', 'Yasuo', '0', '0', '0', '0');*/
    include "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion->conectar();

    $consulta_user="SELECT idUsuario FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $conexion->consultas($consulta_user);
    $fila_usuario=$conexion->devolverFilas();

    $consulta_tipo="SELECT * FROM tipo_incidencias WHERE idTipo=".$_POST["tipo_inc"]."";
    $conexion->consultas($consulta_tipo);
    $fila_tipo=$conexion->devolverFilas();

    if($fila_tipo["gestiona"]=="T"){
        $VT=0; /*Vista por el tutor*/
        $AT=0;  /*Archivada por el tutor*/
        $VC=1; /*Vista por el coordinador*/
        $AC=1; /*Archivada por el coordinador*/
    }
    else if($fila_tipo["gestiona"]=="C"){
        $VT=0; /*Vista por el tutor*/
        $AT=0; /*Archivada por el tutor*/
        $VC=0; /*Vista por el coordinador*/
        $AC=0; /*Archivada por el coordinador*/
    }
    if($_POST["asignatura"]==NULL){
        $_POST["asignatura"]='Vacio';
    }
    $consulta_add_incidencia="INSERT INTO incidencias VALUES (DEFAULT, '".$_POST["nia"]."', ".$_POST["tipo_inc"].", ".$fila_usuario["idUsuario"].", '".$_POST["asignatura"]."', ".$_POST["hora"].", '".$_POST["fecha_incidencia"]."', NOW(), '".$_POST["descripcion"]."', '".$VT."', '".$AT."', '".$VC."', '".$AC."');";
    $conexion->consultas($consulta_add_incidencia);
    header("Location: ../paginas/profesor.php?alta_inc=si");
?>