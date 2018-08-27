-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 27, 2018 at 07:54 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webthe`
--

-- --------------------------------------------------------

--
-- Table structure for table `autochargings`
--

CREATE TABLE `autochargings` (
  `id` int(50) NOT NULL,
  `user` int(50) NOT NULL,
  `user_info` varchar(150) DEFAULT NULL,
  `code` varchar(50) NOT NULL COMMENT 'Mã nạp',
  `serial` varchar(50) DEFAULT NULL COMMENT 'Serial',
  `telco` varchar(50) NOT NULL COMMENT 'Nhà mạng',
  `value` double DEFAULT NULL COMMENT 'Mệnh giá khách khai báo',
  `fees` double DEFAULT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `autochargings`
--

INSERT INTO `autochargings` (`id`, `user`, `user_info`, `code`, `serial`, `telco`, `value`, `fees`, `amount`, `currency_code`, `type`, `error_code`, `error_message`, `charge_check`, `checksum`, `status`, `api_provider`, `request_id`, `order`, `description`, `admin_note`, `transaction_code`, `created_at`, `updated_at`) VALUES
(6, 1, 'admin', '1989283774', 'KK834677PLO', 'LongNguyen', NULL, NULL, 50000, 'VND', 'Charging', '', '', 0, '606c459ef5deb129c9da0729d9443598', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-21 06:58:30', '2018-08-21 06:58:30'),
(7, 1, 'admin', '2265412432', 'UII3247264322', 'VIETTEL', NULL, NULL, 100000, 'VND', 'Charging', '', '', 0, '679bde7e20de386318256ec76f4cd335', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-21 06:58:30', '2018-08-21 06:58:30'),
(8, 1, 'admin', '11234198709', 'hsdgfuibejkbsdiuf', 'VINA', NULL, NULL, 10000, 'VND', 'Charging', '', '', 0, 'a0fd4bbc3034e44b9578d8aa085e4c23', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-21 07:06:21', '2018-08-21 07:06:21'),
(9, 1, 'admin', '432423423', '4234234234', 'LongNguyen', NULL, NULL, 10000, 'VND', 'Charging', '', '', 0, 'de9e97bf4d0dbed35b6a75808d0d01aa', 0, 'WEB', '', NULL, '', '', NULL, '2018-08-21 07:06:30', '2018-08-21 07:06:30');

-- --------------------------------------------------------

--
-- Table structure for table `autochargings_cards`
--

CREATE TABLE `autochargings_cards` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `discount_manual` double NOT NULL,
  `discount_api` double NOT NULL,
  `available_values` varchar(255) NOT NULL COMMENT 'Lưu dạng: 10000,20000,30000,50000',
  `currency_code` varchar(5) NOT NULL DEFAULT 'VND',
  `status` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `autochargings_fees`
--

CREATE TABLE `autochargings_fees` (
  `id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `penalty` float DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `telco_key` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `autochargings_setting`
--

CREATE TABLE `autochargings_setting` (
  `id` int(11) NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_keywords` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `autochargings_setting`
--

INSERT INTO `autochargings_setting` (`id`, `meta_title`, `meta_description`, `meta_keywords`, `page_title`, `description`, `updated_at`) VALUES
(1, 'Web The', 'Doi the', 'webthe', 'TẨY THẺ NHANH', 'Chú ý: Nạp chậm là hình thức khách hàng đưa yêu cầu nạp lên website, chúng tôi sẽ tìm thời điểm khuyến mãi tốt nhất để nạp. Chiết khấu chậm là 20%. Khi quý khách nạp 100k sẽ chỉ phải thanh toán 80k. Thời gian nạp sẽ từ 30 phút đến 1 tiếng. Quý khách có thể hủy nạp nếu không muốn đợi lâu.', '2018-08-21 10:13:07');

-- --------------------------------------------------------

--
-- Table structure for table `autochargings_telco`
--

CREATE TABLE `autochargings_telco` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `value` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autochargings_telco`
--

INSERT INTO `autochargings_telco` (`id`, `name`, `key`, `icon`, `description`, `status`, `value`, `created_at`, `updated_at`) VALUES
(2, 'MOBIFONE', 'LongNguyen', 'mobifone.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 1, '10000,50000,100000,150000,200000,300000,500000', '2018-08-20 10:20:37', '2018-08-21 06:55:36'),
(6, 'VIETTEL', 'VIETTEL', 'viettel.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 1, '10000,50000,100000,150000,300000,500000', '2018-08-21 06:44:43', '2018-08-21 06:55:17'),
(7, 'VINAPHONE', 'VINA', 'vina.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book', 1, '10000,50000,100000,150000,500000', '2018-08-21 06:47:08', '2018-08-21 06:54:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autochargings`
--
ALTER TABLE `autochargings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autochargings_cards`
--
ALTER TABLE `autochargings_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autochargings_fees`
--
ALTER TABLE `autochargings_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autochargings_setting`
--
ALTER TABLE `autochargings_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autochargings_telco`
--
ALTER TABLE `autochargings_telco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autochargings`
--
ALTER TABLE `autochargings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `autochargings_cards`
--
ALTER TABLE `autochargings_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autochargings_fees`
--
ALTER TABLE `autochargings_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autochargings_setting`
--
ALTER TABLE `autochargings_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `autochargings_telco`
--
ALTER TABLE `autochargings_telco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
