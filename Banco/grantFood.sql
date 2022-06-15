CREATE DATABASE grantFood;
USE grantFood;

-- funcionario 
create table usuario(
    idFunc int primary KEY auto_increment,
    nome varchar(100),
    tipo VARCHAR(15), 
    senha VARCHAR(100),
    usuario varchar(40),
    genero varchar(20),
    cpf char(11),
    salario decimal(7,2),
    cargaHoraria int , 
    ponto varchar(15),
    dica varchar(50),
    foto VARCHAR(255)
);

SELECT * FROM usuario;
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

create table telefone(
    id int primary key auto_increment,
    ddd char(3),
    telefone varchar(9),
    tipo varchar(15),
    codTelefone INT , 
    foreign key(codTelefone) references usuario(idFunc)
);

create table gastos(
    id int primary key auto_increment,
    valor decimal(7,2),
    tipo varchar(255), 
    descricao varchar(255),
    data datetime
);

CREATE TABLE sistema (
  id int(5) NOT NULL,
  status varchar(50) DEFAULT NULL,
  pedidos int(11) DEFAULT NULL
);

INSERT INTO `sistema` (`id`, `status`, `pedidos`) VALUES
(1, 'On', 0);

-- CARDAPIO
create table mesa(
	numero int(11) primary key,
	STATUS varchar(30) DEFAULT NULL,
	link varchar(255) DEFAULT NULL,
	qtdUsada int(11) DEFAULT NULL
);

CREATE TABLE sessao (
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL,
  foreign key(codMesa) references mesa(numero)
);


DELIMITER $$
	CREATE TRIGGER tgr_sessao_delete AFTER DELETE
    ON sessao
    FOR EACH ROW
    BEGIN
		INSERT INTO logSessao (codSessao,codMesa,dataHora) VALUES (old.codSessao, old.codMesa, old.dataHora);
    END $$
DELIMITER ;


create table logSessao(
  codSessao varchar(30) primary key,
  codMesa int(11) DEFAULT NULL,
  dataHora datetime DEFAULT NULL
);


create table produtos(
    id int(5) NOT NULL primary key auto_increment,
	nome varchar(100) NOT NULL,
	descricao varchar(255) DEFAULT NULL,
	image varchar(255) NOT NULL,
	preco double(10,2) NOT NULL,
	categoria_id int,
	FOREIGN KEY(categoria_id) REFERENCES categoria(id)
);


CREATE TABLE categoria(
	id INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	nomeCat VARCHAR(100)
);


insert INTO PRODUTOS VALUES (1,'Batata', 'batata e creme', 'Batata.png', 24.00, 'fries');
insert INTO PRODUTOS VALUES (2,'Pizza Frango', 'frango', 'Pizza Frango.png', 55.00, 'pizza');

create table pedido(
   id int NOT NULL primary key,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
	status varchar(255) DEFAULT 'Enviado',
	data varchar(50) NOT NULL,
    foreign key(mesa) references mesa(numero),
    foreign key(sessao) references sessao(codSessao)
);

create table logPedido(
	id int NOT NULL primary key auto_increment,
	sessao varchar(255) NOT NULL,
	mesa int NOT NULL DEFAULT 0,
	preco double(10,2) NOT NULL,
  data varchar(50) NOT NULL
);

DELIMITER $$
	CREATE TRIGGER tgr_pedido_delete AFTER DELETE
    ON pedido
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedido (sessao,mesa,preco,data) VALUES (old.sessao, old.mesa, old.preco, old.data);
    END $$
DELIMITER ;

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


DELIMITER $$
	CREATE TRIGGER tgr_pedidoitem_delete AFTER DELETE
    ON pedidoitem
    FOR EACH ROW
    BEGIN
		INSERT INTO logPedidoItem (mesa,codPedido,sessao,item,quantidade,preco,total) VALUES (old.mesa, old.codpedido, old.sessao,old.item,old.quantidade, old.preco, old.total);
    END $$
DELIMITER ;

create table fechaConta(
    id int primary key auto_increment,
    codPedido INT,
    formaPagamento varchar(50),
    DATA DATETIME
);

CREATE TABLE avaliacao(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	qtdEstrela CHAR(1) NOT NULL ,
	data_hora DATETIME NOT NULL
  codMesa int NOT NULL,
  foreign key(codMesa) references mesa(numero)
);


-- total de pedidos feitos
SELECT SUM(logp.preco) AS totalVendas FROM logpedido AS logp;

-- total de vendas feitas nos ultimos 30 dias
SELECT SUM(logped.preco) AS totalVendas FROM logpedido AS logped wHERE data BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE();

