-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: amara_db
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages` (
  `name` varchar(255) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
INSERT INTO `languages` VALUES ('Afrikaans','AF'),('Arabic','AR'),('Bulgarian','BG'),('Bengali','BN'),('Tibetan','BO'),('Catalan','CA'),('Czech','CS'),('Welsh','CY'),('Danish','DA'),('German','DE'),('Greek','EL'),('English','EN'),('Spanish','ES'),('Estonian','ET'),('Basque','EU'),('Persian','FA'),('Finnish','FI'),('Fiji','FJ'),('French','FR'),('Irish','GA'),('Gujarati','GU'),('Hebrew','HE'),('Hindi','HI'),('Croatian','HR'),('Hungarian','HU'),('Armenian','HY'),('Indonesian','ID'),('Icelandic','IS'),('Italian','IT'),('Japanese','JA'),('Javanese','JW'),('Georgian','KA'),('Cambodian','KM'),('Korean','KO'),('Latin','LA'),('Lithuanian','LT'),('Latvian','LV'),('Maori','MI'),('Macedonian','MK'),('Malayalam','ML'),('Mongolian','MN'),('Marathi','MR'),('Malay','MS'),('Maltese','MT'),('Nepali','NE'),('Dutch','NL'),('Norwegian','NO'),('Punjabi','PA'),('Polish','PL'),('Portuguese','PT'),('Quechua','QU'),('Romanian','RO'),('Russian','RU'),('Slovak','SK'),('Slovenian','SL'),('Samoan','SM'),('Albanian','SQ'),('Serbian','SR'),('Swedish','SV'),('Swahili','SW'),('Tamil','TA'),('Telugu','TE'),('Thai','TH'),('Tonga','TO'),('Turkish','TR'),('Tatar','TT'),('Ukrainian','UK'),('Urdu','UR'),('Uzbek','UZ'),('Vietnamese','VI'),('Xhosa','XH'),('Chinese','ZH');
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provinces`
--

DROP TABLE IF EXISTS `provinces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provinces` (
  `name` varchar(255) NOT NULL,
  `code` varchar(2) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provinces`
--

LOCK TABLES `provinces` WRITE;
/*!40000 ALTER TABLE `provinces` DISABLE KEYS */;
INSERT INTO `provinces` VALUES ('Agrigento','AG'),('Alessandria','AL'),('Ancona','AN'),('Aosta','AO'),('Ascoli Piceno','AP'),('L\'Aquila','AQ'),('Arezzo','AR'),('Asti','AT'),('Avellino','AV'),('Bari','BA'),('Bergamo','BG'),('Biella','BI'),('Belluno','BL'),('Benevento','BN'),('Bologna','BO'),('Brindisi','BR'),('Brescia','BS'),('Barletta-Andria-Trani','BT'),('Bolzano','BZ'),('Cagliari','CA'),('Campobasso','CB'),('Caserta','CE'),('Chieti','CH'),('Carbonia-Iglesias','CI'),('Caltanissetta','CL'),('Cuneo','CN'),('Como','CO'),('Cremona','CR'),('Cosenza','CS'),('Catania','CT'),('Catanzaro','CZ'),('Enna','EN'),('Forl?-Cesena','FC'),('Ferrara','FE'),('Foggia','FG'),('Firenze','FI'),('Fermo','FM'),('Frosinone','FR'),('Genova','GE'),('Gorizia','GO'),('Grosseto','GR'),('Imperia','IM'),('Isernia','IS'),('Crotone','KR'),('Lecco','LC'),('Lecce','LE'),('Livorno','LI'),('Lodi','LO'),('Latina','LT'),('Lucca','LU'),('Monza e della Brianza','MB'),('Macerata','MC'),('Messina','ME'),('Milano','MI'),('Mantova','MN'),('Modena','MO'),('Massa-Carrara','MS'),('Matera','MT'),('Napoli','NA'),('Novara','NO'),('Nuoro','NU'),('Ogliastra','OG'),('Oristano','OR'),('Olbia-Tempio','OT'),('Palermo','PA'),('Piacenza','PC'),('Padova','PD'),('Pescara','PE'),('Perugia','PG'),('Pisa','PI'),('Pordenone','PN'),('Prato','PO'),('Parma','PR'),('Pistoia','PT'),('Pesaro e Urbino','PU'),('Pavia','PV'),('Potenza','PZ'),('Ravenna','RA'),('Reggio Calabria','RC'),('Reggio Emilia','RE'),('Ragusa','RG'),('Rieti','RI'),('Roma','RM'),('Rimini','RN'),('Rovigo','RO'),('Salerno','SA'),('Siena','SI'),('Sondrio','SO'),('La Spezia','SP'),('Siracusa','SR'),('Sassari','SS'),('Savona','SV'),('Taranto','TA'),('Teramo','TE'),('Trento','TN'),('Torino','TO'),('Trapani','TP'),('Terni','TR'),('Trieste','TS'),('Treviso','TV'),('Udine','UD'),('Varese','VA'),('Verbano-Cusio-Ossola','VB'),('Vercelli','VC'),('Venezia','VE'),('Vicenza','VI'),('Verona','VR'),('Medio Campidano','VS'),('Viterbo','VT'),('Vibo Valentia','VV');
/*!40000 ALTER TABLE `provinces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `gender` enum('m','f','o') NOT NULL,
  `provice` varchar(2) NOT NULL,
  `fevColor` varchar(6) NOT NULL,
  `birthDate` date NOT NULL,
  `tel` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `provice` (`provice`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`provice`) REFERENCES `provinces` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (43,'example@example.com','Gabriele','Amara','m','TO','#00000','0000-00-00','2332333','5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_actions`
--

DROP TABLE IF EXISTS `users_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `typeAction` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_actions`
--

LOCK TABLES `users_actions` WRITE;
/*!40000 ALTER TABLE `users_actions` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_languages`
--

DROP TABLE IF EXISTS `users_languages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `code_language` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_user` (`id_user`,`code_language`),
  KEY `code_language` (`code_language`),
  CONSTRAINT `users_languages_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `users_languages_ibfk_2` FOREIGN KEY (`code_language`) REFERENCES `languages` (`code`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_languages`
--

LOCK TABLES `users_languages` WRITE;
/*!40000 ALTER TABLE `users_languages` DISABLE KEYS */;
INSERT INTO `users_languages` VALUES (6,43,'EN'),(7,43,'IT'),(8,43,'JA');
/*!40000 ALTER TABLE `users_languages` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-24 18:42:10
