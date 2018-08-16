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

-- Dumping structure for table laravelfull.sliders
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci,
  `slider_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table laravelfull.sliders: ~1 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_text`, `slider_url`, `slider_btn_text`, `slider_btn_url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'Slider demo 01', 'sliders/tRFkSIXFrfjSSe0uCpVDv78srpvNy8rM8BGqP0HW.png', 'Nạp tiền chưa bao giờ dễ thế', NULL, 'Đăng ký', 'http://', 1, 1, '2018-08-14 11:21:57', '2018-08-14 11:23:16'),
	(5, 'Slider demo 02', 'sliders/Wy18BAXsTt9TFCuOUBv1Eqz3gQ5rNUF6BCnkHKcO.png', '234 2rfdsfsdf sdf sdf sdf', NULL, 'Đăng ký3', 'http://', 2, 1, '2018-08-14 11:27:24', '2018-08-14 11:27:24');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
