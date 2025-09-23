CREATE DATABASE login_db;

    USE login_db;

CREATE TABLE ususarios (
        pk INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR (120) NOT NULL UNIQUE,
        senha VARCHAR (255) NOT NULL,
        cargo ENUM ('adm', 'func') NOT NULL,
        nome VARCHAR (255),
        nascimento DATE,
        localizacao VARCHAR (100),
        foto VARCHAR (255)
    );

INSERT INTO ususarios (username, senha) VALUES ('admin', '123');

