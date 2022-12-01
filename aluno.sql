-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21-Ago-2022 às 20:33
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `aluno`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `alu_id` int(6) NOT NULL,
  `alu_nome` varchar(50) NOT NULL,
  `alu_turno` varchar(45) NOT NULL,
  `alu_ano` varchar(45) NOT NULL,
  `alu_foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`alu_id`, `alu_nome`, `alu_turno`, `alu_ano`, `alu_foto`) VALUES
(1, 'pp', 'tarde', '2', 'ASDASDASDASDASD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nota`
--

CREATE TABLE `tb_nota` (
  `nota_id` int(8) NOT NULL,
  `nota_período` varchar(3) DEFAULT NULL,
  `nota_tipo` varchar(10) NOT NULL,
  `nota_port` varchar(3) DEFAULT NULL,
  `nota_arte` varchar(3) DEFAULT NULL,
  `nota_EF` varchar(3) DEFAULT NULL,
  `nota_hist` varchar(3) DEFAULT NULL,
  `nota_geo` varchar(3) DEFAULT NULL,
  `nota_mat` varchar(3) DEFAULT NULL,
  `nota_cie` varchar(3) DEFAULT NULL,
  `nota_EC` varchar(3) DEFAULT NULL,
  `Faltas` int(3) DEFAULT NULL,
  `alu_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`alu_id`);

--
-- Índices para tabela `tb_nota`
--
ALTER TABLE `tb_nota`
  ADD PRIMARY KEY (`nota_id`),
  ADD KEY `fk_alu_nome` (`alu_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `alu_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_nota`
--
ALTER TABLE `tb_nota`
  MODIFY `nota_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_nota`
--
ALTER TABLE `tb_nota`
  ADD CONSTRAINT `fk_alu_nome` FOREIGN KEY (`alu_id`) REFERENCES `tb_aluno` (`alu_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
