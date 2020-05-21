create database sysos DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
use sysos;

create table usuarios (
	id int auto_increment not null primary key,
	nome  varchar(255) not null,
	sobrenome varchar(255) not null,
	login varchar(30) not null,
	senha varchar(255) not null,
	telefone varchar(255) null able,
	endereco varchar(255) null able,
	cidade varchar(255) null able,
	estado varchar(255) null able,
	cep varchar (255) null able,
	email varchar (255) null able,
    cpf varchar (255) null able,
    rg varchar (255) null able,
  funcao_id int,
  foreign key (funcao_id) references funcoes(id)
) ENGINE = MYISAM;

create table funcoes (
  id int auto_increment not null primary key,
  nome varchar(255) not null,
) ENGINE = MYISAM;

create table equipamentos (
	id int auto_increment not null primary key,
	marca varchar(255) null able,
	modelo varchar(255) null able, 
  serial_number varchar(40) null able,
  tipo varchar(40) null able 
) ENGINE = MYISAM;

create table orcamentos (
  id int auto_increment not null primary key,
  servico varchar(255) not null,
  valor decimal(10,2) not null,
  data_cadastro datetime not null
)ENGINE = MYISAM;

create table ordem_servico (
	id int auto_increment not null primary key,
  problema varchar(255) not null,
  data_hora datetime not null,
  data_hora_entrega datetime not null,
  equipamento_id int,
    foreign key (equipamento_id) references equipamentos(id),
  usuario_id int,
    foreign key (usuario_id) references usuarios(id),
  orcamento_id int,
    foreign key (orcamento_id) references orcamentos(id),
  status_id int,
    foreign key (status_id) references situacao(id),
) ENGINE = MYISAM;

create table situacao (
  id int auto_increment not null primary key,
  nome varchar(255) not null,
  descricao varchar(255) null able, 
) ENGINE = MYISAM;