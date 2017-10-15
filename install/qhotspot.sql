/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

UPDATE mysql.user SET Password=PASSWORD('{QH_MYSQL_ROOT_PASS}') WHERE User='root';
DELETE FROM mysql.user WHERE User='root' AND Host NOT IN ('localhost', '127.0.0.1', '::1');
DELETE FROM mysql.user WHERE User='';
DELETE FROM mysql.db WHERE Db='test' OR Db='test\_%';
CREATE DATABASE IF NOT EXISTS {QH_MYSQL_DBNAME};
CREATE USER `{QH_MYSQL_USER_NAME}`@`localhost`;
SET PASSWORD FOR `{QH_MYSQL_USER_NAME}`@`localhost` = PASSWORD('{QH_MYSQL_USER_PASS}');
GRANT ALL ON {QH_MYSQL_DBNAME}.* TO `{QH_MYSQL_USER_NAME}`@`localhost` IDENTIFIED BY '{QH_MYSQL_USER_PASS}';
GRANT ALL ON {QH_MYSQL_DBNAME}.* TO `{QH_MYSQL_USER_NAME}`@`%` IDENTIFIED BY '{QH_MYSQL_USER_PASS}';

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
SET FOREIGN_KEY_CHECKS=0;

USE {QH_MYSQL_DBNAME};

-- ----------------------------
-- Table structure for cui
-- ----------------------------
DROP TABLE IF EXISTS `cui`;
CREATE TABLE `cui` (
  `clientipaddress` varchar(15) NOT NULL DEFAULT '',
  `callingstationid` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(64) NOT NULL DEFAULT '',
  `cui` varchar(32) NOT NULL DEFAULT '',
  `creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastaccounting` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`username`,`clientipaddress`,`callingstationid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cui
-- ----------------------------

-- ----------------------------
-- Table structure for ghost_settings
-- ----------------------------
DROP TABLE IF EXISTS `ghost_settings`;
CREATE TABLE `ghost_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dayssms` text NOT NULL,
  `passwordexptime` text NOT NULL,
  `smsuser` text NOT NULL,
  `smspass` text NOT NULL,
  `smsno` text NOT NULL,
  `apiurl` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ghost_settings
-- ----------------------------
INSERT INTO `ghost_settings` VALUES ('1', 'gerek yok', '50', '5379229197', '31233123', 'ILETI MRKZI', 'http://api.iletimerkezi.com/v1/send-sms ');

-- ----------------------------
-- Table structure for ghost_users
-- ----------------------------
DROP TABLE IF EXISTS `ghost_users`;
CREATE TABLE `ghost_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) CHARACTER SET latin1 NOT NULL,
  `password` varchar(200) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin5;

-- ----------------------------
-- Records of ghost_users
-- ----------------------------
INSERT INTO `ghost_users` VALUES ('1', 'admin', 'ghost');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad` text NOT NULL,
  `soyad` text NOT NULL,
  `telefon` text NOT NULL,
  `hata` text NOT NULL,
  `hatakodu` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for nas
-- ----------------------------
DROP TABLE IF EXISTS `nas`;
CREATE TABLE `nas` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nasname` varchar(128) NOT NULL,
  `shortname` varchar(32) DEFAULT NULL,
  `type` varchar(30) DEFAULT 'other',
  `ports` int(5) DEFAULT NULL,
  `secret` varchar(60) NOT NULL DEFAULT 'secret',
  `server` varchar(64) DEFAULT NULL,
  `community` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT 'RADIUS Client',
  PRIMARY KEY (`id`),
  KEY `nasname` (`nasname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of nas
-- ----------------------------

-- ----------------------------
-- Table structure for radacct
-- ----------------------------
DROP TABLE IF EXISTS `radacct`;
CREATE TABLE `radacct` (
  `radacctid` bigint(21) NOT NULL AUTO_INCREMENT,
  `acctsessionid` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `acctuniqueid` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `username` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `groupname` varchar(64) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `realm` varchar(64) CHARACTER SET latin1 DEFAULT '',
  `nasipaddress` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `nasportid` varchar(15) CHARACTER SET latin1 DEFAULT NULL,
  `nasporttype` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `acctstarttime` datetime DEFAULT NULL,
  `acctstoptime` datetime DEFAULT NULL,
  `acctsessiontime` int(12) DEFAULT NULL,
  `acctauthentic` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `connectinfo_start` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `connectinfo_stop` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `acctinputoctets` bigint(20) DEFAULT NULL,
  `acctoutputoctets` bigint(20) DEFAULT NULL,
  `calledstationid` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `callingstationid` varchar(50) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `acctterminatecause` varchar(32) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `servicetype` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `framedprotocol` varchar(32) CHARACTER SET latin1 DEFAULT NULL,
  `framedipaddress` varchar(15) CHARACTER SET latin1 NOT NULL DEFAULT '',
  `acctstartdelay` int(12) DEFAULT NULL,
  `acctstopdelay` int(12) DEFAULT NULL,
  `xascendsessionsvrkey` varchar(10) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`radacctid`),
  KEY `username` (`username`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `acctsessionid` (`acctsessionid`),
  KEY `acctsessiontime` (`acctsessiontime`),
  KEY `acctuniqueid` (`acctuniqueid`),
  KEY `acctstarttime` (`acctstarttime`),
  KEY `acctstoptime` (`acctstoptime`),
  KEY `nasipaddress` (`nasipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of radacct
-- ----------------------------

-- ----------------------------
-- Table structure for radcheck
-- ----------------------------
DROP TABLE IF EXISTS `radcheck`;
CREATE TABLE `radcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  `tip` longtext,
  `telefon` longtext,
  `tcno` longtext,
  `adsoyad` longtext,
  `tarih` longtext,
  `sifre` longtext,
  `dtarih` longtext,
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=latin5;

-- ----------------------------
-- Records of radcheck
-- ----------------------------

-- ----------------------------
-- Table structure for radgroupcheck
-- ----------------------------
DROP TABLE IF EXISTS `radgroupcheck`;
CREATE TABLE `radgroupcheck` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '==',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radgroupcheck
-- ----------------------------

-- ----------------------------
-- Table structure for radgroupreply
-- ----------------------------
DROP TABLE IF EXISTS `radgroupreply`;
CREATE TABLE `radgroupreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `groupname` (`groupname`(32))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radgroupreply
-- ----------------------------

-- ----------------------------
-- Table structure for radippool
-- ----------------------------
DROP TABLE IF EXISTS `radippool`;
CREATE TABLE `radippool` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pool_name` varchar(30) NOT NULL,
  `framedipaddress` varchar(15) NOT NULL DEFAULT '',
  `nasipaddress` varchar(15) NOT NULL DEFAULT '',
  `calledstationid` varchar(30) NOT NULL,
  `callingstationid` varchar(30) NOT NULL,
  `expiry_time` datetime DEFAULT NULL,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pool_key` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `radippool_poolname_expire` (`pool_name`,`expiry_time`),
  KEY `framedipaddress` (`framedipaddress`),
  KEY `radippool_nasip_poolkey_ipaddress` (`nasipaddress`,`pool_key`,`framedipaddress`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radippool
-- ----------------------------

-- ----------------------------
-- Table structure for radpostauth
-- ----------------------------
DROP TABLE IF EXISTS `radpostauth`;
CREATE TABLE `radpostauth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `pass` varchar(64) NOT NULL DEFAULT '',
  `reply` varchar(32) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radpostauth
-- ----------------------------

-- ----------------------------
-- Table structure for radreply
-- ----------------------------
DROP TABLE IF EXISTS `radreply`;
CREATE TABLE `radreply` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `attribute` varchar(64) NOT NULL DEFAULT '',
  `op` char(2) NOT NULL DEFAULT '=',
  `value` varchar(253) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radreply
-- ----------------------------

-- ----------------------------
-- Table structure for radusergroup
-- ----------------------------
DROP TABLE IF EXISTS `radusergroup`;
CREATE TABLE `radusergroup` (
  `username` varchar(64) NOT NULL DEFAULT '',
  `groupname` varchar(64) NOT NULL DEFAULT '',
  `priority` int(11) NOT NULL DEFAULT '1',
  KEY `username` (`username`(32))
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of radusergroup
-- ----------------------------

-- ----------------------------
-- Table structure for wimax
-- ----------------------------
DROP TABLE IF EXISTS `wimax`;
CREATE TABLE `wimax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL DEFAULT '',
  `authdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `spi` varchar(16) NOT NULL DEFAULT '',
  `mipkey` varchar(400) NOT NULL DEFAULT '',
  `lifetime` int(12) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`),
  KEY `spi` (`spi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wimax
-- ----------------------------
SET FOREIGN_KEY_CHECKS=1;