-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2020 г., 13:35
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `information`
--

-- --------------------------------------------------------

--
-- Структура таблицы `offer`
--

CREATE TABLE `offer` (
  `id` int(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `faculty` varchar(300) NOT NULL,
  `duty` varchar(50) NOT NULL,
  `passport` varchar(15) NOT NULL,
  `born` varchar(20) NOT NULL,
  `kirgan_yili` varchar(20) NOT NULL,
  `ketgan_yili` varchar(20) NOT NULL,
  `state` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Структура таблицы `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `fullname` varchar(150) NOT NULL,
  `faculty` varchar(150) NOT NULL,
  `direction` varchar(150) NOT NULL,
  `passport` varchar(15) NOT NULL,
  `course` int(1) NOT NULL,
  `group` varchar(10) NOT NULL,
  `price` varchar(30) NOT NULL,
  `degree` varchar(30) NOT NULL,
  `born` varchar(30) NOT NULL,
  `kirgan_yili` varchar(30) NOT NULL,
  `ketgan_yili` varchar(30) NOT NULL,
  `state` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Структура таблицы `token`
--

CREATE TABLE `token` (
  `token_id` int(10) NOT NULL,
  `person_id` int(6) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `passport` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `typeref` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`token_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;

--
-- AUTO_INCREMENT для таблицы `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4609;

--
-- AUTO_INCREMENT для таблицы `token`
--
ALTER TABLE `token`
  MODIFY `token_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100001;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
