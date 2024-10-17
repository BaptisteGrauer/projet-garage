-- MySQL dump 10.13  Distrib 8.0.39, for Linux (x86_64)
--
-- Host: localhost    Database: garage
-- ------------------------------------------------------
-- Server version	8.0.39-0ubuntu0.24.04.2

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
-- Table structure for table `reservations`
--

USE garage;

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `id_reservation` int NOT NULL AUTO_INCREMENT,
  `id_voiture` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `date_reservation` date DEFAULT NULL,
  PRIMARY KEY (`id_reservation`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `utilisateurs` (
  `id_utilisateur` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `admin` int DEFAULT '0',
  PRIMARY KEY (`id_utilisateur`) USING BTREE,
  UNIQUE KEY `nom_utilisateur` (`nom`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `utilisateurs`
--

LOCK TABLES `utilisateurs` WRITE;
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` VALUES (1,'admin','4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2',1);
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voitures`
--

DROP TABLE IF EXISTS `voitures`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voitures` (
  `id_voiture` int NOT NULL AUTO_INCREMENT,
  `immatriculation` varchar(255) NOT NULL,
  `marque` varchar(255) NOT NULL,
  `modele` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL DEFAULT 'voiture',
  `date_mise_en_circulation` date NOT NULL,
  `prix` int NOT NULL,
  `date_entree_garage` date NOT NULL,
  `puissance` int NOT NULL,
  `type_carburant` varchar(255) NOT NULL DEFAULT 'essence',
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `etat_reservation` int DEFAULT '0',
  PRIMARY KEY (`id_voiture`) USING BTREE,
  UNIQUE KEY `immatriculation` (`immatriculation`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voitures`
--

LOCK TABLES `voitures` WRITE;
/*!40000 ALTER TABLE `voitures` DISABLE KEYS */;
INSERT INTO `voitures` VALUES (48,'2ch','Citroën','2CH','Citadine','2005-05-05',100000,'2020-05-05',2,'Essence','Citroën 2CV','/images/voitures/2ch.jpg',0),(49,'206','Peugeot','206','Citadine','2005-05-05',500000,'2020-05-05',100,'Essence','206','/images/voitures/206.jpg',0),(50,'308','Peugeot','308','Citadine','2005-05-05',5000,'2020-05-05',100,'Diesel','308','/images/voitures/308gti.jpg',0),(51,'C15','Citroën','C15','Utilitaire','2020-05-05',15,'2020-05-05',15,'Essence','Citroën C15','/images/voitures/c15.jpg',0),(52,'Duster','Dacia','Duster','SUV','2002-05-05',5000,'2020-05-05',50,'Essence','Dacia duster','/images/voitures/duster.jpg',0),(54,'Ranger','Ford','Ranger','SUV','2002-05-05',5000,'2020-05-05',200,'Diesel','Ford Ranger','/images/voitures/ford ranger.jpg',0),(57,'Panda 4x4','Fiat','Panda 4x4','SUV','2020-05-05',5,'2020-02-02',50,'Essence','Fiat panda 4x4','/images/voitures/panda_4x4.jpg',0),(58,'Partner','Peugeot','Partner','Utilitaire','5200-05-05',500,'2020-02-02',50,'Diesel','Peugeot Partner','/images/voitures/partner.jpg',0),(59,'RAM','RAM','3500','SUV','2011-11-11',56563,'5222-02-25',500,'Diesel','RAM 3500','/images/voitures/ram3500.jpg',0),(61,'e208','Peugeot','e208','Citadine','2020-05-05',20000,'2022-05-05',300,'Electrique','e208','/images/voitures/e208.jpg',0),(62,'scenic','Renault','Scenic','SUV','2004-02-28',55500,'2015-08-15',50,'Essence','scenic','/images/voitures/scenic.jpg',0),(63,'c3','Citroën','c3','Citadine','2020-05-05',20000,'2022-10-10',70,'Diesel','c3','/images/voitures/c3.jpg',0),(64,'yoya','Audi','R8','Citadine','2020-08-25',5000000,'2021-10-12',500,'Essence','Audi R8','/images/voitures/oh - Copie.jpg',0);
/*!40000 ALTER TABLE `voitures` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-26 22:21:33
