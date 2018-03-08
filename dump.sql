-- MySQL dump 10.16  Distrib 10.1.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: Kasse
-- ------------------------------------------------------
-- Server version	10.1.28-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buchung`
--

LOCK TABLES `buchung` WRITE;
/*!40000 ALTER TABLE `buchung` DISABLE KEYS */;
INSERT INTO `buchung` VALUES (1,1,'2017-06-26',12.22,1,2,1,'Geschenk für Peter',0),(2,2,'2017-06-26',123.12,2,1,1,NULL,0),(3,1,'2017-06-28',56.54,1,2,1,'Geschenk für Peter',0),(4,2,'2017-06-28',526.54,1,2,1,'Geschenk für Peter',0),(5,1,'2017-06-29',56.54,2,1,1,NULL,0),(6,1,'2017-07-01',356.54,1,2,1,'Geschenk für Peter',0),(7,1,'0000-00-00',132.99,3,1,1,'asdf',0),(8,1,'2017-09-18',1231.11,5,1,1,'Gelt',0),(9,1,'2017-09-18',79.33,3,1,1,'asdf2 :-)',0),(10,1,'2017-09-18',123.55,3,1,1,'qwe',0),(12,1,'2017-09-18',93,6,1,1,'räumen',0),(13,1,'2017-09-21',223.44,5,3,1,'Nichts',0),(14,1,'2017-09-21',123.33,2,1,1,'',0),(15,1,'2017-09-21',22.99,1,2,1,'',0),(16,3,'2017-09-29',15,4,7,1,'ttt',1),(17,1,'2017-09-29',55.99,3,1,1,'Geschenk für Aktivenausflug SS17',0),(18,3,'2017-09-29',15,2,10,1,'Abrechnung vom 29.9.17',0),(19,1,'2017-10-04',4.88,1,6,1,'Tesat',0),(22,1,'2017-10-16',23.55,1,3,1,'',0),(23,1,'2017-10-16',200,1,3,1,'',0);
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
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf16;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `geloescht`
--

LOCK TABLES `geloescht` WRITE;
/*!40000 ALTER TABLE `geloescht` DISABLE KEYS */;
INSERT INTO `geloescht` VALUES (11,1,'2017-09-18',532.99,4,2,1,'Test122',1),(16,3,'2017-09-29',15,4,7,1,'ttt',1),(20,4,'2017-10-16',15,4,10,1,'asd',1),(21,1,'2017-10-16',50,4,1,1,'adasd',1);
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
INSERT INTO `user` VALUES (1,'Sven','Meyer','mail@sven-meyer.de',1785.26,1,'2017-06-26 07:36:24',NULL,'$2y$10$Frhg8vMSY.1dtgId3SiVPeQb23HB5mvRpWpiTnEARO0yAJFZKDGYy',1,1,0),(2,'Jan','Nemeth','jan.nemeth@web.de',-2483.34,0,'2017-06-26 08:09:57',NULL,'$2y$10$yopaOg0oz2VQd3xQjBfjvecFwobDA1P9ryz8s0fuZ5qfQHSE0KNQq',5,5,0),(3,'Peter','Wurst','p_123wurst@web.de',1146.68,0,'2017-06-28 10:16:44',NULL,'passwort',1,5,0),(4,'Erest','Nutzer','test.nutzer@web.de',-291,0,'2017-07-06 17:25:58',NULL,'passwort',2,15,0),(5,'Bob','Müller','nutzerfurz@web.de',-100.44,0,'2017-07-06 17:25:58',NULL,'$2y$10$yopaOg0oz2VQd3xQjBfjvecFwobDA1P9ryz8s0fuZ5qfQHSE0KNQq',2,15,0),(6,'Emilia','Schmidt','derbeste@web.de',645.52,0,'2017-07-06 17:25:58',NULL,'passwort',5,99,0),(7,'Elena','Tester','einmalindeinemleben@web.de',348,0,'2017-07-06 17:25:58',NULL,'passwort',3,99,0),(8,'Max','Mustermann','max@mustermann.de',0,0,'2017-09-18 11:16:47',NULL,'$2y$10$ou2hysnlLDI6UDGTnyXD5Oo32yKPKlBQ2vL0mnfD9BbojPfRFcxeG',1,99,1),(9,'Matthias','Sams','m.sams@gmail.com',0,0,'2017-09-21 13:00:30',NULL,'$2y$10$f/s5PNWVHPtQap/aQnHs1uW/AtLqxY0M4oVi5/n09gjVh9QFTY2S2',0,99,1),(10,'Rückstellung','Waschen','keine@adresse.de',320,0,'2017-09-29 09:29:01',NULL,'$2y$10$4GkAzaOvDxeLJyQqK/lE6.2.wAPXlbWGcKaCcskSbiuE0bipW1tWa',1,99,0);
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
INSERT INTO `usergroup` VALUES (1,'Admin'),(5,'Kassenwart'),(10,'Getränkewart'),(15,'aktives Mitglied'),(20,'passives Mitglied'),(99,'Gast');
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
INSERT INTO `verein` VALUES (0,'kein Verein'),(1,'SV Friedberg 1899 eV'),(2,'TSV Rot-Weiß Bibabuzzebach'),(3,'kein Verein');
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
INSERT INTO `verwendungszweck` VALUES (1,'Querbuchung'),(2,'Getränkeabrechnung'),(3,'Wäscheliste'),(4,'Monatspauschale');
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

-- Dump completed on 2017-10-17 19:13:34
