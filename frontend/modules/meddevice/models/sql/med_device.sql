/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : smartcare

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-07-18 10:36:27
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for med_device
-- ----------------------------
DROP TABLE IF EXISTS `med_device`;
CREATE TABLE `med_device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `device_name` varchar(255) DEFAULT NULL COMMENT 'ชื่ออุปกรณ์',
  `device_from` varchar(255) DEFAULT NULL COMMENT 'จากหน่วยงาน',
  `get_date` date DEFAULT NULL COMMENT 'วดป.ยืม',
  `send_date` date DEFAULT NULL COMMENT 'วดป.คืน',
  `device_status` enum('คืน','ยืม') DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of med_device
-- ----------------------------
