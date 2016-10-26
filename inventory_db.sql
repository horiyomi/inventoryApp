-- MySQL dump 10.13  Distrib 5.7.16, for Linux (x86_64)
--
-- Host: localhost    Database: inventory_db
-- ------------------------------------------------------
-- Server version	5.7.16-0ubuntu0.16.10.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `no_of_items` int(11) unsigned NOT NULL,
  `cost` double unsigned NOT NULL,
  `price` double unsigned NOT NULL,
  `created_at` varchar(45) DEFAULT NULL,
  `description` longtext,
  `image` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'LV Bag',2,1200,1800,'20-12-2016 05:22:34','A luxurious bag made for the Elite.','../assets/img/lv.jpg'),(2,'Gucci Bag',4,439.5,780,'2016-10-20 16:08:18','A Beautiful Exotic and classic pearl of a bag. you would be lucky to own one.','../assets/img/gucci.jpg'),(3,'Louboutin Shoe',7,2300,2900,'2016-10-20 17:32:24','Simply Class..','../assets/img/louboutin.jpg'),(4,'Polo Shirt',12,60,110,'2016-10-20 18:09:16','Polo Man. Think about that.','../assets/img/polo.jpg'),(5,'Versace Shades',12,20,56,'2016-10-21 18:05:50','Versace by Medusa',NULL),(6,'Emperio Amarni',4,450,670,'2016-10-23 03:54:23','Lovely Emperio Bag',NULL),(7,'DIOR SHADES',24,90,120,'2016-10-23 03:57:44','A jewel you live to own!!!',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sales` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (43,4,6,'2016-10-16 02:45:03'),(44,4,2,'2016-10-19 02:46:19'),(45,4,2,'2016-10-20 02:47:38'),(46,4,1,'2016-10-23 02:48:41'),(47,4,2,'2016-10-21 02:59:25'),(48,4,3,'2016-10-23 03:01:53'),(49,4,1,'2016-10-22 20:01:24'),(50,4,1,'2016-10-23 20:23:19'),(51,4,1,'2016-10-23 20:27:45'),(52,2,1,'2016-10-23 21:25:50'),(53,1,2,'2016-10-23 21:49:25');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-10-26  7:50:23
