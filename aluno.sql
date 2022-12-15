-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 14-Dez-2022 às 12:07
-- Versão do servidor: 5.7.36
-- versão do PHP: 7.4.26

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

DROP TABLE IF EXISTS `tb_aluno`;
CREATE TABLE IF NOT EXISTS `tb_aluno` (
  `alu_id` int(6) NOT NULL AUTO_INCREMENT,
  `alu_nome` varchar(50) NOT NULL,
  `alu_turno` varchar(45) NOT NULL,
  `alu_ano` varchar(45) NOT NULL,
  `alu_foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`alu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`alu_id`, `alu_nome`, `alu_turno`, `alu_ano`, `alu_foto`) VALUES
(1, 'pp', 'tarde', '2', 'ASDASDASDASDASD');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_nota`
--

DROP TABLE IF EXISTS `tb_nota`;
CREATE TABLE IF NOT EXISTS `tb_nota` (
  `nota_id` int(8) NOT NULL AUTO_INCREMENT,
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
  `alu_id` int(6) NOT NULL,
  PRIMARY KEY (`nota_id`),
  KEY `fk_alu_nome` (`alu_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_prof`
--

DROP TABLE IF EXISTS `tb_prof`;
CREATE TABLE IF NOT EXISTS `tb_prof` (
  `prof_id` int(5) NOT NULL AUTO_INCREMENT,
  `prof_nome` varchar(45) NOT NULL,
  `prof_login` varchar(45) NOT NULL,
  `prof_pass` int(6) NOT NULL,
  PRIMARY KEY (`prof_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_prof`
--

INSERT INTO `tb_prof` (`prof_id`, `prof_nome`, `prof_login`, `prof_pass`) VALUES
(1, 'jose', 'admin', 1234);

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
