-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2019 às 14:33
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `financeirophp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `idUser` int(11) NOT NULL,
  `nomeUser` varchar(150) NOT NULL,
  `emailUser` varchar(150) NOT NULL,
  `senhaUser` varchar(150) NOT NULL,
  `createAt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`idUser`, `nomeUser`, `emailUser`, `senhaUser`, `createAt`) VALUES
(2, 'José Neto', 'gmail@gmail.com', 'c84258e9c39059a89ab77d846ddab909', '0000-00-00 00:00:00'),
(3, 'jose', 'gmail2@gmail.com', 'b39325be06939abb9f722f659f9841c0', '2019-04-05 16:20:52'),
(4, 'jose neto oliveira', 'admin2@gmail.com', '3015ca4f270b6938b27c95863174a8db', '2019-04-05 16:21:46'),
(5, 'jose neto oliveira2', 'admin222@gmail.com', '3dd5863d10375917b41cf8e83b1d208b', '2019-04-05 16:22:55'),
(6, 'JosÃ© Neto', 'neto.jpaulo@gmail.com', 'b39325be06939abb9f722f659f9841c0', '2019-04-05 16:23:52'),
(7, 'jose neto oliveira2', 'asdff@gmail.com', 'a3dcb4d229de6fde0db5686dee47145d', '2019-04-05 18:46:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
