-- phpMyAdmin SQL Dump
-- version 3.1.5
-- http://www.phpmyadmin.net
--
-- Servidor: remote-mysql4.servage.net
-- Tiempo de generación: 14-02-2017 a las 17:16:36
-- Versión del servidor: 5.0.85
-- Versión de PHP: 5.2.42-servage30

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `apulpo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autos`
--

CREATE TABLE IF NOT EXISTS `autos` (
  `auto_id` int(11) NOT NULL auto_increment,
  `imagen` varchar(100) collate utf8_spanish_ci default NULL,
  `lat` varchar(50) collate utf8_spanish_ci default NULL,
  `lng` varchar(50) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`auto_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `autos`
--

INSERT INTO `autos` (`auto_id`, `imagen`, `lat`, `lng`) VALUES
(1, 'assets/libs/images/sportcar1.png', '18.9195751', '-99.1717609'),
(2, 'assets/libs/images/sportcar2.png', '18.9193751', '-99.1717609'),
(3, 'assets/libs/images/sportcar3.png', '18.9191751', '-99.1717609'),
(4, 'assets/libs/images/sportcar4.png', '18.9197751', '-99.1717609'),
(5, 'assets/libs/images/sportcar5.png', '18.9199751', '-99.1717609');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `cliente_id` int(11) NOT NULL auto_increment,
  `nombre` varchar(150) collate utf8_spanish_ci default NULL,
  `imagen` varchar(50) collate utf8_spanish_ci default NULL,
  `foto` varchar(50) collate utf8_spanish_ci default NULL,
  `lat` varchar(50) collate utf8_spanish_ci default NULL,
  `lng` varchar(50) collate utf8_spanish_ci default NULL,
  `celular` varchar(25) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`cliente_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cliente_id`, `nombre`, `imagen`, `foto`, `lat`, `lng`, `celular`) VALUES
(1, 'River', 'assets/libs/images/cliente.png', 'river.png', '18.917012', '-99.176200', '777 987 5462'),
(2, 'Kiara', 'assets/libs/images/cliente.png', 'kiara.png', '18.918651', '-99.172627', '777 125 6554'),
(3, 'Vanessa', 'assets/libs/images/cliente.png', 'vanessa.png', '18.915852', '-99.167250', '777 354 8796'),
(4, 'Kenneth', 'assets/libs/images/cliente.png', 'kenneth.png', '18.920597', '-99.167647', '777 184 5269'),
(5, 'Orlando', 'assets/libs/images/cliente.png', 'orlando.png', '18.915596', '-99.164814', '777 257 9875');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE IF NOT EXISTS `conductores` (
  `conductor_id` int(11) NOT NULL auto_increment,
  `nombre` varchar(100) collate utf8_spanish_ci default NULL,
  `foto` varchar(100) collate utf8_spanish_ci default NULL,
  `celular` varchar(20) collate utf8_spanish_ci default NULL,
  `lat` varchar(100) collate utf8_spanish_ci default NULL,
  `lng` varchar(100) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`conductor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcar la base de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`conductor_id`, `nombre`, `foto`, `celular`, `lat`, `lng`) VALUES
(1, 'Sandra', 'conductor1.png', '777 123 4567', '18.9194226', '-99.1753516'),
(2, 'Emily', 'conductor3.png', '777 564 9874', '18.9204376', '-99.1715214'),
(3, 'Heber', 'conductor2.png', '777 987 3215', '18.9184991', '-99.1702554'),
(4, 'Nick', 'conductor4.png', '777 195 2814', '18.9169158', '-99.1702983'),
(5, 'Roberto', 'conductor5.png', '777 346 9148', '18.9151701', '-99.1692898');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visibles`
--

CREATE TABLE IF NOT EXISTS `visibles` (
  `visible_id` int(11) NOT NULL auto_increment,
  `totales` int(1) default '0',
  PRIMARY KEY  (`visible_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcar la base de datos para la tabla `visibles`
--

INSERT INTO `visibles` (`visible_id`, `totales`) VALUES
(1, 1);
