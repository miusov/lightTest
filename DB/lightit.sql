-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 23 2017 г., 11:46
-- Версия сервера: 5.7.16
-- Версия PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `lightit`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `parent_id` int(11) UNSIGNED NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL,
  `user_id` int(225) NOT NULL,
  `message` varchar(2000) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `parent_id`, `name`, `user_id`, `message`, `created`) VALUES
(130, 0, 'Ольга', 18372757, 'Декларация скалярных типов введена в двух вариантах: принуждающая (по умолчанию) и строгая. Следующие типы могут использоваться для декларации параметров (в обоих вариантах): строки (string), целые (int), рациональные числа (float) и логические значения (bool). Они дополняют аргументы других типов, введенных в PHP 5: имена классов, интерфейсов, array и callable.', '2017-02-17 14:04:43'),
(131, 130, 'Ольга', 18372757, 'Для установки строгого режима, в самом начале файла необходимо поместить одну директиву declare. Это означает, что строгость декларации работает на уровне файла и не затрагивает весь остальной код. Эта директива затрагивает не только декларацию параметров, но и возвращаемые значения функций (смотри декларация возвращаемого типа), встроенные функции PHP и функции загруженных расширений.', '2017-02-17 14:04:54'),
(132, 0, 'Ольга', 18372757, 'Был добавлен оператор объединения с nul (??), являющийся синтаксическим сахаром для достаточно распространенного действия, когда совместно используются тернарный оператор и функция isset(). Он возвращает первый операнд, если он задан и не равен NULL, а в обратном случае возвращает второй операнд.', '2017-02-17 14:05:05'),
(134, 132, 'Дима', 10101188, 'Оператор spaceship (космический корабль) ', '2017-02-17 14:05:49');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `uid` int(64) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `photo_big` varchar(256) NOT NULL,
  `screen_name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `uid`, `first_name`, `last_name`, `photo_big`, `screen_name`, `created_at`) VALUES
(15, 8591634, 'Артём', 'Миусов', 'https://pp.vk.me/c630625/v630625634/3b5f5/uDAP0IMuuCE.jpg', 'miusovas', '2017-02-23 00:32:51');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
