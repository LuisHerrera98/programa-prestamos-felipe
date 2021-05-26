-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2021 at 09:49 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestamo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bases`
--

CREATE TABLE `bases` (
  `id` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `base` int(11) NOT NULL,
  `cobrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bases`
--

INSERT INTO `bases` (`id`, `fecha`, `base`, `cobrador_id`) VALUES
(4, 'Lunes 24 de Mayo 2021', 2500, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cobradores`
--

CREATE TABLE `cobradores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `base` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cobradores`
--

INSERT INTO `cobradores` (`id`, `nombre`, `base`) VALUES
(2, 'german', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `cobros`
--

CREATE TABLE `cobros` (
  `id` int(11) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valorCuota` int(11) NOT NULL,
  `forma` varchar(100) NOT NULL,
  `id_cobrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cobros`
--

INSERT INTO `cobros` (`id`, `fecha`, `nombre`, `valorCuota`, `forma`, `id_cobrador`) VALUES
(4, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(5, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(6, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(7, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(8, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(9, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(10, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(11, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(12, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(13, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(14, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(15, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(16, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(17, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(18, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(19, 'Lunes 24 de Mayo 2021', 'luis', 1200, 'efectivo', 2),
(20, 'Lunes 24 de Mayo 2021', 'nacho', 2300, 'efectivo', 2),
(21, 'martes prueba', 'luis', 2000, 'efectivo', 2),
(22, 'martes prueba', 'nacho', 2300, 'efectivo', 2),
(23, 'martes prueba', 'nacho', 2300, 'mercadopago', 2);

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `credito_id` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `creditos`
--

CREATE TABLE `creditos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `credito` int(11) NOT NULL,
  `cuotas` int(11) NOT NULL,
  `valorCuota` int(11) NOT NULL,
  `cobrador_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `creditos`
--

INSERT INTO `creditos` (`id`, `nombre`, `credito`, `cuotas`, `valorCuota`, `cobrador_id`) VALUES
(3, 'nacho', 20000, 10, 2300, 2),
(5, 'luis', 20000, 10, 2000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cuotas`
--

CREATE TABLE `cuotas` (
  `id` int(11) NOT NULL,
  `credito_id` int(11) NOT NULL,
  `cobrador_id` int(11) NOT NULL,
  `valorCuota` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cuotas`
--

INSERT INTO `cuotas` (`id`, `credito_id`, `cobrador_id`, `valorCuota`, `estado`) VALUES
(21, 3, 2, 2300, 'pagado'),
(22, 3, 2, 2300, 'pagado'),
(23, 3, 2, 2300, 'pagado'),
(24, 3, 2, 2300, 'pagado'),
(25, 3, 2, 2300, 'pagadoMercado'),
(26, 3, 2, 2300, 'falta'),
(27, 3, 2, 2300, 'falta'),
(28, 3, 2, 2300, 'falta'),
(29, 3, 2, 2300, 'falta'),
(30, 3, 2, 2300, 'falta'),
(51, 5, 2, 2000, 'pagado'),
(52, 5, 2, 2000, 'falta'),
(53, 5, 2, 2000, 'falta'),
(54, 5, 2, 2000, 'falta'),
(55, 5, 2, 2000, 'falta'),
(56, 5, 2, 2000, 'falta'),
(57, 5, 2, 2000, 'falta'),
(58, 5, 2, 2000, 'falta'),
(59, 5, 2, 2000, 'falta'),
(60, 5, 2, 2000, 'falta');

-- --------------------------------------------------------

--
-- Table structure for table `gastos`
--

CREATE TABLE `gastos` (
  `id` int(11) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `cobrador_id` int(11) NOT NULL,
  `monto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gastos`
--

INSERT INTO `gastos` (`id`, `comentario`, `fecha`, `cobrador_id`, `monto`) VALUES
(3, 'pago de german', 'Lunes 24 de Mayo 2021', 2, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobradores`
--
ALTER TABLE `cobradores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cobros`
--
ALTER TABLE `cobros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gastos`
--
ALTER TABLE `gastos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bases`
--
ALTER TABLE `bases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cobradores`
--
ALTER TABLE `cobradores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cobros`
--
ALTER TABLE `cobros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `creditos`
--
ALTER TABLE `creditos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `gastos`
--
ALTER TABLE `gastos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
