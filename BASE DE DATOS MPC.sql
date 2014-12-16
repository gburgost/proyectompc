-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 16-12-2014 a las 05:56:13
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contratista`
--

INSERT INTO `contratista` (`id_contratista`, `rut_persona`, `nro_contrato`, `empresa_contratista`, `fecha_inicio_contrato`, `fecha_fin_contrato`, `descrip_obra`) VALUES
(5, '13181524-7', '1', 'Rosa Cortes', '2006-11-29', '2006-12-31', 'Soldador para reparación de bomba de vacío. "Empresa Can-can"'),
(6, '17054919-8', '2', 'Acuiservis', '2014-10-24', '2014-12-30', 'Control de Calidad Fabricación Eje Agitador. "Codelco Norte" '),
(7, '8519002-4', '2', 'Acuiservis', '2014-10-24', '2014-12-30', 'Control de Calidad FabricaciÃ³n Eje Agitador. "Codelco Norte"');

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`id_empleado`, `rut_persona`, `fecha_vinculacion`, `fecha_desvinculacion`, `tipo_contrato`, `cargo`, `id_departamento`) VALUES
(36, '18393479-1', '2014-12-15', '0000-00-00', 'Indefinido', 'Administrador', 4),
(37, '13015775-0', '2006-04-04', '0000-00-00', 'Indefinido', 'Secretaria de Administracion', 4),
(38, '7231134-5', '2006-04-17', '0000-00-00', 'Indefinido', 'Calderero', 8),
(39, '7386641-3', '2006-10-01', '0000-00-00', 'Indefinido', 'Gerente General', 2);

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
('18403314-3', 'Hector', 'Prieto', '1993-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_negra`
--

CREATE TABLE IF NOT EXISTS `lista_negra` (
`id_lista` int(255) NOT NULL,
  `rut_persona` varchar(10) NOT NULL,
  `motivo` varchar(140) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lista_negra`
--

INSERT INTO `lista_negra` (`id_lista`, `rut_persona`, `motivo`) VALUES
(3, '13181524-7', 'Termino de contrato.');

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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `rut_persona`, `nombre`, `apellido`, `fecha_nac`, `tipo_persona`, `foto`) VALUES
(80, '18393479-1', 'Gonzalo', 'Burgos Trincado', '1993-03-12', 'Empleado', 'archivos/10599658_1573520852882096_7447515760027725072_n.jpg'),
(81, '13015775-0', 'Lorna', 'Carizo Ramirez', '1976-09-26', 'Empleado', 'archivos/lorna.jpg'),
(82, '7231134-5', 'Waldo', 'Bustos Lazcano', '1956-08-31', 'Empleado', 'archivos/waldo.jpg'),
(83, '7386641-3', 'Juan', 'Pineda Rojas', '1957-07-12', 'Empleado', 'archivos/juan.jpg'),
(84, '13181524-7', 'David', 'Perez Villalobos ', '1977-03-19', 'Contratista', 'archivos/david.jpg'),
(85, '17054919-8', 'Camila', 'Cortes Cortes', '1988-08-04', 'Contratista', 'archivos/camila.jpg'),
(86, '8519002-4', 'Ricardo ', 'Adaro Martinez', '1971-07-20', 'Contratista', 'archivos/ricardo.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=480 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro_persona`
--

INSERT INTO `registro_persona` (`cod_registro`, `nro_garita`, `rut_persona`, `rut_guardia`, `rut_guardia1`, `fecha_entrada`, `hora_entrada`, `fecha_salida`, `hora_salida`, `estado`) VALUES
(296, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-01', '08:00:00', '2014-10-01', '13:00:00', 'cerrado'),
(297, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-01', '14:00:00', '2014-10-01', '18:34:21', 'cerrado'),
(298, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-02', '08:00:00', '2014-10-02', '13:00:00', 'cerrado'),
(299, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-02', '14:00:00', '2014-10-02', '18:00:00', 'cerrado'),
(300, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-03', '08:00:00', '2014-10-03', '13:00:00', 'cerrado'),
(301, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-03', '14:00:00', '2014-10-03', '18:00:00', 'cerrado'),
(302, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-06', '08:00:00', '2014-10-06', '13:00:00', 'cerrado'),
(303, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-06', '14:00:00', '2014-10-06', '18:00:00', 'cerrado'),
(304, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-07', '08:00:00', '2014-10-07', '13:00:00', 'cerrado'),
(305, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-07', '14:00:00', '2014-10-07', '18:00:00', 'cerrado'),
(306, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-08', '08:00:00', '2014-10-08', '13:00:00', 'cerrado'),
(307, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-08', '14:00:00', '2014-10-08', '18:00:00', 'cerrado'),
(308, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-09', '08:00:00', '2014-10-09', '13:00:00', 'cerrado'),
(309, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-09', '14:00:00', '2014-10-09', '19:45:02', 'cerrado'),
(310, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-10', '08:00:00', '2014-10-10', '13:00:00', 'cerrado'),
(311, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-10', '14:00:00', '2014-10-10', '18:00:00', 'cerrado'),
(312, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-13', '08:00:00', '2014-10-13', '13:00:00', 'cerrado'),
(313, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-13', '14:00:00', '2014-10-13', '18:00:00', 'cerrado'),
(314, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-14', '08:00:00', '2014-10-14', '13:00:00', 'cerrado'),
(315, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-14', '14:00:00', '2014-10-14', '180:00:00', 'cerrado'),
(316, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-15', '08:00:00', '2014-10-15', '13:00:00', 'cerrado'),
(317, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-15', '14:00:00', '2014-10-15', '18:00:00', 'cerrado'),
(318, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-16', '08:00:00', '2014-10-16', '13:00:00', 'cerrado'),
(319, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-16', '14:00:00', '2014-10-16', '18:00:00', 'cerrado'),
(320, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-17', '08:00:00', '2014-10-17', '13:00:00', 'cerrado'),
(321, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-17', '14:00:00', '2014-10-17', '18:00:00', 'cerrado'),
(322, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-20', '08:00:00', '2014-10-20', '13:00:00', 'cerrado'),
(323, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-20', '14:00:00', '2014-10-20', '18:00:00', 'cerrado'),
(324, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-21', '08:00:00', '2014-10-21', '13:00:00', 'cerrado'),
(325, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-21', '14:00:00', '2014-10-21', '18:00:00', 'cerrado'),
(326, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-22', '08:00:00', '2014-10-22', '13:00:00', 'cerrado'),
(327, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-22', '14:00:00', '2014-10-22', '18:00:00', 'cerrado'),
(328, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-23', '08:00:00', '2014-10-23', '13:00:00', 'cerrado'),
(329, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-23', '14:00:00', '2014-10-23', '18:00:00', 'cerrado'),
(330, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-24', '08:00:00', '2014-10-24', '13:00:00', 'cerrado'),
(331, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-24', '14:00:00', '2014-10-24', '18:00:00', 'cerrado'),
(332, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-27', '08:00:00', '2014-10-27', '13:00:00', 'cerrado'),
(333, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-27', '14:00:00', '2014-10-27', '18:00:00', 'cerrado'),
(334, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-28', '08:00:00', '2014-10-28', '13:00:00', 'cerrado'),
(335, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-28', '14:00:00', '2014-10-28', '18:00:00', 'cerrado'),
(336, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-29', '08:00:00', '2014-10-29', '13:00:00', 'cerrado'),
(337, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-29', '14:00:00', '2014-10-29', '18:00:00', 'cerrado'),
(338, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-30', '08:00:00', '2014-10-30', '13:00:00', 'cerrado'),
(339, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-30', '14:00:00', '2014-10-30', '18:00:00', 'cerrado'),
(340, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-31', '08:00:00', '2014-10-31', '13:00:00', 'cerrado'),
(341, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-10-31', '14:00:00', '2014-10-31', '18:00:00', 'cerrado'),
(342, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-03', '08:00:00', '2014-11-03', '13:00:00', 'cerrado'),
(343, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-03', '14:00:00', '2014-11-03', '18:00:00', 'cerrado'),
(344, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-04', '08:00:00', '2014-11-04', '13:00:00', 'cerrado'),
(345, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-04', '14:00:00', '2014-11-04', '18:00:00', 'cerrado'),
(346, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-05', '08:00:00', '2014-11-05', '13:00:00', 'cerrado'),
(347, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-05', '14:00:00', '2014-11-05', '18:00:00', 'cerrado'),
(348, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-06', '08:00:00', '2014-11-06', '13:00:00', 'cerrado'),
(349, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-06', '14:00:00', '2014-11-06', '18:00:00', 'cerrado'),
(350, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-07', '08:00:00', '2014-11-07', '13:00:00', 'cerrado'),
(351, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-07', '14:00:00', '2014-11-07', '18:00:00', 'cerrado'),
(352, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-10', '08:00:00', '2014-11-10', '13:00:00', 'cerrado'),
(353, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-10', '14:00:00', '2014-11-10', '18:00:00', 'cerrado'),
(354, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-11', '08:00:00', '2014-11-11', '13:00:00', 'cerrado'),
(355, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-11', '14:00:00', '2014-11-11', '18:00:00', 'cerrado'),
(356, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-12', '08:00:00', '2014-11-12', '13:00:00', 'cerrado'),
(357, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-12', '14:00:00', '2014-11-12', '18:00:00', 'cerrado'),
(358, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-13', '08:00:00', '2014-11-13', '13:00:00', 'cerrado'),
(359, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-13', '14:00:00', '2014-11-13', '18:00:00', 'cerrado'),
(360, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-14', '08:00:00', '2014-11-14', '13:00:00', 'cerrado'),
(361, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-14', '14:00:00', '2014-11-14', '18:00:00', 'cerrado'),
(362, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-17', '08:00:00', '2014-11-17', '13:00:00', 'cerrado'),
(363, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-17', '14:00:00', '2014-11-17', '18:00:00', 'cerrado'),
(365, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-18', '08:00:00', '2014-11-18', '13:00:00', 'cerrado'),
(366, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-18', '14:00:00', '2014-11-18', '18:00:00', 'cerrado'),
(367, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-19', '08:00:00', '2014-11-19', '13:00:00', 'cerrado'),
(368, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-19', '14:00:00', '2014-11-19', '18:00:00', 'cerrado'),
(369, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-20', '08:00:00', '2014-11-20', '13:00:00', 'cerrado'),
(370, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-20', '14:00:00', '2014-11-20', '18:00:00', 'cerrado'),
(371, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-21', '08:00:00', '2014-11-21', '13:00:00', 'cerrado'),
(372, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-21', '14:00:00', '2014-11-21', '18:00:00', 'cerrado'),
(373, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-24', '08:00:00', '2014-11-24', '13:00:00', 'cerrado'),
(374, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-24', '14:00:00', '2014-11-24', '18:00:00', 'cerrado'),
(375, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-25', '08:00:00', '2014-11-25', '13:00:00', 'cerrado'),
(376, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-25', '14:00:00', '2014-11-25', '18:00:00', 'cerrado'),
(377, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-26', '08:00:00', '2014-11-26', '13:00:00', 'cerrado'),
(378, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-26', '14:00:00', '2014-11-26', '18:00:00', 'cerrado'),
(379, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-27', '08:00:00', '2014-11-27', '13:00:00', 'cerrado'),
(380, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-27', '14:00:00', '2014-11-27', '18:00:00', 'cerrado'),
(381, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-28', '08:00:00', '2014-11-28', '13:00:00', 'cerrado'),
(382, 'Dos', '13015775-0', '18403314-3', 'Hector Prieto', '2014-11-28', '14:00:00', '2014-11-28', '18:00:00', 'cerrado'),
(388, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-01', '08:00:00', '2014-10-01', '13:00:00', 'cerrado'),
(389, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-01', '14:00:00', '2014-10-01', '18:00:00', 'cerrado'),
(390, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-02', '08:00:00', '2014-10-02', '13:00:00', 'cerrado'),
(391, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-02', '14:00:00', '2014-10-02', '18:00:00', 'cerrado'),
(392, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-03', '08:00:00', '2014-10-03', '13:00:00', 'cerrado'),
(393, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-03', '14:00:00', '2014-10-03', '18:00:00', 'cerrado'),
(394, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-06', '08:00:00', '2014-10-06', '13:00:00', 'cerrado'),
(395, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-06', '14:00:00', '2014-10-06', '18:00:00', 'cerrado'),
(396, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-07', '08:00:00', '2014-10-07', '13:00:00', 'cerrado'),
(397, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-07', '14:00:00', '2014-10-07', '18:00:00', 'cerrado'),
(398, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-08', '08:00:00', '2014-10-08', '13:00:00', 'cerrado'),
(399, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-08', '14:00:00', '2014-10-08', '18:00:00', 'cerrado'),
(400, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-09', '08:00:00', '2014-10-09', '13:00:00', 'cerrado'),
(401, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-09', '14:00:00', '2014-10-09', '18:00:00', 'cerrado'),
(402, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-10', '08:00:00', '2014-10-10', '13:00:00', 'cerrado'),
(403, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-10', '14:00:00', '2014-10-10', '18:00:00', 'cerrado'),
(404, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-13', '08:00:00', '2014-10-13', '13:00:00', 'cerrado'),
(405, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-13', '14:00:00', '2014-10-13', '18:00:00', 'cerrado'),
(406, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-14', '08:00:00', '2014-10-14', '13:00:00', 'cerrado'),
(407, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-14', '14:00:00', '2014-10-14', '18:00:00', 'cerrado'),
(408, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-15', '08:00:00', '2014-10-15', '13:00:00', 'cerrado'),
(409, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-15', '14:00:00', '2014-10-15', '18:00:00', 'cerrado'),
(410, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-16', '08:00:00', '2014-10-16', '13:00:00', 'cerrado'),
(411, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-16', '14:00:00', '2014-10-16', '18:00:00', 'cerrado'),
(412, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-17', '08:00:00', '2014-10-17', '13:00:00', 'cerrado'),
(413, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-17', '14:00:00', '2014-10-17', '18:00:00', 'cerrado'),
(414, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-20', '08:00:00', '2014-10-20', '13:00:00', 'cerrado'),
(415, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-20', '14:00:00', '2014-10-20', '18:00:00', 'cerrado'),
(416, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-21', '08:00:00', '2014-10-21', '13:00:00', 'cerrado'),
(417, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-21', '14:00:00', '2014-10-21', '18:00:00', 'cerrado'),
(418, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-22', '08:00:00', '2014-10-22', '13:00:00', 'cerrado'),
(419, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-22', '14:00:00', '2014-10-22', '18:00:00', 'cerrado'),
(420, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-23', '08:00:00', '2014-10-23', '13:00:00', 'cerrado'),
(421, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-23', '14:00:00', '2014-10-23', '18:00:00', 'cerrado'),
(422, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-24', '08:00:00', '2014-10-24', '13:00:00', 'cerrado'),
(423, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-24', '14:00:00', '2014-10-24', '18:00:00', 'cerrado'),
(424, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-27', '08:00:00', '2014-10-27', '13:00:00', 'cerrado'),
(425, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-27', '14:00:00', '2014-10-27', '18:00:00', 'cerrado'),
(426, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-28', '08:00:00', '2014-10-28', '13:00:00', 'cerrado'),
(427, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-28', '14:00:00', '2014-10-28', '18:00:00', 'cerrado'),
(428, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-29', '08:00:00', '2014-10-29', '13:00:00', 'cerrado'),
(429, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-29', '14:00:00', '2014-10-29', '18:00:00', 'cerrado'),
(430, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-30', '08:00:00', '2014-10-30', '13:00:00', 'cerrado'),
(431, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-30', '14:00:00', '2014-10-30', '18:00:00', 'cerrado'),
(432, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-31', '08:00:00', '2014-10-31', '00:27:07', 'cerrado'),
(433, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-10-31', '14:00:00', '2014-10-31', '18:00:00', 'cerrado'),
(434, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-03', '08:00:00', '2014-11-03', '10:00:00', 'cerrado'),
(435, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-03', '11:30:00', '2014-11-03', '13:00:00', 'cerrado'),
(436, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-03', '14:00:00', '2014-12-16', '18:00:00', 'cerrado'),
(437, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-04', '08:00:00', '2014-11-04', '13:00:00', 'cerrado'),
(438, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-04', '14:00:00', '2014-11-04', '18:00:00', 'cerrado'),
(439, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-05', '08:00:00', '2014-11-05', '13:00:00', 'cerrado'),
(440, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-05', '14:00:00', '2014-11-05', '18:00:00', 'cerrado'),
(441, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-06', '08:00:00', '2014-11-06', '14:00:00', 'cerrado'),
(442, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-06', '14:00:00', '2014-11-06', '18:00:00', 'cerrado'),
(443, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-07', '08:00:00', '2014-11-07', '13:00:00', 'cerrado'),
(444, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-07', '14:00:00', '2014-11-07', '18:00:00', 'cerrado'),
(445, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-10', '08:00:00', '2014-11-10', '13:00:00', 'cerrado'),
(446, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-10', '14:00:00', '2014-11-10', '18:00:00', 'cerrado'),
(447, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-11', '08:00:00', '2014-11-11', '13:00:00', 'cerrado'),
(448, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-11', '14:00:00', '2014-11-11', '18:00:00', 'cerrado'),
(449, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-12', '08:00:00', '2014-11-12', '13:00:00', 'cerrado'),
(450, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-12', '14:00:00', '2014-11-12', '18:00:00', 'cerrado'),
(451, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-13', '08:00:00', '2014-11-13', '13:00:00', 'cerrado'),
(452, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-13', '14:00:00', '2014-11-13', '18:00:00', 'cerrado'),
(453, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-14', '08:00:00', '2014-11-14', '13:00:00', 'cerrado'),
(454, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-14', '14:00:00', '2014-11-14', '18:00:00', 'cerrado'),
(455, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-17', '08:00:00', '2014-11-17', '13:00:00', 'cerrado'),
(456, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-17', '14:00:00', '2014-11-17', '18:00:00', 'cerrado'),
(457, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-18', '08:00:00', '2014-11-18', '13:00:00', 'cerrado'),
(458, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-18', '14:00:00', '2014-11-18', '18:00:00', 'cerrado'),
(459, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-19', '08:00:00', '2014-11-19', '13:00:00', 'cerrado'),
(460, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-19', '14:00:00', '2014-11-19', '18:00:00', 'cerrado'),
(461, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-20', '08:00:00', '2014-11-20', '13:00:00', 'cerrado'),
(462, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-20', '14:00:00', '2014-11-20', '18:00:00', 'cerrado'),
(463, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-21', '08:00:00', '2014-11-21', '13:00:00', 'cerrado'),
(464, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-21', '14:00:00', '2014-11-21', '18:00:00', 'cerrado'),
(465, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-24', '08:00:00', '2014-11-24', '13:00:00', 'cerrado'),
(466, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-24', '14:00:00', '2014-11-24', '18:00:00', 'cerrado'),
(467, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-25', '08:00:00', '2014-11-25', '13:00:00', 'cerrado'),
(468, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-25', '14:00:00', '2014-11-25', '18:00:00', 'cerrado'),
(469, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-26', '08:00:00', '2014-11-26', '13:00:00', 'cerrado'),
(470, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-26', '14:00:00', '2014-11-26', '18:00:00', 'cerrado'),
(471, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-27', '08:00:00', '2014-11-27', '13:00:00', 'cerrado'),
(472, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-27', '14:00:00', '2014-11-27', '18:00:00', 'cerrado'),
(473, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-28', '08:00:00', '2014-11-28', '13:00:00', 'cerrado'),
(474, 'Dos', '7386641-3', '18403314-3', 'Hector Prieto', '2014-11-28', '14:00:00', '2014-11-28', '18:00:00', 'cerrado');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
(14, '13015775-0', 'Gonzalo Burgos', 'Inacap'),
(15, '13015775-0', 'Gonzalo Burgos', 'Inacap'),
(16, '13015775-0', 'Jose Burgos', 'Indura'),
(17, '23335325-6', 'Jose Burgos', 'Inacap');

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
MODIFY `id_contratista` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
MODIFY `id_departamento` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
MODIFY `id_empleado` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT de la tabla `lista_negra`
--
ALTER TABLE `lista_negra`
MODIFY `id_lista` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT de la tabla `registro_persona`
--
ALTER TABLE `registro_persona`
MODIFY `cod_registro` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=480;
--
-- AUTO_INCREMENT de la tabla `turno_guardia`
--
ALTER TABLE `turno_guardia`
MODIFY `id_turno` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
MODIFY `id_visita` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
