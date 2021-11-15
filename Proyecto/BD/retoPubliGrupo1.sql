-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 15-11-2021 a las 08:59:01
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- Base de datos: `retoPubliGrupo1`
CREATE DATABASE retoPubliGrupo1 CHARACTER SET utf8mb4;
USE retoPubliGrupo1;

--Creación de usuario
--CREATE LOGIN nuevoUser WITH PASSWORD ='12345';

CREATE USER 'SERVER'@'localhost' IDENTIFIED BY '12345';

GRANT ALL PRIVILEGES ON * . * TO 'SERVER'@'localhost';
FLUSH PRIVILEGES;

DBCC DROPCLEANBUFFERS;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Anuncio`
--

CREATE TABLE `Anuncio` (
  `idAnuncio` int(5) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `pathFoto` varchar(150) DEFAULT NULL,
  `fchPublicacion` date NOT NULL,
  `idPerfil-Admin` int(5) NOT NULL,
  `idPerfil-Comprador` int(5) DEFAULT NULL,
  `idCategoria` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Anuncio`
--

INSERT INTO `Anuncio` (`idAnuncio`, `titulo`, `descripcion`, `ubicacion`, `precio`, `estado`, `pathFoto`, `fchPublicacion`, `idPerfil-Admin`, `idPerfil-Comprador`, `idCategoria`) VALUES
(1, 'Radiador', 'Radiador reshulon', 'Vitoria-Gasteiz', 69.99, NULL, NULL, '2021-11-07', 1, NULL, 2),
(2, 'Ordenador portatil mac nuevo', 'Ordenador portatil mac nuevo perfectas condiciones esta nuevo precio negociable', 'Vitoria-Gasteiz', 450, NULL, NULL, '2021-11-10', 1, NULL, 3),
(3, 'Camara Canon 450L', 'Regalo de navidad. No me gusta. Cambio por algo de precio similar. Precio negociable.', 'Dulantzi', 300, NULL, NULL, '2021-11-10', 2, NULL, 4),
(4, 'FIFA 2008', 'EL MEJOR FIFA. NUEVO, SIN ABRIR.', 'Vitoria-Gasteiz', 80, NULL, NULL, '2021-11-09', 1, NULL, 9),
(5, 'Xiaomi redmi x5', 'Me lo encontré en el suelo, si consigues desbloquearlo es tuyo', 'Vitoria-Gasteiz', 120, NULL, NULL, '2021-10-20', 2, NULL, 1),
(6, 'Vestido Breska', 'Vestido azul, esta nuevo', 'Vitoria-Gasteiz', 20, NULL, NULL, '2021-11-06', 1, NULL, 10),
(7, 'Bici mountain bike', 'bici nueva decatlon', 'Vitoria-Gasteiz', 70, NULL, NULL, '2021-08-11', 2, NULL, 8),
(8, 'Regalo gato', 'Hola regalo gatitos que tuvo mi gato Garfield tienen dos meses y son muy bonitos.', 'Vitoria-Gasteiz', 1, NULL, NULL, '2021-11-01', 2, NULL, 5),
(9, 'Pelicula spiderman vs aliens', 'peliculon, precio no negociable', 'Vitoria-Gasteiz', 20, NULL, NULL, '2021-08-23', 1, NULL, 11),
(10, 'Guardabarro ibiza 2000', 'guapisimo, pa que chulees. Precio no negociable', 'Vitoria-Gasteiz', 100, NULL, NULL, '2021-11-03', 1, NULL, 6),
(11, 'Anzuelos buenos', 'anzuelos sin usar, los vendo porque no los uso', 'San Sebastián', 15, NULL, NULL, '2021-11-04', 2, NULL, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Categoria`
--

CREATE TABLE `Categoria` (
  `idCategoria` int(5) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Categoria`
--

INSERT INTO `Categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Moviles y telefonia'),
(2, 'Casa y jardin'),
(3, 'Informatica'),
(4, 'Imagen y sonido'),
(5, 'Mascotas'),
(6, 'Motor'),
(7, 'Caza y pesca'),
(8, 'Deportes'),
(9, 'Juegos'),
(10, 'Moda y complementos'),
(11, 'Aficiones y ocio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Interaccion`
--

CREATE TABLE `Interaccion` (
  `idPerfil` int(5) NOT NULL,
  `idAnuncio` int(5) NOT NULL,
  `view` tinyint(1) DEFAULT NULL,
  `favorito` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Perfil`
--

CREATE TABLE `Perfil` (
  `idPerfil` int(5) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `localidad` varchar(50) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `cp` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `Perfil`
--

INSERT INTO `Perfil` (`idPerfil`, `usuario`, `password`, `email`, `telefono`, `direccion`, `provincia`, `localidad`, `pais`, `cp`) VALUES
(1, 'pepe', 'Peperron123$', 'pepe@gmail.com', '666444555', 'Calle Pepe 4 1D', 'Alava', 'Vitoria-Gasteiz', 'España', '01010'),
(2, 'juan', 'Juan123€', 'juan123@gmail.com', '666555544', 'Avenida Naciones Unidas 12 5B', 'Alava', 'Vitoria-Gasteiz', 'España', '01011');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD PRIMARY KEY (`idAnuncio`),
  ADD KEY `anun_per_admin_fk` (`idPerfil-Admin`),
  ADD KEY `anun_per_usu_fk` (`idPerfil-Comprador`),
  ADD KEY `anun_cat_fk` (`idCategoria`);

--
-- Indices de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `Interaccion`
--
ALTER TABLE `Interaccion`
  ADD PRIMARY KEY (`idPerfil`,`idAnuncio`),
  ADD KEY `inter_anuncio_perfil_fk` (`idAnuncio`);

--
-- Indices de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  ADD PRIMARY KEY (`idPerfil`),
  ADD UNIQUE KEY `usuario` (`usuario`,`email`,`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `Anuncio`
--
ALTER TABLE `Anuncio`
  MODIFY `idAnuncio` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `Categoria`
--
ALTER TABLE `Categoria`
  MODIFY `idCategoria` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `Perfil`
--
ALTER TABLE `Perfil`
  MODIFY `idPerfil` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `Anuncio`
--
ALTER TABLE `Anuncio`
  ADD CONSTRAINT `anun_cat_fk` FOREIGN KEY (`idCategoria`) REFERENCES `Categoria` (`idCategoria`),
  ADD CONSTRAINT `anun_per_admin_fk` FOREIGN KEY (`idPerfil-Admin`) REFERENCES `Perfil` (`idPerfil`),
  ADD CONSTRAINT `anun_per_usu_fk` FOREIGN KEY (`idPerfil-Comprador`) REFERENCES `Perfil` (`idPerfil`);

--
-- Filtros para la tabla `Interaccion`
--
ALTER TABLE `Interaccion`
  ADD CONSTRAINT `inter_anuncio_perfil_fk` FOREIGN KEY (`idAnuncio`) REFERENCES `Perfil` (`idPerfil`),
  ADD CONSTRAINT `inter_perfil_anuncio_fk` FOREIGN KEY (`idPerfil`) REFERENCES `Anuncio` (`idAnuncio`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
