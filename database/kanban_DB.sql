CREATE DATABASE pet_shop;
use pet_shop;

CREATE TABLE pets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    raca_pet VARCHAR(50) NOT NULL,
    idade INT

    id_usuario INT NULL,
    foreign key (id_usuario) references usuarios(id)
);

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,


    id_pet INT NULL,
    foreign key (id_pet) references pets(id)
);