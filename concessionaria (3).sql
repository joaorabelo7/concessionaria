-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28/11/2025 às 15:09
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `concessionaria`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `test_drives`
--

CREATE TABLE `test_drives` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_veiculo` int(11) NOT NULL,
  `data_agendamento` date NOT NULL,
  `horario_agendamento` time NOT NULL,
  `status` enum('pendente','confirmado','cancelado','realizado') NOT NULL DEFAULT 'pendente',
  `data_solicitacao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `test_drives`
--

INSERT INTO `test_drives` (`id`, `id_usuario`, `id_veiculo`, `data_agendamento`, `horario_agendamento`, `status`, `data_solicitacao`) VALUES
(5, 1, 2, '2026-12-07', '14:00:00', 'cancelado', '2025-11-28 14:03:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `tipo_conta` enum('cliente','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `tipo_conta`) VALUES
(1, 'João Henrique', 'rabelo7@gmail.com', '$2y$10$eofuYQmEQlyRtbqe95ZH/ObvJD4uOaTyUFV5jNG2spri4h8aWZnj.', 'cliente'),
(2, 'Administrador', 'admin@gmail.com', '$2y$10$jM9VNkY1rAQAz0uuFU7z5OmQ2IUO7dKqanCItvGtf0M0VNuruzdvO', 'admin'),
(3, 'Cliente Teste', 'cliente@gmail.com', '$2y$10$m2fjkIVttjqcbfuOROMkoOLBD.b7W52jbp2QQqwPYBDW72M4TWjpa', 'cliente'),
(4, 'Cliente teste', 'cliente1@gmail.com', '$2y$10$NpBp6XieN3cRa/x0YDC1J.PpS4Dzp0VV98JXy/84rNCFYAQgoRmSq', 'cliente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veiculos`
--

CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `tipo` enum('carro','moto') NOT NULL,
  `marca` varchar(255) NOT NULL,
  `modelo` varchar(255) NOT NULL,
  `ano` int(11) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `descricao` text NOT NULL,
  `disponivel` tinyint(1) NOT NULL DEFAULT 1,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `tipo`, `marca`, `modelo`, `ano`, `imagem`, `descricao`, `disponivel`, `data_cadastro`) VALUES
(2, 'carro', 'Toyota', 'Corolla', 2024, '692904aa91a3f_corolla.jpg', 'Carro familiar confortável', 1, '2025-11-27 03:13:56'),
(4, 'carro', '', 'Supra', 0, 'veiculo_1764297431.jpg', '', 1, '2025-11-28 02:37:11'),
(5, 'carro', '', 'Lamborghini Huracan', 0, 'veiculo_1764337786.jpg', '', 1, '2025-11-28 13:49:46');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `test_drives`
--
ALTER TABLE `test_drives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_veiculo` (`id_veiculo`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Índices de tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `test_drives`
--
ALTER TABLE `test_drives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `test_drives`
--
ALTER TABLE `test_drives`
  ADD CONSTRAINT `test_drives_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_drives_ibfk_2` FOREIGN KEY (`id_veiculo`) REFERENCES `veiculos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
