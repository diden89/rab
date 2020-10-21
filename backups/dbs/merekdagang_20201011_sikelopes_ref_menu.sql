/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80015
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80015
 File Encoding         : 65001

 Date: 11/10/2020 10:03:49
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for menu_access_group
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_group`;
CREATE TABLE `menu_access_group`  (
  `mag_id` int(11) NOT NULL AUTO_INCREMENT,
  `mag_ug_id` int(11) NULL DEFAULT NULL,
  `mag_rm_id` int(11) NULL DEFAULT NULL,
  `mag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(11) NULL DEFAULT NULL,
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
-- Table structure for menu_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `menu_access_sub_group`;
CREATE TABLE `menu_access_sub_group`  (
  `masg_id` int(11) NOT NULL AUTO_INCREMENT,
  `masg_ug_id` int(11) NULL DEFAULT NULL,
  `masg_usg_id` int(11) NULL DEFAULT NULL,
  `masg_rm_id` int(11) NULL DEFAULT NULL,
  `masg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(11) NULL DEFAULT NULL,
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
  `mau_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `mau_user_id` int(10) UNSIGNED NOT NULL,
  `mau_menu_id` int(10) UNSIGNED NOT NULL,
  `mau_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(10) UNSIGNED NOT NULL,
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
-- Table structure for ref_menu
-- ----------------------------
DROP TABLE IF EXISTS `ref_menu`;
CREATE TABLE `ref_menu`  (
  `rm_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rm_parent_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `rm_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `rm_description` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_url` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_icon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `rm_sequence` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `rm_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(10) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`rm_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 48 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Finding', 'Finding', 'trademark/invented_brand', 'fas fa-search', 1, 'Y', 1, '2020-10-06 10:56:06');
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
INSERT INTO `ref_menu` VALUES (40, 4, 'Finding', 'Finding', 'trademark/invented_brand', 'far fa-copyright', 3, 'N', 1, '2020-10-06 10:54:08');
INSERT INTO `ref_menu` VALUES (41, 36, 'Menu Access Group', 'Menu Access Group', 'settings/menu_access_group', 'fas fa-th', 2, 'Y', 1, '2020-09-28 16:16:35');
INSERT INTO `ref_menu` VALUES (42, 4, 'Similar Words', 'Similar Words', 'trademark/similar_words', 'fas fa-spell-check', 3, 'Y', 1, '2020-09-26 10:45:03');
INSERT INTO `ref_menu` VALUES (43, 4, 'Similar Letters', 'Similar Letters', 'trademark/similar_letters', 'fas fa-font', 4, 'Y', 1, '2020-09-28 14:10:50');
INSERT INTO `ref_menu` VALUES (44, 36, 'Menu Access Sub Group', 'Menu Access Sub Group', 'settings/menu_access_sub_group', 'fas fa-layer-group', 3, 'Y', 1, '2020-09-28 16:14:42');
INSERT INTO `ref_menu` VALUES (45, 36, 'Menu Access User', 'Menu Access User', 'settings/menu_access_user', 'fas fa-user', 4, 'Y', 1, '2020-09-28 16:13:36');
INSERT INTO `ref_menu` VALUES (46, 4, 'Brand Gov', 'Brand Gov', 'trademark/brand_gov', 'fas fa-server', 5, 'Y', 1, '2020-09-29 11:23:50');
INSERT INTO `ref_menu` VALUES (47, 4, 'Ignored Words', 'Ignored Words', 'trademark/ignored_words', 'fas fa-list', 6, 'Y', 1, '2020-10-02 13:19:07');

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail`  (
  `ud_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ud_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_dob` date NOT NULL,
  `ud_pob` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_img_filename` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_img_ori` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_notif_flag` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `ud_sub_group` int(10) UNSIGNED NOT NULL DEFAULT 3,
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(10) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ud_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'a71f986d52ab6d0f2ef6eb6d6036a465.png', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'Y', 1, 'Y', 1, '2020-10-06 11:38:21');
INSERT INTO `user_detail` VALUES (2, 'andy1t', '6c8825d7c1d15cfaecabd372b81d5d223334ddc3', 'Febri Andika', '1988-02-24', 'Pekanbaru', 'andikamage@gmail.com', '343bf56d9a8ec21f59c1ba8afa563fc3.jpg', 'pp.jpg', 'N', 1, 'N', 1, '2020-10-05 11:08:32');

-- ----------------------------
-- Table structure for user_group
-- ----------------------------
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE `user_group`  (
  `ug_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ug_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ug_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(10) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ug_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 'Administrators', 'Administrator', 'N', 1, '2020-10-11 10:03:12');
INSERT INTO `user_group` VALUES (2, 'Supervisor', 'Supervisor', 'N', 1, '2020-09-16 23:33:48');
INSERT INTO `user_group` VALUES (3, 'Supervisor', 'Supervisor menu', 'Y', 1, '2020-09-16 23:34:19');

-- ----------------------------
-- Table structure for user_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `user_sub_group`;
CREATE TABLE `user_sub_group`  (
  `usg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usg_caption` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_description` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `usg_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `usg_group` int(10) UNSIGNED NOT NULL,
  `last_user` int(10) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`usg_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_sub_group
-- ----------------------------
INSERT INTO `user_sub_group` VALUES (1, 'Super Administrators', 'Super Administrators', 'Y', 1, 1, '2019-11-05 14:19:50');
INSERT INTO `user_sub_group` VALUES (2, 'Administrator', 'Administrator', 'N', 1, 1, '2020-10-11 10:03:19');
INSERT INTO `user_sub_group` VALUES (3, 'User', 'user subg group USER', 'N', 1, 1, '2020-10-11 10:03:21');
INSERT INTO `user_sub_group` VALUES (4, 'Supervisor Operasional', 'User Group Supervisor Operasional', 'N', 3, 1, '2020-09-17 08:11:13');

SET FOREIGN_KEY_CHECKS = 1;
