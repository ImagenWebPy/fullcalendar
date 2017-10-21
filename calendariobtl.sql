/*
Navicat MySQL Data Transfer

Source Server         : AWS
Source Server Version : 50556
Source Host           : 34.209.83.134:3306
Source Database       : calendariobtl

Target Server Type    : MYSQL
Target Server Version : 50556
File Encoding         : 65001

Date: 2017-09-28 18:18:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `place` varchar(80) DEFAULT NULL,
  `note` text,
  `id_marca` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('4', 'Casa Cor MINI Owners Casa Cor', '#000', '2017-09-29 00:00:00', '2017-09-30 00:00:00', '', '', '4');
INSERT INTO `events` VALUES ('5', 'Concierto Alexandre Pires', '#adadad', '2017-09-30 00:00:00', '2017-10-01 00:00:00', 'Conmebol', 'Activación', '5');
INSERT INTO `events` VALUES ('6', 'Opening CasaCor', '#A82B30', '2017-10-03 00:00:00', '2017-10-04 00:00:00', 'Casa Cor', '17 hs.', '12');
INSERT INTO `events` VALUES ('7', 'Conferencia de Prensa CasaCor', '#A82B30', '2017-09-27 00:00:00', '2017-09-28 00:00:00', 'Casa Cor', '10 am', '12');
INSERT INTO `events` VALUES ('8', 'Day Trip', '#0071c5', '2017-09-30 00:00:00', '2017-10-01 00:00:00', 'Arroyos y Esteros', '', '3');
INSERT INTO `events` VALUES ('9', 'Curso de Manejo Off Road', '#0071c5', '2017-09-23 00:00:00', '2017-09-24 00:00:00', 'Rakiura', '', '3');
INSERT INTO `events` VALUES ('10', 'Curso de Mecánica Básica - G650GS', '#0071c5', '2017-09-16 00:00:00', '2017-09-17 00:00:00', 'Showroom', '', '3');
INSERT INTO `events` VALUES ('11', 'Concierto especial de Luis Álvarez.', '#f78587', '2017-10-27 00:00:00', '2017-10-28 00:00:00', '', '', '10');
INSERT INTO `events` VALUES ('16', 'Resistance Road to Ultra', '#adadad', '2017-10-06 00:00:00', '2017-10-07 00:00:00', 'Puerto de Asunción', 'RENEGADE', '5');

-- ----------------------------
-- Table structure for `marcas`
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

-- ----------------------------
-- Table structure for `usuarios`
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `contrasena` varchar(120) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Raúl Ramírez', 'raul.ramirez@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('2', 'Daniel Gomez', 'dgomez@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('3', 'Jose Peña', 'jpena@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('4', 'Aldo Ojeda', 'aldo.ojeda@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('5', 'Antonio Ojeda', 'antonio.ojeda@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('6', 'Ana Laura Rodriguez', 'arodriguez@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('7', 'Oscar Benitez', 'obenitez@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('8', 'Hugo Gonzalez', 'hugo.gonzalez@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('9', 'Matias Villalba', 'matias.villalba@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('10', 'Tamara Monzon', 'tamara.monzon@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('11', 'Jose Silvero', 'jose.silvero@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('12', 'Christian Lombardo', 'marketing@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('13', 'Rodrigo Colman', 'rcolman@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
