-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 04 2018 р., 22:47
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
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `city`
--

INSERT INTO `city` (`id`, `name`, `country_id`) VALUES
(1, 'Kiev', 1),
(2, 'Lviv', 1),
(3, 'London', 7),
(4, 'New York', 2),
(5, 'Berlin', 8),
(6, 'Roma', 9),
(7, 'Sidney', 10),
(8, 'Tokio', 11),
(9, 'Odessa', 1),
(10, 'Milan', 9),
(11, 'Kioto', 11);

-- --------------------------------------------------------

--
-- Структура таблиці `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `phone_code` varchar(11) DEFAULT NULL,
  `code` varchar(5) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `country`
--

INSERT INTO `country` (`id`, `name`, `phone_code`, `code`) VALUES
(1, 'Ukraine', '+380', 'ua'),
(2, 'USA', '+1', 'us'),
(7, 'Great Britain', '+44', 'gb'),
(8, 'Deutchland', '+49', 'd'),
(9, 'Italia', '+39', 'it'),
(10, 'Australia', '+61', 'au'),
(11, 'Japan', '+81', 'jp');

-- --------------------------------------------------------

--
-- Структура таблиці `phone`
--

CREATE TABLE `phone` (
  `id` int(11) NOT NULL,
  `number` int(11) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `phone`
--

INSERT INTO `phone` (`id`, `number`, `country_id`) VALUES
(1, 3245345, 1),
(2, 5455678, 2),
(3, 4457655, 7),
(4, 6767689, 8),
(5, 4457655, 11);

-- --------------------------------------------------------

--
-- Структура таблиці `profile`
--

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп даних таблиці `profile`
--

INSERT INTO `profile` (`id`, `last_name`, `first_name`, `user_id`, `city_id`) VALUES
(1, 'Ivan', 'Petrov', 1, 1),
(2, 'Simonov', 'Ilya', 2, 4),
(3, 'Erikson', 'Peter', 3, 4),
(4, 'Adler', 'Gans', 4, 5),
(5, 'Yuki', 'Kioshi', 5, 8);

-- --------------------------------------------------------

--
-- Структура таблиці `profile_phone`
--

CREATE TABLE `profile_phone` (
  `id` int(11) NOT NULL,
  `phone_id` int(11) DEFAULT NULL,
  `profile_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `profile_phone`
--

INSERT INTO `profile_phone` (`id`, `phone_id`, `profile_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5);

-- --------------------------------------------------------

--
-- Структура таблиці `street`
--

CREATE TABLE `street` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `sity_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `street`
--

INSERT INTO `street` (`id`, `name`, `sity_id`) VALUES
(1, 'Mira,25', 1),
(2, 'Gegel str,17', 5),
(3, 'Backer street, 23', 3),
(4, 'Wall street, 150', 4),
(5, 'Okinawa str', 8);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `last_login`) VALUES
(1, 'petrov@net', '12345r', '2018-11-30 14:32:45'),
(2, 'siminovv', '12321a', '2018-11-30 14:34:04'),
(3, 'erix', '456tyu', '2018-11-30 14:34:04'),
(4, 'adlr0178', '45654fgh', '2018-11-30 14:34:29'),
(5, 'yukiii', '1221jp', '2018-11-30 14:51:51');

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
  ADD KEY `user_id` (`user_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Індекси таблиці `profile_phone`
--
ALTER TABLE `profile_phone`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phone_id` (`phone_id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Індекси таблиці `street`
--
ALTER TABLE `street`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sity_id` (`sity_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `phone`
--
ALTER TABLE `phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `profile_phone`
--
ALTER TABLE `profile_phone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `street`
--
ALTER TABLE `street`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

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
  ADD CONSTRAINT `street_ibfk_1` FOREIGN KEY (`sity_id`) REFERENCES `city` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
