-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 30-Dez-2022 às 03:23
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `registro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro`
--

CREATE TABLE `cadastro` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `sexo` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cadastro`
--

INSERT INTO `cadastro` (`id`, `nome`, `email`, `telefone`, `sexo`) VALUES
(1, 'André Bonfim', 'andrebonfim145@gmail.com', '98988223456', 1),
(2, 'Matinho oliveira', 'matolivera@gmail.com', '98987956815', 1),
(3, 'Rafaela Souza', 'qq@hotmail.com', '98988497402', 2),
(4, 'marcelo', 'marcelo@gmail.com', '98988497402', 1),
(5, 'marcelo', 'marcelo@gmail.com', '98988497402', 1),
(6, 'Gabriel Matheus', 'Gabmath@hotmail.com', '98988745601', 1),
(7, 'Gabriela Erica', 'gatinha@hotmail.com', '98999696969', 2),
(8, 'Augusto', 'augusto12@gmail.com', '98988497402', 1),
(9, 'Sara Noemi', 'sarinha12@gmail.com', '98988472308', 2),
(10, 'Joana', 'jo@gmail.com', '98988497402', 2),
(11, 'Wesker', 'revil@gmail.com', '98992756431', 1),
(12, 'Ashely Fortine', 'ashely@gmail.com', '98988237691', 2),
(13, 'Angelica Mattos', 'Agelima@hotmail.com', '+5598988756432', 2),
(14, 'Augusto', 'augusto@gmail.com', '98988497402', 1),
(15, 'Rebeca Araujo', 'rebeca12@gmail.com', '98988754891', 2),
(16, 'Livia Andrade', 'Liviag@hotmail.com', '9898112345', 2),
(17, 'Fred Monte Negro', 'fredexplica@gmail.com', '98988497402', 1),
(18, 'Augusto', 'augustomandrake@gmail.com', '98988745605', 1),
(19, 'Marcela Arburquerke', 'marcele@gmail.com', '98988556432', 2),
(20, 'Cristina Silva ', 'Silva.cristina@gmail.com', '98988456312', 2),
(21, 'Carlos Henrique ', 'Carhenrique@gmail.com', '98981324561', 1),
(22, 'Zélia martins', 'zemarti@gmail.com', '97981234561', 2),
(23, 'Thales Silva ', 'thalesilva@yahoo.com', '98985432173', 1),
(24, 'Thamyres Rocha ', 'Tharocha@outlook.com', '9481564237', 2),
(25, 'Jennifer Raimunda', 'Jennifertinder@hotmail.com', '98983456721', 2),
(26, 'Martins Costa', 'martinscista22@gail.com', '98985641235', 3),
(27, 'Antonio Fialho', 'antoniofialho12@gmail.com', '98988473296', 1),
(28, 'Raissa Cristina ', 'raicristina@gmail.com', '98987324561', 2),
(29, 'Vladimir Ricket', 'Vladimir@yahoo.com', '98988456327', 3),
(30, 'Zezé Henrique ', 'zehenrique@yahoo.com', '98987456391', 1),
(31, 'Marlios Maldonado ', 'marmal@outlook.com', '98988546328', 1),
(32, 'Bruna marcele', 'brunamarcele@gmail.com', '98985346719', 2),
(33, 'Anderson Barros', 'anderson.barros@gmail.com', '98981476510', 1),
(34, 'Marcelo Henrique', 'marcelohenrique@gmail.com', '98988461732', 1),
(35, 'Larissa Manoela', 'Lariquete@hotmail.com', '98969246924', 2),
(36, 'Diego Costa e Silva', 'diego.silva@outlook.com', '98988546312', 1),
(37, 'Rodrigo Santana', 'Rosantana@gmail.com', '98988564731', 1),
(38, 'Andreia Lima', 'andreialima@gmail.com', '98988145764', 2),
(39, 'Maria Melo', 'mariamelo@hotmail.com', '98988114792', 2),
(40, 'Rafaela Ana Bonfim ', 'rafaela.ana@gmail.com', '98984759361', 2),
(41, 'Marcela Lima Silva ', 'marcela.lima@gmail.com', '98987549372', 2),
(42, 'Vinicius Lima Campos', 'vinicius.lima@gmail.com', '98987493502', 1),
(43, 'Erick Batista Alves', 'erick_bastitaalves180@gmail.com', '98987241564', 1),
(44, 'Arlindo Gomes Silva', 'arlindogo17@gmail.com', '98988473269', 1),
(45, 'Aracaz Silva Muniz', 'gokussj4@gmail.com', '98988473341', 1),
(46, 'Anderson Torres Lobo', 'wolftrones@gmail.com', '98981234517', 1),
(49, 'Mario Santana  Lobo', 'mario.sanlobo@gmail.com', '98988567541', 1),
(56, 'Emily Trevor Marques ', 'emilyTrevorM18@gmail.com', '98985649718', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `sexo`
--

CREATE TABLE `sexo` (
  `id` int(11) NOT NULL,
  `n_sexo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `sexo`
--

INSERT INTO `sexo` (`id`, `n_sexo`) VALUES
(1, 'Homem'),
(2, 'Mulher'),
(3, 'Outros');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sexo` (`sexo`);

--
-- Índices para tabela `sexo`
--
ALTER TABLE `sexo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastro`
--
ALTER TABLE `cadastro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de tabela `sexo`
--
ALTER TABLE `sexo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cadastro`
--
ALTER TABLE `cadastro`
  ADD CONSTRAINT `cadastro_ibfk_1` FOREIGN KEY (`sexo`) REFERENCES `sexo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
