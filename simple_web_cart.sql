# ************************************************************
# Sequel Ace SQL dump
# Version 2111
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.30)
# Database: simple_web_cart
# Generation Time: 2023-03-25 05:28:18 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table admin
# ------------------------------------------------------------

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `type_user` varchar(11) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;

INSERT INTO `admin` (`id`, `username`, `password`, `type_user`, `datetime`)
VALUES
	(1,'admin','Admin123','admin','2023-03-25 09:15:39'),
	(2,'user','User123','user','2023-03-25 09:16:03');

/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table cart
# ------------------------------------------------------------

DROP TABLE IF EXISTS `cart`;

CREATE TABLE `cart` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `datetime` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `status`, `datetime`)
VALUES
	(2,2,7,'confirm','2023-03-25 12:23:48'),
	(3,2,6,'confirm','2023-03-25 12:23:55');

/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupon
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupon`;

CREATE TABLE `coupon` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;

INSERT INTO `coupon` (`id`, `user_id`, `total`, `status`, `datetime`)
VALUES
	(3,2,4,NULL,'2023-03-25'),
	(4,2,4,NULL,'2023-03-25'),
	(5,2,4,NULL,'2023-03-25');

/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table gallery
# ------------------------------------------------------------

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  `datetime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `gallery` WRITE;
/*!40000 ALTER TABLE `gallery` DISABLE KEYS */;

INSERT INTO `gallery` (`id`, `image`, `price`, `product`, `datetime`)
VALUES
	(1,'file-1638484943.jpg',25000,'Baju','2023-03-25'),
	(3,'file-1638485048.png',35000,'Celana','2023-03-25'),
	(4,'file-1638485058.png',15000,'Handuk','2023-03-25'),
	(5,'file-1638485071.png',50000,'Sepatu','2023-03-25'),
	(6,'file-1638485086.png',80000,'Jam Tangan','2023-03-25'),
	(7,'file-1638485102.png',265000,'Topi','2023-03-25'),
	(8,'file-1638485117.png',15000,'Kaos Kaki','2023-03-25');

/*!40000 ALTER TABLE `gallery` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `slug`, `description`, `image`, `status`, `datetime`)
VALUES
	(22,'tes sekali lagi','tes-sekali-lagi','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(25,'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC','tes1','<p>tes 1234</p>','file-1638484871.jpg',0,'2021-12-03 00:34:00'),
	(26,'tes sekali lagi','tes-sekali-lagi1','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(27,'tes','tes2','<p>tes 1234</p>','file-1638484871.jpg',0,'2021-12-03 00:34:00'),
	(28,'tes sekali lagi','tes-sekali-lagi2','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(29,'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC','tes3','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.','file-1638484871.jpg',0,'2021-12-03 00:34:00'),
	(30,'tes sekali lagi','tes-sekali-lagi3','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(31,'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC','tes4','<p>tes 1234</p>','file-1638484871.jpg',0,'2021-12-03 00:34:00'),
	(32,'tes sekali lagi','tes-sekali-lagi4','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(33,'tes','tes5','<p>tes 1234</p>','file-1638484871.jpg',0,'2021-12-03 00:34:00'),
	(34,'tes sekali lagi','tes-sekali-lagi5','<p>tes 124 lagi</p>','file-1638447356.png',0,'2021-12-02 16:25:00'),
	(35,'Section 1.10.32 of \"de Finibus Bonorum et Malorum\", written by Cicero in 45 BC','tes6','Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.','file-1638484871.jpg',0,'2021-12-03 00:34:00');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
