-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 25 2023 г., 07:47
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cheezy`
--

-- --------------------------------------------------------

--
-- Структура таблицы `burgers`
--

CREATE TABLE `burgers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `price` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `burgers`
--

INSERT INTO `burgers` (`id`, `name`, `image`, `category`, `price`) VALUES
(1, 'Cheezy burger', 'images/product-1.png', 'burger', 2500),
(2, 'Jambon Burger', 'images/product-2.png', 'burger', 1700),
(3, 'Chicken Burger', 'images/product-3.png', 'burger', 2000),
(4, 'Burger Beef Steak', 'images/product-4.png', 'burger', 2500),
(5, 'Burger Cheese Fish', 'images/product-5.png', 'burger', 2000),
(6, 'Burger Beef', 'images/product-6.png', 'burger', 2200),
(7, 'Crispy Crave', 'images/product-7.png', 'burger', 1500),
(8, 'Vegy Elixir', 'images/product-8.png', 'burger', 1500),
(9, 'Coca-Cola', 'images/drink-1.png', 'soda', 450),
(10, 'Fanta', 'images/drink-2.png', 'soda', 450),
(11, 'Sprite', 'images/drink-3.png', 'soda', 450),
(12, 'Pepsi', 'images/drink-4.png', 'soda', 450),
(13, 'CHEEZY-фри', 'images/fries-1.png', 'fries', 800),
(14, 'Құлпынай коктейлі', 'images/cocktail-1.png', 'cocktail', 1200),
(15, 'Милкшейк', 'images/cocktail-2.png', 'cocktail', 1000),
(16, 'Шоколад коктейлі', 'images/cocktail-3.png', 'cocktail', 1200);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `phone`, `message`) VALUES
(12, 'Сатенов Нурали Нурланович	', 'fdgdgfds@gmail.com', '87085698545', 'Керемет'),
(14, 'Мирана', 'mirana@gmail.com', '87085556958', 'test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test test ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalSum` decimal(10,2) NOT NULL,
  `products` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `totalSum`, `products`) VALUES
(11, 'Мадина Аман', '+77052144585', 'Абай 78/5', '3500.00', 'Burger Cheese Fish (1), Crispy Crave (1)'),
(13, 'Мариям', '+77715669852', 'Лесная 78/2', '5400.00', 'CHEEZY-фри (3), Vegy Elixir (2)'),
(14, 'Сара', '87056963636', 'школьная 2/7, кв 42', '14000.00', 'Burger Beef (5), Милкшейк (3)'),
(15, 'Сара', '87056963636', 'школьная 2/7, кв 42', '14000.00', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `burgers`
--
ALTER TABLE `burgers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `burgers`
--
ALTER TABLE `burgers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT для таблицы `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
