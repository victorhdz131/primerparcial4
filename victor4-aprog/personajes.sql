-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2025 at 07:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `personajes`
--

-- --------------------------------------------------------

--
-- Table structure for table `buenomalos`
--

CREATE TABLE `buenomalos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buenomalos`
--

INSERT INTO `buenomalos` (`id`, `nombre`) VALUES
(1, 'Heroe'),
(2, 'Villano'),
(3, 'Ambas'),
(4, 'Capitán');

-- --------------------------------------------------------

--
-- Table structure for table `equipos`
--

CREATE TABLE `equipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipos`
--

INSERT INTO `equipos` (`id`, `nombre`) VALUES
(1, 'Equipo Mario'),
(2, 'Equipo Bowser'),
(3, 'Equipo Yoshi'),
(4, 'Equipo Wario'),
(5, 'Equipo Donkey Kong'),
(6, 'Equipo Luigi');

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Hombre'),
(2, 'Mujer'),
(3, 'Otro');

-- --------------------------------------------------------

--
-- Table structure for table `mario`
--

CREATE TABLE `mario` (
  `id` int(11) NOT NULL,
  `juego` varchar(50) NOT NULL,
  `saga` varchar(50) NOT NULL,
  `año` varchar(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_buenomalo` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `id_genero` int(11) NOT NULL,
  `id_reino` int(11) NOT NULL,
  `aliados` varchar(50) NOT NULL,
  `consola` varchar(50) NOT NULL,
  `mejorjuego` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mario`
--

INSERT INTO `mario` (`id`, `juego`, `saga`, `año`, `id_usuario`, `id_buenomalo`, `id_equipo`, `id_genero`, `id_reino`, `aliados`, `consola`, `mejorjuego`) VALUES
(1, 'mario', 'party', '2008', 2, 1, 3, 1, 1, 'baby mario', 'swich', 'mario kart');

-- --------------------------------------------------------

--
-- Table structure for table `reinos`
--

CREATE TABLE `reinos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reinos`
--

INSERT INTO `reinos` (`id`, `nombre`) VALUES
(1, 'Reino Champiñón'),
(2, 'Reino Koopa'),
(3, 'Reino Sarasaland'),
(4, 'Isla Yoshi'),
(5, 'Isla Donkey Kong'),
(6, 'Observatorio'),
(7, 'Reino Boo'),
(8, 'Reino Delfino'),
(9, 'Reino Cielo'),
(10, 'Reino Hielo'),
(11, 'Reino Lava'),
(12, 'Reino Fantasma');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`) VALUES
(1, 'Mario'),
(2, 'Luigi'),
(3, 'Peach'),
(4, 'Bowser'),
(5, 'Donkey Kong'),
(6, 'Yoshi'),
(7, 'Toad'),
(8, 'King Boo'),
(9, 'Goombas'),
(10, 'Hermanos martillo'),
(11, 'Bebé Luigi'),
(12, 'Bowsy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buenomalos`
--
ALTER TABLE `buenomalos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mario`
--
ALTER TABLE `mario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_buenomalo` (`id_buenomalo`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_genero` (`id_genero`),
  ADD KEY `id_reino` (`id_reino`);

--
-- Indexes for table `reinos`
--
ALTER TABLE `reinos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buenomalos`
--
ALTER TABLE `buenomalos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `equipos`
--
ALTER TABLE `equipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mario`
--
ALTER TABLE `mario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `reinos`
--
ALTER TABLE `reinos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mario`
--
ALTER TABLE `mario`
  ADD CONSTRAINT `fk_buenomalos` FOREIGN KEY (`id_buenomalo`) REFERENCES `buenomalos` (`id`),
  ADD CONSTRAINT `fk_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id`),
  ADD CONSTRAINT `fk_genero` FOREIGN KEY (`id_genero`) REFERENCES `generos` (`id`),
  ADD CONSTRAINT `fk_reino` FOREIGN KEY (`id_reino`) REFERENCES `reinos` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
