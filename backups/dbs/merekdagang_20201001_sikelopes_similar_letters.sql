/*
 Navicat MySQL Data Transfer

 Source Server         : LOCALHOST
 Source Server Type    : MySQL
 Source Server Version : 80017
 Source Host           : localhost:3306
 Source Schema         : merekdagang

 Target Server Type    : MySQL
 Target Server Version : 80017
 File Encoding         : 65001

 Date: 01/10/2020 16:31:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_similar_letters
-- ----------------------------
DROP TABLE IF EXISTS `log_similar_letters`;
CREATE TABLE `log_similar_letters`  (
  `sl_id` int(10) UNSIGNED NOT NULL,
  `sl_letter` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sl_similar_letter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sl_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(10) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Table structure for similar_letters
-- ----------------------------
DROP TABLE IF EXISTS `similar_letters`;
CREATE TABLE `similar_letters`  (
  `sl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sl_letter` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sl_similar_letter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `sl_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`sl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

SET FOREIGN_KEY_CHECKS = 1;
