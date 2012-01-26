/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50516
Source Host           : localhost:3306
Source Database       : invictus_press

Target Server Type    : MYSQL
Target Server Version : 50516
File Encoding         : 65001

Date: 2012-01-26 08:47:51
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
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_game
-- ----------------------------
INSERT INTO `ip_game` VALUES ('1', 'PinFrog', 'pinfrog');
INSERT INTO `ip_game` VALUES ('2', 'Fly Fu Pro', 'fly-fu-pro');
INSERT INTO `ip_game` VALUES ('3', 'Froggy Launcher', 'froggy-launcher');
INSERT INTO `ip_game` VALUES ('5', 'Picosaic HD', 'picosaic-hd');
INSERT INTO `ip_game` VALUES ('8', 'Brim!', 'brim');
INSERT INTO `ip_game` VALUES ('9', 'Fly Control HD', 'fly-control-hd');
INSERT INTO `ip_game` VALUES ('10', 'Froggy Jump', 'froggy-jump');
INSERT INTO `ip_game` VALUES ('11', 'Blastwave ', 'blastwave');
INSERT INTO `ip_game` VALUES ('12', 'Rollit - Smartly', 'rollit-smartly');
INSERT INTO `ip_game` VALUES ('13', 'Grim Filler', 'grim-filler');
INSERT INTO `ip_game` VALUES ('14', 'Picosaic', 'picosaic');
INSERT INTO `ip_game` VALUES ('15', '4x4 Jam', '4x4-jam');
INSERT INTO `ip_game` VALUES ('16', 'The Escapee', 'the-escapee');
INSERT INTO `ip_game` VALUES ('28', 'Fly Control', 'fly-control');
INSERT INTO `ip_game` VALUES ('32', 'Truck Jam', 'truck-jam');
INSERT INTO `ip_game` VALUES ('33', 'Wild Slide', 'wild-slide');
INSERT INTO `ip_game` VALUES ('37', 'Truck Jam HD', 'truck-jam-hd');
INSERT INTO `ip_game` VALUES ('38', 'Fly Fu Pro HD', 'fly-fu-pro-hd');
INSERT INTO `ip_game` VALUES ('39', 'RoC', 'roc');
INSERT INTO `ip_game` VALUES ('42', 'Greed Corp HD', 'greed-corp-hd');
INSERT INTO `ip_game` VALUES ('45', 'Santa Ride!', 'santa-ride');
INSERT INTO `ip_game` VALUES ('46', 'Santa Ride! HD', 'santa-ride-hd');
INSERT INTO `ip_game` VALUES ('51', 'Greed Corp', 'greed-corp');
INSERT INTO `ip_game` VALUES ('53', 'Mist Bouncer', 'mist-bouncer');

-- ----------------------------
-- Table structure for `ip_platform`
-- ----------------------------
DROP TABLE IF EXISTS `ip_platform`;
CREATE TABLE `ip_platform` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `image` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_platform
-- ----------------------------
INSERT INTO `ip_platform` VALUES ('1', 'iPad', null, '1326975556_app_store.png');
INSERT INTO `ip_platform` VALUES ('2', 'iPod, iPhone', null, '1326975597_app_store.png');
INSERT INTO `ip_platform` VALUES ('3', 'MAC', null, '1326975611_mac_store.png');
INSERT INTO `ip_platform` VALUES ('4', 'Android Phone', null, '1326975623_android_market.png');
INSERT INTO `ip_platform` VALUES ('5', 'Andorid Tablet', null, '1327496676_android_market.png');

-- ----------------------------
-- Table structure for `ip_pressrelease`
-- ----------------------------
DROP TABLE IF EXISTS `ip_pressrelease`;
CREATE TABLE `ip_pressrelease` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `released` datetime DEFAULT NULL,
  `logo` varchar(150) DEFAULT NULL,
  `pack` varchar(255) DEFAULT NULL,
  `pack_description` text,
  `header_col2` text,
  `header_col1` text,
  `description` text,
  `active` int(11) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
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
  `video_ga_category` varchar(150) DEFAULT NULL,
  `video_ga_action` varchar(150) DEFAULT NULL,
  `video_ga_label` varchar(150) DEFAULT NULL,
  `video_ga_value` int(11) DEFAULT NULL,
  `video_ga_noninteraction` int(11) DEFAULT NULL,
  `video_code_ga_category` varchar(150) DEFAULT NULL,
  `video_code_ga_action` varchar(150) DEFAULT NULL,
  `video_code_ga_label` varchar(150) DEFAULT NULL,
  `video_code_ga_value` int(11) DEFAULT NULL,
  `video_code_ga_noninteraction` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `published` datetime DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `game_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pressrelease_game` (`game_id`),
  CONSTRAINT `fk_pressrelease_game` FOREIGN KEY (`game_id`) REFERENCES `ip_game` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_pressrelease
-- ----------------------------
INSERT INTO `ip_pressrelease` VALUES ('3', 'Greed Corp released', '2012-01-01 00:00:00', null, null, '\r\n<p>The press pack contains:</p>\r\n<ul>   \r\n <li>High resolution artwork and screenshots</li>   \r\n <li>Press release</li>   \r\n <li> YouTube video embed code </li> \r\n</ul>', '\r\n<p> FORMAT: </p>\r\n<p> RELEASE:2012-01-01 </p>\r\n<p> DEVELOPER: <b>Invictus</b> </p>\r\n<p> PUBLISHER: <b>Invictus</b> </p>\r\n<p> INVICTUS WEBSITE: <a href=\"http://www.invictus.com\" target=\"_blank\" data-ga=\"1\" data-ga-category=\"Internal link\" data-ga-action=\"click\" data-ga-label=\"Press - Greed Corp Phone - Greed Corp InvictusCom Top\" data-ga-value=\"1\">www.invictus.com</a> </p>', '\r\n<p>                        PRESS RELEASEhehehe</p>                    \r\n<p>                        2012-01-01                    </p>                    \r\n<p>                        For Immediate Release                                     </p>                    \r\n<p>                        Title: <strong>Greed Corp</strong>                    </p>', '\r\n<br><h3><strong>Localized Greed Corp to hit iPhone and Android phone stores</strong></h3>\r\n<p>\r\n<br></p>\r\n<p>After the release of Greed Corp HD on iPad, Android tablets and Mac in the beginning of November, Greed Corp fans no longer have to wait for being able to play the game on every type of devices: Invictus Games and Vanguard Games are bringing the turn-based strategy hit onto iPhone and Android mobile phones.</p>\r\n<p>Also, all content has been localized for the new release, and updates are being rolled out for the iPad and Android tablet versions accordingly.</p>\r\n<p>The game will launch with a 40% special discount on iPhone and the iPad version will receive a special holiday discount of 40%.</p>\r\n<p>\r\n<br></p>\r\n<p><strong>About Invictus Games Ltd:</strong> </p>\r\n<p>Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. Invictus\' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. To learn more about Invictus games, please visit<a href=\"http://www.invictus.com\" target=\"_blank\" data-ga=\"1\" data-ga-category=\"Internal link\" data-ga-action=\"click\" data-ga-label=\"Press - Greed Corp Phone - Greed Corp InvictusCom Bottom\" data-ga-value=\"1\">http://www.invictus.com</a>.</p>', '1', 'VA770wpLX-Q', 'Greed Corp press release', 'Click', 'Greed Corp press release', '1', null, 'Download', 'Click', 'Download press pack Gredd Corp', '1', null, 'Greed Corp Video play', 'Play', 'Greed Corp Video play', '1', null, 'Greed Corp Video copy', 'Click', 'Greed Corp Video copy', '1', null, null, '2012-01-23 14:24:13', 'greed-corp-released', '51');
INSERT INTO `ip_pressrelease` VALUES ('4', 'Mist bouncer released', '2012-01-01 00:00:00', null, null, '\r\n<p>The press pack contains:</p>\r\n<ul>   \r\n <li>High resolution artwork and screenshots</li>   \r\n <li>Press release</li>   \r\n <li> YouTube video embed code </li> \r\n</ul>', '\r\n<p> FORMAT: \r\n<br></p> \r\n<p> RELEASE: \r\n<br></p> \r\n<p> DEVELOPER: Invictus </p> \r\n<p> PUBLISHER: Invictus </p>  \r\n<p> INVICTUS WEBSITE: <a href=\"http://www.invictus.com/\" target=\"_blank\" data-ga=\"1\" data-ga-category=\"Internal link\" data-ga-action=\"click\" data-ga-label=\"Press - ROC Barcelona - ROC InvictusCom Top\" data-ga-value=\"1\">www.invictus.com</a> </p>', '\r\n<p> PRESS RELEASE </p> \r\n<p>\r\n<br></p> \r\n<p> For Immediate Release </p> \r\n<p> Title:&nbsp;<strong></strong> </p>', '\r\n<p> <strong>About Invictus Games Ltd: </strong> </p>\r\n<p> Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. \r\n<br> Invictus\' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. </p>', '0', null, '', 'Click', '', '1', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2012-01-25 14:51:32', null, 'mist-bouncer-released', '53');
INSERT INTO `ip_pressrelease` VALUES ('5', null, null, null, null, '\r\n<p>The press pack contains:</p>\r\n<ul>     \r\n <li>High resolution artwork and screenshots</li>     \r\n <li>Press release</li>     \r\n <li> YouTube video embed code </li> \r\n</ul>', '\r\n<p> FORMAT: \r\n<br></p> \r\n<p> RELEASE: \r\n<br></p> \r\n<p> DEVELOPER: Invictus </p> \r\n<p> PUBLISHER: Invictus </p>  \r\n<p> INVICTUS WEBSITE: <a href=\"http://www.invictus.com/\" target=\"_blank\" data-ga=\"1\" data-ga-category=\"Internal link\" data-ga-action=\"click\" data-ga-label=\"Press - ROC Barcelona - ROC InvictusCom Top\" data-ga-value=\"1\">www.invictus.com</a> </p>', '\r\n<p> PRESS RELEASE </p> \r\n<p>\r\n<br></p> \r\n<p> For Immediate Release </p> \r\n<p> Title:&nbsp;<strong></strong> </p>', '\r\n<p> <strong>About Invictus Games Ltd: </strong> </p>\r\n<p> Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. \r\n<br> Invictus\' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. </p>', '0', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, '2012-01-26 08:23:16', null, null, null);

-- ----------------------------
-- Table structure for `ip_settings`
-- ----------------------------
DROP TABLE IF EXISTS `ip_settings`;
CREATE TABLE `ip_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_description` text,
  `header_col1` text,
  `header_col2` text,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_settings
-- ----------------------------
INSERT INTO `ip_settings` VALUES ('1', '\r\n<p>The press pack contains:</p>\r\n<ul>     \r\n <li>High resolution artwork and screenshots</li>     \r\n <li>Press release</li>     \r\n <li> YouTube video embed code </li> \r\n</ul>', '\r\n<p> PRESS RELEASE </p> \r\n<p>\r\n<br></p> \r\n<p> For Immediate Release </p> \r\n<p> Title:&nbsp;<strong></strong> </p>', '\r\n<p> FORMAT: \r\n<br></p> \r\n<p> RELEASE: \r\n<br></p> \r\n<p> DEVELOPER: Invictus </p> \r\n<p> PUBLISHER: Invictus </p>  \r\n<p> INVICTUS WEBSITE: <a href=\"http://www.invictus.com/\" target=\"_blank\" data-ga=\"1\" data-ga-category=\"Internal link\" data-ga-action=\"click\" data-ga-label=\"Press - ROC Barcelona - ROC InvictusCom Top\" data-ga-value=\"1\">www.invictus.com</a> </p>', '\r\n<p> <strong>About Invictus Games Ltd: </strong> </p>\r\n<p> Invictus Games Ltd is Hungary’s premier video game development studio, with a wealth of experience creating detailed racing games. \r\n<br> Invictus\' more than 10 year track record developing racing games includes offline and online on iOS, Android and PC, for companies such as Codemasters, Activision, Disney and Gamepot. </p>');

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
  CONSTRAINT `fk_store_platform` FOREIGN KEY (`platform_id`) REFERENCES `ip_platform` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_store_pressrelease` FOREIGN KEY (`pressrelease_id`) REFERENCES `ip_pressrelease` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ip_store
-- ----------------------------
INSERT INTO `ip_store` VALUES ('1', '3', '2', 'http://itunes.apple.com/us/app/greed-corp/id484852980', '', 'Click', '', '1', null);
INSERT INTO `ip_store` VALUES ('2', '3', '1', 'http://itunes.apple.com/us/app/greed-corp-hd/id468398642', '', 'Click', '', '1', null);
INSERT INTO `ip_store` VALUES ('4', '3', '4', 'https://market.android.com/details?id=com.Invictus.GreedCorpMobile', '', 'Click', '', '1', null);
INSERT INTO `ip_store` VALUES ('5', '3', '5', 'https://market.android.com/details?id=com.Invictus.GreedCorp', '', 'Click', '', '1', null);
INSERT INTO `ip_store` VALUES ('6', '3', '3', 'http://itunes.apple.com/us/app/greed-corp/id470513549', '', 'Click', '', '1', null);
