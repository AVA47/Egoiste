-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 29 2024 г., 11:00
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
-- База данных: `egoist`
--

-- --------------------------------------------------------

--
-- Структура таблицы `busket`
--

CREATE TABLE `busket` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'default_image.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `busket`
--

INSERT INTO `busket` (`id`, `id_products`, `id_users`, `name`, `price`, `img`) VALUES
(14, 34, 7, 'Конго Вюгёль Киву', '1450', 'assets/img/Конго Вюгёль Киву.jpg'),
(15, 35, 7, 'Эфиопия Хамбела', '1450', 'assets/img/Эфиопия Хамбела.jpg'),
(34, 34, 5, 'Конго Вюгёль Киву', '1450', 'assets/img/Конго Вюгёль Киву.jpg'),
(35, 35, 5, 'Эфиопия Хамбела', '1450', 'assets/img/Эфиопия Хамбела.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `name`, `email`, `message`) VALUES
(44, 'Артём', 'avlasenok.ru@gmail.com', '«Сладкая еда — это главный источник позитивных эмоций», — рассказывает Женя Шпехт, — «Так уж устроен наш организм с детства! Нам всем нравится сладкое. Сладкие продукты — это зачастую быстро усваиваемые углеводы (читайте: быстрый источник нашей энергии).'),
(45, 'artem', 'avlasenok.ru@gmail.com', 'SDfsdf'),
(46, 'Артём', 'avlasenok.ru@gmail.com', '32'),
(47, 'Артём', 'avlasenok.ru@gmail.com', '123123'),
(48, 'Артём', 'avlasenok.ru@gmail.com', '312'),
(49, 'Артём', 'avlasenok.ru@gmail.com', '123'),
(50, 'Артём', 'avlasenok.ru@gmail.com', '32'),
(51, 'Артём', 'avlasenok.ru@gmail.com', '32'),
(52, 'Артём', 'avlasenok.ru@gmail.com', '32'),
(53, 'Артём', 'avlasenok.ru@gmail.com', '123'),
(54, 'artem', 'avlasenok.ru@gmail.com', '21213'),
(55, 'artem', 'avlasenok.ru@gmail.com', 'фувыв');

-- --------------------------------------------------------

--
-- Структура таблицы `oform`
--

CREATE TABLE `oform` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `total_price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `obrabotka` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roasting` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `flavor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `obrabotka`, `roasting`, `flavor`, `descriptions`, `img`) VALUES
(34, 'Конго Вюгёль Киву', '1450', 'Мытый', 'Фильтр', 'Красное яблоко, апельсин, клюква, цветочный мед', 'Кофе Конго Вюгёль Киву прибыл к нам со станции обработки Вюгёль, который принадлежит кооперативу Коопаде в содействии с Национальным парком Вирунга, который расположен на высокогорье к северо-западу от озера Эдвард. Этой станцией полностью управляют женщины.', 'assets/img/Конго Вюгёль Киву.jpg'),
(35, 'Эфиопия Хамбела', '1450', 'Мытый', 'Фильтр', 'Фруктовый, чайная роза, помело, яблоко, кумкват', 'Лот Эфиопия Хамбела собран на высоте 2095 метров над уровнем моря. Климат и количество осадков в этом регионе способствуют созданию сложного и глубокого вкусового профиля.\r\n\r\nКофе для этого лота собран в районе Гуджи и обработан на станции Хамбела классическим мытым способом. Ягоды здесь предварительно сортируют и депульпируют, затем погружают в танки с чистой водой, после чего сушат на африканских кроватях до уровня содержания влаги около 11,5%.\r\n', 'assets/img/Эфиопия Хамбела.jpg'),
(36, 'Руанда Хумуре', '2350', 'Мытый', 'Фильтр', 'Фруктовый, чайная роза, помело, яблоко, кумкват', 'Кофейные ягоды для лота Руанду Хумуре выращены на вулканической почве на высоте 1550-1835 метров над уровнем моря.\r\n\r\nЗдесь культивируют красный бурбон, а весь урожай собирают исключительно вручную, так что в депульпаторы попадают только самые спелые ягоды.\r\n\r\nЛот обработан классическим мытым способом и высушен на африканских кроватях.\r\n\r\nКак правило, кофе, обработанный таким образом, имеет довольно высокую кислотность, которую можно сравнить с цитрусовой, цветочной или ягодной. Благодаря мытой обработке зачастую кофе получается более чистым и однородным, тактильно более легким по сравнению с другими обработками. Однако все это очень субъективно.', 'assets/img/Руанда Хумуре.jpg'),
(45, 'Тест', '111', 'Тест', 'Тест', 'Тест', 'Тест', 'assets/img/true-status.png');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `type` bigint(20) NOT NULL DEFAULT 1,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `type`, `password`) VALUES
(1, 'admin', 1, 'admin11'),
(2, 'artem', 2, '202cb962ac59075b964b07152d234b70'),
(3, 'artem', 2, '202cb962ac59075b964b07152d234b70'),
(4, 'ava', 2, '123'),
(5, 'dima', 2, '12345'),
(6, 'artem', 2, '123'),
(7, 'anton', 2, '123'),
(8, 'sad', 1, '123');

-- --------------------------------------------------------

--
-- Структура таблицы `vakan`
--

CREATE TABLE `vakan` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptions` varchar(5000) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `vakan`
--

INSERT INTO `vakan` (`id`, `name`, `zp`, `descriptions`) VALUES
(6, 'Менеджер', '19 000', 'ТЫ НАМ ПОДХОДИШЬ, ЕСЛИ:\r\n\r\nработал в сфере продаж (продавец-консультант, менеджер по продажам, менеджер по работе с клиентами)\r\nработал в банковской сфере ( специалист банка, кассир-операционист, клиентский менеджер, работник call-центр)\r\nработал в сфере гос.закупок\r\nработал в сфере общепита (официант, администратор)'),
(8, 'Уборщик', '12 000', 'Нужен уборщик на филиал расположенный на Ленина 16');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `busket`
--
ALTER TABLE `busket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `oform`
--
ALTER TABLE `oform`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_products` (`id_products`),
  ADD KEY `id_users` (`id_users`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vakan`
--
ALTER TABLE `vakan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `busket`
--
ALTER TABLE `busket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `oform`
--
ALTER TABLE `oform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `vakan`
--
ALTER TABLE `vakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `busket`
--
ALTER TABLE `busket`
  ADD CONSTRAINT `id_products` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_users` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `oform`
--
ALTER TABLE `oform`
  ADD CONSTRAINT `oform_ibfk_1` FOREIGN KEY (`id_products`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `oform_ibfk_2` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
