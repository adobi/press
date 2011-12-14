/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : press

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2011-12-13 17:16:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `game`
-- ----------------------------
DROP TABLE IF EXISTS `game`;
CREATE TABLE `game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `pack` varchar(255) DEFAULT NULL,
  `description` text,
  `logo` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `name_ga_category` varchar(255) DEFAULT NULL,
  `name_ga_action` varchar(255) DEFAULT NULL,
  `name_ga_label` varchar(255) DEFAULT NULL,
  `name_ga_value` varchar(255) DEFAULT NULL,
  `name_ga_noninteraction` int(11) DEFAULT NULL,
  `down_ga_category` varchar(255) DEFAULT NULL,
  `down_ga_action` varchar(255) DEFAULT NULL,
  `down_ga_label` varchar(255) DEFAULT NULL,
  `down_ga_value` varchar(255) DEFAULT NULL,
  `down_ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of game
-- ----------------------------
INSERT INTO `game` VALUES ('2', 'Race Of Champions', '1323785848_iphone.zip', 'ontrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.', '1323785848_Icon_roc.png', 'roc', '2011-10-01 00:00:00', null, null, null, null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `image`
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------

-- ----------------------------
-- Table structure for `video`
-- ----------------------------
DROP TABLE IF EXISTS `video`;
CREATE TABLE `video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video` varchar(255) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video
-- ----------------------------
