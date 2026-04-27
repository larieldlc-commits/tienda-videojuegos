-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql201.infinityfree.com
-- Tiempo de generación: 27-04-2026 a las 00:27:40
-- Versión del servidor: 11.4.10-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_41762913_epiz_12345678_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `videojuego_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`) VALUES
(1, 'lariel', 'lariler09@gmail.com', '$2y$10$hILfump.0oqpIDXrxHtSpuyAM.vKe42gAKIvlBgHTfRbGBAgNacn2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `videojuegos`
--

CREATE TABLE `videojuegos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `videojuegos`
--

INSERT INTO `videojuegos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(4, 'Sun Wukong', '60.00', 'wukong.jpg', 'Juego basado en el rey mono con combates'),
(1, 'FIFA 24', '50.00', 'fifa.jpg', 'Juego de fútbol donde controlas un equipo hasta la victoria'),
(3, 'Cuphead', '20.00', 'cuphead.png', 'Juego de plataformas estilo retro'),
(2, 'GTA V', '30.00', 'gta.jpg', 'GTA es un juego de mundo abierto donde puedes controlar varios personajes, hacer misiones, y robar autos'),
(5, 'Mortal Kombat', '50.00', 'mk.jpg', 'Juego de peleas con combates intensos'),
(6, 'Need for Speed', '40.00', 'nfs.jpg', 'Juego de carreras callejeras'),
(7, 'Assassins Creed', '45.00', 'ac.jpg', 'Juego de acción y sigilo en mundo abierto'),
(8, 'Minecraft', '25.00', 'minecraft.png', 'Juego de construcción y supervivencia en mundo abierto'),
(9, 'Red Dead Redemption', '30.00', 'rdr1.jpg', 'Aventura del viejo oeste con historia épica'),
(10, 'Red Dead Redemption 2', '50.00', 'rdr2.jpg', 'Historia profunda en el lejano oeste con gráficos realistas'),
(11, 'God of War', '40.00', 'gow.jpg', 'Mitología griega con acción intensa'),
(12, 'God of War Ragnarök', '60.00', 'gowr.jpg', 'Continuación épica de la saga nórdica'),
(13, 'Devil May Cry 5', '35.00', 'dmc5.jpg', 'Acción rápida con demonios y combos espectaculares'),
(14, 'DOOM', '20.00', 'doom.jpg', 'Shooter clásico contra demonios');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `videojuegos`
--
ALTER TABLE `videojuegos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
