-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-08-2023 a las 21:15:17
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `universidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

DROP TABLE IF EXISTS `alumnos`;
CREATE TABLE IF NOT EXISTS `alumnos` (
  `id_alumno` int NOT NULL,
  `dni` int DEFAULT NULL,
  `clase_inscrito` int DEFAULT NULL,
  PRIMARY KEY (`id_alumno`),
  KEY `clase_inscrito` (`clase_inscrito`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `dni`, `clase_inscrito`) VALUES
(3, 123456789, 1),
(29, 78946, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

DROP TABLE IF EXISTS `clases`;
CREATE TABLE IF NOT EXISTS `clases` (
  `id_clase` int NOT NULL AUTO_INCREMENT,
  `nombre_clase` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_clase`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`id_clase`, `nombre_clase`) VALUES
(1, 'Ninguna'),
(3, 'Ingles'),
(4, 'Fisica'),
(5, 'Quimica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

DROP TABLE IF EXISTS `maestros`;
CREATE TABLE IF NOT EXISTS `maestros` (
  `id_maestro` int NOT NULL,
  `clase_asignada` int DEFAULT NULL,
  PRIMARY KEY (`id_maestro`),
  KEY `clase_asignada` (`clase_asignada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `clase_asignada`) VALUES
(2, 1),
(28, 1),
(30, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'admin'),
(2, 'maestro'),
(3, 'alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_info`
--

DROP TABLE IF EXISTS `usuarios_info`;
CREATE TABLE IF NOT EXISTS `usuarios_info` (
  `id_usuario` int DEFAULT NULL,
  `nombre` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellido` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_info`
--

INSERT INTO `usuarios_info` (`id_usuario`, `nombre`, `apellido`, `direccion`, `nacimiento`) VALUES
(1, 'Carlos', 'Cervantes', 'calle 10', '2000-09-27'),
(2, 'Yael', 'Rojas', 'calle 5', '1999-10-11'),
(3, 'Josue', 'Lopes', 'calle 25', '1998-01-25'),
(28, 'Mauricio', 'Mora', 'calle 648', NULL),
(29, 'Aram', 'Rojas', 'calle 49', NULL),
(30, 'Raul', 'Jimenez', 'calle78', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_login`
--

DROP TABLE IF EXISTS `usuarios_login`;
CREATE TABLE IF NOT EXISTS `usuarios_login` (
  `id_user_login` int NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contra` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contraHash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rol` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  PRIMARY KEY (`id_user_login`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios_login`
--

INSERT INTO `usuarios_login` (`id_user_login`, `correo`, `contra`, `contraHash`, `rol`, `status`) VALUES
(1, 'admin@admin', 'admin', NULL, 1, 1),
(2, 'maestro@maestro', 'maestro', NULL, 2, 1),
(3, 'alumno@alumno', 'alumno', NULL, 3, 1),
(28, 'mauricio@maestro.edu', 'maestro', NULL, 2, 1),
(29, 'aram@alumno.edu', 'alumno', NULL, 3, 1),
(30, 'raul@maestro.edu', 'maestro', NULL, 2, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `usuarios_login` (`id_user_login`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`clase_inscrito`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_maestro`) REFERENCES `usuarios_info` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maestros_ibfk_2` FOREIGN KEY (`clase_asignada`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_info`
--
ALTER TABLE `usuarios_info`
  ADD CONSTRAINT `usuarios_info_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios_login` (`id_user_login`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios_login`
--
ALTER TABLE `usuarios_login`
  ADD CONSTRAINT `usuarios_login_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
