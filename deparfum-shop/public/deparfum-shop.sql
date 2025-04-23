-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.0
-- Время создания: Апр 23 2025 г., 17:54
-- Версия сервера: 8.0.35
-- Версия PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `deparfum-shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `productID` int NOT NULL,
  `productBrandname` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `productModelname` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `productPrice` decimal(10,2) DEFAULT NULL,
  `productSeason` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `productMale` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`productID`, `productBrandname`, `productModelname`, `productPrice`, `productSeason`, `productMale`, `product_image`) VALUES
(1, 'Dior', 'Sauvage', 112.20, 'Зима', 'Мужские', '/IMAGES_PRODUCTS/sauvagedior.jpg'),
(2, 'Jean Paul Gaultier', 'Le Male', 300.99, 'Осень', 'Мужские', '/IMAGES_PRODUCTS/jeanpaulgautier.jpg'),
(3, 'Versace', 'Eros', 199.00, 'Лето', 'Мужские', '/IMAGES_PRODUCTS/versaceeros.jpg'),
(4, 'Creed', 'Aventus', 600.99, 'Весна', 'Унисекс', '/IMAGES_PRODUCTS/Creed-Aventus.jpg'),
(5, 'Paco Robanne', '1 Million', 278.12, 'Зима', 'Мужские', '/IMAGES_PRODUCTS/pacorabanne1million.jpg'),
(6, 'Burberry', 'London', 199.00, 'Осень', 'Мужские', '/IMAGES_PRODUCTS/burberrylondon.jpeg'),
(8, 'Tom Ford', 'Lost Cherry', 520.00, 'Весна', 'Женские', '/IMAGES_PRODUCTS/tomfordlostcherry.jpg'),
(9, 'Calvin Klein', 'CK One', 280.99, 'Лето', 'Унисекс', '/IMAGES_PRODUCTS/CKone.jpg'),
(10, 'Chanel', 'Bleu De Paris', 310.10, 'Весна', 'Мужские', '/IMAGES_PRODUCTS/chaneldeparis.jpg'),
(11, 'Lanvin', 'Jeanne', 480.00, 'Весна', 'Женские', '/IMAGES_PRODUCTS/lanvinjeanne.jfif'),
(12, 'Giorgio Armani ', 'Stronger With You', 390.99, 'Зима', 'Мужские', '/IMAGES_PRODUCTS/armaniswy.jpg'),
(13, 'Antonio Banderas', 'Blue Seduction', 170.00, 'Лето', 'Мужские', '/IMAGES_PRODUCTS/antonioblue.jpg'),
(14, 'Hugo Boss', 'Intense Eau De Parfum', 259.00, 'Весна', 'Унисекс', '/IMAGES_PRODUCTS/hugobossintense.jpg'),
(15, 'Gucci', 'Eau de Toilette Pour Femme', 500.00, 'Весна', 'Женские', '/IMAGES_PRODUCTS/guccipour.jpg'),
(16, 'Louis Vuitton', 'Mille Feux', 490.00, 'Осень', 'Унисекс', '/IMAGES_PRODUCTS/lvmille.jfif'),
(17, 'Jean Paul Gaultier', 'La Belle Le Parfum ', 280.00, 'Осень', 'Женские', '/IMAGES_PRODUCTS/jpgbelle.jpg'),
(18, 'Givenchy', 'L\'interdit', 360.90, 'Весна', 'Унисекс', '/IMAGES_PRODUCTS/givenchylin.jpg'),
(19, 'Lacoste', 'Homme', 230.99, 'Лето', 'Унисекс', '/IMAGES_PRODUCTS/lacostehomme.jpg'),
(20, 'Dolce&Gabbana', 'Pour Femme Intense', 330.10, 'Осень', 'Унисекс', '/IMAGES_PRODUCTS/dolcepour.jpg'),
(21, 'Montale', 'Black Aoud', 269.00, 'Осень', 'Унисекс', '/IMAGES_PRODUCTS/montaleblack.JPG'),
(22, 'Dior ', 'Homme Intense', 359.00, 'Зима', 'Мужские', '/IMAGES_PRODUCTS/diorhomme.jpg'),
(23, 'Tom Ford', 'Mandarino Di Amalfi', 670.00, 'Лето', 'Женские', '/IMAGES_PRODUCTS/tomfordblue.jpg'),
(24, 'Montale', 'Rose Elixir', 310.12, 'Весна', 'Женские', '/IMAGES_PRODUCTS/montalepink.jpg'),
(25, 'Versace', 'Eros Flame', 279.00, 'Лето', 'Унисекс', '/IMAGES_PRODUCTS/erosflame.JPG'),
(26, 'Mancera', 'Deep Forest', 420.99, 'Осень', 'Унисекс', '/IMAGES_PRODUCTS/manceradeepforest.jpg'),
(27, 'Giorgio Armani ', 'Acqua Di Gio', 577.99, 'Весна', 'Мужские', '/IMAGES_PRODUCTS/armanidigio.jpg'),
(28, 'Creed', 'Viking Cologne', 860.00, 'Лето', 'Унисекс', '/IMAGES_PRODUCTS/creedcologne.jfif'),
(29, 'Tom Ford', 'Tobacco Vanille', 629.00, 'Зима', 'Мужские', '/IMAGES_PRODUCTS/tomfordtobacco.jpg'),
(30, 'Paco Rabanne', 'Invictus Legend ', 411.00, 'Весна', 'Унисекс', '/IMAGES_PRODUCTS/pacorabannelegend.jpg'),
(31, 'Maison Francis Kurkdjian', 'Extrait Eau De Parfum', 580.00, 'Весна', 'Женские', '/IMAGES_PRODUCTS/francisboccarat.jpg'),
(32, 'Prada', 'Luna Rossa Black', 444.44, 'Зима', 'Унисекс', '/IMAGES_PRODUCTS/pradakk.jpg'),
(33, 'Jean Paul Gautier', 'Le Male Elixir', 359.00, 'Осень', 'Мужские', '/IMAGES_PRODUCTS/jeanpaulgautiergold.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `userlogin` varchar(24) COLLATE utf8mb4_general_ci NOT NULL,
  `userpassword` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usermail` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`userID`, `userlogin`, `userpassword`, `usermail`) VALUES
(1, 'rober', 'qwerty1234', 'pochta@gmail.com'),
(2, 'dgdgd', 'rgrddfdfd', 'obovf@mail.ru'),
(3, 'maxidir', '1234qwerty', 'maxidir@mail.ru'),
(4, 'dgdgdfjkd', 'rgrddfdfd', '73643786@878'),
(5, 'gold', 'rgrddfdfd', 'kakish@mail.ru'),
(6, 'dgdgd1', '123123', 'obovf1@mail.ru'),
(7, 'lol', 'lol', 'lol@mail.ru'),
(8, 'Diddy', '$2y$10$38.w/WU42gPRusEPLvO9fOE8yLUfG226UarVc/FNCJnS9j/JAbOru', 'dd@mail.ru'),
(9, 'denis', '$2y$10$qqkjVhUTgd4AIdXarbqPNeXrbFmRG5lHH1BUEPcI3BsN9jY3cBEuG', 'denis@mail.ru'),
(10, 'sfsd', '$2y$10$g96elBOpY80uUfVcM8q.oeRpZ9.xzLDUnBMcY8f0aC9n/vzA4RBLG', 'dfsd@mail.ru'),
(11, '', '$2y$10$oMGmfzCKAC8nqf43UuOzK.sh236w/aiIyX184xGg6cv/NmUwj5wbu', ''),
(12, 'vfd', '$2y$10$TBPrOCrt796j6ogywgWbsODqC9U5zKQysCQtr2A3xb59/QV1ruwgi', 'dvdffd@ef.cf'),
(13, 'robert', '$2y$10$sSXAwQIhPMAIVds3um46r.mVxPC6VS0UwW3h5blvBHC.w5Ij45i0W', 'robert@mail.ru'),
(14, 'totr', '$2y$10$XQK3SvFfdD.DpWXGzl6Y2.4iy1PxpqK5HRyLZCn01kWDvhRrxGV0u', 'totr@mial.ru'),
(15, '12345', '$2y$10$fNSJ6faO.uCRfHU/SSVkVexoygDCh6bGprQldBikgMSaq9Tg4LGbi', '12345@mail.ru');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userlogin` (`userlogin`),
  ADD UNIQUE KEY `usermail` (`usermail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `productID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
