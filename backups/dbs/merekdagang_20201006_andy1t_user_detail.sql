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

 Date: 06/10/2020 11:42:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_user_detail
-- ----------------------------
DROP TABLE IF EXISTS `log_user_detail`;
CREATE TABLE `log_user_detail`  (
  `ud_id` int(0) UNSIGNED NOT NULL,
  `ud_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_dob` date NOT NULL,
  `ud_pob` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_img_filename` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_img_ori` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `ud_sub_group` int(0) UNSIGNED NOT NULL DEFAULT 3,
  `ud_notif_flag` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  `log_user_id` int(0) UNSIGNED NOT NULL,
  `log_action` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `log_datetime` datetime(0) NOT NULL,
  `log_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of log_user_detail
-- ----------------------------
INSERT INTO `log_user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'one-piece-logo.png', 'Y', 1, 'Y', 1, '2020-10-06 11:32:38', 1, 'edit', '2020-10-06 11:32:38', 1);
INSERT INTO `log_user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'one-piece-logo.png', 'Y', 1, 'Y', 1, '2020-10-06 11:35:04', 1, 'edit', '2020-10-06 11:35:04', 2);
INSERT INTO `log_user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'e1a4006720bc9ab7d69289c8625b551d.jpg', 'apel.jpg', 'Y', 1, 'Y', 1, '2020-10-06 11:37:00', 1, 'edit', '2020-10-06 11:37:00', 3);
INSERT INTO `log_user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'a71f986d52ab6d0f2ef6eb6d6036a465.png', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'Y', 1, 'Y', 1, '2020-10-06 11:38:21', 1, 'edit', '2020-10-06 11:38:21', 4);

-- ----------------------------
-- Table structure for user_detail
-- ----------------------------
DROP TABLE IF EXISTS `user_detail`;
CREATE TABLE `user_detail`  (
  `ud_id` int(0) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ud_username` varchar(32) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_password` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_fullname` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_dob` date NOT NULL,
  `ud_pob` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_email` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `ud_img_filename` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_img_ori` varchar(64) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ud_notif_flag` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'Y',
  `ud_sub_group` int(0) UNSIGNED NOT NULL DEFAULT 3,
  `ud_is_active` char(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Y',
  `last_user` int(0) UNSIGNED NOT NULL,
  `last_datetime` datetime(0) NOT NULL,
  PRIMARY KEY (`ud_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_detail
-- ----------------------------
INSERT INTO `user_detail` VALUES (1, 'admin', '2b9d2a9db155ff51d4574bc2482b510e0946487b', 'Administrator', '2020-06-18', 'pekanbaru', 'admin@localhost.com', 'a71f986d52ab6d0f2ef6eb6d6036a465.png', 'ec3e5ef5fbdb16db8db24d7773d14404.png', 'Y', 1, 'Y', 1, '2020-10-06 11:38:21');
INSERT INTO `user_detail` VALUES (2, 'andy1t', '6c8825d7c1d15cfaecabd372b81d5d223334ddc3', 'Febri Andika', '1988-02-24', 'Pekanbaru', 'andikamage@gmail.com', '343bf56d9a8ec21f59c1ba8afa563fc3.jpg', 'pp.jpg', 'N', 1, 'N', 1, '2020-10-05 11:08:32');

SET FOREIGN_KEY_CHECKS = 1;
