CREATE DATABASE  IF NOT EXISTS `cotestcms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cotestcms`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: cotestcms
-- ------------------------------------------------------
-- Server version	5.7.10-log

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
-- Table structure for table `cotestreports`
--

DROP TABLE IF EXISTS `cotestreports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotestreports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotestreports`
--

LOCK TABLES `cotestreports` WRITE;
/*!40000 ALTER TABLE `cotestreports` DISABLE KEYS */;
INSERT INTO `cotestreports` VALUES (1,'cotestreport1','cotestreport1111&lt;span style=&quot;background-color:#FFE500;&quot;&gt;111111111111111111111111111111111111&lt;/span&gt;','2017-03-21'),(2,'cotestreport2','&lt;h2&gt;\r\n	cotes&lt;span style=&quot;color:#E53333;&quot;&gt;treport2222222222&lt;/span&gt;222222222\r\n&lt;/h2&gt;','2017-03-21');
/*!40000 ALTER TABLE `cotestreports` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testprogramme`
--

DROP TABLE IF EXISTS `testprogramme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testprogramme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `date` date DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testprogramme`
--

LOCK TABLES `testprogramme` WRITE;
/*!40000 ALTER TABLE `testprogramme` DISABLE KEYS */;
INSERT INTO `testprogramme` VALUES (1,'testprogramme1','&lt;span style=&quot;font-size:24px;&quot;&gt;testprogramme1&lt;em&gt;testprogramme1testprogramme1testprogramme1testprogramme1testprogramme1&lt;/em&gt;&lt;/span&gt;','2017-03-21','actioncamcorders');
/*!40000 ALTER TABLE `testprogramme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testreports`
--

DROP TABLE IF EXISTS `testreports`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testreports` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` mediumtext,
  `date` date DEFAULT NULL,
  `product` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testreports`
--

LOCK TABLES `testreports` WRITE;
/*!40000 ALTER TABLE `testreports` DISABLE KEYS */;
INSERT INTO `testreports` VALUES (1,'testreport1','test：this is a testreport1','2017-03-21','basiccameras'),(2,'testreport2','testreport22222222222222222222222222222222222222222222222222','2017-03-21','actioncamcorders');
/*!40000 ALTER TABLE `testreports` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-22 18:53:48
