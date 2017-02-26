<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 25/02/2017
 * Time: 20:06
 */

    require 'simplexlsx.class.php';

    function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    $xlsx = new SimpleXLSX("usuarios.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
    $tabla = $xlsx->rows();  // Nos da tidas las filas del Excel

    $conn = new mysqli('localhost','root','','magentoe_incidenciasevg');

    foreach($tabla as $indice){

        $pw = randomPassword();

        $sql = "INSERT INTO profesores (usuario, correo, nombre, pass) VALUES (?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $user, $email, $name, $passwd);

        $user = substr($indice[0], 0, strpos($indice[0],'@'));
        $email = $indice[0];
        $name = $indice[1];
        $passwd = password_hash($pw, PASSWORD_DEFAULT);

        //if($email != 'NOMBRE' || $email != '' || $email != ' ')
        $stmt->execute();

        /*
        echo $indice[0];
        echo '&nbsp&nbsp&nbsp';
        echo $indice[1];
        echo '&nbsp&nbsp&nbsp';
        echo '<br/>';
        */

        if(!mail($indice[0], 'Contraseña Incidencias EVG', $pw))
            echo 'Mensaje enviado';

    }

    $conn->close();

?>