use motorsport;
create table if not exists usuarios (
  usuario_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  nombre_usuario VARCHAR(50) NOT NULL UNIQUE,
  contrasena VARCHAR(255) NOT NULL,
  correo VARCHAR(150) NOT NULL UNIQUE,
  creacion date
);
create table if not exists clasificacion (
  piloto_id int AUTO_INCREMENT primary key not null,
  nombre VARCHAR(100) not null,
  apellido VARCHAR(100) not null,
  dorsal int(2) not null,
  puntos int not null,
  escuderia varchar(100) not null,
  nacionalidad varchar(100) not null
);

INSERT INTO clasificacion (nombre, apellido, dorsal, puntos, escuderia, nacionalidad) VALUES 
('Lando', 'Norris', 4, 423, 'McLaren', 'Reino Unido'),
('Max', 'Verstappen', 1, 421, 'Red Bull Racing', 'Países Bajos'),
('Oscar', 'Piastri', 81, 410, 'McLaren', 'Australia'),
('George', 'Russell', 63, 319, 'Mercedes', 'Reino Unido'),
('Charles', 'Leclerc', 16, 242, 'Ferrari', 'Mónaco'),
('Lewis', 'Hamilton', 44,  156, 'Ferrari', 'Reino Unido'),
('Kimi', 'Antonelli', 12, 150, 'Mercedes', 'Italia'),
('Alexander', 'Albon', 23, 73, 'Williams', 'Tailandia'),
('Carlos', 'Sainz', 55, 64, 'Williams', 'España'),
('Fernando', 'Alonso', 14, 56, 'Aston Martin', 'España');

INSERT INTO usuarios (nombre_usuario, contrasena, correo, creacion)
VALUES (
  'admin',
  '$2y$10$Qe6z0u1pQJqvYp8GmV7E0u6xX9kq8v1n2p3r4s5t6u7v8w9x0y1z', 
  'admin@f1.com',
  CURDATE()
);
