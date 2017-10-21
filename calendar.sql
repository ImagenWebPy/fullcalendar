/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : calendar

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-09-27 15:18:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of events
-- ----------------------------

-- ----------------------------
-- Table structure for marcas
-- ----------------------------
DROP TABLE IF EXISTS `marcas`;
CREATE TABLE `marcas` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) DEFAULT NULL,
  `color` varchar(30) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of marcas
-- ----------------------------
INSERT INTO `marcas` VALUES ('1', 'Kia', '#FF0000', '1');
INSERT INTO `marcas` VALUES ('2', 'Chevrolet', '#CCA74E', '1');
INSERT INTO `marcas` VALUES ('3', 'BMW Motorrad', '#0071c5', '1');
INSERT INTO `marcas` VALUES ('4', 'MINI', '#000', '1');
INSERT INTO `marcas` VALUES ('5', 'Jeep', '#adadad', '1');
INSERT INTO `marcas` VALUES ('6', 'Dodge', '#701919', '1');
INSERT INTO `marcas` VALUES ('7', 'RAM', '#FFD700', '1');
INSERT INTO `marcas` VALUES ('8', 'Chrysler', '#13b0c1', '1');
INSERT INTO `marcas` VALUES ('9', 'Mazda', '#5e13c1', '1');
INSERT INTO `marcas` VALUES ('10', 'Nissan', '#f78587', '1');
INSERT INTO `marcas` VALUES ('11', 'Usados', '#FF8C00', '1');
INSERT INTO `marcas` VALUES ('12', 'Institucional', '#A82B30', '1');
SET FOREIGN_KEY_CHECKS=1;
