-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-02-2019 a las 03:06:42
-- Versión del servidor: 5.7.17-log
-- Versión de PHP: 5.6.30

DROP DATABASE IF EXISTS lagoma;
CREATE SCHEMA `lagoma` DEFAULT CHARACTER SET utf8 ;
USE `lagoma`;


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `lagoma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `articulo` varchar(255) DEFAULT NULL,
  `precioNeto` varchar(10) DEFAULT NULL,
  `puCompra` varchar(10) DEFAULT NULL,
  `codigo_barras` varchar(50) DEFAULT NULL,
  `stock_min` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO lagoma.inventario (`idInventario`,`cantidad`,`articulo`,`precioNeto`,`puCompra`,`codigo_barras`,`stock_min`) VALUES
   (1,5000,'10 cajas de 500 hojas tamaño carta marca office depot','699','0.1398',NULL,NULL),
   (2,10,'Acuarela con 12 colores makico','83','8.3',NULL,NULL),
   (3,200,'Acuarela con 12 colores marca vinci','58','11.6','321',NULL),
   (4,10,'Acuarela con 6 colores makico','59','5.9',NULL,NULL),
   (5,2,'Acuarelas con 12 colores bombin','20','10',NULL,NULL),
   (6,2,'Adorno calabaza','46.98','23.49',NULL,NULL),
   (7,100,'Adorno hueso','28.19','14.095','123',NULL),
   (8,5,'Album cuerpos geometricos','107.8','21.56',NULL,NULL),
   (9,1,'Archivero licho','49.9','49.9',NULL,NULL),
   (10,20,'Arillo metalico 5/16','45.7','2.285',NULL,NULL),
   (11,23,'Arillo metalico 5/8','112.1','4.87391304',NULL,NULL),
   (12,94,'Barra de silicon','117.75','1.25265957',NULL,NULL),
   (13,10,'Bicolor grueso marca leoncito','54.5','5.45',NULL,NULL),
   (14,250,'Biografias','56.26','0.22504',NULL,NULL),
   (15,150,'Block milimetrico con 50 hojas cada uno','43.8','0.292',NULL,NULL),
   (16,13,'Boligrafo azul punto fino con 13 piezas','31.62','2.43230769',NULL,NULL),
   (17,12,'Boligrafo azul punto mediano con 12 piezas','25','2.08333333',NULL,NULL),
   (18,13,'Boligrafo negro punto fino con 13 piezas','31.62','2.43230769',NULL,NULL),
   (19,12,'Boligrafo negro punto mediano con 12 piezas','25','2.08333333',NULL,NULL),
   (20,13,'Boligrafo rojo punto fino con 13 piezas','31.62','2.43230769',NULL,NULL),
   (21,12,'Boligrafo rojo punto mediano con 12 piezas','25','2.08333333',NULL,NULL),
   (22,2,'Bolsa de globo','35.8','17.9',NULL,NULL),
   (23,100,'Bolsa de globo surtido','75','0.75',NULL,NULL),
   (24,8,'Bolsa de regalo chico delgado','32','4',NULL,NULL),
   (25,5,'Bolsas de regalo chico grueso','33.25','6.65',NULL,NULL),
   (26,7,'Bolsa de regalo Grande delgado','56','8',NULL,NULL),
   (27,1,'Bolsa de regalo Grande grueso','12','12',NULL,NULL),
   (28,5,'Bolsa de regalo mediano delgado','40','8',NULL,NULL),
   (29,4,'Bolsa de regalo mediano grueso','24.3','6.075',NULL,NULL),
   (30,6,'Bolsa de regalo mini','24','4',NULL,NULL),
   (31,1,'Bolsa pony carton','10','10',NULL,NULL),
   (32,50,'Broche baco','38.5','0.77',NULL,NULL),
   (33,3,'Calculadora leoncito chica','48','16',NULL,NULL),
   (34,1,'Calcomania smiley ','10.57','10.57',NULL,NULL),
   (35,10,'Calcomania heart face','10.57','1.057',NULL,NULL),
   (36,4,'Calcomania grande','13.41','3.3525',NULL,NULL),
   (37,1,'Carrito rojo','17.9','17.9',NULL,NULL),
   (38,150,'Carta poder','63.06','0.4204',NULL,NULL),
   (39,10,'Cartulina','45.02','4.502',NULL,NULL),
   (40,10,'Cartulina fluorecente','49.56','4.956',NULL,NULL),
   (41,54,'Cartulina blanca mayoreo','','0',NULL,NULL),
   (42,46,'Cartulinas Blancas','130','2.82608695',NULL,NULL),
   (43,10,'Cartulina iris azul','45.02','4.502',NULL,NULL),
   (44,10,'Cartulina iris morado','45.02','4.502',NULL,NULL),
   (45,10,'Cartulina iris naranja','45.02','4.502',NULL,NULL),
   (46,10,'Cartulina iris verde limon','45.02','4.502',NULL,NULL),
   (47,10,'chaquira surtida','13.78','1.378',NULL,NULL),
   (48,60,'Chaquiron surtido','68.9','1.14833333',NULL,NULL),
   (49,6,'Cinta canela','42','7',NULL,NULL),
   (50,6,'Cinta transparente','42.32','7.05333333',NULL,NULL),
   (51,2,'Cinta de aislar','20.25','10.125',NULL,NULL),
   (52,36,'Clip mariposa','48.2','1.33888888',NULL,NULL),
   (53,100,'Clips estandar','11.8','0.118',NULL,NULL),
   (54,10,'Colores Bolex fantasia corto de 6 piezas','35','3.5',NULL,NULL),
   (55,10,'Colores Leoncito 12 piezas cortos','82.2','8.22',NULL,NULL),
   (56,5,'Colores Leoncito 12 piezas largos','82.5','16.5',NULL,NULL),
   (57,3,'Compas brazo corto','51.21','17.07',NULL,NULL),
   (58,10,'Compas plegalizada','96.51','9.651',NULL,NULL),
   (59,5,'Corrector aqua korest brocha','51.5','10.3',NULL,NULL),
   (60,12,'Corrector aqua Pelikan','83.45','6.95416666',NULL,NULL),
   (61,6,'Corrector tipo pluma manny 10 ml','101.7','16.95',NULL,NULL),
   (62,5,'Crayon croyola delgado con 6 piezas','39.85','7.97',NULL,NULL),
   (63,3,'Crayon jocar con 24 piezas','39','13',NULL,NULL),
   (64,10,'Crepe 10 colores surtidos','41.6','4.16',NULL,NULL),
   (65,1,'Cuaderno frances cuadro grande','10','10',NULL,NULL),
   (66,1,'Cuaderno frances raya','10','10',NULL,NULL),
   (67,1,'Cuaderno italiano cuadro grande','11','',NULL,NULL),
   (68,2,'Cuaderno Profesional raya','55.96','27.98',NULL,NULL),
   (69,2,'Cuaderno Profesional cuadro grande','55.96','27.98',NULL,NULL),
   (70,2,'Cuaderno profesional scribe cuadro chico','30','15',NULL,NULL),
   (71,2,'Cuaderno profesional scribe doble raya','30','15',NULL,NULL),
   (72,4,'Cuaderno profesional scribe raya','60','15',NULL,NULL),
   (73,25,'Cuaderno profesional cuadro grande','280','11.2',NULL,NULL),
   (74,5,'Cuadernos profesional 100 hojas Raya 3d','75','15',NULL,NULL),
   (75,60,'Cubierta color mixto','131','2.18333333',NULL,NULL),
   (76,50,'Cubierta transparente raya cristal','118.09','2.3618',NULL,NULL),
   (77,10,'Cutter chico','22.5','2.25',NULL,NULL),
   (78,12,'Diamantina fluorecente surtida','24.12','2.01',NULL,NULL),
   (79,12,'Diamantina normal surtida','14.47','1.20583333',NULL,NULL),
   (80,NULL,'Diccionario','','',NULL,NULL),
   (81,5,'Diurex 12 *','23','4.6',NULL,NULL),
   (82,10,'Diurex de colores','15','1.5',NULL,NULL),
   (83,1,'Engrapadora','17.9','17.9',NULL,NULL),
   (84,20,'Etiqueta escolar ','49.74','2.487',NULL,NULL),
   (85,24,'Foamy carta camello','32.57','1.35708333',NULL,NULL),
   (86,24,'Foamy carta negro','32.57','1.35708333',NULL,NULL),
   (87,24,'Foamy de colores','49','2.04166666',NULL,NULL),
   (88,24,'Foamy surtido color','36.47','1.51958333',NULL,NULL),
   (89,2,'Foamy tamaño carta multicolor','39','19.5',NULL,NULL),
   (90,10,'Foamy carta diamantado azul','42.46','4.246',NULL,NULL),
   (91,10,'Foamy carta diamantado dorado','42.46','4.246',NULL,NULL),
   (92,10,'Foamy carta diamantado plata','42.46','4.246',NULL,NULL),
   (93,10,'Foamy carta diamantado rojo','42.46','4.246',NULL,NULL),
   (94,10,'Foamy carta diamantado rosa','42.46','4.246',NULL,NULL),
   (95,10,'Foamy carta diamantado verde limon','42.46','4.246',NULL,NULL),
   (96,25,'Folder carta  color','72.15','2.886',NULL,NULL),
   (97,10,'Folder carta costilla colores','66.24','6.624',NULL,NULL),
   (98,100,'Folder tamaño carta beige','120','1.2',NULL,NULL),
   (99,25,'Folder tamaño oficio','38.26','1.5304',NULL,NULL),
   (100,5,'Gis blanco','25.29','5.058',NULL,NULL),
   (101,5,'Gis de color','33.58','6.716',NULL,NULL),
   (102,30,'Goma leoncito','37.45','1.24833333',NULL,NULL),
   (103,24,'Goma migajon manny','96.6','4.025',NULL,NULL),
   (104,3,'Goma tipo lapiz con punta','31.8','10.6',NULL,NULL),
   (105,5,'Gomas tipo lapiz','72.75','14.55',NULL,NULL),
   (106,24,'Grapas','35.9','1.49583333',NULL,NULL),
   (107,5,'Hallowen figura','17.9','3.58',NULL,NULL),
   (108,1,'Hallowen x metro','17.9','17.9',NULL,NULL),
   (109,3,'Hilo elastico','28.33','9.44333333',NULL,NULL),
   (110,100,'Hoja color café','35.75','0.3575',NULL,NULL),
   (111,100,'Hoja color morado','35.75','0.3575',NULL,NULL),
   (112,100,'Hoja color negro','35.75','0.3575',NULL,NULL),
   (113,100,'Hojas de color t/ carta color fuerte','35','0.35',NULL,NULL),
   (114,100,'Hojas de color t/ carta color pastel','30','0.3',NULL,NULL),
   (115,100,'Hojas de color','37.31','0.3731',NULL,NULL),
   (116,50,'Hojas de diseño','56.3','1.126',NULL,NULL),
   (117,500,'Hojas tamaño oficio','102.6','0.2052',NULL,NULL),
   (118,2,'Hule cristal mini rollo','','',NULL,NULL),
   (119,28,'Hule cristal mini rollo','84.4','3.01428571',NULL,NULL),
   (120,10,'Iman redondo ','28.94','2.894',NULL,NULL),
   (121,10,'Imanes numero 10','11.02','1.102',NULL,NULL),
   (122,3,'Juego de Geometria Leoncito Escolar','41.85','13.95',NULL,NULL),
   (123,25,'Lamina de tabla periodica','39.73','1.5892',NULL,NULL),
   (124,25,'Laminas del sistema solar','32','1.28',NULL,NULL),
   (125,25,'Lamina del esqueleto','39.15','1.566',NULL,NULL),
   (126,25,'Lamina Sexualidad 2','39.15','1.566',NULL,NULL),
   (127,25,'Lamina Celula vegetal','39.15','1.566',NULL,NULL),
   (128,25,'Lamina sistema nervioso','39.15','1.566',NULL,NULL),
   (129,25,'Lamina celula animal','39.15','1.566',NULL,NULL),
   (130,5,'Lapiceras dobles ','100','20',NULL,NULL),
   (131,12,'Lapiz duo dixon rojo y negro','48.16','4.01333333',NULL,NULL),
   (132,12,'Lapicero mirado 0.5 mm','55.8','4.65',NULL,NULL),
   (133,36,'Lapiz bic evolution surtido','75.79','2.10527777',NULL,NULL),
   (134,15,'Lapiz jocar con 5 piezas ecologico','34.5','2.3',NULL,NULL),
   (135,12,'Lapiz mirado # 2','39.6','3.3',NULL,NULL),
   (136,12,'Lapiz mirado # 2/5','39.6','3.3',NULL,NULL),
   (137,10,'Lentejuela surtida','12.06','1.206',NULL,NULL),
   (138,1200,'ligas arcoirirs 18  80 gramos','54','0.045',NULL,NULL),
   (139,100,'Limpia pipas (chenille ) rojo','20.11','0.2011',NULL,NULL),
   (140,100,'Limpia pipas (chenille ) plata','20.11','0.2011',NULL,NULL),
   (141,100,'Limpia pipas (chenille ) dorado','20.11','0.2011',NULL,NULL),
   (142,100,'Limpia pipas (chenille ) verde','20.11','0.2011',NULL,NULL),
   (143,100,'Liston celo magico mediano','54.26','0.5426',NULL,NULL),
   (144,100,'Liston celomagico','20.01','0.2001',NULL,NULL),
   (145,100,'Mapa de la republica mexicana con nombres','46.48','0.4648',NULL,NULL),
   (146,5,'Mapa del Continente Americano con division politica, con nombres','','',NULL,NULL),
   (147,100,'Mapa Morelos','46.48','0.4648',NULL,NULL),
   (148,100,'Mapamundi','46.52','0.4652',NULL,NULL),
   (149,100,'Mapamundi','46.48','0.4648',NULL,NULL),
   (150,2,'Mascara halloween','35.8','17.9',NULL,NULL),
   (151,12,'Marcador de agua con 12 colores ','49.9','4.15833333',NULL,NULL),
   (152,4,'Marcador de pizarron','29.9','7.475',NULL,NULL),
   (153,12,'Marcador de textos varios colores','77.55','6.4625',NULL,NULL),
   (154,6,'Marcador permanente color azul jocar','35.1','5.85',NULL,NULL),
   (155,6,'Marcador permanente color negro jocar','37.8','6.3',NULL,NULL),
   (156,8,'Marcadores permanentes','17.9','2.2375',NULL,NULL),
   (157,6,'Marcatextos amarillo','40.38','6.73',NULL,NULL),
   (158,6,'Marcatextos naranja','40.38','6.73',NULL,NULL),
   (159,10,'Mica de 66*50 delgado ','103.82','10.382',NULL,NULL),
   (160,25,'Mica termica 10x14.5 cm (en papel)','43.79','1.7516',NULL,NULL),
   (161,10,'Mica termica carta 10 mm','92.1','9.21',NULL,NULL),
   (162,15,'Mica termica carta 8 mm','113.02','7.53466666',NULL,NULL),
   (163,50,'Moño de colores','22.01','0.4402',NULL,NULL),
   (164,1,'Muñeca','17.9','17.9',NULL,NULL),
   (165,1,'Muñeca barbie','20','',NULL,NULL),
   (166,10,'Ojos adheribles','8.96','0.896',NULL,NULL),
   (167,10,'Ojos movibles','9.99','0.999',NULL,NULL),
   (168,100,'Opalina blanca','45.41','0.4541',NULL,NULL),
   (169,2,'Oso de peluche con dulce','60','',NULL,NULL),
   (170,200,'Pagare','40.88','0.2044',NULL,NULL),
   (171,200,'Palo abatelenguas','43.98','0.2199',NULL,NULL),
   (172,42,'Palo de madera','32.46','0.77285714',NULL,NULL),
   (173,25,'Papel Bond cuadrado grande','35','1.4',NULL,NULL),
   (174,100,'Papel carbon , calca','84.41','0.8441',NULL,NULL),
   (175,25,'Papel cartoncillo negro','80.04','3.2016',NULL,NULL),
   (176,5,'Papel cascaron 1/4','24.48','4.896',NULL,NULL),
   (177,10,'Papel cascaron 1/8','24.48','2.448',NULL,NULL),
   (178,10,'Papel cascaron 1/8','21.5','2.15',NULL,NULL),
   (179,25,'Papel celofan','76.56','3.0624',NULL,NULL),
   (180,100,'Papel china ','70','0.7',NULL,NULL),
   (181,100,'Papel china mediano picado','105.56','1.0556',NULL,NULL),
   (182,100,'Papel china naranja','70.76','0.7076',NULL,NULL),
   (183,10,'Papel crepe café','35.38','3.538',NULL,NULL),
   (184,10,'Papel crepe azul claro','35.38','3.538',NULL,NULL),
   (185,10,'Papel crepe azul fuerte','35.38','3.538',NULL,NULL),
   (186,10,'Papel crepe amarillo','35.38','3.538',NULL,NULL),
   (187,10,'Papel crepe geranio','35.38','3.538',NULL,NULL),
   (188,10,'Papel crepe rojo','35.38','3.538',NULL,NULL),
   (189,10,'Papel crepe verde','35.38','3.538',NULL,NULL),
   (190,3,'Papel crepe','','',NULL,NULL),
   (191,10,'Papel crepe morado','35.38','3.538',NULL,NULL),
   (192,25,'Papel lustre azul celeste','33.64','1.3456',NULL,NULL),
   (193,25,'Papel lustre rosa mexicano','33.64','1.3456',NULL,NULL),
   (194,3,'Pegamento Bully 35 gramos','19.8','6.6',NULL,NULL),
   (195,3,'Pegamento Bully 55 gramos','29.55','9.85',NULL,NULL),
   (196,6,'Pegamento lapiz adeshivo 22 gramos Pritt','110.88','18.48',NULL,NULL),
   (197,6,'Pegamento lapiz adeshivo 8 gramos dixon','27.84','4.64',NULL,NULL),
   (198,30,'Pegamento lapiz adeshivo 8 gramos dixon','164.6','5.48666666',NULL,NULL),
   (199,30,'Pegamento makico 20 gramos','41.1','1.37',NULL,NULL),
   (200,1,'Pelota payaso decorada','7.97','7.97',NULL,NULL),
   (201,4,'Pelota payaso lisa','26.03','6.5075',NULL,NULL),
   (202,3,'Perforadoras 2 agujeros','48.6','16.2',NULL,NULL),
   (203,50,'Pincel economico','54.9','1.098',NULL,NULL),
   (204,7,'Pintura acrilica','30.45','4.35',NULL,NULL),
   (205,10,'Pintura acrilica de frasco 20 mililitros marca creatin','45','4.5',NULL,NULL),
   (206,1,'Pistola de agua','30','',NULL,NULL),
   (207,3,'Pistolas de silicon chica','110.4','36.8',NULL,NULL),
   (208,5,'Placa de unicel 1cm 50x25','10.96','2.192',NULL,NULL),
   (209,5,'Placa de unicel 2cm 25x25','10.96','2.192',NULL,NULL),
   (210,2,'Plastico contac transparente','14.24','7.12',NULL,NULL),
   (211,2,'Plastico contact azul','35.15','17.575',NULL,NULL),
   (212,5,'Plastilina pelikan 180 gramos','29.12','5.824',NULL,NULL),
   (213,10,'Plastilinas caja baco','91','9.1',NULL,NULL),
   (214,10,'Pluma Surtida de color','25','2.5',NULL,NULL),
   (215,10,'Pluma surtida de colores 0.7 ','31.47','3.147',NULL,NULL),
   (216,6,'Plumas bic punto mediano','','',NULL,NULL),
   (217,24,'Plumones delgado aqua','45.45','1.89375',NULL,NULL),
   (218,1,'Plumones delgado aqua con 24 plumones','45.45','45.45',NULL,NULL),
   (219,100,'Protectores de Hojas tamaño carta','40','0.4',NULL,NULL),
   (220,10,'Puntillas wearever 0.5 mm con 10 tubos','65.35','6.535',NULL,NULL),
   (221,25,'Regla plastico marca arcoiris','50','2',NULL,NULL),
   (222,10,'Repuesto gomas tipo lapiz','','0',NULL,NULL),
   (223,1,'Rompecabeza foamy mariposa','9.52','9.52',NULL,NULL),
   (224,1,'Rompecabeza foamy jirafa','26.87','26.87',NULL,NULL),
   (225,25,'Sacapuntas Jocar','14.95','0.598',NULL,NULL),
   (226,2,'Shampoo frozen y avengers','35.8','17.9',NULL,NULL),
   (227,6,'Silicon liquido 30 ml','30.28','5.04666666',NULL,NULL),
   (228,6,'Sobre tipo carta con boton kikomo','43.8','7.3',NULL,NULL),
   (229,6,'Sobre tipo oficio con boton kikomo','48.6','8.1',NULL,NULL),
   (230,50,'Sobre para carta','26.41','0.5282',NULL,NULL),
   (231,75,'Solicitud de empleo','38.66','0.51546666',NULL,NULL),
   (232,300,'Tarjeta 4x6 Blanco','39.45','0.1315',NULL,NULL),
   (233,300,'Tarjeta 4x6 Raya','45.41','0.15136666',NULL,NULL),
   (234,1,'Taza con chocolates','20','',NULL,NULL),
   (235,12,'Tijeras # 5','60','5',NULL,NULL),
   (236,10,'Valvula','19.99','1.999',NULL,NULL),
   (237,900,'Recarga telcel','1','1','999',NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(10) UNSIGNED ZEROFILL NOT NULL COMMENT '	',
  `curp` varchar(18) NOT NULL,
  `ap_paterno` varchar(50) NOT NULL,
  `ap_materno` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='tabla que contiene la información del personal';

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_persona`, `curp`, `ap_paterno`, `ap_materno`, `nombre`) VALUES
(0000000001, 'ABC', 'Cornelio', 'Landa', 'Brenda'),
(0000000002, '123', 'Cornelio', 'Landa', 'Isidoro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_modulos`
--

CREATE TABLE `system_modulos` (
  `id_system_modulos` int(11) NOT NULL,
  `modulo` varchar(50) DEFAULT NULL,
  `desc_modulo` varchar(150) DEFAULT NULL,
  `urlControlador` varchar(50) NOT NULL,
  `icono` varchar(30) NOT NULL,
  `classColor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `system_modulos`
--

INSERT INTO `system_modulos` (`id_system_modulos`, `modulo`, `desc_modulo`, `urlControlador`, `icono`, `classColor`) VALUES
(1, 'Config.', 'Configuración global del sistema', 'configsys', 'fa fa-gears icon', 'primary dker'),
(2, 'Inicio', 'Inicio', 'inicio', 'fa fa-home icon', 'bg-info'),
(3, 'Ventas', 'Ventas de Mostrador', 'ventas', 'fa fa-usd icon', 'bg-primary'),
(4, 'Inventario', 'Control de Inventario', 'inventario', 'fa fa-list icon', 'bg-primary');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_modulos_privilegios`
--

CREATE TABLE `system_modulos_privilegios` (
  `id_system_modulos_privilegios` int(11) NOT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1-Permitido, 2-Bloqueado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `system_modulos_privilegios`
--

INSERT INTO `system_modulos_privilegios` (`id_system_modulos_privilegios`, `id_modulo`, `id_user`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 2, 2, 1),
(6, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_submodulo`
--

CREATE TABLE `system_submodulo` (
  `id_system_submodulo` int(11) NOT NULL,
  `submodulo` varchar(255) DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `system_submodulo`
--

INSERT INTO `system_submodulo` (`id_system_submodulo`, `submodulo`, `id_modulo`) VALUES
(1, 'Pagina de inicio para la configuración del sistema', 1),
(2, 'Catalogo modulos', 1),
(3, 'Catalogo submodulos', 1),
(4, 'Catalogo usuarios', 1),
(5, 'Privilegios por modulo', 1),
(6, 'Privilegios por submodulo', 1),
(7, 'Privilegios por usuario', 1),
(8, 'Pagina de inicio-inicio', 2),
(9, 'Cambiar contraseña', 2),
(10, 'Acceso no autorizado', 2),
(11, 'Pagina de inicio ventas', 3),
(12, 'Pagina de mostrador', 4),
(13, 'Reporte general de ventas', 3),
(14, 'Reporte detallado de ventas', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_submodulo_privilegios`
--

CREATE TABLE `system_submodulo_privilegios` (
  `id_system_submodulo_privilegios` int(11) NOT NULL,
  `id_submodulo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1-Permitido, 2-Bloqueado, 3-Solo consulta'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `system_submodulo_privilegios`
--

INSERT INTO `system_submodulo_privilegios` (`id_system_submodulo_privilegios`, `id_submodulo`, `id_user`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 1, 1),
(5, 5, 1, 1),
(6, 6, 1, 1),
(7, 7, 1, 1),
(8, 8, 1, 1),
(9, 9, 1, 1),
(10, 10, 1, 1),
(11, 11, 1, 1),
(12, 12, 1, 1),
(13, 8, 2, 1),
(14, 9, 2, 1),
(15, 10, 2, 1),
(16, 2, 2, 2),
(17, 3, 2, 3),
(18, 4, 2, 1),
(19, 1, 2, 1),
(20, 5, 2, 1),
(21, 6, 2, 1),
(22, 7, 2, 1),
(23, 13, 1, 1),
(24, 14, 1, 1);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_users`
--

CREATE TABLE `system_users` (
  `id_system_users` int(11) NOT NULL,
  `id_persona` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0-Inactivo, 1-Activo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `system_users`
--

INSERT INTO `system_users` (`id_system_users`, `id_persona`, `usuario`, `password`, `status`) VALUES
(1, 0000000001, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 0000000002, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1);


--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `idVenta` int(10) NOT NULL,
  `fechaVenta` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSystemUsersVenta` int(11) NOT NULL,
  `total` float(10,2) NOT NULL,
  `efectivo` float(10,2) NOT NULL,
  `cambio` float(10,2) NOT NULL,
  `numArticulos` int(11) NOT NULL,
  `pagoP` int(11) NOT NULL,
  `nota` text
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`idVenta`);

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `idVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


CREATE TABLE `venta_detalle` (
  `idVentaDetalle` int(10) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `fechaVentaD` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSystemUsersVentaD` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idInventario` int(11) NOT NULL,
  `pu` float(10,2) NOT NULL,
  `importe` float(10,2) NOT NULL
 ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta_detalle`
  ADD PRIMARY KEY (`idVentaDetalle`);

--
-- AUTO_INCREMENT de la tabla `venta_detalle`
--
ALTER TABLE `venta_detalle`
  MODIFY `idVentaDetalle` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `system_modulos`
--
ALTER TABLE `system_modulos`
  ADD PRIMARY KEY (`id_system_modulos`);

--
-- Indices de la tabla `system_modulos_privilegios`
--
ALTER TABLE `system_modulos_privilegios`
  ADD PRIMARY KEY (`id_system_modulos_privilegios`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `system_submodulo`
--
ALTER TABLE `system_submodulo`
  ADD PRIMARY KEY (`id_system_submodulo`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `system_submodulo_privilegios`
--
ALTER TABLE `system_submodulo_privilegios`
  ADD PRIMARY KEY (`id_system_submodulo_privilegios`),
  ADD KEY `id_submodulo` (`id_submodulo`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id_system_users`),
  ADD UNIQUE KEY `UQ_system_users_usuario` (`usuario`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;
--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT COMMENT '	', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `system_modulos`
--
ALTER TABLE `system_modulos`
  MODIFY `id_system_modulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `system_modulos_privilegios`
--
ALTER TABLE `system_modulos_privilegios`
  MODIFY `id_system_modulos_privilegios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `system_submodulo`
--
ALTER TABLE `system_submodulo`
  MODIFY `id_system_submodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `system_submodulo_privilegios`
--
ALTER TABLE `system_submodulo_privilegios`
  MODIFY `id_system_submodulo_privilegios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id_system_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `system_modulos_privilegios`
--
ALTER TABLE `system_modulos_privilegios`
  ADD CONSTRAINT `FK_system_modulos_privilegios_system_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `system_modulos` (`id_system_modulos`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_system_modulos_privilegios_system_users` FOREIGN KEY (`id_user`) REFERENCES `system_users` (`id_system_users`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `system_submodulo`
--
ALTER TABLE `system_submodulo`
  ADD CONSTRAINT `FK_system_submodulo_system_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `system_modulos` (`id_system_modulos`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `system_submodulo_privilegios`
--
ALTER TABLE `system_submodulo_privilegios`
  ADD CONSTRAINT `FK_system_submodulo_privilegios_system_submodulo` FOREIGN KEY (`id_submodulo`) REFERENCES `system_submodulo` (`id_system_submodulo`) ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_system_submodulo_privilegios_system_users` FOREIGN KEY (`id_user`) REFERENCES `system_users` (`id_system_users`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `system_users`
--
ALTER TABLE `system_users`
  ADD CONSTRAINT `FK_system_users_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE;
