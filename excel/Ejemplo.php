<?php
/**
 * Created by PhpStorm.
 * User: 2daw10
 * Date: 23/02/2017
 * Time: 13:17
 */
$row = 1;
if (($handle = fopen("Alumnos.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);

        $row++;
        for ($c=0; $c < $num; $c++) {
            echo $data[$c] . "<br />\n";
        }
    }
    fclose($handle);
}