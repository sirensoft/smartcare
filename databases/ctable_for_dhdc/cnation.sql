/*
Navicat MySQL Data Transfer

Source Server         : 05-61.19.22.203-บางกระทุ่ม
Source Server Version : 50542
Source Host           : 61.19.22.203:3306
Source Database       : dhdc

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2017-01-15 13:32:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cnation
-- ----------------------------
DROP TABLE IF EXISTS `cnation`;
CREATE TABLE `cnation` (
  `nationcode` char(4) NOT NULL,
  `nationname` varchar(255) DEFAULT NULL,
  `nationcodeaec` char(4) DEFAULT NULL,
  PRIMARY KEY (`nationcode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cnation
-- ----------------------------
INSERT INTO `cnation` VALUES ('002', 'โปรตุเกส', '11');
INSERT INTO `cnation` VALUES ('003', 'ดัตช์', '11');
INSERT INTO `cnation` VALUES ('004', 'เยอรมัน', '11');
INSERT INTO `cnation` VALUES ('005', 'ฝรั่งเศส', '11');
INSERT INTO `cnation` VALUES ('006', 'เดนมาร์ก', '11');
INSERT INTO `cnation` VALUES ('007', 'สวีเดน', '11');
INSERT INTO `cnation` VALUES ('008', 'สวิส', '11');
INSERT INTO `cnation` VALUES ('009', 'อิตาลี', '11');
INSERT INTO `cnation` VALUES ('010', 'นอร์เวย์', '11');
INSERT INTO `cnation` VALUES ('011', 'ออสเตรีย', '11');
INSERT INTO `cnation` VALUES ('012', 'ไอริช', '11');
INSERT INTO `cnation` VALUES ('013', 'ฟินแลนด์', '11');
INSERT INTO `cnation` VALUES ('014', 'เบลเยียม', '11');
INSERT INTO `cnation` VALUES ('015', 'สเปน', '11');
INSERT INTO `cnation` VALUES ('016', 'รัสเซีย', '11');
INSERT INTO `cnation` VALUES ('017', 'โปแลนด์', '11');
INSERT INTO `cnation` VALUES ('018', 'เช็ก', '11');
INSERT INTO `cnation` VALUES ('019', 'ฮังการี', '11');
INSERT INTO `cnation` VALUES ('020', 'กรีก', '11');
INSERT INTO `cnation` VALUES ('021', 'ยูโกสลาฟ', '11');
INSERT INTO `cnation` VALUES ('022', 'ลักเซมเบิร์ก', '11');
INSERT INTO `cnation` VALUES ('023', 'วาติกัน', '11');
INSERT INTO `cnation` VALUES ('024', 'มอลตา', '11');
INSERT INTO `cnation` VALUES ('025', 'ลีซู', '11');
INSERT INTO `cnation` VALUES ('026', 'บัลแกเรีย', '11');
INSERT INTO `cnation` VALUES ('027', 'โรมาเนีย', '11');
INSERT INTO `cnation` VALUES ('028', 'ไซปรัส', '11');
INSERT INTO `cnation` VALUES ('029', 'อเมริกัน', '11');
INSERT INTO `cnation` VALUES ('030', 'แคนาดา', '11');
INSERT INTO `cnation` VALUES ('031', 'เม็กซิโก', '11');
INSERT INTO `cnation` VALUES ('032', 'คิวบา', '11');
INSERT INTO `cnation` VALUES ('033', 'อาร์เจนตินา', '11');
INSERT INTO `cnation` VALUES ('034', 'บราซิล', '11');
INSERT INTO `cnation` VALUES ('035', 'ชิลี', '11');
INSERT INTO `cnation` VALUES ('036', 'อาข่า', '11');
INSERT INTO `cnation` VALUES ('037', 'โคลัมเบีย', '11');
INSERT INTO `cnation` VALUES ('038', 'ลั๊ว', '11');
INSERT INTO `cnation` VALUES ('039', 'เปรู', '11');
INSERT INTO `cnation` VALUES ('040', 'ปานามา', '11');
INSERT INTO `cnation` VALUES ('041', 'อุรุกวัย', '11');
INSERT INTO `cnation` VALUES ('042', 'เวเนซุเอลา', '11');
INSERT INTO `cnation` VALUES ('043', 'เปอร์โตริโก้', '11');
INSERT INTO `cnation` VALUES ('044', 'จีน', '11');
INSERT INTO `cnation` VALUES ('045', 'อินเดีย', '11');
INSERT INTO `cnation` VALUES ('046', 'เวียดนาม', '01');
INSERT INTO `cnation` VALUES ('047', 'ญี่ปุ่น', '11');
INSERT INTO `cnation` VALUES ('048', 'พม่า', '02');
INSERT INTO `cnation` VALUES ('049', 'ฟิลิปปิน', '03');
INSERT INTO `cnation` VALUES ('050', 'มาเลเซีย', '04');
INSERT INTO `cnation` VALUES ('051', 'อินโดนีเซีย', '05');
INSERT INTO `cnation` VALUES ('052', 'ปากีสถาน', '11');
INSERT INTO `cnation` VALUES ('053', 'เกาหลีใต้', '11');
INSERT INTO `cnation` VALUES ('054', 'สิงคโปร์', '06');
INSERT INTO `cnation` VALUES ('055', 'เนปาล', '11');
INSERT INTO `cnation` VALUES ('056', 'ลาว', '07');
INSERT INTO `cnation` VALUES ('057', 'กัมพูชา', '08');
INSERT INTO `cnation` VALUES ('058', 'ศรีลังกา', '11');
INSERT INTO `cnation` VALUES ('059', 'ซาอุดีอาระเบีย', '11');
INSERT INTO `cnation` VALUES ('060', 'อิสราเอล', '11');
INSERT INTO `cnation` VALUES ('061', 'เลบานอน', '11');
INSERT INTO `cnation` VALUES ('062', 'อิหร่าน', '11');
INSERT INTO `cnation` VALUES ('063', 'ตุรกี', '11');
INSERT INTO `cnation` VALUES ('064', 'บังกลาเทศ', '11');
INSERT INTO `cnation` VALUES ('065', 'ถูกถอนสัญชาติ', '11');
INSERT INTO `cnation` VALUES ('066', 'ซีเรีย', '11');
INSERT INTO `cnation` VALUES ('067', 'อิรัก', '11');
INSERT INTO `cnation` VALUES ('068', 'คูเวต', '11');
INSERT INTO `cnation` VALUES ('069', 'บรูไน', '09');
INSERT INTO `cnation` VALUES ('070', 'แอฟริกาใต้', '11');
INSERT INTO `cnation` VALUES ('071', 'กะเหรี่ยง', '11');
INSERT INTO `cnation` VALUES ('072', 'ลาหู่', '11');
INSERT INTO `cnation` VALUES ('073', 'เคนยา', '11');
INSERT INTO `cnation` VALUES ('074', 'อียิปต์', '11');
INSERT INTO `cnation` VALUES ('075', 'เอธิโอเปีย', '11');
INSERT INTO `cnation` VALUES ('076', 'ไนจีเรีย', '11');
INSERT INTO `cnation` VALUES ('077', 'สหรัฐอาหรับเอมิเรตส์', '11');
INSERT INTO `cnation` VALUES ('078', 'กินี', '11');
INSERT INTO `cnation` VALUES ('079', 'ออสเตรเลีย', '11');
INSERT INTO `cnation` VALUES ('080', 'นิวซีแลนด์', '11');
INSERT INTO `cnation` VALUES ('081', 'ปาปัวนิวกินี', '11');
INSERT INTO `cnation` VALUES ('082', 'ม้ง', '11');
INSERT INTO `cnation` VALUES ('083', 'เมี่ยน', '11');
INSERT INTO `cnation` VALUES ('086', 'จีนฮ่อ', '11');
INSERT INTO `cnation` VALUES ('087', 'จีน (อดีตทหารจีนคณะชาติ ,อดีตทหารจีนชาติ)', '11');
INSERT INTO `cnation` VALUES ('088', 'ผู้พลัดถิ่นสัญชาติพม่า', '02');
INSERT INTO `cnation` VALUES ('089', 'ผู้อพยพเชื้อสายจากกัมพูชา', '08');
INSERT INTO `cnation` VALUES ('090', 'ลาว (ลาวอพยพ)', '07');
INSERT INTO `cnation` VALUES ('091', 'เขมรอพยพ', '08');
INSERT INTO `cnation` VALUES ('096', 'ไร้สัญชาติ', '11');
INSERT INTO `cnation` VALUES ('097', 'อื่นๆ', '11');
INSERT INTO `cnation` VALUES ('098', 'ไม่ได้สัญชาติไทย', '11');
INSERT INTO `cnation` VALUES ('099', 'ไทย', '10');
INSERT INTO `cnation` VALUES ('100', 'อัฟกัน', '11');
INSERT INTO `cnation` VALUES ('101', 'บาห์เรน', '11');
INSERT INTO `cnation` VALUES ('102', 'ภูฏาน', '11');
INSERT INTO `cnation` VALUES ('103', 'จอร์แดน', '11');
INSERT INTO `cnation` VALUES ('104', 'เกาหลีเหนือ', '11');
INSERT INTO `cnation` VALUES ('105', 'มัลดีฟ', '11');
INSERT INTO `cnation` VALUES ('106', 'มองโกเลีย', '11');
INSERT INTO `cnation` VALUES ('107', 'โอมาน', '11');
INSERT INTO `cnation` VALUES ('108', 'กาตาร์', '11');
INSERT INTO `cnation` VALUES ('109', 'เยเมน', '11');
INSERT INTO `cnation` VALUES ('111', 'หมู่เกาะฟิจิ', '11');
INSERT INTO `cnation` VALUES ('112', 'คิริบาส', '11');
INSERT INTO `cnation` VALUES ('113', 'นาอูรู', '11');
INSERT INTO `cnation` VALUES ('114', 'หมู่เกาะโซโลมอน', '11');
INSERT INTO `cnation` VALUES ('115', 'ตองก้า', '11');
INSERT INTO `cnation` VALUES ('116', 'ตูวาลู', '11');
INSERT INTO `cnation` VALUES ('117', 'วานูอาตู', '11');
INSERT INTO `cnation` VALUES ('118', 'ซามัว', '11');
INSERT INTO `cnation` VALUES ('119', 'แอลเบเนีย', '11');
INSERT INTO `cnation` VALUES ('120', 'อันดอร์รา', '11');
INSERT INTO `cnation` VALUES ('122', 'ไอซ์แลนด์', '11');
INSERT INTO `cnation` VALUES ('123', 'ลิกเตนสไตน์', '11');
INSERT INTO `cnation` VALUES ('124', 'โมนาโก', '11');
INSERT INTO `cnation` VALUES ('125', 'ซานมารีโน', '11');
INSERT INTO `cnation` VALUES ('126', 'บริติช  (อังกฤษ, สก็อตแลนด์)', '11');
INSERT INTO `cnation` VALUES ('127', 'แอลจีเรีย', '11');
INSERT INTO `cnation` VALUES ('128', 'แองโกลา', '11');
INSERT INTO `cnation` VALUES ('129', 'เบนิน', '11');
INSERT INTO `cnation` VALUES ('130', 'บอตสวานา', '11');
INSERT INTO `cnation` VALUES ('131', 'บูร์กินาฟาโซ', '11');
INSERT INTO `cnation` VALUES ('132', 'บุรุนดี', '11');
INSERT INTO `cnation` VALUES ('133', 'แคเมอรูน', '11');
INSERT INTO `cnation` VALUES ('134', 'เคปเวิร์ด', '11');
INSERT INTO `cnation` VALUES ('135', 'แอฟริกากลาง', '11');
INSERT INTO `cnation` VALUES ('136', 'ชาด', '11');
INSERT INTO `cnation` VALUES ('137', 'คอสตาริกา', '11');
INSERT INTO `cnation` VALUES ('138', 'คองโก', '11');
INSERT INTO `cnation` VALUES ('139', 'ไอโวเรี่ยน', '11');
INSERT INTO `cnation` VALUES ('140', 'จิบูตี', '11');
INSERT INTO `cnation` VALUES ('141', 'อิเควทอเรียลกินี', '11');
INSERT INTO `cnation` VALUES ('142', 'กาบอง', '11');
INSERT INTO `cnation` VALUES ('143', 'แกมเบีย', '11');
INSERT INTO `cnation` VALUES ('144', 'กานา', '11');
INSERT INTO `cnation` VALUES ('145', 'กินีบีสเซา', '11');
INSERT INTO `cnation` VALUES ('146', 'เลโซโท', '11');
INSERT INTO `cnation` VALUES ('147', 'ไลบีเรีย', '11');
INSERT INTO `cnation` VALUES ('148', 'ลิเบีย', '11');
INSERT INTO `cnation` VALUES ('149', 'มาลากาซี', '11');
INSERT INTO `cnation` VALUES ('150', 'มาลาวี', '11');
INSERT INTO `cnation` VALUES ('151', 'มาลี', '11');
INSERT INTO `cnation` VALUES ('152', 'มอริเตเนีย', '11');
INSERT INTO `cnation` VALUES ('153', 'มอริเชียส', '11');
INSERT INTO `cnation` VALUES ('154', 'โมร็อกโก', '11');
INSERT INTO `cnation` VALUES ('155', 'โมซัมบิก', '11');
INSERT INTO `cnation` VALUES ('156', 'ไนเจอร์', '11');
INSERT INTO `cnation` VALUES ('157', 'รวันดา', '11');
INSERT INTO `cnation` VALUES ('158', 'เซาโตเมและปรินซิเป', '11');
INSERT INTO `cnation` VALUES ('159', 'เซเนกัล', '11');
INSERT INTO `cnation` VALUES ('160', 'เซเชลส์', '11');
INSERT INTO `cnation` VALUES ('161', 'เซียร์ราลีโอน', '11');
INSERT INTO `cnation` VALUES ('162', 'โซมาลี', '11');
INSERT INTO `cnation` VALUES ('163', 'ซูดาน', '11');
INSERT INTO `cnation` VALUES ('164', 'สวาซี', '11');
INSERT INTO `cnation` VALUES ('165', 'แทนซาเนีย', '11');
INSERT INTO `cnation` VALUES ('166', 'โตโก', '11');
INSERT INTO `cnation` VALUES ('167', 'ตูนิเซีย', '11');
INSERT INTO `cnation` VALUES ('168', 'ยูกันดา', '11');
INSERT INTO `cnation` VALUES ('169', 'ซาอีร์', '11');
INSERT INTO `cnation` VALUES ('170', 'แซมเบีย', '11');
INSERT INTO `cnation` VALUES ('171', 'ซิมบับเว', '11');
INSERT INTO `cnation` VALUES ('172', 'แอนติกาและบาร์บูดา', '11');
INSERT INTO `cnation` VALUES ('173', 'บาฮามาส', '11');
INSERT INTO `cnation` VALUES ('174', 'บาร์เบโดส', '11');
INSERT INTO `cnation` VALUES ('175', 'เบลิซ', '11');
INSERT INTO `cnation` VALUES ('176', 'คอสตาริกา', '11');
INSERT INTO `cnation` VALUES ('177', 'โดมินิกา', '11');
INSERT INTO `cnation` VALUES ('178', 'โดมินิกัน', '11');
INSERT INTO `cnation` VALUES ('179', 'เอลซัลวาดอร์', '11');
INSERT INTO `cnation` VALUES ('180', 'เกรเนดา', '11');
INSERT INTO `cnation` VALUES ('181', 'กัวเตมาลา', '11');
INSERT INTO `cnation` VALUES ('182', 'เฮติ', '11');
INSERT INTO `cnation` VALUES ('183', 'ฮอนดูรัส', '11');
INSERT INTO `cnation` VALUES ('184', 'จาเมกา', '11');
INSERT INTO `cnation` VALUES ('185', 'นิการากัว', '11');
INSERT INTO `cnation` VALUES ('186', 'เซนต์คิตส์และเนวิส', '11');
INSERT INTO `cnation` VALUES ('187', 'เซนต์ลูเซีย', '11');
INSERT INTO `cnation` VALUES ('188', 'เซนต์วินเซนต์และเกรนาดีนส์', '11');
INSERT INTO `cnation` VALUES ('189', 'ตรินิแดดและโตเบโก', '11');
INSERT INTO `cnation` VALUES ('190', 'โบลีเวีย', '11');
INSERT INTO `cnation` VALUES ('191', 'เอกวาดอร์', '11');
INSERT INTO `cnation` VALUES ('192', 'กายอานา', '11');
INSERT INTO `cnation` VALUES ('193', 'ปารากวัย', '11');
INSERT INTO `cnation` VALUES ('194', 'ซูรินาเม', '11');
INSERT INTO `cnation` VALUES ('195', 'อาหรับ', '11');
INSERT INTO `cnation` VALUES ('196', 'คะฉิ่น', '11');
INSERT INTO `cnation` VALUES ('197', 'ว้า', '11');
INSERT INTO `cnation` VALUES ('198', 'ไทยใหญ่', '11');
INSERT INTO `cnation` VALUES ('199', 'ไทยลื้อ', '02');
INSERT INTO `cnation` VALUES ('200', 'ขมุ', '11');
INSERT INTO `cnation` VALUES ('201', 'ตองสู', '11');
INSERT INTO `cnation` VALUES ('203', 'ละว้า', '11');
INSERT INTO `cnation` VALUES ('205', 'ปะหร่อง', '11');
INSERT INTO `cnation` VALUES ('206', 'ถิ่น', '11');
INSERT INTO `cnation` VALUES ('207', 'ปะโอ', '11');
INSERT INTO `cnation` VALUES ('208', 'มอญ', '02');
INSERT INTO `cnation` VALUES ('209', 'มลาบรี', '11');
INSERT INTO `cnation` VALUES ('212', 'จีน (จีนฮ่ออิสระ)', '11');
INSERT INTO `cnation` VALUES ('214', 'จีน (จีนฮ่ออพยพ)', '11');
INSERT INTO `cnation` VALUES ('216', 'ยูเครน', '11');
INSERT INTO `cnation` VALUES ('219', 'จีน(ฮ่องกง)', '11');
INSERT INTO `cnation` VALUES ('220', 'จีน(ไต้หวัน)', '11');
INSERT INTO `cnation` VALUES ('221', 'โครเอเชีย', '11');
INSERT INTO `cnation` VALUES ('223', 'คาซัค', '11');
INSERT INTO `cnation` VALUES ('224', 'อาร์เมเนีย', '11');
INSERT INTO `cnation` VALUES ('225', 'อาเซอร์ไบจาน', '11');
INSERT INTO `cnation` VALUES ('226', 'จอร์เจีย', '11');
INSERT INTO `cnation` VALUES ('227', 'คีร์กีซ', '11');
INSERT INTO `cnation` VALUES ('228', 'ทาจิก', '11');
INSERT INTO `cnation` VALUES ('229', 'อุซเบก', '11');
INSERT INTO `cnation` VALUES ('230', 'หมู่เกาะมาร์แชลล์', '11');
INSERT INTO `cnation` VALUES ('231', 'ไมโครนีเซีย', '11');
INSERT INTO `cnation` VALUES ('232', 'ปาเลา', '11');
INSERT INTO `cnation` VALUES ('233', 'เบลารุส', '11');
INSERT INTO `cnation` VALUES ('234', 'บอสเนียและเฮอร์เซโกวีนา', '11');
INSERT INTO `cnation` VALUES ('235', 'เติร์กเมน', '11');
INSERT INTO `cnation` VALUES ('236', 'เอสโตเนีย', '11');
INSERT INTO `cnation` VALUES ('237', 'ลัตเวีย', '11');
INSERT INTO `cnation` VALUES ('238', 'ลิทัวเนีย', '11');
INSERT INTO `cnation` VALUES ('239', 'มาซิโดเนีย', '11');
INSERT INTO `cnation` VALUES ('240', 'มอลโดวา', '11');
INSERT INTO `cnation` VALUES ('241', 'สโลวัก', '11');
INSERT INTO `cnation` VALUES ('242', 'สโลวีน', '11');
INSERT INTO `cnation` VALUES ('243', 'เอริเทรีย', '11');
INSERT INTO `cnation` VALUES ('244', 'นามิเบีย', '11');
INSERT INTO `cnation` VALUES ('245', 'โบลิเวีย', '11');
INSERT INTO `cnation` VALUES ('246', 'หมู่เกาะคุก', '11');
INSERT INTO `cnation` VALUES ('247', 'เนปาล (เนปาลอพยพ)', '11');
INSERT INTO `cnation` VALUES ('248', 'มอญ  (ผู้พลัดถิ่นสัญชาติพม่า)', '02');
INSERT INTO `cnation` VALUES ('249', 'ไทยใหญ่  (ผู้พลัดถิ่นสัญชาติพม่า)', '02');
INSERT INTO `cnation` VALUES ('250', 'เวียดนาม  (ญวนอพยพ)', '01');
INSERT INTO `cnation` VALUES ('251', 'มาเลเชีย  (อดีต จีนคอมมิวนิสต์)', '04');
INSERT INTO `cnation` VALUES ('252', 'จีน  (อดีต จีนคอมมิวนิสต์)', '11');
INSERT INTO `cnation` VALUES ('253', 'สิงคโปร์  (อดีต จีนคอมมิวนิสต์)', '06');
INSERT INTO `cnation` VALUES ('254', 'กะเหรี่ยง  (ผู้หลบหนีเข้าเมือง)', '11');
INSERT INTO `cnation` VALUES ('255', 'มอญ  (ผู้หลบหนีเข้าเมือง)', '02');
INSERT INTO `cnation` VALUES ('256', 'ไทยใหญ่  (ผู้หลบหนีเข้าเมือง)', '02');
INSERT INTO `cnation` VALUES ('257', 'กัมพูชา  (ผู้หลบหนีเข้าเมือง)', '08');
INSERT INTO `cnation` VALUES ('258', 'มอญ  (ชุมชนบนพื้นที่สูง)', '02');
INSERT INTO `cnation` VALUES ('259', 'กะเหรี่ยง  (ชุมชนบนพื้นที่สูง)', '11');
INSERT INTO `cnation` VALUES ('260', 'ปาเลสไตน์', '11');
INSERT INTO `cnation` VALUES ('261', 'ติมอร์ตะวันออก', '11');
INSERT INTO `cnation` VALUES ('262', 'สละสัญชาติไทย', '11');
INSERT INTO `cnation` VALUES ('263', 'เซอร์เบีย แอนด์ มอนเตเนโกร', '11');
INSERT INTO `cnation` VALUES ('264', 'กัมพูชา(แรงงาน)', '08');
INSERT INTO `cnation` VALUES ('265', 'พม่า(แรงงาน)', '02');
INSERT INTO `cnation` VALUES ('266', 'ลาว(แรงงาน)', '07');
INSERT INTO `cnation` VALUES ('267', 'เซอร์เบียน', '11');
INSERT INTO `cnation` VALUES ('268', 'มอนเตเนกริน', '11');
INSERT INTO `cnation` VALUES ('989', 'บุคคลที่ไม่มีสถานะทางทะเบียน', '12');
INSERT INTO `cnation` VALUES ('999', 'ไม่ระบุ', '99');
