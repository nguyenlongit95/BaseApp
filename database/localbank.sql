-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.34-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table laravelfull.localbanks
CREATE TABLE IF NOT EXISTS `localbanks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã paygatecode',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acc_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `acc_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8_unicode_ci,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deposit` int(1) NOT NULL DEFAULT '1',
  `withdraw` int(1) NOT NULL DEFAULT '1',
  `status` int(1) NOT NULL DEFAULT '1',
  `sort` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.localbanks: ~0 rows (approximately)
/*!40000 ALTER TABLE `localbanks` DISABLE KEYS */;
INSERT INTO `localbanks` (`id`, `code`, `name`, `acc_num`, `acc_name`, `branch`, `link`, `info`, `icon`, `deposit`, `withdraw`, `status`, `sort`) VALUES
	(2, 'EAB', 'Ngân hàng Đông Á', '0104659963', 'Nguyen Van Nghia', 'Hai Phong', NULL, NULL, '', 1, 1, 1, 0);
/*!40000 ALTER TABLE `localbanks` ENABLE KEYS */;

-- Dumping structure for table laravelfull.localbanks_user
CREATE TABLE IF NOT EXISTS `localbanks_user` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.localbanks_user: ~0 rows (approximately)
/*!40000 ALTER TABLE `localbanks_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `localbanks_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
