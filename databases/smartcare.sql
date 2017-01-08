/*
Navicat MySQL Data Transfer

Source Server         : localhost3309
Source Server Version : 50548
Source Host           : localhost:3309
Source Database       : smartcare

Target Server Type    : MYSQL
Target Server Version : 50548
File Encoding         : 65001

Date: 2017-01-08 20:47:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for assessment
-- ----------------------------
DROP TABLE IF EXISTS `assessment`;
CREATE TABLE `assessment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` int(11) DEFAULT NULL,
  `date_serv` date DEFAULT NULL,
  `adl_score` int(11) DEFAULT NULL COMMENT 'คะแนน ADL',
  `pp_code` varchar(255) DEFAULT NULL,
  `tai_score` int(11) DEFAULT NULL,
  `tai_class` varchar(255) DEFAULT NULL COMMENT 'จัดกลุ่ม TAI',
  `group_text` varchar(255) DEFAULT NULL,
  `q2` varchar(255) DEFAULT NULL,
  `q9` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `doc_file` varchar(255) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of assessment
-- ----------------------------
INSERT INTO `assessment` VALUES ('1', '2', '2017-01-05', '8', '1B1281', null, 'B3', 'กลุ่มที่ 1 ติดบ้าน-1', null, null, null, null, null, '2017-01-05 09:18:35');
INSERT INTO `assessment` VALUES ('2', '2', '2017-01-05', '8', '1B1281', null, 'B3', 'กลุ่มที่ 1 ติดบ้าน-1', null, null, null, null, '1', '2017-01-05 09:22:47');
INSERT INTO `assessment` VALUES ('3', '2', '2017-01-05', '10', '1B1281', null, 'B3', 'กลุ่มที่ 1 ติดบ้าน-1', null, null, null, null, '1', '2017-01-05 09:32:42');
INSERT INTO `assessment` VALUES ('4', '7', '2017-01-05', '9', '1B1281', null, 'C3', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '1', '2017-01-05 10:04:50');
INSERT INTO `assessment` VALUES ('5', '2', '2017-01-05', '7', '1B1281', null, 'C3', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '10', '2017-01-05 14:46:20');
INSERT INTO `assessment` VALUES ('6', '2', '2017-01-05', '18', '1B1280', null, '', '-', null, null, null, null, '1', '2017-01-05 22:11:07');
INSERT INTO `assessment` VALUES ('7', '6', '2017-01-06', '11', '1B1281', null, 'C4', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '13', '2017-01-06 10:30:43');
INSERT INTO `assessment` VALUES ('8', '2', '2017-01-06', '3', '1B1282', null, 'I1', 'กลุ่มที่ 3 ติดเตียง-2', null, null, null, null, '1', '2017-01-06 11:56:17');
INSERT INTO `assessment` VALUES ('9', '2', '2017-01-07', '9', '1B1281', null, 'C3', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '1', '2017-01-07 17:07:58');
INSERT INTO `assessment` VALUES ('10', '2', '2017-01-07', '12', '1B1280', null, 'B3', 'กลุ่มที่ 1 ติดบ้าน-1', null, null, null, null, '1', '2017-01-07 22:32:32');
INSERT INTO `assessment` VALUES ('11', '8', '2017-01-08', '12', '1B1280', null, 'C3', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '1', '2017-01-08 11:20:54');
INSERT INTO `assessment` VALUES ('12', '8', '2017-01-08', '5', '1B1281', null, 'I1', 'กลุ่มที่ 3 ติดเตียง-2', null, null, null, null, '1', '2017-01-08 11:29:03');
INSERT INTO `assessment` VALUES ('13', '2', '2017-01-08', '11', '1B1281', null, 'C3', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '1', '2017-01-08 11:30:27');
INSERT INTO `assessment` VALUES ('14', '5', '2017-01-08', '10', '1B1281', null, 'C4', 'กลุ่มที่ 2 ติดบ้าน-2', null, null, null, null, '1', '2017-01-08 15:44:14');

-- ----------------------------
-- Table structure for c_class
-- ----------------------------
DROP TABLE IF EXISTS `c_class`;
CREATE TABLE `c_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_class
-- ----------------------------
INSERT INTO `c_class` VALUES ('1', 'ติดบ้าน-1');
INSERT INTO `c_class` VALUES ('2', 'ติดบ้าน-2');
INSERT INTO `c_class` VALUES ('3', 'ติดเตียง-1');
INSERT INTO `c_class` VALUES ('4', 'ติดเตียง-2');

-- ----------------------------
-- Table structure for c_color
-- ----------------------------
DROP TABLE IF EXISTS `c_color`;
CREATE TABLE `c_color` (
  `id` varchar(255) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_color
-- ----------------------------
INSERT INTO `c_color` VALUES ('blue', 'blue');
INSERT INTO `c_color` VALUES ('red', 'red');
INSERT INTO `c_color` VALUES ('yellow', 'yellow');

-- ----------------------------
-- Table structure for c_discharge
-- ----------------------------
DROP TABLE IF EXISTS `c_discharge`;
CREATE TABLE `c_discharge` (
  `dischargecode` char(1) NOT NULL,
  `dischargedesc` varchar(30) NOT NULL,
  PRIMARY KEY (`dischargecode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_discharge
-- ----------------------------
INSERT INTO `c_discharge` VALUES ('1', 'ตาย');
INSERT INTO `c_discharge` VALUES ('2', 'ย้าย');
INSERT INTO `c_discharge` VALUES ('3', 'สาบสูญ');
INSERT INTO `c_discharge` VALUES ('9', 'ยังมีชีวิตอยู่');

-- ----------------------------
-- Table structure for c_line
-- ----------------------------
DROP TABLE IF EXISTS `c_line`;
CREATE TABLE `c_line` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `line_name` varchar(255) DEFAULT NULL,
  `line_token` text,
  `status` varchar(255) DEFAULT NULL,
  `dupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_line
-- ----------------------------
INSERT INTO `c_line` VALUES ('1', 'dhdc', 'A6uGXrGHEeyzqG5icjivxTaDd3Mg8zELQGAML9hY7vm', '1', '2016-12-28 18:09:24');
INSERT INTO `c_line` VALUES ('2', 'care', 'fKKFpR6m65Nr8AzUwOAdJWZJAz5kXPN0NkM40E5z2GM', '1', '2016-12-28 18:36:11');

-- ----------------------------
-- Table structure for c_nation
-- ----------------------------
DROP TABLE IF EXISTS `c_nation`;
CREATE TABLE `c_nation` (
  `nationcode` char(4) NOT NULL,
  `nationname` varchar(255) DEFAULT NULL,
  `nationcodeaec` char(4) DEFAULT NULL,
  PRIMARY KEY (`nationcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_nation
-- ----------------------------
INSERT INTO `c_nation` VALUES ('002', 'โปรตุเกส', '11');
INSERT INTO `c_nation` VALUES ('003', 'ดัตช์', '11');
INSERT INTO `c_nation` VALUES ('004', 'เยอรมัน', '11');
INSERT INTO `c_nation` VALUES ('005', 'ฝรั่งเศส', '11');
INSERT INTO `c_nation` VALUES ('006', 'เดนมาร์ก', '11');
INSERT INTO `c_nation` VALUES ('007', 'สวีเดน', '11');
INSERT INTO `c_nation` VALUES ('008', 'สวิส', '11');
INSERT INTO `c_nation` VALUES ('009', 'อิตาลี', '11');
INSERT INTO `c_nation` VALUES ('010', 'นอร์เวย์', '11');
INSERT INTO `c_nation` VALUES ('011', 'ออสเตรีย', '11');
INSERT INTO `c_nation` VALUES ('012', 'ไอริช', '11');
INSERT INTO `c_nation` VALUES ('013', 'ฟินแลนด์', '11');
INSERT INTO `c_nation` VALUES ('014', 'เบลเยียม', '11');
INSERT INTO `c_nation` VALUES ('015', 'สเปน', '11');
INSERT INTO `c_nation` VALUES ('016', 'รัสเซีย', '11');
INSERT INTO `c_nation` VALUES ('017', 'โปแลนด์', '11');
INSERT INTO `c_nation` VALUES ('018', 'เช็ก', '11');
INSERT INTO `c_nation` VALUES ('019', 'ฮังการี', '11');
INSERT INTO `c_nation` VALUES ('020', 'กรีก', '11');
INSERT INTO `c_nation` VALUES ('021', 'ยูโกสลาฟ', '11');
INSERT INTO `c_nation` VALUES ('022', 'ลักเซมเบิร์ก', '11');
INSERT INTO `c_nation` VALUES ('023', 'วาติกัน', '11');
INSERT INTO `c_nation` VALUES ('024', 'มอลตา', '11');
INSERT INTO `c_nation` VALUES ('025', 'ลีซู', '11');
INSERT INTO `c_nation` VALUES ('026', 'บัลแกเรีย', '11');
INSERT INTO `c_nation` VALUES ('027', 'โรมาเนีย', '11');
INSERT INTO `c_nation` VALUES ('028', 'ไซปรัส', '11');
INSERT INTO `c_nation` VALUES ('029', 'อเมริกัน', '11');
INSERT INTO `c_nation` VALUES ('030', 'แคนาดา', '11');
INSERT INTO `c_nation` VALUES ('031', 'เม็กซิโก', '11');
INSERT INTO `c_nation` VALUES ('032', 'คิวบา', '11');
INSERT INTO `c_nation` VALUES ('033', 'อาร์เจนตินา', '11');
INSERT INTO `c_nation` VALUES ('034', 'บราซิล', '11');
INSERT INTO `c_nation` VALUES ('035', 'ชิลี', '11');
INSERT INTO `c_nation` VALUES ('036', 'อาข่า', '11');
INSERT INTO `c_nation` VALUES ('037', 'โคลัมเบีย', '11');
INSERT INTO `c_nation` VALUES ('038', 'ลั๊ว', '11');
INSERT INTO `c_nation` VALUES ('039', 'เปรู', '11');
INSERT INTO `c_nation` VALUES ('040', 'ปานามา', '11');
INSERT INTO `c_nation` VALUES ('041', 'อุรุกวัย', '11');
INSERT INTO `c_nation` VALUES ('042', 'เวเนซุเอลา', '11');
INSERT INTO `c_nation` VALUES ('043', 'เปอร์โตริโก้', '11');
INSERT INTO `c_nation` VALUES ('044', 'จีน', '11');
INSERT INTO `c_nation` VALUES ('045', 'อินเดีย', '11');
INSERT INTO `c_nation` VALUES ('046', 'เวียดนาม', '01');
INSERT INTO `c_nation` VALUES ('047', 'ญี่ปุ่น', '11');
INSERT INTO `c_nation` VALUES ('048', 'พม่า', '02');
INSERT INTO `c_nation` VALUES ('049', 'ฟิลิปปิน', '03');
INSERT INTO `c_nation` VALUES ('050', 'มาเลเซีย', '04');
INSERT INTO `c_nation` VALUES ('051', 'อินโดนีเซีย', '05');
INSERT INTO `c_nation` VALUES ('052', 'ปากีสถาน', '11');
INSERT INTO `c_nation` VALUES ('053', 'เกาหลีใต้', '11');
INSERT INTO `c_nation` VALUES ('054', 'สิงคโปร์', '06');
INSERT INTO `c_nation` VALUES ('055', 'เนปาล', '11');
INSERT INTO `c_nation` VALUES ('056', 'ลาว', '07');
INSERT INTO `c_nation` VALUES ('057', 'กัมพูชา', '08');
INSERT INTO `c_nation` VALUES ('058', 'ศรีลังกา', '11');
INSERT INTO `c_nation` VALUES ('059', 'ซาอุดีอาระเบีย', '11');
INSERT INTO `c_nation` VALUES ('060', 'อิสราเอล', '11');
INSERT INTO `c_nation` VALUES ('061', 'เลบานอน', '11');
INSERT INTO `c_nation` VALUES ('062', 'อิหร่าน', '11');
INSERT INTO `c_nation` VALUES ('063', 'ตุรกี', '11');
INSERT INTO `c_nation` VALUES ('064', 'บังกลาเทศ', '11');
INSERT INTO `c_nation` VALUES ('065', 'ถูกถอนสัญชาติ', '11');
INSERT INTO `c_nation` VALUES ('066', 'ซีเรีย', '11');
INSERT INTO `c_nation` VALUES ('067', 'อิรัก', '11');
INSERT INTO `c_nation` VALUES ('068', 'คูเวต', '11');
INSERT INTO `c_nation` VALUES ('069', 'บรูไน', '09');
INSERT INTO `c_nation` VALUES ('070', 'แอฟริกาใต้', '11');
INSERT INTO `c_nation` VALUES ('071', 'กะเหรี่ยง', '11');
INSERT INTO `c_nation` VALUES ('072', 'ลาหู่', '11');
INSERT INTO `c_nation` VALUES ('073', 'เคนยา', '11');
INSERT INTO `c_nation` VALUES ('074', 'อียิปต์', '11');
INSERT INTO `c_nation` VALUES ('075', 'เอธิโอเปีย', '11');
INSERT INTO `c_nation` VALUES ('076', 'ไนจีเรีย', '11');
INSERT INTO `c_nation` VALUES ('077', 'สหรัฐอาหรับเอมิเรตส์', '11');
INSERT INTO `c_nation` VALUES ('078', 'กินี', '11');
INSERT INTO `c_nation` VALUES ('079', 'ออสเตรเลีย', '11');
INSERT INTO `c_nation` VALUES ('080', 'นิวซีแลนด์', '11');
INSERT INTO `c_nation` VALUES ('081', 'ปาปัวนิวกินี', '11');
INSERT INTO `c_nation` VALUES ('082', 'ม้ง', '11');
INSERT INTO `c_nation` VALUES ('083', 'เมี่ยน', '11');
INSERT INTO `c_nation` VALUES ('086', 'จีนฮ่อ', '11');
INSERT INTO `c_nation` VALUES ('087', 'จีน (อดีตทหารจีนคณะชาติ ,อดีตทหารจีนชาติ)', '11');
INSERT INTO `c_nation` VALUES ('088', 'ผู้พลัดถิ่นสัญชาติพม่า', '02');
INSERT INTO `c_nation` VALUES ('089', 'ผู้อพยพเชื้อสายจากกัมพูชา', '08');
INSERT INTO `c_nation` VALUES ('090', 'ลาว (ลาวอพยพ)', '07');
INSERT INTO `c_nation` VALUES ('091', 'เขมรอพยพ', '08');
INSERT INTO `c_nation` VALUES ('096', 'ไร้สัญชาติ', '11');
INSERT INTO `c_nation` VALUES ('097', 'อื่นๆ', '11');
INSERT INTO `c_nation` VALUES ('098', 'ไม่ได้สัญชาติไทย', '11');
INSERT INTO `c_nation` VALUES ('099', 'ไทย', '10');
INSERT INTO `c_nation` VALUES ('100', 'อัฟกัน', '11');
INSERT INTO `c_nation` VALUES ('101', 'บาห์เรน', '11');
INSERT INTO `c_nation` VALUES ('102', 'ภูฏาน', '11');
INSERT INTO `c_nation` VALUES ('103', 'จอร์แดน', '11');
INSERT INTO `c_nation` VALUES ('104', 'เกาหลีเหนือ', '11');
INSERT INTO `c_nation` VALUES ('105', 'มัลดีฟ', '11');
INSERT INTO `c_nation` VALUES ('106', 'มองโกเลีย', '11');
INSERT INTO `c_nation` VALUES ('107', 'โอมาน', '11');
INSERT INTO `c_nation` VALUES ('108', 'กาตาร์', '11');
INSERT INTO `c_nation` VALUES ('109', 'เยเมน', '11');
INSERT INTO `c_nation` VALUES ('111', 'หมู่เกาะฟิจิ', '11');
INSERT INTO `c_nation` VALUES ('112', 'คิริบาส', '11');
INSERT INTO `c_nation` VALUES ('113', 'นาอูรู', '11');
INSERT INTO `c_nation` VALUES ('114', 'หมู่เกาะโซโลมอน', '11');
INSERT INTO `c_nation` VALUES ('115', 'ตองก้า', '11');
INSERT INTO `c_nation` VALUES ('116', 'ตูวาลู', '11');
INSERT INTO `c_nation` VALUES ('117', 'วานูอาตู', '11');
INSERT INTO `c_nation` VALUES ('118', 'ซามัว', '11');
INSERT INTO `c_nation` VALUES ('119', 'แอลเบเนีย', '11');
INSERT INTO `c_nation` VALUES ('120', 'อันดอร์รา', '11');
INSERT INTO `c_nation` VALUES ('122', 'ไอซ์แลนด์', '11');
INSERT INTO `c_nation` VALUES ('123', 'ลิกเตนสไตน์', '11');
INSERT INTO `c_nation` VALUES ('124', 'โมนาโก', '11');
INSERT INTO `c_nation` VALUES ('125', 'ซานมารีโน', '11');
INSERT INTO `c_nation` VALUES ('126', 'บริติช  (อังกฤษ, สก็อตแลนด์)', '11');
INSERT INTO `c_nation` VALUES ('127', 'แอลจีเรีย', '11');
INSERT INTO `c_nation` VALUES ('128', 'แองโกลา', '11');
INSERT INTO `c_nation` VALUES ('129', 'เบนิน', '11');
INSERT INTO `c_nation` VALUES ('130', 'บอตสวานา', '11');
INSERT INTO `c_nation` VALUES ('131', 'บูร์กินาฟาโซ', '11');
INSERT INTO `c_nation` VALUES ('132', 'บุรุนดี', '11');
INSERT INTO `c_nation` VALUES ('133', 'แคเมอรูน', '11');
INSERT INTO `c_nation` VALUES ('134', 'เคปเวิร์ด', '11');
INSERT INTO `c_nation` VALUES ('135', 'แอฟริกากลาง', '11');
INSERT INTO `c_nation` VALUES ('136', 'ชาด', '11');
INSERT INTO `c_nation` VALUES ('137', 'คอสตาริกา', '11');
INSERT INTO `c_nation` VALUES ('138', 'คองโก', '11');
INSERT INTO `c_nation` VALUES ('139', 'ไอโวเรี่ยน', '11');
INSERT INTO `c_nation` VALUES ('140', 'จิบูตี', '11');
INSERT INTO `c_nation` VALUES ('141', 'อิเควทอเรียลกินี', '11');
INSERT INTO `c_nation` VALUES ('142', 'กาบอง', '11');
INSERT INTO `c_nation` VALUES ('143', 'แกมเบีย', '11');
INSERT INTO `c_nation` VALUES ('144', 'กานา', '11');
INSERT INTO `c_nation` VALUES ('145', 'กินีบีสเซา', '11');
INSERT INTO `c_nation` VALUES ('146', 'เลโซโท', '11');
INSERT INTO `c_nation` VALUES ('147', 'ไลบีเรีย', '11');
INSERT INTO `c_nation` VALUES ('148', 'ลิเบีย', '11');
INSERT INTO `c_nation` VALUES ('149', 'มาลากาซี', '11');
INSERT INTO `c_nation` VALUES ('150', 'มาลาวี', '11');
INSERT INTO `c_nation` VALUES ('151', 'มาลี', '11');
INSERT INTO `c_nation` VALUES ('152', 'มอริเตเนีย', '11');
INSERT INTO `c_nation` VALUES ('153', 'มอริเชียส', '11');
INSERT INTO `c_nation` VALUES ('154', 'โมร็อกโก', '11');
INSERT INTO `c_nation` VALUES ('155', 'โมซัมบิก', '11');
INSERT INTO `c_nation` VALUES ('156', 'ไนเจอร์', '11');
INSERT INTO `c_nation` VALUES ('157', 'รวันดา', '11');
INSERT INTO `c_nation` VALUES ('158', 'เซาโตเมและปรินซิเป', '11');
INSERT INTO `c_nation` VALUES ('159', 'เซเนกัล', '11');
INSERT INTO `c_nation` VALUES ('160', 'เซเชลส์', '11');
INSERT INTO `c_nation` VALUES ('161', 'เซียร์ราลีโอน', '11');
INSERT INTO `c_nation` VALUES ('162', 'โซมาลี', '11');
INSERT INTO `c_nation` VALUES ('163', 'ซูดาน', '11');
INSERT INTO `c_nation` VALUES ('164', 'สวาซี', '11');
INSERT INTO `c_nation` VALUES ('165', 'แทนซาเนีย', '11');
INSERT INTO `c_nation` VALUES ('166', 'โตโก', '11');
INSERT INTO `c_nation` VALUES ('167', 'ตูนิเซีย', '11');
INSERT INTO `c_nation` VALUES ('168', 'ยูกันดา', '11');
INSERT INTO `c_nation` VALUES ('169', 'ซาอีร์', '11');
INSERT INTO `c_nation` VALUES ('170', 'แซมเบีย', '11');
INSERT INTO `c_nation` VALUES ('171', 'ซิมบับเว', '11');
INSERT INTO `c_nation` VALUES ('172', 'แอนติกาและบาร์บูดา', '11');
INSERT INTO `c_nation` VALUES ('173', 'บาฮามาส', '11');
INSERT INTO `c_nation` VALUES ('174', 'บาร์เบโดส', '11');
INSERT INTO `c_nation` VALUES ('175', 'เบลิซ', '11');
INSERT INTO `c_nation` VALUES ('176', 'คอสตาริกา', '11');
INSERT INTO `c_nation` VALUES ('177', 'โดมินิกา', '11');
INSERT INTO `c_nation` VALUES ('178', 'โดมินิกัน', '11');
INSERT INTO `c_nation` VALUES ('179', 'เอลซัลวาดอร์', '11');
INSERT INTO `c_nation` VALUES ('180', 'เกรเนดา', '11');
INSERT INTO `c_nation` VALUES ('181', 'กัวเตมาลา', '11');
INSERT INTO `c_nation` VALUES ('182', 'เฮติ', '11');
INSERT INTO `c_nation` VALUES ('183', 'ฮอนดูรัส', '11');
INSERT INTO `c_nation` VALUES ('184', 'จาเมกา', '11');
INSERT INTO `c_nation` VALUES ('185', 'นิการากัว', '11');
INSERT INTO `c_nation` VALUES ('186', 'เซนต์คิตส์และเนวิส', '11');
INSERT INTO `c_nation` VALUES ('187', 'เซนต์ลูเซีย', '11');
INSERT INTO `c_nation` VALUES ('188', 'เซนต์วินเซนต์และเกรนาดีนส์', '11');
INSERT INTO `c_nation` VALUES ('189', 'ตรินิแดดและโตเบโก', '11');
INSERT INTO `c_nation` VALUES ('190', 'โบลีเวีย', '11');
INSERT INTO `c_nation` VALUES ('191', 'เอกวาดอร์', '11');
INSERT INTO `c_nation` VALUES ('192', 'กายอานา', '11');
INSERT INTO `c_nation` VALUES ('193', 'ปารากวัย', '11');
INSERT INTO `c_nation` VALUES ('194', 'ซูรินาเม', '11');
INSERT INTO `c_nation` VALUES ('195', 'อาหรับ', '11');
INSERT INTO `c_nation` VALUES ('196', 'คะฉิ่น', '11');
INSERT INTO `c_nation` VALUES ('197', 'ว้า', '11');
INSERT INTO `c_nation` VALUES ('198', 'ไทยใหญ่', '11');
INSERT INTO `c_nation` VALUES ('199', 'ไทยลื้อ', '02');
INSERT INTO `c_nation` VALUES ('200', 'ขมุ', '11');
INSERT INTO `c_nation` VALUES ('201', 'ตองสู', '11');
INSERT INTO `c_nation` VALUES ('203', 'ละว้า', '11');
INSERT INTO `c_nation` VALUES ('205', 'ปะหร่อง', '11');
INSERT INTO `c_nation` VALUES ('206', 'ถิ่น', '11');
INSERT INTO `c_nation` VALUES ('207', 'ปะโอ', '11');
INSERT INTO `c_nation` VALUES ('208', 'มอญ', '02');
INSERT INTO `c_nation` VALUES ('209', 'มลาบรี', '11');
INSERT INTO `c_nation` VALUES ('212', 'จีน (จีนฮ่ออิสระ)', '11');
INSERT INTO `c_nation` VALUES ('214', 'จีน (จีนฮ่ออพยพ)', '11');
INSERT INTO `c_nation` VALUES ('216', 'ยูเครน', '11');
INSERT INTO `c_nation` VALUES ('219', 'จีน(ฮ่องกง)', '11');
INSERT INTO `c_nation` VALUES ('220', 'จีน(ไต้หวัน)', '11');
INSERT INTO `c_nation` VALUES ('221', 'โครเอเชีย', '11');
INSERT INTO `c_nation` VALUES ('223', 'คาซัค', '11');
INSERT INTO `c_nation` VALUES ('224', 'อาร์เมเนีย', '11');
INSERT INTO `c_nation` VALUES ('225', 'อาเซอร์ไบจาน', '11');
INSERT INTO `c_nation` VALUES ('226', 'จอร์เจีย', '11');
INSERT INTO `c_nation` VALUES ('227', 'คีร์กีซ', '11');
INSERT INTO `c_nation` VALUES ('228', 'ทาจิก', '11');
INSERT INTO `c_nation` VALUES ('229', 'อุซเบก', '11');
INSERT INTO `c_nation` VALUES ('230', 'หมู่เกาะมาร์แชลล์', '11');
INSERT INTO `c_nation` VALUES ('231', 'ไมโครนีเซีย', '11');
INSERT INTO `c_nation` VALUES ('232', 'ปาเลา', '11');
INSERT INTO `c_nation` VALUES ('233', 'เบลารุส', '11');
INSERT INTO `c_nation` VALUES ('234', 'บอสเนียและเฮอร์เซโกวีนา', '11');
INSERT INTO `c_nation` VALUES ('235', 'เติร์กเมน', '11');
INSERT INTO `c_nation` VALUES ('236', 'เอสโตเนีย', '11');
INSERT INTO `c_nation` VALUES ('237', 'ลัตเวีย', '11');
INSERT INTO `c_nation` VALUES ('238', 'ลิทัวเนีย', '11');
INSERT INTO `c_nation` VALUES ('239', 'มาซิโดเนีย', '11');
INSERT INTO `c_nation` VALUES ('240', 'มอลโดวา', '11');
INSERT INTO `c_nation` VALUES ('241', 'สโลวัก', '11');
INSERT INTO `c_nation` VALUES ('242', 'สโลวีน', '11');
INSERT INTO `c_nation` VALUES ('243', 'เอริเทรีย', '11');
INSERT INTO `c_nation` VALUES ('244', 'นามิเบีย', '11');
INSERT INTO `c_nation` VALUES ('245', 'โบลิเวีย', '11');
INSERT INTO `c_nation` VALUES ('246', 'หมู่เกาะคุก', '11');
INSERT INTO `c_nation` VALUES ('247', 'เนปาล (เนปาลอพยพ)', '11');
INSERT INTO `c_nation` VALUES ('248', 'มอญ  (ผู้พลัดถิ่นสัญชาติพม่า)', '02');
INSERT INTO `c_nation` VALUES ('249', 'ไทยใหญ่  (ผู้พลัดถิ่นสัญชาติพม่า)', '02');
INSERT INTO `c_nation` VALUES ('250', 'เวียดนาม  (ญวนอพยพ)', '01');
INSERT INTO `c_nation` VALUES ('251', 'มาเลเชีย  (อดีต จีนคอมมิวนิสต์)', '04');
INSERT INTO `c_nation` VALUES ('252', 'จีน  (อดีต จีนคอมมิวนิสต์)', '11');
INSERT INTO `c_nation` VALUES ('253', 'สิงคโปร์  (อดีต จีนคอมมิวนิสต์)', '06');
INSERT INTO `c_nation` VALUES ('254', 'กะเหรี่ยง  (ผู้หลบหนีเข้าเมือง)', '11');
INSERT INTO `c_nation` VALUES ('255', 'มอญ  (ผู้หลบหนีเข้าเมือง)', '02');
INSERT INTO `c_nation` VALUES ('256', 'ไทยใหญ่  (ผู้หลบหนีเข้าเมือง)', '02');
INSERT INTO `c_nation` VALUES ('257', 'กัมพูชา  (ผู้หลบหนีเข้าเมือง)', '08');
INSERT INTO `c_nation` VALUES ('258', 'มอญ  (ชุมชนบนพื้นที่สูง)', '02');
INSERT INTO `c_nation` VALUES ('259', 'กะเหรี่ยง  (ชุมชนบนพื้นที่สูง)', '11');
INSERT INTO `c_nation` VALUES ('260', 'ปาเลสไตน์', '11');
INSERT INTO `c_nation` VALUES ('261', 'ติมอร์ตะวันออก', '11');
INSERT INTO `c_nation` VALUES ('262', 'สละสัญชาติไทย', '11');
INSERT INTO `c_nation` VALUES ('263', 'เซอร์เบีย แอนด์ มอนเตเนโกร', '11');
INSERT INTO `c_nation` VALUES ('264', 'กัมพูชา(แรงงาน)', '08');
INSERT INTO `c_nation` VALUES ('265', 'พม่า(แรงงาน)', '02');
INSERT INTO `c_nation` VALUES ('266', 'ลาว(แรงงาน)', '07');
INSERT INTO `c_nation` VALUES ('267', 'เซอร์เบียน', '11');
INSERT INTO `c_nation` VALUES ('268', 'มอนเตเนกริน', '11');
INSERT INTO `c_nation` VALUES ('989', 'บุคคลที่ไม่มีสถานะทางทะเบียน', '12');
INSERT INTO `c_nation` VALUES ('999', 'ไม่ระบุ', '99');

-- ----------------------------
-- Table structure for c_ppspecial
-- ----------------------------
DROP TABLE IF EXISTS `c_ppspecial`;
CREATE TABLE `c_ppspecial` (
  `itmcode` varchar(6) NOT NULL,
  `itmname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`itmcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_ppspecial
-- ----------------------------
INSERT INTO `c_ppspecial` VALUES ('1B0030', 'ตรวจคัดกรองได้ผลปกติ ผู้รับบริการเคยตรวจด้วยตนเองได้ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0031', 'ตรวจคัดกรองได้ผลปกติ ผู้รับบริการเคยตรวจด้วยตนเองได้ผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0032', 'ตรวจคัดกรองได้ผลปกติ ผู้รับบริการไม่เคยตรวจด้วยตนเอง');
INSERT INTO `c_ppspecial` VALUES ('1B0033', 'ตรวจคัดกรองได้ผลปกติ ไม่ระบุว่าผู้รับบริการเคยตรวจด้วยตนเองหรือไม่');
INSERT INTO `c_ppspecial` VALUES ('1B0034', 'ตรวจคัดกรองได้ผลผิดปกติ ผู้รับบริการเคยตรวจด้วยตนเองได้ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0035', 'ตรวจคัดกรองได้ผลผิดปกติ ผู้รับบริการเคยตรวจด้วยตนเองได้ผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0036', 'ตรวจคัดกรองได้ผลผิดปกติ ผู้รับบริการไม่เคยตรวจด้วยตนเอง');
INSERT INTO `c_ppspecial` VALUES ('1B0037', 'ตรวจคัดกรองได้ผลผิดปกติ ไม่ระบุว่าผู้รับบริการเคยตรวจด้วยตนเองหรือไม่');
INSERT INTO `c_ppspecial` VALUES ('1B0039', 'ตรวจคัดกรองมะเร็งเต้านม ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B0040', 'ตรวจคัดกรอง VIA ได้ผลลบ');
INSERT INTO `c_ppspecial` VALUES ('1B0041', 'ตรวจคัดกรอง VIA ได้ผลบวก ไม่ให้การรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B0042', 'ตรวจคัดกรอง VIA ได้ผลบวก และให้การรักษา ');
INSERT INTO `c_ppspecial` VALUES ('1B0043', 'ตรวจคัดกรอง VIA ไม่ระบุผลการตรวจ');
INSERT INTO `c_ppspecial` VALUES ('1B0044', 'ตรวจคัดกรอง Pap (ยังไม่ทราบผล)');
INSERT INTO `c_ppspecial` VALUES ('1B0045', 'การคัดกรองมะเร็งปากมดลูก ด้วยวิธี VIA ผลตรวจเป็นมะเร็งปากมดลูก');
INSERT INTO `c_ppspecial` VALUES ('1B0048', 'ตรวจคัดกรอง วิธีอื่น (ระบุวิธี)');
INSERT INTO `c_ppspecial` VALUES ('1B0049', 'ตรวจคัดกรอง ไม่ระบุวิธี');
INSERT INTO `c_ppspecial` VALUES ('1B0260', 'การประเมินภาวะซึมเศร้าด้วยแบบประเมิน 9Q พบว่าผลปกติ ');
INSERT INTO `c_ppspecial` VALUES ('1B0261', 'การประเมินภาวะซึมเศร้าด้วยแบบประเมิน 9Q พบว่าซึมเศร้าน้อย (คะแนน 7-12)');
INSERT INTO `c_ppspecial` VALUES ('1B0262', 'การประเมินภาวะซึมเศร้าด้วยแบบประเมิน 9Q พบว่าซึมเศร้าปานกลาง (คะแนน 13-18)');
INSERT INTO `c_ppspecial` VALUES ('1B0263', 'การประเมินภาวะซึมเศร้าด้วยแบบประเมิน 9Q พบว่าซึมเศร้ารุนแรง (คะแนน?19)');
INSERT INTO `c_ppspecial` VALUES ('1B0269', 'การประเมินภาวะซึมเศร้าด้วยแบบประเมิน 9Q ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B0270', 'การประเมินการฆ่าตัวตายด้วยแบบประเมิน 8Q พบว่าไม่มีแนวโน้มการฆ่าตัวตาย ');
INSERT INTO `c_ppspecial` VALUES ('1B0271', 'การประเมินการฆ่าตัวตายด้วยแบบประเมิน 8Q พบว่ามีแนวโน้มที่จะฆ่าตัวตายระดับน้อย (คะแนน 1-8) ');
INSERT INTO `c_ppspecial` VALUES ('1B0272', 'การประเมินการฆ่าตัวตายด้วยแบบประเมิน 8Q พบว่ามีแนวโน้มที่จะฆ่าตัวตายระดับปานกลาง (คะแนน 9-16)');
INSERT INTO `c_ppspecial` VALUES ('1B0273', 'การประเมินการฆ่าตัวตายด้วยแบบประเมิน 8Q พบว่ามีแนวโน้มที่จะฆ่าตัวตายระดับรุนแรง (คะแนน ?17)');
INSERT INTO `c_ppspecial` VALUES ('1B0279', 'การประเมินการฆ่าตัวตายด้วยแบบประเมิน 8Q ไม่ระบุรายละเอียด ');
INSERT INTO `c_ppspecial` VALUES ('1B0280', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0281', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0282', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 9Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0283', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 9Q พบว่าซึมเศร้าน้อย (คะแนน 7-12)');
INSERT INTO `c_ppspecial` VALUES ('1B0284', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 9Q พบว่าซึมเศร้าปานกลาง (คะแนน 13-18)');
INSERT INTO `c_ppspecial` VALUES ('1B0285', 'การตรวจคัดกรองโรคซึมเศร้าในผู้สูงอายุด้วยแบบคัดกรอง 9Q พบว่าซึมเศร้ารุนแรง (คะแนน ?19)');
INSERT INTO `c_ppspecial` VALUES ('1B0286', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้สูงอายุ พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0287', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้สูงอายุ พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B0289', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในผู้สูงอายุ ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1130', 'การตรวจคัดกรองสมรรถภาพทางการเห็น ผลเหมาะสมกับลักษณะงาน');
INSERT INTO `c_ppspecial` VALUES ('1B1131', 'การตรวจคัดกรองสมรรถภาพทางการเห็น ผลไม่เหมาะสมกับลักษณะงาน');
INSERT INTO `c_ppspecial` VALUES ('1B1139', 'การตรวจคัดกรองสมรรถภาพทางการเห็น ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1140', 'การตรวจคัดกรองสมรรถภาพทางการได้ยิน ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1141', 'การตรวจคัดกรองสมรรถภาพทางการได้ยิน ผลต้องเฝ้าระวัง');
INSERT INTO `c_ppspecial` VALUES ('1B1142', 'การตรวจคัดกรองสมรรถภาพทางการได้ยิน ผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1143', 'การตรวจคัดกรองสมรรถภาพทางการได้ยิน ผลผิดปกติจากเสียง');
INSERT INTO `c_ppspecial` VALUES ('1B1149', 'การตรวจคัดกรองสมรรถภาพทางการได้ยิน ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1150', 'การตรวจคัดกรองสมรรถภาพทางปอด ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1151', 'การตรวจคัดกรองสมรรถภาพทางปอด ผลต่ำกว่าเกณฑ์มาตรฐานแบบหลอดลมอุดกั้น');
INSERT INTO `c_ppspecial` VALUES ('1B1152', 'การตรวจคัดกรองสมรรถภาพทางปอด ผลต่ำกว่าเกณฑ์มาตรฐานแบบจำกัดการขยายตัว');
INSERT INTO `c_ppspecial` VALUES ('1B1153', 'การตรวจคัดกรองสมรรถภาพทางปอด ผลต่ำกว่าเกณฑ์มาตรฐานแบบผสม');
INSERT INTO `c_ppspecial` VALUES ('1B1159', 'การตรวจคัดกรองสมรรถภาพทางปอด ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1160', 'การตรวจเอ็กซเรย์ปอดฟิล์มใหญ่ในวัยทำงาน ผลปกติระดับ 0/0');
INSERT INTO `c_ppspecial` VALUES ('1B1161', 'การตรวจเอ็กซเรย์ปอดฟิล์มใหญ่ในวัยทำงาน ผลผิดปกติตั้งแต่ระดับ 0/1 ? 1/0 ');
INSERT INTO `c_ppspecial` VALUES ('1B1162', 'การตรวจเอ็กซเรย์ปอดฟิล์มใหญ่ในวัยทำงาน ผลผิดปกติตั้งแต่ระดับ 1/1 ขึ้นไป ');
INSERT INTO `c_ppspecial` VALUES ('1B1169', 'การตรวจเอ็กซเรย์ปอดฟิล์มใหญ่ในวัยทำงาน ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1170', 'การตรวจคัดกรองเพื่อหาความเสี่ยงจากสารกำจัดศัตรูพืช ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1171', 'การตรวจคัดกรองเพื่อหาความเสี่ยงจากสารกำจัดศัตรูพืช ผลปลอดภัย');
INSERT INTO `c_ppspecial` VALUES ('1B1172', 'การตรวจคัดกรองเพื่อหาความเสี่ยงจากสารกำจัดศัตรูพืช ผลมีความเสี่ยง');
INSERT INTO `c_ppspecial` VALUES ('1B1173', 'การตรวจคัดกรองเพื่อหาความเสี่ยงจากสารกำจัดศัตรูพืช ผลไม่ปลอดภัย');
INSERT INTO `c_ppspecial` VALUES ('1B1179', 'การตรวจคัดกรองเพื่อหาความเสี่ยงจากสารกำจัดศัตรูพืช ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B118', 'การตรวจคัดกรองความเสี่ยง / เฝ้าระวัง ในประชากรวัยแรงงาน อื่น ๆ  ');
INSERT INTO `c_ppspecial` VALUES ('1B119', 'การตรวจคัดกรองความเสี่ยง / เฝ้าระวัง ในประชากรวัยแรงงาน ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1200', 'การตรวจคัดกรองผู้สูงอายุที่มีภาวะหกล้ม พบว่าไม่มีความเสี่ยง');
INSERT INTO `c_ppspecial` VALUES ('1B1201', 'การตรวจคัดกรองผู้สูงอายุที่มีภาวะหกล้ม พบว่ามีความเสี่ยง ให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1202', 'การตรวจคัดกรองผู้สูงอายุที่มีภาวะหกล้ม พบว่ามีความเสี่ยงส่งรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1209', 'การตรวจคัดกรองผู้สูงอายุที่เสี่ยงภาวะหกล้มไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1220', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบAMT ในผู้สูงอายุพบว่าปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1221', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ AMT ในผู้สูงอายุพบว่าผิดปกติ ให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1223', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ AMT ในผู้สูงอายุพบว่าผิดปกติและส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1224', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ MMSE-T 2002 ในผู้สูงอายุพบว่าปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1225', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ MMSE-T 2002 ในผู้สูงอายุพบว่าผิดปกติ ให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1226', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ MMSE-T 2002 ในผู้สูงอายุพบว่าผิดปกติและส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1229', 'การตรวจคัดกรองสมรรถภาพสมอง (ภาวะสมองเสื่อม) โดยแบบ AMT/ MMSE-T 2002 ในผู้สูงอายุ ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1230', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุ พบว่าไม่มีความเสี่ยง');
INSERT INTO `c_ppspecial` VALUES ('1B1231', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุ พบว่ามีความเสี่ยง');
INSERT INTO `c_ppspecial` VALUES ('1B1232', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุ พบว่ามีความเสี่ยงสูง');
INSERT INTO `c_ppspecial` VALUES ('1B1234', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุ พบว่ามีความเสี่ยงสูงมาก ให้คำแนะนำ / รักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1235', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุพบว่ามีความเสี่ยงสูงมาก รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1239', 'การตรวจคัดกรองความเสี่ยงโรคหัวใจและหลอดเลือดสมองในผู้สูงอายุ  ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1240', 'การตรวจคัดกรองสายตาระยะใกล้ในผู้สูงอายุพบว่าไม่มีปัญหา');
INSERT INTO `c_ppspecial` VALUES ('1B1241', 'การตรวจคัดกรองสายตาระยะใกล้ในผู้สูงอายุพบว่ามีปัญหาให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1242', 'การตรวจคัดกรองสายตาระยะใกล้ในผู้สูงอายุพบว่ามีปัญหาส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1243', 'การตรวจคัดกรองสายตาระยะไกลในผู้สูงอายุพบว่าไม่มีปัญหา');
INSERT INTO `c_ppspecial` VALUES ('1B1244', 'การตรวจคัดกรองสายตาระยะไกลในผู้สูงอายุพบว่ามีปัญหาให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1245', 'การตรวจคัดกรองสายตาระยะไกลในผู้สูงอายุพบว่ามีปัญหาส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1249', 'การตรวจคัดกรองสายตาระยะใกล้/ระยะไกลในผู้สูงอายุไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1250', 'การตรวจคัดกรองความเสี่ยงต้อกระจกในผู้สูงอายุพบว่าไม่มีปัญหา');
INSERT INTO `c_ppspecial` VALUES ('1B1251', 'การตรวจคัดกรองความเสี่ยงต้อกระจกในผู้สูงอายุพบว่ามีปัญหาให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1252', 'การตรวจคัดกรองความเสี่ยงต้อกระจกในผู้สูงอายุพบว่ามีปัญหาส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1253', 'การตรวจคัดกรองความเสี่ยงต้อหินในผู้สูงอายุพบว่าไม่มีปัญหา');
INSERT INTO `c_ppspecial` VALUES ('1B1254', 'การตรวจคัดกรองความเสี่ยงต้อหินในผู้สูงอายุพบว่ามีปัญหาให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1255', 'การตรวจคัดกรองความเสี่ยงต้อหินในผู้สูงอายุพบว่ามีปัญหาส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1256', 'การตรวจคัดกรองความเสี่ยงโรคจอประสาทตาเสื่อมจากอายุในผู้สูงอายุพบว่าไม่มีปัญหา');
INSERT INTO `c_ppspecial` VALUES ('1B1257', 'การตรวจคัดกรองความเสี่ยงโรคจอประสาทตาเสื่อมจากอายุในผู้สูงอายุพบว่ามีปัญหาให้คำแนะนำ และรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1258', 'การตรวจคัดกรองความเสี่ยงโรคจอประสาทตาเสื่อมจากอายุในผู้สูงอายุพบว่ามีปัญหา ส่งไปรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1259', 'การตรวจคัดกรองความเสี่ยงต้อกระจก  / ต้อหิน / จอประสาทตาเสื่อมจากอายุ ในผู้สูงอายุ ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1260', 'การตรวจคัดกรองพฤติกรรมเสี่ยงต่อสุขภาพช่องปากในผู้สูงอายุพบว่าพฤติกรรมเหมาะสม');
INSERT INTO `c_ppspecial` VALUES ('1B1261', 'การตรวจคัดกรองพฤติกรรมเสี่ยงต่อสุขภาพช่องปากในผู้สูงอายุพบว่าพฤติกรรมไม่เหมาะสม และแนะนำให้ความรู้');
INSERT INTO `c_ppspecial` VALUES ('1B1269', 'การตรวจคัดกรองพฤติกรรมเสี่ยงต่อสุขภาพช่องปากในผู้สูงอายุไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1270', 'การตรวจคัดกรองข้อเข่าเสื่อมทางคลินิกในผู้สูงอายุพบว่าปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B1271', 'การตรวจคัดกรองข้อเข่าเสื่อมทางคลินิกในผู้สูงอายุพบว่าผิดปกติ ให้คำแนะนำและรักษา');
INSERT INTO `c_ppspecial` VALUES ('1B1272', 'การตรวจคัดกรองข้อเข่าเสื่อมทางคลินิกในผู้สูงอายุพบว่าผิดปกติและส่งรักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B1273', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับการดูแลระยะยาวพบว่าไม่ต้องดูแลระยะยาว');
INSERT INTO `c_ppspecial` VALUES ('1B1274', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับการดูแลระยะยาวพบว่าต้องเฝ้าระวัง ให้คำแนะนำและติดตาม');
INSERT INTO `c_ppspecial` VALUES ('1B1275', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับการดูแลระยะยาวพบว่าต้องดูแลระยะยาว ให้คำแนะนำและดูแลต่อเนื่อง');
INSERT INTO `c_ppspecial` VALUES ('1B1279', 'การตรวจคัดกรองข้อเข่าเสื่อมทางคลินิก ในผู้สูงอายุ / สมรรถนะผู้สูงอายุเกี่ยวกับการดูแลระยะยาว ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B1280', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับความสามารถในการทำกิจวัตรประจำวันพบว่าช่วยเหลือตัวเองได้ /ติดสังคม (ADL 12-20 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B1281', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับความสามารถในการทำกิจวัตรประจำวันพบว่าช่วยเหลือตัวเองได้บ้าง / บางส่วน /ติดบ้าน (ADL 5-11 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B1282', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับความสามารถในการทำกิจวัตรประจำวัน พบว่าช่วยเหลือตัวเองได้น้อย / ไม่ได้เลย /ภาวะติดเตียง (ADL 0-4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B1289', 'การตรวจคัดกรองสมรรถนะผู้สูงอายุเกี่ยวกับความสามารถในการทำกิจวัตรประจำวันไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B129', 'การตรวจคัดกรองความเสี่ยง/เฝ้าระวังในผู้สูงอายุ ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B130', 'การตรวจคัดกรองโรคซึมเศร้าในผู้ป่วยโรคเรื้อรังด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B131', 'การตรวจคัดกรองโรคซึมเศร้าในผู้ป่วยโรคเรื้อรังด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B132', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้ป่วยโรคเรื้อรังพบว่าผลปกติ (0 ? 4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B133', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้ป่วยโรคเรื้อรังพบว่ามีปัญหาความเครียด (5 ? 7 คะแนน) ');
INSERT INTO `c_ppspecial` VALUES ('1B134', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้ป่วยโรคเรื้อรังพบว่ามีความเครียดสูง (8 คะแนนขึ้นไป)');
INSERT INTO `c_ppspecial` VALUES ('1B139', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในผู้ป่วยโรคเรื้อรังไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B140', 'การตรวจคัดกรองโรคซึมเศร้าในหญิงตั้งครรภ์/หลังคลอดด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B141', 'การตรวจคัดกรองโรคซึมเศร้าในหญิงตั้งครรภ์/หลังคลอดด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B142', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในหญิงตั้งครรภ์/หลังคลอดพบว่าผลปกติ (0 ? 4 คะแนน) ');
INSERT INTO `c_ppspecial` VALUES ('1B143', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในหญิงตั้งครรภ์/หลังคลอดพบว่ามีปัญหาความเครียด  (5 ? 7 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B144', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในหญิงตั้งครรภ์/หลังคลอดพบว่ามีความเครียดสูง (8 คะแนนขึ้นไป) ');
INSERT INTO `c_ppspecial` VALUES ('1B149', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในหญิงตั้งครรภ์/หลังคลอด ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B150', 'การตรวจคัดกรองโรคซึมเศร้าในผู้มีปัญหาสุรา/สารเสพติดด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B151', 'การตรวจคัดกรองโรคซึมเศร้าในผู้มีปัญหาสุรา/สารเสพติดด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B152', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้มีปัญหาสุรา/สารเสพติดพบว่าผลปกติ (0 ? 4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B153', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้มีปัญหาสุรา/สารเสพติดพบว่ามีปัญหาความเครียด (5 ? 7 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B154', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้มีปัญหาสุรา/สารเสพติดพบว่ามีความเครียดสูง (8 คะแนนขึ้นไป)');
INSERT INTO `c_ppspecial` VALUES ('1B159', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในผู้มีปัญหาสุรา/สารเสพติดไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B160', 'การตรวจคัดกรองโรคซึมเศร้าในกลุ่มที่มีอาการซึมเศร้าชัดเจนด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B161', 'การตรวจคัดกรองโรคซึมเศร้าในกลุ่มที่มีอาการซึมเศร้าชัดเจนด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B162', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีอาการซึมเศร้าชัดเจนพบว่าผลปกติ (0 ? 4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B163', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีอาการซึมเศร้าชัดเจนพบว่ามีปัญหาความเครียด (5 ? 7 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B164', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีอาการซึมเศร้าชัดเจนพบว่ามีความเครียดสูง (8 คะแนนขึ้นไป)');
INSERT INTO `c_ppspecial` VALUES ('1B169', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในกลุ่มที่มีอาการซึมเศร้า ชัดเจน ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B170', 'การตรวจคัดกรองโรคซึมเศร้าในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้ด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B171', 'การตรวจคัดกรองโรคซึมเศร้าในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้ด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B172', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีอาการซึมเศร้ในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้ พบว่าผลปกติ (0 ? 4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B173', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้ พบว่ามีปัญหาความเครียด (5 ? 7 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B174 ', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้ พบว่ามีความเครียดสูง (8 คะแนนขึ้นไป)');
INSERT INTO `c_ppspecial` VALUES ('1B179', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในผู้ที่มีอาการทางกายเรื้อรังหลายอาการที่หาสาเหตุไม่ได้  ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B180', 'การตรวจคัดกรองโรคซึมเศร้าในกลุ่มที่มีการสูญเสีย  ด้วยแบบคัดกรอง 2Q พบว่าผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B181', 'การตรวจคัดกรองโรคซึมเศร้าในกลุ่มที่มีการสูญเสีย ด้วยแบบคัดกรอง 2Q พบว่าผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B182', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีการสูญเสีย พบว่าผลปกติ (0 ? 4 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B183', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีการสูญเสีย พบว่าปัญหาความเครียด (5 ? 7 คะแนน)');
INSERT INTO `c_ppspecial` VALUES ('1B184', 'การประเมินความเครียดด้วยแบบคัดกรอง ST5 ในกลุ่มที่มีการสูญเสีย พบว่ามีความเครียดสูง (8 คะแนนขึ้นไป)');
INSERT INTO `c_ppspecial` VALUES ('1B189', 'การตรวจคัดกรองโรคซึมเศร้า/ประเมินความเครียดในกลุ่มที่มีการสูญเสีย  ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B200', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B201', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B202', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B203', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPMผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B204', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B205', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B206', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DAIM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B207', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเคลื่อนไหวโดยเครื่องมือ DAIM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B210', 'การตรวจคัดกรองพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B211', 'การตรวจคัดกรองพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B212', 'การตรวจคัดกรองพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B213', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B214', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B215', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B216', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DAIM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B217', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DAIM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B219', 'การตรวจคัดกรอง/แบบเฝ้าระวังพัฒนาการสมวัยด้านกล้ามเนื้อมัดเล็กและสติปัญญาโดยเครื่องมือ DSPM และหรือ DAIM ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B220', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B221', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B222', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B223', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B224', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B225', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B226', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DAIM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B227', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DAIM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B229', 'การตรวจคัดกรอง/แบบเฝ้าระวังพัฒนาการสมวัยด้านการเข้าใจภาษาโดยเครื่องมือ DSPM และหรือ DAIM ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B230', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B231', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B232', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B233', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B234', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B235', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B236', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DAIM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B237', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DAIM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B239', 'การตรวจคัดกรอง/แบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาษาโดยเครื่องมือ DSPM และหรือ DAIM ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B240', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B241', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B242', 'การตรวจคัดกรองพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPM ผลล่าช้าส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B243', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B244', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B245', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการใช้ภาด้านการช่วยเหลือตัวเองและสังคม โดยเครื่องมือ DSPM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B246', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DAIM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B247', 'การตรวจแบบเฝ้าระวังพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DAIM ผลล่าช้า ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B249', 'การตรวจคัดกรอง/แบบเฝ้าระวังพัฒนาการสมวัยด้านการช่วยเหลือตัวเองและสังคมโดยเครื่องมือ DSPMและหรือ DAIM ไม่ระบุรายละเอียด');
INSERT INTO `c_ppspecial` VALUES ('1B250', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุแรกเกิด โดยเครื่องมือ DAIM ข้อที่ 1-3 (ตรวจปฏิกิริยา ตรวจความตึงตัวของกล้ามเนื้อ และตรวจข้อเท้า) ผ่าน');
INSERT INTO `c_ppspecial` VALUES ('1B251', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุแรกเกิด โดยเครื่องมือ DAIMข้อที่ 1-3 (ตรวจปฏิกิริยา ตรวจความตึงตัวของกล้ามเนื้อ และตรวจข้อเท้า) ไม่ผ่าน ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B252', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 1 เดือน โดยเครื่องมือ DAIM ข้อที่ 4 (ตรวจการเหยียดแขนและขา) ผ่าน');
INSERT INTO `c_ppspecial` VALUES ('1B253', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 1 เดือน โดยเครื่องมือ DAIM ข้อที่ 4 (ตรวจการเหยียดแขนและขา) ไม่ผ่าน ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B254', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 3-4 เดือน โดยเครื่องมือ DAIM ข้อที่ 5 (ตรวจการกำมือ) ผ่าน');
INSERT INTO `c_ppspecial` VALUES ('1B255', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 3-4 เดือน โดยเครื่องมือ DAIM ข้อที่ 5 (ตรวจการกำมือ) ไม่ผ่าน ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B256', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 10-12 เดือน โดยเครื่องมือ DAIM ข้อที่ 6 (ตรวจการกางแขน) ผ่าน');
INSERT INTO `c_ppspecial` VALUES ('1B257', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 10-12 เดือน โดยเครื่องมือ DAIM ข้อที่ 6 (ตรวจการกางแขน) ไม่ผ่าน ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B258', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 55-60 เดือน โดยเครื่องมือ DAIM ข้อที่ 7 (เดินต่อส้นเท้า) ผ่าน');
INSERT INTO `c_ppspecial` VALUES ('1B259', 'การตรวจประเมินระบบประสาทและพัฒนาการอายุ 55-60 เดือน โดยเครื่องมือ DAIM ข้อที่ 7 (เดินต่อส้นเท้า) ไม่ผ่าน ส่งเพื่อประเมิน/รักษาต่อ');
INSERT INTO `c_ppspecial` VALUES ('1B260', 'ผลการตรวจคัดกรองพัฒนาการสมวัยโดยเครื่องมือ DSPM ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B261', 'ผลการตรวจคัดกรองพัฒนาการสมวัยโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งเสริมพัฒนาการใน 1 เดือน');
INSERT INTO `c_ppspecial` VALUES ('1B262', 'ผลการตรวจคัดกรองพัฒนาการสมวัยโดยเครื่องมือ DSPM สงสัยล่าช้า ส่งต่อทันที');
INSERT INTO `c_ppspecial` VALUES ('1B30', 'ผลการตรวจคัดกรองมะเร็งปากมดลูก ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B31', 'ผลการตรวจคัดกรองธาลาสซีเมีย ผลปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B40', 'ผลการตรวจคัดกรองมะเร็งปากมดลูก ผลผิดปกติ');
INSERT INTO `c_ppspecial` VALUES ('1B41', 'ผลการตรวจคัดกรองธาลาสซีเมีย ผลผิดปกติ');

-- ----------------------------
-- Table structure for c_prename
-- ----------------------------
DROP TABLE IF EXISTS `c_prename`;
CREATE TABLE `c_prename` (
  `id_prename` varchar(3) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `detail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_prename`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_prename
-- ----------------------------
INSERT INTO `c_prename` VALUES ('001', 'ด.ช.', 'เด็กชาย');
INSERT INTO `c_prename` VALUES ('002', 'ด.ญ.', 'เด็กหญิง');
INSERT INTO `c_prename` VALUES ('003', 'นาย', 'นาย');
INSERT INTO `c_prename` VALUES ('004', 'น.ส.', 'นางสาว');
INSERT INTO `c_prename` VALUES ('005', 'นาง', 'นาง');
INSERT INTO `c_prename` VALUES ('006', 'น.ช.ม.ล.', 'นักโทษชายหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('007', 'น.ช.', 'นักโทษชาย');
INSERT INTO `c_prename` VALUES ('008', 'น.ญ.', 'นักโทษหญิง');
INSERT INTO `c_prename` VALUES ('009', 'น.ช.จ.ส.อ.', 'นักโทษชายจ่าสิบเอก');
INSERT INTO `c_prename` VALUES ('010', 'น.ช.จ.อ.', 'นักโทษชายจ่าเอก');
INSERT INTO `c_prename` VALUES ('011', 'น.ช.พลฯ.', 'นักโทษชายพลทหาร');
INSERT INTO `c_prename` VALUES ('012', 'น.ช.ร.ต.', 'นักโทษชายร้อยตรี');
INSERT INTO `c_prename` VALUES ('099', 'พระเจ้าหลานเธอ พระองค์เจ้า', 'พระเจ้าหลานเธอ พระองค์เจ้า');
INSERT INTO `c_prename` VALUES ('100', 'พระบาทสมเด็จพระเจ้าอยู่หัว', 'พระบาทสมเด็จพระเจ้าอยู่หัว');
INSERT INTO `c_prename` VALUES ('101', 'สมเด็จพระนางเจ้า', 'สมเด็จพระนางเจ้า');
INSERT INTO `c_prename` VALUES ('102', 'สมเด็จพระศรีนครินทราบรมราชชนนี', 'สมเด็จพระศรีนครินทราบรมราชชนนี');
INSERT INTO `c_prename` VALUES ('103', 'พลโทสมเด็จพระบรมโอรสาธิราช', 'พลโทสมเด็จพระบรมโอรสาธิราช');
INSERT INTO `c_prename` VALUES ('104', 'พลตรีสมเด็จพระเทพรัตนราชสุดา', 'พลตรีสมเด็จพระเทพรัตนราชสุดา');
INSERT INTO `c_prename` VALUES ('105', 'พระเจ้าวรวงศ์เธอพระองค์หญิง', 'พระเจ้าวรวงศ์เธอพระองค์หญิง');
INSERT INTO `c_prename` VALUES ('106', 'พระเจ้าวรวงศ์เธอ พระองค์เจ้า', 'พระเจ้าวรวงศ์เธอ พระองค์เจ้า');
INSERT INTO `c_prename` VALUES ('107', 'สมเด็จพระราชชนนี', 'สมเด็จพระราชชนนี');
INSERT INTO `c_prename` VALUES ('108', 'สมเด็จพระเจ้าพี่นางเธอเจ้าฟ้า', 'สมเด็จพระเจ้าพี่นางเธอเจ้าฟ้า');
INSERT INTO `c_prename` VALUES ('109', 'สมเด็จพระ', 'สมเด็จพระ');
INSERT INTO `c_prename` VALUES ('110', 'สมเด็จพระเจ้าลูกเธอ', 'สมเด็จพระเจ้าลูกเธอ');
INSERT INTO `c_prename` VALUES ('111', 'สมเด็จพระเจ้าลูกยาเธอ', 'สมเด็จพระเจ้าลูกยาเธอ');
INSERT INTO `c_prename` VALUES ('112', 'สมเด็จเจ้าฟ้า', 'สมเด็จเจ้าฟ้า');
INSERT INTO `c_prename` VALUES ('113', 'พระเจ้าบรมวงศ์เธอ', 'พระเจ้าบรมวงศ์เธอ');
INSERT INTO `c_prename` VALUES ('114', 'พระเจ้าวรวงศ์เธอ', 'พระเจ้าวรวงศ์เธอ');
INSERT INTO `c_prename` VALUES ('115', 'พระเจ้าหลานเธอ', 'พระเจ้าหลานเธอ');
INSERT INTO `c_prename` VALUES ('116', 'พระเจ้าหลานยาเธอ', 'พระเจ้าหลานยาเธอ');
INSERT INTO `c_prename` VALUES ('117', 'พระวรวงศ์เธอ', 'พระวรวงศ์เธอ');
INSERT INTO `c_prename` VALUES ('118', 'สมเด็จพระเจ้าภคินีเธอ', 'สมเด็จพระเจ้าภคินีเธอ');
INSERT INTO `c_prename` VALUES ('119', 'พระองค์เจ้า', 'พระองค์เจ้า');
INSERT INTO `c_prename` VALUES ('120', 'ม.จ.', 'หม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('121', 'ม.ร.ว.', 'หม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('122', 'ม.ล.', 'หม่อมหลวง');
INSERT INTO `c_prename` VALUES ('123', 'พระยา', 'พระยา');
INSERT INTO `c_prename` VALUES ('124', 'หลวง', 'หลวง');
INSERT INTO `c_prename` VALUES ('125', 'ขุน', 'ขุน');
INSERT INTO `c_prename` VALUES ('126', 'หมื่น', 'หมื่น');
INSERT INTO `c_prename` VALUES ('127', 'เจ้าคุณ', 'เจ้าคุณ');
INSERT INTO `c_prename` VALUES ('128', 'พระวรวงศ์เธอพระองค์เจ้า', 'พระวรวงศ์เธอพระองค์เจ้า');
INSERT INTO `c_prename` VALUES ('129', 'คุณ', 'คุณ');
INSERT INTO `c_prename` VALUES ('130', 'คุณหญิง', 'คุณหญิง');
INSERT INTO `c_prename` VALUES ('131', 'ท่านผู้หญิง ม.ล.', 'ท่านผู้หญิงหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('132', 'ศจ.น.พ.', 'ศาสตราจารย์นายแพทย์');
INSERT INTO `c_prename` VALUES ('133', 'พ.ญ.คุณหญิง', 'แพทย์หญิงคุณหญิง');
INSERT INTO `c_prename` VALUES ('134', 'น.พ.', 'นายแพทย์');
INSERT INTO `c_prename` VALUES ('135', 'พ.ญ.', 'แพทย์หญิง');
INSERT INTO `c_prename` VALUES ('136', 'ท.พ.', 'ทัณตแพทย์');
INSERT INTO `c_prename` VALUES ('137', 'ท.ญ.', 'ทัณตแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('138', 'สพ.', 'สัตวแพทย์');
INSERT INTO `c_prename` VALUES ('139', 'สญ.', 'สัตวแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('140', 'ดร.', 'ดอกเตอร์');
INSERT INTO `c_prename` VALUES ('141', 'ผศ.', 'ผู้ช่วยศาสตราจารย์');
INSERT INTO `c_prename` VALUES ('142', 'รศ.', 'รองศาสตราจารย์');
INSERT INTO `c_prename` VALUES ('143', 'ศจ.', 'ศาสตราจารย์');
INSERT INTO `c_prename` VALUES ('144', 'ภก.', 'เภสัชกรชาย');
INSERT INTO `c_prename` VALUES ('145', 'ภญ.', 'เภสัชกรหญิง');
INSERT INTO `c_prename` VALUES ('146', 'หม่อม', 'หม่อม');
INSERT INTO `c_prename` VALUES ('147', 'รองอำมาตย์เอก', 'รองอำมาตย์เอก');
INSERT INTO `c_prename` VALUES ('148', 'ท้าว', 'ท้าว');
INSERT INTO `c_prename` VALUES ('149', 'เจ้า', 'เจ้า');
INSERT INTO `c_prename` VALUES ('150', 'ท่านผู้หญิง', 'ท่านผู้หญิง');
INSERT INTO `c_prename` VALUES ('151', 'คุณพระ', 'คุณพระ');
INSERT INTO `c_prename` VALUES ('152', 'ศจ.คุณหญิง', 'ศาสตราจารย์คุณหญิง');
INSERT INTO `c_prename` VALUES ('153', 'ซิสเตอร์', 'ซิสเตอร์');
INSERT INTO `c_prename` VALUES ('154', 'เจ้าชาย', 'เจ้าชาย');
INSERT INTO `c_prename` VALUES ('155', 'เจ้าหญิง', 'เจ้าหญิง');
INSERT INTO `c_prename` VALUES ('156', 'รองเสวกตรี', 'รองเสวกตรี');
INSERT INTO `c_prename` VALUES ('157', 'เสด็จเจ้า', 'เสด็จเจ้า');
INSERT INTO `c_prename` VALUES ('158', 'เอกอัครราชฑูต', 'เอกอัครราชฑูต');
INSERT INTO `c_prename` VALUES ('159', 'พลสารวัตร', 'พลสารวัตร');
INSERT INTO `c_prename` VALUES ('160', 'สมเด็จเจ้า', 'สมเด็จเจ้า');
INSERT INTO `c_prename` VALUES ('161', 'เจ้าฟ้า', 'เจ้าฟ้า');
INSERT INTO `c_prename` VALUES ('162', 'รองอำมาตย์ตรี', 'รองอำมาตย์ตรี');
INSERT INTO `c_prename` VALUES ('163', 'ม.จ.หญิง', 'หม่อมเจ้าหญิง');
INSERT INTO `c_prename` VALUES ('164', 'ทูลกระหม่อม', 'ทูลกระหม่อม');
INSERT INTO `c_prename` VALUES ('165', 'ศ.ดร.', 'ศาสตราจารย์ดอกเตอร์');
INSERT INTO `c_prename` VALUES ('166', 'เจ้านาง', 'เจ้านาง');
INSERT INTO `c_prename` VALUES ('167', 'จ่าสำรอง', 'จ่าสำรอง');
INSERT INTO `c_prename` VALUES ('200', 'พล.อ.', 'พลเอก');
INSERT INTO `c_prename` VALUES ('201', 'ว่าที่ พล.อ.', 'ว่าที่พลเอก');
INSERT INTO `c_prename` VALUES ('202', 'พล.ท.', 'พลโท');
INSERT INTO `c_prename` VALUES ('204', 'พล.ต.', 'พลตรี');
INSERT INTO `c_prename` VALUES ('205', 'ว่าที่ พล.ต.', 'ว่าที่พลตรี');
INSERT INTO `c_prename` VALUES ('206', 'พ.อ.(พิเศษ)', 'พันเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('207', 'ว่าที่ พ.อ.(พิเศษ)', 'ว่าที่พันเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('208', 'พ.อ.', 'พันเอก');
INSERT INTO `c_prename` VALUES ('209', 'ว่าที่ พ.อ.', 'ว่าที่พันเอก');
INSERT INTO `c_prename` VALUES ('210', 'พ.ท.', 'พันโท');
INSERT INTO `c_prename` VALUES ('211', 'ว่าที่ พ.ท.', 'ว่าที่พันโท');
INSERT INTO `c_prename` VALUES ('212', 'พ.ต.', 'พันตรี');
INSERT INTO `c_prename` VALUES ('213', 'ว่าที่ พ.ต.', 'ว่าที่พันตรี');
INSERT INTO `c_prename` VALUES ('214', 'ร.อ.', 'ร้อยเอก');
INSERT INTO `c_prename` VALUES ('215', 'ว่าที่ ร.อ.', 'ว่าที่ร้อยเอก');
INSERT INTO `c_prename` VALUES ('216', 'ร.ท.', 'ร้อยโท');
INSERT INTO `c_prename` VALUES ('217', 'ว่าที่ ร.ท.', 'ว่าที่ร้อยโท');
INSERT INTO `c_prename` VALUES ('218', 'ร.ต.', 'ร้อยตรี');
INSERT INTO `c_prename` VALUES ('219', 'ว่าที่ ร.ต.', 'ว่าที่ร้อยตรี');
INSERT INTO `c_prename` VALUES ('220', 'จ.ส.อ.', 'จ่าสิบเอก');
INSERT INTO `c_prename` VALUES ('221', 'จ.ส.ท.', 'จ่าสิบโท');
INSERT INTO `c_prename` VALUES ('222', 'จ.ส.ต.', 'จ่าสิบตรี');
INSERT INTO `c_prename` VALUES ('223', 'ส.อ.', 'สิบเอก');
INSERT INTO `c_prename` VALUES ('224', 'ส.ท.', 'สิบโท');
INSERT INTO `c_prename` VALUES ('225', 'ส.ต.', 'สิบตรี');
INSERT INTO `c_prename` VALUES ('226', 'พลฯ', 'พลทหาร');
INSERT INTO `c_prename` VALUES ('227', 'นนร.', 'นักเรียนนายร้อย');
INSERT INTO `c_prename` VALUES ('228', 'นนส.', 'นักเรียนนายสิบ');
INSERT INTO `c_prename` VALUES ('229', 'พล.จ.', 'พลจัตวา');
INSERT INTO `c_prename` VALUES ('230', 'พลฯ อาสา', 'พลฯ อาสาสมัคร');
INSERT INTO `c_prename` VALUES ('231', 'ร.อ.ม.จ.', 'ร้อยเอกหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('232', 'พล.ท.ม.จ.', 'พลโทหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('233', 'ร.ต.ม.จ.', 'ร้อยตรีหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('234', 'ร.ท.ม.จ.', 'ร้อยโทหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('235', 'พ.ท.ม.จ.', 'พันโทหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('236', 'พ.อ.ม.จ.', 'พันเอกหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('237', 'พ.ต.ม.ร.ว.', 'พันตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('238', 'พ.ท.ม.ร.ว.', 'พันโทหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('239', 'ส.ต.ม.ร.ว.', 'สิบตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('240', 'พ.อ.ม.ร.ว.', 'พันเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('241', 'จ.ส.อ.ม.ร.ว.', 'จ่าสิบเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('242', 'ร.อ.ม.ร.ว.', 'ร้อยเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('243', 'ร.ต.ม.ร.ว.', 'ร้อยตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('244', 'ส.อ.ม.ร.ว.', 'สิบเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('245', 'ร.ท.ม.ร.ว.', 'ร้อยโทหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('246', 'พ.อ.(พิเศษ)ม.ร.ว.', 'พันเอก(พิเศษ)หม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('247', 'พลฯม.ล.', 'พลฯหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('248', 'ร.อ.ม.ล.', 'ร้อยเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('249', 'ส.ท.ม.ล.', 'สิบโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('250', 'พล.ท.ม.ล.', 'พลโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('251', 'ร.ท.ม.ล.', 'ร้อยโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('252', 'ร.ต.ม.ล.', 'ร้อยตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('253', 'ส.อ.ม.ล.', 'สิบเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('254', 'พล.ต.ม.ล.', 'พลตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('255', 'พ.ต.ม.ล.', 'พันตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('256', 'พ.อ.ม.ล.', 'พันเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('257', 'พ.ท.ม.ล.', 'พันโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('258', 'จ.ส.ต.ม.ล.', 'จ่าสิบตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('259', 'นนร.ม.ล.', 'นักเรียนนายร้อยหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('260', 'ว่าที่ร.ต.ม.ล.', 'ว่าที่ร้อยตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('261', 'จ.ส.อ.ม.ล.', 'จ่าสิบเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('262', 'ร.อ.น.พ.', 'ร้อยเอกนายแพทย์');
INSERT INTO `c_prename` VALUES ('263', 'ร.อ.พ.ญ.', 'ร้อยเอกแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('264', 'ร.ท.น.พ.', 'ร้อยโทนายแพทย์');
INSERT INTO `c_prename` VALUES ('265', 'พ.ต.น.พ.', 'พันตรีนายแพทย์');
INSERT INTO `c_prename` VALUES ('266', 'ว่าที่ ร.ท.น.พ.', 'ว่าที่ร้อยโทนายแพทย์');
INSERT INTO `c_prename` VALUES ('267', 'พ.อ.น.พ.', 'พันเอกนายแพทย์');
INSERT INTO `c_prename` VALUES ('268', 'ร.ต.น.พ.', 'ร้อยตรีนายแพทย์');
INSERT INTO `c_prename` VALUES ('269', 'ร.ท.พ.ญ.', 'ร้อยโทแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('270', 'พล.ต.น.พ.', 'พลตรีนายแพทย์');
INSERT INTO `c_prename` VALUES ('271', 'พ.ท.น.พ.', 'พันโทนายแพทย์');
INSERT INTO `c_prename` VALUES ('272', 'จอมพล', 'จอมพล');
INSERT INTO `c_prename` VALUES ('273', 'พ.ท.หลวง', 'พันโทหลวง');
INSERT INTO `c_prename` VALUES ('274', 'พ.ต.พระเจ้าวรวงศ์เธอพระองค์เจ้า', 'พันตรีพระเจ้าวรวงศ์เธอพระองค์เจ้า');
INSERT INTO `c_prename` VALUES ('275', 'ศจ.พ.อ.', 'ศาสตราจารย์พันเอก');
INSERT INTO `c_prename` VALUES ('276', 'พ.ต.หลวง', 'พันตรีหลวง');
INSERT INTO `c_prename` VALUES ('277', 'พล.ท.หลวง', 'พลโทหลวง');
INSERT INTO `c_prename` VALUES ('278', 'ร.ท.ดร.', 'ร้อยโทดอกเตอร์');
INSERT INTO `c_prename` VALUES ('279', 'ร.อ.ดร.', 'ร้อยเอกดอกเตอร์');
INSERT INTO `c_prename` VALUES ('280', 'ส.ห.', 'สารวัตรทหาร');
INSERT INTO `c_prename` VALUES ('281', 'ร.ต.ดร.', 'ร้อยตรีดอกเตอร์');
INSERT INTO `c_prename` VALUES ('282', 'พ.ต.คุณหญิง', 'พันตรีคุณหญิง');
INSERT INTO `c_prename` VALUES ('283', 'จ.ส.ต.ม.ร.ว.', 'จ่าสิบตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('284', 'พล.จ.หลวง', 'พลจัตวาหลวง');
INSERT INTO `c_prename` VALUES ('285', 'พล.ต.ม.ร.ว.', 'พลตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('286', 'พ.ต.พระเจ้าวรวงศ์เธอพระองค์', 'พันตรีพระเจ้าวรวงศ์เธอพระองค์');
INSERT INTO `c_prename` VALUES ('287', 'ท่านผู้หญิง ม.ร.ว.', 'ท่านผู้หญิงหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('288', 'ศจ.ร.อ.', 'ศาสตราจารย์ร้อยเอก');
INSERT INTO `c_prename` VALUES ('289', 'พ.ท.คุณหญิง', 'พันโทคุณหญิง');
INSERT INTO `c_prename` VALUES ('290', 'ร.ต.พ.ญ.', 'ร้อยตรีแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('291', 'พล.อ.มล.', 'พลเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('292', 'ว่าที่ ร.ต.ม.ร.ว.', 'ว่าที่ร้อยตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('293', 'พ.อ.หญิง คุณหญิง', 'พันเอกหญิงคุณหญิง');
INSERT INTO `c_prename` VALUES ('294', 'จ.ส.อ.พิเศษ', 'จ่าสิบเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('351', 'พล.ร.อ.', 'พลเรือเอก');
INSERT INTO `c_prename` VALUES ('352', 'ว่าที่ พล.ร.อ.', 'ว่าที่พลเรือเอก');
INSERT INTO `c_prename` VALUES ('353', 'พล.ร.ท.', 'พลเรือโท');
INSERT INTO `c_prename` VALUES ('354', 'ว่าที่ พล.ร.ท.', 'ว่าที่พลเรือโท');
INSERT INTO `c_prename` VALUES ('355', 'พล.ร.ต.', 'พลเรือตรี');
INSERT INTO `c_prename` VALUES ('356', 'ว่าที่ พล.ร.ต.', 'ว่าที่พลเรือตรี');
INSERT INTO `c_prename` VALUES ('357', 'น.อ.พิเศษ', 'นาวาเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('358', 'ว่าที่ น.อ.พิเศษ', 'ว่าที่นาวาเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('359', 'น.อ.', 'นาวาเอก');
INSERT INTO `c_prename` VALUES ('360', 'ว่าที่ น.อ.', 'ว่าที่นาวาเอก');
INSERT INTO `c_prename` VALUES ('361', 'น.ท.', 'นาวาโท');
INSERT INTO `c_prename` VALUES ('362', 'ว่าที่ น.ท.', 'ว่าที่นาวาโท');
INSERT INTO `c_prename` VALUES ('363', 'น.ต.', 'นาวาตรี');
INSERT INTO `c_prename` VALUES ('364', 'ว่าที่ น.ต.', 'ว่าที่นาวาตรี');
INSERT INTO `c_prename` VALUES ('365', 'ร.อ.', 'เรือเอก');
INSERT INTO `c_prename` VALUES ('366', 'ว่าที่ ร.อ.', 'ว่าที่เรือเอก');
INSERT INTO `c_prename` VALUES ('367', 'ร.ท.', 'เรือโท');
INSERT INTO `c_prename` VALUES ('368', 'ว่าที่ ร.ท.', 'ว่าที่เรือโท');
INSERT INTO `c_prename` VALUES ('369', 'ร.ต.', 'เรือตรี');
INSERT INTO `c_prename` VALUES ('370', 'ว่าที่ ร.ต.', 'ว่าที่เรือตรี');
INSERT INTO `c_prename` VALUES ('371', 'พ.จ.อ.', 'พันจ่าเอก');
INSERT INTO `c_prename` VALUES ('372', 'พ.จ.ท.', 'พันจ่าโท');
INSERT INTO `c_prename` VALUES ('373', 'พ.จ.ต.', 'พันจ่าตรี');
INSERT INTO `c_prename` VALUES ('374', 'จ.อ.', 'จ่าเอก');
INSERT INTO `c_prename` VALUES ('375', 'จ.ท.', 'จ่าโท');
INSERT INTO `c_prename` VALUES ('376', 'จ.ต.', 'จ่าตรี');
INSERT INTO `c_prename` VALUES ('377', 'พลฯ', 'พลฯทหารเรือ');
INSERT INTO `c_prename` VALUES ('378', 'นนร.', 'นักเรียนนายเรือ');
INSERT INTO `c_prename` VALUES ('379', 'นรจ.', 'นักเรียนจ่าทหารเรือ');
INSERT INTO `c_prename` VALUES ('380', 'พล.ร.จ.', 'พลเรือจัตวา');
INSERT INTO `c_prename` VALUES ('381', 'น.ท.ม.จ.', 'นาวาโทหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('382', 'น.อ.ม.จ.', 'นาวาเอกหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('383', 'น.ต.ม.จ.', 'นาวาตรีหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('384', 'พล.ร.ต.ม.ร.ว.', 'พลเรือตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('385', 'น.อ.ม.ร.ว.', 'นาวาเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('386', 'น.ท.ม.ร.ว.', 'นาวาโทหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('387', 'น.ต.ม.ร.ว.', 'นาวาตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('388', 'น.ท.ม.ล.', 'นาวาโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('389', 'น.ต.ม.ล.', 'นาวาตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('390', 'พ.จ.อ.ม.ล.', 'พันจ่าเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('391', 'น.ต.พ.ญ.', 'นาวาตรีแพทย์หญิง');
INSERT INTO `c_prename` VALUES ('392', 'น.อ.หลวง', 'นาวาอากาศเอกหลวง');
INSERT INTO `c_prename` VALUES ('393', 'พล.ร.ต.ม.จ.', 'พลเรือตรีหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('395', 'น.ต.น.พ.', 'นาวาตรีนายแพทย์');
INSERT INTO `c_prename` VALUES ('396', 'พล.ร.ต.ม.ล.', 'พลเรือตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('500', 'พล.อ.อ.', 'พลอากาศเอก');
INSERT INTO `c_prename` VALUES ('501', 'ว่าที่ พล.อ.อ.', 'ว่าที่พลอากาศเอก');
INSERT INTO `c_prename` VALUES ('502', 'พล.อ.ท.', 'พลอากาศโท');
INSERT INTO `c_prename` VALUES ('503', 'ว่าที่ พล.อ.ท.', 'ว่าที่พลอากาศโท');
INSERT INTO `c_prename` VALUES ('504', 'พล.อ.ต.', 'พลอากาศตรี');
INSERT INTO `c_prename` VALUES ('505', 'ว่าที่ พล.อ.ต.', 'ว่าที่พลอากาศตรี');
INSERT INTO `c_prename` VALUES ('506', 'น.อ.พิเศษ', 'นาวาอากาศเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('507', 'ว่าที่ น.อ.พิเศษ', 'ว่าที่นาวาอากาศเอกพิเศษ');
INSERT INTO `c_prename` VALUES ('508', 'น.อ.', 'นาวาอากาศเอก');
INSERT INTO `c_prename` VALUES ('509', 'ว่าที่ น.อ.', 'ว่าที่นาวาอากาศเอก');
INSERT INTO `c_prename` VALUES ('510', 'น.ท.', 'นาวาอากาศโท');
INSERT INTO `c_prename` VALUES ('511', 'ว่าที่ น.ท.', 'ว่าที่นาวาอากาศโท');
INSERT INTO `c_prename` VALUES ('512', 'น.ต.', 'นาวาอากาศตรี');
INSERT INTO `c_prename` VALUES ('513', 'ว่าที่ น.ต.', 'ว่าที่นาวาอากาศตรี');
INSERT INTO `c_prename` VALUES ('514', 'ร.อ.', 'เรืออากาศเอก');
INSERT INTO `c_prename` VALUES ('515', 'ว่าที่ ร.อ.', 'ว่าที่เรืออากาศเอก');
INSERT INTO `c_prename` VALUES ('516', 'ร.ท.', 'เรืออากาศโท');
INSERT INTO `c_prename` VALUES ('517', 'ว่าที่ ร.ท.', 'ว่าที่เรืออากาศโท');
INSERT INTO `c_prename` VALUES ('518', 'ร.ต.', 'เรืออากาศตรี');
INSERT INTO `c_prename` VALUES ('519', 'ว่าที่ ร.ต.', 'ว่าที่เรืออากาศตรี');
INSERT INTO `c_prename` VALUES ('520', 'พ.อ.อ.', 'พันจ่าอากาศเอก');
INSERT INTO `c_prename` VALUES ('521', 'พ.อ.ท.', 'พันจ่าอากาศโท');
INSERT INTO `c_prename` VALUES ('522', 'พ.อ.ต.', 'พันจ่าอากาศตรี');
INSERT INTO `c_prename` VALUES ('523', 'จ.อ.', 'จ่าอากาศเอก');
INSERT INTO `c_prename` VALUES ('524', 'จ.ท.', 'จ่าอากาศโท');
INSERT INTO `c_prename` VALUES ('525', 'จ.ต.', 'จ่าอากาศตรี');
INSERT INTO `c_prename` VALUES ('526', 'พลฯ', 'พลฯทหารอากาศ');
INSERT INTO `c_prename` VALUES ('527', 'นนอ.', 'นักเรียนนายเรืออากาศ');
INSERT INTO `c_prename` VALUES ('528', 'นจอ.', 'นักเรียนจ่าอากาศ');
INSERT INTO `c_prename` VALUES ('529', 'น.พ.อ.', 'นักเรียนพยาบาลทหารอากาศ');
INSERT INTO `c_prename` VALUES ('530', 'พ.อ.อ.ม.ร.ว.', 'พันอากาศเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('531', 'พล.อ.ต.ม.ร.ว.', 'พลอากาศตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('532', 'พล.อ.ท.ม.ล.', 'พลอากาศโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('533', 'ร.ท.ขุน', 'เรืออากาศโทขุน');
INSERT INTO `c_prename` VALUES ('534', 'พ.อ.อ.ม.ล.', 'พันจ่าอากาศเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('535', 'ร.อ.น.พ.', 'เรืออากาศเอกนายแพทย์');
INSERT INTO `c_prename` VALUES ('536', 'พล.อ.อ.ม.ร.ว.', 'พลอากาศเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('537', 'พล.อ.ต.ม.ล.', 'พลอากาศตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('538', 'พล.อ.จ.', 'พลอากาศจัตวา');
INSERT INTO `c_prename` VALUES ('539', 'พล.อ.ท.ม.ร.ว.', 'พลอากาศโทหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('540', 'น.อ.ม.ล.', 'นาวาอากาศเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('606', 'พระครูพิบูลสมณธรรม', 'พระครูพิบูลสมณธรรม');
INSERT INTO `c_prename` VALUES ('651', 'พล.ต.อ.', 'พลตำรวจเอก');
INSERT INTO `c_prename` VALUES ('652', 'ว่าที่ พล.ต.อ.', 'ว่าที่พลตำรวจเอก');
INSERT INTO `c_prename` VALUES ('653', 'พล.ต.ท.', 'พลตำรวจโท');
INSERT INTO `c_prename` VALUES ('654', 'ว่าที่ พล.ต.ท.', 'ว่าที่พลตำรวจโท');
INSERT INTO `c_prename` VALUES ('655', 'พล.ต.ต.', 'พลตำรวจตรี');
INSERT INTO `c_prename` VALUES ('656', 'ว่าที่ พล.ต.ต.', 'ว่าที่พลตำรวจตรี');
INSERT INTO `c_prename` VALUES ('657', 'พล.ต.จ.', 'พลตำรวจจัตวา');
INSERT INTO `c_prename` VALUES ('658', 'ว่าที่พล.ต.จ.', 'ว่าที่พลตำรวจจัตวา');
INSERT INTO `c_prename` VALUES ('659', 'พ.ต.อ. (พิเศษ)', 'พันตำรวจเอก (พิเศษ)');
INSERT INTO `c_prename` VALUES ('660', 'ว่าที่ พ.ต.อ.พิเศษ', 'ว่าที่พันตำรวจเอก(พิเศษ)');
INSERT INTO `c_prename` VALUES ('661', 'พ.ต.อ.', 'พันตำรวจเอก');
INSERT INTO `c_prename` VALUES ('662', 'ว่าที่ พ.ต.อ.', 'ว่าที่พันตำรวจเอก');
INSERT INTO `c_prename` VALUES ('663', 'พ.ต.ท.', 'พันตำรวจโท');
INSERT INTO `c_prename` VALUES ('664', 'ว่าที่ พ.ต.ท.', 'ว่าที่พันตำรวจโท');
INSERT INTO `c_prename` VALUES ('665', 'พ.ต.ต.', 'พันตำรวจตรี');
INSERT INTO `c_prename` VALUES ('666', 'ว่าที่ พ.ต.ต.', 'ว่าที่พันตำรวจตรี');
INSERT INTO `c_prename` VALUES ('667', 'ร.ต.อ.', 'ร้อยตำรวจเอก');
INSERT INTO `c_prename` VALUES ('668', 'ว่าที่ ร.ต.อ.', 'ว่าที่ร้อยตำรวจเอก');
INSERT INTO `c_prename` VALUES ('669', 'ร.ต.ท.', 'ร้อยตำรวจโท');
INSERT INTO `c_prename` VALUES ('670', 'ว่าที่ ร.ต.ท.', 'ว่าที่ร้อยตำรวจโท');
INSERT INTO `c_prename` VALUES ('671', 'ร.ต.ต.', 'ร้อยตำรวจตรี');
INSERT INTO `c_prename` VALUES ('672', 'ว่าที่ ร.ต.ต.', 'ว่าที่ร้อยตำรวจตรี');
INSERT INTO `c_prename` VALUES ('673', 'ด.ต.', 'นายดาบตำรวจ');
INSERT INTO `c_prename` VALUES ('674', 'จ.ส.ต.', 'จ่าสิบตำรวจ');
INSERT INTO `c_prename` VALUES ('675', 'ส.ต.อ.', 'สิบตำรวจเอก');
INSERT INTO `c_prename` VALUES ('676', 'ส.ต.ท.', 'สิบตำรวจโท');
INSERT INTO `c_prename` VALUES ('677', 'ส.ต.ต.', 'สิบตำรวจตรี');
INSERT INTO `c_prename` VALUES ('678', 'นรต.', 'นักเรียนนายร้อยตำรวจ');
INSERT INTO `c_prename` VALUES ('679', 'นสต.', 'นักเรียนนายสิบตำรวจ');
INSERT INTO `c_prename` VALUES ('680', 'นพต.', 'นักเรียนพลตำรวจ');
INSERT INTO `c_prename` VALUES ('681', 'พลฯ', 'พลตำรวจ');
INSERT INTO `c_prename` VALUES ('682', 'พลฯพิเศษ', 'พลตำรวจพิเศษ');
INSERT INTO `c_prename` VALUES ('683', 'พลฯอาสา', 'พลตำรวจอาสาสมัคร');
INSERT INTO `c_prename` VALUES ('684', 'พลฯสำรอง', 'พลตำรวจสำรอง');
INSERT INTO `c_prename` VALUES ('685', 'พลฯสำรองพิเศษ', 'พลตำรวจสำรองพิเศษ');
INSERT INTO `c_prename` VALUES ('686', 'พลฯสมัคร', 'พลตำรวจสมัคร');
INSERT INTO `c_prename` VALUES ('687', 'อส.', 'สมาชิกอาสารักษาดินแดน');
INSERT INTO `c_prename` VALUES ('688', 'ก.ญ.', 'นายกองใหญ่');
INSERT INTO `c_prename` VALUES ('689', 'ก.อ.', 'นายกองเอก');
INSERT INTO `c_prename` VALUES ('690', 'ก.ท.', 'นายกองโท');
INSERT INTO `c_prename` VALUES ('691', 'ก.ต.', 'นายกองตรี');
INSERT INTO `c_prename` VALUES ('692', 'มว.อ.', 'นายหมวดเอก');
INSERT INTO `c_prename` VALUES ('693', 'มว.ท.', 'นายหมวดโท');
INSERT INTO `c_prename` VALUES ('694', 'มว.ต.', 'นายหมวดตรี');
INSERT INTO `c_prename` VALUES ('695', 'ม.ญ.', 'นายหมู่ใหญ่');
INSERT INTO `c_prename` VALUES ('696', 'ม.อ.', 'นายหมู่เอก');
INSERT INTO `c_prename` VALUES ('697', 'ม.ท.', 'นายหมู่โท');
INSERT INTO `c_prename` VALUES ('698', 'ม.ต.', 'นายหมู่ตรี');
INSERT INTO `c_prename` VALUES ('699', 'สมาชิกเอก', 'สมาชิกเอก');
INSERT INTO `c_prename` VALUES ('700', 'สมาชิกโท', 'สมาชิกโท');
INSERT INTO `c_prename` VALUES ('701', 'สมาชิกตรี', 'สมาชิกตรี');
INSERT INTO `c_prename` VALUES ('702', 'อส.ทพ.', 'อาสาสมัครทหารพราน');
INSERT INTO `c_prename` VALUES ('703', 'พ.ต.ท.ม.จ.', 'พันตำรวจโทหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('704', 'พ.ต.อ.ม.จ.', 'พันตำรวจเอกหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('705', 'นรต.ม.จ.', 'นักเรียนนายร้อยตำรวจหม่อมเจ้า');
INSERT INTO `c_prename` VALUES ('706', 'พล.ต.ต.ม.ร.ว.', 'พลตำรวจตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('707', 'พ.ต.ต.ม.ร.ว.', 'พันตำรวจตรีหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('708', 'พ.ต.ท.ม.ร.ว.', 'พันตำรวจโทหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('709', 'พ.ต.อ.ม.ร.ว.', 'พันตำรวจเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('710', 'ร.ต.อ.ม.ร.ว.', 'ร้อยตำรวจเอกหม่อมราชวงศ์');
INSERT INTO `c_prename` VALUES ('711', 'ส.ต.อ.ม.ล.', 'สิบตำรวจเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('712', 'พ.ต.อ.ม.ล.', 'พันตำรวจเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('713', 'พ.ต.ท.ม.ล.', 'พันตำรวจโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('714', 'นรต.ม.ล.', 'นักเรียนนายร้อยตำรวจหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('715', 'ร.ต.ท.ม.ล.', 'ร้อยตำรวจโทหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('716', 'ด.ต.ม.ล.', 'นายดาบตำรวจหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('717', 'พ.ต.ต.ม.ล.', 'พันตำรวจตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('718', 'ศจ.น.พ.พ.ต.อ.', 'ศาสตราจารย์นายแพทย์พันตำรวจเอก');
INSERT INTO `c_prename` VALUES ('719', 'พ.ต.ท.น.พ.', 'พันตำรวจโทนายแพทย์');
INSERT INTO `c_prename` VALUES ('720', 'ร.ต.ท.น.พ.', 'ร้อยตำรวจโทนายแพทย์');
INSERT INTO `c_prename` VALUES ('721', 'ร.ต.อ.น.พ.', 'ร้อยตำรวจเอกนายแพทย์');
INSERT INTO `c_prename` VALUES ('722', 'พ.ต.ต.นพ.', 'พันตำรวจตรีนายแพทย์');
INSERT INTO `c_prename` VALUES ('723', 'พ.ต.อ.น.พ.', 'พันตำรวจเอกนายแพทย์');
INSERT INTO `c_prename` VALUES ('724', 'พ.ต.ต.หลวง', 'พันตำรวจตรีหลวง');
INSERT INTO `c_prename` VALUES ('725', 'ร.ต.ท.ดร.', 'ร้อยตำรวจโทดอกเตอร์');
INSERT INTO `c_prename` VALUES ('726', 'พ.ต.อ.ดร.', 'พันตำรวจเอกดอกเตอร์');
INSERT INTO `c_prename` VALUES ('727', 'ร.ต.อ.ม.ล.', 'ร้อยตำรวจเอกหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('729', 'พ.ต.อ.หญิง ท่านผู้หญิง', 'พันตำรวจเอกหญิง ท่านผู้หญิง');
INSERT INTO `c_prename` VALUES ('730', 'พล.ต.ต.ม.ล.', 'พลตำรวจตรีหม่อมหลวง');
INSERT INTO `c_prename` VALUES ('731', 'พล.ต.หญิง คุณหญิง', 'พลตรีหญิง คุณหญิง');
INSERT INTO `c_prename` VALUES ('732', 'ว่าที่ ส.อ.', 'ว่าที่สิบเอก');
INSERT INTO `c_prename` VALUES ('733', 'พล.ต.อ.ดร.', 'พลตำรวจเอกดอกเตอร์');
INSERT INTO `c_prename` VALUES ('800', 'สมเด็จพระสังฆราชเจ้า', 'สมเด็จพระสังฆราชเจ้า');
INSERT INTO `c_prename` VALUES ('801', 'สมเด็จพระสังฆราช', 'สมเด็จพระสังฆราช');
INSERT INTO `c_prename` VALUES ('802', 'สมเด็จพระราชาคณะ', 'สมเด็จพระราชาคณะ');
INSERT INTO `c_prename` VALUES ('803', 'รองสมเด็จพระราชาคณะ', 'รองสมเด็จพระราชาคณะ');
INSERT INTO `c_prename` VALUES ('804', 'พระราชาคณะ', 'พระราชาคณะ');
INSERT INTO `c_prename` VALUES ('805', 'พระเปรียญธรรม', 'พระเปรียญธรรม');
INSERT INTO `c_prename` VALUES ('806', 'พระหิรัญยบัฏ', 'พระหิรัญยบัฏ');
INSERT INTO `c_prename` VALUES ('807', 'พระสัญญาบัตร', 'พระสัญญาบัตร');
INSERT INTO `c_prename` VALUES ('808', 'พระราช', 'พระราช');
INSERT INTO `c_prename` VALUES ('809', 'พระเทพ', 'พระเทพ');
INSERT INTO `c_prename` VALUES ('810', 'พระปลัดขวา', 'พระปลัดขวา');
INSERT INTO `c_prename` VALUES ('811', 'พระปลัดซ้าย', 'พระปลัดซ้าย');
INSERT INTO `c_prename` VALUES ('812', 'พระครูปลัด', 'พระครูปลัด');
INSERT INTO `c_prename` VALUES ('813', 'พระครูปลัดสุวัฒนญาณคุณ', 'พระครูปลัดสุวัฒนญาณคุณ');
INSERT INTO `c_prename` VALUES ('814', 'พระครูปลัดอาจารย์วัฒน์', 'พระครูปลัดอาจารย์วัฒน์');
INSERT INTO `c_prename` VALUES ('815', 'พระครูปลัดวิมลสิริวัฒน์', 'พระครูวิมลสิริวัฒน์');
INSERT INTO `c_prename` VALUES ('816', 'พระสมุห์', 'พระสมุห์');
INSERT INTO `c_prename` VALUES ('817', 'พระครูสมุห์', 'พระครูสมุห์');
INSERT INTO `c_prename` VALUES ('818', 'พระครู', 'พระครู');
INSERT INTO `c_prename` VALUES ('819', 'พระครูใบฎีกา', 'พระครูใบฎีกา');
INSERT INTO `c_prename` VALUES ('820', 'พระครูธรรมธร', 'พระครูธรรมธร');
INSERT INTO `c_prename` VALUES ('821', 'พระครูวิมลภาณ', 'พระครูวิมลภาณ');
INSERT INTO `c_prename` VALUES ('822', 'พระครูศัพทมงคล', 'พระครูศัพทมงคล');
INSERT INTO `c_prename` VALUES ('823', 'พระครูสังฆภารวิชัย', 'พระครูสังฆภารวิชัย');
INSERT INTO `c_prename` VALUES ('824', 'พระครูสังฆรักษ์', 'พระครูสังฆรักษ์');
INSERT INTO `c_prename` VALUES ('825', 'พระครูสังฆวิชัย', 'พระครูสังฆวิชัย');
INSERT INTO `c_prename` VALUES ('826', 'พระครูสังฆวิชิต', 'พระครูสังฆวิชิต');
INSERT INTO `c_prename` VALUES ('827', 'พระปิฎก', 'พระปิฎก');
INSERT INTO `c_prename` VALUES ('828', 'พระปริยัติ', 'พระปริยัติ');
INSERT INTO `c_prename` VALUES ('829', 'เจ้าอธิการ', 'เจ้าอธิการ');
INSERT INTO `c_prename` VALUES ('830', 'พระอธิการ', 'พระอธิการ');
INSERT INTO `c_prename` VALUES ('831', 'พระ', 'พระ');
INSERT INTO `c_prename` VALUES ('832', 'ส.ณ.', 'สามเณร');
INSERT INTO `c_prename` VALUES ('833', 'พระปลัด', 'พระปลัด');
INSERT INTO `c_prename` VALUES ('834', 'สมเด็จพระอริยวงศาคตญาณ', 'สมเด็จพระอริยวงศาคตญาณ');
INSERT INTO `c_prename` VALUES ('835', 'พระคาร์ดินัล', 'พระคาร์ดินัล');
INSERT INTO `c_prename` VALUES ('836', 'พระสังฆราช', 'พระสังฆราช');
INSERT INTO `c_prename` VALUES ('837', 'พระคุณเจ้า', 'พระคุณเจ้า');
INSERT INTO `c_prename` VALUES ('838', 'บาทหลวง', 'บาทหลวง');
INSERT INTO `c_prename` VALUES ('839', 'พระมหา', 'พระมหา');
INSERT INTO `c_prename` VALUES ('840', 'พระราชปัญญา', 'พระราชปัญญา');
INSERT INTO `c_prename` VALUES ('841', 'ภาราดา', 'ภาราดา');
INSERT INTO `c_prename` VALUES ('842', 'พระศรีปริยัติธาดา', 'พระศรีปริยัติธาดา');
INSERT INTO `c_prename` VALUES ('843', 'พระญาณโศภณ', 'พระญาณโศภณ');
INSERT INTO `c_prename` VALUES ('844', 'สมเด็จพระมหาวีรวงศ์', 'สมเด็จพระมหาวีรวงศ์');
INSERT INTO `c_prename` VALUES ('845', 'พระโสภณธรรมาภรณ์', 'พระโสภณธรรมาภรณ์');
INSERT INTO `c_prename` VALUES ('846', 'พระวิริวัฒน์วิสุทธิ์', 'พระวิริวัฒน์วิสุทธิ์');
INSERT INTO `c_prename` VALUES ('847', 'พระญาณ', 'พระญาณ');
INSERT INTO `c_prename` VALUES ('848', 'พระอัครสังฆราช', 'พระอัครสังฆราช');
INSERT INTO `c_prename` VALUES ('849', 'พระธรรม', 'พระธรรม');
INSERT INTO `c_prename` VALUES ('850', 'พระสาสนโสภณ', 'พระสาสนโสภณ');
INSERT INTO `c_prename` VALUES ('851', 'พระธรรมโสภณ', 'พระธรรมโสภณ');
INSERT INTO `c_prename` VALUES ('852', 'พระอุดมสารโสภณ', 'พระอุดมสารโสภณ');
INSERT INTO `c_prename` VALUES ('853', 'พระครูวิมลญาณโสภณ', 'พระครูวิมลญาณโสภณ');
INSERT INTO `c_prename` VALUES ('854', 'พระครูปัญญาภรณโสภณ', 'พระครูปัญญาภรณโสภณ');
INSERT INTO `c_prename` VALUES ('855', 'พระครูโสภณปริยัติคุณ', 'พระครูโสภณปริยัติคุณ');
INSERT INTO `c_prename` VALUES ('856', 'พระอธิธรรม', 'พระอธิธรรม');
INSERT INTO `c_prename` VALUES ('857', 'พระราชญาณ', 'พระราชญาณ');
INSERT INTO `c_prename` VALUES ('858', 'พระสุธีวัชโรดม', 'พระสุธีวัชโรดม');
INSERT INTO `c_prename` VALUES ('859', 'รองเจ้าอธิการ', 'รองเจ้าอธิการ');
INSERT INTO `c_prename` VALUES ('860', 'พระครูวินัยธร', 'พระครูวินัยธร');
INSERT INTO `c_prename` VALUES ('861', 'พระศรีวชิราภรณ์', 'พระศรีวชิราภรณ์');
INSERT INTO `c_prename` VALUES ('862', 'พระราชบัณฑิต', 'พระราชบัณฑิต');
INSERT INTO `c_prename` VALUES ('863', 'แม่ชี', 'แม่ชี');
INSERT INTO `c_prename` VALUES ('864', 'นักบวช', 'นักบวช');
INSERT INTO `c_prename` VALUES ('865', 'พระรัตน', 'พระรัตน');
INSERT INTO `c_prename` VALUES ('866', 'พระโสภณปริยัติธรรม', 'พระโสภณปริยัติธรรม');
INSERT INTO `c_prename` VALUES ('867', 'พระครูวิศาลปัญญาคุณ', 'พระครูวิศาลปัญญาคุณ');
INSERT INTO `c_prename` VALUES ('868', 'พระศรีปริยัติโมลี', 'พระศรีปริยัติโมลี');
INSERT INTO `c_prename` VALUES ('869', 'พระครูวัชรสีลาภรณ์', 'พระครูวัชรสีลาภรณ์');
INSERT INTO `c_prename` VALUES ('870', 'พระครูพิพัฒน์บรรณกิจ', 'พระครูพิพัฒน์บรรณกิจ');
INSERT INTO `c_prename` VALUES ('871', 'พระครูวิบูลธรรมกิจ', 'พระครูวิบูลธรรมกิจ');
INSERT INTO `c_prename` VALUES ('872', 'พระครูพัฒนสารคุณ', 'พระครูพัฒนสารคุณ');
INSERT INTO `c_prename` VALUES ('873', 'พระครูสุวรรณพัฒนคุณ', 'พระครูสุวรรณพัฒนคุณ');
INSERT INTO `c_prename` VALUES ('874', 'พระครูพรหมวีรสุนทร', 'พระครูพรหมวีรสุนทร');
INSERT INTO `c_prename` VALUES ('875', 'พระครูอุปถัมภ์นันทกิจ', 'พระครูอุปถัมภ์นันทกิจ');
INSERT INTO `c_prename` VALUES ('876', 'พระครูวิจารณ์สังฆกิจ', 'พระครูวิจารณ์สังฆกิจ');
INSERT INTO `c_prename` VALUES ('877', 'พระครูวิมลสารวิสุทธิ์', 'พระครูวิมลสารวิสุทธิ์');
INSERT INTO `c_prename` VALUES ('878', 'พระครูไพศาลศุภกิจ', 'พระครูไพศาลศุภกิจ');
INSERT INTO `c_prename` VALUES ('879', 'พระครูโอภาสธรรมพิมล', 'พระครูโอภาสธรรมพิมล');
INSERT INTO `c_prename` VALUES ('880', 'พระครูพิพิธวรคุณ', 'พระครูพิพิธวรคุณ');
INSERT INTO `c_prename` VALUES ('881', 'พระครูสุนทรปภากร', 'พระครูสุนทรปภากร');
INSERT INTO `c_prename` VALUES ('882', 'พระครูสิริชัยสถิต', 'พระครูสิริชัยสถิต');
INSERT INTO `c_prename` VALUES ('883', 'พระครูเกษมธรรมานันท์', 'พระครูเกษมธรรมานันท์');
INSERT INTO `c_prename` VALUES ('884', 'พระครูถาวรสันติคุณ', 'พระครูถาวรสันติคุณ');
INSERT INTO `c_prename` VALUES ('885', 'พระครูวิสุทธาจารวิมล', 'พระครูวิสุทธาจารวิมล');
INSERT INTO `c_prename` VALUES ('886', 'พระครูปภัสสราธิคุณ', 'พระครูปภัสสราธิคุณ');
INSERT INTO `c_prename` VALUES ('887', 'พระครูวรสังฆกิจ', 'พระครูวรสังฆกิจ');
INSERT INTO `c_prename` VALUES ('888', 'พระครูไพบูลชัยสิทธิ์', 'พระครูไพบูลชัยสิทธิ์');
INSERT INTO `c_prename` VALUES ('889', 'พระครูโกวิทธรรมโสภณ', 'พระครูโกวิทธรรมโสภณ');
INSERT INTO `c_prename` VALUES ('890', 'พระครูสุพจน์วราภรณ์', 'พระครูสุพจน์วราภรณ์');
INSERT INTO `c_prename` VALUES ('891', 'พระครูไพโรจน์อริญชัย', 'พระครูไพโรจน์อริญชัย');
INSERT INTO `c_prename` VALUES ('892', 'พระครูสุนทรคณาภิรักษ์', 'พระครูสุนทรคณาภิรักษ์');
INSERT INTO `c_prename` VALUES ('893', 'พระสรภาณโกศล', 'พระสรภาณโกศล');
INSERT INTO `c_prename` VALUES ('894', 'พระครูประโชติธรรมรัตน์', 'พระครูประโชติธรรมรัตน์');
INSERT INTO `c_prename` VALUES ('895', 'พระครูจารุธรรมกิตติ์', 'พระครูจารุธรรมกิตติ์');
INSERT INTO `c_prename` VALUES ('896', 'พระครูพิทักษ์พรหมรังษี', 'พระครูพิทักษ์พรหมรังษี');
INSERT INTO `c_prename` VALUES ('897', 'พระศรีปริยัติบัณฑิต', 'พระศรีปริยัติบัณฑิต');
INSERT INTO `c_prename` VALUES ('898', 'พระครูพุทธิธรรมานุศาสน์', 'พระครูพุทธิธรรมานุศาสน์');
INSERT INTO `c_prename` VALUES ('899', 'พระธรรมเมธาจารย์', 'พระธรรมเมธาจารย์');
INSERT INTO `c_prename` VALUES ('900', 'พระครูกิตติกาญจนวงศ์', 'พระครูกิตติกาญจนวงศ์');
INSERT INTO `c_prename` VALUES ('901', 'พระครูปลัดสัมพิพัฒนวิริยาจารย์', 'พระครูปลัดสัมพิพัฒนวิริยาจารย์');
INSERT INTO `c_prename` VALUES ('902', 'พระครูศีลกันตาภรณ์', 'พระครูศีลกันตาภรณ์');
INSERT INTO `c_prename` VALUES ('903', 'พระครูประกาศพุทธพากย์', 'พระครูประกาศพุทธพากย์');
INSERT INTO `c_prename` VALUES ('904', 'พระครูอมรวิสุทธิคุณ', 'พระครูอมรวิสุทธิคุณ');
INSERT INTO `c_prename` VALUES ('905', 'พระครูสุทัศน์ธรรมาภิรม', 'พระครูสุทัศน์ธรรมาภิรม');
INSERT INTO `c_prename` VALUES ('906', 'พระครูอุปถัมภ์วชิโรภาส', 'พระครูอุปถัมภ์วชิโรภาส');
INSERT INTO `c_prename` VALUES ('907', 'พระครูสุนทรสมณคุณ', 'พระครูสุนทรสมณคุณ');
INSERT INTO `c_prename` VALUES ('908', 'พระพรหมมุนี', 'พระพรหมมุนี');
INSERT INTO `c_prename` VALUES ('909', 'พระครูสิริคุณารักษ์', 'พระครูสิริคุณารักษ์');
INSERT INTO `c_prename` VALUES ('910', 'พระครูวิชิตพัฒนคุณ', 'พระครูวิชิตพัฒนคุณ');
INSERT INTO `c_prename` VALUES ('911', 'พระครูพิบูลโชติธรรม', 'พระครูพิบูลโชติธรรม');
INSERT INTO `c_prename` VALUES ('912', 'พระพิศาลสารคุณ', 'พระพิศาลสารคุณ');
INSERT INTO `c_prename` VALUES ('913', 'พระรัตนมงคลวิสุทธ์', 'พระรัตนมงคลวิสุทธ์');
INSERT INTO `c_prename` VALUES ('914', 'พระครูโสภณคุณานุกูล', 'พระครูโสภณคุณานุกูล');
INSERT INTO `c_prename` VALUES ('915', 'พระครูผาสุกวิหารการ', 'พระครูผาสุกวิหารการ');
INSERT INTO `c_prename` VALUES ('916', 'พระครูวชิรวุฒิกร', 'พระครูวชิรวุฒิกร');
INSERT INTO `c_prename` VALUES ('917', 'พระครูกาญจนยติกิจ', 'พระครูกาญจนยติกิจ');
INSERT INTO `c_prename` VALUES ('918', 'พระครูบวรรัตนวงศ์', 'พระครูบวรรัตนวงศ์');
INSERT INTO `c_prename` VALUES ('919', 'พระราชพัชราภรณ์', 'พระราชพัชราภรณ์');
INSERT INTO `c_prename` VALUES ('920', 'พระครูพิพิธอุดมคุณ', 'พระครูพิพิธอุดมคุณ');
INSERT INTO `c_prename` VALUES ('921', 'องสุตบทบวร', 'องสุตบทบวร');
INSERT INTO `c_prename` VALUES ('922', 'พระครูจันทเขมคุณ', 'พระครูจันทเขมคุณ');
INSERT INTO `c_prename` VALUES ('923', 'พระครูศีลสารวิสุทธิ์', 'พระครูศีลสารวิสุทธิ์');
INSERT INTO `c_prename` VALUES ('924', 'พระครูสุธรรมโสภิต', 'พระครูสุธรรมโสภิต');
INSERT INTO `c_prename` VALUES ('925', 'พระครูอุเทศธรรมนิวิฐ', 'พระครูอุเทศธรรมนิวิฐ');
INSERT INTO `c_prename` VALUES ('926', 'พระครูบรรณวัตร', 'พระครูบรรณวัตร');
INSERT INTO `c_prename` VALUES ('927', 'พระครูวิสุทธาจาร', 'พระครูวิสุทธาจาร');
INSERT INTO `c_prename` VALUES ('928', 'พระครูสุนทรวรวัฒน์', 'พระครูสุนทรวรวัฒน์');
INSERT INTO `c_prename` VALUES ('929', 'พระเทพชลธารมุนี ศรีชลบุราจารย์', 'พระเทพชลธารมุนี ศรีชลบุราจารย์');
INSERT INTO `c_prename` VALUES ('930', 'พระครูโสภณสมุทรคุณ', 'พระครูโสภณสมุทรคุณ');
INSERT INTO `c_prename` VALUES ('931', 'พระราชเมธาภรณ์', 'พระราชเมธาภรณ์');
INSERT INTO `c_prename` VALUES ('932', 'พระครูศรัทธาธรรมโสภณ', 'พระครูศรัทธาธรรมโสภณ');
INSERT INTO `c_prename` VALUES ('933', 'พระครูสังฆบริรักษ์', 'พระครูสังฆบริรักษ์');
INSERT INTO `c_prename` VALUES ('934', 'พระมหานายก', 'พระมหานายก');
INSERT INTO `c_prename` VALUES ('935', 'พระครูโอภาสสมาจาร', 'พระครูโอภาสสมาจาร');
INSERT INTO `c_prename` VALUES ('936', 'พระครูศรีธวัชคุณาภรณ์', 'พระครูศรีธวัชคุณาภรณ์');
INSERT INTO `c_prename` VALUES ('937', 'พระครูโสภิตวัชรกิจ', 'พระครูโสภิตวัชรกิจ');
INSERT INTO `c_prename` VALUES ('938', 'พระราชวชิราภรณ์', 'พระราชวชิราภรณ์');
INSERT INTO `c_prename` VALUES ('939', 'พระครูสุนทรวรธัช', 'พระครูสุนทรวรธัช');
INSERT INTO `c_prename` VALUES ('940', 'พระครูอาทรโพธิกิจ', 'พระครูอาทรโพธิกิจ');
INSERT INTO `c_prename` VALUES ('941', 'พระครูวิบูลกาญจนกิจ', 'พระครูวิบูลกาญจนกิจ');
INSERT INTO `c_prename` VALUES ('942', 'พระพรหมวชิรญาณ', 'พระพรหมวชิรญาณ');
INSERT INTO `c_prename` VALUES ('943', 'พระครูสุพจน์วรคุณ', 'พระครูสุพจน์วรคุณ');
INSERT INTO `c_prename` VALUES ('944', 'พระราชวิมลโมลี', 'พระราชาวิมลโมลี');
INSERT INTO `c_prename` VALUES ('945', 'พระครูอมรธรรมนายก', 'พระครูอมรธรรมนายก');
INSERT INTO `c_prename` VALUES ('946', 'พระครูพิศิษฎ์ศาสนการ', 'พระครูพิศิษฎ์ศาสนการ');
INSERT INTO `c_prename` VALUES ('947', 'พระครูเมธีธรรมานุยุต', 'พระครูเมธีธรรมานุยุต');
INSERT INTO `c_prename` VALUES ('948', 'พระครูปิยสีลสาร', 'พระครูปิยสีลสาร');
INSERT INTO `c_prename` VALUES ('949', 'พระครูสถิตบุญวัฒน์', 'พระครูสถิตบุญวัฒน์');
INSERT INTO `c_prename` VALUES ('950', 'พระครูนิเทศปิยธรรม', 'พระครูนิเทศปิยธรรม');
INSERT INTO `c_prename` VALUES ('951', 'พระครูวิสุทธิ์กิจจานุกูล', 'พระครูวิสุทธิ์กิจจานุกูล');
INSERT INTO `c_prename` VALUES ('952', 'พระครูสถิตย์บุญวัฒน์', 'พระครูสถิตย์บุญวัฒน์');
INSERT INTO `c_prename` VALUES ('953', 'พระครูประโชติธรรมานุกูล', 'พระครูประโชติธรรมานุกูล');
INSERT INTO `c_prename` VALUES ('954', 'พระเทพญาณกวี', 'พระเทพญาณกวี');
INSERT INTO `c_prename` VALUES ('955', 'พระครูพิพัฒน์ชินวงศ์', 'พระครูพิพัฒน์ชินวงศ์');
INSERT INTO `c_prename` VALUES ('956', 'พระครูสมุทรขันตยาภรณ์', 'พระครูสมุทรขันตยาภรณ์');
INSERT INTO `c_prename` VALUES ('957', 'พระครูภาวนาวรกิจ', 'พระครูภาวนาวรกิจ');
INSERT INTO `c_prename` VALUES ('958', 'พระครูศรีศาสนคุณ', 'พระครูศรีศาสนคุณ');
INSERT INTO `c_prename` VALUES ('959', 'พระครูวิบูลย์ธรรมศาสก์', 'พระครูวิบูลย์ธรรมศาสก์');

-- ----------------------------
-- Table structure for c_role
-- ----------------------------
DROP TABLE IF EXISTS `c_role`;
CREATE TABLE `c_role` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_role
-- ----------------------------
INSERT INTO `c_role` VALUES ('0', '0-New Signup');
INSERT INTO `c_role` VALUES ('1', '1-System Admin');
INSERT INTO `c_role` VALUES ('2', '2-Care Manager');
INSERT INTO `c_role` VALUES ('3', '3-Care Giver');

-- ----------------------------
-- Table structure for c_tai
-- ----------------------------
DROP TABLE IF EXISTS `c_tai`;
CREATE TABLE `c_tai` (
  `id` varchar(255) NOT NULL,
  `val` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_tai
-- ----------------------------
INSERT INTO `c_tai` VALUES ('B3', 'B3');
INSERT INTO `c_tai` VALUES ('C2', 'C2');
INSERT INTO `c_tai` VALUES ('C3', 'C3');
INSERT INTO `c_tai` VALUES ('C4', 'C4');
INSERT INTO `c_tai` VALUES ('I1', 'I1');
INSERT INTO `c_tai` VALUES ('I2', 'I2');
INSERT INTO `c_tai` VALUES ('I3', 'I3');

-- ----------------------------
-- Table structure for c_template
-- ----------------------------
DROP TABLE IF EXISTS `c_template`;
CREATE TABLE `c_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_name` varchar(255) DEFAULT NULL,
  `templat_text` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_template
-- ----------------------------
INSERT INTO `c_template` VALUES ('1', 'goal', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-');
INSERT INTO `c_template` VALUES ('2', 'short', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....');
INSERT INTO `c_template` VALUES ('3', 'fct', '.... ครั้ง/เดือน');
INSERT INTO `c_template` VALUES ('4', 'cg', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที');

-- ----------------------------
-- Table structure for c_typearea
-- ----------------------------
DROP TABLE IF EXISTS `c_typearea`;
CREATE TABLE `c_typearea` (
  `typeareacode` varchar(1) NOT NULL,
  `typeareaname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`typeareacode`),
  KEY `idx` (`typeareacode`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_typearea
-- ----------------------------
INSERT INTO `c_typearea` VALUES ('1', 'มีชื่ออยู่ตามทะเบียนบ้านในเขตรับผิดชอบและอยู่จริง');
INSERT INTO `c_typearea` VALUES ('2', 'มีชื่ออยู่ตามทะเบีบนบ้านในเขตรับผิดชอบแต่ตัวไม่อยู่จริง');
INSERT INTO `c_typearea` VALUES ('3', 'มาอาศัยอยู่ในเขตรับผิดชอบ(ตามทะเบียนบ้านในเขตรับผิดชอบ)แต่ทะเบียนบ้านอยู่นอกเขตรับผิดชอบ');
INSERT INTO `c_typearea` VALUES ('4', 'ที่อาศัยอยู่นอกเขตรับผิดชอบและทะเบียนบ้านไม่อยู่ในเขตรับผิดชอบ เข้ามารับบริการหรือเคยอยู่ในเขตรับผิดชอบ');
INSERT INTO `c_typearea` VALUES ('5', 'มาอาศัยในเขตรับผิดชอบแต่ไม่ได้อยู่ตามทะเบียนบ้านในเขตรับผิดชอบ เช่น คนเร่ร่อน ไม่มีที่พักอาศัย เป็นต้น');

-- ----------------------------
-- Table structure for c_version
-- ----------------------------
DROP TABLE IF EXISTS `c_version`;
CREATE TABLE `c_version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `version` varchar(255) DEFAULT NULL,
  `note1` varchar(255) DEFAULT NULL,
  `note2` varchar(255) DEFAULT NULL,
  `note3` varchar(255) DEFAULT NULL,
  `dupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of c_version
-- ----------------------------
INSERT INTO `c_version` VALUES ('1', '1.170101', 'Test', null, null, '2017-01-03 22:59:00');
INSERT INTO `c_version` VALUES ('2', '1.170105', 'Beta', null, null, '2017-01-03 23:07:34');

-- ----------------------------
-- Table structure for file_community_activity
-- ----------------------------
DROP TABLE IF EXISTS `file_community_activity`;
CREATE TABLE `file_community_activity` (
  `HOSPCODE` varchar(5) NOT NULL,
  `VID` varchar(8) NOT NULL,
  `DATE_START` date NOT NULL,
  `DATE_FINISH` date DEFAULT NULL,
  `COMACTIVITY` varchar(7) NOT NULL,
  `PROVIDER` varchar(15) DEFAULT NULL,
  `D_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`HOSPCODE`,`VID`,`DATE_START`,`COMACTIVITY`),
  KEY `idx1` (`HOSPCODE`,`VID`),
  KEY `idx2` (`DATE_START`),
  KEY `idx3` (`DATE_FINISH`),
  KEY `idx4` (`COMACTIVITY`),
  KEY `idx5` (`HOSPCODE`,`PROVIDER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_community_activity
-- ----------------------------

-- ----------------------------
-- Table structure for file_community_service
-- ----------------------------
DROP TABLE IF EXISTS `file_community_service`;
CREATE TABLE `file_community_service` (
  `HOSPCODE` varchar(5) NOT NULL,
  `PID` varchar(15) NOT NULL,
  `SEQ` varchar(16) NOT NULL,
  `DATE_SERV` date NOT NULL,
  `COMSERVICE` varchar(7) NOT NULL,
  `PROVIDER` varchar(15) DEFAULT NULL,
  `D_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`HOSPCODE`,`PID`,`SEQ`,`COMSERVICE`),
  KEY `idx1` (`HOSPCODE`,`PID`),
  KEY `idx2` (`HOSPCODE`),
  KEY `idx3` (`DATE_SERV`),
  KEY `idx4` (`COMSERVICE`),
  KEY `idx5` (`HOSPCODE`,`PROVIDER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_community_service
-- ----------------------------

-- ----------------------------
-- Table structure for file_specialpp
-- ----------------------------
DROP TABLE IF EXISTS `file_specialpp`;
CREATE TABLE `file_specialpp` (
  `HOSPCODE` varchar(5) NOT NULL,
  `PID` varchar(15) NOT NULL,
  `SEQ` varchar(16) DEFAULT NULL,
  `DATE_SERV` date NOT NULL,
  `SERVPLACE` char(1) NOT NULL,
  `PPSPECIAL` varchar(6) NOT NULL,
  `PPSPLACE` varchar(5) DEFAULT NULL,
  `PROVIDER` varchar(15) DEFAULT NULL,
  `D_UPDATE` datetime NOT NULL,
  PRIMARY KEY (`HOSPCODE`,`PID`,`DATE_SERV`,`PPSPECIAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of file_specialpp
-- ----------------------------

-- ----------------------------
-- Table structure for health
-- ----------------------------
DROP TABLE IF EXISTS `health`;
CREATE TABLE `health` (
  `id` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `note1` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of health
-- ----------------------------

-- ----------------------------
-- Table structure for patient
-- ----------------------------
DROP TABLE IF EXISTS `patient`;
CREATE TABLE `patient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` varchar(13) DEFAULT NULL COMMENT 'เลข13หลัก',
  `prename` varchar(255) DEFAULT NULL COMMENT 'คำนำหน้า',
  `name` varchar(255) DEFAULT NULL COMMENT 'ชื่อ',
  `lname` varchar(255) DEFAULT NULL COMMENT 'สกุล',
  `sex` varchar(4) DEFAULT NULL,
  `birth` date DEFAULT NULL COMMENT 'เกิด',
  `age_y` int(11) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL COMMENT 'จังหวัด',
  `district` varchar(255) DEFAULT NULL COMMENT 'อำเภอ',
  `subdistrict` varchar(255) DEFAULT NULL COMMENT 'ตำบล',
  `village_no` varchar(255) DEFAULT NULL COMMENT 'หมู่ที่',
  `village_name` varchar(255) DEFAULT NULL COMMENT 'หมู่บ้าน',
  `house_no` varchar(255) DEFAULT NULL COMMENT 'บลท.',
  `lat` varchar(255) DEFAULT NULL,
  `lon` varchar(255) DEFAULT NULL,
  `typearea` int(11) DEFAULT NULL COMMENT 'ประเภทอยู่อาศัย',
  `nation` varchar(255) DEFAULT NULL COMMENT 'สัญชาติ',
  `region` varchar(255) DEFAULT NULL COMMENT 'เชื้อชาติ',
  `hospcode` varchar(5) DEFAULT NULL COMMENT 'พืนที่ของหน่วยบริการ',
  `pid` varchar(255) DEFAULT NULL,
  `refer_from` varchar(255) DEFAULT NULL,
  `disease` varchar(255) DEFAULT NULL,
  `discharge` varchar(255) DEFAULT NULL COMMENT 'การจำหน่าย',
  `cm_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `adl` int(255) DEFAULT NULL,
  `tai` varchar(255) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL COMMENT 'จำแนกกลุ่ม',
  `class_name` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `cousin` text,
  `tel` varchar(255) DEFAULT NULL,
  `dupdate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of patient
-- ----------------------------
INSERT INTO `patient` VALUES ('2', '3650100810889', 'นาย', 'สมหมาย', 'ใจเย็น', 'ชาย', '1949-10-09', '67', 'พิษณุโลก', 'เมือง', 'เนินกุ่ม', '3', 'ท่าโรง', '10/8', '', '', '1', 'ไทย', 'ไทย', '07478', null, 'โรงพยาบาลพุทธชินราช', '', '9', null, '14', '11', 'C3', '2', 'ติดบ้าน-2', 'blue', 'นาย ก,นาง ข', '014875441', '2017-01-08');
INSERT INTO `patient` VALUES ('4', '1145744123445', 'นาย', 'สะสม', 'มั่งคั่ง', 'ชาย', '1955-10-11', '61', 'พิษณุโลก', 'เมือง', 'เนินกุ่ม', '2', 'ตะวันตก', '11/2', '', '', '1', 'ไทย', 'ไทย', '07477', null, '', '', '9', null, '13', '2', 'I3', '3', 'ติดเตียง-1', 'red', '', '', '2017-01-06');
INSERT INTO `patient` VALUES ('5', '3650100810888', 'นาย', 'ใจดี', 'มีสุข', 'ชาย', '1951-01-01', '66', 'พิษณุโลก', 'เมือง', 'เนินกุ่ม', '3', 'ท่าโรง', '10/8', '', '', '1', 'ไทย', 'ไทย', '07477', null, '', '', '9', null, '13', '10', 'C4', '2', 'ติดบ้าน-2', 'yellow', null, null, '2017-01-04');
INSERT INTO `patient` VALUES ('6', '3650100810880', 'นาย', 'สายัน', 'นิรันดร', 'ชาย', '1950-01-17', '66', 'พิษณุโลก', 'เมือง', 'เนินกุ่ม', '3', 'งิ้วงาม', '67/3', '', '', '1', 'ไทย', 'ไทย', '07477', null, '', '', '9', null, '13', '11', 'C4', '2', 'ติดบ้าน-2', 'red', null, null, '2017-01-05');
INSERT INTO `patient` VALUES ('7', '7894522101445', 'นาย', 'ปองพล', 'ค้ำคุณ', 'ชาย', '1944-11-14', '72', 'พิษณุโลก', 'เนินมะปราง', 'เนินกุ่ม', '10', 'เนินมะกอก', '25/4', '', '', '1', 'ไทย', 'ไทย', '07477', null, '', '', '9', null, '10', '9', 'C3', '2', 'ติดบ้าน-2', 'red', null, null, '2017-01-05');
INSERT INTO `patient` VALUES ('8', '7777777777777', 'นาย', 'อดิศร', 'สร้อยทอง', 'ชาย', '1945-01-16', '71', 'พิษณุโลก', 'เมือง', 'เนินกุ่ม', '3', 'ท่าโรง', '25/4', '', '', '1', 'ไทย', 'ไทย', '07477', null, '', '', '9', null, '13', '5', 'I1', '4', 'ติดเตียง-2', 'blue', 'ญาติเยอะ', '112233', '2017-01-08');

-- ----------------------------
-- Table structure for plan
-- ----------------------------
DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hospcode` varchar(5) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `date_create` date DEFAULT NULL COMMENT 'วันที่ประเมิน',
  `rapid_code` varchar(255) DEFAULT NULL COMMENT 'ความร่งด่วน',
  `adl` int(11) DEFAULT NULL,
  `adl_text` varchar(255) DEFAULT NULL,
  `tai` varchar(255) DEFAULT NULL,
  `tai_text` varchar(255) DEFAULT NULL,
  `budget_need` varchar(255) DEFAULT NULL,
  `dx1` varchar(255) DEFAULT NULL,
  `dx2` varchar(255) DEFAULT NULL,
  `drug` text,
  `note_before_plan` text COMMENT 'ประเมินก่อนให้บริการ วางแผน CP',
  `fct_care_time` text COMMENT 'ความถี่ดูแลโดย FCT',
  `cg_care_time` text COMMENT 'ความถี่ดูแลโดย Care Giver',
  `update_plan` text COMMENT 'ความถี่ประเมินผล-ปรับแผน',
  `patient_mind` text COMMENT 'แนวคิดของผู้ใช้บริการและครอบครัวที่มีต่อการด ารงชีวิต',
  `live_problem` text COMMENT 'ประเด็นปัญหาในการด ารงชีวิต',
  `long_goal` text,
  `short_goal` text,
  `careful` text COMMENT 'ข้อควรระวังในการให้บริการ',
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plan
-- ----------------------------
INSERT INTO `plan` VALUES ('6', null, '2', '2017-01-06', 'blue', '3', 'ติดเตียง', 'I1', 'กลุ่มที่ 4;ติดเตียง-2', '9000', '', '', '1)ยาพรารา\r\n2)ยาเบาหวาน', '', '1.... ครั้ง/เดือน', '3.... ครั้ง/สัปดาห์ ครั้งละประมาณ  80....  นาที', '', '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบ าบัด/นักกิจกรรมบ าบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน', '', '2017-01-08 15:48:34');
INSERT INTO `plan` VALUES ('9', '07477', '8', '2017-01-08', 'blue', '12', 'ติดเตียง', 'C3', 'กลุ่มที่ 2;ติดบ้าน-2', '', '', '', '', null, '.... ครั้ง/เดือน', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที', null, '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....', '', '2017-01-08 16:08:51');
INSERT INTO `plan` VALUES ('10', '07477', '4', '2017-01-08', 'red', '2', 'ติดเตียง', 'I3', 'กลุ่มที่ 3;ติดเตียง-1', '', '', '', '', null, '.... ครั้ง/เดือน', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที', null, '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....', '', '2017-01-08 15:48:13');
INSERT INTO `plan` VALUES ('11', '07477', '5', '2017-01-08', 'yellow', '10', 'ติดบ้าน', 'C4', 'กลุ่มที่ 2;ติดบ้าน-2', '', '', '', '', null, '.... ครั้ง/เดือน', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที', null, '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....', '', '2017-01-08 15:44:56');
INSERT INTO `plan` VALUES ('12', '07477', '6', '2017-01-08', 'red', '11', 'ติดบ้าน', 'C4', 'กลุ่มที่ 2;ติดบ้าน-2', '', '', '', '', null, '.... ครั้ง/เดือน', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที', null, '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....', '', '2017-01-08 15:45:38');
INSERT INTO `plan` VALUES ('13', '07477', '7', '2017-01-08', 'red', '9', 'ติดบ้าน', 'C3', 'กลุ่มที่ 2;ติดบ้าน-2', '', '', '', '', null, '.... ครั้ง/เดือน', '.... ครั้ง/สัปดาห์ ครั้งละประมาณ ....  นาที', null, '', '', '1. การดูแลด้านการพยาบาล โดยแพทย์/พยาบาลวิชาชีพ\r\n-\r\n2. การฟื้นฟูสภาพร่างกาย โดยนักกายภาพบำบัด/นักกิจกรรมบำบัด/นักการแพทย์แผนไทย/แพทย์ทางเลือก\r\n-\r\n3. การดูแลด้านโภชนาการ โดยนักโภชนาการ\r\n-\r\n4. การดูแลด้านเภสัชกรรม โดยเภสัชกร\r\n-\r\n5. การดูแลด้านสุภาพช่องปาก โดยทันตแพทย์/ทันตาภิบาล\r\n-\r\n6. การดูแลด้านสุขภาพจิต โดยจิตแพทย์/พยาบาลจิตเวช/นักจิตวิทยา\r\n-\r\n7. การช่วยเหลืออื่นๆ\r\n-', '1.ได้รับการดูแลช่วยเหลือกิจวัตรประจำวัน   วันบรรลุเป้าหมาย  ทุกวัน\r\n2.                                                           วันบรรลุเป้าหมาย  .....\r\n3.                                                           วันบรรลุเป้าหมาย  .....', '', '2017-01-08 15:46:08');

-- ----------------------------
-- Table structure for plan_week
-- ----------------------------
DROP TABLE IF EXISTS `plan_week`;
CREATE TABLE `plan_week` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_id` int(11) DEFAULT NULL,
  `patient_id` varchar(255) NOT NULL,
  `title` text,
  `start_date` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `bg_color` varchar(255) DEFAULT NULL,
  `border_color` varchar(255) DEFAULT NULL,
  `text_color` varchar(255) DEFAULT NULL,
  `provider_id` varchar(255) DEFAULT NULL,
  `care_date` date DEFAULT NULL,
  `care_time` time DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `height` varchar(255) DEFAULT NULL,
  `waist` decimal(11,2) DEFAULT NULL,
  `pulse` varchar(255) DEFAULT NULL,
  `temp` varchar(255) DEFAULT NULL,
  `sbp` varchar(255) DEFAULT NULL,
  `dbp` varchar(255) DEFAULT NULL,
  `rr` varchar(255) DEFAULT NULL,
  `sugar` varchar(255) DEFAULT NULL,
  `note` text,
  `is_done` varchar(1) DEFAULT NULL,
  `d_create` datetime DEFAULT NULL,
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `plan` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plan_week
-- ----------------------------
INSERT INTO `plan_week` VALUES ('1', null, '2', 'ดูแลโดยCG', '2017-01-09', '08:00:00', null, '09:00:00', null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 17:08:30', null);
INSERT INTO `plan_week` VALUES ('2', null, '2', 'ดูแลโดยCG', '2017-01-10', '08:00:00', null, '09:00:00', null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 17:08:30', null);
INSERT INTO `plan_week` VALUES ('3', null, '2', 'ดูแลโดยCG', '2017-01-11', '08:00:00', null, '09:00:00', null, null, null, null, '13', '2017-01-08', '12:35:41', null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 17:08:30', '2017-01-08 12:35:41');
INSERT INTO `plan_week` VALUES ('6', null, '2', 'ดูแลโดยCG', '2017-01-14', '08:00:00', null, '09:00:00', null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 17:08:30', null);
INSERT INTO `plan_week` VALUES ('7', null, '2', 'ดูแลโดยCG', '2017-01-15', '08:00:00', null, '09:00:00', null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 17:08:30', null);
INSERT INTO `plan_week` VALUES ('31', null, '2', 'ดูแลโดยCG', '2017-01-08', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 21:11:46', null);
INSERT INTO `plan_week` VALUES ('43', null, '2', 'ดูแลโดยCG', '2017-01-06', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-07 22:52:15', null);
INSERT INTO `plan_week` VALUES ('44', null, '2', 'ดูแลโดยCG', '2017-01-07', '08:00:00', null, null, null, null, null, null, '13', '2017-01-08', '12:36:08', null, null, null, null, null, null, null, null, null, null, '1', '2017-01-07 22:52:15', '2017-01-08 12:36:08');
INSERT INTO `plan_week` VALUES ('45', null, '2', 'ดูแลโดยCG', '2017-01-08', '08:00:00', null, null, null, null, null, null, '13', '2017-01-08', '12:35:46', null, null, null, null, null, null, null, null, null, null, '1', '2017-01-07 22:52:15', '2017-01-08 12:35:46');
INSERT INTO `plan_week` VALUES ('47', null, '2', 'ดูแลโดยCG', '2017-01-23', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('48', null, '2', 'ดูแลโดยCG', '2017-01-24', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('49', null, '2', 'ดูแลโดยCG', '2017-01-25', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('50', null, '2', 'ดูแลโดยCG', '2017-01-26', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('51', null, '2', 'ดูแลโดยCG', '2017-01-27', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('52', null, '2', 'ดูแลโดยCG', '2017-01-28', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('53', null, '2', 'ดูแลโดยCG', '2017-01-29', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 09:15:37', null);
INSERT INTO `plan_week` VALUES ('55', null, '2', 'ดูแลโดยCG', '2017-01-30', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('56', null, '2', 'ดูแลโดยCG', '2017-01-31', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('57', null, '2', 'ดูแลโดยCG', '2017-02-01', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('58', null, '2', 'ดูแลโดยCG', '2017-02-02', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('59', null, '2', 'ดูแลโดยCG', '2017-02-03', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('60', null, '2', 'ดูแลโดยCG', '2017-02-04', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);
INSERT INTO `plan_week` VALUES ('61', null, '2', 'ดูแลโดยCG', '2017-02-05', '08:00:00', null, null, null, null, null, null, '13', null, null, null, null, null, null, null, null, null, null, null, null, null, '2017-01-08 11:19:58', null);

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `patient_id` int(11) NOT NULL,
  `cm_id` int(11) DEFAULT NULL,
  `cg_id` int(11) DEFAULT NULL,
  `cc` text,
  `pi` text,
  `fh` text,
  `ph` text,
  `mh` text,
  `nu` text,
  `he` text,
  `sh` text,
  `pe` text,
  `mse` text,
  `pl` text,
  `pm` text,
  `co` text,
  `d_update` datetime DEFAULT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profile
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `role` int(11) NOT NULL,
  `role_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_cid` varchar(13) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_prename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `u_lname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `officer_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_position` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'W_D4LHoMYSyV1c8Lv4VgYlXt5SU1aSsb', '1234', null, 'admin@localhost.com', '10', '2', '2-Care Manager', '111', 'นาย', 'อุเทน', 'จาดยางโทน', '07478', null, null, '1482803441', '1482803441');
INSERT INTO `user` VALUES ('5', 'sa', 'jH-cX5qVRZzTWjR5Jml4gPgMGDTjqlvn', 'sa', null, 'admin1@localhost.comm', '10', '3', '3-Care Giver', '1234566789000', 'sdsd', 'sdsdsd', 'sdsdsd', '07477', null, null, '1482807273', '1482807273');
INSERT INTO `user` VALUES ('9', 'adminn', 'Z28DJIIcjF0Z9pIzYMCkRjH3uKTfnwHN', '1234', null, 'd@ffff.com', '10', '2', '2-Care Manager', '3650100214005', 'นายแพทย์', 'กกกก', 'กกกก', '07478', null, null, '1483424465', '1483424465');
INSERT INTO `user` VALUES ('10', 'root', 'IGUsnXwDtoBq810TvnLJNr2nywYaBHxU', '112233', null, 'tehnnn@gmail.com', '10', '3', '3-Care Giver', '3650100810887', 'นาย', 'CG', 'จาดยางโทน', '07477', null, null, '1483424840', '1483424840');
INSERT INTO `user` VALUES ('11', 'adm', 'RnqN-o6KgYCwER6wmhjkbrfnVAko60uP', '1234', null, 'ttttt@ffff.com', '10', '0', '0-New Signup', '3650122457884', 'นาย', 'อุเทน', 'จาดยางโทน', 'all', null, null, '1483430675', '1483430675');
INSERT INTO `user` VALUES ('12', 'cm', 'U-aymENuLjivSJWpakk8-0KwIRqh64wu', '112233', null, 'cm@ddd.com', '10', '2', '2-Care Manager', '1111111112345', 'CM', 'CM', 'Care Manager', '07477', null, null, '1483602756', '1483602756');
INSERT INTO `user` VALUES ('13', 'cg', 'PD0n29leKMmP-5Llj9sjdpw7WtIxcigZ', '112233', null, 'cg@ffff.com', '10', '3', '3-Care Giver', '1111111114557', 'นาย', 'เกื้อกูล', 'dd', '07477', null, null, '1483673302', '1483673302');
INSERT INTO `user` VALUES ('14', 'nan', 'Ni3Nyl9c7PJ-O0BEI0H7Yybq77j9BwvV', '112233', null, 'tttddd@gg.com', '10', '3', '3-Care Giver', '5555555555555', 'นาย', 'น่าน', 'น้ำเหนือ', '07478', null, null, '1483882614', '1483882614');

-- ----------------------------
-- Table structure for user_log
-- ----------------------------
DROP TABLE IF EXISTS `user_log`;
CREATE TABLE `user_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `login_date` datetime DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_log
-- ----------------------------
INSERT INTO `user_log` VALUES ('1', 'admin', '2017-01-03 23:12:53', '::1');
INSERT INTO `user_log` VALUES ('2', 'sa', '2017-01-03 23:14:56', '::1');
INSERT INTO `user_log` VALUES ('3', 'root', '2017-01-03 23:19:58', '::1');
INSERT INTO `user_log` VALUES ('4', 'admin', '2017-01-04 00:16:25', '::1');
INSERT INTO `user_log` VALUES ('5', 'admin', '2017-01-05 12:31:25', '::1');
INSERT INTO `user_log` VALUES ('6', 'root', '2017-01-05 14:44:03', '::1');
INSERT INTO `user_log` VALUES ('7', 'cm', '2017-01-05 14:52:43', '::1');
INSERT INTO `user_log` VALUES ('8', 'root', '2017-01-05 19:12:30', '::1');
INSERT INTO `user_log` VALUES ('9', 'admin', '2017-01-05 19:17:03', '::1');
INSERT INTO `user_log` VALUES ('10', 'cm', '2017-01-05 19:17:15', '::1');
INSERT INTO `user_log` VALUES ('11', 'admin', '2017-01-05 22:06:54', '192.168.1.6');
INSERT INTO `user_log` VALUES ('12', 'admin', '2017-01-05 22:39:25', '192.168.1.6');
INSERT INTO `user_log` VALUES ('13', 'admin', '2017-01-06 08:04:58', '::1');
INSERT INTO `user_log` VALUES ('14', 'cm', '2017-01-06 08:31:22', '::1');
INSERT INTO `user_log` VALUES ('15', 'root', '2017-01-06 08:32:12', '::1');
INSERT INTO `user_log` VALUES ('16', 'admin', '2017-01-06 08:34:54', '::1');
INSERT INTO `user_log` VALUES ('17', 'cm', '2017-01-06 08:35:25', '::1');
INSERT INTO `user_log` VALUES ('18', 'cg', '2017-01-06 10:29:19', '::1');
INSERT INTO `user_log` VALUES ('19', 'admin', '2017-01-06 10:31:10', '::1');
INSERT INTO `user_log` VALUES ('20', 'cg', '2017-01-06 10:32:50', '::1');
INSERT INTO `user_log` VALUES ('21', 'admin', '2017-01-06 10:33:43', '::1');
INSERT INTO `user_log` VALUES ('22', 'admin', '2017-01-06 10:34:27', '::1');
INSERT INTO `user_log` VALUES ('23', 'cg', '2017-01-06 10:34:38', '::1');
INSERT INTO `user_log` VALUES ('24', 'cg', '2017-01-06 10:39:29', '::1');
INSERT INTO `user_log` VALUES ('25', 'admin', '2017-01-06 10:49:23', '::1');
INSERT INTO `user_log` VALUES ('26', 'cg', '2017-01-06 11:27:55', '::1');
INSERT INTO `user_log` VALUES ('27', 'admin', '2017-01-06 11:48:56', '::1');
INSERT INTO `user_log` VALUES ('28', 'cg', '2017-01-06 11:49:49', '::1');
INSERT INTO `user_log` VALUES ('29', 'admin', '2017-01-06 11:51:01', '::1');
INSERT INTO `user_log` VALUES ('30', 'cg', '2017-01-06 20:58:34', '::1');
INSERT INTO `user_log` VALUES ('31', 'admin', '2017-01-06 21:10:35', '::1');
INSERT INTO `user_log` VALUES ('32', 'cg', '2017-01-06 21:40:34', '::1');
INSERT INTO `user_log` VALUES ('33', 'admin', '2017-01-06 21:43:41', '::1');
INSERT INTO `user_log` VALUES ('34', 'cg', '2017-01-06 21:47:47', '::1');
INSERT INTO `user_log` VALUES ('35', 'admin', '2017-01-06 21:54:02', '::1');
INSERT INTO `user_log` VALUES ('36', 'cg', '2017-01-06 22:00:37', '::1');
INSERT INTO `user_log` VALUES ('37', 'admin', '2017-01-06 22:17:18', '::1');
INSERT INTO `user_log` VALUES ('38', 'admin', '2017-01-06 22:35:12', '::1');
INSERT INTO `user_log` VALUES ('39', 'cg', '2017-01-06 22:42:05', '::1');
INSERT INTO `user_log` VALUES ('40', 'admin', '2017-01-06 22:46:09', '::1');
INSERT INTO `user_log` VALUES ('41', 'admin', '2017-01-06 22:50:33', '192.168.1.9');
INSERT INTO `user_log` VALUES ('42', 'cg', '2017-01-06 22:51:25', '192.168.1.9');
INSERT INTO `user_log` VALUES ('43', 'cg', '2017-01-07 09:10:25', '::1');
INSERT INTO `user_log` VALUES ('44', 'admin', '2017-01-07 09:15:48', '::1');
INSERT INTO `user_log` VALUES ('45', 'cg', '2017-01-07 09:18:15', '::1');
INSERT INTO `user_log` VALUES ('46', 'admin', '2017-01-07 09:24:01', '::1');
INSERT INTO `user_log` VALUES ('47', 'cg', '2017-01-07 09:46:41', '::1');
INSERT INTO `user_log` VALUES ('48', 'admin', '2017-01-07 12:42:12', '::1');
INSERT INTO `user_log` VALUES ('49', 'cg', '2017-01-07 14:59:15', '::1');
INSERT INTO `user_log` VALUES ('50', 'root', '2017-01-07 15:22:05', '192.168.1.227');
INSERT INTO `user_log` VALUES ('51', 'admin', '2017-01-07 15:25:05', '192.168.1.227');
INSERT INTO `user_log` VALUES ('52', 'admin', '2017-01-07 15:52:56', '::1');
INSERT INTO `user_log` VALUES ('53', 'cg', '2017-01-07 17:02:42', '::1');
INSERT INTO `user_log` VALUES ('54', 'admin', '2017-01-07 17:05:16', '::1');
INSERT INTO `user_log` VALUES ('55', 'admin', '2017-01-07 21:04:32', '::1');
INSERT INTO `user_log` VALUES ('56', 'admin', '2017-01-07 22:51:22', '192.168.1.7');
INSERT INTO `user_log` VALUES ('57', 'root', '2017-01-07 22:59:32', '192.168.1.7');
INSERT INTO `user_log` VALUES ('58', 'cg', '2017-01-07 23:00:29', '192.168.1.7');
INSERT INTO `user_log` VALUES ('59', 'admin', '2017-01-07 23:05:47', '192.168.1.7');
INSERT INTO `user_log` VALUES ('60', 'cg', '2017-01-08 11:46:28', '::1');
INSERT INTO `user_log` VALUES ('61', 'admin', '2017-01-08 11:55:32', '::1');
INSERT INTO `user_log` VALUES ('62', 'cg', '2017-01-08 12:30:03', '::1');
INSERT INTO `user_log` VALUES ('63', 'admin', '2017-01-08 15:39:47', '::1');
INSERT INTO `user_log` VALUES ('64', 'cg', '2017-01-08 19:41:12', '::1');
INSERT INTO `user_log` VALUES ('65', 'admin', '2017-01-08 19:45:09', '::1');
INSERT INTO `user_log` VALUES ('66', 'cg', '2017-01-08 20:22:53', '::1');
INSERT INTO `user_log` VALUES ('67', 'admin', '2017-01-08 20:23:55', '::1');
INSERT INTO `user_log` VALUES ('68', 'root', '2017-01-08 20:24:08', '::1');
INSERT INTO `user_log` VALUES ('69', 'admin', '2017-01-08 20:33:16', '::1');
INSERT INTO `user_log` VALUES ('70', 'nan', '2017-01-08 20:37:23', '::1');
INSERT INTO `user_log` VALUES ('71', 'admin', '2017-01-08 20:37:32', '::1');
INSERT INTO `user_log` VALUES ('72', 'nan', '2017-01-08 20:41:00', '::1');
INSERT INTO `user_log` VALUES ('73', 'admin', '2017-01-08 20:43:07', '::1');

-- ----------------------------
-- Table structure for visit
-- ----------------------------
DROP TABLE IF EXISTS `visit`;
CREATE TABLE `visit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_week_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `provider_id` int(11) DEFAULT NULL,
  `hospcode` varchar(5) DEFAULT NULL,
  `date_visit` date DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `subjective` text COMMENT 'ปัญหา/ความต้องการ ของผู้ปุวยและครอบครัว',
  `obj_weight` double(11,2) DEFAULT NULL COMMENT 'นน.(กก)',
  `obj_heigh` double(11,2) DEFAULT NULL COMMENT 'สส.(ซม)',
  `obj_bmi` double(11,2) DEFAULT NULL,
  `obj_temperature` double(11,2) DEFAULT NULL,
  `obj_pulse` int(11) DEFAULT NULL,
  `obj_rr` int(11) DEFAULT NULL,
  `obj_bp` varchar(255) DEFAULT NULL,
  `obj_adl` int(11) DEFAULT NULL,
  `asses_1` text COMMENT '1.การดูแลกิจวัตรประจำวันพื้นฐาน',
  `asses_2` text COMMENT '2. การดูแลผู้มีอุปกรณ์การแพทย์',
  `asses_3` text COMMENT '3. การให้ยา',
  `asses_4` text COMMENT '4. การท าแผล และการเช็ดตัวลดไข้',
  `asses_5` text COMMENT '5. การดูแลโภชนาการ',
  `asses_6` text COMMENT '6. การดูแลสุขภาพจิต',
  `asses_7` text COMMENT '7. การดูแลสภาพแวดล้อ',
  `asses_8` text COMMENT '8. การจัดกิจกรรมออกก าลังกาย/นันทนาการ',
  `asses_9` text COMMENT '9. การเฝูาสังเกตและการส่งต่อ',
  `job_result` varchar(255) DEFAULT NULL,
  `problem` varchar(255) DEFAULT NULL,
  `next_plan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of visit
-- ----------------------------

-- ----------------------------
-- Procedure structure for set_event_on
-- ----------------------------
DROP PROCEDURE IF EXISTS `set_event_on`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `set_event_on`()
BEGIN
	
SET GLOBAL event_scheduler = ON;

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for set_patient_age
-- ----------------------------
DROP PROCEDURE IF EXISTS `set_patient_age`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `set_patient_age`()
BEGIN
	
UPDATE patient p SET p.age_y = TIMESTAMPDIFF(YEAR,p.birth,CURDATE());

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for set_patient_class
-- ----------------------------
DROP PROCEDURE IF EXISTS `set_patient_class`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `set_patient_class`()
BEGIN

	UPDATE patient p SET p.class_id = 1 WHERE p.tai in ('B3');
	UPDATE patient p SET p.class_id = 2 WHERE p.tai in ('C2','C3','C4');
	UPDATE patient p SET p.class_id = 3 WHERE p.tai in ('I3');
	UPDATE patient p SET p.class_id = 4 WHERE p.tai in ('I1','I2');

	UPDATE patient p,c_class c 	SET p.class_name = c.class_name 	WHERE p.class_id = c.id;

	UPDATE assessment a SET a.group_text = 'กลุ่มที่ 1 ติดบ้าน-1' WHERE a.tai_class in ('B3');
	UPDATE assessment a SET a.group_text = 'กลุ่มที่ 2 ติดบ้าน-2' WHERE a.tai_class in ('C2','C3','C4');
	UPDATE assessment a SET a.group_text = 'กลุ่มที่ 3 ติดเตียง-1' WHERE a.tai_class in ('I3');
	UPDATE assessment a SET a.group_text = 'กลุ่มที่ 3 ติดเตียง-2' WHERE a.tai_class in ('I1','I2');

	UPDATE assessment a SET a.group_text = '-' 
	WHERE a.tai_class not in ('B3','C2','C3','C4','I3','I1','I2')
	OR a.tai_class is NULL;
	

END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for set_user_role
-- ----------------------------
DROP PROCEDURE IF EXISTS `set_user_role`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `set_user_role`()
BEGIN
	
UPDATE user t,c_role r 
SET t.role_name = r.`name`
WHERE r.id = t.role;

END
;;
DELIMITER ;

-- ----------------------------
-- Event structure for event1
-- ----------------------------
DROP EVENT IF EXISTS `event1`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` EVENT `event1` ON SCHEDULE EVERY 1 HOUR STARTS '2016-12-27 10:00:00' ON COMPLETION NOT PRESERVE ENABLE DO BEGIN

CALL up_user_role;

END
;;
DELIMITER ;
