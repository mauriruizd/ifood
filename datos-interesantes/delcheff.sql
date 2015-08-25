-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2015 a las 21:47:12
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `delcheff`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE IF NOT EXISTS `puntuacion` (
`codigo` int(11) NOT NULL,
  `cliente_codigo` int(11) NOT NULL,
  `puntaje` double NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `ranking_codigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puntuacion`
--

INSERT INTO `puntuacion` (`codigo`, `cliente_codigo`, `puntaje`, `comentario`, `ranking_codigo`) VALUES
(5, 31, 3, '', 5),
(6, 1, 1, 'Malisimo.. asquerosoooooo!! feos!', 5),
(7, 1, 5, 'Excelente!', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
`codigo` int(11) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `cont_click` int(11) NOT NULL,
  `total_puntos` double NOT NULL,
  `rating` double NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ranking`
--

INSERT INTO `ranking` (`codigo`, `empresa_codigo`, `cont_click`, `total_puntos`, `rating`) VALUES
(5, 12, 2, 4, 2),
(6, 11, 1, 5, 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_clientes_puntuacion_fk` (`cliente_codigo`), ADD KEY `ranking_puntuacion_fk` (`ranking_codigo`);

--
-- Indices de la tabla `ranking`
--
ALTER TABLE `ranking`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_empresas_ranking_fk` (`empresa_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ranking`
--
ALTER TABLE `ranking`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
ADD CONSTRAINT `persona_clientes_puntuacion_fk` FOREIGN KEY (`cliente_codigo`) REFERENCES `persona_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `ranking_puntuacion_fk` FOREIGN KEY (`ranking_codigo`) REFERENCES `ranking` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ranking`
--
ALTER TABLE `ranking`
ADD CONSTRAINT `persona_empresas_ranking_fk` FOREIGN KEY (`empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
