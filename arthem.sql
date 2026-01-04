-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/01/2026 às 17:15
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
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(50) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `biography` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artists`
--

INSERT INTO `artists` (`id`, `nome`, `email`, `password`, `phone_number`, `category_id`, `biography`, `created_at`) VALUES
(5, 'Isaías Sebastião', 'ims@gmail.com', '$2y$10$cnoi.GAvHbI7NEHlJ1g/uO/SzU5j0Yp2nNH6zDpm9t.IzRoWOqJoO', '948772757', 2, 'Desde cedo, encontrou no desenho uma forma natural de expressão. O ato de criar sempre esteve presente como lingagem, refúgio e meio de comunicação com o mudno. Autodeclarado artista, desenvolve seu trabalho a partir da observação sensível do cotidiano, explorando linhas, formas e emoções como elementos centrais de sua produção.', '2025-12-31 12:30:48'),
(6, 'WeirdBoy_96', 'weirdboy@gmail.com', '$2y$10$jUsbRmHHmoqGfeQ9OEwVs.i31/m5PdV7A7CYy.yAUCpElQGA/7X6O', '994746029', 3, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blanditiis sapiente! Voluptates, consectetur.', '2025-12-31 18:03:25'),
(7, 'Dira Monteiro', 'Dira@gmail.com', '$2y$10$ojrZLSQCwFk9DcENQXOP6uUEcqsuqc0W9kuThaM.Dmp0vQLHvoWIS', '935555500', 5, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blanditiis sapiente! Voluptates, consectetur.', '2026-01-01 12:38:55');

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

--
-- Despejando dados para a tabela `artworks`
--

INSERT INTO `artworks` (`id`, `artist_id`, `title`, `description`, `price`, `artwork_path`, `artwork_stastus_id`, `featured`, `created_at`) VALUES
(55, 6, 'Exemplo1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 100000.00, '../private/users/WeirdBoy_96/artworks/Exemplo1/1.jpg', 1, 1, '2026-01-04 16:03:06'),
(56, 6, 'Exemplo2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 800000.00, '../private/users/WeirdBoy_96/artworks/Exemplo2/2.jpg', 1, 1, '2026-01-04 16:03:12'),
(57, 6, 'Exemplo3', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 450000.00, '../private/users/WeirdBoy_96/artworks/Exemplo3/3.jpg', 1, 1, '2026-01-04 16:03:24'),
(59, 5, 'Exemplo5', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 120000.00, '../private/users/Isaías Sebastião/artworks/Exemplo5/5.jpg', 1, 1, '2026-01-04 16:03:09'),
(60, 5, 'Exemplo4', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 90000.00, '../private/users/Isaías Sebastião/artworks/Exemplo4/4.jpg', 1, 1, '2026-01-04 16:03:50'),
(61, 5, 'Exemplo6', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 30000.00, '../private/users/Isaías Sebastião/artworks/Exemplo6/6.jpg', 1, 1, '2026-01-04 16:03:15'),
(62, 7, 'Exemplo7', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates voluptatem, molestiae velit impedit ut aperiam dignissimos sit quae sint voluptas commodi molestias ipsam nobis labore porro blandit', 110000.00, '../private/users/Dira Monteiro/artworks/Exemplo7/7.jpg', 1, 1, '2026-01-04 16:03:20');

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
(3, 'Indisponível');

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

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `category_id` (`category_id`);

--
-- Índices de tabela `artworks`
--
ALTER TABLE `artworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artwork_stastus_id` (`artwork_stastus_id`),
  ADD KEY `artist_id` (`artist_id`);

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
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `artworks`
--
ALTER TABLE `artworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de tabela `artwork_status`
--
ALTER TABLE `artwork_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Restrições para tabelas `artworks`
--
ALTER TABLE `artworks`
  ADD CONSTRAINT `artworks_ibfk_1` FOREIGN KEY (`artwork_stastus_id`) REFERENCES `artwork_status` (`id`),
  ADD CONSTRAINT `artworks_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
