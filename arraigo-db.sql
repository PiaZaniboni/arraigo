-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-02-2019 a las 22:06:01
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `arraigo-db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `project_subtitle` varchar(100) NOT NULL,
  `project_description` text NOT NULL,
  `project_location` varchar(100) NOT NULL,
  `project_size` varchar(100) NOT NULL,
  `project_year` varchar(4) NOT NULL,
  `project_frame` mediumblob NOT NULL,
  `project_frame_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_image`
--

CREATE TABLE IF NOT EXISTS `project_image` (
  `id_project_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_project` int(11) NOT NULL,
  `project_image` mediumblob NOT NULL,
  `type_image` varchar(25) NOT NULL,
  PRIMARY KEY (`id_project_image`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_order`
--

CREATE TABLE IF NOT EXISTS `project_order` (
  `id_project` int(11) NOT NULL AUTO_INCREMENT,
  `project_order` int(11) NOT NULL,
  PRIMARY KEY (`id_project`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `alias` (`user`),
  UNIQUE KEY `correo_electronico` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `user`, `password`, `username`, `email`) VALUES
(1, 'barco', 'barcoe#2019', 'Barco', 'hola@unbarco.com'),
(2, 'arraigo', 'arraigo#2019', 'Arraigo', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
