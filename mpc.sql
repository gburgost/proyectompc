-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-11-2014 a las 02:18:32
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mpc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
`id_departamento` int(255) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(2, 'GERENCIA'),
(3, 'CONTABILIDAD'),
(4, 'ADMINSITRACION'),
(5, 'ADQUISICION'),
(6, 'VENTAS'),
(7, 'INFORMATICA'),
(8, 'PRODUCCION'),
(9, 'PREVENCION');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
`id_empleado` int(255) NOT NULL,
  `rut_persona` char(10) NOT NULL,
  `fecha_vinculacion` date NOT NULL,
  `fecha_desvinculacion` date NOT NULL,
  `tipo_contrato` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `id_departamento` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `rut_persona`, `fecha_vinculacion`, `fecha_desvinculacion`, `tipo_contrato`, `cargo`, `id_departamento`) VALUES
(8, '7165887-2', '2006-07-17', '0000-00-00', 'Indefinido', 'Soldador', 8),
(9, '11469991-8', '2012-04-03', '0000-00-00', 'Indefinido', 'Soldador', 8),
(10, '12402211-8', '2006-01-09', '0000-00-00', 'Indefinido', 'Jefe de ventas', 6),
(11, '15611042-6', '2010-04-05', '0000-00-00', 'Indefinido', 'Prevencionista', 9),
(12, '9897840-2', '2006-10-01', '0000-00-00', 'Indefinido', 'Contador', 3),
(13, '1234567', '0000-00-00', '0000-00-00', 'Seleccione Tipo', '', 1),
(14, '18393479-1', '2013-10-03', '0000-00-00', 'Indefinido', 'tecnico informatico', 7),
(16, '18403314-3', '2014-11-25', '2014-11-26', 'Indefinido', 'Gerente ', 0),
(17, '13015775-0', '2006-04-04', '0000-00-00', 'Indefinido', 'Secretaria de Administracion', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guardia`
--

CREATE TABLE IF NOT EXISTS `guardia` (
  `rut_guardia` varchar(10) NOT NULL,
  `nombre_guardia` varchar(20) NOT NULL,
  `apellido_guardia` varchar(20) NOT NULL,
  `fecha_nac` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `guardia`
--

INSERT INTO `guardia` (`rut_guardia`, `nombre_guardia`, `apellido_guardia`, `fecha_nac`) VALUES
('18393479-1', 'Gonzalo', 'Burgos', '1993-03-12'),
('18403314-3', 'Hector', 'Prieto', '1993-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_negra`
--

CREATE TABLE IF NOT EXISTS `lista_negra` (
`id_lista` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `motivo` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_negra`
--

INSERT INTO `lista_negra` (`id_lista`, `rut_persona`, `motivo`) VALUES
(2, '7165887-2', 'Termino de contrato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`id_login` int(11) NOT NULL,
  `user` varchar(10) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `user`, `pass`, `rol`) VALUES
(1, '18393479-1', 'gonzalo', 'administrador'),
(2, '18403314-3', 'hector', 'guardia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
`id` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo_persona` varchar(50) NOT NULL,
  `foto` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `rut_persona`, `nombre`, `apellido`, `fecha_nac`, `tipo_persona`, `foto`) VALUES
(8, '7165887-2', 'Manuel', 'Cortes', '1954-01-31', 'Empleado', ''),
(9, '11469991-8', 'Raul', 'ZuÃ±iga', '1969-09-29', 'Empleado', ''),
(10, '12402211-8', 'Juan ', 'Hidalgo', '1973-04-07', 'Empleado', ''),
(11, '15611042-6', 'Marcelo', 'Antivilo', '1983-04-05', 'Empleado', ''),
(12, '9897840-2', 'Jose', 'Burgos', '1965-02-24', 'Empleado', ''),
(14, '18393479-1', 'Gonzalo', 'Burgos', '1993-03-12', 'Empleado', 'archivos/10599658_1573520852882096_7447515760027725072_n.jpg'),
(17, '18403314-3', 'Hector', 'Prieto', '1993-03-27', 'Empleado', 'archivos/89d6da88-f590-4581-8ab8-38e36c87fcba.jpg'),
(18, '13015775-0', 'Lorna', 'Carrizo', '1976-09-26', 'Empleado', 'archivos/descarga.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `punto_acceso`
--

CREATE TABLE IF NOT EXISTS `punto_acceso` (
  `nro_garita` int(2) NOT NULL,
  `descripcion` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_persona`
--

CREATE TABLE IF NOT EXISTS `registro_persona` (
`cod_registro` int(255) NOT NULL,
  `nro_garita` int(2) DEFAULT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `rut_guardia` varchar(10) DEFAULT NULL,
  `fecha_entrada` varchar(10) DEFAULT NULL,
  `hora_entrada` varchar(10) DEFAULT NULL,
  `fecha_salida` varchar(10) DEFAULT NULL,
  `hora_salida` varchar(10) DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_persona`
--

INSERT INTO `registro_persona` (`cod_registro`, `nro_garita`, `rut_persona`, `rut_guardia`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `estado`) VALUES
(60, 0, '18393479-1', '', '13-11-2014', '23:37:32', '14-11-2014', '00:00:43', 'cerrado'),
(65, 0, '18393479-1', '', '14-11-2014', '00:00:24', '14-11-2014', '00:00:43', 'cerrado'),
(66, 0, '18393479-1', '', '14-11-2014', '00:13:25', '14-11-2014', '00:28:17', 'cerrado'),
(68, 0, '13015775-0', '', '14-11-2014', '00:35:45', '14-11-2014', '00:35:57', 'cerrado'),
(73, 0, '7165887-2', '', '14-11-2014', '00:43:00', '14-11-2014', '00:43:26', 'cerrado'),
(74, 0, '7165887-2', '', '14-11-2014', '00:50:27', '14-11-2014', '00:51:08', 'cerrado'),
(75, 0, '7165887-2', '', '14-11-2014', '00:51:13', '14-11-2014', '00:51:19', 'cerrado'),
(76, 0, '18393479-1', '', '14-11-2014', '01:12:18', '14-11-2014', '01:15:23', 'cerrado'),
(77, 0, '7165887-2', '', '14-11-2014', '01:16:24', '14-11-2014', '01:16:35', 'cerrado'),
(78, 0, '18393479-1', '', '14-11-2014', '01:34:36', '14-11-2014', '01:55:41', 'cerrado'),
(79, 0, '9897840-2', '', '14-11-2014', '01:54:19', '14-11-2014', '01:54:32', 'cerrado'),
(80, 0, '18393479-1', '', '14-11-2014', '02:10:20', '14-11-2014', '02:10:57', 'cerrado'),
(81, 0, '13015775-0', '', '14-11-2014', '12:21:10', '14-11-2014', '12:21:53', 'cerrado'),
(82, 0, '13015775-0', '', '14-11-2014', '17:44:45', '14-11-2014', '17:45:26', 'cerrado'),
(83, 0, '18393479-1', '', '16-11-2014', '19:32:05', '19-11-2014', '16:15:20', 'cerrado'),
(84, 0, '9897840-2', '', '19-11-2014', '15:52:09', '25-11-2014', '17:25:30', 'cerrado'),
(85, 0, '13015775-0', '', '19-11-2014', '15:53:44', '19-11-2014', '16:16:51', 'cerrado'),
(86, 0, '11469991-8', '', '19-11-2014', '15:55:40', '', '', 'abierto'),
(87, 0, '12402211-8', '', '19-11-2014', '16:00:04', '', '', 'abierto'),
(88, 0, '15611042-6', '', '19-11-2014', '16:01:25', '', '', 'abierto'),
(89, 0, '18393479-1', '', '19-11-2014', '16:17:44', '19-11-2014', '17:45:13', 'cerrado'),
(90, 0, '13015775-0', '', '19-11-2014', '17:42:21', '19-11-2014', '17:57:44', 'cerrado'),
(91, 0, '18393479-1', '', '19-11-2014', '17:45:31', '19-11-2014', '17:45:52', 'cerrado'),
(92, 0, '18393479-1', '', '19-11-2014', '17:56:47', '19-11-2014', '17:57:14', 'cerrado'),
(93, 0, '18393479-1', '', '19-11-2014', '21:40:31', '19-11-2014', '22:13:10', 'cerrado'),
(94, 0, '18393479-1', '', '20-11-2014', '09:53:27', '21-11-2014', '10:42:59', 'cerrado'),
(95, 0, '18393479-1', '', '21-11-2014', '10:43:08', '21-11-2014', '12:04:27', 'cerrado'),
(96, 0, '18393479-1', '', '21-11-2014', '12:04:36', '21-11-2014', '12:05:54', 'cerrado'),
(97, 0, '18393479-1', '', '21-11-2014', '12:06:01', '21-11-2014', '12:10:51', 'cerrado'),
(98, 0, '18393479-1', '', '21-11-2014', '12:11:00', '21-11-2014', '12:11:25', 'cerrado'),
(99, 0, '18393479-1', '', '21-11-2014', '12:11:27', '21-11-2014', '12:11:33', 'cerrado'),
(100, 0, '18393479-1', '', '21-11-2014', '12:12:10', '21-11-2014', '12:15:08', 'cerrado'),
(101, 0, '18393479-1', '', '21-11-2014', '12:15:15', '21-11-2014', '12:16:22', 'cerrado'),
(102, 0, '18393479-1', '', '21-11-2014', '12:16:28', '21-11-2014', '12:20:18', 'cerrado'),
(103, 0, '18393479-1', '', '21-11-2014', '12:20:25', '21-11-2014', '12:20:56', 'cerrado'),
(104, 0, '18393479-1', '', '21-11-2014', '12:20:57', '21-11-2014', '12:21:10', 'cerrado'),
(105, 0, '18393479-1', '', '21-11-2014', '12:21:34', '21-11-2014', '12:45:40', 'cerrado'),
(106, 0, '18393479-1', '', '21-11-2014', '12:45:43', '21-11-2014', '12:45:54', 'cerrado'),
(107, 0, '18393479-1', '', '21-11-2014', '12:46:01', '21-11-2014', '12:46:28', 'cerrado'),
(108, 0, '18393479-1', '', '21-11-2014', '12:46:29', '21-11-2014', '12:50:03', 'cerrado'),
(109, 0, '18393479-1', '', '21-11-2014', '12:50:09', '21-11-2014', '12:51:05', 'cerrado'),
(110, 0, '18393479-1', '', '21-11-2014', '12:51:12', '21-11-2014', '12:51:25', 'cerrado'),
(111, 0, '18393479-1', '', '21-11-2014', '12:51:40', '21-11-2014', '12:51:50', 'cerrado'),
(112, 0, '18393479-1', '', '21-11-2014', '12:51:58', '21-11-2014', '12:52:02', 'cerrado'),
(113, 0, '18393479-1', '', '21-11-2014', '12:53:42', '21-11-2014', '12:56:56', 'cerrado'),
(114, 0, '18393479-1', '', '21-11-2014', '12:57:03', '21-11-2014', '12:57:39', 'cerrado'),
(115, 0, '18393479-1', '', '21-11-2014', '12:57:45', '21-11-2014', '12:58:48', 'cerrado'),
(116, 0, '18393479-1', '', '21-11-2014', '12:58:55', '21-11-2014', '12:59:02', 'cerrado'),
(117, 0, '18393479-1', '', '21-11-2014', '12:59:08', '21-11-2014', '12:59:45', 'cerrado'),
(118, 0, '18393479-1', '', '21-11-2014', '12:59:48', '21-11-2014', '13:00:19', 'cerrado'),
(119, 0, '18393479-1', '', '21-11-2014', '13:00:21', '23-11-2014', '19:26:04', 'cerrado'),
(120, 0, '18393479-1', '', '23-11-2014', '19:26:16', '23-11-2014', '19:42:16', 'cerrado'),
(121, 0, '18393479-1', '', '23-11-2014', '19:42:31', '23-11-2014', '19:47:28', 'cerrado'),
(122, 0, '18393479-1', '', '23-11-2014', '19:47:35', '23-11-2014', '19:48:27', 'cerrado'),
(123, 0, '18393479-1', '', '23-11-2014', '19:48:28', '23-11-2014', '19:48:36', 'cerrado'),
(124, 0, '18393479-1', '', '23-11-2014', '19:48:42', '23-11-2014', '20:00:28', 'cerrado'),
(125, 0, '18393479-1', '', '23-11-2014', '20:00:35', '23-11-2014', '20:02:47', 'cerrado'),
(126, 0, '18393479-1', '', '23-11-2014', '20:02:55', '23-11-2014', '20:05:48', 'cerrado'),
(127, 0, '18393479-1', '', '23-11-2014', '20:05:56', '24-11-2014', '22:04:12', 'cerrado'),
(128, 0, '18393479-1', '', '24-11-2014', '22:04:32', '24-11-2014', '22:04:45', 'cerrado'),
(129, 0, '9897840-2', '', '25-11-2014', '17:25:36', '25-11-2014', '17:27:26', 'cerrado'),
(130, 0, '9897840-2', '', '25-11-2014', '17:27:29', '25-11-2014', '17:27:38', 'cerrado'),
(131, 0, '9897840-2', '', '25-11-2014', '17:27:46', '25-11-2014', '17:29:54', 'cerrado'),
(132, 0, '9897840-2', '', '25-11-2014', '17:30:03', '25-11-2014', '17:31:27', 'cerrado'),
(133, 0, '9897840-2', '', '25-11-2014', '17:31:35', '25-11-2014', '19:16:37', 'cerrado'),
(134, 0, '18393479-1', '', '25-11-2014', '17:32:20', '25-11-2014', '23:55:14', 'cerrado'),
(135, 0, '9897840-2', '', '25-11-2014', '19:17:10', '25-11-2014', '19:19:03', 'cerrado'),
(136, 0, '18393479-1', '', '25-11-2014', '23:55:24', '26-11-2014', '00:00:09', 'cerrado'),
(137, 0, '18393479-1', '', '26-11-2014', '00:00:17', '26-11-2014', '00:03:57', 'cerrado'),
(138, 0, '18403314-3', '', '26-11-2014', '00:03:45', '26-11-2014', '00:04:16', 'cerrado'),
(139, 0, '18393479-1', '', '26-11-2014', '00:04:03', '26-11-2014', '00:16:55', 'cerrado'),
(140, 0, '18403314-3', '', '26-11-2014', '00:04:27', '26-11-2014', '00:18:21', 'cerrado'),
(141, 0, '13015775-0', '', '26-11-2014', '00:10:02', '26-11-2014', '00:11:29', 'cerrado'),
(142, 0, '13015775-0', '', '26-11-2014', '00:12:38', '26-11-2014', '00:15:18', 'cerrado'),
(143, 0, '13015775-0', '', '26-11-2014', '00:15:25', '26-11-2014', '00:19:32', 'cerrado'),
(144, 0, '18393479-1', '', '26-11-2014', '00:17:01', '26-11-2014', '21:55:57', 'cerrado'),
(145, 0, '18403314-3', '', '26-11-2014', '00:18:38', '26-11-2014', '11:17:17', 'cerrado'),
(146, 0, '13015775-0', '', '26-11-2014', '00:20:05', '26-11-2014', '11:18:31', 'cerrado'),
(147, 0, '18403314-3', '', '26-11-2014', '11:17:47', '', '', 'abierto'),
(148, 0, '13015775-0', '', '26-11-2014', '11:18:37', '26-11-2014', '11:18:45', 'cerrado'),
(149, 0, '18393479-1', '', '26-11-2014', '21:56:04', '', '', 'abierto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turno_guardia`
--

CREATE TABLE IF NOT EXISTS `turno_guardia` (
`id_turno` int(11) NOT NULL,
  `nro_garita` varchar(5) NOT NULL,
  `rut_guardia` varchar(10) NOT NULL,
  `jornada` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turno_guardia`
--

INSERT INTO `turno_guardia` (`id_turno`, `nro_garita`, `rut_guardia`, `jornada`) VALUES
(1, 'Uno', '18393479-1', 'Mañana'),
(2, 'Dos', '18403314-3', 'Tarde');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
 ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `guardia`
--
ALTER TABLE `guardia`
 ADD PRIMARY KEY (`rut_guardia`);

--
-- Indices de la tabla `lista_negra`
--
ALTER TABLE `lista_negra`
 ADD PRIMARY KEY (`id_lista`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
 ADD PRIMARY KEY (`cod_registro`);

--
-- Indices de la tabla `turno_guardia`
--
ALTER TABLE `turno_guardia`
 ADD PRIMARY KEY (`id_turno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_departamento` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `lista_negra`
--
ALTER TABLE `lista_negra`
MODIFY `id_lista` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
MODIFY `cod_registro` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT de la tabla `turno_guardia`
--
ALTER TABLE `turno_guardia`
MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
