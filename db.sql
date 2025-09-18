CREATE DATABASE login_db;

    USE login_db;

    CREATE TABLE ususarios (
        pk INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR (120) NOT NULL UNIQUE,
        senha VARCHAR (255) NOT NULL,
        cargo ENUM ('adm', 'func') NOT NULL
    );

INSERT INTO ususarios (username, senha) VALUES ('admin', '123');

