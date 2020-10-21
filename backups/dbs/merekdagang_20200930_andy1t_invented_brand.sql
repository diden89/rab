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

 Date: 30/09/2020 14:57:26
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
  `ib_skip_flag` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'N',
  `ib_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ib_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invented_brand
-- ----------------------------
INSERT INTO `invented_brand` VALUES (1, 4228, 1, 'Y', 'Y', 1, '2020-09-24 23:23:19');
INSERT INTO `invented_brand` VALUES (2, 4229, 2, 'Y', 'Y', 1, '2020-09-20 21:22:50');

-- ----------------------------
-- Table structure for log_invented_brand
-- ----------------------------
DROP TABLE IF EXISTS `log_invented_brand`;
CREATE TABLE `log_invented_brand`  (
  `ib_id` int(0) NOT NULL,
  `ib_b_id` int(0) NULL DEFAULT NULL,
  `ib_br_id` int(0) NULL DEFAULT NULL,
  `ib_skip_flag` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'N',
  `ib_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(0) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`, `ib_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;
