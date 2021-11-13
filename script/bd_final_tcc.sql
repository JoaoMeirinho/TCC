-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: fdb30.awardspace.net
-- Generation Time: 13-Nov-2021 às 00:00
-- Versão do servidor: 5.7.20-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `3758582_tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agenda`
--

CREATE TABLE `agenda` (
  `id_agendamento` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_servico` int(11) NOT NULL,
  `situacao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `agenda`
--

INSERT INTO `agenda` (`id_agendamento`, `id_cliente`, `id_servico`, `situacao`, `data`) VALUES
(16, 1, 3, 'ACEITO', '2021-11-13'),
(18, 1, 1, 'ACEITO', '2021-11-14'),
(19, 1, 1, 'ACEITO', '2021-11-09'),
(20, 2, 3, 'ACEITO', '2021-11-11'),
(21, 2, 1, 'ACEITO', '2021-11-15'),
(22, 2, 3, 'RECUSADO', '0000-00-00'),
(23, 1, 3, 'ACEITO', '2021-11-16'),
(26, 1, 11, 'PENDENTE', '0000-00-00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `usuario` varchar(65) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numTel` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `usuario`, `senha`, `endereco`, `numTel`, `email`) VALUES
(1, 'João Meirinho', 'jzinho00', '81dc9bdb52d04dc20036dbd8313ed055', 'Rua Zacarias Dos Santos,228, casa 205', 15997760506, 'jao46roberto@gmail.com'),
(2, 'Fábio Eduarda', 'Cabra Loka', '25bbdcd06c32d477f7fa1c3e4a91b032', 'Brasil', 15991034021, 'chupacabraloka42@gmail.com'),
(3, 'Jeferson Bezerra', 'Jefinho', '81dc9bdb52d04dc20036dbd8313ed055', 'Rua Escobar santos', 15997760506, 'Jpdf@gmail.com'),
(4, 'Ana ', 'Anare', 'deb54ffb41e085fd7f69a75b6359c989', 'Rua Zacarias dos Santos ', 15997760506, 'meirinhoana@yahoo.com'),
(5, 'Sim', 'Sim', '9aa35fa7ef8eb91069ef4ffecb27ca47', 'Sim', 1, 'Sim'),
(6, 'opa', 'blé', '81dc9bdb52d04dc20036dbd8313ed055', 'snfeflnfe', 2, 'eita@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id_servico` int(11) NOT NULL,
  `nomeServico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8_unicode_ci NOT NULL,
  `valor` decimal(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `servicos`
--

INSERT INTO `servicos` (`id_servico`, `nomeServico`, `descricao`, `valor`) VALUES
(1, 'Reflexoterapia', 'Terapia que consiste na aplicação de pressão em pontos do pé, para equilibrar a energia do corpo e evitar o surgimento de doenças e problemas de saúde. ', 40.00),
(3, 'Auriculoterapia', 'Terapia natural que consiste na estimulação de pontos nas orelhas, sendo por isso muito semelhante à acupuntura.', 30.00),
(9, 'Sais de Schüssler', 'São o pó, ou sais básicos – constituídos de estruturas protéicas, vitamínicos, hormonais e enzimáticos – que produzem as vibrações que por sua vez produzem os vários tipos de células e órgãos, resultando numa reação peculiar própria para sua construção.', 50.00),
(11, 'Florais de Bach', 'Extratos diluídos de flores silvestres, usados como um método seguro e natural de tratamento.', 100.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agendamento`),
  ADD KEY `id_cliente_fk` (`id_cliente`),
  ADD KEY `id_servico_fk` (`id_servico`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id_servico`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agendamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id_servico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
