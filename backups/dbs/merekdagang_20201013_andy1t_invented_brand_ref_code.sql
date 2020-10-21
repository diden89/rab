/*
 Navicat Premium Data Transfer

 Source Server         : development
 Source Server Type    : MySQL
 Source Server Version : 80019
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80019
 File Encoding         : 65001

 Date: 13/10/2020 10:49:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for invented_brand
-- ----------------------------
DROP TABLE IF EXISTS `invented_brand`;
CREATE TABLE `invented_brand`  (
  `ib_id` int(0) NOT NULL AUTO_INCREMENT,
  `ib_b_id` int(0) NULL DEFAULT NULL,
  `ib_br_id` int(0) NULL DEFAULT NULL,
  `ib_status` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'N',
  `ib_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ib_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invented_brand
-- ----------------------------
INSERT INTO `invented_brand` VALUES (1, 4228, 1, 'H', 'Y', 1, '2020-10-13 10:23:29');
INSERT INTO `invented_brand` VALUES (2, 4229, 2, 'S', 'Y', 1, '2020-09-20 21:22:50');

-- ----------------------------
-- Table structure for log_invented_brand
-- ----------------------------
DROP TABLE IF EXISTS `log_invented_brand`;
CREATE TABLE `log_invented_brand`  (
  `ib_id` int(0) NOT NULL,
  `ib_b_id` int(0) NULL DEFAULT NULL,
  `ib_br_id` int(0) NULL DEFAULT NULL,
  `ib_status` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'N',
  `ib_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(0) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`, `ib_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_invented_brand
-- ----------------------------
INSERT INTO `log_invented_brand` VALUES (1, 4228, 1, 'H', 'Y', 1, '2020-10-13 10:23:29', 1, 'edit', '2020-10-13 10:23:29', 1);

-- ----------------------------
-- Table structure for ref_code
-- ----------------------------
DROP TABLE IF EXISTS `ref_code`;
CREATE TABLE `ref_code`  (
  `rfc_id` int(0) NOT NULL AUTO_INCREMENT,
  `rfc_group` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_code` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_value` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `rfc_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`rfc_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ref_code
-- ----------------------------
INSERT INTO `ref_code` VALUES (1, 'FINDINGS', 'N', 'None', 'Y', 1, '2020-10-13 09:53:52');
INSERT INTO `ref_code` VALUES (2, 'FINDINGS', 'H', 'Hold', 'Y', 1, '2020-10-13 09:54:33');
INSERT INTO `ref_code` VALUES (3, 'FINDINGS', 'S', 'Skipped', 'Y', 1, '2020-10-13 09:56:33');
INSERT INTO `ref_code` VALUES (4, 'FINDINGS', 'A', 'All', 'Y', 1, '2020-10-13 09:57:02');

SET FOREIGN_KEY_CHECKS = 1;
