USE chinemacenter;

CREATE TABLE cines 
(
  id_cine int NOT NULL AUTO_INCREMENT,
  nombre varchar(50) NOT NULL,
  direccion varchar(50) NOT NULL,
  estado int DEFAULT 1,
  CONSTRAINT PK_CINES PRIMARY KEY (id_cine)  
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO cines ( nombre, direccion) VALUES ('tato', 'lalala');
INSERT INTO cines ( nombre, direccion) VALUES ('pepe', 'tututu');