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

-- Dumping structure for table laravelfull.merchants
CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partner_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `partner_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `wallet_num` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ips` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `partner_id` (`partner_id`),
  UNIQUE KEY `partner_key` (`partner_key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.merchants: ~0 rows (approximately)
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
INSERT INTO `merchants` (`id`, `name`, `partner_id`, `partner_key`, `wallet_num`, `ips`, `website`, `icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(2, 'Nguyen Van Nghia', '8235324351', '0d70fa5e283408c80b6a303f886117e1', '0057382955', '192.36.58.55,87.58.120.221', 'http://winjsc.com', 'a.jpg', NULL, 1, '2018-08-14 15:29:14', '2018-08-14 15:29:07');
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
