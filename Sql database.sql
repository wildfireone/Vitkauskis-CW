-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.1.0.4867
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for eim
DROP DATABASE IF EXISTS `eim`;
CREATE DATABASE IF NOT EXISTS `eim` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `eim`;


-- Dumping structure for table eim.replies
DROP TABLE IF EXISTS `replies`;
CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thread_id` int(10) NOT NULL,
  `reply` text NOT NULL,
  `author` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- Dumping data for table eim.replies: ~3 rows (approximately)
DELETE FROM `replies`;
/*!40000 ALTER TABLE `replies` DISABLE KEYS */;
INSERT INTO `replies` (`id`, `thread_id`, `reply`, `author`) VALUES
	(1, 1, 'reply', 123456),
	(2, 1, 'another reply', 123456),
	(3, 3, 'lame\r\n', 123456),
	(6, 2, 'we can do it', 987564),
	(7, 2, 'boom shakalaka', 987564),
	(8, 2, 'kaboom', 123456);
/*!40000 ALTER TABLE `replies` ENABLE KEYS */;


-- Dumping structure for table eim.threads
DROP TABLE IF EXISTS `threads`;
CREATE TABLE IF NOT EXISTS `threads` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `post` text NOT NULL,
  `author` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table eim.threads: ~3 rows (approximately)
DELETE FROM `threads`;
/*!40000 ALTER TABLE `threads` DISABLE KEYS */;
INSERT INTO `threads` (`id`, `title`, `post`, `author`) VALUES
	(2, 'asasdasd', 'asdasdasdasd123', 987564),
	(3, 'Things', 'asdasdasd564864132', 123456),
	(4, 'qwerhjh', 'gfdsdsassfdghgj', 987564),
	(6, 'hello', 'This will be fun!', 987564),
	(7, 'boom', 'wohoo', 987564);
/*!40000 ALTER TABLE `threads` ENABLE KEYS */;


-- Dumping structure for table eim.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table eim.user: ~3 rows (approximately)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `user_id`, `password`, `role`) VALUES
	(1, 123456, 'kakaka', ''),
	(2, 123456, 'kakaka', ''),
	(3, 987564, 'kakaka', 'admin');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
