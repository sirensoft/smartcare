/*
Navicat MySQL Data Transfer

Source Server         : 05-61.19.22.203-บางกระทุ่ม
Source Server Version : 50542
Source Host           : 61.19.22.203:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-15 13:30:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cmstatus
-- ----------------------------
DROP TABLE IF EXISTS `cmstatus`;
CREATE TABLE `cmstatus` (
  `mstatus` varchar(1) NOT NULL,
  `mstatusdesc` varchar(20) NOT NULL,
  PRIMARY KEY (`mstatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cmstatus
-- ----------------------------
INSERT INTO `cmstatus` VALUES ('1', 'โสด');
INSERT INTO `cmstatus` VALUES ('2', 'คู่');
INSERT INTO `cmstatus` VALUES ('3', 'ม่าย');
INSERT INTO `cmstatus` VALUES ('4', 'หย่า');
INSERT INTO `cmstatus` VALUES ('5', 'แยก');
INSERT INTO `cmstatus` VALUES ('6', 'สมณะ');
INSERT INTO `cmstatus` VALUES ('9', 'ไม่ทราบ');
