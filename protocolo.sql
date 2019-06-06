CREATE DATABASE tabelionato


CREATE TABLE `modo` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `ocorrencias` (
  `id` int(11) NOT NULL,
  `descricao` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `protocolo` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `idusuario` int(11),
  `idmodo` int(11),
  `idocorrencias` int(11),
  `data_visita` date,
  `obs` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci null
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) CHARACTER SET utf8 NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8 NOT NULL, 
  `tipo` char 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `protocolo_pa` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `idusuario` int(11),
  `idato` int(11),
  `data_visita` date
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
  
  CREATE TABLE `ato` (
  `id` int(11) NOT NULL,
  `descricao` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=latin1;





INSERT INTO `usuario` (`id`, `nome`, `senha`, `tipo`) VALUES
(1, 'admin',md5('senha123'), 1);
insert into `usuario` values 
(2, 'angmerlo', md5('123456'), 2);


ALTER TABLE `modo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);




ALTER TABLE `protocolo`
  ADD CONSTRAINT `mod_protocolo_fk` FOREIGN KEY (`idmodo`) REFERENCES `modo` (`id`);

ALTER TABLE `protocolo`
  ADD CONSTRAINT `sta_protocolo_fk` FOREIGN KEY (`idocorrencias`) REFERENCES `ocorrencias` (`id`);

ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `protocolo`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `protocolo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
insert into  `protocolo`  VALUES (1, '2905030', 1, 0, 0, null, null);


ALTER TABLE `protocolo_pa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

insert into  `protocolo_pa`  VALUES (1, '2905030', 1, 0, null);
insert into  `protocolo_pa`  VALUES (2, '2905031', 1, 0, null);

--INSERÇÕES TABELA MODO

INSERT INTO `modo` (`id`, `descricao`) VALUES  (1, 'No endereco');
INSERT INTO `modo` (`id`, `descricao`) VALUES  (2, 'Pessoalmente');


INSERT INTO `ato` (`id`, `descricao`) VALUES  (0, 'APONTADO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (1, 'INTIMADO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (2, 'PAGO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (3, 'PROTESTADO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (4, 'RETIRADO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (5, 'SUSTADO');
INSERT INTO `ato` (`id`, `descricao`) VALUES  (11, 'PENDENTE');

-- INSERÇÕES NA TABELA OCORRÊNCIAS
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (1, '1 Visita');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (2, '2 Visita');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (3, 'Mudou-se');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (4, 'Nao existe o numero da rua');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (5, 'Desconhecido no endereco');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (6, 'Falta sala ou apto');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (7, 'Rua Desconhecida');
INSERT INTO `ocorrencias` (`id`, `descricao`) VALUES (8, 'Recusado');


