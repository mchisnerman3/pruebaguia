/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`prueba` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `productos`;

/*Table structure for table `guia` */

DROP TABLE IF EXISTS `guia`;

CREATE TABLE `guia` (
  `numero_guia` varchar(5) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `id_productos` int(11) DEFAULT NULL,
  KEY `id_productos` (`id_productos`),
  CONSTRAINT `guia_ibfk_1` FOREIGN KEY (`id_productos`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `guia` */

insert  into `guia`(`numero_guia`,`descripcion`,`id_productos`) values 
('P0001','Puerta Placa para adelante',1),
('P0001','Puerta Placa para el comedor',1),
('P0002','Ventana para el baño',3);

/*Table structure for table `productos` */

DROP TABLE IF EXISTS `productos`;

CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `total_producto` double(7,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `productos` */

insert  into `productos`(`id`,`nombre_producto`,`total_producto`) values 
(1,'Puerta Placa',100.00),
(2,'Puerta Blindada',150.00),
(3,'Ventana',80.00);

/*Table structure for table `usuarios` */

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `documento` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`nombre`,`apellido`,`documento`) values 
(2,'Pedro','Rojas','33441122'),
(3,'Hernan','Padilla','28345322'),
(6,'Juan','Alberto','123123123');

/*Table structure for table `guiacompleta` */

DROP TABLE IF EXISTS `guiacompleta`;

/*!50001 DROP VIEW IF EXISTS `guiacompleta` */;
/*!50001 DROP TABLE IF EXISTS `guiacompleta` */;

/*!50001 CREATE TABLE  `guiacompleta`(
 `numero_guia` varchar(5) ,
 `descripcion` varchar(100) ,
 `nombre_producto` varchar(100) ,
 `total_producto` double(7,2) 
)*/;

/*View structure for view guiacompleta */

/*!50001 DROP TABLE IF EXISTS `guiacompleta` */;
/*!50001 DROP VIEW IF EXISTS `guiacompleta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root2`@`%` SQL SECURITY DEFINER VIEW `guiacompleta` AS (select `guia`.`numero_guia` AS `numero_guia`,`guia`.`descripcion` AS `descripcion`,`productos`.`nombre_producto` AS `nombre_producto`,`productos`.`total_producto` AS `total_producto` from (`guia` join `productos` on((`guia`.`id_productos` = `productos`.`id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
