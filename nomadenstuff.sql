/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.32-MariaDB-log : Database - nomadenstuff
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`nomadenstuff` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `nomadenstuff`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `username` varchar(125) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `admin` */

insert  into `admin`(`id`,`name`,`username`,`password`,`role`) values 
(1,'admin','admin','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2','admin');

/*Table structure for table `cart` */

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=153 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `cart` */

insert  into `cart`(`id`,`id_user`,`id_product`,`quantity`,`message`,`sub_total`) values 
(55,4,15,1,'',250000),
(56,4,16,1,'',100000),
(57,4,13,1,'',150000),
(58,4,12,1,'',200000),
(108,17,12,1,NULL,200000),
(151,18,12,1,NULL,200000),
(152,18,13,1,NULL,150000);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `category` */

insert  into `category`(`id`,`title`,`slug`) values 
(1,'Baju','baju'),
(2,'Celana','celana'),
(4,'Kemeja','kemeja'),
(7,'Jeans','jeans'),
(8,'Jaket','jaket');

/*Table structure for table `order_confirm` */

DROP TABLE IF EXISTS `order_confirm`;

CREATE TABLE `order_confirm` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` int(11) DEFAULT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `order_confirm` */

insert  into `order_confirm`(`id`,`id_orders`,`account_name`,`account_number`,`nominal`,`note`,`image`) values 
(5,8,'Alfaturachman Maulana Pahlevi',2147483647,343000,'-','4inv20231224193620-20231224204724.png'),
(6,9,'Alfaturachman Maulana Pahlevi',475874385,268000,'-','420231228132247-20231228132344.png'),
(7,6,'Alfaturachman Maulana Pahlevi',2147483647,511000,'-','420231224164324-20240106212242.png'),
(8,7,'Alfaturachman Maulana Pahlevi',2147483647,143000,'-','420231224164924-20240106213201.png'),
(9,10,'Alfaturachman Maulana Pahlevi',2147483647,143000,'-','420240107081039-20240109081004.png'),
(10,11,'Alfaturachman Maulana Pahlevi',2147483647,418000,'-','420240110104834-20240110105047.png'),
(11,16,'Alfaturachman Maulana Pahlevi',2147483647,193000,'-','1620240116223136-20240117002227.jpg'),
(12,21,'Alfaturachman Maulana Pahlevi',2147483647,271000,'-','1620240118165159-20240118165228.jpg'),
(13,39,'Alfaturachman Maulana Pahlevi',867563663,519000,'-','1620240124043808-20240124045739.jpg'),
(14,52,'Alfaturachman Maulana Pahlevi',NULL,539000,'-','1820240124091551-20240124100446.jpg'),
(15,53,'Alfaturachman Maulana Pahlevi',NULL,401500,'-','1820240124101025-20240124101038.jpg');

/*Table structure for table `order_detail` */

DROP TABLE IF EXISTS `order_detail`;

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `order_detail` */

insert  into `order_detail`(`id`,`id_orders`,`id_product`,`quantity`,`message`,`sub_total`) values 
(5,5,5,1,'',250000),
(6,5,1,1,'',150000),
(7,6,16,1,'',100000),
(8,6,11,1,'',150000),
(9,6,21,1,'',175000),
(10,7,16,1,'',100000),
(11,8,19,1,'',200000),
(12,8,17,1,'',100000),
(13,9,14,1,'warna kuning',125000),
(14,9,16,1,'tambah bubble warp',100000),
(15,10,16,1,'Saya ingin Warna Biru',100000),
(16,11,15,1,'warna kuning',250000),
(17,11,14,1,'',125000),
(38,26,12,1,NULL,200000),
(39,26,27,1,NULL,250000),
(40,26,26,1,NULL,200000),
(42,28,11,1,NULL,150000),
(43,29,25,1,NULL,300000),
(44,29,26,1,NULL,200000),
(45,29,28,1,NULL,250000),
(74,52,26,1,NULL,200000),
(75,52,24,1,NULL,150000),
(76,52,25,1,NULL,300000),
(77,53,22,1,NULL,200000),
(78,53,20,1,NULL,225000);

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `diskon_persen` int(3) DEFAULT NULL,
  `diskon` int(3) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(125) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `courier` varchar(125) DEFAULT NULL,
  `cost_courier` int(11) DEFAULT NULL,
  `waybill` varchar(125) DEFAULT NULL,
  `status` enum('waiting','paid','process','delivered','cancel','done') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `orders` */

insert  into `orders`(`id`,`id_user`,`date`,`invoice`,`diskon_persen`,`diskon`,`total`,`name`,`address`,`city`,`province`,`phone`,`courier`,`cost_courier`,`waybill`,`status`) values 
(5,1,'2023-12-20','120231220231815',NULL,NULL,400000,'Ale','Jl. Merdeka No 9','Semarang','Jawa Tengah','081325562334','JNE',40000,NULL,'delivered'),
(6,4,'2023-12-24','420231224164324',NULL,NULL,425000,'Alfaturachman','Jl. Merdeka No.45','Kudus','Jawa Tengah','081327782336','JNE',86000,NULL,'paid'),
(7,4,'2023-12-24','420231224164924',NULL,NULL,100000,'Alfaturachman','Jl','Kudus','Jawa Tengah','081327782336','JNE',43000,NULL,'paid'),
(8,4,'2023-12-24','420231224193620',NULL,NULL,300000,'Alfaturachman','Jalan Merdeka','Kudus','Jawa Tengah','081327782336','JNE',43000,NULL,'done'),
(9,4,'2023-12-28','420231228132247',NULL,NULL,225000,'Alfaturachman','Jl. Merdeka No89','Kudus','Jawa Tengah','081327782336','JNE',43000,'5643635665','waiting'),
(10,4,'2024-01-07','420240107081039',NULL,NULL,100000,'Alfaturachman','Jl. Majapahit','Kudus','Jawa Tengah','081327782336','JNE',43000,NULL,'waiting'),
(11,4,'2024-01-10','420240110104834',NULL,NULL,375000,'Alfaturachman','Jl. poncowolo','Kudus','Jawa Tengah','081327782336','JNE',43000,'SMG34JNE94728592','process'),
(26,17,'2024-01-19','1720240119083728',NULL,NULL,650000,'Alfiani Ummaya','Jl. Poncowolo Timur Raya No.587','Kudus','Jawa Tengah','081327782336','JNE',21000,NULL,'waiting'),
(28,16,'2024-01-21','1620240121012022',NULL,NULL,150000,'Alferina','Jl. Poncowolo Timur Raya No.587','Kudus','Jawa Tengah','081327782336','JNE',21000,NULL,'cancel'),
(29,16,'2024-01-22','1620240122091408',NULL,NULL,750000,'Alferina','Jl. Poncowolo Timur Raya No.587','Kudus','Jawa Tengah','081327782336','JNE',21000,NULL,'cancel'),
(52,18,'2024-01-24','1820240124091551',20,130000,539000,'Alfaturachman','Jl. Merdeka No.89','Kudus','Jawa Tengah','081327782336','jne',19000,NULL,'paid'),
(53,18,'2024-01-24','1820240124101025',10,42500,401500,'Alfaturachman','Jl. Merdeka No.89','Kudus','Jawa Tengah','081327782336','jne',19000,NULL,'paid');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `size` varchar(125) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `type` enum('L','W') DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `product` */

insert  into `product`(`id`,`id_category`,`slug`,`title`,`description`,`size`,`color`,`type`,`price`,`is_available`,`image`,`delete`) values 
(11,1,'beams-shirt-blue','Beams Shirt Blue','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','S','Biru','L',150000,1,'beams-blue-shirt-20231221195000.jpg',1),
(12,8,'nike-jumper-red','Nike Jumper Red','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Merah','L',200000,1,'nike-jumper-jacket-20231221195710.jpg',1),
(13,4,'nike-france-white','Nike France White','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Putih','L',150000,1,'nike-france-white-20231221195807.jpg',1),
(14,8,'nike-athletic-navy','Nike Athletic Navy','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','S','Hijau','L',125000,1,'nike-athletic-green-20231221202245.jpg',1),
(15,4,'uniqlo-banana-yellow','Uniqlo Banana Yellow','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Kuning','L',250000,0,'uniqlo-banana-yellow-20231221204358.jpg',1),
(16,4,'uniqlo-flannel-gray','Uniqlo Flannel Gray','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','S','Gray','L',100000,1,'uniqlo-flannel-gray-20231221204446.jpg',1),
(17,8,'uniqlo-jmb-black','Uniqlo JMB Black','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Hitam','W',100000,1,'uniqlo-jmb-black-20231221205203.jpg',0),
(18,8,'kappa-sweater-gray','Kappa Sweater Gray','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Gray','W',175000,1,'kappa-sweater-gray-20231221205240.jpg',0),
(19,8,'uniqlo-peanuts-white','Uniqlo Peanuts White','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','S','Putih','W',200000,1,'uniqlo-peanuts-white-20231221205430.jpg',1),
(20,8,'uniqlo-navajo-brown','Uniqlo Navajo Brown','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Coklat','W',225000,0,'uniqlo-navajo-brown-20231221205555.jpg',1),
(21,8,'vtg-peanuts-navy','Vtg Peanuts Navy','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Biru Tua','W',175000,1,'vtg-peanuts-navy-20231221205654.jpg',1),
(22,8,'traditional-british-navy','Traditional British Navy','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Biru Tua','W',200000,0,'traditional-british-navy-20231221205808.jpg',1),
(23,4,'glossy-navy','Glossy Navy','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Biru Tua','L',100000,1,'glossy-navy-20240114060123.jpg',1),
(24,4,'modigiliani-pattern','Modigiliani Pattern','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Biru Tua','L',150000,0,'modigiliani-pattern-20240114055822.jpg',1),
(25,1,'ralphpolo-polo-yellow','RalphPolo Polo Yellow','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Kuning','L',300000,0,'polo-ralphpolo-yellow-20240114061401.jpg',1),
(26,1,'canterbury-polo-blue','Canterbury Polo Blue','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Biru Tua','L',200000,0,'canterbury-polo-blue-20240114061533.jpg',1),
(27,1,'hugo-boss-white','Hugo Boss White','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','L','Putih','L',250000,0,'hugo-boss-white-20240114061624.jpg',1),
(28,1,'dogdept-polo-black','DogDept Polo Black','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','S','Hitam','L',250000,0,'dogdept-polo-black-20240114061728.jpg',1),
(29,1,'lala-hula-pattern','Lala Hula Pattern','Pilihan istimewa bagi pecinta fashion yang mencari gaya trifting yang unik. Dengan desain klasik dan warna biru yang menawan, kemeja ini menawarkan sentuhan kesan retro yang trendi. Dibuat dari bahan berkualitas tinggi, memberikan kenyamanan sepanjang hari. Detail desain seperti kancing depan dan kerah klasik menambahkan sentuhan vintage yang menonjol. Padukan dengan celana denim atau rok untuk tampilan santai yang tetap stylish. Gaya trifting yang timeless dan pasti membuat penampilan Anda menjadi sorotan.','M','Jingga','L',550000,1,'lala-hula-pattern-20240115223921.jpg',0);

/*Table structure for table `slider` */

DROP TABLE IF EXISTS `slider`;

CREATE TABLE `slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `sequence` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `slider` */

insert  into `slider`(`id`,`title`,`sequence`,`image`) values 
(7,'Pertama',1,'pertama-20231225185544.png'),
(8,'Kedua',2,'kedua-20231225185558.png'),
(9,'Ketiga',3,'ketiga-20231225185612.png');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `date_register` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`email`,`password`,`phone`,`address`,`image`,`is_active`,`date_register`) values 
(2,'Sucipto','sucipto@gmail.com','$2y$10$GYABjGdA/ASx8C7LSdP0vuKn8WV4ZPKoJxvYyq2in5WF8ivoYM9Di',NULL,NULL,'',1,1705324613),
(3,'Rachman','rachman@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'',1,1589607434),
(4,'Alfaturachman','ale@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'alfaturachman-20240107214028.png',1,1702658886),
(7,'Pahlevi Qosim','pahlevi@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'',1,1702658886),
(8,'Maulana Ibrahim','maulanaibrahim@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'',1,NULL),
(11,'Ahmad Karim','ahmadkarim@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'',1,NULL),
(12,'Sulcan Putra','sulcan@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,'',1,NULL),
(13,'Ilham RTX','ilham@gmail.com','$2y$10$Z06g46sGOedAl./zogS5hevZTLDxqus6GaC6y.RMpOE/iJpT.JMg2',NULL,NULL,NULL,1,1705219003),
(15,'Alfaturachman Maulana Pahlevi','pahlevi@gmail.com','$2y$10$fmYFqv2CrdE5.todB5zDvuyC9ZiDRgyQs1xFy86j1fig2fzMNJ7uy',NULL,NULL,NULL,1,1705322270),
(16,'Alferina','alferina@gmail.com','$2y$10$7vBmb8OFQlhKynTJczYqT.NbVTREgZY8.sCHZUD41FO/D5vgcBeFm','081327782336','Jl. Poncowolo Timur Raya No.587','alferina-azzahra-20240117002814.png',1,1705404687),
(17,'Alfiani Ummaya','alfiani@gmail.com','$2y$10$N6VBIypmQHz1n2u7XHWad.wfup4ZxWfuQGX3Xhz6wtynITY0Z7TXK','081327782336','Jl. Poncowolo Timur Raya No.587',NULL,1,1705584133),
(18,'Alfaturachman','alfa@gmail.com','$2y$10$0CWgftfm13Vx31yxwzT3zeJl.IpreVjSeIT8WeLP4mFKRTu3Wp.Iq','081327782336','Jl. Merdeka No.89',NULL,1,1706059497);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
