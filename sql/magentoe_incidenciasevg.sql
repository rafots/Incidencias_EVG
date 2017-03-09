-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-03-2017 a las 13:37:38
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
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `nia` char(7) NOT NULL,
  `nombreCompleto` varchar(50) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idSeccion` char(6) NOT NULL,
  `numPartes` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`nia`, `nombreCompleto`, `telefono`, `sexo`, `idSeccion`, `numPartes`) VALUES
('14FG564', 'Bonilla Pizarro, Juan Francisco', '634230211', 'H', 'DAW2', NULL),
('14FG565', 'Carmona González, Pablo', '634230211', 'H', 'DAW2', NULL),
('14FG566', 'Dionisio Arenas, Javier', '634230211', 'M', 'DAW2', NULL),
('14FG567', 'Galán De Isla, Alonso', '634230211', 'H', 'DAW2', NULL),
('14FG568', 'González León, Alberto', '634230211', 'H', 'DAW2', NULL),
('14FG569', 'Lindo Vázquez, Francisco Javier', '634230211', 'H', 'DAW2', NULL),
('14FG570', ' Martin Díaz, Jesús Manuel', '634230211', 'H', 'DAW2', NULL),
('14FG571', 'Megías Gómez, Manuel', '634230211', 'H', 'DAW2', NULL),
('14FG572', 'Merino Hernández, Marco Iván', '634230211', 'H', 'DAW2', NULL),
('14FG573', 'Murillo Benítez, José Antonio', '634230211', 'H', 'DAW2', NULL),
('14FG574', 'Oliva Morales, Jesús', '634230211', 'H', 'DAW2', NULL),
('14FG575', 'Ramos Sánchez, Ismael', '634230211', 'H', 'DAW2', NULL),
('14FG576', 'Romero López, Alberto', '634230211', 'H', 'DAW2', NULL),
('14FG577', 'Sáez González, José Javier', '634230211', 'M', 'DAW2', NULL),
('14FG578', 'Yanguas Torres, Daniel', '634230211', 'H', 'DAW2', NULL),
('14FG579', 'Cabrera Ávila, Antonio', '634230211', 'H', 'DAW2', NULL),
('14FG580', 'Caldito Jiménez, Alejandro', '634230211', 'H', 'DAW2', NULL),
('14FG581', 'Campañon Enrique, María', '634230211', 'H', 'DAW2', NULL),
('14FG582', 'Dávila Acedo, José Ángel', '634230211', 'H', 'DAW2', NULL),
('14FG583', 'Fariña Núñez, Jorge Luis', '634230211', 'H', 'DAW2', NULL),
('14FG584', 'Fernández Suárez, Mario', '634230211', 'H', 'DAW2', NULL),
('14FG585', 'Franco Díaz, Juan Antonio', '634230211', 'H', 'DAW2', NULL),
('14FG586', 'Hermosa Zamora, Luis Manuel', '634230211', 'H', 'DAW2', NULL),
('14FG587', 'Hidalgo Delgado, Francisco de Borja', '634230211', 'H', 'DAW2', NULL),
('14FG588', 'Jiménez Medina, Juan Francisco', '634230211', 'H', 'DAW2', NULL),
('17FG56', 'Juan Alberto Garcia', '657461029', 'H', '1ESOA', NULL),
('17FG564', 'Julio Alberto Maquina', '657451029', 'H', '1ESOA', NULL),
('17FG58', 'Rafael Menéndez Prim', '757461029', 'H', '1ESOA', NULL),
('17FG59', 'Laura Hernández Cordero', '657561029', 'M', '1ESOA', NULL),
('17FG66', 'Juan Alvarez Garcia', '657461629', 'H', '1ESOA', NULL),
('17FG76', 'Mario Fernández Idol', '657451029', 'H', '1ESOA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anotaciones`
--

CREATE TABLE `anotaciones` (
  `numAnotacion` smallint(5) UNSIGNED AUTO_INCREMENT NOT NULL,
  `tipoAnotacion` tinyint(4) NOT NULL,
  `nia` char(7) NOT NULL,
  `hora_Registro` datetime NOT NULL,
  `userCreacion` char(1) NOT NULL,
  `leida` tinyint(1) NOT NULL DEFAULT '0',
  `verProfesores` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `anotaciones`
--

INSERT INTO `anotaciones` (`numAnotacion`, `tipoAnotacion`, `nia`, `hora_Registro`, `userCreacion`, `leida`, `verProfesores`) VALUES
(1, 1, '14FG564', '2017-03-07 11:00:00', 'C', 0, 0),
(2, 2, '17FG564', '2017-03-08 12:00:00', 'T', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas`
--

CREATE TABLE `etapas` (
  `codEtapa` char(5) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `coordinador` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `etapas`
--

INSERT INTO `etapas` (`codEtapa`, `nombre`, `coordinador`) VALUES
('BAC', 'Bachillerato', 9),
('CFGM', 'Ciclo Formativo Grado Medio', 6),
('CFGS', 'Ciclo Formativo Grado Superior', 3),
('ESO', 'Educación Secundaria Obligator', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion`
--

CREATE TABLE `gestion` (
  `idUsuario` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `idHora` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`idHora`, `nombre`) VALUES
(1, '1 hora'),
(2, '2 hora'),
(3, '1 recreo'),
(4, '3 hora'),
(5, '4 hora'),
(6, '2 recreo'),
(7, '5 hora'),
(8, '6 hora'),
(9, '7 hora');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `motivo`
--

CREATE TABLE `motivo` (
  `idMotivo` tinyint(3) UNSIGNED NOT NULL,
  `motivo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `motivo`
--

INSERT INTO `motivo` (`idMotivo`, `motivo`) VALUES
(1, 'Acumulación de partes'),
(2, 'Parte grave'),
(3, 'Agresión'),
(4, 'Faltas de respeto'),
(5, 'Faltas de asistencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `idUsuario` tinyint(3) UNSIGNED NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(60) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profesor` tinyint(1) NOT NULL DEFAULT '1',
  `gestor` tinyint(1) NOT NULL DEFAULT '0',
  `tutor` tinyint(1) NOT NULL DEFAULT '0',
  `coordinador` tinyint(1) NOT NULL DEFAULT '0',
  `baja_temporal` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`idUsuario`, `usuario`, `correo`, `nombre`, `pass`, `profesor`, `gestor`, `tutor`, `coordinador`, `baja_temporal`) VALUES
(1, 'Bonilla', 'Bonilla@evg', 'Bonilla Pizarro, Juan Francisco', '$2y$10$4fLhiENSQR58FzdIwQ0ewOayWi/ZxjK50DRwI9kptYZKZuXUIPx3y', 1, 0, 1, 1, 0),
(2, 'Carmona', 'Carmona@evg', 'Carmona González, Pablo', '$2y$10$99fcrHaKX49unoeLNE7W5emlyUQkjgsCLzi6piTz9Udzpz9wLVHMu', 1, 0, 0, 0, 0),
(3, 'Dionisio', 'Dionisio@evg', 'Dionisio Arenas, Javier', '$2y$10$OIJa02agZeThgLDhxrqmseS72VwKi969rSj7xQRiZLasRqqA9bmDa', 1, 0, 0, 1, 0),
(4, 'Galan', 'Galan@evg', 'Galán De Isla, Alonso', '$2y$10$/h2U4Gy7SkRKcEzLnPNVkeWluZ75exSiG9AHOTENPnfPu8U6Kn9vG', 1, 0, 0, 0, 0),
(5, 'Gonzalez', 'Gonzalez@evg', 'González León, Alberto', '$2y$10$.vi69mELqkffwI/Gud95DeKwMzT8Zjt1alLpVruiAQKh0g0izJ7Jy', 1, 0, 0, 1, 0),
(6, 'Lindo', 'Lindo@evg', 'Lindo Vázquez, Francisco Javier', '$2y$10$Z0PVKeUZYH.zy2BSgNkfj.GdfEP/W2zBl/O5AbXdlinSqU65dtEg.', 1, 0, 1, 0, 0),
(7, 'Martin', 'Martin@evg', ' Martin Díaz, Jesús Manuel', '$2y$10$t5ZtFeNjvH5uaBTYdiWPyemwm9UpJ2lJMzTcbkHn/TVzXajZaBvSu', 1, 0, 0, 1, 0),
(8, 'Megias', 'Megias@evg', 'Megías Gómez, Manuel', '$2y$10$3iTcVxANb0SHMRE5OEL7Cuh5XS5PklfSCxrLN5Q2fbQX4ThMwsnEi', 1, 0, 0, 0, 0),
(9, 'Merino', 'Merino@evg', 'Merino Hernández, Marco Iván', '$2y$10$KzT8tg6noe5r9QRsS0jh7u6LGDsIGDtPCldYRKc/5qA9VweOavumK', 1, 0, 0, 0, 0),
(10, 'Murillo', 'Murillo@evg', 'Murillo Benítez, José Antonio', '$2y$10$RL2DV/00qGzpJ2OBtk6mWesDBHKIPA3VErnQtidjcrSXw2nVkiEZK', 1, 0, 0, 0, 0),
(11, 'Oliva', 'Oliva@evg', 'Oliva Morales, Jesús', '$2y$10$epaj0oqduq4waUCKZFxV7.ZLJZgqFmcowOwNQ3FxQVYzvqOsl8gNq', 1, 0, 0, 0, 0),
(12, 'Ramos', 'Ramos@evg', 'Ramos Sánchez, Ismael', '$2y$10$Y9cOkcCd4TTjvLXkZPWAF.y5bbqv1an2.uj5ItgPaZavAff1uLN3W', 1, 0, 0, 0, 0),
(13, 'Romero', 'Romero@evg', 'Romero López, Alberto', '$2y$10$36aNrYP4GimcQyC4VKl7i.VOfbC3JeQEMT1LxStr.pvt8125DYq02', 1, 0, 0, 0, 0),
(14, 'Saez', 'Saez@evg', 'Sáez González, José Javier', '$2y$10$ThYBTnjCLdOO8ogOT/N60.6Sb7kwQL.fsHCE5Am4kFJSDPLQpWBHm', 1, 0, 0, 0, 0),
(15, 'Yanguas', 'Yanguas@evg', 'Yanguas Torres, Daniel', '$2y$10$i8b4P.fw3yJxOAEIR5L3.uMqq4S2587RkkCWeT45oAd.JrmUq0epa', 1, 0, 0, 0, 0),
(16, 'Cabrera', 'Cabrera@evg', 'Cabrera Ávila, Antonio', '$2y$10$hs79hgE3HcCnniePeS.sZeD3RnpP5VgBgdCyBiw8cbGgb5J401uHG', 1, 0, 0, 0, 0),
(17, 'Caldito', 'Caldito@evg', 'Caldito Jiménez, Alejandro', '$2y$10$tuJYZM6sAMLLh0goJb2EReUAUnsnA0.W5R4oqw1JrVZNe9aO7wCEa', 1, 0, 0, 0, 0),
(18, 'Campanon', 'Campanon@evg', 'Campañon Enrique, María', '$2y$10$EqU9o0gxCUxBtdgKwdVW/O18bYLLj8wohbAW0YCKA4q6VXd5kIcpu', 1, 0, 0, 0, 0),
(19, 'Davila', 'Davila@evg', 'Dávila Acedo, José Ángel', '$2y$10$EdXbXbbM/FPYSLivlD8hV.W0QIVrH7WAXnFrpswCE839SgJcpLIaW', 1, 0, 0, 0, 0),
(20, 'Farina', 'Farina@evg', 'Fariña Núñez, Jorge Luis', '$2y$10$PrcSDznAM1ijmKqvC.rt3.Dn76IHNoLm4rNZie3idDoyb2obRYwmK', 1, 0, 0, 0, 0),
(21, 'Fernandez', 'Fernandez@evg', 'Fernández Suárez, Mario', '$2y$10$unHgtTKK.AmReud6/1GFPuDB/y2i.tpJjzLOYVwRHi4vKhDw.f/kK', 1, 0, 0, 0, 0),
(22, 'Franco', 'Franco@evg', 'Franco Díaz, Juan Antonio', '$2y$10$xZyP8mtmAapvvv5d.BtwPu4t/kGykFBUdBYaur8HG4P7ItdQlDR0i', 1, 0, 0, 0, 0),
(23, 'Hermosa', 'Hermosa@evg', 'Hermosa Zamora, Luis Manuel', '$2y$10$lc60OZFT94zmHITbdpz3xu99RSDtzx..IS3A3ECyC2tLp8B8j41TK', 1, 0, 0, 0, 0),
(24, 'Hidalgo', 'Hidalgo@evg', 'Hidalgo Delgado, Francisco de Borja', '$2y$10$FrKYST4jyH0rpWxu4RA5NuUarilGFhrJQH/tCLUmbyAQs0ba7IxSe', 1, 0, 0, 0, 0),
(25, 'Jimenez', 'Jimenez@evg', 'Jiménez Medina, Juan Francisco', '$2y$10$KaOmSexlPJxdNaCOMgMV6O9mEz7Ro/SP4St7X/eoPzj5x7uTRqq12', 1, 0, 0, 0, 0),
(26, 'Guerrero', 'Guerrero@evg', 'Martín Guerrero, Rafael', '$2y$10$136W6GjiuWF7cRiYbG5Oz.3vqNTvtBKeZ2Rkc5Zv8dhk.A1otbB0a', 1, 0, 0, 0, 0),
(27, 'Molina', 'Molina@evg', 'Molina Barbellido, Ismael', '$2y$10$Y66Qz7TPWZtceBDYfTfHtu69p6qD.pTmjdPIUboJ9XIzMARhX477O', 1, 0, 0, 0, 0),
(28, 'Lopez', 'Lopez@evg', 'Núñez López, Samuel', '$2y$10$CcgkoHf8ogVF0Kf0kXpDEOc6Hr6tAUBMkgPpHuNF7O.JP8FsY89ce', 1, 0, 0, 0, 0),
(29, 'Zapatero', 'Zapatero@evg', 'Zacarias Zatrusteri, Zapatero', '$2y$10$EL7tUgwHH6jvxHh2Q1kcS.KYxRuXG94j57dQjXbkkpUmcY5NnOpTu', 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_seccion`
--

CREATE TABLE `profesores_seccion` (
  `profesor` tinyint(3) UNSIGNED NOT NULL,
  `idSeccion` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesores_seccion`
--

INSERT INTO `profesores_seccion` (`profesor`, `idSeccion`) VALUES
(2, 'DAW2'),
(10, '1ESOA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE `sanciones` (
  `idSancion` smallint(5) UNSIGNED NOT NULL,
  `idIncidencia` smallint(5) UNSIGNED NOT NULL,
  `tipoSancion` tinyint(3) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date DEFAULT NULL,
  `observacion` varchar(300) NOT NULL,
  `idMotivo` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sanciones`
--

INSERT INTO `sanciones` (`idSancion`, `idIncidencia`, `tipoSancion`, `fecha_inicio`, `fecha_fin`, `observacion`, `idMotivo`) VALUES
(1, 1, 2, '2017-03-07', NULL, 'El alumno lleva varios días faltando, me he visto obligado a ', 5),
(2, 5, 2, '2017-03-08', '2017-03-09', 'El alumno ha sido expulsado por agresión', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idSeccion` char(6) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `tutor` tinyint(3) UNSIGNED NOT NULL,
  `codEtapa` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idSeccion`, `nombre`, `tutor`, `codEtapa`) VALUES
('1ESOA', 'Primero de  educación secundaria obligatoria', 6, 'ESO'),
('BC1A', '1º de Bachillerato (Humanidades y Ciencias Sociales)', 1, 'ESO'),
('BC1B', '1º de Bachillerato (Humanidades y Ciencias Sociales)', 2, 'ESO'),
('BC1C', '1º de Bachillerato (Ciencias)', 3, 'ESO'),
('DAW2', '2 Desarrollo AplicacionesWeb', 1, 'CFGS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_anotaciones`
--

CREATE TABLE `tipos_anotaciones` (
  `tipoAnotacion` tinyint(4) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `codEtapa` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipos_anotaciones`
--

INSERT INTO `tipos_anotaciones` (`tipoAnotacion`, `nombre`, `codEtapa`) VALUES
(1, 'Expulsion', 'CFGS'),
(2, 'Agresión en el aula', 'ESO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_incidencias`
--

CREATE TABLE `tipo_incidencias` (
  `idTipo` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `gestiona` char(1) NOT NULL,
  `codEtapa` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_incidencias`
--

INSERT INTO `tipo_incidencias` (`idTipo`, `nombre`, `gestiona`, `codEtapa`) VALUES
(1, 'Aula de convivencia', 'C', 'ESO'),
(2, 'Parte disciplinario', 'C', 'CFGS'),
(3, 'Apercibimiento escrito', 'C', 'CFGS'),
(4, 'No uniforme', 'T', 'BAC'),
(5, 'No uniforme', 'T', 'ESO'),
(6, 'Enfermedad', 'T', 'CFGS'),
(7, 'Enfermedad', 'T', 'ESO'),
(8, 'Expulsión al pasillo', 'T', 'ESO'),
(9, 'Expulsión al pasillo', 'T', 'CFGS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sancion`
--

CREATE TABLE `tipo_sancion` (
  `tipoSancion` tinyint(3) UNSIGNED NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_sancion`
--

INSERT INTO `tipo_sancion` (`tipoSancion`, `nombre`) VALUES
(1, 'Biblioteca'),
(2, 'Parte disciplinario'),
(3, 'Aula de convivencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_sancion_incidencias`
--

CREATE TABLE `tipo_sancion_incidencias` (
  `tipoSancion` tinyint(3) UNSIGNED NOT NULL,
  `idTipo` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_sancion_incidencias`
--

INSERT INTO `tipo_sancion_incidencias` (`tipoSancion`, `idTipo`) VALUES
(2, 2),
(3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`nia`),
  ADD KEY `fk_secciones_alumnos` (`idSeccion`),
  ADD KEY `numPartes` (`numPartes`);

--
-- Indices de la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD PRIMARY KEY (`numAnotacion`),
  ADD KEY `anotaciones_1` (`tipoAnotacion`),
  ADD KEY `anotaciones_2` (`nia`);

--
-- Indices de la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD PRIMARY KEY (`codEtapa`),
  ADD KEY `fk_etapas_profesores` (`coordinador`);

--
-- Indices de la tabla `gestion`
--
ALTER TABLE `gestion`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`idHora`);

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
-- Indices de la tabla `motivo`
--
ALTER TABLE `motivo`
  ADD PRIMARY KEY (`idMotivo`);

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `profesores_seccion`
--
ALTER TABLE `profesores_seccion`
  ADD PRIMARY KEY (`profesor`,`idSeccion`),
  ADD KEY `fk_seccion_prof_secc` (`idSeccion`);

--
-- Indices de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD PRIMARY KEY (`idSancion`),
  ADD KEY `fk_incidencias_sanciones` (`idIncidencia`),
  ADD KEY `fk_tipo_sancion_sanciones` (`tipoSancion`),
  ADD KEY `fk_motivo_sancion` (`idMotivo`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idSeccion`),
  ADD KEY `fk_tutores_secciones` (`tutor`),
  ADD KEY `fk_etapas_secciones` (`codEtapa`);

--
-- Indices de la tabla `tipos_anotaciones`
--
ALTER TABLE `tipos_anotaciones`
  ADD PRIMARY KEY (`tipoAnotacion`),
  ADD KEY `fk_tipos_Anotaciones` (`codEtapa`);

--
-- Indices de la tabla `tipo_incidencias`
--
ALTER TABLE `tipo_incidencias`
  ADD PRIMARY KEY (`idTipo`),
  ADD KEY `fk_tipos_incidencias` (`codEtapa`);

--
-- Indices de la tabla `tipo_sancion`
--
ALTER TABLE `tipo_sancion`
  ADD PRIMARY KEY (`tipoSancion`);

--
-- Indices de la tabla `tipo_sancion_incidencias`
--
ALTER TABLE `tipo_sancion_incidencias`
  ADD PRIMARY KEY (`tipoSancion`,`idTipo`),
  ADD KEY `fk_tipo_sancion_incidencias_2` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `idIncidencia` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `motivo`
--
ALTER TABLE `motivo`
  MODIFY `idMotivo` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `profesores`
--
ALTER TABLE `profesores`
  MODIFY `idUsuario` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  MODIFY `idSancion` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_secciones_alumnos` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);

--
-- Filtros para la tabla `anotaciones`
--
ALTER TABLE `anotaciones`
  ADD CONSTRAINT `anotaciones_1` FOREIGN KEY (`tipoAnotacion`) REFERENCES `tipos_anotaciones` (`tipoAnotacion`),
  ADD CONSTRAINT `anotaciones_2` FOREIGN KEY (`nia`) REFERENCES `alumnos` (`nia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `etapas`
--
ALTER TABLE `etapas`
  ADD CONSTRAINT `fk_etapas_profesores` FOREIGN KEY (`coordinador`) REFERENCES `profesores` (`idUsuario`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `fk_incidencias_alumno` FOREIGN KEY (`nia`) REFERENCES `alumnos` (`nia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_incidencias_hora` FOREIGN KEY (`idHora`) REFERENCES `horas` (`idHora`),
  ADD CONSTRAINT `fk_incidencias_profesor` FOREIGN KEY (`usuario`) REFERENCES `profesores` (`idUsuario`),
  ADD CONSTRAINT `fk_incidencias_tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo_incidencias` (`idTipo`);

--
-- Filtros para la tabla `profesores_seccion`
--
ALTER TABLE `profesores_seccion`
  ADD CONSTRAINT `fk_profesor_prof_secc` FOREIGN KEY (`profesor`) REFERENCES `profesores` (`idUsuario`),
  ADD CONSTRAINT `fk_seccion_prof_secc` FOREIGN KEY (`idSeccion`) REFERENCES `secciones` (`idSeccion`);

--
-- Filtros para la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD CONSTRAINT `fk_incidencias_sanciones` FOREIGN KEY (`idIncidencia`) REFERENCES `incidencias` (`idIncidencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_motivo_sancion` FOREIGN KEY (`idMotivo`) REFERENCES `motivo` (`idMotivo`),
  ADD CONSTRAINT `fk_tipo_sancion_sanciones` FOREIGN KEY (`tipoSancion`) REFERENCES `tipo_sancion` (`tipoSancion`);

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `fk_etapas_secciones` FOREIGN KEY (`codEtapa`) REFERENCES `etapas` (`codEtapa`),
  ADD CONSTRAINT `fk_tutores_secciones` FOREIGN KEY (`tutor`) REFERENCES `profesores` (`idUsuario`);

--
-- Filtros para la tabla `tipos_anotaciones`
--
ALTER TABLE `tipos_anotaciones`
  ADD CONSTRAINT `fk_tipos_Anotaciones` FOREIGN KEY (`codEtapa`) REFERENCES `etapas` (`codEtapa`);

--
-- Filtros para la tabla `tipo_incidencias`
--
ALTER TABLE `tipo_incidencias`
  ADD CONSTRAINT `fk_tipos_incidencias` FOREIGN KEY (`codEtapa`) REFERENCES `etapas` (`codEtapa`);

--
-- Filtros para la tabla `tipo_sancion_incidencias`
--
ALTER TABLE `tipo_sancion_incidencias`
  ADD CONSTRAINT `fk_tipo_sancion_incidencias_1` FOREIGN KEY (`tipoSancion`) REFERENCES `tipo_sancion` (`tipoSancion`),
  ADD CONSTRAINT `fk_tipo_sancion_incidencias_2` FOREIGN KEY (`idTipo`) REFERENCES `tipo_incidencias` (`idTipo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
