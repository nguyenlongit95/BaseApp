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

-- Dumping structure for table webthefull.catalogs
CREATE TABLE IF NOT EXISTS `catalogs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.catalogs: ~3 rows (approximately)
/*!40000 ALTER TABLE `catalogs` DISABLE KEYS */;
INSERT INTO `catalogs` (`id`, `name`, `url`, `description`, `public`, `created_at`, `updated_at`) VALUES
	(4, 'dasdsa', 'dsadas1', 'dsadsa', 1, '2018-07-13 11:30:14', '2018-07-13 11:54:18'),
	(5, 'dasdas', 'dsadsa', 'dasdsa', 1, '2018-07-13 11:30:21', '2018-07-13 11:30:21'),
	(6, 'fdsafds', 'afdasfds', 'fdsafdsa', 1, '2018-07-13 11:34:08', '2018-07-18 21:24:18');
/*!40000 ALTER TABLE `catalogs` ENABLE KEYS */;

-- Dumping structure for table webthefull.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `parent_id` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '1',
  `children_count` int(11) DEFAULT '0',
  `custom_layout` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.category: ~8 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `name`, `url_key`, `description`, `parent_id`, `sort_order`, `level`, `children_count`, `custom_layout`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Thẻ điện thoại', 'mobile-card', 'Thẻ điện thoại viettel, thẻ điện thoại mobile, thẻ điện thoại vina...', 0, NULL, 1, 3, NULL, 1, '2018-08-07 03:16:41', '2018-08-07 03:24:39'),
	(2, 'Thẻ viettel', 'mobile-card/viettel', 'Thẻ điện thoại viettel 10k.\r\nThẻ điện thoại viettel 20k.\r\nThẻ điện thoại viettel 50k.\r\nThẻ điện thoại viettel 100k.', 1, 2, 2, 2, NULL, 1, '2018-08-07 03:20:19', '2018-08-07 03:26:02'),
	(3, 'Thẻ mobile', 'mobile-card/mobile', 'Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.', 1, NULL, 2, 0, NULL, 0, '2018-08-07 03:21:07', '2018-08-07 03:22:12'),
	(4, 'Thẻ vina', 'mobile-card/vina', 'Thẻ điện thoại vinaphone 10k.\r\n Thẻ điện thoại vinaphone 20k.\r\n Thẻ điện thoại vinaphone 50k.\r\n Thẻ điện thoại vinaphone 100k.', 1, 1, 2, 0, NULL, 1, '2018-08-07 03:22:08', '2018-08-07 03:22:12'),
	(5, 'Thẻ viettel 10k.', 'mobile-card/viettel-10', NULL, 2, NULL, 3, 0, NULL, 1, '2018-08-07 03:25:19', '2018-08-07 03:26:02'),
	(6, 'Thẻ viettel 20k.', 'mobile-card/viettel-20', NULL, 2, NULL, 3, 0, NULL, 1, '2018-08-07 03:25:49', '2018-08-07 03:26:02'),
	(7, 'Thẻ game', 'game-card', 'Thẻ game. VNG, VTC,...', 0, NULL, 1, 1, NULL, 1, '2018-08-07 03:26:38', '2018-08-07 03:30:05'),
	(8, 'Thẻ Vinagame', 'game-card/vinagame', NULL, 7, NULL, 1, 0, NULL, 1, '2018-08-07 03:27:06', '2018-08-07 03:30:35');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table webthefull.category_product
CREATE TABLE IF NOT EXISTS `category_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.category_product: ~0 rows (approximately)
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;
INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `product_type`, `sort_order`, `created_at`, `updated_at`) VALUES
	(7, 1, 23, 'softcard', NULL, '2018-08-10 14:50:45', '2018-08-10 14:50:45');
/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;

-- Dumping structure for table webthefull.chargings
CREATE TABLE IF NOT EXISTS `chargings` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `user` int(50) NOT NULL,
  `user_info` varchar(150) DEFAULT NULL,
  `code` varchar(50) NOT NULL COMMENT 'Mã nạp',
  `serial` varchar(50) DEFAULT NULL COMMENT 'Serial',
  `telco` varchar(50) NOT NULL COMMENT 'Nhà mạng',
  `declared_value` double DEFAULT NULL COMMENT 'Mệnh giá khách khai báo',
  `real_value` double DEFAULT NULL COMMENT 'Mệnh giá thực',
  `fees` double DEFAULT NULL,
  `penalty` double DEFAULT NULL,
  `amount` double DEFAULT NULL COMMENT 'Số tiền sẽ nhận về',
  `currency_code` varchar(5) NOT NULL DEFAULT 'VND',
  `type` varchar(25) NOT NULL COMMENT 'Nạp nhanh/ nạp chậm',
  `error_code` varchar(5) NOT NULL COMMENT 'Mã lỗi',
  `error_message` varchar(100) NOT NULL COMMENT 'Thông báo lỗi',
  `charge_check` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Số lần đã nạp thử',
  `checksum` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `api_provider` varchar(50) DEFAULT NULL COMMENT 'Tên nhà cung cấp tẩy thẻ qua API',
  `request_id` varchar(50) DEFAULT NULL,
  `order` varchar(50) DEFAULT NULL COMMENT 'Gán cho order mua hàng nào đó',
  `description` varchar(150) NOT NULL,
  `admin_note` varchar(150) DEFAULT NULL,
  `transaction_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `checksum` (`checksum`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

-- Dumping data for table webthefull.chargings: ~2 rows (approximately)
/*!40000 ALTER TABLE `chargings` DISABLE KEYS */;
INSERT INTO `chargings` (`id`, `user`, `user_info`, `code`, `serial`, `telco`, `declared_value`, `real_value`, `fees`, `penalty`, `amount`, `currency_code`, `type`, `error_code`, `error_message`, `charge_check`, `checksum`, `status`, `api_provider`, `request_id`, `order`, `description`, `admin_note`, `transaction_code`, `created_at`, `updated_at`) VALUES
	(72, 1, 'admin', '9999999999999', '78754554545', 'VIETTEL', 10000, NULL, 1, NULL, 9900, 'VND', 'Charging', '', '', 0, '892f040366296b4212e36900065ba7b3', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-19 19:16:23', '2018-08-19 19:16:23'),
	(73, 1, 'admin', '9999999999998', '78754554565', 'VIETTEL', 10000, NULL, 1, NULL, 9900, 'VND', 'Charging', '', '', 0, 'c65eca83b50d4e7965f3bc42d06deae3', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-19 19:16:32', '2018-08-19 19:16:32');
/*!40000 ALTER TABLE `chargings` ENABLE KEYS */;

-- Dumping structure for table webthefull.chargings_cards
CREATE TABLE IF NOT EXISTS `chargings_cards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `discount_manual` double NOT NULL,
  `discount_api` double NOT NULL,
  `available_values` varchar(255) NOT NULL COMMENT 'Lưu dạng: 10000,20000,30000,50000',
  `currency_code` varchar(5) NOT NULL DEFAULT 'VND',
  `status` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table webthefull.chargings_cards: ~0 rows (approximately)
/*!40000 ALTER TABLE `chargings_cards` DISABLE KEYS */;
INSERT INTO `chargings_cards` (`id`, `name`, `key`, `image`, `discount_manual`, `discount_api`, `available_values`, `currency_code`, `status`, `sort`) VALUES
	(1, 'The Viettel', 'viettel', 'viettel.jpg', 35, 32, '50000,100000,200000,300000,500000,1000000', 'VND', 1, 0);
/*!40000 ALTER TABLE `chargings_cards` ENABLE KEYS */;

-- Dumping structure for table webthefull.chargings_fees
CREATE TABLE IF NOT EXISTS `chargings_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `penalty` float DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `telco_key` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.chargings_fees: ~4 rows (approximately)
/*!40000 ALTER TABLE `chargings_fees` DISABLE KEYS */;
INSERT INTO `chargings_fees` (`id`, `group`, `penalty`, `fees`, `telco_key`, `created_at`, `updated_at`) VALUES
	(1, 5, 30, 10, 'VINAPHONE', '2018-08-04 07:42:00', '2018-08-07 17:57:48'),
	(2, 4, 5, 11, 'VINAPHONE', '2018-08-04 07:42:15', '2018-08-04 07:42:31'),
	(3, 5, 19, 12, 'VIETTEL', '2018-08-04 07:43:56', '2018-08-07 17:57:56'),
	(4, 4, 0, 1, 'VIETTEL', '2018-08-04 07:43:57', '2018-08-04 07:48:41');
/*!40000 ALTER TABLE `chargings_fees` ENABLE KEYS */;

-- Dumping structure for table webthefull.chargings_orders
CREATE TABLE IF NOT EXISTS `chargings_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL COMMENT 'Mã đơn hàng để tracking',
  `user` int(11) NOT NULL,
  `user_info` varchar(150) NOT NULL,
  `telco` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `declared_value` double NOT NULL COMMENT 'Số tiền muốn nạp',
  `completed_value` double NOT NULL COMMENT 'Số tiền đã nạp được',
  `telco_type` varchar(50) NOT NULL COMMENT 'trả trước/trả sau- debit/credit',
  `discount` double NOT NULL COMMENT 'Chiết khấu',
  `amount` double NOT NULL COMMENT 'Số tiền phải trả',
  `currency_code` varchar(10) NOT NULL DEFAULT 'VND',
  `mix` tinyint(4) DEFAULT NULL COMMENT 'Bắt buộc chọn',
  `status` varchar(10) NOT NULL DEFAULT 'none',
  `payment_status` varchar(10) NOT NULL DEFAULT 'none',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_id` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1 COMMENT='Bảng này lưu các order nạp tiền điện thoại , tiền internet thủ công';

-- Dumping data for table webthefull.chargings_orders: ~27 rows (approximately)
/*!40000 ALTER TABLE `chargings_orders` DISABLE KEYS */;
INSERT INTO `chargings_orders` (`id`, `order_id`, `user`, `user_info`, `telco`, `phone_number`, `declared_value`, `completed_value`, `telco_type`, `discount`, `amount`, `currency_code`, `mix`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
	(42, 'M153286326927100', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:09', '2018-07-29 11:21:09'),
	(43, 'M153286327126554', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:11', '2018-07-29 11:21:11'),
	(44, 'M153286327158575', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:11', '2018-07-29 11:21:11'),
	(45, 'M153286327165355', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:11', '2018-07-29 11:21:11'),
	(46, 'M153286327238462', 1, 'admin', 'viettel', '0943793984', 500000, 350000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:12', '2018-07-29 11:21:12'),
	(47, 'M153286327280326', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:12', '2018-07-29 11:21:12'),
	(48, 'M153286327368852', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:13', '2018-07-29 11:21:13'),
	(49, 'M153286327350077', 1, 'admin', 'viettel', '0943793984', 500000, 300000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:13', '2018-07-29 11:21:13'),
	(50, 'M153286327410554', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:14', '2018-07-29 11:21:14'),
	(51, 'M153286327447935', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:14', '2018-07-29 11:21:14'),
	(52, 'M153286327499030', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:14', '2018-07-29 11:21:14'),
	(53, 'M153286327595058', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:15', '2018-07-29 11:21:15'),
	(54, 'M153286327585244', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:15', '2018-07-29 11:21:15'),
	(55, 'M153286327542077', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:15', '2018-07-29 11:21:15'),
	(56, 'M153286327566002', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:15', '2018-07-29 11:21:15'),
	(57, 'M153286327642936', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:16', '2018-07-29 11:21:16'),
	(58, 'M153286327613290', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:16', '2018-07-29 11:21:16'),
	(59, 'M153286327648409', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:16', '2018-07-29 11:21:16'),
	(60, 'M153286327735637', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:17', '2018-07-29 11:21:17'),
	(61, 'M153286327785089', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:17', '2018-07-29 11:21:17'),
	(62, 'M153286327765845', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:17', '2018-07-29 11:21:17'),
	(63, 'M153286327849626', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:18', '2018-07-29 11:21:18'),
	(64, 'M153286327895337', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:18', '2018-07-29 11:21:18'),
	(65, 'M153286327877218', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:18', '2018-07-29 11:21:18'),
	(66, 'M153286327948228', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:19', '2018-07-29 11:21:19'),
	(67, 'M153286327992354', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 11:21:19', '2018-07-29 11:21:19'),
	(68, 'M153310981773647', 1, 'admin', 'viettel', '0943793984', 500000, 200000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-08-01 07:50:17', '2018-08-01 07:50:17');
/*!40000 ALTER TABLE `chargings_orders` ENABLE KEYS */;

-- Dumping structure for table webthefull.chargings_telco
CREATE TABLE IF NOT EXISTS `chargings_telco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.chargings_telco: ~2 rows (approximately)
/*!40000 ALTER TABLE `chargings_telco` DISABLE KEYS */;
INSERT INTO `chargings_telco` (`id`, `name`, `key`, `icon`, `description`, `status`, `value`, `created_at`, `updated_at`) VALUES
	(1, 'VIETTEL', 'VIETTEL', NULL, NULL, 1, '10000,20000,30000,50000', '2018-07-30 04:03:52', '2018-08-07 16:32:29'),
	(2, 'VINAPHONE', 'VINAPHONE', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-07-30 04:03:52', '2018-08-06 08:41:31');
/*!40000 ALTER TABLE `chargings_telco` ENABLE KEYS */;

-- Dumping structure for table webthefull.currencies
CREATE TABLE IF NOT EXISTS `currencies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mã tiền tệ',
  `value` decimal(16,8) NOT NULL COMMENT '1 USD bằng bao nhiêu tiền này',
  `symbol_left` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seperator` enum('space','comma','dot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `decimal` tinyint(4) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `fiat` tinyint(1) NOT NULL DEFAULT '1',
  `default` tinyint(1) NOT NULL DEFAULT '0',
  `homepage` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Có cho hiện trên trang chủ hay ko',
  `sort` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currencies_status_index` (`status`),
  KEY `currencies_hide_index` (`homepage`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.currencies: ~2 rows (approximately)
/*!40000 ALTER TABLE `currencies` DISABLE KEYS */;
INSERT INTO `currencies` (`id`, `name`, `code`, `value`, `symbol_left`, `symbol_right`, `seperator`, `decimal`, `status`, `fiat`, `default`, `homepage`, `sort`, `created_at`, `updated_at`) VALUES
	(1, 'Đồng', 'VND', 23000.00000000, NULL, 'đ', 'comma', 0, 1, 1, 1, 1, 1, '2018-07-26 08:32:10', '2018-07-26 09:02:17'),
	(2, 'Dollars', 'USD', 1.00000000, '$', NULL, 'comma', 2, 1, 1, 0, 1, 1, '2018-07-27 04:54:56', '2018-07-27 04:54:56');
/*!40000 ALTER TABLE `currencies` ENABLE KEYS */;

-- Dumping structure for table webthefull.currencies_code
CREATE TABLE IF NOT EXISTS `currencies_code` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Các mã code của tiền tệ trên thế giới';

-- Dumping data for table webthefull.currencies_code: ~154 rows (approximately)
/*!40000 ALTER TABLE `currencies_code` DISABLE KEYS */;
INSERT INTO `currencies_code` (`code`, `name`) VALUES
	('AED', 'United Arab Emirates Dirham'),
	('AFN', 'Afghanistan Afghani'),
	('ALL', 'Albania Lek'),
	('AMD', 'Armenia Dram'),
	('ANG', 'Netherlands Antilles Guilder'),
	('AOA', 'Angola Kwanza'),
	('ARS', 'Argentina Peso'),
	('AUD', 'Australia Dollar'),
	('AWG', 'Aruba Guilder'),
	('AZN', 'Azerbaijan New Manat'),
	('BBD', 'Barbados Dollar'),
	('BDT', 'Bangladesh Taka'),
	('BGN', 'Bulgaria Lev'),
	('BHD', 'Bahrain Dinar'),
	('BIF', 'Burundi Franc'),
	('BMD', 'Bermuda Dollar'),
	('BND', 'Brunei Darussalam Dollar'),
	('BOB', 'Bolivia Bolíviano'),
	('BRL', 'Brazil Real'),
	('BSD', 'Bahamas Dollar'),
	('BTC', 'Bitcoin'),
	('BTN', 'Bhutan Ngultrum'),
	('BWP', 'Botswana Pula'),
	('BYN', 'Belarus Ruble'),
	('BZD', 'Belize Dollar'),
	('CAD', 'Canada Dollar'),
	('CDF', 'Congo/Kinshasa Franc'),
	('CHF', 'Switzerland Franc'),
	('CLP', 'Chile Peso'),
	('CNY', 'China Yuan Renminbi'),
	('COP', 'Colombia Peso'),
	('CRC', 'Costa Rica Colon'),
	('CUC', 'Cuba Convertible Peso'),
	('CUP', 'Cuba Peso'),
	('CVE', 'Cape Verde Escudo'),
	('CZK', 'Czech Republic Koruna'),
	('DJF', 'Djibouti Franc'),
	('DKK', 'Denmark Krone'),
	('DOP', 'Dominican Republic Peso'),
	('DZD', 'Algeria Dinar'),
	('EGP', 'Egypt Pound'),
	('ERN', 'Eritrea Nakfa'),
	('ETB', 'Ethiopia Birr'),
	('ETH', 'Ethereum'),
	('EUR', 'Euro Member Countries'),
	('FJD', 'Fiji Dollar'),
	('GBP', 'United Kingdom Pound'),
	('GEL', 'Georgia Lari'),
	('GGP', 'Guernsey Pound'),
	('GHS', 'Ghana Cedi'),
	('GIP', 'Gibraltar Pound'),
	('GMD', 'Gambia Dalasi'),
	('GNF', 'Guinea Franc'),
	('GTQ', 'Guatemala Quetzal'),
	('GYD', 'Guyana Dollar'),
	('HKD', 'Hong Kong Dollar'),
	('HNL', 'Honduras Lempira'),
	('HRK', 'Croatia Kuna'),
	('HTG', 'Haiti Gourde'),
	('HUF', 'Hungary Forint'),
	('IDR', 'Indonesia Rupiah'),
	('ILS', 'Israel Shekel'),
	('IMP', 'Isle of Man Pound'),
	('INR', 'India Rupee'),
	('IQD', 'Iraq Dinar'),
	('IRR', 'Iran Rial'),
	('ISK', 'Iceland Krona'),
	('JEP', 'Jersey Pound'),
	('JMD', 'Jamaica Dollar'),
	('JOD', 'Jordan Dinar'),
	('JPY', 'Japan Yen'),
	('KES', 'Kenya Shilling'),
	('KGS', 'Kyrgyzstan Som'),
	('KHR', 'Cambodia Riel'),
	('KMF', 'Comoros Franc'),
	('KPW', 'Korea (North) Won'),
	('KRW', 'Korea (South) Won'),
	('KWD', 'Kuwait Dinar'),
	('KYD', 'Cayman Islands Dollar'),
	('KZT', 'Kazakhstan Tenge'),
	('LAK', 'Laos Kip'),
	('LBP', 'Lebanon Pound'),
	('LKR', 'Sri Lanka Rupee'),
	('LRD', 'Liberia Dollar'),
	('LSL', 'Lesotho Loti'),
	('LTC', 'Litecoin'),
	('LYD', 'Libya Dinar'),
	('MAD', 'Morocco Dirham'),
	('MDL', 'Moldova Leu'),
	('MGA', 'Madagascar Ariary'),
	('MKD', 'Macedonia Denar'),
	('MMK', 'Myanmar (Burma) Kyat'),
	('MNT', 'Mongolia Tughrik'),
	('MOP', 'Macau Pataca'),
	('MRO', 'Mauritania Ouguiya'),
	('MUR', 'Mauritius Rupee'),
	('MWK', 'Malawi Kwacha'),
	('MXN', 'Mexico Peso'),
	('MYR', 'Malaysia Ringgit'),
	('MZN', 'Mozambique Metical'),
	('NAD', 'Namibia Dollar'),
	('NGN', 'Nigeria Naira'),
	('NIO', 'Nicaragua Cordoba'),
	('NOK', 'Norway Krone'),
	('NPR', 'Nepal Rupee'),
	('NZD', 'New Zealand Dollar'),
	('OMR', 'Oman Rial'),
	('PAB', 'Panama Balboa'),
	('PEN', 'Peru Sol'),
	('PGK', 'Papua New Guinea Kina'),
	('PHP', 'Philippines Peso'),
	('PKR', 'Pakistan Rupee'),
	('PLN', 'Poland Zloty'),
	('PYG', 'Paraguay Guarani'),
	('QAR', 'Qatar Riyal'),
	('RON', 'Romania New Leu'),
	('RSD', 'Serbia Dinar'),
	('RUB', 'Russia Ruble'),
	('RWF', 'Rwanda Franc'),
	('SAR', 'Saudi Arabia Riyal'),
	('SCR', 'Seychelles Rupee'),
	('SDG', 'Sudan Pound'),
	('SEK', 'Sweden Krona'),
	('SGD', 'Singapore Dollar'),
	('SHP', 'Saint Helena Pound'),
	('SLL', 'Sierra Leone Leone'),
	('SOS', 'Somalia Shilling'),
	('SPL', 'Seborga Luigino'),
	('SRD', 'Suriname Dollar'),
	('SVC', 'El Salvador Colon'),
	('SYP', 'Syria Pound'),
	('SZL', 'Swaziland Lilangeni'),
	('THB', 'Thailand Baht'),
	('TJS', 'Tajikistan Somoni'),
	('TMT', 'Turkmenistan Manat'),
	('TND', 'Tunisia Dinar'),
	('TOP', 'Tonga Pa\'anga'),
	('TRY', 'Turkey Lira'),
	('TVD', 'Tuvalu Dollar'),
	('TWD', 'Taiwan New Dollar'),
	('TZS', 'Tanzania Shilling'),
	('UAH', 'Ukraine Hryvnia'),
	('UGX', 'Uganda Shilling'),
	('USD', 'United States Dollar'),
	('UYU', 'Uruguay Peso'),
	('UZS', 'Uzbekistan Som'),
	('VEF', 'Venezuela Bolivar'),
	('VND', 'Viet Nam Dong'),
	('VUV', 'Vanuatu Vatu'),
	('WST', 'Samoa Tala'),
	('YER', 'Yemen Rial'),
	('ZAR', 'South Africa Rand'),
	('ZMW', 'Zambia Kwacha'),
	('ZWD', 'Zimbabwe Dollar');
/*!40000 ALTER TABLE `currencies_code` ENABLE KEYS */;

-- Dumping structure for table webthefull.groups
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.groups: ~4 rows (approximately)
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'Thành viên', 'Nhóm thành viên mặc định của website', 1, '2018-07-26 04:08:28', '2018-08-19 09:16:32'),
	(2, 'Thành viên VIP', 'Nhóm VIP', 1, '2018-07-26 04:08:23', '2018-08-19 09:15:29'),
	(6, 'Đại lý cấp 1', 'Đại lý cấp 1', 1, '2018-08-19 09:14:46', '2018-08-19 09:14:46'),
	(7, 'Đại lý cấp 2', NULL, 1, '2018-08-19 09:15:59', '2018-08-19 09:15:59');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;

-- Dumping structure for table webthefull.languages
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `default` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.languages: ~0 rows (approximately)
/*!40000 ALTER TABLE `languages` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages` ENABLE KEYS */;

-- Dumping structure for table webthefull.languages_trans
CREATE TABLE IF NOT EXISTS `languages_trans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.languages_trans: ~0 rows (approximately)
/*!40000 ALTER TABLE `languages_trans` DISABLE KEYS */;
/*!40000 ALTER TABLE `languages_trans` ENABLE KEYS */;

-- Dumping structure for table webthefull.localbanks
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.localbanks: ~0 rows (approximately)
/*!40000 ALTER TABLE `localbanks` DISABLE KEYS */;
INSERT INTO `localbanks` (`id`, `code`, `name`, `acc_num`, `acc_name`, `branch`, `link`, `info`, `icon`, `deposit`, `withdraw`, `status`, `sort`) VALUES
	(2, 'EAB', 'Ngân hàng Đông Á', '0104659963', 'Nguyen Van Nghia', 'Hai Phong', NULL, NULL, '', 1, 1, 1, 0);
/*!40000 ALTER TABLE `localbanks` ENABLE KEYS */;

-- Dumping structure for table webthefull.localbanks_user
CREATE TABLE IF NOT EXISTS `localbanks_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_num` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `acc_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `branch` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `approved` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.localbanks_user: ~10 rows (approximately)
/*!40000 ALTER TABLE `localbanks_user` DISABLE KEYS */;
INSERT INTO `localbanks_user` (`id`, `user_id`, `code`, `acc_num`, `acc_name`, `branch`, `approved`, `created_at`, `updated_at`) VALUES
	(1, 1, 'EAB', '0021355411', 'DO THUY TRANG', 'Ha Noi', 1, '2018-08-18 01:25:54', '0000-00-00 00:00:00'),
	(2, 0, 'EAB', '03366666666', 'nguyen van nghia', 'Hai Phong', 0, '2018-08-18 01:26:04', '2018-08-18 01:26:04'),
	(3, 0, 'EAB', '033666666667', 'nguyen van nghia', 'Hai Phong', 0, '2018-08-18 01:27:45', '2018-08-18 01:27:45'),
	(4, 0, 'EAB', '03111131313', 'nguyen van nghia', 'Hai Phong', 0, '2018-08-18 01:28:50', '2018-08-18 01:28:50'),
	(5, 0, 'EAB', 'ưewqeqwe', 'ưqeqweqwe', 'ưqeqwew', 0, '2018-08-18 01:30:29', '2018-08-18 01:30:29'),
	(6, 0, 'EAB', '03111131313', 'ưqewqewqe', 'eqwewqe', 0, '2018-08-18 01:32:37', '2018-08-18 01:32:37'),
	(7, 1, 'EAB', '03111131313', 'nguyen van nghia', 'Hai Phogn', 0, '2018-08-18 01:40:13', '2018-08-18 01:40:13'),
	(8, 1, 'EAB', '031111313133', 'nguyen van nghia', 'Hai Phong', 0, '2018-08-18 17:51:58', '2018-08-18 17:51:58'),
	(9, 1, 'EAB', '3243243243', 'ưqeqweqwe', '324234', 0, '2018-08-18 17:53:11', '2018-08-18 17:53:11'),
	(10, 1, 'EAB', '03111131313', 'nguyen van nghia', 'eqwewqe', 0, '2018-08-18 17:53:45', '2018-08-18 17:53:45');
/*!40000 ALTER TABLE `localbanks_user` ENABLE KEYS */;

-- Dumping structure for table webthefull.ltm_translations
CREATE TABLE IF NOT EXISTS `ltm_translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=149 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.ltm_translations: ~143 rows (approximately)
/*!40000 ALTER TABLE `ltm_translations` DISABLE KEYS */;
INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(1, 0, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2018-07-02 18:46:15', '2018-08-03 03:01:47'),
	(3, 0, 'en', 'pagination', 'previous', '&laquo; Previous', '2018-07-02 18:46:15', '2018-08-03 03:01:47'),
	(4, 0, 'en', 'pagination', 'next', 'Next &raquo;', '2018-07-02 18:46:15', '2018-08-03 03:01:47'),
	(5, 0, 'en', '_json', 'Login', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(6, 0, 'en', '_json', 'Register', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(7, 0, 'en', '_json', 'Logout', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(8, 0, 'en', '_json', 'E-Mail Address', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(9, 0, 'en', '_json', 'Password', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(10, 0, 'en', '_json', 'Remember Me', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(11, 0, 'en', '_json', 'Forgot Your Password?', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(12, 0, 'en', '_json', 'Reset Password', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(13, 0, 'en', '_json', 'Send Password Reset Link', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(14, 0, 'en', '_json', 'Confirm Password', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(15, 0, 'en', '_json', 'Name', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(16, 0, 'en', '_json', 'Toggle navigation', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(17, 0, 'en', '_json', 'Whoops!', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(18, 0, 'en', '_json', 'Hello!', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(19, 0, 'en', '_json', 'Regards', NULL, '2018-07-02 18:46:15', '2018-07-02 18:46:15'),
	(20, 0, 'en', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(21, 0, 'en', 'passwords', 'reset', 'Your password has been reset!', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(22, 0, 'en', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(23, 0, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(24, 0, 'en', 'passwords', 'user', 'We can\'t find a user with that e-mail address.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(25, 0, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(26, 0, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(27, 0, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(28, 0, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(29, 0, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(30, 0, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, dashes and underscores.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(31, 0, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(32, 0, 'en', 'validation', 'array', 'The :attribute must be an array.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(33, 0, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(34, 0, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(35, 0, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(36, 0, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(37, 0, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(38, 0, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(39, 0, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(40, 0, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(41, 0, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(42, 0, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(43, 0, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(44, 0, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(45, 0, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(46, 0, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(47, 0, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(48, 0, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(49, 0, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(50, 0, 'en', 'validation', 'file', 'The :attribute must be a file.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(51, 0, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(52, 0, 'en', 'validation', 'gt.numeric', 'The :attribute must be greater than :value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(53, 0, 'en', 'validation', 'gt.file', 'The :attribute must be greater than :value kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(54, 0, 'en', 'validation', 'gt.string', 'The :attribute must be greater than :value characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(55, 0, 'en', 'validation', 'gt.array', 'The :attribute must have more than :value items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(56, 0, 'en', 'validation', 'gte.numeric', 'The :attribute must be greater than or equal :value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(57, 0, 'en', 'validation', 'gte.file', 'The :attribute must be greater than or equal :value kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(58, 0, 'en', 'validation', 'gte.string', 'The :attribute must be greater than or equal :value characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(59, 0, 'en', 'validation', 'gte.array', 'The :attribute must have :value items or more.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(60, 0, 'en', 'validation', 'image', 'The :attribute must be an image.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(61, 0, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(62, 0, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(63, 0, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(64, 0, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(65, 0, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(66, 0, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(67, 0, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(68, 0, 'en', 'validation', 'lt.numeric', 'The :attribute must be less than :value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(69, 0, 'en', 'validation', 'lt.file', 'The :attribute must be less than :value kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(70, 0, 'en', 'validation', 'lt.string', 'The :attribute must be less than :value characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(71, 0, 'en', 'validation', 'lt.array', 'The :attribute must have less than :value items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(72, 0, 'en', 'validation', 'lte.numeric', 'The :attribute must be less than or equal :value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(73, 0, 'en', 'validation', 'lte.file', 'The :attribute must be less than or equal :value kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(74, 0, 'en', 'validation', 'lte.string', 'The :attribute must be less than or equal :value characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(75, 0, 'en', 'validation', 'lte.array', 'The :attribute must not have more than :value items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(76, 0, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(77, 0, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(78, 0, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(79, 0, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(80, 0, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(81, 0, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(82, 0, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(83, 0, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(84, 0, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(85, 0, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(86, 0, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(87, 0, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(88, 0, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(89, 0, 'en', 'validation', 'present', 'The :attribute field must be present.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(90, 0, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(91, 0, 'en', 'validation', 'required', 'The :attribute field is required.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(92, 0, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(93, 0, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(94, 0, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(95, 0, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(96, 0, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(97, 0, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(98, 0, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(99, 0, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(100, 0, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(101, 0, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(102, 0, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(103, 0, 'en', 'validation', 'string', 'The :attribute must be a string.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(104, 0, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(105, 0, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(106, 0, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(107, 0, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(108, 0, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2018-07-02 18:48:25', '2018-08-03 03:01:47'),
	(109, 0, 'vi', 'auth', 'failed', 'xin chào', '2018-07-02 19:11:48', '2018-08-03 03:01:47'),
	(111, 0, 'en', 'home', 'home_title', 'Home', '2018-07-02 19:14:14', '2018-08-03 03:01:47'),
	(112, 0, 'vi', 'home', 'home_title', 'Tiêu đề 1 2', '2018-07-02 19:14:48', '2018-08-03 03:01:47'),
	(113, 0, 'vi', 'pagination', 'previous', 'dafds', '2018-07-02 21:03:05', '2018-08-03 03:01:47'),
	(114, 0, 'vi', 'pagination', 'next', 'dasdsa', '2018-07-02 21:03:12', '2018-08-03 03:01:47'),
	(116, 0, 'en', 'auth', 'throttle', NULL, '2018-08-02 01:48:07', '2018-08-02 01:48:07'),
	(117, 0, 'en', '_json', 'Username', NULL, '2018-08-02 01:48:07', '2018-08-02 01:48:07'),
	(118, 0, 'en', '_json', 'laravel-filemanager::lfm', NULL, '2018-08-02 01:48:07', '2018-08-02 01:48:07'),
	(120, 0, 'en', 'test', 'dsadsa', 'vcxv', '2018-08-02 02:49:11', '2018-08-03 03:01:47'),
	(121, 0, 'fr', 'test', 'dsadsa', 'fdsafd', '2018-08-02 02:57:26', '2018-08-03 03:01:47'),
	(122, 0, 'vi', 'test', 'dsadsa', 'fdsafds', '2018-08-02 02:57:29', '2018-08-03 03:01:47'),
	(124, 0, 'en', 'test', 'gfgdf', 'gfdsgdsf', '2018-08-02 02:57:57', '2018-08-03 03:01:47'),
	(125, 0, 'en', 'test', 'gfdsgf', 'gfdsgfds', '2018-08-02 02:57:57', '2018-08-03 03:01:47'),
	(126, 0, 'en', 'test', 'gdfsgf', 'gfdsgf', '2018-08-02 02:57:57', '2018-08-03 03:01:47'),
	(127, 0, 'fr', 'test', 'gdfsgf', 'gfdsgfs', '2018-08-02 02:58:17', '2018-08-03 03:01:47'),
	(128, 0, 'fr', 'test', 'gfdsgf', 'gfds', '2018-08-02 02:58:18', '2018-08-03 03:01:47'),
	(129, 0, 'fr', 'test', 'gfgdf', 'gfds', '2018-08-02 02:58:20', '2018-08-03 03:01:47'),
	(130, 0, 'en', 'wallet', 'title', 'fdsafdsa', '2018-08-02 03:03:54', '2018-08-03 03:01:47'),
	(131, 0, 'en', 'wallet', 'fdsafdsa', 'dfsafdasfdsa', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(132, 0, 'en', 'wallet', 'fdsa', 'fdasfdsafdas', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(133, 0, 'en', 'wallet', 'fds', 'fdas', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(134, 0, 'en', 'wallet', 'afd', 'fdsafdsa', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(135, 0, 'en', 'wallet', 'asf', 'fdsafdsa', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(136, 0, 'en', 'wallet', 'dsa', 'fdsa', '2018-08-02 03:13:29', '2018-08-03 03:01:47'),
	(137, 0, 'en', 'profiles', 'login', 'login', '2018-08-03 02:46:26', '2018-08-03 03:01:47'),
	(138, 0, 'en', 'profiles', 'register', 'register', '2018-08-03 02:46:26', '2018-08-03 03:01:47'),
	(139, 0, 'en', 'profiles', 'logout', 'logout', '2018-08-03 02:46:26', '2018-08-03 03:01:47'),
	(140, 0, 'en', 'profiles', 'profile', 'profile', '2018-08-03 02:46:26', '2018-08-03 03:01:47'),
	(141, 0, 'vi', 'profiles', 'login', 'đăng nhập', '2018-08-03 02:47:23', '2018-08-03 03:01:47'),
	(142, 0, 'vi', 'profiles', 'logout', 'đăng xuất', '2018-08-03 02:47:28', '2018-08-03 03:01:47'),
	(143, 0, 'vi', 'profiles', 'profile', 'profile', '2018-08-03 02:47:40', '2018-08-03 03:01:47'),
	(144, 0, 'vi', 'profiles', 'register', 'đăng ký', '2018-08-03 02:47:45', '2018-08-03 03:01:47'),
	(145, 0, 'en', 'profiles', 'account', 'acount', '2018-08-03 03:00:22', '2018-08-03 03:01:47'),
	(146, 0, 'vi', 'profiles', 'account', 'tài khoản', '2018-08-03 03:00:40', '2018-08-03 03:01:47'),
	(147, 0, 'en', 'profiles', 'changepassword', 'change password', '2018-08-03 03:01:19', '2018-08-03 03:01:47'),
	(148, 0, 'vi', 'profiles', 'changepassword', 'đổi mật khẩu', '2018-08-03 03:01:41', '2018-08-03 03:01:47');
/*!40000 ALTER TABLE `ltm_translations` ENABLE KEYS */;

-- Dumping structure for table webthefull.menu
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
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.menu: ~24 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `url`, `menu_type`, `parent_id`, `level`, `children_count`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(60, 'Mua mã thẻ', '/muamathe.html', 'header', 0, 1, 0, 1, 1, '2018-08-06 23:16:17', '2018-08-14 11:05:23'),
	(61, 'Đổi thẻ cào', '#', 'header', 0, 1, 2, 2, 1, '2018-08-06 23:16:37', '2018-08-14 11:05:42'),
	(62, 'Đổi thẻ chậm', '/taythecham.html', NULL, 61, 2, 0, 1, 1, '2018-08-06 23:17:01', '2018-08-14 11:02:07'),
	(63, 'Đổi thẻ nhanh', '/doithenhanh.html', NULL, 61, 2, 0, 2, 1, '2018-08-06 23:18:24', '2018-08-14 11:01:23'),
	(67, 'Nạp di động', '#', 'header', 0, 1, 2, 3, 1, '2018-08-13 16:50:26', '2018-08-19 21:41:05'),
	(68, 'Nạp chậm', '/napcham.html', NULL, 67, 2, 0, 1, 1, '2018-08-13 16:50:54', '2018-08-14 11:02:39'),
	(69, 'Nạp nhanh', '/napnhanh.html', NULL, 67, 2, 0, 2, 1, '2018-08-13 16:51:17', '2018-08-14 11:02:39'),
	(70, 'Nạp tiền game', '/naptiengame.html', 'header', 0, 1, 0, 4, 1, '2018-08-13 16:51:53', '2018-08-14 11:05:51'),
	(71, 'Tin tức', 'tin-tuc', 'header', 0, 1, 0, 5, 1, '2018-08-13 16:52:37', '2018-08-18 12:41:39'),
	(72, 'Giới thiệu', '#', 'footer', 0, 1, 4, 11, 1, '2018-08-18 10:10:56', '2018-08-18 10:14:06'),
	(73, 'Chính sách', '#', 'footer', 0, 1, 4, 22, 1, '2018-08-18 10:11:21', '2018-08-18 10:11:21'),
	(74, 'Hướng dẫn', '#', 'footer', 0, 1, 4, 33, 1, '2018-08-18 10:11:35', '2018-08-18 10:11:35'),
	(75, 'Về chúng tôi', '#', NULL, 72, 2, 0, 1, 1, '2018-08-18 10:12:08', '2018-08-18 10:12:08'),
	(76, 'Giới thiệu chung tâm', '#', NULL, 72, 2, 0, 2, 1, '2018-08-18 10:12:42', '2018-08-18 10:12:42'),
	(77, 'Chính sách bảo mật', '#', NULL, 72, 2, 0, 3, 1, '2018-08-18 10:13:34', '2018-08-18 10:13:34'),
	(78, 'Điều khoản và điều kiện', '#', '', 72, 2, 0, 4, 1, '2018-08-18 10:14:06', '2018-08-18 10:14:06'),
	(79, 'Về chúng tôi', '#', NULL, 73, 2, 0, 1, 1, '2018-08-18 10:12:08', '2018-08-18 10:12:08'),
	(80, 'Giới thiệu chung tâm', '#', NULL, 73, 2, 0, 2, 1, '2018-08-18 10:12:42', '2018-08-18 10:12:42'),
	(81, 'Chính sách bảo mật', '#', NULL, 73, 2, 0, 3, 1, '2018-08-18 10:13:34', '2018-08-18 10:13:34'),
	(82, 'Điều khoản và điều kiện', '#', NULL, 73, 2, 0, 4, 1, '2018-08-18 10:14:06', '2018-08-18 10:14:06'),
	(83, 'Về chúng tôi', '#', NULL, 74, 2, 0, 1, 1, '2018-08-18 10:12:08', '2018-08-18 10:12:08'),
	(84, 'Giới thiệu chung tâm', '#', NULL, 74, 2, 0, 2, 1, '2018-08-18 10:12:42', '2018-08-18 10:12:42'),
	(85, 'Chính sách bảo mật', '#', NULL, 74, 2, 0, 3, 1, '2018-08-18 10:13:34', '2018-08-18 10:13:34'),
	(86, 'Điều khoản và điều kiện', '#', NULL, 74, 2, 0, 4, 1, '2018-08-18 10:14:06', '2018-08-18 10:14:06');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;

-- Dumping structure for table webthefull.merchants
CREATE TABLE IF NOT EXISTS `merchants` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.merchants: ~0 rows (approximately)
/*!40000 ALTER TABLE `merchants` DISABLE KEYS */;
/*!40000 ALTER TABLE `merchants` ENABLE KEYS */;

-- Dumping structure for table webthefull.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_06_21_160547_create_permission_tables', 2),
	(4, '2018_06_21_160736_create_products_table', 2),
	(5, '2014_04_02_193005_create_translations_table', 3),
	(6, '2018_07_25_162512_create_weblink_table', 4),
	(7, '2018_07_26_023843_create_groups_table', 4),
	(8, '2018_07_26_064856_create_currencies_table', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table webthefull.model_has_permissions
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.model_has_permissions: ~2 rows (approximately)
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
	(1, 'App\\User', 1),
	(3, 'App\\User', 1);
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;

-- Dumping structure for table webthefull.model_has_roles
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` int(10) unsigned NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.model_has_roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
	(2, 'App\\User', 1),
	(2, 'App\\User', 2),
	(3, 'App\\User', 1),
	(5, 'App\\User', 16);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;

-- Dumping structure for table webthefull.mtopups
CREATE TABLE IF NOT EXISTS `mtopups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(50) NOT NULL COMMENT 'Mã đơn hàng để tracking',
  `user` int(11) NOT NULL,
  `user_info` varchar(150) DEFAULT NULL,
  `telco` varchar(25) NOT NULL,
  `phone_number` varchar(25) NOT NULL,
  `declared_value` double NOT NULL COMMENT 'Số tiền muốn nạp',
  `completed_value` double NOT NULL COMMENT 'Số tiền đã nạp được',
  `telco_type` varchar(50) NOT NULL COMMENT 'trả trước/trả sau- debit/credit',
  `discount` double NOT NULL COMMENT 'Chiết khấu',
  `amount` double NOT NULL COMMENT 'Số tiền phải trả',
  `currency_code` varchar(10) NOT NULL DEFAULT 'VND',
  `mix` tinyint(4) DEFAULT NULL COMMENT 'Bắt buộc chọn',
  `status` varchar(10) NOT NULL DEFAULT 'none',
  `payment_status` varchar(10) NOT NULL DEFAULT 'none',
  `admin_note` text,
  `transaction_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=latin1 COMMENT='Bảng này lưu các order nạp tiền điện thoại , tiền internet thủ công';

-- Dumping data for table webthefull.mtopups: ~2 rows (approximately)
/*!40000 ALTER TABLE `mtopups` DISABLE KEYS */;
INSERT INTO `mtopups` (`id`, `order_id`, `user`, `user_info`, `telco`, `phone_number`, `declared_value`, `completed_value`, `telco_type`, `discount`, `amount`, `currency_code`, `mix`, `status`, `payment_status`, `admin_note`, `transaction_id`, `created_at`, `updated_at`) VALUES
	(95, 'M153387503418495', 1, 'dsfdsafdsa', 'vinaphone', '0123456789', 10000, 0, 'tratruoc', 0, 10000, 'VND', 0, 'wrong', 'refund', NULL, '179', '2018-08-10 11:23:54', '2018-08-10 11:33:55'),
	(96, 'M153395208742048', 1, 'dsfdsafdsa', 'viettel', '0986862867', 10000, 0, 'tratruoc', 0, 10000, 'VND', 1, 'none', 'paid', NULL, '189', '2018-08-11 08:48:07', '2018-08-11 08:48:07');
/*!40000 ALTER TABLE `mtopups` ENABLE KEYS */;

-- Dumping structure for table webthefull.mtopup_fees
CREATE TABLE IF NOT EXISTS `mtopup_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `telco_key` varchar(50) NOT NULL,
  `telco_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.mtopup_fees: ~12 rows (approximately)
/*!40000 ALTER TABLE `mtopup_fees` DISABLE KEYS */;
INSERT INTO `mtopup_fees` (`id`, `group`, `discount`, `telco_key`, `telco_type`, `created_at`, `updated_at`) VALUES
	(5, 5, 0, 'VINAPHONE', 'tratruoc', '2018-08-04 08:25:06', '2018-08-08 08:22:06'),
	(6, 4, 3, 'VINAPHONE', 'trasau', '2018-08-04 08:25:07', '2018-08-04 08:25:10'),
	(7, 5, 0, 'VIETTEL', 'tratruoc', '2018-08-04 08:25:11', '2018-08-08 08:22:09'),
	(8, 4, 2, 'VIETTEL', 'trasau', '2018-08-04 08:25:12', '2018-08-09 11:53:19'),
	(9, 5, 0, 'mobifone', 'tratruoc', '2018-08-06 11:17:26', '2018-08-08 08:22:09'),
	(10, 4, 3, 'mobifone', 'trasau', '2018-08-06 11:17:26', '2018-08-07 14:55:04'),
	(11, 5, 1, 'vinaphone', 'trasau', '2018-08-07 14:52:33', '2018-08-07 14:52:33'),
	(12, 5, 2, 'viettel', 'trasau', '2018-08-07 14:52:36', '2018-08-09 11:53:19'),
	(13, 5, 3, 'mobifone', 'trasau', '2018-08-07 14:52:41', '2018-08-07 14:55:04'),
	(14, 4, 0, 'vinaphone', 'tratruoc', '2018-08-08 08:22:05', '2018-08-08 08:22:06'),
	(15, 4, 0, 'mobifone', 'tratruoc', '2018-08-08 08:22:07', '2018-08-08 08:22:09'),
	(16, 4, 0, 'viettel', 'tratruoc', '2018-08-08 08:22:09', '2018-08-08 08:22:09');
/*!40000 ALTER TABLE `mtopup_fees` ENABLE KEYS */;

-- Dumping structure for table webthefull.mtopup_telco
CREATE TABLE IF NOT EXISTS `mtopup_telco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `number_format` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `value` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `key` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.mtopup_telco: ~3 rows (approximately)
/*!40000 ALTER TABLE `mtopup_telco` DISABLE KEYS */;
INSERT INTO `mtopup_telco` (`id`, `name`, `key`, `number_format`, `icon`, `description`, `status`, `value`, `updated_at`, `created_at`) VALUES
	(3, 'Viettel', 'viettel', ',0162,0163,0164,0165,0166,0167,0168,0169,086,096,097,098,', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-08-06 10:31:08', '2018-08-04 09:49:36'),
	(5, 'mobifone', 'mobifone', ',0120,0121,0122,0126,0128,090,093,089,', NULL, NULL, 1, '10000,20000,30000,50000', '2018-08-06 10:31:21', '2018-08-04 10:02:48'),
	(7, 'vinaphone', 'vinaphone', ',0123,0124,0125,0127,0129,091,094,088,', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-08-06 10:30:50', '2018-08-04 18:06:28');
/*!40000 ALTER TABLE `mtopup_telco` ENABLE KEYS */;

-- Dumping structure for table webthefull.news
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `author_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `custom_layout` tinyint(2) DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `publish_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.news: ~2 rows (approximately)
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` (`id`, `title`, `url_key`, `short_description`, `content`, `author`, `author_email`, `language`, `custom_layout`, `status`, `publish_date`, `created_at`, `updated_at`) VALUES
	(5, 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'post-test-001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n123\r\n12312\r\n3', '<h2>What is Lorem Ipsum 123?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'admin', 'admin@localhost.com', 'vi', 0, 0, '07/26/2018 00:00 - 08/03/2018 00:00', '2018-07-23 10:57:34', '2018-07-25 03:00:07'),
	(8, 'Đánh giá chi tiết Samsung Galaxy S8 Plus: hãy quên Note 7 đi', 'danh-gia-chi-tiet-samsung-galaxy-s8-plus-hay-quen-note-7-di', 'Có hơn 50% máy Galaxy S8 và Galaxy S8+ được bán ra được sản xuất ở Việt Nam. Để chế tạo thiết bị này thì Samsung đã phải đầu tư 17 ngàn máy CNC mới với giá trị trung bình mỗi máy vào khoảng 70.000 đô la Mỹ ở nhà máy Thái Nguyên của họ. Samsung đầu tư bao nhiêu không quan trọng, tạo bao nhiêu công ăn việc làm cũng không phải là lý do người dùng cuối chúng ta ủng hộ hay không ủng hộ Samsung, mà điểm chính yếu ở đây nằm ở chỗ Galaxy S8+ có phải là một sản phẩm tốt hay không.', '<p>Có hơn 50% máy Galaxy <a href="https://tinhte.vn/s8/">S8</a> và <a href="https://tinhte.vn/tags/galaxy-s8-2/">Galaxy S8+</a> được bán ra được sản xuất ở Việt Nam. Để chế tạo thiết bị này thì <a href="https://tinhte.vn/tags/samsung/">Samsung</a> đã phải đầu tư 17 ngàn máy CNC mới với giá trị trung bình mỗi máy vào khoảng 70.000 đô la Mỹ ở nhà máy Thái Nguyên của họ. Samsung đầu tư bao nhiêu không quan trọng, tạo bao nhiêu công ăn việc làm cũng không phải là lý do người dùng cuối chúng ta ủng hộ hay không ủng hộ Samsung, mà điểm chính yếu ở đây nằm ở chỗ Galaxy S8+ có phải là một sản phẩm tốt hay không.</p><p>Chắc chắn cảm giác đầu tiên của các bạn khi cầm S8 và S8+ lên là nó quá trơn tru so với S7 hay S7 edge, gần như toàn bộ các chi tiết, các mối ghép nối của sản phẩm này đã được lắp ghép liền mạch hơn so với các sản phẩm trước kia của Samsung, kể cả khi so sánh với Galaxy Note 7 trước đó. Samsung đã dùng hai tấm kính cường lực Gorilla Glass 5 ở cả mặt trước và sau để bảo vệ màn hình và mặt lưng của máy. Gorrilla Glass 5 được thiết kế với tư tưởng chống vỡ, nó sẽ mềm, linh hoạt hơn nên khó vỡ khi rơi (tất nhiên bạn xui thì sẽ vẫn nát máy như thường) nhưng dễ tổn thương với cát hay bụi trong túi áo/túi quần của chúng ta.</p><p>Chúng ta không cần nói quá nhiều về thiết kế của Galaxy S8 nữa, vì nó sang và đẹp nhất trong số tất cả các điện thoại mà Samsung từng sản xuất. Nếu có cái gì đó làm cho mình tiếc nuối thì đó là việc máy vẫn còn những chi tiết nhỏ chưa thật sự được chăm chút kỹ, vị trí các cổng kết nối hay thiết kế hơi nữ tính một chút. Ở một góc độ nào đó, Galaxy S8 rất đẹp nhưng lại không thật sự cho mình cảm giác cao cấp, cứng cáp khi cầm, điều mà iPhone hay mới đây là BlackBerry KeyOne làm rất tốt.</p>', 'admin', 'admin@localhost.com', 'en', 0, 1, NULL, '2018-07-26 18:06:13', '2018-07-26 18:06:13');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

-- Dumping structure for table webthefull.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Purchase',
  `curency_id` int(11) NOT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` int(11) NOT NULL,
  `payer_wallet` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payer_info` text COLLATE utf8_unicode_ci COMMENT 'có thể là bill info',
  `payee_id` int(11) NOT NULL,
  `payee_wallet` int(11) NOT NULL,
  `net_amount` decimal(16,5) NOT NULL COMMENT 'Tổng tiền đã gồm tiền hàng, thuế, phí',
  `fees` decimal(16,5) NOT NULL COMMENT 'Thuế và phí (chỉ lưu với mục đích xem)',
  `pay_amount` decimal(16,5) NOT NULL,
  `paygate_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cổng thanh toán gì',
  `affiliate_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã giới thiệu',
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái đơn hàng',
  `payment` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'trạng thái thanh toán',
  `shipment` int(1) NOT NULL COMMENT '0 hoặc 1',
  `shipment_info` text COLLATE utf8_unicode_ci COMMENT 'Thông tin ship',
  `description` text COLLATE utf8_unicode_ci,
  `admin_note` text COLLATE utf8_unicode_ci,
  `ipaddress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.orders: ~11 rows (approximately)
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `order_code`, `order_type`, `curency_id`, `currency_code`, `payer_id`, `payer_wallet`, `payer_info`, `payee_id`, `payee_wallet`, `net_amount`, `fees`, `pay_amount`, `paygate_code`, `affiliate_code`, `status`, `payment`, `shipment`, `shipment_info`, `description`, `admin_note`, `ipaddress`, `creator`, `created_at`, `updated_at`) VALUES
	(91, 'A153415048430770', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 15:54:44', '2018-08-13 15:54:44'),
	(92, 'A153415060843152', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 15:56:48', '2018-08-13 15:56:48'),
	(93, 'A153415064260255', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 15:57:22', '2018-08-13 15:57:22'),
	(94, 'A153415067937652', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 15:57:59', '2018-08-13 15:57:59'),
	(97, 'A153415101350701', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 16:03:33', '2018-08-13 16:03:33'),
	(98, 'A153415109113166', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 16:04:51', '2018-08-13 16:04:51'),
	(99, 'A153415113675088', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 16:05:36', '2018-08-13 16:05:36'),
	(100, 'A153415121450144', '', 0, 'VND', 1, NULL, NULL, 0, 0, 100000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-13 16:06:54', '2018-08-13 16:06:54'),
	(101, 'A153422874035728', '', 0, 'VND', 1, NULL, NULL, 0, 0, 500000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', 'Cộng 500k', '', 0, '2018-08-14 13:39:00', '2018-08-14 13:39:00'),
	(103, 'A153422881617082', '', 0, 'VND', 1, NULL, NULL, 0, 0, 500000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '', 0, '2018-08-14 13:40:16', '2018-08-14 13:40:16'),
	(104, 'A153422883279141', '', 0, 'VND', 1, NULL, NULL, 0, 0, 50000.00000, 0.00000, 0.00000, 'WALLET', '', 'Paid', 'NONE', 0, '', '', 'dsfsd sdfsd sdf', '', 0, '2018-08-14 13:40:32', '2018-08-14 13:40:32');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;

-- Dumping structure for table webthefull.order_items
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sku` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` decimal(16,5) NOT NULL,
  `product_tax` decimal(16,5) NOT NULL,
  `subtotal` decimal(16,5) NOT NULL,
  `options` text COLLATE utf8_unicode_ci NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Module xử lý item',
  `provider_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã nhà cung cấp',
  `provider_key` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin_note` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Thông tin mã thẻ trả về',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.order_items: ~0 rows (approximately)
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;

-- Dumping structure for table webthefull.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.password_resets: ~2 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('admin@localhost.com', '$2y$10$9XUxsjb9jqBfAX9WSbXpVe4eQVPItD0YdTnUXLi/vL4HpEKAbeQ8m', '2018-08-02 05:17:25'),
	('quocduongpy@gmail.com', '$2y$10$CHqZNTmIVLYGr6Fx9wacrOTmN/ZQ3Adox7j2jMXQMxKKC.2CzGlDe', '2018-08-02 05:22:56');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table webthefull.paygates
CREATE TABLE IF NOT EXISTS `paygates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `withdraw` text NOT NULL,
  `withdrawField` text NOT NULL,
  `deposit` tinyint(4) NOT NULL,
  `description` text,
  `avatar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `configs` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `fixed_fees` float NOT NULL,
  `percent_fees` float NOT NULL,
  `delivery_limit` float NOT NULL,
  `min` float NOT NULL DEFAULT '0',
  `max` float NOT NULL DEFAULT '0',
  `minute` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.paygates: ~0 rows (approximately)
/*!40000 ALTER TABLE `paygates` DISABLE KEYS */;
INSERT INTO `paygates` (`id`, `currency_id`, `currency_code`, `code`, `name`, `withdraw`, `withdrawField`, `deposit`, `description`, `avatar`, `url`, `configs`, `status`, `fixed_fees`, `percent_fees`, `delivery_limit`, `min`, `max`, `minute`, `created_at`, `updated_at`) VALUES
	(8, 0, 'VND', 'OnepayND', 'Onepay Nội địa', '0', '[]', 0, 'OnepayND payment gateway', NULL, 'https://mtf.onepay.vn/onecomm-pay/vpc.op', '{"merchant_id":"ONEPAY","access_code":"D67342C2","secure_secret":"A3EFDFABA8653DF2342E8DAC29B51AF0"}', 1, 1, 2, 5, 3, 4, 0, '2018-07-31 03:57:27', '2018-08-01 03:25:39');
/*!40000 ALTER TABLE `paygates` ENABLE KEYS */;

-- Dumping structure for table webthefull.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.permissions: ~6 rows (approximately)
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
	(1, 'role-list', 'web', NULL, '2018-06-21 16:14:46', '2018-06-21 16:14:46'),
	(2, 'role-create', 'web', NULL, '2018-06-21 16:14:46', '2018-06-21 16:14:46'),
	(3, 'role-edit', 'web', NULL, '2018-06-21 16:14:46', '2018-06-21 16:14:46'),
	(4, 'role-delete', 'web', NULL, '2018-06-21 16:14:46', '2018-06-21 16:14:46'),
	(10, 'all', 'web', 'All access for super admin', '2018-06-30 00:33:42', '2018-06-30 00:33:42'),
	(11, 'user', 'web', 'Account type user', '2018-07-01 01:57:01', '2018-07-01 01:57:01');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table webthefull.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `url` varchar(250) NOT NULL DEFAULT '0',
  `catalog` int(11) NOT NULL DEFAULT '0',
  `image` int(11) DEFAULT '0',
  `image_other` int(11) DEFAULT '0',
  `description` varchar(500) DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.products: ~2 rows (approximately)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `name`, `url`, `catalog`, `image`, `image_other`, `description`, `order`, `public`, `created_at`, `updated_at`) VALUES
	(2, 'Viettel', '1-2-3', 5, 5, 3, 'de', 2, 0, '2018-07-15 06:02:36', '2018-07-15 06:02:36'),
	(3, 'dadsa', 'dasdass', 6, 5, 2, 'dsadas', 1, 1, '2018-07-15 06:03:26', '2018-07-15 06:38:14');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

-- Dumping structure for table webthefull.product_gallery
CREATE TABLE IF NOT EXISTS `product_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_thumb` tinyint(2) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.product_gallery: ~0 rows (approximately)
/*!40000 ALTER TABLE `product_gallery` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_gallery` ENABLE KEYS */;

-- Dumping structure for table webthefull.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.roles: ~4 rows (approximately)
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
	(2, 'BACKEND', 'web', '2018-06-21 00:00:00', NULL),
	(3, 'SUPER_ADMIN', 'web', '2018-06-21 00:00:00', '2018-06-29 20:52:31'),
	(4, 'ADMIN', 'web', '2018-06-21 00:00:00', '2018-06-30 00:34:51'),
	(5, 'USER', 'web', '2018-07-01 01:57:15', '2018-07-01 01:57:15');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table webthefull.role_has_permissions
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.role_has_permissions: ~7 rows (approximately)
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
	(1, 2),
	(1, 4),
	(2, 4),
	(3, 4),
	(4, 4),
	(10, 3),
	(11, 5);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;

-- Dumping structure for table webthefull.sendmail_driver
CREATE TABLE IF NOT EXISTS `sendmail_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `configs` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `installed` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `driver` (`driver`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.sendmail_driver: ~0 rows (approximately)
/*!40000 ALTER TABLE `sendmail_driver` DISABLE KEYS */;
INSERT INTO `sendmail_driver` (`id`, `name`, `driver`, `configs`, `status`, `installed`) VALUES
	(3, 'Gửi mail bằng Smtp', 'Smtp', '{"host":"smtp.gmail.com","username":"phuonganh5694@gmail.com","password":"147258abc","port":"587","encryption":"tls","sendmail":"\\/usr\\/sbin\\/sendmail -bs"}', 1, 1);
/*!40000 ALTER TABLE `sendmail_driver` ENABLE KEYS */;

-- Dumping structure for table webthefull.sendmail_setting
CREATE TABLE IF NOT EXISTS `sendmail_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `from_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.sendmail_setting: ~0 rows (approximately)
/*!40000 ALTER TABLE `sendmail_setting` DISABLE KEYS */;
INSERT INTO `sendmail_setting` (`id`, `from_email`, `from_name`, `driver`) VALUES
	(1, 'phuonganh5694@gmail.com', 'Nencer', 'Smtp');
/*!40000 ALTER TABLE `sendmail_setting` ENABLE KEYS */;

-- Dumping structure for table webthefull.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `key` varchar(250) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.settings: ~18 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`) VALUES
	('favicon', '/uploads/images/WIN-LOGO.png', NULL, '2018-08-16 23:47:19'),
	('backendlogo', '/uploads/images/WIN-LOGO.png', NULL, '2018-08-16 23:47:19'),
	('name', 'name', NULL, '2018-08-16 23:47:19'),
	('title', 'title 1', NULL, '2018-08-16 23:47:19'),
	('description', 'Description', NULL, '2018-08-16 23:47:19'),
	('language', 'vi', NULL, '2018-08-16 23:47:19'),
	('phone', '0123456789', NULL, '2018-08-16 23:47:19'),
	('twitter', 'fb.com/admin', NULL, '2018-08-16 23:47:19'),
	('email', 'admin@localhost.com', NULL, '2018-08-16 23:47:19'),
	('facebook', 'fb.com/admin', NULL, '2018-08-16 23:47:19'),
	('logo', '/uploads/images/WIN-LOGO.png', NULL, '2018-08-16 23:47:19'),
	('hotline', '0123456789', NULL, '2018-08-16 23:47:19'),
	('backendname', 'AdminLTE', NULL, '2018-08-16 23:47:19'),
	('backendlang', 'en', NULL, '2018-08-16 23:47:19'),
	('copyright', 'copyright', NULL, '2018-08-16 23:47:19'),
	('timezone', 'Asia/Ho_Chi_Minh', NULL, '2018-08-16 23:47:19'),
	('googleplus', 'fb.com/admin', NULL, '2018-08-16 23:47:19'),
	('websitestatus', 'ONLINE', NULL, '2018-08-16 23:47:19');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table webthefull.shoppingcart
CREATE TABLE IF NOT EXISTS `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`identifier`,`instance`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.shoppingcart: ~0 rows (approximately)
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;

-- Dumping structure for table webthefull.sliders
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

-- Dumping data for table webthefull.sliders: ~2 rows (approximately)
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_text`, `slider_url`, `slider_btn_text`, `slider_btn_url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(4, 'Slider demo 01', 'sliders/tRFkSIXFrfjSSe0uCpVDv78srpvNy8rM8BGqP0HW.png', 'Nạp tiền chưa bao giờ dễ thế', NULL, 'Đăng ký', 'http://', 1, 1, '2018-08-14 11:21:57', '2018-08-14 11:23:16'),
	(5, 'Slider demo 02', 'sliders/Wy18BAXsTt9TFCuOUBv1Eqz3gQ5rNUF6BCnkHKcO.png', '234 2rfdsfsdf sdf sdf sdf', NULL, 'Đăng ký3', 'http://', 2, 1, '2018-08-14 11:27:24', '2018-08-14 11:27:24');
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;

-- Dumping structure for table webthefull.softcard
CREATE TABLE IF NOT EXISTS `softcard` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.softcard: ~0 rows (approximately)
/*!40000 ALTER TABLE `softcard` DISABLE KEYS */;
INSERT INTO `softcard` (`id`, `name`, `url_key`, `short_description`, `description`, `status`, `created_at`, `updated_at`) VALUES
	(23, 'the viettel', 'the-viettel', 'the viettel', 'the viettel', 1, '2018-08-10 14:50:45', '2018-08-10 14:50:45');
/*!40000 ALTER TABLE `softcard` ENABLE KEYS */;

-- Dumping structure for table webthefull.softcard_item
CREATE TABLE IF NOT EXISTS `softcard_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `softcard_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(12,4) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.softcard_item: ~4 rows (approximately)
/*!40000 ALTER TABLE `softcard_item` DISABLE KEYS */;
INSERT INTO `softcard_item` (`id`, `softcard_id`, `name`, `value`, `sku`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
	(15, 23, 'Viettel 20.000đ', 10000.0000, 'VT20000', 0, 1, '2018-08-10 14:50:45', '2018-08-19 17:20:15'),
	(16, 23, 'Viettel 50.000đ', 50000.0000, 'VT500001', 0, 1, '2018-08-13 11:48:16', '2018-08-19 16:34:39'),
	(17, 23, 'Viettel 100.000đ', 100000.0000, 'VT100000', 0, 1, '2018-08-19 16:33:43', '2018-08-19 16:33:43'),
	(18, 23, 'Viettel 200.000đ', 200000.0000, 'VT200000', 0, 1, '2018-08-19 16:33:43', '2018-08-19 16:33:43');
/*!40000 ALTER TABLE `softcard_item` ENABLE KEYS */;

-- Dumping structure for table webthefull.softcard_item_discount
CREATE TABLE IF NOT EXISTS `softcard_item_discount` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `value` decimal(12,4) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.softcard_item_discount: ~20 rows (approximately)
/*!40000 ALTER TABLE `softcard_item_discount` DISABLE KEYS */;
INSERT INTO `softcard_item_discount` (`id`, `item_id`, `group_id`, `value`, `status`, `created_at`, `updated_at`) VALUES
	(25, 15, 4, 1.0000, 1, '2018-08-10 14:50:45', '2018-08-10 14:50:45'),
	(26, 15, 5, 1.0000, 1, '2018-08-10 14:50:45', '2018-08-10 14:50:45'),
	(27, 16, 4, 0.0000, 1, '2018-08-13 11:48:16', '2018-08-13 11:48:16'),
	(28, 16, 5, 0.0000, 1, '2018-08-13 11:48:16', '2018-08-13 11:48:16'),
	(29, 15, 1, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(30, 15, 2, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(31, 15, 6, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(32, 15, 7, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(33, 16, 1, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(34, 16, 2, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(35, 16, 6, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(36, 16, 7, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(37, 17, 1, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(38, 17, 2, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(39, 17, 6, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(40, 17, 7, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(41, 18, 1, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(42, 18, 2, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(43, 18, 6, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15'),
	(44, 18, 7, 0.0000, 1, '2018-08-19 16:33:43', '2018-08-19 17:20:15');
/*!40000 ALTER TABLE `softcard_item_discount` ENABLE KEYS */;

-- Dumping structure for table webthefull.softcard_item_price
CREATE TABLE IF NOT EXISTS `softcard_item_price` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price` decimal(12,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.softcard_item_price: ~8 rows (approximately)
/*!40000 ALTER TABLE `softcard_item_price` DISABLE KEYS */;
INSERT INTO `softcard_item_price` (`id`, `item_id`, `currency_id`, `price`, `created_at`, `updated_at`) VALUES
	(11, 15, 1, 10000.0000, '2018-08-10 14:50:45', '2018-08-10 14:50:45'),
	(12, 15, 2, 5.0000, '2018-08-10 14:50:45', '2018-08-10 14:50:45'),
	(13, 16, 1, 50000.0000, '2018-08-13 11:48:16', '2018-08-13 11:48:16'),
	(14, 16, 2, 11.0000, '2018-08-13 11:48:16', '2018-08-19 16:34:39'),
	(15, 17, 1, 98000.0000, '2018-08-19 16:33:43', '2018-08-19 16:33:43'),
	(16, 17, 2, 56.0000, '2018-08-19 16:33:43', '2018-08-19 16:33:43'),
	(17, 18, 1, 198000.0000, '2018-08-19 16:33:43', '2018-08-19 16:33:43'),
	(18, 18, 2, 110.0000, '2018-08-19 16:33:43', '2018-08-19 16:33:43');
/*!40000 ALTER TABLE `softcard_item_price` ENABLE KEYS */;

-- Dumping structure for table webthefull.softcard_orders
CREATE TABLE IF NOT EXISTS `softcard_orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `product` varchar(255) DEFAULT NULL,
  `product_sku` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `discount` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `user_info` varchar(50) DEFAULT NULL,
  `order_status` varchar(50) DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `cart_content` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.softcard_orders: ~14 rows (approximately)
/*!40000 ALTER TABLE `softcard_orders` DISABLE KEYS */;
INSERT INTO `softcard_orders` (`id`, `order_no`, `transaction_id`, `product`, `product_sku`, `qty`, `discount`, `subtotal`, `user`, `user_info`, `order_status`, `payment_status`, `cart_content`, `created_at`, `updated_at`) VALUES
	(1, 'S153412427575609', NULL, 'viettel100k', NULL, 1, 0, 10000, 4, 'dsfdsafdsa', 'pending', 'none', '{"4b99da3f52d061ecc4827c21e0715420":{"rowId":"4b99da3f52d061ecc4827c21e0715420","id":"viettel_10","name":"viettel100k","qty":"1","price":10000,"options":{"discount":0},"tax":0,"subtotal":10000}}', '2018-08-13 08:37:55', '2018-08-13 08:37:55'),
	(2, 'S153412482432102', NULL, 'viettel100k', NULL, 1, 0, 10000, 4, 'dsfdsafdsa', 'pending', 'none', '{"4b99da3f52d061ecc4827c21e0715420":{"rowId":"4b99da3f52d061ecc4827c21e0715420","id":"viettel_10","name":"viettel100k","qty":"1","price":10000,"options":{"discount":0},"tax":0,"subtotal":10000}}', '2018-08-13 08:47:04', '2018-08-13 08:47:04'),
	(3, 'S153412489836486', '191', 'viettel100k', NULL, 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 08:48:18', '2018-08-13 08:48:18'),
	(4, 'S153412690857791', '192', 'viettel100k', NULL, 2, 1, 19800, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":"2","price":9900,"options":{"discount":"1"},"tax":0,"subtotal":19800}}', '2018-08-13 09:21:48', '2018-08-13 09:21:48'),
	(5, 'S153413012419037', '193', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 10:15:24', '2018-08-13 10:15:24'),
	(6, 'S153413063689842', '194', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 10:23:56', '2018-08-13 10:23:56'),
	(7, 'S153413070923501', '195', 'viettel100k', 'viettel_10', 2, 1, 19800, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":"2","price":9900,"options":{"discount":"1"},"tax":0,"subtotal":19800}}', '2018-08-13 10:25:09', '2018-08-13 10:25:09'),
	(8, 'S153413230648296', '196', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":"1","price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 10:51:46', '2018-08-13 10:51:46'),
	(9, 'S153413519943266', '197', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":"1","price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 11:39:59', '2018-08-13 11:39:59'),
	(10, 'S153413551415341', '198', 'viettel100k', 'viettel_10', 3, 1, 29700, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":"3","price":9900,"options":{"discount":"1"},"tax":0,"subtotal":29700}}', '2018-08-13 11:45:14', '2018-08-13 11:45:14'),
	(13, 'S153413582649692', '199', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900},"d292ae60bc9af97f3aa406a59513e917":{"rowId":"d292ae60bc9af97f3aa406a59513e917","id":"viettel_50","name":"viettel50k","qty":1,"price":50000,"options":{"discount":"0"},"tax":0,"subtotal":50000}}', '2018-08-13 11:50:26', '2018-08-13 11:50:26'),
	(14, 'S153413582649692', '199', 'viettel50k', 'viettel_50', 1, 0, 50000, 4, 'dsfdsafdsa', 'Paid', 'success', '{"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900},"d292ae60bc9af97f3aa406a59513e917":{"rowId":"d292ae60bc9af97f3aa406a59513e917","id":"viettel_50","name":"viettel50k","qty":1,"price":50000,"options":{"discount":"0"},"tax":0,"subtotal":50000}}', '2018-08-13 11:50:26', '2018-08-13 11:50:26'),
	(15, 'S153413601454085', '200', 'viettel50k', 'viettel_50', 2, 0, 100000, 4, 'dsfdsafdsa', 'Paid', 'success', '{"d292ae60bc9af97f3aa406a59513e917":{"rowId":"d292ae60bc9af97f3aa406a59513e917","id":"viettel_50","name":"viettel50k","qty":"2","price":50000,"options":{"discount":"0"},"tax":0,"subtotal":100000},"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 11:53:34', '2018-08-13 11:53:35'),
	(16, 'S153413601454085', '200', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{"d292ae60bc9af97f3aa406a59513e917":{"rowId":"d292ae60bc9af97f3aa406a59513e917","id":"viettel_50","name":"viettel50k","qty":"2","price":50000,"options":{"discount":"0"},"tax":0,"subtotal":100000},"b1f8c6c643771f6c6724cc09a56c0b3a":{"rowId":"b1f8c6c643771f6c6724cc09a56c0b3a","id":"viettel_10","name":"viettel100k","qty":1,"price":9900,"options":{"discount":"1"},"tax":0,"subtotal":9900}}', '2018-08-13 11:53:34', '2018-08-13 11:53:35');
/*!40000 ALTER TABLE `softcard_orders` ENABLE KEYS */;

-- Dumping structure for table webthefull.stockcards
CREATE TABLE IF NOT EXISTS `stockcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `item_sku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'Dòng này phải mã hóa',
  `expire` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Người tạo hoặc chủ nhân',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `order_no` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sold_user` int(11) DEFAULT NULL,
  `sold_date` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `admin_note` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.stockcards: ~12 rows (approximately)
/*!40000 ALTER TABLE `stockcards` DISABLE KEYS */;
INSERT INTO `stockcards` (`id`, `name`, `item_sku`, `serial`, `code`, `expire`, `username`, `status`, `order_no`, `sold_user`, `sold_date`, `created_at`, `updated_at`, `admin_note`, `order_id`) VALUES
	(33, 'Thẻ Viettel 100.000đ', '100.000đ', 'wqewqe', 'eyJpdiI6IlNDcmU5ajJPME85cWJOQUJVSExwaGc9PSIsInZhbHVlIjoiREV0Tk1HT095RURxcjdmWjVjWGJPUT09IiwibWFjIjoiYjhiNTIwODQwOWFlNzkxMGJlMzhmMzEzOTQ1MGM3YmM3YzQ5YjkyOTVkMDI0NTE5NzAzNmJkOWRkZjQ0ZTkyZiJ9', 'N/A', 'admin', 0, NULL, NULL, NULL, '2018-08-03 15:50:39', '2018-08-03 15:50:39', '', ''),
	(34, 'Thẻ Viettel 100.000đ', '100.000đ', 'ewqe', 'eyJpdiI6ImNmcGs1d2Q1VW0zOXRpMmtGVEYzaHc9PSIsInZhbHVlIjoiVHM0ekNuXC9SZUJpN2ZUQUJWVlF1emc9PSIsIm1hYyI6Ijk0NzNhMDlhODZmZjUwNGUzZDg3MTZkNWNmOTVlMTQ0MmUyNzhhNzk1NWM1ODMyZDMwYjM2MzRjYjI4YjE3M2YifQ==', 'N/A', 'admin', 0, NULL, NULL, NULL, '2018-08-03 15:50:39', '2018-08-03 15:50:39', '', ''),
	(35, '23 viettel_10', 'viettel_10', '123456789', 'eyJpdiI6IlJMV2Q0MUtJU0tjMVk4a29UamxEbVE9PSIsInZhbHVlIjoicXpSU2duNG56YW80eitONXFWd0poeHZZVTliakFhbFJyekxqSzhOUUh4ST0iLCJtYWMiOiJmOWYxNGQ4ZWU3ZjM0MGJiMTc1MmJiZDRiNDlhNTY1NThiOWFjMGJjNmZmYTc5MGI0NDI5MDk3NjkzODVhODg1In0=', 'N/A', 'admin', 1, NULL, NULL, NULL, '2018-08-13 10:00:43', '2018-08-13 11:34:40', '', ''),
	(36, 'the viettel viettel_10', 'viettel_10', '0123456789', 'eyJpdiI6InMzVWpZQXJRRERxQWJ4cVwvQ3lxZUx3PT0iLCJ2YWx1ZSI6IkFqRlpZUFhwRkc3dmNBWTJcL1FUeWxCekdDdmVIMW1Rem5NXC93NnFzVzkxdz0iLCJtYWMiOiJlMGIzM2QyMTFjYTZhYmQxZGM4NzY5NWJjYmUwYTBhNWJjMWFiYmYzNDdhOWQ4NTU0MTZlZTA4MmFjZDQ1MWRjIn0=', 'N/A', 'admin', 1, 'S153413519943266', 4, '2018-08-13 11:39:59', '2018-08-13 10:04:43', '2018-08-13 11:39:59', '', ''),
	(37, 'the viettel viettel_10', 'viettel_10', '0123456', 'eyJpdiI6IjY1ZHVVUlh1SjllQ3F4alA1VTFOS2c9PSIsInZhbHVlIjoiZnhOYjJzWmt6Q1RRQlg5eStLTGNuZz09IiwibWFjIjoiMjQ4NDc2NDZlMWYwNzIzYmQ5ZGZmMTgzOGFkZjc2N2Y1OTZiYWVmMjQzODAzMDQwYTg1ZjFkMjhhZjUzZDI4MCJ9', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 11:45:14', '2018-08-13 11:44:23', '2018-08-13 11:45:14', '', ''),
	(38, 'the viettel viettel_10', 'viettel_10', '0123457', 'eyJpdiI6Ild4a3JmcFIyd3J2K1wvQTdTMjhXSkhBPT0iLCJ2YWx1ZSI6Imlpc0hxSG9cL010MWhVc2ozVkl4elBRPT0iLCJtYWMiOiJjMTVjMGUzZjRkYWRhMzAwZDM2ZmZhMzYzZmJmZTUwNGZhOTM5MzBjZWQ5Mzk5YzVjZWQxNjA4YWEwNDk2Y2M3In0=', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 11:45:14', '2018-08-13 11:44:23', '2018-08-13 11:45:14', '', ''),
	(39, 'the viettel viettel_10', 'viettel_10', '0258369', 'eyJpdiI6InFBSzNqSVBxUHhIZitVenpvSnl5U3c9PSIsInZhbHVlIjoiWFh5Yyt4TEpWMUlqZUpJUHo0U2hjUT09IiwibWFjIjoiNmQzMTJlZjMyNTYzMjI1NWY1NGZjNGUxOTI2YzZmY2U1MDUzM2JkYmQwOTVhY2E3ZTE0NTFiYWJlNjI5ZjBkNyJ9', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 11:45:14', '2018-08-13 11:44:23', '2018-08-13 11:45:14', '', ''),
	(40, 'the viettel viettel_10', 'viettel_10', '01470258', 'eyJpdiI6IkcxTlVIZjJ0a2c1Tmh6dTlZOEFEWmc9PSIsInZhbHVlIjoiREFSV3NqdGMzRnBhXC9tdmFDZVhkczM0bWdVXC96cVhGZzQ4SmNDRnorazVNPSIsIm1hYyI6ImI4ZmMwYWFkMmQyNDhmNmM0MmMwNjU1NTFlNjQ1MzY4NDM3ZDBmMDA2NmQwMmQ3YmVkZTcwYjUzOTJmMTg1NWUifQ==', 'N/A', 'admin', 1, 'S153413582649692', 4, '2018-08-13 11:50:26', '2018-08-13 11:44:23', '2018-08-13 11:50:26', '', ''),
	(41, 'the viettel viettel_10', 'viettel_10', '0123562', 'eyJpdiI6ImdYRDBTVHAzd0R6R0t2RFhwT2Z1Tmc9PSIsInZhbHVlIjoiaWNwZnFtQ3RLT0xaMWVFXC9UZ2pLdWc9PSIsIm1hYyI6IjEzZmExYWFlMDkzZTI3MTQ4YTk4NDVkYjQwNzMxMDk1YzBhYTg1ZmVkZTliMDQwNDRjNWY3YzViZGMyNTZiZDUifQ==', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 11:53:35', '2018-08-13 11:44:23', '2018-08-13 11:53:35', '', ''),
	(42, 'the viettel viettel_50', 'viettel_50', '023690', 'eyJpdiI6IlR2VWlIMjd3Q2dxbUY1NlhBTWFjSHc9PSIsInZhbHVlIjoiT1lXN0diampyR1pLOGZcL2o2cjVEVFE9PSIsIm1hYyI6ImM2ZjE3MTAyZTg2ZjMwOWRhMjZmMmFhYmIwZWZiNzYzYzQwZjYxODBkOTlhZTBhMTI2MThiZWMxNThlMmM5ZjMifQ==', 'N/A', 'admin', 1, 'S153413582649692', 4, '2018-08-13 11:50:26', '2018-08-13 11:50:12', '2018-08-13 11:50:26', '', ''),
	(43, 'the viettel viettel_50', 'viettel_50', '023698', 'eyJpdiI6ImZ6VGMzc3d5aHlKc1wvUUo5QkcyTVdRPT0iLCJ2YWx1ZSI6Ik9LN0R5U0ljNGtSN0NtNGhVTUdDTFE9PSIsIm1hYyI6Ijg1ZTA4YWRkNzQ0Yjg3YTQxZjRkMGIwMjAyMjk4YTIzMmVmMWI4OTBlNWExYTI1MTAzY2U2YWY3OWNiODNkZGQifQ==', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 11:53:35', '2018-08-13 11:50:12', '2018-08-13 11:53:35', '', ''),
	(44, 'the viettel viettel_50', 'viettel_50', '025869', 'eyJpdiI6IjdoZXNNT0srRHZNOHlqOFNodjV6VGc9PSIsInZhbHVlIjoiU1orZEJKN3BFU081bnBwaVFPeWhqdz09IiwibWFjIjoiZDM1MWViZjFkODlkODZmZDMzYTkxYzgxNzM1NjA1NDM0OTk5YjA1YzEwMDg0NGE0NTM0N2M4NmM5YTEwOWQ5MyJ9', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 11:53:35', '2018-08-13 11:50:12', '2018-08-13 11:53:35', '', '');
/*!40000 ALTER TABLE `stockcards` ENABLE KEYS */;

-- Dumping structure for table webthefull.stockcards_setting
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.stockcards_setting: ~2 rows (approximately)
/*!40000 ALTER TABLE `stockcards_setting` DISABLE KEYS */;
INSERT INTO `stockcards_setting` (`id`, `name`, `provider`, `configs`, `balance`, `status`, `installed`) VALUES
	(22, 'Kho thẻ Stock', 'Stock', '[]', NULL, 1, 1),
	(23, 'Kho thẻ Vnptepay', 'Vnptepay', '{"ws_url":"http:\\/\\/itopup-test.megapay.net.vn:8086\\/CDV_Partner_Services\\/services\\/Interfaces?wsdl","partnerName":"partnerTest_PHP","partnerPassword":"123456abc","key_sofpin":"123456abc","timeout":"200"}', NULL, 1, 1);
/*!40000 ALTER TABLE `stockcards_setting` ENABLE KEYS */;

-- Dumping structure for table webthefull.stockcard_keyconnect
CREATE TABLE IF NOT EXISTS `stockcard_keyconnect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_sku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `stock_provider` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.stockcard_keyconnect: ~9 rows (approximately)
/*!40000 ALTER TABLE `stockcard_keyconnect` DISABLE KEYS */;
INSERT INTO `stockcard_keyconnect` (`id`, `product_sku`, `stock_provider`, `key`, `created_at`, `updated_at`) VALUES
	(5, 'VT20000', 'Stock', 'VT20000', '2018-08-19 16:35:49', '2018-08-19 16:35:49'),
	(6, 'VT50000', 'Stock', 'VT50000', '2018-08-19 16:35:50', '2018-08-19 16:35:57'),
	(7, 'VT100000', 'Stock', 'VT100000', '2018-08-19 16:36:01', '2018-08-19 16:36:01'),
	(8, 'VT200000', 'Stock', 'VT200000', '2018-08-19 16:36:03', '2018-08-19 16:36:03'),
	(9, 'VT20000', 'Vnptepay', 'VT20000', '2018-08-19 16:36:05', '2018-08-20 12:02:40'),
	(10, 'VT50000', 'Vnptepay', 'VIETTEL50000', '2018-08-19 16:36:14', '2018-08-19 16:36:19'),
	(11, 'VT100000', 'Vnptepay', 'VIETTEL100000', '2018-08-19 16:36:21', '2018-08-19 16:36:23'),
	(12, 'VT200000', 'Vnptepay', 'VIETTEL200000', '2018-08-19 16:36:24', '2018-08-19 16:36:26'),
	(13, 'VT2000048', 'Stock', '3242343', '2018-08-19 17:15:45', '2018-08-19 17:15:46');
/*!40000 ALTER TABLE `stockcard_keyconnect` ENABLE KEYS */;

-- Dumping structure for table webthefull.tags
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.tags: ~7 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `code`, `label`, `description`, `author`, `status`, `created_at`, `updated_at`) VALUES
	(10, 'samsung', 'Samsung', 'Samsung tivi', 'admin', 1, '2018-07-25 06:06:02', '2018-07-25 06:06:02'),
	(11, 'lg', 'LG', 'LG tivi', 'admin', 0, '2018-07-25 08:36:56', '2018-07-25 08:36:56'),
	(20, 'apple', 'apple', 'apple', 'admin', 1, '2018-07-26 17:54:56', '2018-07-26 17:54:56'),
	(21, 'lg-display', 'lg display', 'lg display', 'admin', 1, '2018-07-26 17:54:56', '2018-07-26 17:54:56'),
	(22, 'galaxy', 'Galaxy', 'Galaxy', 'admin', 1, '2018-07-26 18:05:27', '2018-07-26 18:05:27'),
	(23, 'galaxy-s8', 'galaxy s8', 'galaxy s8', 'admin', 1, '2018-07-26 18:05:27', '2018-07-26 18:05:27'),
	(26, 'new-tag-demo', 'New tag demo', 'New tag demo', 'admin', 1, '2018-07-26 21:27:57', '2018-07-26 21:27:57');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

-- Dumping structure for table webthefull.tags_items
CREATE TABLE IF NOT EXISTS `tags_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.tags_items: ~4 rows (approximately)
/*!40000 ALTER TABLE `tags_items` DISABLE KEYS */;
INSERT INTO `tags_items` (`id`, `tag_id`, `item_id`, `type`, `created_at`, `updated_at`) VALUES
	(25, 22, 8, '1', '2018-07-26 20:12:32', '2018-07-26 20:12:32'),
	(26, 23, 8, '1', '2018-07-26 20:12:32', '2018-07-26 20:12:32'),
	(27, 10, 8, '1', '2018-07-26 21:27:57', '2018-07-26 21:27:57'),
	(32, 26, 5, '1', '2018-07-26 21:43:00', '2018-07-26 21:43:00');
/*!40000 ALTER TABLE `tags_items` ENABLE KEYS */;

-- Dumping structure for table webthefull.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_code` varchar(20) NOT NULL,
  `order_code` varchar(20) NOT NULL,
  `module` varchar(255) NOT NULL,
  `order_type` varchar(255) NOT NULL COMMENT 'Deposit, Withdraw, Transfer, Refund',
  `paygate_code` varchar(255) NOT NULL,
  `net_amount` decimal(16,5) NOT NULL COMMENT 'Số tiền chưa thuế, phí',
  `fees` decimal(16,5) NOT NULL DEFAULT '0.00000',
  `pay_amount` decimal(16,5) NOT NULL,
  `currency_id` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `payer_id` varchar(255) NOT NULL,
  `payer_wallet` varchar(255) NOT NULL,
  `payer_info` text NOT NULL,
  `payee_id` varchar(255) NOT NULL,
  `payee_wallet` varchar(255) NOT NULL,
  `payee_info` text NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `admin_note` varchar(255) DEFAULT NULL,
  `checksum` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `creator` int(11) NOT NULL,
  `trans_ref` varchar(50) DEFAULT NULL,
  `ipaddress` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaction_code` (`transaction_code`),
  UNIQUE KEY `checksum` (`checksum`),
  UNIQUE KEY `order_id` (`order_code`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.transactions: ~20 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `transaction_code`, `order_code`, `module`, `order_type`, `paygate_code`, `net_amount`, `fees`, `pay_amount`, `currency_id`, `currency_code`, `payer_id`, `payer_wallet`, `payer_info`, `payee_id`, `payee_wallet`, `payee_info`, `description`, `admin_note`, `checksum`, `status`, `creator`, `trans_ref`, `ipaddress`, `created_at`, `updated_at`, `expired_at`) VALUES
	(229, 'T15346547093735', 'D153465470985614', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', '368946997f21d1317088c5858b81efe1', 'NONE', 1, '', '::1', '2018-08-19 11:58:29', '2018-08-19 11:58:29', NULL),
	(230, 'T15346547213295', 'D153465472134743', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', '85381e079ad70b378b93c145cfbb0537', 'NONE', 1, '', '::1', '2018-08-19 11:58:41', '2018-08-19 11:58:41', NULL),
	(231, 'T15346547361561', 'D153465473672327', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', '5cdfdf2e816c08574b01ca0b5964bac1', 'NONE', 1, '', '::1', '2018-08-19 11:58:56', '2018-08-19 11:58:56', NULL),
	(232, 'T15346548897001', 'D153465488986783', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', '303ae6e97217a567d1d872330d6f5903', 'NONE', 1, '', '::1', '2018-08-19 12:01:29', '2018-08-19 12:01:29', NULL),
	(233, 'T15346549005333', 'D153465490015409', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', '5467068654fe99de8a2f40068da7c3a1', 'NONE', 1, '', '::1', '2018-08-19 12:01:40', '2018-08-19 12:01:40', NULL),
	(234, 'T15346556134315', 'D153465561375079', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nap tien', '', 'e35d2143619fab634a2a0b6e4216f4be', 'NONE', 1, NULL, '::1', '2018-08-19 12:13:33', '2018-08-19 12:13:33', NULL),
	(235, 'T15346563759969', 'D153465637537969', 'DepositAdmin', 'Deposit', 'Wallet', 500000.00000, 0.00000, 500000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', NULL, '', '9fe3886e2ee44da8ec6e182ad4cf52ec', 'NONE', 1, NULL, '::1', '2018-08-19 12:26:15', '2018-08-19 12:26:15', NULL),
	(236, 'T153466114989379', 'D153466114994843', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', '342 da ds', '', '6fc4c2c6bce0878cd0f6f59f68bd93be', 'NONE', 1, NULL, '::1', '2018-08-19 13:45:49', '2018-08-19 13:45:49', NULL),
	(237, 'T153466202947591', 'D153466202976564', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Cộng 1 tr', '', 'c33975bb66a60f87db6abc5920c33970', 'NONE', 1, NULL, '::1', '2018-08-19 14:00:29', '2018-08-19 14:00:29', NULL),
	(238, 'T153466222155246', 'D153466222153128', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Cộng cho triệu', '', 'f96ca2134452363b0aff26e570f627f4', 'NONE', 1, NULL, '::1', '2018-08-19 14:03:41', '2018-08-19 14:03:41', NULL),
	(239, 'T153466227068522', 'D153466227067609', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Cộng cho triệu', '', '0b3ac84ce71675d145c7e66e720fce9e', 'Paid', 1, NULL, '::1', '2018-08-19 14:04:30', '2018-08-19 14:04:30', NULL),
	(240, 'T153466237741937', 'D153466237776018', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nạp cho triệu nữa', '', 'cdbd3e2af0e42808948a9d9152d5eef0', 'Paid', 1, NULL, '::1', '2018-08-19 14:06:18', '2018-08-19 14:06:18', NULL),
	(241, 'T153466329547220', 'D153466329594434', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nạp tiền', '', '809fe215e64777077aa92272be180edd', 'Paid', 1, NULL, '::1', '2018-08-19 14:21:35', '2018-08-19 14:21:35', NULL),
	(242, 'T153466350447215', 'D153466350447373', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Nạp thêm 1tr', '', '22d6cb9462f0bad44348d9a697aacc15', 'Paid', 1, NULL, '::1', '2018-08-19 14:25:06', '2018-08-19 14:25:06', NULL),
	(243, 'T153466416460777', 'D153466416497376', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '1', '0000000000', '', 'fr', '', '522fa528d28f92e9dc789266fccda10f', 'Paid', 1, NULL, '::1', '2018-08-19 14:36:08', '2018-08-19 14:36:08', NULL),
	(244, 'T153466508021279', 'D153466508034300', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'sssss', '', '1b4e110c9a9c4f897f14b07ab5b8d722', 'Paid', 1, NULL, '::1', '2018-08-19 14:51:24', '2018-08-19 14:51:24', NULL),
	(245, 'T153466789990903', 'D153466789916247', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Alo', '', 'cc958f7c4a8401a80132ea117eed83b7', 'Paid', 1, NULL, '::1', '2018-08-19 15:38:22', '2018-08-19 15:38:22', NULL),
	(246, 'T153466798114343', 'W153466798123326', 'WithdrawAdmin', 'Withdraw', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '16', '0083445479', '', '1', '0000000000', '', 'Rút tiền', '', 'a60f8180c97a805de59eca09215642d7', 'Paid', 1, NULL, '::1', '2018-08-19 15:39:44', '2018-08-19 15:39:44', NULL),
	(247, 'T153470047086135', 'D153470047021294', 'DepositAdmin', 'Deposit', 'Wallet', 1000000.00000, 0.00000, 1000000.00000, '1', 'VND', '1', '0000000000', '', '16', '0083445479', '', 'Thử 1tr', '', '37077059bba9def92a19f0af11ab8256', 'Paid', 1, NULL, '::1', '2018-08-20 00:41:14', '2018-08-20 00:41:14', NULL),
	(248, 'T153470052053329', 'D153470052035794', 'DepositAdmin', 'Deposit', 'Wallet', 1.00000, 0.00000, 1.00000, '2', 'USD', '1', '0043913192', '', '19', '0096993529', '', NULL, '', '7fa0d5a81dfde5c20d7f99c097e9cdc5', 'NONE', 1, NULL, '::1', '2018-08-20 00:42:00', '2018-08-20 00:42:00', NULL);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table webthefull.uploads
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL DEFAULT '1',
  `hash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `uploads_user_id_foreign` (`user_id`),
  CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table webthefull.uploads: ~7 rows (approximately)
/*!40000 ALTER TABLE `uploads` DISABLE KEYS */;
INSERT INTO `uploads` (`id`, `name`, `path`, `extension`, `caption`, `user_id`, `hash`, `public`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(1, '- Quản trị website (1).png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-060737-- Quản trị website (1).png', 'png', '', 1, '21wb6rqlu90fes5takba', 0, NULL, '2018-07-08 06:07:37', '2018-07-08 06:07:37'),
	(2, '- Quản trị website.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062446-- Quản trị website.png', 'png', '', 1, 'ocksjtcib59vdkqz5mfb', 0, NULL, '2018-07-08 06:24:46', '2018-07-08 06:24:46'),
	(3, 'quantri.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062529-quantri.png', 'png', '', 1, 'uml7g5iehdbsaao4afp0', 0, NULL, '2018-07-08 06:25:29', '2018-07-08 06:25:29'),
	(4, 'Flix.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062920-Flix (1).png', 'png', 'Flix', 1, 'lqdgu9jnd8jxtlxulufe', 0, NULL, '2018-07-08 06:29:20', '2018-07-26 10:26:26'),
	(5, 'tải xuống.jpg', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062936-tải xuống.jpg', 'jpg', 'dsadas', 1, 'edpvbwtg7lga2p4ll19g', 0, NULL, '2018-07-08 06:29:36', '2018-07-08 09:11:18'),
	(6, 'dangnhap.pdf', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-095216-dangnhap.pdf', 'pdf', '', 1, '2kemiy7lq8kz6qvhnsqk', 0, '2018-07-18 22:03:11', '2018-07-08 09:52:16', '2018-07-18 22:03:11'),
	(7, '- Quản trị website (1) (1).png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-102440-- Quản trị website (1) (1).png', 'png', '', 1, 'rsbl8ors6kr7o9r3x9sf', 0, NULL, '2018-07-08 10:24:40', '2018-07-08 10:24:40');
/*!40000 ALTER TABLE `uploads` ENABLE KEYS */;

-- Dumping structure for table webthefull.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group` int(11) DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.users: ~8 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `gender`, `group`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Nguyen Neo', 'admin@localhost.com', '0943793984', 'male', 4, '$2y$10$NU6Ga/zsVoj1a/YbFyIIOulR27bdBymgX3xjsCZbDdeuaUaTwUN4e', '3D60JvUhiOod1RID2ebUqkoXeYqToOIYNXjNjoMQWMO2EZ475B1ShievAWW2', 1, '2018-06-21 16:27:42', '2018-08-19 09:00:46'),
	(2, 'duong', 'Duong Tuong Quan', 'duong@localhost.com', '234546', 'male', 4, '$2y$10$RIJOBJ3oBMooZ0JI6QLWw.00QSlOv5GMQP/9hK0YutpFJTpHOLsgi', 'lIRYcA4rRNQ8RfZaQ5eem4FQyFL9kFkWuJF5SUz29ZTpHoHPDCziwF2gjcFM', 1, '2018-06-23 14:22:42', '2018-07-01 01:36:04'),
	(16, 'tester', 'Pham Quynh Anh', 'quynhanh@gmail.com', '0988756895', 'female', 5, '$2y$10$dl5injCnkdrKZjeNt3qJRebm1KRxYg8TMma6OT8eVdpv375tzxrqm', NULL, 1, '2018-08-10 17:12:54', '2018-08-19 09:02:32'),
	(17, NULL, 'Nguyen Van Nghia', 'hotronet@gmail.com', NULL, NULL, 4, '$2y$10$RLQOLyM/zoGuxBoyxBy0..twTFJlvgEJBsbjCb8nfIZfHMqn.8zDG', 'jkWtQkCzR68vriZsYXfu8FSeAAQuinbunSB5Fr358lXeSBNzmkSkc2PWaCPi', 0, '2018-08-19 22:56:35', '2018-08-19 22:56:35'),
	(18, NULL, 'Bia_GT', 'hotronet1@gmail.com', NULL, NULL, 4, '$2y$10$YQvfURzsz.TffqjIf5KlNOE5GgGjBrYXShKrBjnygN0vvWkMswugK', 's53LL4AyEEOsOF8ixF5GYG2H8uyPOeyWlA2pgi0RuNZ2tHatbrmfCHxqqDsE', 0, '2018-08-19 23:41:59', '2018-08-19 23:41:59'),
	(19, NULL, 'Theviethan', 'hotronet2@gmail.com', NULL, NULL, 4, '$2y$10$9l3ZnsCjpMGXyztGdiibH.SZnVF8Iw/j6LL44Nhfa2xAlULCRcTFO', '2TACymXAz9DJCuXICPuRAz3RgkfE7lRz4DsI8ViwqjywuSGYhZXYRyON2dBD', 0, '2018-08-19 23:44:04', '2018-08-19 23:44:04'),
	(20, NULL, 'Bia_GT2', 'hotronet3@gmail.com', NULL, NULL, 4, '$2y$10$5UZnMe6SiB.1rT.QgxPG0OQ6tNr561B.F8WHwWQAZyktcwPez3RuG', 'cukGsKQNvudav85EBmL3UVmRTYV7bq3ZQKY5G6MGPWNoKq9xo2dtMajAskOM', 0, '2018-08-19 23:58:00', '2018-08-19 23:58:00'),
	(21, NULL, 'Nguyen Van Nghiaư', 'hotronet5@gmail.com', NULL, NULL, 4, '$2y$10$G4coBF1qT6B9db6/Ab430.dEF4w1hoYU/x5fe9URzQTf5sxeLWpw6', NULL, 0, '2018-08-20 00:15:32', '2018-08-20 00:15:32');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table webthefull.wallets
CREATE TABLE IF NOT EXISTS `wallets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(15) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `user` int(11) NOT NULL,
  `balance` text,
  `balance_decode` decimal(16,5) unsigned NOT NULL,
  `pending_balance` decimal(16,5) unsigned NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `checksum` (`checksum`),
  UNIQUE KEY `number` (`number`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.wallets: ~9 rows (approximately)
/*!40000 ALTER TABLE `wallets` DISABLE KEYS */;
INSERT INTO `wallets` (`id`, `number`, `currency_id`, `currency_code`, `user`, `balance`, `balance_decode`, `pending_balance`, `checksum`, `status`, `created_at`, `updated_at`) VALUES
	(1, '0000000000', 1, 'VND', 1, 'eyJpdiI6IkJTMDVSREFYT2NtSGN4VFJQY3FmK1E9PSIsInZhbHVlIjoidE5iVDZvTnBGQlZXKzBQdHlXQ1ZFZz09IiwibWFjIjoiZDM4MWFhODdiNzU1MzVkNWQyNjFjODg4ZTVhNzQxM2M3NGE2NWRhYjlhMDE3NjIyYjkwODkxNzI4Yzk1M2U5MSJ9', 9994000000.00000, 0.00000, '8cf0a3405bcd8ec543e18859f8327b89', 1, '2018-08-20 00:41:14', '2018-08-19 12:51:08'),
	(23, '0083445479', 1, 'VND', 16, 'eyJpdiI6IlkrUFdEdmRqbFVNcU5LMHlhdm1PK1E9PSIsInZhbHVlIjoiejB0MFNTbGdaM2RoSXQxXC9jUWpvM1E9PSIsIm1hYyI6ImYzMjc1NjYyYzU5ZWZkMTBlZWU0MzE4ZDIxNDZjMzZmYzMxZGMzMmU0OWRmNzkzNTZmNWVlY2EzNDFmMmJlMWQifQ==', 6000000.00000, 0.00000, '2cb7b2ab73af0318f925b70ef6901541', 1, '2018-08-20 00:41:14', '2018-08-19 09:49:13'),
	(24, '0059144286', 1, 'VND', 19, 'eyJpdiI6IlE2ODFiRjdvYWN3djh3Wjl3WElXQmc9PSIsInZhbHVlIjoiam03OTZBeVFWTHM4Slg0V1A1VFwvdWc9PSIsIm1hYyI6IjczOGUyOGUwZGEyM2FjMTJhN2MzZTBiZjAyYWI1ZDdiMDI3NGEyOTQzMjEyYTZlZjlkODUxMGNkOTc3MjU4NzUifQ==', 0.00000, 0.00000, 'a20867ba007ec6c91889c6f834e70a26', 1, '2018-08-19 23:44:04', '2018-08-19 23:44:04'),
	(25, '0055784321', 1, 'VND', 20, 'eyJpdiI6Ik1LY2hRTkYrbVZyUU9QTm1jcytXaUE9PSIsInZhbHVlIjoiNHVTcDZqQ0pmQ29lOUtIclo5MVpOdz09IiwibWFjIjoiMTMxMWUyOTE0NTBiMDBiZjhmMzg1ZmI0MGJjZTQwYjVkN2VhYTQ0YjBkNTVkY2UxODFjYWQ4Y2M4YzM4ZjI5YSJ9', 0.00000, 0.00000, '2591b7e438c97879076bc627117f8297', 1, '2018-08-19 23:58:00', '2018-08-19 23:58:00'),
	(26, '0028885600', 2, 'USD', 20, 'eyJpdiI6InJXR2J6NUhhbVFuQlJwUWVlaWZLTFE9PSIsInZhbHVlIjoiZEt4VzZ3V2JoU1l1bXo0ang3N2pVQT09IiwibWFjIjoiODJkMzUxMWQxZDg5Y2IxNDllYWQxNDk3MTg3MGMzNzYxZTY2ZWY1OGMzMDY5Y2ZhMGY4YmFlYTA4MTU2OWNmNyJ9', 0.00000, 0.00000, '177935b5f3b65aee4bcda9680fffdc90', 1, '2018-08-19 23:58:00', '2018-08-19 23:58:00'),
	(27, '0047296040', 1, 'VND', 21, 'eyJpdiI6ImdZN0FsaDJNNEw2K0VMUVRtcG9zSlE9PSIsInZhbHVlIjoiRU15M2Y1dDR6VkViMFwvVUp4V0dVVmc9PSIsIm1hYyI6IjViOTRiMWYyNmQ1YjJhNzU0N2I1NGMyOGUyY2I3ZDllNzY3YzBjZTRkOWM1ZTkyOWEzNTI1MTAwODM1ZTM0YTYifQ==', 0.00000, 0.00000, 'c7b8bdd126fb32abdf82b379aebea2e4', 1, '2018-08-20 00:15:32', '2018-08-20 00:15:32'),
	(28, '0024391554', 2, 'USD', 21, 'eyJpdiI6IkhvUEVDcG9Kcmh3TE5FSlowYmJKTmc9PSIsInZhbHVlIjoibExjVVl0aGN6bkl4eUw2cHJyNFRaQT09IiwibWFjIjoiNjY4Y2Y3ZmVmY2QxNTJlODA0OThkMWNjMTA2ZmM5NWI4ZDljMWQ4Y2VhZDgxZDdhYmMwNWVlMmJlNzZlYjM2NSJ9', 0.00000, 0.00000, '151546179842e558d20e5bdaaa701c2a', 1, '2018-08-20 00:15:32', '2018-08-20 00:15:32'),
	(29, '0043913192', 2, 'USD', 1, 'eyJpdiI6IjBabkUxc1RCWUI5YlJyZUpjTFRaQ1E9PSIsInZhbHVlIjoiZTNVb00ySXJtcVVhbXFMMkl2WE9MUT09IiwibWFjIjoiYTVkOTQ0MDU1ZWEyODNlOWVlNWZkNTA0NjAxMjIxZDQxZTA5MGJmYWJiY2I2YjdhZTNjYzE2NDlhMGQxZDI0NiJ9', 0.00000, 0.00000, '24c4423f75fdbecc4d53b64652d9f1dc', 1, '2018-08-20 00:19:07', '2018-08-20 00:19:07'),
	(32, '0096993529', 2, 'USD', 19, 'eyJpdiI6IkdhNldqdW1vQ3hBejFlSUJidVpnMVE9PSIsInZhbHVlIjoiZmFnYlJLV1JTRUJiZ3ZJb3lEZVpsZz09IiwibWFjIjoiZmM4ZGFkMWM3YmJmZmVlODU2NjNkNTMzOGY5ZTcwYjZiZjQxZDQ3ZDFhNmI5YjJkNjQ0NTk1NDg0MjUyYzU2NCJ9', 0.00000, 0.00000, 'fdc6269169c3325314923dcd8ad249fa', 1, '2018-08-20 00:26:24', '2018-08-20 00:26:24');
/*!40000 ALTER TABLE `wallets` ENABLE KEYS */;

-- Dumping structure for table webthefull.wallet_fees
CREATE TABLE IF NOT EXISTS `wallet_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paygate_code` varchar(50) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `fixed_fees` float NOT NULL DEFAULT '0',
  `percent_fees` float NOT NULL DEFAULT '0',
  `min` float NOT NULL DEFAULT '0',
  `max` float NOT NULL DEFAULT '0',
  `delivery_limit` float NOT NULL DEFAULT '0',
  `allow` tinyint(3) unsigned zerofill NOT NULL DEFAULT '000',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.wallet_fees: ~2 rows (approximately)
/*!40000 ALTER TABLE `wallet_fees` DISABLE KEYS */;
INSERT INTO `wallet_fees` (`id`, `paygate_code`, `group`, `fixed_fees`, `percent_fees`, `min`, `max`, `delivery_limit`, `allow`) VALUES
	(1, 'WALLET', 5, 0, 0, 0, 0, 0, 000),
	(2, 'WALLET', 4, 1, 2, 4, 6, 8, 000);
/*!40000 ALTER TABLE `wallet_fees` ENABLE KEYS */;

-- Dumping structure for table webthefull.wallet_history
CREATE TABLE IF NOT EXISTS `wallet_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `wallet_number` varchar(20) NOT NULL,
  `net_amount` decimal(16,5) NOT NULL,
  `fees` decimal(16,5) NOT NULL,
  `pay_amount` decimal(16,5) NOT NULL,
  `before_balance` decimal(16,5) NOT NULL,
  `before_balance_checksum` varchar(100) NOT NULL,
  `after_balance` decimal(16,5) NOT NULL,
  `after_balance_checksum` varchar(100) NOT NULL,
  `checksum` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `operation` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=249 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.wallet_history: ~20 rows (approximately)
/*!40000 ALTER TABLE `wallet_history` DISABLE KEYS */;
INSERT INTO `wallet_history` (`id`, `user_id`, `transaction_code`, `wallet_number`, `net_amount`, `fees`, `pay_amount`, `before_balance`, `before_balance_checksum`, `after_balance`, `after_balance_checksum`, `checksum`, `description`, `currency_id`, `currency_code`, `operation`, `created_at`, `updated_at`) VALUES
	(229, 1, 'T153466202947591', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 10000000000.00000, '9d07e8167c29500ea589c3989e70f8bd', 9999000000.00000, '0a53bd1101fd0ea72e2786d5222be3ea', '705526d3ae1a71baa18478cd06df82c1', 'Cộng 1 tr', 1, 'VND', '-', '2018-08-19 14:00:29', '2018-08-19 14:00:29'),
	(230, 1, 'T153466222155246', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 10000000000.00000, '9d07e8167c29500ea589c3989e70f8bd', 9999000000.00000, '0a53bd1101fd0ea72e2786d5222be3ea', '3f819aea9f9effc1f7dd79f2b084c088', 'Cộng cho triệu', 1, 'VND', '-', '2018-08-19 14:03:41', '2018-08-19 14:03:41'),
	(231, 1, 'T153466227068522', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 10000000000.00000, '9d07e8167c29500ea589c3989e70f8bd', 9999000000.00000, '0a53bd1101fd0ea72e2786d5222be3ea', '5f67637211f3195813e6abf6f7cd15e5', 'Cộng cho triệu', 1, 'VND', '-', '2018-08-19 14:04:30', '2018-08-19 14:04:30'),
	(232, 16, 'T153466227068522', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 0.00000, 'dad766539f83740f537075b76b9e4208', 1000000.00000, '29aeb6c23ec640ecc77939f1b9a7d403', '4eb38d041944bbbbc748782bbb8963da', 'Cộng cho triệu', 1, 'VND', '+', '2018-08-19 14:04:30', '2018-08-19 14:04:30'),
	(233, 1, 'T153466237741937', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9999000000.00000, '0a53bd1101fd0ea72e2786d5222be3ea', 9998000000.00000, '7b16cac2d3bc278f4331ceb05293354b', '462cf7a2f8e847f42b253d6e957e1ded', 'Nạp cho triệu nữa', 1, 'VND', '-', '2018-08-19 14:06:18', '2018-08-19 14:06:18'),
	(234, 16, 'T153466237741937', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1000000.00000, '29aeb6c23ec640ecc77939f1b9a7d403', 2000000.00000, '0f80d20312787eb91f5aded5d7261478', '62aa2cb532f626b6aaf1a5aad4ca1107', 'Nạp cho triệu nữa', 1, 'VND', '+', '2018-08-19 14:06:18', '2018-08-19 14:06:18'),
	(235, 1, 'T153466329547220', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9998000000.00000, '7b16cac2d3bc278f4331ceb05293354b', 9997000000.00000, 'ab985c773f7b9674d1bf2e7fefac6502', '13a28717ce390b03f347cccf125a6ab3', 'Nạp tiền', 1, 'VND', '-', '2018-08-19 14:21:35', '2018-08-19 14:21:35'),
	(236, 16, 'T153466329547220', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 2000000.00000, '0f80d20312787eb91f5aded5d7261478', 3000000.00000, '3b6d29303a17c18d9f683683cdfbc092', '8143de1a0ec3a730b62d6c961af6067a', 'Nạp tiền', 1, 'VND', '+', '2018-08-19 14:21:35', '2018-08-19 14:21:35'),
	(237, 1, 'T153466350447215', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9997000000.00000, 'ab985c773f7b9674d1bf2e7fefac6502', 9996000000.00000, 'a9597e051496f30a66d85b29ff88a6fe', '6c64c9b54f4b257bb7fe9e14bea7b1b2', 'Nạp thêm 1tr', 1, 'VND', '-', '2018-08-19 14:25:06', '2018-08-19 14:25:06'),
	(238, 16, 'T153466350447215', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 3000000.00000, '3b6d29303a17c18d9f683683cdfbc092', 4000000.00000, '9c920a02a225488d82484189f99e7819', '352cf383c5bf9415d89f0c73b0fb672b', 'Nạp thêm 1tr', 1, 'VND', '+', '2018-08-19 14:25:06', '2018-08-19 14:25:06'),
	(239, 1, 'T153466416460777', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9996000000.00000, 'a9597e051496f30a66d85b29ff88a6fe', 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', '18f277bef4aff6f77a3c44ed959d3b9b', 'fr', 1, 'VND', '-', '2018-08-19 14:36:08', '2018-08-19 14:36:08'),
	(240, 1, 'T153466416460777', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', 9996000000.00000, 'a9597e051496f30a66d85b29ff88a6fe', '408716f0ba32a949953d2e3ce9a670a3', 'fr', 1, 'VND', '+', '2018-08-19 14:36:08', '2018-08-19 14:36:08'),
	(241, 1, 'T153466508021279', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9996000000.00000, 'a9597e051496f30a66d85b29ff88a6fe', 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', '6233e26af264616511f9ad7336320eef', 'sssss', 1, 'VND', '-', '2018-08-19 14:51:24', '2018-08-19 14:51:24'),
	(242, 16, 'T153466508021279', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 4000000.00000, '9c920a02a225488d82484189f99e7819', 5000000.00000, '090b8f19e20561b04bde61a1b0cbb5b6', '19ad9f5a3700feca8191749e8715dec3', 'sssss', 1, 'VND', '+', '2018-08-19 14:51:24', '2018-08-19 14:51:24'),
	(243, 1, 'T153466789990903', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', 9994000000.00000, 'f0c1ab0ec03ab5c3468d2e79d763ffe9', 'd77178bbeb661cabbbd7c2c04305fc7c', 'Alo', 1, 'VND', '-', '2018-08-19 15:38:22', '2018-08-19 15:38:22'),
	(244, 16, 'T153466789990903', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 5000000.00000, '090b8f19e20561b04bde61a1b0cbb5b6', 6000000.00000, '3a74e59d78e7e8b96205124070bf8fb3', '3b31b164f5996397ff0b8d1edb1b67f5', 'Alo', 1, 'VND', '+', '2018-08-19 15:38:22', '2018-08-19 15:38:22'),
	(245, 16, 'T153466798114343', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 6000000.00000, '3a74e59d78e7e8b96205124070bf8fb3', 5000000.00000, '090b8f19e20561b04bde61a1b0cbb5b6', '048ff59415fdbaf6b3d060620d86b376', 'Rút tiền', 1, 'VND', '-', '2018-08-19 15:39:44', '2018-08-19 15:39:44'),
	(246, 1, 'T153466798114343', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9994000000.00000, 'f0c1ab0ec03ab5c3468d2e79d763ffe9', 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', '2ff2fae2c06f27c10a688a997356c6d7', 'Rút tiền', 1, 'VND', '+', '2018-08-19 15:39:44', '2018-08-19 15:39:44'),
	(247, 1, 'T153470047086135', '0000000000', 1000000.00000, 0.00000, 1000000.00000, 9995000000.00000, '8a955897732b12b14b11ef55b1b72af1', 9994000000.00000, 'f0c1ab0ec03ab5c3468d2e79d763ffe9', 'bddfe88b6c09cd70bff05ac412f9e323', 'Thử 1tr', 1, 'VND', '-', '2018-08-20 00:41:14', '2018-08-20 00:41:14'),
	(248, 16, 'T153470047086135', '0083445479', 1000000.00000, 0.00000, 1000000.00000, 5000000.00000, '090b8f19e20561b04bde61a1b0cbb5b6', 6000000.00000, '3a74e59d78e7e8b96205124070bf8fb3', '3a40364342125d941cc31046bfc3fd1f', 'Thử 1tr', 1, 'VND', '+', '2018-08-20 00:41:14', '2018-08-20 00:41:14');
/*!40000 ALTER TABLE `wallet_history` ENABLE KEYS */;

-- Dumping structure for table webthefull.wallet_order
CREATE TABLE IF NOT EXISTS `wallet_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Deposit',
  `order_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` int(11) NOT NULL,
  `payer_wallet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payee_id` int(11) NOT NULL,
  `payee_wallet` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Ví nhận tiền',
  `net_amount` decimal(16,5) NOT NULL,
  `fees` decimal(16,5) NOT NULL,
  `pay_amount` decimal(16,5) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paygate_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cổng user dùng để trả tiền',
  `transaction_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `bankinfo` text COLLATE utf8_unicode_ci,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `creator` int(11) NOT NULL,
  `ipaddress` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `payment` int(11) DEFAULT '0',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_code` (`order_code`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Nạp rút tiền từ ví';

-- Dumping data for table webthefull.wallet_order: ~20 rows (approximately)
/*!40000 ALTER TABLE `wallet_order` DISABLE KEYS */;
INSERT INTO `wallet_order` (`id`, `order_type`, `order_code`, `payer_id`, `payer_wallet`, `payee_id`, `payee_wallet`, `net_amount`, `fees`, `pay_amount`, `currency_id`, `currency_code`, `paygate_code`, `transaction_code`, `description`, `bankinfo`, `status`, `creator`, `ipaddress`, `created_at`, `payment`, `updated_at`) VALUES
	(10, 'Deposit', 'D153465470985614', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 11:58:29', 0, '2018-08-19 11:58:29'),
	(11, 'Deposit', 'D153465472134743', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 11:58:41', 0, '2018-08-19 11:58:41'),
	(12, 'Deposit', 'D153465473672327', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 11:58:56', 0, '2018-08-19 11:58:56'),
	(13, 'Deposit', 'D153465488986783', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 12:01:29', 0, '2018-08-19 12:01:29'),
	(14, 'Deposit', 'D153465490015409', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 12:01:40', 0, '2018-08-19 12:01:40'),
	(15, 'Deposit', 'D153465561375079', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nap tien', NULL, 'NONE', 1, '::1', '2018-08-19 12:13:33', 0, '2018-08-19 12:13:33'),
	(16, 'Deposit', 'D153465637537969', 1, '0000000000', 16, '0083445479', 500000.00000, 0.00000, 500000.00000, 1, 'VND', 'Wallet', '', NULL, NULL, 'NONE', 1, '::1', '2018-08-19 12:26:15', 0, '2018-08-19 12:26:15'),
	(17, 'Deposit', 'D153466114994843', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', '342 da ds', NULL, 'NONE', 1, '::1', '2018-08-19 13:45:49', 0, '2018-08-19 13:45:49'),
	(18, 'Deposit', 'D153466202976564', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Cộng 1 tr', NULL, 'NONE', 1, '::1', '2018-08-19 14:00:29', 0, '2018-08-19 14:00:29'),
	(19, 'Deposit', 'D153466222153128', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Cộng cho triệu', NULL, 'NONE', 1, '::1', '2018-08-19 14:03:41', 0, '2018-08-19 14:03:41'),
	(20, 'Deposit', 'D153466227067609', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Cộng cho triệu', NULL, 'NONE', 1, '::1', '2018-08-19 14:04:30', 0, '2018-08-19 14:04:30'),
	(21, 'Deposit', 'D153466237776018', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nạp cho triệu nữa', NULL, 'NONE', 1, '::1', '2018-08-19 14:06:17', 0, '2018-08-19 14:06:17'),
	(22, 'Deposit', 'D153466329594434', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nạp tiền', NULL, 'Hoàn thành', 1, '::1', '2018-08-19 14:21:35', 1, '2018-08-19 14:21:35'),
	(23, 'Deposit', 'D153466350447373', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Nạp thêm 1tr', NULL, 'Hoàn thành', 1, '::1', '2018-08-19 14:25:06', 1, '2018-08-19 14:25:06'),
	(24, 'Deposit', 'D153466416497376', 1, '0000000000', 1, '0000000000', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'fr', NULL, 'Hoàn thành', 1, '::1', '2018-08-19 14:36:08', 1, '2018-08-19 14:36:08'),
	(25, 'Deposit', 'D153466508034300', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'sssss', NULL, 'Hoàn thành', 1, '::1', '2018-08-19 14:51:24', 1, '2018-08-19 14:51:24'),
	(26, 'Deposit', 'D153466789916247', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Alo', '', 'Hoàn thành', 1, '::1', '2018-08-19 15:38:22', 1, '2018-08-19 15:38:22'),
	(27, 'Withdraw', 'W153466798123326', 16, '0083445479', 1, '0000000000', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Rút tiền', '', 'Hoàn thành', 1, '::1', '2018-08-19 15:39:44', 1, '2018-08-19 15:39:44'),
	(28, 'Deposit', 'D153470047021294', 1, '0000000000', 16, '0083445479', 1000000.00000, 0.00000, 1000000.00000, 1, 'VND', 'Wallet', '', 'Thử 1tr', '', 'Hoàn thành', 1, '::1', '2018-08-20 00:41:14', 1, '2018-08-20 00:41:14'),
	(29, 'Deposit', 'D153470052035794', 1, '0043913192', 19, '0096993529', 1.00000, 0.00000, 1.00000, 2, 'USD', 'Wallet', '', NULL, '', 'None', 1, '::1', '2018-08-20 00:42:00', 0, '2018-08-20 00:42:00');
/*!40000 ALTER TABLE `wallet_order` ENABLE KEYS */;

-- Dumping structure for table webthefull.wallet_settings
CREATE TABLE IF NOT EXISTS `wallet_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(10) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `currency_code` (`currency_code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Dumping data for table webthefull.wallet_settings: ~2 rows (approximately)
/*!40000 ALTER TABLE `wallet_settings` DISABLE KEYS */;
INSERT INTO `wallet_settings` (`id`, `currency_id`, `currency_code`, `description`) VALUES
	(1, 1, 'VND', 'Ví VND'),
	(2, 2, 'USD', 'Ví USD');
/*!40000 ALTER TABLE `wallet_settings` ENABLE KEYS */;

-- Dumping structure for table webthefull.weblinks
CREATE TABLE IF NOT EXISTS `weblinks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table webthefull.weblinks: ~0 rows (approximately)
/*!40000 ALTER TABLE `weblinks` DISABLE KEYS */;
/*!40000 ALTER TABLE `weblinks` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
