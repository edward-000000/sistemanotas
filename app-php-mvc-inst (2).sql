-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-07-2024 a las 07:14:24
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app-php-mvc-inst`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Por hacer'),
(2, 'En proceso'),
(3, 'Terminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id_tarea` int(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `tarea` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `titulo`, `tarea`, `fecha`, `id`) VALUES
(2, 'inpresion', 'tengo que imprimir mañana', '2024-07-10 14:33:00', 0),
(3, 'comprar comida', 'Ir al supermercado', '2024-07-12 20:00:00', 0),
(4, 'estudiar', 'Estudiar para el examen', '2024-07-14 23:00:00', 0),
(5, 'limpieza', 'Limpiar la casa', '2024-07-11 14:00:00', 0),
(6, 'reunión', 'Reunión con el equipo', '2024-07-13 19:00:00', 0),
(7, 'proyecto', 'Avanzar en el proyecto', '2024-07-15 15:00:00', 0),
(8, 'ejercicio', 'Hacer ejercicio', '2024-07-16 12:00:00', 0),
(9, 'leer', 'Leer un libro', '2024-07-18 01:00:00', 0),
(10, 'cocinar', 'Preparar la cena', '2024-07-18 23:30:00', 0),
(11, 'meditar', 'Meditar por 30 minutos', '2024-07-19 11:00:00', 0),
(12, 'jardín', 'Regar las plantas', '2024-07-20 12:30:00', 0),
(13, 'escribir', 'Escribir en el diario', '2024-07-22 02:00:00', 0),
(14, 'película', 'Ver una película', '2024-07-23 00:00:00', 0),
(15, 'investigar', 'Investigar sobre un tema', '2024-07-23 19:00:00', 0),
(16, 'llamar', 'Llamar a un amigo', '2024-07-24 22:00:00', 0),
(17, 'finanzas', 'Revisar las finanzas', '2024-07-25 14:00:00', 0),
(18, 'reparación', 'Reparar la bicicleta', '2024-07-26 15:00:00', 0),
(19, 'organizar', 'Organizar el escritorio', '2024-07-27 20:30:00', 0),
(20, 'planificar', 'Planificar la semana', '2024-07-29 01:00:00', 0),
(21, 'descansar', 'Tomar un descanso', '2024-07-29 18:00:00', 0),
(22, 'tarea', 'hacer tarea', '2024-07-15 04:55:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `clave` varchar(100) DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `foto` blob DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_actualizacion` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `clave`, `id_cargo`, `foto`, `fecha_creacion`, `fecha_actualizacion`) VALUES
(6, 'Edward Rodrigo', 'Uriarte', 'edwa2', 'edwauriarte@gmail.com', '12345', 1, NULL, '2024-07-14 10:11:23', '2024-07-14 10:48:39'),
(7, 'John', 'Doe', 'jdoe', 'john.doe@example.com', '12345', 2, NULL, '2024-07-14 10:11:23', '2024-07-14 10:52:42'),
(8, 'Jane', 'Smith', 'jsmith', 'jane.smith@example.com', '12345', 2, NULL, '2024-07-14 10:11:23', '2024-07-14 10:51:47'),
(10, 'kab', 'bvbvbvb', 'ghghggh', 'hhd@fmnff.d', '12345', 2, NULL, '2024-07-14 10:11:23', '2024-07-14 10:51:47'),
(11, 'Alice', 'Wonderland', 'alicew', 'alice@wonderland.com', '12345', 2, NULL, '2024-07-14 10:11:23', '2024-07-14 10:50:28'),
(14, 'Dorothy', 'Gale', 'dgale', 'dorothy@oz.com', '12345', 2, NULL, '2024-07-14 10:11:23', '2024-07-14 10:51:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_cargo` (`id_cargo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id_tarea` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
