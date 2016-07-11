-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: milkpowder
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
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id_product` varchar(20) NOT NULL,
  `id_productgroup` varchar(20) NOT NULL,
  `id_manufacturer` varchar(20) NOT NULL,
  `icrt_code` varchar(45) DEFAULT NULL,
  `timestamp_lastchange` int(12) DEFAULT NULL,
  `timestamp_created` int(12) DEFAULT NULL,
  `picture_hires` varchar(450) DEFAULT NULL,
  `picture_lores` varchar(450) DEFAULT NULL,
  `similarmodelscodes` varchar(45) DEFAULT NULL,
  `parentmodelcode` varchar(45) DEFAULT NULL,
  `labcode` varchar(20) DEFAULT NULL,
  `batch` varchar(20) DEFAULT NULL,
  `sortorder` varchar(20) DEFAULT NULL,
  `articlenumber` varchar(30) DEFAULT NULL,
  `serialnumber` varchar(30) DEFAULT NULL,
  `boughtbyorganisation` varchar(20) DEFAULT NULL,
  `labarrivaldate` varchar(45) DEFAULT NULL,
  `labreportdate` varchar(45) DEFAULT NULL,
  `releasedate` varchar(45) DEFAULT NULL,
  `systemmodelid` varchar(45) DEFAULT NULL,
  `shortname` varchar(45) DEFAULT NULL,
  `completename` varchar(45) DEFAULT NULL,
  `modelname` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_product`),
  KEY `fk_products_productgroups1_idx` (`id_productgroup`),
  KEY `fk_products_manufacturers1_idx` (`id_manufacturer`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES ('1','1','1','PT16586-0001-00',1466363750,1465236932,'','','','','15-129772-01','1606','1','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','君乐宝纯金装','JUNLEBAO Gold','Gold','11 CNY/100g'),('2','1','2','PT16586-0002-00',1466363750,1465236932,'','','','','15-129772-02','1606','2','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Beingmate Infant Formula Powder','Infant Formula Powder','14 CNY/100g'),('3','1','3','PT16586-0003-00',1466363750,1465236932,'','','','','15-129772-03','1606','3','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','PRO-KIDO Young Children Formula','Young Children Formula','12 CNY/100g'),('4','1','2','PT16586-0004-00',1466363750,1465236932,'','','','','15-129772-04','1606','4','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Beingmate LOVE','LOVE','16 CNY/100g'),('5','1','4','PT16586-0005-00',1466363750,1465236932,'','','','','15-129772-05','1606','5','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Nestle NAN ','NAN ','13 CNY/100g'),('6','1','5','PT16586-0006-00',1466363750,1465236932,'','','','','15-129772-06','1606','6','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','雅培金装喜康力','Abbott Similac','Similac','18 CNY/100g'),('7','1','6','PT16586-0007-00',1466363750,1465236932,'','','','','15-129772-07','1606','7','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Wyeth S-26 Progress Gold','S-26 Progress Gold','12 CNY/100g'),('8','1','7','PT16586-0008-00',1466363750,1465236932,'','','','','15-129772-08','1606','8','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','MeadJohnson Enfagrow','Enfagrow','14 CNY/100g'),('9','1','8','PT16586-0009-00',1466363750,1465236932,'','','','','15-129772-09','1606','9','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Friso Gold','Gold','15 CNY/100g'),('10','1','9','PT16586-0010-00',1466363750,1465236932,'','','','','15-129772-10','1606','10','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Nutrilon Pronutra+','Pronutra+','20 CNY/100g'),('11','1','6','PT16586-0011-00',1466363750,1465236932,'','','','','15-129772-11','1606','11','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','惠氏启赋','Wyeth illuma','illuma','32 CNY/100g'),('12','1','4','PT16586-0012-00',1466363750,1465236932,'','','','','15-129772-12','1606','12','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','雀巢超级能恩','Nestle NAN. H.A.','NAN. H.A.','30 CNY/100g'),('13','1','2','PT16586-0013-00',1467057971,1465236932,'','','','','15-129772-13','1606','13','','','COTEST','2015-09-29T00:00:00.000','2016-02-19T00:00:00.000','2016-06-29T00:00:00.000','','','Beingmate Organic','Organic','14 CNY/100g');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER t_afterdelete_on_products
AFTER DELETE ON products
FOR EACH ROW
BEGIN
delete from results where id_product=old.id_product;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-06-29 13:14:28
