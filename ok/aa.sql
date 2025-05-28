-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2025-05-28 11:53:31
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
-- 資料表結構 `aa`
--

CREATE TABLE `aa` (
  `c_id` int(11) NOT NULL,
  `c_name` text NOT NULL,
  `c_text` text NOT NULL,
  `c_money` int(50) NOT NULL,
  `c_img` text NOT NULL,
  `pt_id` int(11) NOT NULL,
  `pt_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `aa`
--

INSERT INTO `aa` (`c_id`, `c_name`, `c_text`, `c_money`, `c_img`, `pt_id`, `pt_name`) VALUES
(33, '口紅1', '這是一支口紅', 199, 'img/口紅2.jpg', 2, '口紅');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `aa`
--
ALTER TABLE `aa`
  ADD PRIMARY KEY (`c_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `aa`
--
ALTER TABLE `aa`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
