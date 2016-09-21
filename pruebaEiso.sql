-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-09-2016 a las 08:03:55
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pruebaEiso`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_by_user`
--

CREATE TABLE `sales_by_user` (
  `sale_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `sale_date` date NOT NULL,
  `sale_value` double NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `cedula` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(8) NOT NULL,
  `email` varchar(100) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '1',
  `register_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `age` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `cedula`, `username`, `password`, `email`, `state`, `register_date`, `update_date`, `age`) VALUES
(6, 12345, 'juseve', '12341234', 'juseve200@gmail.com', 1, '2016-09-21 03:57:48', '2016-09-21 03:57:48', 20);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sales_by_user`
--
ALTER TABLE `sales_by_user`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `cedula` (`cedula`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `sales_by_user`
--
ALTER TABLE `sales_by_user`
  MODIFY `sale_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
