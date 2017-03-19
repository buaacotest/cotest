CREATE DATABASE  IF NOT EXISTS `cotestcms` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `cotestcms`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cotestcms
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotestreports`
--

LOCK TABLES `cotestreports` WRITE;
/*!40000 ALTER TABLE `cotestreports` DISABLE KEYS */;
INSERT INTO `cotestreports` VALUES (1,'testcotestreport','bbbccccc','2017-01-25'),(2,'testcotestreport3','bbbccccc','2017-01-25'),(3,'testcotestreport2','bb','2017-01-25');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testprogramme`
--

LOCK TABLES `testprogramme` WRITE;
/*!40000 ALTER TABLE `testprogramme` DISABLE KEYS */;
INSERT INTO `testprogramme` VALUES (1,'testtestprogramme1','&lt;strong&gt;&lt;span style=&quot;background-color:#E53333;&quot;&gt;sssssbbbbbb谁谁&lt;s&gt;谁谁谁&lt;/s&gt;&lt;span style=&quot;background-color:#B8D100;&quot;&gt;&lt;s&gt;&lt;/s&gt;&lt;/span&gt;&lt;/span&gt;&lt;/strong&gt;&lt;s&gt;水水水水&lt;span style=&quot;color:#B8D100;&quot;&gt;事实上&lt;/span&gt;&lt;/s&gt;事实上','2017-01-25','tablets'),(2,'testtestprogramme2','sssss','2017-01-25','mobilephones'),(3,'testtestprogramme2','sssss','2017-01-25','mobilephones'),(4,'test1','ssssss','2017-01-25','basiccameras'),(5,'谁谁谁谁谁','按时','2017-02-03','basiccameras');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testreports`
--

LOCK TABLES `testreports` WRITE;
/*!40000 ALTER TABLE `testreports` DISABLE KEYS */;
INSERT INTO `testreports` VALUES (1,'testtestreport','bbbbbb','2017-01-25','tvs'),(2,'testtestreport2','bbbbbb','2017-01-25','tvs'),(3,'testtestreport2','bbbbbb','2017-01-25','tvs');
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

-- Dump completed on 2017-03-03 20:19:03
