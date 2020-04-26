-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Фев 11 2020 г., 21:08
-- Версия сервера: 5.7.28-0ubuntu0.19.04.2
-- Версия PHP: 7.3.8-1+ubuntu19.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `final`
--

-- --------------------------------------------------------

--
-- Структура таблицы `html`
--

CREATE TABLE `html` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `html`
--

INSERT INTO `html` (`id`, `content`) VALUES
(2, '<div class=\'card-wrapper\'>\r\n    <div class=\'card\' data-toggle-class=\'flipped\'>\r\n        <div class=\'card-front\'>\r\n            <div class=\'layer\'>\r\n                <h1>Lubos</h1>\r\n                <div class=\'corner\'></div>\r\n                <div class=\'corner\'></div>\r\n                <div class=\'corner\'></div>\r\n                <div class=\'corner\'></div>\r\n            </div>\r\n        </div>\r\n        <div class=\'card-back\'>\r\n            <div class=\'layer\'>\r\n                <div class=\'top\'>\r\n                    <h2>Chief Idea Officer</h2>\r\n                </div>\r\n                <div class=\'bottom\'>\r\n                    <h3>\r\n                        Phone:\r\n                        <a href=\'tel:+44 7542 20 33 83\'>+44 7542 20 33 83</a>\r\n                    </h3>\r\n                    <h3>\r\n                        Email:\r\n                        <a href=\'mailto:lmenus@lmen.us\'>lmenus@lmen.us</a>\r\n                    </h3>\r\n                    <h3>\r\n                        Twitter:\r\n                        <a href=\'https://www.twitter.com/lmenus\' target=\'_blank\'>lmenus</a>\r\n                    </h3>\r\n                    <h3>\r\n                        Web:\r\n                        <a href=\'https://www.lmen.us\' target=\'_blank\'>lmen.us</a>\r\n                    </h3>\r\n                </div>\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `html`
--
ALTER TABLE `html`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `html`
--
ALTER TABLE `html`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
