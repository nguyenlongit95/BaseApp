-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.33-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table laravelfull.stockcards
CREATE TABLE IF NOT EXISTS `stockcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Dòng này phải mã hóa',
  `expire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Người tạo hoặc chủ nhân',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sold_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.stockcards: ~2 rows (approximately)
/*!40000 ALTER TABLE `stockcards` DISABLE KEYS */;
INSERT INTO `stockcards` (`id`, `name`, `item_sku`, `serial`, `code`, `expire`, `username`, `status`, `sold_date`, `created_at`, `updated_at`, `admin_note`, `order_id`) VALUES
	(33, 'Thẻ Viettel 100.000đ', '100.000đ', 'wqewqe', 'eyJpdiI6IlNDcmU5ajJPME85cWJOQUJVSExwaGc9PSIsInZhbHVlIjoiREV0Tk1HT095RURxcjdmWjVjWGJPUT09IiwibWFjIjoiYjhiNTIwODQwOWFlNzkxMGJlMzhmMzEzOTQ1MGM3YmM3YzQ5YjkyOTVkMDI0NTE5NzAzNmJkOWRkZjQ0ZTkyZiJ9', 'N/A', 'admin', 0, NULL, '2018-08-03 15:50:39', '2018-08-03 15:50:39', '', ''),
	(34, 'Thẻ Viettel 100.000đ', '100.000đ', 'ewqe', 'eyJpdiI6ImNmcGs1d2Q1VW0zOXRpMmtGVEYzaHc9PSIsInZhbHVlIjoiVHM0ekNuXC9SZUJpN2ZUQUJWVlF1emc9PSIsIm1hYyI6Ijk0NzNhMDlhODZmZjUwNGUzZDg3MTZkNWNmOTVlMTQ0MmUyNzhhNzk1NWM1ODMyZDMwYjM2MzRjYjI4YjE3M2YifQ==', 'N/A', 'admin', 0, NULL, '2018-08-03 15:50:39', '2018-08-03 15:50:39', '', '');
/*!40000 ALTER TABLE `stockcards` ENABLE KEYS */;

-- Dumping structure for table laravelfull.stockcards_setting
CREATE TABLE IF NOT EXISTS `stockcards_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `configs` text COLLATE utf8_unicode_ci,
  `balance` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Số dư của provider',
  `status` int(1) NOT NULL DEFAULT '0',
  `installed` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `provider` (`provider`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.stockcards_setting: ~2 rows (approximately)
/*!40000 ALTER TABLE `stockcards_setting` DISABLE KEYS */;
INSERT INTO `stockcards_setting` (`id`, `name`, `provider`, `configs`, `balance`, `status`, `installed`) VALUES
	(22, 'Kho thẻ Stock', 'Stock', '[]', NULL, 1, 1);
/*!40000 ALTER TABLE `stockcards_setting` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
