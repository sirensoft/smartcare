/*
Navicat MySQL Data Transfer

Source Server         : 05-61.19.22.203-บางกระทุ่ม
Source Server Version : 50542
Source Host           : 61.19.22.203:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-15 13:32:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for creligion
-- ----------------------------
DROP TABLE IF EXISTS `creligion`;
CREATE TABLE `creligion` (
  `id_religion` varchar(2) NOT NULL,
  `religion` varchar(30) NOT NULL,
  `detail` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_religion`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of creligion
-- ----------------------------
INSERT INTO `creligion` VALUES ('01', 'ศาสนาพุทธ', 'เถรวาท , มหายาน');
INSERT INTO `creligion` VALUES ('02', 'ศาสนาอิสลาม', 'สุหนี , ชีอะห์');
INSERT INTO `creligion` VALUES ('03', 'ศาสนาคริสต์', 'โรมันคาทอลิก , โปรเตสแตนต์ , ออร์ทอดอกซ์');
INSERT INTO `creligion` VALUES ('04', 'ศาสนาพราหมณ์-ฮินดู', 'ไศวะ , ไวษณพ , ศักติ');
INSERT INTO `creligion` VALUES ('05', 'ศาสนาซิกข์', 'นานักปันถิ , ขาลสา');
INSERT INTO `creligion` VALUES ('06', 'ศาสนายิว', 'ออร์ทอดอกซ์(ฟาริซี) , โปรเกรสซีฟ (ซัดดูคูส) , นักพรต (เอสเซเนส)');
INSERT INTO `creligion` VALUES ('07', 'ศาสนาเชน', 'ทิคัมพร , เศวตัมพร');
INSERT INTO `creligion` VALUES ('08', 'ศาสนาโซโรอัสเตอร์', 'กัทมิส , ชหัมชหิส');
INSERT INTO `creligion` VALUES ('09', 'ศาสนาบาไฮ', null);
INSERT INTO `creligion` VALUES ('00', 'อศาสนา/ไม่นับถือศาสนา', null);
INSERT INTO `creligion` VALUES ('99', 'ไม่ระบุ', null);
