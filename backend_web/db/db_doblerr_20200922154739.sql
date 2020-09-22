/*
SQLyog Community v12.1 (32 bit)
MySQL - 10.4.11-MariaDB-1:10.4.11+maria~bionic : Database - db_doblerr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_doblerr` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_doblerr`;

/*Table structure for table `app_array` */

DROP TABLE IF EXISTS `app_array`;

CREATE TABLE `app_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_user` int(11) DEFAULT NULL COMMENT 'propietario del tipo o categoria',
  `order_by` int(5) NOT NULL DEFAULT 100,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_array` */

/*Table structure for table `app_ip_untracked` */

DROP TABLE IF EXISTS `app_ip_untracked`;

CREATE TABLE `app_ip_untracked` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insert_date` timestamp NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remote_ip` varchar(100) NOT NULL,
  `country` varchar(50) DEFAULT NULL,
  `whois` varchar(200) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL,
  `is_enabled` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `remote_ip` (`remote_ip`),
  KEY `is_enabled` (`is_enabled`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

/*Data for the table `app_ip_untracked` */

insert  into `app_ip_untracked`(`id`,`insert_date`,`update_date`,`remote_ip`,`country`,`whois`,`comment`,`is_enabled`) values (1,'2020-09-21 20:15:29','2020-09-21 20:15:29','139.47.67.161',NULL,NULL,NULL,1);

/*Table structure for table `app_order_head` */

DROP TABLE IF EXISTS `app_order_head`;

CREATE TABLE `app_order_head` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_user` int(11) NOT NULL COMMENT 'el comprador',
  `address` varchar(250) DEFAULT NULL,
  `total` decimal(10,3) DEFAULT 0.000,
  `total1` decimal(10,3) DEFAULT 0.000 COMMENT 'en otra divisa',
  `total2` decimal(10,3) DEFAULT 0.000 COMMENT 'en otra divisa',
  `date_purchase` datetime DEFAULT NULL,
  `date_delivery` datetime DEFAULT NULL,
  `notes` varchar(500) DEFAULT NULL,
  `notes_admin` varchar(500) DEFAULT NULL,
  `status` varchar(25) DEFAULT NULL,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='cabecera de pedidos';

/*Data for the table `app_order_head` */

/*Table structure for table `app_order_lines` */

DROP TABLE IF EXISTS `app_order_lines`;

CREATE TABLE `app_order_lines` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_order_head` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `linenum` int(5) DEFAULT NULL,
  `product` varchar(250) DEFAULT NULL,
  `units` int(5) DEFAULT NULL,
  `tax_percent` decimal(10,3) DEFAULT 0.000,
  `price_taxed` decimal(10,3) DEFAULT 0.000,
  `price` decimal(10,3) DEFAULT 0.000,
  `price1` decimal(10,3) DEFAULT 0.000,
  `price2` decimal(10,3) DEFAULT 0.000,
  `total` decimal(10,3) DEFAULT 0.000,
  `total1` decimal(10,3) DEFAULT 0.000,
  `total2` decimal(10,3) DEFAULT 0.000,
  `id_user` int(11) DEFAULT NULL COMMENT 'el vendedor',
  `notes_admin` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COMMENT='lineas de pedido';

/*Data for the table `app_order_lines` */

/*Table structure for table `app_product` */

DROP TABLE IF EXISTS `app_product`;

CREATE TABLE `app_product` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `description_full` varchar(3000) DEFAULT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `units_min` int(5) NOT NULL DEFAULT 1,
  `units_max` int(5) NOT NULL DEFAULT 99999,
  `price_gross` decimal(10,3) DEFAULT 0.000,
  `tax_percent` decimal(10,3) DEFAULT 0.000,
  `price_taxed` decimal(10,3) DEFAULT 0.000,
  `price_prev` decimal(10,3) DEFAULT 0.000 COMMENT 'precio anterior',
  `price_sale` decimal(10,3) NOT NULL DEFAULT 0.000,
  `price_sale1` decimal(10,3) DEFAULT 0.000 COMMENT 'precio en otra moneda',
  `price_sale2` decimal(10,3) DEFAULT 0.000 COMMENT 'percio en otra moneda',
  `id_user` int(11) NOT NULL COMMENT 'empresa o usuario propietario',
  `order_by` int(11) DEFAULT 100,
  `code_cache` varchar(50) DEFAULT NULL,
  `display` tinyint(4) DEFAULT NULL,
  `stock_units` decimal(10,0) DEFAULT 0,
  `id_unit` int(11) DEFAULT 1 COMMENT 'kg, cajas, unidades, etc',
  `url_image` varchar(250) DEFAULT NULL COMMENT 'la url por defecto si solo tiene una',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=341 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product` */

/*Table structure for table `app_product_images` */

DROP TABLE IF EXISTS `app_product_images`;

CREATE TABLE `app_product_images` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_type` int(11) DEFAULT NULL,
  `code_erp` varchar(25) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `id_product` int(11) NOT NULL,
  `path_file` varchar(2000) NOT NULL,
  `slug` varchar(75) DEFAULT NULL,
  `display` tinyint(4) DEFAULT 1,
  `order_by` int(11) DEFAULT 100,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_product_images` */

/*Table structure for table `app_products_tags` */

DROP TABLE IF EXISTS `app_products_tags`;

CREATE TABLE `app_products_tags` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_platform` varchar(3) DEFAULT NULL,
  `delete_user` varchar(15) DEFAULT NULL,
  `delete_date` timestamp NULL DEFAULT NULL,
  `cru_csvnote` varchar(500) DEFAULT NULL,
  `is_erpsent` varchar(3) DEFAULT '0',
  `is_enabled` varchar(3) DEFAULT '1',
  `i` int(11) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_tag` int(11) DEFAULT NULL,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_products_tags` */

/*Table structure for table `app_promotion` */

DROP TABLE IF EXISTS `app_promotion`;

CREATE TABLE `app_promotion` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `slug` varchar(250) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL COMMENT 'a quien pertenece la promo',
  `id_type` int(11) DEFAULT NULL,
  `date_from` datetime DEFAULT NULL,
  `date_to` datetime DEFAULT NULL,
  `url_nw` varchar(250) DEFAULT NULL COMMENT 'url en fb',
  `url_design` varchar(250) DEFAULT NULL COMMENT 'diseño por defecto',
  `is_active` tinyint(4) DEFAULT 0,
  `invested` decimal(10,3) DEFAULT 0.000,
  `returned` decimal(10,3) DEFAULT 0.000,
  `notes` varchar(300) DEFAULT NULL,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion` */

insert  into `app_promotion`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`description`,`slug`,`content`,`id_user`,`id_type`,`date_from`,`date_to`,`url_nw`,`url_design`,`is_active`,`invested`,`returned`,`notes`,`code_cache`) values (NULL,'1',NULL,'2020-06-30 11:44:43',NULL,NULL,'2020-07-02 13:59:27',NULL,NULL,NULL,NULL,'0','1',NULL,1,'1','Tratamiento Botox capilar GRATIS!','1-tratamiento-botox-capilar-gratis','Con cualquier trabajo técnico o moldeado',1,1,'2020-06-01 11:44:24','2020-09-01 11:44:28',NULL,NULL,1,'0.000','0.000',NULL,NULL);

/*Table structure for table `app_promotion_array` */

DROP TABLE IF EXISTS `app_promotion_array`;

CREATE TABLE `app_promotion_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_user` int(11) DEFAULT NULL COMMENT 'propietario del tipo o categoria',
  `order_by` int(5) NOT NULL DEFAULT 100,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion_array` */

insert  into `app_promotion_array`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`type`,`id_tosave`,`description`,`id_user`,`order_by`,`code_cache`) values (NULL,'1',NULL,'2020-07-01 09:35:58',NULL,NULL,'2020-07-01 09:35:58',NULL,NULL,NULL,NULL,'0','1',NULL,1,NULL,'generic',NULL,'Generic',1,100,NULL);

/*Table structure for table `app_promotion_urls` */

DROP TABLE IF EXISTS `app_promotion_urls`;

CREATE TABLE `app_promotion_urls` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_promotion` int(11) NOT NULL,
  `id_type` int(11) NOT NULL DEFAULT 1 COMMENT 'promotion_array: fb|web|youtube,...',
  `design` varchar(250) DEFAULT NULL COMMENT 'url de la creatividad',
  `notes` varchar(300) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT 1,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion_urls` */

/*Table structure for table `app_promotion_user` */

DROP TABLE IF EXISTS `app_promotion_user`;

CREATE TABLE `app_promotion_user` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `phone1` varchar(20) NOT NULL COMMENT 'telefono',
  `email` varchar(100) NOT NULL,
  `birthdate` datetime DEFAULT NULL COMMENT 'cuando se ejecuta la promo',
  `name1` varchar(15) NOT NULL,
  `name2` varchar(15) DEFAULT NULL,
  `id_gender` varchar(5) DEFAULT NULL COMMENT 'promotion_array',
  `m1` int(5) DEFAULT NULL,
  `m2` int(5) DEFAULT NULL,
  `m3` int(5) DEFAULT NULL,
  `m4` int(5) DEFAULT NULL,
  `m5` int(5) DEFAULT NULL,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotion_user` */

insert  into `app_promotion_user`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`description`,`phone1`,`email`,`birthdate`,`name1`,`name2`,`id_gender`,`m1`,`m2`,`m3`,`m4`,`m5`,`code_cache`) values (NULL,'1',NULL,'2020-07-02 14:02:00',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'0','1',NULL,1,NULL,NULL,'456789789','eacevedof@hotmail.com',NULL,'Eduardo A h',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `app_promotions_subscriptions` */

DROP TABLE IF EXISTS `app_promotions_subscriptions`;

CREATE TABLE `app_promotions_subscriptions` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_promotion` int(11) NOT NULL,
  `id_promouser` int(11) NOT NULL,
  `date_subs` datetime DEFAULT NULL,
  `url_ref` varchar(250) DEFAULT NULL,
  `code1` varchar(15) DEFAULT NULL,
  `date_confirm` timestamp NULL DEFAULT NULL,
  `is_confirmed` tinyint(4) DEFAULT 0,
  `date_exec` datetime DEFAULT NULL,
  `notes` varchar(300) DEFAULT NULL,
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_promotions_subscriptions` */

insert  into `app_promotions_subscriptions`(`processflag`,`insert_platform`,`insert_user`,`insert_date`,`update_platform`,`update_user`,`update_date`,`delete_platform`,`delete_user`,`delete_date`,`cru_csvnote`,`is_erpsent`,`is_enabled`,`i`,`id`,`code_erp`,`description`,`id_promotion`,`id_promouser`,`date_subs`,`url_ref`,`code1`,`date_confirm`,`is_confirmed`,`date_exec`,`notes`,`code_cache`) values (NULL,'1',NULL,'2020-07-02 14:02:00',NULL,NULL,'2020-07-02 14:02:52',NULL,NULL,NULL,NULL,'0','1',NULL,1,NULL,NULL,1,1,'2020-07-02 14:02:52','http://localhost:200/promociones','1fiti',NULL,1,NULL,NULL,NULL);

/*Table structure for table `app_tag` */

DROP TABLE IF EXISTS `app_tag`;

CREATE TABLE `app_tag` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `app_tag` */

/*Table structure for table `app_tag_array` */

DROP TABLE IF EXISTS `app_tag_array`;

CREATE TABLE `app_tag_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `id_profile` int(11) DEFAULT NULL COMMENT 'app_array.type=profile: user,maintenaince,system,enterprise, individual, client',
  `tokenreset` varchar(250) DEFAULT NULL,
  `log_attempts` int(5) DEFAULT 0,
  `rating` int(11) DEFAULT NULL COMMENT 'la puntuacion',
  `date_validated` varchar(14) DEFAULT NULL COMMENT 'cuando valido su cuenta por email',
  `is_notificable` tinyint(4) DEFAULT 0 COMMENT 'para enviar notificaciones push',
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `base_user_email_uindex` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user` */

/*Table structure for table `base_user_array` */

DROP TABLE IF EXISTS `base_user_array`;

CREATE TABLE `base_user_array` (
  `processflag` varchar(5) DEFAULT NULL,
  `insert_platform` varchar(3) DEFAULT '1',
  `insert_user` varchar(15) DEFAULT NULL,
  `insert_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_platform` varchar(3) DEFAULT NULL,
  `update_user` varchar(15) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `code_cache` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

/*Data for the table `base_user_array` */

/*Table structure for table `imp_product` */

DROP TABLE IF EXISTS `imp_product`;

CREATE TABLE `imp_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `insert_date` timestamp NULL DEFAULT current_timestamp(),
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `code` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `description_full` varchar(500) DEFAULT NULL,
  `price` varchar(10) DEFAULT NULL,
  `price2` varchar(10) DEFAULT NULL,
  `display` varchar(10) DEFAULT NULL,
  `url_image` varchar(250) DEFAULT NULL,
  `error` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=343 DEFAULT CHARSET=utf8mb4;

/*Data for the table `imp_product` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
