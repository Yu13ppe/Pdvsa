-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-07-2023 a las 20:37:12
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `actividad4pw`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medicion`
--

CREATE TABLE `medicion` (
  `id_medicion` int(11) NOT NULL,
  `psi` int(100) DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp(),
  `pozo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `medicion`
--

INSERT INTO `medicion` (`id_medicion`, `psi`, `fecha`, `pozo_id`) VALUES
(10, 14, '2023-07-01 11:28:11', 3),
(12, 33, '2023-07-01 11:38:01', 4),
(14, 198, '2023-07-02 13:42:13', 5),
(15, 300, '2023-07-02 00:46:10', 4),
(16, 400, '2023-07-02 01:23:50', 4),
(17, 10, '2023-07-02 01:23:53', 4),
(18, 22, '2023-07-02 01:23:56', 4),
(19, 800, '2023-07-02 01:23:59', 4),
(20, 600, '2023-07-04 02:19:02', 6),
(21, 800, '2023-07-04 02:19:07', 6),
(22, 200, '2023-07-05 09:46:05', 7),
(23, 15, '2023-07-05 09:51:39', 8),
(24, 100, '2023-07-05 09:51:56', 6),
(25, 100, '2023-07-06 00:31:12', 8),
(26, 500, '2023-07-06 00:31:18', 7),
(27, 200, '2023-07-06 00:31:28', 6),
(28, 300, '2023-07-06 00:31:34', 4),
(29, 500, '2023-07-06 00:54:06', 6),
(30, 600, '2023-07-06 00:55:48', 6),
(31, 600, '2023-07-06 00:58:39', 7),
(32, 300, '2023-07-06 00:59:03', 8),
(33, 500, '2023-07-06 10:15:58', 8),
(34, 800, '2023-07-06 10:16:04', 7),
(35, 550, '2023-07-06 10:16:15', 6),
(36, 50, '2023-07-06 10:19:39', 4),
(37, 850, '2023-07-06 11:00:06', 7),
(38, 550, '2023-07-06 11:00:15', 8),
(39, 700, '2023-07-06 12:43:36', 7),
(40, 250, '2023-07-06 12:43:55', 8),
(41, 200, '2023-07-06 13:09:20', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pozo`
--

CREATE TABLE `pozo` (
  `id_pozo` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pozo`
--

INSERT INTO `pozo` (`id_pozo`, `nombre`) VALUES
(4, 'Pozo Zulia'),
(6, 'Pozo Falcon'),
(7, 'Pozo Lara'),
(8, 'Pozo Sucre');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `medicion`
--
ALTER TABLE `medicion`
  ADD PRIMARY KEY (`id_medicion`);

--
-- Indices de la tabla `pozo`
--
ALTER TABLE `pozo`
  ADD PRIMARY KEY (`id_pozo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `medicion`
--
ALTER TABLE `medicion`
  MODIFY `id_medicion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `pozo`
--
ALTER TABLE `pozo`
  MODIFY `id_pozo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
