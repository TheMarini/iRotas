-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20-Abr-2018 às 16:24
-- Versão do servidor: 5.6.34-log
-- PHP Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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

--
-- Extraindo dados da tabela `carro`
--

INSERT INTO `carro` (`placa`, `modelo`) VALUES
('ABC-1234', 'Honda Civic'),
('HJS-9289', 'Corsa'),
('IUS-1923', 'Philton RED'),
('KLI-2891', 'BMW-C20');

-- --------------------------------------------------------

--
-- Estrutura da tabela `destino`
--

CREATE TABLE `destino` (
  `UUID` varchar(36) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `num_pecas` int(100) DEFAULT NULL,
  `num_pessoas` int(100) DEFAULT NULL,
  `tempo_estimado` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `destino`
--

INSERT INTO `destino` (`UUID`, `nome`, `num_pecas`, `num_pessoas`, `tempo_estimado`) VALUES
('25769c6c-d34d-4bfe-ba98-e0ee856f3e7a', 'Pátio Savassi', 12, 3, '00:23:00'),
('c4a760a8-dbcf-5254-a0d9-6a4474bd1b62', 'Praça da Liberdade', 9, 1, '00:17:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista`
--

CREATE TABLE `motorista` (
  `CPF` varchar(15) NOT NULL,
  `nome` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motorista`
--

INSERT INTO `motorista` (`CPF`, `nome`) VALUES
('452.073.163-84', 'Roberto Alves'),
('587.918.982-74', 'Carlos Souza');

-- --------------------------------------------------------

--
-- Estrutura da tabela `motorista_carro`
--

CREATE TABLE `motorista_carro` (
  `id` int(11) NOT NULL,
  `CPF_motorista` varchar(15) NOT NULL,
  `placa_carro` varchar(10) NOT NULL,
  `destino` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motorista_carro`
--

INSERT INTO `motorista_carro` (`id`, `CPF_motorista`, `placa_carro`, `destino`) VALUES
(1, '452.073.163-84', 'ABC-1234', '25769c6c-d34d-4bfe-ba98-e0ee856f3e7a'),
(2, '587.918.982-74', 'IUS-1923', 'c4a760a8-dbcf-5254-a0d9-6a4474bd1b62');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`placa`);

--
-- Indexes for table `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`UUID`);

--
-- Indexes for table `motorista`
--
ALTER TABLE `motorista`
  ADD PRIMARY KEY (`CPF`);

--
-- Indexes for table `motorista_carro`
--
ALTER TABLE `motorista_carro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `CPF_motorista` (`CPF_motorista`),
  ADD KEY `placa_carro` (`placa_carro`),
  ADD KEY `destino` (`destino`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `motorista_carro`
--
ALTER TABLE `motorista_carro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `motorista_carro`
--
ALTER TABLE `motorista_carro`
  ADD CONSTRAINT `motorista_carro_ibfk_3` FOREIGN KEY (`destino`) REFERENCES `destino` (`UUID`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `motorista_carro_ibfk_4` FOREIGN KEY (`CPF_motorista`) REFERENCES `motorista` (`CPF`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `motorista_carro_ibfk_5` FOREIGN KEY (`placa_carro`) REFERENCES `carro` (`placa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
