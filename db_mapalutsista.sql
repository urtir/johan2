/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - db_mapalutsista
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_mapalutsista` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

USE `db_mapalutsista`;

/*Table structure for table `alutsista_inventory` */

DROP TABLE IF EXISTS `alutsista_inventory`;

CREATE TABLE `alutsista_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kostrad_unit_id` int(11) NOT NULL,
  `material_type_id` int(11) NOT NULL,
  `jumlah_total` int(11) DEFAULT 0,
  `kondisi_b` int(11) DEFAULT 0,
  `kondisi_rr` int(11) DEFAULT 0,
  `kondisi_rb` int(11) DEFAULT 0,
  `persentase_kesiapan` decimal(5,2) DEFAULT 0.00,
  `keterangan` text DEFAULT NULL,
  `last_updated` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `kostrad_unit_id` (`kostrad_unit_id`),
  KEY `material_type_id` (`material_type_id`),
  CONSTRAINT `alutsista_inventory_ibfk_1` FOREIGN KEY (`kostrad_unit_id`) REFERENCES `kostrad_units` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alutsista_inventory_ibfk_2` FOREIGN KEY (`material_type_id`) REFERENCES `material_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `alutsista_inventory` */

insert  into `alutsista_inventory`(`id`,`kostrad_unit_id`,`material_type_id`,`jumlah_total`,`kondisi_b`,`kondisi_rr`,`kondisi_rb`,`persentase_kesiapan`,`keterangan`,`last_updated`,`created_at`) values 
(1,1,1,210690,158598,24839,27253,75.30,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(2,1,2,204007,153814,24143,26050,75.40,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(3,1,3,6683,4784,696,1203,71.56,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(4,1,4,141,116,17,8,82.27,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(5,1,5,473,308,59,106,65.11,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(6,1,6,222,169,16,37,76.13,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(7,1,7,251,139,43,69,55.38,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(8,1,12,338,237,18,83,70.11,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(9,1,13,362,268,19,75,74.03,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(10,1,14,101748614,101748614,0,0,100.00,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(11,1,15,511947,511947,0,0,100.00,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(12,1,16,6382543,6382543,0,0,100.00,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(13,1,17,28131,28131,0,0,100.00,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(14,2,1,184523,135482,22345,26696,73.45,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(15,2,2,178945,132156,21789,25000,73.83,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(16,2,3,5578,3326,556,1696,59.61,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(17,2,4,118,97,12,9,82.20,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(18,2,5,394,256,48,90,65.23,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(19,2,6,185,141,13,31,76.22,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(20,2,7,209,115,36,58,55.02,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(21,2,12,282,198,15,69,70.21,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(22,2,13,302,223,16,63,73.84,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(23,3,1,198456,146789,23567,28100,73.98,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(24,3,2,192834,143678,22845,26311,74.56,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(25,3,3,5622,3111,722,1789,55.33,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(26,3,4,102,84,10,8,82.35,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(27,3,5,421,274,52,95,65.08,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(28,3,6,198,151,14,33,76.26,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(29,3,7,223,123,38,62,55.16,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(30,3,12,315,221,17,77,70.16,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(31,3,13,341,251,18,72,73.61,NULL,'2025-06-16 01:56:33','2025-06-16 01:56:33'),
(32,1,14,2500000,2250000,150000,100000,90.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(33,1,15,45000,39000,4000,2000,86.67,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(34,1,16,75000,68000,5000,2000,90.67,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(35,1,17,2500,2100,250,150,84.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(36,2,14,2200000,1980000,130000,90000,90.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(37,2,15,40000,34000,3500,2500,85.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(38,2,16,65000,57000,5000,3000,87.69,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(39,2,17,2200,1850,200,150,84.09,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(40,3,14,1900000,1710000,110000,80000,90.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(41,3,15,35000,30000,3000,2000,85.71,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(42,3,16,55000,49000,4000,2000,89.09,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(43,3,17,1900,1600,200,100,84.21,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(44,1,18,850,680,120,50,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(45,1,19,320,250,50,20,78.13,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(46,1,20,1200,950,180,70,79.17,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(47,2,18,750,600,100,50,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(48,2,19,280,215,45,20,76.79,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(49,2,20,1050,840,150,60,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(50,3,18,650,520,90,40,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(51,3,19,250,195,35,20,78.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(52,3,20,900,720,130,50,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(53,1,21,2500,2100,300,100,84.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(54,1,22,1800,1500,200,100,83.33,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(55,1,23,1500,1200,200,100,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(56,1,24,250,200,35,15,80.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(57,1,25,350,300,35,15,85.71,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(58,1,26,450,380,50,20,84.44,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(59,2,21,2200,1800,250,150,81.82,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(60,2,22,1600,1350,150,100,84.38,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(61,2,23,1300,1050,150,100,80.77,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(62,2,24,220,180,30,10,81.82,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(63,2,25,320,270,35,15,84.38,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(64,2,26,400,340,40,20,85.00,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(65,3,21,1900,1550,250,100,81.58,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(66,3,22,1400,1150,150,100,82.14,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(67,3,23,1100,900,120,80,81.82,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(68,3,24,190,155,25,10,81.58,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(69,3,25,280,230,35,15,82.14,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(70,3,26,350,290,40,20,82.86,NULL,'2025-06-16 13:26:29','2025-06-16 13:26:29'),
(71,1,27,8,6,1,1,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(72,1,28,6,5,1,0,83.33,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(73,1,29,4,3,1,0,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(74,1,30,10,8,1,1,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(75,1,31,5,4,1,0,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(76,2,27,6,5,1,0,83.33,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(77,2,28,5,4,1,0,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(78,2,29,3,2,1,0,66.67,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(79,2,30,8,6,1,1,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(80,2,31,4,3,1,0,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(81,3,27,5,4,1,0,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(82,3,28,4,3,1,0,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(83,3,29,3,3,0,0,100.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(84,3,30,7,5,1,1,71.43,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(85,3,31,3,2,1,0,66.67,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(86,1,32,12,10,1,1,83.33,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(87,1,33,25,20,3,2,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(88,1,34,45,38,5,2,84.44,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(89,1,35,70,58,8,4,82.86,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(90,2,32,10,8,1,1,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(91,2,33,20,16,3,1,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(92,2,34,40,32,6,2,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(93,2,35,60,48,8,4,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(94,3,32,8,6,1,1,75.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(95,3,33,18,14,3,1,77.78,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(96,3,34,35,28,5,2,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(97,3,35,50,40,7,3,80.00,NULL,'2025-06-16 13:26:51','2025-06-16 13:26:51'),
(98,1,6,580,490,60,30,84.48,NULL,'2025-06-16 13:27:08','2025-06-16 13:27:08'),
(99,2,6,520,430,60,30,82.69,NULL,'2025-06-16 13:27:08','2025-06-16 13:27:08'),
(100,3,6,450,370,50,30,82.22,NULL,'2025-06-16 13:27:08','2025-06-16 13:27:08'),
(101,1,6,246,244,2,0,99.00,NULL,'2025-06-16 13:32:57','2025-06-16 13:32:57');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `province_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `province_id` (`province_id`),
  CONSTRAINT `cities_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`province_id`,`name`,`created_at`) values 
(1,1,'Banda Aceh','2025-06-13 21:07:35'),
(2,2,'Medan','2025-06-13 21:07:35'),
(3,3,'Padang','2025-06-13 21:07:35'),
(4,4,'Pekanbaru','2025-06-13 21:07:35'),
(5,5,'Jambi','2025-06-13 21:07:35'),
(6,6,'Jakarta Utara','2025-06-13 21:07:35'),
(7,6,'Jakarta Selatan','2025-06-13 21:07:35'),
(8,6,'Jakarta Timur','2025-06-13 21:07:35'),
(9,7,'Bandung','2025-06-13 21:07:35'),
(10,7,'Bogor','2025-06-13 21:07:35'),
(11,7,'Cirebon','2025-06-13 21:07:35'),
(12,7,'Tasikmalaya','2025-06-13 21:07:35'),
(13,8,'Semarang','2025-06-13 21:07:35'),
(14,8,'Surakarta','2025-06-13 21:07:35'),
(15,9,'Yogyakarta','2025-06-13 21:07:35'),
(16,10,'Surabaya','2025-06-13 21:07:35'),
(17,10,'Malang','2025-06-13 21:07:35'),
(18,10,'Madiun','2025-06-13 21:07:35'),
(19,10,'Kediri','2025-06-13 21:07:35'),
(20,10,'Jember','2025-06-13 21:07:35'),
(21,11,'Tangerang','2025-06-13 21:07:35'),
(22,11,'Tangerang Selatan','2025-06-13 21:07:35'),
(23,11,'Serang','2025-06-13 21:07:35'),
(24,12,'Manado','2025-06-13 21:07:35'),
(25,13,'Palu','2025-06-13 21:07:35'),
(26,14,'Makassar','2025-06-13 21:07:35'),
(27,14,'Watampone','2025-06-13 21:07:35'),
(28,15,'Kendari','2025-06-13 21:07:35'),
(29,16,'Gorontalo','2025-06-13 21:07:35'),
(30,17,'Ambon','2025-06-13 21:07:35'),
(31,18,'Sorong','2025-06-13 21:07:35'),
(32,19,'Jayapura','2025-06-13 21:07:35'),
(33,19,'Merauke','2025-06-13 21:07:35'),
(34,19,'Biak','2025-06-13 21:07:35'),
(35,19,'Timika','2025-06-13 21:07:35'),
(36,20,'Pontianak','2025-06-13 21:07:35'),
(37,21,'Tarakan','2025-06-13 21:07:35'),
(38,22,'Kupang','2025-06-13 21:07:35'),
(39,23,'Tanjungpinang','2025-06-13 21:07:35'),
(40,23,'Bintan','2025-06-13 21:07:35');

/*Table structure for table `kostrad_units` */

DROP TABLE IF EXISTS `kostrad_units`;

CREATE TABLE `kostrad_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(20) NOT NULL,
  `unit_name` varchar(100) NOT NULL,
  `unit_type` varchar(50) NOT NULL,
  `commander` varchar(100) DEFAULT NULL,
  `headquarters` varchar(200) DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_code` (`unit_code`),
  KEY `province_id` (`province_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `kostrad_units_ibfk_1` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `kostrad_units_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `kostrad_units` */

insert  into `kostrad_units`(`id`,`unit_code`,`unit_name`,`unit_type`,`commander`,`headquarters`,`province_id`,`city_id`,`latitude`,`longitude`,`status`,`created_at`,`updated_at`) values 
(1,'KOSTRAD-DIV1','Kostrad Divisi 1','Divisi Infanteri','Mayjen TNI (nama)','Cilodong, Depok',7,10,-6.40250000,106.80660000,'active','2025-06-16 01:55:11','2025-06-16 01:55:11'),
(2,'KOSTRAD-DIV2','Kostrad Divisi 2','Divisi Infanteri','Mayjen TNI (nama)','Malang',10,17,-7.96660000,112.63260000,'active','2025-06-16 01:55:11','2025-06-16 01:55:11'),
(3,'KOSTRAD-DIV3','Kostrad Divisi 3','Divisi Infanteri','Mayjen TNI (nama)','Salatiga',8,13,-7.33170000,110.47830000,'active','2025-06-16 01:55:11','2025-06-16 01:55:11');

/*Table structure for table `material_categories` */

DROP TABLE IF EXISTS `material_categories`;

CREATE TABLE `material_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_code` varchar(20) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `material_categories` */

insert  into `material_categories`(`id`,`category_code`,`category_name`,`description`,`sort_order`,`created_at`) values 
(1,'SENJATA','Senjata','Senjata TNI AD',1,'2025-06-16 01:55:33'),
(2,'RANPUR','Ranpur','Kendaraan Tempur Lapis Baja',2,'2025-06-16 01:55:33'),
(3,'MUNISI','Munisi','Munisi dan Amunisi',3,'2025-06-16 01:55:33'),
(4,'RANMOR','Ranmor','Kendaraan Bermotor',4,'2025-06-16 01:55:33'),
(5,'ALOPTIK','Aloptik','Alat Optik',5,'2025-06-16 01:55:33'),
(6,'ALPALSUS','Alpalsus','Alat Palsu Sus',6,'2025-06-16 01:55:33'),
(7,'PESAWAT','Pesawat Terbang','Pesawat Terbang TNI AD',7,'2025-06-16 01:55:33'),
(8,'ALANGAIR','Alang Air','Alat Angkutan Air',8,'2025-06-16 01:55:33');

/*Table structure for table `material_types` */

DROP TABLE IF EXISTS `material_types`;

CREATE TABLE `material_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `type_code` varchar(20) NOT NULL,
  `type_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_measurement` varchar(20) DEFAULT 'unit',
  `sort_order` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `material_types_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `material_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `material_types` */

insert  into `material_types`(`id`,`category_id`,`type_code`,`type_name`,`description`,`unit_measurement`,`sort_order`,`created_at`) values 
(1,1,'SENJATA_INFANTRI_PER','Senjata Infantri Perorangan','Senjata Infantri Perorangan','pucuk',1,'2025-06-16 01:56:09'),
(2,1,'SENJATA_RINGAN','Ringan (Perorangan)','Senjata Ringan Perorangan','pucuk',2,'2025-06-16 01:56:09'),
(3,1,'SENJATA_BERAT','Berat (Kelompok)','Senjata Berat Kelompok','pucuk',3,'2025-06-16 01:56:09'),
(4,1,'SENJATA_KAVALERI','Senjata Kavaleri Arkubah/Canon','Senjata Kavaleri','pucuk',4,'2025-06-16 01:56:09'),
(5,1,'SENJATA_ARTILERI','Senjata Artileri','Senjata Artileri','pucuk',5,'2025-06-16 01:56:09'),
(6,1,'ARTILERI_MEDAN','Artileri Medan','Artileri Medan','pucuk',6,'2025-06-16 01:56:09'),
(7,1,'ARTILERI_UDARA','Artileri Pertahanan Udara','Artileri Pertahanan Udara','pucuk',7,'2025-06-16 01:56:09'),
(8,1,'SHOT_GUN','Shot Gun','Shot Gun','pucuk',8,'2025-06-16 01:56:09'),
(9,1,'SENJATA_KHUSUS','Senjata Khusus','Senjata Khusus','pucuk',9,'2025-06-16 01:56:09'),
(10,1,'SENJATA_PESAWAT','Senjata Pesawat Terbang','Senjata Pesawat Terbang','pucuk',10,'2025-06-16 01:56:09'),
(11,1,'SENJATA_ALINS','Senjata Alins','Senjata Alins','pucuk',11,'2025-06-16 01:56:09'),
(12,2,'PANSER','Panser','Panser','unit',1,'2025-06-16 01:56:09'),
(13,2,'TANK','Tank','Tank','unit',2,'2025-06-16 01:56:09'),
(14,3,'MUNISI_KECIL','Munisi Kaliber Kecil','Munisi Kaliber Kecil','butir',1,'2025-06-16 01:56:09'),
(15,3,'MUNISI_BESAR','Munisi Kaliber Besar','Munisi Kaliber Besar','butir',2,'2025-06-16 01:56:09'),
(16,3,'MUNISI_KHUSUS','Munisi Khusus','Munisi Khusus','butir',3,'2025-06-16 01:56:09'),
(17,3,'ALKAP_MUNISI','Alkap Munisi','Alkap Munisi','unit',4,'2025-06-16 01:56:09'),
(18,4,'KENDARAAN_TAKTIS','Kendaraan Taktis','Kendaraan Taktis','unit',1,'2025-06-16 01:56:09'),
(19,4,'KENDARAAN_KHUSUS','Kendaraan Khusus','Kendaraan Khusus','unit',2,'2025-06-16 01:56:09'),
(20,4,'KENDARAAN_ADMINISTRA','Kendaraan Administrasi','Kendaraan Administrasi','unit',3,'2025-06-16 01:56:09'),
(21,5,'KOMPAS','Kompas','Kompas','unit',1,'2025-06-16 01:56:09'),
(22,5,'TEROPONG_7X50','Teropong 7x50','Teropong 7x50','unit',2,'2025-06-16 01:56:09'),
(23,5,'TEROPONG_6X30','Teropong 6x30','Teropong 6x30','unit',3,'2025-06-16 01:56:09'),
(24,5,'TBSS','TBSS','TBSS','unit',4,'2025-06-16 01:56:09'),
(25,5,'TBSM','TBSM','TBSM','unit',5,'2025-06-16 01:56:09'),
(26,5,'NVG','NVG (Night Vision Goggles)','Night Vision Goggles','unit',6,'2025-06-16 01:56:09'),
(27,7,'HELI_SERBU','Heli Serbu','Helikopter Serbu','unit',1,'2025-06-16 01:56:09'),
(28,7,'HELI_SERANG','Heli Serang','Helikopter Serang','unit',2,'2025-06-16 01:56:09'),
(29,7,'HELI_LATIH','Heli Latih','Helikopter Latih','unit',3,'2025-06-16 01:56:09'),
(30,7,'HELI_SENA','Heli Sena','Helikopter Sena','unit',4,'2025-06-16 01:56:09'),
(31,7,'SAYAP_TETAP','Sayap Tetap Sena','Sayap Tetap Sena','unit',5,'2025-06-16 01:56:09'),
(32,8,'KAPAL','Kapal','Kapal','unit',1,'2025-06-16 01:56:09'),
(33,8,'KAPAL_MOTOR_CEPAT','Kapal Motor Cepat','Kapal Motor Cepat','unit',2,'2025-06-16 01:56:09'),
(34,8,'LANDING_CRAFT','Landing Craft Rubber','Landing Craft Rubber','unit',3,'2025-06-16 01:56:09'),
(35,8,'MOTOR_AIR','Motor Air','Motor Air','unit',4,'2025-06-16 01:56:09');

/*Table structure for table `provinces` */

DROP TABLE IF EXISTS `provinces`;

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `provinces` */

insert  into `provinces`(`id`,`name`,`created_at`) values 
(1,'Aceh','2025-06-13 21:07:29'),
(2,'Sumatera Utara','2025-06-13 21:07:29'),
(3,'Sumatera Barat','2025-06-13 21:07:29'),
(4,'Riau','2025-06-13 21:07:29'),
(5,'Jambi','2025-06-13 21:07:29'),
(6,'DKI Jakarta','2025-06-13 21:07:29'),
(7,'Jawa Barat','2025-06-13 21:07:29'),
(8,'Jawa Tengah','2025-06-13 21:07:29'),
(9,'D.I. Yogyakarta','2025-06-13 21:07:29'),
(10,'Jawa Timur','2025-06-13 21:07:29'),
(11,'Banten','2025-06-13 21:07:29'),
(12,'Sulawesi Utara','2025-06-13 21:07:29'),
(13,'Sulawesi Tengah','2025-06-13 21:07:29'),
(14,'Sulawesi Selatan','2025-06-13 21:07:29'),
(15,'Sulawesi Tenggara','2025-06-13 21:07:29'),
(16,'Gorontalo','2025-06-13 21:07:29'),
(17,'Maluku','2025-06-13 21:07:29'),
(18,'Papua Barat','2025-06-13 21:07:29'),
(19,'Papua','2025-06-13 21:07:29'),
(20,'Kalimantan Barat','2025-06-13 21:07:29'),
(21,'Kalimantan Utara','2025-06-13 21:07:29'),
(22,'Nusa Tenggara Timur','2025-06-13 21:07:29'),
(23,'Kepulauan Riau','2025-06-13 21:07:29');

/*Table structure for table `tni_categories` */

DROP TABLE IF EXISTS `tni_categories`;

CREATE TABLE `tni_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `color_code` varchar(7) DEFAULT '#556ee6',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tni_categories` */

insert  into `tni_categories`(`id`,`code`,`name`,`color_code`,`created_at`) values 
(1,'AD','TNI Angkatan Darat','#28a745','2025-06-13 21:07:39'),
(2,'AL','TNI Angkatan Laut','#17a2b8','2025-06-13 21:07:39'),
(3,'AU','TNI Angkatan Udara','#ffc107','2025-06-13 21:07:39');

/*Table structure for table `tni_units` */

DROP TABLE IF EXISTS `tni_units`;

CREATE TABLE `tni_units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_type_id` int(11) NOT NULL,
  `parent_unit_id` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `province_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`),
  KEY `unit_type_id` (`unit_type_id`),
  KEY `parent_unit_id` (`parent_unit_id`),
  KEY `province_id` (`province_id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `tni_units_ibfk_1` FOREIGN KEY (`unit_type_id`) REFERENCES `unit_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `tni_units_ibfk_2` FOREIGN KEY (`parent_unit_id`) REFERENCES `tni_units` (`id`) ON DELETE SET NULL,
  CONSTRAINT `tni_units_ibfk_3` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  CONSTRAINT `tni_units_ibfk_4` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `tni_units` */

insert  into `tni_units`(`id`,`unit_type_id`,`parent_unit_id`,`name`,`code`,`address`,`province_id`,`city_id`,`latitude`,`longitude`,`status`,`created_at`,`updated_at`) values 
(1,1,NULL,'Kodam I/Bukit Barisan','I/BB','Jl. Jend. Ahmad Yani No. 1',2,2,3.59520000,98.67220000,'active','2025-06-13 21:07:58','2025-06-13 21:07:58'),
(2,1,NULL,'Kodam III/Siliwangi','III/SLW','Jl. Aceh No. 69',7,9,-6.91750000,107.61910000,'active','2025-06-13 21:07:58','2025-06-13 21:07:58'),
(3,1,NULL,'Kodam V/Brawijaya','V/BWY','Jl. Ijen No. 25',10,17,-7.96660000,112.63260000,'active','2025-06-13 21:07:58','2025-06-13 21:07:58'),
(4,1,NULL,'Kodam XIV/Hasanuddin','XIV/HSD','Jl. Jend. Sudirman No. 1',14,26,-5.14770000,119.43270000,'active','2025-06-13 21:07:58','2025-06-13 21:07:58'),
(5,1,NULL,'Kodam XVII/Cenderawasih','XVII/CWS','Jl. Koti No. 1',19,32,-2.54890000,140.71560000,'active','2025-06-13 21:07:58','2025-06-13 21:07:58'),
(6,2,1,'Korem 011/Lilawangsa','011/LW','Jl. Sisingamangaraja',2,2,3.58400000,98.66560000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(7,2,1,'Korem 012/Teuku Umar','012/TU','Jl. Cut Nyak Dien',1,1,5.55770000,95.32220000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(8,2,1,'Korem 013/Wira Bima','013/WB','Jl. Jend. Sudirman',4,4,0.50710000,101.44780000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(9,2,1,'Korem 031/Wirabima','031/WB','Jl. Veteran',3,3,-0.94710000,100.41720000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(10,2,1,'Korem 041/Gamas','041/GMS','Jl. Kapten Pattimura',5,5,-1.61010000,103.61310000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(11,2,2,'Korem 061/Suryakancana','061/SK','Jl. Siliwangi No. 1',7,10,-6.59710000,106.80600000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(12,2,2,'Korem 062/Tarumanagara','062/TN','Jl. Otto Iskandar Dinata',6,6,-6.19440000,106.82290000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(13,2,2,'Korem 063/Sunan Gunung Jati','063/SGJ','Jl. Brigjen Dharsono',7,11,-6.70630000,108.55710000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(14,2,2,'Korem 064/Maulana Yusuf','064/MY','Jl. Wahid Hasyim',11,23,-6.12390000,106.16400000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(15,2,2,'Korem 065/Merdeka','065/MDK','Jl. Merdeka',7,9,-6.23830000,106.97560000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(16,2,3,'Korem 081/Dhirotsaha Jaya','081/DSJ','Jl. Soekarno Hatta',10,18,-7.62980000,111.52390000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(17,2,3,'Korem 082/Citra Bhayangkara','082/CPDY','Jl. Ahmad Yani',10,16,-7.25040000,112.76880000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(18,2,3,'Korem 083/Baladhika Jaya','083/BDJ','Jl. Letjen S. Parman',10,17,-7.97970000,112.63040000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(19,2,3,'Korem 084/Bhaskara Jaya','084/BJ','Jl. Jend. Basuki Rachmat',10,20,-8.18440000,113.73680000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(20,2,3,'Korem 085/Brawijaya','085/BWY','Jl. Veteran',10,19,-7.81810000,112.01780000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(21,2,4,'Korem 141/Toddopuli','141/TP','Jl. Hertasning',14,26,-5.14120000,119.43830000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(22,2,4,'Korem 142/Tattag','142/TG','Jl. Jend. Sudirman',14,27,-4.54210000,120.32890000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(23,2,4,'Korem 143/Haluoleo','143/HO','Jl. Ahmad Yani',15,28,-3.97780000,122.51490000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(24,2,4,'Korem 132/Tadulako','132/TDL','Jl. Soekarno Hatta',13,25,-0.89990000,119.87070000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(25,2,4,'Korem 133/Nani Wartabone','133/NW','Jl. 23 Januari',16,29,0.54350000,123.05960000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(26,2,5,'Korem 171/Praja Vira Yakthi','171/PVY','Jl. Raya Abepura',19,32,-2.59160000,140.66920000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(27,2,5,'Korem 172/Praja Wira Yakthi','172/PWY','Jl. Brawijaya',19,33,-8.46670000,140.41670000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(28,2,5,'Korem 173/Praja Vira Braja','173/PVB','Jl. Soa Siu',19,34,-1.16670000,136.10000000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(29,2,5,'Korem 174/Anim Ta Wani','174/ATW','Jl. Trikora',19,35,-4.53330000,136.88330000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(30,2,5,'Korem 181/Praja Vira Tama','181/PVT','Jl. Ahmad Yani',18,31,-0.88330000,131.25000000,'active','2025-06-13 21:08:41','2025-06-13 21:08:41'),
(31,3,6,'Kodim 0201/Medan','0201','Jl. Kapten Muslim',2,2,3.57780000,98.67780000,'active','2025-06-13 21:08:48','2025-06-13 21:08:48'),
(32,3,11,'Kodim 0601/Bogor','0601','Jl. Ir. H. Juanda',7,10,-6.59710000,106.78860000,'active','2025-06-13 21:08:48','2025-06-13 21:08:48'),
(33,3,16,'Kodim 0818/Malang','0818','Jl. Letjen S. Parman',10,17,-7.97970000,112.62000000,'active','2025-06-13 21:08:48','2025-06-13 21:08:48'),
(34,3,21,'Kodim 1414/Makassar','1414','Jl. Hertasning Raya',14,26,-5.14120000,119.43000000,'active','2025-06-13 21:08:48','2025-06-13 21:08:48'),
(35,3,26,'Kodim 1711/Jayapura','1711','Jl. Raya Abepura',19,32,-2.59160000,140.66000000,'active','2025-06-13 21:08:48','2025-06-13 21:08:48'),
(36,4,31,'Koramil 0201-01/Medan Kota','0201-01','Jl. Brigjend Katamso',2,2,3.58890000,98.67220000,'active','2025-06-13 21:08:54','2025-06-13 21:08:54'),
(37,4,32,'Koramil 0601-01/Bogor Tengah','0601-01','Jl. Kapten Muslihat',7,10,-6.59710000,106.79000000,'active','2025-06-13 21:08:54','2025-06-13 21:08:54'),
(38,4,33,'Koramil 0818-01/Malang Kota','0818-01','Jl. Letjen Sutoyo',10,17,-7.97970000,112.62500000,'active','2025-06-13 21:08:54','2025-06-13 21:08:54'),
(39,4,34,'Koramil 1414-01/Makassar Utara','1414-01','Jl. Perintis Kemerdekaan',14,26,-5.14120000,119.43500000,'active','2025-06-13 21:08:54','2025-06-13 21:08:54'),
(40,4,35,'Koramil 1711-01/Jayapura Utara','1711-01','Jl. Raya Sentani',19,32,-2.59160000,140.66500000,'active','2025-06-13 21:08:54','2025-06-13 21:08:54'),
(41,5,NULL,'Koarmada I','KOARMABAR I','Jl. Gunung Sahari',6,6,-6.13330000,106.85000000,'active','2025-06-13 21:08:59','2025-06-13 21:08:59'),
(42,5,NULL,'Koarmada II','KOARMABAR II','Jl. Ujung Pandang',10,16,-7.28190000,112.73580000,'active','2025-06-13 21:08:59','2025-06-13 21:08:59'),
(43,5,NULL,'Koarmada III','KOARMABAR III','Jl. Sam Ratulangi',18,31,-0.86670000,131.26670000,'active','2025-06-13 21:08:59','2025-06-13 21:08:59'),
(44,5,NULL,'Kolinlamil','KOLINLAMIL','Jl. Raya Cilandak KKO',6,7,-6.30000000,106.81670000,'active','2025-06-13 21:08:59','2025-06-13 21:08:59'),
(45,5,NULL,'Pushidrosal','PUSHIDROSAL','Jl. Pantai Kuta Wringin',6,8,-6.11670000,106.88330000,'active','2025-06-13 21:08:59','2025-06-13 21:08:59'),
(46,6,41,'Lantamal I/Belawan','LANTAMAL I','Jl. Yos Sudarso',2,2,3.78330000,98.68330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(47,6,41,'Lantamal II/Padang','LANTAMAL II','Jl. Veteran',3,3,-0.95000000,100.35000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(48,6,41,'Lantamal III/Jakarta','LANTAMAL III','Jl. Gunung Sahari',6,6,-6.15000000,106.83330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(49,6,41,'Lantamal IV/Tanjungpinang','LANTAMAL IV','Jl. Basuki Rachmat',23,37,0.91670000,104.45000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(50,6,41,'Lantamal V/Surabaya','LANTAMAL V','Jl. Ujung',10,16,-7.21670000,112.73330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(51,6,42,'Lantamal VI/Makassar','LANTAMAL VI','Jl. Jend. Sudirman',14,26,-5.13330000,119.41670000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(52,6,42,'Lantamal VII/Kupang','LANTAMAL VII','Jl. El Tari',22,38,-10.16670000,123.58330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(53,6,42,'Lantamal VIII/Manado','LANTAMAL VIII','Jl. 17 Agustus',12,24,1.48330000,124.85000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(54,6,42,'Lantamal IX/Ambon','LANTAMAL IX','Jl. Anthony Rhebok',17,30,-3.68330000,128.18330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(55,6,42,'Lantamal X/Jayapura','LANTAMAL X','Jl. Raya Hamadi',19,32,-2.60000000,140.70000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(56,6,43,'Lantamal XI/Merauke','LANTAMAL XI','Jl. Raya Mandala',19,33,-8.50000000,140.40000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(57,6,43,'Lantamal XII/Pontianak','LANTAMAL XII','Jl. Ahmad Yani',20,36,-0.03330000,109.33330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(58,6,43,'Lantamal XIII/Tarakan','LANTAMAL XIII','Jl. Mulawarman',21,37,3.30000000,117.63330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(59,6,43,'Lantamal XIV/Sorong','LANTAMAL XIV','Jl. Basuki Rachmat',18,31,-0.88330000,131.25000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(60,6,43,'Lantamal XV/Biak','LANTAMAL XV','Jl. Soa Siu',19,34,-1.18330000,136.08330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(61,6,44,'Lantamal XVI/Cilangkap','LANTAMAL XVI','Jl. Raya Cilangkap',6,8,-6.26670000,106.90000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(62,6,44,'Lantamal XVII/Cirebon','LANTAMAL XVII','Jl. Pelabuhan',7,11,-6.73200000,108.55700000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(63,6,44,'Lantamal XVIII/Semarang','LANTAMAL XVIII','Jl. Marina',8,13,-6.96670000,110.41670000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(64,6,44,'Lantamal XIX/Yogyakarta','LANTAMAL XIX','Jl. Parangtritis',9,15,-7.81670000,110.36670000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(65,6,44,'Lantamal XX/Banyuwangi','LANTAMAL XX','Jl. Pelabuhan',10,20,-8.21670000,114.36670000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(66,6,45,'Lantamal XXI/Batam','LANTAMAL XXI','Jl. Marina',23,39,1.11670000,104.05000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(67,6,45,'Lantamal XXII/Bengkulu','LANTAMAL XXII','Jl. Pelabuhan',17,30,-3.80000000,102.26670000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(68,6,45,'Lantamal XXIII/Palembang','LANTAMAL XXIII','Jl. Sungai',16,29,-2.96670000,104.75000000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(69,6,45,'Lantamal XXIV/Banjarmasin','LANTAMAL XXIV','Jl. Martapura',14,26,-3.31670000,114.58330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(70,6,45,'Lantamal XXV/Balikpapan','LANTAMAL XXV','Jl. Pelabuhan',21,37,-1.26670000,116.83330000,'active','2025-06-13 21:09:05','2025-06-13 21:09:05'),
(71,7,46,'Lanal Belawan','LANAL BWN','Jl. Pelabuhan Belawan',2,2,3.76670000,98.66670000,'active','2025-06-13 21:09:10','2025-06-13 21:09:10'),
(72,7,51,'Lanal Makassar','LANAL MKS','Jl. Pelabuhan Soekarno-Hatta',14,26,-5.13330000,119.41000000,'active','2025-06-13 21:09:10','2025-06-13 21:09:10'),
(73,7,56,'Lanal Merauke','LANAL MRK','Jl. Pelabuhan Merauke',19,33,-8.50000000,140.39000000,'active','2025-06-13 21:09:10','2025-06-13 21:09:10'),
(74,7,61,'Lanal Cilangkap','LANAL CLK','Jl. Raya Cilangkap',6,8,-6.26670000,106.89000000,'active','2025-06-13 21:09:10','2025-06-13 21:09:10'),
(75,7,66,'Lanal Batam','LANAL BTM','Jl. Marina Batam',23,39,1.11670000,104.04000000,'active','2025-06-13 21:09:10','2025-06-13 21:09:10'),
(76,8,71,'Posal Belawan Utara','POSAL BWN-01','Jl. Dermaga Utara',2,2,3.78330000,98.65000000,'active','2025-06-13 21:09:18','2025-06-13 21:09:18'),
(77,8,72,'Posal Makassar Timur','POSAL MKS-01','Jl. Pelabuhan Timur',14,26,-5.13330000,119.40500000,'active','2025-06-13 21:09:18','2025-06-13 21:09:18'),
(78,8,73,'Posal Merauke Selatan','POSAL MRK-01','Jl. Pelabuhan Selatan',19,33,-8.51000000,140.38500000,'active','2025-06-13 21:09:18','2025-06-13 21:09:18'),
(79,8,74,'Posal Cilangkap Barat','POSAL CLK-01','Jl. Raya Cilangkap Barat',6,8,-6.27000000,106.88500000,'active','2025-06-13 21:09:18','2025-06-13 21:09:18'),
(80,8,75,'Posal Batam Center','POSAL BTM-01','Jl. Marina Center',23,39,1.11000000,104.03500000,'active','2025-06-13 21:09:18','2025-06-13 21:09:18'),
(81,9,NULL,'Koopsau I','KOOPSAU I','Jl. Halim Perdanakusuma',6,8,-6.26670000,106.88330000,'active','2025-06-13 21:09:22','2025-06-13 21:09:22'),
(82,9,NULL,'Koopsau II','KOOPSAU II','Jl. Abdul Rahman Saleh',10,17,-7.92630000,112.71500000,'active','2025-06-13 21:09:22','2025-06-13 21:09:22'),
(83,9,NULL,'Koopsau III','KOOPSAU III','Jl. Adisutcipto',9,15,-7.78810000,110.43140000,'active','2025-06-13 21:09:22','2025-06-13 21:09:22'),
(84,9,NULL,'Kohanudnas','KOHANUDNAS','Jl. Raya Pondok Gede',6,8,-6.28330000,106.91670000,'active','2025-06-13 21:09:22','2025-06-13 21:09:22'),
(85,9,NULL,'Kosekhanudnas','KOSEKHANUDNAS','Jl. Gatot Subroto',6,7,-6.21670000,106.81670000,'active','2025-06-13 21:09:22','2025-06-13 21:09:22'),
(86,10,81,'Lanud Halim Perdanakusuma','HALIM','Jl. Halim Perdanakusuma',6,8,-6.26670000,106.89000000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(87,10,81,'Lanud Soekarno-Hatta','SOETA','Jl. Bandara Soekarno-Hatta',11,21,-6.12560000,106.65580000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(88,10,81,'Lanud Atang Sendjaja','ATANG','Jl. Raya Atang Sendjaja',7,10,-6.45000000,106.78330000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(89,10,81,'Lanud Husein Sastranegara','HUSEIN','Jl. Pajajaran',7,9,-6.90060000,107.57640000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(90,10,81,'Lanud Suryadarma','SURYADARMA','Jl. Kolonel Sugiri',7,9,-6.56670000,107.76670000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(91,10,82,'Lanud Abdul Rahman Saleh','ARS','Jl. Raya Abdul Rahman Saleh',10,17,-7.92630000,112.71500000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(92,10,82,'Lanud Juanda','JUANDA','Jl. Bandara Juanda',10,16,-7.37970000,112.78640000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(93,10,82,'Lanud Madiun','MADIUN','Jl. Raya Bandara Iswahyudi',10,18,-7.51580000,111.48310000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(94,10,82,'Lanud Adi Soemarmo','SOEMARMO','Jl. Raya Solo-Tawangmangu',8,14,-7.51580000,110.75610000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(95,10,82,'Lanud Iswahjudi','ISWAHJUDI','Jl. Lanud Iswahjudi',10,18,-7.64810000,111.37060000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(96,10,83,'Lanud Adisutcipto','ADISUTCIPTO','Jl. Raya Adisutcipto',9,15,-7.78810000,110.43140000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(97,10,83,'Lanud Achmad Yani','YANI','Jl. Raya Bandara Ahmad Yani',8,13,-6.97140000,110.37420000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(98,10,83,'Lanud Pattimura','PATTIMURA','Jl. Bandara Pattimura',17,30,-3.71030000,128.08920000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(99,10,83,'Lanud Sam Ratulangi','SAMRAT','Jl. Bandara Sam Ratulangi',12,24,1.54920000,124.92670000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(100,10,83,'Lanud Sultan Hasanuddin','HASANUDDIN','Jl. Bandara Sultan Hasanuddin',14,26,-5.06170000,119.55420000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(101,10,84,'Lanud Pondok Cabe','POCABE','Jl. Raya Pondok Cabe',11,22,-6.33330000,106.75000000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(102,10,84,'Lanud Roesmin Nurjadin','ROESMIN','Jl. Lintas Sumatera',4,4,0.46060000,101.44580000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(103,10,84,'Lanud Sjamsudin Noor','SJAMSUDIN','Jl. A. Yani Km 2',14,26,-3.42690000,114.76280000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(104,10,84,'Lanud Sultan Mahmud Badaruddin II','SMB','Jl. Kol. H. Burlian Km 8',6,5,-2.89820000,104.69920000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(105,10,84,'Lanud Muljono','MULJONO','Jl. Raya Cilacap-Yogya',8,13,-7.72640000,109.00810000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(106,10,85,'Lanud Wiriadinata','WIRIADINATA','Jl. Lanud Wiriadinata',7,12,-7.32670000,108.24390000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(107,10,85,'Lanud Sulaiman','SULAIMAN','Jl. Lanud Sulaiman',7,9,-6.89060000,107.57640000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(108,10,85,'Lanud Cakrabhuwana','CAKRABHUWANA','Jl. Lanud Cakrabhuwana',7,11,-6.75640000,108.53970000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(109,10,85,'Lanud Dhomber','DHOMBER','Jl. Raya Rembang',8,13,-6.70000000,111.35000000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(110,10,85,'Lanud Abdulrachman Saleh','ABDULRACHMAN','Jl. Raya Malang-Batu',10,17,-7.93000000,112.72000000,'active','2025-06-13 21:09:30','2025-06-13 21:09:30'),
(111,11,86,'Lanud Pondok Cabe','POCABE-BC','Jl. Raya Pondok Cabe Selatan',11,22,-6.34000000,106.74500000,'active','2025-06-13 21:09:37','2025-06-13 21:09:37'),
(112,11,91,'Lanud Juanda Sidoarjo','JUANDA-BC','Jl. Bandara Juanda Timur',10,16,-7.38500000,112.79000000,'active','2025-06-13 21:09:37','2025-06-13 21:09:37'),
(113,11,96,'Lanud Adisutcipto Bantul','ADISUTCIPTO-BC','Jl. Raya Bantul',9,15,-7.80000000,110.42000000,'active','2025-06-13 21:09:37','2025-06-13 21:09:37'),
(114,11,101,'Lanud Pondok Cabe Barat','POCABE-BARAT','Jl. Raya Pondok Cabe Barat',11,22,-6.33000000,106.74000000,'active','2025-06-13 21:09:37','2025-06-13 21:09:37'),
(115,11,106,'Lanud Wiriadinata Utara','WIRIA-UTARA','Jl. Lanud Wiriadinata Utara',7,12,-7.32000000,108.24000000,'active','2025-06-13 21:09:37','2025-06-13 21:09:37');

/*Table structure for table `unit_types` */

DROP TABLE IF EXISTS `unit_types`;

CREATE TABLE `unit_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `hierarchy_level` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `unit_types_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tni_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `unit_types` */

insert  into `unit_types`(`id`,`category_id`,`code`,`name`,`hierarchy_level`,`created_at`) values 
(1,1,'KODAM','Kodam',1,'2025-06-13 21:07:46'),
(2,1,'KOREM','Korem',2,'2025-06-13 21:07:46'),
(3,1,'KODIM','Kodim',3,'2025-06-13 21:07:46'),
(4,1,'KORAMIL','Koramil',4,'2025-06-13 21:07:46'),
(5,2,'KOARMADA','Koarmada',1,'2025-06-13 21:07:49'),
(6,2,'LANTAMAL','Lantamal',2,'2025-06-13 21:07:49'),
(7,2,'LANAL','Lanal',3,'2025-06-13 21:07:49'),
(8,2,'POSAL','Posal',4,'2025-06-13 21:07:49'),
(9,3,'KOOPSAU','Koopsau',1,'2025-06-13 21:07:53'),
(10,3,'LANUD_AB','Lanud Tipe A/B',2,'2025-06-13 21:07:53'),
(11,3,'LANUD_BC','Lanud Tipe B/C',3,'2025-06-13 21:07:53'),
(12,3,'POS_AU','Pos TNI AU',4,'2025-06-13 21:07:53');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
