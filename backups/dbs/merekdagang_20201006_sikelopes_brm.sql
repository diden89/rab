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

 Date: 06/10/2020 10:35:52
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
) ENGINE = InnoDB AUTO_INCREMENT = 1410 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of brm
-- ----------------------------

-- ----------------------------
-- Table structure for brm_properties
-- ----------------------------
DROP TABLE IF EXISTS `brm_properties`;
CREATE TABLE `brm_properties`  (
  `bp_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bp_brm_num` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_brm_published_date_start` date NOT NULL,
  `bp_brm_published_date_end` date NOT NULL,
  `bp_website` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_link` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_caption` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_month` tinyint(4) NOT NULL,
  `bp_year` smallint(6) NOT NULL,
  `bp_filename` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `bp_created_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`bp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of brm_properties
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
