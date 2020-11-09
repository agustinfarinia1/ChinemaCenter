DROP DATABASE IF EXISTS chinemacenter;

CREATE DATABASE IF NOT EXISTS chinemacenter;

USE chinemacenter;

CREATE TABLE IF NOT EXISTS users
(
    id_user int NOT NULL AUTO_INCREMENT,
	name VARCHAR(100) NOT NULL,
	userName VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    rol int DEFAULT 0,
    estado int DEFAULT 1,
    token VARCHAR(100),
    CONSTRAINT PK_USERS PRIMARY KEY (id_user),
    CONSTRAINT UQ_USERS UNIQUE (userName)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (name, userName, password, rol) VALUES ('admin', 'admin@chinemacenter.com','1234',1);
INSERT INTO users (name, userName, password) VALUES ('user', 'user@chinemacenter.com','1234');

CREATE TABLE cines (
  id_cine int NOT NULL,
  nombre varchar(50) NOT NULL,
  direccion varchar(50) NOT NULL,
  estado int DEFAULT 1,
  CONSTRAINT PK_CINES PRIMARY KEY (id_cine)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE salas (
  id_sala int NOT NULL AUTO_INCREMENT,
  id_cine int(11) NOT NULL,
  nombre varchar(50) NOT NULL,
  capacidad int DEFAULT 1,
  precio float DEFAULT 0,
  estado int DEFAULT 1,
  CONSTRAINT PK_SALAS PRIMARY KEY (id_sala),
  CONSTRAINT FK_SALAS FOREIGN KEY (id_cine) REFERENCES cines(id_cine)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from salas;