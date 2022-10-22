-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2022 at 03:43 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `motos-app`
--

-- --------------------------------------------------------

--
-- Table structure for table `ESTUDIANTE`
--

CREATE TABLE `ESTUDIANTE` (
  `idESTUDIANTE` int(10) UNSIGNED NOT NULL,
  `USUARIO` varchar(50) NOT NULL,
  `PASSWORD_2` varchar(150) NOT NULL,
  `TELEFONO` varchar(10) NOT NULL,
  `ID_POWERCAMPUS` int(10) UNSIGNED NOT NULL,
  `FECHA_CREACION_USUARIO` date DEFAULT NULL,
  `NOMBRE` varchar(80) DEFAULT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `ESTADO` tinyint(1) NOT NULL,
  `IDENTIFICACION` varchar(90) NOT NULL,
  `SERVICIO` tinyint(1) NOT NULL,
  `CUENTA_ACTIVA` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ESTUDIANTE`
--

INSERT INTO `ESTUDIANTE` (`idESTUDIANTE`, `USUARIO`, `PASSWORD_2`, `TELEFONO`, `ID_POWERCAMPUS`, `FECHA_CREACION_USUARIO`, `NOMBRE`, `EMAIL`, `ESTADO`, `IDENTIFICACION`, `SERVICIO`, `CUENTA_ACTIVA`) VALUES
(1, 'carlosmateo', '$2y$10$9d8otwmgxZ2ma2/ylbrGTepd0c0WIMVN2np6Sxy5C5yupyVj89wde', '3012488842', 12342, '2022-10-14', 'Carlos Mateo', '', 1, '', 0, 0),
(2, 'carlosmateo', '$2y$10$yeZeKPkd51oDifFGXhys7OrNL/I/8rnwY/4d/GnjP7DsdNdEgnDMm', '3012488842', 312412, '2022-10-18', 'carlosmateo', '', 0, '', 0, 0),
(3, 'carlosmateo01', '$2y$10$XEuLs.F/gqHViS4LM2quz.sROqOUppgJyNZ5in9hUX/yyYc658aMK', '3012488842', 1234, '2022-10-18', 'carlosmateo01', 'carlosmateo484@gmail.com', 0, '', 0, 0),
(4, 'carlosmateo8923', '$2y$10$cVegLjML0iSx.d52rYvu2uVNmfxC7RPdLU99x2E48svLEunQ35mqK', '1000432432', 4, '2022-10-18', 'carlos Mateo Martinez', 'carlosmateo484@gmail.com', 0, '', 0, 0),
(5, 'carlosmateo092', '$2y$10$NrekkxVowWfm6EIPs0fiLeY7tap/S6fXu9NCe2sFtwYt21YikxLWq', '3006988536', 15, '2022-10-18', 'Carlos', 'carlosmateo484@gmail.com', 0, '', 0, 0),
(6, 'carlosmateo', '$2y$10$DFVB8VepujAiTu6fJHsrDe2lI11WUZwXzee.9uA7xHbtceu6wuuwW', '3012488842', 1, '2022-10-20', 'carlos Mateo Martinez', 'carlosmateo484@gmail.com', 0, '1', 0, 0),
(7, 'carlosmateo', '$2y$10$zTWdi8k9dvib8JiE3ig8tOd6aSgKdftRvatFS3rTnVx6qx6iDGR3K', '3012488842', 1, '2022-10-20', 'carlos Mateo Martinez', 'carlosmateo484@gmail.com', 0, '1', 0, 0),
(8, 'carlosmateo028', '$2y$10$mpnX7Jd5mmTeIaCHjMXRBuO.pFmCgG6zYzMFHqTRuWmv7bEKj0c66', '3012488842', 1, '2022-10-20', 'carlos', 'carlosmateo484@gmail.com', 0, '1', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PUNTUACION`
--

CREATE TABLE `PUNTUACION` (
  `idPUNTUACION` int(10) UNSIGNED NOT NULL,
  `RUTA_idRUTA` int(10) UNSIGNED NOT NULL,
  `PUNTUACION` int(10) UNSIGNED DEFAULT NULL,
  `COMENTARIO` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `RUTA`
--

CREATE TABLE `RUTA` (
  `idRUTA` int(10) UNSIGNED NOT NULL,
  `ESTUDIANTE_idESTUDIANTE` int(10) UNSIGNED NOT NULL,
  `COMPANERO_RUTA` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `VEHICULO`
--

CREATE TABLE `VEHICULO` (
  `idVEHICULO` int(10) UNSIGNED NOT NULL,
  `ESTUDIANTE_idESTUDIANTE` int(10) UNSIGNED NOT NULL,
  `PLACA` varchar(50) NOT NULL,
  `TIPO` varchar(100) NOT NULL,
  `MARCA` varchar(100) NOT NULL,
  `COLOR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ESTUDIANTE`
--
ALTER TABLE `ESTUDIANTE`
  ADD PRIMARY KEY (`idESTUDIANTE`);

--
-- Indexes for table `PUNTUACION`
--
ALTER TABLE `PUNTUACION`
  ADD PRIMARY KEY (`idPUNTUACION`),
  ADD KEY `PUNTUACION_FKIndex1` (`RUTA_idRUTA`);

--
-- Indexes for table `RUTA`
--
ALTER TABLE `RUTA`
  ADD PRIMARY KEY (`idRUTA`),
  ADD KEY `RUTA_FKIndex1` (`ESTUDIANTE_idESTUDIANTE`),
  ADD KEY `RUTA_FKIndex2` (`COMPANERO_RUTA`);

--
-- Indexes for table `VEHICULO`
--
ALTER TABLE `VEHICULO`
  ADD PRIMARY KEY (`idVEHICULO`),
  ADD KEY `Vehiculo_FKIndex1` (`ESTUDIANTE_idESTUDIANTE`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ESTUDIANTE`
--
ALTER TABLE `ESTUDIANTE`
  MODIFY `idESTUDIANTE` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `PUNTUACION`
--
ALTER TABLE `PUNTUACION`
  MODIFY `idPUNTUACION` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `RUTA`
--
ALTER TABLE `RUTA`
  MODIFY `idRUTA` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `VEHICULO`
--
ALTER TABLE `VEHICULO`
  MODIFY `idVEHICULO` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
