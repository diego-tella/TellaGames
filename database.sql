create database TellaJogos;

create table jogos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    descricao VARCHAR(255) NOT NULL,
    filenameimg VARCHAR(255),
    folder_name VARCHAR(30)
);

INSERT INTO jogos (nome, descricao, filenameimg, folder_name) VALUES ('Flappy Bird', 'Flappy bird eh um jogo top!', 'flappy.jpg', 'Flappy-Bird');

INSERT INTO jogos (nome, descricao, filenameimg, folder_name) VALUES ('Snake', 'O classico jogo da cobrinha!', 'snake.png', 'Snake');