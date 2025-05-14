-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-12 04:20:17
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
(13, 'img/衣服女1.jpg', 599.00, '女裝', '衣服女1', 'shirt-girl'),
(14, 'img/衣服女2.jpg', 599.00, '女裝', '衣服女2', 'shirt-girl'),
(15, 'img/衣服女3.jpg', 599.00, '女裝', '衣服女3', 'shirt-girl'),
(16, 'img/衣服女4.jpg', 599.00, '女裝', '衣服女4', 'shirt-girl'),
(17, 'img/衣服男1.jpg', 599.00, '男裝', '衣服男1', 'shirt-boy'),
(18, 'img/衣服男2.jpg', 599.00, '男裝', '衣服男2', 'shirt-boy'),
(19, 'img/衣服男3.jpg', 599.00, '男裝', '衣服男3', 'shirt-boy'),
(20, 'img/衣服男4.jpg', 599.00, '男裝', '衣服男4', 'shirt-boy');

-- --------------------------------------------------------

--
-- 資料表結構 `countmoney`
--

CREATE TABLE `countmoney` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(20) NOT NULL,
  `word` varchar(20) NOT NULL,
  `number` varchar(20) NOT NULL,
  `money` varchar(20) NOT NULL,
  `account` varchar(20) NOT NULL,
  `c_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(24, 'aaaa', 'asdfsd', '', '', '2025-05-06 12:02:42', NULL);

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
  `type` varchar(2) NOT NULL,
  `c_name` varchar(20) NOT NULL,
  `img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `email`, `phone`, `type`, `c_name`, `img`) VALUES
(5, 'aaaa', '123', 'bbacc', 'asdfd@gmai.com', 'sdfsd', 'u', '口紅', ''),
(6, 'bbb', '123', '賣家', 'hfdhgf@gmail.com', 'afds', 'o', '', ''),
(7, 'admin', '123', '管理員', 'asdfas@gmail.com', 'adsffdas', 'a', '', '');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `addproduct`
--
ALTER TABLE `addproduct`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney`
--
ALTER TABLE `countmoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
