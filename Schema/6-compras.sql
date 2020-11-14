use chinemacenter;

drop table compras;

CREATE TABLE compras (	
  id_funcion int NOT NULL,
  fecha_compra DATE NOT NULL,
  fecha_funcion DATE NOT NULL,
  email VARCHAR(100) NOT NULL,
  cantidad int NOT NULL,
  CONSTRAINT PK_COMPRAS PRIMARY KEY (id_funcion),
  CONSTRAINT FK_COMPRAS FOREIGN KEY (id_funcion) REFERENCES funciones(id_funcion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select * from compras;

select * from funciones;
