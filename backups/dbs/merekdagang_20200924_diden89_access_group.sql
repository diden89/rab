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

 Date: 24/09/2020 07:25:45
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for access_group
-- ----------------------------
DROP TABLE IF EXISTS `access_group`;
CREATE TABLE `access_group`  (
  `ag_id` int NOT NULL AUTO_INCREMENT,
  `ag_ug_id` int NULL DEFAULT NULL,
  `ag_rm_id` int NULL DEFAULT NULL,
  `ag_is_active` char(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT 'Y',
  `last_user` int NULL DEFAULT NULL,
  `last_datetime` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ag_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 70 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of access_group
-- ----------------------------
INSERT INTO `access_group` VALUES (1, 1, 1, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (3, 1, 3, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (5, 1, 5, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (92, 2, 1, 'Y', 1, '2020-09-23 18:05:01');
INSERT INTO `access_group` VALUES (93, 2, 4, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (94, 2, 5, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (95, 2, 35, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (96, 2, 40, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (97, 2, 2, 'Y', 1, '2020-09-23 18:05:02');
INSERT INTO `access_group` VALUES (109, 4, 1, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (110, 4, 4, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (111, 4, 5, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (112, 4, 35, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (113, 4, 40, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (114, 4, 2, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (115, 4, 36, 'Y', 1, '2020-09-23 21:42:47');
INSERT INTO `access_group` VALUES (116, 4, 33, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (117, 4, 41, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (118, 4, 37, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (119, 4, 3, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (120, 4, 38, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (121, 4, 39, 'Y', 1, '2020-09-23 21:42:48');
INSERT INTO `access_group` VALUES (122, 1, 4, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (123, 1, 35, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (124, 1, 40, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (125, 1, 2, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (126, 1, 36, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (127, 1, 33, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (128, 1, 41, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (129, 1, 37, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (130, 1, 38, 'Y', 1, '2020-09-24 07:16:22');
INSERT INTO `access_group` VALUES (131, 1, 39, 'Y', 1, '2020-09-24 07:16:22');

SET FOREIGN_KEY_CHECKS = 1;
