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
-- Table structure for table `databases`
--

DROP TABLE IF EXISTS `databases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `databases` (
  `databasesname` varchar(50) NOT NULL,
  PRIMARY KEY (`databasesname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `databases`
--

LOCK TABLES `databases` WRITE;
/*!40000 ALTER TABLE `databases` DISABLE KEYS */;
INSERT INTO `databases` VALUES ('mobilephones');
/*!40000 ALTER TABLE `databases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dictionary`
--

DROP TABLE IF EXISTS `dictionary`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dictionary` (
  `wordid` int(11) NOT NULL,
  `originword` varchar(200) DEFAULT NULL,
  `De` varchar(200) DEFAULT NULL,
  `Eng` varchar(200) DEFAULT NULL,
  `CHN` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`wordid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dictionary`
--

LOCK TABLES `dictionary` WRITE;
/*!40000 ALTER TABLE `dictionary` DISABLE KEYS */;
INSERT INTO `dictionary` VALUES (1,'total test result','null','null','试验结果'),(2,'total test result','null','null','测试结果'),(3,'Handset capabilities','null','null','功能'),(4,'Handset capabilities','null','null','手机功能'),(5,'Handset Sensitivity','null','null','灵敏性'),(6,'Connections - Processor - versatility','null','null','连接'),(7,'Memory','null','null','存储'),(8,'Sound via integrated speakers','null','null','扬声器'),(9,'Sound via integrated speakers','null','null','音质'),(10,'Handset Ease of Use','null','null','易用性'),(11,'Handset Portability','null','null','便携性'),(12,'Handset Durability','null','null','耐用性'),(13,'Handset Display','null','null','屏幕'),(14,'Ergonomics','null','null','人机协调'),(15,'Calling and SMS','null','null','通话与短信'),(16,'Calling','null','null','通话'),(17,'SMS','null','null','短信'),(18,'Camera','null','null','照相'),(19,'Selected as camera phone','null','null','替代相机'),(20,'Camera','null','null','拍照'),(21,'Camera Quality','null','null','拍照质量'),(22,'Camera Quality','null','null','照相质量'),(23,'Camera Convenience','null','null','易用性'),(24,'Camera Shutter Lag','null','null','快门延迟'),(25,'Video','null','null','摄像'),(26,'Inventory','null','null','库存'),(27,'Synchronization with PC and cloud computing','null','null','与计算机和云计算同步'),(28,'Handset Durability','null','null','手机耐用性'),(29,'Type (from Brandlist)','null','null','式（从brandlist）'),(30,'Handset Sensitivity','null','null','敏感性'),(31,'Connections - Processor - versatility','null','null','连接-处理-多功能'),(32,'Video recording quality','null','null','视频摄录质量'),(33,'Audio recording quality','null','null','音频录制质量'),(34,'Music','null','null','音乐播放'),(35,'Music Versatility','null','null','音乐功能'),(36,'Versatility','null','null','多功能'),(37,'Battery','null','null',' '),(38,'Inventory','null','null','商品清单'),(39,'Model similar to','null','null','相似型号'),(40,'Pros I','null','null','I优点'),(41,'Publication date','null','null','测试发布日期'),(42,'UMTS 2100 MHz','null','null','UMTS 2100 MHz'),(43,'HSDPA','null','null','HSDPA'),(44,'WiFi 802.11 n','null','null','无线802.11 n'),(45,'NFC (Near Field Communication via RFID; payment services)','null','null','NFC（近场通讯）'),(46,'LTE','null','null','LTE (4G)'),(47,'LTE','null','null','LTE（4G）'),(48,'HSDPA','null','null','HSDPA（3.5G）'),(49,'EDGE','null','null','EDGE（2.75G）'),(50,'HSPA +','null','null','HSPA+（准4G）'),(51,'WiFi 802.11 b/g','null','null','无线802.11 b/g'),(52,'WiFi 802.11 b/g','null','null','无线局域网WiFi 802.11 b/g'),(53,'WiFi 802.11 b/g','null','null','无线局域网WiFi 802.11b/g'),(54,'WiFi 802.11 n','null','null','无线局域网WiFi 802.11 n'),(55,'WiFi 5 GHz WiFi 802.11 a','null','null','无线局域网WiFi 802.11 a'),(56,'SAR certification (10g)','null','null','电磁辐射吸收率'),(57,'SAR certification (10g)','null','null','电磁辐射吸收率SAR'),(58,'Expandable via memory card (maximum, manufacturer claims)','null','null','内存扩展最大值（制造商标称）'),(59,'Handset Sensitivity','null','null','手机敏感性'),(60,'Handset Display','null','null','手机显示屏'),(61,'Display width (measurement)','null','null','屏幕宽度（测量）'),(62,'Display height (measurement)','null','null','屏幕高度（测量）'),(63,'Display diagonal','null','null','屏幕对角线'),(64,'Display resolution (ca.)','null','null','屏幕分辨率'),(65,'Face detection','null','null','人脸识别'),(66,'Resolution (main camera)','null','null','主摄像头像素'),(67,'SAR certification (10g)','null','null','电磁辐射吸收率（SAR）'),(68,'Handset Display','null','null','显示屏'),(69,'Music convenience','null','null','音乐播放易用性'),(70,'Deactivate data download, WLAN, GPS, activate flight mode','null','null','关闭数据下载、WLAN、GPS，激活飞行模式'),(71,'Web browser convenience','null','null','浏览器易用性'),(72,'GPS quality Expert','null','null','GPS导航质量'),(73,'Sound Loudness GPS','null','null','GPS导航音量'),(74,'General','null','null','GPS导航通用性'),(75,'First GPS Fix','null','null','GPS开机定位所需时间'),(76,'PC synchronization','null','null','与电脑同步'),(77,'infra red port (for TV remote control)','null','null','红外端口（遥控电视）'),(78,'Battery running time: UMTS mode, data download (GPS: \"off\"\", display on)\"','null','null','电池续航时间（UMTS/3G模式）'),(79,'Battery running time: LTE mode, data download (GPS: \"off\"\", display on)\"','null','null','电池续航时间（LTE/4G模式）'),(80,'Handset Sensitivity','null','null','手机灵敏度'),(81,'Onboard (map is stored on the phone for full navigation with voice guidance)','null','null','自带地图语音导航'),(82,'Offboard (map in cloud, data connection needed)','null','null','数据连接云端地图导航'),(83,'Battery running time: UMTS mode GPS navigation mode, display \"on\"\"\"','null','null','电池导航时间（UMTS/3G模式）'),(84,'Battery running time: LTE mode GPS navigation mode, display \"on\"\"\"','null','null','电池导航时间（LTE/4G模式）'),(85,'AAC','null','null','AAC格式'),(86,'MP3','null','null','MP3格式'),(87,'WMA','null','null','WMA格式'),(88,'FLAC','null','null','FLAC格式'),(89,'Result damages - lab rating','null','null','易损性评价'),(90,'Water resistance in 1m if this is claimed?','null','null','防水性（制造商标称）'),(91,'Battery running time: GSM mode, endless call','null','null','电池持续通话时间（GSM/2G模式）'),(92,'Battery running time: UMTS mode endless call (GPS: \"off\"\")\"','null','null','电池持续通话时间（UMTS/3G模式G）'),(93,'Battery running time: UMTS mode endless call (GPS: \"off\"\")\"','null','null','电池持续通话时间（UMTS/3G模式）'),(94,'Good RF sensitivity','null','null','信号灵敏'),(95,'Good camera picture quality','null','null','照片质量良好'),(96,'Good camera video quality','null','null','摄像质量良好'),(97,'Good video recording sound quality','null','null','视频录音质量良好'),(98,'UMTS 2100 MHz','null','null','UMTS 2100 MHz（3G）'),(99,'Onboard (map is stored on the phone for full navigation with voice guidance)','null','null','机内地图语音导航'),(100,'automatic screen change portrait/landscape mode (test with picture)','null','null','横竖显示自动调整'),(101,'MP3','null','null','MP3'),(102,'AAC','null','null','AAC'),(103,'WMA','null','null','WMA'),(104,'FLAC','null','null','FLAC'),(105,'Calling Battery','null','null','通话电池消耗'),(106,'Battery running time: GSM mode, endless call','null','null','电池持续通话时间（GSM/2G）'),(107,'Battery running time: UMTS mode endless call (GPS: \"off\"\")\"','null','null','电池持续通话时间（UMTS/3G）'),(108,'Battery running time: LTE mode GPS navigation mode, display \"on\"\"\"','null','null','电池导航时间（LTE/4G）'),(109,'Battery running time: UMTS mode GPS navigation mode, display \"on\"\"\"','null','null','电池导航时间（UMTS/3G）'),(110,'Battery running time: UMTS mode, data download (GPS: \"off\"\", display on)\"','null','null','电池续航时间（UMTS/3G）'),(111,'Battery running time: LTE mode, data download (GPS: \"off\"\", display on)\"','null','null','电池续航时间（LTE/4G）'),(112,'Good sound quality of music player (delivered earphones)','null','null','音乐播放音质良好（自带耳机）'),(113,'Good battery performance','null','null','电池性能优良'),(114,'Good camera picture quality','null','null','照片质量优良'),(115,'Good camera video quality','null','null','摄像质量优良'),(116,'Good video recording sound quality','null','null','视频录音质量优良'),(117,'Good sound quality of music player (delivered earphones)','null','null','音乐播放音质优良（自带耳机）'),(118,'Good onboard GPS navigation solution with voice guidance (also with Apps up to 5€)','null','null','好的自带GPS与语音导航（收费上限在5欧元）'),(119,'Good offboard GPS navigation solution','null','null','云端地图导航优良'),(120,'Good basic phone operation','null','null','基本操作便捷易用'),(121,'Good basic phone operation','null','null','基本操作简便易用'),(122,'Good camera and video convenience','null','null','拍照和摄像简便易用'),(123,'Good e-mail/internet/synchronization convenience (google)','null','null','电邮/上网/同步功能简便易用'),(124,'Good menu and phone configuration convenience','null','null','菜单和手机设置简便易用'),(125,'Good keyboard or touch screen convenience','null','null','键盘、触屏操作体验佳'),(126,'Good keyboard or touch screen convenience','null','null','键盘、触屏简便易用'),(127,'Good onboard GPS navigation solution with voice guidance (also with Apps up to 5€)','null','null','机内地图语音导航优良'),(128,'Quite good camera picture quality under bad light conditions','null','null','光照较差时成像质量仍然相当好'),(129,'Poor camera picture quality','null','null','照片质量差'),(130,'Poor camera video quality','null','null','摄像质量差'),(131,'Poor video recording sound quality','null','null','摄像录音质量差'),(132,'Good video recording sound quality','null','null','摄像录音质量优良'),(133,'Poor sound quality of music player (delivered earphones)','null','null','音乐播放音质差（自带耳机）'),(134,'Max. sound pressure level of delivered headphone + device >100 dB(A)','null','null','自带耳机最大声压高于100dB'),(135,'Poor e-mail/internet/synchronization convenience (google)','null','null','电邮/上网/同步不方便'),(136,'Poor camera and video convenience','null','null','拍照与摄像不方便'),(137,'Poor menu and phone configuration convenience','null','null','菜单与手机设置调用不方便'),(138,'Poor keyboard or touch screen convenience','null','null','键盘、触屏使用体验差'),(139,'No camera','null','null','无摄像头'),(140,'No music player','null','null','无音乐播放器'),(141,'Seriously damaged in rain test','null','null','淋雨试验中严重损坏'),(142,'No earphones delivered','null','null','不附送耳机'),(143,'Seriously damaged in tumbling test','null','null','翻滚试验中严重受损'),(144,'Seriously damaged in rain test','null','null','淋雨试验中严重受损'),(145,'Supplied memory card','null','null','附送存储卡'),(146,'Supplied pen for touchpad','null','null','附送触摸笔'),(147,'SAR certification (10g)','null','null','全身平均的电磁辐射比吸收率（SAR）'),(148,'automatic screen change portrait/landscape mode (test with picture)','null','null','横竖版显示自动调整'),(149,'Maps software (no temporary versions)','null','null','机内地图软件'),(150,'Poor camera and video convenience','null','null','拍照与摄像不简便'),(151,'Poor e-mail/internet/synchronization convenience (google)','null','null','电邮/上网/同步不简便'),(152,'Poor menu and phone configuration convenience','null','null','菜单与手机设置调用不简便'),(153,'LG','null','null','LG'),(154,'Samsung','null','null','三星（Samsung）'),(155,'HTC','null','null','HTC'),(156,'Nokia','null','null','诺基亚（Nokia）'),(157,'Sony Ericsson','null','null','索尼爱立信'),(158,'Motorola','null','null','摩托罗拉（Motorola）'),(159,'BlackBerry','null','null','黑莓（BlackBerry）'),(160,'Acer','null','null','宏碁（Acer）'),(161,'Garmin Asus','null','null','Garmin华硕'),(162,'TMN','null','null','TMN'),(163,'Apple','null','null','苹果（Apple）'),(164,'TMN / Huawei','null','null','TMN/华为'),(165,'ZTC','null','null','中天通讯（ZTC）'),(166,'Alcatel','null','null','阿尔卡特（Alcatel）'),(167,'Optimus','null','null','Optimus'),(168,'ZTE/TMN','null','null','中兴/TMN'),(169,'T-Mobile','null','null','T-Mobile'),(170,'Emgeton','null','null','Emgeton'),(171,'Alcatel/Mandarina Duck','null','null','阿尔卡特/意大利鸳鸯（Mandarina Duck）'),(172,'ZTE / TMN','null','null','中兴/TMN'),(173,'ZTE/T-Mobile','null','null','中兴/T-Mobile'),(174,'Vodafone','null','null','沃达丰（Vodafone）'),(175,'ZTE','null','null','中兴'),(176,'Palm','null','null','奔迈（Palm）'),(177,'Google','null','null','谷歌（Google）'),(178,'Huawei/tmn','null','null','华为/TMN'),(179,'Alcatel/Vodafone','null','null','阿尔卡特/沃达丰'),(180,'Huawei','null','null','华为'),(181,'Medion','null','null','梅迪昂（Medion）'),(182,'NGM Mobile','null','null','NGM移动'),(183,'Sony','null','null','索尼（Sony）'),(184,'Optimus (Alcatel)','null','null','擎天柱（阿尔卡特）'),(185,'Panasonic','null','null','松下（Panasonic）'),(186,'AEG','null','null','AEG'),(187,'Orange','null','null','橘子（Orange）'),(188,'Manufacturer 1','null','null','制造商1'),(189,'WIKO','null','null','永光（WIKO)'),(190,'Archos','null','null','爱可视（Archos）'),(191,'Pioneer','null','null','先锋'),(192,'BQ','null','null','BQ'),(193,'FNAC','null','null','FNAC'),(194,'NGM','null','null','NGM'),(195,'Quechua','null','null','趣岳（Quechua）'),(196,'Fairphone','null','null','Fairphone'),(197,'Yota','null','null','Yota'),(198,'Star','null','null','吉士达(Star)'),(199,'THL','null','null','THL'),(200,'NO.1','null','null','NO.1'),(201,'Haier','null','null','海尔(Haier）'),(202,'Mobistel','null','null','Mobistel'),(203,'Woxter','null','null','Woxter'),(204,'SOSH','null','null','索希(SOSH)'),(205,'Xiaomi','null','null','小米(Xiaomi)'),(206,'OnePlus One','null','null','一加(OnePlus）'),(207,'OnePlus','null','null','一加（OnePlus）'),(208,'Science4you','null','null','Science4you'),(209,'MEO','null','null','MEO'),(210,'Amazon','null','null','亚马逊（Amazon）'),(211,'SGP Technologies','null','null','SGP Technologies'),(212,'Yota Devices','null','null','Yota Devices'),(213,'Kazam','null','null','Kazam'),(214,'NOS','null','null','NOS'),(215,'Microsoft','null','null','微软（Microsoft）'),(216,'Asus','null','null','华硕(Asus)'),(217,'Energy Sistem','null','null','Energy Sistem'),(218,'Positivo','null','null','Positivo'),(219,'Stonex','null','null','思拓力（Stonex）'),(220,'Meizu','null','null','魅族（Meizu）'),(221,'One Plus','null','null','一加（OnePlus）'),(222,'Quantum','null','null','昆腾（Quantum'),(223,'Wileyfox','null','null','威力狐（Wileyfox）'),(224,'IKI','null','null','IKI'),(225,'Quantum','null','null','昆腾（Quantum）');
/*!40000 ALTER TABLE `dictionary` ENABLE KEYS */;
UNLOCK TABLES;

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
  `regtime` int(10) NOT NULL COMMENT '注册时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (13,'uuu','e10adc3949ba59abbe56e057f20f883e','958919277@qq.com',1462263620);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'admin'
--

--
-- Dumping routines for database 'admin'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-05-03 16:28:24
