-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 01-Jul-2023 às 04:22
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hospedagens`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendar`
--

CREATE TABLE `calendar` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_stay` int(10) UNSIGNED NOT NULL,
  `date_entrada` date NOT NULL,
  `date_saida` date NOT NULL,
  `price_day` decimal(10,2) NOT NULL,
  `price_total` varchar(255) NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `taxa_limpeza` varchar(255) NOT NULL,
  `taxa_servico` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `calendar`
--

INSERT INTO `calendar` (`id`, `id_user`, `id_stay`, `date_entrada`, `date_saida`, `price_day`, `price_total`, `order_id`, `taxa_limpeza`, `taxa_servico`) VALUES
(18, 7, 10, '2023-06-30', '2023-06-30', '150.00', '172.5', 57, '0', '22.5'),
(19, 7, 8, '2023-06-29', '2023-06-29', '500.00', '575', 58, '0', '75'),
(20, 7, 7, '2023-06-24', '2023-06-26', '500.00', '1725', 59, '0', '225'),
(21, 7, 7, '2023-06-21', '2023-06-21', '500.00', '575', 60, '0', '75'),
(22, 7, 7, '2023-06-27', '2023-07-06', '500.00', '5750', 61, '0', '750'),
(23, 7, 7, '2023-06-22', '2023-06-22', '500.00', '575', 62, '0', '75'),
(24, 7, 10, '2023-07-08', '2023-07-29', '150.00', '3795', 63, '0', '495');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `utl_icon` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `utl_icon`) VALUES
(1, 'Casa', ''),
(7, 'Praia', ''),
(8, 'Refugio', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `id_stadia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_dono` int(11) NOT NULL,
  `data` datetime NOT NULL,
  `view` tinyint(1) NOT NULL,
  `senter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `chats`
--

INSERT INTO `chats` (`id`, `mensagem`, `id_stadia`, `id_usuario`, `id_dono`, `data`, `view`, `senter`) VALUES
(14, 'fala irmao tudo ?', 8, 4, 2, '2023-05-23 06:25:41', 0, 4),
(15, 'Eu gostaria de negocia contigo, para ver se coconsigo reduzir esse valor ...', 8, 4, 2, '2023-05-23 06:26:05', 0, 4),
(16, 'oh, tudo bem irmão ? podemos negociar sim...', 8, 4, 2, '2023-05-23 06:29:09', 0, 8),
(18, 'opa, boa noite de novo', 8, 4, 2, '2023-05-23 06:40:23', 0, 4),
(19, 'manda ai ', 8, 4, 2, '2023-05-23 06:40:36', 0, 4),
(20, 'teste', 8, 4, 2, '2023-05-23 06:41:15', 0, 8),
(21, 'teste 2', 8, 4, 2, '2023-05-23 06:48:57', 0, 4),
(22, 'teste', 6, 1, 4, '2023-06-06 22:22:45', 0, 1),
(23, 'teste', 6, 4, 4, '2023-06-07 19:05:48', 0, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stay` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `stars` int(11) NOT NULL,
  `comment` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `especial_days_values`
--

CREATE TABLE `especial_days_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_stay` int(10) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `price_diference` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `especial_days_values`
--

INSERT INTO `especial_days_values` (`id`, `id_stay`, `day`, `price_diference`) VALUES
(1, 4, '2023-04-28', '3234.00'),
(2, 4, '2023-04-29', '4234.00'),
(3, 6, '2023-04-26', '250.00'),
(4, 7, '2023-04-28', '700.00'),
(5, 7, '2023-04-25', '5000.00'),
(6, 8, '2023-04-29', '800.00'),
(7, 7, '2023-06-09', '3000.00'),
(8, 10, '2023-06-01', '500.00'),
(9, 10, '2023-07-18', '500.00'),
(10, 10, '2023-05-15', '1222.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `images_stays`
--

CREATE TABLE `images_stays` (
  `id_stay` int(10) UNSIGNED NOT NULL,
  `url_imagem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `images_stays`
--

INSERT INTO `images_stays` (`id_stay`, `url_imagem`) VALUES
(4, 'http://127.0.0.1:8000/imgs/casa-moderna.png'),
(4, 'http://127.0.0.1:8000/imgs/idea-6571827_1280.png'),
(4, 'http://127.0.0.1:8000/imgs/4.png'),
(4, 'http://127.0.0.1:8000/imgs/casa-moderna.png'),
(4, 'http://127.0.0.1:8000/imgs/A_integração_perfeita_entre_serviços_de_consultoria,_assessoria_e_soluções_tecnológicas_para_sua_empresa._Venha_conhecer.png'),
(6, 'http://127.0.0.1:8000/imgs/hoteljuquehy0.jpg'),
(7, 'http://127.0.0.1:8000/imgs/pousada-casa-na-praia.jpg'),
(7, 'http://127.0.0.1:8000/imgs/280808348.jpg'),
(8, 'http://127.0.0.1:8000/imgs/271539797.jpg'),
(8, 'http://127.0.0.1:8000/imgs/expediav2-360443-1512ad-068302.jpg'),
(10, 'http://127.0.0.1:8000/imgs/Captura_de_Tela_(9).png'),
(10, 'http://127.0.0.1:8000/imgs/Captura_de_Tela_(16).png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `notificacoes`
--

CREATE TABLE `notificacoes` (
  `id` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `usuario_notificado` int(11) NOT NULL,
  `link` text NOT NULL,
  `visualizada` tinyint(1) NOT NULL,
  `estadia_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `mensagem`, `usuario_notificado`, `link`, `visualizada`, `estadia_id`) VALUES
(1, 'Foi solicitada uma reserva', 4, 'novos', 0, 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_dono` int(11) NOT NULL,
  `qntPessoas` int(11) NOT NULL,
  `motivo_cancelamento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `orders`
--

INSERT INTO `orders` (`id`, `status`, `id_user`, `id_dono`, `qntPessoas`, `motivo_cancelamento`) VALUES
(57, 6, 7, 4, 1, ''),
(58, 4, 7, 4, 0, 'Cancelado por solicitação do cliente.'),
(59, 1, 7, 4, 0, ''),
(60, 5, 7, 4, 2, ''),
(61, 1, 7, 4, 3, ''),
(62, 1, 7, 4, 0, ''),
(63, 0, 7, 4, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `politicas_cancelamento`
--

CREATE TABLE `politicas_cancelamento` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `politicas_cancelamento`
--

INSERT INTO `politicas_cancelamento` (`id`, `name`, `descricao`) VALUES
(1, 'Politica 01', 'Desccrição da politica de cancelamento3'),
(4, 'Politica 02', 'tsfadasd adsadasd');

-- --------------------------------------------------------

--
-- Estrutura da tabela `stays`
--

CREATE TABLE `stays` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_stay` varchar(255) NOT NULL,
  `id_user_dono` int(10) UNSIGNED NOT NULL,
  `id_politica` int(10) UNSIGNED NOT NULL,
  `descricao` text NOT NULL,
  `capacidade` int(11) NOT NULL,
  `servicos` text NOT NULL,
  `preco_dia_letivo` decimal(10,2) NOT NULL,
  `preco_final_semana` decimal(10,2) NOT NULL,
  `categoria_id` int(11) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `frame_mapa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `stays`
--

INSERT INTO `stays` (`id`, `name_stay`, `id_user_dono`, `id_politica`, `descricao`, `capacidade`, `servicos`, `preco_dia_letivo`, `preco_final_semana`, `categoria_id`, `cidade`, `estado`, `frame_mapa`) VALUES
(4, 'teste01', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 5, 'Wi-fi, Café da manhã', '500.00', '720.00', 1, 'Águia Branca', 'ES', '-23.550520, -46.633308'),
(5, 'teste 03', 4, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n', 5, 'teste, teste2, teste 3', '233.00', '321.00', 1, 'Mantena', 'ES', '-23.550520, -46.633308'),
(6, 'teste 03', 4, 1, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\n\n', 5, 'teste, teste2, teste 3', '233.00', '321.00', 1, 'Mantena', 'ES', '-23.550520, -46.633308'),
(7, 'Teste de estadia', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\n', 10, 'Café da manhã e wi-fi', '500.00', '500.00', 1, 'Águia Branca', 'ES', '-23.550520, -46.633308'),
(8, 'Teste angel', 2, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\n\n', 11, 'Café, wi-fi, Janta', '600.00', '500.00', 1, 'Águia Branca', 'ES', '-23.550520, -46.633308'),
(9, 'tecnologia 23', 2, 1, 'sadasdasda', 5, 'teste, teste2, teste 3', '500.00', '500.00', 1, 'Águia Branca', 'ES', '-23.550520, -46.633308'),
(10, 'teste', 4, 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets ', 10, 'wif-fi, cafe da manhã, jacuzz', '100.00', '150.00', 7, 'Aguia branca', 'ES', '-23.550520, -46.633308');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_estadia` int(11) NOT NULL,
  `url_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `name`, `type`, `cpf`, `tel`, `email`, `password`, `id_estadia`, `url_foto`) VALUES
(2, 'Angel Marcos Oliveira Lima', 2, '19385961705', '11 94359-9897', 'Angelmarcos0226@gmail.com', 'Hospede1', 1, 'https://static-cse.canva.com/blob/611603/screen3.jpg'),
(4, 'MARCOS PAULO MACHADO AZEVEDO', 2, '15925235797', '9882093933', 'marcosmachadodev1@gmail.com', 'mito010894', 0, 'https://static-cse.canva.com/blob/611603/screen3.jpg'),
(7, 'Marcos Paulo Machado Azevedo', 3, '15925235797', '9882093933', 'marcosmachadodev@gmail.com', 'mito010894', 0, 'https://static-cse.canva.com/blob/611603/screen3.jpg'),
(8, 'Angel Master', 1, '15925235797', '9882093933', 'Angelmarcos0226@gmail.com', 'mito010894', 0, '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_calendar_user` (`id_user`),
  ADD KEY `fk_calendar_stay` (`id_stay`),
  ADD KEY `fk_calendar_order` (`order_id`);

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comments_stay` (`id_stay`),
  ADD KEY `fk_comments_user` (`id_user`);

--
-- Índices para tabela `especial_days_values`
--
ALTER TABLE `especial_days_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_especial_days_values_stay` (`id_stay`);

--
-- Índices para tabela `images_stays`
--
ALTER TABLE `images_stays`
  ADD KEY `fk_images_stays_stay` (`id_stay`);

--
-- Índices para tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `politicas_cancelamento`
--
ALTER TABLE `politicas_cancelamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `stays`
--
ALTER TABLE `stays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stays_user` (`id_user_dono`),
  ADD KEY `fk_stays_politica` (`id_politica`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendar`
--
ALTER TABLE `calendar`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de tabela `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `especial_days_values`
--
ALTER TABLE `especial_days_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `notificacoes`
--
ALTER TABLE `notificacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de tabela `politicas_cancelamento`
--
ALTER TABLE `politicas_cancelamento`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `stays`
--
ALTER TABLE `stays`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `calendar`
--
ALTER TABLE `calendar`
  ADD CONSTRAINT `fk_calendar_order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `fk_calendar_stay` FOREIGN KEY (`id_stay`) REFERENCES `stays` (`id`),
  ADD CONSTRAINT `fk_calendar_user` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_stay` FOREIGN KEY (`id_stay`) REFERENCES `stays` (`id`),
  ADD CONSTRAINT `fk_comments_user` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `especial_days_values`
--
ALTER TABLE `especial_days_values`
  ADD CONSTRAINT `fk_especial_days_values_stay` FOREIGN KEY (`id_stay`) REFERENCES `stays` (`id`);

--
-- Limitadores para a tabela `images_stays`
--
ALTER TABLE `images_stays`
  ADD CONSTRAINT `fk_images_stays_stay` FOREIGN KEY (`id_stay`) REFERENCES `stays` (`id`);

--
-- Limitadores para a tabela `stays`
--
ALTER TABLE `stays`
  ADD CONSTRAINT `fk_stays_politica` FOREIGN KEY (`id_politica`) REFERENCES `politicas_cancelamento` (`id`),
  ADD CONSTRAINT `fk_stays_user` FOREIGN KEY (`id_user_dono`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
