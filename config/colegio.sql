-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-05-2013 a las 20:28:48
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `idCarga` int(11) NOT NULL,
  `idSalon` int(11) NOT NULL,
  `idMateria` varchar(5) NOT NULL,
  PRIMARY KEY (`idCarga`),
  KEY `idSalon_idx` (`idSalon`),
  KEY `idMateria_idx` (`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_docente`
--

CREATE TABLE IF NOT EXISTS `carga_docente` (
  `idCarga` int(11) NOT NULL,
  `idDocente` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docente`
--

CREATE TABLE IF NOT EXISTS `docente` (
  `idDocente` varchar(15) NOT NULL,
  `nombres` varchar(45) NOT NULL,
  `pApellido` varchar(30) NOT NULL,
  `sApellido` varchar(30) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `fNacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE IF NOT EXISTS `estudiante` (
  `idEstudiante` varchar(15) NOT NULL DEFAULT '',
  `nombres` varchar(45) NOT NULL,
  `pApellido` varchar(30) NOT NULL,
  `sApellido` varchar(30) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `fNacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`idEstudiante`, `nombres`, `pApellido`, `sApellido`, `sexo`, `telefono`, `direccion`, `correo`, `estado`, `fNacimiento`) VALUES
('111', 'Jose', 'Jimenez', 'Montenegro', 'M', '3017693991', 'dads', 'adasd', '1', '2013-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `idGrado` varchar(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE IF NOT EXISTS `materia` (
  `idMateria` varchar(5) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `horas` int(11) NOT NULL,
  PRIMARY KEY (`idMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE IF NOT EXISTS `salon` (
  `idSalon` int(11) NOT NULL AUTO_INCREMENT,
  `idGrado` varchar(3) NOT NULL,
  `grupo` char(1) NOT NULL,
  PRIMARY KEY (`idSalon`),
  KEY `idGrado_idx` (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_admin`
--

CREATE TABLE IF NOT EXISTS `usuario_admin` (
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  PRIMARY KEY (`idAdministrador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuario_admin`
--

INSERT INTO `usuario_admin` (`idAdministrador`, `usuario`, `contraseña`) VALUES
(1, 'jose', 'jose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_docente`
--

CREATE TABLE IF NOT EXISTS `usuario_docente` (
  `idDocente` varchar(15) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  KEY `idDocente_idx` (`idDocente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_estudiante`
--

CREATE TABLE IF NOT EXISTS `usuario_estudiante` (
  `idEstudiante` varchar(15) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  KEY `idEstudiante_idx` (`idEstudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idSalon` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `idGrado` FOREIGN KEY (`idGrado`) REFERENCES `grado` (`idGrado`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_docente`
--
ALTER TABLE `usuario_docente`
  ADD CONSTRAINT `idDocente` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idDocente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_estudiante`
--
ALTER TABLE `usuario_estudiante`
  ADD CONSTRAINT `idEstudiante` FOREIGN KEY (`idEstudiante`) REFERENCES `estudiante` (`idEstudiante`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
