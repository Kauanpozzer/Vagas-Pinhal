CREATE DATABASE IF NOT EXISTS LoginSystem;
USE LoginSystem;
-- DROP DATABASE LoginSystem;

CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    senha VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    nome VARCHAR(255),
    sobrenome VARCHAR(255),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(10)
);	

CREATE TABLE empresas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome_empresa VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    senha VARCHAR(255) NOT NULL,
    cnpj VARCHAR(18),
    endereco VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(10)
);

SELECT * FROM usuario;
SELECT * FROM empresas;