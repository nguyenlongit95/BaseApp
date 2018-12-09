-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 09, 2018 lúc 05:32 AM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `BaseApp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Details` varchar(10000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Linked` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `articles`
--

INSERT INTO `articles` (`id`, `Title`, `Slug`, `Info`, `Details`, `Images`, `Author`, `Linked`, `Status`, `created_at`, `updated_at`) VALUES
(2, 'Hello, i\'m Long', 'hello-im-long', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci aliquam corporis dicta dolor, dolore dolorem eveniet ex facilis magnam molestiae officiis placeat quas quod sapiente sit temporibus velit voluptatibus.</p>', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus adipisci aliquam corporis dicta dolor, dolore dolorem eveniet ex facilis magnam molestiae officiis placeat quas quod sapiente sit temporibus velit voluptatibus.</p>\r\n\r\n<p>orem ipsum dolor sit amet consectetur adipisicing elit. Laborum ipsa repellat accusamus nemo fuga, neque asperiores consectetur tempora necessitatibus minima rem aspernatur. Beatae eius aliquam maxime distinctio id reprehenderit repudiandae.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus nemo ea maiores saepe quo minima, culpa sint incidunt perspiciatis omnis dolore accusamus adipisci quam architecto pariatur natus! Necessitatibus, quibusdam exercitatio</p>', 'Article_etYn430712465_389750054824952_8989623461325661181_n.jpg', 'ThaiLong', 'https://www.facebook.com/profile.php?id=100013698812957', 0, '2018-10-21 08:24:37', '2018-10-21 08:24:37');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `Title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tags` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCategoryBlog` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `Title`, `Info`, `Description`, `Author`, `Tags`, `Image`, `idCategoryBlog`, `created_at`, `updated_at`) VALUES
(1, 'Im a new coder', '<p>nguyenlongit95@gmail.com</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>', 'LongNguyen', 'nguyenlongit95', 'Ei0mhfirstBlog.jpg', 3, NULL, '2018-09-18 20:21:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_blogs`
--

CREATE TABLE `categories_blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `NameCategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories_blogs`
--

INSERT INTO `categories_blogs` (`id`, `NameCategory`, `Info`, `Parent_id`, `created_at`, `updated_at`) VALUES
(2, 'Society', 'Sharing about social issues and social issues', 0, '2018-09-09 07:58:34', '2018-09-09 07:58:34'),
(3, 'programming', ' Share your experiences in computer programming and related technology', 0, '2018-09-09 08:00:30', '2018-09-09 08:00:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories_products`
--

CREATE TABLE `categories_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `NameCategory` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories_products`
--

INSERT INTO `categories_products` (`id`, `NameCategory`, `Info`, `Parent_id`, `created_at`, `updated_at`) VALUES
(1, 'HouseHold', 'Here you will find support products for your beloved home', 0, NULL, '2018-09-08 08:38:35'),
(2, 'Technology', 'iste nulla quia similique veritatis voluptate. Accusantium animi minus recusandae vero. Iste, magnam voluptas.', 0, '2018-09-04 07:37:54', '2018-09-04 07:37:54'),
(3, 'Computer', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, ', 2, NULL, NULL),
(4, 'Television', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, ', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `idBlog` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Author` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Parent_id` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `idBlog`, `idUser`, `Comment`, `Author`, `Parent_id`, `State`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Contrary to popular belief, Lorem Ipsum is not simply random text.', 'NguyenLongIT95', 0, 1, NULL, '2018-09-29 08:35:02'),
(2, 1, 2, 'Bài viết này hay quá ad ơi, cố gắng cho ra nhiều bài hay hơn nhé', 'LongNguyen', 0, 0, NULL, NULL),
(3, 1, 2, '<p>Thế này thì thành Java rồi còn gì!</p>', 'ThanhNhan', 1, 0, '2018-09-10 17:00:00', '2018-09-30 08:05:57'),
(4, 1, 1, 'Bài viết cũng hay nhưng cần thêm nhiều nội dung hơn', 'LongNguyen', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `State` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `Name`, `Email`, `Address`, `Message`, `State`, `created_at`, `updated_at`) VALUES
(1, 'nguyenlongit95', 'nguyenlongit1308@gmail.com', 'Ha Noi', 'Im want build a website!', '1', NULL, '2018-10-07 01:49:04'),
(2, 'nguyenlongit95', 'nguyenlongit1308@gmail.com', 'Ha Noi', 'Im want build a website!', '0', NULL, '2018-10-07 01:48:18');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `custom_properties`
--

CREATE TABLE `custom_properties` (
  `id` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Properties` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `custom_properties`
--

INSERT INTO `custom_properties` (`id`, `idProduct`, `Properties`, `Value`, `created_at`, `updated_at`) VALUES
(1, 1, 'Capacity', '100W', NULL, NULL),
(2, 1, 'Capacity', '100W', NULL, NULL),
(3, 1, 'Capacity', '100W', NULL, NULL),
(4, 1, 'Capacity', '100W', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `image_products`
--

CREATE TABLE `image_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `ImageProduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProduct` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `image_products`
--

INSERT INTO `image_products` (`id`, `ImageProduct`, `idProduct`, `created_at`, `updated_at`) VALUES
(1, 'of1.png', 1, NULL, NULL),
(2, 'of2.png', 2, NULL, NULL),
(3, 'of3.png', 3, NULL, NULL),
(4, 'of4.png', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `info_of_pages`
--

CREATE TABLE `info_of_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `PageName` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Info` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `info_of_pages`
--

INSERT INTO `info_of_pages` (`id`, `PageName`, `Info`, `Value`, `created_at`, `updated_at`) VALUES
(1, 'Abouts', 'Lorem', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,', NULL, NULL),
(2, 'Contact', 'Lorem', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linkeds`
--

CREATE TABLE `linkeds` (
  `id` int(10) UNSIGNED NOT NULL,
  `Linked` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linkeds`
--

INSERT INTO `linkeds` (`id`, `Linked`, `Value`, `created_at`, `updated_at`) VALUES
(1, 'FaceBook', 'https://www.facebook.com/profile.php?id=100013698812957', NULL, NULL),
(2, 'Google', 'https://www.facebook.com/profile.php?id=100013698812957', NULL, NULL),
(3, 'Linked', 'linked.com', NULL, NULL),
(4, 'Courses', 'Courses.com.vn', NULL, NULL);

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
(3, '2018_08_30_095434_create_products_table', 1),
(4, '2018_08_30_095446_create_custom_properties_table', 1),
(5, '2018_08_30_095502_create_image_products_table', 1),
(6, '2018_08_30_095512_create_rattings_table', 1),
(7, '2018_08_30_095533_create_categories_blogs_table', 1),
(8, '2018_08_30_095540_create_blogs_table', 1),
(9, '2018_08_30_095550_create_categories_products_table', 1),
(10, '2018_08_30_095620_create_contacts_table', 1),
(11, '2018_08_30_095626_create_sliders_table', 1),
(12, '2018_08_30_095635_create_linkeds_table', 1),
(13, '2018_08_30_095645_create_info_of_pages_table', 1),
(14, '2018_08_30_095655_create_orders_table', 1),
(15, '2018_08_30_095710_create_order_details_table', 1),
(16, '2018_08_30_095726_create_state_orders_table', 1),
(17, '2018_08_30_100921_create_comments_table', 1),
(18, '2018_08_30_103646_create_token_a_p_is_table', 2),
(19, '2018_09_02_021823_create_articles_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `idUser` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodeOrder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `idUser`, `Name`, `Address`, `Phone`, `Total`, `CodeOrder`, `created_at`, `updated_at`) VALUES
(1, '1', 'Nguyen Cong Thai Long', '<p>Ngoc Truc market</p>', '+84693803548', '300', 'abc123123', NULL, '2018-09-19 01:01:54'),
(2, '1', 'Nguyen Cong Thai Long', 'Ha Noi', '+84693803548', '2', 'abc123123', NULL, NULL),
(3, '1', 'Nguyen Cong Thai Long', 'Ha Noi', '+84693803548', '2', 'abc123123', NULL, NULL),
(4, '1', 'Nguyen Cong Thai Long', 'Ha Noi', '+84693803548', '2', 'abc123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) NOT NULL,
  `idOrder` int(11) NOT NULL,
  `NameProduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `CodeOrder` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `idProduct`, `idOrder`, `NameProduct`, `Quantity`, `Price`, `CodeOrder`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Fan Electric A960', '1', '100', 'abc123123', NULL, NULL),
(2, 1, 1, 'Fan Electric A960', '1', '100', 'abc123123', NULL, NULL),
(3, 1, 1, 'Fan Electric A960', '1', '100', 'abc123123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `NameProduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idCategories` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` int(11) NOT NULL,
  `Sales` int(11) NOT NULL,
  `Info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Description` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `NameProduct`, `idCategories`, `Quantity`, `Price`, `Sales`, `Info`, `Description`, `created_at`, `updated_at`) VALUES
(1, 'Fan Electric A970', 1, 22, 100, 5, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 46 BC, making it over 2000 years old. Richard McClintock,</p>', NULL, '2018-09-13 19:45:03'),
(2, 'Nature 2210', 1, 15, 110, 6, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>', NULL, '2018-09-13 19:51:17'),
(3, 'Pizza Nutrela', 2, 7, 120, 10, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>', NULL, '2018-09-13 19:51:08'),
(4, 'Tomato Lays', 2, 15, 101, 15, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', '<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock,</p>', NULL, '2018-09-13 19:50:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rattings`
--

CREATE TABLE `rattings` (
  `id` int(10) UNSIGNED NOT NULL,
  `idProduct` int(11) NOT NULL,
  `Ratting` int(11) NOT NULL,
  `Info` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rattings`
--

INSERT INTO `rattings` (`id`, `idProduct`, `Ratting`, `Info`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '<p>Sản phẩm này không ổn đâu shop ơi!</p>', NULL, '2018-09-18 06:08:33'),
(2, 1, 4, '<p>Sản phẩm dùng cũng được đó shop</p>', NULL, '2018-09-28 00:52:37'),
(3, 1, 3, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', NULL, NULL),
(4, 2, 1, '<p>Contrary to popular belief, Lorem Ipsum is not simply random text.</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `Sliders` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `Sliders`, `Slogan`, `created_at`, `updated_at`) VALUES
(1, 'nguyenlongit95.jpg', 'nguyenlongit95@gmail.com', NULL, NULL),
(2, 'nguyenlongit95.jpg', 'nguyenlongit95@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `state_orders`
--

CREATE TABLE `state_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `idOrder` int(11) NOT NULL,
  `State` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `state_orders`
--

INSERT INTO `state_orders` (`id`, `idOrder`, `State`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tokenAPIs`
--

CREATE TABLE `tokenAPIs` (
  `id` int(10) UNSIGNED NOT NULL,
  `Partner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Config` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `Level` int(11) NOT NULL COMMENT 'Nếu là 1 thì là admin, 0 thì là User và còn thêm tùy theo yêu cầu',
  `Avatar` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `Level`, `Avatar`, `created_at`, `updated_at`) VALUES
(1, 'nguyenlongit95', 'nguyenlongit95@gmail.com', '$2y$10$jrll1MzPWIlwDhstyVPM2.oXhhWKLxEvdKRerNQAe67FTZcKcxOIC', 1, 'default.png', '2018-09-06 07:27:15', '2018-08-30 14:18:30'),
(2, 'thanhnhan96', 'thanhnhan030796@gmail.com', '$2y$10$xDlpGvtChd0wr/V4E8AeVeC5TjKNqAEiExyD27nuM9I.VXwKTvfi6', 0, 'default.png', '2018-09-06 07:27:28', '2018-08-30 14:18:57'),
(3, 'nguyenlongit1308', 'nguyenlongit1308@gmail.com', '$2y$10$uL6q6ojLI7YOPit1.DbfuuXETAO4uYJXXlwbN1Sjp32vzbjNLnj8K', 0, 'default.png', '2018-09-06 07:27:30', '2018-08-30 14:19:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `widgets`
--

CREATE TABLE `widgets` (
  `id` int(11) NOT NULL,
  `Item` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `Slug` varchar(255) COLLATE ucs2_unicode_ci NOT NULL,
  `idItem` int(11) NOT NULL,
  `Type` int(11) NOT NULL COMMENT 'Quy định loại của widget: 1 là menu, 2 là sidebar, 3 là footermenu v.v...',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories_blogs`
--
ALTER TABLE `categories_blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories_products`
--
ALTER TABLE `categories_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `custom_properties`
--
ALTER TABLE `custom_properties`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `image_products`
--
ALTER TABLE `image_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `info_of_pages`
--
ALTER TABLE `info_of_pages`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linkeds`
--
ALTER TABLE `linkeds`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rattings`
--
ALTER TABLE `rattings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `state_orders`
--
ALTER TABLE `state_orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tokenAPIs`
--
ALTER TABLE `tokenAPIs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `categories_blogs`
--
ALTER TABLE `categories_blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `categories_products`
--
ALTER TABLE `categories_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `custom_properties`
--
ALTER TABLE `custom_properties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `image_products`
--
ALTER TABLE `image_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `info_of_pages`
--
ALTER TABLE `info_of_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `linkeds`
--
ALTER TABLE `linkeds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `rattings`
--
ALTER TABLE `rattings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `state_orders`
--
ALTER TABLE `state_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tokenAPIs`
--
ALTER TABLE `tokenAPIs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
