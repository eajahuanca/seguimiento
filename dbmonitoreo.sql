-- phpMyAdmin SQL Dump
-- version 4.6.4deb1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 06-11-2017 a las 09:44:07
-- Versión del servidor: 5.7.18-0ubuntu0.16.10.1
-- Versión de PHP: 7.0.18-0ubuntu0.16.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dbmonitoreo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(10) UNSIGNED NOT NULL,
  `idsolicitud` int(10) UNSIGNED NOT NULL,
  `idcodigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_estadorecibe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idurecibe` int(10) UNSIGNED NOT NULL,
  `ar_estadoenvia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iduenvia` int(10) UNSIGNED NOT NULL,
  `ar_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_detalle` text COLLATE utf8_unicode_ci NOT NULL,
  `ar_revisado` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `idsolicitud`, `idcodigo`, `ar_estadorecibe`, `idurecibe`, `ar_estadoenvia`, `iduenvia`, `ar_archivo`, `ar_detalle`, `ar_revisado`, `created_at`, `updated_at`) VALUES
(1, 3, 'LP-FONA-003', 'POR APROBAR', 2, 'APROBADO', 3, '/storage/archivo/20171029-235552.pdf', 'archivo adjunto', 'archivo_adjunto.pdf', '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(4, 1, 'LP-FONA-001', 'APROBADO', 3, 'FINANZAS', 3, 'storage/archivo/2017116-25118.pdf', 'pequeño archivo de prueba para probra solamente 3', NULL, '2017-11-06 06:51:18', '2017-11-06 07:19:23'),
(5, 5, '', 'POR APROBAR', 3, 'APROBADO', 3, 'storage/archivo/2017116-25635.pdf', 'pequeño archivo de prueba para probra solamente 123', NULL, '2017-11-06 06:56:35', '2017-11-06 06:56:35'),
(6, 5, '', 'APROBADO', 3, '', 3, 'storage/archivo/2017116-3040.pdf', 'pequeño archivo de prueba para probra solamente 67', NULL, '2017-11-06 07:00:40', '2017-11-06 07:00:40'),
(7, 7, 'LP-FONA-0005', 'POR APROBAR', 3, 'APROBADO', 3, 'storage/archivo/2017116-3646.pdf', 'pequeño archivo de prueba para probra solame', NULL, '2017-11-06 07:06:46', '2017-11-06 07:14:09'),
(8, 7, 'LP-FONA-0005', 'APROBADO', 3, '', 3, 'storage/archivo/2017116-3148.pdf', 'pequeño archivo de prueba para probra solamente 2m', 'pdf2.pdfpdf', '2017-11-06 07:14:08', '2017-11-06 07:14:08'),
(9, 1, 'LP-FONA-001', 'FINANZAS', 4, 'LEGAL', 5, 'storage/archivo/2017116-31922.pdf', 'pequeño archivo de prueba para probra solamente FINAN', 'pdf1.pdfpdf', '2017-11-06 07:19:22', '2017-11-06 07:27:40'),
(10, 3, 'LP-FONA-003', 'FINANZAS', 4, 'LEGAL', 5, 'storage/archivo/2017116-32114.pdf', 'pequeño archivo de prueba para probra solamenteGHJ', 'pdf1.pdfpdf', '2017-11-06 07:21:14', '2017-11-06 08:55:35'),
(12, 1, 'LP-FONA-001', 'LEGAL', 5, 'FIRMADO', 5, 'storage/archivo/2017116-32739.pdf', 'pequeño archivo de prueba para probra solamenteGHJKL', 'pdf1.pdfpdf', '2017-11-06 07:27:39', '2017-11-06 08:30:17'),
(13, 1, 'LP-FONA-001', 'FIRMADO', 5, 'FIRMADO', 5, 'storage/archivo/2017116-43017.pdf', 'dhakdh dhakh dhkahdka dkahkda dk asdkanslk', 'pdf1.pdf', '2017-11-06 08:30:17', '2017-11-06 08:30:17'),
(14, 3, 'LP-FONA-003', 'LEGAL', 5, 'FIRMADO', 5, 'storage/archivo/2017116-45535.pdf', 'nkk  khkjhk hkh hkjhk h kh khkhhlh lkhlk', 'pdf1.pdf', '2017-11-06 08:55:35', '2017-11-06 08:57:43'),
(15, 3, 'LP-FONA-003', 'FIRMADO', 5, 'FIRMADO', 5, 'storage/archivo/2017116-45743.pdf', 'kjhkhkh hkhkh khkhk khkjhkh hk hklh ljk ljlkj l lkjl', 'pdf1.pdf', '2017-11-06 08:57:43', '2017-11-06 08:57:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(10) UNSIGNED NOT NULL,
  `ar_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ar_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `ar_nombre`, `ar_estado`, `created_at`, `updated_at`) VALUES
(1, 'Direccion General', 1, '2017-10-23 05:51:40', '2017-10-23 06:09:01'),
(2, 'Tecnico Supervisor', 1, '2017-10-23 06:08:36', '2017-11-03 00:39:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `car_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `car_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `car_nombre`, `car_estado`, `created_at`, `updated_at`) VALUES
(1, 'Gerente General', 1, '2017-10-23 06:18:29', '2017-10-23 06:18:29'),
(2, 'Sub Gerente', 1, '2017-10-23 06:18:42', '2017-11-03 00:41:06'),
(3, 'Técnico de Sistemas', 1, '2017-10-23 06:18:55', '2017-10-23 06:18:55'),
(4, 'Jefe de Sistemas', 1, '2017-10-23 06:19:07', '2017-10-23 06:19:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cites`
--

CREATE TABLE `cites` (
  `id` int(10) UNSIGNED NOT NULL,
  `cit_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cit_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cit_correlativo` int(11) NOT NULL,
  `cit_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cites`
--

INSERT INTO `cites` (`id`, `cit_descripcion`, `cit_sigla`, `cit_correlativo`, `cit_estado`, `created_at`, `updated_at`) VALUES
(1, 'La Paz', 'LP-FONA-', 12, 1, '2017-10-10 04:00:00', '2017-11-05 13:46:12'),
(2, 'Oruro', 'OR-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(3, 'Santa Cruz', 'SC-FONA-', 2, 1, '2017-10-10 04:00:00', '2017-10-24 17:49:10'),
(4, 'Chuquisaca', 'CH-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(5, 'Potosi', 'PT-FONA', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(6, 'Cochabamba', 'CBBA-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(7, 'Pando', 'PA-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(8, 'Beni', 'BE-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(9, 'Tarija', 'TJ-FONA-', 0, 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `com_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `com_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `com_nombre`, `com_descripcion`, `com_estado`, `created_at`, `updated_at`) VALUES
(1, 'Componente 1', 'Descripcion del componente 1', 1, '2017-10-23 06:30:03', '2017-11-03 00:49:17'),
(2, 'Componente 2', 'DEscripcion del componente 2', 1, '2017-10-23 06:30:03', '2017-10-23 06:30:03'),
(3, 'Componente 3', 'Descripcion del componente 3', 1, '2017-10-23 06:30:03', '2017-10-23 06:30:03'),
(4, 'Componente 4', 'Descrpcion del Componente 4', 1, '2017-10-23 06:30:03', '2017-10-23 06:30:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `dep_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dep_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `dep_nombre`, `dep_descripcion`, `dep_estado`, `created_at`, `updated_at`) VALUES
(1, 'LP', 'La Paz', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(2, 'OR', 'Oruro', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(3, 'CBBA', 'Cochabamba', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(4, 'SC', 'Santa Cruz', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(5, 'CH', 'Chuquisaca', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(6, 'TJ', 'Tarija', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(7, 'PT', 'Potosi', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(8, 'BE', 'Beni', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(9, 'PA', 'Pando', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE `entidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `ent_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ent_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ent_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`id`, `ent_nombre`, `ent_sigla`, `ent_estado`, `created_at`, `updated_at`) VALUES
(1, 'Gobierno Autonomo Municipal de El Alto', 'GAMEA', 1, '2017-10-22 08:54:03', '2017-10-22 08:54:03'),
(2, 'Gobierno Autonomo Municipal de La Paz', 'GAMLP', 1, '2017-10-22 10:46:33', '2017-10-23 01:19:22'),
(3, 'Gobierno Autonomo Municipal de Achocalla', 'GAMA', 1, '2017-10-23 01:00:12', '2017-10-23 01:00:12'),
(4, 'Gobierno Autonomo Municipal de Cochabamba', 'GAMCBBA', 1, '2017-10-23 01:16:54', '2017-11-03 00:09:47'),
(5, 'Gobierno Autonomo Municipal de Patacamaya', 'GAMP', 1, '2017-10-23 02:37:01', '2017-11-03 00:55:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_10_11_203124_entrust_setup_tables', 1),
('2017_10_11_212754_create_table_solicitudes', 1),
('2017_10_13_021048_create_entidades_table', 1),
('2017_10_19_222710_create_table_cites', 1),
('2017_10_21_233513_create_table_componentes', 1),
('2017_10_22_001841_create_table_reglamentos', 1),
('2017_10_22_004053_create_table_departamentos', 1),
('2017_10_22_004247_create_table_provincias', 1),
('2017_10_22_010317_create_table_municipios', 1),
('2017_10_22_020202_create_table_cargos', 1),
('2017_10_22_020218_create_table_areas', 1),
('2017_10_23_135711_add_column_user_tipo', 2),
('2017_10_24_053454_create_table_archivos', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipios`
--

CREATE TABLE `municipios` (
  `id` int(10) UNSIGNED NOT NULL,
  `idprovincia` int(10) UNSIGNED NOT NULL,
  `mun_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mun_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `municipios`
--

INSERT INTO `municipios` (`id`, `idprovincia`, `mun_nombre`, `mun_estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Los Yungas', 1, '2017-10-10 04:00:00', '2017-11-03 02:39:16'),
(2, 1, 'Los Andes', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(3, 1, 'Los Yungas 2', 1, '2017-11-03 02:33:33', '2017-11-03 02:33:33'),
(4, 3, 'Municipio de sud yun', 1, '2017-11-03 02:34:42', '2017-11-03 02:35:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('edwinajahuancacallisaya@gmail.com', '8ce582d7f8d3635fc52e5137093d60a59e9797f71f5eec1b889d6c348df418d4', '2017-11-01 23:30:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE `provincias` (
  `id` int(10) UNSIGNED NOT NULL,
  `iddepto` int(10) UNSIGNED NOT NULL,
  `pro_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`id`, `iddepto`, `pro_nombre`, `pro_estado`, `created_at`, `updated_at`) VALUES
(1, 1, 'Murillo', 1, '2017-10-10 04:00:00', '2017-11-03 02:55:48'),
(2, 1, 'Coroico', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(3, 1, 'Sud Yungas', 1, '2017-10-10 04:00:00', '2017-10-10 04:00:00'),
(4, 1, 'Nor Yungas', 1, '2017-11-03 02:53:24', '2017-11-03 02:53:24'),
(5, 3, 'Sacaba', 1, '2017-11-03 02:54:23', '2017-11-03 02:54:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reglamentos`
--

CREATE TABLE `reglamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `reg_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `reg_archivo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reg_estado` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `reglamentos`
--

INSERT INTO `reglamentos` (`id`, `reg_nombre`, `reg_descripcion`, `reg_archivo`, `reg_estado`, `created_at`, `updated_at`) VALUES
(1, 'Guia 1 - Reglamento de etc', 'reglamento de la guia 1', 'archivo.pdf', 1, '2017-10-10 04:00:00', '2017-11-03 00:07:22'),
(2, 'Guia 2 - Reglamento de Guias de fonabisque update', 'Guia 2 - Reglamento de Guias de fonabisque Guia 2 - Reglamento de Guias de fonabisque 4', 'storage/reglamento/2017112-192051.pdf', 1, '2017-11-02 23:20:51', '2017-11-03 00:03:59'),
(3, 'Guia 3 - Reglamento de Guias de fonabisque', 'Reglamento de Guias de fonabisque 3 Reglamento de Guias de fonabisque', 'storage/reglamento/2017112-225821.pdf', 1, '2017-11-03 02:58:21', '2017-11-03 02:58:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes`
--

CREATE TABLE `solicitudes` (
  `id` int(10) UNSIGNED NOT NULL,
  `sol_codigo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_hrsigec` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_objetivo` text COLLATE utf8_unicode_ci NOT NULL,
  `sol_justicacion` text COLLATE utf8_unicode_ci NOT NULL,
  `identidad` int(10) UNSIGNED NOT NULL,
  `sol_sigla` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iddepto` int(10) UNSIGNED NOT NULL,
  `idprovincia` int(10) UNSIGNED NOT NULL,
  `sol_municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idresponsable` int(10) UNSIGNED NOT NULL,
  `sol_montofona` decimal(18,2) NOT NULL,
  `sol_montosol` decimal(18,2) NOT NULL,
  `sol_montootro` decimal(18,2) NOT NULL,
  `sol_tiempo` int(11) NOT NULL DEFAULT '0',
  `idreglamento` int(10) UNSIGNED NOT NULL,
  `sol_respaldo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_ftecnica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sol_estado` enum('VERIFICACION','POR APROBAR','APROBADO','FINANZAS','LEGAL','FIRMADO','DEVUELTO','RECHAZADO') COLLATE utf8_unicode_ci NOT NULL,
  `sol_componente` text COLLATE utf8_unicode_ci NOT NULL,
  `iduregistra` int(10) UNSIGNED NOT NULL,
  `iduactualiza` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `solicitudes`
--

INSERT INTO `solicitudes` (`id`, `sol_codigo`, `sol_hrsigec`, `sol_tipo`, `sol_nombre`, `sol_objetivo`, `sol_justicacion`, `identidad`, `sol_sigla`, `iddepto`, `idprovincia`, `sol_municipio`, `idresponsable`, `sol_montofona`, `sol_montosol`, `sol_montootro`, `sol_tiempo`, `idreglamento`, `sol_respaldo`, `sol_ftecnica`, `sol_estado`, `sol_componente`, `iduregistra`, `iduactualiza`, `created_at`, `updated_at`) VALUES
(1, 'LP-FONA-001', '2017-0001', 'Invitacion', 'deforestacion', 'deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo deforestacion objeetivo', ' deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion deforestacion justificacion', 2, 'GAMLP', 1, 1, 'Los Andes, Yungas', 3, '250000.00', '260000.00', '0.00', 2, 1, 'archivo.pdf', 'archivo.pdf', 'FIRMADO', 'Componente 1, Componente 2', 1, 1, '2017-10-10 16:13:00', '2017-10-10 16:13:00'),
(2, 'LP-FONA-002', '2017-0005', 'Invitacion', 'Plantacion general', 'Objetivo Plantacion general Plantacion general Plantacion general', 'Planatacion justificacion justificacion', 1, 'GAMEA', 2, 1, 'mun1, munui2', 1, '20000.00', '270000.00', '0.00', 1, 1, 'archivo.pdf', 'archivo.pdf', 'VERIFICACION', 'Componente 1, Componente 2', 1, 1, '2017-10-10 16:13:00', '2017-11-06 05:15:13'),
(3, 'LP-FONA-003', '2017-0008', 'Invitacion', 'Lorem ip us name', 'Objeivo Lorem ip us name', 'Justificacion Lorem ip us name', 3, 'GAMA', 1, 2, 'mun1, munui2', 2, '450000.00', '480000.00', '10000.00', 3, 1, 'archivo.pdf', 'archivo.pdf', 'FIRMADO', 'Componente 1, Componente 2', 1, 1, '2017-10-10 16:13:00', '2017-10-10 16:13:00'),
(4, 'LP-FONA-004', '2017-0010', 'Invitacion', 'Lorem ip us name 23', 'Obejtivo Lorem ip us name 23', 'Justificacion Lorem ip us name 23', 1, 'GAMCBBA', 3, 1, 'mun1,', 3, '170000.00', '172000.00', '0.00', 2, 1, 'archivo.pdf', 'archivo.pdf', 'VERIFICACION', 'Componente 1, Componente 2, Componente3', 1, 1, '2017-10-10 16:13:00', '2017-11-06 05:06:40'),
(5, '', '', 'Invitación', 'Mi proyecto de Santa cruz', 'objetivo Mi proyecto de Santa cruz', '', 2, '', 1, 1, 'Los Andes,Los Yungas,', 1, '1000.00', '1200.00', '0.00', 1, 1, '', '', 'APROBADO', 'Array', 4, 4, '2017-10-24 19:11:13', '2017-11-06 05:35:33'),
(6, 'LP-FONA-0004', '2017-00003', 'Invitación', 'mi nombre de proyecto principal', 'objetivo mi nombre de proyecto principal objetivo  principal objetivo', '', 2, 'GAMLP', 1, 1, 'Los Andes,Los Yungas,', 2, '3131.00', '32323.00', '323.00', 2, 1, '/tmp/phpIRb6f9', '/tmp/php4wDJDM', 'VERIFICACION', 'Componente 1,Componente 3,', 1, 1, '2017-10-30 02:20:04', '2017-11-06 05:13:15'),
(7, 'LP-FONA-0005', '2017-00004', 'Invitación', 'segundo proyecto de proyectos', 'segundo proyecto de proyectos segundo proyecto de proyectos objeticos', 'segundo proyecto de proyectos segundo proyecto de proyectos segundo proyecto de proyectos justificacion', 2, 'GAMLP', 1, 1, 'Los Andes,', 3, '45678.00', '879.00', '567.00', 3, 1, '1', '1', 'APROBADO', 'Componente 1,Componente 4,', 1, 1, '2017-10-30 02:38:29', '2017-11-06 04:43:59'),
(8, 'LP-FONA-0006', '2017-00002', 'Convocatoria', 'tercer proyecto en proceso de solitiud', 'objetivo de tercer proyecto en proceso de solitiud', 'justificaicon de tercer proyecto en proceso de solitiud', 2, 'GAMLP', 1, 1, 'Los Yungas,', 4, '6789.00', '6789.00', '678.00', 4, 1, '1', '1', 'POR APROBAR', 'Componente 4,', 1, 1, '2017-10-30 02:49:30', '2017-11-05 22:43:01'),
(9, 'LP-FONA-0007', '2017-00002', 'Convocatoria', 'cu<rto proyecto en proceso de solitiud', 'objetivo de 4fsfsf proyecto en proceso de solitiud', 'justificaicon de 4cdds dsdada d proyecto en proceso de solitiud', 2, 'GAMLP', 1, 1, 'Los Yungas,', 4, '6789.00', '6789.00', '678.00', 4, 1, 'storage/respaldo/20171029-234736.pdf', 'storage/ftecnica20171029-234736.pdf', 'POR APROBAR', 'Componente 4,', 1, 1, '2017-10-30 03:47:36', '2017-11-05 22:39:35'),
(10, 'LP-FONA-0008', '2017-00002', 'Invitación', 'hfhsff  fs fsh fshfksh fs fshf shfksh fks f skhfksfks ', 'hfhsff  fs fsh fshfksh fs fshf shfksh fks f skhfksfks jf fjslfjs fs', 'hfhsff  fs fsh fshfksh fs fshf shfksh fks f skhfksfks jf fjslfjs fs', 2, 'GAMLP', 1, 1, 'Los Andes,Los Yungas,', 5, '4567.00', '678.00', '4567.00', 6, 1, 'storage/respaldo/20171029-235552.pdf', 'storage/ftecnica20171029-235552.pdf', 'POR APROBAR', 'Componente 1,Componente 2,', 1, 1, '2017-10-30 03:55:52', '2017-11-05 22:38:51'),
(11, 'LP-FONA-0010', '2017-00001', 'Invitación', 'mi proyecto prueba de testssttest', 'mi proyecto prueba de testssttest mi proyecto prueba de testssttest', 'mi proyecto prueba de testssttest mi proyecto prueba de testssttest', 2, 'GAMLP', 1, 1, 'Los Yungas 2,', 5, '74297.00', '77997.00', '788.00', 3, 2, 'storage/respaldo/2017113-25116.pdf', 'storage/ftecnica/2017113-25116.pdf', 'DEVUELTO', 'Componente 4,', 3, 3, '2017-11-03 06:51:16', '2017-11-03 06:51:16'),
(12, 'LP-FONA-0011', '2017-00003', 'Invitación', 'prueba del proyecto para implementar', 'prueba del proyecto para implementar objetivo masmas', 'prueba del proyecto para implementar justificacion', 2, 'GAMLP', 1, 3, 'Municipio de sud yun,', 4, '7797.00', '779797.00', '789798.00', 3, 3, 'storage/respaldo/2017113-3115.pdf', 'storage/ftecnica/2017113-3115.pdf', 'FINANZAS', 'Componente 1,Componente 3,', 3, 3, '2017-11-03 07:11:05', '2017-11-03 15:31:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `id_profesion` int(10) UNSIGNED NOT NULL,
  `id_cargo` int(10) UNSIGNED NOT NULL,
  `id_area` int(10) UNSIGNED NOT NULL,
  `us_depto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_cuenta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `us_estado` tinyint(1) NOT NULL DEFAULT '1',
  `us_obs` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `us_tipo` enum('ADMINISTRADOR DEL SISTEMA','TECNICO PLANIFICACION','JEFE PLANIFICACION','ADMINISTRACION FINANCIERA','ASESOR LEGAL') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `us_carnet`, `us_expedido`, `us_nombre`, `us_paterno`, `us_materno`, `us_nacimiento`, `us_genero`, `us_telefono`, `us_celular`, `email`, `id_profesion`, `id_cargo`, `id_area`, `us_depto`, `us_foto`, `us_cuenta`, `password`, `us_estado`, `us_obs`, `remember_token`, `created_at`, `updated_at`, `us_tipo`) VALUES
(1, '123', 'LP', 'juan', 'acho', 'ayala', '2017-09-09', 'Masculino', 0, 0, 'edwinajahuancacallisaya@gmail.com', 1, 1, 1, 'La Paz', 'storage/usuarios/20170710-12720.png', 'juan.acho', '$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6', 1, '-', '6SwVel1dzc0WmzHJCbdfORHniKZrMVYfBl29zkNh4L9J749WJkaZWX6ej0DO', '2017-08-30 04:00:00', '2017-11-06 09:02:19', 'ADMINISTRADOR DEL SISTEMA'),
(2, '124', 'LP', 'carlos', 'aranibar', 'medrano', '2017-09-09', 'Masculino', 0, 0, 'carlos.aranibar@fonabosque.com.bo', 1, 1, 1, 'La Paz', 'storage/usuarios/20170710-12720.png', 'carlos.aranibar', '$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6', 1, '-', '8IEKUxSluqAqBDIXwkUwsRu35aFTL4m0bw7OUQYBaEsxV02lXFiFzewtQoaH', '2017-08-30 04:00:00', '2017-11-06 04:44:39', 'TECNICO PLANIFICACION'),
(3, '125', 'SC', 'luis', 'medrano', 'clares', '2017-09-09', 'Masculino', 0, 0, 'luis.medrano@fonabosque.com.bo', 1, 1, 1, 'La Paz', 'storage/usuarios/20170710-12720.png', 'luis.medrano', '$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6', 1, '-', 'sOGhzz3uxy9hZLlrDlAWrb9KB9IdCTVDDPH4DZB7ankgLQCxEFRitfI4wY5z', '2017-08-30 04:00:00', '2017-11-06 07:17:52', 'JEFE PLANIFICACION'),
(4, '126', 'TJ', 'maria', 'reyes', 'reyes', '2017-09-09', 'Femenina', 0, 0, 'maria.reyes@fonabosque.com.bo', 1, 1, 1, 'Santa Cruz', 'storage/usuarios/20170710-12720.png', 'maria.reyes', '$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6', 1, '-', 'YhCyTPfGml9ezJBhvuOjf6ONjzKzHIwHgs5JmNvQ5UwoXYELfgz7Zw93VIVP', '2017-08-30 04:00:00', '2017-11-06 07:23:00', 'ADMINISTRACION FINANCIERA'),
(5, '127', 'PT', 'yepeto', 'ruiz', 'salas', '2017-09-09', 'Masculino', 0, 0, 'yepeto.ruiz@fonabosque.com.bo', 1, 1, 1, 'La Paz', 'storage/usuarios/20170710-12720.png', 'yepeto.ruiz', '$2y$10$otNra5t605Wk.ZTlLRKKTeP4DCzvRs2eHxe3puIb3CG09GFwGzwZ6', 1, '-', 'qfhz9ycyXVGGWBEVeI405FPvYTPVImD0m9Ulv2EpPuFWSui8aRK6NEciVDri', '2017-08-30 04:00:00', '2017-11-06 09:01:18', 'ASESOR LEGAL');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivos_idsolicitud_foreign` (`idsolicitud`),
  ADD KEY `archivos_idurecibe_foreign` (`idurecibe`),
  ADD KEY `archivos_iduenvia_foreign` (`iduenvia`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `areas_ar_nombre_unique` (`ar_nombre`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cargos_car_nombre_unique` (`car_nombre`);

--
-- Indices de la tabla `cites`
--
ALTER TABLE `cites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `componentes_com_nombre_unique` (`com_nombre`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entidades`
--
ALTER TABLE `entidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `entidades_ent_nombre_unique` (`ent_nombre`);

--
-- Indices de la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `municipios_idprovincia_foreign` (`idprovincia`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provincias_iddepto_foreign` (`iddepto`);

--
-- Indices de la tabla `reglamentos`
--
ALTER TABLE `reglamentos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reglamentos_reg_nombre_unique` (`reg_nombre`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `solicitudes_sol_codigo_unique` (`sol_codigo`),
  ADD KEY `solicitudes_idresponsable_foreign` (`idresponsable`),
  ADD KEY `solicitudes_iduregistra_foreign` (`iduregistra`),
  ADD KEY `solicitudes_iduactualiza_foreign` (`iduactualiza`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_us_carnet_unique` (`us_carnet`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_us_cuenta_unique` (`us_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `cites`
--
ALTER TABLE `cites`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `entidades`
--
ALTER TABLE `entidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `municipios`
--
ALTER TABLE `municipios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `provincias`
--
ALTER TABLE `provincias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `reglamentos`
--
ALTER TABLE `reglamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_idsolicitud_foreign` FOREIGN KEY (`idsolicitud`) REFERENCES `solicitudes` (`id`),
  ADD CONSTRAINT `archivos_iduenvia_foreign` FOREIGN KEY (`iduenvia`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `archivos_idurecibe_foreign` FOREIGN KEY (`idurecibe`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `municipios`
--
ALTER TABLE `municipios`
  ADD CONSTRAINT `municipios_idprovincia_foreign` FOREIGN KEY (`idprovincia`) REFERENCES `provincias` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `provincias_iddepto_foreign` FOREIGN KEY (`iddepto`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes`
--
ALTER TABLE `solicitudes`
  ADD CONSTRAINT `solicitudes_idresponsable_foreign` FOREIGN KEY (`idresponsable`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitudes_iduactualiza_foreign` FOREIGN KEY (`iduactualiza`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `solicitudes_iduregistra_foreign` FOREIGN KEY (`iduregistra`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
