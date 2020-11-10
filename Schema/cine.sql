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
  id_cine int NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  direccion varchar(50) NOT NULL,
  estado int DEFAULT 1,
  CONSTRAINT PK_CINES PRIMARY KEY (id_cine)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cines ( nombre, direccion) VALUES ('tato', 'lalala');
INSERT INTO cines ( nombre, direccion) VALUES ('pepe', 'tututu');

SELECT * FROM cines;

CREATE TABLE salas (
  id_sala int NOT NULL AUTO_INCREMENT,
  id_cine int NOT NULL,
  nombre varchar(50) NOT NULL,
  capacidad int DEFAULT 1,
  precio float DEFAULT 0,
  estado int DEFAULT 1,
  CONSTRAINT PK_SALAS PRIMARY KEY (id_sala),
  CONSTRAINT FK_SALAS FOREIGN KEY (id_cine) REFERENCES cines(id_cine)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO salas 
	( id_cine, nombre, capacidad, precio) 
VALUES 
	(1, 'paco', 500, 233),
    (1, 'manolo', 300, 150);


CREATE TABLE funciones (	
  id_funcion int NOT NULL AUTO_INCREMENT,
  id_sala int NOT NULL,
  id_pelicula int NOT NULL,
  fecha_inicio DATE,
  fecha_fin DATE,
  hora_inicio TIME,
  hora_fin TIME,
  lunes BOOLEAN DEFAULT 0,
  martes BOOLEAN DEFAULT 0,
  miercoles BOOLEAN DEFAULT 0,
  jueves BOOLEAN DEFAULT 0,
  viernes BOOLEAN DEFAULT 0,
  sabado BOOLEAN DEFAULT 0,
  domingo BOOLEAN DEFAULT 0,
  CONSTRAINT PK_SALAS PRIMARY KEY (id_funcion),
  CONSTRAINT FK_FUNCIONES FOREIGN KEY (id_sala) REFERENCES salas(id_sala)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;