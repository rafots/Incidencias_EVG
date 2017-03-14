<?php
    session_start();
    /*INSERT INTO `incidencias` VALUES (NULL, '092323A', '2', '1', 'Recreo', '1', '2017-03-01', '2017-03-08 08:32:19', 'Yasuo', '0', '0', '0', '0');*/
    include "../procedimientos/procedimientos.php";
    $conexion = new procedimientos();
    $conexion = conectar();

    $consulta_user="SELECT idUsuario FROM profesores WHERE usuario='".$_SESSION["usuario"]."'";
    $resultado_user=$conectar->query($consulta_user);
    $fila_usuario=$resultado_user->fetch_array();

    $consulta_tipo="SELECT * FROM tipo_incidencias WHERE idTipo=".$_POST["tipo_inc"]."";
    $resultado_tipo=$conectar->query($consulta_tipo);
    $fila_tipo=$resultado_tipo->fetch_array();

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

    $consulta_add_incidencia="INSERT INTO incidencias VALUES (DEFAULT, '".$_POST["nia"]."', ".$_POST["tipo_inc"].", ".$fila_usuario["idUsuario"].", '".$_POST["asignatura"]."', ".$_POST["hora"].", '".$_POST["fecha_incidencia"]."', NOW(), '".$_POST["descripcion"]."', '".$VT."', '".$AT."', '".$VC."', '".$AC."');";
    $resultado_add_incidencia=$conectar->query($consulta_add_incidencia);
    header("Location: ../paginas/profesor.php?alta_inc=si");
?>