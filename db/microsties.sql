/*
Navicat MySQL Data Transfer

Source Server         : _localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : microsites

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2011-12-12 22:47:33
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES ('50', '5', '1323256782_2011.10_.06_1317918533_greedcorp05_iPad_.jpg', null, null, null, null, null, null);
INSERT INTO `image` VALUES ('51', '5', '1323256794_2011.10_.06_1317918539_greedcorp02_iPad_.jpg', null, null, null, null, null, null);
INSERT INTO `image` VALUES ('74', '6', '1323696873_IMG_0345.png', '2', null, null, null, null, null);
INSERT INTO `image` VALUES ('75', '6', '1323696914_IMG_1868.PNG', '5', null, null, null, null, null);
INSERT INTO `image` VALUES ('76', '6', '1323696914_IMG_0348.png', '4', null, null, null, null, null);
INSERT INTO `image` VALUES ('77', '6', '1323696914_IMG_0352.png', '6', null, null, null, null, null);
INSERT INTO `image` VALUES ('78', '6', '1323696914_IMG_0347.png', '0', null, null, null, null, null);
INSERT INTO `image` VALUES ('79', '6', '1323696914_IMG_1865.PNG', '3', null, null, null, null, null);
INSERT INTO `image` VALUES ('80', '6', '1323696914_IMG_0350.png', '1', null, null, null, null, null);
INSERT INTO `image` VALUES ('81', '4', '1323697369_2011.10_.06_1317918533_greedcorp05_iPad_.jpg', '0', 'Outbound links', 'Click', 'GC Image 4', '1', null);
INSERT INTO `image` VALUES ('82', '4', '1323697705_2011.10_.06_1317918539_greedcorp02_iPad_.jpg', '3', 'Outbound links', 'Click', 'GC Image 3', '1', null);
INSERT INTO `image` VALUES ('83', '4', '1323697705_2011.10_.06_1317918574_greedcorp01_iPad_.jpg', '1', 'Outbound links', 'Click', 'GC Image 2', '1', null);
INSERT INTO `image` VALUES ('84', '4', '1323698604_2011.10_.06_1317918578_greedcorp04_iPad_.jpg', '2', 'Outbound links', 'Click', 'GC Image 1', '1', null);

-- ----------------------------
-- Table structure for `review`
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `description` text,
  `rate` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `press` varchar(255) DEFAULT NULL,
  `press_logo` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `ga_category` varchar(255) DEFAULT NULL,
  `ga_action` varchar(255) DEFAULT NULL,
  `ga_label` varchar(255) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `reviewd_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of review
-- ----------------------------
INSERT INTO `review` VALUES ('1', 'Race Of Champions Review', 'http://www.148apps.com/reviews/race-champions-review/', 'Real Racing 2 has competition on its hands. That’s the most striking thing to come to mind when looking at Race of Champions. It’s a bit of admitted hyperbole, as there’s plenty of room for two excellent racing games on the App Store, but it’s an easy way to explain that Race of Champions is rather good.', '3', '3', null, null, null, null, null, null, null, null, null, null);
INSERT INTO `review` VALUES ('3', 'Lorem Ipsum is simply dummy text 1', 'http://google.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2', '4', 'Lorem Ipsum dolor', '1323722355_30x30.gif', null, '0', 'Outbound links', 'Click', 'Review 1', '1', null, '2011-12-01 00:00:00');
INSERT INTO `review` VALUES ('4', 'Lorem Ipsum is simply dummy text 2', 'http://google.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', '3', '4', 'Lorem Ipsum', '1323722388_30x30.gif', null, '1', 'Outbound links', 'Click', 'Review 2', '1', null, '2011-11-30 00:00:00');

-- ----------------------------
-- Table structure for `site`
-- ----------------------------
DROP TABLE IF EXISTS `site`;
CREATE TABLE `site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `background_image` varchar(255) DEFAULT NULL,
  `background_color` varchar(255) DEFAULT NULL,
  `font_color` varchar(255) DEFAULT NULL,
  `description` text,
  `link_color` varchar(255) DEFAULT NULL,
  `about_background_color` varchar(255) DEFAULT NULL,
  `reviews_background_color` varchar(255) DEFAULT NULL,
  `ga_code` text,
  `app_id` varchar(255) DEFAULT NULL,
  `stores_background_color` varchar(255) DEFAULT NULL,
  `section_title_color` varchar(255) DEFAULT NULL,
  `body_background_color` varchar(255) DEFAULT NULL,
  `bubble_background_color` varchar(255) DEFAULT NULL,
  `bubble_border_color` varchar(255) DEFAULT NULL,
  `bubble_color` varchar(255) DEFAULT NULL,
  `reviews_link_color` varchar(255) DEFAULT NULL,
  `reviews_press_color` varchar(255) DEFAULT NULL,
  `page_link_color` varchar(255) DEFAULT NULL,
  `page_active_color` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of site
-- ----------------------------
INSERT INTO `site` VALUES ('3', 'Race Of Champion Official Mobile Game', 'roc', 'Race Of Champion Official Mobile Game Promotion Site', '1323676106_roc-bg.png', '#000000', '#', 'Setting the optional page path parameter — The final parameter to the _trackSocial method is to override the current URL from which a social interaction occurred. The end goal is to have the same URLs being reported between page tracking and Social Plug-in Analytics. Since some users might override the default page URL being tracked with page view tracking, they also need a way to override the URL in Social Plug-in Analytics in order to achieve consistent reporting.', '#', '#', '#', '', '', '#', '#', null, null, null, null, null, null, null, null);
INSERT INTO `site` VALUES ('4', 'Greed Corp', 'greed-corp', 'Official Game', '1323717792_bgw.png', '#ffffff', '#000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '#000000', '#e8e8e8', '#e8e8e8', '  var _gaq = _gaq || [];\r\n\r\n  _gaq.push([\'_setAccount\', \'UA-27571060-1\']);\r\n\r\n  _gaq.push([\'_setDomainName\', \'invictus.hu\']);\r\n\r\n  _gaq.push([\'_trackPageview\']);\r\n\r\n \r\n\r\n  (function() {\r\n\r\n    var ga = document.createElement(\'script\'); ga.type = \'text/javascript\'; ga.async = true;\r\n\r\n    ga.src = (\'https:\' == document.location.protocol ? \'https://ssl\' : \'http://www\') + \'.google-analytics.com/ga.js\';\r\n\r\n    var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(ga, s);\r\n\r\n  })();', '150129875093790', '#e8e8e8', '#634F4C', '#', '#f5cccc', '#f67979', '#d50b0b', '#f67728', '#eec49b', '#f45d5d', '#191010');
INSERT INTO `site` VALUES ('5', 'Santa Ride', 'santa-ride', 'Santa Ride', '1323251767_bg.png', '#ffffff', '#000000', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);
INSERT INTO `site` VALUES ('6', 'Mist Bouncer', 'mist-bouncer', 'Official Game', '1323717041_bg.png', '#D4E5F4', '#', 'CodeIgniter comes with a Cross Site Scripting Hack prevention filter which can either run automatically to filter all POST and COOKIE data that is encountered, or you can run it on a per item basis. By default it does not run globally since it requires a bit of processing overhead, and since you may not need it in all cases.\r\n\r\nThe XSS filter looks for commonly used techniques to trigger Javascript or other types of code that attempt to hijack cookies or do other malicious things. If anything disallowed is encountered it is rendered safe by converting the data to character entities.\r\n\r\nNote: This function should only be used to deal with data upon submission. It\'s not something that should be used for general runtime processing since it requires a fair amount of processing overhead.', '#', '#eee', '#eee', '', '', '#eee', '#000', '#f1fdfd', null, null, null, null, null, null, null);

-- ----------------------------
-- Table structure for `store`
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_id` int(11) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `ga_category` varchar(255) DEFAULT NULL,
  `ga_action` varchar(255) DEFAULT NULL,
  `ga_label` varchar(255) DEFAULT NULL,
  `ga_value` int(11) DEFAULT NULL,
  `ga_noninteraction` int(11) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('11', '14', '4', 'http://google.com', 'Outbound links', 'click', 'iPhone App Store', '1', null, 'iPhone', '0');
INSERT INTO `store` VALUES ('12', '14', '4', 'http://google.com', 'Outbound Link', 'click', 'iPad App Store', '1', null, 'iPad', '1');
INSERT INTO `store` VALUES ('14', '15', '4', 'http://google.com', 'Outbound Link', 'click', 'Android Store Phone', '1', null, 'Phone', '3');
INSERT INTO `store` VALUES ('15', '15', '4', 'http://google.com', 'Outbound Link', 'click', 'Android Store Tablet', '1', null, 'Tablet', '4');
INSERT INTO `store` VALUES ('16', '16', '4', 'http://google.com', 'Outbound Link', 'click', 'Mac Store', '1', null, '', '2');
INSERT INTO `store` VALUES ('17', '17', '6', 'http://google.com', '', '', '', '1', null, '', '0');
INSERT INTO `store` VALUES ('18', '18', '6', 'http://google.com', '', '', '', '1', null, '', null);

-- ----------------------------
-- Table structure for `store_type`
-- ----------------------------
DROP TABLE IF EXISTS `store_type`;
CREATE TABLE `store_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of store_type
-- ----------------------------
INSERT INTO `store_type` VALUES ('14', 'App store', '1323418157_app_store_badge.png');
INSERT INTO `store_type` VALUES ('15', 'Android Market', '1323418175_android_market.png');
INSERT INTO `store_type` VALUES ('16', 'Mac Store', '1323418192_mac_app_store_badge.png');
INSERT INTO `store_type` VALUES ('17', 'iPhone Coming soon', '1323418215_store_iphone_cs.png');
INSERT INTO `store_type` VALUES ('18', 'iPad Coming soon', '1323418238_store_ipad_cs.png');
INSERT INTO `store_type` VALUES ('19', 'Android Phone Coming soon', '1323418261_store_android_phone_cs.png');
INSERT INTO `store_type` VALUES ('20', 'Android Tablet Coming soon', '1323418278_store_android_tablet_cs.png');
INSERT INTO `store_type` VALUES ('21', 'Mac Store Coming soon', '1323418300_mac_app_store_badge_cs.png');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of video
-- ----------------------------
INSERT INTO `video` VALUES ('2', 'Dynamite - Taio Cruz (Boyce Avenue acoustic/piano cover) on iTunes', '3', '&lt;iframe src=\"http://www.youtube.com/embed/30WakIlloqs\" allowfullscreen=\"\" frameborder=\"0\" height=\"350\" width=\"450\"&gt;&lt;/iframe>', null, null, null, null, null, null);
INSERT INTO `video` VALUES ('3', 'To demonstrate this process here is brief tutorial. Afterward you\'ll find reference information.', '4', '&lt;iframe src=\"http://www.youtube.com/embed/1P3MegpkaMI\" allowfullscreen=\"\" frameborder=\"0\" height=\"350\" width=\"450\"&gt;&lt;/iframe>', 'Outbound links', 'Click', 'GC Video 1', '1', null, '1');
INSERT INTO `video` VALUES ('4', 'To demonstrate this process here is brief tutorial. Afterward you\'ll find reference information.', '4', '&lt;iframe src=\"http://www.youtube.com/embed/1P3MegpkaMI\" allowfullscreen=\"\" frameborder=\"0\" height=\"350\" width=\"450\"&gt;&lt;/iframe>', 'Outbound links', 'Click', 'GC Video 2', '1', null, '0');
INSERT INTO `video` VALUES ('5', 'Video', '6', '&lt;iframe width=\"450\" height=\"350\" src=\"http://www.youtube.com/embed/gc4m7IEqdAk\" frameborder=\"0\" allowfullscreen&gt;&lt;/iframe>', null, null, null, null, null, null);
