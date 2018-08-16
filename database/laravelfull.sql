-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 15, 2018 lúc 07:15 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravelfull`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `catalogs`
--

CREATE TABLE `catalogs` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `public` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `url`, `description`, `public`, `created_at`, `updated_at`) VALUES
(4, 'dasdsa', 'dsadas1', 'dsadsa', 1, '2018-07-13 04:30:14', '2018-07-13 04:54:18'),
(5, 'dasdas', 'dsadsa', 'dasdsa', 1, '2018-07-13 04:30:21', '2018-07-13 04:30:21'),
(6, 'fdsafds', 'afdasfds', 'fdsafdsa', 1, '2018-07-13 04:34:08', '2018-07-18 14:24:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `url_key`, `description`, `parent_id`, `sort_order`, `level`, `children_count`, `custom_layout`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Thẻ điện thoại', 'mobile-card', 'Thẻ điện thoại viettel, thẻ điện thoại mobile, thẻ điện thoại vina...', 0, NULL, 1, 3, NULL, 1, '2018-08-06 20:16:41', '2018-08-06 20:24:39'),
(2, 'Thẻ viettel', 'mobile-card/viettel', 'Thẻ điện thoại viettel 10k.\r\nThẻ điện thoại viettel 20k.\r\nThẻ điện thoại viettel 50k.\r\nThẻ điện thoại viettel 100k.', 1, 2, 2, 2, NULL, 1, '2018-08-06 20:20:19', '2018-08-06 20:26:02'),
(3, 'Thẻ mobile', 'mobile-card/mobile', 'Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.\r\n Thẻ điện thoại mobile 50k.', 1, NULL, 2, 0, NULL, 0, '2018-08-06 20:21:07', '2018-08-06 20:22:12'),
(4, 'Thẻ vina', 'mobile-card/vina', 'Thẻ điện thoại vinaphone 10k.\r\n Thẻ điện thoại vinaphone 20k.\r\n Thẻ điện thoại vinaphone 50k.\r\n Thẻ điện thoại vinaphone 100k.', 1, 1, 2, 0, NULL, 1, '2018-08-06 20:22:08', '2018-08-06 20:22:12'),
(5, 'Thẻ viettel 10k.', 'mobile-card/viettel-10', NULL, 2, NULL, 3, 0, NULL, 1, '2018-08-06 20:25:19', '2018-08-06 20:26:02'),
(6, 'Thẻ viettel 20k.', 'mobile-card/viettel-20', NULL, 2, NULL, 3, 0, NULL, 1, '2018-08-06 20:25:49', '2018-08-06 20:26:02'),
(7, 'Thẻ game', 'game-card', 'Thẻ game. VNG, VTC,...', 0, NULL, 1, 1, NULL, 1, '2018-08-06 20:26:38', '2018-08-06 20:30:05'),
(8, 'Thẻ Vinagame', 'game-card/vinagame', NULL, 7, NULL, 1, 0, NULL, 1, '2018-08-06 20:27:06', '2018-08-06 20:30:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_product`
--

CREATE TABLE `category_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_product`
--

INSERT INTO `category_product` (`id`, `category_id`, `product_id`, `product_type`, `sort_order`, `created_at`, `updated_at`) VALUES
(7, 1, 23, 'softcard', NULL, '2018-08-10 07:50:45', '2018-08-10 07:50:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chargings`
--

CREATE TABLE `chargings` (
  `id` int(50) NOT NULL,
  `user` int(50) NOT NULL,
  `user_info` varchar(150) DEFAULT NULL,
  `code` varchar(50) NOT NULL COMMENT 'Mã nạp',
  `serial` varchar(50) DEFAULT NULL COMMENT 'Serial',
  `telco` varchar(50) NOT NULL COMMENT 'Nhà mạng',
  `declared_value` double DEFAULT '0' COMMENT 'Mệnh giá khách khai báo',
  `real_value` double DEFAULT '0' COMMENT 'Mệnh giá thực',
  `fees` double DEFAULT '0',
  `penalty` double DEFAULT '0',
  `amount` double DEFAULT '0' COMMENT 'Số tiền sẽ nhận về',
  `currency_code` varchar(5) NOT NULL DEFAULT 'VND',
  `type` varchar(25) NOT NULL COMMENT 'Nạp nhanh/ nạp chậm',
  `error_code` varchar(5) NOT NULL COMMENT 'Mã lỗi',
  `error_message` varchar(100) NOT NULL COMMENT 'Thông báo lỗi',
  `charge_check` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Số lần đã nạp thử',
  `checksum` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `api_provider` varchar(50) NOT NULL COMMENT 'Tên nhà cung cấp tẩy thẻ qua API',
  `order` varchar(50) DEFAULT NULL COMMENT 'Gán cho order mua hàng nào đó',
  `description` varchar(150) NOT NULL,
  `admin_note` varchar(150) DEFAULT NULL,
  `transaction_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `chargings`
--

INSERT INTO `chargings` (`id`, `user`, `user_info`, `code`, `serial`, `telco`, `declared_value`, `real_value`, `fees`, `penalty`, `amount`, `currency_code`, `type`, `error_code`, `error_message`, `charge_check`, `checksum`, `status`, `api_provider`, `order`, `description`, `admin_note`, `transaction_code`, `created_at`, `updated_at`) VALUES
(31, 4, 'dsfdsafdsa', 'fdsafd', 'fdsafdas', 'VIETTEL', 20000, 20000, 12, 0, 19800, 'VND', 'Charging', '', '', 0, 'eeb80d0bfc6395fc4b9aa4e834ce238e', 1, '', NULL, '', NULL, 'T15337886546230', '2018-08-09 02:58:47', '2018-08-09 04:24:14'),
(32, 4, 'dsfdsafdsa', 'dsadsa', 'fdsafdsaf', 'VIETTEL', 10000, 0, 12, 0, 9900, 'VND', 'Charging', '', '', 0, '6e2a6c7ea0665f8da9721853a0bedd28', 0, '', NULL, '', NULL, 'T15337886822461', '2018-08-09 03:16:33', '2018-08-09 04:52:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chargings_cards`
--

CREATE TABLE `chargings_cards` (
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

--
-- Đang đổ dữ liệu cho bảng `chargings_cards`
--

INSERT INTO `chargings_cards` (`id`, `name`, `key`, `image`, `discount_manual`, `discount_api`, `available_values`, `currency_code`, `status`, `sort`) VALUES
(1, 'The Viettel', 'viettel', 'viettel.jpg', 35, 32, '50000,100000,200000,300000,500000,1000000', 'VND', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chargings_fees`
--

CREATE TABLE `chargings_fees` (
  `id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `penalty` float DEFAULT NULL,
  `fees` float DEFAULT NULL,
  `telco_key` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chargings_fees`
--

INSERT INTO `chargings_fees` (`id`, `group`, `penalty`, `fees`, `telco_key`, `created_at`, `updated_at`) VALUES
(1, 5, 30, 10, 'VINAPHONE', '2018-08-04 00:42:00', '2018-08-07 10:57:48'),
(2, 4, 5, 11, 'VINAPHONE', '2018-08-04 00:42:15', '2018-08-04 00:42:31'),
(3, 5, 19, 12, 'VIETTEL', '2018-08-04 00:43:56', '2018-08-07 10:57:56'),
(4, 4, 0, 1, 'VIETTEL', '2018-08-04 00:43:57', '2018-08-04 00:48:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chargings_orders`
--

CREATE TABLE `chargings_orders` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bảng này lưu các order nạp tiền điện thoại , tiền internet thủ công';

--
-- Đang đổ dữ liệu cho bảng `chargings_orders`
--

INSERT INTO `chargings_orders` (`id`, `order_id`, `user`, `user_info`, `telco`, `phone_number`, `declared_value`, `completed_value`, `telco_type`, `discount`, `amount`, `currency_code`, `mix`, `status`, `payment_status`, `created_at`, `updated_at`) VALUES
(42, 'M153286326927100', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:09', '2018-07-29 04:21:09'),
(43, 'M153286327126554', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:11', '2018-07-29 04:21:11'),
(44, 'M153286327158575', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:11', '2018-07-29 04:21:11'),
(45, 'M153286327165355', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:11', '2018-07-29 04:21:11'),
(46, 'M153286327238462', 1, 'admin', 'viettel', '0943793984', 500000, 350000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:12', '2018-07-29 04:21:12'),
(47, 'M153286327280326', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:12', '2018-07-29 04:21:12'),
(48, 'M153286327368852', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:13', '2018-07-29 04:21:13'),
(49, 'M153286327350077', 1, 'admin', 'viettel', '0943793984', 500000, 300000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:13', '2018-07-29 04:21:13'),
(50, 'M153286327410554', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:14', '2018-07-29 04:21:14'),
(51, 'M153286327447935', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:14', '2018-07-29 04:21:14'),
(52, 'M153286327499030', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:14', '2018-07-29 04:21:14'),
(53, 'M153286327595058', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:15', '2018-07-29 04:21:15'),
(54, 'M153286327585244', 1, 'admin', 'viettel', '0943793984', 500000, 250000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:15', '2018-07-29 04:21:15'),
(55, 'M153286327542077', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:15', '2018-07-29 04:21:15'),
(56, 'M153286327566002', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:15', '2018-07-29 04:21:15'),
(57, 'M153286327642936', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:16', '2018-07-29 04:21:16'),
(58, 'M153286327613290', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:16', '2018-07-29 04:21:16'),
(59, 'M153286327648409', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:16', '2018-07-29 04:21:16'),
(60, 'M153286327735637', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:17', '2018-07-29 04:21:17'),
(61, 'M153286327785089', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:17', '2018-07-29 04:21:17'),
(62, 'M153286327765845', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:17', '2018-07-29 04:21:17'),
(63, 'M153286327849626', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:18', '2018-07-29 04:21:18'),
(64, 'M153286327895337', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:18', '2018-07-29 04:21:18'),
(65, 'M153286327877218', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:18', '2018-07-29 04:21:18'),
(66, 'M153286327948228', 1, 'admin', 'viettel', '0943793984', 500000, 100000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:19', '2018-07-29 04:21:19'),
(67, 'M153286327992354', 1, 'admin', 'viettel', '0943793984', 500000, 150000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-07-29 04:21:19', '2018-07-29 04:21:19'),
(68, 'M153310981773647', 1, 'admin', 'viettel', '0943793984', 500000, 200000, 'credit', 20, 400000, 'VND', 1, 'none', 'none', '2018-08-01 00:50:17', '2018-08-01 00:50:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chargings_telco`
--

CREATE TABLE `chargings_telco` (
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
-- Đang đổ dữ liệu cho bảng `chargings_telco`
--

INSERT INTO `chargings_telco` (`id`, `name`, `key`, `icon`, `description`, `status`, `value`, `created_at`, `updated_at`) VALUES
(1, 'VIETTEL', 'VIETTEL', NULL, NULL, 1, '10000,20000,30000,50000', '2018-07-29 21:03:52', '2018-08-07 09:32:29'),
(2, 'VINAPHONE', 'VINAPHONE', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-07-29 21:03:52', '2018-08-06 01:41:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `currencies`
--

CREATE TABLE `currencies` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `currencies`
--

INSERT INTO `currencies` (`id`, `name`, `code`, `value`, `symbol_left`, `symbol_right`, `seperator`, `decimal`, `status`, `fiat`, `default`, `homepage`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'Việt Nam Đồng 1', 'VND', '23.00000000', NULL, 'đ', 'comma', 2, 1, 1, 1, 0, 1, '2018-07-26 01:32:10', '2018-07-26 02:02:17'),
(2, 'bvcbvcx', 'UGX', '23.00000000', 'đ', NULL, 'comma', 2, 1, 1, 0, 0, 1, '2018-07-26 21:54:56', '2018-07-26 21:54:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `currencies_code`
--

CREATE TABLE `currencies_code` (
  `code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Các mã code của tiền tệ trên thế giới';

--
-- Đang đổ dữ liệu cho bảng `currencies_code`
--

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `created_at`, `updated_at`, `name`, `description`, `status`) VALUES
(4, '2018-07-25 21:08:23', '2018-07-25 21:27:45', 'USER_2', 'User 2', 1),
(5, '2018-07-25 21:08:28', '2018-08-06 04:27:58', 'DEFAULT', 'User group default', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `default` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `languages_trans`
--

CREATE TABLE `languages_trans` (
  `id` int(11) NOT NULL,
  `language_code` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `localbanks`
--

CREATE TABLE `localbanks` (
  `id` int(11) NOT NULL,
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
  `sort` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `localbanks`
--

INSERT INTO `localbanks` (`id`, `code`, `name`, `acc_num`, `acc_name`, `branch`, `link`, `info`, `icon`, `deposit`, `withdraw`, `status`, `sort`) VALUES
(2, 'EAB', 'Ngân hàng Đông Á', '0104659963', 'Nguyen Van Nghia', 'Hai Phong', NULL, NULL, '', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `localbanks_user`
--

CREATE TABLE `localbanks_user` (
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ltm_translations`
--

CREATE TABLE `ltm_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `locale` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ltm_translations`
--

INSERT INTO `ltm_translations` (`id`, `status`, `locale`, `group`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 0, 'en', 'auth', 'failed', 'These credentials do not match our records.', '2018-07-02 11:46:15', '2018-08-02 20:01:47'),
(3, 0, 'en', 'pagination', 'previous', '&laquo; Previous', '2018-07-02 11:46:15', '2018-08-02 20:01:47'),
(4, 0, 'en', 'pagination', 'next', 'Next &raquo;', '2018-07-02 11:46:15', '2018-08-02 20:01:47'),
(5, 0, 'en', '_json', 'Login', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(6, 0, 'en', '_json', 'Register', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(7, 0, 'en', '_json', 'Logout', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(8, 0, 'en', '_json', 'E-Mail Address', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(9, 0, 'en', '_json', 'Password', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(10, 0, 'en', '_json', 'Remember Me', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(11, 0, 'en', '_json', 'Forgot Your Password?', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(12, 0, 'en', '_json', 'Reset Password', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(13, 0, 'en', '_json', 'Send Password Reset Link', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(14, 0, 'en', '_json', 'Confirm Password', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(15, 0, 'en', '_json', 'Name', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(16, 0, 'en', '_json', 'Toggle navigation', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(17, 0, 'en', '_json', 'Whoops!', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(18, 0, 'en', '_json', 'Hello!', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(19, 0, 'en', '_json', 'Regards', NULL, '2018-07-02 11:46:15', '2018-07-02 11:46:15'),
(20, 0, 'en', 'passwords', 'password', 'Passwords must be at least six characters and match the confirmation.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(21, 0, 'en', 'passwords', 'reset', 'Your password has been reset!', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(22, 0, 'en', 'passwords', 'sent', 'We have e-mailed your password reset link!', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(23, 0, 'en', 'passwords', 'token', 'This password reset token is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(24, 0, 'en', 'passwords', 'user', 'We can\'t find a user with that e-mail address.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(25, 0, 'en', 'validation', 'accepted', 'The :attribute must be accepted.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(26, 0, 'en', 'validation', 'active_url', 'The :attribute is not a valid URL.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(27, 0, 'en', 'validation', 'after', 'The :attribute must be a date after :date.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(28, 0, 'en', 'validation', 'after_or_equal', 'The :attribute must be a date after or equal to :date.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(29, 0, 'en', 'validation', 'alpha', 'The :attribute may only contain letters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(30, 0, 'en', 'validation', 'alpha_dash', 'The :attribute may only contain letters, numbers, dashes and underscores.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(31, 0, 'en', 'validation', 'alpha_num', 'The :attribute may only contain letters and numbers.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(32, 0, 'en', 'validation', 'array', 'The :attribute must be an array.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(33, 0, 'en', 'validation', 'before', 'The :attribute must be a date before :date.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(34, 0, 'en', 'validation', 'before_or_equal', 'The :attribute must be a date before or equal to :date.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(35, 0, 'en', 'validation', 'between.numeric', 'The :attribute must be between :min and :max.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(36, 0, 'en', 'validation', 'between.file', 'The :attribute must be between :min and :max kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(37, 0, 'en', 'validation', 'between.string', 'The :attribute must be between :min and :max characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(38, 0, 'en', 'validation', 'between.array', 'The :attribute must have between :min and :max items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(39, 0, 'en', 'validation', 'boolean', 'The :attribute field must be true or false.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(40, 0, 'en', 'validation', 'confirmed', 'The :attribute confirmation does not match.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(41, 0, 'en', 'validation', 'date', 'The :attribute is not a valid date.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(42, 0, 'en', 'validation', 'date_format', 'The :attribute does not match the format :format.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(43, 0, 'en', 'validation', 'different', 'The :attribute and :other must be different.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(44, 0, 'en', 'validation', 'digits', 'The :attribute must be :digits digits.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(45, 0, 'en', 'validation', 'digits_between', 'The :attribute must be between :min and :max digits.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(46, 0, 'en', 'validation', 'dimensions', 'The :attribute has invalid image dimensions.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(47, 0, 'en', 'validation', 'distinct', 'The :attribute field has a duplicate value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(48, 0, 'en', 'validation', 'email', 'The :attribute must be a valid email address.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(49, 0, 'en', 'validation', 'exists', 'The selected :attribute is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(50, 0, 'en', 'validation', 'file', 'The :attribute must be a file.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(51, 0, 'en', 'validation', 'filled', 'The :attribute field must have a value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(52, 0, 'en', 'validation', 'gt.numeric', 'The :attribute must be greater than :value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(53, 0, 'en', 'validation', 'gt.file', 'The :attribute must be greater than :value kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(54, 0, 'en', 'validation', 'gt.string', 'The :attribute must be greater than :value characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(55, 0, 'en', 'validation', 'gt.array', 'The :attribute must have more than :value items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(56, 0, 'en', 'validation', 'gte.numeric', 'The :attribute must be greater than or equal :value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(57, 0, 'en', 'validation', 'gte.file', 'The :attribute must be greater than or equal :value kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(58, 0, 'en', 'validation', 'gte.string', 'The :attribute must be greater than or equal :value characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(59, 0, 'en', 'validation', 'gte.array', 'The :attribute must have :value items or more.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(60, 0, 'en', 'validation', 'image', 'The :attribute must be an image.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(61, 0, 'en', 'validation', 'in', 'The selected :attribute is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(62, 0, 'en', 'validation', 'in_array', 'The :attribute field does not exist in :other.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(63, 0, 'en', 'validation', 'integer', 'The :attribute must be an integer.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(64, 0, 'en', 'validation', 'ip', 'The :attribute must be a valid IP address.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(65, 0, 'en', 'validation', 'ipv4', 'The :attribute must be a valid IPv4 address.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(66, 0, 'en', 'validation', 'ipv6', 'The :attribute must be a valid IPv6 address.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(67, 0, 'en', 'validation', 'json', 'The :attribute must be a valid JSON string.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(68, 0, 'en', 'validation', 'lt.numeric', 'The :attribute must be less than :value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(69, 0, 'en', 'validation', 'lt.file', 'The :attribute must be less than :value kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(70, 0, 'en', 'validation', 'lt.string', 'The :attribute must be less than :value characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(71, 0, 'en', 'validation', 'lt.array', 'The :attribute must have less than :value items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(72, 0, 'en', 'validation', 'lte.numeric', 'The :attribute must be less than or equal :value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(73, 0, 'en', 'validation', 'lte.file', 'The :attribute must be less than or equal :value kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(74, 0, 'en', 'validation', 'lte.string', 'The :attribute must be less than or equal :value characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(75, 0, 'en', 'validation', 'lte.array', 'The :attribute must not have more than :value items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(76, 0, 'en', 'validation', 'max.numeric', 'The :attribute may not be greater than :max.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(77, 0, 'en', 'validation', 'max.file', 'The :attribute may not be greater than :max kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(78, 0, 'en', 'validation', 'max.string', 'The :attribute may not be greater than :max characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(79, 0, 'en', 'validation', 'max.array', 'The :attribute may not have more than :max items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(80, 0, 'en', 'validation', 'mimes', 'The :attribute must be a file of type: :values.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(81, 0, 'en', 'validation', 'mimetypes', 'The :attribute must be a file of type: :values.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(82, 0, 'en', 'validation', 'min.numeric', 'The :attribute must be at least :min.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(83, 0, 'en', 'validation', 'min.file', 'The :attribute must be at least :min kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(84, 0, 'en', 'validation', 'min.string', 'The :attribute must be at least :min characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(85, 0, 'en', 'validation', 'min.array', 'The :attribute must have at least :min items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(86, 0, 'en', 'validation', 'not_in', 'The selected :attribute is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(87, 0, 'en', 'validation', 'not_regex', 'The :attribute format is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(88, 0, 'en', 'validation', 'numeric', 'The :attribute must be a number.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(89, 0, 'en', 'validation', 'present', 'The :attribute field must be present.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(90, 0, 'en', 'validation', 'regex', 'The :attribute format is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(91, 0, 'en', 'validation', 'required', 'The :attribute field is required.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(92, 0, 'en', 'validation', 'required_if', 'The :attribute field is required when :other is :value.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(93, 0, 'en', 'validation', 'required_unless', 'The :attribute field is required unless :other is in :values.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(94, 0, 'en', 'validation', 'required_with', 'The :attribute field is required when :values is present.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(95, 0, 'en', 'validation', 'required_with_all', 'The :attribute field is required when :values is present.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(96, 0, 'en', 'validation', 'required_without', 'The :attribute field is required when :values is not present.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(97, 0, 'en', 'validation', 'required_without_all', 'The :attribute field is required when none of :values are present.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(98, 0, 'en', 'validation', 'same', 'The :attribute and :other must match.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(99, 0, 'en', 'validation', 'size.numeric', 'The :attribute must be :size.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(100, 0, 'en', 'validation', 'size.file', 'The :attribute must be :size kilobytes.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(101, 0, 'en', 'validation', 'size.string', 'The :attribute must be :size characters.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(102, 0, 'en', 'validation', 'size.array', 'The :attribute must contain :size items.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(103, 0, 'en', 'validation', 'string', 'The :attribute must be a string.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(104, 0, 'en', 'validation', 'timezone', 'The :attribute must be a valid zone.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(105, 0, 'en', 'validation', 'unique', 'The :attribute has already been taken.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(106, 0, 'en', 'validation', 'uploaded', 'The :attribute failed to upload.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(107, 0, 'en', 'validation', 'url', 'The :attribute format is invalid.', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(108, 0, 'en', 'validation', 'custom.attribute-name.rule-name', 'custom-message', '2018-07-02 11:48:25', '2018-08-02 20:01:47'),
(109, 0, 'vi', 'auth', 'failed', 'xin chào', '2018-07-02 12:11:48', '2018-08-02 20:01:47'),
(111, 0, 'en', 'home', 'home_title', 'Home', '2018-07-02 12:14:14', '2018-08-02 20:01:47'),
(112, 0, 'vi', 'home', 'home_title', 'Tiêu đề 1 2', '2018-07-02 12:14:48', '2018-08-02 20:01:47'),
(113, 0, 'vi', 'pagination', 'previous', 'dafds', '2018-07-02 14:03:05', '2018-08-02 20:01:47'),
(114, 0, 'vi', 'pagination', 'next', 'dasdsa', '2018-07-02 14:03:12', '2018-08-02 20:01:47'),
(116, 0, 'en', 'auth', 'throttle', NULL, '2018-08-01 18:48:07', '2018-08-01 18:48:07'),
(117, 0, 'en', '_json', 'Username', NULL, '2018-08-01 18:48:07', '2018-08-01 18:48:07'),
(118, 0, 'en', '_json', 'laravel-filemanager::lfm', NULL, '2018-08-01 18:48:07', '2018-08-01 18:48:07'),
(120, 0, 'en', 'test', 'dsadsa', 'vcxv', '2018-08-01 19:49:11', '2018-08-02 20:01:47'),
(121, 0, 'fr', 'test', 'dsadsa', 'fdsafd', '2018-08-01 19:57:26', '2018-08-02 20:01:47'),
(122, 0, 'vi', 'test', 'dsadsa', 'fdsafds', '2018-08-01 19:57:29', '2018-08-02 20:01:47'),
(124, 0, 'en', 'test', 'gfgdf', 'gfdsgdsf', '2018-08-01 19:57:57', '2018-08-02 20:01:47'),
(125, 0, 'en', 'test', 'gfdsgf', 'gfdsgfds', '2018-08-01 19:57:57', '2018-08-02 20:01:47'),
(126, 0, 'en', 'test', 'gdfsgf', 'gfdsgf', '2018-08-01 19:57:57', '2018-08-02 20:01:47'),
(127, 0, 'fr', 'test', 'gdfsgf', 'gfdsgfs', '2018-08-01 19:58:17', '2018-08-02 20:01:47'),
(128, 0, 'fr', 'test', 'gfdsgf', 'gfds', '2018-08-01 19:58:18', '2018-08-02 20:01:47'),
(129, 0, 'fr', 'test', 'gfgdf', 'gfds', '2018-08-01 19:58:20', '2018-08-02 20:01:47'),
(130, 0, 'en', 'wallet', 'title', 'fdsafdsa', '2018-08-01 20:03:54', '2018-08-02 20:01:47'),
(131, 0, 'en', 'wallet', 'fdsafdsa', 'dfsafdasfdsa', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(132, 0, 'en', 'wallet', 'fdsa', 'fdasfdsafdas', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(133, 0, 'en', 'wallet', 'fds', 'fdas', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(134, 0, 'en', 'wallet', 'afd', 'fdsafdsa', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(135, 0, 'en', 'wallet', 'asf', 'fdsafdsa', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(136, 0, 'en', 'wallet', 'dsa', 'fdsa', '2018-08-01 20:13:29', '2018-08-02 20:01:47'),
(137, 0, 'en', 'profiles', 'login', 'login', '2018-08-02 19:46:26', '2018-08-02 20:01:47'),
(138, 0, 'en', 'profiles', 'register', 'register', '2018-08-02 19:46:26', '2018-08-02 20:01:47'),
(139, 0, 'en', 'profiles', 'logout', 'logout', '2018-08-02 19:46:26', '2018-08-02 20:01:47'),
(140, 0, 'en', 'profiles', 'profile', 'profile', '2018-08-02 19:46:26', '2018-08-02 20:01:47'),
(141, 0, 'vi', 'profiles', 'login', 'đăng nhập', '2018-08-02 19:47:23', '2018-08-02 20:01:47'),
(142, 0, 'vi', 'profiles', 'logout', 'đăng xuất', '2018-08-02 19:47:28', '2018-08-02 20:01:47'),
(143, 0, 'vi', 'profiles', 'profile', 'profile', '2018-08-02 19:47:40', '2018-08-02 20:01:47'),
(144, 0, 'vi', 'profiles', 'register', 'đăng ký', '2018-08-02 19:47:45', '2018-08-02 20:01:47'),
(145, 0, 'en', 'profiles', 'account', 'acount', '2018-08-02 20:00:22', '2018-08-02 20:01:47'),
(146, 0, 'vi', 'profiles', 'account', 'tài khoản', '2018-08-02 20:00:40', '2018-08-02 20:01:47'),
(147, 0, 'en', 'profiles', 'changepassword', 'change password', '2018-08-02 20:01:19', '2018-08-02 20:01:47'),
(148, 0, 'vi', 'profiles', 'changepassword', 'đổi mật khẩu', '2018-08-02 20:01:41', '2018-08-02 20:01:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` text COLLATE utf8_unicode_ci NOT NULL,
  `menu_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT '0',
  `level` int(11) DEFAULT '1',
  `children_count` int(11) DEFAULT '0',
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `name`, `url`, `menu_type`, `parent_id`, `level`, `children_count`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(60, 'Mua mã thẻ', '/muamathe.html', 'header', 0, 1, 0, 1, 1, '2018-08-06 16:16:17', '2018-08-14 04:05:23'),
(61, 'Đổi thẻ cào', '#', 'header', 0, 1, 2, 2, 1, '2018-08-06 16:16:37', '2018-08-14 04:05:42'),
(62, 'Đổi thẻ chậm', '/taythecham.html', NULL, 61, 2, 0, 1, 1, '2018-08-06 16:17:01', '2018-08-14 04:02:07'),
(63, 'Đổi thẻ nhanh', '/doithenhanh.html', NULL, 61, 2, 0, 2, 1, '2018-08-06 16:18:24', '2018-08-14 04:01:23'),
(67, 'Nạp di động', '#', NULL, 0, 1, 2, 3, 1, '2018-08-13 09:50:26', '2018-08-14 04:02:39'),
(68, 'Nạp chậm', '/napcham.html', NULL, 67, 2, 0, 1, 1, '2018-08-13 09:50:54', '2018-08-14 04:02:39'),
(69, 'Nạp nhanh', '/napnhanh.html', NULL, 67, 2, 0, 2, 1, '2018-08-13 09:51:17', '2018-08-14 04:02:39'),
(70, 'Nạp tiền game', '/naptiengame.html', 'header', 0, 1, 0, 4, 1, '2018-08-13 09:51:53', '2018-08-14 04:05:51'),
(71, 'Tin tức', '/tintuc.html', 'header', 0, 1, 0, 5, 1, '2018-08-13 09:52:37', '2018-08-14 04:06:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `merchants`
--

CREATE TABLE `merchants` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `merchants`
--

INSERT INTO `merchants` (`id`, `name`, `partner_id`, `partner_key`, `wallet_num`, `ips`, `website`, `icon`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Nguyen Van Nghia', '8235324351', '0d70fa5e283408c80b6a303f886117e1', '0057382955', '192.36.58.55,87.58.120.221', 'http://winjsc.com', 'a.jpg', NULL, 1, '2018-08-14 08:29:14', '2018-08-14 08:29:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_21_160547_create_permission_tables', 2),
(4, '2018_06_21_160736_create_products_table', 2),
(5, '2014_04_02_193005_create_translations_table', 3),
(6, '2018_07_25_162512_create_weblink_table', 4),
(7, '2018_07_26_023843_create_groups_table', 4),
(8, '2018_07_26_064856_create_currencies_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(3, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(2, 'App\\User', 1),
(2, 'App\\User', 2),
(3, 'App\\User', 1),
(5, 'App\\User', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mtopups`
--

CREATE TABLE `mtopups` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Bảng này lưu các order nạp tiền điện thoại , tiền internet thủ công';

--
-- Đang đổ dữ liệu cho bảng `mtopups`
--

INSERT INTO `mtopups` (`id`, `order_id`, `user`, `user_info`, `telco`, `phone_number`, `declared_value`, `completed_value`, `telco_type`, `discount`, `amount`, `currency_code`, `mix`, `status`, `payment_status`, `admin_note`, `transaction_id`, `created_at`, `updated_at`) VALUES
(95, 'M153387503418495', 4, 'dsfdsafdsa', 'vinaphone', '0123456789', 10000, 0, 'tratruoc', 0, 10000, 'VND', 0, 'wrong', 'refund', NULL, '179', '2018-08-10 04:23:54', '2018-08-10 04:33:55'),
(96, 'M153395208742048', 4, 'dsfdsafdsa', 'viettel', '0986862867', 10000, 0, 'tratruoc', 0, 10000, 'VND', 1, 'none', 'paid', NULL, '189', '2018-08-11 01:48:07', '2018-08-11 01:48:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mtopup_fees`
--

CREATE TABLE `mtopup_fees` (
  `id` int(11) NOT NULL,
  `group` int(11) NOT NULL,
  `discount` float DEFAULT NULL,
  `telco_key` varchar(50) NOT NULL,
  `telco_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mtopup_fees`
--

INSERT INTO `mtopup_fees` (`id`, `group`, `discount`, `telco_key`, `telco_type`, `created_at`, `updated_at`) VALUES
(5, 5, 0, 'VINAPHONE', 'tratruoc', '2018-08-04 01:25:06', '2018-08-08 01:22:06'),
(6, 4, 3, 'VINAPHONE', 'trasau', '2018-08-04 01:25:07', '2018-08-04 01:25:10'),
(7, 5, 0, 'VIETTEL', 'tratruoc', '2018-08-04 01:25:11', '2018-08-08 01:22:09'),
(8, 4, 2, 'VIETTEL', 'trasau', '2018-08-04 01:25:12', '2018-08-09 04:53:19'),
(9, 5, 0, 'mobifone', 'tratruoc', '2018-08-06 04:17:26', '2018-08-08 01:22:09'),
(10, 4, 3, 'mobifone', 'trasau', '2018-08-06 04:17:26', '2018-08-07 07:55:04'),
(11, 5, 1, 'vinaphone', 'trasau', '2018-08-07 07:52:33', '2018-08-07 07:52:33'),
(12, 5, 2, 'viettel', 'trasau', '2018-08-07 07:52:36', '2018-08-09 04:53:19'),
(13, 5, 3, 'mobifone', 'trasau', '2018-08-07 07:52:41', '2018-08-07 07:55:04'),
(14, 4, 0, 'vinaphone', 'tratruoc', '2018-08-08 01:22:05', '2018-08-08 01:22:06'),
(15, 4, 0, 'mobifone', 'tratruoc', '2018-08-08 01:22:07', '2018-08-08 01:22:09'),
(16, 4, 0, 'viettel', 'tratruoc', '2018-08-08 01:22:09', '2018-08-08 01:22:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mtopup_telco`
--

CREATE TABLE `mtopup_telco` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `key` varchar(50) NOT NULL,
  `number_format` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `description` text,
  `status` tinyint(4) NOT NULL,
  `value` text,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `mtopup_telco`
--

INSERT INTO `mtopup_telco` (`id`, `name`, `key`, `number_format`, `icon`, `description`, `status`, `value`, `updated_at`, `created_at`) VALUES
(3, 'Viettel', 'viettel', ',0162,0163,0164,0165,0166,0167,0168,0169,086,096,097,098,', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-08-06 03:31:08', '2018-08-04 02:49:36'),
(5, 'mobifone', 'mobifone', ',0120,0121,0122,0126,0128,090,093,089,', NULL, NULL, 1, '10000,20000,30000,50000', '2018-08-06 03:31:21', '2018-08-04 03:02:48'),
(7, 'vinaphone', 'vinaphone', ',0123,0124,0125,0127,0129,091,094,088,', NULL, NULL, 1, '10000,20000,30000,50000,100000,200000,500000', '2018-08-06 03:30:50', '2018-08-04 11:06:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `url_key`, `short_description`, `content`, `author`, `author_email`, `language`, `custom_layout`, `status`, `publish_date`, `created_at`, `updated_at`) VALUES
(5, 'Lorem Ipsum Lorem Ipsum Lorem Ipsum Lorem Ipsum', 'post-test-001', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.\r\n123\r\n12312\r\n3', '<h2>What is Lorem Ipsum 123?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 'admin', 'admin@localhost.com', 'vi', 0, 0, '07/26/2018 00:00 - 08/03/2018 00:00', '2018-07-23 03:57:34', '2018-07-24 20:00:07'),
(8, 'Đánh giá chi tiết Samsung Galaxy S8 Plus: hãy quên Note 7 đi', 'danh-gia-chi-tiet-samsung-galaxy-s8-plus-hay-quen-note-7-di', 'Có hơn 50% máy Galaxy S8 và Galaxy S8+ được bán ra được sản xuất ở Việt Nam. Để chế tạo thiết bị này thì Samsung đã phải đầu tư 17 ngàn máy CNC mới với giá trị trung bình mỗi máy vào khoảng 70.000 đô la Mỹ ở nhà máy Thái Nguyên của họ. Samsung đầu tư bao nhiêu không quan trọng, tạo bao nhiêu công ăn việc làm cũng không phải là lý do người dùng cuối chúng ta ủng hộ hay không ủng hộ Samsung, mà điểm chính yếu ở đây nằm ở chỗ Galaxy S8+ có phải là một sản phẩm tốt hay không.', '<p>Có hơn 50% máy Galaxy <a href=\"https://tinhte.vn/s8/\">S8</a> và <a href=\"https://tinhte.vn/tags/galaxy-s8-2/\">Galaxy S8+</a> được bán ra được sản xuất ở Việt Nam. Để chế tạo thiết bị này thì <a href=\"https://tinhte.vn/tags/samsung/\">Samsung</a> đã phải đầu tư 17 ngàn máy CNC mới với giá trị trung bình mỗi máy vào khoảng 70.000 đô la Mỹ ở nhà máy Thái Nguyên của họ. Samsung đầu tư bao nhiêu không quan trọng, tạo bao nhiêu công ăn việc làm cũng không phải là lý do người dùng cuối chúng ta ủng hộ hay không ủng hộ Samsung, mà điểm chính yếu ở đây nằm ở chỗ Galaxy S8+ có phải là một sản phẩm tốt hay không.</p><p>Chắc chắn cảm giác đầu tiên của các bạn khi cầm S8 và S8+ lên là nó quá trơn tru so với S7 hay S7 edge, gần như toàn bộ các chi tiết, các mối ghép nối của sản phẩm này đã được lắp ghép liền mạch hơn so với các sản phẩm trước kia của Samsung, kể cả khi so sánh với Galaxy Note 7 trước đó. Samsung đã dùng hai tấm kính cường lực Gorilla Glass 5 ở cả mặt trước và sau để bảo vệ màn hình và mặt lưng của máy. Gorrilla Glass 5 được thiết kế với tư tưởng chống vỡ, nó sẽ mềm, linh hoạt hơn nên khó vỡ khi rơi (tất nhiên bạn xui thì sẽ vẫn nát máy như thường) nhưng dễ tổn thương với cát hay bụi trong túi áo/túi quần của chúng ta.</p><p>Chúng ta không cần nói quá nhiều về thiết kế của Galaxy S8 nữa, vì nó sang và đẹp nhất trong số tất cả các điện thoại mà Samsung từng sản xuất. Nếu có cái gì đó làm cho mình tiếc nuối thì đó là việc máy vẫn còn những chi tiết nhỏ chưa thật sự được chăm chút kỹ, vị trí các cổng kết nối hay thiết kế hơi nữ tính một chút. Ở một góc độ nào đó, Galaxy S8 rất đẹp nhưng lại không thật sự cho mình cảm giác cao cấp, cứng cáp khi cầm, điều mà iPhone hay mới đây là BlackBerry KeyOne làm rất tốt.</p>', 'admin', 'admin@localhost.com', 'en', 0, 1, NULL, '2018-07-26 11:06:13', '2018-07-26 11:06:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_no` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Lưu loại order gì, nạp, mua hàng',
  `user` int(11) DEFAULT NULL,
  `userinfo` text COLLATE utf8_unicode_ci NOT NULL,
  `module_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tax_fee` decimal(16,4) NOT NULL COMMENT 'Thuế và phí (chỉ lưu với mục đích xem)',
  `amount` decimal(16,4) NOT NULL COMMENT 'Tổng tiền đã gồm tiền hàng, thuế, phí',
  `currency_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paygate_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Cổng thanh toán gì',
  `affiliate_code` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Mã giới thiệu',
  `order_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipment` int(1) NOT NULL COMMENT '0 hoặc 1',
  `shipinfo` text COLLATE utf8_unicode_ci COMMENT 'Thông tin ship',
  `user_note` text COLLATE utf8_unicode_ci,
  `admin_note` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `order_no`, `type`, `user`, `userinfo`, `module_name`, `tax_fee`, `amount`, `currency_code`, `paygate_code`, `affiliate_code`, `order_status`, `payment_status`, `shipment`, `shipinfo`, `user_note`, `admin_note`, `created_at`, `updated_at`) VALUES
(91, 'A153415048430770', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 08:54:44', '2018-08-13 08:54:44'),
(92, 'A153415060843152', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 08:56:48', '2018-08-13 08:56:48'),
(93, 'A153415064260255', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 08:57:22', '2018-08-13 08:57:22'),
(94, 'A153415067937652', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 08:57:59', '2018-08-13 08:57:59'),
(97, 'A153415101350701', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 09:03:33', '2018-08-13 09:03:33'),
(98, 'A153415109113166', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 09:04:51', '2018-08-13 09:04:51'),
(99, 'A153415113675088', 'minusBalance', 1, 'admin', 'minusBalance', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 09:05:36', '2018-08-13 09:05:36'),
(100, 'A153415121450144', 'AddBalance', 1, 'admin', 'AddBalnce', '0.0000', '100000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-13 09:06:54', '2018-08-13 09:06:54'),
(101, 'A153422874035728', 'AddBalance', 1, 'admin', 'AddBalnce', '0.0000', '500000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', 'Cộng 500k', '2018-08-14 06:39:00', '2018-08-14 06:39:00'),
(103, 'A153422881617082', 'AddBalance', 1, 'admin', 'AddBalnce', '0.0000', '500000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', NULL, '2018-08-14 06:40:16', '2018-08-14 06:40:16'),
(104, 'A153422883279141', 'AddBalance', 1, 'admin', 'AddBalnce', '0.0000', '50000.0000', 'VND', 'WALLET', '', 'Paid', 'NONE', 0, '', '', 'dsfsd sdfsd sdf', '2018-08-14 06:40:32', '2018-08-14 06:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_1`
--

CREATE TABLE `orders_1` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `user` varchar(255) DEFAULT NULL,
  `user_info` varchar(255) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `currenycy_code` varchar(255) DEFAULT NULL,
  `count_product` int(11) DEFAULT NULL,
  `paygate` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@localhost.com', '$2y$10$9XUxsjb9jqBfAX9WSbXpVe4eQVPItD0YdTnUXLi/vL4HpEKAbeQ8m', '2018-08-01 22:17:25'),
('quocduongpy@gmail.com', '$2y$10$CHqZNTmIVLYGr6Fx9wacrOTmN/ZQ3Adox7j2jMXQMxKKC.2CzGlDe', '2018-08-01 22:22:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `paygates`
--

CREATE TABLE `paygates` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `paygates`
--

INSERT INTO `paygates` (`id`, `currency_code`, `code`, `name`, `withdraw`, `withdrawField`, `deposit`, `description`, `avatar`, `url`, `configs`, `status`, `fixed_fees`, `percent_fees`, `delivery_limit`, `min`, `max`, `minute`, `created_at`, `updated_at`) VALUES
(8, 'VND', 'OnepayND', 'Onepay Nội địa', '0', '[]', 0, 'OnepayND payment gateway', NULL, 'https://mtf.onepay.vn/onecomm-pay/vpc.op', '{\"merchant_id\":\"ONEPAY\",\"access_code\":\"D67342C2\",\"secure_secret\":\"A3EFDFABA8653DF2342E8DAC29B51AF0\"}', 1, 1, 2, 5, 3, 4, 0, '2018-07-30 20:57:27', '2018-07-31 20:25:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', NULL, '2018-06-21 09:14:46', '2018-06-21 09:14:46'),
(2, 'role-create', 'web', NULL, '2018-06-21 09:14:46', '2018-06-21 09:14:46'),
(3, 'role-edit', 'web', NULL, '2018-06-21 09:14:46', '2018-06-21 09:14:46'),
(4, 'role-delete', 'web', NULL, '2018-06-21 09:14:46', '2018-06-21 09:14:46'),
(10, 'all', 'web', 'All access for super admin', '2018-06-29 17:33:42', '2018-06-29 17:33:42'),
(11, 'user', 'web', 'Account type user', '2018-06-30 18:57:01', '2018-06-30 18:57:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL DEFAULT '0',
  `url` varchar(250) NOT NULL DEFAULT '0',
  `catalog` int(11) NOT NULL DEFAULT '0',
  `image` int(11) DEFAULT '0',
  `image_other` int(11) DEFAULT '0',
  `description` varchar(500) DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `public` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `url`, `catalog`, `image`, `image_other`, `description`, `order`, `public`, `created_at`, `updated_at`) VALUES
(2, 'Viettel', '1-2-3', 5, 5, 3, 'de', 2, 0, '2018-07-14 23:02:36', '2018-07-14 23:02:36'),
(3, 'dadsa', 'dasdass', 6, 5, 2, 'dsadas', 1, 1, '2018-07-14 23:03:26', '2018-07-14 23:38:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_gallery`
--

CREATE TABLE `product_gallery` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_thumb` tinyint(2) DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(2, 'BACKEND', 'web', '2018-06-20 17:00:00', NULL),
(3, 'SUPER_ADMIN', 'web', '2018-06-20 17:00:00', '2018-06-29 13:52:31'),
(4, 'ADMIN', 'web', '2018-06-20 17:00:00', '2018-06-29 17:34:51'),
(5, 'USER', 'web', '2018-06-30 18:57:15', '2018-06-30 18:57:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 2),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(10, 3),
(11, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sendmail_driver`
--

CREATE TABLE `sendmail_driver` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `configs` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL,
  `installed` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sendmail_driver`
--

INSERT INTO `sendmail_driver` (`id`, `name`, `driver`, `configs`, `status`, `installed`) VALUES
(3, 'Gửi mail bằng Smtp', 'Smtp', '{\"host\":\"smtp.gmail.com\",\"username\":\"phuonganh5694@gmail.com\",\"password\":\"147258abc\",\"port\":\"587\",\"encryption\":\"tls\",\"sendmail\":\"\\/usr\\/sbin\\/sendmail -bs\"}', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sendmail_setting`
--

CREATE TABLE `sendmail_setting` (
  `id` int(11) NOT NULL,
  `from_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `from_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `driver` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sendmail_setting`
--

INSERT INTO `sendmail_setting` (`id`, `from_email`, `from_name`, `driver`) VALUES
(1, 'phuonganh5694@gmail.com', 'Nencer', 'Smtp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `key` varchar(250) DEFAULT NULL,
  `value` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`key`, `value`, `created_at`, `updated_at`) VALUES
('favicon', '1', NULL, '2018-07-31 04:56:12'),
('backendlogo', '1', NULL, '2018-07-31 04:56:12'),
('name', 'name', NULL, '2018-07-31 04:56:12'),
('title', 'title 1', NULL, '2018-07-31 04:56:12'),
('description', 'Description', NULL, '2018-07-31 04:56:12'),
('language', 'vi', NULL, '2018-07-31 04:56:12'),
('phone', '0123456789', NULL, '2018-07-31 04:56:12'),
('twitter', 'fb.com/admin', NULL, '2018-07-31 04:56:12'),
('email', 'admin@localhost.com', NULL, '2018-07-31 04:56:12'),
('facebook', 'fb.com/admin', NULL, '2018-07-31 04:56:12'),
('logo', '4', NULL, '2018-07-31 04:56:12'),
('hotline', '0123456789', NULL, '2018-07-31 04:56:12'),
('backendname', 'AdminLTE', NULL, '2018-07-31 04:56:12'),
('backendlang', 'en', NULL, '2018-07-31 04:56:12'),
('copyright', 'copyright', NULL, '2018-07-31 04:56:12'),
('timezone', 'Asia/Ho_Chi_Minh', NULL, '2018-07-31 04:56:12'),
('googleplus', 'fb.com/admin', NULL, '2018-07-31 04:56:12'),
('websitestatus', 'ONLINE', NULL, '2018-07-31 04:56:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_text` text COLLATE utf8_unicode_ci,
  `slider_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slider_btn_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT '0',
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `slider_image`, `slider_text`, `slider_url`, `slider_btn_text`, `slider_btn_url`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Slider demo 01', 'sliders/tRFkSIXFrfjSSe0uCpVDv78srpvNy8rM8BGqP0HW.png', 'Nạp tiền chưa bao giờ dễ thế', NULL, 'Đăng ký', 'http://', 1, 1, '2018-08-14 04:21:57', '2018-08-14 04:23:16'),
(5, 'Slider demo 02', 'sliders/Wy18BAXsTt9TFCuOUBv1Eqz3gQ5rNUF6BCnkHKcO.png', '234 2rfdsfsdf sdf sdf sdf', NULL, 'Đăng ký3', 'http://', 2, 1, '2018-08-14 04:27:24', '2018-08-14 04:27:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `softcard`
--

CREATE TABLE `softcard` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8_unicode_ci,
  `description` text COLLATE utf8_unicode_ci,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `softcard`
--

INSERT INTO `softcard` (`id`, `name`, `url_key`, `short_description`, `description`, `status`, `created_at`, `updated_at`) VALUES
(23, 'the viettel', 'the-viettel', 'the viettel', 'the viettel', 1, '2018-08-10 07:50:45', '2018-08-10 07:50:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `softcard_item`
--

CREATE TABLE `softcard_item` (
  `id` int(11) NOT NULL,
  `softcard_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` decimal(12,4) NOT NULL,
  `sku` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `softcard_item`
--

INSERT INTO `softcard_item` (`id`, `softcard_id`, `name`, `value`, `sku`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(15, 23, 'viettel100k', '10000.0000', 'viettel_10', 0, 1, '2018-08-10 07:50:45', '2018-08-10 07:50:45'),
(16, 23, 'viettel50k', '50000.0000', 'viettel_50', 0, 1, '2018-08-13 04:48:16', '2018-08-13 04:48:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `softcard_item_discount`
--

CREATE TABLE `softcard_item_discount` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `value` decimal(12,4) NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `softcard_item_discount`
--

INSERT INTO `softcard_item_discount` (`id`, `item_id`, `group_id`, `value`, `status`, `created_at`, `updated_at`) VALUES
(25, 15, 4, '1.0000', 1, '2018-08-10 07:50:45', '2018-08-10 07:50:45'),
(26, 15, 5, '1.0000', 1, '2018-08-10 07:50:45', '2018-08-10 07:50:45'),
(27, 16, 4, '0.0000', 1, '2018-08-13 04:48:16', '2018-08-13 04:48:16'),
(28, 16, 5, '0.0000', 1, '2018-08-13 04:48:16', '2018-08-13 04:48:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `softcard_item_price`
--

CREATE TABLE `softcard_item_price` (
  `id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `price` decimal(12,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `softcard_item_price`
--

INSERT INTO `softcard_item_price` (`id`, `item_id`, `currency_id`, `price`, `created_at`, `updated_at`) VALUES
(11, 15, 1, '10000.0000', '2018-08-10 07:50:45', '2018-08-10 07:50:45'),
(12, 15, 2, '5.0000', '2018-08-10 07:50:45', '2018-08-10 07:50:45'),
(13, 16, 1, '50000.0000', '2018-08-13 04:48:16', '2018-08-13 04:48:16'),
(14, 16, 2, NULL, '2018-08-13 04:48:16', '2018-08-13 04:48:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `softcard_orders`
--

CREATE TABLE `softcard_orders` (
  `id` int(11) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `softcard_orders`
--

INSERT INTO `softcard_orders` (`id`, `order_no`, `transaction_id`, `product`, `product_sku`, `qty`, `discount`, `subtotal`, `user`, `user_info`, `order_status`, `payment_status`, `cart_content`, `created_at`, `updated_at`) VALUES
(1, 'S153412427575609', NULL, 'viettel100k', NULL, 1, 0, 10000, 4, 'dsfdsafdsa', 'pending', 'none', '{\"4b99da3f52d061ecc4827c21e0715420\":{\"rowId\":\"4b99da3f52d061ecc4827c21e0715420\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"1\",\"price\":10000,\"options\":{\"discount\":0},\"tax\":0,\"subtotal\":10000}}', '2018-08-13 01:37:55', '2018-08-13 01:37:55'),
(2, 'S153412482432102', NULL, 'viettel100k', NULL, 1, 0, 10000, 4, 'dsfdsafdsa', 'pending', 'none', '{\"4b99da3f52d061ecc4827c21e0715420\":{\"rowId\":\"4b99da3f52d061ecc4827c21e0715420\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"1\",\"price\":10000,\"options\":{\"discount\":0},\"tax\":0,\"subtotal\":10000}}', '2018-08-13 01:47:04', '2018-08-13 01:47:04'),
(3, 'S153412489836486', '191', 'viettel100k', NULL, 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 01:48:18', '2018-08-13 01:48:18'),
(4, 'S153412690857791', '192', 'viettel100k', NULL, 2, 1, 19800, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"2\",\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":19800}}', '2018-08-13 02:21:48', '2018-08-13 02:21:48'),
(5, 'S153413012419037', '193', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 03:15:24', '2018-08-13 03:15:24'),
(6, 'S153413063689842', '194', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 03:23:56', '2018-08-13 03:23:56'),
(7, 'S153413070923501', '195', 'viettel100k', 'viettel_10', 2, 1, 19800, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"2\",\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":19800}}', '2018-08-13 03:25:09', '2018-08-13 03:25:09'),
(8, 'S153413230648296', '196', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"1\",\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 03:51:46', '2018-08-13 03:51:46'),
(9, 'S153413519943266', '197', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"1\",\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 04:39:59', '2018-08-13 04:39:59'),
(10, 'S153413551415341', '198', 'viettel100k', 'viettel_10', 3, 1, 29700, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":\"3\",\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":29700}}', '2018-08-13 04:45:14', '2018-08-13 04:45:14'),
(13, 'S153413582649692', '199', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900},\"d292ae60bc9af97f3aa406a59513e917\":{\"rowId\":\"d292ae60bc9af97f3aa406a59513e917\",\"id\":\"viettel_50\",\"name\":\"viettel50k\",\"qty\":1,\"price\":50000,\"options\":{\"discount\":\"0\"},\"tax\":0,\"subtotal\":50000}}', '2018-08-13 04:50:26', '2018-08-13 04:50:26'),
(14, 'S153413582649692', '199', 'viettel50k', 'viettel_50', 1, 0, 50000, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900},\"d292ae60bc9af97f3aa406a59513e917\":{\"rowId\":\"d292ae60bc9af97f3aa406a59513e917\",\"id\":\"viettel_50\",\"name\":\"viettel50k\",\"qty\":1,\"price\":50000,\"options\":{\"discount\":\"0\"},\"tax\":0,\"subtotal\":50000}}', '2018-08-13 04:50:26', '2018-08-13 04:50:26'),
(15, 'S153413601454085', '200', 'viettel50k', 'viettel_50', 2, 0, 100000, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"d292ae60bc9af97f3aa406a59513e917\":{\"rowId\":\"d292ae60bc9af97f3aa406a59513e917\",\"id\":\"viettel_50\",\"name\":\"viettel50k\",\"qty\":\"2\",\"price\":50000,\"options\":{\"discount\":\"0\"},\"tax\":0,\"subtotal\":100000},\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 04:53:34', '2018-08-13 04:53:35'),
(16, 'S153413601454085', '200', 'viettel100k', 'viettel_10', 1, 1, 9900, 4, 'dsfdsafdsa', 'Paid', 'success', '{\"d292ae60bc9af97f3aa406a59513e917\":{\"rowId\":\"d292ae60bc9af97f3aa406a59513e917\",\"id\":\"viettel_50\",\"name\":\"viettel50k\",\"qty\":\"2\",\"price\":50000,\"options\":{\"discount\":\"0\"},\"tax\":0,\"subtotal\":100000},\"b1f8c6c643771f6c6724cc09a56c0b3a\":{\"rowId\":\"b1f8c6c643771f6c6724cc09a56c0b3a\",\"id\":\"viettel_10\",\"name\":\"viettel100k\",\"qty\":1,\"price\":9900,\"options\":{\"discount\":\"1\"},\"tax\":0,\"subtotal\":9900}}', '2018-08-13 04:53:34', '2018-08-13 04:53:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stockcards`
--

CREATE TABLE `stockcards` (
  `id` int(11) NOT NULL,
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
  `order_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stockcards`
--

INSERT INTO `stockcards` (`id`, `name`, `item_sku`, `serial`, `code`, `expire`, `username`, `status`, `order_no`, `sold_user`, `sold_date`, `created_at`, `updated_at`, `admin_note`, `order_id`) VALUES
(33, 'Thẻ Viettel 100.000đ', '100.000đ', 'wqewqe', 'eyJpdiI6IlNDcmU5ajJPME85cWJOQUJVSExwaGc9PSIsInZhbHVlIjoiREV0Tk1HT095RURxcjdmWjVjWGJPUT09IiwibWFjIjoiYjhiNTIwODQwOWFlNzkxMGJlMzhmMzEzOTQ1MGM3YmM3YzQ5YjkyOTVkMDI0NTE5NzAzNmJkOWRkZjQ0ZTkyZiJ9', 'N/A', 'admin', 0, NULL, NULL, NULL, '2018-08-03 08:50:39', '2018-08-03 08:50:39', '', ''),
(34, 'Thẻ Viettel 100.000đ', '100.000đ', 'ewqe', 'eyJpdiI6ImNmcGs1d2Q1VW0zOXRpMmtGVEYzaHc9PSIsInZhbHVlIjoiVHM0ekNuXC9SZUJpN2ZUQUJWVlF1emc9PSIsIm1hYyI6Ijk0NzNhMDlhODZmZjUwNGUzZDg3MTZkNWNmOTVlMTQ0MmUyNzhhNzk1NWM1ODMyZDMwYjM2MzRjYjI4YjE3M2YifQ==', 'N/A', 'admin', 0, NULL, NULL, NULL, '2018-08-03 08:50:39', '2018-08-03 08:50:39', '', ''),
(35, '23 viettel_10', 'viettel_10', '123456789', 'eyJpdiI6IlJMV2Q0MUtJU0tjMVk4a29UamxEbVE9PSIsInZhbHVlIjoicXpSU2duNG56YW80eitONXFWd0poeHZZVTliakFhbFJyekxqSzhOUUh4ST0iLCJtYWMiOiJmOWYxNGQ4ZWU3ZjM0MGJiMTc1MmJiZDRiNDlhNTY1NThiOWFjMGJjNmZmYTc5MGI0NDI5MDk3NjkzODVhODg1In0=', 'N/A', 'admin', 1, NULL, NULL, NULL, '2018-08-13 03:00:43', '2018-08-13 04:34:40', '', ''),
(36, 'the viettel viettel_10', 'viettel_10', '0123456789', 'eyJpdiI6InMzVWpZQXJRRERxQWJ4cVwvQ3lxZUx3PT0iLCJ2YWx1ZSI6IkFqRlpZUFhwRkc3dmNBWTJcL1FUeWxCekdDdmVIMW1Rem5NXC93NnFzVzkxdz0iLCJtYWMiOiJlMGIzM2QyMTFjYTZhYmQxZGM4NzY5NWJjYmUwYTBhNWJjMWFiYmYzNDdhOWQ4NTU0MTZlZTA4MmFjZDQ1MWRjIn0=', 'N/A', 'admin', 1, 'S153413519943266', 4, '2018-08-13 04:39:59', '2018-08-13 03:04:43', '2018-08-13 04:39:59', '', ''),
(37, 'the viettel viettel_10', 'viettel_10', '0123456', 'eyJpdiI6IjY1ZHVVUlh1SjllQ3F4alA1VTFOS2c9PSIsInZhbHVlIjoiZnhOYjJzWmt6Q1RRQlg5eStLTGNuZz09IiwibWFjIjoiMjQ4NDc2NDZlMWYwNzIzYmQ5ZGZmMTgzOGFkZjc2N2Y1OTZiYWVmMjQzODAzMDQwYTg1ZjFkMjhhZjUzZDI4MCJ9', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 04:45:14', '2018-08-13 04:44:23', '2018-08-13 04:45:14', '', ''),
(38, 'the viettel viettel_10', 'viettel_10', '0123457', 'eyJpdiI6Ild4a3JmcFIyd3J2K1wvQTdTMjhXSkhBPT0iLCJ2YWx1ZSI6Imlpc0hxSG9cL010MWhVc2ozVkl4elBRPT0iLCJtYWMiOiJjMTVjMGUzZjRkYWRhMzAwZDM2ZmZhMzYzZmJmZTUwNGZhOTM5MzBjZWQ5Mzk5YzVjZWQxNjA4YWEwNDk2Y2M3In0=', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 04:45:14', '2018-08-13 04:44:23', '2018-08-13 04:45:14', '', ''),
(39, 'the viettel viettel_10', 'viettel_10', '0258369', 'eyJpdiI6InFBSzNqSVBxUHhIZitVenpvSnl5U3c9PSIsInZhbHVlIjoiWFh5Yyt4TEpWMUlqZUpJUHo0U2hjUT09IiwibWFjIjoiNmQzMTJlZjMyNTYzMjI1NWY1NGZjNGUxOTI2YzZmY2U1MDUzM2JkYmQwOTVhY2E3ZTE0NTFiYWJlNjI5ZjBkNyJ9', 'N/A', 'admin', 1, 'S153413551415341', 4, '2018-08-13 04:45:14', '2018-08-13 04:44:23', '2018-08-13 04:45:14', '', ''),
(40, 'the viettel viettel_10', 'viettel_10', '01470258', 'eyJpdiI6IkcxTlVIZjJ0a2c1Tmh6dTlZOEFEWmc9PSIsInZhbHVlIjoiREFSV3NqdGMzRnBhXC9tdmFDZVhkczM0bWdVXC96cVhGZzQ4SmNDRnorazVNPSIsIm1hYyI6ImI4ZmMwYWFkMmQyNDhmNmM0MmMwNjU1NTFlNjQ1MzY4NDM3ZDBmMDA2NmQwMmQ3YmVkZTcwYjUzOTJmMTg1NWUifQ==', 'N/A', 'admin', 1, 'S153413582649692', 4, '2018-08-13 04:50:26', '2018-08-13 04:44:23', '2018-08-13 04:50:26', '', ''),
(41, 'the viettel viettel_10', 'viettel_10', '0123562', 'eyJpdiI6ImdYRDBTVHAzd0R6R0t2RFhwT2Z1Tmc9PSIsInZhbHVlIjoiaWNwZnFtQ3RLT0xaMWVFXC9UZ2pLdWc9PSIsIm1hYyI6IjEzZmExYWFlMDkzZTI3MTQ4YTk4NDVkYjQwNzMxMDk1YzBhYTg1ZmVkZTliMDQwNDRjNWY3YzViZGMyNTZiZDUifQ==', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 04:53:35', '2018-08-13 04:44:23', '2018-08-13 04:53:35', '', ''),
(42, 'the viettel viettel_50', 'viettel_50', '023690', 'eyJpdiI6IlR2VWlIMjd3Q2dxbUY1NlhBTWFjSHc9PSIsInZhbHVlIjoiT1lXN0diampyR1pLOGZcL2o2cjVEVFE9PSIsIm1hYyI6ImM2ZjE3MTAyZTg2ZjMwOWRhMjZmMmFhYmIwZWZiNzYzYzQwZjYxODBkOTlhZTBhMTI2MThiZWMxNThlMmM5ZjMifQ==', 'N/A', 'admin', 1, 'S153413582649692', 4, '2018-08-13 04:50:26', '2018-08-13 04:50:12', '2018-08-13 04:50:26', '', ''),
(43, 'the viettel viettel_50', 'viettel_50', '023698', 'eyJpdiI6ImZ6VGMzc3d5aHlKc1wvUUo5QkcyTVdRPT0iLCJ2YWx1ZSI6Ik9LN0R5U0ljNGtSN0NtNGhVTUdDTFE9PSIsIm1hYyI6Ijg1ZTA4YWRkNzQ0Yjg3YTQxZjRkMGIwMjAyMjk4YTIzMmVmMWI4OTBlNWExYTI1MTAzY2U2YWY3OWNiODNkZGQifQ==', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 04:53:35', '2018-08-13 04:50:12', '2018-08-13 04:53:35', '', ''),
(44, 'the viettel viettel_50', 'viettel_50', '025869', 'eyJpdiI6IjdoZXNNT0srRHZNOHlqOFNodjV6VGc9PSIsInZhbHVlIjoiU1orZEJKN3BFU081bnBwaVFPeWhqdz09IiwibWFjIjoiZDM1MWViZjFkODlkODZmZDMzYTkxYzgxNzM1NjA1NDM0OTk5YjA1YzEwMDg0NGE0NTM0N2M4NmM5YTEwOWQ5MyJ9', 'N/A', 'admin', 1, 'S153413601454085', 4, '2018-08-13 04:53:35', '2018-08-13 04:50:12', '2018-08-13 04:53:35', '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stockcards_setting`
--

CREATE TABLE `stockcards_setting` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `provider` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `configs` text COLLATE utf8_unicode_ci,
  `balance` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Số dư của provider',
  `status` int(1) NOT NULL DEFAULT '0',
  `installed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `stockcards_setting`
--

INSERT INTO `stockcards_setting` (`id`, `name`, `provider`, `configs`, `balance`, `status`, `installed`) VALUES
(22, 'Kho thẻ Stock', 'Stock', '[]', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(2) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `code`, `label`, `description`, `author`, `status`, `created_at`, `updated_at`) VALUES
(10, 'samsung', 'Samsung', 'Samsung tivi', 'admin', 1, '2018-07-24 23:06:02', '2018-07-24 23:06:02'),
(11, 'lg', 'LG', 'LG tivi', 'admin', 0, '2018-07-25 01:36:56', '2018-07-25 01:36:56'),
(20, 'apple', 'apple', 'apple', 'admin', 1, '2018-07-26 10:54:56', '2018-07-26 10:54:56'),
(21, 'lg-display', 'lg display', 'lg display', 'admin', 1, '2018-07-26 10:54:56', '2018-07-26 10:54:56'),
(22, 'galaxy', 'Galaxy', 'Galaxy', 'admin', 1, '2018-07-26 11:05:27', '2018-07-26 11:05:27'),
(23, 'galaxy-s8', 'galaxy s8', 'galaxy s8', 'admin', 1, '2018-07-26 11:05:27', '2018-07-26 11:05:27'),
(26, 'new-tag-demo', 'New tag demo', 'New tag demo', 'admin', 1, '2018-07-26 14:27:57', '2018-07-26 14:27:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags_items`
--

CREATE TABLE `tags_items` (
  `id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags_items`
--

INSERT INTO `tags_items` (`id`, `tag_id`, `item_id`, `type`, `created_at`, `updated_at`) VALUES
(25, 22, 8, '1', '2018-07-26 13:12:32', '2018-07-26 13:12:32'),
(26, 23, 8, '1', '2018-07-26 13:12:32', '2018-07-26 13:12:32'),
(27, 10, 8, '1', '2018-07-26 14:27:57', '2018-07-26 14:27:57'),
(32, 26, 5, '1', '2018-07-26 14:43:00', '2018-07-26 14:43:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_code` varchar(20) NOT NULL,
  `module` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(16,8) NOT NULL,
  `fees` decimal(16,8) NOT NULL,
  `total` decimal(16,8) NOT NULL,
  `admin_note` varchar(255) NOT NULL,
  `paygate` varchar(255) NOT NULL,
  `currency_id` varchar(255) NOT NULL,
  `currency_code` varchar(255) NOT NULL,
  `from_wallet` varchar(100) NOT NULL,
  `to_wallet` varchar(100) NOT NULL,
  `checksum` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `creator` int(11) NOT NULL,
  `creator_info` text NOT NULL,
  `ipaddress` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expired_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_code`, `module`, `description`, `amount`, `fees`, `total`, `admin_note`, `paygate`, `currency_id`, `currency_code`, `from_wallet`, `to_wallet`, `checksum`, `status`, `creator`, `creator_info`, `ipaddress`, `created_at`, `updated_at`, `expired_at`) VALUES
(207, 'T15341504841492', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', 'd4dd3c5d70ef94d220a1bad5f1f7ec7c', 'Paid', 1, 'admin', NULL, '2018-08-13 08:54:44', '2018-08-13 08:54:44', NULL),
(208, 'T15341506082851', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', 'f91ffa8ffd1ffd47eea9e6b64fee2808', 'Paid', 1, 'admin', NULL, '2018-08-13 08:56:48', '2018-08-13 08:56:48', NULL),
(209, 'T15341506429370', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', '4e2962a281cc218cf76f95f6ab33ce4b', 'Paid', 1, 'admin', NULL, '2018-08-13 08:57:22', '2018-08-13 08:57:22', NULL),
(210, 'T15341506793456', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', 'c7bfd9302798f433574d04ffd3968bc9', 'Paid', 1, 'admin', NULL, '2018-08-13 08:57:59', '2018-08-13 08:57:59', NULL),
(213, 'T15341510134260', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', '048010c29de462a0c609fd81529b635c', 'Paid', 1, 'admin', NULL, '2018-08-13 09:03:33', '2018-08-13 09:03:33', NULL),
(214, 'T15341510919239', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', '9bf0fb4c9071df463447f3959c1aebe2', 'Paid', 1, 'admin', NULL, '2018-08-13 09:04:51', '2018-08-13 09:04:51', NULL),
(215, 'T15341511361962', 'minusBalance', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '006116807', '001893644', '3f6081316418bf70a17a7b0d349883f6', 'Paid', 1, 'admin', NULL, '2018-08-13 09:05:36', '2018-08-13 09:05:36', NULL),
(216, 'T15341512148358', 'AddBalnce', NULL, '100000.00000000', '0.00000000', '100000.00000000', '', 'WALLET', '1', 'VND', '001893644', '006116807', '38cc7455ab1f93f355186cea08e0b45e', 'Paid', 1, 'admin', NULL, '2018-08-13 09:06:54', '2018-08-13 09:06:54', NULL),
(217, 'T15342287404593', 'AddBalnce', 'Cộng 500k', '500000.00000000', '0.00000000', '500000.00000000', 'Cộng 500k', 'WALLET', '1', 'VND', '001893644', '006116807', 'da826953833d1d5c5059139885adb1df', 'Paid', 1, 'admin', NULL, '2018-08-14 06:39:00', '2018-08-14 06:39:00', NULL),
(219, 'T15342288165350', 'AddBalnce', NULL, '500000.00000000', '0.00000000', '500000.00000000', '', 'WALLET', '1', 'VND', '001893644', '006116807', '72a30764f292a16a91589c33160c18dc', 'Paid', 1, 'admin', NULL, '2018-08-14 06:40:16', '2018-08-14 06:40:16', NULL),
(220, 'T15342288329369', 'AddBalnce', 'dsfsd sdfsd sdf', '50000.00000000', '0.00000000', '50000.00000000', 'dsfsd sdfsd sdf', 'WALLET', '1', 'VND', '001893644', '006116807', '7504b537690d6622c3a14cfb051c1132', 'Paid', 1, 'admin', NULL, '2018-08-14 06:40:32', '2018-08-14 06:40:32', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `caption` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `hash` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `public` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `path`, `extension`, `caption`, `user_id`, `hash`, `public`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '- Quản trị website (1).png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-060737-- Quản trị website (1).png', 'png', '', 1, '21wb6rqlu90fes5takba', 0, NULL, '2018-07-07 23:07:37', '2018-07-07 23:07:37'),
(2, '- Quản trị website.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062446-- Quản trị website.png', 'png', '', 1, 'ocksjtcib59vdkqz5mfb', 0, NULL, '2018-07-07 23:24:46', '2018-07-07 23:24:46'),
(3, 'quantri.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062529-quantri.png', 'png', '', 1, 'uml7g5iehdbsaao4afp0', 0, NULL, '2018-07-07 23:25:29', '2018-07-07 23:25:29'),
(4, 'Flix.png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062920-Flix (1).png', 'png', 'Flix', 1, 'lqdgu9jnd8jxtlxulufe', 0, NULL, '2018-07-07 23:29:20', '2018-07-26 03:26:26'),
(5, 'tải xuống.jpg', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-062936-tải xuống.jpg', 'jpg', 'dsadas', 1, 'edpvbwtg7lga2p4ll19g', 0, NULL, '2018-07-07 23:29:36', '2018-07-08 02:11:18'),
(6, 'dangnhap.pdf', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-095216-dangnhap.pdf', 'pdf', '', 1, '2kemiy7lq8kz6qvhnsqk', 0, '2018-07-18 15:03:11', '2018-07-08 02:52:16', '2018-07-18 15:03:11'),
(7, '- Quản trị website (1) (1).png', 'D:\\OSPanel\\domains\\core.php\\storage\\uploads\\2018-07-08-102440-- Quản trị website (1) (1).png', 'png', '', 1, 'rsbl8ors6kr7o9r3x9sf', 0, NULL, '2018-07-08 03:24:40', '2018-07-08 03:24:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `phone`, `gender`, `group`, `password`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@localhost.com', '123456789', 'male', 4, '$2y$10$NU6Ga/zsVoj1a/YbFyIIOulR27bdBymgX3xjsCZbDdeuaUaTwUN4e', 'H80RPv2WOSCFfeSnMpZUlegZ6xcWTyUvZNEZKg0ucaJKPcqYWKPgAoBQ5C4C', 1, '2018-06-21 09:27:42', '2018-07-28 00:12:41'),
(2, 'duong', 'Duong Tuong Quan', 'duong@localhost.com', '234546', 'male', 4, '$2y$10$RIJOBJ3oBMooZ0JI6QLWw.00QSlOv5GMQP/9hK0YutpFJTpHOLsgi', 'lIRYcA4rRNQ8RfZaQ5eem4FQyFL9kFkWuJF5SUz29ZTpHoHPDCziwF2gjcFM', 1, '2018-06-23 07:22:42', '2018-06-30 18:36:04'),
(4, 'dsfdsafdsa', 'fdsafdsa', 'admin@localhostdas.com', '0123456', 'male', 5, '$2y$10$bE8boykW4AyDtbSQ8pzGz.U7x/6SCbIvv0nVlUXk.fdQrZvTHRS1K', 'exeRScHWRAKkSAoWy2aiSHrOGOMjT846xAEwNkg1bhnfStb6M9FZdNjeL1R6', 1, '2018-07-25 21:42:06', '2018-07-25 21:48:39'),
(15, NULL, 'Duongnguyen', NULL, '012345677', NULL, 4, '$2y$10$9RahHbICLVC06ylAICFZc.4Wm0XL69JifrQNi27co8hTU4.oSaSmy', 'z5ELQbgPqy3qjd2we9knumnbJlPPqXiqAHUT0qdxw3ZPbhEm5c54Dcl5nZ6T', 0, '2018-08-09 07:21:47', '2018-08-09 07:21:47'),
(16, NULL, 'Duong', NULL, '012345655', NULL, 4, '$2y$10$dl5injCnkdrKZjeNt3qJRebm1KRxYg8TMma6OT8eVdpv375tzxrqm', NULL, 0, '2018-08-10 10:12:54', '2018-08-10 10:12:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `number` varchar(15) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `currency_code` varchar(5) NOT NULL,
  `user` int(11) NOT NULL,
  `balance` text,
  `balance_decode` decimal(16,8) NOT NULL,
  `pending_balance` decimal(16,8) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wallets`
--

INSERT INTO `wallets` (`id`, `number`, `currency_id`, `currency_code`, `user`, `balance`, `balance_decode`, `pending_balance`, `checksum`, `status`, `created_at`, `updated_at`) VALUES
(16, '001893644', 1, 'VND', 1, 'eyJpdiI6Im1qdTJUZ254SUVqSnJQMFwvMlYyYUZ3PT0iLCJ2YWx1ZSI6IkJiMFRDTkdualplaTJ4bVR4cEhXNHc9PSIsIm1hYyI6ImEwODIxYzQ4MDJjYWE3MDIyNzA3MTQ0MjMwYjk0ZTA0ZWY4ZmI5NmNkMDcyZGEzZmY3ZThmYTY5OWRjNjdlNGUifQ==', '303600.00000000', '1000000.00000000', '97d2e646f40d6d6fc57945fe7c5a5a8d', 1, '2018-08-14 06:40:32', '2018-08-11 06:56:43'),
(17, '007793845', 1, 'VND', 4, 'eyJpdiI6IkJjNlVnREZjdG1nVnRBWWV6c0F6MHc9PSIsInZhbHVlIjoiUXpqVmJQUlpTWndFMk5KMjNyYUdyUT09IiwibWFjIjoiM2JjMWFlNzBhZWNlYzQwZGJlNWI0NGQyMmU2NzJmNTIwN2Q4YmNjOGMwNDMwZjA3MzgyMTVjMDk2ODQyNGI0OSJ9', '406400.00000000', '0.00000000', 'bf6f30da70b67ec03210f4f225dd8d84', 1, '2018-08-13 04:53:34', '2018-08-13 04:53:11'),
(18, '006009267', 1, 'VND', 15, 'eyJpdiI6IkF1TUJuaFZmY1ZIRnQ2YzFQUHVXckE9PSIsInZhbHVlIjoiZGxoT1VvS1hMaFZXNDBET0w5bndPdz09IiwibWFjIjoiYWFhNWUwMTdmYmUyNWE5MDY4MGFlZjZhMTZjYjNmYWFmOWNlN2IwNGY2ZDM3NTc5YzI2MmRkNDkyM2I0ZThlOCJ9', '100000.00000000', '0.00000000', 'ee2eee4a15927d2861f71e759c14be43', 1, '2018-08-11 07:00:03', '2018-08-11 07:00:03'),
(19, '006116807', 1, 'VND', 16, 'eyJpdiI6Im1zbmJYWDd2VVl5cjVFRnA2aDBkbFE9PSIsInZhbHVlIjoiM05cL1pvRUowOGRjMVNRdk42TzhqQlE9PSIsIm1hYyI6IjFkN2ZiZGMyNjk4ZTVhMTkzYzJhNzBhMGUzZjY4N2E5N2QyOWEzZjllMmI2NDQ5NTFiMDU3NmMzNTcxZWI1ZGMifQ==', '1350000.00000000', '0.00000000', '6f897ce43607ebe98986fc49cd3b3025', 1, '2018-08-14 06:40:32', '2018-08-13 08:43:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_fees`
--

CREATE TABLE `wallet_fees` (
  `id` int(11) NOT NULL,
  `paygate_code` varchar(50) NOT NULL,
  `group` int(11) NOT NULL DEFAULT '0',
  `fixed_fees` float NOT NULL DEFAULT '0',
  `percent_fees` float NOT NULL DEFAULT '0',
  `min` float NOT NULL DEFAULT '0',
  `max` float NOT NULL DEFAULT '0',
  `delivery_limit` float NOT NULL DEFAULT '0',
  `allow` tinyint(3) UNSIGNED ZEROFILL NOT NULL DEFAULT '000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wallet_fees`
--

INSERT INTO `wallet_fees` (`id`, `paygate_code`, `group`, `fixed_fees`, `percent_fees`, `min`, `max`, `delivery_limit`, `allow`) VALUES
(1, 'WALLET', 5, 0, 0, 0, 0, 0, 000),
(2, 'WALLET', 4, 1, 2, 4, 6, 8, 000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_history`
--

CREATE TABLE `wallet_history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `wallet_number` varchar(20) NOT NULL,
  `amount` decimal(16,8) NOT NULL,
  `fees` decimal(16,8) NOT NULL,
  `total` decimal(16,8) NOT NULL,
  `before_balance` decimal(16,8) NOT NULL,
  `before_balance_checksum` varchar(50) NOT NULL,
  `after_balance` decimal(16,8) NOT NULL,
  `after_balance_checksum` varchar(50) NOT NULL,
  `checksum` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `currency_code` varchar(4) NOT NULL,
  `operation` char(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wallet_history`
--

INSERT INTO `wallet_history` (`id`, `user_id`, `transaction_code`, `wallet_number`, `amount`, `fees`, `total`, `before_balance`, `before_balance_checksum`, `after_balance`, `after_balance_checksum`, `checksum`, `description`, `currency_code`, `operation`, `created_at`, `updated_at`) VALUES
(219, 16, 'T15341511361962', '006116807', '100000.00000000', '0.00000000', '100000.00000000', '300000.00000000', 'a2168f1f3112d05e4d7ccd03345244e5', '200000.00000000', 'c7d175905eda6645ddbab661434ea8aa', 'e63e128c926eeba375414162e0554789', NULL, 'VND', '-', '2018-08-13 09:05:36', '2018-08-13 09:05:36'),
(220, 1, 'T15341511361962', '001893644', '100000.00000000', '0.00000000', '100000.00000000', '1353600.00000000', 'bda6d93d1955a41b6a23175c7f0a17fd', '1453600.00000000', '78174db5e5d066da556b80b715313da0', '737d274d3dbb578e8c8285542e3ae710', NULL, 'VND', '+', '2018-08-13 09:05:36', '2018-08-13 09:05:36'),
(221, 1, 'T15341512148358', '001893644', '100000.00000000', '0.00000000', '100000.00000000', '1453600.00000000', '78174db5e5d066da556b80b715313da0', '1353600.00000000', 'bda6d93d1955a41b6a23175c7f0a17fd', 'c82ff893f3333930c3a6f444a4f6a9d9', NULL, 'VND', '-', '2018-08-13 09:06:54', '2018-08-13 09:06:54'),
(222, 16, 'T15341512148358', '006116807', '100000.00000000', '0.00000000', '100000.00000000', '200000.00000000', 'c7d175905eda6645ddbab661434ea8aa', '300000.00000000', 'a2168f1f3112d05e4d7ccd03345244e5', '73036f9e543fdd03d4aa2bb5d8bbabd4', NULL, 'VND', '+', '2018-08-13 09:06:54', '2018-08-13 09:06:54'),
(223, 1, 'T15342287404593', '001893644', '500000.00000000', '0.00000000', '500000.00000000', '1353600.00000000', 'bda6d93d1955a41b6a23175c7f0a17fd', '853600.00000000', 'f967e25174dde924ca4afed485c4a388', '49a0e2efed10fd9ea8e7f8183ad809b4', 'Cộng 500k', 'VND', '-', '2018-08-14 06:39:00', '2018-08-14 06:39:00'),
(224, 16, 'T15342287404593', '006116807', '500000.00000000', '0.00000000', '500000.00000000', '300000.00000000', 'a2168f1f3112d05e4d7ccd03345244e5', '800000.00000000', 'e69a58ecb709eb642641a3cb900326f8', 'a1b0ae72bb0ec79182d2663e07c51550', 'Cộng 500k', 'VND', '+', '2018-08-14 06:39:00', '2018-08-14 06:39:00'),
(225, 1, 'T15342288165350', '001893644', '500000.00000000', '0.00000000', '500000.00000000', '853600.00000000', 'f967e25174dde924ca4afed485c4a388', '353600.00000000', '3cc308c75bf7dfcc52d48311a883ee7d', '0fc6d2028fea7e57d5d7bd8376aa846b', NULL, 'VND', '-', '2018-08-14 06:40:16', '2018-08-14 06:40:16'),
(226, 16, 'T15342288165350', '006116807', '500000.00000000', '0.00000000', '500000.00000000', '800000.00000000', 'e69a58ecb709eb642641a3cb900326f8', '1300000.00000000', '3269bca6ab2d2dbbd8159037f31e723c', '86145cdc8ca7e85ca3a6b58ce511788f', NULL, 'VND', '+', '2018-08-14 06:40:16', '2018-08-14 06:40:16'),
(227, 1, 'T15342288329369', '001893644', '50000.00000000', '0.00000000', '50000.00000000', '353600.00000000', '3cc308c75bf7dfcc52d48311a883ee7d', '303600.00000000', 'e4cd2d1b0e6daa9ea3e83de035ed8165', '392e1d3c6a432ba7eb2cd106d5063421', 'dsfsd sdfsd sdf', 'VND', '-', '2018-08-14 06:40:32', '2018-08-14 06:40:32'),
(228, 16, 'T15342288329369', '006116807', '50000.00000000', '0.00000000', '50000.00000000', '1300000.00000000', '3269bca6ab2d2dbbd8159037f31e723c', '1350000.00000000', 'a3448ab5da7dfb554268325061f40508', '51a6c23c3bc4fb7f8d2f4a8e9241518e', 'dsfsd sdfsd sdf', 'VND', '+', '2018-08-14 06:40:32', '2018-08-14 06:40:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `wallet_settings`
--

CREATE TABLE `wallet_settings` (
  `id` int(11) NOT NULL,
  `currency_code` varchar(10) DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `wallet_settings`
--

INSERT INTO `wallet_settings` (`id`, `currency_code`, `currency`, `description`) VALUES
(1, 'VND', 1, 'fdsfdas fdsdfdsa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `weblinks`
--

CREATE TABLE `weblinks` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `sort` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chargings`
--
ALTER TABLE `chargings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checksum` (`checksum`);

--
-- Chỉ mục cho bảng `chargings_cards`
--
ALTER TABLE `chargings_cards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chargings_fees`
--
ALTER TABLE `chargings_fees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chargings_orders`
--
ALTER TABLE `chargings_orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Chỉ mục cho bảng `chargings_telco`
--
ALTER TABLE `chargings_telco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Chỉ mục cho bảng `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `currencies_code_unique` (`code`),
  ADD KEY `currencies_status_index` (`status`),
  ADD KEY `currencies_hide_index` (`homepage`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `languages_trans`
--
ALTER TABLE `languages_trans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Chỉ mục cho bảng `localbanks`
--
ALTER TABLE `localbanks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `ltm_translations`
--
ALTER TABLE `ltm_translations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `merchants`
--
ALTER TABLE `merchants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `partner_id` (`partner_id`),
  ADD UNIQUE KEY `partner_key` (`partner_key`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Chỉ mục cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Chỉ mục cho bảng `mtopups`
--
ALTER TABLE `mtopups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mtopup_fees`
--
ALTER TABLE `mtopup_fees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mtopup_telco`
--
ALTER TABLE `mtopup_telco`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `key` (`key`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_1`
--
ALTER TABLE `orders_1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `paygates`
--
ALTER TABLE `paygates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_gallery`
--
ALTER TABLE `product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `sendmail_driver`
--
ALTER TABLE `sendmail_driver`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `driver` (`driver`);

--
-- Chỉ mục cho bảng `sendmail_setting`
--
ALTER TABLE `sendmail_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `softcard`
--
ALTER TABLE `softcard`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `softcard_item`
--
ALTER TABLE `softcard_item`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `softcard_item_discount`
--
ALTER TABLE `softcard_item_discount`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `softcard_item_price`
--
ALTER TABLE `softcard_item_price`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `softcard_orders`
--
ALTER TABLE `softcard_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stockcards`
--
ALTER TABLE `stockcards`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `stockcards_setting`
--
ALTER TABLE `stockcards_setting`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `provider` (`provider`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags_items`
--
ALTER TABLE `tags_items`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_code` (`transaction_code`),
  ADD UNIQUE KEY `checksum` (`checksum`);

--
-- Chỉ mục cho bảng `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Chỉ mục cho bảng `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checksum` (`checksum`),
  ADD UNIQUE KEY `number` (`number`),
  ADD UNIQUE KEY `user` (`user`);

--
-- Chỉ mục cho bảng `wallet_fees`
--
ALTER TABLE `wallet_fees`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `wallet_settings`
--
ALTER TABLE `wallet_settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `weblinks`
--
ALTER TABLE `weblinks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `chargings`
--
ALTER TABLE `chargings`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `chargings_cards`
--
ALTER TABLE `chargings_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `chargings_fees`
--
ALTER TABLE `chargings_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `chargings_orders`
--
ALTER TABLE `chargings_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT cho bảng `chargings_telco`
--
ALTER TABLE `chargings_telco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `languages_trans`
--
ALTER TABLE `languages_trans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `localbanks`
--
ALTER TABLE `localbanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `ltm_translations`
--
ALTER TABLE `ltm_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `merchants`
--
ALTER TABLE `merchants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `mtopups`
--
ALTER TABLE `mtopups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT cho bảng `mtopup_fees`
--
ALTER TABLE `mtopup_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `mtopup_telco`
--
ALTER TABLE `mtopup_telco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT cho bảng `orders_1`
--
ALTER TABLE `orders_1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `paygates`
--
ALTER TABLE `paygates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `product_gallery`
--
ALTER TABLE `product_gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sendmail_driver`
--
ALTER TABLE `sendmail_driver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `sendmail_setting`
--
ALTER TABLE `sendmail_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `softcard`
--
ALTER TABLE `softcard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `softcard_item`
--
ALTER TABLE `softcard_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `softcard_item_discount`
--
ALTER TABLE `softcard_item_discount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `softcard_item_price`
--
ALTER TABLE `softcard_item_price`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `softcard_orders`
--
ALTER TABLE `softcard_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `stockcards`
--
ALTER TABLE `stockcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT cho bảng `stockcards_setting`
--
ALTER TABLE `stockcards_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `tags_items`
--
ALTER TABLE `tags_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT cho bảng `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `wallet_fees`
--
ALTER TABLE `wallet_fees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `wallet_history`
--
ALTER TABLE `wallet_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT cho bảng `wallet_settings`
--
ALTER TABLE `wallet_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `weblinks`
--
ALTER TABLE `weblinks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
