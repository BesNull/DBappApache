-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Сен 01 2020 г., 22:43
-- Версия сервера: 10.4.11-MariaDB
-- Версия PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books`
--

-- --------------------------------------------------------

--
-- Структура таблицы `autor`
--

CREATE TABLE `autor` (
  `id` int(11) NOT NULL,
  `fio` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `autor`
--

INSERT INTO `autor` (`id`, `fio`) VALUES
(4, 'Булгаков Михаил Афанасьевич'),
(5, 'Александр Сергеевич Пушкин'),
(6, 'Стивен Чбоски');

-- --------------------------------------------------------

--
-- Структура таблицы `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `year` int(11) NOT NULL,
  `cost` double NOT NULL,
  `cnt` int(11) NOT NULL,
  `idCateg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `book`
--

INSERT INTO `book` (`id`, `name`, `year`, `cost`, `cnt`, `idCateg`) VALUES
(1, 'Война и мир', 1833, 560, 45, 1),
(2, 'Хорошо!', 2017, 600, 5, 6),
(3, 'Мастер и Маргарита', 2016, 160, 9, 6),
(6, 'Выстрел. Метель', 2002, 130, 1, 6),
(7, 'Хорошо быть тихоней', 2017, 330, 23, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `bookautor`
--

CREATE TABLE `bookautor` (
  `id` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `bookautor`
--

INSERT INTO `bookautor` (`id`, `idBook`, `idAutor`) VALUES
(4, 2, 5),
(3, 3, 4),
(5, 7, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `categs`
--

CREATE TABLE `categs` (
  `id` int(11) NOT NULL,
  `name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `categs`
--

INSERT INTO `categs` (`id`, `name`) VALUES
(1, 'Классика'),
(2, 'Приключения'),
(3, 'Сказки'),
(5, 'Поэзия'),
(6, 'Роман');

-- --------------------------------------------------------

--
-- Структура таблицы `korz`
--

CREATE TABLE `korz` (
  `id` int(11) NOT NULL,
  `idBook` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `korz`
--

INSERT INTO `korz` (`id`, `idBook`, `idUser`) VALUES
(1, 1, 1),
(2, 2, 5),
(3, 7, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `sum` double NOT NULL,
  `date` varchar(300) NOT NULL,
  `dateVip` varchar(300) NOT NULL,
  `idBook` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `sum`, `date`, `dateVip`, `idBook`, `idUser`) VALUES
(2, 600, '2020-09-16', '2020-09-25', 3, 4),
(3, 4322, '2020-09-23', '2020-09-24', 7, 6),
(4, 443, '2020-09-23', '2020-10-02', 3, 2),
(5, 788, '2020-09-17', '2020-09-14', 3, 6);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `fio` varchar(300) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `fio`, `email`) VALUES
(1, 'log', '123', NULL, NULL),
(2, 'Hulk', 'GerardTheBest', 'Катя Быценко', 'KatyaSobaka@mail.ru'),
(3, 'Hulk', 'GerardTheBest', 'Катя Быценко', 'KatyaSobaka@mail.ru'),
(4, 'Sir', 'FrankTheBest', 'Ирина Красотинка', 'IrinaSobaka@mail.ru'),
(5, 'Pat62', 'MCR2001', 'Дарья Петрушкина', 'DashaSobaka@mail.ru'),
(6, 'PilyMozg', '6666S', 'Софья Сальникова', 'SonyaSobaka@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCateg` (`idCateg`);

--
-- Индексы таблицы `bookautor`
--
ALTER TABLE `bookautor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBook` (`idBook`,`idAutor`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Индексы таблицы `categs`
--
ALTER TABLE `categs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `korz`
--
ALTER TABLE `korz`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBook` (`idBook`),
  ADD KEY `idUser` (`idUser`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idBook` (`idBook`),
  ADD KEY `idUser` (`idUser`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `autor`
--
ALTER TABLE `autor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `bookautor`
--
ALTER TABLE `bookautor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `categs`
--
ALTER TABLE `categs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `korz`
--
ALTER TABLE `korz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`idCateg`) REFERENCES `categs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `bookautor`
--
ALTER TABLE `bookautor`
  ADD CONSTRAINT `bookautor_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bookautor_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `korz`
--
ALTER TABLE `korz`
  ADD CONSTRAINT `korz_ibfk_1` FOREIGN KEY (`idBook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `korz_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`idBook`) REFERENCES `book` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
