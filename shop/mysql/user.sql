/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : user

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-16 19:05:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for list
-- ----------------------------
DROP TABLE IF EXISTS `list`;
CREATE TABLE `list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of list
-- ----------------------------
INSERT INTO `list` VALUES ('1', 'jack', '123', '男', '17');
INSERT INTO `list` VALUES ('2', 'tom', '123456', '男', '22');
INSERT INTO `list` VALUES ('3', 'rose', '123123', '女', '12');
INSERT INTO `list` VALUES ('4', 'lily', '321', '女', '3');
INSERT INTO `list` VALUES ('31', 'qq', 'q', '男', '1');
INSERT INTO `list` VALUES ('32', 'qqq', '11', '男', '1');
INSERT INTO `list` VALUES ('33', 'www', '123', '女', '12');
