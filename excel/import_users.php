<?php
/**
 * Created by PhpStorm.
 * User: Jorge Luis
 * Date: 25/02/2017
 * Time: 20:06
 */

    require '../sources/fpdf/fpdf.php';
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

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(80,9,"Lista de usuarios añadidos");
    $pdf->Ln();
    $pdf->SetFont('Arial','I',16);
    $pdf->Ln();
    $pdf->Cell(40,9,'Usuario',1);
    $pdf->Cell(40,9,'Contraseña',1);
    $pdf->Ln();

    foreach($tabla as $indice){

        $pw = randomPassword();
        $sql = "INSERT INTO profesores (usuario, correo, nombre, pass) VALUES (?, ?, ?, ?)";

        $stmt = $obj->consultasPreparadas($sql);
        $stmt->bind_param("ssss", $user, $email, $name, $passwd);

        $user = substr($indice[0], 0, strpos($indice[0],'@'));
        $email = $indice[0];
        $name = $indice[1];
        $passwd = password_hash($pw, PASSWORD_DEFAULT);

        $pdf->Cell(40,9,$user,1);
        $pdf->Cell(40,9,$pw,1);
        $pdf->Ln();

        $stmt->execute();
    }

    $stmt->close();
    $obj->cerrarConexion();
    $pdf->Output();


?>