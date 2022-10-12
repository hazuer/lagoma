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
  `stock_min` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=UTF8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO inventario (`idInventario`,`cantidad`,`articulo`,`precioNeto`,`puCompra`,`codigo_barras`,`stock_min`,`estatus`) VALUES
(1,100, 'BOLSA KRAFT PINTADA CHICA 61003 SIN ASIGNAR', 50,50, '008049711', 10,1),
(2,100, 'COLORES BEROL RECREO LARGOS C/12 BEROL', 50,50, '0200220342', 10,1),
(3,100, 'MARCADOR SHARPIE DOBLE PUNTA 26146 NEGRO SHARPIE', 50,50, '020027034', 10,1),
(4,100, 'MARCADOR PERMANENTE BEROL NEGRO BEROL', 50,50, '020027099', 10,1),
(5,100, 'MARCATEXTOS BEROL ROSA BEROL', 50,50, '0200271047', 10,1),
(6,100, 'CARTULINA FLUORESCENTE IMPERIAL VERDE IMPERIAL', 50,50, '047078163', 10,1),
(7,100, 'LAPIZ DUO DIXON 42304 DIXON', 50,50, '0540100', 10,1),
(8,100, 'LAPIZ BICOLOR HEXAGONAL JUMBO C/10 DIXON', 50,50, '05401100', 10,1),
(9,100, 'COLORES MAPITA DIXON C/12 LARGOS 1930 DIXON', 50,50, '0540122', 10,1),
(10,100, 'LAPIZ ADHESIVO DIXON 8GRS 2959 DIXON', 50,50, '05402004', 10,1),
(11,100, 'MICA PVC TRANSFER 005 66X50 DELGADO TRANSFER', 50,50, '10207001', 10,1),
(12,100, 'ETIQUETA ADHESIVA TRANSFER FLUORESCENTE 9X13MM NO.', 50,50, '104090001', 10,1),
(13,100, 'ETIQUETA ADHESIVA TRANSFER FLUORESCENTE 9X13MM NO.', 50,50, '104090002', 10,1),
(14,100, 'PEGAMENTO BLANCO GLUKIDS 500GRS KORES', 50,50, '10902113', 10,1),
(15,100, 'COLORES TRIANGULAR KORES 3MM C/12 KORES', 50,50, '109021663', 10,1),
(16,100, 'CINTA TRANSPARENTE DE EMPAQUE 065 44MM X 40MTS', 50,50, '11902036', 10,1),
(17,100, 'LISTON CELOMAGICO MEDIANO C/50 01 BLANCO', 50,50, '120041301', 10,1),
(18,100, 'LISTON CELOMAGICO MEDIANO C/50 02 ROJO CELOMAGICO', 50,50, '120041302', 10,1),
(19,100, 'LISTON CELOMAGICO MEDIANO C/50 04 CANARIO', 50,50, '120041303', 10,1),
(20,100, 'LISTON CELOMAGICO MEDIANO C/50 08 AZUL REY', 50,50, '120041307', 10,1),
(21,100, 'LISTON CELOMAGICO MEDIANO C/50 23 SOLFERINO', 50,50, '1200413095', 10,1),
(22,100, 'GLOBO SURTIDO BLOGOS C/50 NO. 7. PAYASO', 50,50, '122043407', 10,1),
(23,100, 'GLOBO SURTIDO BLOGOS C/50 NO. 9 PAYASO', 50,50, '122043408', 10,1),
(24,100, 'PAPEL CARTA SELECTIVE C/500 SCRIBE', 50,50, '142090345', 10,1),
(25,100, 'PAPEL CREPE COLIBRI CORTO 305 BLANCO COLIBRI', 50,50, '14702192', 10,1),
(26,100, 'PAPEL CREPE COLIBRI CORTO 307 AZUL CLARO COLIBRI', 50,50, '14702193', 10,1),
(27,100, 'PAPEL CREPE COLIBRI CORTO 306 ROJO BANDERA COLIBRI', 50,50, '14702202', 10,1),
(28,100, 'PAPEL CHINA COLIBRI 1207 AZUL CLARO COLIBRI', 50,50, '1470707', 10,1),
(29,100, 'SOBRE COIN NO. 5 GOLDEN KRAFT 90GRS 8.8X16.CMS SIN', 50,50, '160092705', 10,1),
(30,100, 'SOBRE MANILA 90GRS COIN 8.8X16.4 C/50 NASSA', 50,50, '16009324', 10,1),
(31,100, 'BOLIGRAFO BIC PM DURA MAS AZUL BIC', 50,50, '1630101', 10,1),
(32,100, 'BOLIGRAFO BIC PM DURA MAS NEGRO BIC', 50,50, '1630102', 10,1),
(33,100, 'MOÑO RIBOMATIK C/25 SUPERSURTIDO CHICO RIBOCEL', 50,50, '1650482', 10,1),
(34,100, 'MARCADOR COLORELLA C/10 NEGRO COLORELA', 50,50, '183022851', 10,1),
(35,100, 'PLASTILINA PELIKAN 180GRS ROJA PELIKAN', 50,50, '183026979', 10,1),
(36,100, 'PLASTILINA PELIKAN 180GRS ROSA PELIKAN', 50,50, '183026980', 10,1),
(37,100, 'PLASTILINA PELIKAN 180GRS VERDE PELIKAN', 50,50, '183026982', 10,1),
(38,100, 'SILICON LIQUIDO PELIKAN 30ML 09500001 PELIKAN', 50,50, '18308062', 10,1),
(39,100, 'GOMA MIGASOFT C/20 108511 MAPED', 50,50, '18602070', 10,1),
(40,100, 'RAFIA 100GRS SELANUSA 123 BLANCO SELANUSA', 50,50, '2030601051', 10,1),
(41,100, 'SILICON LIQUIDO 30ML IMPSIL004 SELANUSA', 50,50, '203080063', 10,1),
(42,100, 'BOLSA KRAFT COLOR MEDIANA DIPAK', 50,50, '258040371', 10,1),
(43,100, 'PAPEL COUCHE DIPAK MEDIANO DIPAK', 50,50, '25807004', 10,1),
(44,100, 'VALVULA CARTON C/10 AKIO', 50,50, '345060463', 10,1),
(45,100, 'CINTA TRANSPARENTE DE EMPAQUE 95 240 48MM X 50MTS', 50,50, '38902600', 10,1),
(46,100, 'PAPEL CHINA PASCUA DORADO PASCUA', 50,50, '469020021', 10,1),
(47,100, 'PAPEL CHINA PASCUA PLATA PASCUA', 50,50, '469020022', 10,1),
(48,100, 'FOAMY CARTA DIAMANTADO PL PLATA PASCUA', 50,50, '469080011', 10,1),
(49,100, 'FOAMY CARTA DIAMANTADO JB ORO CLARO PASCUA', 50,50, '4690800112', 10,1),
(50,100, 'FOAMY CARTA JA AMARILLO MANGO/HUEVO PASCUA', 50,50, '4690800251', 10,1),
(51,100, 'FOAMY CARTA ND VERDE LIMON PASCUA', 50,50, '4690800269', 10,1),
(52,100, 'SILICON BARRA DELGADA PASCUA KGS PASCUA', 50,50, '46908004', 10,1),
(53,100, 'SILICON LIQUIDO PASCUA 100ML PASCUA', 50,50, '46908005', 10,1),
(54,100, 'CORRECTOR TIPO PLUMA MINI 4ML ACLP4-12 AINK', 50,50, '476029995', 10,1),
(55,100, 'FIGURA DE FOAMY BELY ANGELITOS AZULES SIN ASIGNAR', 50,50, '482110017', 10,1),
(56,100, 'VELA CON LUCES C/3 HOLOGRAFICA O METALICA', 50,50, '52904001', 10,1);

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
(14, 'Reporte detallado de ventas', 3),
(15, 'Reporte de inventario', 4);

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
(24, 14, 1, 1),
(25, 15, 1, 1);


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
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
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
  MODIFY `id_system_modulos_privilegios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `system_submodulo`
--
ALTER TABLE `system_submodulo`
  MODIFY `id_system_submodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `system_submodulo_privilegios`
--
ALTER TABLE `system_submodulo_privilegios`
  MODIFY `id_system_submodulo_privilegios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
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
