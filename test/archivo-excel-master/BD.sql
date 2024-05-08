-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-04-2022 a las 05:55:48
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `excel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombres` varchar(250) NOT NULL,
  `email` varchar(250) DEFAULT NULL,
  `asunto` varchar(220) DEFAULT NULL,
  `mensajes` text DEFAULT NULL,
  `fcreacion` datetime DEFAULT NULL,
  `fmodificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombres`, `email`, `asunto`, `mensajes`, `fcreacion`, `fmodificacion`) VALUES
(1, 'Diego Usuario', 'dusuario@cweb.com', 'Primer Trabajo', 'El registro del resultado 01', '2022-03-24 21:03:00', NULL),
(2, 'Pedro Usuario', 'pusuario@cweb.com', 'Segundo Trabajo', 'Mi resultado 02', '2022-03-24 21:20:07', NULL),
(3, 'Himelda Barrios', 'hbarrios@cweb.com', 'Versión Tres', 'Mi resultado 03', '2022-03-24 21:37:52', NULL),
(4, 'Juana Galán', 'jgalan@cweb.com', 'Movimiento Efectuado', 'Mi resultado 04 del parcial', '2022-03-24 12:24:27', NULL),
(5, 'Pedro María', 'pmaría@web.com', 'Envío de Procesos', 'Mi resultado 05 del parcial', '2018-04-24 12:26:35', NULL),
(6, 'Pedro Cliente', 'pecliente@cweb.com', 'Trabajo Ejecutado', 'Esta es la primera versión del trabajo requerido', '2022-04-20 21:49:27', NULL),
(7, 'Radamel Ventajo', 'rventajo@cweb.com', 'Firme Versión', 'Versionamiento Estudio Prevención', '2022-04-20 21:58:16', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;