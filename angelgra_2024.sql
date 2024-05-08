-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-05-2024 a las 15:15:42
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `angelgra_2024`
--
CREATE DATABASE IF NOT EXISTS `angelgra_2024` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `angelgra_2024`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contribuyente`
--

DROP TABLE IF EXISTS `contribuyente`;
CREATE TABLE IF NOT EXISTS `contribuyente` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `contribuyente_numRenta` int UNSIGNED DEFAULT NULL,
  `contribuyente_dni` varchar(9) NOT NULL,
  `contribuyente_fechaAlta` datetime DEFAULT NULL,
  `contribuyente_vigencia` datetime DEFAULT NULL,
  `contribuyente_fechaInicio` datetime DEFAULT NULL,
  `contribuyente_nombre` varchar(30) DEFAULT NULL,
  `contribuyente_apellido1` varchar(30) DEFAULT NULL,
  `contribuyente_apellido2` varchar(30) DEFAULT NULL,
  `contribuyente_telefono` int DEFAULT NULL,
  `contribuyente_movil` int DEFAULT NULL,
  `contribuyente_email` varchar(30) DEFAULT NULL,
  `contribuyente_numCuenta` varchar(28) DEFAULT NULL,
  `contribuyente_numRef` varchar(30) DEFAULT NULL,
  `enviado` tinyint DEFAULT NULL,
  `envioFecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `contribuyente_numRenta` (`contribuyente_numRenta`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `contribuyente`
--

INSERT INTO `contribuyente` (`id`, `contribuyente_numRenta`, `contribuyente_dni`, `contribuyente_fechaAlta`, `contribuyente_vigencia`, `contribuyente_fechaInicio`, `contribuyente_nombre`, `contribuyente_apellido1`, `contribuyente_apellido2`, `contribuyente_telefono`, `contribuyente_movil`, `contribuyente_email`, `contribuyente_numCuenta`, `contribuyente_numRef`, `enviado`, `envioFecha`) VALUES
(1, 1, '1', '2024-02-21 11:56:11', '2024-02-21 11:56:11', '2024-02-26 00:00:00', 'Ricki - 2024/02/21 11:56:11 11', 'Apellido', 'ReApellido', 962480202, 666999666, 'garbancito.tadeo-jones@pequeño', 'ES56 00000', 'REF #0000', 1, '2024-02-29 12:15:56'),
(2, 2, '2', '2024-02-21 11:59:20', '2024-02-21 11:59:20', '2024-02-26 00:00:00', 'Ricki - 2024/02/21 11:59:20 11', 'Apellido', 'ReApellido', 962480202, 666999666, 'garbancito.tadeo-jones@pequeño', 'ES56 00000', 'REF #0000', 1, '2024-02-29 12:15:56'),
(3, 3, '3', '2024-02-21 11:59:54', '2024-02-21 11:59:54', '0000-00-00 00:00:00', 'Ricki - 2024/02/21 11:59:54 11', 'Apellido', 'ReApellido', 962480202, 666999666, 'garbancito.tadeo-jones@pequeño', 'ES56 00000', 'REF #0000', 1, '2024-02-29 12:15:56'),
(13, 696900, '6969001', '2024-02-26 20:28:41', NULL, '2024-02-26 00:00:00', '', '', '', 0, 0, '', '', '', 0, '2024-02-21 12:12:13'),
(14, 5, '51', '2024-02-26 20:51:39', NULL, '2024-02-26 00:00:00', '', '', '', 0, 0, '', '', '', 1, '2024-02-29 12:15:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conyuge`
--

DROP TABLE IF EXISTS `conyuge`;
CREATE TABLE IF NOT EXISTS `conyuge` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `conyuge_pareja_de` tinyint UNSIGNED NOT NULL,
  `conyuge_dni` varchar(9) NOT NULL,
  `conyuge_fechaAlta` datetime DEFAULT NULL,
  `conyuge_vigencia` datetime DEFAULT NULL,
  `conyuge_fechaInicio` datetime DEFAULT NULL,
  `conyuge_nombre` varchar(30) DEFAULT NULL,
  `conyuge_apellido1` varchar(30) DEFAULT NULL,
  `conyuge_apellido2` varchar(30) DEFAULT NULL,
  `conyuge_telefono` int DEFAULT NULL,
  `conyuge_movil` int DEFAULT NULL,
  `conyuge_email` varchar(30) DEFAULT NULL,
  `conyuge_csv` varchar(250) DEFAULT NULL,
  `conyuge_numCuenta` varchar(28) DEFAULT NULL,
  `conyuge_numRef` varchar(30) DEFAULT NULL,
  `conyuge_precio` float(10,2) DEFAULT NULL,
  `conyuge_metodoPago` varchar(50) DEFAULT NULL,
  `conyuge_observaciones` text,
  PRIMARY KEY (`id`),
  KEY `FK_Conyugue_conyuge_pareja_de` (`conyuge_pareja_de`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `conyuge`
--

INSERT INTO `conyuge` (`id`, `conyuge_pareja_de`, `conyuge_dni`, `conyuge_fechaAlta`, `conyuge_vigencia`, `conyuge_fechaInicio`, `conyuge_nombre`, `conyuge_apellido1`, `conyuge_apellido2`, `conyuge_telefono`, `conyuge_movil`, `conyuge_email`, `conyuge_csv`, `conyuge_numCuenta`, `conyuge_numRef`, `conyuge_precio`, `conyuge_metodoPago`, `conyuge_observaciones`) VALUES
(1, 1, '1', '2024-02-21 11:56:11', '2024-02-21 11:56:11', '2024-02-21 11:56:11', 'Lolipop - 2024/02/21 11:56:11 ', 'Apellido', 'ReApellido', 962480111, 666222444, 'garbancita.tadeo-jones@pequeña', '1234567890', 'ES56 9999', 'REF #9999', 22.00, 'Efectivo', ' - - '),
(2, 2, '2', '2024-02-21 11:59:20', '2024-02-21 11:59:20', '2024-02-21 11:59:20', 'Lolipop - 2024/02/21 11:59:20 ', 'Apellido', 'ReApellido', 962480111, 666222444, 'garbancita.tadeo-jones@pequeña', '1234567890', 'ES56 9999', 'REF #9999', 22.00, 'Efectivo', ' - - '),
(7, 13, '6969002', '2024-02-26 20:28:41', NULL, '2024-02-26 00:00:00', '', '', '', 0, 0, '', '', '', '', 0.00, 'Facturado', ''),
(8, 14, '52', '2024-02-26 20:51:39', NULL, '2024-02-26 00:00:00', '', '', '', 0, 0, '', '', '', '', 0.00, 'Transferencia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombre_de_tu_tabla`
--

DROP TABLE IF EXISTS `nombre_de_tu_tabla`;
CREATE TABLE IF NOT EXISTS `nombre_de_tu_tabla` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `columna1` varchar(30) NOT NULL,
  `columna2` int NOT NULL,
  `columna3` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `nombre_de_tu_tabla`
--

INSERT INTO `nombre_de_tu_tabla` (`id`, `columna1`, `columna2`, `columna3`) VALUES
(1, 'Valor 1', 2024, '2024-01-27 00:58:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuario` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `fechaRegistro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaActualizacion` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `contrasena`, `fechaRegistro`, `fechaActualizacion`) VALUES
(2, 'a', '$2y$10$qMte14yBwU3qwoD5Y2w6SuGbZo.ZpAVocwu6CMpAYWSCzVrXO136W', '2024-02-20 11:36:22', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `conyuge`
--
ALTER TABLE `conyuge`
  ADD CONSTRAINT `FK_Conyugue_conyuge_pareja_de` FOREIGN KEY (`conyuge_pareja_de`) REFERENCES `contribuyente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
