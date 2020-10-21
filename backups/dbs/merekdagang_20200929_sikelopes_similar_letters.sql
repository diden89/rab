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

 Date: 29/09/2020 11:45:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_similar_letters
-- ----------------------------
DROP TABLE IF EXISTS `log_similar_letters`;
CREATE TABLE `log_similar_letters`  (
  `ls_id` int(10) UNSIGNED NOT NULL,
  `ls_letter` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ls_similar_letter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(10) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_similar_letters
-- ----------------------------
INSERT INTO `log_similar_letters` VALUES (1, 'A', 'A;a;@;4', 1, '2020-09-29 11:23:47', 1, 'edit', '2020-09-29 11:23:47', 2);

-- ----------------------------
-- Table structure for similar_letters
-- ----------------------------
DROP TABLE IF EXISTS `similar_letters`;
CREATE TABLE `similar_letters`  (
  `ls_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ls_letter` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ls_similar_letter` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `last_user` int(11) NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ls_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of similar_letters
-- ----------------------------
INSERT INTO `similar_letters` VALUES (1, 'A', 'A;a;@;4', 1, '2020-09-29 11:23:47');

SET FOREIGN_KEY_CHECKS = 1;


DROP TABLE IF EXISTS `access_group`;
DROP TABLE IF EXISTS `access_menu`;
DROP TABLE IF EXISTS `access_sub_group`;
DROP TABLE IF EXISTS `log_access_group`;
DROP TABLE IF EXISTS `log_access_menu`;
DROP TABLE IF EXISTS `log_access_sub_group`;
