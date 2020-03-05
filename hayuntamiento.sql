-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-03-2020 a las 05:35:05
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hayuntamiento`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcomputadora`
--

CREATE TABLE `tblcomputadora` (
  `idComputadora` int(11) NOT NULL,
  `numeroInventario` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valorFactura` double NOT NULL,
  `valorActual` double NOT NULL,
  `marca` varchar(50) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `color` varchar(20) NOT NULL,
  `areaAdscripcion` varchar(50) NOT NULL,
  `fechaAdquisicion` date NOT NULL,
  `condiciones` varchar(100) NOT NULL,
  `fotografia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblcomputadora`
--

INSERT INTO `tblcomputadora` (`idComputadora`, `numeroInventario`, `descripcion`, `valorFactura`, `valorActual`, `marca`, `modelo`, `color`, `areaAdscripcion`, `fechaAdquisicion`, `condiciones`, `fotografia`) VALUES
(4, 1235, 'amors otra vez', 125.54, 548, 'marca', 'gh511', 'negro', 'oficina', '0000-00-00', 'estable', ''),
(5, 1235, 'computadora n', 125.54, 548, 'marca', 'gh511', 'negro', 'oficina', '0000-00-00', 'estable', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblescritorio`
--

CREATE TABLE `tblescritorio` (
  `idEscritorio` int(11) NOT NULL,
  `numeroInventario` int(11) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `color` varchar(50) DEFAULT NULL,
  `areaAdscripcion` varchar(100) DEFAULT NULL,
  `fechaAdquisicion` date DEFAULT NULL,
  `observacion` varchar(255) DEFAULT NULL,
  `fotografia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblescritorio`
--

INSERT INTO `tblescritorio` (`idEscritorio`, `numeroInventario`, `modelo`, `color`, `areaAdscripcion`, `fechaAdquisicion`, `observacion`, `fotografia`) VALUES
(3, 454, 'fr54', 'blanco', 'local', '0000-00-00', 'oñalsdñlmsñdlm sajldkjjñl alsjñdljasd', ''),
(6, 454, 'fr', 'blanco', 'local', '0000-00-00', 'ok', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblotros`
--

CREATE TABLE `tblotros` (
  `idOtros` int(11) NOT NULL,
  `numeroInventario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `precio` double NOT NULL,
  `condiciones` varchar(100) NOT NULL,
  `color` varchar(20) NOT NULL,
  `modelo` varchar(50) NOT NULL,
  `noPiezas` int(11) NOT NULL,
  `areaAdscripcion` varchar(50) NOT NULL,
  `fechaAdquisicion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblotros`
--

INSERT INTO `tblotros` (`idOtros`, `numeroInventario`, `nombre`, `marca`, `precio`, `condiciones`, `color`, `modelo`, `noPiezas`, `areaAdscripcion`, `fechaAdquisicion`) VALUES
(4, 907, 'kjb', 'jb', 32, 'kjb', 'kjb', 'kjb', 23, 'kj', '2020-03-18'),
(5, 97, 'oi', 'oh', 9, 'khh', 'oi', 'oi', 87, 'uiy', '2020-03-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `domicilio` varchar(150) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `rfc` varchar(13) NOT NULL,
  `curp` varchar(18) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contrasenia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`idUsuario`, `nombre`, `apellidos`, `domicilio`, `telefono`, `celular`, `fechaNacimiento`, `rfc`, `curp`, `email`, `contrasenia`) VALUES
(5, 'klalkhl', 'khl', 'hl', 'kh', '', '0000-00-00', 'hoi', 'hoi', 'hoi', 'hoi'),
(6, 'chiquita', 'bebe', 'hl', 'kh', '', '0000-00-00', 'hoi', 'hoi', 'hoi', 'hoi'),
(7, 'carnaval', '2020', 'hl', 'kh', '', '0000-00-00', 'hoi', 'hoi', 'hoi', 'hoi'),
(8, 'carnaval', '2020', 'hl', 'kh', '565', '0000-00-00', 'hoi', 'hoi', 'hoi', 'hoi'),
(9, 'prueba', 'p', 'p', 'p', 'p', '0000-00-00', 'p', 'sa', 'popeye@marino.soy', '123'),
(10, 'IOH', 'OIH', 'IOH', 'OI', 'OIH', '0000-00-00', 'oi', 'ih', 'prueba@prueba.com', '123'),
(12, 'moraes', '', '', '', '', '0000-00-00', '', '', 'code@gmail.com', '12'),
(13, 'as', '', '', '', '', '0000-00-00', '', '', 'as@f.com', 'a'),
(14, '', '', '', '', '', '0000-00-00', '', '', 'l@g.com', '4234'),
(15, 'dfsd', '', '', '', '', '0000-00-00', '', '', 'com@gmail.com', '123'),
(16, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(17, 'as', '', '', '', '', '0000-00-00', '', '', '', ''),
(18, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(19, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(20, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(21, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(22, '', '', '', '', '', '0000-00-00', '', '', '', ''),
(23, '', '', '', '', '', '0000-00-00', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvehiculo`
--

CREATE TABLE `tblvehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `numeroInventario` int(11) NOT NULL,
  `numeroSerie` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `mdelo` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `linea` varchar(50) NOT NULL,
  `numeroMotor` int(11) NOT NULL,
  `placa` varchar(20) NOT NULL,
  `areaAdscripcion` varchar(50) NOT NULL,
  `condicionVehiculo` varchar(50) NOT NULL,
  `fechaAquisicion` date NOT NULL,
  `observacion` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `valorActual` double NOT NULL,
  `valorFactura` double NOT NULL,
  `fotografia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblvehiculo`
--

INSERT INTO `tblvehiculo` (`idVehiculo`, `numeroInventario`, `numeroSerie`, `marca`, `mdelo`, `color`, `linea`, `numeroMotor`, `placa`, `areaAdscripcion`, `condicionVehiculo`, `fechaAquisicion`, `observacion`, `descripcion`, `valorActual`, `valorFactura`, `fotografia`) VALUES
(6, 22, 1212, 'marca', '1999', 'blanco', '3', 32343, 'p09ki', 'sala', 'buena', '0000-00-00', '', 'balcon', 1998, 188, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcomputadora`
--
ALTER TABLE `tblcomputadora`
  ADD PRIMARY KEY (`idComputadora`);

--
-- Indices de la tabla `tblescritorio`
--
ALTER TABLE `tblescritorio`
  ADD PRIMARY KEY (`idEscritorio`);

--
-- Indices de la tabla `tblotros`
--
ALTER TABLE `tblotros`
  ADD PRIMARY KEY (`idOtros`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcomputadora`
--
ALTER TABLE `tblcomputadora`
  MODIFY `idComputadora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tblescritorio`
--
ALTER TABLE `tblescritorio`
  MODIFY `idEscritorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblotros`
--
ALTER TABLE `tblotros`
  MODIFY `idOtros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
