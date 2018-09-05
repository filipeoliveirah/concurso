-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Sep 05, 2018 at 02:07 AM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `concurso`
--

-- --------------------------------------------------------

--
-- Table structure for table `areadeatuacao`
--

CREATE TABLE IF NOT EXISTS `areadeatuacao` (
  `idAreaDeAtuacao` int(11) NOT NULL,
  `nomeAreaDeAtuacao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `areadeatuacao`
--

INSERT INTO `areadeatuacao` (`idAreaDeAtuacao`, `nomeAreaDeAtuacao`) VALUES
(1, ''),
(2, 'Controle de Gestão'),
(3, 'Controle de Gestão');

-- --------------------------------------------------------

--
-- Table structure for table `assunto`
--

CREATE TABLE IF NOT EXISTS `assunto` (
  `idAssunto` int(11) NOT NULL,
  `nomeAssunto` varchar(255) NOT NULL,
  `disciplina_idDisciplina` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assunto`
--

INSERT INTO `assunto` (`idAssunto`, `nomeAssunto`, `disciplina_idDisciplina`) VALUES
(1, 'Lógica Matemática', 3),
(4, 'dasdada', 2),
(5, 'Álgebra', 3);

-- --------------------------------------------------------

--
-- Table structure for table `banca`
--

CREATE TABLE IF NOT EXISTS `banca` (
  `idBanca` int(11) NOT NULL,
  `nomeBanca` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banca`
--

INSERT INTO `banca` (`idBanca`, `nomeBanca`) VALUES
(1, 'ACAFE'),
(2, 'ACEPLAN'),
(3, 'ACEF'),
(4, 'dadas'),
(5, '1'),
(6, '2'),
(7, '3'),
(8, '4'),
(9, '4'),
(10, '5'),
(11, '5'),
(12, '5'),
(13, '7'),
(14, '8'),
(15, '10'),
(16, '11'),
(17, '11'),
(18, 'ACAFE'),
(19, 'ACAFE'),
(20, 'ACAPLAM'),
(21, 'ACAPLAM'),
(22, 'ACAPLAM'),
(23, 'ACAFE');

-- --------------------------------------------------------

--
-- Table structure for table `disciplina`
--

CREATE TABLE IF NOT EXISTS `disciplina` (
  `idDisciplina` int(11) NOT NULL,
  `nomeDisciplina` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disciplina`
--

INSERT INTO `disciplina` (`idDisciplina`, `nomeDisciplina`) VALUES
(1, 'dadadasd'),
(2, 'Português'),
(3, 'Matemática');

-- --------------------------------------------------------

--
-- Table structure for table `instituicao`
--

CREATE TABLE IF NOT EXISTS `instituicao` (
  `idInstituicao` int(11) NOT NULL,
  `nomeInstituicao` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instituicao`
--

INSERT INTO `instituicao` (`idInstituicao`, `nomeInstituicao`) VALUES
(1, 'CÃ¢mara de Aracruz - ES'),
(2, 'Câmara de Aracruz - ES');

-- --------------------------------------------------------

--
-- Table structure for table `modalidade`
--

CREATE TABLE IF NOT EXISTS `modalidade` (
  `idModalidade` int(11) NOT NULL,
  `nomeModalidade` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modalidade`
--

INSERT INTO `modalidade` (`idModalidade`, `nomeModalidade`) VALUES
(1, ''),
(2, ''),
(3, ''),
(4, ''),
(5, ''),
(6, 'Múltipla Escolha');

-- --------------------------------------------------------

--
-- Table structure for table `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
  `idQuestao` int(11) NOT NULL,
  `nomeQuestao` varchar(255) NOT NULL,
  `banca_idBanca` int(11) NOT NULL,
  `areaDeAtuacao_idAreaDeAtuacao` int(11) NOT NULL,
  `instituicao_idInstituicao` int(11) NOT NULL,
  `disciplina_idDisciplina` int(11) NOT NULL,
  `modalidade_idModalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `respostaopcoes`
--

CREATE TABLE IF NOT EXISTS `respostaopcoes` (
  `idRespostaOpcoes` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL,
  `valor` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `resposta_has_questao`
--

CREATE TABLE IF NOT EXISTS `resposta_has_questao` (
  `resposta_idRespostaOpcoes` int(11) NOT NULL,
  `questao_idQuestao` int(11) NOT NULL,
  `questao_banca_idBanca` int(11) NOT NULL,
  `questao_areaDeAtuacao_idAreaDeAtuacao` int(11) NOT NULL,
  `questao_instituicao_idInstituicao` int(11) NOT NULL,
  `questao_disciplina_idDisciplina` int(11) NOT NULL,
  `questao_modalidade_idModalidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `areadeatuacao`
--
ALTER TABLE `areadeatuacao`
  ADD PRIMARY KEY (`idAreaDeAtuacao`);

--
-- Indexes for table `assunto`
--
ALTER TABLE `assunto`
  ADD PRIMARY KEY (`idAssunto`,`disciplina_idDisciplina`),
  ADD KEY `fk_assunto_disciplina1_idx` (`disciplina_idDisciplina`);

--
-- Indexes for table `banca`
--
ALTER TABLE `banca`
  ADD PRIMARY KEY (`idBanca`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`idDisciplina`);

--
-- Indexes for table `instituicao`
--
ALTER TABLE `instituicao`
  ADD PRIMARY KEY (`idInstituicao`);

--
-- Indexes for table `modalidade`
--
ALTER TABLE `modalidade`
  ADD PRIMARY KEY (`idModalidade`);

--
-- Indexes for table `questao`
--
ALTER TABLE `questao`
  ADD PRIMARY KEY (`idQuestao`,`banca_idBanca`,`areaDeAtuacao_idAreaDeAtuacao`,`instituicao_idInstituicao`,`disciplina_idDisciplina`,`modalidade_idModalidade`),
  ADD KEY `fk_questao_banca_idx` (`banca_idBanca`),
  ADD KEY `fk_questao_areaDeAtuacao1_idx` (`areaDeAtuacao_idAreaDeAtuacao`),
  ADD KEY `fk_questao_instituicao1_idx` (`instituicao_idInstituicao`),
  ADD KEY `fk_questao_disciplina1_idx` (`disciplina_idDisciplina`),
  ADD KEY `fk_questao_modalidade1_idx` (`modalidade_idModalidade`);

--
-- Indexes for table `respostaopcoes`
--
ALTER TABLE `respostaopcoes`
  ADD PRIMARY KEY (`idRespostaOpcoes`);

--
-- Indexes for table `resposta_has_questao`
--
ALTER TABLE `resposta_has_questao`
  ADD PRIMARY KEY (`resposta_idRespostaOpcoes`,`questao_idQuestao`,`questao_banca_idBanca`,`questao_areaDeAtuacao_idAreaDeAtuacao`,`questao_instituicao_idInstituicao`,`questao_disciplina_idDisciplina`,`questao_modalidade_idModalidade`),
  ADD KEY `fk_resposta_has_questao_questao1_idx` (`questao_idQuestao`,`questao_banca_idBanca`,`questao_areaDeAtuacao_idAreaDeAtuacao`,`questao_instituicao_idInstituicao`,`questao_disciplina_idDisciplina`,`questao_modalidade_idModalidade`),
  ADD KEY `fk_resposta_has_questao_resposta1_idx` (`resposta_idRespostaOpcoes`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `areadeatuacao`
--
ALTER TABLE `areadeatuacao`
  MODIFY `idAreaDeAtuacao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `assunto`
--
ALTER TABLE `assunto`
  MODIFY `idAssunto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `banca`
--
ALTER TABLE `banca`
  MODIFY `idBanca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `idDisciplina` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `instituicao`
--
ALTER TABLE `instituicao`
  MODIFY `idInstituicao` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `modalidade`
--
ALTER TABLE `modalidade`
  MODIFY `idModalidade` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `questao`
--
ALTER TABLE `questao`
  MODIFY `idQuestao` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `respostaopcoes`
--
ALTER TABLE `respostaopcoes`
  MODIFY `idRespostaOpcoes` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assunto`
--
ALTER TABLE `assunto`
  ADD CONSTRAINT `fk_assunto_disciplina1` FOREIGN KEY (`disciplina_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_questao_areaDeAtuacao1` FOREIGN KEY (`areaDeAtuacao_idAreaDeAtuacao`) REFERENCES `areadeatuacao` (`idAreaDeAtuacao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questao_banca` FOREIGN KEY (`banca_idBanca`) REFERENCES `banca` (`idBanca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questao_disciplina1` FOREIGN KEY (`disciplina_idDisciplina`) REFERENCES `disciplina` (`idDisciplina`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questao_instituicao1` FOREIGN KEY (`instituicao_idInstituicao`) REFERENCES `instituicao` (`idInstituicao`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_questao_modalidade1` FOREIGN KEY (`modalidade_idModalidade`) REFERENCES `modalidade` (`idModalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `resposta_has_questao`
--
ALTER TABLE `resposta_has_questao`
  ADD CONSTRAINT `fk_resposta_has_questao_questao1` FOREIGN KEY (`questao_idQuestao`, `questao_banca_idBanca`, `questao_areaDeAtuacao_idAreaDeAtuacao`, `questao_instituicao_idInstituicao`, `questao_disciplina_idDisciplina`, `questao_modalidade_idModalidade`) REFERENCES `questao` (`idQuestao`, `banca_idBanca`, `areaDeAtuacao_idAreaDeAtuacao`, `instituicao_idInstituicao`, `disciplina_idDisciplina`, `modalidade_idModalidade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_resposta_has_questao_resposta1` FOREIGN KEY (`resposta_idRespostaOpcoes`) REFERENCES `respostaopcoes` (`idRespostaOpcoes`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
