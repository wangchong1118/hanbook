/*
 Navicat Premium Data Transfer

 Source Server         : wh_bookstore
 Source Server Type    : MySQL
 Source Server Version : 50719
 Source Host           : 39.96.5.90:3306
 Source Schema         : wh_bookstore

 Target Server Type    : MySQL
 Target Server Version : 50719
 File Encoding         : 65001

 Date: 29/06/2019 19:59:43
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '王晗', '123456', 'avatars_5d174f0506957.jpg');
INSERT INTO `user` VALUES (2, 'wanghan', '123456', 'avatars_5d174eec2119b.jpg');
INSERT INTO `user` VALUES (3, 'wangch', '123456', 'avatars_5d174f480398b.jpg');
INSERT INTO `user` VALUES (4, '令狐少侠', '654321', 'avatars_5d1750c1bb18f.jpg');
INSERT INTO `user` VALUES (5, '默认头像', '123456', NULL);

SET FOREIGN_KEY_CHECKS = 1;
