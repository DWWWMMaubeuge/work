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

DROP DATABASE IF EXISTS `DWWM_Maubeuge`;

CREATE DATABASE DWWM_Maubeuge CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
use DWWM_Maubeuge;


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
INSERT INTO `formations` VALUES (1,'DWWM'),(2,'CUISINE'),(3,'SOUDURE'),(4,'PEINTRE'),(5,'Moniteur AE');
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
INSERT INTO `skills` VALUES (1,'2020-11-17 15:31:29','HTML',1),(2,'2020-11-17 15:31:29','CSS',1),(3,'2020-11-17 15:31:29','AJAX',1),(4,'2020-11-17 15:31:29','JavaScript',1),(5,'2020-11-17 15:31:29','patisserie',2),(6,'2020-11-17 15:31:29','sauce',2),(7,'2020-11-17 15:31:29','légumes',2),(8,'2020-11-17 15:31:29','les métaux',3),(9,'2020-11-17 15:31:29','les plastiques',3),(10,'2020-11-17 15:31:29','les alliage',3),(11,'2020-11-17 15:31:29','soudure électrique',3),(12,'2020-11-23 13:00:01','SCSS',1),(13,'2020-11-23 13:03:36','pinceau',4),(14,'2020-11-23 13:03:36','tapisserie',4),(15,'2020-11-23 13:03:36','les vitesses',5),(16,'2020-11-23 13:03:36','les piétons',5),(17,'2020-11-23 13:03:36','le rétroviseur',5),(18,'2020-11-23 13:03:36','administration',5);
/*!40000 ALTER TABLE `skills` ENABLE KEYS */;
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
INSERT INTO `user_session` VALUES (1,'2020-11-20 13:06:51',27,2),(2,'2020-11-20 13:06:51',28,2),(3,'2020-11-20 13:06:51',29,2),(4,'2020-11-20 13:06:51',30,2),(5,'2020-11-20 13:06:51',31,2),(6,'2020-11-20 13:08:07',25,14),(7,'2020-11-20 13:08:07',26,14),(8,'2020-11-20 13:08:07',27,14),(9,'2020-11-20 13:08:07',28,14),(10,'2020-11-20 13:08:07',29,14);
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
INSERT INTO `users` VALUES (1,'2020-11-17 15:31:29','trouvetout','geo','123','geo@gmail.com',1,1,'FOR'),(2,'2020-11-17 15:31:29','picsou','oncle','admim','oncle@gmail.com',0,0,'ADM'),(3,'2020-11-17 15:31:29','ligonnes','xavier','123','xligo@gmail.com',1,1,'STA'),(4,'2020-11-17 15:31:29','Castix','ferdinand','123','fcast@gmail.com',3,3,'STA'),(5,'2020-11-17 15:31:29','Lecuisinier','Max','123','cuisine@gmail.com',2,2,'STA'),(6,'2020-11-17 15:31:29','Lecomte','JP','123','compta@gmail.com',0,0,'ADM'),(7,'2020-11-17 15:31:29','bourgey','Xav','123','xav@gmail.com',1,1,'FOR'),(8,'2020-11-17 15:31:29','durand','Sam','123','sam@gmail.com',2,1,'FOR'),(9,'2020-11-17 15:31:29','admin','admin','admin','admin',0,0,'ADM'),(25,'2020-11-19 15:51:07','Robert','Thomas','123','thomas_3004@hotmail.fr',0,14,'STA'),(26,'2020-11-19 15:52:21','Fatima','NC','123','fatformationafpa@gmail.com',0,14,'STA'),(27,'2020-11-19 15:52:21','Fouad','NC','123','ahanchir@live.fr',0,14,'STA'),(28,'2020-11-19 15:52:21','Flavia','NC','123','fortunatoflavia@outlook.com',0,14,'STA'),(29,'2020-11-19 15:52:21','Steven','NC','123','stevenhonor@live.fr',0,14,'STA'),(30,'2020-11-19 15:52:21','Alex','NC','123','alex.kolakowski@outlook.fr',0,14,'STA'),(31,'2020-11-19 15:52:21','Axel','NC','123','axel.mathez@gmail.com',0,2,'STA'),(32,'2020-11-19 15:52:21','Valentin','NC','123','valentin.crapez1995@gmail.com',0,2,'STA'),(33,'2020-11-19 15:52:21','Steven','NC','123','jeffrey_stl@hotmail.fr',0,2,'STA'),(34,'2020-11-19 15:52:21','Pierre','NC','123','delattre.pierre@outlook.fr',0,2,'STA'),(35,'2020-11-19 15:54:49','Maxime','NC','123','maximewilmot@gmail.com',0,2,'STA'),(36,'2020-11-19 15:57:18','Nicolas','NC','123','nicolascaulier@gmail.com',NULL,2,'STA');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

-- Dump completed on 2020-11-23 17:10:24

