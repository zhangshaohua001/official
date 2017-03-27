/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50717
Source Host           : localhost:3306
Source Database       : official

Target Server Type    : MYSQL
Target Server Version : 50717
File Encoding         : 65001

Date: 2017-03-27 15:43:36
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for action_comment
-- ----------------------------
DROP TABLE IF EXISTS `action_comment`;
CREATE TABLE `action_comment` (
  `id` int(11) DEFAULT NULL,
  `classify` tinyint(3) DEFAULT NULL COMMENT '1-original   2-beauty  3-positive',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of action_comment
-- ----------------------------

-- ----------------------------
-- Table structure for action_left
-- ----------------------------
DROP TABLE IF EXISTS `action_left`;
CREATE TABLE `action_left` (
  `id` int(11) DEFAULT NULL,
  `classify` tinyint(3) DEFAULT NULL COMMENT '1-original   2-beauty  3-positive',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of action_left
-- ----------------------------

-- ----------------------------
-- Table structure for art_about
-- ----------------------------
DROP TABLE IF EXISTS `art_about`;
CREATE TABLE `art_about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text COLLATE utf8_unicode_ci,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of art_about
-- ----------------------------
INSERT INTO `art_about` VALUES ('1', '<p>哈哈哈哈333dfsdf</p>', '自我介绍', '0');

-- ----------------------------
-- Table structure for art_beauty
-- ----------------------------
DROP TABLE IF EXISTS `art_beauty`;
CREATE TABLE `art_beauty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of art_beauty
-- ----------------------------
INSERT INTO `art_beauty` VALUES ('1', '45746754', '<p>456让他要特意会的</p><p><img src=\"http://official.com/upload/image/20170304/1488627334169450.png\" title=\"1488627334169450.png\" alt=\"image001.png\"/></p>', '2017-03-04 19:35:39', '2017-03-04 19:35:39', null, '0', null);

-- ----------------------------
-- Table structure for art_news
-- ----------------------------
DROP TABLE IF EXISTS `art_news`;
CREATE TABLE `art_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `browse_times` int(2) DEFAULT '0',
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL COMMENT '属于那个列表',
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of art_news
-- ----------------------------
INSERT INTO `art_news` VALUES ('10', '的算法的发', '/uploads/2017032516363361183.png', '<p>撒旦是<br/></p>', '1', '2017-03-25 16:36:33', '2017-03-25 16:36:33', '9', '0');
INSERT INTO `art_news` VALUES ('11', '你好', '/uploads/2017032516370672294.jpg', '<p>人<br/></p>', '2', '2017-03-25 16:37:06', '2017-03-25 16:37:06', '9', '0');
INSERT INTO `art_news` VALUES ('12', '不错', '/uploads/2017032516415474157.jpg', '十大；飞；来看看了； <br/><p><span style=\"color: rgb(100, 100, 100); font-family: &quot;Microsoft YaHei&quot;, arial, helvetica, clean, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\">公司董事长李精家，总经理戴<strong>启波，副总经理黄琛，副总经理樊中力，财务总监余璇，技术总监张庆运，副总经理孙佳豪等公司主要领导，按照公司服务风场的区</strong>域范围，在百忙之中抽出时间分别前往不同的区域慰问驻守在那里的现场员工</span></p><p><span style=\"color: rgb(100, 100, 100); font-family: &quot;Microsoft YaHei&quot;, arial, helvetica, clean, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\">公司董事长李精家，总经理戴启波，副总经理黄琛，副总经理樊中力，财务总监余璇，技术总监张庆运，副总经理孙佳豪等公司主要领导，按照公司服务风场的区域范围，在百忙之中抽出时间分别前往不同的区域慰问驻守在那里的现场员工</span></p><p><img src=\"http://official.com/upload/image/20170325/1490431311572924.jpg\" title=\"1490431311572924.jpg\" alt=\"jinjie.jpg\"/></p>', '6', '2017-03-25 16:41:54', '2017-03-25 16:41:54', '9', '0');

-- ----------------------------
-- Table structure for art_positive
-- ----------------------------
DROP TABLE IF EXISTS `art_positive`;
CREATE TABLE `art_positive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `tag_id` int(11) DEFAULT NULL,
  `del_flag` tinyint(255) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of art_positive
-- ----------------------------
INSERT INTO `art_positive` VALUES ('1', '的算法的发', '<p><img src=\"http://admin.blog.com/upload/image/20170304/1488626116824222.jpg\" title=\"1488626116824222.jpg\" alt=\"123.jpg\"/>方式的反反复复22的</p>', null, '2017-03-04 19:15:27', null, '0');

-- ----------------------------
-- Table structure for art_tags
-- ----------------------------
DROP TABLE IF EXISTS `art_tags`;
CREATE TABLE `art_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `route_id` int(5) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci,
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `del_flag` tinyint(3) NOT NULL DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of art_tags
-- ----------------------------
INSERT INTO `art_tags` VALUES ('1', '企业简介', '4', '<p><img src=\"http://official.com/upload/image/20170325/1490409377906026.jpg\" title=\"1490409377906026.jpg\" alt=\"jinjie.jpg\"/></p><p style=\"margin: 0px; padding: 0px; text-indent: 2em; color: rgb(100, 100, 100); font-size: 16px; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, arial, helvetica, clean, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"><strong style=\"color: rgb(0, 104, 177);\">北京优利康达科技股份有限公司</strong>，英文简称EULIKIND，股票代码839234，是目前国内成立时间最早、服务客户与机型最多、规模最大、按照国际化标准打造的，专注于为风电后市场提供整体运营维护解决方案的独立第三方服务商ISP。</p><p style=\"margin: 0px; padding: 0px; text-indent: 2em; color: rgb(100, 100, 100); font-size: 16px; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;, arial, helvetica, clean, sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">优利康达秉持“科技创新、智慧服务”的理念，自2003年6月成立以来，不断推陈出新，提升服务品质，赢得社会和客户的高度认可，认定为北京市高新技术企业，荣获相关行业协会颁发的“中国风电行业最具创新力企业”、“中国新能源产业最具影响力企业”、“自主创新百强企业”等荣誉称号。</p><p style=\"margin: 0px; padding: 0px; text-indent: 2em; color: rgb(100, 100, 100); font-size: 16px; line-height: 30px; font-family: &quot;Microsoft YaHei&quot;,arial,helvetica,clean,sans-serif; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: normal; letter-spacing: normal; text-align: start; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">为了更好地顺应风电产业发展趋势，实现公司快速、可持续发展，优利康达将在巩固发展现有优势业务的同时，运用互联网思维着力突出技术与商业模式创新，不断优化管控模式，坚持实业经营与资本运作并举，将公司打造成为集“运维服务、备件供应与服务、智慧预维护、专业人才服务”四位一体、协同共享发展的行业一流风电运维综合性服务平台。</p>', '2017-03-25 10:36:44', '2017-03-26 19:40:03', '0');
INSERT INTO `art_tags` VALUES ('2', '品牌理念', '7', '<p>&nbsp;&nbsp;&nbsp; <img src=\"http://official.com/upload/image/20170325/1490409558934779.jpg\" title=\"1490409558934779.jpg\" alt=\"123.jpg\"/>水电费规划</p><p><br/></p>', '2017-03-25 10:39:21', '2017-03-26 19:38:53', '0');

-- ----------------------------
-- Table structure for basic_user
-- ----------------------------
DROP TABLE IF EXISTS `basic_user`;
CREATE TABLE `basic_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(100) DEFAULT '',
  `realname` varchar(20) NOT NULL DEFAULT '',
  `mobile` varchar(20) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1-正常 0-禁用',
  `add_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `edit_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `login_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `del_flag` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0-正常 1-删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of basic_user
-- ----------------------------
INSERT INTO `basic_user` VALUES ('1', 'admin', '14e1b600b1fd579f47433b88e8d85291', '张少华', '13581560494', '1', '2016-12-07 14:48:05', '2017-02-24 11:14:59', '2017-03-26 19:12:37', '127.0.0.1', '0');
INSERT INTO `basic_user` VALUES ('2', 'admin13355', '', 'admin12', '15355699965', '1', '2016-12-07 15:09:09', '2017-02-26 11:36:34', '0000-00-00 00:00:00', '', '0');
INSERT INTO `basic_user` VALUES ('3', 'admin33', '9db06bcff9248837f86d1a6bcf41c9e7', 'admin', '15724703694', '1', '2016-12-07 17:26:40', '2017-01-14 14:39:19', '2017-01-14 14:35:56', '127.0.0.1', '0');
INSERT INTO `basic_user` VALUES ('4', 'ceshi5666', '9db06bcff9248837f86d1a6bcf41c9e7', 'smile444', '15666355589', '1', '2017-01-14 14:40:23', '2017-01-14 14:48:24', '2017-01-14 14:54:10', '127.0.0.1', '0');
INSERT INTO `basic_user` VALUES ('5', 'ceshi6', '9db06bcff9248837f86d1a6bcf41c9e7', 'haha', '15888966652', '1', '2017-01-14 14:46:29', '2017-01-14 14:46:29', '0000-00-00 00:00:00', '', '0');
INSERT INTO `basic_user` VALUES ('6', '123123', '63ee451939ed580ef3c4b6f0109d1fd0', '123123', '18410101669', '1', '2017-02-26 11:40:04', '2017-02-26 11:40:04', '2017-02-26 11:40:04', '', '0');

-- ----------------------------
-- Table structure for off_loop
-- ----------------------------
DROP TABLE IF EXISTS `off_loop`;
CREATE TABLE `off_loop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` varchar(255) DEFAULT NULL,
  `add_time` datetime DEFAULT NULL,
  `edit_time` datetime DEFAULT NULL,
  `del_flag` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of off_loop
-- ----------------------------
INSERT INTO `off_loop` VALUES ('1', '中国新能源服务领先者', '/uploads/2017032516415474157.jpg', '2', '2017-03-25 21:36:23', '2017-03-25 21:36:29', '0');
INSERT INTO `off_loop` VALUES ('2', '中国新能源服务领先者', '/uploads/2017032522012838927.png', '3', null, '2017-03-25 22:08:04', '0');
INSERT INTO `off_loop` VALUES ('3', '中国新能源服务领先者', '/uploads/2017032618350240612.jpg', '1', '2017-03-25 22:03:17', '2017-03-26 18:35:02', '0');

-- ----------------------------
-- Table structure for routes
-- ----------------------------
DROP TABLE IF EXISTS `routes`;
CREATE TABLE `routes` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `en_name` varchar(50) DEFAULT NULL,
  `parent_id` int(5) DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `sort` int(2) DEFAULT '0',
  `del_flag` int(1) DEFAULT '0',
  `tag` int(1) DEFAULT '0' COMMENT '0:展示内容;1:内容列表',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of routes
-- ----------------------------
INSERT INTO `routes` VALUES ('1', '企业介绍 ', 'qiyejieshao', '0', '', '/uploads/2017032509220884970.jpg', '1', '0', '0');
INSERT INTO `routes` VALUES ('2', '新闻中心', 'xinwenzhongxin', '0', '', '/uploads/2017032510102055144.png', '2', '0', '0');
INSERT INTO `routes` VALUES ('3', '企业概况', 'qiyegaikuang', '1', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('4', '企业简介', 'qiyejianjie', '3', null, null, null, '0', '0');
INSERT INTO `routes` VALUES ('5', '组织架构', 'zuzhijiagou', '3', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('6', '企业文化', 'qiyewenhua', '1', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('7', '品牌理念', 'pinpailinian', '6', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('8', '企业动态', 'qiyedongtai', '2', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('9', '公司要闻', 'gongsiyaowen', '8', null, null, '0', '0', '1');
INSERT INTO `routes` VALUES ('10', '公告声明', 'gonggaoshengming', '8', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('11', '行业动态', 'xingyedongtai', '2', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('12', '行业资讯', 'xingyezixun', '11', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('13', '政策法规', 'zhengzefagui', '11', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('14', '联系我们', 'lianxiwomen', '1', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('15', '加入我们', 'jiaruwomen', '14', null, null, '0', '0', '0');
INSERT INTO `routes` VALUES ('17', '联系我们', null, '14', '123zx', '/uploads/2017031919295535886.jpg', '2', '0', '0');
