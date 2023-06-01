create database tcc;

use tcc;

create table empresas (
nome varchar (255),
endereco varchar (255) unique,
telefone varchar (25) unique,
cnpj varchar (20) unique,
email varchar (255) unique
);

select * from empresas;	

drop table empresas;