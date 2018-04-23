-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Abr-2018 às 01:26
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `irotas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `carro`
--

CREATE TABLE `carro` (
  `placa` varchar(10) NOT NULL,
  `modelo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `CPF` varchar(15) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista_carro`
--

CREATE TABLE `motorista_carro` (
  `CPF_motorista` varchar(15) NOT NULL,
  `placa_carro` varchar(10) NOT NULL,
  `rota` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rota`
--

CREATE TABLE `rota` (
  `UUID` varchar(36) NOT NULL,
  `origem` varchar(50) NOT NULL,
  `destino` varchar(50) NOT NULL,
  `num_pecas` int(100) DEFAULT NULL,
  `num_pessoas` int(100) DEFAULT NULL,
  `tempo_estimado` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`placa`);

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `motorista_carro`
--
ALTER TABLE `motorista_carro`
  ADD PRIMARY KEY (`CPF_motorista`,`placa_carro`),
  ADD KEY `CPF_motorista` (`CPF_motorista`),
  ADD KEY `placa_carro` (`placa_carro`),
  ADD KEY `destino` (`rota`);

--
-- Indexes for table `rota`
--
ALTER TABLE `rota`
  ADD PRIMARY KEY (`UUID`);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `motorista_carro`
--
ALTER TABLE `motorista_carro`
  ADD CONSTRAINT `motorista_carro_ibfk_3` FOREIGN KEY (`rota`) REFERENCES `rota` (`UUID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `motorista_carro_ibfk_4` FOREIGN KEY (`CPF_motorista`) REFERENCES `motorista` (`CPF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motorista_carro_ibfk_5` FOREIGN KEY (`placa_carro`) REFERENCES `carro` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
