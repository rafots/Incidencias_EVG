<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
    <?php
        //require './Procedimientos/procs.php';
        require './simplexlsx.class.php';

        //$obj = new procedimientos();
        //$obj->Conectar();       
        extract($_POST);//Importa variables desde el array $_POST
        //if ($action == "upload") { //Comprueba le hemos dado al boton importar
              //$descriptor= fopen($_FILES["file"]["tmp_name"],'r+');
              //$file = $_FILES['file']['name']; 
              $clas = new SimpleXLSX("contacto.xlsx"); // Con esto directamente le pasamos el archivo que queremos abrir
              $tabla = $clas->rows();  // Nos da tidas las filas del Excel
            foreach($tabla as $indice)
            {

                echo $indice[0];
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo $indice[1];
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo $indice[2];
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo $indice[3];
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo $indice[4];
                echo '&nbsp';
                echo '&nbsp';
                echo '&nbsp';
                echo $indice[5];
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
                echo '<br>';
            }

               /*
               $row = 1;
               $fp = fopen ($archivo,"r"); //Abre el archivo
               while ($data = fgetcsv ($fp, 1000, ";")) //Obtiene una línea
               //de un puntero a un fichero y la analiza en busca de campos CSV
               {
               $num = count($data);
               print " <br>";
               $row++;
               $insertar="INSERT INTO excel (nombreCiudad,habitantesCiudad)
                           VALUES ('$data[0]','$data[1]')";
               $obj->Consultas($insertar);
               }
               fclose ($fp);
               echo "Campos Insertados ";
                  */
                
          // }
      
    ?>

