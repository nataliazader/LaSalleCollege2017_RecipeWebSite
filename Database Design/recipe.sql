-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 05 2017 г., 03:03
-- Версия сервера: 10.1.21-MariaDB
-- Версия PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `recipe`
--

-- --------------------------------------------------------

--
-- Структура таблицы `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prepare_time` int(11) NOT NULL COMMENT 'minutes',
  `cook_time` int(11) NOT NULL COMMENT 'minutes',
  `calorie` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `serving` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Дамп данных таблицы `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `prepare_time`, `cook_time`, `calorie`, `type_id`, `serving`, `date`, `image`, `user_id`, `description`) VALUES
(4, 'Creamy Salad Dressing', 10, 5, 50, 1, 4, '2017-03-26 15:49:38', '4.jpg', 1, 'It\'s complex and lovely, perfect for dressing a simple plate of greens, like our favorite side salad, or for using as a dip for party platter of veggies.'),
(5, 'Italian Salad Dressing', 10, 15, 80, 1, 6, '2017-03-26 15:59:33', '5.jpg', 2, 'This Basic Italian Salad dressing is great for turning mixed greens, steamed broccoli or asparagus spears into a delicious salad.'),
(6, 'Party Cheese Ball Made Over', 15, 75, 120, 2, 25, '2017-03-26 16:09:45', '6.jpg', 7, 'No one will guess this is a better-for-you version of the classic cheese ball! The secret? Light cheese and chopped parsley instead of nuts for the coating.'),
(7, 'Strawberry Spinach Salad', 20, 70, 500, 3, 4, '2017-03-26 16:15:34', '7.jpg', 7, 'This spinach and strawberry salad is topped with a fabulous homemade poppy seed dressing.'),
(8, 'Cucumber-Carrot Salad', 15, 45, 60, 3, 6, '2017-03-26 16:21:14', '8.jpg', 6, 'This is super easy, very tasty and travels well so its great for picnics, lunch bags, whatever. It tastes wonderful at room temperature.'),
(9, 'Tandoori Chicken Salad', 30, 20, 350, 3, 4, '2017-03-26 16:27:49', '9.jpg', 5, 'Tangy grilled chicken atop a bed of greens mixed with onions, raisins, almonds, pineapple, mint sprigs, and lime. Includes a zesty Indian-style salad dressing.'),
(10, 'Delicious Ham and Potato Soup', 20, 25, 195, 4, 4, '2017-03-26 16:34:09', '10.jpg', 5, 'This is a delicious recipe for ham and potato soup that a friend gave to me. It is very easy and the great thing about it is that you can add additional ingredients.'),
(11, 'Simply Roasted Artichokes', 5, 80, 200, 5, 4, '2017-03-26 16:41:21', '11.jpg', 5, 'This recipe emphasizes the pure flavor of the artichoke: simple and delicious!'),
(12, 'Lebanese Bean Salad', 10, 130, 300, 6, 10, '2017-03-26 16:52:01', '12.jpg', 4, 'Quick, easy, and tasty. Can be used as a side dish or a snack on it\'s own. Great as a salad topper. Good with sea salt kettle chips, or toast.'),
(13, 'Classic Macaroni Salad', 10, 20, 390, 7, 20, '2017-03-26 16:58:32', '13.jpg', 5, 'This classic macaroni salad is a crowd-pleaser at every cookout, potluck, and picnic!'),
(14, 'Puff Pastry Waffles', 5, 3, 338, 8, 10, '2017-03-26 17:05:18', '14.jpg', 1, 'Turn puff pastry into waffles that are crispy on the outside and tender on the inside for a sweet breakfast treat ready in minutes'),
(15, 'San Francisco Pork Chops', 15, 45, 100, 9, 10, '2017-03-26 17:24:27', '15.jpg', 7, 'Tender pork chops simmer in a sweet and savory sauce flavored with beef broth, garlic, and soy sauce with just a pinch of red pepper flakes for zing.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`user_id`),
  ADD KEY `type` (`type_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_type` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `recipe_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
