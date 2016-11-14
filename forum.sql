-- MySQL dump 10.13  Distrib 5.6.33, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: forum
-- ------------------------------------------------------
-- Server version	5.6.33-1~dotdeb+7.1

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
-- Table structure for table `administratorzy`
--

DROP TABLE IF EXISTS `administratorzy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administratorzy` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nazwa_uzytkownika` varchar(10) NOT NULL,
  `haslo` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administratorzy`
--

LOCK TABLES `administratorzy` WRITE;
/*!40000 ALTER TABLE `administratorzy` DISABLE KEYS */;
/*!40000 ALTER TABLE `administratorzy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fora`
--

DROP TABLE IF EXISTS `fora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fora` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_kat` tinyint(4) NOT NULL,
  `nazwa` varchar(30) NOT NULL,
  `opis` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fora`
--

LOCK TABLES `fora` WRITE;
/*!40000 ALTER TABLE `fora` DISABLE KEYS */;
/*!40000 ALTER TABLE `fora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategorie`
--

DROP TABLE IF EXISTS `kategorie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategorie` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nazwa` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategorie`
--

LOCK TABLES `kategorie` WRITE;
/*!40000 ALTER TABLE `kategorie` DISABLE KEYS */;
/*!40000 ALTER TABLE `kategorie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posty`
--

DROP TABLE IF EXISTS `posty`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posty` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_tematu` int(4) NOT NULL,
  `temat` varchar(100) NOT NULL,
  `tresc` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posty`
--

LOCK TABLES `posty` WRITE;
/*!40000 ALTER TABLE `posty` DISABLE KEYS */;
/*!40000 ALTER TABLE `posty` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rangi`
--

DROP TABLE IF EXISTS `rangi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rangi` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `stopien` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rangi`
--

LOCK TABLES `rangi` WRITE;
/*!40000 ALTER TABLE `rangi` DISABLE KEYS */;
/*!40000 ALTER TABLE `rangi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tematy`
--

DROP TABLE IF EXISTS `tematy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tematy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_forum` tinyint(4) NOT NULL,
  `temat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tematy`
--

LOCK TABLES `tematy` WRITE;
/*!40000 ALTER TABLE `tematy` DISABLE KEYS */;
/*!40000 ALTER TABLE `tematy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uzytkownicy`
--

DROP TABLE IF EXISTS `uzytkownicy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uzytkownicy` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nazwa_uzytkownika` varchar(10) NOT NULL,
  `haslo` varchar(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `lancuch_weryfikacji` varchar(20) NOT NULL,
  `aktywne` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uzytkownicy`
--

LOCK TABLES `uzytkownicy` WRITE;
/*!40000 ALTER TABLE `uzytkownicy` DISABLE KEYS */;
/*!40000 ALTER TABLE `uzytkownicy` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-14 12:17:51
