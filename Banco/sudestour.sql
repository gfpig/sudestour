-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/11/2023 às 03:33
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sudestour2`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `anunciante`
--

CREATE TABLE `anunciante` (
  `Cnpj` varchar(17) NOT NULL,
  `SenhaAnunciante` varchar(20) DEFAULT NULL,
  `FotoAnunciante` longblob DEFAULT NULL,
  `EmailAnunciante` varchar(30) DEFAULT NULL,
  `NomeAnunciante` varchar(30) DEFAULT NULL,
  `statusPremium` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `anunciante`
--

INSERT INTO `anunciante` (`Cnpj`, `SenhaAnunciante`, `FotoAnunciante`, `EmailAnunciante`, `NomeAnunciante`, `statusPremium`) VALUES
('teste1', 'teste1', NULL, 'teste1@gmail.com', 'Gabrielle', 0),
('teste2', 'teste2', NULL, 'teste2@gmail.com', 'teste2', 0),
('teste3', 'teste3', NULL, 'teste3@gmail.com', 'teste3', 0),
('teste4', 'teste4', NULL, 'teste4@gmail.com', 'teste4', 0),
('teste6', 'teste6', NULL, 'teste6@gmail.com', 'teste6', 0),
('teste7', 'teste7', NULL, 'teste7@gmail.com', 'teste7', 0),
('teste8', 'teste8', NULL, 'teste8@gmail.com', 'teste8', 0),
('teste9', 'testeAaa', NULL, 'teste9@gmail.com', 'teste9', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `Comentario` varchar(100) DEFAULT NULL,
  `NomeTurista` varchar(30) DEFAULT NULL,
  `EmailTurista` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `NomeCategoria` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `NomeCategoria`) VALUES
(1, 'Turismo de Lazer'),
(2, 'Turismo Religioso'),
(3, 'Turismo de Negócios '),
(4, 'Turismo Cultural'),
(5, 'Turismo Gastronômico'),
(6, 'Ecoturismo'),
(7, 'Turismo de Esportes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(4) NOT NULL,
  `CpfTurista` varchar(14) DEFAULT NULL,
  `CnpjAnunciante` varchar(17) DEFAULT NULL,
  `CepPonto` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horafuncionamento`
--

CREATE TABLE `horafuncionamento` (
  `idHora` int(4) NOT NULL,
  `CepPonto` varchar(9) DEFAULT NULL,
  `diaSemana` varchar(7) DEFAULT NULL,
  `HoraAbertura` varchar(5) DEFAULT NULL,
  `HoraFechamento` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `horario`
--

CREATE TABLE `horario` (
  `IdHorario` varchar(2) NOT NULL,
  `Hora` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `local`
--

CREATE TABLE `local` (
  `Cep` varchar(9) NOT NULL,
  `Bairro` varchar(30) DEFAULT NULL,
  `Logradouro` varchar(30) DEFAULT NULL,
  `Complemento` varchar(30) DEFAULT NULL,
  `Telefone` varchar(12) DEFAULT NULL,
  `Avaliacao` int(11) DEFAULT NULL,
  `RedeSocial` varchar(30) DEFAULT NULL,
  `Imagem` longblob DEFAULT NULL,
  `Uf` varchar(2) DEFAULT NULL,
  `Cidade` varchar(30) DEFAULT NULL,
  `NomeLocal` varchar(30) DEFAULT NULL,
  `Numero` varchar(4) DEFAULT NULL,
  `Descricao` varchar(100) DEFAULT NULL,
  `Comentario` int(11) DEFAULT NULL,
  `CNPJ` varchar(17) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `turista`
--

CREATE TABLE `turista` (
  `cpf` varchar(14) NOT NULL,
  `NomeTurista` varchar(30) DEFAULT NULL,
  `EmailTurista` varchar(30) DEFAULT NULL,
  `FotoTurista` longblob DEFAULT NULL,
  `SenhaTurista` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `turista`
--

INSERT INTO `turista` (`cpf`, `NomeTurista`, `EmailTurista`, `FotoTurista`, `SenhaTurista`) VALUES
('007.475.440-85', 'testando', 'testee@gmail.com', NULL, 'TESTEOITOa'),
('581.533.060-49', 'teste9', 'teste1@gmail.com', NULL, 'Testeeee'),
('testeTurista', 'testeTurista', 'testeTurista@gmail.c', NULL, 'testeTurista'),
('testeTurista1', 'testeTurista1', 'testeTurista1@gmail.', NULL, 'TESTEOITOa');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `anunciante`
--
ALTER TABLE `anunciante`
  ADD PRIMARY KEY (`Cnpj`);

--
-- Índices de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Índices de tabela `horafuncionamento`
--
ALTER TABLE `horafuncionamento`
  ADD PRIMARY KEY (`idHora`),
  ADD KEY `CepPonto` (`CepPonto`);

--
-- Índices de tabela `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`IdHorario`);

--
-- Índices de tabela `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`Cep`),
  ADD KEY `Avaliacao` (`Avaliacao`),
  ADD KEY `Comentario` (`Comentario`),
  ADD KEY `CNPJ` (`CNPJ`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Índices de tabela `turista`
--
ALTER TABLE `turista`
  ADD PRIMARY KEY (`cpf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `horafuncionamento`
--
ALTER TABLE `horafuncionamento`
  MODIFY `idHora` int(4) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `horafuncionamento`
--
ALTER TABLE `horafuncionamento`
  ADD CONSTRAINT `horafuncionamento_ibfk_1` FOREIGN KEY (`CepPonto`) REFERENCES `local` (`Cep`);

--
-- Restrições para tabelas `local`
--
ALTER TABLE `local`
  ADD CONSTRAINT `local_ibfk_1` FOREIGN KEY (`Avaliacao`) REFERENCES `avaliacao` (`id`),
  ADD CONSTRAINT `local_ibfk_2` FOREIGN KEY (`Comentario`) REFERENCES `avaliacao` (`id`),
  ADD CONSTRAINT `local_ibfk_3` FOREIGN KEY (`CNPJ`) REFERENCES `anunciante` (`Cnpj`),
  ADD CONSTRAINT `local_ibfk_4` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
