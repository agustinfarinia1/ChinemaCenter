use chinemacenter;

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
  estado int DEFAULT 1,
  estreno BOOLEAN DEFAULT 1,
  CONSTRAINT PK_SALAS PRIMARY KEY (id_funcion),
  CONSTRAINT FK_FUNCIONES FOREIGN KEY (id_sala) REFERENCES salas(id_sala)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP procedure IF EXISTS `SP_FUN_GET_ALL`;
DELIMITER $$
CREATE PROCEDURE SP_FUN_GET_ALL()
BEGIN
	SELECT
      f.id_funcion,
	  f.id_sala,
	  f.id_pelicula,
	  f.fecha_inicio,
	  f.fecha_fin,
	  f.hora_inicio,
	  f.hora_fin,
	  f.lunes,
	  f.martes,
	  f.miercoles,
	  f.jueves,
	  f.viernes,
	  f.sabado,
	  f.domingo,
      f.estreno,
      c.nombre AS nombre_cine,
      s.nombre AS nombre_sala,     
      p.nombre AS nombre_pelicula,
      p.poster,
      p.foto,
      p.comentario
    FROM funciones f
    INNER JOIN salas s ON s.id_sala = f.id_sala
    INNER JOIN peliculas p ON p.id_pelicula = f.id_pelicula
    INNER JOIN cines c ON c.id_cine = s.id_cine
    WHERE f.estado = 1 ORDER BY f.id_funcion DESC;
END$$
DELIMITER ;



DROP procedure IF EXISTS `SP_FUN_GET_X_ID`;
DELIMITER $$
CREATE PROCEDURE SP_FUN_GET_X_ID(IN id INT)
BEGIN
	SELECT
      f.id_funcion,
	  f.id_sala,
	  f.id_pelicula,
	  f.fecha_inicio,
	  f.fecha_fin,
	  f.hora_inicio,
	  f.hora_fin,
	  f.lunes,
	  f.martes,
	  f.miercoles,
	  f.jueves,
	  f.viernes,
	  f.sabado,
	  f.domingo,
      f.estreno,
      c.nombre AS nombre_cine,
      s.nombre AS nombre_sala,     
      p.nombre AS nombre_pelicula,
      p.poster,
      p.foto,
      p.comentario
    FROM funciones f
    INNER JOIN salas s ON s.id_sala = f.id_sala
    INNER JOIN peliculas p ON p.id_pelicula = f.id_pelicula
    INNER JOIN cines c ON c.id_cine = s.id_cine
    WHERE f.estado = 1 AND  f.id_funcion = id ORDER BY f.id_funcion DESC;
END$$
DELIMITER ;

DROP procedure IF EXISTS `SP_FUN_DELETE`;
DELIMITER $$
CREATE PROCEDURE SP_FUN_DELETE(IN id INT)
BEGIN
	UPDATE funciones f SET estado=0 WHERE f.id_funcion= id;
END$$
DELIMITER ;

DROP procedure IF EXISTS `SP_FUN_EDIT`;
DELIMITER $$
CREATE PROCEDURE SP_FUN_EDIT(IN 
  idFuncion INT,
  fechaInicio DATE,
  fechaFin DATE,
  horaInicio TIME,
  horaFin TIME,
  lunes BOOLEAN,
  martes BOOLEAN,
  miercoles BOOLEAN,
  jueves BOOLEAN,
  viernes BOOLEAN,
  sabado BOOLEAN,
  domingo BOOLEAN)
BEGIN
	UPDATE funciones f
    SET 	
	  f.fecha_inicio = fechaInicio,
	  f.fecha_fin = fechaFin,
	  f.hora_inicio = horaInicio,
	  f.hora_fin = horaFin,
	  f.lunes = lunes,
	  f.martes = martes,
	  f.miercoles = miercoles,
	  f.jueves = jueves,
	  f.viernes = viernes,
	  f.sabado = sabado,
	  f.domingo = domingo
	WHERE f.id_funcion= idFuncion;
END$$
DELIMITER ;