-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-09-2023 a las 16:20:17
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
-- Base de datos: `again_p3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `id_class` int NOT NULL AUTO_INCREMENT,
  `name_class` varchar(250) NOT NULL,
  PRIMARY KEY (`id_class`),
  UNIQUE KEY `UNIQUE_name_class` (`name_class`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `classes`
--

INSERT INTO `classes` (`id_class`, `name_class`) VALUES
(14, 'Cinética Química'),
(13, 'Diseño de Reactores'),
(6, 'Ingeniería de Control'),
(3, 'Ingeniería de Materiales'),
(8, 'Ingeniería de Procesos'),
(5, 'Mecánica de Fluidos'),
(7, 'Operaciones Unitarias'),
(9, 'Química Ambiental'),
(1, 'Química Analítica'),
(2, 'Química Orgánica'),
(16, 'Simulación de Procesos Químicos'),
(10, 'Termodinámica Aplicada'),
(15, 'Termodinámica Química'),
(11, 'Transporte de Fluidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info`
--

DROP TABLE IF EXISTS `info`;
CREATE TABLE IF NOT EXISTS `info` (
  `id_info` int NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `teacher_class` int DEFAULT NULL,
  `state` tinyint(1) NOT NULL,
  `DNI` int DEFAULT NULL,
  `id_rol` int NOT NULL,
  PRIMARY KEY (`id_info`),
  UNIQUE KEY `UNIQUE_email` (`email`) USING BTREE,
  UNIQUE KEY `UNIQUE_DNI` (`DNI`) USING BTREE,
  KEY `FK_info_id_rol` (`id_rol`),
  KEY `FK_teacher_class` (`teacher_class`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `info`
--

INSERT INTO `info` (`id_info`, `name`, `lastname`, `email`, `password`, `address`, `birthday`, `teacher_class`, `state`, `DNI`, `id_rol`) VALUES
(1, 'Bryan', 'Barros', 'admin@gmail.com', '123', 'Cevillar', '0000-00-00', NULL, 1, 72375285, 1),
(2, 'Kevin', 'Barros', 'profe@gmail.com', '123', 'Prado', '2013-04-10', 1, 1, 79999985, 2),
(3, 'Harold', 'Cuberos', 'alumno01@gmail.com', '111', 'Ciudadela', '2023-08-01', NULL, 1, 9998965, 3),
(4, 'Windys', 'Chavez', 'alumno02@gmail.com', '123', 'Paraiso', '2023-07-19', NULL, 1, 7237117, 3),
(5, 'Richard', 'Cuberos', 'alumno03@gmail.com', '123', 'Porvenir', '2013-05-02', NULL, 1, 7288285, 3),
(9, 'Daniela', 'Alvarez', 'alumno04@gmail.com', '', 'Recreo', '1999-06-16', NULL, 1, NULL, 2),
(11, 'Rafael', 'Barros', 'profesor02@gmail.com', '', 'Carmen', '0000-00-00', 2, 1, NULL, 2),
(30, 'Esther', 'Del Duca', 'profesor03@gmail.com', '123', 'Esmeralda', '0000-00-00', NULL, 1, NULL, 2),
(31, 'Yajaira', 'Cuberos', 'Yajaira@gmail.com', '', 'Buena esperanza', '0000-00-00', 15, 1, NULL, 2),
(32, 'Laura', 'Lechuga', 'Laura@gmail.com', 'nuevo2', 'Los robles', '0000-00-00', NULL, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_classes`
--

DROP TABLE IF EXISTS `info_classes`;
CREATE TABLE IF NOT EXISTS `info_classes` (
  `id_info_fk` int NOT NULL,
  `id_class_fk` int NOT NULL,
  `grade` int DEFAULT NULL,
  `messages` varchar(255) DEFAULT NULL,
  KEY `FK_info` (`id_info_fk`),
  KEY `FK_class` (`id_class_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `info_classes`
--

INSERT INTO `info_classes` (`id_info_fk`, `id_class_fk`, `grade`, `messages`) VALUES
(5, 1, 50, NULL),
(3, 13, NULL, NULL),
(3, 2, NULL, NULL),
(3, 8, NULL, NULL),
(3, 9, NULL, NULL),
(3, 10, NULL, NULL),
(3, 11, NULL, NULL),
(3, 6, NULL, NULL),
(3, 5, NULL, NULL),
(3, 3, NULL, NULL),
(3, 1, NULL, 'Pendiente'),
(3, 14, NULL, NULL),
(4, 8, NULL, NULL),
(4, 9, NULL, NULL),
(4, 10, NULL, NULL),
(4, 11, NULL, NULL),
(4, 5, NULL, NULL),
(4, 3, NULL, NULL),
(4, 6, NULL, NULL),
(4, 14, NULL, NULL),
(4, 7, NULL, NULL),
(4, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(100) NOT NULL,
  PRIMARY KEY (`id_rol`),
  UNIQUE KEY `nombre_rol` (`nombre_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
(1, 'ADMIN'),
(3, 'ALUMNO'),
(2, 'MAESTRO');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `info`
--
ALTER TABLE `info`
  ADD CONSTRAINT `FK_info_id_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `FK_teacher_class` FOREIGN KEY (`teacher_class`) REFERENCES `classes` (`id_class`),
  ADD CONSTRAINT `FK_teacher_class_id_class` FOREIGN KEY (`teacher_class`) REFERENCES `classes` (`id_class`);

--
-- Filtros para la tabla `info_classes`
--
ALTER TABLE `info_classes`
  ADD CONSTRAINT `FK_class` FOREIGN KEY (`id_class_fk`) REFERENCES `classes` (`id_class`),
  ADD CONSTRAINT `FK_info` FOREIGN KEY (`id_info_fk`) REFERENCES `info` (`id_info`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
