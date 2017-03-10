<?php
session_start();
require '../procedimientos/procedimientos.php';

$obj = new procedimientos();
$obj->conectar();
$query = "SELECT idUsuario,usuario,pass,profesor,gestor,tutor,coordinador FROM magentoe_incidenciasevg.profesores WHERE usuario = ?";
$sentencia = $obj->consultasPreparadas($query);
$sentencia->bind_param('s', $user);
$user = $_POST["user"];
$sentencia->execute();
$sentencia->bind_result($idUsuario,$usuario,$pass,$profesor,$gestor,$tutor,$coordinador);
$sentencia->fetch();
$sentencia->close();

if (password_verify($_POST["pass"], $pass)) {

    if ($gestor == 1) {
        $_SESSION['usuario'] = $usuario;
        $_SESSION['gestor'] = $gestor;
        echo $_SESSION["gestor"];
        $query = 'SELECT t1.codEtapa, t2.nombre, idSeccion FROM etapas t1 
	                    INNER JOIN profesores t2 ON (t1.coordinador = t2.idUsuario)
                        INNER JOIN secciones ON (secciones.tutor = t2.idUsuario)
                        WHERE t2.idUsuario = ? ';

        $sentencia = $obj->consultasPreparadas($query);
        $sentencia->bind_param('i', $_SESSION['idUsuario']);
        $_SESSION['idUsuario'] = $idUsuario;
        $sentencia->execute();
        $sentencia->bind_result($codEtapa, $nombre, $idSeccion);
        $sentencia->fetch();
        $_SESSION['codEtapa'] = $codEtapa;
        $_SESSION['idSeccion'] = $idSeccion;
        $_SESSION['nombre'] = $nombre;
        header('Location: ../paginas/gestor.php');
    } else {
        header('Location: ../paginas/inicioSesionGestor.php');
    }
}
$sentencia->close();