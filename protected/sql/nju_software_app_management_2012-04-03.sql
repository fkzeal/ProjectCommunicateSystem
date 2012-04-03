# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.1.44)
# Database: nju_software_app_management
# Generation Time: 2012-04-03 01:59:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table app_code_category
# ------------------------------------------------------------

-- create user if not exist
grant all on nju_software_app_management.* to '123'@'localhost' identified by 'nju123';

DROP TABLE IF EXISTS `app_code_category`;

CREATE TABLE `app_code_category` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `CategoryID` int(5) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProjectID` (`ProjectID`),
  KEY `CategoryID` (`CategoryID`),
  CONSTRAINT `app_code_category_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `app_code_category_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_code_category` WRITE;
/*!40000 ALTER TABLE `app_code_category` DISABLE KEYS */;

INSERT INTO `app_code_category` (`ID`, `ProjectID`, `CategoryID`)
VALUES
	(2,13,5),
	(3,24,2),
	(4,25,2),
	(5,25,2);

/*!40000 ALTER TABLE `app_code_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table app_code_tag
# ------------------------------------------------------------

DROP TABLE IF EXISTS `app_code_tag`;

CREATE TABLE `app_code_tag` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `TagID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProjectID_2` (`ProjectID`),
  KEY `app_code_tag_ibfk_2` (`TagID`),
  CONSTRAINT `app_code_tag_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `app_code_tag_ibfk_2` FOREIGN KEY (`TagID`) REFERENCES `tag_info` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `app_code_tag` WRITE;
/*!40000 ALTER TABLE `app_code_tag` DISABLE KEYS */;

INSERT INTO `app_code_tag` (`ID`, `ProjectID`, `TagID`)
VALUES
	(2,13,10),
	(3,13,8),
	(4,13,6),
	(5,13,3),
	(6,13,7),
	(7,12,3),
	(8,12,7),
	(9,4,9);

/*!40000 ALTER TABLE `app_code_tag` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_info`;

CREATE TABLE `category_info` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `FirstLevel` varchar(16) NOT NULL COMMENT '第一级目录',
  `SecondLevel` varchar(16) DEFAULT NULL,
  `Flag` char(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `category_info` WRITE;
/*!40000 ALTER TABLE `category_info` DISABLE KEYS */;

INSERT INTO `category_info` (`ID`, `FirstLevel`, `SecondLevel`, `Flag`)
VALUES
	(1,'游戏',NULL,'a'),
	(2,'工具',NULL,'a'),
	(5,'娱乐',NULL,'a'),
	(6,'音乐',NULL,'a'),
	(7,'生活',NULL,'a'),
	(8,'网站',NULL,'a'),
	(9,'课程作业',NULL,'a'),
	(10,'创新杯',NULL,'a'),
	(11,'网站项目',NULL,'c'),
	(12,'桌面项目',NULL,'c'),
	(13,'Android项目',NULL,'c'),
	(14,'iOS项目',NULL,'c'),
	(15,'课程作业',NULL,'c'),
	(16,'创新杯',NULL,'c'),
	(17,'其他',NULL,'c');

/*!40000 ALTER TABLE `category_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project`;

CREATE TABLE `project` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project` WRITE;
/*!40000 ALTER TABLE `project` DISABLE KEYS */;

INSERT INTO `project` (`ID`, `ProjectName`, `ProjectStatus`, `TeamName`, `ProjectDescription`, `ProjectCreatedTime`, `ProjectIconPath`, `UserID`)
VALUES
	(4,'renren',0,'无','renren','2012-02-23 10:50:14','',1),
	(5,'facebook',0,'无','facebook','2012-02-23 10:52:52','',1),
	(6,'renre',0,'无','renren','2012-02-28 21:37:53','',1),
	(7,'rwer',0,'无','是dvd双方的分别\n','2012-02-28 21:38:28','',1),
	(8,'发顺丰',0,'无','renren是dvd双方的分别\n是dvd双方的分别\n是dvd双方的分别\n\n','2012-02-28 21:38:37','',1),
	(9,'返回',0,'无','是dvd双方的分别\n是dvd双方的分别\nrenren','2012-03-08 15:50:05','',1),
	(10,'将很快',1,'无','撒旦的大时代renren','2012-02-28 21:38:51','',1),
	(11,'音悦台',0,'无','撒旦的大时代renren\n撒旦的大时代renren撒旦的大时代renren撒旦的大时代renren','2012-02-28 21:39:01','',1),
	(12,'模板',0,'无','撒旦是vagtyrenren','2012-02-28 21:39:08','',1),
	(13,'聊聊',0,'无','renren与苦英英\n','2012-02-28 21:39:14','',1),
	(14,'123new',0,'无','<p>sdhcbdhjs不撒谎都不错</p>','2012-03-06 20:43:20','',1),
	(15,'123new',0,'无','<p>sdhcbdhjs不撒谎都不错<img src=\"http://img1.51cto.com/attachment/201004/173629710.png\" alt=\"\" width=\"590\" height=\"421\" /></p>','2012-03-06 20:46:07','',1),
	(16,'测试第一次作业',0,'无','<p>是倒萨大厦v</p>','2012-03-07 22:04:27','',3),
	(17,'两个人的故事',0,'无','<p>这是一个爱情哲理类的安卓平台游戏，创建于2012年安卓指选课</p>\r\n<p>游戏的官方介绍里是这样说的：</p>\r\n<p>　　&ldquo;The story of a boy, the story of a girl, the story of both: One and One Story, a game about love, pain and life.&rdquo; 　　&ldquo;这是<a href=\"http://baike.baidu.com/view/702246.htm\" target=\"_blank\">关于一个男孩</a>的故事，关于一个女孩的故事，关于他们<a href=\"http://baike.baidu.com/view/1507453.htm\" target=\"_blank\">两个人的故事</a>：一个又一个故事，这是一个关于爱、痛和生活的游戏。&rdquo;</p>\r\n<div class=\"text_pic  layoutleft layoutParagraphBefore layoutTextAfter\" style=\"visibility: visible; padding-bottom: 3px; width: 190px; position: relative;\" data-layout=\"left\"><a class=\"pic-handle\" title=\"查看图片\" href=\"http://baike.baidu.com/albums/6875157/7010429.html#0$b58f8c5494eef01ffd11e383e0fe9925bc317d6b\" target=\"_blank\">&nbsp;&nbsp;</a><a href=\"http://baike.baidu.com/albums/6875157/7010429.html#0$b58f8c5494eef01ffd11e383e0fe9925bc317d6b\" target=\"_blank\"><img class=\"editorImg log-set-param\" title=\"游戏界面\" src=\"http://imgsrc.baidu.com/baike/abpic/item/b58f8c5494eef01ffd11e383e0fe9925bc317d6b.jpg\" alt=\"\" /></a>\r\n<p class=\"pic-info\">游戏界面</p>\r\n</div>\r\n<h2 class=\"headline-1 bk-sidecatalog-title\"><span class=\"text_edit editable-title\" data-edit-id=\"6875157:7010429:2\"><a class=\"nslog:1019\" href=\"http://baike.baidu.com/view/6875157.htm\">编辑本段</a></span><a name=\"2\"></a><span class=\"headline-content\">内容特色</span></h2>\r\n<p>　 　游戏一开场的引用名言&ldquo;Love is one soul in two bodies 爱是如影随形&rdquo;一语道出了游戏的内容，男孩和女孩相互吸引，不管发生了什么，不管有什么阻碍，他们都要走到一起&mdash;&mdash;这就是游戏的目的。你需要操控2个小 人，绕开机关，走到一起。而因为游戏的标题是一个又一个故事，所以这些关卡也有着各种不一样的前提存在。游戏的新颖之处在于男孩的内心独白会具现化，<a href=\"http://baike.baidu.com/view/6814120.htm\" target=\"_blank\">比如</a>他 说&ldquo;When she saw me,she ran to me 当她看到我时，她跑向我&rdquo;之后，只要男孩和女孩处于同一水平线，女孩就会向男孩跑来&hellip;非常的有意思。整个游戏以男孩的独白作为章节的开始、为关卡分隔，显 得十分精致，尤其是最后一关获得了很多人的一致好评。 　　恋爱过的人大约会有这样的体会：原本好像平淡无奇的生活，由于某人的出现，忽然变得闪闪发光起 来，作者Pang认为游戏要表达的正是这样的情感&mdash;&mdash;男孩在游戏中说&ldquo;Once we were shadows,that now we\'re lights 我们曾经是影子，现在我们是光。&rdquo;因为有爱情存在，我们才会如沐照耀。&rdquo;玩一下游戏，然后对某个给你生活带来异彩的人心怀感谢，并更加珍惜吧。</p>','2012-03-15 23:13:57','/Users/FK/Sites/SEProjectManagement/Icon/17/',3),
	(18,'两个人的故事',0,'无','<p>这是一个爱情哲理类的安卓平台游戏，创建于2012年安卓指选课</p>\r\n<p>游戏的官方介绍里是这样说的：</p>\r\n<p>　　&ldquo;The story of a boy, the story of a girl, the story of both: One and One Story, a game about love, pain and life.&rdquo; 　　&ldquo;这是<a href=\"http://baike.baidu.com/view/702246.htm\" target=\"_blank\">关于一个男孩</a>的故事，关于一个女孩的故事，关于他们<a href=\"http://baike.baidu.com/view/1507453.htm\" target=\"_blank\">两个人的故事</a>：一个又一个故事，这是一个关于爱、痛和生活的游戏。&rdquo;</p>\r\n<div class=\"text_pic  layoutleft layoutParagraphBefore layoutTextAfter\" style=\"visibility: visible; padding-bottom: 3px; width: 190px; position: relative;\" data-layout=\"left\"><a class=\"pic-handle\" title=\"查看图片\" href=\"http://baike.baidu.com/albums/6875157/7010429.html#0$b58f8c5494eef01ffd11e383e0fe9925bc317d6b\" target=\"_blank\">&nbsp;&nbsp;</a><a href=\"http://baike.baidu.com/albums/6875157/7010429.html#0$b58f8c5494eef01ffd11e383e0fe9925bc317d6b\" target=\"_blank\"><img class=\"editorImg log-set-param\" title=\"游戏界面\" src=\"http://imgsrc.baidu.com/baike/abpic/item/b58f8c5494eef01ffd11e383e0fe9925bc317d6b.jpg\" alt=\"\" /></a>\r\n<p class=\"pic-info\">游戏界面</p>\r\n</div>\r\n<h2 class=\"headline-1 bk-sidecatalog-title\"><span class=\"text_edit editable-title\" data-edit-id=\"6875157:7010429:2\"><a class=\"nslog:1019\" href=\"http://baike.baidu.com/view/6875157.htm\">编辑本段</a></span><a name=\"2\"></a><span class=\"headline-content\">内容特色</span></h2>\r\n<p>　 　游戏一开场的引用名言&ldquo;Love is one soul in two bodies 爱是如影随形&rdquo;一语道出了游戏的内容，男孩和女孩相互吸引，不管发生了什么，不管有什么阻碍，他们都要走到一起&mdash;&mdash;这就是游戏的目的。你需要操控2个小 人，绕开机关，走到一起。而因为游戏的标题是一个又一个故事，所以这些关卡也有着各种不一样的前提存在。游戏的新颖之处在于男孩的内心独白会具现化，<a href=\"http://baike.baidu.com/view/6814120.htm\" target=\"_blank\">比如</a>他 说&ldquo;When she saw me,she ran to me 当她看到我时，她跑向我&rdquo;之后，只要男孩和女孩处于同一水平线，女孩就会向男孩跑来&hellip;非常的有意思。整个游戏以男孩的独白作为章节的开始、为关卡分隔，显 得十分精致，尤其是最后一关获得了很多人的一致好评。 　　恋爱过的人大约会有这样的体会：原本好像平淡无奇的生活，由于某人的出现，忽然变得闪闪发光起 来，作者Pang认为游戏要表达的正是这样的情感&mdash;&mdash;男孩在游戏中说&ldquo;Once we were shadows,that now we\'re lights 我们曾经是影子，现在我们是光。&rdquo;因为有爱情存在，我们才会如沐照耀。&rdquo;玩一下游戏，然后对某个给你生活带来异彩的人心怀感谢，并更加珍惜吧。</p>','2012-03-15 23:22:18','Icon/18/两个人的故事.jpg',3),
	(19,'wwin7激活破解',0,'无','<p>按时打算vsvsdvasv</p>','2012-03-16 13:05:21','Icon/19/wwin7激活破解.jpg',3),
	(20,'wwin7激活破解',0,'无','<p>按时打算vsvsdvasv</p>','2012-03-16 13:12:10','Icon/20.png',3),
	(21,'wwin7激活破解',0,'无','<p>按时打算vsvsdvasv</p>','2012-03-16 13:14:51','Icon/21.png',3),
	(22,'wwin7激活破解',0,'无','<p>按时打算vsvsdvasv</p>','2012-03-16 13:16:58','Icon/22.png',3),
	(23,'wwin7激活破解',0,'无','<p>按时打算vsvsdvasv</p>','2012-03-16 13:18:22','Icon/23/wwin7激活破解.png',3),
	(24,'sahiso',0,'无','<p>sadcascasc</p>','2012-03-16 15:35:24','Icon/24/sahiso.jpg',3),
	(25,'sahiso',0,'无','<p>sadcascasc</p>','2012-03-16 15:40:57','Icon/25/sahiso.jpg',3);

/*!40000 ALTER TABLE `project` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_app
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_app`;

CREATE TABLE `project_app` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `AppScore` float NOT NULL DEFAULT '0',
  `AppDownloadTimes` int(8) NOT NULL DEFAULT '0',
  `ProjectID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ProjectID` (`ProjectID`),
  CONSTRAINT `project_app_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_app` WRITE;
/*!40000 ALTER TABLE `project_app` DISABLE KEYS */;

INSERT INTO `project_app` (`ID`, `AppScore`, `AppDownloadTimes`, `ProjectID`)
VALUES
	(3,0,3,4),
	(4,0,4,5),
	(5,0,5,6),
	(6,0,6,7),
	(7,0,7,13),
	(8,0,8,9),
	(9,0,9,10),
	(11,0,0,12),
	(12,0,0,14),
	(13,0,0,15),
	(14,0,0,16),
	(15,0,0,17),
	(16,0,0,18),
	(17,0,0,19),
	(18,0,0,20),
	(19,0,0,21),
	(20,0,0,22),
	(21,0,0,23),
	(22,0,0,24),
	(23,0,0,25);

/*!40000 ALTER TABLE `project_app` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_code
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_code`;

CREATE TABLE `project_code` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProjectID` int(11) NOT NULL,
  `CodeScore` float NOT NULL DEFAULT '0',
  `CodeDownloadTimes` int(8) NOT NULL DEFAULT '0',
  `CodeDescription` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '关于代码的描述',
  `CodeFragment` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci COMMENT '代码的片段',
  PRIMARY KEY (`ID`),
  KEY `ProjectID` (`ProjectID`),
  CONSTRAINT `project_code_ibfk_1` FOREIGN KEY (`ProjectID`) REFERENCES `project` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_code` WRITE;
/*!40000 ALTER TABLE `project_code` DISABLE KEYS */;

INSERT INTO `project_code` (`ID`, `ProjectID`, `CodeScore`, `CodeDownloadTimes`, `CodeDescription`, `CodeFragment`)
VALUES
	(3,4,0,3,'asdf','asdf'),
	(4,5,0,4,'sadf','safde'),
	(5,6,0,5,'MVC','echo \'hello world\''),
	(6,7,0,6,'as','sdaf'),
	(7,8,0,7,'sf','asdf'),
	(8,9,0,8,'hjk','kj'),
	(9,10,0,9,'renren','renren'),
	(10,11,0,11,'renren','renren'),
	(11,12,0,22,'renren','renren'),
	(12,13,0,33,'renren','renren'),
	(13,14,0,0,'<p>达到撒</p>','{}\r\nasasd\r\n'),
	(14,15,0,0,'<p>达到撒</p>','{}\r\nasasd\r\n'),
	(15,16,0,0,'<p>撒大声的出生地</p>','<p>倒萨大程度上程度上</p>'),
	(16,17,0,0,'<p>简要设计文档</p>\r\n<p></p>\r\n<h1><span lang=\"EN-US\">OneAndOneStory</span><span style=\"font-family: 宋体;\">简要设计文档</span></h1>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"EN-US\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"EN-US\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>1．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">用户控制感应器（键盘，或重力感应装置）</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>2．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">感应器处理改变后的数据，对<span lang=\"EN-US\">model</span>中人物或者其他物体的状态信息进行改变</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>3．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">感应器通知渲染器对图像重新渲染</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>4．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">渲染器主动获取已经被改变的<span lang=\"EN-US\">model</span>中的信息</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span>5．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">应用新的信息对图像重绘</span><span lang=\"EN-US\"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><img src=\"../images/docu.png\" alt=\"\" width=\"1096\" height=\"695\" /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p>&nbsp;</p>','<p>public&nbsp; Girl() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; new Thread(new Check()).start();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeY = 128;<br />&nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; public void goUp() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (onTheWall) {<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onTheWall = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // storeY = y;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; sY = vY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask1 myTask = new MyTask1();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.schedule(myTask, 0, 200);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; //vY = 14;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // new Thread(this).start();<br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goRight() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; wantRightGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (canRightGo) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onRight) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onRight = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeRight = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // if (!onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // vX = 10;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeX = x;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask2 myTask = new MyTask2();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.scheduleAtFixedRate(myTask, 0, 100);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onRight) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeRight = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; canLeftGo = true;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goLeft() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; wantLeftGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (canLeftGo) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onLeft) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onLeft = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeLeft = false;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // if (!onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // vX = 10;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeX = x;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask3 myTask = new MyTask3();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.scheduleAtFixedRate(myTask, 0, 100);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onLeft) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeLeft = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; canRightGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br /><br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goDown() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; System.out.println(\"go dawn\");<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y += 10;<br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; static class MyTask1 extends java.util.TimerTask {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; @Override<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; public void run() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // TODO Auto-generated method stub<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; //删除onmeup<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onTheWall&amp;&amp;!onMeUp) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y -= sY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; sY -= 1;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (storeY &lt; y + 1) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onTheWall = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y = storeY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; OneAndOneProtoActivity.iGameView.postInvalidate();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }</p>'),
	(17,18,0,0,'<p>简要设计文档</p>\r\n<p>&nbsp;</p>\r\n<h1><span lang=\"EN-US\">OneAndOneStory</span><span style=\"font-family: 宋体;\">简要设计文档</span></h1>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"EN-US\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoNormal\"><span lang=\"EN-US\">&nbsp;</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>1．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">用户控制感应器（键盘，或重力感应装置）</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>2．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">感应器处理改变后的数据，对<span lang=\"EN-US\">model</span>中人物或者其他物体的状态信息进行改变</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>3．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">感应器通知渲染器对图像重新渲染</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span style=\"font-size: 14pt; font-family: 微软雅黑;\" lang=\"EN-US\"><span>4．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">渲染器主动获取已经被改变的<span lang=\"EN-US\">model</span>中的信息</span></p>\r\n<p>&nbsp;</p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span>5．<span style=\"font: 7pt \'Times New Roman\';\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><span style=\"font-size: 14pt; font-family: 微软雅黑;\">应用新的信息对图像重绘</span><span lang=\"EN-US\"><span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><img src=\"../images/docu.png\" alt=\"\" width=\"1096\" height=\"695\" /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p class=\"MsoListParagraph\" style=\"margin-left: 36pt; text-indent: -36pt;\"><span lang=\"EN-US\"><span><br /></span></span></p>\r\n<p>&nbsp;</p>','<p>public&nbsp; Girl() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; new Thread(new Check()).start();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeY = 128;<br />&nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; public void goUp() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (onTheWall) {<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onTheWall = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // storeY = y;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; sY = vY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask1 myTask = new MyTask1();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.schedule(myTask, 0, 200);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; //vY = 14;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // new Thread(this).start();<br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goRight() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; wantRightGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (canRightGo) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onRight) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onRight = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeRight = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // if (!onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // vX = 10;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeX = x;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask2 myTask = new MyTask2();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.scheduleAtFixedRate(myTask, 0, 100);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onRight) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeRight = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; canLeftGo = true;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goLeft() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; wantLeftGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (canLeftGo) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onLeft) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onLeft = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeLeft = false;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // if (!onTheWall) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // vX = 10;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; storeX = x;<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Timer timer = new Timer();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; MyTask3 myTask = new MyTask3();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.scheduleAtFixedRate(myTask, 0, 100);<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onLeft) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; myTask.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; timer.cancel();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeLeft = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; canRightGo = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <br /><br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; public void goDown() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; System.out.println(\"go dawn\");<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onMeUp = false;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y += 10;<br />&nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; static class MyTask1 extends java.util.TimerTask {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; @Override<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; public void run() {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; // TODO Auto-generated method stub<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; //删除onmeup<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (!onTheWall&amp;&amp;!onMeUp) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y -= sY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; sY -= 1;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; if (storeY &lt; y + 1) {<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; onTheWall = true;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; y = storeY;<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; OneAndOneProtoActivity.iGameView.postInvalidate();<br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }<br /><br />&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; }</p>'),
	(18,19,0,0,'<p>啊上都能从那时的老处女了卡斯</p>','<p>四渡赤水擦拭的擦</p>'),
	(19,20,0,0,'<p>啊上都能从那时的老处女了卡斯</p>','<p>四渡赤水擦拭的擦</p>'),
	(20,21,0,0,'<p>啊上都能从那时的老处女了卡斯</p>','<p>四渡赤水擦拭的擦</p>'),
	(21,22,0,0,'<p>啊上都能从那时的老处女了卡斯</p>','<p>四渡赤水擦拭的擦</p>'),
	(22,23,0,0,'<p>啊上都能从那时的老处女了卡斯</p>','<p>四渡赤水擦拭的擦</p>'),
	(23,24,0,0,'<p>sdcas</p>','<p>fdsvdfsv</p>'),
	(24,25,0,0,'<p>sdcas</p>','<p>fdsvdfsv</p>');

/*!40000 ALTER TABLE `project_code` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_comment
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_comment`;

CREATE TABLE `project_comment` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_comment` WRITE;
/*!40000 ALTER TABLE `project_comment` DISABLE KEYS */;

INSERT INTO `project_comment` (`ID`, `Content`, `ProjectID`, `Flag`, `UserID`)
VALUES
	(4,'这是一个好代码，写得非常不错！顶',13,'c',1),
	(6,'这是一个好代码，写得非常不错！顶ewrvrrtvtrv',13,'c',1),
	(7,'ergferg   这是一个好代码，写得非常不错！顶\n这是一个好代码，写得非常不错！顶',13,'c',3),
	(8,'ewrferfger retgrtg',13,'a',7),
	(9,'这是一个好代码，写得非常不错！顶rwgrtg\nwvtrtvrt这是一个好代码，写得非常不错！顶',12,'c',7),
	(10,'                            dcascsac',13,'c',7),
	(11,'再来一个评论',13,'c',7),
	(12,'我也爱一个',13,'c',14),
	(13,'来一个吧',4,'c',14),
	(14,'fdsjdfojax这个是code的评论\r\n',13,'c',3),
	(15,'对方是大法师  这个事app的评论，并不算多不懂事 真浪。。。。。',12,'a',3),
	(16,'                            123123',9,'c',3);

/*!40000 ALTER TABLE `project_comment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table project_reference
# ------------------------------------------------------------

DROP TABLE IF EXISTS `project_reference`;

CREATE TABLE `project_reference` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `WhoRefer` int(11) NOT NULL,
  `BeRefered` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `project_reference` WRITE;
/*!40000 ALTER TABLE `project_reference` DISABLE KEYS */;

INSERT INTO `project_reference` (`ID`, `WhoRefer`, `BeRefered`)
VALUES
	(1,13,4),
	(2,13,8),
	(3,13,9),
	(4,13,10);

/*!40000 ALTER TABLE `project_reference` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tag_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag_info`;

CREATE TABLE `tag_info` (
  `ID` int(100) NOT NULL AUTO_INCREMENT,
  `TagContent` varchar(50) NOT NULL,
  `Flag` char(2) NOT NULL COMMENT 'a for app c for code',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tag_info` WRITE;
/*!40000 ALTER TABLE `tag_info` DISABLE KEYS */;

INSERT INTO `tag_info` (`ID`, `TagContent`, `Flag`)
VALUES
	(1,'设计模式','c'),
	(2,'完美大作业','c'),
	(3,'游戏','a'),
	(4,'抽象工厂','c'),
	(5,'桥模式','c'),
	(6,'观察者模式','c'),
	(7,'自娱自乐','a'),
	(8,'使用框架','c'),
	(9,'想不出来了。。','a'),
	(10,'想不出来了。。','c');

/*!40000 ALTER TABLE `tag_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '学号',
  `NickName` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '用户可以自定义的名称，显示为你好，xxx',
  `Authority` int(2) unsigned NOT NULL DEFAULT '1' COMMENT '0 for appFinder;1for developer; 2for master_developer; 3for admin',
  `Gender` char(2) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT 'n for null;F for female;M or male',
  `DistributionScore` int(6) DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`ID`, `UserName`, `NickName`, `Authority`, `Gender`, `DistributionScore`)
VALUES
	(1,'NJuer','我是你妹',0,'F',0),
	(2,'091250085','apple',0,'F',0),
	(3,'123','pig',1,'M',0),
	(7,'85','lee',1,'M',0),
	(13,'3444','dqwe',0,'',0),
	(14,'LYf',NULL,1,'',0),
	(15,'admin',NULL,2,'',0),
	(17,'lyf09','EVASLEE123',1,'M',0),
	(20,'zhangyh09','zhangyh09',1,'',0);

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
