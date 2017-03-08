-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2017 a las 01:22:37
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `magentoe_incidenciasevg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `idIncidencia` smallint(5) UNSIGNED NOT NULL,
  `nia` char(7) NOT NULL,
  `idTipo` tinyint(3) UNSIGNED NOT NULL,
  `usuario` tinyint(3) UNSIGNED NOT NULL,
  `codAsignatura` varchar(30) DEFAULT NULL,
  `idHora` tinyint(3) UNSIGNED NOT NULL,
  `fecha_ocurrencia` date NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `leidaT` tinyint(1) NOT NULL DEFAULT '0',
  `leidaC` tinyint(1) NOT NULL DEFAULT '0',
  `archivadaT` tinyint(1) NOT NULL DEFAULT '0',
  `archivadaC` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`idIncidencia`, `nia`, `idTipo`, `usuario`, `codAsignatura`, `idHora`, `fecha_ocurrencia`, `fecha_registro`, `descripcion`, `leidaT`, `leidaC`, `archivadaT`, `archivadaC`) VALUES
(1, '14FG564', 6, 1, 'Matemáticas', 1, '2017-03-06', '2017-03-06 08:30:20', 'El alumno lleva varios días sin asistir a clase por encontrarse indispuesto', 0, 0, 0, 0),
(2, '14FG573', 9, 2, 'Matemáticas', 9, '2017-03-06', '2017-03-06 14:12:00', 'El alumno estaba molestando.', 0, 0, 0, 0),
(3, '14FG574', 9, 2, 'Matemáticas', 9, '2017-03-06', '2017-03-06 14:15:00', 'El alumno estaba perturbando a los alumnos.', 0, 0, 0, 0),
(4, '14FG575', 6, 2, 'Matemáticas', 8, '2017-03-06', '2017-03-06 13:15:00', 'El alumno lleva varios días enfermo.', 0, 0, 0, 0),
(5, '14FG580', 2, 2, 'Lenguaje', 1, '2017-03-08', '2017-03-08 08:15:00', 'El alumno ha agredido a un compañero.', 0, 0, 0, 0),
(6, '17FG59', 1, 6, 'Informatica', 1, '2017-03-09', '2017-03-09 08:24:00', 'El alumno no ha sabido compartarse correctamente en el aula', 0, 0, 0, 0),
(7, '17FG564', 1, 10, 'Lengua', 2, '2017-03-09', '2017-03-10 09:19:00', 'El alumno ha desobedecido órdenes directas mías', 0, 0, 0, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`idIncidencia`),
  ADD KEY `fk_incidencias_alumno` (`nia`),
  ADD KEY `fk_incidencias_tipo` (`idTipo`),
  ADD KEY `fk_incidencias_profesor` (`usuario`),
  ADD KEY `fk_incidencias_hora` (`idHora`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idIncidencia` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `fk_incidencias_alumno` FOREIGN KEY (`nia`) REFERENCES `alumnos` (`nia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_incidencias_hora` FOREIGN KEY (`idHora`) REFERENCES `horas` (`idHora`),
  ADD CONSTRAINT `fk_incidencias_profesor` FOREIGN KEY (`usuario`) REFERENCES `profesores` (`idUsuario`),
  ADD CONSTRAINT `fk_incidencias_tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo_incidencias` (`idTipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
