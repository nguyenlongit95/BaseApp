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

-- Dumping structure for table laravelfull.menu
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '1',
  `children_count` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.menu: ~9 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `url`, `menu_type`, `parent_id`, `level`, `children_count`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(60, 'Mua mã thẻ', '/muamathe.html', 'header', 0, 1, 0, 1, 1, '2018-08-06 23:16:17', '2018-08-14 11:05:23'),
	(61, 'Đổi thẻ cào', '#', 'header', 0, 1, 2, 2, 1, '2018-08-06 23:16:37', '2018-08-14 11:05:42'),
	(62, 'Đổi thẻ chậm', '/taythecham.html', NULL, 61, 2, 0, 1, 1, '2018-08-06 23:17:01', '2018-08-14 11:02:07'),
	(63, 'Đổi thẻ nhanh', '/doithenhanh.html', NULL, 61, 2, 0, 2, 1, '2018-08-06 23:18:24', '2018-08-14 11:01:23'),
	(67, 'Nạp di động', '#', NULL, 0, 1, 2, 3, 1, '2018-08-13 16:50:26', '2018-08-14 11:02:39'),
	(68, 'Nạp chậm', '/napcham.html', NULL, 67, 2, 0, 1, 1, '2018-08-13 16:50:54', '2018-08-14 11:02:39'),
	(69, 'Nạp nhanh', '/napnhanh.html', NULL, 67, 2, 0, 2, 1, '2018-08-13 16:51:17', '2018-08-14 11:02:39'),
	(70, 'Nạp tiền game', '/naptiengame.html', 'header', 0, 1, 0, 4, 1, '2018-08-13 16:51:53', '2018-08-14 11:05:51'),
	(71, 'Tin tức', '/tintuc.html', 'header', 0, 1, 0, 5, 1, '2018-08-13 16:52:37', '2018-08-14 11:06:07');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
