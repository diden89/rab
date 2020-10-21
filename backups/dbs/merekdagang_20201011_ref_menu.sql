/*
 Navicat Premium Data Transfer

 Source Server         : Development
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 11/10/2020 10:15:19
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `log_ref_menu`;
CREATE TABLE `log_ref_menu`  (
  `rm_id` int(0) NOT NULL,
  `rm_parent_id` int(0) UNSIGNED NULL DEFAULT NULL,
  `rm_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rm_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_sequence` int(0) UNSIGNED NOT NULL DEFAULT 1,
  `rm_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(0) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NULL DEFAULT NULL,
  `log_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_ref_menu
-- ----------------------------
INSERT INTO `log_ref_menu` VALUES (40, 4, 'Finding', 'Finding', 'trademark/invented_brand', 'far fa-copyright', 3, 'Y', 1, '2020-10-06 10:54:08', 1, 'edit', '2020-10-06 10:54:08', 1);
INSERT INTO `log_ref_menu` VALUES (1, NULL, 'Home', 'Home', 'trademark/invented_brand', 'fas fa-home', 1, 'Y', 1, '2020-10-06 10:56:06', 1, 'edit', '2020-10-06 10:56:06', 2);
INSERT INTO `log_ref_menu` VALUES (40, 4, 'Finding', 'Finding', 'trademark/invented_brand', 'far fa-copyright', 3, 'N', 1, '2020-10-09 20:42:06', 1, 'edit', '2020-10-09 20:42:06', 3);
INSERT INTO `log_ref_menu` VALUES (4, NULL, 'Trademark', 'Trademark', NULL, 'icon-trademark icon-control', 2, 'Y', 1, '2020-10-11 10:04:37', 1, 'edit', '2020-10-11 10:04:37', 4);
INSERT INTO `log_ref_menu` VALUES (4, NULL, 'Control Center', 'Control Center', NULL, 'trademark-icon icon-control', 2, 'Y', 1, '2020-10-11 10:11:22', 1, 'edit', '2020-10-11 10:11:22', 5);
INSERT INTO `log_ref_menu` VALUES (5, 4, 'Client&rsquo;s Trademarks', 'Client&rsquo;s Trademarks', 'trademark/brand', 'fas fa-tags', 1, 'Y', 1, '2020-10-11 10:12:29', 1, 'edit', '2020-10-11 10:12:29', 6);

-- ----------------------------
-- Table structure for ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu`;
CREATE TABLE `ref_menu`  (
  `rm_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rm_parent_id` int(0) UNSIGNED NULL DEFAULT NULL,
  `rm_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rm_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_sequence` int(0) UNSIGNED NOT NULL DEFAULT 1,
  `rm_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`rm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Finding', 'Finding', 'trademark/invented_brand', 'fas fa-search', 1, 'Y', 1, '2020-10-06 10:56:06');
INSERT INTO `ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 3, 'Y', 1, '2020-09-24 07:12:10');
INSERT INTO `ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29');
INSERT INTO `ref_menu` VALUES (4, NULL, 'Control Center', 'Control Center', NULL, 'trademark-icon icon-control', 2, 'Y', 1, '2020-10-11 10:11:22');
INSERT INTO `ref_menu` VALUES (5, 4, 'Client&rsquo;s Trademarks', 'Client&rsquo;s Trademarks', 'trademark/brand', 'fas fa-tags', 1, 'Y', 1, '2020-10-11 10:12:29');
INSERT INTO `ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-clipboard-list', 1, 'Y', 1, '2020-09-28 16:15:22');
INSERT INTO `ref_menu` VALUES (35, 4, 'Dictionary', 'Dictionary', 'trademark/dictionary', 'fas fa-spell-check', 2, 'N', 1, '2020-09-24 07:12:23');
INSERT INTO `ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14');
INSERT INTO `ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 2, 'Y', 1, '2020-09-24 07:12:49');
INSERT INTO `ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45');
INSERT INTO `ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18');
INSERT INTO `ref_menu` VALUES (40, 4, 'Finding', 'Finding', 'trademark/invented_brand', 'far fa-copyright', 3, 'N', 1, '2020-10-06 10:54:08');
INSERT INTO `ref_menu` VALUES (41, 36, 'Menu Access Group', 'Menu Access Group', 'settings/menu_access_group', 'fas fa-th', 2, 'Y', 1, '2020-09-28 16:16:35');
INSERT INTO `ref_menu` VALUES (42, 4, 'Similar Words', 'Similar Words', 'trademark/similar_words', 'fas fa-spell-check', 3, 'Y', 1, '2020-09-26 10:45:03');
INSERT INTO `ref_menu` VALUES (43, 4, 'Similar Letters', 'Similar Letters', 'trademark/similar_letters', 'fas fa-font', 4, 'Y', 1, '2020-09-28 14:10:50');
INSERT INTO `ref_menu` VALUES (44, 36, 'Menu Access Sub Group', 'Menu Access Sub Group', 'settings/menu_access_sub_group', 'fas fa-layer-group', 3, 'Y', 1, '2020-09-28 16:14:42');
INSERT INTO `ref_menu` VALUES (45, 36, 'Menu Access User', 'Menu Access User', 'settings/menu_access_user', 'fas fa-user', 4, 'Y', 1, '2020-09-28 16:13:36');
INSERT INTO `ref_menu` VALUES (46, 4, 'Brand Gov', 'Brand Gov', 'trademark/brand_gov', 'fas fa-server', 5, 'Y', 1, '2020-09-29 11:23:50');
INSERT INTO `ref_menu` VALUES (47, 4, 'Ignored Words', 'Ignored Words', 'trademark/ignored_words', 'fas fa-list', 6, 'Y', 1, '2020-10-02 13:19:07');

SET FOREIGN_KEY_CHECKS = 1;
