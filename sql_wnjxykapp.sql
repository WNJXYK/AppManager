-- phpMyAdmin SQL Dump
-- version 4.4.7
-- http://www.phpmyadmin.net
--
-- Host: pmamysql-green.smartgslb.com
-- Generation Time: 2015-10-04 16:54:38
-- 服务器版本： 5.5.41-debug-log
-- PHP Version: 5.5.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sql_wnjxykapp`
--

-- --------------------------------------------------------

--
-- 表的结构 `appmanager_content`
--

CREATE TABLE IF NOT EXISTS `appmanager_content` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `appmanager_content`
--

INSERT INTO `appmanager_content` (`id`, `title`, `intro`, `link`, `image`) VALUES
(16, 'WNJXYK的博客', '代码、日常、扯淡，欢饮天天来玩！', 'http://wnjxyk.cn/', 'http://app-wnjxyk-cn-static.smartgslb.com/Image/WNJXYK_BLOG.jpg');

-- --------------------------------------------------------

--
-- 表的结构 `appmanager_info`
--

CREATE TABLE IF NOT EXISTS `appmanager_info` (
  `info_id` int(11) NOT NULL,
  `info_name` text CHARACTER SET gbk NOT NULL,
  `info_val` text CHARACTER SET gbk NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `appmanager_info`
--

INSERT INTO `appmanager_info` (`info_id`, `info_name`, `info_val`) VALUES
(1, 'WebTitle', 'WNJXYKの实验室'),
(2, 'LinkTitle', '联系方式'),
(3, 'LinkName1', '新浪微博'),
(6, 'Link1', 'http://weibo.com/WNJXYK'),
(7, 'Link2', ''),
(8, 'Link3', ''),
(4, 'LinkName2', 'Github'),
(5, 'LinkName3', ''),
(15, 'AboutTitle', '关于我'),
(16, 'About1', ''),
(17, 'About2', '平时写写代码扯扯淡的蒟蒻'),
(18, 'Copyright', '版权归WNJXYK'),
(19, 'FootLink', 'http://wnjxyk.cn/'),
(20, 'FootName', '博客'),
(21, 'Password', 'root');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appmanager_content`
--
ALTER TABLE `appmanager_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appmanager_info`
--
ALTER TABLE `appmanager_info`
  ADD PRIMARY KEY (`info_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appmanager_content`
--
ALTER TABLE `appmanager_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `appmanager_info`
--
ALTER TABLE `appmanager_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
