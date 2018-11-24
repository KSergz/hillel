-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Лис 24 2018 р., 17:58
-- Версія сервера: 8.0.12
-- Версія PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `testdb`
--

-- --------------------------------------------------------

--
-- Структура таблиці `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(3) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `city`
--

INSERT INTO `city` (`id`, `name`, `country`) VALUES
(1, 'Kiev', 'ua'),
(2, 'Lviv', 'ua'),
(3, 'London', 'uk'),
(4, 'New York', 'usa'),
(5, 'Berlin', 'd'),
(6, 'Roma', 'it'),
(7, 'Sidney', 'au'),
(8, 'Tokio', 'jp'),
(9, 'Odessa', 'ua'),
(10, 'Milan', 'it'),
(11, 'Kioto', 'jp');

-- --------------------------------------------------------

--
-- Структура таблиці `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `code_number` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `phone`
--

INSERT INTO `phone` (`id`, `code_number`, `number`) VALUES
(1, 44, 7903804),
(2, 38, 3245345),
(3, 49, 4457655),
(4, 79, 4457490),
(5, 10, 6767689),
(6, 51, 6767989),
(7, 23, 5456567);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `addres` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `last_name`, `first_name`, `addres`, `city`) VALUES
(1, 'Ivan', 'Petrov', 'Mira str', 'Kiev'),
(2, 'Simonov', 'Ilya', 'Stone avenu', 'London'),
(3, 'Erikson', 'Peter', 'Wilson str', 'Madrid'),
(4, 'Adler', 'Gans', 'Dortmund strase', 'Berlin'),
(5, 'Yuki', 'Kioshi', 'Okinava pref', 'Tokio');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
