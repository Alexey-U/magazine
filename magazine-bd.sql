-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 23 2019 г., 09:32
-- Версия сервера: 5.7.20-log
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `magazine-bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Рубашки', 1, 1, NULL, NULL),
(2, 'Платья', 5, 1, NULL, NULL),
(3, 'Футболки', 3, 1, NULL, NULL),
(4, 'Майки', 4, 1, NULL, NULL),
(5, 'Сумки', 2, 1, NULL, NULL),
(6, 'Чемоданы', 6, 1, NULL, NULL),
(7, 'Брюки', 7, 1, NULL, NULL),
(8, 'Пиджаки', 8, 1, NULL, NULL),
(9, 'Галстуки', 9, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `likes`
--

CREATE TABLE `likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `like_from_id` int(11) DEFAULT NULL,
  `is_like` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `likes`
--

INSERT INTO `likes` (`id`, `message_id`, `user_id`, `like_from_id`, `is_like`, `created_at`, `updated_at`) VALUES
(107, 17, 2, 3, 0, '2018-10-07 06:57:30', '2018-10-07 07:25:03'),
(109, 23, 1, 3, 1, '2018-10-07 07:24:31', '2018-10-07 07:25:50'),
(110, 19, 1, 3, 1, '2018-10-07 07:27:01', '2018-10-07 07:27:01'),
(111, 21, 1, 3, 1, '2018-10-07 07:27:04', '2018-10-07 07:27:04'),
(112, 22, 4, 3, 1, '2018-10-07 07:27:08', '2018-10-07 07:27:08'),
(113, 17, 2, 1, 0, '2018-10-07 07:28:21', '2018-11-03 11:10:08'),
(114, 24, 3, 1, 1, '2018-10-07 07:29:31', '2018-10-12 04:15:56'),
(115, 22, 4, 1, 1, '2018-10-07 07:29:40', '2018-10-07 07:29:40'),
(116, 22, 4, 2, 1, '2018-10-07 07:30:22', '2018-10-07 07:30:22'),
(118, 20, 3, 1, 1, '2018-10-07 07:48:18', '2018-10-07 15:15:06');

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_28_133542_create_categories_table', 1),
(4, '2018_08_29_085254_create_products_table', 1),
(5, '2018_09_10_085641_create_orders_table', 2),
(6, '2018_09_13_092830_create_posts_table', 3),
(7, '2018_09_16_100948_create_likes_table', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `total_sum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` int(11) DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `oder_items` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `user_id`, `total_sum`, `tel`, `message`, `oder_items`, `created_at`, `updated_at`) VALUES
(1, 'Alexey', 1, '1750', 348329, 'Fuck yeah!', 'polo white   shirt black slim   gala silk', '2018-09-10 07:17:07', '2018-09-10 07:17:07'),
(2, 'Andrey', 2, '3300', 342342344, 'Заказ получился!', 'polo black   polo white   polo red', '2018-09-10 07:23:38', '2018-09-10 07:23:38'),
(7, 'Alexey', 1, '1800', 231313123, 'fsfdsfds', 'polo red   polo white', '2018-09-10 07:45:44', '2018-09-10 07:45:44'),
(8, 'Alexey', 1, '2300', 462523452, 'Заказ заказан.', 'polo black   polo white', '2018-09-23 06:48:20', '2018-09-23 06:48:20'),
(9, 'Alexey', 1, '5000', NULL, NULL, 'polo red   polo black', '2018-10-07 15:08:10', '2018-10-07 15:08:10'),
(10, 'Oleg', 3, '3300', 43534114, 'I really like here!', 'polo black   polo white   shirt black slim', '2018-10-12 04:26:16', '2018-10-12 04:26:16'),
(11, 'Alexey', 1, '1960', NULL, NULL, 'polo white   shirt black slim   skirt blue yellow', '2019-02-03 07:14:18', '2019-02-03 07:14:18');

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `message`, `author`, `product_id`, `created_at`, `updated_at`) VALUES
(17, 2, 'I like here!', 'Andrey', 1, '2018-09-17 08:38:32', '2018-10-04 05:28:27'),
(19, 1, 'Wow! Such a nice place!', 'Alexey', 1, '2018-09-18 05:16:33', '2018-10-04 05:04:45'),
(20, 3, 'So many options here!', 'Oleg', 1, '2018-09-18 06:53:01', '2018-10-04 05:04:43'),
(21, 1, 'Wow! Have fun!', 'Alexey', 3, '2018-10-04 04:01:38', '2018-10-04 05:04:38'),
(22, 4, 'I\'m also like here!', 'Vasyl', 1, '2018-10-04 04:14:14', '2018-10-04 05:47:24'),
(23, 1, 'Wowoowowowo!', 'Alexey', 1, '2018-10-05 07:59:12', '2018-10-05 07:59:12'),
(24, 3, 'Youhoooo!', 'Oleg', 1, '2018-10-07 06:34:06', '2018-10-07 06:34:06');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `availability` int(11) NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_new` int(11) NOT NULL,
  `is_recommended` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `code`, `price`, `availability`, `brand`, `image`, `description`, `is_new`, `is_recommended`, `status`, `created_at`, `updated_at`) VALUES
(1, 'polo red', 6, 100, 1000.00, 1, 'armani', 'images/home/product1.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 1, 1, NULL, NULL),
(2, 'polo black', 2, 101, 1500.00, 1, 'versache', 'images/home/product2.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 1, 1, NULL, NULL),
(3, 'polo white', 2, 102, 800.00, 1, 'versache', 'images/home/product3.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 0, 1, NULL, NULL),
(4, 'shirt black slim', 1, 103, 500.00, 1, 'mazeratti', 'images/home/product4.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 1, 1, NULL, NULL),
(5, 'skirt blue yellow', 3, 104, 660.00, 1, 'lanos', 'images/home/product5.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 1, 0, 1, NULL, NULL),
(6, 'jeans white red', 8, 105, 720.00, 1, 'nicole', 'images/home/product6.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 0, 1, NULL, NULL),
(7, 'gala silk', 1, 106, 450.00, 1, 'gala', 'images/home/recommend1.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 1, 1, 1, NULL, NULL),
(8, 'polo black', 4, 107, 900.00, 1, 'romax', 'images/home/recommend2.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 0, 1, 1, NULL, NULL),
(9, 'polo black', 5, 108, 1200.00, 1, 'viton', 'images/home/recommend3.jpg', 'Описание товара\n\n						Разнообразный и богатый опыт постоянный количественный рост и сфера нашей активности требуют определения и уточнения направлений прогрессивного развития. Таким образом реализация намеченных плановых заданий требуют определения и уточнения форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.\n\n						Повседневная практика показывает, что новая модель организационной деятельности способствует подготовки и реализации позиций, занимаемых участниками в отношении поставленных задач. Таким образом постоянное информационно-пропагандистское обеспечение нашей деятельности влечет за собой процесс внедрения и модернизации форм развития.', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Alexey', 'alex@gmail.com', '$2y$10$hV5uCJmfxlfVM.UBrCmCfuZSoL/OgXFvS654AQCy2Llf489/WRfzi', 'hVTVDtZtB0XN2CeHsmEPMIjLbJZw95CquM80T6z3gOvoqI8X2otYbZkvPMr4', 'images/icons/animal (2).png', '2018-09-04 09:10:51', '2018-09-04 09:10:51'),
(2, 'Andrey', 'and@gmail.com', '$2y$10$q//kTXA9jy3CwTi4GzO2d..c7/gLbmBW0/ebSjOp3t2.dWB1P06r2', '67n1Ohj5wSnuKeoQM8iec1LAWwlmtpuiJSx1ayiXyUbuSWahEMbnA16VDjtd', 'images/icons/elefant.png', '2018-09-06 05:32:12', '2018-09-06 05:32:12'),
(3, 'Oleg', 'oleg@gmail.com', '$2y$10$usFDjjWtFSl0mw2lJiWiFOyMREkILm/AuvXhh.yncwTQAZ/dNzPES', 'kbXoAkwfWUEbUAW60FZDy8oWUYSIs168WTrW1kC3CGWxgYeA4KAzoUPcLx5G', 'images/icons/hippopotamus (1).png', '2018-09-14 04:58:01', '2018-09-14 04:58:01'),
(4, 'Vasyl', 'vasyl@gmail.com', '$2y$10$yO1WkI/7elohiiKcs2DsY.YEaWLM.Kg0sWbJNdN0cmMDvCUlKfYX6', 'DjlHDzShwPtQ5px7V9vgAZ5bfBVke3UkToRnp4uj5nRllimnDcfmwCr4CRm3', 'images/icons/zebra.png', '2018-09-14 05:33:28', '2018-09-14 05:33:28');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
