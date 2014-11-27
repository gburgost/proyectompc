-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-11-2014 a las 20:37:59
-- Versión del servidor: 5.5.38
-- Versión de PHP: 5.6.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `mpc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
`id_departamento` int(255) NOT NULL,
  `nombre_departamento` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`) VALUES
(1, 'SELECCIONE DEPARTAMENTO'),
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

CREATE TABLE `empleado` (
`id_empleado` int(255) NOT NULL,
  `rut_persona` char(10) NOT NULL,
  `fecha_vinculacion` date NOT NULL,
  `fecha_desvinculacion` date NOT NULL,
  `tipo_contrato` varchar(15) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `id_departamento` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `rut_persona`, `fecha_vinculacion`, `fecha_desvinculacion`, `tipo_contrato`, `cargo`, `id_departamento`) VALUES
(7, '13015775-0', '2006-04-04', '0000-00-00', 'Indefinido', 'Secretaria de adminisitracion', 4),
(8, '7165887-2', '2006-07-17', '0000-00-00', 'Indefinido', 'Soldador', 8),
(9, '11469991-8', '2012-04-03', '0000-00-00', 'Indefinido', 'Soldador', 8),
(10, '12402211-8', '2006-01-09', '0000-00-00', 'Indefinido', 'Jefe de ventas', 6),
(11, '15611042-6', '2010-04-05', '0000-00-00', 'Indefinido', 'Prevencionista', 9),
(12, '9897840-2', '2006-10-01', '0000-00-00', 'Indefinido', 'Contador', 3),
(13, '1234567', '0000-00-00', '0000-00-00', 'Seleccione Tipo', '', 1),
(14, '18393479-1', '2013-10-03', '0000-00-00', 'Indefinido', 'tecnico informatico', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
`id` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `tipo_persona` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `rut_persona`, `nombre`, `apellido`, `fecha_nac`, `tipo_persona`) VALUES
(7, '13015775-0', 'Lorna', 'Carrizo', '1976-09-26', 'Empleado'),
(8, '7165887-2', 'Manuel', 'Cortes', '1954-01-31', 'Empleado'),
(9, '11469991-8', 'Raul', 'ZuÃ±iga', '1969-09-29', 'Empleado'),
(10, '12402211-8', 'Juan ', 'Hidalgo', '1973-04-07', 'Empleado'),
(11, '15611042-6', 'Marcelo', 'Antivilo', '1983-04-05', 'Empleado'),
(12, '9897840-2', 'Jose', 'Burgos', '1965-02-24', 'Empleado'),
(14, '18393479-1', 'Gonzalo', 'Burgos', '1993-03-12', 'Empleado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_entrada`
--

CREATE TABLE `registro_entrada` (
`id_entrada` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `fechaentrada` varchar(10) NOT NULL,
  `horaentrada` varchar(10) NOT NULL,
  `entrada` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_entrada`
--

INSERT INTO `registro_entrada` (`id_entrada`, `rut_persona`, `fechaentrada`, `horaentrada`, `entrada`) VALUES
(10, '18393479-1', '11-11-2014', '21:51:05', 'entrada'),
(11, '18393479-1', '11-11-2014', '21:51:25', 'entrada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_salida`
--

CREATE TABLE `registro_salida` (
`id_salida` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `fechasalida` varchar(10) NOT NULL,
  `horasalida` varchar(10) NOT NULL,
  `salida` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_salida`
--

INSERT INTO `registro_salida` (`id_salida`, `rut_persona`, `fechasalida`, `horasalida`, `salida`) VALUES
(6, '18393479-1', '11-11-2014', '21:51:10', 'salida'),
(7, '18393479-1', '11-11-2014', '21:51:28', 'salida');

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
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `registro_entrada`
--
ALTER TABLE `registro_entrada`
 ADD PRIMARY KEY (`id_entrada`);

--
-- Indices de la tabla `registro_salida`
--
ALTER TABLE `registro_salida`
 ADD PRIMARY KEY (`id_salida`);

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
MODIFY `id_empleado` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `registro_entrada`
--
ALTER TABLE `registro_entrada`
MODIFY `id_entrada` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `registro_salida`
--
ALTER TABLE `registro_salida`
MODIFY `id_salida` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
