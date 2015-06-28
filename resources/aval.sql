-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-06-2015 a las 21:50:17
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aval`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficinas`
--

CREATE TABLE IF NOT EXISTS `oficinas` (
`ID` int(11) NOT NULL,
  `localidad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_recogida` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `devolucion_distinta_recogida` tinyint(1) NOT NULL,
  `telefono` int(11) NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL,
  `operador` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oficinas`
--

INSERT INTO `oficinas` (`ID`, `localidad`, `direccion_recogida`, `devolucion_distinta_recogida`, `telefono`, `hora_apertura`, `hora_cierre`, `operador`) VALUES
(1, 'Alicante puerto', 'Calle Falsa 123', 1, 676801926, '12:56:00', '21:00:00', 'euroscar'),
(2, 'Madrid sur', 'Calle del doctor fleming 23, 28042, Madrid', 0, 628912345, '12:00:00', '20:30:00', 'arval'),
(3, 'Murcia centro', 'Calle murciana 43, 89714 Murcia', 0, 629436789, '09:59:00', '00:00:00', 'euroscar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
`ID` int(11) NOT NULL,
  `tarifa` int(11) NOT NULL,
  `momento_recogida` datetime NOT NULL,
  `momento_devolucion` datetime NOT NULL,
  `oficina_devolucion` int(11) DEFAULT NULL,
  `cargado_cuenta` float NOT NULL,
  `estado` enum('prueba','','','') COLLATE utf8_spanish_ci NOT NULL,
  `NIF` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `nacionalidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `extra_gps` tinyint(1) NOT NULL,
  `extra_silla_bebe` tinyint(1) NOT NULL,
  `extra_silla_elevador` tinyint(1) NOT NULL,
  `extra_portaesquis` tinyint(1) NOT NULL,
  `extra_cadenas` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`ID`, `tarifa`, `momento_recogida`, `momento_devolucion`, `oficina_devolucion`, `cargado_cuenta`, `estado`, `NIF`, `nombre`, `apellidos`, `email`, `telefono1`, `telefono2`, `nacionalidad`, `fecha_nacimiento`, `extra_gps`, `extra_silla_bebe`, `extra_silla_elevador`, `extra_portaesquis`, `extra_cadenas`) VALUES
(3, 3, '2015-06-02 00:01:00', '2015-06-02 23:06:00', 2, 11, 'prueba', '12345678B', 'Cambio', 'Hernando Sanchez', 'raul.dinformatica@gmail.com', 123456789, 123456789, 'Cambiada', '2015-01-31', 1, 1, 1, 0, 0),
(4, 6, '2016-12-20 09:00:00', '2010-12-24 10:30:00', 2, 12.36, 'prueba', '05432212Q', 'Raul', 'Cobos Hernando', 'racbos@ucm.es', 913426512, 676543214, 'Francesa', '1992-12-11', 0, 1, 0, 1, 0),
(7, 4, '0011-11-11 12:03:00', '1314-03-12 12:03:00', NULL, 0, 'prueba', '4234324324324', 'Daniel', 'Tocino Estrada', 'dtocino@gmail.com', 1312151543, 131231, 'peruana', '1342-02-13', 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE IF NOT EXISTS `tarifas` (
`ID` int(11) NOT NULL,
  `grupo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` int(11) NOT NULL,
  `modulo_tramos` int(11) NOT NULL,
  `precio_tramo1` float NOT NULL,
  `precio_tramo2` float NOT NULL,
  `precio_tramo3` float NOT NULL,
  `precio_tramo4` float NOT NULL,
  `km_max_diarios` float NOT NULL,
  `precio_km_extra` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tarifas`
--

INSERT INTO `tarifas` (`ID`, `grupo`, `oficina`, `modulo_tramos`, `precio_tramo1`, `precio_tramo2`, `precio_tramo3`, `precio_tramo4`, `km_max_diarios`, `precio_km_extra`) VALUES
(3, 'A', 1, 1, 1.1, 1.2, 1.3, 1.4, 1, 1),
(4, 'B', 2, 2, 2.1, 2.2, 2.3, 2.4, 2, 2),
(5, 'C', 3, 1, 3.1, 3.2, 3.3, 3.4, 3, 3),
(6, '1', 1, 2, 4.1, 4.2, 4.3, 4.4, 4, 4),
(7, '2', 2, 2, 5.1, 5.2, 5.3, 5.4, 5, 5),
(8, '3', 2, 2, 5.1, 5.2, 5.3, 5.4, 5, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
`ID` int(11) NOT NULL,
  `tipo` enum('turismo','industrial','','') COLLATE utf8_spanish_ci NOT NULL,
  `grupo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `modelo` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `puertas` int(11) NOT NULL,
  `plazas` int(11) NOT NULL,
  `radio` tinyint(1) NOT NULL,
  `aire` tinyint(1) NOT NULL,
  `metros_cubicos` float NOT NULL,
  `alto` float NOT NULL,
  `ancho` float NOT NULL,
  `largo` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=687 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`ID`, `tipo`, `grupo`, `modelo`, `puertas`, `plazas`, `radio`, `aire`, `metros_cubicos`, `alto`, `ancho`, `largo`) VALUES
(2, 'industrial', '2', 'Renault Kangoo', 4, 5, 0, 1, 2.5, 3.6, 3.6, 6.2),
(456, 'industrial', 'B', 'Renault Kangoo', 4, 5, 0, 1, 2.5, 3.6, 3.6, 6.2),
(686, 'turismo', '3', 'Renault Kangoo', 4, 5, 0, 1, 2.5, 3.6, 3.6, 6.2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `oficinas`
--
ALTER TABLE `oficinas`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
 ADD PRIMARY KEY (`ID`), ADD KEY `tarifa` (`tarifa`), ADD KEY `tarifa_2` (`tarifa`), ADD KEY `oficina_devolucion` (`oficina_devolucion`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
 ADD PRIMARY KEY (`ID`), ADD KEY `oficina` (`oficina`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `oficinas`
--
ALTER TABLE `oficinas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=687;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
ADD CONSTRAINT `fk_reservas_oficinaDevolucion` FOREIGN KEY (`oficina_devolucion`) REFERENCES `oficinas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_reservas_tarifa` FOREIGN KEY (`tarifa`) REFERENCES `tarifas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tarifas`
--
ALTER TABLE `tarifas`
ADD CONSTRAINT `fk_tarifas_oficina` FOREIGN KEY (`oficina`) REFERENCES `oficinas` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
