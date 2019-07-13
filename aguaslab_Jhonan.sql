-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2019 a las 19:59:44
-- Versión del servidor: 10.1.34-MariaDB
-- Versión de PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aguaslab`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cliente_id` int(11) DEFAULT NULL,
  `piscina_id` int(11) DEFAULT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indiceLangerier` decimal(12,3) NOT NULL,
  `tendencia` varchar(255) NOT NULL,
  `ph` decimal(12,3) NOT NULL,
  `productoPh` varchar(255) NOT NULL,
  `cantidadPh` decimal(12,3) NOT NULL,
  `medidaPh` enum('gramos','kilogramos','mililitros','litros') NOT NULL,
  `cloroInicial` decimal(12,3) NOT NULL,
  `cloroFinal` decimal(12,3) NOT NULL,
  `productoCloro` varchar(255) NOT NULL,
  `cantidadCloro` decimal(12,3) NOT NULL,
  `medidaCloro` enum('gramos','kilogramos','mililitros','litros') NOT NULL,
  `alcalinidad` decimal(12,3) NOT NULL,
  `productoAlcalinidad` varchar(255) NOT NULL,
  `cantidadAlcalinidad` decimal(12,3) NOT NULL,
  `medidaAlcalinidad` enum('gramos','kilogramos','mililitros','litros') NOT NULL,
  `dureza` decimal(12,3) NOT NULL,
  `productoDureza` varchar(255) NOT NULL,
  `cantidadDureza` decimal(12,3) NOT NULL,
  `medidaDureza` enum('gramos','kilogramos','mililitros','litros') NOT NULL,
  `tiempoRotacion` int(11) NOT NULL,
  `medidaTiempoRotacion` enum('horas','minutos') NOT NULL,
  `tiempoFiltracion` int(11) NOT NULL,
  `medidaTiempoFiltracion` enum('horas','minutos') NOT NULL,
  `temperatura` decimal(12,3) NOT NULL,
  `desinfeccionFiltro` enum('SI','NO') NOT NULL,
  `cepilladoParedes` enum('SI','NO') NOT NULL,
  `lavadoZonaH` enum('SI','NO') NOT NULL,
  `superCloracion` enum('SI','NO') NOT NULL,
  `productoLimpieza` varchar(255) DEFAULT NULL,
  `cantidadLimpieza` decimal(12,3) DEFAULT NULL,
  `medidaLimpieza` enum('gramos','kilogramos','mililitros','litros') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `tel` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `asesor` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `direccion`, `tel`, `correo`, `asesor`) VALUES
(1, 'JUANITO', 'PEREZSADADA', '3123123123', '', 'DANIEL PEREZ'),
(2, 'JUANITO', 'LALALALAL', '23123', '', 'DANIEL PEREZ'),
(3, 'ALGUIEN LALALAL', 'LALALA', '3423423', 'correo@correo.c', 'DANIEL PEREZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `muestras`
--

CREATE TABLE `muestras` (
  `pdf` varchar(255) NOT NULL,
  `nit` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `ftoma` date DEFAULT NULL,
  `fechaHoraSubida` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `muestras`
--

INSERT INTO `muestras` (`pdf`, `nit`, `ftoma`, `fechaHoraSubida`) VALUES
('1.pdf', '79612285', '2019-01-02', NULL),
('10.pdf', '900533027', '2019-01-03', NULL),
('11.pdf', '900843173', '2019-01-03', NULL),
('12.pdf', '900458129', '2019-01-03', NULL),
('13.pdf', '900619727', '2019-01-03', NULL),
('14.pdf', '900422783', '2019-01-03', NULL),
('15.pdf', '809006091', '2019-01-03', NULL),
('16.pdf', '809003088', '2019-01-03', NULL),
('17.pdf', '809006205', '2019-01-03', NULL),
('18.pdf', '809004537', '2019-01-03', NULL),
('19.pdf', '809008679', '2019-01-03', NULL),
('2.pdf', '10784234', '2019-01-02', NULL),
('20.pdf', '809006348', '2019-01-03', NULL),
('21.pdf', '809005619', '2019-01-03', NULL),
('22.pdf', '900282426', '2019-01-03', NULL),
('23.pdf', '900201086', '2019-01-03', NULL),
('24.pdf', '809011488', '2019-01-03', NULL),
('25.pdf', '809007784', '2019-01-03', NULL),
('26.pdf', '79612285', '2019-01-04', NULL),
('27.pdf', '11224984', '2019-01-04', NULL),
('28.pdf', '900803022', '2019-01-04', NULL),
('29.pdf', '900624787', '2019-01-04', NULL),
('3.pdf', '11324946', '2019-01-02', NULL),
('30.pdf', '808001538', '2019-01-04', NULL),
('31.pdf', '900529575', '2019-01-04', NULL),
('32.pdf', '900268412', '2019-01-04', NULL),
('33.pdf', '900026506', '2019-01-04', NULL),
('34.pdf', '808002100', '2019-01-04', NULL),
('35.pdf', '900325149', '2019-01-04', NULL),
('36.pdf', '808000223', '2019-01-04', NULL),
('37.pdf', '900759534', '2019-01-04', NULL),
('38.pdf', '901103711', '2019-01-04', NULL),
('39.pdf', '901103711', '2019-01-04', NULL),
('4.pdf', '11324946', '2019-01-02', NULL),
('40.pdf', '901103711', '2019-01-04', NULL),
('41.pdf', '901104107', '2019-01-04', NULL),
('42.pdf', '901104107', '2019-01-04', NULL),
('43.pdf', '901142252', '2019-01-04', NULL),
('44.pdf', '901142252', '2019-01-04', NULL),
('45.pdf', '901142252', '2019-01-04', NULL),
('46.pdf', '800150172', '2019-01-04', NULL),
('47.pdf', '900169823', '2019-01-04', NULL),
('48.pdf', '890310418', '2019-01-04', NULL),
('49.pdf', '890310418', '2019-01-04', NULL),
('5.pdf', '900492453', '2019-01-02', NULL),
('50.pdf', '890310418', '2019-01-04', NULL),
('51.pdf', '890310418', '2019-01-04', NULL),
('52.pdf', '79612285', '2019-01-05', NULL),
('53.pdf', '809007452', '2019-01-05', NULL),
('54.pdf', '900095102', '2019-01-05', NULL),
('55.pdf', '809011681', '2019-01-05', NULL),
('56.pdf', '900186823', '2019-01-05', NULL),
('57.pdf', '901101663', '2019-01-05', NULL),
('58.pdf', '900826463', '2019-01-05', NULL),
('59.pdf', '900442629', '2019-01-05', NULL),
('6.pdf', '79612285', '2019-01-03', NULL),
('60.pdf', '800160189', '2019-01-05', NULL),
('61.pdf', '800160189', '2019-01-05', NULL),
('62.pdf', '900449068', '2019-01-05', NULL),
('63.pdf', '808002806', '2019-01-05', NULL),
('7.pdf', '900558424', '2019-01-03', NULL),
('8.pdf', '900310936', '2019-01-03', NULL),
('9.pdf', '900660260', '2019-01-03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscinas`
--

CREATE TABLE `piscinas` (
  `id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `foto1` varchar(255) DEFAULT NULL,
  `foto2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piscinas`
--

INSERT INTO `piscinas` (`id`, `cliente_id`, `nombre`, `descripcion`, `foto1`, `foto2`) VALUES
(1, 4, 'Piscina en L', '', 'foto_piscinas/1_4_01.jpg', 'foto_piscinas/1_4_02.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscineros`
--

CREATE TABLE `piscineros` (
  `piscinero_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `fechaVinculacion` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piscineros`
--

INSERT INTO `piscineros` (`piscinero_id`, `cliente_id`, `fechaVinculacion`) VALUES
(7, 4, '2019-07-12 00:58:22'),
(7, 5, '2019-07-08 15:46:47'),
(7, 13, '2019-07-12 21:17:07'),
(8, 4, '2019-07-08 15:46:47'),
(10, 4, '2019-07-08 15:46:47'),
(11, 5, '2019-07-08 15:46:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(3) NOT NULL,
  `nick` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `bloqueo` int(1) NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nick`, `pass`, `nombre`, `correo`, `nivel`, `bloqueo`, `foto`) VALUES
(3, '1000463494', '70878ab2f0436919a8235eae9501c2ea280c7126', 'DANIEL', 'danilocha@hotmail.com', 'SUPERUSUARIO', 1, 'foto_perfil/1000463494.png'),
(4, '123456789', '70878ab2f0436919a8235eae9501c2ea280c7126', 'DANIEL', 'correo@correo.com', 'ADMINISTRACION', 1, 'foto_perfil/usuario.png'),
(5, '79612285', '70878ab2f0436919a8235eae9501c2ea280c7126', 'ALGUIEN', 'correo@correo.com', 'ADMINISTRACION', 1, 'foto_perfil/usuario.png'),
(7, '12345678', '70878ab2f0436919a8235eae9501c2ea280c7126', 'JHONAN', 'piscis@example.com', 'PISCINERO', 1, 'foto_perfil/usuario.png'),
(8, '1234567890', '70878ab2f0436919a8235eae9501c2ea280c7126', 'LUIS', 'luis@example.com', 'PISCINERO', 1, 'foto_perfil/usuario.png'),
(10, '1111111', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'JHONAN PISC', 'piscis2@example.com', 'PISCINERO', 1, 'foto_perfil/usuario.png'),
(11, '111222333', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'MARCO PISC', 'piscis3@example.com', 'PISCINERO', 1, 'foto_perfil/usuario.png'),
(13, '123321', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'JHONAN PISCA', 'piscis4@example.com', 'ADMINISTRACION', 1, 'foto_perfil/usuario.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `piscina_id` (`piscina_id`),
  ADD KEY `bitacora_ibfk_2` (`cliente_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `muestras`
--
ALTER TABLE `muestras`
  ADD PRIMARY KEY (`pdf`);

--
-- Indices de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `piscineros`
--
ALTER TABLE `piscineros`
  ADD PRIMARY KEY (`piscinero_id`,`cliente_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nick` (`nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `bitacora_ibfk_3` FOREIGN KEY (`piscina_id`) REFERENCES `piscinas` (`id`);

--
-- Filtros para la tabla `piscinas`
--
ALTER TABLE `piscinas`
  ADD CONSTRAINT `piscinas_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `piscineros`
--
ALTER TABLE `piscineros`
  ADD CONSTRAINT `piscineros_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piscineros_ibfk_2` FOREIGN KEY (`piscinero_id`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
