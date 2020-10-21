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

 Date: 25/09/2020 23:52:07
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for brm
-- ----------------------------
DROP TABLE IF EXISTS `brm`;
CREATE TABLE `brm`  (
  `b_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `b_sequence` int(11) NOT NULL,
  `b_application_number` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `b_receipt_date` date NOT NULL,
  `b_class` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `b_brand` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `b_bp_id` int(10) UNSIGNED NULL DEFAULT NULL,
  `b_created_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`b_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4228 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of brm
-- ----------------------------

-- ----------------------------
-- Table structure for brm_properties
-- ----------------------------
DROP TABLE IF EXISTS `brm_properties`;
CREATE TABLE `brm_properties`  (
  `bp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bp_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_caption` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_month` tinyint(4) NOT NULL,
  `bp_year` smallint(6) NOT NULL,
  `bp_filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_created_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`bp_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of brm_properties
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
