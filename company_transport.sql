/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kmarket_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-04-17 13:27:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for company_transport
-- ----------------------------
DROP TABLE IF EXISTS `company_transport`;
CREATE TABLE `company_transport` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `transportname` varchar(255) DEFAULT NULL,
  `linktrack` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='บริษัทขนส่ง';

-- ----------------------------
-- Records of company_transport
-- ----------------------------
INSERT INTO `company_transport` VALUES ('1', 'ไปรษณีย์ไทย', 'https://track.thailandpost.co.th/?trackNumber=', '0.00', 'thailand-post.png');
INSERT INTO `company_transport` VALUES ('2', 'Kerry Express', 'https://th.kerryexpress.com/th/track/', '0.00', 'kerry.png');
