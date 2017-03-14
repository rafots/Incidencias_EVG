<?php

require_once '../procedimientos/procedimientos.php';
$objeto = new procedimientos();
$objeto->conectar();
$objeto->consultas("select secciones.idSeccion as seccionid,secciones.nombre as nombreseccion from secciones inner join etapas on secciones.codEtapa = etapas.codEtapa
   inner join tipos_anotaciones on etapas.codEtapa = tipos_anotaciones.codEtapa
where etapas.codEtapa LIKE '".$_SESSION["codEtapa"]."'");