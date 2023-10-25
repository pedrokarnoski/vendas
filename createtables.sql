CREATE DATABASE IF NOT EXISTS vendas;

USE vendas;

CREATE TABLE IF NOT EXISTS Usuario (
    idusuario INT AUTO_INCREMENT PRIMARY KEY,
    nomeusuario VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    Senha VARCHAR(255) NOT NULL
);

IF NOT EXISTS (SELECT 1 FROM Usuario WHERE nomeusuario = 'root') THEN
    INSERT INTO Usuario (nomeusuario, email, Senha) VALUES ('root', 'root@root', '123');
END IF;
