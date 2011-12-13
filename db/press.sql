/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : press

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-12-13 21:48:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `game`
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `url` varchar(255) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `pack` varchar(255) DEFAULT NULL,
  `name_ga_category` varchar(255) DEFAULT NULL,
  `name_ga_action` varchar(255) DEFAULT NULL,
  `name_ga_label` varchar(255) DEFAULT NULL,
  `name_ga_value` varchar(255) DEFAULT NULL,
  `name_ga_noninteraction` int(255) DEFAULT NULL,
  `down_ga_category` varchar(255) DEFAULT NULL,
  `down_ga_action` varchar(255) DEFAULT NULL,
  `down_ga_label` varchar(255) DEFAULT NULL,
  `down_ga_value` varchar(255) DEFAULT NULL,
  `down_ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('1', 'Race Of Champions', '\r\n<p>Create simple secondary navigation with a\r\n<br></p>\r\n<ul>    \r\n <li>Swap between tabs or pills by adding the appropriate class. Great for sub-sections of content like our account settings pages and user timelines for toggling between pages of like content. Available in tabbed or pill styles.</li>    \r\n <li>Swap between tabs or pills by adding the appropriate class. Great for sub-sections of content like our account settings pages and user timelines for toggling between pages of like content. Available in tabbed or pill styles.</li>   \r\n <li> Swap between tabs or pills by adding the appropriate class. Great for sub-sections of content like our account settings pages and user timelines for toggling between pages of like content. Available in tabbed or pill styles.</li> \r\n</ul>', 'roc', '2011-11-01 00:00:00', '1323801286_mzl.thdgnolj_.175x175-75_.jpg', '1323801287_0031229.zip', 'outbound link', 'click', 'ROC Name', '1', null, 'download', 'download', 'ROC Download', '1', null);

-- ----------------------------
-- Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `ga_category` varchar(255) DEFAULT NULL,
  `ga_action` varchar(255) DEFAULT NULL,
  `ga_label` varchar(255) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('90', '1', '1323803204_2010.11_.17_1290006380_mzl_.ozkqvubb_.320x480-75_.jpg', null, null, null, null, null, null);
INSERT INTO `image` VALUES ('91', '1', '1323803204_2010.11_.17_1290006380_mzl_.rhmuhtox_.320x480-75_.jpg', null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `video` text,
  `ga_category` varchar(255) DEFAULT NULL,
  `ga_action` varchar(255) DEFAULT NULL,
  `ga_label` varchar(255) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('6', 'Rihanna - What\'s My Name? ft. Drake ', '1', 'U0CGsw6h60k', 'outbound link', 'click', 'ROC video 1', '1', null, null);
INSERT INTO `video` VALUES ('7', 'Rihanna - What\'s My Name? ft. Drake', '1', '1P3MegpkaMI', null, null, null, null, null, null);
