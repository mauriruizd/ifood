-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2015 a las 21:32:24
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
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `imagen_url` varchar(60) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `usuario_registro` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario_ultmodif` int(11) NOT NULL,
  `fecha_ultmodif` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de categorias';

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`codigo`, `nombre`, `imagen_url`, `slug`, `estado`, `usuario_registro`, `fecha_registro`, `usuario_ultmodif`, `fecha_ultmodif`) VALUES
(1, 'Hamburguesas', 'img/categorias/HAMBURGUESAS.png', 'hamburguesas', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(2, 'Lomitos', 'img/categorias/LOMITOS.png', 'lomitos', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(3, 'Pizzas', 'img/categorias/PIZZAS.png', 'pizzas', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(4, 'Restaurantes', 'img/categorias/RESTAURANTES.png', 'restaurantes', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(5, 'Oriental', 'img/categorias/ORIENTAL.png', 'oriental', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'Empanadas', 'img/categorias/EMPANADAS.png', 'empanadas', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'Chipas', 'img/categorias/CHIPAS.png', 'chipas', '0', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'Bebidas', 'img/categorias/BEBIDAS.png', 'bebidas', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 'Helados', 'img/categorias/HELADOS.png', 'helados', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(10, 'Vegana', 'img/categorias/VEGANA.png', 'vegana', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(11, 'Combos', 'img/categorias/COMBOS.png', 'combos', '1', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_helado_config`
--

CREATE TABLE IF NOT EXISTS `cat_helado_config` (
`codigo` int(11) NOT NULL,
  `producto_codigo` int(11) NOT NULL,
  `cat_helado_tamanho_codigo` int(11) NOT NULL,
  `cat_helado_tipo_codigo` int(11) NOT NULL,
  `helado_precio` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_helado_sabores`
--

CREATE TABLE IF NOT EXISTS `cat_helado_sabores` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `subcategoria_codigo` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_helado_tamanho`
--

CREATE TABLE IF NOT EXISTS `cat_helado_tamanho` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cantidad_sabores` int(11) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_helado_tipos`
--

CREATE TABLE IF NOT EXISTS `cat_helado_tipos` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_config`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_config` (
`codigo` int(11) NOT NULL,
  `producto_codigo` int(11) NOT NULL,
  `cat_pizza_esp_codigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_pizza_config`
--

INSERT INTO `cat_pizza_config` (`codigo`, `producto_codigo`, `cat_pizza_esp_codigo`) VALUES
(1, 9, 1),
(2, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_detalles`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_detalles` (
`codigo` int(11) NOT NULL,
  `cat_pizza_masa_codigo` int(11) NOT NULL,
  `cat_pizza_tamanho_codigo` int(11) NOT NULL,
  `cat_pizza_esp_codigo` int(11) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_pizza_detalles`
--

INSERT INTO `cat_pizza_detalles` (`codigo`, `cat_pizza_masa_codigo`, `cat_pizza_tamanho_codigo`, `cat_pizza_esp_codigo`, `precio`, `estado`) VALUES
(1, 1, 3, 1, '60000.00', NULL),
(2, 1, 4, 1, '45000.00', NULL),
(3, 3, 3, 1, '55000.00', NULL),
(4, 3, 4, 1, '35000.00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_especialidades`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_especialidades` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `empresa_codigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_pizza_especialidades`
--

INSERT INTO `cat_pizza_especialidades` (`codigo`, `nombre`, `estado`, `empresa_codigo`) VALUES
(1, 'De la casa', '', 11),
(2, 'Premium', '', 11),
(3, 'No pizza', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_extras`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_extras` (
`codigo` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_tamanhos`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_tamanhos` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cant_porcion` int(11) NOT NULL,
  `cant_sabores` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_pizza_tamanhos`
--

INSERT INTO `cat_pizza_tamanhos` (`codigo`, `nombre`, `cant_porcion`, `cant_sabores`, `estado`) VALUES
(3, 'Grande', 12, 3, ''),
(4, 'Mediana', 8, 1, '0'),
(5, 'Gruesa2', 5, 5, '1'),
(6, 'Gruesa2', 0, 0, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cat_pizza_tipo_masa`
--

CREATE TABLE IF NOT EXISTS `cat_pizza_tipo_masa` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cat_pizza_tipo_masa`
--

INSERT INTO `cat_pizza_tipo_masa` (`codigo`, `nombre`, `estado`) VALUES
(1, 'Gruesa', ''),
(3, 'Fina', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
`codigo` int(15) NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `imagen_url` varchar(60) NOT NULL,
  `estado` int(1) DEFAULT NULL,
  `pais_codigo` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`codigo`, `nombre`, `imagen_url`, `estado`, `pais_codigo`) VALUES
(1, 'CIUDAD DEL ESTE', '', 1, 1),
(2, 'PRESIDENTE FRANCO', '', 1, 1),
(3, 'HERNANDARIAS', '', 1, 1),
(4, 'MINGA GUAZU', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE IF NOT EXISTS `cotizaciones` (
  `codigo` int(11) NOT NULL,
  `moneda_codigo` int(11) NOT NULL,
  `compra` decimal(15,2) NOT NULL,
  `venta` decimal(15,2) NOT NULL,
  `persona_empresa_codigo` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
`codigo` int(11) NOT NULL,
  `favoritos_persona_cliente_codigo` int(11) NOT NULL,
  `favoritos_producto_codigo` int(11) NOT NULL,
  `favoritos_empresa_codigo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`codigo`, `favoritos_persona_cliente_codigo`, `favoritos_producto_codigo`, `favoritos_empresa_codigo`, `estado`) VALUES
(8, 1, 9, 11, 0),
(9, 31, 7, 12, 1),
(10, 31, 10, 11, 1),
(11, 31, 1, 11, 1),
(12, 1, 2, 11, 1),
(13, 1, 5, 12, 0),
(14, 1, 4, 12, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monedas`
--

CREATE TABLE IF NOT EXISTS `monedas` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `abreviatura` varchar(3) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) COLLATE utf8_bin NOT NULL,
  `abreviatura` varchar(3) COLLATE utf8_bin NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`codigo`, `nombre`, `abreviatura`, `estado`) VALUES
(1, 'PARAGUAY', 'PY', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
`codigo` int(11) NOT NULL,
  `persona_cliente_codigo` int(11) NOT NULL,
  `direccion_codigo` int(11) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `importe_total` decimal(15,2) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `usuario_registro` int(11) DEFAULT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_ultmodif` int(11) DEFAULT NULL,
  `fecha_ultmod` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los datos de las cabezeras de pedidos';

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`codigo`, `persona_cliente_codigo`, `direccion_codigo`, `empresa_codigo`, `importe_total`, `estado`, `usuario_registro`, `fecha_registro`, `usuario_ultmodif`, `fecha_ultmod`) VALUES
(3, 1, 1, 11, '121000.00', 'llegado', NULL, '2015-07-24 09:59:42', NULL, '2015-07-24 09:59:42'),
(4, 1, 1, 0, '25000.00', 'llegado', NULL, '2015-07-24 15:59:54', NULL, '2015-07-24 15:59:54'),
(5, 1, 1, 0, '25000.00', 'llegado', NULL, '2015-07-24 16:00:19', NULL, '2015-07-24 16:00:19'),
(6, 1, 1, 0, '55000.00', 'llegado', NULL, '2015-07-27 08:41:10', NULL, '2015-07-27 08:41:10'),
(7, 1, 5, 0, '25000.00', 'llegado', NULL, '2015-07-27 09:08:09', NULL, '2015-07-27 09:08:09'),
(8, 1, 5, 0, '25000.00', 'llegado', NULL, '2015-07-27 09:14:17', NULL, '2015-07-27 09:14:17'),
(9, 1, 5, 0, '61000.00', 'llegado', NULL, '2015-07-27 10:34:49', NULL, '2015-07-27 10:34:49'),
(10, 1, 5, 0, '185000.00', 'llegado', NULL, '2015-07-27 10:38:32', NULL, '2015-07-27 10:38:32'),
(11, 1, 5, 0, '185000.00', 'llegado', NULL, '2015-07-27 10:39:55', NULL, '2015-07-27 10:39:55'),
(12, 1, 2, 0, '81000.00', 'llegado', NULL, '2015-07-27 10:41:50', NULL, '2015-07-27 10:41:50'),
(13, 1, 5, 0, '40000.00', 'llegado', NULL, '2015-07-27 10:43:26', NULL, '2015-07-27 10:43:26'),
(14, 1, 5, 0, '106000.00', 'llegado', NULL, '2015-07-27 11:18:50', NULL, '2015-07-27 11:18:50'),
(15, 1, 5, 12, '36000.00', 'llegado', NULL, '2015-07-27 11:42:31', NULL, '2015-07-27 11:42:31'),
(16, 1, 5, 11, '25000.00', 'llegado', NULL, '2015-07-27 11:42:31', NULL, '2015-07-27 11:42:31'),
(17, 1, 5, 11, '65000.00', 'llegado', NULL, '2015-07-27 11:44:22', NULL, '2015-07-27 11:44:22'),
(18, 1, 5, 12, '36000.00', 'llegado', NULL, '2015-07-27 11:44:23', NULL, '2015-07-27 11:44:23'),
(19, 1, 2, 11, '145000.00', 'llegado', NULL, '2015-07-27 11:50:29', NULL, '2015-07-27 11:50:29'),
(20, 1, 2, 12, '11000.00', 'llegado', NULL, '2015-07-27 11:50:29', NULL, '2015-07-27 11:50:29'),
(21, 1, 5, 11, '65000.00', 'llegado', NULL, '2015-07-28 10:10:59', NULL, '2015-07-28 10:10:59'),
(22, 1, 5, 11, '65000.00', 'llegado', NULL, '2015-07-28 10:11:23', NULL, '2015-07-28 10:11:23'),
(23, 1, 5, 11, '65000.00', 'llegado', NULL, '2015-07-28 10:13:10', NULL, '2015-07-28 10:13:10'),
(24, 1, 5, 11, '65000.00', 'llegado', NULL, '2015-07-28 10:13:33', NULL, '2015-07-28 10:13:33'),
(25, 1, 5, 12, '12000.00', 'llegado', NULL, '2015-07-28 10:21:39', NULL, '2015-07-28 10:21:39'),
(26, 1, 5, 11, '105000.00', 'llegado', NULL, '2015-07-28 10:21:39', NULL, '2015-07-28 10:21:39'),
(27, 2, 3, 12, '105000.00', 'llegado', NULL, '2015-07-28 10:21:40', NULL, '2015-07-28 10:21:40'),
(28, 1, 1, 12, '87000.00', 'llegado', NULL, '2015-07-28 13:22:31', NULL, '2015-07-28 13:22:31'),
(29, 1, 1, 12, '87000.00', 'llegado', NULL, '2015-07-28 13:26:11', NULL, '2015-07-28 13:26:11'),
(30, 1, 1, 12, '87000.00', 'llegado', NULL, '2015-07-28 13:35:01', NULL, '2015-07-28 13:35:01'),
(31, 1, 1, 12, '87000.00', 'llegado', NULL, '2015-07-28 13:35:28', NULL, '2015-07-28 13:35:28'),
(32, 1, 5, 11, '25000.00', 'llegado', NULL, '2015-07-28 13:37:13', NULL, '2015-07-28 13:37:13'),
(33, 1, 5, 12, '11000.00', 'llegado', NULL, '2015-07-28 13:40:22', NULL, '2015-07-28 13:40:22'),
(34, 1, 1, 12, '31000.00', 'llegado', NULL, '2015-07-28 13:44:42', NULL, '2015-07-28 13:44:42'),
(35, 1, 1, 12, '31000.00', 'llegado', NULL, '2015-07-28 13:45:01', NULL, '2015-07-28 13:45:01'),
(36, 31, 9, 11, '70000.00', 'llegado', NULL, '2015-07-30 09:58:46', NULL, '2015-07-30 09:58:46'),
(37, 31, 9, 12, '81000.00', 'llegado', NULL, '2015-07-30 10:05:40', NULL, '2015-07-30 10:05:40'),
(38, 31, 9, 12, '12000.00', 'llegado', NULL, '2015-07-30 10:07:25', NULL, '2015-07-30 10:07:25'),
(39, 31, 9, 12, '12000.00', 'llegado', NULL, '2015-07-30 10:09:35', NULL, '2015-07-30 10:09:35'),
(40, 31, 9, 11, '340000.00', 'llegado', NULL, '2015-08-05 09:33:28', NULL, '2015-08-05 09:33:28'),
(41, 31, 9, 11, '70000.00', 'llegado', NULL, '2015-08-05 13:27:03', NULL, '2015-08-05 13:27:03'),
(42, 31, 9, 11, '70000.00', 'llegado', NULL, '2015-08-05 13:28:22', NULL, '2015-08-05 13:28:22'),
(43, 31, 9, 11, '235000.00', 'llegado', NULL, '2015-08-05 13:55:42', NULL, '2015-08-05 13:55:42'),
(44, 31, 9, 11, '235000.00', 'llegado', NULL, '2015-08-05 13:57:26', NULL, '2015-08-05 13:57:26'),
(45, 31, 9, 12, '37000.00', 'llegado', NULL, '2015-08-06 07:59:48', NULL, '2015-08-06 07:59:48'),
(46, 31, 9, 12, '37000.00', 'llegado', NULL, '2015-08-06 09:19:59', NULL, '2015-08-06 09:19:59'),
(47, 31, 9, 11, '30000.00', 'llegado', NULL, '2015-08-06 09:21:26', NULL, '2015-08-06 09:21:26'),
(48, 31, 9, 11, '30000.00', 'llegado', NULL, '2015-08-06 09:22:34', NULL, '2015-08-06 09:22:34'),
(49, 31, 9, 12, '112000.00', 'llegado', NULL, '2015-08-06 10:07:12', NULL, '2015-08-06 10:07:12'),
(50, 31, 9, 11, '25000.00', 'llegado', NULL, '2015-08-06 10:09:35', NULL, '2015-08-06 10:09:35'),
(51, 31, 9, 12, '81000.00', 'llegado', NULL, '2015-08-06 10:09:35', NULL, '2015-08-06 10:09:35'),
(52, 31, 9, 11, '25000.00', 'llegado', NULL, '2015-08-06 10:10:54', NULL, '2015-08-06 10:10:54'),
(53, 31, 9, 11, '55000.00', 'llegado', NULL, '2015-08-06 10:14:25', NULL, '2015-08-06 10:14:25'),
(54, 31, 9, 12, '12000.00', 'llegado', NULL, '2015-08-06 10:15:58', NULL, '2015-08-06 10:15:58'),
(55, 31, 9, 11, '30000.00', 'llegado', NULL, '2015-08-06 10:17:32', NULL, '2015-08-06 10:17:32'),
(56, 31, 9, 12, '31000.00', 'llegado', NULL, '2015-08-06 10:20:37', NULL, '2015-08-06 10:20:37'),
(57, 31, 9, 12, '12000.00', 'llegado', NULL, '2015-08-06 10:21:10', NULL, '2015-08-06 10:21:10'),
(58, 31, 9, 11, '35000.00', 'llegado', NULL, '2015-08-06 11:05:15', NULL, '2015-08-06 11:05:15'),
(59, 1, 1, 11, '199000.00', 'llegado', NULL, '2015-08-06 11:19:57', NULL, '2015-08-06 11:19:57'),
(60, 1, 1, 11, '78000.00', 'llegado', NULL, '2015-08-13 15:28:24', NULL, '2015-08-13 15:28:24'),
(61, 1, 2, 11, '78000.00', 'llegado', NULL, '2015-08-13 15:29:37', NULL, '2015-08-13 15:29:37'),
(62, 1, 2, 11, '78000.00', 'llegado', NULL, '2015-08-13 15:30:59', NULL, '2015-08-13 15:30:59'),
(63, 1, 1, 11, '214000.00', 'llegado', NULL, '2015-08-14 09:27:36', NULL, '2015-08-14 09:27:36'),
(64, 1, 1, 11, '98000.00', 'llegado', NULL, '2015-08-14 14:14:41', NULL, '2015-08-14 14:14:41'),
(65, 31, 10, 11, '45000.00', 'llegado', NULL, '2015-08-14 15:22:25', NULL, '2015-08-14 15:22:25'),
(66, 31, 10, 11, '282000.00', 'llegado', NULL, '2015-08-17 09:53:08', NULL, '2015-08-17 09:53:08'),
(67, 1, 5, 11, '210000.00', 'llegado', NULL, '2015-08-19 10:52:48', NULL, '2015-08-19 10:52:48'),
(68, 1, 5, 12, '5000.00', 'llegado', NULL, '2015-08-19 10:52:48', NULL, '2015-08-19 10:52:48'),
(69, 1, 5, 11, '210000.00', 'llegado', NULL, '2015-08-19 10:55:16', NULL, '2015-08-19 10:55:16'),
(70, 1, 5, 12, '5000.00', 'llegado', NULL, '2015-08-19 10:55:17', NULL, '2015-08-19 10:55:17'),
(71, 1, 5, 11, '210000.00', 'llegado', NULL, '2015-08-19 10:58:19', NULL, '2015-08-19 10:58:19'),
(72, 1, 5, 12, '5000.00', 'llegado', NULL, '2015-08-19 10:58:19', NULL, '2015-08-19 10:58:19'),
(73, 1, 1, 11, '20000.00', 'llegado', NULL, '2015-08-20 09:57:28', NULL, '2015-08-20 09:57:28'),
(74, 1, 1, 12, '31000.00', 'llegado', NULL, '2015-08-20 09:57:28', NULL, '2015-08-20 09:57:28'),
(75, 1, 1, 12, '31000.00', 'llegado', NULL, '2015-08-20 09:59:31', NULL, '2015-08-20 09:59:31'),
(76, 1, 2, 12, '81000.00', 'llegado', NULL, '2015-08-20 10:01:21', NULL, '2015-08-20 10:01:21'),
(77, 1, 2, 12, '87000.00', 'llegado', NULL, '2015-08-20 10:04:24', NULL, '2015-08-20 10:04:24'),
(78, 1, 1, 12, '11000.00', 'llegado', NULL, '2015-08-20 10:06:11', NULL, '2015-08-20 10:06:11'),
(79, 1, 1, 12, '31000.00', 'llegado', NULL, '2015-08-20 10:16:49', NULL, '2015-08-20 10:16:49'),
(80, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:02:47', NULL, '2015-08-26 09:02:47'),
(81, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:04:06', NULL, '2015-08-26 09:04:06'),
(82, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:05:22', NULL, '2015-08-26 09:05:22'),
(83, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:05:39', NULL, '2015-08-26 09:05:39'),
(84, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:06:33', NULL, '2015-08-26 09:06:33'),
(85, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:17:21', NULL, '2015-08-26 09:17:21'),
(86, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:17:40', NULL, '2015-08-26 09:17:40'),
(87, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:20:10', NULL, '2015-08-26 09:20:10'),
(88, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:21:08', NULL, '2015-08-26 09:21:08'),
(89, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:21:37', NULL, '2015-08-26 09:21:37'),
(90, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:22:20', NULL, '2015-08-26 09:22:20'),
(91, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:26:50', NULL, '2015-08-26 09:26:50'),
(92, 1, 5, 11, '55000.00', 'llegado', NULL, '2015-08-26 09:30:21', NULL, '2015-08-26 09:30:21'),
(93, 1, 1, 11, '30000.00', 'llegado', NULL, '2015-08-26 09:32:21', NULL, '2015-08-26 09:32:21'),
(94, 1, 1, 11, '20000.00', 'llegado', NULL, '2015-08-26 09:32:54', NULL, '2015-08-26 09:32:54'),
(95, 1, 1, 11, '20000.00', 'llegado', NULL, '2015-08-26 11:33:04', NULL, '2015-08-26 11:33:04'),
(96, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:35:01', NULL, '2015-08-26 11:35:01'),
(97, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:36:54', NULL, '2015-08-26 11:36:54'),
(98, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:37:24', NULL, '2015-08-26 11:37:24'),
(99, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:39:42', NULL, '2015-08-26 11:39:42'),
(100, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:42:00', NULL, '2015-08-26 11:42:00'),
(101, 1, 1, 11, '50000.00', 'llegado', NULL, '2015-08-26 11:50:36', NULL, '2015-08-26 11:50:36'),
(102, 1, 1, 11, '25000.00', 'llegado', NULL, '2015-08-26 11:53:23', NULL, '2015-08-26 11:53:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalles`
--

CREATE TABLE IF NOT EXISTS `pedidos_detalles` (
`codigo` int(11) NOT NULL,
  `pedido_codigo` int(11) NOT NULL,
  `producto_codigo` int(11) NOT NULL,
  `producto_descripcion` varchar(100) NOT NULL,
  `cantidad` decimal(15,2) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `moneda_simbolo` varchar(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de los detalles del pedido';

--
-- Volcado de datos para la tabla `pedidos_detalles`
--

INSERT INTO `pedidos_detalles` (`codigo`, `pedido_codigo`, `producto_codigo`, `producto_descripcion`, `cantidad`, `precio`, `subtotal`, `moneda_simbolo`) VALUES
(1, 3, 9, 'Pizza Queso(Tamaño Mediana, masa Gruesa)', '2.00', '45000.00', '90000.00', ''),
(2, 3, 6, 'Fanta', '3.00', '5000.00', '15000.00', ''),
(3, 4, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(4, 5, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(5, 6, 1, 'Hamburguesa grande', '3.00', '15000.00', '45000.00', ''),
(6, 7, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(7, 8, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(8, 9, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(9, 9, 3, 'Hamburguesa Doble Carne', '2.00', '18000.00', '36000.00', ''),
(10, 11, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '3.00', '55000.00', '165000.00', ''),
(11, 11, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(12, 12, 5, 'Coca Cola', '1.00', '5000.00', '5000.00', ''),
(13, 12, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(14, 12, 9, 'Pizza Queso(Tamaño Mediana, masa Fina)', '1.00', '35000.00', '35000.00', ''),
(15, 13, 2, 'Hamburguesa Chica', '3.00', '10000.00', '30000.00', ''),
(16, 14, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(17, 14, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(18, 14, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(19, 15, 6, 'Fanta', '1.00', '5000.00', '5000.00', ''),
(20, 15, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(21, 16, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(22, 17, 9, 'Pizza Queso(Tamaño Mediana, masa Gruesa)', '1.00', '45000.00', '45000.00', ''),
(23, 17, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(24, 18, 6, 'Fanta', '1.00', '5000.00', '5000.00', ''),
(25, 18, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(26, 19, 9, 'Pizza Queso(Tamaño Grande, masa Gruesa)', '2.00', '60000.00', '120000.00', ''),
(27, 19, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(28, 20, 6, 'Fanta', '1.00', '5000.00', '5000.00', ''),
(29, 21, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(30, 22, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(31, 23, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(32, 24, 9, 'Pizza Queso(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(33, 25, 8, 'Lipton', '1.00', '6000.00', '6000.00', ''),
(34, 26, 10, 'Pizza Calabresa(Tamaño Grande, masa Fina)', '1.00', '55000.00', '55000.00', ''),
(35, 26, 2, 'Hamburguesa Chica', '4.00', '10000.00', '40000.00', ''),
(36, 27, 7, 'Coca Cola sin Cafeina', '4.00', '6000.00', '24000.00', ''),
(37, 27, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(38, 28, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(39, 28, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(40, 29, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(41, 29, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(42, 30, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(43, 30, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(44, 31, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(45, 31, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(46, 32, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(47, 33, 6, 'Fanta', '1.00', '5000.00', '5000.00', ''),
(48, 35, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(49, 36, 9, 'Pizza Queso(Tamaño Grande, masa Gruesa)', '1.00', '60000.00', '60000.00', ''),
(50, 37, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(51, 38, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(52, 39, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(53, 40, 9, 'Pizza Queso( Tamaño Grande, masa Gruesa)', '5.00', '60000.00', '300000.00', ''),
(54, 40, 2, 'Hamburguesa Chica', '3.00', '10000.00', '30000.00', ''),
(55, 41, 1, 'Hamburguesa grande', '3.00', '20000.00', '60000.00', ''),
(56, 42, 1, 'Hamburguesa grande', '3.00', '20000.00', '60000.00', ''),
(57, 43, 10, 'Pizza Calabresa( Tamaño Grande, masa Fina)', '3.00', '55000.00', '165000.00', ''),
(58, 44, 10, 'Pizza Calabresa( Tamaño Grande, masa Fina)', '3.00', '55000.00', '165000.00', ''),
(59, 44, 1, 'Hamburguesa grande', '3.00', '20000.00', '60000.00', ''),
(60, 45, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(61, 45, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(62, 46, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(63, 46, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(64, 47, 1, 'Hamburguesa grande', '1.00', '20000.00', '20000.00', ''),
(65, 48, 1, 'Hamburguesa grande', '1.00', '20000.00', '20000.00', ''),
(66, 49, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(67, 49, 4, 'McMenu', '4.00', '25000.00', '100000.00', ''),
(68, 50, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(69, 51, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(70, 52, 1, 'Hamburguesa grande', '1.00', '15000.00', '15000.00', ''),
(71, 53, 10, 'Pizza Calabresa( Tamaño Mediana, masa Gruesa)', '1.00', '45000.00', '45000.00', ''),
(72, 54, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(73, 55, 1, 'Hamburguesa grande', '1.00', '20000.00', '20000.00', ''),
(74, 56, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(75, 57, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(76, 58, 1, 'Hamburguesa grande', '1.00', '25000.00', '25000.00', ''),
(77, 59, 9, 'Pizza Queso( Tamaño Grande, masa Fina)', '3.00', '63000.00', '189000.00', ''),
(78, 60, 9, 'Pizza Queso, Pizza Calabresa( Tamaño Grande, masa Gruesa)', '1.00', '68000.00', '68000.00', ''),
(79, 61, 9, 'Pizza Queso, Pizza Calabresa( Tamaño Grande, masa Gruesa)', '1.00', '68000.00', '68000.00', ''),
(80, 62, 9, 'Pizza Queso, Pizza Calabresa( Tamaño Grande, masa Gruesa)', '1.00', '68000.00', '68000.00', ''),
(81, 63, 9, 'Pizza Queso, Pizza Calabresa( Tamaño Grande, masa Gruesa)', '3.00', '68000.00', '204000.00', ''),
(82, 64, 2, 'Hamburguesa Chica', '1.00', '20000.00', '20000.00', ''),
(83, 64, 9, 'Pizza Queso, Pizza Calabresa( Tamaño Grande, masa Gruesa)', '1.00', '68000.00', '68000.00', ''),
(84, 65, 10, 'Pizza Calabresa( Tamaño Mediana, masa Fina)', '1.00', '35000.00', '35000.00', ''),
(85, 66, 10, 'Pizza Calabresa( Tamaño Grande, masa Gruesa)', '4.00', '68000.00', '272000.00', ''),
(86, 67, 5, 'Hamburguesa Chica', '1.00', '50000.00', '50000.00', ''),
(87, 67, 9, 'Pizza Cuatro Quesos (sin salsa roja)', '8.00', '20000.00', '160000.00', ''),
(88, 68, 6, 'Hamburguesa Grande', '1.00', '5000.00', '5000.00', ''),
(89, 69, 5, 'Hamburguesa Chica', '1.00', '50000.00', '50000.00', ''),
(90, 69, 9, 'Pizza Cuatro Quesos (sin salsa roja)', '8.00', '20000.00', '160000.00', ''),
(91, 70, 6, 'Hamburguesa Grande', '1.00', '5000.00', '5000.00', ''),
(92, 71, 5, 'Hamburguesa Chica', '1.00', '50000.00', '50000.00', ''),
(93, 71, 9, 'Pizza Cuatro Quesos (sin salsa roja)', '8.00', '20000.00', '160000.00', ''),
(94, 72, 6, 'Hamburguesa Grande', '1.00', '5000.00', '5000.00', ''),
(95, 73, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(96, 74, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(97, 75, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(98, 76, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(99, 77, 4, 'McMenu', '3.00', '25000.00', '75000.00', ''),
(100, 77, 7, 'Coca Cola sin Cafeina', '1.00', '6000.00', '6000.00', ''),
(101, 78, 6, 'Fanta', '1.00', '5000.00', '5000.00', ''),
(102, 79, 4, 'McMenu', '1.00', '25000.00', '25000.00', ''),
(103, 80, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(104, 81, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(105, 82, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(106, 83, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(107, 84, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(108, 85, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(109, 86, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(110, 87, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(111, 88, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(112, 89, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(113, 90, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(114, 91, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(115, 92, 2, 'Hamburguesa Chica', '3.00', '15000.00', '45000.00', ''),
(116, 93, 2, 'Hamburguesa Chica', '2.00', '10000.00', '20000.00', ''),
(117, 94, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(118, 95, 2, 'Hamburguesa Chica', '1.00', '10000.00', '10000.00', ''),
(119, 96, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', ''),
(120, 97, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', ''),
(121, 98, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', ''),
(122, 99, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', ''),
(123, 100, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', ''),
(124, 101, 1, 'Hamburguesa grande', '1.00', '20000.00', '20000.00', ''),
(125, 101, 2, 'Hamburguesa Chica', '1.00', '20000.00', '20000.00', ''),
(126, 102, 2, 'Hamburguesa Chica', '1.00', '15000.00', '15000.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos_detalle_extras`
--

CREATE TABLE IF NOT EXISTS `pedidos_detalle_extras` (
`codigo` int(11) NOT NULL,
  `pdetalle_codigo` int(11) NOT NULL,
  `producto_subextra_codigo` int(11) NOT NULL,
  `producto_extra_precio` decimal(15,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pedidos_detalle_extras`
--

INSERT INTO `pedidos_detalle_extras` (`codigo`, `pdetalle_codigo`, `producto_subextra_codigo`, `producto_extra_precio`) VALUES
(1, 56, 1, '5000.00'),
(2, 59, 1, '5000.00'),
(3, 64, 1, '5000.00'),
(4, 65, 1, '5000.00'),
(5, 73, 1, '5000.00'),
(6, 76, 1, '5000.00'),
(7, 76, 8, '5000.00'),
(8, 77, 9, '8000.00'),
(9, 80, 9, '8000.00'),
(10, 81, 9, '8000.00'),
(11, 82, 1, '5000.00'),
(12, 82, 8, '5000.00'),
(13, 83, 9, '8000.00'),
(14, 85, 9, '8000.00'),
(15, 86, 1, '5000.00'),
(16, 88, 8, '200.00'),
(18, 89, 1, '5000.00'),
(19, 91, 8, '200.00'),
(21, 92, 1, '5000.00'),
(22, 94, 8, '200.00'),
(23, 94, 9, '1200.00'),
(24, 103, 1, '5000.00'),
(25, 104, 1, '5000.00'),
(26, 105, 1, '5000.00'),
(27, 106, 1, '5000.00'),
(28, 107, 1, '5000.00'),
(29, 108, 1, '5000.00'),
(30, 109, 1, '5000.00'),
(31, 110, 1, '5000.00'),
(32, 111, 1, '5000.00'),
(33, 112, 1, '5000.00'),
(34, 113, 1, '5000.00'),
(35, 114, 1, '5000.00'),
(36, 115, 1, '5000.00'),
(37, 119, 1, '5000.00'),
(38, 120, 1, '5000.00'),
(39, 121, 1, '5000.00'),
(40, 122, 1, '0.00'),
(41, 123, 1, '0.00'),
(42, 124, 1, '5000.00'),
(43, 125, 1, '5000.00'),
(44, 125, 8, '5000.00'),
(45, 126, 1, '5000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_clientes`
--

CREATE TABLE IF NOT EXISTS `persona_clientes` (
`codigo` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `clave` varchar(70) NOT NULL,
  `apellidos` varchar(60) NOT NULL,
  `telefono` varchar(30) DEFAULT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de clientes';

--
-- Volcado de datos para la tabla `persona_clientes`
--

INSERT INTO `persona_clientes` (`codigo`, `nombres`, `login`, `clave`, `apellidos`, `telefono`, `celular`, `email`, `estado`) VALUES
(1, 'Mauricio José Maria', 'maurird96', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ruiz Diaz', NULL, '', 'mauri.rd@gmail.com', '1'),
(2, 'Mauricio Jose Maria', 'mauroloko', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Ruiz Diaz Maciel', NULL, '', 'mauri.rd@gmail.com', '1'),
(3, 'el loko', 'lokote', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'de los lokos', NULL, '09837894564', 'juancito@gmail.com', '1'),
(4, 'El mas loko', 'lokote', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'kkk', NULL, '116486646', 'juansito@hotmail.com', '1'),
(5, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', '1'),
(6, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', '1'),
(7, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', '1'),
(8, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', '1'),
(9, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(10, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(11, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(12, 'nnnn', 'rrrrr', '3292ccfad2b02195cdb85f79124b12e476b65ac0', 'aaaaa', NULL, '444444', 'eeee', ''),
(13, 'nnnn', 'rrrrr', '3292ccfad2b02195cdb85f79124b12e476b65ac0', 'aaaaa', NULL, '444444', 'eeee', ''),
(14, 'nnnn', 'rrrrr', '3292ccfad2b02195cdb85f79124b12e476b65ac0', 'aaaaa', NULL, '444444', 'eeee', ''),
(15, 'ee', 'rgg', '35acdce3fb2f0d923093af15ee83d3a67f7d4b71', 'ttt', NULL, 'ttt', 'tt', ''),
(16, 'ee', 'rgg', '35acdce3fb2f0d923093af15ee83d3a67f7d4b71', 'ttt', NULL, 'ttt', 'tt', ''),
(17, 'Santiago', 'iiiij', 'b2c4ee5de82866db38f79c6d4a91a626486b70e9', 'ochoa', NULL, '7777777', 'one@gmail', ''),
(18, 'Santiago', 'iiiij', 'b2c4ee5de82866db38f79c6d4a91a626486b70e9', 'ochoa', NULL, '7777777', 'one@gmail', ''),
(19, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', ''),
(20, 'probando', 'login', '3d4f2bf07dc1be38b20cd6e46949a1071f9d0e3d', 'ape', NULL, '0973 185555', 'one@hotmail.com', ''),
(26, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(27, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(28, 'mauricio', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(29, 'asdfasfsd', 'mauricinho', 'bbb5d8e50aad159b68022c63e337868cbfe3e540', 'ruiz diaz maciel', NULL, '0983526405', 'mauri.rd@gmail.com', ''),
(30, 'marcos', 'iiiij', 'b2c4ee5de82866db38f79c6d4a91a626486b70e9', 'ochoa', NULL, '7777777', 'one@gmail', ''),
(31, 'Mauricio', '', '', 'Ruiz Diaz', NULL, '', 'rd_mauri@hotmail.com', ''),
(32, 'Mauricio J.', 'mauri', 'cf6e70553c8b3cb9475712c97e1008a8a0d5f0be', 'R. D. Maciel', NULL, '0983526405', 'mauri.rd@gmail.com', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_cliente_direcciones`
--

CREATE TABLE IF NOT EXISTS `persona_cliente_direcciones` (
`codigo` int(11) NOT NULL,
  `persona_cliente_codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `latitud` double NOT NULL,
  `longitud` double NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_cliente_direcciones`
--

INSERT INTO `persona_cliente_direcciones` (`codigo`, `persona_cliente_codigo`, `nombre`, `direccion`, `latitud`, `longitud`, `estado`) VALUES
(1, 1, 'Casa', 'Area 1, Manzana L, Lote 3', -25.519361496649243, -54.635825155855855, ''),
(2, 1, 'Wigo', 'Edificio China, apto. 12B - Calle Boquerón', -25.51107330879618, -54.612130522727966, ''),
(3, 2, 'Casa', 'Avda. Itaipu esq. Los Cedros', -25.51932276813031, -54.63573932516738, ''),
(4, 2, 'Trabajo', 'Edificio China, apto. 12B - Calle Boquerón', -25.511082991592495, -54.612178802490234, ''),
(5, 1, 'Facu', 'Av. Jorge Sanwais', -25.541124946791264, -54.579155445262586, '0'),
(8, 1, 'Club Area 1', 'Avda. Itaipu Oeste', -25.51907103245262, -54.63275671005249, ''),
(9, 31, 'Casa Santi', 'Barrio Villa Bancaria', -25.52131727060403, -54.64231610298157, ''),
(10, 31, 'Casa Marcos', 'Padre Guillermo Bauman', 0, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_empresas`
--

CREATE TABLE IF NOT EXISTS `persona_empresas` (
`codigo` int(11) NOT NULL,
  `denominacion` varchar(60) NOT NULL,
  `slug` varchar(30) NOT NULL,
  `logo_url` varchar(60) NOT NULL,
  `ruc` varchar(30) NOT NULL,
  `representante_legal` varchar(60) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `ciudad_codigo` int(11) NOT NULL,
  `latitud` varchar(20) NOT NULL,
  `longitud` varchar(20) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `celular` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `costo_delivery` int(10) unsigned NOT NULL,
  `radio_cobertura` int(2) unsigned NOT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'ACTIVO, INACTIVO',
  `rating` tinyint(3) unsigned NOT NULL,
  `socket_server_token` varchar(40) NOT NULL,
  `usuario_registro` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario_ultmodif` datetime NOT NULL,
  `fecha_ultmodif` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendras los registros de las empresas';

--
-- Volcado de datos para la tabla `persona_empresas`
--

INSERT INTO `persona_empresas` (`codigo`, `denominacion`, `slug`, `logo_url`, `ruc`, `representante_legal`, `direccion`, `ciudad_codigo`, `latitud`, `longitud`, `telefono`, `celular`, `email`, `costo_delivery`, `radio_cobertura`, `estado`, `rating`, `socket_server_token`, `usuario_registro`, `fecha_registro`, `usuario_ultmodif`, `fecha_ultmodif`) VALUES
(11, 'McDionisio', 'mcdionisio', 'img/empresas/mcdionisio.jpg', '', '', 'Av. San Blas esq. Cnel. Jose Sanchez', 1, '-25.507306641801993', '-54.63618624955416', '061123456', '', 'dionisio@mcdionisio.com', 10000, 1, '1', 0, 'a281e9f02db287293f3a636ec9543ede05a7b6ad', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'McDonalds', 'mcdonalds', 'img/empresas/logo-mcd.jpg', '', '', 'Avenida Monseñor Rodriguez', 1, '-25.509252929218196', '-54.633400440216064', '061500965', '', 'mc@meencanta.com', 6000, 4, '1', 0, 'ab0c31678c44097037ce515bfb673d2a726e1297', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_empresas_categoria`
--

CREATE TABLE IF NOT EXISTS `persona_empresas_categoria` (
`codigo` int(11) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `categoria_codigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona_empresas_categoria`
--

INSERT INTO `persona_empresas_categoria` (`codigo`, `empresa_codigo`, `categoria_codigo`) VALUES
(2, 11, 1),
(3, 11, 2),
(4, 11, 3),
(5, 11, 8),
(6, 11, 9),
(7, 12, 1),
(8, 12, 8),
(9, 12, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
`codigo` int(11) NOT NULL,
  `denominacion` varchar(60) NOT NULL,
  `imagen_url` varchar(60) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `categoria_codigo` int(11) NOT NULL,
  `subcategoria_codigo` int(11) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `precio` decimal(15,2) NOT NULL,
  `estado` varchar(20) DEFAULT NULL COMMENT 'ACTIVO, INACTIVO',
  `usuario_registro` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario_ultmodif` int(11) NOT NULL,
  `fecha_ultmodif` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de productos';

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`codigo`, `denominacion`, `imagen_url`, `descripcion`, `categoria_codigo`, `subcategoria_codigo`, `empresa_codigo`, `precio`, `estado`, `usuario_registro`, `fecha_registro`, `usuario_ultmodif`, `fecha_ultmodif`) VALUES
(1, 'Hamburguesa grande', 'img/productos/mcdionisio/hamburguesa.jpg', 'Hamburguesa grande con verduras y con mucho queso', 1, 1, 11, '15000.00', 'activo', 0, '2015-06-26 11:10:48', 2147483647, '2015-06-26 11:10:48'),
(2, 'Hamburguesa Chica', 'img/productos/mcdionisio/hamburguesa-chica.png', 'Hamburguesa de tamanho medio con queso, cebolla y salsa barbacoa', 1, 1, 11, '10000.00', 'activo', 0, '2015-06-30 13:24:40', 2147483647, '2015-06-30 13:24:40'),
(3, 'Hamburguesa Doble Carne', 'img/productos/mcdionisio/hamburguesa-doble-carne.jpg', 'Hamburguesa con dos carnes de primera con mucho queso chedar y verduras frescas.', 1, 1, 11, '18000.00', 'activo', 0, '2015-06-30 13:24:40', 2147483647, '2015-06-30 13:24:40'),
(4, 'McMenu', 'img/productos/mcdonalds/mcmenu.png', 'El McMenú® contiene...\r\n\r\n- Un sándwich a elegir*\r\n\r\n- Patatas fritas medianas, patatas Deluxe o ensalada.\r\n\r\n- Gaseosa', 1, 2, 12, '25000.00', 'activo', 0, '2015-07-03 09:35:41', 2147483647, '2015-07-03 09:35:41'),
(5, 'Coca Cola', 'img/productos/mcdonalds/cocacola.png', 'Una Coca-Cola bien fría nos hace disfrutar de cada instante de nuestras vidas de una forma especial.', 8, 3, 12, '5000.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(6, 'Fanta', 'img/productos/mcdonalds/fanta.png', 'Porque a McDonald''s vienes a comer pero también a divertirte, qué mejor que asegurar tu diversión con una Fanta.', 8, 3, 12, '5000.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(7, 'Coca Cola sin Cafeina', 'img/productos/mcdonalds/cocacolacaf.png', 'Por su sabor único y su carácter refrescante y auténtico, Coca-Cola añade magia a cada momento, sobre todo cuando nos es', 8, 3, 12, '6000.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(8, 'Lipton', 'img/productos/mcdonalds/lipton.png', ' El refresco de té que estabas esperando\r\n\r\nPrueba el té frío al limón ¡toda una experiencia para tus sentidos!', 8, 3, 12, '6000.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(9, 'Pizza Queso', 'img/productos/mcdionisio/pizza-queso.png', 'Pizza con muchisimo queso para los amantes de la buena pizza', 3, 4, 11, '0.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(10, 'Pizza Calabresa', 'img/productos/mcdionisio/pizza-calabresa.jpg', 'Pizza de calabresa como las verdaderas pizzas italianas cocinada a la piedra.', 3, 4, 11, '0.00', 'activo', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_extras`
--

CREATE TABLE IF NOT EXISTS `productos_extras` (
`codigo` int(11) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `empresa_codigo` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_extras`
--

INSERT INTO `productos_extras` (`codigo`, `nombres`, `empresa_codigo`, `estado`) VALUES
(1, 'Doble carne', 11, 'activo'),
(2, 'Queso Extra', 11, 'activo'),
(3, 'Queso chedar', 11, 'activo'),
(4, 'Queso doble', 12, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_sub_extras`
--

CREATE TABLE IF NOT EXISTS `producto_sub_extras` (
`codigo` int(11) NOT NULL,
  `pextra_codigo` int(11) NOT NULL,
  `subcategoria_codigo` int(11) NOT NULL,
  `pespecialidad_codigo` int(11) NOT NULL,
  `precio_extra` decimal(15,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_sub_extras`
--

INSERT INTO `producto_sub_extras` (`codigo`, `pextra_codigo`, `subcategoria_codigo`, `pespecialidad_codigo`, `precio_extra`) VALUES
(1, 1, 1, 3, '5000.00'),
(8, 2, 1, 3, '5000.00'),
(9, 3, 2, 1, '8000.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones`
--

CREATE TABLE IF NOT EXISTS `promociones` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `descripcion` varchar(120) NOT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `precio_promocional` decimal(15,2) NOT NULL,
  `cantidad_items` int(11) NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_vencimiento` datetime DEFAULT NULL,
  `persona_empresa_codigo` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `usuario_registro` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `usuario_ultmodif` int(11) DEFAULT NULL,
  `fecha_ultmodif` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Deposito de datos que contendra registros de promociones';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promociones_detalles`
--

CREATE TABLE IF NOT EXISTS `promociones_detalles` (
`codigo` int(11) NOT NULL,
  `promocion_codigo` int(11) NOT NULL,
  `producto_codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategorias`
--

CREATE TABLE IF NOT EXISTS `subcategorias` (
`codigo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `categoria_codigo` int(11) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `empresa_codigo` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `subcategorias`
--

INSERT INTO `subcategorias` (`codigo`, `nombre`, `categoria_codigo`, `estado`, `empresa_codigo`) VALUES
(1, 'Hamburguesas', 1, '', 11),
(2, 'Hamburguesas y combos', 1, '', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`codigo` int(11) NOT NULL,
  `roles` tinyint(1) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(16) NOT NULL,
  `persona_empresa_codigo` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `remember_token` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de usuarios';

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`codigo`, `roles`, `email`, `password`, `name`, `persona_empresa_codigo`, `estado`, `fecha_registro`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 0, 'mark@gmail.com', '$2y$10$W6d6j.WHAuaJonoMHqmffOuAVFopIVIBPKch2A.CEZ5GObqlz0x/e', 'mark', 11, '', '0000-00-00 00:00:00', '7oHyVFdml6g9wjc8h83xdFeNCzwnZzXHJ6mFNsyN7tE6UIJnJ8on1rbcayeK', '2015-08-20 14:32:21', '0000-00-00 00:00:00', NULL),
(6, 0, 'mauri@hotmail.com', '$2y$10$AIqvCbaeh0U.LgZJHyKaFOg7UapJrXpx4SzlADBNAHDLwtJXnwkca', 'mauri', 12, '', '0000-00-00 00:00:00', 'vpEUI1STWOF7jLgEvrSI5XoRjeHSA7n3uyClBPcLojeJu2U0LekRWOaSwMF5', '2015-08-07 17:44:29', '0000-00-00 00:00:00', NULL),
(8, 0, 'mauri2@hotmail.com', '$2y$10$1vAerkoFwsXhUmhcwWwL4.i9sx2cojCRro/Smee5ZMPGmQwycoO6G', 'mauri2', 12, '', '0000-00-00 00:00:00', '', '2015-08-07 17:44:29', '0000-00-00 00:00:00', NULL),
(9, 1, 'jessi@hotmail.com', '$2y$10$lcwMp7fZD8SkkzFDNdJVrezimkszCli1bDBvuGyR3.H6HYbDLDqtW', 'mark', 12, '', '0000-00-00 00:00:00', 'JtNquX1CfqYkYs9mYIQP5uExo0rqpALkcD4u0pZgY128XuW0B5hBvbQ9y008', '2015-08-20 14:32:47', '0000-00-00 00:00:00', NULL),
(10, 1, 'juan@hotmail.com', '$2y$10$Pp1FybvKYEXyhgZkuKjj9ONoeBx7FWg0vkd67H1sRKs1UjgOYvTy2', 'juan', 12, '', '0000-00-00 00:00:00', '', '2015-08-07 17:44:29', '0000-00-00 00:00:00', NULL),
(11, 1, 'rodri@hotmail.com', '$2y$10$eGTk0j3CX/Rle5ROIima9ODQAL.hMf0nYqLzsNhnDcLdLv0P/v1.W', 'rodrigo', 12, '', '0000-00-00 00:00:00', '', '2015-08-07 17:44:29', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codigo` int(11) NOT NULL,
  `login` varchar(60) NOT NULL,
  `clave` varchar(16) NOT NULL,
  `repita_clave` varchar(16) NOT NULL,
  `persona_empresa_codigo` int(11) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `fecha_registro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Deposito de Datos que contendra los registros de usuarios';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_helado_config`
--
ALTER TABLE `cat_helado_config`
 ADD PRIMARY KEY (`codigo`), ADD KEY `cat_helado_tipos_cat_helado_config_fk` (`cat_helado_tipo_codigo`), ADD KEY `cat_helado_tamanho_cat_helado_config_fk` (`cat_helado_tamanho_codigo`), ADD KEY `productos_cat_helado_config_fk` (`producto_codigo`);

--
-- Indices de la tabla `cat_helado_sabores`
--
ALTER TABLE `cat_helado_sabores`
 ADD PRIMARY KEY (`codigo`), ADD KEY `subcategorias_cat_helado_sabores_fk` (`subcategoria_codigo`);

--
-- Indices de la tabla `cat_helado_tamanho`
--
ALTER TABLE `cat_helado_tamanho`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_helado_tipos`
--
ALTER TABLE `cat_helado_tipos`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_pizza_config`
--
ALTER TABLE `cat_pizza_config`
 ADD PRIMARY KEY (`codigo`), ADD KEY `cat_pizza_especialidades_cat_pizza_config_fk` (`cat_pizza_esp_codigo`), ADD KEY `productos_cat_pizza_config_fk` (`producto_codigo`);

--
-- Indices de la tabla `cat_pizza_detalles`
--
ALTER TABLE `cat_pizza_detalles`
 ADD PRIMARY KEY (`codigo`), ADD KEY `cat_pizza_tipo_masa_cat_pizza_detalles_fk` (`cat_pizza_masa_codigo`), ADD KEY `cat_pizza_tamanhos_cat_pizza_detalles_fk` (`cat_pizza_tamanho_codigo`), ADD KEY `cat_pizza_especialidades_cat_pizza_detalles_fk` (`cat_pizza_esp_codigo`);

--
-- Indices de la tabla `cat_pizza_especialidades`
--
ALTER TABLE `cat_pizza_especialidades`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_pizza_extras`
--
ALTER TABLE `cat_pizza_extras`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_pizza_tamanhos`
--
ALTER TABLE `cat_pizza_tamanhos`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cat_pizza_tipo_masa`
--
ALTER TABLE `cat_pizza_tipo_masa`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
 ADD PRIMARY KEY (`codigo`), ADD KEY `monedas_cotizaciones_fk` (`moneda_codigo`), ADD KEY `persona_empresas_cotizaciones_fk` (`persona_empresa_codigo`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_clientes_favoritos_fk` (`favoritos_persona_cliente_codigo`), ADD KEY `productos_favoritos_fk` (`favoritos_producto_codigo`), ADD KEY `persona_empresas_favoritos_fk` (`favoritos_empresa_codigo`);

--
-- Indices de la tabla `monedas`
--
ALTER TABLE `monedas`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `paises`
--
ALTER TABLE `paises`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_clientes_pedidos_fk` (`persona_cliente_codigo`);

--
-- Indices de la tabla `pedidos_detalles`
--
ALTER TABLE `pedidos_detalles`
 ADD PRIMARY KEY (`codigo`), ADD KEY `pedidos_pedidos_detalles_fk` (`pedido_codigo`), ADD KEY `productos_pedidos_detalles_fk` (`producto_codigo`);

--
-- Indices de la tabla `pedidos_detalle_extras`
--
ALTER TABLE `pedidos_detalle_extras`
 ADD PRIMARY KEY (`codigo`), ADD KEY `pedidos_detalles_pedidos_detalle_extras_fk` (`pdetalle_codigo`), ADD KEY `producto_sub_extras_pedidos_detalle_extras_fk` (`producto_subextra_codigo`);

--
-- Indices de la tabla `persona_clientes`
--
ALTER TABLE `persona_clientes`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `persona_cliente_direcciones`
--
ALTER TABLE `persona_cliente_direcciones`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_clientes_persona_cliente_direcciones_fk` (`persona_cliente_codigo`);

--
-- Indices de la tabla `persona_empresas`
--
ALTER TABLE `persona_empresas`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `persona_empresas_categoria`
--
ALTER TABLE `persona_empresas_categoria`
 ADD PRIMARY KEY (`codigo`), ADD KEY `categorias_persona_empresas_categoria_fk` (`categoria_codigo`), ADD KEY `persona_empresas_persona_empresas_categoria_fk` (`empresa_codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
 ADD PRIMARY KEY (`codigo`), ADD KEY `categorias_productos_fk` (`categoria_codigo`), ADD KEY `persona_empresas_productos_fk` (`empresa_codigo`), ADD FULLTEXT KEY `denominacion` (`denominacion`);

--
-- Indices de la tabla `productos_extras`
--
ALTER TABLE `productos_extras`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `producto_sub_extras`
--
ALTER TABLE `producto_sub_extras`
 ADD PRIMARY KEY (`codigo`), ADD KEY `subcategorias_producto_sub_extras_fk` (`subcategoria_codigo`), ADD KEY `cat_pizza_especialidades_producto_sub_extras_fk` (`pespecialidad_codigo`), ADD KEY `productos_extras_producto_sub_extras_fk` (`pextra_codigo`);

--
-- Indices de la tabla `promociones`
--
ALTER TABLE `promociones`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_empresas_promociones_fk` (`persona_empresa_codigo`);

--
-- Indices de la tabla `promociones_detalles`
--
ALTER TABLE `promociones_detalles`
 ADD PRIMARY KEY (`codigo`), ADD KEY `promociones_promociones_detalles_fk` (`promocion_codigo`), ADD KEY `productos_promociones_detalles_fk` (`producto_codigo`);

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
-- Indices de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
 ADD PRIMARY KEY (`codigo`), ADD KEY `categorias_subcategorias_fk` (`categoria_codigo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_empresas_usuarios_fk` (`persona_empresa_codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`codigo`), ADD KEY `persona_empresas_usuarios_fk` (`persona_empresa_codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cat_helado_config`
--
ALTER TABLE `cat_helado_config`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_helado_sabores`
--
ALTER TABLE `cat_helado_sabores`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_helado_tamanho`
--
ALTER TABLE `cat_helado_tamanho`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_helado_tipos`
--
ALTER TABLE `cat_helado_tipos`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_config`
--
ALTER TABLE `cat_pizza_config`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_detalles`
--
ALTER TABLE `cat_pizza_detalles`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_especialidades`
--
ALTER TABLE `cat_pizza_especialidades`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_extras`
--
ALTER TABLE `cat_pizza_extras`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_tamanhos`
--
ALTER TABLE `cat_pizza_tamanhos`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `cat_pizza_tipo_masa`
--
ALTER TABLE `cat_pizza_tipo_masa`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `monedas`
--
ALTER TABLE `monedas`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `paises`
--
ALTER TABLE `paises`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT de la tabla `pedidos_detalles`
--
ALTER TABLE `pedidos_detalles`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT de la tabla `pedidos_detalle_extras`
--
ALTER TABLE `pedidos_detalle_extras`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT de la tabla `persona_clientes`
--
ALTER TABLE `persona_clientes`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `persona_cliente_direcciones`
--
ALTER TABLE `persona_cliente_direcciones`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `persona_empresas`
--
ALTER TABLE `persona_empresas`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `persona_empresas_categoria`
--
ALTER TABLE `persona_empresas_categoria`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `productos_extras`
--
ALTER TABLE `productos_extras`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `producto_sub_extras`
--
ALTER TABLE `producto_sub_extras`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `promociones`
--
ALTER TABLE `promociones`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `promociones_detalles`
--
ALTER TABLE `promociones_detalles`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
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
-- AUTO_INCREMENT de la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cat_helado_config`
--
ALTER TABLE `cat_helado_config`
ADD CONSTRAINT `cat_helado_tamanho_cat_helado_config_fk` FOREIGN KEY (`cat_helado_tamanho_codigo`) REFERENCES `cat_helado_tamanho` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `cat_helado_tipos_cat_helado_config_fk` FOREIGN KEY (`cat_helado_tipo_codigo`) REFERENCES `cat_helado_tipos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `productos_cat_helado_config_fk` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cat_helado_sabores`
--
ALTER TABLE `cat_helado_sabores`
ADD CONSTRAINT `subcategorias_cat_helado_sabores_fk` FOREIGN KEY (`subcategoria_codigo`) REFERENCES `subcategorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cat_pizza_config`
--
ALTER TABLE `cat_pizza_config`
ADD CONSTRAINT `cat_pizza_especialidades_cat_pizza_config_fk` FOREIGN KEY (`cat_pizza_esp_codigo`) REFERENCES `cat_pizza_especialidades` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `productos_cat_pizza_config_fk` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cat_pizza_detalles`
--
ALTER TABLE `cat_pizza_detalles`
ADD CONSTRAINT `cat_pizza_especialidades_cat_pizza_detalles_fk` FOREIGN KEY (`cat_pizza_esp_codigo`) REFERENCES `cat_pizza_especialidades` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `cat_pizza_tamanhos_cat_pizza_detalles_fk` FOREIGN KEY (`cat_pizza_tamanho_codigo`) REFERENCES `cat_pizza_tamanhos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `cat_pizza_tipo_masa_cat_pizza_detalles_fk` FOREIGN KEY (`cat_pizza_masa_codigo`) REFERENCES `cat_pizza_tipo_masa` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
ADD CONSTRAINT `monedas_cotizaciones_fk` FOREIGN KEY (`moneda_codigo`) REFERENCES `monedas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `persona_empresas_cotizaciones_fk` FOREIGN KEY (`persona_empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
ADD CONSTRAINT `persona_clientes_favoritos_fk` FOREIGN KEY (`favoritos_persona_cliente_codigo`) REFERENCES `persona_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `persona_empresas_favoritos_fk` FOREIGN KEY (`favoritos_empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `productos_favoritos_fk` FOREIGN KEY (`favoritos_producto_codigo`) REFERENCES `productos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
ADD CONSTRAINT `persona_clientes_pedidos_fk` FOREIGN KEY (`persona_cliente_codigo`) REFERENCES `persona_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos_detalles`
--
ALTER TABLE `pedidos_detalles`
ADD CONSTRAINT `pedidos_pedidos_detalles_fk` FOREIGN KEY (`pedido_codigo`) REFERENCES `pedidos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `productos_pedidos_detalles_fk` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos_detalle_extras`
--
ALTER TABLE `pedidos_detalle_extras`
ADD CONSTRAINT `pedidos_detalles_pedidos_detalle_extras_fk` FOREIGN KEY (`pdetalle_codigo`) REFERENCES `pedidos_detalles` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `producto_sub_extras_pedidos_detalle_extras_fk` FOREIGN KEY (`producto_subextra_codigo`) REFERENCES `producto_sub_extras` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_cliente_direcciones`
--
ALTER TABLE `persona_cliente_direcciones`
ADD CONSTRAINT `persona_clientes_persona_cliente_direcciones_fk` FOREIGN KEY (`persona_cliente_codigo`) REFERENCES `persona_clientes` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `persona_empresas_categoria`
--
ALTER TABLE `persona_empresas_categoria`
ADD CONSTRAINT `categorias_persona_empresas_categoria_fk` FOREIGN KEY (`categoria_codigo`) REFERENCES `categorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `persona_empresas_persona_empresas_categoria_fk` FOREIGN KEY (`empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
ADD CONSTRAINT `categorias_productos_fk` FOREIGN KEY (`categoria_codigo`) REFERENCES `categorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `persona_empresas_productos_fk` FOREIGN KEY (`empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_sub_extras`
--
ALTER TABLE `producto_sub_extras`
ADD CONSTRAINT `cat_pizza_especialidades_producto_sub_extras_fk` FOREIGN KEY (`pespecialidad_codigo`) REFERENCES `cat_pizza_especialidades` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `productos_extras_producto_sub_extras_fk` FOREIGN KEY (`pextra_codigo`) REFERENCES `productos_extras` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `subcategorias_producto_sub_extras_fk` FOREIGN KEY (`subcategoria_codigo`) REFERENCES `subcategorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promociones`
--
ALTER TABLE `promociones`
ADD CONSTRAINT `persona_empresas_promociones_fk` FOREIGN KEY (`persona_empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `promociones_detalles`
--
ALTER TABLE `promociones_detalles`
ADD CONSTRAINT `productos_promociones_detalles_fk` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `promociones_promociones_detalles_fk` FOREIGN KEY (`promocion_codigo`) REFERENCES `promociones` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

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

--
-- Filtros para la tabla `subcategorias`
--
ALTER TABLE `subcategorias`
ADD CONSTRAINT `categorias_subcategorias_fk` FOREIGN KEY (`categoria_codigo`) REFERENCES `categorias` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
ADD CONSTRAINT `persona_empresas_usuarios_fk` FOREIGN KEY (`persona_empresa_codigo`) REFERENCES `persona_empresas` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
