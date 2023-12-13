-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 11, 2023 lúc 10:24 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `exam_2023`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `category_name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category_note` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `category_note`) VALUES
(7, 'Laptops', ''),
(8, 'Smartphones', ''),
(9, 'Watchs', ''),
(10, 'Headphones', ''),
(11, 'Loudspeakers', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `category_id` int NOT NULL,
  `price` int NOT NULL,
  `image` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `feature` tinyint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `price`, `image`, `description`, `feature`, `created_at`) VALUES
(1, 'Samsung Galaxy Z Flip4 128GB', 8, 20999000, 'samsungzflip.png', 'Samsung Galaxy Z Flip4 128GB  has officially launched into the technology market, marking Samsung\'s return on the user-oriented path of convenience on folding phones. With increased durability and beautiful design, Flip4 becomes one of the bright spots for the second half of 2022.', 1, '2023-12-03 09:07:17'),
(2, 'iPhone 14 Pro Max 1TB', 8, 40000000, 'ip141tb.png', 'iPhone 14 Pro Max 1TB is the most advanced version of the phone that Apple has launched at the event to introduce new products for 2022. Inheriting all the world\'s leading technologies, the device promises to bring an experience. The best use from gaming to photography, deserves to be the most worth buying phone on the current market.', 1, '2023-12-03 09:07:34'),
(3, 'OPPO Reno8 Pro 5G', 8, 18000000, 'opporeno8.png', 'OPPO Reno8 Pro 5G\r\nMediaTek Dimensity 8100 Max chip with 8 cores\r\n\r\nRAM: 12 GB\r\n\r\nCapacity: 256 GB\r\n\r\nRear camera: Main 50 MP & Secondary 8 MP, 2 MP\r\n\r\nFront camera: 32 MP\r\n\r\nBattery 4500 mAh, Charge 80 W\r\n', 1, '2023-12-03 11:16:33'),
(4, 'Nokia G21 Phone Configuration', 8, 3890000, 'Nokia.png', 'Nokia G21 is the next generation of G series manufactured by Nokia with outstanding improvements such as large screen size, stable performance, providing a smooth experience on daily tasks and long usage time. thanks to the huge battery built into the phone ', 0, '2023-12-03 09:07:45'),
(5, 'Xiaomi Redmi Note 11 (4GB/64GB)', 8, 4390000, 'xiaomi.png', 'Phone Xiaomi Redmi Note 11 (4GB/64GB)\r\nSnapdragon 680 Chip\r\n\r\nRAM: 4 GB\r\n\r\nCapacity: 64 GB\r\n\r\nRear camera: Main 50 MP & Secondary 8 MP, 2 MP, 2 MP\r\n\r\nFront camera: 13 MP\r\n\r\nBattery 5000 mAh, Charge 33 W', 0, '2023-12-03 11:17:08'),
(6, 'Mozard BT100 Bluetooth Speaker Black', 11, 895000, 'Mozard.png', 'Solid design, elegant black color\r\nThe Mozard BT100 Bluetooth speaker has a simple design, curved corners embrace the speaker body for a complete design, uses fabric to filter the sound and is covered with leather around to avoid fingerprints. Small Bluetooth speaker form , easy to carry to listen to music for more interesting and exciting trips. \r\n\r\nThe device uses electricity directly , no need to care about the issue of running out of battery, as long as there is a power source, you can connect and use it right away', 1, '2023-12-03 09:09:30'),
(7, 'JBL Clip 3 . Bluetooth Speaker ', 11, 925000, 'JBL.png', 'Compact design, weighing only 200g, with a convenient keychain,  JBL Clip 3 Bluetooth speaker  is an ideal accessory for you to bring to every party.', 1, '2023-12-03 09:09:38'),
(8, 'Mozard H8030D Bluetooth Speaker Black', 11, 510000, 'MozardH8030D.png', 'The Mozard Bluetooth speaker has a compact, sturdy design that is easy to carry with you when traveling, picnicking,...', 1, '2023-12-03 09:09:44'),
(9, 'Mozard E7 Red Bluetooth Speaker ', 11, 420000, 'MozardE7Red.png', 'Mozard E7 Red Bluetooth speaker possesses a compact design, easy to move, easy to carry, attractive sound, diverse connectivity ports, ...', 0, '2023-12-03 09:09:49'),
(10, 'JBL Partybox 110 . Bluetooth Speaker', 11, 11900000, 'JBL110.png', 'JBL Partybox 110 Bluetooth speaker offers a luxurious design, outstanding LED lights, vivid sound quality, ... promises to enhance your music experience.', 1, '2023-12-03 09:09:54'),
(11, 'Samsung Galaxy Book Pro 15 inch 2021 ', 7, 899000, 'SsGBook.png', 'The first thing that impresses when holding the device in hand is its thinness. With the 13.3-inch version weighing 0.87kg and the 15.6-inch version being 1.05kg, a great weight compared to today\'s laptops.', 1, '2023-12-03 09:10:08'),
(12, 'Laptop Apple MacBook Pro 16 M1 Max 2021 ', 7, 82990000, 'Macbook168tr.png', 'Impressive with the  Apple MacBook Pro 16 M1 Max 2021 wearing a unique \"new suit\", attracting all eyes with the notch screen that first appeared in the Mac line and hidden inside is a powerful configuration set. great from the advanced M1 Max chip.', 1, '2023-12-03 09:10:20'),
(13, 'Xiaomi 12T 128GB', 8, 129000000, 'Xiaomi12T.png', 'Finally, Xiaomi 12T 256GB has also launched with a break in features when equipped with a new generation high-end chip from MediaTek, promising to be a device that serves well for gaming or handling tasks. High-quality graphics. In addition, the phone has been upgraded with a quality camera-like screen to meet all your usage needs.', 1, '2023-12-03 09:10:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `role_id` int NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `fullname`, `email`, `role_id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '', 1),
(10, 'luan', 'e10adc3949ba59abbe56e057f20f883e', 'thành luân', 'vothanhluan651@gmail.com', 0),
(11, 'admin2', 'c84258e9c39059a89ab77d846ddab909', 'Thành luân', '', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
