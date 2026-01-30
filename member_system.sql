-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.24-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for member_system
CREATE DATABASE IF NOT EXISTS `member_system` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `member_system`;

-- Dumping structure for table member_system.content
CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `type` enum('article','video') DEFAULT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table member_system.content: ~4 rows (approximately)
/*!40000 ALTER TABLE `content` DISABLE KEYS */;
INSERT INTO `content` (`id`, `title`, `type`, `body`) VALUES
	(1, 'Artikel 1', 'article', 'Isi artikel 1 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(2, 'Artikel 2', 'article', 'Isi artikel 2 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(3, 'Artikel 3', 'article', 'Isi artikel 3 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(4, 'Artikel 4', 'article', 'Isi artikel 4 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(5, 'Artikel 5', 'article', 'Isi artikel 5 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(6, 'Artikel 6', 'article', 'Isi artikel 6 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(7, 'Artikel 7', 'article', 'Isi artikel 7 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(8, 'Artikel 8', 'article', 'Isi artikel 8 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(9, 'Artikel 9', 'article', 'Isi artikel 9 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(10, 'Artikel 10', 'article', 'Isi artikel 10 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(11, 'Artikel 11', 'article', 'Isi artikel 11 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(12, 'Artikel 12', 'article', 'Isi artikel 12 : Lorem ipsum dolor sit amet is placeholder text commonly used in design, printing, and web development to showcase graphic elements, such as fonts or layout, without using meaningful content. Originating from a scrambled 45 B.C. Latin text by Cicero, it serves to focus attention on visual, '),
	(13, 'Video 1', 'video', NULL),
	(14, 'Video 2', 'video', NULL),
	(15, 'Video 3', 'video', NULL),
	(16, 'Video 4', 'video', NULL),
	(17, 'Video 5', 'video', NULL),
	(18, 'Video 6', 'video', NULL),
	(19, 'Video 7', 'video', NULL),
	(20, 'Video 8', 'video', NULL),
	(21, 'Video 9', 'video', NULL),
	(22, 'Video 10', 'video', NULL),
	(23, 'Video 11', NULL, NULL);
/*!40000 ALTER TABLE `content` ENABLE KEYS */;

-- Dumping structure for table member_system.membership_types
CREATE TABLE IF NOT EXISTS `membership_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) DEFAULT NULL,
  `article_limit` int(11) DEFAULT NULL,
  `video_limit` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table member_system.membership_types: ~3 rows (approximately)
/*!40000 ALTER TABLE `membership_types` DISABLE KEYS */;
INSERT INTO `membership_types` (`id`, `type_name`, `article_limit`, `video_limit`) VALUES
	(1, 'Tipe A', 3, 3),
	(2, 'Tipe B', 10, 10),
	(3, 'Tipe C', 999, 999);
/*!40000 ALTER TABLE `membership_types` ENABLE KEYS */;

-- Dumping structure for table member_system.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `oauth_provider` varchar(20) DEFAULT 'manual',
  `oauth_id` varchar(100) DEFAULT NULL,
  `membership_id` int(11) DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `membership_id` (`membership_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`membership_id`) REFERENCES `membership_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table member_system.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`, `oauth_provider`, `oauth_id`, `membership_id`) VALUES
	(1, 'rizal noer hamdan', 'rizalnoerhamdan.jtkpolban2010@gmail.com', NULL, 'google', '111958954665365620345', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
