<?php
require_once '../sources/fpdf/fpdf.php';
require_once 'simplexlsx.class.php';
require_once '../procedimientos/procedimientos.php';
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
$pdf->Cell(80,9,utf8_decode("Lista de usuarios añadidos"));
$pdf->Ln();
$pdf->SetFont('Arial','I',16);
$pdf->Ln();
$pdf->Cell(40,9,'Usuario',1);
$pdf->Cell(40,9,utf8_decode('Contraseña'),1);
$pdf->Ln();

foreach($tabla as $indice){
    $pw = randomPassword();
    $sql = "INSERT INTO profesores (usuario, correo, nombre, pass) VALUES (?, ?, ?, ?)";
    utf8_decode($pw);
    $stmt = $obj->consultasPreparadas($sql);
    $stmt->bind_param("ssss", $user, $email, $name, $passwd);

    $user = substr($indice[0], 0, strpos($indice[0],'@'));
    $email = $indice[0];
    $name = $indice[1];
    $passwd = password_hash($pw, PASSWORD_DEFAULT);

    $pdf->Cell(40,9,utf8_decode($user),1);
    $pdf->Cell(40,9,$pw,1);
    $pdf->Ln();

    $stmt->execute();
}

$stmt->close();
$obj->cerrarConexion();
$pdf->Output();

if($obj->filasAfectadas()){
    echo "Se han importado los datos con exito";
}else{
    echo "Error al importar los datos";
}

?>