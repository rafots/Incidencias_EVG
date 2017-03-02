<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 25/02/2017
 * Time: 20:06
 */

    require 'simplexlsx.class.php';
    require '../procedimientos/procedimientos.php';

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

    $xlsx = new SimpleXLSX("usuarios.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
    $tabla = $xlsx->rows();  // Nos da todas las filas del Excel

    $obj = new procedimientos();
    $obj->conectar();

    foreach($tabla as $indice){

        $pw = randomPassword();

        $sql = "INSERT INTO profesores (usuario, correo, nombre, pass) VALUES (?, ?, ?, ?)";

        $stmt = $obj->consultasPreparadas($sql);
        $stmt->bind_param("ssss", $user, $email, $name, $passwd);

        $user = substr($indice[0], 0, strpos($indice[0],'@'));
        $email = $indice[0];
        $name = $indice[1];
        $passwd = password_hash($pw, PASSWORD_DEFAULT);

        $stmt->execute();

        $mensaje = 'Buenos dias, le informamos de que usted acaba de ser registrado en la aplicación para el control de incidencias
        del centro Escuela Virgen de Guadalupe con nombre de usuario '.$user.' y contraseña '.$pw.'. Si tiene algun problema para 
        iniciar sesión o cualquier otro motivo, pongase en contacto con el administrador';

        if(!mail($indice[0], 'Contraseña Incidencias EVG', $pw))
            echo 'Mensaje enviado';

    }

    $stmt->close();
    $obj->cerrarConexion();

?>