-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Kasse
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
-- Table structure for table `buchung`
--

DROP TABLE IF EXISTS `buchung`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buchung` (
  `buchungsnummer` int(11) NOT NULL AUTO_INCREMENT,
  `zwecknummer` int(11) NOT NULL,
  `datum` date NOT NULL,
  `betrag` float NOT NULL,
  `user_von` int(11) NOT NULL,
  `user_zu` int(11) NOT NULL,
  `log` int(11) DEFAULT NULL,
  `anmerkung` varchar(255) DEFAULT NULL,
  `zum_loeschen_vorgemerkt` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`buchungsnummer`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buchung`
--

LOCK TABLES `buchung` WRITE;
/*!40000 ALTER TABLE `buchung` DISABLE KEYS */;
INSERT INTO `buchung` VALUES (1,1,'2017-06-26',12.22,1,2,1,'Geschenk für Peter',NULL),(2,2,'2017-06-26',123.12,2,1,1,NULL,NULL),(3,1,'2017-06-28',56.54,1,2,1,'Geschenk für Peter',NULL),(4,2,'2017-06-28',526.54,1,2,1,'Geschenk für Peter',NULL),(5,1,'2017-06-29',56.54,2,1,1,NULL,1),(6,1,'2017-07-01',356.54,1,2,1,'Geschenk für Peter',NULL);
/*!40000 ALTER TABLE `buchung` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `geloescht`
--

DROP TABLE IF EXISTS `geloescht`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `geloescht` (
  `buchungsnummer` int(11) NOT NULL AUTO_INCREMENT,
  `zwecknummer` int(11) NOT NULL,
  `datum` date NOT NULL,
  `betrag` float NOT NULL,
  `user_von` int(11) NOT NULL,
  `user_zu` int(11) NOT NULL,
  `log` int(11) DEFAULT NULL,
  `anmerkung` varchar(255) DEFAULT NULL,
  `zum_loeschen_vorgemerkt` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`buchungsnummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geloescht`
--

LOCK TABLES `geloescht` WRITE;
/*!40000 ALTER TABLE `geloescht` DISABLE KEYS */;
/*!40000 ALTER TABLE `geloescht` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `vorname` varchar(255) NOT NULL,
  `nachname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kontostand` float NOT NULL,
  `zinsen` tinyint(1) NOT NULL,
  `erstellt_am` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `zuletzt_geaendert` timestamp NULL DEFAULT NULL,
  `passwort` varchar(255) NOT NULL,
  `verein` int(10) NOT NULL,
  `gruppe` int(10) NOT NULL,
  `hausbewohner` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Sven','Haberzettl','mail@sven-haberzettl.de',123.22,1,'2017-06-26 07:36:24',NULL,'passwort',1,1,0),(2,'Jan','Nemeth','jan.nemeth@web.de',0,0,'2017-06-26 08:09:57',NULL,'passwort',5,5,0),(3,'Peter','Wurst','p_123wurst@web.de',-23.32,0,'2017-06-28 10:16:44',NULL,'passwort',1,3,0),(4,'Erest','Nutzer','test.nutzer@web.de',13,0,'2017-07-06 17:25:58',NULL,'passwort',2,3,0),(5,'Bob','Müller','nutzerfurz@web.de',123,0,'2017-07-06 17:25:58',NULL,'passwort',2,2,0),(6,'Emilia','Schmidt','derbeste@web.de',93,0,'2017-07-06 17:25:58',NULL,'passwort',5,5,0),(7,'Elena','Tester','einmalindeinemleben@web.de',333,0,'2017-07-06 17:25:58',NULL,'passwort',3,4,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usergroup`
--

DROP TABLE IF EXISTS `usergroup`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usergroup` (
  `gid` int(11) NOT NULL,
  `gname` varchar(255) NOT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usergroup`
--

LOCK TABLES `usergroup` WRITE;
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` VALUES (1,'GODMODE'),(2,'Kassenwart'),(3,'Aktives Mitglied'),(4,'Passives Mitglied'),(99,'Gast');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verein`
--

DROP TABLE IF EXISTS `verein`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verein` (
  `VNummer` int(11) NOT NULL,
  `VName` varchar(255) NOT NULL,
  PRIMARY KEY (`VNummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verein`
--

LOCK TABLES `verein` WRITE;
/*!40000 ALTER TABLE `verein` DISABLE KEYS */;
INSERT INTO `verein` VALUES (0,'SV Friedberg 1899 eV'),(1,'TV Fauerbach 1925'),(2,'TSV Hammersbach');
/*!40000 ALTER TABLE `verein` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `verwendungszweck`
--

DROP TABLE IF EXISTS `verwendungszweck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `verwendungszweck` (
  `zwecknummer` int(11) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL,
  PRIMARY KEY (`zwecknummer`)
) ENGINE=InnoDB DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `verwendungszweck`
--

LOCK TABLES `verwendungszweck` WRITE;
/*!40000 ALTER TABLE `verwendungszweck` DISABLE KEYS */;
INSERT INTO `verwendungszweck` VALUES (0,'Beireitung'),(1,'Querbuchung'),(2,'Getränkeabrechnung'),(3,'Zinsbuchung'),(5,'test'),(6,'test'),(7,'test'),(8,'test'),(9,'test'),(10,'test'),(11,'test'),(12,'test'),(13,'test'),(14,'test'),(15,'test'),(16,'test'),(17,'test'),(18,'test'),(19,'test'),(20,'test'),(21,'test'),(22,'test'),(23,'test'),(24,'test'),(25,'test'),(26,'test'),(27,'test'),(28,'test'),(29,'test'),(30,'test'),(31,'test'),(32,'test'),(33,'test'),(34,'test'),(35,'test'),(36,'test'),(37,'test'),(38,'test'),(39,'test'),(40,'test'),(41,'test'),(42,'test'),(43,'test'),(44,'test'),(45,'test'),(46,'test'),(47,'test'),(48,'test'),(49,'test'),(50,'test'),(51,'test'),(52,'test'),(53,'test'),(54,'test'),(55,'test');
/*!40000 ALTER TABLE `verwendungszweck` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-07 18:37:38
