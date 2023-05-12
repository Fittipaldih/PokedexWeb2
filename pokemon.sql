-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-05-2023 a las 21:20:24
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pokemon`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pokemones`
--

CREATE TABLE `pokemones` (
  `idPokemon` int(100) NOT NULL,
  `numero` int(100) NOT NULL,
  `tipo` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pokemones`
--

INSERT INTO `pokemones` (`idPokemon`, `numero`, `tipo`, `nombre`, `descripcion`, `imagen`) VALUES
(8, 4, 'fuego', 'Charmander', 'Prefiere las cosas calientes. Dicen que cuando llueve le sale vapor de la punta de la cola.', 'charmander.png'),
(16, 257, 'fuego', 'Blaziquen', 'En combate, Blaziken expulsa vivas llamas por las muñecas y ataca al enemigo con fiereza. Cuanto más fuerte sea el enemigo, más intensas serán las llamas.', 'blaziken.png'),
(17, 1, 'planta', 'Bulbasaur', 'Este Pokémon nace con una semilla en el lomo, que brota con el paso del tiempo.', 'bulbasaur.png'),
(18, 5, 'fuego', 'Charmeleon', 'Este Pokémon de naturaleza agresiva ataca en combate con su cola llameante y hace trizas al rival con sus afiladas garras.', 'Charmeleon.png'),
(19, 658, 'agua', 'Greninja', 'Comprime el agua y crea estrellas ninja con las que ataca al enemigo. Cuando las hace girar a gran velocidad cortan en dos hasta el metal.', 'greninja.png'),
(20, 25, 'fuego', 'pikachu', 'Cuando se enfada, este Pokémon descarga la energía que almacena en el interior de las bolsas de las mejillas.', 'pikachu.png'),
(21, 254, 'planta', 'sceptile', 'Las hojas que le salen a Sceptile del cuerpo tienen unos bordes muy afilados. Este Pokémon es muy ágil, va saltando de rama en rama y se lanza sobre el enemigo por la espalda.', 'sceptile.png'),
(22, 7, 'agua', 'squirtle', 'Cuando retrae su largo cuello en el caparazón, dispara agua a una presión increíble.', 'squirtle.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `clave`) VALUES
('admi', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  ADD PRIMARY KEY (`idPokemon`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pokemones`
--
ALTER TABLE `pokemones`
  MODIFY `idPokemon` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
