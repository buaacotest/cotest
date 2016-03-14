-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: localhost    Database: admin
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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL COMMENT '邮箱',
  `token` varchar(50) NOT NULL COMMENT '帐号激活码',
  `token_exptime` int(10) NOT NULL COMMENT '激活码有效期',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态,0-未激活,1-已激活',
  `regtime` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'asdhl','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','a3553c16ba89ca32b7261e06f866489e',1453793042,0,1453706642),(15,'12345','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','2c5e44dcb20f73b7f94014e5be3c7e4e',1453793094,0,1453706694),(16,'曲儿控件','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','0ca16e4f2a09a423b9592f94aaf708d0',1453793774,0,1453707374),(17,'曲儿控件','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','9007c9d65f7c5e9bc582ca1241bac60d',1453793818,0,1453707418),(18,'曲儿控件','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','41b65992e4d504ff7605bcb499480a6c',1453793893,0,1453707493),(19,'asdflkh','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','9259c3f5470881f43c62e3c40585ae46',1453794617,0,1453708217),(20,'asdflkh','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','070a54cd1e4e0cce77143ab7d15416c2',1453794634,0,1453708234),(21,'asfhj','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','f1740287ed3eeb53c167ab7a132117de',1453795311,0,1453708911),(22,'sdlghdkhf','f8b35b470f97b0079de20ea4b327a898','zj_buaa@buaa.edu.cn','52d78ffad163f990527a213539334193',1453796758,0,1453710358),(23,'awstg','adca4977cb42016071530fb8888105c7','zj_buaa@buaa.edu.cn','81f28dd75c85797edfc387c82f0a358b',1453796820,0,1453710420),(24,'dfsghfh','a93c74672c01ea0c7e416654fe85f793','zj_buaa@buaa.edu.cn','d11a57114e36c94b9f004a2bfd9fa172',1453797003,0,1453710603),(25,'fgfhf','c0aa398c99d7e9ff4ad778b0dba81d79','zj_buaa@buaa.edu.cn','293363887224ad2f9329ee290869cb4e',1453797134,0,1453710734),(26,'fgfhf','0aac4e6a54c170b06e2bd3848d2b735e','zj_buaa@buaa.edu.cn','693a2c1ea46a4f48415e32b3d5da793f',1453797665,0,1453711265),(27,'sdagg','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','89230e11ef3f150daba6ef5db744e268',1453798352,0,1453711952),(28,'atf','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','2ee270185fcb2146266a65c3f7ce1c8d',1453798579,0,1453712179),(29,'dsghj但是','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','8abc736ad3703b3ed3901bcde008ab6c',1453798811,1,1453712411),(30,'方式电话','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','3fcfc2a2fce1e7354d3a4f9d530f2258',1453799223,1,1453712823),(41,'山东话','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','121987c51ebecdf0bfab37ce5430a61a',1457008444,1,1456922044),(42,'说丢规划','897083106ef5bb807ef51aa0cf4b3188','958919277@qq.com','0afdfddeda8e0e7bf76fa7fa7fb298c1',1457009868,1,1456923468),(43,'dhfg','a152e841783914146e4bcd4f39100686','958919277@qq.com','6ca63398216b3bb053f7680b0912125b',1457076548,0,1456990148);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-03 19:48:34
