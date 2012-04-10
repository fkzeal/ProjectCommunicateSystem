# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.5.13
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-04-04 17:58:54
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for nju_software_app_management
-- create user if not exist
grant all on nju_software_app_management.* to '123'@'localhost' identified by 'nju123';
DROP DATABASE IF EXISTS `nju_software_app_management`;
CREATE DATABASE IF NOT EXISTS `nju_software_app_management` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `nju_software_app_management`;


# Dumping structure for table nju_software_app_management.app_tag
DROP TABLE IF EXISTS `app_tag`;
CREATE TABLE IF NOT EXISTS `app_tag` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `AppID` int(10) NOT NULL DEFAULT '0',
  `TagID` int(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `FK_app_tag_project_app` (`AppID`),
  KEY `FK_app_tag_tag_info` (`TagID`),
  CONSTRAINT `FK_app_tag_tag_info` FOREIGN KEY (`TagID`) REFERENCES `tag_info` (`ID`),
  CONSTRAINT `FK_app_tag_project_app` FOREIGN KEY (`AppID`) REFERENCES `project_app` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.app_tag: ~0 rows (approximately)
DELETE FROM `app_tag`;
/*!40000 ALTER TABLE `app_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `app_tag` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.category_info
DROP TABLE IF EXISTS `category_info`;
CREATE TABLE IF NOT EXISTS `category_info` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstLevel` varchar(16) NOT NULL COMMENT '第一级目录',
  `SecondLevel` varchar(16) DEFAULT NULL,
  `Flag` char(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.category_info: ~15 rows (approximately)
DELETE FROM `category_info`;
/*!40000 ALTER TABLE `category_info` DISABLE KEYS */;
INSERT INTO `category_info` (`ID`, `FirstLevel`, `SecondLevel`, `Flag`) VALUES
	(1, '游戏', NULL, 'a'),
	(2, '工具', NULL, 'a'),
	(5, '娱乐', NULL, 'a'),
	(6, '音乐', NULL, 'a'),
	(7, '生活', NULL, 'a'),
	(8, '网站', NULL, 'a'),
	(9, '课程作业', NULL, 'a'),
	(10, '创新杯', NULL, 'a'),
	(11, '网站项目', NULL, 'c'),
	(12, '桌面项目', NULL, 'c'),
	(13, 'Android项目', NULL, 'c'),
	(14, 'iOS项目', NULL, 'c'),
	(15, '课程作业', NULL, 'c'),
	(16, '创新杯', NULL, 'c'),
	(17, '其他', NULL, 'c');
/*!40000 ALTER TABLE `category_info` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.client
DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(512) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.client: ~0 rows (approximately)
DELETE FROM `client`;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
/*!40000 ALTER TABLE `client` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.code_tag
DROP TABLE IF EXISTS `code_tag`;
CREATE TABLE IF NOT EXISTS `code_tag` (
  `ID` int(10) NOT NULL AUTO_INCREMENT,
  `CodeID` int(10) NOT NULL,
  `TagID` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_code_tag_project_code` (`CodeID`),
  KEY `FK_code_tag_tag_info` (`TagID`),
  CONSTRAINT `FK_code_tag_project_code` FOREIGN KEY (`CodeID`) REFERENCES `project_code` (`ID`),
  CONSTRAINT `FK_code_tag_tag_info` FOREIGN KEY (`TagID`) REFERENCES `tag_info` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.code_tag: ~0 rows (approximately)
DELETE FROM `code_tag`;
/*!40000 ALTER TABLE `code_tag` DISABLE KEYS */;
/*!40000 ALTER TABLE `code_tag` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.delivery_address
DROP TABLE IF EXISTS `delivery_address`;
CREATE TABLE IF NOT EXISTS `delivery_address` (
  `id` bigint(10) NOT NULL AUTO_INCREMENT,
  `client_id` bigint(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  CONSTRAINT `delivery_address_ibfk_1` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.delivery_address: ~0 rows (approximately)
DELETE FROM `delivery_address`;
/*!40000 ALTER TABLE `delivery_address` DISABLE KEYS */;
/*!40000 ALTER TABLE `delivery_address` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.project
DROP TABLE IF EXISTS `project`;
CREATE TABLE IF NOT EXISTS `project` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectName` varchar(30) NOT NULL DEFAULT '',
  `ProjectStatus` int(2) NOT NULL,
  `TeamName` varchar(40) NOT NULL DEFAULT '无团队名',
  `ProjectDescription` longtext NOT NULL,
  `ProjectCreatedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ProjectIconPath` varchar(80) DEFAULT '',
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `project_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.project: ~23 rows (approximately)
DELETE FROM `project`;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;
INSERT INTO `project` (`ID`, `ProjectName`, `ProjectStatus`, `TeamName`, `ProjectDescription`, `ProjectCreatedTime`, `ProjectIconPath`, `UserID`) VALUES
	(4, 'renren', 0, '无', 'renren', '2012-02-23 10:50:14', '', 1),
	(5, 'facebook', 0, '无', 'facebook', '2012-02-23 10:52:52', '', 1),
	(6, 'renre', 0, '无', 'renren', '2012-02-28 21:37:53', '', 1),
	(7, 'rwer', 0, '无', '是dvd双方的分别\n', '2012-02-28 21:38:28', '', 1),
	(8, '发顺丰', 0, '无', 'renren是dvd双方的分别\n是dvd双方的分别\n是dvd双方的分别\n\n', '2012-02-28 21:38:37', '', 1),
	(27, '你好', 0, '无团队名', '<p>阿斯顿发斯蒂芬asdfsadf</p>', '2012-04-04 17:50:44', 'Icon\\27\\你好.jpg', 21);
/*!40000 ALTER TABLE `project` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.project_app
DROP TABLE IF EXISTS `project_app`;
CREATE TABLE IF NOT EXISTS `project_app` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AppScore` float NOT NULL DEFAULT '0',
  `AppDownloadTimes` int(8) NOT NULL DEFAULT '0',
  `ProjectID` int(11) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProjectID` (`ProjectID`),
  CONSTRAINT `project_app_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.project_app: ~5 rows (approximately)
DELETE FROM `project_app`;
/*!40000 ALTER TABLE `project_app` DISABLE KEYS */;
INSERT INTO `project_app` (`ID`, `AppScore`, `AppDownloadTimes`, `ProjectID`, `CategoryID`) VALUES
	(3, 0, 3, 4, 1),
	(4, 0, 4, 5, 1),
	(5, 0, 5, 6, 1),
	(6, 0, 6, 7, 1),
	(7, 0, 7, 8, 1),
	(25, 0, 0, 27, 1);
/*!40000 ALTER TABLE `project_app` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.project_code
DROP TABLE IF EXISTS `project_code`;
CREATE TABLE IF NOT EXISTS `project_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `CodeScore` float NOT NULL DEFAULT '0',
  `CodeDownloadTimes` int(8) NOT NULL DEFAULT '0',
  `CodeDescription` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '关于代码的描述',
  `CategoryID` int(11) NOT NULL,
  `CodeFragment` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '代码的片段',
  PRIMARY KEY (`ID`),
  KEY `ProjectID` (`ProjectID`),
  KEY `FK_project_code_category_info` (`CategoryID`),
  CONSTRAINT `FK_project_code_category_info` FOREIGN KEY (`CategoryID`) REFERENCES `category_info` (`ID`),
  CONSTRAINT `project_code_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.project_code: ~5 rows (approximately)
DELETE FROM `project_code`;
/*!40000 ALTER TABLE `project_code` DISABLE KEYS */;
INSERT INTO `project_code` (`ID`, `ProjectID`, `CodeScore`, `CodeDownloadTimes`, `CodeDescription`, `CategoryID`, `CodeFragment`) VALUES
	(3, 4, 0, 3, 'asdf', 1, 'asdf'),
	(4, 5, 0, 4, 'sadf', 1, 'safde'),
	(5, 6, 0, 5, 'MVC', 1, 'echo \'hello world\''),
	(6, 7, 0, 6, 'as', 1, 'sdaf'),
	(7, 8, 0, 7, 'sf', 1, 'asdf'),
	(26, 27, 0, 0, '<p>撒旦法撒旦发asdfsadf</p>', 14, '<p>阿斯顿发斯蒂芬asdfsadf</p>');
/*!40000 ALTER TABLE `project_code` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.project_comment
DROP TABLE IF EXISTS `project_comment`;
CREATE TABLE IF NOT EXISTS `project_comment` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `Content` text NOT NULL,
  `ProjectID` int(100) NOT NULL,
  `Flag` char(2) NOT NULL COMMENT 'distinguish app and code',
  `UserID` int(20) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `FK_app_comment_project` (`ProjectID`),
  KEY `UserID` (`UserID`),
  CONSTRAINT `FK_app_comment_project` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `project_comment_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.project_comment: ~12 rows (approximately)
DELETE FROM `project_comment`;
/*!40000 ALTER TABLE `project_comment` DISABLE KEYS */;
INSERT INTO `project_comment` (`ID`, `Content`, `ProjectID`, `Flag`, `UserID`) VALUES
	(13, '来一个吧', 4, 'c', 14);
/*!40000 ALTER TABLE `project_comment` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.project_reference
DROP TABLE IF EXISTS `project_reference`;
CREATE TABLE IF NOT EXISTS `project_reference` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `WhoRefer` int(11) NOT NULL,
  `BeRefered` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.project_reference: ~4 rows (approximately)
DELETE FROM `project_reference`;
/*!40000 ALTER TABLE `project_reference` DISABLE KEYS */;
INSERT INTO `project_reference` (`ID`, `WhoRefer`, `BeRefered`) VALUES
	(1, 13, 4),
	(2, 13, 8),
	(3, 13, 9),
	(4, 13, 10);
/*!40000 ALTER TABLE `project_reference` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.tag_info
DROP TABLE IF EXISTS `tag_info`;
CREATE TABLE IF NOT EXISTS `tag_info` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `TagContent` varchar(50) NOT NULL,
  `Flag` char(2) NOT NULL COMMENT 'a for app c for code',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.tag_info: ~10 rows (approximately)
DELETE FROM `tag_info`;
/*!40000 ALTER TABLE `tag_info` DISABLE KEYS */;
INSERT INTO `tag_info` (`ID`, `TagContent`, `Flag`) VALUES
	(1, '设计模式', 'c'),
	(2, '完美大作业', 'c'),
	(3, '游戏', 'a'),
	(4, '抽象工厂', 'c'),
	(5, '桥模式', 'c'),
	(6, '观察者模式', 'c'),
	(7, '自娱自乐', 'a'),
	(8, '使用框架', 'c'),
	(9, '想不出来了。。', 'a'),
	(10, '想不出来了。。', 'c');
/*!40000 ALTER TABLE `tag_info` ENABLE KEYS */;


# Dumping structure for table nju_software_app_management.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '学号',
  `NickName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户可以自定义的名称，显示为你好，xxx',
  `Authority` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '0 for appFinder;1for developer; 2for master_developer; 3for admin',
  `Gender` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'n for null;F for female;M or male',
  `DistributionScore` int(6) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

# Dumping data for table nju_software_app_management.user: ~10 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`ID`, `UserName`, `NickName`, `Authority`, `Gender`, `DistributionScore`) VALUES
	(1, 'NJuer', '我是你妹', 0, 'F', 0),
	(2, '091250085', 'apple', 0, 'F', 0),
	(3, '123', 'pig', 1, 'M', 0),
	(7, '85', 'lee', 1, 'M', 0),
	(13, '3444', 'dqwe', 0, '', 0),
	(14, 'LYf', NULL, 1, '', 0),
	(15, 'admin', NULL, 2, '', 0),
	(17, 'lyf09', 'EVASLEE123', 1, 'M', 0),
	(20, 'zhangyh09', 'zhangyh09', 1, '', 0),
	(21, 'yjj09', 'yjj09', 1, '', 0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
