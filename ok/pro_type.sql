-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-28 11:53:40
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `comm`
--

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
('', '男裝', 1, '男裝', '男性服裝僅限衣服'),
('', '口紅', 2, '口紅', '口紅(化妝用品)'),
('', '女裝', 3, '女裝', '女生衣服(僅限衣服)'),
('', '手機殼', 4, '手機殼', '手機用的殼'),
('', '耳機殼', 5, '耳機殼', '耳機用的殼');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `pro_type`
--
ALTER TABLE `pro_type`
  ADD PRIMARY KEY (`pt_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `pro_type`
--
ALTER TABLE `pro_type`
  MODIFY `pt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
