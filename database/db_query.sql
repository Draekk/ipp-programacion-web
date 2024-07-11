CREATE DATABASE db_miproyecto;

USE db_miproyecto;

CREATE TABLE categorias (
  identificador BIGINT PRIMARY KEY NOT NULL,
  nombre VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE productos (
  identificador BIGINT PRIMARY KEY NOT NULL,
  nombre VARCHAR(100) NOT NULL,
  imagen MEDIUMBLOB,
  descripcion TEXT NOT NULL,
  precio INTEGER NOT NULL,
  categoria BIGINT NOT NULL REFERENCES categorias(identificador)
);