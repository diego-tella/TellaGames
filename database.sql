create database TellaJogos;

create table jogos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    filenameimg VARCHAR(255),
    folder_name VARCHAR(30),
    last_modifid date
);

create table users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
    senha VARCHAR(35) NOT NULL
);

create table sobre(
    descricao VARCHAR(2000)
);
INSERT INTO sobre(descricao) VALUES ('');

INSERT INTO jogos (nome, descricao, filenameimg, folder_name, last_modifid) VALUES ('Flappy Bird', 'Flappy bird eh um jogo top!', 'flappy.jpg', 'Flappy-Bird', '2004-04-04');

INSERT INTO jogos (nome, descricao, filenameimg, folder_name, last_modifid) VALUES ('Snake', 'O classico jogo da cobrinha!', 'snake.png', 'Snake', '2004-04-04');

INSERT INTO jogos (nome, descricao, filenameimg, folder_name, last_modifid) VALUES ('Pacman', 'Comendo fantasmas desde sempre!', 'Pacman.png', 'Pacman', '2004-04-04');

INSERT INTO USERS (nome, senha) VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3');