-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/01/2026 às 16:16
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
-- Banco de dados: `arthem`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `artists`
--

CREATE TABLE `artists` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `artists_reports`
--

CREATE TABLE `artists_reports` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `artwork_id` int(11) DEFAULT NULL,
  `report_reason_id` int(11) DEFAULT NULL,
  `artist_reports_status_id` int(11) DEFAULT 1,
  `reported_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `artists_reports_reason`
--

CREATE TABLE `artists_reports_reason` (
  `id` int(11) NOT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artists_reports_reason`
--

INSERT INTO `artists_reports_reason` (`id`, `reason`, `description`) VALUES
(1, 'Plágio ou cópia não autorizada', 'Imitação total ou parcial de outra obra artística sem o devido crédito ou permissão.'),
(2, 'Falsificação ou fraude na obra', 'Atribuição falsa de autoria, alteração da obra ou engano intencional ao público ou compradores.'),
(3, 'Conteúdo ofensivo ou discriminatório', 'Obra que contenha discurso de ódio, discriminação ou ofensa à dignidade humana.'),
(4, 'Uso indevido da imagem ou honra de terceiros', 'Utilização da imagem, nome ou representação de pessoas sem consentimento ou de forma ofensiva.'),
(5, 'Apropriação cultural indevida', 'Uso desrespeitoso ou comercial de elementos culturais sem contexto ou autorização.'),
(6, 'Uso de materiais ilegais ou prejudiciais ao ambiente', 'Emprego de materiais proibidos ou que causem danos ambientais.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `artists_reports_status`
--

CREATE TABLE `artists_reports_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artists_reports_status`
--

INSERT INTO `artists_reports_status` (`id`, `status`) VALUES
(1, 'pendente'),
(2, 'resolvida');

-- --------------------------------------------------------

--
-- Estrutura para tabela `artworks`
--

CREATE TABLE `artworks` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `artwork_path` varchar(255) NOT NULL,
  `artwork_stastus_id` int(11) DEFAULT 1,
  `featured` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `artwork_status`
--

CREATE TABLE `artwork_status` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artwork_status`
--

INSERT INTO `artwork_status` (`id`, `status`) VALUES
(1, 'À venda'),
(2, 'Vendida'),
(3, 'Indisponível'),
(4, 'Inativa');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Arte Digital'),
(2, 'Desenho'),
(3, 'Escultura'),
(4, 'Fotografia'),
(5, 'Pintura');

-- --------------------------------------------------------

--
-- Estrutura para tabela `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `artwork_id` int(11) DEFAULT NULL,
  `notifications_status_id` int(11) DEFAULT 1,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notifications_status`
--

CREATE TABLE `notifications_status` (
  `id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `notifications_status`
--

INSERT INTO `notifications_status` (`id`, `status`) VALUES
(1, 'unread'),
(2, 'read');

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Artist');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artists_ibfk_1` (`category_id`);

--
-- Índices de tabela `artists_reports`
--
ALTER TABLE `artists_reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artists_reports_ibfk_1` (`artist_id`),
  ADD KEY `artists_reports_ibfk_2` (`report_reason_id`),
  ADD KEY `artists_reports_ibfk_3` (`artwork_id`),
  ADD KEY `artists_reports_ibfk_4` (`artist_reports_status_id`);

--
-- Índices de tabela `artists_reports_reason`
--
ALTER TABLE `artists_reports_reason`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `artists_reports_status`
--
ALTER TABLE `artists_reports_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artworks_ibfk_1` (`artwork_stastus_id`),
  ADD KEY `artworks_ibfk_2` (`artist_id`);

--
-- Índices de tabela `artwork_status`
--
ALTER TABLE `artwork_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_ibfk_1` (`user_id`),
  ADD KEY `notifications_ibfk_2` (`artwork_id`),
  ADD KEY `notifications_ibfk_3` (`notifications_status_id`);

--
-- Índices de tabela `notifications_status`
--
ALTER TABLE `notifications_status`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `users_ibfk_1` (`user_role_id`),
  ADD KEY `users_ibfk_2` (`artist_id`);

--
-- Índices de tabela `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `artists_reports`
--
ALTER TABLE `artists_reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `artists_reports_reason`
--
ALTER TABLE `artists_reports_reason`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `artists_reports_status`
--
ALTER TABLE `artists_reports_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de tabela `artwork_status`
--
ALTER TABLE `artwork_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `notifications_status`
--
ALTER TABLE `notifications_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `artists_reports`
--
ALTER TABLE `artists_reports`
  ADD CONSTRAINT `artists_reports_ibfk_1` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artists_reports_ibfk_2` FOREIGN KEY (`report_reason_id`) REFERENCES `artists_reports_reason` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artists_reports_ibfk_3` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artists_reports_ibfk_4` FOREIGN KEY (`artist_reports_status_id`) REFERENCES `artists_reports_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `artworks`
--
ALTER TABLE `artworks`
  ADD CONSTRAINT `artworks_ibfk_1` FOREIGN KEY (`artwork_stastus_id`) REFERENCES `artwork_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `artworks_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_2` FOREIGN KEY (`artwork_id`) REFERENCES `artworks` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `notifications_ibfk_3` FOREIGN KEY (`notifications_status_id`) REFERENCES `notifications_status` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `user_role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `users_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
