-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: mobilephones
-- ------------------------------------------------------
-- Server version	5.6.28-log

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
-- Table structure for table `propertygroups`
--

DROP TABLE IF EXISTS `propertygroups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `propertygroups` (
  `id_propertygroup` varchar(20) NOT NULL,
  `comment` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `timestamp_lastchange` int(12) DEFAULT NULL,
  `timestamp_created` int(12) DEFAULT NULL,
  PRIMARY KEY (`id_propertygroup`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `propertygroups`
--

LOCK TABLES `propertygroups` WRITE;
/*!40000 ALTER TABLE `propertygroups` DISABLE KEYS */;
INSERT INTO `propertygroups` VALUES ('118','','Inventory',1305787904,1305787904),('119','','Type',1305787904,1305787904),('120','','Inventory Accessories',1305787904,1305787904),('121','','Handset GSM bands and datatransfer',1305787904,1305787904),('122','','Handset Interfaces',1305787904,1305787904),('123','','Handset Sensitivity',1305787904,1305787904),('124','','Handset Versatility',1305787904,1305787904),('125','','Handset Display',1305787904,1305787904),('126','','Handset General Operation',1305787904,1305787904),('127','','Calling Versatility',1305787904,1305787904),('128','','Camera Versatility',1305787904,1305787904),('129','','SMS',1305787904,1305787904),('130','','Email',1305787904,1305787904),('131','','OS Versatility',1305787904,1305787904),('132','','Internet',1305787904,1305787904),('133','','Navigation',1305787904,1305787904),('134','','Music Versatility',1305787904,1305787904),('135','','Handset Put into operation',1305787904,1305787904),('136','','Handset Battery',1305787904,1305787904),('137','','Handset Portability',1305787904,1305787904),('138','','Handset Durability',1305787904,1305787904),('139','','Handset Manual',1305787904,1305787904),('140','','Calling Convenience',1305787904,1305787904),('141','','Synchronisation Versatility',1305787904,1305787904),('142','','Calling Sound Quality',1305787904,1305787904),('143','','Calling Battery',1305787904,1305787904),('144','','Music Battery',1305787904,1305787904),('145','','Camera Quality',1305787904,1305787904),('146','','Camera Shutter Lag',1305787904,1305787904),('147','','Camera Convenience',1305787904,1305787904),('148','','Camera Photo Transfer',1305787904,1305787904),('149','','Music Convenience',1305787904,1305787904),('150','','Music Transfer',1305787904,1305787904),('151','','Music Sound Quality',1305787904,1305787904),('152','','Video',1305787904,1305787904),('153','','Failure',1305787904,1305787904),('154','','Pros',1305787904,1305787904),('155','','Cons',1305787904,1305787904),('156','','Outstanding aspects',1305787904,1305787904),('159','','Camera Video Compatiblity',1321970995,1321970995),('160','','picture sequence speed',1369293089,1369293089),('163','','Overall battery',1386148372,1386148372),('164','','',1390476138,1390476138);
/*!40000 ALTER TABLE `propertygroups` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-06 15:45:38
