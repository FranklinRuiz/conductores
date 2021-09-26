/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : mantenimiento

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 21/07/2021 17:48:05
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for archivos
-- ----------------------------
DROP TABLE IF EXISTS `archivos`;
CREATE TABLE `archivos`  (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_archivo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of archivos
-- ----------------------------
INSERT INTO `archivos` VALUES (1, 'C:\\Windows\\Temp\\php54AB.tmp', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:22:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (2, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:23:08', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (3, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:31:09', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (4, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:40:39', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (5, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:41:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (6, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivoschest-xray.jpg', 'image/jpeg', 1, '2021-06-01 22:45:38', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (7, 'prot.jpg', '/mantenimiento/web/modules/home/archivos/prot.jpg', 'image/jpeg', 3, '2021-06-02 19:06:03', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (8, 'descarga.jpg', '/mantenimiento/web/modules/home/archivos/descarga.jpg', 'image/jpeg', 3, '2021-06-02 20:24:19', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (9, '1_Hf_5LsQbjo5ZHX35Zz65Mg.png', '/mantenimiento/web/modules/home/archivos/1_Hf_5LsQbjo5ZHX35Zz65Mg.png', 'image/png', 3, '2021-06-16 20:38:26', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (10, '22.png', '/mantenimiento/web/modules/home/archivos/22.png', 'image/png', 3, '2021-06-29 22:02:31', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (11, 'chest-xray.jpg', '/mantenimiento/web/modules/home/archivos/chest-xray.jpg', 'image/jpeg', 6, '2021-06-29 23:59:12', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (12, '48317982_396808237811329_8093552976649519104_n.jpg', '/mantenimiento/web/modules/home/archivos/48317982_396808237811329_8093552976649519104_n.jpg', 'image/jpeg', 6, '2021-06-30 21:01:01', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `archivos` VALUES (13, 'descarga.jpg', '/mantenimiento/web/modules/home/archivos/descarga.jpg', 'image/jpeg', 6, '2021-06-30 21:03:02', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of areas
-- ----------------------------
INSERT INTO `areas` VALUES (1, 'A001', 'NEUMOLOGÍA', 1, '2021-05-01 01:09:58', '1', 1, '2021-06-29 23:11:22', '::1', NULL, NULL, NULL);
INSERT INTO `areas` VALUES (2, 'A002', 'CIRUGIA', 1, '2021-05-02 16:33:06', '1', 1, '2021-06-29 23:02:19', '::1', NULL, NULL, NULL);
INSERT INTO `areas` VALUES (3, 'A003', 'MEDICINA GENERAL', 1, '2021-06-02 19:12:00', '1', 1, '2021-06-29 23:02:04', '::1', NULL, NULL, NULL);
INSERT INTO `areas` VALUES (4, 'A004', 'ANESTESIOLOGÍA', 1, '2021-06-02 19:21:59', '1', 1, '2021-06-29 23:00:02', '::1', NULL, NULL, NULL);
INSERT INTO `areas` VALUES (5, 'A004', 'Prueba', 1, '2021-06-29 22:45:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:52:33', '::1');
INSERT INTO `areas` VALUES (6, 'A005', 'CARDIOLOGÍA', 1, '2021-06-29 22:45:58', '::1', 1, '2021-06-29 23:01:34', '::1', NULL, NULL, NULL);
INSERT INTO `areas` VALUES (7, 'A006', 'CUIDADOS INTENSIVOS', 1, '2021-06-29 23:02:59', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (8, 'A007', 'MEDICINA INTERNA', 1, '2021-06-29 23:03:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (9, 'A008', 'PEDIATRÍA/NEONATOLOGÍA  ', 1, '2021-06-29 23:03:46', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (10, 'A009', 'URGENCIAS', 1, '2021-06-29 23:04:01', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (11, 'A010', 'CIRUGÍA GENERAL Y DIGESTIVA', 1, '2021-06-29 23:04:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (12, 'A011', 'DERMATOLOGÍA', 1, '2021-06-29 23:04:46', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (13, 'A012', 'LABORATORIOS CLÍNICOS', 1, '2021-06-29 23:05:06', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (14, 'A013', 'FARMACIA', 1, '2021-06-29 23:05:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `areas` VALUES (15, 'A014', 'MANTENIMIENTO', 1, '2021-06-29 23:51:28', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for categorias
-- ----------------------------
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias`  (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_categoria`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categorias
-- ----------------------------
INSERT INTO `categorias` VALUES (1, 'Falla operacional ', 1, '2021-05-02 18:35:50', '1', 1, '2021-06-19 22:10:23', '::1', NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (2, 'Falla Mecánica', 1, '2021-05-02 18:36:03', '1', 1, '2021-06-19 22:10:34', '::1', NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (3, 'Falla encendido', 1, '2021-05-02 23:06:29', '::1', 1, '2021-06-19 22:10:48', '::1', NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (4, 'uno', 1, '2021-05-02 23:07:46', '192.168.1.43', NULL, NULL, NULL, 1, '2021-05-02 23:20:08', '::1');
INSERT INTO `categorias` VALUES (5, 'Sin conectividad', 1, '2021-05-02 23:12:21', '::1', 1, '2021-06-19 22:11:20', '::1', NULL, NULL, NULL);
INSERT INTO `categorias` VALUES (6, 'texto', 1, '2021-05-02 23:22:15', '::1', 1, '2021-05-02 23:22:33', '::1', 1, '2021-05-02 23:22:36', '::1');

-- ----------------------------
-- Table structure for equipos
-- ----------------------------
DROP TABLE IF EXISTS `equipos`;
CREATE TABLE `equipos`  (
  `id_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `nombre_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NULL DEFAULT NULL,
  `fecha_reg` datetime(0) NULL DEFAULT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_equipo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of equipos
-- ----------------------------
INSERT INTO `equipos` VALUES (2, 1, 'camas', 'prueba de registro', 1, '2021-05-01 16:12:42', '::1', 1, '2021-05-01 16:43:48', '::1', NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (4, 2, 'Respirador', 'maquina para proporcionar oxigeno', 1, '2021-06-02 19:10:02', '::1', 1, '2021-06-02 19:20:12', '::1', NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (5, 1, 'panel', 'panel de monitoreo', 1, '2021-06-02 19:11:21', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (6, 5, 'prueba1', 'registro de prueba', 1, '2021-06-02 20:19:24', '::1', 1, '2021-06-02 20:20:02', '::1', NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (9, 1, 'ANALIZADOR DE GASES Y ELECTROLITOS MOD I15', 'ANALIZADORES BIOQUÍMICOS , HEMATOLÓGICOS Y GASES ARTERIALES.', 1, '2021-06-29 23:19:41', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (10, 1, 'ESPECTOFOTOMETRO CON UV', 'Pantalla TFT de 7 pulgadas y larga duración, botones de silicona más cómodos y sensibles. El instrumento\npuede mostrar varias curvas de escaneo y gráficos para que los usuarios completen varias pruebas sin\ncomputadoras. ', 1, '2021-06-29 23:22:02', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (11, 1, 'SISTEMA DE INMUNOENSAYO POR QUIMIOLUMINISCENCIA', 'Rendimiento: hasta 180 pruebas / hora. 24 horas listas para usar, Tiempo hasta el primer resultado: 17 minutos. ', 1, '2021-06-29 23:24:01', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (12, 2, 'ANALIZADOR BIOQUIMICA AUTOMATIZADO', '*Métodos de ensayo: Punto final, punto cinetico y tiempo fijo. ', 1, '2021-06-29 23:25:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (13, 5, 'ANALIZADOR DE PRUEBAS ESPECIALES POR INMUNOFLORESCENCIA', 'MAQUINA PARA PRUEBAS', 1, '2021-06-29 23:27:26', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (14, 2, 'ANALIZADOR HEMATOLOGICO SEMI AUTOMATIZADO C/ 3 DIFERENCIALES', '20 parámetros + 3 histogramas (WBC, RBC, HGB, HCT, MCV, MCHC,\nPLT, LYM%, GRN%, MON%, LYM#, GRN#, MON#, RDSW-SD, RDW-CV,\nMPV, PDW, P-LCR, PCT) ', 1, '2021-06-29 23:29:07', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (15, 1, 'ANALIZADOR BIOQUIMICO SEMI AUTOMATIZADO C/ BAÑO MARIA', 'Análisis método: Cinético, punto final, no lineal, muestra en blanco, blanco de reactivo, etc', 1, '2021-06-29 23:30:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `equipos` VALUES (16, 2, 'ESTERILIZADORA DIGITAL HORIZONTAL DE 125 ,50,43,15 LTR', '* Capacidad para esterilizar de 53 litros \n', 1, '2021-06-29 23:31:45', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for estado_equipos
-- ----------------------------
DROP TABLE IF EXISTS `estado_equipos`;
CREATE TABLE `estado_equipos`  (
  `id_estado_equipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NULL DEFAULT NULL,
  `fecha_reg` datetime(0) NULL DEFAULT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_estado_equipo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of estado_equipos
-- ----------------------------
INSERT INTO `estado_equipos` VALUES (1, 'Operativo', 1, '2021-05-02 16:43:04', '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `estado_equipos` VALUES (2, 'Inoperativo', 1, '2021-05-02 16:43:18', '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for ficha_tecnicas
-- ----------------------------
DROP TABLE IF EXISTS `ficha_tecnicas`;
CREATE TABLE `ficha_tecnicas`  (
  `id_ficha_tecnica` int(11) NOT NULL AUTO_INCREMENT,
  `fabricante` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_fabricacion` date NULL DEFAULT NULL,
  `marca` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `serie` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `vida_util` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_tecnica` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `fecha_activacion` date NOT NULL,
  `id_usuario_reg` int(11) NULL DEFAULT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_equipo` int(11) NOT NULL,
  PRIMARY KEY (`id_ficha_tecnica`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ficha_tecnicas
-- ----------------------------
INSERT INTO `ficha_tecnicas` VALUES (1, 'akita', '2021-05-01', 'akita', 'A-0001', 'A', '10 años', NULL, '2021-05-01', 1, '2021-05-01 16:12:42', '::1', 1, '2021-05-01 16:43:48', '::1', NULL, NULL, NULL, 2);
INSERT INTO `ficha_tecnicas` VALUES (2, 'as', '2010-06-02', 'akita', '0111', 'B', '10 años', NULL, '2021-05-01', 1, '2021-05-01 16:46:34', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 3);
INSERT INTO `ficha_tecnicas` VALUES (3, 'Samsung', '2018-02-02', 'Samsung', 'M0025', '560', '20 años', NULL, '2021-05-08', 1, '2021-06-02 19:10:02', '::1', 1, '2021-06-02 19:20:12', '::1', NULL, NULL, NULL, 4);
INSERT INTO `ficha_tecnicas` VALUES (4, 'Sony', '2012-06-02', 'Sony', 'N56', '005A', '5 años', NULL, '2020-06-02', 1, '2021-06-02 19:11:21', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 5);
INSERT INTO `ficha_tecnicas` VALUES (5, 'Samsung', '2014-06-04', 'Samsung', 'M-0001', '00061', '5 años', NULL, '2020-01-02', 1, '2021-06-02 20:19:24', '::1', 1, '2021-06-02 20:20:02', '::1', NULL, NULL, NULL, 6);
INSERT INTO `ficha_tecnicas` VALUES (6, 'Samsung', '2021-06-16', 'akita', '0111', '1', '10 años', NULL, '2021-06-16', 1, '2021-06-16 20:43:17', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 7);
INSERT INTO `ficha_tecnicas` VALUES (7, 'Samsung', '2021-06-16', 'akita', 'A-0001', '00060', '10 años', NULL, '2021-06-16', 1, '2021-06-16 20:59:39', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 8);
INSERT INTO `ficha_tecnicas` VALUES (8, 'EDEN', '2015-01-29', 'EDEN', ' MOD I15', '1', '20 años', NULL, '2021-06-29', 1, '2021-06-29 23:19:41', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 9);
INSERT INTO `ficha_tecnicas` VALUES (9, 'PEAK INSTRUMENTS', '2017-02-01', 'PEAK', 'MODELO C-7000 UV PEAK', '1', '6 AÑOS', NULL, '2021-06-29', 1, '2021-06-29 23:22:02', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 10);
INSERT INTO `ficha_tecnicas` VALUES (10, 'MAGLUMI', '2018-01-31', 'MAGLUMI', 'MOD MAGLUMI 600', '1', '10 años', NULL, '2021-06-29', 1, '2021-06-29 23:24:01', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 11);
INSERT INTO `ficha_tecnicas` VALUES (11, 'PARAMEDICAL', '2016-06-09', 'PARAMEDICAL', 'PKL PPC 125', '1', '10 años', NULL, '2021-06-29', 1, '2021-06-29 23:25:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO `ficha_tecnicas` VALUES (12, 'KONTROL LAB', '2016-07-08', 'ICHROMA II', 'X', '1', '20 años', NULL, '2021-06-29', 1, '2021-06-29 23:27:26', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 13);
INSERT INTO `ficha_tecnicas` VALUES (13, 'X', '2018-02-08', 'akita', '0111', '1', '5 años', NULL, '2021-06-29', 1, '2021-06-29 23:29:07', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 14);
INSERT INTO `ficha_tecnicas` VALUES (14, 'PARAMEDICAL', '2015-06-10', 'PARAMEDICAL', 'PKL', '1', '10 años', NULL, '2021-06-29', 1, '2021-06-29 23:30:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 15);
INSERT INTO `ficha_tecnicas` VALUES (15, 'akita', '2019-06-06', 'DRY OVEN', 'MOD: DHG-9053A', '1', '20 años', NULL, '2021-06-29', 1, '2021-06-29 23:31:45', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 16);

-- ----------------------------
-- Table structure for hoja_rutas
-- ----------------------------
DROP TABLE IF EXISTS `hoja_rutas`;
CREATE TABLE `hoja_rutas`  (
  `id_hoja_ruta` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden_trabajo` int(11) NOT NULL,
  `id_usuario_origen` int(11) NOT NULL,
  `id_usuario_destino` int(11) NULL DEFAULT NULL,
  `comentario` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `flg_estado` tinyint(1) NULL DEFAULT NULL,
  `estado` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_hoja_ruta`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of hoja_rutas
-- ----------------------------
INSERT INTO `hoja_rutas` VALUES (1, 5, 2, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (2, 6, 1, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (3, 5, 1, 1, 'registro', 1, 'DERIVADO');
INSERT INTO `hoja_rutas` VALUES (4, 6, 1, 1, 'PRUEBA', 1, 'ATENDIDO');
INSERT INTO `hoja_rutas` VALUES (5, 7, 1, NULL, NULL, 1, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (6, 8, 1, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (7, 8, 1, 3, 'prueba de derivacion', 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (8, 8, 1, 3, 'prueba de derivacion', 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (9, 8, 1, 3, 'prueba de derivacion', 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (10, 8, 1, 3, 'dfgdfg', 0, 'DERIVADO');
INSERT INTO `hoja_rutas` VALUES (11, 8, 1, 3, 'SDFSFSF', 1, 'DERIVADO');
INSERT INTO `hoja_rutas` VALUES (12, 9, 2, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (13, 9, 4, 3, 'revisar ', 1, 'ATENDIDO');
INSERT INTO `hoja_rutas` VALUES (14, 10, 2, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (15, 10, 4, 3, 'verificar el equipo', 1, 'ATENDIDO');
INSERT INTO `hoja_rutas` VALUES (16, 11, 2, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (17, 11, 4, 3, 'apoyo', 1, 'DERIVADO');
INSERT INTO `hoja_rutas` VALUES (18, 12, 2, NULL, NULL, 1, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (19, 13, 2, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (20, 13, 4, 3, 'orden ', 1, 'ATENDIDO');
INSERT INTO `hoja_rutas` VALUES (21, 14, 2, NULL, NULL, 1, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (22, 15, 5, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (23, 15, 4, 6, 'prueba', 1, 'ATENDIDO');
INSERT INTO `hoja_rutas` VALUES (24, 16, 5, NULL, NULL, 0, 'SOLICITADO');
INSERT INTO `hoja_rutas` VALUES (25, 16, 4, 6, 'apoyo', 1, 'ATENDIDO');

-- ----------------------------
-- Table structure for informe_tecnicos
-- ----------------------------
DROP TABLE IF EXISTS `informe_tecnicos`;
CREATE TABLE `informe_tecnicos`  (
  `id_informe_tecnico` int(11) NOT NULL AUTO_INCREMENT,
  `id_orden_trabajo` int(11) NOT NULL,
  `id_archivo` int(11) NOT NULL,
  `descripcion_falla` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `diagnostico` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `recomendaciones` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` date NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_informe_tecnico`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of informe_tecnicos
-- ----------------------------
INSERT INTO `informe_tecnicos` VALUES (1, 6, 5, 'qwerwer', 'werwer', 'werwer', 1, '2021-06-01 22:41:56', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (2, 6, 6, 'PRUEBA  NEVO', 'AQUI', 'ASFSDF', 1, '2021-06-01 22:45:40', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (3, 9, 7, 'faltaba ajustar', 'falta perno', 'comprar perno nuevo para futuras reparaciones', 3, '2021-06-02 19:06:05', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (4, 10, 8, 'se malogro por humedad', 'prueba de registro', 'pruebasss', 3, '2021-06-02 20:24:22', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (5, 13, 9, 'pruebas de registro', 'pruebas de registro', 'pruebas de registro', 3, '2021-06-16 20:38:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (6, 15, 11, 'dfgfdg', 'dfgdfg', 'dfgdfg', 6, '2021-06-29 23:59:14', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `informe_tecnicos` VALUES (7, 16, 12, 'fdgdgdgdg', 'cbcvbcvb', 'fsfdsf', 6, '2021-06-30 21:01:03', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for movimientos
-- ----------------------------
DROP TABLE IF EXISTS `movimientos`;
CREATE TABLE `movimientos`  (
  `id_movimiento` int(255) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `flg_activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_movimiento`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of movimientos
-- ----------------------------
INSERT INTO `movimientos` VALUES (1, 2, 1, 1, 1, '2021-05-02 16:43:57', '::1', 1, '2021-05-02 17:24:09', '::1', NULL, NULL, NULL, 0);
INSERT INTO `movimientos` VALUES (2, 2, 2, 2, 1, '2021-05-02 17:24:09', '::1', 1, '2021-05-26 19:43:16', '::1', NULL, NULL, NULL, 0);
INSERT INTO `movimientos` VALUES (3, 2, 2, 1, 1, '2021-05-26 19:43:16', '::1', 1, '2021-06-08 23:48:43', '::1', NULL, NULL, NULL, 0);
INSERT INTO `movimientos` VALUES (4, 4, 1, 1, 1, '2021-06-02 19:12:20', '::1', 1, '2021-06-19 22:07:44', '::1', NULL, NULL, NULL, 0);
INSERT INTO `movimientos` VALUES (5, 5, 3, 1, 1, '2021-06-02 19:20:41', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (6, 6, 1, 1, 1, '2021-06-02 20:25:49', '::1', 1, '2021-06-02 20:34:26', '::1', NULL, NULL, NULL, 0);
INSERT INTO `movimientos` VALUES (7, 6, 2, 2, 1, '2021-06-02 20:34:26', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (8, 2, 3, 2, 1, '2021-06-08 23:48:43', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (9, 4, 2, 1, 1, '2021-06-19 22:07:44', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (10, 9, 5, 1, 1, '2021-06-29 23:32:16', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (11, 12, 4, 1, 1, '2021-06-29 23:33:27', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (12, 15, 2, 1, 1, '2021-06-29 23:33:59', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (13, 11, 3, 1, 1, '2021-06-29 23:34:10', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `movimientos` VALUES (14, 10, 4, 1, 1, '2021-06-29 23:34:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);

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
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of opciones
-- ----------------------------
INSERT INTO `opciones` VALUES (1, 'Seguridad', 'seguridad', 1, '2021-04-30 20:22:03', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (2, 'Persona', 'persona', 1, '2021-04-30 20:40:54', '::1', 1, '2021-05-02 15:04:06', '::1', NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (3, 'Equipos', 'equipo', 1, '2021-04-30 23:03:09', '::1', 1, '2021-05-01 13:59:38', '::1', NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (4, 'Movimiento', 'movimiento', 1, '2021-05-02 15:45:21', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (5, 'Orden Trabajo', 'orden', 1, '2021-05-02 17:42:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (6, 'Bandeja Orden', 'bandeja', 1, '2021-05-02 20:43:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (7, 'Categoria', 'categoria', 1, '2021-05-02 22:46:25', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (8, 'Tipo Equipo', 'tipo', 1, '2021-05-05 14:27:47', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (9, 'Bandeja Técnico', 'bandeja/tecnico', 1, '2021-05-25 22:11:21', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (10, 'Mantenimiento Preventivo', 'preventivo', 1, '2021-05-25 22:36:53', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (11, 'Seccion', 'secciones', 1, '2021-06-02 19:13:07', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (12, 'Lista Preventivo', 'listapreventivo', 1, '2021-06-05 21:49:43', '::1', 1, '2021-06-19 23:51:57', '::1', NULL, NULL, NULL);
INSERT INTO `opciones` VALUES (13, 'Area', 'area', 1, '2021-06-29 22:59:30', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for orden_trabajos
-- ----------------------------
DROP TABLE IF EXISTS `orden_trabajos`;
CREATE TABLE `orden_trabajos`  (
  `id_orden_trabajo` int(11) NOT NULL AUTO_INCREMENT,
  `id_seccion` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_equipo` int(11) NOT NULL,
  `descripcion` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_atencion` date NULL DEFAULT NULL,
  `descripcion_dianostico` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `flg_atencion` tinyint(1) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_orden_trabajo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orden_trabajos
-- ----------------------------
INSERT INTO `orden_trabajos` VALUES (1, 2, 1, 2, 'prueba', NULL, NULL, 1, 2, '2021-05-02 19:34:56', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (2, 2, 1, 2, 'cvnfg', NULL, NULL, 1, 2, '2021-05-02 19:35:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (3, 1, 1, 2, 'cvnfg', NULL, NULL, 1, 2, '2021-05-02 19:36:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (4, 1, 1, 2, 'cvnfg', NULL, NULL, 1, 2, '2021-05-02 19:37:00', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (5, 1, 2, 2, 'NUEVO1', NULL, NULL, 1, 2, '2021-05-02 20:03:03', '::1', 2, '2021-05-02 20:36:24', '::1', 2, '2021-05-02 20:37:36', '::1');
INSERT INTO `orden_trabajos` VALUES (6, 1, 5, 2, 'prueba', NULL, NULL, 1, 1, '2021-05-02 23:23:42', '::1', 1, '2021-05-02 23:23:52', '::1', NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (7, 2, 2, 2, 'jj', NULL, NULL, 1, 1, '2021-05-26 19:43:45', '::1', 1, '2021-05-26 19:43:51', '::1', 1, '2021-05-26 19:43:54', '::1');
INSERT INTO `orden_trabajos` VALUES (8, 2, 2, 2, 'nuevo', NULL, NULL, 1, 1, '2021-06-01 21:12:11', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (9, 2, 2, 2, 'prueba de registro ', NULL, NULL, 1, 2, '2021-06-02 19:02:52', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (10, 1, 5, 4, 'pruebas', NULL, NULL, 1, 2, '2021-06-02 20:21:53', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (11, 1, 1, 4, 'pruebas ', NULL, NULL, 1, 2, '2021-06-08 23:50:39', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (12, 1, 1, 4, 'xfgsgfsdf', NULL, NULL, 1, 2, '2021-06-16 20:12:09', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (13, 2, 2, 6, 'integrador', NULL, NULL, 1, 2, '2021-06-16 20:36:59', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (14, 2, 2, 6, 'prueba de registro de validación ', NULL, NULL, 1, 2, '2021-06-19 22:12:08', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (15, 3, 1, 11, 'No funciona al conectarlo', NULL, NULL, 1, 5, '2021-06-29 23:55:24', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `orden_trabajos` VALUES (16, 3, 5, 5, 'problema', NULL, NULL, 1, 5, '2021-06-30 20:59:41', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for perfil_opciones
-- ----------------------------
DROP TABLE IF EXISTS `perfil_opciones`;
CREATE TABLE `perfil_opciones`  (
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
  PRIMARY KEY (`id_perfil_opcion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 138 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfil_opciones
-- ----------------------------
INSERT INTO `perfil_opciones` VALUES (1, 1, 1, 1, '2021-04-30 22:41:48', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (2, 1, 2, 1, '2021-04-30 22:41:49', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (3, 1, 2, 1, '2021-04-30 23:42:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (4, 1, 1, 1, '2021-04-30 23:43:09', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (5, 1, 1, 1, '2021-04-30 23:43:47', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (6, 1, 2, 1, '2021-04-30 23:43:47', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (7, 1, 3, 1, '2021-04-30 23:43:47', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (8, 1, 2, 1, '2021-04-30 23:43:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (9, 1, 3, 1, '2021-04-30 23:43:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (10, 1, 3, 1, '2021-04-30 23:44:08', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (11, 1, 3, 1, '2021-04-30 23:44:19', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (12, 1, 1, 1, '2021-04-30 23:44:19', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (13, 2, 3, 1, '2021-04-30 23:47:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:13', '::1');
INSERT INTO `perfil_opciones` VALUES (14, 1, 3, 1, '2021-05-02 15:03:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (15, 1, 1, 1, '2021-05-02 15:03:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (16, 1, 2, 1, '2021-05-02 15:03:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (17, 1, 3, 1, '2021-05-02 15:45:26', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (18, 1, 1, 1, '2021-05-02 15:45:26', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (19, 1, 2, 1, '2021-05-02 15:45:26', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (20, 1, 4, 1, '2021-05-02 15:45:26', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (21, 3, 5, 1, '2021-05-02 17:42:56', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (22, 2, 6, 1, '2021-05-02 20:43:39', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:13', '::1');
INSERT INTO `perfil_opciones` VALUES (23, 4, 3, 1, '2021-05-02 20:49:19', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:20', '::1');
INSERT INTO `perfil_opciones` VALUES (24, 4, 4, 1, '2021-05-02 20:49:19', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:20', '::1');
INSERT INTO `perfil_opciones` VALUES (25, 4, 6, 1, '2021-05-02 20:49:19', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:20', '::1');
INSERT INTO `perfil_opciones` VALUES (26, 1, 3, 1, '2021-05-02 22:46:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (27, 1, 1, 1, '2021-05-02 22:46:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (28, 1, 2, 1, '2021-05-02 22:46:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (29, 1, 4, 1, '2021-05-02 22:46:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (30, 1, 7, 1, '2021-05-02 22:46:36', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (31, 1, 3, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (32, 1, 1, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (33, 1, 2, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (34, 1, 4, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (35, 1, 7, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (36, 1, 5, 1, '2021-05-02 23:23:23', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (37, 1, 3, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (38, 1, 1, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (39, 1, 2, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (40, 1, 4, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (41, 1, 7, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (42, 1, 5, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (43, 1, 8, 1, '2021-05-05 14:27:53', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (44, 1, 3, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (45, 1, 1, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (46, 1, 2, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (47, 1, 4, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (48, 1, 7, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (49, 1, 5, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (50, 1, 8, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (51, 1, 9, 1, '2021-05-25 22:11:31', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (52, 1, 3, 1, '2021-05-25 22:36:57', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (53, 1, 1, 1, '2021-05-25 22:36:57', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (54, 1, 2, 1, '2021-05-25 22:36:57', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (55, 1, 4, 1, '2021-05-25 22:36:57', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (56, 1, 7, 1, '2021-05-25 22:36:58', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (57, 1, 5, 1, '2021-05-25 22:36:58', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (58, 1, 8, 1, '2021-05-25 22:36:58', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (59, 1, 9, 1, '2021-05-25 22:36:58', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (60, 1, 10, 1, '2021-05-25 22:36:58', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (61, 1, 3, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (62, 1, 1, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (63, 1, 2, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (64, 1, 4, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (65, 1, 7, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (66, 1, 5, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (67, 1, 8, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (68, 1, 9, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (69, 1, 10, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (70, 1, 6, 1, '2021-06-01 20:35:40', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (71, 2, 3, 1, '2021-06-02 19:04:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:13', '::1');
INSERT INTO `perfil_opciones` VALUES (72, 2, 9, 1, '2021-06-02 19:04:50', '::1', NULL, NULL, NULL, 1, '2021-06-29 18:41:13', '::1');
INSERT INTO `perfil_opciones` VALUES (73, 1, 3, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (74, 1, 1, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (75, 1, 2, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (76, 1, 4, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (77, 1, 7, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (78, 1, 5, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (79, 1, 8, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (80, 1, 9, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (81, 1, 10, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (82, 1, 6, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (83, 1, 11, 1, '2021-06-02 19:13:12', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (84, 1, 3, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (85, 1, 1, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (86, 1, 2, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (87, 1, 4, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (88, 1, 7, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (89, 1, 5, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (90, 1, 8, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (91, 1, 9, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (92, 1, 10, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (93, 1, 6, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (94, 1, 11, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (95, 1, 12, 1, '2021-06-05 21:49:55', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (96, 1, 3, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (97, 1, 1, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (98, 1, 2, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (99, 1, 4, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (100, 1, 5, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (101, 1, 8, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (102, 1, 9, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (103, 1, 10, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (104, 1, 6, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (105, 1, 11, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (106, 1, 12, 1, '2021-06-19 22:08:13', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (107, 1, 3, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (108, 1, 1, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (109, 1, 2, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (110, 1, 4, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (111, 1, 5, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (112, 1, 8, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (113, 1, 9, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (114, 1, 10, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (115, 1, 6, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (116, 1, 11, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (117, 1, 12, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (118, 1, 7, 1, '2021-06-19 22:09:30', '::1', NULL, NULL, NULL, 1, '2021-06-29 22:59:36', '::1');
INSERT INTO `perfil_opciones` VALUES (119, 2, 3, 1, '2021-06-29 18:41:13', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (120, 2, 9, 1, '2021-06-29 18:41:13', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (121, 2, 12, 1, '2021-06-29 18:41:13', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (122, 4, 3, 1, '2021-06-29 18:41:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (123, 4, 4, 1, '2021-06-29 18:41:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (124, 4, 6, 1, '2021-06-29 18:41:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (125, 4, 10, 1, '2021-06-29 18:41:20', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (126, 1, 3, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (127, 1, 1, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (128, 1, 2, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (129, 1, 4, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (130, 1, 5, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (131, 1, 8, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (132, 1, 9, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (133, 1, 10, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (134, 1, 6, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (135, 1, 11, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (136, 1, 12, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (137, 1, 7, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfil_opciones` VALUES (138, 1, 13, 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for perfiles
-- ----------------------------
DROP TABLE IF EXISTS `perfiles`;
CREATE TABLE `perfiles`  (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_perfil`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of perfiles
-- ----------------------------
INSERT INTO `perfiles` VALUES (1, 'administrador', 'prueba', 1, 1, '2021-04-30 22:41:48', '::1', 1, '2021-06-29 22:59:36', '::1', NULL, NULL, NULL);
INSERT INTO `perfiles` VALUES (2, 'tecnico', 'perfil para personal técnico', 1, 1, '2021-04-30 23:47:13', '::1', 1, '2021-06-29 18:41:13', '::1', NULL, NULL, NULL);
INSERT INTO `perfiles` VALUES (3, 'Medico', 'Medico del hospital', 1, 1, '2021-05-02 17:42:56', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `perfiles` VALUES (4, 'Encargado Técnico', 'Encargado de las ordenes de trabajo', 1, 1, '2021-05-02 20:49:19', '::1', 1, '2021-06-29 18:41:20', '::1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for personas
-- ----------------------------
DROP TABLE IF EXISTS `personas`;
CREATE TABLE `personas`  (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(8) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_paterno` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `apellido_materno` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sexo` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personas
-- ----------------------------
INSERT INTO `personas` VALUES (1, '72669187', 'Franklin Ruiz', 'Asto', 'Leon', 'Masculino', 1, '2021-05-01 01:03:57', '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (2, '70547008', 'Paolo Junior', 'Carrion', 'Valverde', 'Masculino', 1, '2021-05-02 15:29:51', '::1', 1, '2021-06-02 18:59:30', '::1', NULL, NULL, NULL);
INSERT INTO `personas` VALUES (3, '74585005', 'Dayron Sebastian', 'Anaya', 'Atalaya', 'Masculino', 1, '2021-05-26 19:44:53', '::1', 1, '2021-06-02 19:00:08', '::1', NULL, NULL, NULL);
INSERT INTO `personas` VALUES (4, '73772835', 'Marco Junior', 'Saldaña', 'Alfaro', 'Masculino', 1, '2021-06-02 19:00:40', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (5, '40909490', 'CARLOS ALBERTO', 'LESCANO', 'AQUISE', 'Masculino', 1, '2021-06-29 23:42:34', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (6, '42344268', 'SERGIO ENRIQUE', 'FERNANDEZ', 'QUISPE', 'Masculino', 1, '2021-06-29 23:43:09', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (7, '07481317', 'JAVIER LUIS', 'SHINTANI', 'GRANADOS ', 'Masculino', 1, '2021-06-29 23:43:33', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (8, '10226979', 'JOSEPH FIAT', 'ANDRADE  ', 'GARTNER', 'Masculino', 1, '2021-06-29 23:43:57', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (9, '25791117', 'CARLA PAOLA', 'QUINTANILLA ', 'RUTI ', 'Femenino', 1, '2021-06-29 23:44:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `personas` VALUES (10, '08170176', 'JOSE EMILIANO', 'HERNANDEZ ', 'CHUJUTALLI ', 'Masculino', 1, '2021-06-29 23:44:47', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for preventivos
-- ----------------------------
DROP TABLE IF EXISTS `preventivos`;
CREATE TABLE `preventivos`  (
  `id_preventivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_equipo` int(11) NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `id_usuario_asignado` int(11) NULL DEFAULT NULL,
  `detalle_matenimiento` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `prioridad` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha_inicio` date NULL DEFAULT NULL,
  `fecha_termino` date NULL DEFAULT NULL,
  `descripcion_trabajo` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_archivo` int(11) NULL DEFAULT NULL,
  `estado_orden` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_preventivo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of preventivos
-- ----------------------------
INSERT INTO `preventivos` VALUES (1, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 22:27:42', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:30', NULL);
INSERT INTO `preventivos` VALUES (2, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 22:27:42', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (3, 2, '2021-05-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 23:29:32', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (4, 4, '2021-05-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 23:29:32', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (5, 2, '2021-05-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 23:32:34', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (6, 4, '2021-05-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-15 23:32:34', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (7, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 00:58:12', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (8, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 00:58:12', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (9, 2, '2021-06-01', 3, NULL, 'MEDIA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 00:58:56', '::1', 1, '2021-06-16 01:45:18', '::1', NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (10, 4, '2021-06-01', 3, NULL, 'ALTA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 00:58:56', '::1', 1, '2021-06-16 01:41:04', '::1', NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (11, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:00:00', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (12, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:00:00', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (13, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:00:55', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (14, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:00:55', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (15, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:01:01', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (16, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 01:01:01', '::1', NULL, NULL, NULL, NULL, '2021-06-16 00:56:35', NULL);
INSERT INTO `preventivos` VALUES (17, 2, '2021-06-01', 3, 'prueba 201', 'ALTA', NULL, '2021-06-29', 'nuevo', 10, 'ATENDIDO', 1, '2021-06-16 20:39:37', '::1', 3, '2021-06-29 22:02:35', '::1', NULL, '2021-06-30 20:31:21', NULL);
INSERT INTO `preventivos` VALUES (18, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 20:39:37', '::1', NULL, NULL, NULL, NULL, '2021-06-30 20:31:21', NULL);
INSERT INTO `preventivos` VALUES (19, 6, '2021-06-02', 3, NULL, 'MEDIA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 1, '2021-06-16 20:39:37', '::1', 1, '2021-06-16 20:40:32', '::1', NULL, '2021-06-30 20:31:21', NULL);
INSERT INTO `preventivos` VALUES (20, 2, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 4, '2021-06-30 21:02:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `preventivos` VALUES (21, 4, '2021-06-01', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 4, '2021-06-30 21:02:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `preventivos` VALUES (22, 6, '2021-06-02', 3, NULL, 'ALTA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 4, '2021-06-30 21:02:04', '::1', 4, '2021-06-30 21:02:28', '::1', NULL, NULL, NULL);
INSERT INTO `preventivos` VALUES (23, 11, '2021-06-02', NULL, NULL, 'BAJA', NULL, NULL, NULL, NULL, 'PROGRAMADO', 4, '2021-06-30 21:02:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `preventivos` VALUES (24, 5, '2021-06-03', 6, 'dfgdfg', 'MEDIA', NULL, '2021-06-30', 'dfgdfg', 13, 'ATENDIDO', 4, '2021-06-30 21:02:04', '::1', 6, '2021-06-30 21:03:03', '::1', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for secciones
-- ----------------------------
DROP TABLE IF EXISTS `secciones`;
CREATE TABLE `secciones`  (
  `id_seccion` int(11) NOT NULL AUTO_INCREMENT,
  `codigo_seccion` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `nombre_seccion` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_area` int(11) NOT NULL,
  `id_usuario_reg` int(11) NOT NULL,
  `fecha_reg` datetime(0) NOT NULL,
  `ipmaq_reg` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_usuario_act` int(11) NULL DEFAULT NULL,
  `fecha_act` datetime(0) NULL DEFAULT NULL,
  `ipmaq_act` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `id_usuario_del` int(11) NULL DEFAULT NULL,
  `fecha_del` datetime(0) NULL DEFAULT NULL,
  `ipmaq_del` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_seccion`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of secciones
-- ----------------------------
INSERT INTO `secciones` VALUES (1, '001', 'A', 1, 1, '2021-05-02 16:26:46', '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (2, '001', 'B', 1, 1, '2021-05-02 16:27:08', '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (3, '003', 'Topico', 3, 1, '2021-06-02 19:19:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (4, '004', 'A', 2, 1, '2021-06-29 23:10:14', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (5, '005', 'A', 10, 1, '2021-06-29 23:10:35', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (6, '006', 'B', 10, 1, '2021-06-29 23:10:44', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (7, '007', 'C', 10, 1, '2021-06-29 23:10:53', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `secciones` VALUES (8, '008', 'A', 14, 1, '2021-06-29 23:11:54', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for tipos
-- ----------------------------
DROP TABLE IF EXISTS `tipos`;
CREATE TABLE `tipos`  (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id_tipo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tipos
-- ----------------------------
INSERT INTO `tipos` VALUES (1, 'Electrónico', NULL, 1, '2021-05-01 15:33:12', '1', 1, '2021-05-05 14:35:29', '::1', NULL, NULL, NULL);
INSERT INTO `tipos` VALUES (2, 'Electrico', NULL, 1, '2021-05-05 14:28:04', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tipos` VALUES (3, 'Mecánico', NULL, 1, '2021-05-05 14:35:15', '::1', NULL, NULL, NULL, 1, '2021-05-05 14:35:35', '::1');
INSERT INTO `tipos` VALUES (4, 'Hidráulico', NULL, 1, '2021-05-19 22:39:15', '::1', 1, '2021-06-16 19:01:15', '::1', NULL, NULL, NULL);
INSERT INTO `tipos` VALUES (5, 'Inalámbrico ', NULL, 1, '2021-06-02 19:55:00', '::1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `tipos` VALUES (6, 'Prueba', NULL, 1, '2021-06-02 20:17:33', '::1', 1, '2021-06-02 20:17:50', '::1', 1, '2021-06-02 20:18:01', '::1');
INSERT INTO `tipos` VALUES (7, 'Mecánico', NULL, 1, '2021-06-16 19:01:24', '::1', NULL, NULL, NULL, NULL, NULL, NULL);

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
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 1, 15, 1, 'admin', '$2y$13$AzSu7ICHHQQo7durNWiSju29o9CNOKhynuXmp1RnAE2thoZppAQiW', 'prueba@gmail.com', 1, '2021-04-30 01:16:30', 'a', 1, '2021-06-29 23:51:59', '::1', NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (2, 2, 1, 3, 'medico', '$2y$13$MsXhSTmLi/DTlUN86NCI1.X707UiTXyT0jwC4srGIdtxnyDjncA0G', 'franklin.asto.leon@gmail.com', 1, '2021-05-01 01:25:12', '::1', 1, '2021-06-02 19:01:18', '::1', NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (3, 3, 15, 2, 'tecnico', '$2y$13$F8iCMa7RpR73q6/oetBw0uWDHcUm4eLON5Z1/0syh38gc/Uzg8SYu', 'franklin.asto.leon@gmail.com', 1, '2021-05-01 01:37:04', '::1', 1, '2021-06-29 23:52:06', '::1', NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (4, 4, 15, 4, 'encargado', '$2y$13$o3fBe4hfhEOQm91lXD3E7e/41eEdFJTYCxPIPayZtEJ8VLHcKBPu.', 'nuevo@utp.edu.pe', 1, '2021-05-02 20:49:43', '::1', 1, '2021-06-29 23:52:13', '::1', NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (5, 5, 3, 3, 'medico2', '$2y$13$/HAvlSL744jhUaMQ/5nw3.T6BvtkVC6LbZNu/XmRC1DgLapBiv3S2', 'nuevo@utp.edu.pe', 1, '2021-06-29 23:45:32', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (6, 6, 15, 2, 'tecnico2', '$2y$13$C1GVl2knB4cyJzZKrq7UeOxD/6xmmPFs9tWiKo.2gPstujbcpBs56', 'nuevo@utp.edu.pe', 1, '2021-06-29 23:52:42', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (7, 8, 2, 3, 'medico3', '$2y$13$MOcplO4tDtWLCP.JihWoBeUxMX2lSO8T1495DOseuomzFRd3Ac9BG', 'nuevo@utp.edu.pe', 1, '2021-06-29 23:53:23', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (8, 9, 1, 3, 'medico4', '$2y$13$CVS2qy1TzI1Ic8SAe3hsi.jkbnDhIYeqcTydcyXr3CKyNcdVWlBXO', 'nuevo@utp.edu.pe', 1, '2021-06-29 23:53:56', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);
INSERT INTO `usuarios` VALUES (9, 10, 15, 2, 'tecnico3', '$2y$13$Wek0knPmqRpw36KkWdwU0uBe659HRtZlwABazQkk7NpHOtaD0wjvq', 'nuevo@utp.edu.pe', 1, '2021-06-29 23:54:29', '::1', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- ----------------------------
-- Procedure structure for bandejaEncargadoTecnico
-- ----------------------------
DROP PROCEDURE IF EXISTS `bandejaEncargadoTecnico`;
delimiter ;;
CREATE PROCEDURE `bandejaEncargadoTecnico`(IN row1 INT,IN length1 INT,IN busca varchar(200),OUT total int)
BEGIN
		 declare totalRegistro int;

		 select
			ot.id_orden_trabajo,
			c.descripcion as categoria,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
				concat('E-',LPAD(e.id_equipo, 5, '0'),'::',e.nombre_equipo) as equipo,
			ot.descripcion,
			h.estado,
			concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as tecnico
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		left join usuarios u on h.id_usuario_destino = u.id_usuario
		left join personas p on u.id_persona = p.id_persona
		where ot.fecha_del is null and concat(ot.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%')
		order by ot.id_orden_trabajo desc
		LIMIT row1,length1;
		
		set totalRegistro =  (select count(ot.id_orden_trabajo)	from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		left join usuarios u on h.id_usuario_destino = u.id_usuario
		left join personas p on u.id_persona = p.id_persona
		where ot.fecha_del is null 
		and concat(ot.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%'));
		
		
		select totalRegistro INTO total;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for bandejaOrden
-- ----------------------------
DROP PROCEDURE IF EXISTS `bandejaOrden`;
delimiter ;;
CREATE PROCEDURE `bandejaOrden`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
		 select
			ot.id_orden_trabajo,
			c.descripcion as categoria,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			concat('E-',LPAD(e.id_equipo, 5, '0'),'::',e.nombre_equipo) as equipo,
			h.estado,
			(select count(*) from orden_trabajos where fecha_del is null) as total
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		where ot.fecha_del is null and concat(c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,h.estado) like concat('%',busca,'%')
		order by ot.id_orden_trabajo desc
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for bandejaPreventivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `bandejaPreventivo`;
delimiter ;;
CREATE PROCEDURE `bandejaPreventivo`(IN row1 INT,IN length1 INT,IN busca varchar(200),IN idTecnico INT,OUT total int)
BEGIN
		 declare totalRegistro int;

		select 
			p.id_preventivo,
			e.id_equipo,
			concat('E-',LPAD(e.id_equipo, 5, '0'),'::',e.nombre_equipo) as equipo,
			p.fecha_mantenimiento,
			p.prioridad,
			p.fecha_inicio,
			p.fecha_termino,
			p.descripcion_trabajo,
			p.estado_orden
		from preventivos p
		inner join equipos e on p.id_equipo = e.id_equipo
		where p.fecha_del is null 
		and p.id_usuario_asignado = idTecnico
		and concat(p.id_equipo,'',e.nombre_equipo,'',p.fecha_mantenimiento,'',p.prioridad,'',IFNULL(p.fecha_termino,''),'',p.estado_orden) like concat('%',busca,'%')
		order by p.id_preventivo desc
		LIMIT row1,length1;
		
		set totalRegistro =  (select 
			count(p.id_preventivo)
		from preventivos p
		inner join equipos e on p.id_equipo = e.id_equipo
		where p.fecha_del is null 
		and p.id_usuario_asignado = idTecnico
		and concat(p.id_equipo,'',e.nombre_equipo,'',p.fecha_mantenimiento,'',p.prioridad,'',IFNULL(p.fecha_termino,''),'',p.estado_orden) like concat('%',busca,'%') );
		
		
		select totalRegistro INTO total;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for bandejaTecnico
-- ----------------------------
DROP PROCEDURE IF EXISTS `bandejaTecnico`;
delimiter ;;
CREATE PROCEDURE `bandejaTecnico`(IN row1 INT,IN length1 INT,IN busca varchar(200),IN idUsuario int,OUT total int)
BEGIN
		declare totalRegistro int;
		
		select
			ot.id_orden_trabajo,
			e.id_equipo,
			c.descripcion as categoria,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			concat('E-',LPAD(e.id_equipo, 5, '0'),'::',e.nombre_equipo) as equipo,
			ot.descripcion,
			h.estado
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		where ot.fecha_del is null and h.id_usuario_destino = idUsuario and concat(e.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%')
		order by ot.id_orden_trabajo desc
		LIMIT row1,length1;
		
		
		set totalRegistro =  (select count(ot.id_orden_trabajo)	from orden_trabajos ot
													inner join categorias c on ot.id_categoria = c.id_categoria
													inner join secciones s on ot.id_seccion = s.id_seccion
													inner join equipos e on ot.id_equipo = e.id_equipo
													inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
													where ot.fecha_del is null and h.id_usuario_destino = idUsuario 
													and concat(e.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%'));
		
		
		select totalRegistro INTO total;
		
END
;;
delimiter ;

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
-- Procedure structure for graficoPrueba
-- ----------------------------
DROP PROCEDURE IF EXISTS `graficoPrueba`;
delimiter ;;
CREATE PROCEDURE `graficoPrueba`()
begin
select 
	s.nombre_seccion,
	count(e.id_equipo) as cantidad
from orden_trabajos od
	inner join secciones s on od.id_seccion = s.id_seccion
	inner join equipos e on od.id_equipo = e.id_equipo
group by s.nombre_seccion;
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
-- Procedure structure for listadoCategoria
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoCategoria`;
delimiter ;;
CREATE PROCEDURE `listadoCategoria`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
	select 
		id_categoria,
		descripcion,
		(select count(*) from categorias where fecha_del is null) as total
	from categorias
  where fecha_del is null and descripcion like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoEquipo
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoEquipo`;
delimiter ;;
CREATE PROCEDURE `listadoEquipo`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
   SELECT 
			e.id_equipo,
			t.nombre as tipo,
			e.nombre_equipo,
			e.descripcion,
			(select count(*) from equipos where fecha_del is null) as total
		FROM equipos e
		inner join tipos t on e.id_tipo = t.id_tipo 
		where e.fecha_del is null and concat(e.id_equipo,'',t.nombre,' ',e.nombre_equipo) like concat('%',busca,'%')
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
-- Procedure structure for listadoMovimiento
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoMovimiento`;
delimiter ;;
CREATE PROCEDURE `listadoMovimiento`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
		select 
			m.id_movimiento,
			eq.nombre_equipo as equipo,
			concat(a.codigo_area,' - ',a.nombre_area) as area,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			e.descripcion as estado,
			(select count(*) from movimientos where flg_activo = 1) as total
		from movimientos m
		inner join equipos eq on m.id_equipo = eq.id_equipo
		inner join secciones s on m.id_seccion = s.id_seccion
		inner join estado_equipos e on m.id_estado = e.id_estado_equipo
		inner join areas a on s.id_area = a.id_area
		where m.flg_activo = 1 and concat(eq.nombre_equipo,a.codigo_area,' - ',a.nombre_area,s.codigo_seccion,' - ',s.nombre_seccion,e.descripcion) like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoOrden
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoOrden`;
delimiter ;;
CREATE PROCEDURE `listadoOrden`(IN row1 INT,IN length1 INT,IN idMedico INT,IN busca varchar(200))
BEGIN

declare total int;

set total = (select
			count(ot.id_orden_trabajo)
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		where ot.fecha_del is null and ot.id_usuario_reg = idMedico and concat(e.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%'));

		 select
			ot.id_orden_trabajo,
			c.descripcion as categoria,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			concat('E-',LPAD(e.id_equipo, 5, '0'),'::',e.nombre_equipo) as equipo,
			ot.descripcion,
			h.estado,
			total as total
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		where ot.fecha_del is null and ot.id_usuario_reg = idMedico and concat(e.id_equipo,'',c.descripcion,s.codigo_seccion,' - ',s.nombre_seccion,e.nombre_equipo,ot.descripcion,h.estado) like concat('%',busca,'%')
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
		dni,
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
-- Procedure structure for listadoSecciones
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoSecciones`;
delimiter ;;
CREATE PROCEDURE `listadoSecciones`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
	select 
		s.id_seccion,
		s.codigo_seccion,
		s.nombre_seccion,
		a.nombre_area,
		(select count(*) from secciones where fecha_del is null) as total
	from secciones s
	inner join areas a on s.id_area = a.id_area
where s.fecha_del is null and concat(s.codigo_seccion,' ',s.nombre_seccion,' ',a.nombre_area) like concat('%',busca,'%')
		LIMIT row1,length1;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listadoTipo
-- ----------------------------
DROP PROCEDURE IF EXISTS `listadoTipo`;
delimiter ;;
CREATE PROCEDURE `listadoTipo`(IN row1 INT,IN length1 INT,IN busca varchar(200))
BEGIN
	select 
		id_tipo,
		nombre,
		(select count(*) from tipos where fecha_del is null) as total
	from tipos
  where fecha_del is null and nombre like concat('%',busca,'%')
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
-- Procedure structure for listaPreventivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `listaPreventivo`;
delimiter ;;
CREATE PROCEDURE `listaPreventivo`(IN mes int)
begin
select
	p.id_preventivo,
	p.fecha_mantenimiento,
	concat(t.nombre,'::',e.nombre_equipo) as equipo,
	p.prioridad
from preventivos p 
inner join equipos e on p.id_equipo = e.id_equipo
inner join tipos t on e.id_tipo = t.id_tipo
where MONTH(p.fecha_mantenimiento) =  mes and p.fecha_del is null;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for listaTecnicos
-- ----------------------------
DROP PROCEDURE IF EXISTS `listaTecnicos`;
delimiter ;;
CREATE PROCEDURE `listaTecnicos`()
begin
	select 
		u.id_usuario,
		concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as tecnico
	from usuarios u 
	inner join personas p on u.id_persona = p.id_persona
	where u.id_perfil = 2 and u.fecha_del is null ;
end
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
from perfil_opciones po
inner join opciones o on po.id_opcion = o.id_opcion and po.fecha_del is null where po.id_perfil = idPerfil;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for pdfInforme
-- ----------------------------
DROP PROCEDURE IF EXISTS `pdfInforme`;
delimiter ;;
CREATE PROCEDURE `pdfInforme`(IN idOrden int)
begin
 select
			c.descripcion as categoria,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			e.nombre_equipo as equipo,
			ot.descripcion,
			concat(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) as tecnico,
			i.descripcion_falla,
			i.diagnostico,
			i.recomendaciones,
			a.nombre as archivo
		from orden_trabajos ot
		inner join categorias c on ot.id_categoria = c.id_categoria
		inner join secciones s on ot.id_seccion = s.id_seccion
		inner join equipos e on ot.id_equipo = e.id_equipo
		inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
		left join usuarios u on h.id_usuario_destino = u.id_usuario
		left join personas p on u.id_persona = p.id_persona
		inner join informe_tecnicos i on ot.id_orden_trabajo = i.id_orden_trabajo
		left join archivos a on i.id_archivo = a.id_archivo
		where ot.fecha_del is null and ot.id_orden_trabajo = idOrden;
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
from perfil_opciones po
right join opciones o on po.id_opcion = o.id_opcion and po.fecha_del is null and po.id_perfil = idPerfil;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for preventivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `preventivo`;
delimiter ;;
CREATE PROCEDURE `preventivo`(IN n int)
BEGIN
		select 
				e.id_equipo,
				e.nombre_equipo
		  from orden_trabajos ot
			inner join equipos e on ot.id_equipo = e.id_equipo
		  where ot.flg_atencion = 1
		  group by e.id_equipo,e.nombre_equipo
		  order by count(ot.id_orden_trabajo) desc
			LIMIT n,2;
END
;;
delimiter ;

-- ----------------------------
-- Procedure structure for reporteOrden
-- ----------------------------
DROP PROCEDURE IF EXISTS `reporteOrden`;
delimiter ;;
CREATE PROCEDURE `reporteOrden`()
begin
	select
		ot.id_orden_trabajo,
		c.descripcion as categoria,
		concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
		e.nombre_equipo as equipo,
		ot.descripcion,
		h.estado
	from orden_trabajos ot
	inner join categorias c on ot.id_categoria = c.id_categoria
	inner join secciones s on ot.id_seccion = s.id_seccion
	inner join equipos e on ot.id_equipo = e.id_equipo
	inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
	where ot.fecha_del is null and h.estado != 'ATENDIDO';
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for reportePreventivo
-- ----------------------------
DROP PROCEDURE IF EXISTS `reportePreventivo`;
delimiter ;;
CREATE PROCEDURE `reportePreventivo`()
begin
	select
		p.id_preventivo,
		p.fecha_mantenimiento,
		concat(t.nombre,'::',e.nombre_equipo) as equipo,
		p.prioridad
	from preventivos p 
	inner join equipos e on p.id_equipo = e.id_equipo
	inner join tipos t on e.id_tipo = t.id_tipo
	where p.fecha_del is null and p.estado_orden != 'ATENDIDO';
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for rerporteEquipo
-- ----------------------------
DROP PROCEDURE IF EXISTS `rerporteEquipo`;
delimiter ;;
CREATE PROCEDURE `rerporteEquipo`()
begin
	select
		e.nombre_equipo as equipo,
		count(ot.id_orden_trabajo) as cantidad
	from orden_trabajos ot
	#inner join categorias c on ot.id_categoria = c.id_categoria
	#inner join secciones s on ot.id_seccion = s.id_seccion
	inner join equipos e on ot.id_equipo = e.id_equipo
	inner join hoja_rutas h on ot.id_orden_trabajo = h.id_orden_trabajo and h.flg_estado = 1
	where ot.fecha_del is null and h.estado = 'ATENDIDO'
	group by e.nombre_equipo;
end
;;
delimiter ;

-- ----------------------------
-- Procedure structure for spListaEquipo
-- ----------------------------
DROP PROCEDURE IF EXISTS `spListaEquipo`;
delimiter ;;
CREATE PROCEDURE `spListaEquipo`()
begin
SELECT 	
			t.nombre as tipo,
			e.nombre_equipo,
			f.marca,
			f.modelo,
		  f.serie,
			e.descripcion,
			concat(a.codigo_area,' - ',a.nombre_area) as area,
			concat(s.codigo_seccion,' - ',s.nombre_seccion) as seccion,
			eq.descripcion as estado_equipos
		FROM equipos e
		inner join tipos t on e.id_tipo = t.id_tipo 
		inner join ficha_tecnicas f on e.id_equipo = f.id_equipo 
		inner join movimientos m on e.id_equipo = m.id_equipo 
		inner join estado_equipos eq on m.id_estado = eq.id_estado_equipo 
		inner join secciones s on m.id_seccion = s.id_seccion
		inner join areas a on s.id_area = a.id_area;
end
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
