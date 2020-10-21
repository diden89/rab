/*
 Navicat Premium Data Transfer

 Source Server         : local8
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 27/09/2020 23:52:18
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_menu_access_group
-- ----------------------------
DROP TABLE IF EXISTS `log_menu_access_group`;
CREATE TABLE `log_menu_access_group`  (
  `mag_id` int NOT NULL,
  `mag_ug_id` int NULL DEFAULT NULL,
  `mag_rm_id` int NULL DEFAULT NULL,
  `mag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_group
-- ----------------------------
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 1);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 2);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 3);
INSERT INTO `log_menu_access_group` VALUES (123, 1, 35, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 4);
INSERT INTO `log_menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 5);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-26 10:46:30', 1, 'add', '2020-09-26 10:46:30', 6);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 7);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 8);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 9);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 10);
INSERT INTO `log_menu_access_group` VALUES (129, 1, 37, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 11);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 12);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 13);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 14);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 15);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 16);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 17);
INSERT INTO `log_menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 18);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 19);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 20);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 21);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 22);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 23);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 24);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 25);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-27 00:03:19', 1, 'edit', '2020-09-27 00:03:19', 26);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 27);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 28);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 29);
INSERT INTO `log_menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 30);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 31);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 32);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 33);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 34);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 35);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-09-27 00:03:26', 1, 'add', '2020-09-27 00:03:26', 36);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 37);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 38);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-27 00:03:26', 1, 'edit', '2020-09-27 00:03:26', 39);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 40);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 41);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 42);
INSERT INTO `log_menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 43);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 44);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 45);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 46);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 47);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 48);
INSERT INTO `log_menu_access_group` VALUES (134, 1, 46, 'Y', 1, '2020-09-27 00:07:36', 1, 'add', '2020-09-27 00:07:36', 49);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 50);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 51);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 52);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-27 00:07:36', 1, 'edit', '2020-09-27 00:07:36', 53);
INSERT INTO `log_menu_access_group` VALUES (135, 3, 1, 'Y', 1, '2020-09-27 23:26:14', 1, 'add', '2020-09-27 23:26:14', 54);
INSERT INTO `log_menu_access_group` VALUES (136, 3, 4, 'Y', 1, '2020-09-27 23:26:14', 1, 'add', '2020-09-27 23:26:14', 55);
INSERT INTO `log_menu_access_group` VALUES (137, 3, 1, 'Y', 1, '2020-09-27 23:38:45', 1, 'add', '2020-09-27 23:38:45', 56);

-- ----------------------------
-- Table structure for log_menu_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `log_menu_access_sub_group`;
CREATE TABLE `log_menu_access_sub_group`  (
  `masg_id` int NULL DEFAULT NULL,
  `masg_ug_id` int NULL DEFAULT NULL,
  `masg_usg_id` int NULL DEFAULT NULL,
  `masg_rm_id` int NULL DEFAULT NULL,
  `masg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_sub_group
-- ----------------------------
INSERT INTO `log_menu_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 14);
INSERT INTO `log_menu_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 15);
INSERT INTO `log_menu_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 16);
INSERT INTO `log_menu_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 17);
INSERT INTO `log_menu_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 18);
INSERT INTO `log_menu_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 19);
INSERT INTO `log_menu_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 20);
INSERT INTO `log_menu_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 21);
INSERT INTO `log_menu_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 22);
INSERT INTO `log_menu_access_sub_group` VALUES (16, 1, 1, 37, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 23);
INSERT INTO `log_menu_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 24);
INSERT INTO `log_menu_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 25);
INSERT INTO `log_menu_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 26);
INSERT INTO `log_menu_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 27);
INSERT INTO `log_menu_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 28);
INSERT INTO `log_menu_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 29);
INSERT INTO `log_menu_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 30);
INSERT INTO `log_menu_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 31);
INSERT INTO `log_menu_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 32);
INSERT INTO `log_menu_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 33);
INSERT INTO `log_menu_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 34);
INSERT INTO `log_menu_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 35);
INSERT INTO `log_menu_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 36);
INSERT INTO `log_menu_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 37);
INSERT INTO `log_menu_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-27 00:03:08', 1, 'edit', '2020-09-27 00:03:08', 38);
INSERT INTO `log_menu_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 39);
INSERT INTO `log_menu_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 40);
INSERT INTO `log_menu_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 41);
INSERT INTO `log_menu_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 42);
INSERT INTO `log_menu_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 43);
INSERT INTO `log_menu_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 44);
INSERT INTO `log_menu_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 45);
INSERT INTO `log_menu_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 46);
INSERT INTO `log_menu_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 47);
INSERT INTO `log_menu_access_sub_group` VALUES (20, 1, 1, 43, 'Y', 1, '2020-09-27 00:03:50', 1, 'add', '2020-09-27 00:03:50', 48);
INSERT INTO `log_menu_access_sub_group` VALUES (21, 1, 1, 45, 'Y', 1, '2020-09-27 00:03:50', 1, 'add', '2020-09-27 00:03:50', 49);
INSERT INTO `log_menu_access_sub_group` VALUES (22, 1, 1, 37, 'Y', 1, '2020-09-27 00:03:50', 1, 'add', '2020-09-27 00:03:50', 50);
INSERT INTO `log_menu_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 51);
INSERT INTO `log_menu_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 52);
INSERT INTO `log_menu_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-27 00:03:50', 1, 'edit', '2020-09-27 00:03:50', 53);
INSERT INTO `log_menu_access_sub_group` VALUES (23, 1, 2, 1, 'Y', 1, '2020-09-27 23:30:22', 1, 'add', '2020-09-27 23:30:22', 54);
INSERT INTO `log_menu_access_sub_group` VALUES (24, 1, 2, 1, 'Y', 1, '2020-09-27 23:30:34', 1, 'add', '2020-09-27 23:30:34', 55);
INSERT INTO `log_menu_access_sub_group` VALUES (25, 1, 2, 1, 'Y', 1, '2020-09-27 23:34:15', 1, 'add', '2020-09-27 23:34:15', 56);
INSERT INTO `log_menu_access_sub_group` VALUES (26, 1, 2, 1, 'Y', 1, '2020-09-27 23:35:28', 1, 'add', '2020-09-27 23:35:28', 57);
INSERT INTO `log_menu_access_sub_group` VALUES (27, 1, 2, 1, 'Y', 1, '2020-09-27 23:36:28', 1, 'add', '2020-09-27 23:36:28', 58);

-- ----------------------------
-- Table structure for log_menu_access_user
-- ----------------------------
DROP TABLE IF EXISTS `log_menu_access_user`;
CREATE TABLE `log_menu_access_user`  (
  `mau_id` int UNSIGNED NOT NULL,
  `mau_user_id` int UNSIGNED NOT NULL,
  `mau_menu_id` int UNSIGNED NOT NULL,
  `mau_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_user
-- ----------------------------
INSERT INTO `log_menu_access_user` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 1);
INSERT INTO `log_menu_access_user` VALUES (4, 1, 4, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 2);
INSERT INTO `log_menu_access_user` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 3);
INSERT INTO `log_menu_access_user` VALUES (45, 1, 40, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 4);
INSERT INTO `log_menu_access_user` VALUES (49, 1, 42, 'Y', 1, '2020-09-27 00:01:04', 1, 'add', '2020-09-27 00:01:04', 5);
INSERT INTO `log_menu_access_user` VALUES (2, 1, 2, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 6);
INSERT INTO `log_menu_access_user` VALUES (40, 1, 36, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 7);
INSERT INTO `log_menu_access_user` VALUES (39, 1, 33, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 8);
INSERT INTO `log_menu_access_user` VALUES (46, 1, 41, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 9);
INSERT INTO `log_menu_access_user` VALUES (47, 1, 43, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 10);
INSERT INTO `log_menu_access_user` VALUES (48, 1, 45, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 11);
INSERT INTO `log_menu_access_user` VALUES (41, 1, 37, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 12);
INSERT INTO `log_menu_access_user` VALUES (3, 1, 3, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 13);
INSERT INTO `log_menu_access_user` VALUES (42, 1, 38, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 14);
INSERT INTO `log_menu_access_user` VALUES (43, 1, 39, 'Y', 1, '2020-09-27 00:01:04', 1, 'edit', '2020-09-27 00:01:04', 15);
INSERT INTO `log_menu_access_user` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 16);
INSERT INTO `log_menu_access_user` VALUES (4, 1, 4, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 17);
INSERT INTO `log_menu_access_user` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 18);
INSERT INTO `log_menu_access_user` VALUES (45, 1, 40, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 19);
INSERT INTO `log_menu_access_user` VALUES (49, 1, 42, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 20);
INSERT INTO `log_menu_access_user` VALUES (2, 1, 2, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 21);
INSERT INTO `log_menu_access_user` VALUES (40, 1, 36, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 22);
INSERT INTO `log_menu_access_user` VALUES (39, 1, 33, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 23);
INSERT INTO `log_menu_access_user` VALUES (46, 1, 41, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 24);
INSERT INTO `log_menu_access_user` VALUES (47, 1, 43, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 25);
INSERT INTO `log_menu_access_user` VALUES (48, 1, 45, 'Y', 1, '2020-09-27 00:01:33', 1, 'edit', '2020-09-27 00:01:33', 26);
INSERT INTO `log_menu_access_user` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 27);
INSERT INTO `log_menu_access_user` VALUES (4, 1, 4, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 28);
INSERT INTO `log_menu_access_user` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 29);
INSERT INTO `log_menu_access_user` VALUES (45, 1, 40, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 30);
INSERT INTO `log_menu_access_user` VALUES (49, 1, 42, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 31);
INSERT INTO `log_menu_access_user` VALUES (2, 1, 2, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 32);
INSERT INTO `log_menu_access_user` VALUES (40, 1, 36, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 33);
INSERT INTO `log_menu_access_user` VALUES (39, 1, 33, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 34);
INSERT INTO `log_menu_access_user` VALUES (46, 1, 41, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 35);
INSERT INTO `log_menu_access_user` VALUES (47, 1, 43, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 36);
INSERT INTO `log_menu_access_user` VALUES (48, 1, 45, 'Y', 1, '2020-09-27 00:04:51', 1, 'edit', '2020-09-27 00:04:51', 37);
INSERT INTO `log_menu_access_user` VALUES (50, 1, 37, 'Y', 1, '2020-09-27 00:04:51', 1, 'add', '2020-09-27 00:04:51', 38);
INSERT INTO `log_menu_access_user` VALUES (51, 1, 3, 'Y', 1, '2020-09-27 00:04:51', 1, 'add', '2020-09-27 00:04:51', 39);
INSERT INTO `log_menu_access_user` VALUES (52, 1, 38, 'Y', 1, '2020-09-27 00:04:51', 1, 'add', '2020-09-27 00:04:51', 40);
INSERT INTO `log_menu_access_user` VALUES (53, 1, 39, 'Y', 1, '2020-09-27 00:04:51', 1, 'add', '2020-09-27 00:04:51', 41);
INSERT INTO `log_menu_access_user` VALUES (54, 2, 1, 'Y', 1, '2020-09-27 23:46:19', 1, 'add', '2020-09-27 23:46:19', 42);
INSERT INTO `log_menu_access_user` VALUES (55, 2, 4, 'Y', 1, '2020-09-27 23:46:19', 1, 'add', '2020-09-27 23:46:19', 43);
INSERT INTO `log_menu_access_user` VALUES (56, 2, 5, 'Y', 1, '2020-09-27 23:46:19', 1, 'add', '2020-09-27 23:46:19', 44);
INSERT INTO `log_menu_access_user` VALUES (57, 2, 40, 'Y', 1, '2020-09-27 23:46:19', 1, 'add', '2020-09-27 23:46:19', 45);
INSERT INTO `log_menu_access_user` VALUES (58, 2, 42, 'Y', 1, '2020-09-27 23:46:19', 1, 'add', '2020-09-27 23:46:19', 46);

-- ----------------------------
-- Table structure for menu_access_group
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_group`;
CREATE TABLE `menu_access_group`  (
  `mag_id` int NOT NULL AUTO_INCREMENT,
  `mag_ug_id` int NULL DEFAULT NULL,
  `mag_rm_id` int NULL DEFAULT NULL,
  `mag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`mag_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 135 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_access_group
-- ----------------------------
INSERT INTO `menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (92, 2, 1, 'Y', 1, '2020-09-23 18:05:01');
INSERT INTO `menu_access_group` VALUES (93, 2, 4, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `menu_access_group` VALUES (94, 2, 5, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `menu_access_group` VALUES (95, 2, 35, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `menu_access_group` VALUES (96, 2, 40, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `menu_access_group` VALUES (97, 2, 2, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `menu_access_group` VALUES (109, 4, 1, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `menu_access_group` VALUES (110, 4, 4, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `menu_access_group` VALUES (111, 4, 5, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `menu_access_group` VALUES (112, 4, 35, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `menu_access_group` VALUES (113, 4, 40, 'Y', 1, '2020-09-24 08:18:28');
INSERT INTO `menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-09-27 00:07:36');
INSERT INTO `menu_access_group` VALUES (134, 1, 46, 'Y', 1, '2020-09-27 00:07:36');

-- ----------------------------
-- Table structure for menu_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_sub_group`;
CREATE TABLE `menu_access_sub_group`  (
  `masg_id` int NOT NULL AUTO_INCREMENT,
  `masg_ug_id` int NULL DEFAULT NULL,
  `masg_usg_id` int NULL DEFAULT NULL,
  `masg_rm_id` int NULL DEFAULT NULL,
  `masg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`masg_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_access_sub_group
-- ----------------------------
INSERT INTO `menu_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (20, 1, 1, 43, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (21, 1, 1, 45, 'Y', 1, '2020-09-27 00:03:50');
INSERT INTO `menu_access_sub_group` VALUES (22, 1, 1, 37, 'Y', 1, '2020-09-27 00:03:50');

-- ----------------------------
-- Table structure for menu_access_user
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_user`;
CREATE TABLE `menu_access_user`  (
  `mau_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `mau_user_id` int UNSIGNED NOT NULL,
  `mau_menu_id` int UNSIGNED NOT NULL,
  `mau_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`mau_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_access_user
-- ----------------------------
INSERT INTO `menu_access_user` VALUES (1, 1, 1, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (2, 1, 2, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (4, 1, 4, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (5, 1, 5, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (39, 1, 33, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (40, 1, 36, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (45, 1, 40, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (46, 1, 41, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (47, 1, 43, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (48, 1, 45, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (49, 1, 42, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (50, 1, 37, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (51, 1, 3, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (52, 1, 38, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (53, 1, 39, 'Y', 1, '2020-09-27 00:04:51');
INSERT INTO `menu_access_user` VALUES (54, 2, 1, 'Y', 1, '2020-09-27 23:46:19');
INSERT INTO `menu_access_user` VALUES (55, 2, 4, 'Y', 1, '2020-09-27 23:46:19');
INSERT INTO `menu_access_user` VALUES (56, 2, 5, 'Y', 1, '2020-09-27 23:46:19');
INSERT INTO `menu_access_user` VALUES (57, 2, 40, 'Y', 1, '2020-09-27 23:46:19');
INSERT INTO `menu_access_user` VALUES (58, 2, 42, 'Y', 1, '2020-09-27 23:46:19');

SET FOREIGN_KEY_CHECKS = 1;
