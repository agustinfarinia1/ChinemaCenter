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
  precio float DEFAULT 0,
  estado int DEFAULT 1,
  CONSTRAINT PK_SALAS PRIMARY KEY (id_sala),
  CONSTRAINT FK_SALAS FOREIGN KEY (id_cine) REFERENCES cines(id_cine)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--//////////////////////////////////////////////////////////////////

CREATE TABLE IF NOT EXISTS funciones 
(
    id_sala INT NOT NULL AUTO_INCREMENT,
	id_cine INT NOT NULL,
    id_pelicula INT NOT NULL,
    hora_funcion_inicio DATETIME,
	hora_funcion_fin DATETIME,
    CONSTRAINT PK_funciones PRIMARY KEY (id_sala)
)Engine=InnoDB;

Select * from funciones;

select * from funciones where ("2020-10-28 17:30:00" < hora_funcion_fin ) and ("2020-10-28 19:30:00" > hora_funcion_inicio );





DROP procedure IF EXISTS `Users_GetByUserName`;

DELIMITER $$

CREATE PROCEDURE Users_GetByUserName (IN userName VARCHAR(100))
BEGIN
	SELECT users.userName, users.name, users.password
    FROM users
    WHERE (users.userName = userName);
END$$

DELIMITER ;

DROP procedure IF EXISTS `Users_GetAll`;

DELIMITER $$

CREATE PROCEDURE Users_GetAll ()
BEGIN
	SELECT userName, password
    FROM users;
END$$

DELIMITER ;

DROP procedure IF EXISTS `funciones_Add`;

DELIMITER $$

CREATE PROCEDURE CellPhones_Add (IN code CHAR(4), IN brand VARCHAR(100), IN model VARCHAR(100), IN price DECIMAL(10, 2))
BEGIN
	INSERT INTO cellPhones
        (cellPhones.code, cellPhones.brand, cellPhones.model, cellPhones.price)
    VALUES
        (code, brand, model, price);
END$$

DELIMITER ;

DROP procedure IF EXISTS `funciones_GetAll`;

DELIMITER $$

CREATE PROCEDURE funciones_GetAll ()
BEGIN
	SELECT id_sala,id_cine,id_pelicula,hora_funcion_inicio,hora_funcion_fin
    FROM funciones;
END$$

DELIMITER ;

DROP procedure IF EXISTS `CellPhones_Delete`;

DELIMITER $$

CREATE PROCEDURE CellPhones_Delete (IN id INT)
BEGIN
	DELETE 
    FROM cellPhones
    WHERE (cellPhones.id = id);
END$$

DELIMITER ;

/*
 INSERT INTO users 
	(userName,name, password)
VALUES
	('admin@user.com','admin', 'admin'),
	('user@user.com','user', 'user')


INSERT INTO funciones 
    (id_cine,id_pelicula,hora_funcion_inicio,hora_funcion_fin)
VALUES
    (1,1,"2020-10-28 16:00:00","2020-10-28 17:30:00"),
    (2,2,"2020-10-28 20:00:00","2020-10-28 21:30:00")
*/