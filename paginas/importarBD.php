<?php
/**
 * Created by PhpStorm.
 * User: Rafa
 * Date: 15/03/2017
 * Time: 21:16
 */
require '../procedimientos/procedimientos.php';
$obj = new procedimientos();
$obj->importarBD();
$query = "CREATE DATABASE IF NOT EXISTS magentoe_IncidenciasEVG; ";
$query .= "USE  magentoe_IncidenciasEVG; ";
$query .= "CREATE TABLE IF NOT EXISTS profesores(
  idUsuario TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  usuario VARCHAR(20) NOT NULL UNIQUE,
  correo VARCHAR(60) NOT NULL,
  nombre VARCHAR(50) NOT NULL,
  pass VARCHAR(255) NOT NULL,
  profesor BOOLEAN NOT NULL DEFAULT TRUE ,
  gestor BOOLEAN NOT NULL DEFAULT FALSE ,
  tutor BOOLEAN NOT NULL DEFAULT FALSE ,
  coordinador BOOLEAN NOT NULL DEFAULT FALSE ,
  baja_temporal BOOLEAN NOT NULL DEFAULT FALSE
);";
$query .="CREATE TABLE IF NOT EXISTS etapas(
  codEtapa CHAR(5) PRIMARY KEY,
  nombre VARCHAR(30) NOT NULL,
  coordinador TINYINT UNSIGNED DEFAULT NULL,
  CONSTRAINT fk_etapas_profesores FOREIGN KEY (coordinador) REFERENCES profesores(idUsuario)
);";
$query .="CREATE TABLE IF NOT EXISTS secciones(
  idSeccion CHAR(6) NOT NULL PRIMARY KEY,
  nombre VARCHAR(60) NOT NULL,
  tutor TINYINT UNSIGNED DEFAULT NULL,
  codEtapa CHAR(5) NOT NULL,
  CONSTRAINT fk_tutores_secciones FOREIGN KEY (tutor) REFERENCES profesores(idUsuario),
  CONSTRAINT fk_etapas_secciones FOREIGN KEY (codEtapa) REFERENCES etapas(codEtapa)
);";
$query .= "CREATE TABLE  IF NOT EXISTS alumnos(
  nia CHAR (7) PRIMARY KEY,
  nombreCompleto VARCHAR(50) NOT NULL,
  telefono VARCHAR(9) NOT NULL,
  sexo CHAR(1) NOT NULL,
  idSeccion CHAR(6) NOT NULL ,
  numPartes tinyint(4) DEFAULT NULL,
  CONSTRAINT fk_secciones_alumnos  FOREIGN KEY (idSeccion) REFERENCES secciones(idSeccion)
);";
$query .= "CREATE TABLE IF NOT EXISTS profesores_seccion(
  profesor TINYINT UNSIGNED,
  idSeccion CHAR(5),
  PRIMARY KEY (profesor,idSeccion),
  CONSTRAINT fk_profesor_prof_secc FOREIGN KEY (profesor) REFERENCES profesores(idUsuario),
  CONSTRAINT fk_seccion_prof_secc FOREIGN KEY (idSeccion) REFERENCES secciones(idSeccion)
);";
$query .= "CREATE TABLE IF NOT EXISTS tipo_Incidencias(
  idTipo tinyint UNSIGNED PRIMARY KEY,
  nombre varchar(30) NOT NULL,
  codEtapa CHAR(5) NOT NULL,
  gestiona CHAR(1) NOT NULL,
  CONSTRAINT fk_tipos_incidencias FOREIGN KEY (codEtapa) REFERENCES etapas(codEtapa)
);";
$query .= "CREATE TABLE IF NOT EXISTS horas(
  idHora TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(20) NOT NULL
);";
$query .= "CREATE TABLE IF NOT EXISTS incidencias(
  idIncidencia SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  nia CHAR(7) NOT NULL,
  idTipo TINYINT UNSIGNED  NOT NULL,
  usuario TINYINT UNSIGNED NOT NULL,
  codAsignatura VARCHAR(30) NULL,
  idHora TINYINT UNSIGNED NOT NULL,
  fecha_ocurrencia DATE NOT NULL,
  fecha_registro DATETIME NOT NULL,
  descripcion VARCHAR(300) NOT NULL,
  leidaT BOOLEAN NOT NULL DEFAULT FALSE ,
  leidaC BOOLEAN NOT NULL DEFAULT FALSE ,
  archivadaT BOOLEAN NOT NULL DEFAULT FALSE ,
  archivadaC BOOLEAN NOT NULL DEFAULT FALSE ,
  CONSTRAINT fk_incidencias_alumno FOREIGN KEY (nia) REFERENCES alumnos(nia) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_incidencias_tipo FOREIGN KEY (idTipo) REFERENCES  tipo_Incidencias(idTipo),
  CONSTRAINT fk_incidencias_profesor FOREIGN KEY (usuario) REFERENCES profesores(idUsuario),
  CONSTRAINT fk_incidencias_hora FOREIGN KEY (idHora) REFERENCES horas(idHora)
);";
$query .= "CREATE TABLE IF NOT EXISTS tipos_Anotaciones(
  tipoAnotacion TINYINT PRIMARY KEY,
  nombre varchar(40) NOT NULL,
  codEtapa CHAR(5) NOT NULL,
  CONSTRAINT fk_tipos_Anotaciones FOREIGN KEY (codEtapa) REFERENCES etapas(codEtapa)
);";
$query .= "CREATE TABLE IF NOT EXISTS anotaciones(
  numAnotacion SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  tipoAnotacion TINYINT NOT NULL,
  nia CHAR(7) NOT NULL ,
  hora_Registro DATETIME NOT NULL,
  userCreacion CHAR(1) NOT NULL ,
  leida BOOLEAN NOT NULL DEFAULT FALSE ,
  verProfesores BOOLEAN NULL DEFAULT FALSE ,
  descripcion varchar(300) NOT NULL,
  CONSTRAINT anotaciones_1 FOREIGN KEY (tipoAnotacion)
  REFERENCES tipos_Anotaciones (tipoAnotacion),
  CONSTRAINT anotaciones_2 FOREIGN KEY (nia) REFERENCES alumnos(nia) ON DELETE CASCADE ON UPDATE CASCADE
);";
$query .= "CREATE TABLE IF NOT EXISTS tipo_sancion(
  tipoSancion TINYINT UNSIGNED NOT NULL PRIMARY KEY,
  nombre VARCHAR(20) NOT NULL
);";
$query .= "CREATE TABLE IF NOT EXISTS motivo(
  idMotivo TINYINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
  motivo VARCHAR(20) NOT NULL
);";
$query .= "CREATE TABLE IF NOT EXISTS sanciones(
  idSancion SMALLINT UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
  idIncidencia SMALLINT UNSIGNED NULL,
  nia CHAR(7) NULL,
  tipoSancion TINYINT  UNSIGNED NOT NULL,
  fecha_inicio DATE NOT NULL,
  fecha_fin DATE DEFAULT NULL ,
  observacion VARCHAR(300) NOT NULL,
  idMotivo TINYINT UNSIGNED NOT NULL,
  ultima_sancion TINYINT UNSIGNED NOT NULL,
  CONSTRAINT fk_incidencias_sanciones FOREIGN KEY (idIncidencia) REFERENCES incidencias(idIncidencia) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT fk_tipo_sancion_sanciones FOREIGN KEY (tipoSancion) REFERENCES tipo_sancion(tipoSancion),
  CONSTRAINT fk_motivo_sancion FOREIGN KEY (idMotivo) REFERENCES motivo(idMotivo)
);";

$query .= "CREATE TABLE IF NOT EXISTS tipo_sancion_incidencias(
  tipoSancion TINYINT UNSIGNED NOT NULL,
  idTipo TINYINT  UNSIGNED NOT NULL,
  PRIMARY KEY (tipoSancion,idTipo),
  CONSTRAINT fk_tipo_sancion_incidencias_1 FOREIGN KEY (tipoSancion) REFERENCES tipo_sancion(tipoSancion),
  CONSTRAINT fk_tipo_sancion_incidencias_2 FOREIGN KEY (idTipo) REFERENCES tipo_Incidencias(idTipo)
);";

$query .= "CREATE TABLE IF NOT EXISTS gestion(
  idUsuario TINYINT UNSIGNED PRIMARY KEY,
  nombre VARCHAR(20) NOT NULL,
  pass VARCHAR(255) NOT NULL
);";

$query .= "INSERT INTO `etapas` (`codEtapa`, `nombre`, `coordinador`) VALUES
  ('BAC', 'Bachillerato', NULL),
  ('CFGM', 'Ciclo Formativo Grado Medio', NULL),
  ('CFGS', 'Ciclo Formativo Grado Superior', NULL),
  ('ESO', 'Educación Secundaria Obligator', NULL);";

$query .= "INSERT INTO `tipo_incidencias` (`idTipo`, `nombre`, `gestiona`, `codEtapa`) VALUES
  (1, 'Aula de convivencia', 'C', 'ESO'),
  (2, 'Parte disciplinario', 'C', 'CFGS'),
  (3, 'Apercibimiento escrito', 'C', 'CFGS'),
  (4, 'No uniforme', 'T', 'BAC'),
  (5, 'No uniforme', 'T', 'ESO'),
  (6, 'Enfermedad', 'T', 'CFGS'),
  (7, 'Enfermedad', 'T', 'ESO'),
  (8, 'Expulsión al pasillo', 'T', 'ESO'),
  (9, 'Expulsión al pasillo', 'T', 'CFGS');";

$query .= "INSERT INTO `tipo_sancion` (`tipoSancion`, `nombre`) VALUES
  (1, 'Biblioteca'),
  (2, 'Aula de convivencia'),
  (3, 'Expulado del centro'),
  (4, 'Trabajos comunitarios'),
  (5, 'Séptima hora');";

$query .= "INSERT INTO `tipo_sancion_incidencias` (`tipoSancion`, `idTipo`) VALUES
  (1, 2),
  (3, 1);";

$query .= "INSERT INTO `tipos_anotaciones` (`tipoAnotacion`, `nombre`, `codEtapa`) VALUES
  (1, 'Expulsion', 'CFGS'),
  (2, 'Agresión en el aula', 'ESO'),
  (3, 'Agresión en el aula', 'CFGS'),
  (4, 'Agresión en el aula','BAC'),
  (5, 'Problemas con profesor','BAC'),
  (6, 'Problemas con profesor','ESO'),
  (7, 'Problemas con profesor','CFGS');";

$query .= "INSERT INTO `horas` (`idHora`, `nombre`) VALUES
  (1, '1 hora'),
  (2, '2 hora'),
  (3, '1 recreo'),
  (4, '3 hora'),
  (5, '4 hora'),
  (6, '2 recreo'),
  (7, '5 hora'),
  (8, '6 hora'),
  (9, '7 hora');";

$query .= "INSERT INTO `motivo` (`idMotivo`, `motivo`) VALUES
  (1, 'Acumulación de partes'),
  (2, 'Parte grave'),
  (3, 'Agresión'),
  (4, 'Faltas de respeto'),
  (5, 'Faltas de asistencia')";

$obj->multiConsultas($query);

if($obj->errores())
{
    echo $obj->errores();
}
else{
    $obj->cerrarConexion();
    header('Location: Importaciones.php');
}