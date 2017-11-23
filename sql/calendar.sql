/*
Navicat MySQL Data Transfer

Source Server         : AWS
Source Server Version : 50556
Source Host           : 34.209.83.134:3306
Source Database       : calendariobtl

Target Server Type    : MYSQL
Target Server Version : 50556
File Encoding         : 65001

Date: 2017-11-23 11:55:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `events`
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_moneda` int(11) unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `color` varchar(7) DEFAULT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `place` varchar(80) DEFAULT NULL,
  `note` text,
  `id_marca` int(11) DEFAULT NULL,
  `file_pdf` varchar(80) DEFAULT NULL,
  `file_xlsx` varchar(80) DEFAULT NULL,
  `monto` decimal(20,3) DEFAULT NULL,
  `img` varchar(160) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('4', null, 'Casa Cor MINI Owners Casa Cor', '#000', '2017-10-04 00:00:00', '2017-10-05 00:00:00', '', '', '4', null, null, null, null);
INSERT INTO `events` VALUES ('5', null, 'Concierto Alexandre Pires', '#adadad', '2017-09-30 00:00:00', '2017-10-01 00:00:00', 'Conmebol', 'Activación', '5', null, null, null, null);
INSERT INTO `events` VALUES ('6', null, 'Opening CasaCor', '#A82B30', '2017-10-03 00:00:00', '2017-10-04 00:00:00', 'Casa Cor', '17 hs.', '12', null, null, null, null);
INSERT INTO `events` VALUES ('7', null, 'Conferencia de Prensa CasaCor', '#A82B30', '2017-09-27 00:00:00', '2017-09-28 00:00:00', 'Casa Cor', '10 am', '12', null, null, null, null);
INSERT INTO `events` VALUES ('8', null, 'Day Trip', '#0071c5', '2017-09-30 00:00:00', '2017-10-01 00:00:00', 'Arroyos y Esteros', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('9', null, 'Curso de Manejo Off Road', '#0071c5', '2017-09-23 00:00:00', '2017-09-24 00:00:00', 'Rakiura', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('10', null, 'Curso de Mecánica Básica - G650GS', '#0071c5', '2017-09-16 00:00:00', '2017-09-17 00:00:00', 'Showroom', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('11', null, 'Concierto especial de Luis Álvarez.', '#f78587', '2017-10-27 00:00:00', '2017-10-28 00:00:00', '', '', '10', null, null, null, null);
INSERT INTO `events` VALUES ('16', null, 'Resistance Road to Ultra', '#adadad', '2017-10-06 00:00:00', '2017-10-07 00:00:00', 'Puerto de Asunción', 'RENEGADE', '5', null, null, null, null);
INSERT INTO `events` VALUES ('17', null, 'Beatbrations Armin Van Buuren', '#000', '2017-10-14 00:00:00', '2017-10-15 00:00:00', 'Puerto de Asunción', '', '4', null, null, null, null);
INSERT INTO `events` VALUES ('18', null, 'Casa Cor BMW Riders', '#0071c5', '2017-10-11 00:00:00', '2017-10-12 00:00:00', 'Casa Cor', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('19', null, 'Casa Cor MINI Arquitectos', '#000', '2017-11-02 00:00:00', '2017-11-03 00:00:00', 'Casa Cor', '', '4', null, null, null, null);
INSERT INTO `events` VALUES ('20', null, 'Soy Latino', '#FF0000', '2017-10-07 00:00:00', '2017-10-08 00:00:00', 'Club Olimpia', '', '1', null, null, null, null);
INSERT INTO `events` VALUES ('21', null, 'Fiesta Nacional de Corea', '#FF0000', '2017-10-19 00:00:00', '2017-10-20 00:00:00', 'Asociación de Jubilados bancarios', '', '1', null, null, null, null);
INSERT INTO `events` VALUES ('22', null, 'Feria de los lazos ARP', '#A82B30', '2017-10-23 00:00:00', '2017-10-24 00:00:00', 'Expo MRA', 'Jeep, Mazda, Chevrolet, Nissan', '12', null, null, null, null);
INSERT INTO `events` VALUES ('28', null, 'Il Divo', '#adadad', '2017-10-24 00:00:00', '2017-10-25 00:00:00', 'Conmebol', 'Renegade y Grand Cherokee', '5', '28_', '28_', null, null);
INSERT INTO `events` VALUES ('29', null, 'Feria Coopeduc VCA', '#FF0000', '2017-10-27 00:00:00', '2017-10-28 00:00:00', 'Parque del Guaira Villarrica', 'Kia - Jeep - Mazda', '1', '29_', '29_', null, null);
INSERT INTO `events` VALUES ('30', null, 'Alianza Caja Bancaria', '#A82B30', '2017-11-03 00:00:00', '2017-11-04 00:00:00', 'Jubilados Bancarios', 'Jeep - Kia - Mazda - Chevrolet - Nissan', '12', '30_', '30_', null, null);
INSERT INTO `events` VALUES ('32', null, 'Road trip Club Renegade', '#adadad', '2017-10-28 00:00:00', '2017-10-29 00:00:00', 'Mbatovi', '', '5', '32_', '32_', null, null);
INSERT INTO `events` VALUES ('33', null, 'Feria Garden', '#A82B30', '2017-11-10 00:00:00', '2017-11-20 00:00:00', 'Shopping del Sol', '1o al 19 de Noviembre', '12', '33_', '33_', null, null);
INSERT INTO `events` VALUES ('37', null, 'Conferencia Vendele a la mente y no a la gente', '#adadad', '2017-11-07 00:00:00', '2017-11-08 00:00:00', 'BCP', '', '5', null, null, null, null);
INSERT INTO `events` VALUES ('39', null, 'Noche Blanca', '#000', '2017-11-09 00:00:00', '2017-11-10 00:00:00', 'Dazzler', '', '4', null, null, null, null);
INSERT INTO `events` VALUES ('40', null, 'Postventa: Skill Cup Asesores y TÃ©cnicos KIA', '#FF0000', '2017-11-04 00:00:00', '2017-11-05 00:00:00', 'Taller De la Victoria', '', '1', null, null, null, null);
INSERT INTO `events` VALUES ('41', null, 'Postventa: Skill Cup Asesores y TÃƒÂ©cnicos KIA', '#FF0000', '2017-11-18 00:00:00', '2017-11-19 00:00:00', 'Taller De la Victoria', '', '1', null, null, null, null);
INSERT INTO `events` VALUES ('42', null, 'Day Trip - Quinta Coratei Misiones', '#0071c5', '2017-11-18 00:00:00', '2017-11-19 00:00:00', '', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('43', null, 'Day Trip - Quinta Coratei Misiones', '#0071c5', '2017-11-19 00:00:00', '2017-11-20 00:00:00', '', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('44', null, 'Curso de Manejo Off Road - Rakiura', '#0071c5', '2017-11-25 00:00:00', '2017-11-26 00:00:00', '', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('45', null, 'Lunch Motorrad - Rakiura', '#0071c5', '2017-11-26 00:00:00', '2017-11-27 00:00:00', '', '', '3', null, null, null, null);
INSERT INTO `events` VALUES ('46', null, 'Convencion de Jueces', '#adadad', '2017-11-18 00:00:00', '2017-11-19 00:00:00', 'Yacht y Golf Club', 'Montaje viernes de mañana', '5', null, null, null, null);
INSERT INTO `events` VALUES ('47', null, 'Agrodinamica', '#FF0000', '2017-11-28 00:00:00', '2017-11-29 00:00:00', 'Obligado', 'Todas las marcas', '1', null, null, null, null);
INSERT INTO `events` VALUES ('48', '2', 'Deco Walk', '#000', '2017-11-23 00:00:00', '2017-11-24 00:00:00', 'Tte Vera y Senador Long', '', '4', null, null, '1000.000', null);

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
-- Table structure for `moneda`
-- ----------------------------
DROP TABLE IF EXISTS `moneda`;
CREATE TABLE `moneda` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) DEFAULT NULL,
  `simbolo` varchar(10) DEFAULT NULL,
  `estado` int(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of moneda
-- ----------------------------
INSERT INTO `moneda` VALUES ('1', 'Guaraní', 'Gs.', '1');
INSERT INTO `moneda` VALUES ('2', 'Dolar', '$', '1');

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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

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
INSERT INTO `usuarios` VALUES ('14', 'Christhian Bareiro', 'cbareiro@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('15', 'Romina Diarte', 'rdiarte@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
INSERT INTO `usuarios` VALUES ('16', 'Jovino Prieto', 'jovino.prieto@garden.com.py', '4530ad981d5c02d9cb0456c360fae460803922f556c56022e1dc0187c16ced50', '1');
