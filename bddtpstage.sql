-- MySQL dump 10.17  Distrib 10.3.20-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: tpstage
-- ------------------------------------------------------
-- Server version	10.3.20-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `tpstage`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `tpstage` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tpstage`;

--
-- Table structure for table `Entreprise`
--

DROP TABLE IF EXISTS `Entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Entreprise` (
  `identreprise` int(20) NOT NULL,
  `denomination` varchar(20) NOT NULL,
  PRIMARY KEY (`identreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Entreprise`
--

LOCK TABLES `Entreprise` WRITE;
/*!40000 ALTER TABLE `Entreprise` DISABLE KEYS */;
INSERT INTO `Entreprise` VALUES (1,'Google'),(2,'Microsoft'),(3,'Amazon'),(4,'VolkSwagen'),(6,'bitconnect'),(7,'Sony');
/*!40000 ALTER TABLE `Entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Etudiants`
--

DROP TABLE IF EXISTS `Etudiants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Etudiants` (
  `Idetud` int(11) NOT NULL,
  `NomEtud` varchar(30) NOT NULL,
  `PrenomEtud` varchar(30) NOT NULL,
  `MailEtud` varchar(255) NOT NULL,
  PRIMARY KEY (`Idetud`),
  UNIQUE KEY `MailEtud` (`MailEtud`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Etudiants`
--

LOCK TABLES `Etudiants` WRITE;
/*!40000 ALTER TABLE `Etudiants` DISABLE KEYS */;
INSERT INTO `Etudiants` VALUES (1,'Fournier','Killian','Killianfournier0@gmail.com'),(2,'Adriao','Thomas','ThomasAdriao@gmail.com'),(3,'Mathieu','Virgile','Virgilemathieu@gmail.com'),(4,'Fabre','Esteban','Estebanfabre@gmail.com'),(5,'Jourgeon','Jean Philou','Jeanphilou@gmail.com'),(6,'Chaabane','Yanis','Yanischabaane@gmail.com');
/*!40000 ALTER TABLE `Etudiants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Stage`
--

DROP TABLE IF EXISTS `Stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Stage` (
  `Idetud` int(20) NOT NULL,
  `Datedeb` date NOT NULL,
  `Datefin` date NOT NULL,
  `Idtuteur` int(20) NOT NULL,
  `Identreprise` int(20) NOT NULL,
  `Description` text NOT NULL,
  PRIMARY KEY (`Idetud`,`Datedeb`),
  KEY `Idtuteur` (`Idtuteur`),
  KEY `Identreprise` (`Identreprise`),
  CONSTRAINT `Stage_ibfk_1` FOREIGN KEY (`Idetud`) REFERENCES `Etudiants` (`Idetud`),
  CONSTRAINT `Stage_ibfk_2` FOREIGN KEY (`Idtuteur`) REFERENCES `Tuteur` (`id`),
  CONSTRAINT `Stage_ibfk_3` FOREIGN KEY (`Identreprise`) REFERENCES `Entreprise` (`identreprise`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Stage`
--

LOCK TABLES `Stage` WRITE;
/*!40000 ALTER TABLE `Stage` DISABLE KEYS */;
INSERT INTO `Stage` VALUES (1,'2020-01-15','2020-01-25',3,7,'Killian A sonyc'),(2,'2019-12-31','2020-01-16',2,4,'VolkSwagen'),(3,'2020-01-08','2020-01-31',2,6,'BITCONNEEEEEEEECT'),(4,'2020-01-09','2020-01-22',1,3,'Hamazonnn'),(5,'2020-02-06','2020-02-15',1,3,'Jourgeon il est la');
/*!40000 ALTER TABLE `Stage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Tuteur`
--

DROP TABLE IF EXISTS `Tuteur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Tuteur` (
  `id` int(11) NOT NULL,
  `nomtut` varchar(30) NOT NULL,
  `prenomtut` varchar(30) NOT NULL,
  `mailtut` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mailtut` (`mailtut`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Tuteur`
--

LOCK TABLES `Tuteur` WRITE;
/*!40000 ALTER TABLE `Tuteur` DISABLE KEYS */;
INSERT INTO `Tuteur` VALUES (1,'Dupra','Jeremy','Olivierdupeyra@gmail.com'),(2,'Gaillard','Michel','gaillard42@gmail.com'),(3,'Dilat','Larry','dilat42@mail.com'),(4,'Marechal','Martin','Marechalmartin@gmail.com');
/*!40000 ALTER TABLE `Tuteur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-02-06 16:34:29
