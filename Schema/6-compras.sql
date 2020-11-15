use chinemacenter;

drop table compras;

CREATE TABLE compras (	
  id_funcion int NOT NULL,
  fecha_compra DATE NOT NULL,
  fecha_funcion DATE NOT NULL,
  email VARCHAR(100) NOT NULL,
  cantidad int NOT NULL,
  CONSTRAINT FK_COMPRAS FOREIGN KEY (id_funcion) REFERENCES funciones(id_funcion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

select sum(cantidad) as can,salas.capacidad from compras
join funciones on compras.id_funcion = funciones.id_funcion
join salas on salas.id_sala = funciones.id_sala
where compras.id_funcion=1 and compras.fecha_funcion='2020-11-16';

select * from funciones where id_funcion=1;

select * from compras;

select * from funciones;
