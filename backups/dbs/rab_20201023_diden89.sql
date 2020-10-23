/*
 Navicat Premium Data Transfer

 Source Server         : mysql8
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : dbrab

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 23/10/2020 11:20:02
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for item_list
-- ----------------------------
DROP TABLE IF EXISTS `item_list`;
CREATE TABLE `item_list`  (
  `il_id` int NOT NULL AUTO_INCREMENT,
  `il_item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `il_price` decimal(10, 2) NULL DEFAULT NULL,
  `il_un_id` int NULL DEFAULT NULL,
  `il_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`il_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of item_list
-- ----------------------------
INSERT INTO `item_list` VALUES (8, 'Batu Bata', 400.00, 1, 'Y', '1', '2020-10-22 01:47:47');

-- ----------------------------
-- Table structure for log_access_group
-- ----------------------------
DROP TABLE IF EXISTS `log_access_group`;
CREATE TABLE `log_access_group`  (
  `ag_id` int NOT NULL,
  `ag_ug_id` int NULL DEFAULT NULL,
  `ag_rm_id` int NULL DEFAULT NULL,
  `ag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_access_group
-- ----------------------------
INSERT INTO `log_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 1);
INSERT INTO `log_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 2);
INSERT INTO `log_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 3);
INSERT INTO `log_access_group` VALUES (123, 1, 35, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 4);
INSERT INTO `log_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 5);
INSERT INTO `log_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-09-26 10:46:30', 1, 'add', '2020-09-26 10:46:30', 6);
INSERT INTO `log_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 7);
INSERT INTO `log_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 8);
INSERT INTO `log_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 9);
INSERT INTO `log_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 10);
INSERT INTO `log_access_group` VALUES (129, 1, 37, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 11);
INSERT INTO `log_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 12);
INSERT INTO `log_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 13);
INSERT INTO `log_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-26 10:46:30', 1, 'edit', '2020-09-26 10:46:30', 14);

-- ----------------------------
-- Table structure for log_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `log_access_menu`;
CREATE TABLE `log_access_menu`  (
  `am_id` int UNSIGNED NOT NULL,
  `am_user_id` int UNSIGNED NOT NULL,
  `am_menu_id` int UNSIGNED NOT NULL,
  `am_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_access_menu
-- ----------------------------

-- ----------------------------
-- Table structure for log_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `log_access_sub_group`;
CREATE TABLE `log_access_sub_group`  (
  `asg_id` int NULL DEFAULT NULL,
  `asg_ug_id` int NULL DEFAULT NULL,
  `asg_usg_id` int NULL DEFAULT NULL,
  `asg_rm_id` int NULL DEFAULT NULL,
  `asg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_access_sub_group
-- ----------------------------
INSERT INTO `log_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 14);
INSERT INTO `log_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 15);
INSERT INTO `log_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 16);
INSERT INTO `log_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 17);
INSERT INTO `log_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 18);
INSERT INTO `log_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 19);
INSERT INTO `log_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 20);
INSERT INTO `log_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 21);
INSERT INTO `log_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 22);
INSERT INTO `log_access_sub_group` VALUES (16, 1, 1, 37, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 23);
INSERT INTO `log_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 24);
INSERT INTO `log_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 25);
INSERT INTO `log_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 26);

-- ----------------------------
-- Table structure for log_item_list
-- ----------------------------
DROP TABLE IF EXISTS `log_item_list`;
CREATE TABLE `log_item_list`  (
  `il_id` int NOT NULL,
  `il_item_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `il_price` decimal(10, 2) NULL DEFAULT NULL,
  `il_un_id` int NULL DEFAULT NULL,
  `il_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int NULL DEFAULT NULL,
  `log_action` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_item_list
-- ----------------------------
INSERT INTO `log_item_list` VALUES (3, 'tes', 1000000.00, 1, 'Y', 1, '2020-10-22 01:14:35', 1, 'add', '2020-10-22 01:14:35', 1);
INSERT INTO `log_item_list` VALUES (4, 'asdasdsa', 1000000.00, 1, 'Y', 1, '2020-10-22 01:17:47', 1, 'add', '2020-10-22 01:17:47', 2);
INSERT INTO `log_item_list` VALUES (5, 'asdasd', 12312.00, 1, 'Y', 1, '2020-10-22 01:21:43', 1, 'add', '2020-10-22 01:21:43', 3);
INSERT INTO `log_item_list` VALUES (6, 'asada', 100000.00, 1, 'Y', 1, '2020-10-22 01:26:56', 1, 'add', '2020-10-22 01:26:56', 4);
INSERT INTO `log_item_list` VALUES (7, 'yer', 150000.00, 1, 'Y', 1, '2020-10-22 01:27:19', 1, 'add', '2020-10-22 01:27:19', 5);
INSERT INTO `log_item_list` VALUES (6, 'asada', 150000.00, 1, 'Y', 1, '2020-10-22 01:34:35', 1, 'edit', '2020-10-22 01:34:35', 6);
INSERT INTO `log_item_list` VALUES (5, 'toko', 150000.00, 1, 'Y', 1, '2020-10-22 01:34:45', 1, 'edit', '2020-10-22 01:34:45', 7);
INSERT INTO `log_item_list` VALUES (7, 'yer', 150000.00, 1, 'N', 1, '2020-10-22 01:47:13', 1, 'edit', '2020-10-22 01:47:13', 8);
INSERT INTO `log_item_list` VALUES (5, 'toko', 150000.00, 1, 'N', 1, '2020-10-22 01:47:15', 1, 'edit', '2020-10-22 01:47:15', 9);
INSERT INTO `log_item_list` VALUES (3, 'tes', 1000000.00, 1, 'N', 1, '2020-10-22 01:47:18', 1, 'edit', '2020-10-22 01:47:18', 10);
INSERT INTO `log_item_list` VALUES (8, 'Batu Bata', 400.00, 1, 'Y', 1, '2020-10-22 01:47:47', 1, 'add', '2020-10-22 01:47:47', 11);

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
) ENGINE = InnoDB AUTO_INCREMENT = 124 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_group
-- ----------------------------
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 1);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 2);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 3);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 4);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 5);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-12 22:33:28', 1, 'edit', '2020-10-12 22:33:28', 6);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 7);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 8);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 9);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 10);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 11);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 12);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 13);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 14);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 15);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-12 22:33:29', 1, 'edit', '2020-10-12 22:33:29', 16);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 17);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 18);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 19);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 20);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 21);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 22);
INSERT INTO `log_menu_access_group` VALUES (140, 1, 47, 'Y', 1, '2020-10-12 23:06:59', 1, 'add', '2020-10-12 23:06:59', 23);
INSERT INTO `log_menu_access_group` VALUES (141, 1, 48, 'Y', 1, '2020-10-12 23:06:59', 1, 'add', '2020-10-12 23:06:59', 24);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 25);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 26);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 27);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 28);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 29);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 30);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 31);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 32);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 33);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-12 23:06:59', 1, 'edit', '2020-10-12 23:06:59', 34);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 35);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 36);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 37);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 38);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 39);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 40);
INSERT INTO `log_menu_access_group` VALUES (140, 1, 47, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 41);
INSERT INTO `log_menu_access_group` VALUES (141, 1, 48, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 42);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 43);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 44);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 45);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 46);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 47);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 48);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 49);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 50);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 51);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-12 23:07:00', 1, 'edit', '2020-10-12 23:07:00', 52);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 53);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 54);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 55);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 56);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 57);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 58);
INSERT INTO `log_menu_access_group` VALUES (140, 1, 47, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 59);
INSERT INTO `log_menu_access_group` VALUES (141, 1, 48, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 60);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 61);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 62);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 63);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 64);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 65);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 66);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 67);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 68);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 69);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-21 23:57:22', 1, 'edit', '2020-10-21 23:57:22', 70);
INSERT INTO `log_menu_access_group` VALUES (142, 1, 49, 'Y', 1, '2020-10-21 23:57:22', 1, 'add', '2020-10-21 23:57:22', 71);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 72);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 73);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 74);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 75);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 76);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 77);
INSERT INTO `log_menu_access_group` VALUES (140, 1, 47, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 78);
INSERT INTO `log_menu_access_group` VALUES (141, 1, 48, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 79);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 80);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 81);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 82);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 83);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 84);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 85);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 86);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 87);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 88);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 89);
INSERT INTO `log_menu_access_group` VALUES (142, 1, 49, 'Y', 1, '2020-10-21 23:57:24', 1, 'edit', '2020-10-21 23:57:24', 90);
INSERT INTO `log_menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 91);
INSERT INTO `log_menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 92);
INSERT INTO `log_menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 93);
INSERT INTO `log_menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 94);
INSERT INTO `log_menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 95);
INSERT INTO `log_menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:42', 96);
INSERT INTO `log_menu_access_group` VALUES (140, 1, 47, 'Y', 1, '2020-10-21 23:58:42', 1, 'edit', '2020-10-21 23:58:43', 97);
INSERT INTO `log_menu_access_group` VALUES (141, 1, 48, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 98);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 99);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 100);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 101);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 102);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 103);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 104);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 105);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 106);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 107);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 108);
INSERT INTO `log_menu_access_group` VALUES (142, 1, 49, 'Y', 1, '2020-10-21 23:58:43', 1, 'edit', '2020-10-21 23:58:43', 109);
INSERT INTO `log_menu_access_group` VALUES (143, 1, 50, 'Y', 1, '2020-10-21 23:58:43', 1, 'add', '2020-10-21 23:58:43', 110);
INSERT INTO `log_menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 111);
INSERT INTO `log_menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 112);
INSERT INTO `log_menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 113);
INSERT INTO `log_menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 114);
INSERT INTO `log_menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 115);
INSERT INTO `log_menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 116);
INSERT INTO `log_menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 117);
INSERT INTO `log_menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 118);
INSERT INTO `log_menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 119);
INSERT INTO `log_menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 120);
INSERT INTO `log_menu_access_group` VALUES (142, 1, 49, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 121);
INSERT INTO `log_menu_access_group` VALUES (143, 1, 50, 'Y', 1, '2020-10-22 01:51:42', 1, 'edit', '2020-10-22 01:51:42', 122);
INSERT INTO `log_menu_access_group` VALUES (144, 1, 51, 'Y', 1, '2020-10-22 01:51:42', 1, 'add', '2020-10-22 01:51:42', 123);

-- ----------------------------
-- Table structure for log_menu_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `log_menu_access_sub_group`;
CREATE TABLE `log_menu_access_sub_group`  (
  `masg_id` int NULL DEFAULT NULL,
  `masg_ug_id` int NULL DEFAULT NULL,
  `masg_usg_id` int NULL DEFAULT NULL,
  `masg_rm_id` int NULL DEFAULT NULL,
  `masg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_sub_group
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_menu_access_user
-- ----------------------------

-- ----------------------------
-- Table structure for log_ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `log_ref_menu`;
CREATE TABLE `log_ref_menu`  (
  `rm_id` int NOT NULL,
  `rm_parent_id` int UNSIGNED NULL DEFAULT NULL,
  `rm_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rm_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_sequence` int UNSIGNED NOT NULL DEFAULT 1,
  `rm_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NULL DEFAULT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_ref_menu
-- ----------------------------
INSERT INTO `log_ref_menu` VALUES (1, NULL, 'Findings', 'Findings', 'trademark/invented_brand', 'fas fa-search', 1, 'Y', 1, '2020-10-12 22:32:29', 1, 'edit', '2020-10-12 22:32:29', 7);
INSERT INTO `log_ref_menu` VALUES (43, 4, 'Similar Letters and/or Numbers', 'Similar Letters and/or Numbers', 'trademark/similar_letters', 'fas fa-font', 4, 'Y', 1, '2020-10-12 22:35:35', 1, 'edit', '2020-10-12 22:35:35', 8);
INSERT INTO `log_ref_menu` VALUES (48, 4, 'BRM List', 'BRM List', 'trademark/brm_list', 'fas fa-list', 6, 'Y', 1, '2020-10-12 23:06:45', 1, 'add', '2020-10-12 23:06:45', 9);
INSERT INTO `log_ref_menu` VALUES (49, 2, 'Master Data', 'Master Data', NULL, 'fas fa-table', 3, 'Y', 1, '2020-10-21 23:57:12', 1, 'add', '2020-10-21 23:57:12', 10);
INSERT INTO `log_ref_menu` VALUES (50, 49, 'Item List', 'Item List', 'settings/item_list', 'fas fa-list', 1, 'Y', 1, '2020-10-21 23:58:26', 1, 'add', '2020-10-21 23:58:26', 11);
INSERT INTO `log_ref_menu` VALUES (51, 49, 'Item Unit', 'Item Unit', 'settings/item_unit', 'fas fa-boxes', 2, 'Y', 1, '2020-10-22 01:51:26', 1, 'add', '2020-10-22 01:51:26', 12);

-- ----------------------------
-- Table structure for log_unit
-- ----------------------------
DROP TABLE IF EXISTS `log_unit`;
CREATE TABLE `log_unit`  (
  `un_id` int NOT NULL,
  `un_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `un_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `last_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int NULL DEFAULT NULL,
  `log_action` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_unit
-- ----------------------------
INSERT INTO `log_unit` VALUES (2, NULL, 'Y', '1', '2020-10-23 11:13:21', 1, 'add', '2020-10-23 11:13:21', 1);
INSERT INTO `log_unit` VALUES (3, 'TRUK', 'Y', '1', '2020-10-23 11:14:14', 1, 'add', '2020-10-23 11:14:14', 2);
INSERT INTO `log_unit` VALUES (2, 'KUBIK', 'Y', '1', '2020-10-23 11:15:17', 1, 'edit', '2020-10-23 11:15:17', 3);
INSERT INTO `log_unit` VALUES (2, 'KUBIK', 'N', '1', '2020-10-23 11:18:58', 1, 'edit', '2020-10-23 11:18:59', 4);
INSERT INTO `log_unit` VALUES (3, 'TRUK', 'N', '1', '2020-10-23 11:19:01', 1, 'edit', '2020-10-23 11:19:01', 5);

-- ----------------------------
-- Table structure for log_user_detail
-- ----------------------------
DROP TABLE IF EXISTS `log_user_detail`;
CREATE TABLE `log_user_detail`  (
  `ud_id` int UNSIGNED NOT NULL,
  `ud_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_dob` date NOT NULL,
  `ud_pob` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_img_filename` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_img_ori` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `ud_sub_group` int UNSIGNED NOT NULL DEFAULT 3,
  `ud_notif_flag` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_user_detail
-- ----------------------------
INSERT INTO `log_user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'c084c8c887804ebde68e108f9fa560d1.png', 'logo.png', 'Y', 1, 'Y', 1, '2020-10-22 02:10:20', 1, 'edit', '2020-10-22 02:10:20', 5);

-- ----------------------------
-- Table structure for log_user_group
-- ----------------------------
DROP TABLE IF EXISTS `log_user_group`;
CREATE TABLE `log_user_group`  (
  `ug_id` int UNSIGNED NOT NULL,
  `ug_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_user_group
-- ----------------------------

-- ----------------------------
-- Table structure for log_user_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `log_user_sub_group`;
CREATE TABLE `log_user_sub_group`  (
  `usg_id` int UNSIGNED NOT NULL,
  `usg_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `usg_group` int UNSIGNED NOT NULL,
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_user_sub_group
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 145 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_access_group
-- ----------------------------
INSERT INTO `menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-22 01:51:42');
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
INSERT INTO `menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (142, 1, 49, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (143, 1, 50, 'Y', 1, '2020-10-22 01:51:42');
INSERT INTO `menu_access_group` VALUES (144, 1, 51, 'Y', 1, '2020-10-22 01:51:42');

-- ----------------------------
-- Table structure for menu_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_sub_group`;
CREATE TABLE `menu_access_sub_group`  (
  `masg_id` int NOT NULL AUTO_INCREMENT,
  `masg_ug_id` int NULL DEFAULT NULL,
  `masg_usg_id` int NULL DEFAULT NULL,
  `masg_rm_id` int NULL DEFAULT NULL,
  `masg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`masg_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

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
INSERT INTO `menu_access_sub_group` VALUES (23, 1, 2, 1, 'Y', 1, '2020-09-28 16:20:10');
INSERT INTO `menu_access_sub_group` VALUES (24, 1, 2, 4, 'Y', 1, '2020-09-28 16:20:10');
INSERT INTO `menu_access_sub_group` VALUES (25, 1, 2, 2, 'Y', 1, '2020-09-28 16:20:10');

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
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

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

-- ----------------------------
-- Table structure for ref_code
-- ----------------------------
DROP TABLE IF EXISTS `ref_code`;
CREATE TABLE `ref_code`  (
  `rfc_id` int NOT NULL AUTO_INCREMENT,
  `rfc_group` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`rfc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_code
-- ----------------------------
INSERT INTO `ref_code` VALUES (1, 'FINDINGS', 'N', 'None', 'Y', 1, '2020-10-13 09:53:52');
INSERT INTO `ref_code` VALUES (2, 'FINDINGS', 'H', 'Hold', 'Y', 1, '2020-10-13 09:54:33');
INSERT INTO `ref_code` VALUES (3, 'FINDINGS', 'S', 'Skipped', 'Y', 1, '2020-10-13 09:56:33');
INSERT INTO `ref_code` VALUES (4, 'FINDINGS', 'A', 'All', 'Y', 1, '2020-10-13 09:57:02');

-- ----------------------------
-- Table structure for ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu`;
CREATE TABLE `ref_menu`  (
  `rm_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `rm_parent_id` int UNSIGNED NULL DEFAULT NULL,
  `rm_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rm_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_sequence` int UNSIGNED NOT NULL DEFAULT 1,
  `rm_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`rm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 52 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Findings', 'Findings', 'trademark/invented_brand', 'fas fa-search', 1, 'N', 1, '2020-10-12 22:32:29');
INSERT INTO `ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 3, 'Y', 1, '2020-09-24 07:12:10');
INSERT INTO `ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29');
INSERT INTO `ref_menu` VALUES (4, NULL, 'Control Center', 'Control Center', NULL, 'trademark-icon icon-control', 2, 'N', 1, '2020-10-11 10:11:22');
INSERT INTO `ref_menu` VALUES (5, 4, 'Client&rsquo;s Trademarks', 'Client&rsquo;s Trademarks', 'trademark/brand', 'fas fa-tags', 1, 'N', 1, '2020-10-11 10:12:29');
INSERT INTO `ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-clipboard-list', 1, 'Y', 1, '2020-09-28 16:15:22');
INSERT INTO `ref_menu` VALUES (35, 4, 'Dictionary', 'Dictionary', 'trademark/dictionary', 'fas fa-spell-check', 2, 'N', 1, '2020-09-24 07:12:23');
INSERT INTO `ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14');
INSERT INTO `ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 2, 'Y', 1, '2020-09-24 07:12:49');
INSERT INTO `ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45');
INSERT INTO `ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18');
INSERT INTO `ref_menu` VALUES (40, 4, 'Finding', 'Finding', 'trademark/invented_brand', 'far fa-copyright', 3, 'N', 1, '2020-10-06 10:54:08');
INSERT INTO `ref_menu` VALUES (41, 36, 'Menu Access Group', 'Menu Access Group', 'settings/menu_access_group', 'fas fa-th', 2, 'Y', 1, '2020-09-28 16:16:35');
INSERT INTO `ref_menu` VALUES (42, 4, 'Similar Words', 'Similar Words', 'trademark/similar_words', 'fas fa-spell-check', 3, 'N', 1, '2020-09-26 10:45:03');
INSERT INTO `ref_menu` VALUES (43, 4, 'Similar Letters and/or Numbers', 'Similar Letters and/or Numbers', 'trademark/similar_letters', 'fas fa-font', 4, 'N', 1, '2020-10-12 22:35:35');
INSERT INTO `ref_menu` VALUES (44, 36, 'Menu Access Sub Group', 'Menu Access Sub Group', 'settings/menu_access_sub_group', 'fas fa-layer-group', 3, 'Y', 1, '2020-09-28 16:14:42');
INSERT INTO `ref_menu` VALUES (45, 36, 'Menu Access User', 'Menu Access User', 'settings/menu_access_user', 'fas fa-user', 4, 'Y', 1, '2020-09-28 16:13:36');
INSERT INTO `ref_menu` VALUES (46, 4, 'Brand Gov', 'Brand Gov', 'trademark/brand_gov', 'fas fa-server', 5, 'N', 1, '2020-09-29 11:23:50');
INSERT INTO `ref_menu` VALUES (47, 4, 'Ignored Words', 'Ignored Words', 'trademark/ignored_words', 'fas fa-list', 6, 'N', 1, '2020-10-02 13:19:07');
INSERT INTO `ref_menu` VALUES (48, 4, 'BRM List', 'BRM List', 'trademark/brm_list', 'fas fa-list', 6, 'N', 1, '2020-10-12 23:06:45');
INSERT INTO `ref_menu` VALUES (49, 2, 'Master Data', 'Master Data', NULL, 'fas fa-table', 3, 'Y', 1, '2020-10-21 23:57:12');
INSERT INTO `ref_menu` VALUES (50, 49, 'Item List', 'Item List', 'settings/item_list', 'fas fa-list', 1, 'Y', 1, '2020-10-21 23:58:26');
INSERT INTO `ref_menu` VALUES (51, 49, 'Item Unit', 'Item Unit', 'settings/item_unit', 'fas fa-boxes', 2, 'Y', 1, '2020-10-22 01:51:26');

-- ----------------------------
-- Table structure for unit
-- ----------------------------
DROP TABLE IF EXISTS `unit`;
CREATE TABLE `unit`  (
  `un_id` int NOT NULL AUTO_INCREMENT,
  `un_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `un_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`un_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of unit
-- ----------------------------
INSERT INTO `unit` VALUES (1, 'PCS', 'Y', '1', '2020-10-22 00:38:26');
INSERT INTO `unit` VALUES (2, 'KUBIK', 'N', '1', '2020-10-23 11:18:58');
INSERT INTO `unit` VALUES (3, 'TRUK', 'N', '1', '2020-10-23 11:19:01');

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail`  (
  `ud_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ud_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_dob` date NOT NULL,
  `ud_pob` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_img_filename` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_img_ori` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_notif_flag` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `ud_sub_group` int UNSIGNED NOT NULL DEFAULT 3,
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ud_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'c084c8c887804ebde68e108f9fa560d1.png', 'logo.png', 'Y', 1, 'Y', 1, '2020-10-22 02:10:20');

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `ug_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `ug_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ug_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 'Administrators', 'Administrator', 'Y', 1, '2020-10-11 10:03:12');

-- ----------------------------
-- Table structure for user_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_group`;
CREATE TABLE `user_sub_group`  (
  `usg_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `usg_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `usg_group` int UNSIGNED NOT NULL,
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`usg_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_sub_group
-- ----------------------------
INSERT INTO `user_sub_group` VALUES (1, 'Super Administrators', 'Super Administrators', 'Y', 1, 1, '2019-11-05 14:19:50');

SET FOREIGN_KEY_CHECKS = 1;
