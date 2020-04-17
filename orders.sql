/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kmarket_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-04-17 13:27:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_date` datetime NOT NULL,
  `order_fullname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `order_address` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `order_phone` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_msg` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order_confirm` int(1) DEFAULT 0 COMMENT '0 = ยังไม่ยืนยัน 1 = ยืนยัน / โอนเงิน 3 = CANCEL 4 adminConfirm 5 complete',
  `admin_id` int(1) DEFAULT NULL COMMENT 'คนยืนยันรายการ',
  `order_confirm_date` timestamp NULL DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user` int(10) DEFAULT NULL,
  `tracking` varchar(100) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'รหัสจัดส่ง',
  `transportcompany` int(1) DEFAULT NULL COMMENT 'บริษัทบนส่ง',
  `transporttype` int(1) DEFAULT NULL COMMENT 'รูปแบบการจัดส่ง',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '2020-04-11 15:42:42', 'ทรงพล คำสะอาด', '165 ม. 7 ต.ไม้งาม อ.เมือง จ.ตาก 63000', '0821684717', 'kimniyomclub@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('2', '2020-04-14 00:05:33', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('3', '2020-04-14 01:02:24', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('4', '2020-04-14 01:03:41', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('5', '2020-04-14 01:08:46', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('6', '2020-04-14 01:10:03', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '0', null, null, null, null, null, null, null);
INSERT INTO `orders` VALUES ('7', '2020-04-14 01:17:57', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '5', '1', '2020-04-14 11:34:25', '158680187792356242_612391026157306_6742025574320963584_n.jpg', '27', 'SHP4009761126 ', '1', null);
INSERT INTO `orders` VALUES ('8', '2020-04-14 16:43:18', 'demo demo', '165 ม.7 สำนักงานสาธารณสุข ห้อง(IT) ต.ไม้งาม    อ.เมืองตาก    จ.ตาก    63000', '0800249484', 'demo1@gmail.com', null, '5', '1', '2020-04-14 16:43:29', '1586857398BBL.jpg', '27', 'EE993673545CN', '2', null);
