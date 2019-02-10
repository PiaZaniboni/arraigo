-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-02-2019 a las 22:24:34
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
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` int(11) NOT NULL AUTO_INCREMENT,
  `title_category` varchar(25) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id_category`, `title_category`) VALUES
(1, 'Residencial'),
(2, 'Comercial'),
(3, 'Cultural'),
(4, 'Urbanismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id_post` int(11) NOT NULL AUTO_INCREMENT,
  `post_title` varchar(100) NOT NULL,
  `post_subtitle` varchar(100) NOT NULL,
  `post_body` text NOT NULL,
  `post_link` varchar(100) NOT NULL,
  PRIMARY KEY (`id_post`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_image`
--

CREATE TABLE IF NOT EXISTS `post_image` (
  `id_post_image` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL,
  `post_image` mediumblob NOT NULL,
  `type_image` varchar(25) NOT NULL,
  PRIMARY KEY (`id_post_image`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

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
