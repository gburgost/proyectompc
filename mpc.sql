-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-12-2014 a las 06:17:41
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
-- Estructura de tabla para la tabla `contratista`
--

CREATE TABLE IF NOT EXISTS `contratista` (
`id_contratista` int(11) NOT NULL,
  `rut_persona` varchar(10) COLLATE utf8_bin NOT NULL,
  `nro_contrato` varchar(1000) COLLATE utf8_bin NOT NULL,
  `empresa_contratista` varchar(50) COLLATE utf8_bin NOT NULL,
  `fecha_inicio_contrato` date NOT NULL,
  `fecha_fin_contrato` date NOT NULL,
  `descrip_obra` varchar(140) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contratista`
--

INSERT INTO `contratista` (`id_contratista`, `rut_persona`, `nro_contrato`, `empresa_contratista`, `fecha_inicio_contrato`, `fecha_fin_contrato`, `descrip_obra`) VALUES
(1, '12345678-9', '1', 'Enami', '0000-00-00', '2014-12-31', 'Realizar trabajos de torneria en sucursal Caldera'),
(2, '18139009-3', '2', 'Inacap', '2014-10-01', '2014-12-01', 'Capacitaciones computacionales al area de recursos humanos');

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

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
(17, '13015775-0', '2006-04-04', '0000-00-00', 'Indefinido', 'Secretaria de Administracion', 0),
(18, '18403314-3', '0000-00-00', '0000-00-00', 'Indefinido', 'Ayudante informatico', 0);

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
  `foto` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

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
(18, '13015775-0', 'Lorna', 'Carrizo', '1976-09-26', 'Visita', ''),
(19, '18403314-3', 'Hector', 'Prieto', '1993-03-27', 'Empleado', 'archivos/hector.jpg'),
(21, '12345678-9', 'Victor', 'Perez', '1992-03-10', 'Contratista', 'archivos/jano1.jpg'),
(23, '1234567', 'Makarenna', 'Burgos', '2014-01-01', 'Visita', ''),
(25, '18139009-3', 'Alvaro', 'Andrades', '1993-01-15', 'Contratista', 'archivos/alvarin.jpg');

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
  `nro_garita` varchar(5) DEFAULT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `rut_guardia` varchar(10) DEFAULT NULL,
  `rut_guardia1` varchar(50) NOT NULL,
  `fecha_entrada` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `fecha_salida` date DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=271 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_persona`
--

INSERT INTO `registro_persona` (`cod_registro`, `nro_garita`, `rut_persona`, `rut_guardia`, `rut_guardia1`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `estado`) VALUES
(243, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(244, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(245, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-02', '08:00:00', '2014-12-02', '13:00:00', 'cerrado'),
(246, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-02', '14:00:00', '2014-12-02', '18:00:00', 'cerrado'),
(247, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-03', '08:00:00', '2014-12-03', '13:00:00', 'cerrado'),
(248, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-03', '14:00:00', '2014-12-03', '18:00:00', 'cerrado'),
(249, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-04', '08:00:00', '2014-12-04', '13:00:00', 'cerrado'),
(250, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-04', '14:00:00', '2014-12-04', '18:00:00', 'cerrado'),
(251, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-05', '08:00:00', '2014-12-05', '13:00:00', 'cerrado'),
(252, 'Uno', '18403314-3', '18393479-1', 'Gonzalo Burgos', '2014-12-05', '14:00:00', '2014-12-05', '18:00:00', 'cerrado'),
(253, 'Uno', '18393479-1', '18403314-3', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(254, 'Uno', '18393479-1', '18403314-3', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(255, 'Uno', '18393479-1', '18403314-3', 'Gonzalo Burgos', '2014-12-02', '08:00:00', '2014-12-02', '13:00:00', 'cerrado'),
(256, 'Uno', '18393479-1', '18403314-3', 'Gonzalo Burgos', '2014-12-02', '14:00:00', '2014-12-02', '18:00:00', 'cerrado'),
(257, 'Uno', '7165887-2', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(258, 'Uno', '7165887-2', '18393479-1', 'Hector Prieto', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(259, 'Uno', '11469991-8', '18403314-3', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(260, 'Uno', '11469991-8', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(261, 'Uno', '12402211-8', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(262, 'Uno', '12402211-8', '18403314-3', 'Hector Prieto', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(263, 'Uno', '15611042-6', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(264, 'Uno', '15611042-6', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(265, 'Uno', '9897840-2', '18393479-1', 'Hector Prieto', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(266, 'Uno', '9897840-2', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado'),
(269, 'Uno', '13015775-0', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '08:00:00', '2014-12-01', '13:00:00', 'cerrado'),
(270, 'Uno', '13015775-0', '18393479-1', 'Gonzalo Burgos', '2014-12-01', '14:00:00', '2014-12-01', '18:00:00', 'cerrado');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
`id_visita` int(11) NOT NULL,
  `rut_persona` varchar(10) COLLATE utf8_bin NOT NULL,
  `nombre_visitado` varchar(50) COLLATE utf8_bin NOT NULL,
  `empresa` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`id_visita`, `rut_persona`, `nombre_visitado`, `empresa`) VALUES
(1, '1234567', 'undefined', 'undefined'),
(2, '1234567', 'Gonzalo Burgos', 'Inacap'),
(3, '1234567', '', ''),
(4, '1234567', '', ''),
(5, '1234567', '', ''),
(6, '1234567', '', ''),
(7, '1234567', '', ''),
(8, '1234567', '', ''),
(9, '1234567', '', ''),
(10, '1234567', '', ''),
(11, '18393479-1', '', ''),
(12, '13015775-0', '', ''),
(13, '13015775-0', 'Gonzalo Burgos', 'Inacap'),
(14, '13015775-0', 'Gonzalo Burgos', 'Inacap');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contratista`
--
ALTER TABLE `contratista`
 ADD PRIMARY KEY (`id_contratista`);

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
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
 ADD PRIMARY KEY (`id_visita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contratista`
--
ALTER TABLE `contratista`
MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_departamento` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
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
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
MODIFY `cod_registro` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=271;
--
-- AUTO_INCREMENT de la tabla `turno_guardia`
--
ALTER TABLE `turno_guardia`
MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
