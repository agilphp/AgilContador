-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-01-2015 a las 02:55:44
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `calima`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blog`
--

CREATE TABLE IF NOT EXISTS `blog` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `idvideo` varchar(50) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `categoria` int(5) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `post` text NOT NULL,
  `imagen` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `tema` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `blog`
--

INSERT INTO `blog` (`id`, `idvideo`, `titulo`, `categoria`, `descripcion`, `post`, `imagen`, `fecha`, `tema`) VALUES
(1, 'A4Hwg0t4b1k', 'Bienvenido al Wiki Calima', 1, 'Una guia de inicio en nuestro AP para el desarrollo web 2.0', 'Framework Php desarrollado basado en diferentes marcos de trabajo PHP, para permitir el desarrollo de aplicaciones web rápidas y con la menor curva de aprendizaje posible tanto en su implementación como en el uso y posterior desarrollo de sitios web y app para internet.', 'foto.png', '2014-10-18', 'Bienvenido a la guia'),
(2, '', 'Sobre Calima Framework', 1, 'Calima Framework es un marco de trabajo desarrollado sobre PHP 5.3+ escrito para apoyar el facil conocimiento, implementación y desarrollo de hispano ', 'En esta versión opensource ofrece una documentación completa en español con ejemplos de uso en cada una de sus funciones y clases desarrolladas.\r\n\r\nSe escribe un Framework ligero que permite la creación de sitios web estático o dinámicos así como aplicaciones web básicas o robustas para un entorno empresarial actual lleno de requerimientos y de alto consumo.', '', '2014-10-23', 'Intro'),
(3, '', 'Instalación', 1, 'La instalación de Calima Framework se debe hacer siguiendo la siguiente guía.', '<b>Instalación LocalHost:</b><br>\r\n\r\n1) Debes de tener un servidor apache 2.0+ corriendo en tu maquina local ( xampp - wampp )<br>\r\n2) Descargar la ultima versión de Calima-master.zip en https://github.com/webcol/Calima<br>\r\n3) Descomprimir y llevar el esqueleto dentro de una carpeta (calima) en su directorio root del servidor (htdocs)<br>\r\n4) abre un navegador web y escribe http://localhost/calima/<br><br>\r\n\r\n<b>Instalación WebHost:</b><br>\r\n\r\n1) Debes de tener un servidor apache 2.0+ corriendo en tu servidor web ( Cpanel )<br>\r\n2) Descargar la ultima versión de Calima-master.zip en https://github.com/webcol/Calima<br>\r\n3) Descomprimir y sube el esqueleto a la carpeta raiz (public_html) usando FTP <br>\r\n4) abre un navegador web y escribe http://misitio.com/<br>', '', '2014-10-24', 'Guia de uso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `descripcion`) VALUES
(1, 'home', 'La categoría Raíz de la aplicación y los artículos principales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_blog` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_blog`, `fecha`, `nombre`, `email`, `comentario`) VALUES
(1, 1, '0000-00-00', 'Efrain', 'webmaster@webcol.net', 'Esta si es ahora la prueba'),
(2, 1, '0000-00-00', 'Efrain', 'webmaster@webcol.net', 'eerrrrrr'),
(3, 1, '0000-00-00', 'Efrain', 'webmaster@webcol.net', 'eerrrrrr'),
(4, 1, '0000-00-00', 'Efrain2', 'AgilPhp@gmail.com', 'sddgfsgsgsf'),
(5, 1, '0000-00-00', 'Juan Paz', 'efrasoft@outlook.com', 'ttttttttttttttttt');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(5) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(5) NOT NULL,
  `titulo` varchar(30) NOT NULL,
  `cuerpo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `post`
--

INSERT INTO `post` (`id`, `titulo`, `cuerpo`) VALUES
(355, 'YRTYRTY', 'admin'),
(9117, 'esto es un ejemplo', 'admin'),
(9869, 'esto es un ejemplo', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE IF NOT EXISTS `sesiones` (
  `id` char(128) NOT NULL,
  `set_time` char(10) NOT NULL,
  `data` text NOT NULL,
  `session_key` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_post` int(5) NOT NULL,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nivel` char(1) NOT NULL,
  `clave` varchar(60) NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE IF NOT EXISTS `sesion_usuario` (
  `id_usuario` int(10) NOT NULL,
  `fecha_sesion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;