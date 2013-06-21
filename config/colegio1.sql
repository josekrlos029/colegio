-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2013 a las 02:14:34
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `colegio1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `llenarNotas`(IN `idPersona` VARCHAR(15), IN `idSal` VARCHAR(5))
BEGIN
DECLARE done INT DEFAULT 0;
declare idMat varchar(5);
DECLARE cur1 CURSOR FOR SELECT `idMateria` FROM `pensum` WHERE `idGrado` = (SELECT `idGrado` FROM `salon` WHERE `idSalon`=idSal);
DECLARE CONTINUE HANDLER FOR SQLSTATE '02000' SET done = 1;

OPEN cur1;
c1_loop: LOOP
FETCH cur1 INTO idMat;
 IF `done` THEN LEAVE c1_loop; END IF; 
INSERT INTO `notas` (`idPersona`,`idMateria`) VALUES (idPersona,idMat);
END LOOP c1_loop;
  CLOSE cur1;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE IF NOT EXISTS `carga` (
  `idPersona` varchar(15) NOT NULL,
  `idSalon` varchar(5) NOT NULL,
  `idMateria` varchar(5) NOT NULL,
  KEY `idMateria_idx` (`idMateria`),
  KEY `iSalon_idx` (`idSalon`),
  KEY `idPersona_idx` (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `carga`
--

INSERT INTO `carga` (`idPersona`, `idSalon`, `idMateria`) VALUES
('222', '1-02', 'I1'),
('222', '1-02', 'MAT'),
('222', '1-03', 'I1'),
('222', '2-01', 'MAT'),
('444', '3-01', 'MAT'),
('222', '3-01', 'I1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `idGrado` varchar(3) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`idGrado`, `nombre`) VALUES
('1', 'PRIMERO'),
('2', 'SEGUNDO'),
('3', 'TERCERO'),
('4', 'CUARTO'),
('5', 'QUINTO'),
('6', 'SEXTO');

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

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `nombre`, `horas`) VALUES
('CN', 'CIENCIAS NATURALES', 4),
('CS', 'CIENCIAS SOCIALES', 4),
('I1', 'Ingles', 2),
('MAT', 'MATEMATICAS', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `idMatricula` int(11) NOT NULL AUTO_INCREMENT,
  `idPersona` varchar(15) NOT NULL,
  `idSalon` varchar(5) NOT NULL,
  `fecha_matricula` date NOT NULL,
  `año_lectivo` varchar(4) NOT NULL,
  `jornada` varchar(15) NOT NULL,
  PRIMARY KEY (`idMatricula`),
  KEY `idPersona_idx` (`idPersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idMatricula`, `idPersona`, `idSalon`, `fecha_matricula`, `año_lectivo`, `jornada`) VALUES
(3, '333', '1-01', '2013-06-18', '2013', 'MAÑANA'),
(4, '555', '1-01', '2013-06-19', '2013', 'MAÑANA');

--
-- Disparadores `matricula`
--
DROP TRIGGER IF EXISTS `tr_llenarNotas`;
DELIMITER //
CREATE TRIGGER `tr_llenarNotas` AFTER INSERT ON `matricula`
 FOR EACH ROW begin
CALL llenarNotas(new.idPersona,new.idSalon);
update persona set estado=1 where idPersona=new.idPersona;
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE IF NOT EXISTS `notas` (
  `idPersona` varchar(15) NOT NULL,
  `idMateria` varchar(5) NOT NULL,
  `primerP` int(11) DEFAULT NULL,
  `segundoP` int(11) DEFAULT NULL,
  `tercerP` int(11) DEFAULT NULL,
  `cuartoP` int(11) DEFAULT NULL,
  `definitiva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idPersona`, `idMateria`, `primerP`, `segundoP`, `tercerP`, `cuartoP`, `definitiva`) VALUES
('333', 'MAT', NULL, NULL, NULL, NULL, NULL),
('333', 'I1', NULL, NULL, NULL, NULL, NULL),
('555', 'MAT', NULL, NULL, NULL, NULL, NULL),
('555', 'I1', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `idGrado` varchar(3) NOT NULL,
  `idMateria` varchar(5) NOT NULL,
  KEY `idGrado_idx` (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pensum`
--

INSERT INTO `pensum` (`idGrado`, `idMateria`) VALUES
('1', 'MAT'),
('2', 'I1'),
('2', 'MAT'),
('3', 'I1'),
('3', 'MAT'),
('1', 'I1'),
('4', 'CN'),
('4', 'MAT'),
('5', 'I1'),
('5', 'MAT');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `idPersona` varchar(15) NOT NULL DEFAULT '',
  `nombres` varchar(45) NOT NULL,
  `pApellido` varchar(30) NOT NULL,
  `sApellido` varchar(30) DEFAULT NULL,
  `sexo` char(1) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `estado` char(1) NOT NULL,
  `fNacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idPersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombres`, `pApellido`, `sApellido`, `sexo`, `telefono`, `direccion`, `correo`, `estado`, `fNacimiento`) VALUES
('111', 'Jose', 'Jimenez', 'Montenegro', 'M', '3017693991', 'dads', 'josekrlos029@hotmail.com', '1', '2013-04-01'),
('222', 'Humberto', 'Palmera', 'Loaiza', 'M', '', '', 'ver870826@hotmail.com', '0', '2013-05-10'),
('333', 'andy', 'bolaños', 'castilla', 'M', '132', 'dasdasd', '', '1', '2013-06-20'),
('444', 'juan miguel', 'martinez', 'oñate', 'M', '13231', 'sdad', 'dasd', '0', '2013-06-03'),
('555', 'Carlos', 'Jimenez', 'Montenegro', 'M', '123123', 'dsasd', 'asdsa@dasd', '1', '2013-06-05'),
('777', 'WILMAN', 'VEGA', 'CASTILLA', 'M', '', '', '', '0', '2013-06-04');

--
-- Disparadores `persona`
--
DROP TRIGGER IF EXISTS `agregar_usuario`;
DELIMITER //
CREATE TRIGGER `agregar_usuario` AFTER INSERT ON `persona`
 FOR EACH ROW begin
insert into usuario(idPersona, usuario, contraseña) values (new.idPersona,new.idPersona,SHA1(new.idPersona));
end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `idRol` varchar(2) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `nombre`) VALUES
('A', 'ADMINISTRADOR'),
('D', 'DOCENTE'),
('E', 'ESTUDIANTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rolespersona`
--

CREATE TABLE IF NOT EXISTS `rolespersona` (
  `idPersona` varchar(15) DEFAULT NULL,
  `idRol` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rolespersona`
--

INSERT INTO `rolespersona` (`idPersona`, `idRol`) VALUES
('111', 'A'),
('222', 'D'),
('333', 'E'),
('444', 'D'),
('555', 'E'),
('777', 'E');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE IF NOT EXISTS `salon` (
  `idSalon` varchar(5) NOT NULL,
  `idGrado` varchar(3) NOT NULL,
  `grupo` varchar(3) NOT NULL,
  PRIMARY KEY (`idSalon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`idSalon`, `idGrado`, `grupo`) VALUES
('1-01', '1', '01'),
('1-02', '1', '02'),
('1-03', '1', '03'),
('1-04', '1', '04'),
('2-01', '2', '01'),
('2-04', '2', '04'),
('3-01', '3', '01'),
('4-01', '4', '01'),
('5-01', '5', '01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idPersona` varchar(15) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `contraseña` varchar(45) NOT NULL,
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `contraseña_UNIQUE` (`contraseña`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idPersona`, `usuario`, `contraseña`) VALUES
('222', '222', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9'),
('333', '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d'),
('444', '444', '9a3e61b6bcc8abec08f195526c3132d5a4a98cc0'),
('555', '555', 'cfa1150f1787186742a9a884b73a43d8cf219f9b'),
('777', '777', 'fc7a734dba518f032608dfeb04f4eeb79f025aa7'),
('111', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPersona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `iSalon` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
