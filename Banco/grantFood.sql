-- Criando e selecionando o banco 'Grantfood'
CREATE DATABASE grantFood;
USE grantFood;

--
-- tabela funcionario 
--
create table usuario(
    idFunc int primary KEY auto_increment,
    nome varchar(100),
    tipo VARCHAR(15), 
    senha VARCHAR(100),
    usuario varchar(40),
    genero varchar(20),
    cpf char(11),
    salario decimal(7,2),
    cargaHoraria int, 
    foto VARCHAR(255)
);

--
-- Inserção de dados na tabela usuário
--
INSERT INTO `usuario` (`idFunc`, `nome`, `tipo`, `senha`, `usuario`, `genero`, `cpf`, `salario`, `cargaHoraria`, `foto`) VALUES
(1, 'AlessandrTeste', '1', '21232f297a57a5a743894a0e4a801fc3', 'ale', 'Masculino', '12345678912', '10.00', 8, NULL),
(2, 'Alessandro Alves', '1', '81dc9bdb52d04dc20036dbd8313ed055', 'alealves', 'Masculino', '12345678912', '1500.00', 12, '82893a687df605a9dacad2f927ae5632.jpg'),
(3, 'AleCozinha', '3', '202cb962ac59075b964b07152d234b70', 'alecozinha', 'Masculino', '12345678912', '1500.00', 45, '08ebdf7aac7211c4b0baba01f5c3c26e.jpg'),
(4, 'gabriel ', '1', '21232f297a57a5a743894a0e4a801fc3', 'Gabriel', 'Masculino', '1234567890', '1000.00', 8, 'ee45c748d50bbd63773e9c51772551a1.png');

--
-- tabela endereço
-- 
create table endereco(
    idEndereco int primary key auto_increment,
    cep CHAR(9),
    logradouro varchar(100),
    bairro varchar(100),
    cidade varchar(50),
    estado char(2),
    complemento varchar(50),
    codEndereco int ,
    numero INT,
    foreign key(codEndereco) references usuario(idFunc)
);

--
-- tabela telefone
--
create table telefone(
    id int primary key auto_increment,
    ddd char(3),
    telefone varchar(9),
    tipo varchar(15),
    codTelefone INT , 
    foreign key(codTelefone) references usuario(idFunc)
);

--
-- tabela gastos
--
create table gastos(
    id int primary key auto_increment,
    valor decimal(7,2),
    tipo varchar(255), 
    descricao varchar(255),
    data datetime
);

--
-- tabela sistema
--
CREATE TABLE sistema (
  id int(5) NOT NULL,
  status varchar(50) DEFAULT NULL,
  pedidos int(11) DEFAULT NULL
);

--
-- inserção de dados na tabela sistema
--
INSERT INTO `sistema` (`id`, `status`, `pedidos`) VALUES
(1, 'On', 0);

--
-- tabela mesa
--
create table mesa(
	numero int(11) primary key,
	STATUS varchar(30) DEFAULT NULL,
	lugares varchar(255) DEFAULT NULL,
	qtdUsada int(11) DEFAULT NULL
);

--
-- tabela Sessão
--
CREATE TABLE sessao (
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL,
  foreign key(codMesa) references mesa(numero)
);

--
-- trigger tgr_sessao_delete
--
DELIMITER $$
	CREATE TRIGGER tgr_sessao_delete AFTER DELETE
    ON sessao
    FOR EACH ROW
    BEGIN
		INSERT INTO logSessao (codSessao,codMesa,dataHora) VALUES (old.codSessao, old.codMesa, old.dataHora);
    END $$
DELIMITER ;

--
-- tabela logSessao
-- 
create table logSessao(
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL
);

--
-- tabela Categoria
--
CREATE TABLE categoria(
	id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nomeCat VARCHAR(100)
);

--
-- inserção de dados na tabela Categoria
--
INSERT INTO `categoria` (`id`, `nomeCat`) VALUES
(1, 'pizza'),
(2, 'bebida'),
(3, 'lanche'),
(4, 'sobremesa');

--
-- tabela produtos
--
create table produtos(
    id int(5) NOT NULL primary key auto_increment,
	nome varchar(100) NOT NULL,
	descricao varchar(255) DEFAULT NULL,
	image varchar(255) NOT NULL,
	preco double(10,2) NOT NULL,
	categoria_id int,
	FOREIGN KEY(categoria_id) REFERENCES categoria(id)
);

--
-- iserção de dados na tabela produtos
--
INSERT INTO PRODUTOS VALUES (1,'Batata', 'batata e creme', 'Batata.png', 24.00, 'fries',3);
INSERT INTO PRODUTOS VALUES (2,'Pizza Frango', 'frango', 'Pizza Frango.png', 55.00, 'pizza',1);

--
-- tabela pedido
--
create table pedido(
   id int NOT NULL primary key,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
	status varchar(255) DEFAULT 'Enviado',
	data varchar(50) NOT NULL,
	observacao VARCHAR(255),
    foreign key(mesa) references mesa(numero),
    foreign key(sessao) references sessao(codSessao)
);

--
-- tabela logPedido 
--
create table logPedido(
	id int NOT NULL primary key auto_increment,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
  data varchar(50) NOT NULL
);

--
-- trigger trg_pedido_delete
--
DELIMITER $$
	CREATE TRIGGER tgr_pedido_delete AFTER DELETE
    ON pedido
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedido (sessao,mesa,preco,data) VALUES (old.sessao, old.mesa, old.preco, old.data);
    END $$
DELIMITER ;

--
-- tabela pedidoitem
--
create table pedidoitem(
   id int(5) NOT NULL primary key auto_increment,
   mesa int(50) NOT NULL,
   codPedido int(5) NOT NULL,
   sessao varchar(50) NOT NULL,
   item varchar(255) NOT NULL,
   quantidade varchar(50) NOT NULL DEFAULT 0,
   preco double(10,2) NOT NULL,
   total varchar(50) NOT NULL DEFAULT 0,
   idProduto INT(10) NOT NULL,
   foreign key(codPedido) references pedido(id),
   foreign key(mesa) references mesa(numero),
   foreign key(sessao) references sessao(codSessao),
   foreign key(idProduto) references produtos(id)
);

--
-- tabela logPedidoItem
--
create table logPedidoItem(
	id int NOT NULL primary key auto_increment,
	mesa int(50) NOT NULL,
   codPedido int(5) NOT NULL,
   sessao varchar(50) NOT NULL,
   item varchar(255) NOT NULL,
   quantidade varchar(50) NOT NULL DEFAULT 0,
   preco double(10,2) NOT NULL,
   total varchar(50) NOT NULL DEFAULT 0
);

--
-- trigger tgr_pedidoitem_delete
--
DELIMITER $$
	CREATE TRIGGER tgr_pedidoitem_delete AFTER DELETE
    ON pedidoitem
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedidoItem (mesa,codPedido,sessao,item,quantidade,preco,total) VALUES (old.mesa, old.codpedido, old.sessao,old.item,old.quantidade, old.preco, old.total);
    END $$
DELIMITER ;

-- 
-- Tabela fechaConta
--
create table fechaConta(
    id int primary key auto_increment,
    codPedido INT,
    formaPagamento varchar(50),
    DATA DATETIME
);

--
-- Tabela Avaliação
--
CREATE TABLE avaliacao(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	qtdEstrela CHAR(1) NOT NULL ,
  comentario varchar(255) NULL,
	data_hora DATETIME NOT NULL,
  codMesa int NOT NULL,
  foreign key(codMesa) references mesa(numero)
);



-- total de pedidos feitos
SELECT SUM(logp.preco) AS totalVendas FROM logpedido AS logp;

-- total de vendas feitas nos ultimos 30 dias
SELECT SUM(logped.preco) AS totalVendas FROM logpedido AS logped wHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();