-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-04-24 07:44:33
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
(1, 'img/口紅1.jpg', 299.00, '口紅', '口紅1', '口紅2'),
(2, 'img/口紅2.jpg', 299.00, '口紅', '口紅2', '口紅2'),
(3, 'img/口紅3.jpg', 299.00, '口紅', '口紅3', '口紅2'),
(4, 'img/口紅4.jpg', 299.00, '口紅', '口紅4', '口紅2'),
(5, 'img/手機殼1.jpg', 199.00, '手機殼', '手機殼1', '手機殼2'),
(6, 'img/手機殼2.jpg', 199.00, '手機殼', '手機殼2', '手機殼2'),
(7, 'img/手機殼3.jpg', 199.00, '手機殼', '手機殼3', '手機殼2'),
(8, 'img/手機殼4.jpg', 199.00, '手機殼', '手機殼4', '手機殼2'),
(9, 'img/耳機殼1.jpg', 100.00, '耳機殼', '耳機殼1', '耳機殼2\n'),
(10, 'img/耳機殼2.jpg', 100.00, '耳機殼', '耳機殼2', '耳機殼2\n'),
(11, 'img/耳機殼3.jpg', 100.00, '耳機殼', '耳機殼3', '耳機殼2\n'),
(12, 'img/耳機殼4.jpg', 100.00, '耳機殼', '耳機殼4', '耳機殼2\n'),
(13, 'img/衣服女1.jpg', 599.00, '女裝', '衣服女1', '女裝2'),
(14, 'img/衣服女2.jpg', 599.00, '女裝', '衣服女2', '女裝2'),
(15, 'img/衣服女3.jpg', 599.00, '女裝', '衣服女3', '女裝2'),
(16, 'img/衣服女4.jpg', 599.00, '女裝', '衣服女4', '女裝2'),
(17, 'img/衣服男1.jpg', 599.00, '男裝', '衣服男1', '男裝2'),
(18, 'img/衣服男2.jpg', 599.00, '男裝', '衣服男2', '男裝2'),
(19, 'img/衣服男3.jpg', 599.00, '男裝', '衣服男3', '男裝2'),
(20, 'img/衣服男4.jpg', 599.00, '男裝', '衣服男4', '男裝2');

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
(2, '', 'aaa', 'vv', 'img/口紅1.jpg', '2025-04-17 14:50:28', NULL),
(3, '', 'aaa', 'bbb', 'img/0.jpg', '2025-04-17 14:53:39', NULL),
(4, '', '333', 'aaa', 'img/DPlayer (3).png', '2025-04-17 16:32:49', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `type` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `account`, `password`, `name`, `type`) VALUES
(1, 'aaa', '123', 'bbb', 'us');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `addproduct`
--
ALTER TABLE `addproduct`
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
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
