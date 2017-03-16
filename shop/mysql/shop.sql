/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : shop

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-03-16 19:04:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `sales` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('101', '商品名称1', '1.jpg', '66.66', '102', '605', '97');
INSERT INTO `products` VALUES ('102', '商品名称2', '2.jpg', '68.66', '152', '260', '79');
INSERT INTO `products` VALUES ('103', '商品名称3', '3.jpg', '68.88', '224', '206', '87');
INSERT INTO `products` VALUES ('104', '商品名称4', '4.jpg', '66.88', '122', '800', '89');
INSERT INTO `products` VALUES ('105', '商品名称5', '5.jpg', '88.66', '524', '280', '86');
INSERT INTO `products` VALUES ('106', '商品名称6', '6.jpg', '69.66', '105', '805', '69');
INSERT INTO `products` VALUES ('107', '商品名称7', '7.jpg', '66.99', '152', '900', '84');
INSERT INTO `products` VALUES ('108', '商品名称8', '8.jpg', '66.69', '212', '290', '49');
INSERT INTO `products` VALUES ('109', '商品名称9', '7.jpg', '99.66', '124', '209', '83');
INSERT INTO `products` VALUES ('110', '商品名称10', '6.jpg', '99.99', '114', '905', '39');
