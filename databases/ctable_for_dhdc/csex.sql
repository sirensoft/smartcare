/*
Navicat MySQL Data Transfer

Source Server         : 05-61.19.22.203-บางกระทุ่ม
Source Server Version : 50542
Source Host           : 61.19.22.203:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-15 13:31:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for csex
-- ----------------------------
DROP TABLE IF EXISTS `csex`;
CREATE TABLE `csex` (
  `sex` varchar(1) NOT NULL,
  `sexname` varchar(4) DEFAULT NULL,
  PRIMARY KEY (`sex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of csex
-- ----------------------------
INSERT INTO `csex` VALUES ('1', 'ชาย');
INSERT INTO `csex` VALUES ('2', 'หญิง');
