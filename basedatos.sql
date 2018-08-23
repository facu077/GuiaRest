/*
SQLyog Ultimate v9.63 
MySQL - 5.6.20 : Database - guiarest
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`guiarest` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `guiarest`;

/*Table structure for table `administrador` */

DROP TABLE IF EXISTS `administrador`;

CREATE TABLE `administrador` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `usuario` char(20) DEFAULT NULL,
  `clave` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `administrador` */

insert  into `administrador`(`id`,`usuario`,`clave`) values (1,'admin','1234');

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `nombre` char(20) DEFAULT NULL,
  `foto` char(20) DEFAULT NULL,
  `precio` int(50) DEFAULT NULL,
  `estado` binary(1) DEFAULT NULL,
  `descripcion` longtext,
  `fecha_publicacion` date DEFAULT NULL,
  `id_negocio` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id`,`nombre`,`foto`,`precio`,`estado`,`descripcion`,`fecha_publicacion`,`id_negocio`) values (3,'Arroz','56a7dee2ce262',12,'1','Rico arroz fresco',NULL,1),(4,'Hamburguesa','56a7df39d3b1b',20,'1','Hamburguesa con queso y tomate','2015-01-25',2),(5,'Pancho','56a7e05b58baf',20,'1','Pancho con lluvia de papas','2016-01-26',2),(6,'Pizza','56a8fcedb4ab6',60,'0','Pizza muzzarella','2016-01-27',2),(7,'pizza','56d9e92f97753',15,'1','la pizaz','2016-03-04',3);

/*Table structure for table `negocios` */

DROP TABLE IF EXISTS `negocios`;

CREATE TABLE `negocios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nickname` char(20) NOT NULL,
  `password` char(20) DEFAULT NULL,
  `nombre_negocio` char(20) DEFAULT NULL,
  `nombre` char(20) DEFAULT NULL,
  `apellido` char(20) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `telefono` char(20) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL,
  `ubicacion` char(20) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`,`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `negocios` */

insert  into `negocios`(`id`,`nickname`,`password`,`nombre_negocio`,`nombre`,`apellido`,`email`,`telefono`,`direccion`,`ubicacion`,`estado`) values (1,'negtest','1234','elNegocio','tee','st','probando@hotmail.com','123456','ladireccion 123','h4',1),(2,'probando','1234','prueba2','pepe','loco','asda@mail.com','4444321','casa 1233','k7',1),(3,'minegocio','1234','queNegocio','Alfredo','pepe','lololo@hotmail.com','4321','lalal','b4',1);

/*Table structure for table `tagnegocio` */

DROP TABLE IF EXISTS `tagnegocio`;

CREATE TABLE `tagnegocio` (
  `id_negocio` int(20) NOT NULL,
  `id_tag` int(20) NOT NULL,
  PRIMARY KEY (`id_negocio`,`id_tag`),
  KEY `id_tag` (`id_tag`),
  CONSTRAINT `tagnegocio_ibfk_1` FOREIGN KEY (`id_tag`) REFERENCES `tags` (`id`),
  CONSTRAINT `tagnegocio_ibfk_2` FOREIGN KEY (`id_negocio`) REFERENCES `negocios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tagnegocio` */

insert  into `tagnegocio`(`id_negocio`,`id_tag`) values (2,1),(3,1),(2,2),(3,2),(2,3),(1,4),(3,12);

/*Table structure for table `tags` */

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `detalle` char(30) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

/*Data for the table `tags` */

insert  into `tags`(`id`,`detalle`,`estado`) values (1,'pizza',1),(2,'hamburguesa',1),(3,'pancho',1),(4,'pasta',1),(5,'lomo',1),(6,'ensalada',1),(7,'asado',1),(8,'sanguche',1),(9,'pollo',0),(10,'helado',1),(11,'taco',1),(12,'brownie',1),(13,'nachos',0);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nickname` char(20) NOT NULL,
  `password` char(20) DEFAULT NULL,
  `nombre` char(20) DEFAULT NULL,
  `apellido` char(20) DEFAULT NULL,
  `email` char(20) DEFAULT NULL,
  `telefono` char(20) DEFAULT NULL,
  `direccion` char(30) DEFAULT NULL,
  `ubicacion` char(20) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`,`nickname`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nickname`,`password`,`nombre`,`apellido`,`email`,`telefono`,`direccion`,`ubicacion`,`estado`) values (1,'test','1234','pedro','asg','mail','1234','re 123','j1',1),(2,'facu','1234','Facu','ads','lala@hotmail.copm','4567','jaja 123','h9',1);

/*Table structure for table `ventas` */

DROP TABLE IF EXISTS `ventas`;

CREATE TABLE `ventas` (
  `id_venta` int(20) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(20) DEFAULT NULL,
  `id_negocio` int(20) DEFAULT NULL,
  `id_comida` int(20) DEFAULT NULL,
  `cantidad` int(20) DEFAULT NULL,
  `precio` int(40) DEFAULT NULL,
  `ubicacion` char(40) DEFAULT NULL,
  `zona` char(20) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

/*Data for the table `ventas` */

insert  into `ventas`(`id_venta`,`id_usuario`,`id_negocio`,`id_comida`,`cantidad`,`precio`,`ubicacion`,`zona`,`fecha`,`hora`) values (3,1,1,3,4,12,'Retirado en el local','a1','2016-02-01','19:23:08'),(4,1,1,5,5,20,'Retirado en el local','a1','2016-02-01','03:23:08'),(5,1,1,5,5,20,'mi direccion 123','b2','2016-02-01','03:24:16'),(6,1,2,4,5,20,'mi direccion 123','a1','2016-02-02','19:09:10'),(7,1,1,3,4,12,'Retirado en el local','a1','2016-02-02','03:09:10'),(8,1,1,3,1,12,'mi direccion 123','a1','2016-02-02','03:45:08'),(9,1,1,3,1,12,'mi direccion 123','a1','2016-02-02','23:45:08'),(10,1,1,3,1,12,'mi direccion 123','a1','2016-02-02','22:45:09'),(11,1,1,3,2,12,'mi direccion 123','a1','2016-02-02','17:45:09'),(12,1,2,5,2,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(13,1,2,4,1,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(14,1,2,4,3,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(15,1,2,5,2,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(16,1,2,4,1,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(17,1,2,4,2,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(18,1,2,4,4,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(19,1,2,4,2,20,'mi direccion 123','a1','2016-02-02','21:45:09'),(20,1,1,3,1,12,'Retirado en el local','a1','2016-02-02','15:47:42'),(21,1,1,3,2,12,'Retirado en el local','a1','2016-02-02','13:47:42'),(22,1,1,3,3,12,'Retirado en el local','a1','2016-02-02','12:47:42'),(23,1,1,3,5,12,'Retirado en el local','a1','2016-02-02','01:47:42'),(24,1,1,3,1,12,'Retirado en el local','a1','2016-02-02','16:47:42'),(25,1,1,3,2,12,'mi direccion 123','a1','2016-02-04','17:41:32'),(26,2,3,4,40,20,'Retirado en el local','h9','2016-02-04','17:41:32'),(27,2,2,5,8,20,'jaja 123','h9','2016-02-06','17:07:09'),(28,2,2,4,5,20,'jaja 123','h9','2016-02-06','17:09:01'),(29,2,2,4,3,20,'jaja 123','h9','2016-02-06','17:09:42'),(30,1,2,4,3,20,'Retirado en el local','m1','2016-02-12','10:36:55'),(31,1,2,5,5,20,'Retirado en el local','m1','2016-02-12','10:36:55'),(32,1,2,5,5,20,'Retirado en el local','m1','2016-03-04','17:00:19'),(33,1,2,4,3,20,'Retirado en el local','m1','2016-03-04','17:00:19'),(34,1,3,7,5,15,'Retirado en el local','m1','2016-03-04','17:00:19'),(35,1,2,4,5,20,'Retirado en el local','j1','2016-03-30','19:10:50');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
