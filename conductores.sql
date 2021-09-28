/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : conductores

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 27/09/2021 22:33:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for areas
-- ----------------------------
DROP TABLE IF EXISTS `areas`;
CREATE TABLE `areas`  (
  `id_area` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_area` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nombre_area` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NULL DEFAULT NULL,
  `fecha_reg` datetime(0) NULL DEFAULT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_area`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES (1, '001', 'Administracion', 1, '2021-09-27 22:25:17', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for conductores
-- ----------------------------
DROP TABLE IF EXISTS `conductores`;
CREATE TABLE `conductores`  (
  `id_conductor` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_pais` int(11) NOT NULL,
  `fecha_emision_licencia_oficial` date NOT NULL,
  `fecha_vencimiento_licencia_oficial` date NOT NULL,
  `numero_licencia_oficial` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_emision_licencia_interna` date NULL DEFAULT NULL,
  `fecha_vencimiento_licencia_interna` date NULL DEFAULT NULL,
  `numero_licencia_interna` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_estado_conductor` int(11) NULL DEFAULT NULL,
  `id_estado_verificacion` int(11) NULL DEFAULT NULL,
  `id_tipo_licencia_oficial` int(11) NULL DEFAULT NULL,
  `id_tipo_licencia_interna` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_conductor`) USING BTREE,
  INDEX `fk_conductores_personas_1`(`id_persona`) USING BTREE,
  INDEX `fk_conductores_paises_1`(`id_pais`) USING BTREE,
  INDEX `fk_conductores_estados_conductor_1`(`id_estado_conductor`) USING BTREE,
  INDEX `fk_conductores_estados_verificacion_1`(`id_estado_verificacion`) USING BTREE,
  INDEX `fk_conductores_tipos_licencia_oficial_1`(`id_tipo_licencia_oficial`) USING BTREE,
  INDEX `fk_conductores_tipos_licencia_interna_1`(`id_tipo_licencia_interna`) USING BTREE,
  CONSTRAINT `fk_conductores_estados_conductor_1` FOREIGN KEY (`id_estado_conductor`) REFERENCES `estados_conductor` (`id_estado_conductor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_estados_verificacion_1` FOREIGN KEY (`id_estado_verificacion`) REFERENCES `estados_verificacion` (`id_estado_verificacion`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_infracciones_1` FOREIGN KEY (`id_conductor`) REFERENCES `infracciones` (`id_conductor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_paises_1` FOREIGN KEY (`id_pais`) REFERENCES `paises` (`id_pais`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_personas_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_tipos_licencia_interna_1` FOREIGN KEY (`id_tipo_licencia_interna`) REFERENCES `tipos_licencia_interna` (`id_tipo_licencia_interna`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_conductores_tipos_licencia_oficial_1` FOREIGN KEY (`id_tipo_licencia_oficial`) REFERENCES `tipos_licencia_oficial` (`id_tipo_licencia_oficial`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of conductores
-- ----------------------------

-- ----------------------------
-- Table structure for estados_conductor
-- ----------------------------
DROP TABLE IF EXISTS `estados_conductor`;
CREATE TABLE `estados_conductor`  (
  `id_estado_conductor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_estado_conductor`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estados_conductor
-- ----------------------------

-- ----------------------------
-- Table structure for estados_verificacion
-- ----------------------------
DROP TABLE IF EXISTS `estados_verificacion`;
CREATE TABLE `estados_verificacion`  (
  `id_estado_verificacion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_estado` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_estado_verificacion`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estados_verificacion
-- ----------------------------

-- ----------------------------
-- Table structure for evaluaciones_conductor
-- ----------------------------
DROP TABLE IF EXISTS `evaluaciones_conductor`;
CREATE TABLE `evaluaciones_conductor`  (
  `id_evaluacion_conductor` int(11) NOT NULL AUTO_INCREMENT,
  `id_conductor` int(11) NOT NULL,
  `id_evaluador` int(11) NOT NULL,
  `nota_examen_teorico` decimal(2, 0) NOT NULL,
  `nota_examen_practico` decimal(2, 0) NOT NULL,
  `aptitud` int(11) NOT NULL,
  `fecha_evaluacion` date NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_evaluacion_conductor`) USING BTREE,
  INDEX `fk_evaluaciones_conductor_evaluadores_1`(`id_evaluador`) USING BTREE,
  INDEX `fk_evaluaciones_conductor_conductores_1`(`id_conductor`) USING BTREE,
  CONSTRAINT `fk_evaluaciones_conductor_conductores_1` FOREIGN KEY (`id_conductor`) REFERENCES `conductores` (`id_conductor`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_evaluaciones_conductor_evaluadores_1` FOREIGN KEY (`id_evaluador`) REFERENCES `evaluadores` (`id_evaluador`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evaluaciones_conductor
-- ----------------------------

-- ----------------------------
-- Table structure for evaluadores
-- ----------------------------
DROP TABLE IF EXISTS `evaluadores`;
CREATE TABLE `evaluadores`  (
  `id_evaluador` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `codigo_evaluador` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_evaluador`) USING BTREE,
  INDEX `fk_evaluadores_personas_1`(`id_persona`) USING BTREE,
  CONSTRAINT `fk_evaluadores_personas_1` FOREIGN KEY (`id_persona`) REFERENCES `personas` (`id_persona`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of evaluadores
-- ----------------------------

-- ----------------------------
-- Table structure for grupos_sanguineo
-- ----------------------------
DROP TABLE IF EXISTS `grupos_sanguineo`;
CREATE TABLE `grupos_sanguineo`  (
  `id_grupo_sanguineo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_grupo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_grupo_sanguineo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of grupos_sanguineo
-- ----------------------------
INSERT INTO `grupos_sanguineo` VALUES (1, 'A', 'A', 1, '2021-09-27 21:50:55', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for opciones
-- ----------------------------
DROP TABLE IF EXISTS `opciones`;
CREATE TABLE `opciones`  (
  `id_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_opcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_opcion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES (1, 'Seguridad', 'seguridad', 10, '2021-09-27 22:26:01', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (2, 'Area', 'area', 10, '2021-09-27 22:27:17', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (3, 'Personas', 'persona', 10, '2021-09-27 22:27:31', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for paises
-- ----------------------------
DROP TABLE IF EXISTS `paises`;
CREATE TABLE `paises`  (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_pais` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_pais`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of paises
-- ----------------------------

-- ----------------------------
-- Table structure for perfil_opcion
-- ----------------------------
DROP TABLE IF EXISTS `perfil_opcion`;
CREATE TABLE `perfil_opcion`  (
  `id_perfil_opcion` int(11) NOT NULL AUTO_INCREMENT,
  `id_perfil` int(11) NOT NULL,
  `id_opcion` int(11) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil_opcion`) USING BTREE,
  INDEX `fk_perfil_opcion_perfiles_1`(`id_perfil`) USING BTREE,
  INDEX `fk_perfil_opcion_opciones_1`(`id_opcion`) USING BTREE,
  CONSTRAINT `fk_perfil_opcion_perfiles_1` FOREIGN KEY (`id_perfil`) REFERENCES `perfiles` (`id_perfil`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfil_opcion
-- ----------------------------
INSERT INTO `perfil_opcion` VALUES (1, 1, 1, 10, '2021-09-27 22:30:18', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opcion` VALUES (2, 1, 2, 10, '2021-09-27 22:30:18', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opcion` VALUES (3, 1, 3, 10, '2021-09-27 22:30:18', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles`  (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES (1, 'administrador', 'Administrador del sistema', 1, 1, '2021-09-27 21:51:48', '1', 10, '2021-09-27 22:30:18', '::1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas`  (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_documento` int(11) NOT NULL,
  `numero_documento` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexo` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fecha_nacimiento` date NULL DEFAULT NULL,
  `id_grupo_sanguineo` int(11) NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`) USING BTREE,
  INDEX `fk_personas_tipos_documento_1`(`id_tipo_documento`) USING BTREE,
  INDEX `fk_personas_grupos_sanguineo_1`(`id_grupo_sanguineo`) USING BTREE,
  CONSTRAINT `fk_personas_grupos_sanguineo_1` FOREIGN KEY (`id_grupo_sanguineo`) REFERENCES `grupos_sanguineo` (`id_grupo_sanguineo`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_personas_tipos_documento_1` FOREIGN KEY (`id_tipo_documento`) REFERENCES `tipos_documento` (`id_tipo_documento`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES (1, 1, '72669188', 'Franklin', 'Asto', 'Leon', '1', '2021-09-27', 1, 1, '2021-09-27 21:51:29', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tipos_documento
-- ----------------------------
DROP TABLE IF EXISTS `tipos_documento`;
CREATE TABLE `tipos_documento`  (
  `id_tipo_documento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `abreviatura` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_documento`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_documento
-- ----------------------------
INSERT INTO `tipos_documento` VALUES (1, 'Documento Nacional de Identidad', 'DNI', 1, '2021-09-27 21:50:34', '1', NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tipos_licencia_interna
-- ----------------------------
DROP TABLE IF EXISTS `tipos_licencia_interna`;
CREATE TABLE `tipos_licencia_interna`  (
  `id_tipo_licencia_interna` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_licencia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decripcion_licencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_licencia_interna`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_licencia_interna
-- ----------------------------

-- ----------------------------
-- Table structure for tipos_licencia_oficial
-- ----------------------------
DROP TABLE IF EXISTS `tipos_licencia_oficial`;
CREATE TABLE `tipos_licencia_oficial`  (
  `id_tipo_licencia_oficial` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_licencia` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_licencia` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_tipo_licencia_oficial`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos_licencia_oficial
-- ----------------------------

-- ----------------------------
-- Table structure for usuario_perfil
-- ----------------------------
DROP TABLE IF EXISTS `usuario_perfil`;
CREATE TABLE `usuario_perfil`  (
  `id_usuario_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario_perfil`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuario_perfil
-- ----------------------------

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id_usuario`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (10, 1, 1, 1, 'admin', '$2y$13$AzSu7ICHHQQo7durNWiSju29o9CNOKhynuXmp1RnAE2thoZppAQiW', 'franklin.asto.leon@gmail.com', 1, '2021-09-27 21:52:30', '1', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- ----------------------------
-- Procedure structure for datoUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `datoUsuario`;
delimiter ;;
CREATE PROCEDURE `datoUsuario`(IN idUsuario int)
begin
	select 
		pe.nombre_perfil as perfil,
		concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as persona
	from usuarios u
		inner join personas p on u.id_persona = p.id_persona
		inner join perfiles pe on u.id_perfil = pe.id_perfil
  where u.fecha_del is null and u.id_usuario = idUsuario;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoArea
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoArea`;
delimiter ;;
CREATE PROCEDURE `listadoArea`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
		select
			id_area,
			codigo_area,
			nombre_area,
			(select count(*) from areas where fecha_del is null and concat(codigo_area,' ',nombre_area) like concat('%',busca,'%')) as total
		from areas
		where fecha_del is null and concat(codigo_area,' ',nombre_area) like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoModulo
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoModulo`;
delimiter ;;
CREATE PROCEDURE `listadoModulo`(IN row1 INT,IN length1 INT,IN buscar varchar(200))
BEGIN
   SELECT 
			id_opcion as id_modulo,
			nombre_opcion as nombre_modulo,
			url as ruta,
			(select count(*) from opciones where fecha_del is null) as total
		FROM opciones where fecha_del is null and nombre_opcion like concat('%',buscar,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoPerfil
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoPerfil`;
delimiter ;;
CREATE PROCEDURE `listadoPerfil`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
   SELECT 
			id_perfil,
			nombre_perfil,
			descripcion,
			estado,
			(select count(*) from perfiles where fecha_del is null) as total
		FROM perfiles where fecha_del is null and nombre_perfil like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoPersona
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoPersona`;
delimiter ;;
CREATE PROCEDURE `listadoPersona`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
	select 
		id_persona,
		numero_documento as dni,
		nombres,
		apellido_paterno,
		apellido_materno,
		(select count(*) from personas where fecha_del is null) as total
	from personas
  where fecha_del is null and concat(nombres,' ',apellido_paterno,' ',apellido_materno) like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoUsuario
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoUsuario`;
delimiter ;;
CREATE PROCEDURE `listadoUsuario`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
	select 
		u.id_usuario,
		u.usuario,
		pe.nombre_perfil as perfil,
		a.nombre_area as area,
		concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as persona,
		(select count(*) from usuarios where fecha_del is null) as total
	from usuarios u
		inner join areas a on u.id_area = a.id_area
		inner join personas p on u.id_persona = p.id_persona
		inner join perfiles pe on u.id_perfil = pe.id_perfil
  where u.fecha_del is null and concat(u.id_usuario,' ',u.usuario,' ',pe.nombre_perfil,' ',a.nombre_area,p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for menu
-- ----------------------------
DROP PROCEDURE IF EXISTS `menu`;
delimiter ;;
CREATE PROCEDURE `menu`(IN idPerfil int)
begin
select 
	o.nombre_opcion,
	o.url
from perfil_opcion po
inner join opciones o on po.id_opcion = o.id_opcion and po.fecha_del is null where po.id_perfil = idPerfil;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for prefilOpciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `prefilOpciones`;
delimiter ;;
CREATE PROCEDURE `prefilOpciones`(IN idPerfil int)
begin
select 
o.id_opcion,
o.nombre_opcion,
(case when po.id_perfil_opcion > 0 then 1 else 0 end) as activo
from perfil_opcion po
right join opciones o on po.id_opcion = o.id_opcion and po.fecha_del is null and po.id_perfil = idPerfil;
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
