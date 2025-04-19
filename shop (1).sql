-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-04-19 09:12:23
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
  `img` varchar(255) NOT NULL,
  `money` decimal(10,2) NOT NULL,
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `addproduct`
--

INSERT INTO `addproduct` (`id`, `img`, `money`, `category`) VALUES
(3, 'shirt1.jpg', 299.00, '男裝'),
(4, 'shirt2.jpg', 350.00, '女裝'),
(5, 'phonecase1.jpg', 150.00, '手機殼'),
(6, 'earphone1.jpg', 120.00, '耳機殼'),
(7, 'lipstick1.jpg', 450.00, '口紅'),
(8, 'shirt1.jpg', 299.00, '男裝'),
(9, 'shirt2.jpg', 350.00, '女裝'),
(10, 'phonecase1.jpg', 150.00, '手機殼'),
(11, 'earphone1.jpg', 120.00, '耳機殼'),
(12, 'lipstick1.jpg', 450.00, '口紅'),
(13, 'shirt1.jpg', 299.00, '男裝'),
(14, 'shirt2.jpg', 350.00, '女裝'),
(15, 'phonecase1.jpg', 150.00, '手機殼'),
(16, 'earphone1.jpg', 120.00, '耳機殼'),
(17, 'lipstick1.jpg', 450.00, '口紅'),
(18, 'shirt1.jpg', 299.00, '男裝'),
(19, 'shirt2.jpg', 350.00, '女裝'),
(20, 'phonecase1.jpg', 150.00, '手機殼'),
(21, 'earphone1.jpg', 120.00, '耳機殼'),
(22, 'lipstick1.jpg', 450.00, '口紅');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
