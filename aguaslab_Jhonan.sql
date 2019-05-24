-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 24-05-2019 a las 03:17:52
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.30

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
  `fechaHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `indiceLangerier` decimal(12,3) NOT NULL,
  `tendencia` varchar(255) NOT NULL,
  `ph` decimal(12,3) NOT NULL,
  `productoPh` varchar(255) NOT NULL,
  `cantidadPh` decimal(12,3) NOT NULL,
  `cloroInicial` decimal(12,3) NOT NULL,
  `cloroFinal` decimal(12,3) NOT NULL,
  `productoCloro` varchar(255) NOT NULL,
  `cantidadCloro` decimal(12,3) NOT NULL,
  `alcalinidad` decimal(12,3) NOT NULL,
  `productoAlcalinidad` varchar(255) NOT NULL,
  `cantidadAlcalinidad` decimal(12,3) NOT NULL,
  `dureza` decimal(12,3) NOT NULL,
  `productoDureza` varchar(255) NOT NULL,
  `cantidadDureza` decimal(12,3) NOT NULL,
  `horaRotacion` time NOT NULL,
  `horaFiltracion` time NOT NULL,
  `temperatura` decimal(12,3) NOT NULL,
  `desinfeccionFiltro` enum('SI','NO') NOT NULL,
  `cepilladoParedes` enum('SI','NO') NOT NULL,
  `lavadoZonaH` enum('SI','NO') NOT NULL,
  `superCloracion` enum('SI','NO') NOT NULL,
  `productoLimpieza` varchar(255) NOT NULL,
  `cantidadLimpieza` decimal(12,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `user_id`, `fechaHora`, `indiceLangerier`, `tendencia`, `ph`, `productoPh`, `cantidadPh`, `cloroInicial`, `cloroFinal`, `productoCloro`, `cantidadCloro`, `alcalinidad`, `productoAlcalinidad`, `cantidadAlcalinidad`, `dureza`, `productoDureza`, `cantidadDureza`, `horaRotacion`, `horaFiltracion`, `temperatura`, `desinfeccionFiltro`, `cepilladoParedes`, `lavadoZonaH`, `superCloracion`, `productoLimpieza`, `cantidadLimpieza`) VALUES
(1, 7, '2019-05-23 02:28:24', '0.607', 'TENDENCIAS INCRUSTANTES', '7.500', 'ph', '22.000', '11.000', '22.000', 'cloro', '8.000', '140.000', 'alcalino', '10.000', '600.000', 'dureza', '17.000', '14:22:00', '15:33:00', '29.000', 'SI', 'SI', 'SI', 'NO', 'limpio', '33.000');

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
  `pdf` varchar(2) DEFAULT NULL,
  `nit` varchar(9) DEFAULT NULL,
  `ftoma` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `muestras`
--

INSERT INTO `muestras` (`pdf`, `nit`, `ftoma`) VALUES
('1', '79612285', '2/01/2019'),
('2', '10784234', '2/01/2019'),
('3', '11324946', '2/01/2019'),
('4', '11324946', '2/01/2019'),
('5', '900492453', '2/01/2019'),
('6', '79612285', '3/01/2019'),
('7', '900558424', '3/01/2019'),
('8', '900310936', '3/01/2019'),
('9', '900660260', '3/01/2019'),
('10', '900533027', '3/01/2019'),
('11', '900843173', '3/01/2019'),
('12', '900458129', '3/01/2019'),
('13', '900619727', '3/01/2019'),
('14', '900422783', '3/01/2019'),
('15', '809006091', '3/01/2019'),
('16', '809003088', '3/01/2019'),
('17', '809006205', '3/01/2019'),
('18', '809004537', '3/01/2019'),
('19', '809008679', '3/01/2019'),
('20', '809006348', '3/01/2019'),
('21', '809005619', '3/01/2019'),
('22', '900282426', '3/01/2019'),
('23', '900201086', '3/01/2019'),
('24', '809011488', '3/01/2019'),
('25', '809007784', '3/01/2019'),
('26', '79612285', '4/01/2019'),
('27', '11224984', '4/01/2019'),
('28', '900803022', '4/01/2019'),
('29', '900624787', '4/01/2019'),
('30', '808001538', '4/01/2019'),
('31', '900529575', '4/01/2019'),
('32', '900268412', '4/01/2019'),
('33', '900026506', '4/01/2019'),
('34', '808002100', '4/01/2019'),
('35', '900325149', '4/01/2019'),
('36', '808000223', '4/01/2019'),
('37', '900759534', '4/01/2019'),
('38', '901103711', '4/01/2019'),
('39', '901103711', '4/01/2019'),
('40', '901103711', '4/01/2019'),
('41', '901104107', '4/01/2019'),
('42', '901104107', '4/01/2019'),
('43', '901142252', '4/01/2019'),
('44', '901142252', '4/01/2019'),
('45', '901142252', '4/01/2019'),
('46', '800150172', '4/01/2019'),
('47', '900169823', '4/01/2019'),
('48', '890310418', '4/01/2019'),
('49', '890310418', '4/01/2019'),
('50', '890310418', '4/01/2019'),
('51', '890310418', '4/01/2019'),
('52', '79612285', '5/01/2019'),
('53', '809007452', '5/01/2019'),
('54', '900095102', '5/01/2019'),
('55', '809011681', '5/01/2019'),
('56', '900186823', '5/01/2019'),
('57', '901101663', '5/01/2019'),
('58', '900826463', '5/01/2019'),
('59', '900442629', '5/01/2019'),
('60', '800160189', '5/01/2019'),
('61', '800160189', '5/01/2019'),
('62', '900449068', '5/01/2019'),
('63', '808002806', '5/01/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscineros`
--

CREATE TABLE `piscineros` (
  `piscinero_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `piscineros`
--

INSERT INTO `piscineros` (`piscinero_id`, `cliente_id`) VALUES
(7, 5);

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
(3, '1000463494', '70878ab2f0436919a8235eae9501c2ea280c7126', 'DANIEL', 'danilocha@hotmail.com', 'ADMINISTRADOR', 1, 'foto_perfil/1000463494.png'),
(4, '123456789', '70878ab2f0436919a8235eae9501c2ea280c7126', 'DANIEL', 'correo@correo.com', 'CLIENTE', 1, 'foto_perfil/usuario.png'),
(5, '79612285', '7c222fb2927d828af22f592134e8932480637c0d', 'ALGUIEN', 'correo@correo.com', 'CLIENTE', 1, 'foto_perfil/usuario.png'),
(7, '12345678', '70878ab2f0436919a8235eae9501c2ea280c7126', 'JHONAN', 'piscis@example.com', 'PISCINERO', 1, 'foto_perfil/usuario.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `usuario` (`id`);

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
