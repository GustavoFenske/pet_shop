CREATE DATABASE IF NOT EXISTS pet_shop;
USE pet_shop;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL
);

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    raca_pet VARCHAR(50) NOT NULL,
    idade INT,
    id_usuario INT NULL,
    FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);