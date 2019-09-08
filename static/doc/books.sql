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

 Date: 29/06/2019 19:58:39
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for books
-- ----------------------------
DROP TABLE IF EXISTS `books`;
CREATE TABLE `books`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cid` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `intr` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `bookimg` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `salenum` int(11) NULL DEFAULT NULL,
  `price` decimal(10, 2) NULL DEFAULT NULL,
  `pubdate` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of books
-- ----------------------------
INSERT INTO `books` VALUES (1, '1', '平凡的世界', '路遥', '该书以中国70年代中期到80年代中期十年间为背景，是一部全景式地表现中国当代城乡社会生活的长篇小说', 'books_5d1703766f309.jpg', 3600000, 186.00, '1986-06-01');
INSERT INTO `books` VALUES (2, '1', '三国演义', '罗贯中', '《三国演义》描写了从东汉末年到西晋初年之间近百年的历史风云，以描写战争为主，诉说了东汉末年的群雄割据混战和魏、蜀、吴三国之间的政治和军事斗争', 'books_5d17087a6f17c.jpg', 4200000, 82.00, '1982-04-06');
INSERT INTO `books` VALUES (3, '3', '时间简史', '霍金', '《时间简史》主要向人们介绍了什么是宇宙论，以及宇宙论最新的发展状况。', 'books_5d16f81500764.jpg', 120, 38.00, '2019-04-10');
INSERT INTO `books` VALUES (4, '6', '乔布斯传', '王咏刚、周虹', '全面讲述了从乔布斯青年时期到苹果发布最新的iCloud云计算模式的整个创新历程。', 'books_5d16f56234c24.jpg', 258000, 56.00, '2016-08-01');
INSERT INTO `books` VALUES (5, '4', 'PHP从入门到精通', '陈超', '从初学者角度出发,通过通俗易懂的语言,丰富多彩的实例,详细介绍了使用PHP进行网络开发应该掌握的各方面技术。', 'books_5d17065137700.jpg', 120000, 54.00, '2009-03-12');
INSERT INTO `books` VALUES (6, '2', '笑傲江湖', '金庸', '小说通过叙述华山派大弟子令狐冲的经历，反映了武林各派争霸夺权的历程。', 'books_5d170731dca09.jpg', 9400000, 68.00, '1969-10-08');
INSERT INTO `books` VALUES (7, '5', '疯狂的硬盘', '银河九天', '讲述了本来是电脑小白的胡一飞，无意间淘到块二手硬盘，从此走上了猥琐的黑客之路。', 'books_5d17079d4f72c.jpg', 256000, 80.00, '2010-07-20');
INSERT INTO `books` VALUES (8, '1', '呐喊', '鲁迅', '题作呐喊,就是为革命者助战振威。呐喊中的小说,以振聋发聩的气势,揭示了中国的社会面貌,控诉了封建制度的罪恶,喊出了五四时期革命者的心声。', 'books_5d17140628140.jpg', 840000, 68.00, '1926-06-15');
INSERT INTO `books` VALUES (9, '1', '史记', '司马迁', '《史记》是由司马迁撰写的中国第一部纪传体通史。', 'books_5d1714b611237.jpg', 1580000, 156.00, '2019-06-08');
INSERT INTO `books` VALUES (10, '1', '活着', '余华', '《活着》讲述一个人一生的故事，这是一个历尽世间沧桑和磨难老人的人生感言，是一幕演绎人生苦难经历的戏剧。', 'books_5d1715e16241c.jpg', 560000, 72.00, '2002-09-20');
INSERT INTO `books` VALUES (11, '1', '全球通史', '斯塔夫里阿诺斯', '该书内容上起人类的起源，下迄20世纪70年代多极世界相对峙时期，上下数十万年，一气呵成。', 'books_5d171fc946b2c.jpg', 423000, 89.00, '2004-06-04');
INSERT INTO `books` VALUES (12, '1', '围城', '钱钟书', '《围城》是钱钟书所著的长篇小说，是中国现代文学史上一部风格独特的讽刺小说。', 'books_5d1721612e1cc.jpg', 570000, 95.00, '1979-01-10');

SET FOREIGN_KEY_CHECKS = 1;
