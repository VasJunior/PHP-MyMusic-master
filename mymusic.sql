-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 27-Nov-2018 às 23:12
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymusic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `musicas`
--

CREATE TABLE `musicas` (
  `id_musica` int(11) NOT NULL,
  `musica_nome` varchar(220) NOT NULL,
  `src_musica` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `musicas`
--

INSERT INTO `musicas` (`id_musica`, `musica_nome`, `src_musica`) VALUES
(1, 'As we fall', 'musicas/AsWeFall.mp3'),
(3, 'March of spoons', 'musicas/MarchOfSpoons.mp3'),
(22, 'Reddy Theme', 'musicas/Reddy Theme.mp3'),
(24, 'Musica de Elevador', 'musicas/Musica de Elevador.mp3'),
(25, 'Wakatendayo', 'musicas/Wakatendayo.mp3'),
(27, 'Piratas do Caribe Musica', 'musicas/Piratas do caribe musica.mp3'),
(28, 'Titanic Fail', 'musicas/Titanic Fail.mp3'),
(29, 'Dancin', 'musicas/Dancin.mp3'),
(30, 'Cavaleiros do Zodiaco', 'musicas/BattleMusic Cavaleiros do zodiaco.mp3'),
(31, 'billie jean', 'musicas/Billie Jean - Michael Jackson.mp3'),
(32, 'Warriors - Imagine Dragons', 'musicas/Warriors - Imagine Dragons.mp3'),
(33, 'Too old to die young', 'musicas/Too Old To Die Young - Django Unchained.mp3'),
(46, 'Bohemian Rapshody', 'musicas/Bohemian Rhapsody - Queen.mp3'),
(48, 'Fabio', 'musicas/68 - Gerudo Valley.mp3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nome` varchar(220) NOT NULL,
  `usuario_senha` varchar(220) NOT NULL,
  `usuario_email` varchar(220) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `usuario_nome`, `usuario_senha`, `usuario_email`) VALUES
(21, 'VasconceloJr', '123', 'vasconcelojr0@gmail.com'),
(23, 'Junior', '85115152', 'junlnhosampaio@hotmaill.com'),
(27, 'admin', 'admin', 'admin'),
(28, 'Alan Wayner', 'Smultbeg12.', 'alanedeus10@gmail.com'),
(29, 'Vasconcelo Junior', '123qweasdzx', 'vasconcelojr0@gmail.com'),
(31, 'Thomas', 'senha', 'Thomas@gmail.com'),
(32, 'Vasconcelo Andrade', '88254510', 'vasconcelosampaio@gmail.com'),
(33, 'ivamzin', 'ivanzin', 'ivanedeus10@gmail.com'),
(34, 'Fabio', '1234', 'Fabiosousa@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `musicas`
--
ALTER TABLE `musicas`
  ADD PRIMARY KEY (`id_musica`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `musicas`
--
ALTER TABLE `musicas`
  MODIFY `id_musica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
