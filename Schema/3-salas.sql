USE chinemacenter;

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