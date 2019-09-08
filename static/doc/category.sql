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

 Date: 29/06/2019 19:59:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `src` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES (1, 'wxjz', '文学巨著');
INSERT INTO `category` VALUES (2, 'wxxs', '武侠小说');
INSERT INTO `category` VALUES (3, 'kpdw', '科普读物');
INSERT INTO `category` VALUES (5, 'wlxs', '网络小说');
INSERT INTO `category` VALUES (6, 'mrzj', '名人传记');
INSERT INTO `category` VALUES (4, 'jsjbc', '计算机编程');

SET FOREIGN_KEY_CHECKS = 1;
