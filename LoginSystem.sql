CREATE DATABASE IF NOT EXISTS loginsystem;
USE loginsystem;
-- DROP DATABASE LoginSystem;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    nome VARCHAR(255),
    logo_perfil VARCHAR(255),
    sobrenome VARCHAR(255)
);	

CREATE TABLE empresas (
    id  INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18),
    endereco VARCHAR(255)
);

CREATE TABLE vagas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    empresa_id INT,
    titulo VARCHAR(100),
    descricao TEXT,
    data_cadastro DATE,
    nome_da_empresa VARCHAR(255),
    logo_perfil VARCHAR(255),
    imagem VARCHAR(255)
);

CREATE TABLE candidatos (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE candidaturas (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    vaga_id INT,
    nome_empresa_id INT
);

CREATE TABLE curriculos (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(60),
	cargo VARCHAR(60),
	foto VARCHAR(255),
	endereco VARCHAR(255),
	telefone VARCHAR(100),
	email VARCHAR(255),
	resumo VARCHAR(300)
);



SELECT * FROM usuario;
SELECT * FROM curriculos;
SELECT * FROM empresas;
SELECT * FROM vagas ORDER BY data_cadastro;
INSERT INTO usuario (logo_perfil)
VALUES ('logo.png');
SELECT * FROM candidaturas;

DROP TABLE curriculos;
DROP TABLE vagas;
DROP TABLE usuario;
DROP TABLE empresas;