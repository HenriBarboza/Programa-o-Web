-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 05/05/2024 às 20:58
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
create database escola;
use escola;
-- Banco de dados: `escola`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `id_professor` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `sala` int(11) DEFAULT NULL,
  `horario` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `curso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `matricula`
--

CREATE TABLE `matricula` (
  `id` int(11) NOT NULL,
  `id_alu` int(11) NOT NULL,
  `id_cur` int(11) NOT NULL,
  `periodo` varchar(30) DEFAULT NULL,
  `data_matricula` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) DEFAULT NULL,
  `cpf` int(11) DEFAULT NULL,
  `carga_horaria` int(11) DEFAULT NULL,
  `formacao` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `professor`
--


--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`),
  ADD KEY `curso_ibfk_1` (`id_professor`);

--
-- Índices de tabela `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `matricula_ibfk_1` (`id_alu`),
  ADD KEY `matricula_ibfk_2` (`id_cur`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `matricula`
--
ALTER TABLE `matricula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_professor`) REFERENCES `professor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para tabelas `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_alu`) REFERENCES `aluno` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_cur`) REFERENCES `curso` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
   
insert into aluno (nome, idade, cpf) values ('João da Silva', 18, 62513025342);
insert into aluno (nome, idade, cpf) values ('Pedro Costa', 20, 87622844101);
insert into aluno (nome, idade, cpf) values ('Ana Rita', 21, 12739994877);
insert into aluno (nome, idade, cpf) values ('Fabiano Oliveira', 19, 51724689436);

insert into professor (nome, cpf, carga_horaria, formacao) values ('Antonio Ramos', 76520175307, 22, 'Bacharelado em administração');
insert into professor (nome, cpf, carga_horaria, formacao) values ('Luana Santos', 85639868643, 32, 'Bacharelado em Ciência da Computação');
insert into professor (nome, cpf, carga_horaria, formacao) values ('Ingrid Dias', 28277116306, 38, 'Mestrado em inteligência artificial');

insert into curso (id_professor, nome, sala, horario) values (2,'Web Designer', 10, '19:00');
insert into curso (id_professor, nome, sala, horario)  values (2,'Pacote Office', 11, '8:00');
insert into curso (id_professor, nome, sala, horario)  values (3,'Internet', 12, '14:00');
insert into curso (id_professor, nome, sala, horario)  values (1,'Excel', 10, '15:30');

insert into matricula (id_alu, id_cur,periodo) values (1, 1, 'Noturno');
insert into matricula (id_alu, id_cur,periodo) values (2, 2, 'Manhã');
insert into matricula (id_alu, id_cur,periodo) values (3, 2, 'Manhã');
insert into matricula (id_alu, id_cur,periodo)  values (2, 3, 'Tarde');
insert into matricula (id_alu, id_cur,periodo)  values (3, 4, 'Noturno');


   
   