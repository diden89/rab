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

 Date: 17/09/2020 08:17:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_group
-- ----------------------------
DROP TABLE IF EXISTS `access_group`;

DROP TABLE IF EXISTS `access_menu`;

-- ----------------------------
-- Table structure for brand
-- ----------------------------
DROP TABLE IF EXISTS `brand`;
CREATE TABLE `brand`  (
  `br_id` int NOT NULL AUTO_INCREMENT,
  `br_app_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_receive_date` datetime(0) NULL DEFAULT NULL,
  `br_priority` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_owner_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_owner_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_lawyer_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_lawyer_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_meaning_of_language` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_color_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_class_of_good_or_services` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_desc_of_good_or_services` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`br_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of brand
-- ----------------------------
INSERT INTO `brand` VALUES (1, 'D002017036115', '2020-09-15 00:00:00', '1', 'SUKANDI', 'JL. SENI BUDAYA I NO. 24 RT.005 / 005 KEL. JELAMBARBARU, KEC. GROGOL PETAMBURAN JAKARTA BARAT', 'Test', 'Test Alamat Kuasa', 'COSMO', 'Apalah artinya tu', 'COSMO: Sebuah Penamaan', '31', '===Makanan binatang peliharaan, makanan binatang ternak, makanan hewan untuk menguatkan dan menggemukkan, hasil produksi untuk alas tempat tidur binatang, binatang hidup, binatang kurungan, butiran beraroma harum untuk hewan peliharaan, minuman untuk binatang peliharaan, biscuit makanan anjing, daging ikan untuk kebutuhan binatang, garam untuk ternak, kertas amplas untuk hewan kesayangan, lapisan tanah yang berumput, ragi untuk binatang.===', NULL, 'Y', 1, '2020-09-15 20:47:56');
INSERT INTO `brand` VALUES (2, '12345678', '2020-09-15 00:00:00', '1', 'FEBRI ANDIKA', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOCHI AYU RISANTI', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOOBSCRIPT', 'SOFTWARE HOUSE', 'RED, GREEN, BLUE', '1, 2, 3', 'LOREM IPSUM DOLOR', NULL, 'Y', 1, '2020-09-15 20:58:26');

-- ----------------------------
-- Table structure for log_access_group
-- ----------------------------
DROP TABLE IF EXISTS `log_access_group`;


-- ----------------------------
-- Table structure for log_access_menu
-- ----------------------------
DROP TABLE IF EXISTS `log_access_menu`;


-- ----------------------------
-- Table structure for log_brand
-- ----------------------------
DROP TABLE IF EXISTS `log_brand`;
CREATE TABLE `log_brand`  (
  `br_id` int NOT NULL,
  `br_app_number` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_receive_date` datetime(0) NULL DEFAULT NULL,
  `br_priority` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_owner_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_owner_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_lawyer_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_lawyer_address` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_meaning_of_language` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_color_description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_class_of_good_or_services` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_desc_of_good_or_services` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  `br_img` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `br_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_brand
-- ----------------------------
INSERT INTO `log_brand` VALUES (1, 'D002017036115', '2020-09-15 00:00:00', '1', 'SUKANDI', 'JL. SENI BUDAYA I NO. 24 RT.005 / 005 KEL. JELAMBARBARU, KEC. GROGOL PETAMBURAN JAKARTA BARAT', 'Test', 'Test Alamat Kuasa', 'COSMO', 'Apalah artinya tu', 'COSMO: Sebuah Penamaan', '31', '===Makanan binatang peliharaan, makanan binatang ternak, makanan hewan untuk menguatkan dan menggemukkan, hasil produksi untuk alas tempat tidur binatang, binatang hidup, binatang kurungan, butiran beraroma harum untuk hewan peliharaan, minuman untuk binatang peliharaan, biscuit makanan anjing, daging ikan untuk kebutuhan binatang, garam untuk ternak, kertas amplas untuk hewan kesayangan, lapisan tanah yang berumput, ragi untuk binatang.===', NULL, 'Y', 1, '2020-09-15 20:47:56', 1, 'edit', '2020-09-15 20:47:56', 1);
INSERT INTO `log_brand` VALUES (2, '12345678', '2020-09-15 00:00:00', '1', 'FEBRI ANDIKA', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOCHI AYU RISANTI', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOOBSCRIPT', 'SOFTWARE HOUSE', 'RED, GREEN, BLUE', '1, 2, 3', 'LOREM IPSUM DOLOR', NULL, 'Y', 1, '2020-09-15 20:53:11', 1, 'add', '2020-09-15 20:53:11', 2);
INSERT INTO `log_brand` VALUES (2, '12345678', '2020-09-15 00:00:00', '1', 'FEBRI ANDIKA', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOCHI AYU RISANTI', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOOBSCRIPT', 'SOFTWARE HOUSE', 'RED, GREEN, BLUE', '1, 2, 3', 'LOREM IPSUM DOLOR', NULL, 'Y', 1, '2020-09-15 20:54:10', 1, 'edit', '2020-09-15 20:54:10', 3);
INSERT INTO `log_brand` VALUES (2, '12345678', '2020-09-15 00:00:00', '1', 'FEBRI ANDIKA', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOCHI AYU RISANTI', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOOBSCRIPT', 'SOFTWARE HOUSE', 'RED, GREEN, BLUE', '1, 2, 3', 'LOREM IPSUM DOLOR', NULL, 'N', 1, '2020-09-15 20:57:33', 1, 'edit', '2020-09-15 20:57:33', 4);
INSERT INTO `log_brand` VALUES (2, '12345678', '2020-09-15 00:00:00', '1', 'FEBRI ANDIKA', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOCHI AYU RISANTI', 'JL. DAHLIA KOMPLEKS DIAMOND RESIDENCE BLOK F NO. 4', 'NOOBSCRIPT', 'SOFTWARE HOUSE', 'RED, GREEN, BLUE', '1, 2, 3', 'LOREM IPSUM DOLOR', NULL, 'N', 1, '2020-09-15 20:58:26', 1, 'edit', '2020-09-15 20:58:26', 5);

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
) ENGINE = InnoDB AUTO_INCREMENT = 35 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_ref_menu
-- ----------------------------
INSERT INTO `log_ref_menu` VALUES (35, NULL, 'asd', 'asdasdas', 'dasdas', 'asdas', 1, 'Y', 1, '2020-09-16 11:38:31', 1, 'add', '2020-09-16 11:38:31', 41);
INSERT INTO `log_ref_menu` VALUES (35, 3, 'asd', 'asdasdas', 'dasdas', 'asdas', 1, 'Y', 1, '2020-09-16 11:39:03', 1, 'edit', '2020-09-16 11:39:03', 42);
INSERT INTO `log_ref_menu` VALUES (35, 5, 'asd', 'asdasdas', 'dasdas', 'asdas', 1, 'Y', 1, '2020-09-16 11:39:22', 1, 'edit', '2020-09-16 11:39:22', 43);
INSERT INTO `log_ref_menu` VALUES (35, 4, 'asd', 'asdasdas', 'dasdas', 'asdas', 1, 'Y', 1, '2020-09-16 22:39:37', 1, 'edit', '2020-09-16 22:39:37', 44);
INSERT INTO `log_ref_menu` VALUES (1, NULL, 'Home', 'Home', 'main', 'fas fa-home', 1, 'Y', 1, '2020-09-16 22:49:41', 1, 'edit', '2020-09-16 22:49:41', 45);
INSERT INTO `log_ref_menu` VALUES (4, NULL, 'Trademark', 'Trademark', NULL, 'fas fa-trademark', 1, 'Y', 1, '2020-09-16 22:50:44', 1, 'edit', '2020-09-16 22:50:44', 46);
INSERT INTO `log_ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 5, 'Y', 1, '2020-09-16 22:51:09', 1, 'edit', '2020-09-16 22:51:09', 47);
INSERT INTO `log_ref_menu` VALUES (3, 2, 'User Detail', 'User Detail', 'settings/user', 'fas fa-users-cog', 1, 'Y', 1, '2020-09-16 22:51:22', 1, 'edit', '2020-09-16 22:51:22', 48);
INSERT INTO `log_ref_menu` VALUES (36, 2, 'Menu', 'Menu', NULL, 'fas fa-folder-minus', 1, 'Y', 1, '2020-09-16 22:57:54', 1, 'add', '2020-09-16 22:57:54', 49);
INSERT INTO `log_ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-folder-minus', 1, 'Y', 1, '2020-09-16 22:58:17', 1, 'edit', '2020-09-16 22:58:17', 50);
INSERT INTO `log_ref_menu` VALUES (36, 2, 'Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 22:59:58', 1, 'edit', '2020-09-16 22:59:58', 51);
INSERT INTO `log_ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14', 1, 'edit', '2020-09-16 23:11:14', 52);
INSERT INTO `log_ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-people', 1, 'Y', 1, '2020-09-16 23:11:53', 1, 'add', '2020-09-16 23:11:53', 53);
INSERT INTO `log_ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:13:13', 1, 'edit', '2020-09-16 23:13:13', 54);
INSERT INTO `log_ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-users-cog', 1, 'Y', 1, '2020-09-16 23:13:25', 1, 'edit', '2020-09-16 23:13:25', 55);
INSERT INTO `log_ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 1, 'Y', 1, '2020-09-16 23:14:33', 1, 'edit', '2020-09-16 23:14:33', 56);
INSERT INTO `log_ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-users-alt', 1, 'Y', 1, '2020-09-16 23:14:58', 1, 'edit', '2020-09-16 23:14:58', 57);
INSERT INTO `log_ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29', 1, 'edit', '2020-09-16 23:15:29', 58);
INSERT INTO `log_ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45', 1, 'add', '2020-09-16 23:16:45', 59);
INSERT INTO `log_ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18', 1, 'add', '2020-09-17 07:17:18', 60);

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
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_user_detail
-- ----------------------------

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
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_user_group
-- ----------------------------
INSERT INTO `log_user_group` VALUES (1, 'Administrators', 'Administratorssfasdasd', 'Y', 1, '2020-09-16 23:31:00', 1, 'edit', '2020-09-16 23:31:00', 1);
INSERT INTO `log_user_group` VALUES (1, 'Administrators', 'Administrator', 'Y', 1, '2020-09-16 23:31:32', 1, 'edit', '2020-09-16 23:31:32', 2);
INSERT INTO `log_user_group` VALUES (2, 'Supervisor', 'Supervisor', 'Y', 1, '2020-09-16 23:31:47', 1, 'add', '2020-09-16 23:31:47', 3);
INSERT INTO `log_user_group` VALUES (2, 'Supervisor', 'Supervisor', 'N', 1, '2020-09-16 23:33:48', 1, 'edit', '2020-09-16 23:33:48', 4);
INSERT INTO `log_user_group` VALUES (3, 'Supervisor', 'Supervisor menu', 'Y', 1, '2020-09-16 23:34:19', 1, 'add', '2020-09-16 23:34:19', 5);

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
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_user_sub_group
-- ----------------------------
INSERT INTO `log_user_sub_group` VALUES (3, 'User', 'User asd', 'Y', 1, 1, '2020-09-17 08:08:59', 1, 'edit', '2020-09-17 08:08:59', 1);
INSERT INTO `log_user_sub_group` VALUES (3, 'User', 'user subg group USER', 'Y', 1, 1, '2020-09-17 08:09:16', 1, 'edit', '2020-09-17 08:09:16', 2);
INSERT INTO `log_user_sub_group` VALUES (3, 'User', 'user subg group USER', 'Y', 3, 1, '2020-09-17 08:09:22', 1, 'edit', '2020-09-17 08:09:22', 3);
INSERT INTO `log_user_sub_group` VALUES (3, 'User', 'user subg group USER', 'Y', 1, 1, '2020-09-17 08:09:32', 1, 'edit', '2020-09-17 08:09:32', 4);
INSERT INTO `log_user_sub_group` VALUES (4, 'Supervisor Operasional', 'User Group Supervisor Operasional', 'Y', 3, 1, '2020-09-17 08:10:04', 1, 'add', '2020-09-17 08:10:04', 5);
INSERT INTO `log_user_sub_group` VALUES (4, 'Supervisor Operasional', 'User Group Supervisor Operasional', 'N', 3, 1, '2020-09-17 08:11:13', 1, 'edit', '2020-09-17 08:11:13', 6);

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
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_code
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
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of ref_menu
-- ----------------------------
INSERT INTO `ref_menu` VALUES (1, NULL, 'Home', 'Home', 'main', 'fas fa-home', 1, 'Y', 1, '2020-09-16 22:49:41');
INSERT INTO `ref_menu` VALUES (2, NULL, 'Settings', 'Settings', NULL, 'fas fa-cogs', 5, 'Y', 1, '2020-09-16 22:51:09');
INSERT INTO `ref_menu` VALUES (3, 37, 'User Detail', 'User Detail', 'settings/user', 'fas fa-user-alt', 1, 'Y', 1, '2020-09-16 23:15:29');
INSERT INTO `ref_menu` VALUES (4, NULL, 'Trademark', 'Trademark', NULL, 'fas fa-trademark', 1, 'Y', 1, '2020-09-16 22:50:44');
INSERT INTO `ref_menu` VALUES (5, 4, 'Merek', 'Merek', 'trademark/brand', 'fas fa-tags', 1, 'Y', 1, '2020-09-14 21:23:31');
INSERT INTO `ref_menu` VALUES (33, 36, 'Menu', 'Menu', 'settings/menu', 'fas fa-folder-minus', 1, 'Y', 1, '2020-09-16 22:58:17');
INSERT INTO `ref_menu` VALUES (35, 4, 'asd', 'asdasdas', 'dasdas', 'asdas', 1, 'Y', 1, '2020-09-16 22:39:37');
INSERT INTO `ref_menu` VALUES (36, 2, 'Master Menu', 'Menu', NULL, 'fas fa-cog', 1, 'Y', 1, '2020-09-16 23:11:14');
INSERT INTO `ref_menu` VALUES (37, 2, 'Master User', 'Master User', NULL, 'fas fa-user-cog', 1, 'Y', 1, '2020-09-16 23:14:33');
INSERT INTO `ref_menu` VALUES (38, 37, 'User Group', 'User Group', 'settings/user_group', 'fas fa-users', 1, 'Y', 1, '2020-09-16 23:16:45');
INSERT INTO `ref_menu` VALUES (39, 37, 'User Sub Group', 'User Sub Group Template', 'settings/user_sub_group', 'fas fa-users', 1, 'Y', 1, '2020-09-17 07:17:18');

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
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `ud_sub_group` int UNSIGNED NOT NULL DEFAULT 3,
  `last_user` int UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ud_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'andy1t@localhost.com', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'one-piece-logo.png', 'Y', 1, 1, '2020-09-14 11:22:12');
INSERT INTO `user_detail` VALUES (2, 'andy1t', '6c8825d7c1d15cfaecabd372b81d5d223334ddc3', 'Febri Andika', '1988-02-24', 'Pekanbaru', 'andikamage@gmail.com', '343bf56d9a8ec21f59c1ba8afa563fc3.jpg', 'pp.jpg', 'Y', 1, 1, '2020-09-14 20:45:02');

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_group
-- ----------------------------
INSERT INTO `user_group` VALUES (1, 'Administrators', 'Administrator', 'Y', 1, '2020-09-16 23:31:32');
INSERT INTO `user_group` VALUES (2, 'Supervisor', 'Supervisor', 'N', 1, '2020-09-16 23:33:48');
INSERT INTO `user_group` VALUES (3, 'Supervisor', 'Supervisor menu', 'Y', 1, '2020-09-16 23:34:19');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_sub_group
-- ----------------------------
INSERT INTO `user_sub_group` VALUES (1, 'Super Administrators', 'Super Administrators', 'Y', 1, 1, '2019-11-05 14:19:50');
INSERT INTO `user_sub_group` VALUES (2, 'Administrator', 'Administrator', 'Y', 1, 1, '2020-07-15 10:11:40');
INSERT INTO `user_sub_group` VALUES (3, 'User', 'user subg group USER', 'Y', 1, 1, '2020-09-17 08:09:32');
INSERT INTO `user_sub_group` VALUES (4, 'Supervisor Operasional', 'User Group Supervisor Operasional', 'N', 3, 1, '2020-09-17 08:11:13');

SET FOREIGN_KEY_CHECKS = 1;
