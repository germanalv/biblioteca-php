-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-06-2023 a las 18:56:07
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `cant_ejemplares` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `anio`, `cant_ejemplares`) VALUES
(1, 'Rev', 'Corabel Baglin', 'non-fiction', 1992, 9),
(2, 'Rev', 'Griffie Goodie', 'fiction', 2010, 3),
(3, 'Honorable', 'Neilla Valadez', 'biography', 2002, 3),
(4, 'Ms', 'Micheil Zorzoni', 'biography', 2004, 8),
(5, 'Ms', 'Sumner Pastor', 'non-fiction', 2002, 2),
(6, 'Mr', 'Barney Maughan', 'biography', 2007, 5),
(7, 'Mrs', 'Nickola Cowderay', 'non-fiction', 2011, 2),
(8, 'Dr', 'Gracie Ommanney', 'fiction', 2002, 6),
(9, 'Rev', 'Morna Deport', 'biography', 1984, 3),
(10, 'Mrs', 'Denice McCloid', 'fiction', 2008, 8),
(11, 'Mrs', 'Annabel Luto', 'fiction', 2007, 3),
(12, 'Ms', 'Jerrome Boothby', 'biography', 2010, 6),
(13, 'Ms', 'Brannon Wotton', 'biography', 1995, 7),
(14, 'Honorable', 'Desiree Kopfer', 'non-fiction', 2008, 3),
(15, 'Honorable', 'Kipp Shilling', 'fiction', 1996, 2),
(16, 'Rev', 'Candy Leuty', 'fiction', 2003, 7),
(17, 'Honorable', 'Cele Panther', 'biography', 1996, 8),
(18, 'Mr', 'Horst Hing', 'fiction', 1998, 1),
(19, 'Dr', 'Jenna Loynton', 'non-fiction', 2001, 2),
(20, 'Honorable', 'Emilie Smaling', 'biography', 2011, 7),
(21, 'Rev', 'Prinz Brumen', 'fiction', 2006, 9),
(22, 'Mrs', 'Shanan Blenkensop', 'non-fiction', 1994, 3),
(23, 'Mr', 'Sonnie Black', 'biography', 2011, 8),
(24, 'Dr', 'Maiga Rennolds', 'non-fiction', 1992, 4),
(25, 'Dr', 'Emilie Spurdens', 'biography', 2001, 5),
(26, 'Mrs', 'Hobie Irnis', 'non-fiction', 1993, 5),
(27, 'Honorable', 'Bondie Prinnett', 'biography', 1986, 7),
(28, 'Rev', 'Alastair Gaffney', 'fiction', 2006, 4),
(29, 'Mr', 'Myca Kilby', 'non-fiction', 1985, 9),
(30, 'Rev', 'Regan Roney', 'fiction', 2006, 5),
(101, 'Libro 1', 'Carlos', 'Comedia', 2007, 5),
(102, 'Libro 1', 'Carlos', 'Comedia', 2007, 5),
(103, 'Libro 1', 'Carlos', 'Comedia', 2007, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `id` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_prestamo` date DEFAULT NULL,
  `fecha_devolución` date DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `ci` varchar(100) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `ci`, `nombre`, `apellido`, `mail`, `tel`, `dir`, `password`) VALUES
(1, '55555555', 'German', 'Alvarez', 'german@mail.com', '1234567', 'direccion', '123456'),
(2, '123132', 'pepe', 'loco', 'mail@mail.com', '09809809', 'direccion', '123456'),
(3, '72727272', 'Richard', 'Ferreira', 'richard@mail.com', '1234512', 'Direccion Richard', '123456');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_libro` (`id_libro`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_1` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
