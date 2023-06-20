-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-06-2023 a las 21:34:33
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
-- Base de datos: `bilblioteca`
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
(31, 'Dr', 'Marietta Darter', 'non-fiction', 1994, 8),
(32, 'Ms', 'Florrie Smail', 'fiction', 2010, 8),
(33, 'Rev', 'Barnaby Barsam', 'biography', 1996, 8),
(34, 'Honorable', 'Pauly Gurnay', 'fiction', 1995, 9),
(35, 'Honorable', 'Leslie Ducrow', 'biography', 1992, 7),
(36, 'Honorable', 'Teresa Cheston', 'fiction', 1993, 1),
(37, 'Honorable', 'Berty Clutten', 'non-fiction', 2004, 3),
(38, 'Mrs', 'Thaddus Whittenbury', 'biography', 2013, 8),
(39, 'Dr', 'Persis Durtnal', 'non-fiction', 1994, 4),
(40, 'Ms', 'Hew Peete', 'biography', 1988, 4),
(41, 'Mrs', 'Malinda Melbourne', 'fiction', 2003, 9),
(42, 'Mrs', 'Paquito Jugging', 'biography', 2008, 3),
(43, 'Rev', 'Agnesse Hellwing', 'biography', 1993, 6),
(44, 'Honorable', 'Bertha Sein', 'biography', 1994, 9),
(45, 'Honorable', 'Donaugh Foster-Smith', 'non-fiction', 1997, 1),
(46, 'Mrs', 'Cora McHarry', 'non-fiction', 2002, 2),
(47, 'Honorable', 'Augustus Doumenc', 'non-fiction', 2003, 9),
(48, 'Ms', 'Paton Allman', 'fiction', 2004, 2),
(49, 'Dr', 'Onida Brezlaw', 'biography', 2012, 4),
(50, 'Mr', 'Shelly Offer', 'fiction', 2000, 4),
(51, 'Rev', 'Sunshine Younghusband', 'fiction', 2004, 1),
(52, 'Rev', 'Aurelia Cusiter', 'non-fiction', 2009, 2),
(53, 'Rev', 'Minne Harlock', 'biography', 1985, 2),
(54, 'Ms', 'Ketty Salsbury', 'biography', 1988, 5),
(55, 'Ms', 'Zebedee Stonhewer', 'biography', 2009, 1),
(56, 'Mrs', 'Whittaker Daniau', 'biography', 2007, 5),
(57, 'Mrs', 'Nickolas Kindle', 'fiction', 2012, 8),
(58, 'Honorable', 'Constancy Wardingly', 'fiction', 2001, 6),
(59, 'Mr', 'Raynard Olyet', 'fiction', 2006, 2),
(60, 'Dr', 'Wolfy Langworthy', 'fiction', 2001, 1),
(61, 'Dr', 'Binnie Parradice', 'biography', 1995, 2),
(62, 'Dr', 'Winifred Kleiner', 'fiction', 1997, 7),
(63, 'Dr', 'Katti Gulc', 'fiction', 2003, 1),
(64, 'Rev', 'Querida Currom', 'fiction', 2012, 9),
(65, 'Mrs', 'Herculie Forsbey', 'non-fiction', 2007, 7),
(66, 'Dr', 'Lucille Bibey', 'biography', 1987, 8),
(67, 'Mrs', 'Hamilton Crinson', 'non-fiction', 1994, 8),
(68, 'Ms', 'Roselle Bison', 'non-fiction', 2009, 5),
(69, 'Honorable', 'Kev Absolom', 'fiction', 2012, 3),
(70, 'Ms', 'Blondie Rattenberie', 'fiction', 2012, 6),
(71, 'Ms', 'Lyndsie Rattery', 'biography', 2008, 4),
(72, 'Mr', 'Orv Webling', 'non-fiction', 2005, 4),
(73, 'Rev', 'Hope Davis', 'non-fiction', 1997, 3),
(74, 'Dr', 'Devon Farrant', 'biography', 2005, 5),
(75, 'Rev', 'Josefa Haestier', 'biography', 2001, 4),
(76, 'Dr', 'Ernestus Rabley', 'non-fiction', 2001, 6),
(77, 'Mr', 'Zachary Schroeder', 'biography', 1994, 4),
(78, 'Dr', 'Rochette Dorant', 'non-fiction', 1997, 2),
(79, 'Mr', 'Mel Brikner', 'fiction', 2004, 1),
(80, 'Mrs', 'Berti Raraty', 'non-fiction', 1998, 2),
(81, 'Dr', 'Nessa Lavens', 'biography', 1987, 7),
(82, 'Honorable', 'Adham Pellew', 'non-fiction', 2000, 4),
(83, 'Honorable', 'Eldridge Cattellion', 'non-fiction', 2000, 4),
(84, 'Mrs', 'Tobin Ogilby', 'biography', 1992, 9),
(85, 'Mrs', 'Theodora Klosser', 'biography', 1998, 3),
(86, 'Dr', 'Sheri Aucutt', 'fiction', 2006, 6),
(87, 'Ms', 'Alix Bispo', 'non-fiction', 1994, 8),
(88, 'Mr', 'Ruthie Shave', 'non-fiction', 1993, 5),
(89, 'Dr', 'Hallie Capelle', 'biography', 1996, 9),
(90, 'Dr', 'Pascal Taborre', 'fiction', 2001, 5),
(91, 'Mr', 'Margeaux Waison', 'non-fiction', 1992, 1),
(92, 'Ms', 'Tiffie Ghelerdini', 'non-fiction', 1993, 6),
(93, 'Rev', 'Sonja Ladley', 'fiction', 1998, 9),
(94, 'Ms', 'Zared Dotson', 'fiction', 2008, 6),
(95, 'Ms', 'Amalie Titchen', 'fiction', 2000, 4),
(96, 'Mr', 'Farrel Orr', 'biography', 1991, 4),
(97, 'Honorable', 'Catlaina Beardwell', 'non-fiction', 2001, 8),
(98, 'Honorable', 'Caty Badrock', 'non-fiction', 2009, 3),
(99, 'Rev', 'Grant Figliovanni', 'fiction', 2011, 1),
(100, 'Honorable', 'Prentiss McParland', 'biography', 1999, 5);

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
  `tal` varchar(255) DEFAULT NULL,
  `dir` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
