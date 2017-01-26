/*
Navicat MySQL Data Transfer

Source Server         : 05-61.19.22.203-บางกระทุ่ม
Source Server Version : 50542
Source Host           : 61.19.22.203:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-26 09:46:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ehr_onoff
-- ----------------------------
DROP TABLE IF EXISTS `ehr_onoff`;
CREATE TABLE `ehr_onoff` (
  `status` enum('off','on') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ehr_onoff
-- ----------------------------
INSERT INTO `ehr_onoff` VALUES ('on');
