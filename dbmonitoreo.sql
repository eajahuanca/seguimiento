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
-- Table structure for table `archivos`
--

DROP TABLE IF EXISTS `archivos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(10) unsigned NOT NULL,
  `idcodigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_estadorecibe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idurecibe` int(10) unsigned NOT NULL,
  `ar_estadoenvia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iduenvia` int(10) unsigned NOT NULL,
  `ar_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `ar_revisado` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archivos_idsolicitud_foreign` (`idsolicitud`),
  KEY `archivos_idurecibe_foreign` (`idurecibe`),
  KEY `archivos_iduenvia_foreign` (`iduenvia`),
  CONSTRAINT `archivos_idsolicitud_foreign` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitudes` (`id`),
  CONSTRAINT `archivos_iduenvia_foreign` FOREIGN KEY (`iduenvia`) REFERENCES `users` (`id`),
  CONSTRAINT `archivos_idurecibe_foreign` FOREIGN KEY (`idurecibe`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `areas`
--

DROP TABLE IF EXISTS `areas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `areas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ar_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `areas_ar_nombre_unique` (`ar_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `areas`
--

LOCK TABLES `areas` WRITE;
/*!40000 ALTER TABLE `areas` DISABLE KEYS */;
INSERT INTO `areas` VALUES (1,'Direccion General',1,'2017-10-23 05:51:40','2017-10-23 06:09:01'),(2,'Tecnica',1,'2017-10-23 06:08:36','2017-10-23 06:08:36');
/*!40000 ALTER TABLE `areas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargos`
--

DROP TABLE IF EXISTS `cargos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `car_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cargos_car_nombre_unique` (`car_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargos`
--

LOCK TABLES `cargos` WRITE;
/*!40000 ALTER TABLE `cargos` DISABLE KEYS */;
INSERT INTO `cargos` VALUES (1,'Gerente General',1,'2017-10-23 06:18:29','2017-10-23 06:18:29'),(2,'Sub Gerente',0,'2017-10-23 06:18:42','2017-10-23 06:19:27'),(3,'Técnico de Sistemas',1,'2017-10-23 06:18:55','2017-10-23 06:18:55'),(4,'Jefe de Sistemas',1,'2017-10-23 06:19:07','2017-10-23 06:19:07');
/*!40000 ALTER TABLE `cargos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cites`
--

DROP TABLE IF EXISTS `cites`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cites` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cit_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cit_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cit_correlativo` int(11) NOT NULL,
  `cit_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cites`
--

LOCK TABLES `cites` WRITE;
/*!40000 ALTER TABLE `cites` DISABLE KEYS */;
INSERT INTO `cites` VALUES (1,'La Paz','LP-FONA-',2,1,'2017-10-10 04:00:00','2017-10-24 11:38:48'),(2,'Oruro','OR-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,'Santa Cruz','SC-FONA-',1,1,'2017-10-10 04:00:00','2017-10-24 12:52:32'),(4,'Chuquisaca','CH-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(5,'Potosi','PT-FONA',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(6,'Cochabamba','CBBA-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(7,'Pando','PA-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(8,'Beni','BE-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(9,'Tarija','TJ-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
/*!40000 ALTER TABLE `cites` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `componentes`
--

DROP TABLE IF EXISTS `componentes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `componentes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `com_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `componentes_com_nombre_unique` (`com_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `componentes`
--

LOCK TABLES `componentes` WRITE;
/*!40000 ALTER TABLE `componentes` DISABLE KEYS */;
INSERT INTO `componentes` VALUES (1,'Componente 1','Descripcion del componente 1',1,'2017-10-23 06:30:03','2017-10-23 06:30:17'),(2,'Componente 2','DEscripcion del componente 2',1,'2017-10-23 06:30:03','2017-10-23 06:30:03'),(3,'Componente 3','Descripcion del componente 3',1,'2017-10-23 06:30:03','2017-10-23 06:30:03'),(4,'Componente 4','Descrpcion del Componente 4',1,'2017-10-23 06:30:03','2017-10-23 06:30:03');
/*!40000 ALTER TABLE `componentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dep_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'LP','La Paz',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(2,'OR','Oruro',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,'CBBA','Cochabamba',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(4,'SC','Santa Cruz',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(5,'CH','Chuquisaca',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(6,'TJ','Tarija',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(7,'PT','Potosi',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(8,'BE','Beni',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(9,'PA','Pando',1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entidades`
--

DROP TABLE IF EXISTS `entidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ent_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ent_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ent_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entidades_ent_nombre_unique` (`ent_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entidades`
--

LOCK TABLES `entidades` WRITE;
/*!40000 ALTER TABLE `entidades` DISABLE KEYS */;
INSERT INTO `entidades` VALUES (1,'Gobierno Autonomo Municipal de El Alto','GAMEA',1,'2017-10-22 08:54:03','2017-10-22 08:54:03'),(2,'Gobierno Autonomo Municipal de La Paz','GAMLP',1,'2017-10-22 10:46:33','2017-10-23 01:19:22'),(3,'Gobierno Autonomo Municipal de Achocalla','GAMA',1,'2017-10-23 01:00:12','2017-10-23 01:00:12'),(4,'Gobierno Autonomo Municipal de Cochabamba','GAMCBBA',0,'2017-10-23 01:16:54','2017-10-23 01:18:39'),(5,'Gobierno Autonomo Municipal de Patacamaya','GAMP',1,'2017-10-23 02:37:01','2017-10-23 02:37:01');
/*!40000 ALTER TABLE `entidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2017_10_11_203124_entrust_setup_tables',1),('2017_10_11_212754_create_table_solicitudes',1),('2017_10_13_021048_create_entidades_table',1),('2017_10_19_222710_create_table_cites',1),('2017_10_21_233513_create_table_componentes',1),('2017_10_22_001841_create_table_reglamentos',1),('2017_10_22_004053_create_table_departamentos',1),('2017_10_22_004247_create_table_provincias',1),('2017_10_22_010317_create_table_municipios',1),('2017_10_22_020202_create_table_cargos',1),('2017_10_22_020218_create_table_areas',1),('2017_10_23_135711_add_column_user_tipo',2),('2017_10_24_053454_create_table_archivos',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipios`
--

DROP TABLE IF EXISTS `municipios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipios` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idprovincia` int(10) unsigned NOT NULL,
  `mun_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mun_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `municipios_idprovincia_foreign` (`idprovincia`),
  CONSTRAINT `municipios_idprovincia_foreign` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,1,'Los Yungas',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(2,1,'Los Andes',1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincias`
--

DROP TABLE IF EXISTS `provincias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincias` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iddepto` int(10) unsigned NOT NULL,
  `pro_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provincias_iddepto_foreign` (`iddepto`),
  CONSTRAINT `provincias_iddepto_foreign` FOREIGN KEY (`iddepto`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,1,'Murillo',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(2,1,'Coroico',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,1,'Sud Yungas',1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
/*!40000 ALTER TABLE `provincias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reglamentos`
--

DROP TABLE IF EXISTS `reglamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reglamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reg_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `reglamentos_reg_nombre_unique` (`reg_nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reglamentos`
--

LOCK TABLES `reglamentos` WRITE;
/*!40000 ALTER TABLE `reglamentos` DISABLE KEYS */;
INSERT INTO `reglamentos` VALUES (1,'Guia 1 - Reglamento de etc','reglamento de la guia 1','archivo.pdf',1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
/*!40000 ALTER TABLE `reglamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitudes`
--

DROP TABLE IF EXISTS `solicitudes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitudes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sol_codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_hrsigec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_objetivo` text COLLATE utf8_unicode_ci NOT NULL,
  `sol_justicacion` text COLLATE utf8_unicode_ci NOT NULL,
  `identidad` int(10) unsigned NOT NULL,
  `sol_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iddepto` int(10) unsigned NOT NULL,
  `idprovincia` int(10) unsigned NOT NULL,
  `sol_municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idresponsable` int(10) unsigned NOT NULL,
  `sol_montofona` decimal(18,2) NOT NULL,
  `sol_montosol` decimal(18,2) NOT NULL,
  `sol_montootro` decimal(18,2) NOT NULL,
  `sol_tiempo` int(11) NOT NULL DEFAULT '0',
  `idreglamento` int(10) unsigned NOT NULL,
  `sol_respaldo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_ftecnica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_estado` enum('TRANSCRIPCION','POR APROBAR','APROBADO','DEVUELTO') COLLATE utf8_unicode_ci NOT NULL,
  `sol_componente` text COLLATE utf8_unicode_ci NOT NULL,
  `iduregistra` int(10) unsigned NOT NULL,
  `iduactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `solicitudes_sol_codigo_unique` (`sol_codigo`),
  KEY `solicitudes_idresponsable_foreign` (`idresponsable`),
  KEY `solicitudes_iduregistra_foreign` (`iduregistra`),
  KEY `solicitudes_iduactualiza_foreign` (`iduactualiza`),
  CONSTRAINT `solicitudes_idresponsable_foreign` FOREIGN KEY (`idresponsable`) REFERENCES `users` (`id`),
  CONSTRAINT `solicitudes_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `solicitudes_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (1,'LP-FONA-001','2017-0001','Invitacion','deforestacion','deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo',' deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion',2,'GAMLP',1,1,'Los Andes, Yungas',3,250000.00,260000.00,0.00,2,1,'archivo.pdf','archivo.pdf','POR APROBAR','Componente 1, Componente 2',1,1,'2017-10-10 16:13:00','2017-10-10 16:13:00'),(2,'LP-FONA-002','2017-0005','Invitacion','Plantacion general','Objetivo Plantacion general Plantacion general Plantacion general','Planatacion justificacion justificacion',1,'GAMEA',2,1,'mun1, munui2',1,20000.00,270000.00,0.00,1,1,'archivo.pdf','archivo.pdf','POR APROBAR','Componente 1, Componente 2',1,1,'2017-10-10 16:13:00','2017-10-10 16:13:00'),(3,'LP-FONA-003','2017-0008','Invitacion','Lorem ip us name','Objeivo Lorem ip us name','Justificacion Lorem ip us name',3,'GAMA',1,2,'mun1, munui2',2,450000.00,480000.00,10000.00,3,1,'archivo.pdf','archivo.pdf','APROBADO','Componente 1, Componente 2',1,1,'2017-10-10 16:13:00','2017-10-10 16:13:00'),(4,'LP-FONA-004','2017-0010','Invitacion','Lorem ip us name 23','Obejtivo Lorem ip us name 23','Justificacion Lorem ip us name 23',1,'GAMCBBA',3,1,'mun1,',3,170000.00,172000.00,0.00,2,1,'archivo.pdf','archivo.pdf','TRANSCRIPCION','Componente 1, Componente 2, Componente3',1,1,'2017-10-10 16:13:00','2017-10-10 16:13:00');
/*!40000 ALTER TABLE `solicitudes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `us_carnet` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_expedido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_paterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_materno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_nacimiento` date NOT NULL,
  `us_genero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_telefono` int(11) NOT NULL,
  `us_celular` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_profesion` int(10) unsigned NOT NULL,
  `id_cargo` int(10) unsigned NOT NULL,
  `id_area` int(10) unsigned NOT NULL,
  `us_depto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  `us_obs` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `us_tipo` enum('ADMINISTRADOR DEL SISTEMA','TECNICO PLANIFICACION','JEFE PLANIFICACION','ADMINISTRACION FINANCIERA','ASESOR LEGAL') COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_us_carnet_unique` (`us_carnet`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_us_cuenta_unique` (`us_cuenta`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'123','LP','juan','acho','ayala','2017-09-09','Masculino',0,0,'juan.acho@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','juan.acho','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','ZQtBXTZOb3n809cCSC2TJLemZqBfQ3Webx3gKP9OxXduR06oq1bATAA0RfiV','2017-08-30 04:00:00','2017-10-24 01:39:39','ADMINISTRADOR DEL SISTEMA'),(2,'124','LP','carlos','aranibar','medrano','2017-09-09','Masculino',0,0,'carlos.aranibar@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','carlos.aranibar','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','sXKXhnTgxo72FgUrLL6zqCakCy22FjKD9KejDMoghoyJmA8t79ldnESlYimD','2017-08-30 04:00:00','2017-08-30 04:00:00','TECNICO PLANIFICACION'),(3,'125','SC','luis','medrano','clares','2017-09-09','Masculino',0,0,'luis.medrano@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','luis.medrano','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','w5onPV9I4RdYzArcjsiuK1h9nBfJOYmhNscLjGGEDPIorI6ECXyt8eD7jQs2','2017-08-30 04:00:00','2017-10-24 10:19:03','JEFE PLANIFICACION'),(4,'126','TJ','maria','reyes','reyes','2017-09-09','Femenina',0,0,'maria.reyes@fonabosque.com.bo',1,1,1,'Santa Cruz','storage/usuarios/20170710-12720.png','maria.reyes','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-',NULL,'2017-08-30 04:00:00','2017-08-30 04:00:00','ADMINISTRACION FINANCIERA'),(5,'127','PT','yepeto','ruiz','salas','2017-09-09','Masculino',0,0,'yepeto.ruiz@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','yepeto.ruiz','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-',NULL,'2017-08-30 04:00:00','2017-08-30 04:00:00','ASESOR LEGAL');
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

-- Dump completed on 2017-10-24  9:45:23
