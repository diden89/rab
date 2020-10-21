/*
 Navicat Premium Data Transfer

 Source Server         : mysql8
 Source Server Type    : MySQL
 Source Server Version : 80020
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80020
 File Encoding         : 65001

 Date: 25/09/2020 10:12:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_group
-- ----------------------------
DROP TABLE IF EXISTS `access_group`;
CREATE TABLE `access_group`  (
  `ag_id` int NOT NULL AUTO_INCREMENT,
  `ag_ug_id` int NULL DEFAULT NULL,
  `ag_rm_id` int NULL DEFAULT NULL,
  `ag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ag_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 131 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of access_group
-- ----------------------------
INSERT INTO `access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (92, 2, 1, 'Y', 1, '2020-09-23 18:05:01');
INSERT INTO `access_group` VALUES (93, 2, 4, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (94, 2, 5, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (95, 2, 35, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (96, 2, 40, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (97, 2, 2, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (109, 4, 1, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `access_group` VALUES (110, 4, 4, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `access_group` VALUES (111, 4, 5, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `access_group` VALUES (112, 4, 35, 'Y', 1, '2020-09-24 08:18:27');
INSERT INTO `access_group` VALUES (113, 4, 40, 'Y', 1, '2020-09-24 08:18:28');
INSERT INTO `access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (123, 1, 35, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (129, 1, 37, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-24 07:16:22');

-- ----------------------------
-- Table structure for access_menu
-- ----------------------------
DROP TABLE IF EXISTS `access_menu`;
CREATE TABLE `access_menu`  (
  `am_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `am_user_id` int UNSIGNED NOT NULL,
  `am_menu_id` int UNSIGNED NOT NULL,
  `am_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`am_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 47 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of access_menu
-- ----------------------------
INSERT INTO `access_menu` VALUES (1, 1, 1, 'Y', 1, '2020-09-14 19:56:34');
INSERT INTO `access_menu` VALUES (2, 1, 2, 'Y', 1, '2020-09-14 19:56:34');
INSERT INTO `access_menu` VALUES (3, 1, 3, 'Y', 1, '2020-09-14 19:56:34');
INSERT INTO `access_menu` VALUES (4, 1, 4, 'Y', 1, '2020-09-14 21:24:47');
INSERT INTO `access_menu` VALUES (5, 1, 5, 'Y', 1, '2020-09-14 21:24:47');
INSERT INTO `access_menu` VALUES (6, 2, 1, 'Y', 1, '2020-09-14 20:45:02');
INSERT INTO `access_menu` VALUES (7, 2, 2, 'Y', 1, '2020-09-14 20:45:02');
INSERT INTO `access_menu` VALUES (8, 2, 3, 'Y', 1, '2020-09-14 20:45:02');
INSERT INTO `access_menu` VALUES (9, 2, 4, 'Y', 1, '2020-09-14 21:24:47');
INSERT INTO `access_menu` VALUES (10, 2, 5, 'Y', 1, '2020-09-14 21:24:47');
INSERT INTO `access_menu` VALUES (39, 1, 33, 'Y', 1, '2020-09-16 11:13:58');
INSERT INTO `access_menu` VALUES (40, 1, 36, 'Y', 1, '2020-09-16 22:58:55');
INSERT INTO `access_menu` VALUES (41, 1, 37, 'Y', 1, '2020-09-16 23:12:18');
INSERT INTO `access_menu` VALUES (42, 1, 38, 'Y', 1, '2020-09-16 23:16:57');
INSERT INTO `access_menu` VALUES (43, 1, 39, 'Y', 1, '2020-09-17 07:18:07');
INSERT INTO `access_menu` VALUES (44, 1, 35, 'Y', 1, '2020-09-19 14:55:43');
INSERT INTO `access_menu` VALUES (45, 1, 40, 'Y', 1, '2020-09-20 20:15:54');
INSERT INTO `access_menu` VALUES (46, 1, 41, 'Y', 1, '2020-09-22 20:08:32');

-- ----------------------------
-- Table structure for access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `access_sub_group`;
CREATE TABLE `access_sub_group`  (
  `asg_id` int NOT NULL AUTO_INCREMENT,
  `asg_ug_id` int NULL DEFAULT NULL,
  `asg_usg_id` int NULL DEFAULT NULL,
  `asg_rm_id` int NULL DEFAULT NULL,
  `asg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`asg_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of access_sub_group
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 42 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Home', 'Home', 'main', 'fas fa-home', 1, 'Y', 1, '2020-09-16 22:49:41');
INSERT INTO `ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 3, 'Y', 1, '2020-09-24 07:12:10');
INSERT INTO `ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29');
INSERT INTO `ref_menu` VALUES (4, NULL, 'Trademark', 'Trademark', NULL, 'fas fa-trademark', 2, 'Y', 1, '2020-09-24 07:11:59');
INSERT INTO `ref_menu` VALUES (5, 4, 'Brand', 'Brand', 'trademark/brand', 'fas fa-tags', 1, 'Y', 1, '2020-09-21 13:48:42');
INSERT INTO `ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-folder-minus', 1, 'Y', 1, '2020-09-16 22:58:17');
INSERT INTO `ref_menu` VALUES (35, 4, 'Dictionary', 'Dictionary', 'trademark/dictionary', 'fas fa-spell-check', 2, 'Y', 1, '2020-09-24 07:12:23');
INSERT INTO `ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14');
INSERT INTO `ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 2, 'Y', 1, '2020-09-24 07:12:49');
INSERT INTO `ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45');
INSERT INTO `ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18');
INSERT INTO `ref_menu` VALUES (40, 4, 'Invented Brand', 'Invented Brand', 'trademark/invented_brand', 'far fa-copyright', 3, 'Y', 1, '2020-09-24 07:12:33');
INSERT INTO `ref_menu` VALUES (41, 36, 'Menu Access Group', 'Menu Access Group', 'settings/menu_access_group', 'fas fa-folder-plus', 2, 'Y', 1, '2020-09-22 20:07:46');

SET FOREIGN_KEY_CHECKS = 1;
