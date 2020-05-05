/*
SQLyog Community v12.1 (32 bit)
MySQL - 10.4.11-MariaDB-1:10.4.11+maria~bionic : Database - db_tinyshop
*********************************************************************
*/
/*!40101 SET NAMES utf8 */;
/*!40101 SET SQL_MODE=''*/;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tinyshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_tinyshop`;

/*Table structure for table `app_order_head` */
DROP TABLE IF EXISTS `app_order_head`;

CREATE TABLE `app_order_head` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`id_user_client` int(11) NOT NULL,
`id_user_seller` int(11) NOT NULL,
`total` decimal(10,3) DEFAULT 0.000,
`status` varchar(25) DEFAULT NULL,
`notes` varchar(2000) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='cabecera de pedidos';

/*Data for the table `app_order_head` */

/*Table structure for table `app_order_lines` */

DROP TABLE IF EXISTS `app_order_lines`;

CREATE TABLE `app_order_lines` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`description` text DEFAULT NULL,
`id_order_head` int(11) DEFAULT NULL,
`id_product` int(11) DEFAULT NULL,
`price` decimal(10,3) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='lineas de pedido';

/*Data for the table `app_order_lines` */
/*Table structure for table `app_product` */
DROP TABLE IF EXISTS `app_product`;

CREATE TABLE `app_product` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`type` varchar(15) DEFAULT NULLL,
`id_tosave` tinytext DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`order_by` int(11) DEFAULT NULL,
`id_user` int(11) DEFAULT NULL,
`price` decimal(10,3) DEFAULT 0.000,
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product` */

/*Table structure for table `app_product_images` */

DROP TABLE IF EXISTS `app_product_images`;

CREATE TABLE `app_product_images` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_type` int(11) DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`id_product` int(11) NOT NULL,
`path_file` varchar(2000) NOT NULL,
`slug` tinytext DEFAULT NULL,
`order_by` int(11) DEFAULT 100,
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product_images` */
/*Table structure for table `app_products_tags` */

DROP TABLE IF EXISTS `app_products_tags`;

CREATE TABLE `app_products_tags` (
`processflag` tinytext DEFAULT NULL,
`insert_platform` tinytext DEFAULT NULL,
`insert_user` tinytext DEFAULT NULL,
`insert_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` tinytext DEFAULT NULL,
`delete_user` tinytext DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` tinytext DEFAULT NULL,
`is_enabled` tinytext DEFAULT NULL,
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_product` int(11) DEFAULT NULL,
`id_tag` int(11) DEFAULT NULL,
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_products_tags` */
/*Table structure for table `app_tag` */

DROP TABLE IF EXISTS `app_tag`;

CREATE TABLE `app_tag` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`id_type` int(11) DEFAULT NULL,
`description` varchar(50) DEFAULT NULL,
`id_user` int(11) DEFAULT NULL,
`slug` varchar(100) DEFAULT NULL COMMENT 'la descripcion en slug',
`order_by` int(5) NOT NULL DEFAULT 100,
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_tag` */

/*Table structure for table `app_tag_array` */

DROP TABLE IF EXISTS `app_tag_array`;

CREATE TABLE `app_tag_array` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`type` varchar(15) DEFAULT NULL,
`id_tosave` varchar(25) DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`order_by` int(5) NOT NULL DEFAULT 100,
PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_tag_array` */

/*Table structure for table `base_user` */

DROP TABLE IF EXISTS `base_user`;

CREATE TABLE `base_user` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`email` varchar(100) NOT NULL,
`password` varchar(100) DEFAULT NULL,
`phone` varchar(20) DEFAULT NULL,
`fullname` varchar(100) DEFAULT NULL,
`address` varchar(250) DEFAULT NULL,
`age` tinyint(4) DEFAULT NULL,
`geo_location` varchar(500) DEFAULT NULL,
`id_gender` int(11) DEFAULT NULL,
`id_nationality` int(11) DEFAULT NULL,
`id_country` int(11) DEFAULT NULL COMMENT 'app_array.type=country',
`id_language` int(11) DEFAULT NULL COMMENT 'su idioma de preferencia',
`path_picture` varchar(100) DEFAULT NULL,
`id_profile` int(11) DEFAULT NULL COMMENT 'app_array.type=profile: user,maintenaince,system',
`tokenreset` varchar(250) DEFAULT NULL,
`log_attempts` int(5) DEFAULT 0,
`rating` int(11) DEFAULT NULL COMMENT 'la puntuacion',
`date_validated` varchar(14) DEFAULT NULL COMMENT 'cuando valido su cuenta por email',
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `base_user_email_uindex` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user` */
/*Table structure for table `base_user_array` */

DROP TABLE IF EXISTS `base_user_array`;

CREATE TABLE `base_user_array` (
`processflag` varchar(5) DEFAULT NULL,
`insert_platform` varchar(3) DEFAULT '1',
`insert_user` varchar(15) DEFAULT NULL,
`insert_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
`update_platform` varchar(3) DEFAULT NULL,
`update_user` varchar(15) DEFAULT NULL,
`update_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
`delete_platform` varchar(3) DEFAULT NULL,
`delete_user` varchar(15) DEFAULT NULL,
`delete_date` timestamp NULL DEFAULT NULL,
`cru_csvnote` varchar(500) DEFAULT NULL,
`is_erpsent` varchar(3) DEFAULT '0',
`is_enabled` varchar(3) DEFAULT '1',
`i` int(11) DEFAULT NULL,
`id` int(11) NOT NULL AUTO_INCREMENT,
`code_erp` varchar(25) DEFAULT NULL,
`type` varchar(15) DEFAULT NULL,
`id_tosave` varchar(25) DEFAULT NULL,
`description` varchar(250) DEFAULT NULL,
`order_by` int(5) NOT NULL DEFAULT 100,
`code_cache` varchar(500) DEFAULT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user_array` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
