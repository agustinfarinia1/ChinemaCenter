use chinemacenter;

CREATE TABLE peliculas (
  id_pelicula int NOT NULL,
  nombre varchar(90) NOT NULL,
  comentario varchar(250),  
  poster varchar(90),
  foto varchar(90),
  fecha_salida DATE,
  duracion int,
  CONSTRAINT PK_PELICULAS PRIMARY KEY (id_pelicula)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

DROP procedure IF EXISTS `SP_PELI_ADD`;
DELIMITER $$
CREATE PROCEDURE SP_PELI_ADD(IN  idPelicula int,
  nombre varchar(90),
  comentario varchar(250),
  poster varchar(90),
  foto varchar(90),
  fechaSalida DATE,
  duracion int)
BEGIN
	INSERT INTO peliculas
    (peliculas.id_pelicula, peliculas.nombre, peliculas.comentario, peliculas.poster, peliculas.foto ,peliculas.fecha_salida, peliculas.duracion)
VALUES
    (idPelicula, nombre, comentario, poster, foto ,fechaSalida, duracion);
    
END$$
DELIMITER ;