-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2013 a las 21:17:07
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
('222', '1-01', 'MAT'),
('222', '1-02', 'MAT'),
('222', '2-02', 'MAT'),
('222', '3-01', 'MAT'),
('444', '1-01', 'ING'),
('444', '1-02', 'ING'),
('444', '3-01', 'CN'),
('444', '3-01', 'CS');

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
('5', 'QUINTO');

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
('ING', 'INGLES', 2),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`idMatricula`, `idPersona`, `idSalon`, `fecha_matricula`, `año_lectivo`, `jornada`) VALUES
(5, '333', '1-01', '2013-06-29', '2013', 'MAÑANA'),
(6, '555', '1-01', '2013-06-29', '2013', 'MAÑANA'),
(7, '777', '1-01', '2013-06-29', '2013', 'MAÑANA');

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
  `primerP` decimal(11,1) DEFAULT NULL,
  `segundoP` decimal(11,1) DEFAULT NULL,
  `tercerP` decimal(11,1) DEFAULT NULL,
  `cuartoP` decimal(11,1) DEFAULT NULL,
  `definitiva` decimal(11,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`idPersona`, `idMateria`, `primerP`, `segundoP`, `tercerP`, `cuartoP`, `definitiva`) VALUES
('333', 'CN', 40.0, 4.0, NULL, NULL, NULL),
('333', 'CS', NULL, NULL, NULL, NULL, NULL),
('333', 'ING', NULL, NULL, NULL, NULL, NULL),
('333', 'MAT', 3.0, 3.0, 3.0, 3.0, 3.0),
('555', 'CN', NULL, NULL, NULL, NULL, NULL),
('555', 'CS', NULL, NULL, NULL, NULL, NULL),
('555', 'ING', NULL, NULL, NULL, NULL, NULL),
('555', 'MAT', 2.0, 4.0, 4.0, 4.0, 3.5),
('777', 'CN', NULL, NULL, NULL, NULL, NULL),
('777', 'CS', NULL, NULL, NULL, NULL, NULL),
('777', 'ING', NULL, NULL, NULL, NULL, NULL),
('777', 'MAT', 1.0, 2.0, 4.0, 3.0, 2.5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `idGrado` varchar(3) NOT NULL,
  `idMateria` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pensum`
--

INSERT INTO `pensum` (`idGrado`, `idMateria`) VALUES
('1', 'CN'),
('1', 'CS'),
('1', 'ING'),
('1', 'MAT'),
('2', 'CN'),
('2', 'CS'),
('2', 'ING'),
('2', 'MAT'),
('3', 'CN'),
('3', 'CS'),
('3', 'ING'),
('3', 'MAT'),
('5', 'CN'),
('5', 'CS'),
('5', 'ING'),
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
('111', 'Jose', 'Jimenez', 'Montenegro', 'M', '3017693991', 'dads', 'josekrlos029@gmail.com', '1', '2013-04-01'),
('222', 'Humberto', 'Palmera', 'Loaiza', 'M', '', '', 'ver870826@hotmail.com', '0', '2013-05-10'),
('333', 'andy', 'bolaños', 'castilla', 'M', '132', 'dasdasd', '', '1', '2013-06-20'),
('444', 'juan miguel', 'martinez', 'oñate', 'M', '13231', 'sdad', 'jhosse_-henriquex@hotmail.com', '0', '2013-06-03'),
('555', 'Carlos', 'Jimenez', 'Montenegro', 'M', '123123', 'dsasd', 'asdsa@dasd', '1', '2013-06-05'),
('777', 'WILMAN', 'VEGA', 'CASTILLA', 'M', '', '', '', '1', '2013-06-04');

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
  `idPersona` varchar(15) NOT NULL,
  `idRol` varchar(2) NOT NULL,
  KEY `idRolRP_idx` (`idRol`)
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
  PRIMARY KEY (`idSalon`),
  KEY `idGrado1_idx` (`idGrado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `salon`
--

INSERT INTO `salon` (`idSalon`, `idGrado`, `grupo`) VALUES
('1-01', '1', '01'),
('1-02', '1', '02'),
('2-01', '2', '01'),
('2-02', '2', '02'),
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
  `facebook` varchar(30) DEFAULT NULL,
  `twitter` varchar(30) DEFAULT NULL,
  `google` varchar(30) DEFAULT NULL,
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  UNIQUE KEY `contraseña_UNIQUE` (`contraseña`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idPersona`, `usuario`, `contraseña`, `facebook`, `twitter`, `google`) VALUES
('222', '222', '1c6637a8f2e1f75e06ff9984894d6bd16a3a36a9', NULL, NULL, NULL),
('333', '333', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', NULL, NULL, NULL),
('444', '444', '9a3e61b6bcc8abec08f195526c3132d5a4a98cc0', NULL, NULL, NULL),
('555', '555', 'cfa1150f1787186742a9a884b73a43d8cf219f9b', NULL, NULL, NULL),
('777', '777', 'fc7a734dba518f032608dfeb04f4eeb79f025aa7', '100003000642691', NULL, NULL),
('111', 'admin', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '640009763', NULL, '112729141050675684104');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON UPDATE CASCADE,
  ADD CONSTRAINT `idPersona` FOREIGN KEY (`idPersona`) REFERENCES `persona` (`idPersona`) ON UPDATE CASCADE,
  ADD CONSTRAINT `iSalon` FOREIGN KEY (`idSalon`) REFERENCES `salon` (`idSalon`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `rolespersona`
--
ALTER TABLE `rolespersona`
  ADD CONSTRAINT `idRolRP` FOREIGN KEY (`idRol`) REFERENCES `rol` (`idRol`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `idGrado1` FOREIGN KEY (`idGrado`) REFERENCES `grado` (`idGrado`) ON UPDATE CASCADE;
  
  
DELIMITER $$
--
-- Procedimientos
--
DROP PROCEDURE IF EXISTS `llenarNotas`;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
