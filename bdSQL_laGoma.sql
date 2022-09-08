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
  `porcentaje` varchar(10) DEFAULT NULL,
  `puVenta` varchar(10) DEFAULT NULL,
  `ventaTotal` varchar(10) DEFAULT NULL,
  `utilidad` varchar(10) DEFAULT NULL,
  `vendidas` int(11) DEFAULT NULL,
  `existencia` int(11) DEFAULT NULL,
  `efectivo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `cantidad`, `articulo`, `precioNeto`, `puCompra`, `porcentaje`, `puVenta`, `ventaTotal`, `utilidad`, `vendidas`, `existencia`, `efectivo`) VALUES
(1, 5000, '10 cajas de 500 hojas tamaño carta marca office depot', '699', '0.1398', '0.0699', '0.25', '1250', '551', 27, 4973, '6.75'),
(2, 10, 'Acuarela con 12 colores makico', '83', '8.3', '4.15', '13', '130', '47', NULL, 10, '0'),
(3, 5, 'Acuarela con 12 colores marca vinci', '58', '11.6', '5.8', '17', '85', '27', NULL, 5, '0'),
(4, 10, 'Acuarela con 6 colores makico', '59', '5.9', '2.95', '8', '80', '21', NULL, 10, '0'),
(5, 2, 'Acuarelas con 12 colores bombin', '20', '10', '5', '15', '30', '10', NULL, 2, '0'),
(6, 2, 'Adorno calabaza', '46.98', '23.49', '11.745', '28', '56', '9.02', NULL, 2, '0'),
(7, 2, 'Adorno hueso', '28.19', '14.095', '7.0475', '18', '36', '7.81', NULL, 2, '0'),
(8, 5, 'Album cuerpos geometricos', '107.8', '21.56', '10.78', '40', '200', '92.2', NULL, 5, '0'),
(9, 1, 'Archivero licho', '49.9', '49.9', '24.95', '5', '5', '', NULL, 1, '0'),
(10, 20, 'Arillo metalico 5/16', '45.7', '2.285', '1.1425', '4', '80', '34.3', 1, 19, '4'),
(11, 23, 'Arillo metalico 5/8', '112.1', '4.87391304', '2.43695652', '8', '184', '71.9', NULL, 23, '0'),
(12, 94, 'Barra de silicon', '117.75', '1.25265957', '0.62632978', '2.5', '235', '117.25', NULL, 94, '0'),
(13, 10, 'Bicolor grueso marca leoncito', '54.5', '5.45', '2.725', '10', '100', '45.5', NULL, 10, '0'),
(14, 250, 'Biografias', '56.26', '0.22504', '0.11252', '1.5', '375', '318.74', NULL, 250, '0'),
(15, 150, 'Block milimetrico con 50 hojas cada uno', '43.8', '0.292', '0.146', '1', '150', '106.2', NULL, 150, '0'),
(16, 13, 'Boligrafo azul punto fino con 13 piezas', '31.62', '2.43230769', '1.21615384', '5', '65', '33.38', NULL, 13, '0'),
(17, 12, 'Boligrafo azul punto mediano con 12 piezas', '25', '2.08333333', '1.04166666', '4', '48', '23', NULL, 12, '0'),
(18, 13, 'Boligrafo negro punto fino con 13 piezas', '31.62', '2.43230769', '1.21615384', '5', '65', '33.38', NULL, 13, '0'),
(19, 12, 'Boligrafo negro punto mediano con 12 piezas', '25', '2.08333333', '1.04166666', '4', '48', '23', NULL, 12, '0'),
(20, 13, 'Boligrafo rojo punto fino con 13 piezas', '31.62', '2.43230769', '1.21615384', '5', '65', '33.38', NULL, 13, '0'),
(21, 12, 'Boligrafo rojo punto mediano con 12 piezas', '25', '2.08333333', '1.04166666', '4', '48', '23', NULL, 12, '0'),
(22, 2, 'Bolsa de globo', '35.8', '17.9', '8.95', '26', '52', '16.2', NULL, 2, '0'),
(23, 100, 'Bolsa de globo surtido', '75', '0.75', '0.375', '1', '100', '25', 45, 55, '45'),
(24, 8, 'Bolsa de regalo chico delgado', '32', '4', '2', '10', '80', '48', 1, 7, '10'),
(25, 5, 'Bolsas de regalo chico grueso', '33.25', '6.65', '3.325', '10', '50', '16.75', NULL, 5, '0'),
(26, 7, 'Bolsa de regalo Grande delgado', '56', '8', '4', '20', '140', '84', NULL, 7, '0'),
(27, 1, 'Bolsa de regalo Grande grueso', '12', '12', '6', '20', '20', '8', NULL, 1, '0'),
(28, 5, 'Bolsa de regalo mediano delgado', '40', '8', '4', '15', '75', '35', NULL, 5, '0'),
(29, 4, 'Bolsa de regalo mediano grueso', '24.3', '6.075', '3.0375', '15', '60', '35.7', NULL, 4, '0'),
(30, 6, 'Bolsa de regalo mini', '24', '4', '2', '6', '36', '12', NULL, 6, '0'),
(31, 1, 'Bolsa pony carton', '10', '10', '5', '20', '20', '10', NULL, 1, '0'),
(32, 50, 'Broche baco', '38.5', '0.77', '0.385', '2', '100', '61.5', 1, 49, '2'),
(33, 3, 'Calculadora leoncito chica', '48', '16', '8', '25', '75', '27', NULL, 3, '0'),
(34, 1, 'Calcomania smiley ', '10.57', '10.57', '5.285', '15', '15', '4.43', NULL, 1, '0'),
(35, 10, 'Calcomania heart face', '10.57', '1.057', '0.5285', '2.5', '25', '14.43', NULL, 10, '0'),
(36, 4, 'Calcomania grande', '13.41', '3.3525', '1.67625', '7', '28', '14.59', NULL, 4, '0'),
(37, 1, 'Carrito rojo', '17.9', '17.9', '8.95', '25', '25', '7.1', NULL, 1, '0'),
(38, 150, 'Carta poder', '63.06', '0.4204', '0.2102', '1.5', '225', '161.94', NULL, 150, '0'),
(39, 10, 'Cartulina', '45.02', '4.502', '2.251', '6', '60', '14.98', NULL, 10, '0'),
(40, 10, 'Cartulina fluorecente', '49.56', '4.956', '2.478', '6', '60', '10.44', 3, 7, '18'),
(41, 54, 'Cartulina blanca mayoreo', '', '0', '0', '2.7777', '149.9958', '149.9958', NULL, 54, ''),
(42, 46, 'Cartulinas Blancas', '130', '2.82608695', '1.41304347', '3', '138', '8', 2, 44, '6'),
(43, 10, 'Cartulina iris azul', '45.02', '4.502', '2.251', '6', '60', '14.98', NULL, NULL, ''),
(44, 10, 'Cartulina iris morado', '45.02', '4.502', '2.251', '6', '60', '14.98', NULL, NULL, ''),
(45, 10, 'Cartulina iris naranja', '45.02', '4.502', '2.251', '6', '60', '14.98', NULL, NULL, ''),
(46, 10, 'Cartulina iris verde limon', '45.02', '4.502', '2.251', '6', '60', '14.98', NULL, NULL, ''),
(47, 10, 'chaquira surtida', '13.78', '1.378', '0.689', '2.5', '25', '11.22', NULL, 10, '0'),
(48, 60, 'Chaquiron surtido', '68.9', '1.14833333', '0.57416666', '2.5', '150', '81.1', 2, 58, '5'),
(49, 6, 'Cinta canela', '42', '7', '3.5', '12', '72', '30', NULL, 6, '0'),
(50, 6, 'Cinta transparente', '42.32', '7.05333333', '3.52666666', '13', '78', '35.68', 1, 5, '13'),
(51, 2, 'Cinta de aislar', '20.25', '10.125', '5.0625', '15', '30', '9.75', NULL, NULL, ''),
(52, 36, 'Clip mariposa', '48.2', '1.33888888', '0.66944444', '2', '72', '23.8', NULL, 36, '0'),
(53, 100, 'Clips estandar', '11.8', '0.118', '0.059', '1', '100', '88.2', NULL, 100, '0'),
(54, 10, 'Colores Bolex fantasia corto de 6 piezas', '35', '3.5', '1.75', '5.5', '55', '20', 1, 9, '5.5'),
(55, 10, 'Colores Leoncito 12 piezas cortos', '82.2', '8.22', '4.11', '13', '130', '47.8', 1, 9, '13'),
(56, 5, 'Colores Leoncito 12 piezas largos', '82.5', '16.5', '8.25', '25', '125', '42.5', 1, 4, '25'),
(57, 3, 'Compas brazo corto', '51.21', '17.07', '8.535', '25', '75', '23.79', NULL, 3, '0'),
(58, 10, 'Compas plegalizada', '96.51', '9.651', '4.8255', '15', '150', '53.49', NULL, 10, '0'),
(59, 5, 'Corrector aqua korest brocha', '51.5', '10.3', '5.15', '16', '80', '28.5', 2, 3, '32'),
(60, 12, 'Corrector aqua Pelikan', '83.45', '6.95416666', '3.47708333', '15', '180', '96.55', NULL, NULL, ''),
(61, 6, 'Corrector tipo pluma manny 10 ml', '101.7', '16.95', '8.475', '22', '132', '30.3', NULL, 6, '0'),
(62, 5, 'Crayon croyola delgado con 6 piezas', '39.85', '7.97', '3.985', '11', '55', '15.15', NULL, 5, '0'),
(63, 3, 'Crayon jocar con 24 piezas', '39', '13', '6.5', '23', '69', '30', NULL, 3, '0'),
(64, 10, 'Crepe 10 colores surtidos', '41.6', '4.16', '2.08', '5', '50', '8.4', 6, 4, '30'),
(65, 1, 'Cuaderno frances cuadro grande', '10', '10', '', '13', '13', '3', NULL, NULL, ''),
(66, 1, 'Cuaderno frances raya', '10', '10', '', '13', '13', '3', NULL, NULL, ''),
(67, 1, 'Cuaderno italiano cuadro grande', '11', '', '', '14', '14', '3', NULL, NULL, ''),
(68, 2, 'Cuaderno Profesional raya', '55.96', '27.98', '13.99', '32', '64', '8.04', NULL, NULL, ''),
(69, 2, 'Cuaderno Profesional cuadro grande', '55.96', '27.98', '13.99', '32', '64', '8.04', NULL, NULL, ''),
(70, 2, 'Cuaderno profesional scribe cuadro chico', '30', '15', '7.5', '17', '34', '4', NULL, NULL, ''),
(71, 2, 'Cuaderno profesional scribe doble raya', '30', '15', '7.5', '17', '34', '4', NULL, NULL, ''),
(72, 4, 'Cuaderno profesional scribe raya', '60', '15', '7.5', '17', '68', '8', NULL, NULL, ''),
(73, 25, 'Cuaderno profesional cuadro grande', '280', '11.2', '5.824', '17.024', '425.6', '145.6', 1, 24, '17.024'),
(74, 5, 'Cuadernos profesional 100 hojas Raya 3d', '75', '15', '7.5', '23', '115', '40', 1, 4, '23'),
(75, 60, 'Cubierta color mixto', '131', '2.18333333', '1.09166666', '6', '360', '229', NULL, 60, '0'),
(76, 50, 'Cubierta transparente raya cristal', '118.09', '2.3618', '1.1809', '5', '250', '131.91', 2, 48, '10'),
(77, 10, 'Cutter chico', '22.5', '2.25', '1.125', '8', '80', '57.5', NULL, 10, '0'),
(78, 12, 'Diamantina fluorecente surtida', '24.12', '2.01', '1.005', '3.5', '42', '17.88', NULL, 12, '0'),
(79, 12, 'Diamantina normal surtida', '14.47', '1.20583333', '0.60291666', '3', '36', '21.53', NULL, 12, '0'),
(80, NULL, 'Diccionario', '', '', '', '', '', '', NULL, 0, '0'),
(81, 5, 'Diurex 12 *', '23', '4.6', '2.3', '6', '30', '7', NULL, 5, '0'),
(82, 10, 'Diurex de colores', '15', '1.5', '0.75', '5', '50', '35', NULL, 10, '0'),
(83, 1, 'Engrapadora', '17.9', '17.9', '8.95', '25', '25', '7.1', NULL, 1, '0'),
(84, 20, 'Etiqueta escolar ', '49.74', '2.487', '1.2435', '12', '240', '190.26', NULL, 20, '0'),
(85, 24, 'Foamy carta camello', '32.57', '1.35708333', '0.67854166', '2.5', '60', '27.43', NULL, 24, '0'),
(86, 24, 'Foamy carta negro', '32.57', '1.35708333', '0.67854166', '2.5', '60', '27.43', NULL, 24, '0'),
(87, 24, 'Foamy de colores', '49', '2.04166666', '1.02083333', '2.5', '60', '11', NULL, 24, '0'),
(88, 24, 'Foamy surtido color', '36.47', '1.51958333', '0.75979166', '2.5', '60', '23.53', 6, 18, '15'),
(89, 2, 'Foamy tamaño carta multicolor', '39', '19.5', '9.75', '20', '40', '1', NULL, 2, '0'),
(90, 10, 'Foamy carta diamantado azul', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(91, 10, 'Foamy carta diamantado dorado', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(92, 10, 'Foamy carta diamantado plata', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(93, 10, 'Foamy carta diamantado rojo', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(94, 10, 'Foamy carta diamantado rosa', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(95, 10, 'Foamy carta diamantado verde limon', '42.46', '4.246', '', '6', '60', '17.54', NULL, 10, '0'),
(96, 25, 'Folder carta  color', '72.15', '2.886', '1.443', '5', '125', '52.85', 3, 22, '15'),
(97, 10, 'Folder carta costilla colores', '66.24', '6.624', '3.312', '10', '100', '33.76', 1, 9, '10'),
(98, 100, 'Folder tamaño carta beige', '120', '1.2', '0.6', '2.5', '250', '130', NULL, 100, '0'),
(99, 25, 'Folder tamaño oficio', '38.26', '1.5304', '0.7652', '3', '75', '36.74', NULL, 25, '0'),
(100, 5, 'Gis blanco', '25.29', '5.058', '2.529', '8', '40', '14.71', NULL, 5, '0'),
(101, 5, 'Gis de color', '33.58', '6.716', '3.358', '10', '50', '16.42', 1, 4, '10'),
(102, 30, 'Goma leoncito', '37.45', '1.24833333', '0.62416666', '2', '60', '22.55', NULL, 30, '0'),
(103, 24, 'Goma migajon manny', '96.6', '4.025', '2.0125', '6', '144', '47.4', 1, 23, '6'),
(104, 3, 'Goma tipo lapiz con punta', '31.8', '10.6', '5.3', '16', '48', '16.2', NULL, 3, '0'),
(105, 5, 'Gomas tipo lapiz', '72.75', '14.55', '7.275', '20', '100', '27.25', NULL, 5, '0'),
(106, 24, 'Grapas', '35.9', '1.49583333', '0.74791666', '5', '120', '84.1', NULL, 24, '0'),
(107, 5, 'Hallowen figura', '17.9', '3.58', '1.79', '5', '25', '7.1', 2, 3, '10'),
(108, 1, 'Hallowen x metro', '17.9', '17.9', '8.95', '20', '20', '2.1', NULL, 1, '0'),
(109, 3, 'Hilo elastico', '28.33', '9.44333333', '4.72166666', '15', '45', '16.67', NULL, 3, '0'),
(110, 100, 'Hoja color café', '35.75', '0.3575', '0.17875', '1', '100', '64.25', NULL, 100, '0'),
(111, 100, 'Hoja color morado', '35.75', '0.3575', '0.17875', '1', '100', '64.25', 5, 95, '5'),
(112, 100, 'Hoja color negro', '35.75', '0.3575', '0.17875', '1', '100', '64.25', NULL, 100, '0'),
(113, 100, 'Hojas de color t/ carta color fuerte', '35', '0.35', '0.175', '1', '100', '65', 7, 93, '7'),
(114, 100, 'Hojas de color t/ carta color pastel', '30', '0.3', '0.15', '1', '100', '70', 4, 96, '4'),
(115, 100, 'Hojas de color', '37.31', '0.3731', '0.18655', '1', '100', '62.69', NULL, NULL, ''),
(116, 50, 'Hojas de diseño', '56.3', '1.126', '0.563', '2', '100', '43.7', NULL, 50, '0'),
(117, 500, 'Hojas tamaño oficio', '102.6', '0.2052', '0.1026', '0.5', '250', '147.4', NULL, 500, '0'),
(118, 2, 'Hule cristal mini rollo', '', '', '', '3', '6', '6', 2, 0, '6'),
(119, 28, 'Hule cristal mini rollo', '84.4', '3.01428571', '1.50714285', '6', '168', '83.6', 1, 27, '6'),
(120, 10, 'Iman redondo ', '28.94', '2.894', '1.447', '5', '50', '21.06', NULL, NULL, ''),
(121, 10, 'Imanes numero 10', '11.02', '1.102', '0.551', '3.5', '35', '23.98', NULL, NULL, ''),
(122, 3, 'Juego de Geometria Leoncito Escolar', '41.85', '13.95', '6.975', '25', '75', '33.15', NULL, 3, '0'),
(123, 25, 'Lamina de tabla periodica', '39.73', '1.5892', '0.7946', '3', '75', '35.27', NULL, 25, '0'),
(124, 25, 'Laminas del sistema solar', '32', '1.28', '0.64', '3', '75', '43', NULL, 25, '0'),
(125, 25, 'Lamina del esqueleto', '39.15', '1.566', '0.783', '3', '75', '35.85', NULL, NULL, ''),
(126, 25, 'Lamina Sexualidad 2', '39.15', '1.566', '0.783', '3', '75', '35.85', NULL, NULL, ''),
(127, 25, 'Lamina Celula vegetal', '39.15', '1.566', '0.783', '3', '75', '35.85', NULL, NULL, ''),
(128, 25, 'Lamina sistema nervioso', '39.15', '1.566', '0.783', '3', '75', '35.85', NULL, NULL, ''),
(129, 25, 'Lamina celula animal', '39.15', '1.566', '0.783', '3', '75', '35.85', NULL, NULL, ''),
(130, 5, 'Lapiceras dobles ', '100', '20', '10', '30', '150', '50', NULL, 5, '0'),
(131, 12, 'Lapiz duo dixon rojo y negro', '48.16', '4.01333333', '2.00666666', '8', '96', '47.84', NULL, 12, ''),
(132, 12, 'Lapicero mirado 0.5 mm', '55.8', '4.65', '2.325', '10', '120', '64.2', NULL, 12, '0'),
(133, 36, 'Lapiz bic evolution surtido', '75.79', '2.10527777', '1.05263888', '5', '180', '104.21', NULL, 36, '0'),
(134, 15, 'Lapiz jocar con 5 piezas ecologico', '34.5', '2.3', '1.15', '5', '75', '40.5', NULL, 15, '0'),
(135, 12, 'Lapiz mirado # 2', '39.6', '3.3', '1.65', '5', '60', '20.4', NULL, 12, '0'),
(136, 12, 'Lapiz mirado # 2/5', '39.6', '3.3', '1.65', '4.5', '54', '14.4', NULL, 12, '0'),
(137, 10, 'Lentejuela surtida', '12.06', '1.206', '0.603', '2.5', '25', '12.94', NULL, 10, '0'),
(138, 1200, 'ligas arcoirirs 18  80 gramos', '54', '0.045', '0.0225', '0.2', '240', '186', 20, 1180, '4'),
(139, 100, 'Limpia pipas (chenille ) rojo', '20.11', '0.2011', '', '1', '100', '79.89', NULL, NULL, ''),
(140, 100, 'Limpia pipas (chenille ) plata', '20.11', '0.2011', '', '1', '100', '79.89', NULL, NULL, ''),
(141, 100, 'Limpia pipas (chenille ) dorado', '20.11', '0.2011', '', '1', '100', '79.89', NULL, NULL, ''),
(142, 100, 'Limpia pipas (chenille ) verde', '20.11', '0.2011', '', '1', '100', '79.89', NULL, NULL, ''),
(143, 100, 'Liston celo magico mediano', '54.26', '0.5426', '0.2713', '5', '500', '445.74', NULL, 100, '0'),
(144, 100, 'Liston celomagico', '20.01', '0.2001', '0.10005', '3', '300', '279.99', NULL, 100, '0'),
(145, 100, 'Mapa de la republica mexicana con nombres', '46.48', '0.4648', '0.2324', '1', '100', '53.52', NULL, 100, '0'),
(146, 5, 'Mapa del Continente Americano con division politica, con nombres', '', '', '', '1', '5', '5', 1, 4, '1'),
(147, 100, 'Mapa Morelos', '46.48', '0.4648', '0.2324', '1', '100', '53.52', NULL, 100, '0'),
(148, 100, 'Mapamundi', '46.52', '0.4652', '0.2326', '1', '100', '53.48', NULL, 100, '0'),
(149, 100, 'Mapamundi', '46.48', '0.4648', '0.2324', '1', '100', '53.52', NULL, 100, '0'),
(150, 2, 'Mascara halloween', '35.8', '17.9', '8.95', '25', '50', '14.2', NULL, 2, '0'),
(151, 12, 'Marcador de agua con 12 colores ', '49.9', '4.15833333', '2.07916666', '7', '84', '34.1', NULL, 12, '0'),
(152, 4, 'Marcador de pizarron', '29.9', '7.475', '3.7375', '13', '52', '22.1', NULL, 4, '0'),
(153, 12, 'Marcador de textos varios colores', '77.55', '6.4625', '3.23125', '10', '120', '42.45', NULL, 12, '0'),
(154, 6, 'Marcador permanente color azul jocar', '35.1', '5.85', '2.925', '12', '72', '36.9', NULL, 6, '0'),
(155, 6, 'Marcador permanente color negro jocar', '37.8', '6.3', '3.15', '13', '78', '40.2', NULL, 6, '0'),
(156, 8, 'Marcadores permanentes', '17.9', '2.2375', '1.11875', '8', '64', '46.1', NULL, 8, '0'),
(157, 6, 'Marcatextos amarillo', '40.38', '6.73', '3.365', '12', '72', '31.62', NULL, 6, '0'),
(158, 6, 'Marcatextos naranja', '40.38', '6.73', '3.365', '12', '72', '31.62', NULL, 6, '0'),
(159, 10, 'Mica de 66*50 delgado ', '103.82', '10.382', '5.191', '18', '180', '76.18', 1, 9, '18'),
(160, 25, 'Mica termica 10x14.5 cm (en papel)', '43.79', '1.7516', '0.8758', '5', '125', '81.21', NULL, 25, '0'),
(161, 10, 'Mica termica carta 10 mm', '92.1', '9.21', '4.605', '18', '180', '87.9', NULL, 10, '0'),
(162, 15, 'Mica termica carta 8 mm', '113.02', '7.53466666', '3.76733333', '15', '225', '111.98', 1, 14, '15'),
(163, 50, 'Moño de colores', '22.01', '0.4402', '0.2201', '2', '100', '77.99', NULL, 50, '0'),
(164, 1, 'Muñeca', '17.9', '17.9', '8.95', '25', '25', '7.1', NULL, 1, '0'),
(165, 1, 'Muñeca barbie', '20', '', '', '30', '', '', NULL, 1, '0'),
(166, 10, 'Ojos adheribles', '8.96', '0.896', '0.448', '2', '20', '11.04', NULL, 10, '0'),
(167, 10, 'Ojos movibles', '9.99', '0.999', '0.4995', '4', '40', '30.01', NULL, 10, '0'),
(168, 100, 'Opalina blanca', '45.41', '0.4541', '0.22705', '2', '200', '154.59', NULL, 100, '0'),
(169, 2, 'Oso de peluche con dulce', '60', '', '', '80', '', '', NULL, 2, '0'),
(170, 200, 'Pagare', '40.88', '0.2044', '0.1022', '1', '200', '159.12', NULL, 200, '0'),
(171, 200, 'Palo abatelenguas', '43.98', '0.2199', '0.10995', '1', '200', '156.02', NULL, 200, '0'),
(172, 42, 'Palo de madera', '32.46', '0.77285714', '0.38642857', '2.5', '105', '72.54', NULL, 42, '0'),
(173, 25, 'Papel Bond cuadrado grande', '35', '1.4', '0.7', '5', '125', '90', 2, 23, '10'),
(174, 100, 'Papel carbon , calca', '84.41', '0.8441', '0.42205', '2', '200', '115.59', NULL, 100, '0'),
(175, 25, 'Papel cartoncillo negro', '80.04', '3.2016', '1.6008', '5.5', '137.5', '57.46', NULL, 25, '0'),
(176, 5, 'Papel cascaron 1/4', '24.48', '4.896', '2.448', '8', '40', '15.52', 1, 4, '8'),
(177, 10, 'Papel cascaron 1/8', '24.48', '2.448', '1.224', '5', '50', '25.52', NULL, NULL, ''),
(178, 10, 'Papel cascaron 1/8', '21.5', '2.15', '1.075', '5', '50', '28.5', 1, 9, '5'),
(179, 25, 'Papel celofan', '76.56', '3.0624', '1.5312', '6', '150', '73.44', NULL, 25, '0'),
(180, 100, 'Papel china ', '70', '0.7', '0.35', '1.5', '150', '80', 2, 98, '3'),
(181, 100, 'Papel china mediano picado', '105.56', '1.0556', '0.5278', '3.5', '350', '244.44', NULL, 100, '0'),
(182, 100, 'Papel china naranja', '70.76', '0.7076', '0.3538', '1.5', '150', '79.24', NULL, 100, '0'),
(183, 10, 'Papel crepe café', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(184, 10, 'Papel crepe azul claro', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(185, 10, 'Papel crepe azul fuerte', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(186, 10, 'Papel crepe amarillo', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(187, 10, 'Papel crepe geranio', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(188, 10, 'Papel crepe rojo', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(189, 10, 'Papel crepe verde', '35.38', '3.538', '1.769', '5', '50', '14.62', NULL, 10, '0'),
(190, 3, 'Papel crepe', '', '', '', '1.5', '4.5', '4.5', 3, 0, '4.5'),
(191, 10, 'Papel crepe morado', '35.38', '3.538', '1.769', '5', '50', '14.62', 5, 5, '25'),
(192, 25, 'Papel lustre azul celeste', '33.64', '1.3456', '0.6728', '4', '100', '66.36', NULL, 25, '0'),
(193, 25, 'Papel lustre rosa mexicano', '33.64', '1.3456', '0.6728', '4', '100', '66.36', NULL, 25, '0'),
(194, 3, 'Pegamento Bully 35 gramos', '19.8', '6.6', '3.3', '10', '30', '10.2', 1, 2, '10'),
(195, 3, 'Pegamento Bully 55 gramos', '29.55', '9.85', '4.925', '15', '45', '15.45', NULL, 3, '0'),
(196, 6, 'Pegamento lapiz adeshivo 22 gramos Pritt', '110.88', '18.48', '9.24', '28', '168', '57.12', NULL, 6, '0'),
(197, 6, 'Pegamento lapiz adeshivo 8 gramos dixon', '27.84', '4.64', '2.32', '8', '48', '20.16', 6, 0, '48'),
(198, 30, 'Pegamento lapiz adeshivo 8 gramos dixon', '164.6', '5.48666666', '2.74333333', '8', '240', '75.4', NULL, 30, '0'),
(199, 30, 'Pegamento makico 20 gramos', '41.1', '1.37', '0.685', '2', '60', '18.9', 1, 29, '2'),
(200, 1, 'Pelota payaso decorada', '7.97', '7.97', '3.985', '12', '12', '4.03', NULL, 1, '0'),
(201, 4, 'Pelota payaso lisa', '26.03', '6.5075', '3.25375', '10', '40', '13.97', NULL, 4, '0'),
(202, 3, 'Perforadoras 2 agujeros', '48.6', '16.2', '8.1', '27', '81', '32.4', NULL, 3, '0'),
(203, 50, 'Pincel economico', '54.9', '1.098', '0.549', '2', '100', '45.1', NULL, 50, '0'),
(204, 7, 'Pintura acrilica', '30.45', '4.35', '2.175', '10', '70', '39.55', NULL, 7, '0'),
(205, 10, 'Pintura acrilica de frasco 20 mililitros marca creatin', '45', '4.5', '2.25', '9', '90', '45', NULL, 10, '0'),
(206, 1, 'Pistola de agua', '30', '', '', '35', '', '', NULL, 1, '0'),
(207, 3, 'Pistolas de silicon chica', '110.4', '36.8', '18.4', '55', '165', '54.6', NULL, 3, '0'),
(208, 5, 'Placa de unicel 1cm 50x25', '10.96', '2.192', '1.096', '9', '45', '34.04', NULL, 5, '0'),
(209, 5, 'Placa de unicel 2cm 25x25', '10.96', '2.192', '1.096', '5', '25', '14.04', NULL, 5, '0'),
(210, 2, 'Plastico contac transparente', '14.24', '7.12', '3.56', '14', '28', '13.76', NULL, 2, '0'),
(211, 2, 'Plastico contact azul', '35.15', '17.575', '8.7875', '18', '36', '0.85', NULL, 2, '0'),
(212, 5, 'Plastilina pelikan 180 gramos', '29.12', '5.824', '2.912', '9', '45', '15.88', NULL, 5, '0'),
(213, 10, 'Plastilinas caja baco', '91', '9.1', '4.55', '13.5', '135', '44', NULL, 10, '0'),
(214, 10, 'Pluma Surtida de color', '25', '2.5', '2.25', '6', '60', '35', 1, 9, '6'),
(215, 10, 'Pluma surtida de colores 0.7 ', '31.47', '3.147', '1.5735', '6', '60', '28.53', NULL, 10, '0'),
(216, 6, 'Plumas bic punto mediano', '', '', '', '4', '24', '24', 2, 4, '8'),
(217, 24, 'Plumones delgado aqua', '45.45', '1.89375', '0.946875', '4', '96', '50.55', 1, 23, '4'),
(218, 1, 'Plumones delgado aqua con 24 plumones', '45.45', '45.45', '22.725', '65', '65', '19.55', NULL, 1, '0'),
(219, 100, 'Protectores de Hojas tamaño carta', '40', '0.4', '0.2', '3', '300', '260', 2, 98, '6'),
(220, 10, 'Puntillas wearever 0.5 mm con 10 tubos', '65.35', '6.535', '3.2675', '8', '80', '14.65', NULL, 10, '0'),
(221, 25, 'Regla plastico marca arcoiris', '50', '2', '1', '5', '125', '75', NULL, 25, '0'),
(222, 10, 'Repuesto gomas tipo lapiz', '', '0', '0', '7', '70', '70', NULL, 10, '0'),
(223, 1, 'Rompecabeza foamy mariposa', '9.52', '9.52', '4.76', '15', '15', '5.48', NULL, 1, '0'),
(224, 1, 'Rompecabeza foamy jirafa', '26.87', '26.87', '13.435', '35', '35', '8.13', NULL, 1, '0'),
(225, 25, 'Sacapuntas Jocar', '14.95', '0.598', '0.299', '2', '50', '35.05', NULL, 25, '0'),
(226, 2, 'Shampoo frozen y avengers', '35.8', '17.9', '7', '25', '50', '14.2', NULL, 2, '0'),
(227, 6, 'Silicon liquido 30 ml', '30.28', '5.04666666', '2.52333333', '10', '60', '29.72', 2, 4, '20'),
(228, 6, 'Sobre tipo carta con boton kikomo', '43.8', '7.3', '3.65', '12', '72', '28.2', 1, 5, '12'),
(229, 6, 'Sobre tipo oficio con boton kikomo', '48.6', '8.1', '4.05', '15', '90', '41.4', 1, 5, '15'),
(230, 50, 'Sobre para carta', '26.41', '0.5282', '0.2641', '1', '50', '23.59', NULL, NULL, ''),
(231, 75, 'Solicitud de empleo', '38.66', '0.51546666', '0.25773333', '1.5', '112.5', '73.84', NULL, 75, '0'),
(232, 300, 'Tarjeta 4x6 Blanco', '39.45', '0.1315', '0.06575', '1', '300', '260.55', NULL, 300, '0'),
(233, 300, 'Tarjeta 4x6 Raya', '45.41', '0.15136666', '0.07568333', '1', '300', '254.59', NULL, 300, '0'),
(234, 1, 'Taza con chocolates', '20', '', '', '25', '25', '5', NULL, 1, '0'),
(235, 12, 'Tijeras # 5', '60', '5', '2.5', '8.5', '102', '42', NULL, 12, '0'),
(236, 10, 'Valvula', '19.99', '1.999', '0.9995', '4', '40', '20.01', NULL, 10, '0');

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
(12, 'Pagina de mostrador', 4);

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
(22, 7, 2, 1);


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
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
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
