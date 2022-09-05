/*
Navicat MySQL Data Transfer

Source Server         : BD
Source Server Version : 50619
Source Host           : localhost:3306
Source Database       : scop

Target Server Type    : MYSQL
Target Server Version : 50619
File Encoding         : 65001

Date: 2018-10-08 12:23:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for persona
-- ----------------------------
DROP TABLE IF EXISTS `persona`;
CREATE TABLE `persona` (
  `id_persona` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT COMMENT '	',
  `curp` varchar(18) CHARACTER SET latin1 NOT NULL,
  `ap_paterno` varchar(50) CHARACTER SET latin1 NOT NULL,
  `ap_materno` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `nombre` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla que contiene la información del personal';

-- ----------------------------
-- Records of persona
-- ----------------------------
INSERT INTO `persona` VALUES ('0000000001', 'COLI870417HMSRNS00', 'CORNELIO', 'LANDA', 'ISIDORO');

-- ----------------------------
-- Table structure for system_modulos
-- ----------------------------
DROP TABLE IF EXISTS `system_modulos`;
CREATE TABLE `system_modulos` (
  `id_system_modulos` int(11) NOT NULL AUTO_INCREMENT,
  `modulo` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `desc_modulo` varchar(150) CHARACTER SET latin1 DEFAULT NULL,
  `urlControlador` varchar(50) CHARACTER SET latin1 NOT NULL,
  `icono` varchar(30) CHARACTER SET latin1 NOT NULL,
  `classColor` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_system_modulos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of system_modulos
-- ----------------------------
INSERT INTO `system_modulos` VALUES ('1', 'Config. del sistema', 'Configuración global del sistema', 'configsys', 'fa fa-gears icon', 'bg-danger');
INSERT INTO `system_modulos` VALUES ('2', 'Inicio', 'Pagina de bienvenida del usuario', 'inicio', 'fa fa-home icon', 'bg-warning');

-- ----------------------------
-- Table structure for system_modulos_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `system_modulos_privilegios`;
CREATE TABLE `system_modulos_privilegios` (
  `id_system_modulos_privilegios` int(11) NOT NULL AUTO_INCREMENT,
  `id_modulo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1-Permitido, 2-Bloqueado',
  PRIMARY KEY (`id_system_modulos_privilegios`),
  KEY `id_modulo` (`id_modulo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_system_modulos_privilegios_system_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `system_modulos` (`id_system_modulos`) ON UPDATE CASCADE,
  CONSTRAINT `FK_system_modulos_privilegios_system_users` FOREIGN KEY (`id_user`) REFERENCES `system_users` (`id_system_users`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of system_modulos_privilegios
-- ----------------------------
INSERT INTO `system_modulos_privilegios` VALUES ('1', '1', '1', '1');
INSERT INTO `system_modulos_privilegios` VALUES ('2', '2', '1', '1');

-- ----------------------------
-- Table structure for system_submodulo
-- ----------------------------
DROP TABLE IF EXISTS `system_submodulo`;
CREATE TABLE `system_submodulo` (
  `id_system_submodulo` int(11) NOT NULL AUTO_INCREMENT,
  `submodulo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `id_modulo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_system_submodulo`),
  KEY `id_modulo` (`id_modulo`),
  CONSTRAINT `FK_system_submodulo_system_modulos` FOREIGN KEY (`id_modulo`) REFERENCES `system_modulos` (`id_system_modulos`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of system_submodulo
-- ----------------------------
INSERT INTO `system_submodulo` VALUES ('1', 'Pagina de inicio para la configuración del sistema', '1');
INSERT INTO `system_submodulo` VALUES ('2', 'Catalogo modulos', '1');
INSERT INTO `system_submodulo` VALUES ('3', 'Catalogo submodulos', '1');
INSERT INTO `system_submodulo` VALUES ('4', 'Catalogo usuarios', '1');
INSERT INTO `system_submodulo` VALUES ('5', 'Privilegios por modulo', '1');
INSERT INTO `system_submodulo` VALUES ('6', 'Privilegios por submodulo', '1');
INSERT INTO `system_submodulo` VALUES ('7', 'Privilegios por usuario', '1');
INSERT INTO `system_submodulo` VALUES ('8', 'Pagina de bienvenida al usuario', '2');
INSERT INTO `system_submodulo` VALUES ('9', 'Cambiar contraseña', '2');
INSERT INTO `system_submodulo` VALUES ('10', 'Acceso no autorizado', '2');

-- ----------------------------
-- Table structure for system_submodulo_privilegios
-- ----------------------------
DROP TABLE IF EXISTS `system_submodulo_privilegios`;
CREATE TABLE `system_submodulo_privilegios` (
  `id_system_submodulo_privilegios` int(11) NOT NULL AUTO_INCREMENT,
  `id_submodulo` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '1-Permitido, 2-Bloqueado, 3-Solo consulta',
  PRIMARY KEY (`id_system_submodulo_privilegios`),
  KEY `id_submodulo` (`id_submodulo`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `FK_system_submodulo_privilegios_system_submodulo` FOREIGN KEY (`id_submodulo`) REFERENCES `system_submodulo` (`id_system_submodulo`) ON UPDATE CASCADE,
  CONSTRAINT `FK_system_submodulo_privilegios_system_users` FOREIGN KEY (`id_user`) REFERENCES `system_users` (`id_system_users`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of system_submodulo_privilegios
-- ----------------------------
INSERT INTO `system_submodulo_privilegios` VALUES ('1', '1', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('2', '2', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('3', '3', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('4', '4', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('5', '5', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('6', '6', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('7', '7', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('8', '8', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('9', '9', '1', '1');
INSERT INTO `system_submodulo_privilegios` VALUES ('10', '10', '1', '1');

-- ----------------------------
-- Table structure for system_users
-- ----------------------------
DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users` (
  `id_system_users` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(10) unsigned zerofill DEFAULT NULL,
  `usuario` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(64) CHARACTER SET latin1 DEFAULT NULL,
  `status` int(11) DEFAULT NULL COMMENT '0-Inactivo, 1-Activo',
  PRIMARY KEY (`id_system_users`),
  UNIQUE KEY `UQ_system_users_usuario` (`usuario`),
  KEY `id_persona` (`id_persona`),
  CONSTRAINT `FK_system_users_persona` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- ----------------------------
-- Records of system_users
-- ----------------------------
INSERT INTO `system_users` VALUES ('1', '0000000001', 'hazuer', 'bee2268ebc448abf5f3adb6be7388bb7', '1');
SET FOREIGN_KEY_CHECKS=1;
