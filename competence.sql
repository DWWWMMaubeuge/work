-- MySQL dump 10.13  Distrib 8.0.22, for Linux (x86_64)
--
-- Host: localhost    Database: DWWM_Maubeuge
-- ------------------------------------------------------
-- Server version	8.0.22-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Membres`
--

DROP TABLE IF EXISTS `Membres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Membres` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Prenom` varchar(255) NOT NULL,
  `Email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `MDP` varchar(255) NOT NULL,
  `Admin` bit(1) NOT NULL,
  `Fixe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Github` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Date_of_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Membres`
--

LOCK TABLES `Membres` WRITE;
/*!40000 ALTER TABLE `Membres` DISABLE KEYS */;
INSERT INTO `Membres` VALUES (7,'The-Evil-Fox','Durieux','Steven','stevenhonor@live.fr','mdpalacon',_binary '\0','','','The-Evil-Fox','http://adriaticstuff.000webhostapp.com/index.php','2020-10-30 11:43:30');
/*!40000 ALTER TABLE `Membres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Resultats`
--

DROP TABLE IF EXISTS `Resultats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Resultats` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TIME_OF_INSERTION` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ID_USER` int NOT NULL,
  `ID_MATIERE` int NOT NULL,
  `RESULTAT` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Resultats`
--

LOCK TABLES `Resultats` WRITE;
/*!40000 ALTER TABLE `Resultats` DISABLE KEYS */;
/*!40000 ALTER TABLE `Resultats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formations`
--

DROP TABLE IF EXISTS `formations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `formations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formations`
--

LOCK TABLES `formations` WRITE;
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
INSERT INTO `formations` VALUES (1,'DWWM'),(2,'CUISINE'),(3,'SOUDURE'),(4,'carrelage'),(5,'maitre Nageur');
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mail2inscript`
--

DROP TABLE IF EXISTS `mail2inscript`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mail2inscript` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `mail` varchar(255) DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  `id_session` int DEFAULT NULL,
  `role` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mail2inscript`
--

LOCK TABLES `mail2inscript` WRITE;
/*!40000 ALTER TABLE `mail2inscript` DISABLE KEYS */;
INSERT INTO `mail2inscript` VALUES (43,'2020-11-19 15:52:21','fatformationafpa@gmail.com',NULL,NULL,'STA'),(44,'2020-11-19 15:52:21','ahanchir@live.fr',NULL,NULL,'STA'),(45,'2020-11-19 15:52:21','fortunatoflavia@outlook.com',NULL,NULL,'STA'),(46,'2020-11-19 15:52:21','stevenhonor@live.fr',NULL,NULL,'STA'),(47,'2020-11-19 15:52:21','alex.kolakowski@outlook.fr',NULL,NULL,'STA'),(48,'2020-11-19 15:52:21','axel.mathez@gmail.com',NULL,NULL,'STA'),(49,'2020-11-19 15:52:21','valentin.crapez1995@gmail.com',NULL,NULL,'STA'),(50,'2020-11-19 15:52:21','jeffrey_stl@hotmail.fr',NULL,NULL,'STA'),(51,'2020-11-19 15:52:21','delattre.pierre@outlook.fr',NULL,NULL,'STA'),(52,'2020-11-19 15:57:18','nicolascaulier@gmail.com',NULL,2,NULL),(53,'2020-11-19 15:57:18','xavier.bourget@gmail.com',NULL,2,NULL),(54,'2020-11-19 16:23:29','jenPier_3004@hotmail.fr',NULL,2,'FOR'),(55,'2020-11-19 17:01:37','qbcdjkqc@aef.com',NULL,2,'FOR'),(56,'2020-11-19 17:05:55','aaza@f.fr',2,NULL,'FOR'),(57,'2020-11-19 17:08:17','valentin.crapez1995@gmail.com ',NULL,2,'FOR'),(58,'2020-11-19 17:13:50','dejfjfd@gfgf.com',NULL,15,'FOR'),(59,'2020-11-20 14:33:43','totoxxx@tata.kz',3,NULL,'FOR'),(60,'2020-11-23 14:52:18','afae@hzezb.bv',NULL,NULL,'STA'),(61,'2020-11-23 14:53:16','hdhdhdhd@hejdkd.fir',NULL,NULL,'STA'),(62,'2020-11-23 15:13:20','jnsdvjnsdv@fdf.fef',NULL,NULL,'STA');
/*!40000 ALTER TABLE `mail2inscript` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `results` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int DEFAULT NULL,
  `id_skill` int DEFAULT NULL,
  `result` int DEFAULT NULL,
  `id_session` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
INSERT INTO `results` VALUES (1,'2020-11-17 15:31:29',2,1,15,1),(2,'2020-11-17 15:31:29',2,2,38,1),(3,'2020-11-17 15:31:29',2,3,55,1),(4,'2020-11-17 15:31:29',3,1,73,1),(5,'2020-11-17 15:31:29',3,2,66,1),(6,'2020-11-17 15:31:29',4,2,22,1),(7,'2020-11-17 15:51:48',4,4,5,NULL),(8,'2020-11-17 15:52:08',4,4,5,NULL),(9,'2020-11-17 15:52:28',4,4,5,NULL),(10,'2020-11-17 15:57:51',4,9,5,NULL),(11,'2020-11-17 15:57:55',4,10,4,NULL),(12,'2020-11-17 15:58:03',4,10,7,NULL),(13,'2020-11-17 15:58:06',4,11,6,NULL),(14,'2020-11-17 16:09:04',4,8,5,NULL),(15,'2020-11-17 16:09:09',4,9,6,NULL),(16,'2020-11-17 16:09:12',4,10,6,NULL),(17,'2020-11-17 16:11:39',4,8,4,3),(18,'2020-11-17 16:11:42',4,9,5,3),(19,'2020-11-17 16:11:47',4,10,6,3),(20,'2020-11-17 16:16:22',4,9,4,3),(21,'2020-11-17 16:16:31',4,10,5,3),(22,'2020-11-18 14:12:24',3,1,4,NULL),(23,'2020-11-18 14:13:00',0,1,5,NULL),(24,'2020-11-18 14:13:02',0,2,6,NULL),(25,'2020-11-18 14:13:05',0,4,5,NULL),(26,'2020-11-18 14:13:06',0,3,1,NULL);
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `date_begin` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES (1,'2020-11-17 15:31:29','2020-08-17','2021-03-31','DWWM Maubeuge',1),(2,'2020-11-17 15:31:29','2020-10-22','2021-06-12','Soudure Maubeuge',3),(3,'2020-11-17 15:31:29','2021-01-21','2021-10-30','Cuisine Maubeuge',2),(14,'2020-11-19 13:23:33','2020-11-20','2020-11-25','miam miam miam',2),(15,'2020-11-19 17:07:07','2020-11-20','2020-11-28','mayonnaise légère',2),(16,'2020-11-20 12:34:45','2020-11-23','2020-11-29','Restauration Collective',2);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skills`
--

DROP TABLE IF EXISTS `skills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skills` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skills`
--

LOCK TABLES `skills` WRITE;
/*!40000 ALTER TABLE `skills` DISABLE KEYS */;
INSERT INTO `skills` VALUES (1,'2020-11-17 15:31:29','HTML',1),(2,'2020-11-17 15:31:29','CSS',1),(3,'2020-11-17 15:31:29','AJAX',1),(4,'2020-11-17 15:31:29','JavaScript',1),(5,'2020-11-17 15:31:29','patisserie',2),(6,'2020-11-17 15:31:29','sauce',2),(7,'2020-11-17 15:31:29','légumes',2),(8,'2020-11-17 15:31:29','les métaux',3),(9,'2020-11-17 15:31:29','les plastiques',3),(10,'2020-11-17 15:31:29','les alliage',3),(11,'2020-11-17 15:31:29','soudure électrique',3),(12,'2020-11-23 13:00:01','SCSS',NULL),(13,'2020-11-23 13:03:36','toto',NULL);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testAjax`
--

DROP TABLE IF EXISTS `testAjax`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testAjax` (
  `data` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testAjax`
--

LOCK TABLES `testAjax` WRITE;
/*!40000 ALTER TABLE `testAjax` DISABLE KEYS */;
INSERT INTO `testAjax` VALUES ('unedata'),('unedata'),('il fait beau'),('nous sommes mercredi'),('toto est grand');
/*!40000 ALTER TABLE `testAjax` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tstEncodage`
--

DROP TABLE IF EXISTS `tstEncodage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tstEncodage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tstEncodage`
--

LOCK TABLES `tstEncodage` WRITE;
/*!40000 ALTER TABLE `tstEncodage` DISABLE KEYS */;
INSERT INTO `tstEncodage` VALUES (1,'2020-11-16 16:59:00','électisé',1),(2,'2020-11-16 16:59:00','ça étè',1),(3,'2020-11-16 16:59:00','& où',1),(4,'2020-11-16 16:59:01','goût',1),(5,'2020-11-17 15:31:29','électisé',1),(6,'2020-11-17 15:31:29','ça étè',1),(7,'2020-11-17 15:31:29','& où',1),(8,'2020-11-17 15:31:29','goût',1);
/*!40000 ALTER TABLE `tstEncodage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_session`
--

DROP TABLE IF EXISTS `user_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_session` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int DEFAULT NULL,
  `id_session` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_session`
--

LOCK TABLES `user_session` WRITE;
/*!40000 ALTER TABLE `user_session` DISABLE KEYS */;
INSERT INTO `user_session` VALUES (1,'2020-11-20 13:06:51',27,2),(2,'2020-11-20 13:06:51',28,2),(3,'2020-11-20 13:06:51',29,2),(4,'2020-11-20 13:06:51',30,2),(5,'2020-11-20 13:06:51',31,2),(6,'2020-11-20 13:08:07',25,14),(7,'2020-11-20 13:08:07',26,14),(8,'2020-11-20 13:08:07',27,14),(9,'2020-11-20 13:08:07',28,14),(10,'2020-11-20 13:08:07',29,14),(11,'2020-11-20 13:08:07',30,14),(12,'2020-11-20 13:08:07',31,14),(13,'2020-11-20 13:08:07',32,14),(14,'2020-11-20 13:08:07',33,14),(15,'2020-11-23 12:42:24',31,14),(16,'2020-11-23 12:42:24',32,14),(17,'2020-11-23 12:42:24',33,14),(18,'2020-11-23 12:42:24',34,14),(19,'2020-11-23 12:42:24',35,14),(20,'2020-11-23 12:42:24',36,14),(21,'2020-11-23 12:42:24',37,14),(22,'2020-11-23 12:43:00',31,0),(23,'2020-11-23 12:43:00',32,0),(24,'2020-11-23 12:43:00',33,0),(25,'2020-11-23 12:43:00',34,0),(26,'2020-11-23 12:43:00',35,0),(27,'2020-11-23 12:43:00',36,0),(28,'2020-11-23 12:43:00',37,0),(29,'2020-11-23 12:43:13',31,2),(30,'2020-11-23 12:43:13',32,2),(31,'2020-11-23 12:43:13',33,2),(32,'2020-11-23 12:43:13',34,2),(33,'2020-11-23 12:43:13',35,2),(34,'2020-11-23 12:43:13',36,2),(35,'2020-11-23 12:43:13',37,2),(36,'2020-11-23 15:13:06',48,2),(37,'2020-11-23 15:13:20',49,2);
/*!40000 ALTER TABLE `user_session` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `datex` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `id_formation` int DEFAULT NULL,
  `id_session` int DEFAULT NULL,
  `role` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'2020-11-17 15:31:29','trouvetout','geo','123','geo@gmail.com',1,1,'FOR'),(2,'2020-11-17 15:31:29','picsou','oncle','admim','oncle@gmail.com',0,0,'ADM'),(3,'2020-11-17 15:31:29','ligonnes','xavier','123','xligo@gmail.com',1,1,'STA'),(4,'2020-11-17 15:31:29','Castix','ferdinand','123','fcast@gmail.com',3,3,'STA'),(5,'2020-11-17 15:31:29','Lecuisinier','Max','123','cuisine@gmail.com',2,2,'STA'),(6,'2020-11-17 15:31:29','Lecomte','JP','123','compta@gmail.com',0,0,'ADM'),(7,'2020-11-17 15:31:29','bourgey','Xav','123','xav@gmail.com',1,1,'FOR'),(8,'2020-11-17 15:31:29','durand','Sam','123','sam@gmail.com',2,1,'FOR'),(9,'2020-11-17 15:31:29','admin','admin','admin','admin',0,0,'ADM'),(25,'2020-11-19 15:51:07','NC','NC','NC','thomas_3004@hotmail.fr',0,14,'STA'),(26,'2020-11-19 15:52:21','NC','NC','NC','fatformationafpa@gmail.com',0,14,'STA'),(27,'2020-11-19 15:52:21','NC','NC','NC','ahanchir@live.fr',0,14,'STA'),(28,'2020-11-19 15:52:21','NC','NC','NC','fortunatoflavia@outlook.com',0,14,'STA'),(29,'2020-11-19 15:52:21','NC','NC','NC','stevenhonor@live.fr',0,14,'STA'),(30,'2020-11-19 15:52:21','NC','NC','NC','alex.kolakowski@outlook.fr',0,14,'STA'),(31,'2020-11-19 15:52:21','NC','NC','NC','axel.mathez@gmail.com',0,2,'STA'),(32,'2020-11-19 15:52:21','NC','NC','NC','valentin.crapez1995@gmail.com',0,2,'STA'),(33,'2020-11-19 15:52:21','NC','NC','NC','jeffrey_stl@hotmail.fr',0,2,'STA'),(34,'2020-11-19 15:52:21','NC','NC','NC','delattre.pierre@outlook.fr',0,2,'STA'),(35,'2020-11-19 15:54:49','NC','NC','NC','maximewilmot@gmail.com',0,2,'STA'),(36,'2020-11-19 15:57:18','NC','NC','NC','nicolascaulier@gmail.com',NULL,2,'STA'),(37,'2020-11-19 15:57:18','NC','NC','NC','xavier.bourget@gmail.com',NULL,2,'STA'),(38,'2020-11-19 16:18:08','NC','NC','NC','ahanchir@livee.fr',NULL,2,'FOR'),(39,'2020-11-19 16:22:21','NC','NC','NC','jen_3004@hotmail.fr',NULL,2,'FOR'),(40,'2020-11-19 16:23:29','NC','NC','NC','jenPier_3004@hotmail.fr',NULL,14,'FOR'),(41,'2020-11-19 17:01:37','NC','NC','NC','qbcdjkqc@aef.com',NULL,2,'FOR'),(42,'2020-11-19 17:05:55','NC','NC','NC','aaza@f.fr',2,NULL,'FOR'),(43,'2020-11-19 17:08:17','NC','NC','NC','valentin.crapez1995@gmail.com ',NULL,2,'FOR'),(44,'2020-11-19 17:13:50','NC','NC','NC','dejfjfd@gfgf.com',NULL,1,'FOR'),(45,'2020-11-20 14:33:43','NC','NC','NC','totoxxx@tata.kz',3,NULL,'FOR'),(46,'2020-11-23 14:52:18','NC','NC','NC','afae@hzezb.bv',0,0,'STA'),(47,'2020-11-23 14:53:16','NC','NC','NC','hdhdhdhd@hejdkd.fir',0,0,'STA'),(48,'2020-11-23 14:54:03','NC','NC','NC','gfheu@utut.noq',NULL,2,'STA'),(49,'2020-11-23 15:13:20','NC','NC','NC','jnsdvjnsdv@fdf.fef',0,2,'STA');
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

-- Dump completed on 2020-11-23 17:09:39
