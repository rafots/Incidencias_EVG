<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 06/03/2017
 * Time: 20:46
 */
/*
 * Funcion para generar contraseña aleatoria
 */
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array();
    $alphaLength = strlen($alphabet) - 1;
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //devolvemos el array convertido a string
}

/*
 * Función para controlar el valor de los campos tipo "boolean"
 */
function boolean($value){
    if(isset($value))
        return true;
    else
        return false;
}

session_start();
if(!isset($_SESSION['usuario']) && !$_SESSION['gestor' ])
    header('Location: iniciarSesion.php');
else{

    require '../procedimientos/procedimientos.php';

    $pw = randomPassword();

    $sql = "INSERT INTO profesores VALUES (DEFAULT, '".$_POST["user"]."', '".$_POST["email"]."', '".$_POST["name"]."', 
    '".password_hash($pw, PASSWORD_DEFAULT)."', DEFAULT, ".boolean($_POST["gestor"]).", DEFAULT, DEFAULT, DEFAULT)";

    $obj = new procedimientos();
    $obj->consultas($sql);

    /*
     * Falta controlar errores
     */

    $mensaje = 'Buenos dias;\n\nAcaba de ser registrado en la aplicación para el control de 
    faltas de incidencias de la Escuela Virgen de Guadalupe. Sus credenciales son las siguientes:\n\n
    Usuario: '.$_POST["user"]."\n
    Contraseña: ".$pw."\n\n
    Si tiene algún problema para iniciar sesión póngase en contacto con el encargado.";

    $mensaje = wordwrap($mensaje); //hay que usar este método si el mensaje son mas de 70 caracteres


    /*
     * La siguiente función enviar el correo
     */
    //mail($_POST["email"], 'Registro Incidencias EVG', $mensaje);
    
    $obj->cerrarConexion();

}


?>