-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- 主机： mysql
-- 生成日期： 2022-10-20 02:38:15
-- 服务器版本： 10.9.3-MariaDB-1:10.9.3+maria~ubu2204
-- PHP 版本： 8.0.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cloud_computing`
--

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`name`, `username`, `password`, `email`) VALUES
('hello', 'abc', '123', '123@gmail.com');

-- --------------------------------------------------------

--
-- 表的结构 `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `path` text NOT NULL,
  `comment_username` varchar(30) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `comment`
--

INSERT INTO `comment` (`comment_id`, `path`, `comment_username`, `comment`) VALUES
(6, 'IMG-634785290d50f2.41655742.jpg', 'kevin', 'hello'),
(7, 'IMG-634785290d50f2.41655742.jpg', 'kevin', 'this image looks great'),
(8, 'IMG-634785290d50f2.41655742.jpg', 'kevin', 'this image looks great'),
(9, 'IMG-6348d3686e16b5.19697851.png', 'kevin', 'Hello people!'),
(10, 'IMG-634e0cb76a2d33.99427364.jpg', 'kevin', 'This is huge!'),
(11, 'IMG-634e0cb76a2d33.99427364.jpg', 'kevin', 'How long it take you to draw this?'),
(12, 'IMG-634e0bccb460c4.28803689.jpg', 'kevin', 'The cloud looks pretty!'),
(13, 'IMG-634e0cb76a2d33.99427364.jpg', 'nike', 'What a master piece!'),
(14, 'IMG-634e04660a95e7.39903662.jpg', 'kevin', 'looks cute'),
(15, 'IMG-634e04660a95e7.39903662.jpg', 'nike', 'ikr');

-- --------------------------------------------------------

--
-- 表的结构 `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `filename` text NOT NULL,
  `path` text NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `files`
--

INSERT INTO `files` (`id`, `filename`, `path`, `username`) VALUES
(7, 'timetable.JPG', 'IMG-634785290d50f2.41655742.jpg', 'kevin'),
(8, '1.PNG', 'IMG-6348d3686e16b5.19697851.png', 'kevin'),
(9, 'cartoon.jpg', 'IMG-634e04660a95e7.39903662.jpg', 'kevin'),
(10, 'The child cry valley.jpg', 'IMG-634e059ed873e0.35222106.jpg', 'kevin'),
(11, 'fireworks.jpg', 'IMG-634e08ab996085.35911407.jpg', 'kevin'),
(12, 'Empty_Window.jpg', 'IMG-634e0938d9d778.35051208.jpg', 'kevin'),
(13, 'Rainbow.jpg', 'IMG-634e09783a8bb8.26247225.jpg', 'kevin'),
(14, 'classroom.jpg', 'IMG-634e0a699c77e7.59268954.jpg', 'kevin'),
(15, 'cloud outline.jpg', 'IMG-634e0bccb460c4.28803689.jpg', 'kevin'),
(16, 'The great leviathan of Hokkaido.jpg', 'IMG-634e0cb76a2d33.99427364.jpg', 'kevin'),
(18, 'index.JPG', 'IMG-634f8236e656b3.70301192.jpg', 'kevin');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(6, 'kevin', 'kevin@gmail.com', '$2y$10$PkrDGugbFHz9xuC1kWgf1eQJnn2BmQMAkYaVLtxu0p/nWc3I08Aau'),
(7, 'nike', 'nike@gmail.com', '$2y$10$ak9i66yFS8ev7RSvzThRZOLyIJ3OihLDJu5h/WbF80.81GJv42e4q');

--
-- 转储表的索引
--

--
-- 表的索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- 表的索引 `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_user_upload` (`username`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `name` (`name`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 限制导出的表
--

--
-- 限制表 `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `FK_user_upload` FOREIGN KEY (`username`) REFERENCES `user` (`name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
