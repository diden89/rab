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

 Date: 03/10/2020 23:57:19
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
  `sl_similar_letter` int(11) NULL DEFAULT NULL,
  `sl_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(10) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_similar_letters
-- ----------------------------

-- ----------------------------
-- Table structure for similar_letters
-- ----------------------------
DROP TABLE IF EXISTS `similar_letters`;
CREATE TABLE `similar_letters`  (
  `sl_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `sl_letter` varchar(8) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sl_similar_letter` int(11) NULL DEFAULT NULL,
  `sl_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`sl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of similar_letters
-- ----------------------------
INSERT INTO `similar_letters` VALUES (1, 'A', NULL, 'Y', 1, '2020-10-03 23:17:37');
INSERT INTO `similar_letters` VALUES (2, 'A', 1, 'Y', 1, '2020-10-03 23:19:32');
INSERT INTO `similar_letters` VALUES (3, 'a', 1, 'Y', 1, '2020-10-03 23:19:36');
INSERT INTO `similar_letters` VALUES (4, '4', 1, 'Y', 1, '2020-10-03 23:32:38');
INSERT INTO `similar_letters` VALUES (5, '@', 1, 'Y', 1, '2020-10-03 23:31:32');
INSERT INTO `similar_letters` VALUES (6, '^', 1, 'Y', 1, '2020-10-03 23:19:46');
INSERT INTO `similar_letters` VALUES (7, 'a11', 1, 'N', 1, '2020-10-03 23:19:59');
INSERT INTO `similar_letters` VALUES (8, 't', 1, 'N', 1, '2020-10-03 23:32:46');
INSERT INTO `similar_letters` VALUES (9, 'B', NULL, 'Y', 1, '2020-10-03 23:34:02');
INSERT INTO `similar_letters` VALUES (10, 'b', 9, 'Y', 1, '2020-10-03 23:42:32');
INSERT INTO `similar_letters` VALUES (11, 'B', 9, 'Y', 1, '2020-10-03 23:55:50');
INSERT INTO `similar_letters` VALUES (12, '8', 9, 'Y', 1, '2020-10-03 23:55:55');
INSERT INTO `similar_letters` VALUES (13, '%', 9, 'Y', 1, '2020-10-03 23:56:33');

SET FOREIGN_KEY_CHECKS = 1;
