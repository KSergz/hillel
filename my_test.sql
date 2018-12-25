-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 25 2018 р., 18:18
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
-- База даних: `my_test`
--

-- --------------------------------------------------------

--
-- Структура таблиці `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `city`
--

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES
(1, 'Kiev', 1),
(2, 'Madrid', 10),
(3, 'Milan', 6),
(4, 'Tokyo', 5),
(5, 'Barcelona', 10),
(6, 'Odessa', 1),
(7, 'London', 3),
(8, 'Krakow', 8),
(9, 'Oslo', 7),
(10, 'Lissabon', 9),
(11, 'Lviv', 1),
(12, 'Napoli', 6),
(13, 'Rio de Janeiro', 4),
(14, 'Vienna', 2),
(15, 'Osaka', 5),
(16, 'Liverpool', 3),
(17, 'Tirol', 2),
(18, 'Warszawa', 8),
(19, 'Manchester', 3),
(20, 'Verona', 6),
(22, 'Los Angeles', 12),
(24, 'Hawana', 14),
(26, 'Denver', 12);

-- --------------------------------------------------------

--
-- Структура таблиці `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone_code` int(11) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `country`
--

INSERT INTO `country` (`id`, `name`, `phone_code`, `code`) VALUES
(1, 'Ukraine', 38, 'ua'),
(2, 'Austria', 43, 'at'),
(3, 'United Kingdom', 44, 'uk'),
(4, 'Brazil', 55, 'br'),
(5, 'Japan', 81, 'jp'),
(6, 'Italy', 39, 'it'),
(7, 'Norway', 47, 'no'),
(8, 'Poland', 48, 'pl'),
(9, 'Portugal', 351, 'po'),
(10, 'Spain', 34, 'sp'),
(12, 'USA', 1, 'us'),
(14, 'Cuba', 53, 'cu');

-- --------------------------------------------------------

--
-- Структура таблиці `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `phone`
--

INSERT INTO `phone` (`id`, `number`, `country_id`) VALUES
(1, 2207777, 10),
(2, 221315, 1),
(3, 5550055, 1),
(4, 3223244, 8),
(5, 2381754, 3),
(6, 6545555, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `profile`
--

INSERT INTO `profile` (`id`, `last_name`, `first_name`, `address`, `user_id`, `city_id`) VALUES
(1, 'Pavlenko', 'Roman', 'Nova street', 1, 6),
(2, 'Burton', 'Sam', '11 avenue', 2, 16),
(3, 'Tompson', 'Garry', '22 street', 3, 7),
(4, 'Marinelli', 'Daniel', '111 avenue', 4, 12),
(5, 'Shiyamoto', 'Akari', '77 avenue', 5, 4),
(6, 'Denisenko', 'Oleg', 'Dobra street', 6, 1),
(7, 'Gora', 'Levko', 'Street 22', 7, 11),
(8, 'Yagami', 'Sintoku', 'Avenue 77', 7, 15),
(9, 'Sterling', 'Jimmy', 'Street 36', 9, 16),
(10, 'Radzinski', 'Tomasz', 'Street 89', 10, 18);

-- --------------------------------------------------------

--
-- Структура таблиці `profile_phone`
--

CREATE TABLE `profile_phone` (
  `phone_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `profile_phone`
--

INSERT INTO `profile_phone` (`phone_id`, `profile_id`) VALUES
(1, 2),
(2, 6),
(3, 3),
(4, 4),
(5, 5),
(6, 6);

-- --------------------------------------------------------

--
-- Структура таблиці `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `street`
--

INSERT INTO `street` (`id`, `name`, `country_id`) VALUES
(1, 'Kreschatik', 1),
(2, 'Deribasovskaya', 1),
(3, '1st street', 3),
(4, '2nd street', 3);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `last_login`) VALUES
(1, 'test1', '11112', '2018-11-19 00:00:00'),
(2, 'test2', '2', '2018-11-22 00:00:00'),
(3, 'test3', '3', '2018-11-15 00:00:00'),
(4, 'test4', '4', '2018-11-25 00:00:00'),
(5, 'test5', '5', '2018-11-01 00:00:00'),
(6, 'test6', '6', '2018-11-04 00:00:00'),
(7, 'test7', '7', '2018-12-12 00:00:00'),
(8, 'test8', '8', '2018-12-28 00:00:00'),
(9, 'test9', '9', '2018-12-19 00:00:00'),
(10, 'test10', '10_10', '2018-12-03 00:00:00'),
(11, 'test_111!', '1111', '2018-12-17 14:59:57'),
(14, 'user_test222', '1122333', '2018-12-17 16:40:13'),
(26, 'qwerty', '12345', '2018-12-21 21:50:07'),
(32, 'user_test', '1', '2018-12-22 16:00:33'),
(34, 'test22', '22', '2018-12-24 13:05:14'),
(36, 'test1_11', '123321', '2018-12-25 16:48:55');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Індекси таблиці `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `phone`
--
ALTER TABLE `phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Індекси таблиці `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `city_id` (`city_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Індекси таблиці `profile_phone`
--
ALTER TABLE `profile_phone`
  ADD KEY `phone_id` (`phone_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Індекси таблиці `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country_id` (`country_id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT для таблиці `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблиці `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `phone`
--
ALTER TABLE `phone`
  ADD CONSTRAINT `phone_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `profile_phone`
--
ALTER TABLE `profile_phone`
  ADD CONSTRAINT `profile_phone_ibfk_1` FOREIGN KEY (`phone_id`) REFERENCES `phone` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_phone_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `profile` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `street`
--
ALTER TABLE `street`
  ADD CONSTRAINT `street_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
