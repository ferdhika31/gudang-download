/*
Navicat MySQL Data Transfer

Source Server         : Ferdhika Personal
Source Server Version : 50542
Source Host           : 127.0.0.1:3306
Source Database       : db_dw

Target Server Type    : MYSQL
Target Server Version : 50542
File Encoding         : 65001

Date: 2015-02-22 16:11:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(450) DEFAULT NULL,
  `password` varchar(450) DEFAULT NULL,
  `nama` varchar(450) DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `email` varchar(450) DEFAULT NULL,
  `alamat` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Ferdhika Yudira', '1', 'fer@dika.web.id', 'Lembang');

-- ----------------------------
-- Table structure for tb_download
-- ----------------------------
DROP TABLE IF EXISTS `tb_download`;
CREATE TABLE `tb_download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul_artikel` varchar(450) DEFAULT NULL,
  `link_artikel` varchar(450) DEFAULT NULL,
  `link_download` varchar(650) DEFAULT NULL,
  `tgl_posting` timestamp NULL DEFAULT NULL,
  `hit` int(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_download
-- ----------------------------
INSERT INTO `tb_download` VALUES ('1', 'CRUD Panada Framework', 'http://blog.dika.web.id', 'https://www.dropbox.com/s/xz5sswtpizftw8m/Ferdhika%20Yudira%20-%20crud-panada-mysql.zip?dl=0', '2015-02-18 17:58:29', '0');
INSERT INTO `tb_download` VALUES ('2', 'XAMPP Web Server', 'http://blog.dika.web.id', 'http://adf.ly/vtVGk', '2015-02-18 18:34:44', '0');
INSERT INTO `tb_download` VALUES ('3', 'CodeIgniter Framework', 'http://blog.dika.web.id/category/tutor/web/php/code-igniter', 'http://adf.ly/13b6hv', '2015-02-18 18:35:03', '0');
INSERT INTO `tb_download` VALUES ('4', 'HMVC Modular Extension CodeIgniter', 'http://blog.dika.web.id/?p=333', 'http://adf.ly/13b8Bk', '2015-02-18 18:36:43', '0');
INSERT INTO `tb_download` VALUES ('5', 'HMVC CodeIgniter', 'http://blog.dika.web.id/?p=333', 'http://adf.ly/13bZJ9', '2015-02-18 18:37:01', '0');
INSERT INTO `tb_download` VALUES ('6', 'GIT', 'http://blog.dika.web.id', 'http://blog.dika.web.id', '2015-02-18 18:37:19', '0');

-- ----------------------------
-- Table structure for tb_pengaturan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengaturan`;
CREATE TABLE `tb_pengaturan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipe_pengaturan` varchar(450) DEFAULT NULL,
  `nama_pengaturan` varchar(450) DEFAULT NULL,
  `value_pengaturan` varchar(450) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pengaturan
-- ----------------------------
INSERT INTO `tb_pengaturan` VALUES ('1', 'site_title', 'Nama Situs', 'Gudang Download Blognya Dika');
INSERT INTO `tb_pengaturan` VALUES ('2', 'site_description', 'Deskripsi Situs', 'Tempat download file yang ada di blognya si dika');
INSERT INTO `tb_pengaturan` VALUES ('3', 'site_keyword', 'Keyword Situs', 'Gudang Download, Download File dika.web.id, Tempat Download');
INSERT INTO `tb_pengaturan` VALUES ('4', 'site_footer', 'Text Footer ', 'Made from my <a href=\"http://blog.dika.web.id\">sweet litle blog</a>, build with <a href=\"http://panadaframework.com\" target=\"_blank\">Panada Framework</a>');
INSERT INTO `tb_pengaturan` VALUES ('5', 'site_theme', 'Tema Situs', 'adaw');
INSERT INTO `tb_pengaturan` VALUES ('6', 'site_address', 'Alamat / Contact', 'Email : rpl4rt08@gmail.com<br>\r\nTelpon : 083821708285<br>\r\nAlamat : Jln Baktisejati No19 Rt02/09 Batureok Lembang');
INSERT INTO `tb_pengaturan` VALUES ('7', 'site_email', 'Email Server', 'fer@dika.web.id');
INSERT INTO `tb_pengaturan` VALUES ('8', 'site_author', 'Author', 'Ferdhika Yudira');
INSERT INTO `tb_pengaturan` VALUES ('9', 'site_page', 'Jumlah Download Perhalaman', '5');
INSERT INTO `tb_pengaturan` VALUES ('10', 'site_blog', 'Blog Author', 'http://blog.dika.web.id');
INSERT INTO `tb_pengaturan` VALUES ('11', 'site_rss', 'RSS Blog', 'http://blog.dika.web.id/feed');
INSERT INTO `tb_pengaturan` VALUES ('12', 'site_page_admin', 'Jumlah Download Perhalaman Admin', '3');

-- ----------------------------
-- Table structure for tb_pengguna
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengguna`;
CREATE TABLE `tb_pengguna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(455) DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `aktivasi` varchar(450) DEFAULT NULL,
  `hit` int(11) DEFAULT NULL,
  `tgl_daftar` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tgl_aktivasi` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pengguna
-- ----------------------------
INSERT INTO `tb_pengguna` VALUES ('1', 'fer@dika.web.id', '1', null, '2084', '2015-02-19 12:46:34', '2015-02-18 18:27:30');
INSERT INTO `tb_pengguna` VALUES ('2', 'test@gmail.com', '1', '', '57', '2015-02-19 00:34:59', '2015-02-18 23:22:23');
INSERT INTO `tb_pengguna` VALUES ('3', 'rpl4rt08@gmail.com', '1', '', '810', '2015-02-19 00:32:15', '2015-02-18 23:23:00');
INSERT INTO `tb_pengguna` VALUES ('4', 'ferdhika31@ymail.com', '1', '', '462', '2015-02-20 12:59:36', '2015-02-18 23:35:09');
