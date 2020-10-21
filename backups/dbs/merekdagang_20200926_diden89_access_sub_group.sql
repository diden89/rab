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

 Date: 26/09/2020 19:31:23
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `access_sub_group`;
CREATE TABLE `access_sub_group`  (
  `asg_id` int NOT NULL AUTO_INCREMENT,
  `asg_ug_id` int NULL DEFAULT NULL,
  `asg_usg_id` int NULL DEFAULT NULL,
  `asg_rm_id` int NULL DEFAULT NULL,
  `asg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`asg_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of access_sub_group
-- ----------------------------
INSERT INTO `access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (16, 1, 1, 37, 'Y', 1, '2020-09-26 19:30:14');
INSERT INTO `access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-26 19:30:15');
INSERT INTO `access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-26 19:30:15');
INSERT INTO `access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-26 19:30:15');

-- ----------------------------
-- Table structure for log_access_sub_group
-- ----------------------------
DROP TABLE IF EXISTS `log_access_sub_group`;
CREATE TABLE `log_access_sub_group`  (
  `asg_id` int NULL DEFAULT NULL,
  `asg_ug_id` int NULL DEFAULT NULL,
  `asg_usg_id` int NULL DEFAULT NULL,
  `asg_rm_id` int NULL DEFAULT NULL,
  `asg_is_active` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  `log_user_id` int UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of log_access_sub_group
-- ----------------------------
INSERT INTO `log_access_sub_group` VALUES (7, 1, 1, 1, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 14);
INSERT INTO `log_access_sub_group` VALUES (8, 1, 1, 4, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 15);
INSERT INTO `log_access_sub_group` VALUES (9, 1, 1, 5, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 16);
INSERT INTO `log_access_sub_group` VALUES (10, 1, 1, 40, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 17);
INSERT INTO `log_access_sub_group` VALUES (11, 1, 1, 42, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 18);
INSERT INTO `log_access_sub_group` VALUES (12, 1, 1, 2, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 19);
INSERT INTO `log_access_sub_group` VALUES (13, 1, 1, 36, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 20);
INSERT INTO `log_access_sub_group` VALUES (14, 1, 1, 33, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 21);
INSERT INTO `log_access_sub_group` VALUES (15, 1, 1, 41, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 22);
INSERT INTO `log_access_sub_group` VALUES (16, 1, 1, 37, 'Y', 1, '2020-09-26 19:30:14', 1, 'add', '2020-09-26 19:30:14', 23);
INSERT INTO `log_access_sub_group` VALUES (17, 1, 1, 3, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 24);
INSERT INTO `log_access_sub_group` VALUES (18, 1, 1, 38, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 25);
INSERT INTO `log_access_sub_group` VALUES (19, 1, 1, 39, 'Y', 1, '2020-09-26 19:30:15', 1, 'add', '2020-09-26 19:30:15', 26);

SET FOREIGN_KEY_CHECKS = 1;
