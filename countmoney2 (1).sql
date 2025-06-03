-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-03 02:08:19
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
-- 資料表結構 `countmoney2`
--

CREATE TABLE `countmoney2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `subtotal` varchar(50) NOT NULL,
  `product_list` text NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `countmoney2`
--

INSERT INTO `countmoney2` (`id`, `name`, `total`, `quantity`, `subtotal`, `product_list`, `order_date`, `account`, `payment`, `status`, `address`, `phone`) VALUES
(1, 'aaa', 1198, '', '', '女裝2 x 2', '2025-06-01 17:19:08', 'aaaa', 'cod', '', 'agrfsdsf', ''),
(2, 'aaa', 598, '', '', '口紅2 x 2', '2025-06-01 17:24:06', 'aaaa', 'cod', '', 'hjbhjljk', ''),
(4, 'aaa', 1198, '', '', '女裝2 x 2', '2025-06-01 17:30:51', 'aaaa', '貨到付款', '', 'fdsafd', ''),
(5, 'aaa', 2995, '', '', '男裝3 x 5', '2025-06-01 18:25:37', 'aaaa', '貨到付款', '', 'oipoijoj', ''),
(6, 'aaa', 599, '', '', '男裝4 x 1', '2025-06-01 20:25:24', 'aaaa', '貨到付款', '', 'fdsfds', '0918381246'),
(8, 'aaa', 199, '', '', '手機殼2 x 1', '2025-06-01 20:27:11', 'aaaa', '貨到付款', '', 'lklj;jl;l', 'adsffdas'),
(10, 'aaa', 123, '', '', 'sdsfd x 3', '2025-06-03 07:40:09', 'aaaa', '貨到付款', '', 'fdsgfdgsdfgsdf', 'erwergerg'),
(11, 'aaa', 199, '', '', '口紅1 x 3', '2025-06-03 07:43:52', 'aaaa', '貨到付款', '', '123456789', '123'),
(12, 'aaa', 123, '', '', 'sfdaaaa x 3', '2025-06-03 07:47:59', 'aaaa', '貨到付款', '', '123456789', '123456'),
(13, 'aaa', 1198, '', '', '男裝2 x 2', '2025-06-03 07:53:18', 'aaaa', '貨到付款', '', '789456123', '12345'),
(14, 'aaa', 1198, '', '', '男裝4 x 2', '2025-06-03 07:53:59', 'aaaa', '貨到付款', '', '789632145', '564123');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `countmoney2`
--
ALTER TABLE `countmoney2`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney2`
--
ALTER TABLE `countmoney2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
