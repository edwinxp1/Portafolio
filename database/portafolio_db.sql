CREATE DATABASE IF NOT EXISTS `portafolio_db`;

USE `portafolio_db`;
-- DDL
-- tabla notas
CREATE TABLE IF NOT EXISTS `notas` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `nombreyapellido` VARCHAR(255) NOT NULL,
    `usuario` VARCHAR(255) DEFAULT NULL,
    `email` VARCHAR(255) NOT NULL,
    `nota` VARCHAR(1000) NOT NULL,
    `fechanota` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;