DROP DATABASE conexion_unity;

CREATE DATABASE conexion_unity;

USE conexion_unity;

CREATE TABLE maquinas (
	`id_maquina` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`descripcion` varchar(40) NOT NULL,
	`activo_fijo` varchar(10) DEFAULT NULL,
	PRIMARY KEY (`id_maquina`)
);

CREATE TABLE `personal` (
	`id_personal` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`nombre` varchar(40) NOT NULL,
	`apellido_paterno` varchar(40) NOT NULL,
	`apellido_materno` varchar(40) DEFAULT NULL,
	PRIMARY KEY (`id_personal`)
);

CREATE TABLE `usuarios` (
	`id_usuario` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`id_personal` int(4) unsigned DEFAULT NULL,
	`password` varchar(10) NOT NULL,
	`permisos` int(1) DEFAULT 0,
	PRIMARY KEY (`id_usuario`)
);

CREATE TABLE `mantenimiento` (
	`id_mantenimiento` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`tipo` enum('Preventivo', 'Correctivo', 'Predictivo'),
	`observaciones` text DEFAULT NULL,
	`id_maquina` int(4) unsigned DEFAULT NULL,
	`id_personal` int(4) unsigned DEFAULT NULL,
	`fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`fecha_proximo` date DEFAULT NULL,
	PRIMARY KEY (`id_mantenimiento`)
);

CREATE TABLE `actividades` (
	`id_actividad` int(4) unsigned NOT NULL AUTO_INCREMENT,
	`nombre` varchar(30) NOT NULL,
	`descripcion` varchar(50) DEFAULT NULL,
	PRIMARY KEY (`id_actividad`)
);

CREATE TABLE `actividades_mantenimiento` (
	`id_act_man` int(8) unsigned NOT NULL AUTO_INCREMENT,
	`id_actividad` int(4) unsigned DEFAULT NULL,
	`id_mantenimiento` int(4) unsigned DEFAULT NULL,
	`realizado` bool DEFAULT FALSE,
	PRIMARY KEY (`id_act_man`)
);
