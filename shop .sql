-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-06-04 08:05:18
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
(33, '口紅1', '這是一支口紅', 199, 'img/口紅2.jpg', 2, '口紅', '2025-06-03 16:28:15', '2025-06-03 16:28:15'),
(34, 'AAA', '6522', 123, 'img/安赤工.jpg', 1, '', '2025-06-03 16:28:15', '2025-06-03 16:28:15'),
(35, '123', '123', 2123, 'img/安赤工.jpg', 1, '男裝', '2025-06-03 16:28:15', '2025-06-03 16:28:15'),
(36, 'sdsfd', 'sdfsda', 123, 'img/平凡職業4.jpg', 5, '', '2025-06-03 16:28:15', '2025-06-03 16:28:15'),
(37, 'asdf', 'afds', 123, 'img/家教12.jpg', 1, '', '2025-06-03 16:28:15', '2025-06-03 16:28:15'),
(38, 'sfdaaaa', 'asdfdsaffd', 123, 'img/0.jpg', 4, '手機殼', '2025-06-03 16:28:15', '2025-06-03 16:28:15');

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
(17, 14, '女裝2', 599, 1, 'img/衣服女2.jpg', 'aaaa', 0, 0, '2025-05-29 15:12:36'),
(18, 14, '女裝2', 599, 1, 'img/衣服女2.jpg', 'aaaa', 0, 0, '2025-05-29 15:14:54'),
(19, 20, '男裝4', 599, 1, 'img/衣服男4.jpg', 'aaaa', 0, 0, '2025-05-30 10:48:14'),
(20, 18, '男裝2', 1198, 2, 'img/衣服男2.jpg', 'aaaa', 0, 0, '2025-05-30 11:41:10'),
(53, 33, '口紅1', 199, 1, 'img/口紅2.jpg', 'guest', 199, 1, '2025-06-03 16:39:08'),
(54, 33, '口紅1', 199, 1, 'img/口紅2.jpg', 'guest', 199, 1, '2025-06-03 16:41:13'),
(55, 33, '口紅1', 199, 5, 'img/口紅2.jpg', 'guest', 995, 5, '2025-06-03 16:41:19'),
(56, 33, '口紅1', 199, 5, 'img/口紅2.jpg', 'guest', 995, 5, '2025-06-03 16:43:59'),
(58, 34, 'AAA', 123, 3, 'img/安赤工.jpg', 'guest', 369, 3, '2025-06-03 16:59:26'),
(59, 34, 'AAA', 123, 3, 'img/安赤工.jpg', 'guest', 369, 3, '2025-06-03 17:00:31'),
(68, 38, 'sfdaaaa', 123, 3, 'img/0.jpg', 'guest', 369, 3, '2025-06-03 23:38:02');

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
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) DEFAULT '處理中'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `countmoney`
--

INSERT INTO `countmoney` (`id`, `account`, `c_id`, `img`, `quantity`, `total`, `c_name`, `price`, `subtotal`, `payment_method`, `order_date`, `status`) VALUES
(136, 'aaaa', 7, 'img/手機殼3.jpg', 2, 0.00, '手機殼3', 199.00, 398.00, 'cod', '2025-05-28 14:33:15', '處理中'),
(137, 'aaaa', 7, 'img/手機殼3.jpg', 2, 0.00, '手機殼3', 199.00, 398.00, 'atm', '2025-05-28 14:34:02', '處理中'),
(138, 'aaaa', 7, 'img/手機殼3.jpg', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-05-28 15:24:02', '已完成'),
(139, 'aaaa', 7, 'img/手機殼3.jpg', 1, 0.00, '手機殼3', 199.00, 199.00, 'ATM轉帳', '2025-05-28 14:54:07', '已完成'),
(140, 'aaaa', 7, 'img/手機殼3.jpg', 2, 0.00, '手機殼3', 199.00, 398.00, 'ATM轉帳', '2025-05-28 15:23:54', '處理中'),
(141, 'aaaa', 15, 'img/衣服女3.jpg', 1, 0.00, '女裝3', 599.00, 599.00, '貨到付款', '2025-05-28 15:24:17', '處理中'),
(142, 'aaaa', 7, 'img/手機殼3.jpg', 2, 0.00, '手機殼3', 199.00, 398.00, 'ATM轉帳', '2025-05-29 03:30:25', '處理中'),
(143, 'aaaa', 20, 'img/衣服男4.jpg', 2, 0.00, '男裝4', 599.00, 1198.00, 'ATM轉帳', '2025-05-29 03:33:39', '處理中'),
(144, 'aaaa', 19, 'img/衣服男3.jpg', 1, 0.00, '男裝3', 599.00, 599.00, 'ATM轉帳', '2025-05-29 03:34:53', '已完成'),
(145, 'aaaa', 19, 'img/衣服男3.jpg', 1, 0.00, '男裝3', 599.00, 599.00, '貨到付款', '2025-05-29 03:36:24', '已完成'),
(146, 'aaaa', 8, 'img/手機殼4.jpg', 1, 0.00, '手機殼4', 199.00, 199.00, '貨到付款', '2025-05-29 05:03:53', '處理中'),
(147, 'aaaa', 20, 'img/衣服男4.jpg', 5, 0.00, '男裝4', 599.00, 2995.00, '貨到付款', '2025-05-29 05:57:43', '已完成'),
(148, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:08:59', '已完成'),
(149, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:08:54', '處理中'),
(150, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:14:35', '處理中'),
(151, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:42:39', '處理中'),
(152, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:43:34', '處理中'),
(153, 'aaaa', 14, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, '貨到付款', '2025-05-29 06:43:35', '處理中'),
(154, 'aaaa', 7, 'img/手機殼3.jpg', 1, 0.00, '手機殼3', 199.00, 199.00, '貨到付款', '2025-05-29 06:52:53', '處理中'),
(155, 'aaaa', 5, 'img/手機殼1.jpg', 1, 0.00, '手機殼1', 199.00, 199.00, '貨到付款', '2025-05-29 07:11:34', '處理中'),
(156, 'aaaa', 5, 'img/手機殼1.jpg', 1, 0.00, '手機殼1', 199.00, 199.00, '貨到付款', '2025-05-29 07:11:47', '處理中'),
(157, 'aaaa', 13, 'img/衣服女1.jpg', 2, 0.00, '女裝1', 599.00, 1198.00, '貨到付款', '2025-05-29 07:15:15', '處理中'),
(164, 'aaaa', 0, 'img/衣服女2.jpg', 6, 0.00, '女裝2', 599.00, 3594.00, 'cod', '2025-06-01 01:52:12', '處理中'),
(165, 'aaaa', 0, 'img/口紅2.jpg', 1, 0.00, '口紅2', 299.00, 299.00, 'cod', '2025-06-01 01:54:56', '處理中'),
(166, 'aaaa', 0, 'img/衣服女2.jpg', 1, 0.00, '女裝2', 599.00, 599.00, 'cod', '2025-06-01 07:58:17', '處理中'),
(167, 'aaaa', 0, 'img/衣服男3.jpg', 1, 0.00, '男裝3', 599.00, 599.00, 'cod', '2025-06-01 08:20:12', '處理中'),
(168, 'aaaa', 0, 'img/衣服男4.jpg', 2, 0.00, '男裝4', 599.00, 1198.00, 'cod', '2025-06-01 08:50:07', '處理中'),
(169, 'aaaa', 0, 'img/衣服女2.jpg', 5, 0.00, '女裝2', 599.00, 2995.00, 'cod', '2025-06-01 08:50:54', '處理中'),
(170, 'aaaa', 0, 'img/口紅1.jpg', 2, 0.00, '口紅1', 299.00, 598.00, 'cod', '2025-06-01 08:57:19', '處理中'),
(171, 'aaaa', 0, 'img/口紅3.jpg', 1, 0.00, '口紅3', 299.00, 299.00, 'cod', '2025-06-01 08:59:05', '處理中'),
(172, 'aaaa', 0, 'img/衣服男4.jpg', 2, 0.00, '男裝4', 599.00, 1198.00, 'cod', '2025-06-01 08:59:53', '處理中'),
(173, 'aaaa', 7, '?', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-06-01 10:27:19', '處理中'),
(174, 'aaaa', 7, '?', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-06-01 10:27:41', '處理中'),
(175, 'aaaa', 7, '?', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-06-01 10:33:14', '處理中'),
(176, 'aaaa', 7, '?', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-06-01 12:47:22', '處理中'),
(177, 'aaaa', 7, '?', 1, 0.00, '手機殼3', 199.00, 199.00, 'cod', '2025-06-01 12:47:53', '處理中'),
(178, 'aaaa', 19, '', 1, 0.00, '男裝3', 599.00, 599.00, 'cod', '2025-06-01 13:12:33', '處理中'),
(179, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'cod', '2025-06-01 13:12:45', '處理中'),
(180, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'cod', '2025-06-01 13:12:57', '處理中'),
(181, 'aaaa', 20, '', 1, 0.00, '男裝4', 599.00, 599.00, 'cod', '2025-06-01 13:13:02', '處理中');

-- --------------------------------------------------------

--
-- 資料表結構 `countmoney2`
--

CREATE TABLE `countmoney2` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total` int(50) NOT NULL,
  `product_list` text NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account` varchar(50) NOT NULL,
  `payment` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `countmoney2`
--

INSERT INTO `countmoney2` (`id`, `name`, `total`, `product_list`, `order_date`, `account`, `payment`, `address`, `phone`) VALUES
(6, 'aaa', 599, '男裝4 x 1', '2025-06-01 20:25:24', 'aaaa', '貨到付款', 'fdsfds', '0918381246'),
(8, 'aaa', 199, '手機殼2 x 1', '2025-06-01 20:27:11', 'aaaa', '貨到付款', 'lklj;jl;l', 'adsffdas'),
(24, 'aaa', 123, '名稱: sfdaaaa, 數量: 1, 單價: 123', '2025-06-03 22:37:17', 'aaaa', '貨到付款', 'cas', 'sdfasda'),
(25, 'aaa', 123, '名稱: sfdaaaa, 數量: 1, 單價: 123', '2025-06-03 22:57:54', 'aaaa', '貨到付款', 'asfd', 'sdfasda'),
(52, 'aaa', 123, 'sfdaaaa x 1', '2025-06-03 23:55:38', 'aaaa', '貨到付款', 'wf', 'sdfasda'),
(53, 'aaa', 123, 'sfdaaaa x 1', '2025-06-03 23:58:01', 'aaaa', '貨到付款', 'dsv', 'dvs'),
(56, 'aaa', 123, 'Array', '2025-06-04 00:01:12', 'aaaa', '貨到付款', 'aefsd', 'sdfasda'),
(57, 'aaa', 123, 'sfdaaaa x 1', '2025-06-04 00:01:36', 'aaaa', '貨到付款', 'aefsd', 'sdfasda'),
(58, 'aaa', 123, 'sdsfd x 1', '2025-06-04 00:02:07', 'aaaa', '貨到付款', 'gyugiyukgykyu', 'sdfasda'),
(59, 'aaa', 861, 'sfdaaaa x 7', '2025-06-04 13:27:32', 'aaaa', '貨到付款', 'aer', 'sdfasda');

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
(34, 'bbb', '65861232', '655612', '20250517074500_5083.jpg', '2025-05-17 13:45:00', NULL, '', NULL),
(36, 'aaaa', '454546565', '878456456', '202506011226582326.jpg', '2025-06-01 14:37:13', '2025-06-01 12:26:58', '', NULL),
(37, 'aaaa', '', '讚', '20250602094440_6052.jpg', '2025-06-02 15:44:40', NULL, '', NULL),
(38, 'bba', '', 'dsdfsa', '', '2025-06-03 18:17:48', NULL, '', 37);

-- --------------------------------------------------------

--
-- 資料表結構 `pro_type`
--

CREATE TABLE `pro_type` (
  `img` text NOT NULL,
  `pt_path` text NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pt_name` varchar(50) NOT NULL,
  `pt_comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `pro_type`
--

INSERT INTO `pro_type` (`img`, `pt_path`, `pt_id`, `pt_name`, `pt_comment`) VALUES
('img/衣服男2.jpg', '', 1, '男裝', '男性服裝僅限衣服'),
('img/口紅2.jpg', '', 2, '口紅', '口紅(化妝用品)'),
('img/衣服女2.jpg', '', 3, '女裝', '女生衣服(僅限衣服)'),
('img/手機殼2.jpg', '', 4, '手機殼', '手機用的殼'),
('img/耳機殼2.jpg', '', 5, '耳機殼', '耳機用的殼'),
('img/0.jpg', '', 18, '滑鼠', '123');

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
(10, 'aaaa', '123', 'aaa', 'a0918381246@gmail.com', 'sdfasda', 'u'),
(21, 'sdf', '123', 'sdaf', 'aaa@gmail.com', 'sdaff', 'u'),
(22, 'bbc', '123', 'yuya', 'asdfd@gmai.com', '963', 'u'),
(25, 'sdf', '963', 'sdfa', 'aaa@gmail.com', 'afds', 'u');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `aa`
--
ALTER TABLE `aa`
  ADD PRIMARY KEY (`c_id`);

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
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `addproduct`
--
ALTER TABLE `addproduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney`
--
ALTER TABLE `countmoney`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `countmoney2`
--
ALTER TABLE `countmoney2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

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
