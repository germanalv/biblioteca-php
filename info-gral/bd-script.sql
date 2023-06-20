CREATE TABLE libros (
  id INT AUTO_INCREMENT PRIMARY KEY,
  titulo VARCHAR(255),
  autor VARCHAR(255),
  genero VARCHAR(255),
  anio INT,
  cant_ejemplares int
);


CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  ci VARCHAR(100),
  nombre VARCHAR(255),
  apellido VARCHAR(255),
  mail VARCHAR(255),
  tal VARCHAR(255),
  dir VARCHAR(255),
);

CREATE TABLE prestamo (
  id INT AUTO_INCREMENT PRIMARY KEY,
  id_libro INT,
  id_usuario INT,
  fecha_prestamo DATE,
  fecha_devolución DATE,
  estado INT,
  FOREIGN KEY (id_libro) REFERENCES libros(id),
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id)
);