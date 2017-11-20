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
-- Table structure for table `acciones`
--

DROP TABLE IF EXISTS `acciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `acciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idobjetivo` int(10) unsigned NOT NULL,
  `acc_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `acc_desde` date NOT NULL,
  `acc_hasta` date NOT NULL,
  `acc_avance` decimal(18,2) NOT NULL DEFAULT '0.00',
  `acc_programado` decimal(18,2) NOT NULL DEFAULT '0.00',
  `acc_ejecutado` decimal(18,2) NOT NULL DEFAULT '0.00',
  `acc_estado` tinyint(1) NOT NULL DEFAULT '1',
  `acc_observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `iduregistra` int(10) unsigned NOT NULL,
  `iduactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `acciones_idobjetivo_foreign` (`idobjetivo`),
  KEY `acciones_iduregistra_foreign` (`iduregistra`),
  KEY `acciones_iduactualiza_foreign` (`iduactualiza`),
  CONSTRAINT `acciones_idobjetivo_foreign` FOREIGN KEY (`idobjetivo`) REFERENCES `oespecificos` (`id`),
  CONSTRAINT `acciones_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `acciones_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `acciones`
--

LOCK TABLES `acciones` WRITE;
/*!40000 ALTER TABLE `acciones` DISABLE KEYS */;
INSERT INTO `acciones` VALUES (1,1,'<p>Una&nbsp;<strong>acci&oacute;n</strong>&nbsp;en el&nbsp;mercado financiero&nbsp;es un t&iacute;tulo emitido por una sociedad que representa el valor de una de las fracciones iguales en que se divide su&nbsp;capital social</p>\r\n','2017-11-13','2017-12-14',0.00,0.00,0.00,1,'',2,2,'2017-11-20 00:09:30','2017-11-20 00:09:30'),(2,1,'<p>Normalmente las acciones son transmisibles sin ninguna restricci&oacute;n, es decir, libremente. Como&nbsp;inversi&oacute;n, supone una inversi&oacute;n en&nbsp;renta variable.</p>\r\n','2017-12-04','2018-01-24',0.00,0.00,0.00,1,'',2,2,'2017-11-20 00:16:01','2017-11-20 00:16:01'),(3,2,'<p>Las acciones son t&iacute;tulos valores al igual que los bonos. La diferencia entre una acci&oacute;n y un&nbsp;bono u obligaci&oacute;n&nbsp;radica en que la acci&oacute;n otorga la propiedad de los&nbsp;activos&nbsp;de la&nbsp;empresa&nbsp;en la proporci&oacute;n que supone el valor nominal de dicha acci&oacute;n respecto del capital social total.</p>\r\n','2018-01-23','2018-02-27',0.00,0.00,0.00,1,'',2,2,'2017-11-20 00:17:42','2017-11-20 00:17:42');
/*!40000 ALTER TABLE `acciones` ENABLE KEYS */;
UNLOCK TABLES;

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
  `ar_revisado` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `archivos_idsolicitud_foreign` (`idsolicitud`),
  KEY `archivos_idurecibe_foreign` (`idurecibe`),
  KEY `archivos_iduenvia_foreign` (`iduenvia`),
  CONSTRAINT `archivos_idsolicitud_foreign` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitudes` (`id`),
  CONSTRAINT `archivos_iduenvia_foreign` FOREIGN KEY (`iduenvia`) REFERENCES `users` (`id`),
  CONSTRAINT `archivos_idurecibe_foreign` FOREIGN KEY (`idurecibe`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivos`
--

LOCK TABLES `archivos` WRITE;
/*!40000 ALTER TABLE `archivos` DISABLE KEYS */;
INSERT INTO `archivos` VALUES (1,1,'LP-FONA-0001','POR APROBAR',2,'APROBADO',3,'','-','-','2017-11-15 16:09:57','2017-11-15 16:20:45'),(2,1,'LP-FONA-0001','APROBADO',3,'FINANZAS',4,'storage/archivo/20171115-12173.pdf','esta es una pequeña descripcion del documento adjutno','pdf1.pdf','2017-11-15 16:17:03','2017-11-16 11:45:34'),(3,1,'LP-FONA-0001','COMITE P',3,'',3,'-','-','-','2017-11-15 16:20:44','2017-11-15 16:20:44'),(4,1,'LP-FONA-0001','COMITE P',3,'',3,'storage/archivo/20171116-74119.pdf','pequeño archivo de prueba para probra solameNTE PARA PROBAR','pdf1.pdf','2017-11-16 11:41:19','2017-11-16 11:41:19'),(5,1,'LP-FONA-0001','FINANZAS',4,'LEGAL',5,'storage/archivo/20171116-74534.pdf','esta es una pequeña descripcion del documento adjutno','pdf2.pdf','2017-11-16 11:45:34','2017-11-16 11:48:43'),(6,1,'LP-FONA-0001','LEGAL',5,'FIRMADO',5,'storage/archivo/20171116-7476.pdf','pequeño archivo de prueba para probra solamente 3','pdf2.pdf','2017-11-16 11:47:06','2017-11-16 11:51:31'),(7,1,'LP-FONA-0001','FIRMADO',5,'FIRMADO',5,'storage/archivo/20171116-75131.pdf','pequeño archivo de prueba para probra solamente 3','pdf1.pdf','2017-11-16 11:51:31','2017-11-16 11:51:31');
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
INSERT INTO `areas` VALUES (1,'Direccion General',1,'2017-10-23 05:51:40','2017-10-23 06:09:01'),(2,'Tecnico Supervisor',1,'2017-10-23 06:08:36','2017-11-03 00:39:46');
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
INSERT INTO `cargos` VALUES (1,'Gerente General',1,'2017-10-23 06:18:29','2017-10-23 06:18:29'),(2,'Sub Gerente',1,'2017-10-23 06:18:42','2017-11-03 00:41:06'),(3,'Técnico de Sistemas',1,'2017-10-23 06:18:55','2017-10-23 06:18:55'),(4,'Jefe de Sistemas',1,'2017-10-23 06:19:07','2017-10-23 06:19:07');
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
INSERT INTO `cites` VALUES (1,'La Paz','LP-FONA-',1,1,'2017-10-10 04:00:00','2017-11-15 16:07:49'),(2,'Oruro','OR-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,'Santa Cruz','SC-FONA-',0,1,'2017-10-10 04:00:00','2017-10-24 17:49:10'),(4,'Chuquisaca','CH-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(5,'Potosi','PT-FONA',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(6,'Cochabamba','CBBA-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(7,'Pando','PA-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(8,'Beni','BE-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(9,'Tarija','TJ-FONA-',0,1,'2017-10-10 04:00:00','2017-10-10 04:00:00');
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
INSERT INTO `componentes` VALUES (1,'Componente 1','Descripcion del componente 1',1,'2017-10-23 06:30:03','2017-11-03 00:49:17'),(2,'Componente 2','DEscripcion del componente 2',1,'2017-10-23 06:30:03','2017-10-23 06:30:03'),(3,'Componente 3','Descripcion del componente 3',1,'2017-10-23 06:30:03','2017-10-23 06:30:03'),(4,'Componente 4','Descrpcion del Componente 4',1,'2017-10-23 06:30:03','2017-10-23 06:30:03');
/*!40000 ALTER TABLE `componentes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coordenadas`
--

DROP TABLE IF EXISTS `coordenadas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordenadas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idobjetivo` int(10) unsigned NOT NULL,
  `coor_x_origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coor_y_origin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coor_x_map` decimal(18,10) NOT NULL,
  `coor_y_map` decimal(18,10) NOT NULL,
  `coor_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) unsigned NOT NULL,
  `iduactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `coordenadas_idobjetivo_foreign` (`idobjetivo`),
  KEY `coordenadas_iduregistra_foreign` (`iduregistra`),
  KEY `coordenadas_iduactualiza_foreign` (`iduactualiza`),
  CONSTRAINT `coordenadas_idobjetivo_foreign` FOREIGN KEY (`idobjetivo`) REFERENCES `oespecificos` (`id`),
  CONSTRAINT `coordenadas_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `coordenadas_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordenadas`
--

LOCK TABLES `coordenadas` WRITE;
/*!40000 ALTER TABLE `coordenadas` DISABLE KEYS */;
INSERT INTO `coordenadas` VALUES (1,1,'4324242','6453453',-16.4324242000,-68.6453453000,1,2,2,'2017-11-20 16:28:03','2017-11-20 16:28:03');
/*!40000 ALTER TABLE `coordenadas` ENABLE KEYS */;
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
INSERT INTO `entidades` VALUES (1,'Gobierno Autonomo Municipal de El Alto','GAMEA',1,'2017-10-22 08:54:03','2017-10-22 08:54:03'),(2,'Gobierno Autonomo Municipal de La Paz','GAMLP',1,'2017-10-22 10:46:33','2017-10-23 01:19:22'),(3,'Gobierno Autonomo Municipal de Achocalla','GAMA',1,'2017-10-23 01:00:12','2017-10-23 01:00:12'),(4,'Gobierno Autonomo Municipal de Cochabamba','GAMCBBA',1,'2017-10-23 01:16:54','2017-11-03 00:09:47'),(5,'Gobierno Autonomo Municipal de Patacamaya','GAMP',1,'2017-10-23 02:37:01','2017-11-03 00:55:22');
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
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2017_10_11_203124_entrust_setup_tables',1),('2017_10_11_212754_create_table_solicitudes',1),('2017_10_13_021048_create_entidades_table',1),('2017_10_19_222710_create_table_cites',1),('2017_10_21_233513_create_table_componentes',1),('2017_10_22_001841_create_table_reglamentos',1),('2017_10_22_004053_create_table_departamentos',1),('2017_10_22_004247_create_table_provincias',1),('2017_10_22_010317_create_table_municipios',1),('2017_10_22_020202_create_table_cargos',1),('2017_10_22_020218_create_table_areas',1),('2017_10_23_135711_add_column_user_tipo',2),('2017_10_24_053454_create_table_archivos',3),('2017_11_16_050614_create_table_oespecificos',4),('2017_11_16_080320_create_table_acciones',5),('2017_11_20_093508_create_coordenadas_table',6);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipios`
--

LOCK TABLES `municipios` WRITE;
/*!40000 ALTER TABLE `municipios` DISABLE KEYS */;
INSERT INTO `municipios` VALUES (1,1,'Los Yungas',1,'2017-10-10 04:00:00','2017-11-03 02:39:16'),(2,1,'Los Andes',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,1,'Los Yungas 2',1,'2017-11-03 02:33:33','2017-11-03 02:33:33'),(4,3,'Municipio de sud yun',1,'2017-11-03 02:34:42','2017-11-03 02:35:00');
/*!40000 ALTER TABLE `municipios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oespecificos`
--

DROP TABLE IF EXISTS `oespecificos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oespecificos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `idsolicitud` int(10) unsigned NOT NULL,
  `idcodigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `esp_objetivo` text COLLATE utf8_unicode_ci NOT NULL,
  `esp_meta` text COLLATE utf8_unicode_ci NOT NULL,
  `esp_resultado` text COLLATE utf8_unicode_ci NOT NULL,
  `esp_seguimiento` enum('SIN INICIAR','EN PROCESO','CULMINADO','EN PAUSA','CANCELADO') COLLATE utf8_unicode_ci NOT NULL,
  `esp_observacion` text COLLATE utf8_unicode_ci NOT NULL,
  `esp_estado` tinyint(1) NOT NULL DEFAULT '1',
  `iduregistra` int(10) unsigned NOT NULL,
  `iduactualiza` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `oespecificos_idsolicitud_foreign` (`idsolicitud`),
  KEY `oespecificos_iduregistra_foreign` (`iduregistra`),
  KEY `oespecificos_iduactualiza_foreign` (`iduactualiza`),
  CONSTRAINT `oespecificos_idsolicitud_foreign` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitudes` (`id`),
  CONSTRAINT `oespecificos_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  CONSTRAINT `oespecificos_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oespecificos`
--

LOCK TABLES `oespecificos` WRITE;
/*!40000 ALTER TABLE `oespecificos` DISABLE KEYS */;
INSERT INTO `oespecificos` VALUES (1,1,'LP-FONA-0001','<p>Como parte de establecer desde el inicio una visi&oacute;n com&uacute;n y un marco conceptual, es necesario acordar metas y objetivos compartidos.</p>\r\n','<p>Como parte de establecer desde el inicio una visi&oacute;n com&uacute;n y un marco conceptual, es necesario acordar metas y objetivos compartidos.</p>\r\n','<p>ordar metas y objetivos compartidos.</p>\r\n','SIN INICIAR','',1,2,2,'2017-11-19 19:52:35','2017-11-19 19:52:35'),(2,1,'LP-FONA-0001','<p>n&nbsp;<em>resultado</em>&nbsp;es el resultado real que los socios del programa desear&iacute;an lograr mediante sus esfuerzos colectivos en la comunidad.</p>\r\n','<p>&nbsp;es el resultado real que los socios del programa desear&iacute;an lograr mediante sus esfuerzos colectivos en la comunidad.</p>\r\n','<p>real que los socios del programa desear&iacute;an lograr mediante sus esfuerzos colectivos en la comunidad.</p>\r\n','SIN INICIAR','',1,2,2,'2017-11-19 19:58:42','2017-11-19 19:58:42');
/*!40000 ALTER TABLE `oespecificos` ENABLE KEYS */;
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
INSERT INTO `password_resets` VALUES ('edwinajahuancacallisaya@gmail.com','8ce582d7f8d3635fc52e5137093d60a59e9797f71f5eec1b889d6c348df418d4','2017-11-01 23:30:02');
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincias`
--

LOCK TABLES `provincias` WRITE;
/*!40000 ALTER TABLE `provincias` DISABLE KEYS */;
INSERT INTO `provincias` VALUES (1,1,'Murillo',1,'2017-10-10 04:00:00','2017-11-03 02:55:48'),(2,1,'Coroico',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(3,1,'Sud Yungas',1,'2017-10-10 04:00:00','2017-10-10 04:00:00'),(4,1,'Nor Yungas',1,'2017-11-03 02:53:24','2017-11-03 02:53:24'),(5,3,'Sacaba',1,'2017-11-03 02:54:23','2017-11-03 02:54:23');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reglamentos`
--

LOCK TABLES `reglamentos` WRITE;
/*!40000 ALTER TABLE `reglamentos` DISABLE KEYS */;
INSERT INTO `reglamentos` VALUES (1,'Guia 1 - Reglamento de etc','reglamento de la guia 1','archivo.pdf',1,'2017-10-10 04:00:00','2017-11-03 00:07:22'),(2,'Guia 2 - Reglamento de Guias de fonabisque update','Guia 2 - Reglamento de Guias de fonabisque Guia 2 - Reglamento de Guias de fonabisque 4','storage/reglamento/2017112-192051.pdf',1,'2017-11-02 23:20:51','2017-11-03 00:03:59'),(3,'Guia 3 - Reglamento de Guias de fonabisque','Reglamento de Guias de fonabisque 3 Reglamento de Guias de fonabisque','storage/reglamento/2017112-225821.pdf',1,'2017-11-03 02:58:21','2017-11-03 02:58:21');
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
  `sol_estado` enum('VERIFICACION','POR APROBAR','APROBADO','COMITE P','FINANZAS','LEGAL','FIRMADO','DEVUELTO','RECHAZADO') COLLATE utf8_unicode_ci NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitudes`
--

LOCK TABLES `solicitudes` WRITE;
/*!40000 ALTER TABLE `solicitudes` DISABLE KEYS */;
INSERT INTO `solicitudes` VALUES (1,'LP-FONA-0001','2017-00004','Invitación','PRIMER PROYECTO DE FONABOSQUE PARA APROBAR','MI OBJETIVO DEL PROYECTO CON TITULO PRIMER PROYECTO DE FONABOSQUE PARA APROBAR','MI JUSTIFICACION DEL PROYECTO CON TITULO PRIMER PROYECTO DE FONABOSQUE PARA APROBAR',2,'GAMLP',1,1,'Los Andes,Los Yungas 2,',3,2323.00,42342.00,42.00,2,1,'storage/respaldo/20171115-12957.pdf','storage/ftecnica/20171115-12957.pdf','FIRMADO','Componente 1,Componente 4,',2,2,'2017-11-15 16:09:57','2017-11-15 16:09:57');
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
INSERT INTO `users` VALUES (1,'123','LP','juan','acho','ayala','2017-09-09','Masculino',0,0,'edwinajahuancacallisaya@gmail.com',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','juan.acho','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','6SwVel1dzc0WmzHJCbdfORHniKZrMVYfBl29zkNh4L9J749WJkaZWX6ej0DO','2017-08-30 04:00:00','2017-11-06 09:02:19','ADMINISTRADOR DEL SISTEMA'),(2,'124','LP','carlos','aranibar','medrano','2017-09-09','Masculino',0,0,'carlos.aranibar@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','carlos.aranibar','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','yiBJVmLaJZjEXXFmzdCaIz8GF9cWlGR4GatwVVu17MNkO0W7hG1p0w6Yn97U','2017-08-30 04:00:00','2017-11-16 13:36:17','TECNICO PLANIFICACION'),(3,'125','SC','luis','medrano','clares','2017-09-09','Masculino',0,0,'luis.medrano@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','luis.medrano','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','Odk8RbZh84b4Mtn8R640cwAFkV91Zz8auLtMikAzTR9ohQkF1qMEGNXZr3jF','2017-08-30 04:00:00','2017-11-16 13:39:17','JEFE PLANIFICACION'),(4,'126','TJ','maria','reyes','reyes','2017-09-09','Femenina',0,0,'maria.reyes@fonabosque.com.bo',1,1,1,'Santa Cruz','storage/usuarios/20170710-12720.png','maria.reyes','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','1jpbk59wOf4LM25Ie9gQjRC7kJ7OcBI0D4xJylPbbl65cYuotOruxooO9mCn','2017-08-30 04:00:00','2017-11-16 11:46:04','ADMINISTRACION FINANCIERA'),(5,'127','PT','yepeto','ruiz','salas','2017-09-09','Masculino',0,0,'yepeto.ruiz@fonabosque.com.bo',1,1,1,'La Paz','storage/usuarios/20170710-12720.png','yepeto.ruiz','$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6',1,'-','ES93wItJCQJu64NRhJHVPYWBQFaHojgx2jDQHd6FTROSFhN3ZdtijWT2PmB0','2017-08-30 04:00:00','2017-11-16 11:54:08','ASESOR LEGAL');
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

-- Dump completed on 2017-11-20 12:31:48
