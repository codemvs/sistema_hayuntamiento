-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2020 a las 02:46:25
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
  `descripcion` int(11) NOT NULL,
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
  MODIFY `idComputadora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblescritorio`
--
ALTER TABLE `tblescritorio`
  MODIFY `idEscritorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
