-- MySQL dump 10.13  Distrib 5.7.17, for Linux (x86_64)
--
-- Host: localhost    Database: dbmonitoreo
-- ------------------------------------------------------
-- Server version	5.7.18-0ubuntu0.16.10.1

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
-- Table structure for table `desembolsos`
--

DROP TABLE IF EXISTS `desembolsos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `desembolsos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(10) unsigned NOT NULL,
  `idcodigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idcronograma` int(10) unsigned NOT NULL,
  `idusolicita` int(10) unsigned NOT NULL,
  `des_fecha_solicitud` date NOT NULL,
  `des_monto_solicitado` decimal(20,2) NOT NULL,
  `des_archivo_solicitud` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des_archivo_nombre_sol` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iduaprueba` int(10) unsigned NOT NULL,
  `des_fecha_aprobacion` date NOT NULL DEFAULT '0000-00-00',
  `des_monto_aprobado` decimal(20,2) NOT NULL DEFAULT '0.00',
  `des_archivo_aprobado` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des_archivo_nombre_apro` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `des_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `desembolsos_idsolicitud_foreign` (`idsolicitud`),
  KEY `desembolsos_idcronograma_foreign` (`idcronograma`),
  KEY `desembolsos_idusolicita_foreign` (`idusolicita`),
  KEY `desembolsos_iduaprueba_foreign` (`iduaprueba`),
  CONSTRAINT `desembolsos_idcronograma_foreign` FOREIGN KEY (`idcronograma`) REFERENCES `cronogramas` (`id`),
  CONSTRAINT `desembolsos_idsolicitud_foreign` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitudes` (`id`),
  CONSTRAINT `desembolsos_iduaprueba_foreign` FOREIGN KEY (`iduaprueba`) REFERENCES `users` (`id`),
  CONSTRAINT `desembolsos_idusolicita_foreign` FOREIGN KEY (`idusolicita`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desembolsos`
--

LOCK TABLES `desembolsos` WRITE;
/*!40000 ALTER TABLE `desembolsos` DISABLE KEYS */;
/*!40000 ALTER TABLE `desembolsos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-06 18:18:44
