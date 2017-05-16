-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16-Maio-2017 às 20:26
-- Versão do servidor: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `servtech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `dataNascimento` varchar(20) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `dataCadastro` varchar(20) DEFAULT NULL,
  `usuarioCadastro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id`, `nome`, `cpf`, `dataNascimento`, `email`, `telefone`, `celular`, `dataCadastro`, `usuarioCadastro`) VALUES
(2, 'Messi', '4444', '05/05/4444', 'messi@fenomeno.com', '27 3333 4444', '27 999 666 4444', NULL, 1),
(3, 'Fulano de Tal', '156.678.568-55', '01/07/1989', 'fulano@contoso.com', '2798653568', '27998775465', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `servicos`
--

CREATE TABLE `servicos` (
  `id` int(11) NOT NULL,
  `codigoCliente` int(20) NOT NULL,
  `dataServico` date DEFAULT NULL,
  `horaServico` varchar(20) DEFAULT NULL,
  `tipo` int(20) NOT NULL,
  `solicitacao` varchar(255) DEFAULT NULL,
  `detectado` varchar(255) DEFAULT NULL,
  `solucao` varchar(255) DEFAULT NULL,
  `previsaoConclusao` date DEFAULT NULL,
  `dataConclusao` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `nomeTecnico` varchar(150) DEFAULT NULL,
  `contatoTecnico` varchar(100) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `usuarioCadastro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tiposervico`
--

CREATE TABLE `tiposervico` (
  `id` int(11) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `contabil` varchar(2) DEFAULT NULL,
  `duracao` varchar(50) DEFAULT NULL,
  `dataCadastro` varchar(20) DEFAULT NULL,
  `usuarioCadastro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tiposervico`
--

INSERT INTO `tiposervico` (`id`, `descricao`, `contabil`, `duracao`, `dataCadastro`, `usuarioCadastro`) VALUES
(11, 'Formatacao', '1', '1', '15-05-2017', 1),
(12, 'Limpeza', '2', '2', '15-05-2017', 1),
(13, 'Virus', '2', '1', '15-05-2017', 1),
(14, 'Windows Server', '2', '2', '15-05-2017', 1),
(15, 'Banana', '2', '5', '27/825/265', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `perfil` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nome` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `sobrenome` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `descricao` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`perfil`, `username`, `password`, `nome`, `sobrenome`, `descricao`, `id`) VALUES
('administrador', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'matheus', 'boldrini', 'Técnico Nível 3', 1),
('editor', 'vanessa78', 'ab41949825606da179db7c89ddcedcc167b64847', '', '', NULL, 2),
('suscriptor', 'jaime70', '1a248d7a471ad8d5993aa523c8397ce1d0bafe78', '', '', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `valorservico`
--

CREATE TABLE `valorservico` (
  `id` int(11) NOT NULL,
  `tipo` int(20) NOT NULL,
  `inicioValor` date DEFAULT NULL,
  `valor` int(20) NOT NULL,
  `fimValor` varchar(20) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `usuarioCadastro` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`);

--
-- Indexes for table `servicos`
--
ALTER TABLE `servicos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoCliente` (`codigoCliente`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`),
  ADD KEY `tipo` (`tipo`);

--
-- Indexes for table `tiposervico`
--
ALTER TABLE `tiposervico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `valorservico`
--
ALTER TABLE `valorservico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuarioCadastro` (`usuarioCadastro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `servicos`
--
ALTER TABLE `servicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tiposervico`
--
ALTER TABLE `tiposervico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `valorservico`
--
ALTER TABLE `valorservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`usuarioCadastro`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `servicos`
--
ALTER TABLE `servicos`
  ADD CONSTRAINT `servicos_ibfk_1` FOREIGN KEY (`codigoCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `servicos_ibfk_2` FOREIGN KEY (`usuarioCadastro`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `servicos_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tiposervico` (`id`);

--
-- Limitadores para a tabela `tiposervico`
--
ALTER TABLE `tiposervico`
  ADD CONSTRAINT `tiposervico_ibfk_1` FOREIGN KEY (`usuarioCadastro`) REFERENCES `users` (`id`);

--
-- Limitadores para a tabela `valorservico`
--
ALTER TABLE `valorservico`
  ADD CONSTRAINT `valorservico_ibfk_1` FOREIGN KEY (`usuarioCadastro`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
