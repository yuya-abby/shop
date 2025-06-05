-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-04 17:59:21
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `aa`
--

CREATE TABLE `aa` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_text` text NOT NULL,
  `c_money` int(50) NOT NULL,
  `c_img` text NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pt_name` text NOT NULL,
  `add_time` datetime NOT NULL DEFAULT current_timestamp(),
  `up_time` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `aa`
--

INSERT INTO `aa` (`c_id`, `c_name`, `c_text`, `c_money`, `c_img`, `pt_id`, `pt_name`, `add_time`, `up_time`) VALUES
(40, '男裝1', '', 399, 'img/衣服男1.jpg', 1, '', '2025-06-04 14:55:19', '2025-06-04 14:55:19'),
(42, 'AA', 'asfdsdf', 52, 'img/衣服男2.jpg', 1, '', '2025-06-04 18:25:00', '2025-06-04 18:25:00'),
(43, 'AA', 'sddf', 2000, 'img/手機殼4.jpg', 4, '', '2025-06-04 18:26:52', '2025-06-04 18:26:52');

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `addproduct_id` int(11) NOT NULL,
  `addproduct_name` varchar(20) NOT NULL,
  `addproduct_money` int(11) NOT NULL,
  `addproduct_count` int(11) NOT NULL,
  `addproduct_img` text NOT NULL,
  `acc` varchar(30) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `car`
--

INSERT INTO `car` (`id`, `addproduct_id`, `addproduct_name`, `addproduct_money`, `addproduct_count`, `addproduct_img`, `acc`, `price`, `quantity`, `added_date`) VALUES
(1, 7, '手機殼3', 199, 1, 'img/手機殼3.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(2, 7, '手機殼3', 398, 2, 'img/手機殼3.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(3, 19, '男裝3', 599, 1, 'img/衣服男3.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(4, 18, '男裝2', 599, 1, 'img/衣服男2.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(5, 7, '手機殼3', 199, 1, 'img/手機殼3.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(6, 16, '女裝4', 599, 1, 'img/衣服女4.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(7, 2, '口紅2', 299, 1, 'img/口紅2.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(8, 18, '男裝2', 599, 1, 'img/衣服男2.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(10, 20, '男裝4', 1198, 2, 'img/衣服男4.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(13, 20, '男裝4', 599, 1, 'img/衣服男4.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(14, 18, '男裝2', 599, 1, 'img/衣服男2.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(15, 18, '男裝2', 1198, 2, 'img/衣服男2.jpg', 'aaaa', 0, 0, '2025-05-29 14:59:02'),
(16, 5, '手機殼1', 0, 0, 'img/手機殼1.jpg', 'aaaa', 199, 1, '2025-05-29 15:08:41'),
(17, 14, '女裝2', 599, 1, 'img/衣服女2.jpg', 'aaaa', 0, 0, '2025-05-29 15:12:36');

-- --------------------------------------------------------

--
-- 資料表結構 `countmoney2`
--

CREATE TABLE `countmoney2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `subtotal` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_list` text NOT NULL,
  `status` varchar(200) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `countmoney2`
--

INSERT INTO `countmoney2` (`id`, `name`, `total`, `subtotal`, `quantity`, `product_list`, `status`, `order_date`, `account`, `payment`, `address`, `phone`) VALUES
(6, 'aaa', 599, '', '', '男裝4 x 1', '', '2025-06-01 20:25:24', 'aaaa', '貨到付款', 'fdsfds', '0918381246'),
(8, 'aaa', 199, '', '', '手機殼2 x 1', '1', '2025-06-04 14:15:02', 'aaaa', '貨到付款', 'lklj;jl;l', 'adsffdas'),
(52, 'aaa', 123, '', '', 'sfdaaaa x 1', '已出貨', '2025-06-04 19:45:45', 'aaaa', '貨到付款', 'wf', 'sdfasda'),
(53, 'aaa', 123, '', '', 'sfdaaaa x 1', '0', '2025-06-04 19:07:04', 'aaaa', '貨到付款', 'dsv', 'dvs'),
(56, 'aaa', 123, '', '', 'Array', '', '2025-06-04 00:01:12', 'aaaa', '貨到付款', 'aefsd', 'sdfasda'),
(57, 'aaa', 123, '', '', 'sfdaaaa x 1', '', '2025-06-04 00:01:36', 'aaaa', '貨到付款', 'aefsd', 'sdfasda'),
(58, 'aaa', 123, '', '', 'sdsfd x 1', '', '2025-06-04 00:02:07', 'aaaa', '貨到付款', 'gyugiyukgykyu', 'sdfasda'),
(59, 'aaa', 861, '', '', 'sfdaaaa x 7', '', '2025-06-04 13:27:32', 'aaaa', '貨到付款', 'aer', 'sdfasda'),
(60, '賣家', 123, '', '', 'sfdaaaa x 3', '已出貨', '2025-06-04 19:49:34', 'bba', '貨到付款', 'thhghth', '.912-345-678'),
(61, '賣家', 399, '', '', '男裝1 x 1', '', '2025-06-04 14:55:41', 'bba', '貨到付款', 'sdfaasdf', 'afds'),
(62, '賣家', 399, '', '', '男裝1 x 1', '', '2025-06-04 14:56:59', 'bba', '貨到付款', 'lklj;jl;l', '0912-345-678'),
(63, '賣家', 123, '', '', 'AAA x 3', '', '2025-06-04 17:11:39', 'bba', '貨到付款', 'njnmnn.', 'adsfas'),
(65, '賣家', 199, '', '', '口紅1 x 5', '', '2025-06-04 17:15:14', 'bba', '貨到付款', '963', '963'),
(66, '賣家', 123, '', '', 'AAA x 3', '', '2025-06-04 17:17:45', 'bba', '貨到付款', 'sdf', 'adsf'),
(67, '賣家', 123, '', '', 'AAA x 1', '', '2025-06-04 17:21:27', 'bba', '貨到付款', 'aesfd', 'afds'),
(68, '賣家', 123, '', '', 'AAA x 1', '', '2025-06-04 17:22:20', 'bba', '貨到付款', 'aesfd', 'afds'),
(69, '賣家', 123, '', '', 'AAA x 1', '', '2025-06-04 17:22:40', 'bba', '貨到付款', 'aesfd', 'afds'),
(70, '賣家', 199, '', '', '口紅1 x 5', '', '2025-06-04 18:37:41', 'bba', '貨到付款', '123', 'fdsa'),
(71, '賣家', 1198, '', '', '男裝2 x 2', '', '2025-06-04 18:39:12', 'bba', '貨到付款', 'sdaffsdaf', 'asdfas'),
(72, '賣家', 599, '', '', '男裝4 x 1', '', '2025-06-04 19:00:24', 'bba', '貨到付款', 'sdfasdasdaf', 'adsffdas'),
(73, '賣家', 599, '', '', '女裝2 x 1', '', '2025-06-04 19:05:44', 'bba', '貨到付款', 'afds', 'dasf'),
(74, 'aaa', 199, '', '', '口紅1 x 1', '', '2025-06-04 19:29:37', 'aaaa', '貨到付款', 'asdf;sadjfklmdsa', 'adsfas'),
(75, 'aaa', 52, '', '', 'AA x 1', '', '2025-06-04 23:06:28', 'aaaa', '貨到付款', 'sdafds', 'sdfasda'),
(76, 'aaa', 52, '', '', 'AA x 2', '', '2025-06-04 23:07:17', 'aaaa', '貨到付款', 'dasfsfda', 'dasfdas'),
(77, 'aaa', 52, '', '', 'AA x 3', '', '2025-06-04 23:09:13', 'aaaa', '貨到付款', '362323', '232213'),
(78, 'aaa', 52, '', '', 'AA x 1', '', '2025-06-04 23:33:47', 'aaaa', '貨到付款', 'fdas', 'sdfasda'),
(79, 'aaa', 52, '', '', 'AA x 1', '', '2025-06-04 23:33:59', 'aaaa', '貨到付款', 'fdas', 'sdfasda'),
(80, 'aaa', 52, '', '', 'AA x 1', '', '2025-06-04 23:34:07', 'aaaa', '貨到付款', 'fdas', 'sdfasda'),
(81, 'aaa', 52, '', '', 'AA x 3', '', '2025-06-04 23:34:45', 'aaaa', '貨到付款', 'dsfa', 'dasf'),
(82, 'aaa', 0, '', '', '', '', '2025-06-04 23:34:59', 'aaaa', '貨到付款', 'dsfa', 'dasf'),
(83, '管理員', 52, '', '', 'AA x 1', '', '2025-06-04 23:50:07', 'admin', '貨到付款', 'dsfa', 'adsffdas'),
(84, '管理員', 199, '', '', '口紅1 x 1', '', '2025-06-04 23:52:24', 'admin', '貨到付款', 'fdas', 'afdssfds'),
(85, '管理員', 0, '', '', '', '', '2025-06-04 23:52:56', 'admin', '貨到付款', 'fdas', 'afdssfds');

-- --------------------------------------------------------

--
-- 資料表結構 `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `text` varchar(20) NOT NULL,
  `img` text NOT NULL,
  `add_time` datetime NOT NULL,
  `up_time` datetime DEFAULT NULL,
  `reply_text` text NOT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `msg`
--

INSERT INTO `msg` (`id`, `account`, `title`, `text`, `img`, `add_time`, `up_time`, `reply_text`, `parent_id`) VALUES
(37, 'aaaa', '', '讚', '20250602094440_6052.jpg', '2025-06-02 15:44:40', NULL, '', NULL),
(39, 'bba', '', '123', '', '2025-06-04 09:58:55', NULL, '', 37),
(41, 'aaaa', '123', '123', '20250604162415_3049.jpg', '2025-06-04 22:24:15', NULL, '', NULL),
(42, 'aaaa', '123', '123', '20250604163814_1364.jpg', '2025-06-04 22:38:14', NULL, '', NULL),
(43, 'aaaa', '963', '123', '20250604165344_5925.jpg', '2025-06-04 22:53:44', NULL, '', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `pro_type`
--

CREATE TABLE `pro_type` (
  `img` text NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(50) NOT NULL,
  `pt_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `pro_type`
--

INSERT INTO `pro_type` (`img`, `pt_id`, `pt_name`, `pt_comment`) VALUES
('img/衣服男2.jpg', 1, '男裝', '男性服裝僅限衣服'),
('img/口紅2.jpg', 2, '口紅', '口紅(化妝用品)'),
('img/衣服女2.jpg', 3, '女裝', '女生衣服(僅限衣服)'),
('img/手機殼2.jpg', 4, '手機殼', '手機用的殼'),
('img/耳機殼2.jpg', 5, '耳機殼', '耳機用的殼'),
('img/0.jpg', 18, '滑鼠', '123');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` text NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `email`, `phone`, `type`) VALUES
(6, 'bba', '123', '賣家', 'hfdhgf@gmail.com', 'afds', 'o'),
(7, 'admin', '123', '管理員', 'asdfas@gmail.com', 'adsffdas', 'a'),
(10, 'aaaa', '123', 'aaa', 'a0918381246@gmail.com', 'sdfasda', 'u');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `aa`
--
ALTER TABLE `aa`
  ADD PRIMARY KEY (`c_id`);

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `countmoney2`
--
ALTER TABLE `countmoney2`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `pro_type`
--
ALTER TABLE `pro_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `aa`
--
ALTER TABLE `aa`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney2`
--
ALTER TABLE `countmoney2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pro_type`
--
ALTER TABLE `pro_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
