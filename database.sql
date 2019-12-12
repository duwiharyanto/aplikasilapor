/*
 Navicat Premium Data Transfer

 Source Server         : PHP7.3
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : localhost:3306
 Source Schema         : lapor

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 12/12/2019 14:01:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for lapor
-- ----------------------------
DROP TABLE IF EXISTS `lapor`;
CREATE TABLE `lapor`  (
  `lapor_id` int(11) NOT NULL AUTO_INCREMENT,
  `lapor_lapor` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `lapor_status` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lapor_email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `lapor_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `save_at` timestamp(0) NOT NULL DEFAULT current_timestamp(0),
  PRIMARY KEY (`lapor_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of lapor
-- ----------------------------
INSERT INTO `lapor` VALUES (2, 'PC akuntan mati', '1', 'haryanto.duwi@gmail.com', 'duwi', '2019-12-12 13:48:05');
INSERT INTO `lapor` VALUES (3, 'pc kasir mati bos', '1', 'dani@gmail.com', 'dani', '2019-12-11 13:51:35');
INSERT INTO `lapor` VALUES (4, 'Tinta printer habis', '0', 'diana@gmail.com', 'diana', '2019-12-12 13:46:17');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_ikon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_is_mainmenu` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses_level` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_urutan` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_status` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `menu_akses` int(2) NULL DEFAULT NULL,
  PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 104 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 'master', 'fa fa-tasks', '0', 'master/admin', '1', '1', '1', 0);
INSERT INTO `menu` VALUES (2, 'barang', 'fa fa-circle-o', '1', 'barang/admin', '1', '1', '1', 0);
INSERT INTO `menu` VALUES (4, 'home', 'fa fa-tasks', '0', 'frontend/home', '0', '1', '0', 0);
INSERT INTO `menu` VALUES (5, 'download', 'fa fa-download', '0', 'frontend/download', '0', '3', '0', 0);
INSERT INTO `menu` VALUES (8, 'bukutamu', 'fa fa-book', '0', 'bukutamu/admin', '1', '2', '1', 0);
INSERT INTO `menu` VALUES (9, 'user', 'mdi mdi-account-box', '14', 'user/admin', '1,2', '99', '1', 1);
INSERT INTO `menu` VALUES (14, 'setting', 'mdi mdi-settings ', '0', 'setting', '1,2', '99', '1', 1);
INSERT INTO `menu` VALUES (102, 'lapor', 'mdi mdi-bookmark ', '0', 'lapor/lapor', '1,2', '2', '1', 1);
INSERT INTO `menu` VALUES (103, 'dashboard', 'mdi mdi-view-dashboard', '0', 'dashboard/dashboard', '1,2', '1', '1', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_password` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `user_nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_level` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_terdaftar` date NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', 'admin', 'admina', '1', '2018-09-29');
INSERT INTO `user` VALUES (3, 'haryanto', 'haryanto', 'haryanto duwi', '2', '2018-10-21');
INSERT INTO `user` VALUES (4, 'duwi', 'duwi', 'duwi haryanto', '1', '2018-11-30');
INSERT INTO `user` VALUES (5, 'rekammedis', 'rekammedis', 'rekammedis', '1', '2019-11-28');

SET FOREIGN_KEY_CHECKS = 1;
