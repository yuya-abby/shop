-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-27 04:33:54
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
-- 資料表結構 `addproduct`
--

CREATE TABLE `addproduct` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL,
  `name` varchar(20) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `addproduct`
--

INSERT INTO `addproduct` (`id`, `img`, `money`, `category`, `name`, `c_name`) VALUES
(1, 'img/口紅1.jpg', 299.00, '口紅', '口紅1', 'lipstick'),
(2, 'img/口紅2.jpg', 299.00, '口紅', '口紅2', 'lipstick'),
(3, 'img/口紅3.jpg', 299.00, '口紅', '口紅3', 'lipstick'),
(4, 'img/口紅4.jpg', 299.00, '口紅', '口紅4', 'lipstick'),
(5, 'img/手機殼1.jpg', 199.00, '手機殼', '手機殼1', 'phone'),
(6, 'img/手機殼2.jpg', 199.00, '手機殼', '手機殼2', 'phone'),
(7, 'img/手機殼3.jpg', 199.00, '手機殼', '手機殼3', 'phone'),
(8, 'img/手機殼4.jpg', 199.00, '手機殼', '手機殼4', 'phone'),
(9, 'img/耳機殼1.jpg', 100.00, '耳機殼', '耳機殼1', 'earphone'),
(10, 'img/耳機殼2.jpg', 100.00, '耳機殼', '耳機殼2', 'earphone'),
(11, 'img/耳機殼3.jpg', 100.00, '耳機殼', '耳機殼3', 'earphone'),
(12, 'img/耳機殼4.jpg', 100.00, '耳機殼', '耳機殼4', 'earphone'),
(13, 'img/衣服女1.jpg', 599.00, '女裝', '女裝1', 'shirt-girl'),
(14, 'img/衣服女2.jpg', 599.00, '女裝', '女裝2', 'shirt-girl'),
(15, 'img/衣服女3.jpg', 599.00, '女裝', '女裝3', 'shirt-girl'),
(16, 'img/衣服女4.jpg', 599.00, '女裝', '女裝4', 'shirt-girl'),
(17, 'img/衣服男1.jpg', 599.00, '男裝', '男裝1', 'shirt-boy'),
(18, 'img/衣服男2.jpg', 599.00, '男裝', '男裝2', 'shirt-boy'),
(19, 'img/衣服男3.jpg', 599.00, '男裝', '男裝3', 'shirt-boy'),
(20, 'img/衣服男4.jpg', 599.00, '男裝', '男裝4', 'shirt-boy');

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
  `addproduct_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- 資料表結構 `countmoney`
--

CREATE TABLE `countmoney` (
  `id` int(11) NOT NULL,
  `account` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL,
  `img` text NOT NULL,
  `quantity` int(20) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `countmoney`
--

INSERT INTO `countmoney` (`id`, `account`, `c_id`, `img`, `quantity`, `total`, `c_name`, `price`, `subtotal`, `payment_method`, `order_date`) VALUES
(109, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 08:04:12'),
(110, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 08:07:02'),
(111, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 08:07:27'),
(112, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 08:12:15'),
(113, 'aaaa', 14, '.', 1, 0.00, '女裝2', 599.00, 599.00, 'atm', '2025-05-26 08:48:03'),
(114, 'aaaa', 14, '.', 1, 0.00, '女裝2', 599.00, 599.00, 'atm', '2025-05-26 08:48:03'),
(115, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 11:04:22'),
(116, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 11:04:25'),
(117, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 11:04:31'),
(118, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'atm', '2025-05-26 11:04:40'),
(119, 'aaaa', 19, '', 1, 0.00, '男裝3', 599.00, 599.00, 'atm', '2025-05-27 02:19:59'),
(120, 'aaaa', 19, '', 1, 0.00, '男裝3', 599.00, 599.00, 'atm', '2025-05-27 02:24:37');

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
  `up_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `msg`
--

INSERT INTO `msg` (`id`, `account`, `title`, `text`, `img`, `add_time`, `up_time`) VALUES
(11, 'aaaa', 'aaaf', 'bbbb', '', '2025-05-01 14:12:09', NULL),
(12, 'aaaa', 'aa', 'f', '', '2025-05-01 14:13:49', NULL),
(13, 'aaaa', 'sdsdccds', 'dcscsdscd', '', '2025-05-01 14:14:39', NULL),
(20, 'aaaa', '', 'sad', '', '2025-05-03 11:47:28', NULL),
(23, 'aaaa', '44444', '4444444', '', '2025-05-06 11:57:48', NULL),
(24, 'aaaa', 'asdfsd', '', '', '2025-05-06 12:02:42', NULL),
(26, 'aaaa', '456', '456456', '', '2025-05-12 10:31:44', NULL),
(30, 'aaaa', '456', '456456', '20250512043325_7818.jpg', '2025-05-12 10:33:25', NULL),
(31, 'aaaa', 'sfda', 'fds', '20250512054701_3094.jpg', '2025-05-12 11:47:01', NULL),
(33, 'aaaa', 'dfas', 'fsad', '20250513054324_5475.jpg', '2025-05-13 11:43:24', NULL),
(34, 'bbb', '65861232', '655612', '20250517074500_5083.jpg', '2025-05-17 13:45:00', NULL),
(35, 'aaaa', '4rvffr', '4vfrv4f', '20250526104852_5774.jpg', '2025-05-26 16:48:52', NULL);

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
(6, 'bbb', '123', '賣家', 'hfdhgf@gmail.com', 'afds', 'o'),
(7, 'admin', '123', '管理員', 'asdfas@gmail.com', 'adsffdas', 'a'),
(8, 'bbb', '123', 'abc', '112534@gmail.com', 'svdcvc', 'u'),
(10, 'aaaa', '123', 'aaa', 'a0918381246@gmail.com', 'sdfasda', 'u'),
(11, '12', '123', 'bbg', '112534@gmail.com', 'adsffdas', 'u');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `addproduct`
--
ALTER TABLE `addproduct`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `countmoney`
--
ALTER TABLE `countmoney`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney`
--
ALTER TABLE `countmoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
