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

 Date: 02/10/2020 13:21:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

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
) ENGINE = InnoDB AUTO_INCREMENT = 140 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of menu_access_group
-- ----------------------------
INSERT INTO `menu_access_group` VALUES (1, 1, 1, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (3, 1, 3, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (5, 1, 5, 'Y', 1, '2020-10-02 13:19:24');
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
INSERT INTO `menu_access_group` VALUES (122, 1, 4, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (124, 1, 40, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (125, 1, 2, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (126, 1, 36, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (127, 1, 33, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (128, 1, 41, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (130, 1, 38, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (131, 1, 39, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (132, 1, 42, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (133, 1, 37, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (135, 1, 43, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (136, 1, 44, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (137, 1, 45, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (138, 1, 46, 'Y', 1, '2020-10-02 13:19:24');
INSERT INTO `menu_access_group` VALUES (139, 1, 47, 'Y', 1, '2020-10-02 13:19:24');

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
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Home', 'Home', 'main', 'fas fa-home', 1, 'Y', 1, '2020-09-16 22:49:41');
INSERT INTO `ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 3, 'Y', 1, '2020-09-24 07:12:10');
INSERT INTO `ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29');
INSERT INTO `ref_menu` VALUES (4, NULL, 'Trademark', 'Trademark', NULL, 'fas fa-trademark', 2, 'Y', 1, '2020-09-24 07:11:59');
INSERT INTO `ref_menu` VALUES (5, 4, 'Brand', 'Brand', 'trademark/brand', 'fas fa-tags', 1, 'Y', 1, '2020-09-21 13:48:42');
INSERT INTO `ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-clipboard-list', 1, 'Y', 1, '2020-09-28 16:15:22');
INSERT INTO `ref_menu` VALUES (35, 4, 'Dictionary', 'Dictionary', 'trademark/dictionary', 'fas fa-spell-check', 2, 'N', 1, '2020-09-24 07:12:23');
INSERT INTO `ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14');
INSERT INTO `ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 2, 'Y', 1, '2020-09-24 07:12:49');
INSERT INTO `ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45');
INSERT INTO `ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18');
INSERT INTO `ref_menu` VALUES (40, 4, 'Invented Brand', 'Invented Brand', 'trademark/invented_brand', 'far fa-copyright', 3, 'Y', 1, '2020-09-24 07:12:33');
INSERT INTO `ref_menu` VALUES (41, 36, 'Menu Access Group', 'Menu Access Group', 'settings/menu_access_group', 'fas fa-th', 2, 'Y', 1, '2020-09-28 16:16:35');
INSERT INTO `ref_menu` VALUES (42, 4, 'Similar Words', 'Similar Words', 'trademark/similar_words', 'fas fa-spell-check', 4, 'Y', 1, '2020-09-26 10:45:03');
INSERT INTO `ref_menu` VALUES (43, 4, 'Similar Letters', 'Similar Letters', 'trademark/similar_letters', 'fas fa-font', 4, 'Y', 1, '2020-09-28 14:10:50');
INSERT INTO `ref_menu` VALUES (44, 36, 'Menu Access Sub Group', 'Menu Access Sub Group', 'settings/menu_access_sub_group', 'fas fa-layer-group', 3, 'Y', 1, '2020-09-28 16:14:42');
INSERT INTO `ref_menu` VALUES (45, 36, 'Menu Access User', 'Menu Access User', 'settings/menu_access_user', 'fas fa-user', 4, 'Y', 1, '2020-09-28 16:13:36');
INSERT INTO `ref_menu` VALUES (46, 4, 'Brand Gov', 'Brand Gov', 'trademark/brand_gov', 'fas fa-server', 5, 'Y', 1, '2020-09-29 11:23:50');
INSERT INTO `ref_menu` VALUES (47, 4, 'Ignored Words', 'Ignored Words', 'trademark/ignored_words', 'fas fa-list', 6, 'Y', 1, '2020-10-02 13:19:07');

SET FOREIGN_KEY_CHECKS = 1;
