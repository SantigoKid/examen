CREATE DATABASE EMPRESA;

USE EMPRESA;



CREATE TABLE EMPLEADOS (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
  documento VARCHAR(255),
  biometrica VARCHAR(255),
  mac VARCHAR(255),
  estado ENUM('sin subir', 'incompleto', 'verificado') NOT NULL DEFAULT 'sin subir',
  tipo_usuario  VARCHAR(15) NOT NULL DEFAULT 'user'
);



