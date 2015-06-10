-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-06-2015 a las 13:36:29
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
  `localidad` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `direccion_recogida` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `devolucion_distinta_recogida` tinyint(1) NOT NULL,
  `telefono` int(11) NOT NULL,
  `hora_apertura` time NOT NULL,
  `hora_cierre` time NOT NULL,
  `operador` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE IF NOT EXISTS `reservas` (
`ID` int(11) NOT NULL,
  `tarifa` int(11) NOT NULL,
  `momento_recogida` datetime NOT NULL,
  `momento_devolucion` datetime NOT NULL,
  `oficina_devolucion` int(11) NOT NULL,
  `cargado_cuenta` float NOT NULL,
  `estado` enum('prueba','','','') COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono1` int(11) NOT NULL,
  `telefono2` int(11) NOT NULL,
  `nacionalidad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `extra_gps` int(11) NOT NULL,
  `extra_silla_niño` int(11) NOT NULL,
  `extra_silla_elevador` int(11) NOT NULL,
  `extra_portaesquis` int(11) NOT NULL,
  `extra_cadenas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE IF NOT EXISTS `tarifas` (
`ID` int(11) NOT NULL,
  `grupo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` int(11) NOT NULL,
  `modulo_tramos` enum('prueba','','','') COLLATE utf8_spanish_ci NOT NULL,
  `precio_tramo1` float NOT NULL,
  `precio_tramo2` float NOT NULL,
  `precio_tramo3` float NOT NULL,
  `precio_tramo4` float NOT NULL,
  `km_max_diarios` float NOT NULL,
  `precio_km_extra` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
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
