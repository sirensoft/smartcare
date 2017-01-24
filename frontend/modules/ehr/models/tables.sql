/*
Navicat MySQL Data Transfer

Source Server         : 09-61.19.22.165-เนินมะปราง
Source Server Version : 50542
Source Host           : 61.19.22.165:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-21 11:27:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ehr_onoff
-- ----------------------------
DROP TABLE IF EXISTS `ehr_onoff`;
CREATE TABLE `ehr_onoff` (
  `status` enum('off','on') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `ehr_onoff` VALUES ('on');

DROP TABLE IF EXISTS `log_ehr`;
CREATE TABLE `log_ehr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `patient_cid` varchar(255) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
