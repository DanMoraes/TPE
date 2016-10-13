-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09-Ago-2016 às 18:55
-- Versão do servidor: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tpe`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `voluntarios`
--

CREATE TABLE `voluntarios` (
  `CODIGO` int(11) NOT NULL,
  `NOME` varchar(70) NOT NULL,
  `EMAIL` varchar(70) NOT NULL,
  `TELEFONE_1` varchar(15) NOT NULL,
  `TELEFONE_2` varchar(15) NOT NULL,
  `CADASTRO` date NOT NULL,
  `CONGREGACAO` varchar(50) NOT NULL,
  `PRIVILEGIO` varchar(5) NOT NULL,
  `CIRCUITO` varchar(1) NOT NULL,
  `TREINAMENTO` varchar(1) NOT NULL,
  `SC_AVALIACAO_1` varchar(1) NOT NULL,
  `SC_AVALIACAO_2` varchar(1) NOT NULL,
  `SC_AVALIACAO_3` varchar(1) NOT NULL,
  `SC_AVALIACAO_4` varchar(1) NOT NULL,
  `CCA_AVALIACAO_1` varchar(1) NOT NULL,
  `CCA_AVALIACAO_2` varchar(1) NOT NULL,
  `CCA_AVALIACAO_3` varchar(1) NOT NULL,
  `CCA_AVALIACAO_4` varchar(1) NOT NULL,
  `SEC_AVALIACAO_1` varchar(1) NOT NULL,
  `SEC_AVALIACAO_2` varchar(1) NOT NULL,
  `SEC_AVALIACAO_3` varchar(1) NOT NULL,
  `SEC_AVALIACAO_4` varchar(1) NOT NULL,
  `SS_AVALIACAO_1` varchar(1) NOT NULL,
  `SS_AVALIACAO_2` varchar(1) NOT NULL,
  `SS_AVALIACAO_3` varchar(1) NOT NULL,
  `SS_AVALIACAO_4` varchar(1) NOT NULL,
  `ESCALADO` varchar(1) NOT NULL,
  `SEGUNDA` varchar(6) NOT NULL,
  `TERCA` varchar(6) NOT NULL,
  `QUARTA` varchar(6) NOT NULL,
  `QUINTA` varchar(6) NOT NULL,
  `SEXTA` varchar(6) NOT NULL,
  `SABADO` varchar(6) NOT NULL,
  `DOMINGO` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `voluntarios`
--

INSERT INTO `voluntarios` (`CODIGO`, `NOME`, `EMAIL`, `TELEFONE_1`, `TELEFONE_2`, `CADASTRO`, `CONGREGACAO`, `PRIVILEGIO`, `CIRCUITO`, `TREINAMENTO`, `SC_AVALIACAO_1`, `SC_AVALIACAO_2`, `SC_AVALIACAO_3`, `SC_AVALIACAO_4`, `CCA_AVALIACAO_1`, `CCA_AVALIACAO_2`, `CCA_AVALIACAO_3`, `CCA_AVALIACAO_4`, `SEC_AVALIACAO_1`, `SEC_AVALIACAO_2`, `SEC_AVALIACAO_3`, `SEC_AVALIACAO_4`, `SS_AVALIACAO_1`, `SS_AVALIACAO_2`, `SS_AVALIACAO_3`, `SS_AVALIACAO_4`, `ESCALADO`, `SEGUNDA`, `TERCA`, `QUARTA`, `QUINTA`, `SEXTA`, `SABADO`, `DOMINGO`) VALUES
(6, 'Marcio Alexandre Silva', 'marciosilva.pira@gmail.com', '(19) 3425-5416', '(19) 98182-0543', '2016-08-09', 'LS Piracicaba', 'A', 'C', 'S', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'S', 'A', 'A', 'B', '', '', '', ''),
(7, 'Fabio', 'fabio@gmail.com', '', '(19) 98106-9983', '2017-04-14', 'Circuito', 'A', 'A', 'S', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', 'N', 'A', 'ABC', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `voluntarios`
--
ALTER TABLE `voluntarios`
  ADD PRIMARY KEY (`CODIGO`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `voluntarios`
--
ALTER TABLE `voluntarios`
  MODIFY `CODIGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
