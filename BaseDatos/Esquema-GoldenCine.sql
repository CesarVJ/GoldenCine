# create database GoldenCine;
# use GoldenCine;
CREATE TABLE Administrador (
  id_administrador char(5) NOT NULL, 
  nombre           varchar(30) NOT NULL, 
  correo           varchar(30) NOT NULL, 
  contrase�a       varchar(255) NOT NULL, 
  PRIMARY KEY (id_administrador));
CREATE TABLE Cliente (
  id_cliente       char(10) NOT NULL, 
  Nombre_cliente   varchar(40) NOT NULL, 
  Fecha_nacimiento date NOT NULL, 
  correo           varchar(30) NOT NULL, 
  telefono         char(10), 
  contrase�a       varchar(255) NOT NULL, 
  PRIMARY KEY (id_cliente));
CREATE TABLE Horario (
  id_horario          char(10) NOT NULL, 
  dia                 date NOT NULL, 
  hora                time NOT NULL, 
  sala                int(10) NOT NULL, 
  id_pelicula char(10) NOT NULL, 
  PRIMARY KEY (id_horario));
CREATE TABLE Pelicula (
  id_pelicula     char(10) NOT NULL, 
  nombre_pelicula varchar(150) NOT NULL, 
  descripcion     varchar(255) NOT NULL, 
  duracion        float NOT NULL, 
  actores         varchar(255), 
  calificacion    float NOT NULL, 
  portada         varchar(255) NOT NULL, 
  categoria       varchar(30) NOT NULL,
  precio          float NOT NULL, 
  PRIMARY KEY (id_pelicula));
CREATE TABLE Reservacion (
  id_reservacion      char(10) NOT NULL, 
  asientos            varchar(255) NOT NULL, 
  id_cliente   char(10) NOT NULL, 
  id_pelicula char(10) NOT NULL, 
  PRIMARY KEY (id_reservacion));
CREATE TABLE Tarjeta (
  Numero_tarjeta    char(16) NOT NULL, 
  Fecha_vencimiento date NOT NULL, 
  codigo_seguridad  char(3) NOT NULL, 
  saldo             float NOT NULL, 
  id_cliente char(10) NOT NULL, 
  PRIMARY KEY (Numero_tarjeta));
ALTER TABLE Tarjeta ADD CONSTRAINT FKTarjeta_cliente FOREIGN KEY (id_cliente) REFERENCES Cliente (id_cliente);
ALTER TABLE Reservacion ADD CONSTRAINT FKReservacion_cliente FOREIGN KEY (id_cliente) REFERENCES Cliente (id_cliente);
ALTER TABLE Reservacion ADD CONSTRAINT FKReservacion_pelicula FOREIGN KEY (id_pelicula) REFERENCES Pelicula (id_pelicula);
ALTER TABLE Horario ADD CONSTRAINT FKHorario_pelicula FOREIGN KEY (id_pelicula) REFERENCES Pelicula (id_pelicula);

