/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus_press

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-01-18 16:35:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `ip_game`
-- ----------------------------
DROP TABLE IF EXISTS `ip_game`;
CREATE TABLE `ip_game` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_game
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_platform`
-- ----------------------------
DROP TABLE IF EXISTS `ip_platform`;
CREATE TABLE `ip_platform` (
  `id` int(11) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_platform
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_pressrelease`
-- ----------------------------
DROP TABLE IF EXISTS `ip_pressrelease`;
CREATE TABLE `ip_pressrelease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `game_id` int(11) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `pack_description` text,
  `header_col2` text,
  `header_col1` text,
  `description` text,
  `title_ga_category` varchar(150) DEFAULT NULL,
  `title_ga_action` varchar(150) DEFAULT NULL,
  `title_ga_label` varchar(150) DEFAULT NULL,
  `title_ga_value` int(11) DEFAULT NULL,
  `title_ga_noninteraction` int(11) DEFAULT NULL,
  `pack_ga_category` varchar(150) DEFAULT NULL,
  `pack_ga_action` varchar(150) DEFAULT NULL,
  `pack_ga_label` varchar(150) DEFAULT NULL,
  `pack_ga_value` int(11) DEFAULT NULL,
  `pack_ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pressrelease_game` (`game_id`),
  CONSTRAINT `fk_pressrelease_game` FOREIGN KEY (`game_id`) REFERENCES `ip_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_pressrelease
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_store`
-- ----------------------------
DROP TABLE IF EXISTS `ip_store`;
CREATE TABLE `ip_store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pressrelease_id` int(11) DEFAULT NULL,
  `platform_id` int(11) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `ga_category` varchar(150) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(150) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_store_pressrelease` (`pressrelease_id`),
  KEY `fk_store_platform` (`platform_id`),
  CONSTRAINT `fk_store_pressrelease` FOREIGN KEY (`pressrelease_id`) REFERENCES `ip_pressrelease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_store_platform` FOREIGN KEY (`platform_id`) REFERENCES `ip_platform` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_store
-- ----------------------------

-- ----------------------------
-- Table structure for `ip_video`
-- ----------------------------
DROP TABLE IF EXISTS `ip_video`;
CREATE TABLE `ip_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` text,
  `ga_category` varchar(150) DEFAULT NULL,
  `ga_action` varchar(150) DEFAULT NULL,
  `ga_label` varchar(150) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `pressrelease_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_video_pressrelease` (`pressrelease_id`),
  CONSTRAINT `fk_video_pressrelease` FOREIGN KEY (`pressrelease_id`) REFERENCES `ip_pressrelease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_video
-- ----------------------------
