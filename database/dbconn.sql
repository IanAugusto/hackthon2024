CREATE DATABASE hackthon;

USE hackthon;


CREATE TABLE usuarios (
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    username VARCHAR(255) NOT NULL,    
    password VARCHAR(255) NOT NULL
);

