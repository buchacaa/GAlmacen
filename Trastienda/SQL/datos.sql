-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-01-2026 a las 13:32:03
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `ID` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomape` varchar(50) NOT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `historico`
--

INSERT INTO `historico` (`ID`, `login`, `passw`, `email`, `nomape`, `poblacion`, `telefono`, `imagen`) VALUES
(103, '22222222N', 'fb77679472331e0296215ba6206d1293', 'mabosa@gmail.com', 'Manuela Bono Sánchez', 'Adra', '606334618', 'historico/20260118-120109_22222222N.jpg'),
(104, '23344567V', '93a0a0ef175a74a0ab3f5087b607d5de', 'marupe@mail.com', 'María Ruiz Pérez', 'Adra', '654123474', 'historico/20260118-120107_23344567V.jpg'),
(107, '32324456K', '93a0a0ef175a74a0ab3f5087b607d5de', 'juloga2@gmai.com', 'Julia López Garcés', 'Adra', '695231472', 'historico/20260115-070105_32324456K.jpg'),
(110, '34444222N', '93a0a0ef175a74a0ab3f5087b607d5de', 'ansifer@gmail.com', 'Antonio Sierra Fernández', 'Roquetas de Mar', '606284618', 'historico/20260118-120123_34444222N.jpg'),
(113, '44444444G', '93a0a0ef175a74a0ab3f5087b607d5de', 'ansava@gmail.com', 'Antonio Sánchez Vazquez', 'El Ejido', '537975312', 'historico/20260118-120155_44444444G.jpg'),
(116, '45454545H', '6a52797885494d535fe7ab99e9902045', 'mibalo@mail.com', 'Miguel Baena López', 'Roquetas de Mar', '606284618', 'historico/20260115-070157_45454545H.JPG'),
(121, '12121212F', '6a52797885494d535fe7ab99e9902045', 'misaco@mail.com', 'Miguel Sanz Contreras', 'Suflí', '678665444', 'historico/20260118-120134_12121212F.png'),
(131, '21212121f', '6a52797885494d535fe7ab99e9902045', 'malovi@mail.com', 'María López Vicente', 'Adra', '660556443', 'historico/20260115-070141_21212121F.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `passw` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nomape` varchar(50) NOT NULL,
  `poblacion` varchar(50) DEFAULT NULL,
  `telefono` varchar(9) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `login`, `passw`, `email`, `nomape`, `poblacion`, `telefono`, `imagen`) VALUES
(101, '17513693N', 'fd66a24e5ae306aa6ced0e1207add8ce', 'albosi@gmail.com', 'Alfonso Bonillo Sierra', 'Roquetas de Mar', '606284618', 'imagenes/17513693N.png'),
(102, '21122113N', 'fb77679472331e0296215ba6206d1293', 'enradu@mail.com', 'Enrique Ramirez Duran', 'El Ejido', '603212445', 'IMAGENES/21122113N.JPG'),
(105, '24444222N', 'fd66a24e5ae306aa6ced0e1207add8ce', 'malogo@mail.com', 'Manuel López Gómez', 'Roquetas de Mar', '606060606', 'imagenes/24444222N.png'),
(106, '27513693N', '93a0a0ef175a74a0ab3f5087b607d5de', 'camilo@gmail.com', 'Carlos Miranda López', 'Roquetas de Mar', '606284618', 'imagenes/27513693N.jpg'),
(108, '33333333H', '93a0a0ef175a74a0ab3f5087b607d5de', 'magaga@mail.com', 'Mario García García', 'Cádiz', '665554443', 'imagenes/33333333H.jpg'),
(111, '34455654V', '93a0a0ef175a74a0ab3f5087b607d5de', 'andosa@mail.com', 'Antonio Dominguez Sánchez', 'Adra', '68899902', 'imagenes/34455654V.png'),
(112, '42622143M', '93a0a0ef175a74a0ab3f5087b607d5de', 'anruma@gmail.com', 'Ángela Ruiz Martínez', 'Vícar', '426221143', 'imagenes/42622143M.png'),
(114, '56655665F', '6a52797885494d535fe7ab99e9902045', 'juheva@mail.com', 'Juan Hernández Valle', 'Adra', '655449009', 'imagenes/56655665F.png'),
(124, '89898989F', '6a52797885494d535fe7ab99e9902045', 'jugaji@mail.com', 'Julian García Jiménez', 'La Puebla', '640334226', 'imagenes/89898989F.png'),
(125, '56565643G', '6a52797885494d535fe7ab99e9902045', 'franga@gmail.com', 'Francisco Antón García', 'Roquetas de Mar', '606284618', 'imagenes/56565643G.png'),
(128, '11223332G', '6a52797885494d535fe7ab99e9902045', 'franga@gmail.com', 'Francisca García', 'Roquetas de Mar', '060628461', 'imagenes/111222111G.png'),
(130, '111222333H', '6a52797885494d535fe7ab99e9902045', 'misato@mail.com', 'IES TURANIANA', 'Roquetas de Mar', '060628461', 'imagenes/111222333H.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
