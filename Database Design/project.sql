-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2017 at 07:54 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Quick&Easy'),
(2, 'Kid Friendly'),
(3, 'Entertaining'),
(4, 'Weeknight'),
(5, 'Cookout'),
(6, 'Globally inspired'),
(7, 'Spring'),
(8, 'Summer'),
(9, 'Winter'),
(10, 'Fall'),
(11, 'Chicken'),
(12, 'Beef'),
(13, 'Pork'),
(14, 'Seafood'),
(15, 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `prepare_time` int(11) NOT NULL COMMENT 'minutes',
  `cook_time` int(11) NOT NULL COMMENT 'minutes',
  `calorie` int(11) NOT NULL,
  `typeId` int(11) NOT NULL,
  `serving` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(30) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`id`, `name`, `prepare_time`, `cook_time`, `calorie`, `typeId`, `serving`, `date`, `image`, `userId`) VALUES
(4, 'Creamy Salad Dressing', 10, 5, 50, 1, 4, '2017-03-26 15:49:38', '4.jpg', 1),
(5, 'Italian Salad Dressing', 10, 15, 80, 1, 6, '2017-03-26 15:59:33', '5.jpg', 2),
(6, 'Party Cheese Ball Made Over', 15, 75, 120, 2, 25, '2017-03-26 16:09:45', '6.jpg', 7),
(7, 'Strawberry Spinach Salad', 20, 70, 500, 3, 4, '2017-03-26 16:15:34', '7.jpg', 7),
(8, 'Cucumber-Carrot Salad', 15, 45, 60, 3, 6, '2017-03-26 16:21:14', '8.jpg', 6),
(9, 'Tandoori Chicken Salad', 30, 20, 350, 3, 4, '2017-03-26 16:27:49', '9.jpg', 5),
(10, 'Delicious Ham and Potato Soup', 20, 25, 195, 4, 4, '2017-03-26 16:34:09', '10.jpg', 5),
(11, 'Simply Roasted Artichokes', 5, 80, 200, 5, 4, '2017-03-26 16:41:21', '11.jpg', 5),
(12, 'Lebanese Bean Salad', 10, 130, 300, 6, 10, '2017-03-26 16:52:01', '12.jpg', 4),
(13, 'Classic Macaroni Salad', 10, 20, 390, 7, 20, '2017-03-26 16:58:32', '13.jpg', 5),
(14, 'Puff Pastry Waffles', 5, 3, 338, 8, 10, '2017-03-26 17:05:18', '14.jpg', 1),
(15, 'San Francisco Pork Chops', 15, 45, 100, 9, 10, '2017-03-26 17:24:27', '15.jpg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_category`
--

CREATE TABLE `recipe_category` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_category`
--

INSERT INTO `recipe_category` (`id`, `recipe_id`, `category_id`) VALUES
(1, 4, 1),
(2, 4, 4),
(3, 4, 9),
(4, 5, 1),
(5, 5, 3),
(7, 5, 8),
(6, 5, 11),
(8, 6, 3),
(9, 6, 6),
(10, 6, 9),
(11, 6, 15),
(13, 7, 4),
(12, 7, 8),
(15, 8, 4),
(14, 8, 7),
(17, 8, 8),
(16, 8, 15),
(18, 9, 1),
(19, 9, 11),
(20, 10, 2),
(22, 10, 3),
(21, 10, 9),
(24, 10, 10),
(23, 10, 12),
(28, 11, 3),
(25, 11, 4),
(27, 11, 9),
(26, 11, 15),
(29, 12, 4),
(30, 12, 9),
(31, 13, 1),
(32, 13, 2),
(33, 13, 4),
(34, 13, 8),
(35, 14, 1),
(36, 14, 2),
(37, 15, 3),
(38, 15, 5),
(40, 15, 9),
(39, 15, 13);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_comment`
--

CREATE TABLE `recipe_comment` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8 NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_comment`
--

INSERT INTO `recipe_comment` (`id`, `recipe_id`, `comment`, `user_id`) VALUES
(1, 4, 'Very delicious!!', 2),
(2, 4, 'Fast to prepare!', 1),
(3, 5, 'Yammi', 6);

-- --------------------------------------------------------

--
-- Table structure for table `recipe_ingridient`
--

CREATE TABLE `recipe_ingridient` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `quantity` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_ingridient`
--

INSERT INTO `recipe_ingridient` (`id`, `recipe_id`, `name`, `quantity`, `description`) VALUES
(22, 4, 'Dijon mustard', '1 teaspoon', 'or other grainy mustard'),
(23, 4, 'mayonnaise', '1 1/2 tablespoons', ''),
(25, 4, 'salt', 'Pinch', ''),
(26, 4, 'sugar', 'Pinch', ''),
(27, 4, 'Fresh pepper', '1 ', 'to taste'),
(28, 4, 'champagne vinegar', '1 tablespoon', ''),
(29, 5, 'neutral salad oil, such as canola', '1 cup', ''),
(30, 5, 'white wine vinegar', '1/4 cup', ''),
(31, 5, 'red wine vinegar', '2 tablespoons', ''),
(32, 5, 'garlic clove', '1 large', 'pressed'),
(33, 5, 'finely chopped shallots', '2 tablespoons', ''),
(34, 5, 'finely chopped red bell pepper', '2 tablespoons', ''),
(35, 5, 'Dijon mustard', '2 teaspoons', ''),
(36, 5, 'honey', '1 teaspoon', ''),
(37, 5, 'kosher salt', '1 teaspoon', 'plus more to taste'),
(39, 5, 'dried oregano', '1/4 teaspoon', ''),
(40, 5, 'dried marjoram', '1/4 teaspoon', ''),
(41, 5, 'red pepper flakes', 'Pinch of', ''),
(42, 5, 'Freshly ground black pepper', '1', ' to taste'),
(43, 6, 'Philadelphia Light Brick Cream Cheese Spread', '2 pkg. (250 g each)', ''),
(44, 6, 'Cracker Barrel Shredded Light Mozza-Cheddar Cheese', '1/2 cup ', ''),
(46, 6, 'finely chopped red peppers', '1 tablespoon', ''),
(47, 6, 'finely chopped green onions', '1 tablespoon', ''),
(48, 6, 'Dijon mustard', '1 teaspoon', ''),
(49, 6, 'finely chopped fresh parsley', '1/2 cup', ''),
(50, 6, 'stalks celery', '12', 'cut crosswise into quarters'),
(51, 6, 'Ritz Crackers with Whole Wheat', '', ''),
(52, 7, 'sesame seeds', '2 tablespoons', ''),
(53, 7, 'poppy seeds', '1 tablespoon', ''),
(54, 7, 'white sugar', '1/2 cup', ''),
(55, 7, 'olive oil', '1/2 cup', ''),
(56, 7, 'distilled white vinegar', '1/4 cup', ''),
(57, 7, 'paprika', '1/4 teaspoon', ''),
(58, 7, 'Worcestershire sauce', '1/4 teaspoon', ''),
(59, 7, 'minced onion', '1 tablespoon', ''),
(60, 7, 'fresh spinach', '10 ounces', 'rinsed, dried and torn into bite-size pieces'),
(61, 7, 'strawberries', '1 quart', 'cleaned, hulled and sliced'),
(62, 7, 'almonds', '1/4 cup', 'blanched and slivered'),
(63, 8, 'seasoned rice vinegar', '1/4 cup', ''),
(64, 8, 'white sugar', '1 teaspoon', ''),
(65, 8, 'vegetable oil', '1/2 teaspoon', ''),
(66, 8, 'grated peeled ginger', '1/4 teaspoon', ''),
(67, 8, 'salt', '1/4 teaspoon', ''),
(68, 8, 'sliced carrot', '1 cup', ''),
(69, 8, 'sliced green onion', '2 tablespoons', ''),
(70, 8, 'minced red bell pepper', '2 tablespoons', ''),
(71, 8, 'cucumber', '1/2', 'halved lengthwise, seeded, and sliced'),
(72, 9, 'honey mustard dressing', '1 cup', ''),
(73, 9, 'ground cumin', '1 1/2 tablespoons', ''),
(74, 9, 'curry powder', '1 tablespoon', ''),
(75, 9, 'mango yogurt', '1 (8 ounce) container', ''),
(76, 9, 'garam masala', '2 tablespoons', ''),
(77, 9, 'lemon juice', '2 teaspoons', ''),
(78, 9, 'skinless, boneless chicken breast halves', '4 (4 ounce)', ''),
(79, 9, 'red onion', '1/2', 'thinly sliced'),
(80, 9, 'raisins', '1/2 cup', ''),
(81, 9, 'blanched slivered almonds', '1/2 cup', ''),
(82, 9, 'drained canned pineapple tidbits', '3/4 cup', ''),
(83, 9, 'mixed salad greens', '8 cups', ''),
(84, 9, 'fresh mint', '4 sprigs', ''),
(85, 9, 'lime', '4 wedges', ''),
(86, 10, 'peeled and diced potatoes', '3 1/2 cups', ''),
(87, 10, 'diced celery', '1/3 cup', ''),
(88, 10, 'finely chopped onion', '1/3 cup', ''),
(89, 10, 'diced cooked ham', '3/4 cup', ''),
(90, 10, 'water', '3 1/4 cups', ''),
(91, 10, 'chicken bouillon granules', '2 tablespoons', ''),
(92, 10, 'salt', '1/2 teaspoon', 'or to taste'),
(93, 10, 'ground white or black pepper', '1 teaspoon', 'or to taste'),
(94, 10, 'butter', '5 tablespoons', ''),
(95, 10, 'all-purpose flour', '5 tablespoons', ''),
(96, 10, 'milk', '2 cups', ''),
(97, 11, 'whole artichokes', '4 large', 'top 1 inch and stems removed'),
(98, 11, 'fresh lemon juice', '1/4 cup', ''),
(99, 11, 'olive oil', '1/4 cup', ''),
(100, 11, 'cloves garlic', '4', 'cloves peeled and crushed'),
(101, 11, 'salt', '', ''),
(102, 12, 'fava beans', '1 (15 ounce) can', 'drained and rinsed'),
(103, 12, 'chickpeas', '1 (15 ounce) can', 'drained and rinsed'),
(104, 12, 'white beans', '1 (15.5 ounce) can ', 'drained and rinsed'),
(105, 12, 'cup chopped flat leaf parsley', '1/4', 'or more to taste'),
(106, 12, 'olive oil', '3 tablespoons', ''),
(107, 12, 'cloves garlic', '2 ', 'minced'),
(108, 12, 'lemon', '1', 'juiced'),
(109, 12, 'kosher salt', '', ''),
(110, 12, 'ground black pepper', '', 'to taste'),
(111, 13, 'uncooked elbow macaroni', '4 cups', ''),
(112, 13, 'mayonnaise', '1 cup', ''),
(113, 13, 'distilled white vinegar', '1/4 cup', ''),
(114, 13, 'white sugar', '2/3 cup', ''),
(115, 13, 'prepared yellow mustard', '2 1/2 tablespoons', ''),
(116, 13, 'salt', '1 1/2 teaspoons', ''),
(117, 13, 'ground black pepper', '1/2 teaspoon', ''),
(118, 13, 'onion', '1 large', 'chopped'),
(119, 13, 'celery', '2 stalks', 'chopped'),
(120, 13, 'green bell pepper', '1', 'seeded and chopped'),
(121, 13, 'grated carrot (optional)', '1/4 cup', ''),
(122, 13, 'chopped pimento peppers (optional)', '2 tablespoons', ''),
(123, 14, 'frozen puff pastry', '1 (17.3 ounce) package', 'thawed'),
(124, 14, 'cooking spray', '', ''),
(125, 15, 'vegetable oil', '1 tablespoon', ''),
(126, 15, 'boneless pork chops', '4 (3/4 inch-thick)', 'trimmed'),
(127, 15, 'clove garlic', '1', 'minced'),
(128, 15, 'beef broth', '1/4 cup', ''),
(129, 15, 'soy sauce', '1/4 cup', ''),
(130, 15, 'brown sugar', '2 tablespoons', ''),
(131, 15, 'vegetable oil', '2 teaspoons', ''),
(132, 15, 'red pepper flakes', '1/4 teaspoon', ''),
(133, 15, 'cornstarch', '2 teaspoons', ''),
(134, 15, 'water', '2 tablespoons', '');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_prepare`
--

CREATE TABLE `recipe_prepare` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_prepare`
--

INSERT INTO `recipe_prepare` (`id`, `recipe_id`, `step`, `description`) VALUES
(5, 4, 1, 'Whisk together the mustard, mayonnaise, salt, sugar, and pepper until combined.'),
(6, 4, 2, 'Add the vinegar and whisk until smooth. Toss with salad greens and serve.'),
(7, 5, 1, 'Combine all of the ingredients in a jar with a tight fitting lid.Shake vigorously until the mixture is thickened and well-combined. Alternatively, combine the ingredients in a bowl and whisk until combined.\r\n'),
(8, 5, 2, 'Taste the dressing using a lettuce leaf and adjust seasonings. The dressing will keep in the refrigerator for several weeks.'),
(9, 6, 1, 'Beat cream cheese spread and shredded cheese in small bowl with mixer until well blended.'),
(10, 6, 2, 'Add next 3 ingredients; mix well. Refrigerate 1 hour.'),
(11, 6, 3, 'Shape into ball; roll in parsley. Serve with celery and crackers.'),
(12, 7, 1, 'In a medium bowl, whisk together the sesame seeds, poppy seeds, sugar, olive oil, vinegar, paprika, Worcestershire sauce and onion. Cover, and chill for one hour.'),
(13, 7, 2, 'In a large bowl, combine the spinach, strawberries and almonds. Pour dressing over salad, and toss. Refrigerate 10 to 15 minutes before serving.'),
(14, 8, 1, 'Whisk rice vinegar, sugar, vegetable oil, ginger, and salt together in a bowl until sugar and salt are dissolved into a smooth dressing.'),
(15, 8, 2, 'Toss carrot, green onion, bell pepper, and cucumber in the dressing to evenly coat.'),
(16, 8, 3, 'Cover bowl with plastic wrap and refrigerate until chilled, about 30 minutes.'),
(17, 9, 1, 'In a small bowl, whisk together honey mustard dressing, ground cumin, and curry powder. Cover, and refrigerate until serving.'),
(18, 9, 2, 'In a baking dish, whisk together yogurt, garam masala, and lemon juice. Place chicken breasts in the dish, and turn to coat. Cover, and refrigerate for at least 1 hour, turning occasionally.'),
(19, 9, 3, 'Preheat an outdoor grill for high heat. Lightly brush oil over grill grate. Grill chicken until done, about 6 to 8 minutes per side.'),
(20, 9, 4, 'In a small bowl, mix together onion, raisins, almonds, and pineapple.'),
(21, 9, 5, 'In a large bowl, toss salad greens with salad dressing and 3/4 of the almond mixture. Divide salad among 4 plates. Sprinkle equal amounts of reserved almond mixture over each salad. Top each with grilled chicken, and garnish with a mint sprig and a lime wedge.'),
(22, 10, 1, 'Combine the potatoes, celery, onion, ham and water in a stockpot. Bring to a boil, then cook over medium heat until potatoes are tender, about 10 to 15 minutes. Stir in the chicken bouillon, salt and pepper.'),
(23, 10, 2, 'In a separate saucepan, melt butter over medium-low heat. Whisk in flour with a fork, and cook, stirring constantly until thick, about 1 minute. Slowly stir in milk as not to allow lumps to form until all of the milk has been added. Continue stirring over medium-low heat until thick, 4 to 5 minutes.'),
(24, 10, 3, 'Stir the milk mixture into the stockpot, and cook soup until heated through. Serve immediately.'),
(25, 11, 1, 'Preheat oven to 425 degrees F (220 degrees C).'),
(26, 11, 2, 'Place artichokes stem-side down in a bowl and drizzle with lemon juice.'),
(27, 11, 3, 'Slightly separate the artichoke leaves with your hands.'),
(28, 11, 4, 'Insert a knife blade into the center of each artichoke to create a garlic clove-size space.'),
(29, 11, 5, 'Drizzle each artichoke with olive oil.'),
(32, 11, 6, 'Press 1 clove of garlic into the center of each artichoke and season with salt.'),
(33, 11, 7, 'Tightly wrap each artichoke twice with heavy-duty aluminum foil.'),
(34, 11, 8, 'Place in baking dish and bake in the preheated oven until sizzling, about 1 hour 20 minutes'),
(35, 12, 1, 'Mix fava beans, chickpeas, white beans, parsley, olive oil, garlic, and lemon juice together in a bowl. Season with kosher salt and black pepper. Chill and marinate in refrigerator for at least 2 hours.'),
(36, 13, 1, 'Bring a large pot of lightly salted water to a boil. Add the macaroni, and cook until tender, about 8 minutes. Rinse under cold water and drain.'),
(37, 13, 2, 'In a large bowl, mix together the mayonnaise, vinegar, sugar, mustard, salt and pepper. Stir in the onion, celery, green pepper, carrot, pimentos and macaroni. Refrigerate for at least 4 hours before serving, but preferably overnight.'),
(38, 14, 1, 'Line a cutting board with parchment paper. Unfold puff pastry onto cutting board. Cut each sheet into 4 equal squares.'),
(39, 14, 2, 'Preheat a waffle iron according to manufacturer''s instructions. Grease with cooking spray.'),
(40, 14, 3, 'Place one puff pastry square in the preheated waffle iron; cook until golden brown, 3 to 5 minutes. Repeat with remaining puff pastry squares.'),
(41, 15, 1, 'Heat 1 tablespoon vegetable oil in a skillet over medium heat. Brown chops in hot oil, about 5 minutes per side; remove pork to a plate, reserving oil in skillet.'),
(42, 15, 2, 'Cook and stir garlic in reserved drippings until fragrant, about 1 minute. Whisk beef broth, soy sauce, brown sugar, 2 teaspoons vegetable oil, and red pepper flakes in a bowl, dissolving brown sugar. Return pork chops to skillet and pour soy sauce mixture over the chops. Bring sauce to a boil, cover skillet, and reduce heat to low. Simmer chops until tender, 30 to 35 minutes, turning once halfway through cooking.'),
(43, 15, 3, 'Transfer chops to a serving platter. Whisk cornstarch and water in a small bowl until smooth; stir into pan juices and simmer until thickened, about 5 minutes. Pour sauce over chops to serve.');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_rating`
--

CREATE TABLE `recipe_rating` (
  `id` int(11) NOT NULL,
  `recipe_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipe_rating`
--

INSERT INTO `recipe_rating` (`id`, `recipe_id`, `user_id`, `rating`) VALUES
(1, 4, 1, 4),
(3, 4, 2, 5),
(4, 5, 6, 3),
(5, 5, 1, 5),
(6, 5, 5, 2),
(7, 6, 2, 5),
(8, 8, 5, 5),
(9, 8, 1, 2),
(10, 8, 6, 4),
(11, 10, 7, 5),
(12, 10, 1, 4),
(13, 11, 1, 3),
(14, 13, 7, 5),
(15, 13, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `image` varchar(30) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `image`, `description`) VALUES
(1, 'Dressings & Sauces', '1.jpg', 'A type of sauce that may use mayonnaise or a vinaigrette combined with other ingredients to create a topping or flavoring that can be mixed into salad greens or salad items being prepared. Salad dressings or sauces as they are also known, have evolved into many different types and varieties that maintain old recipes as well as new and contemporary types of ingredients.'),
(2, 'Appetizers', '2.jpg', 'Are you going to have a dinner party? Maybe you just want to spice up your Wednesday night dinner routine? Serve a multiple course meal with these great appetizer recipes! Or...better yet...throw an appetizer party!'),
(3, 'Salads & Sandwiches', '3.jpg', 'Salads were food dishes that were often very crisp, and served at full meals, sometimes alongside meat.'),
(4, 'Soups & Stews', '4.jpg', 'Soup is a primarily liquid food, generally served warm or hot (but may be cool or cold), that is made by combining ingredients such as meat and vegetables with stock, juice, water, or another liquid. Hot soups are additionally characterized by boiling solid ingredients in liquids in a pot until the flavors are extracted, forming a broth.'),
(5, 'Vegetables', '5.jpg', 'In everyday usage, a vegetable is any part of a plant that is consumed by humans as food as part of a meal. The term vegetable is somewhat arbitrary, and largely defined through culinary and cultural tradition. It normally excludes other food derived from plants such as fruits, nuts, and cereal grains, but includes seeds such as pulses. The original meaning of the word vegetable, still used in biology, was to describe all types of plant, as in the terms "vegetable kingdom" and "vegetable matter".'),
(6, 'Rice, Grains, & Beans', '6.jpg', 'Rice and beans are a staple food in many cultures around the world. It provides several important nutrients, and is widely available.'),
(7, 'Pasta', '7.jpg', 'Pasta  is a staple food of traditional Italian cuisine, with the first reference dating to 1154 in Sicily. It is also commonly used to refer to the variety of pasta dishes. Typically, pasta is a noodle made from an unleavened dough of a durum wheat flour mixed with water or eggs and formed into sheets or various shapes, then cooked by boiling or baking. It can also be made with flour from other cereals or grains.[citation needed] Pastas may be divided into two broad categories, dried (pasta secca) and fresh (pasta fresca).'),
(8, 'Eggs & Breakfast', '8.jpg', 'Breakfast is the first meal of a day, most often eaten in the early morning before undertaking the day''s work. Among English speakers, "breakfast" can be used to refer to this meal or to refer to a meal composed of traditional breakfast foods (such as eggs, porridge and sausage) served at any time of day. The word literally refers to breaking the fasting period of the prior night'),
(9, 'Meat', '9.jpg', 'Meat is mainly composed of water, protein, and fat. It is edible raw, but is normally eaten after it has been cooked and seasoned or processed in a variety of ways. Unprocessed meat will spoil or rot within hours or days as a result of infection with and decomposition by bacteria and fungi.'),
(11, 'Bread & Pizza', '11.jpg', 'Pizza is a yeasted flatbread generally topped with tomato sauce and cheese and baked in an oven. It is commonly topped with a selection of meats, vegetables and condiments. The term was first recorded in the 10th century, in a Latin manuscript from Gaeta in Central Italy. The modern pizza was invented in Naples, Italy, and the dish and its variants have since become popular and common in many areas of the world.'),
(12, 'Quick Breads & Muffins', '12.jpg', 'A muffin is an individual-sized, baked quick bread product.\r\n\r\nMuffins in the United States are similar to cupcakes in size and cooking methods, the main difference being that cupcakes tend to be sweet desserts using cake batter and which are often topped with sugar frosting. Muffins are available in both savory varieties, such as cornmeal and cheese muffins, or sweet varieties such as blueberry, chocolate chip or banana flavours. Muffins are often eaten as a breakfast food. Coffee may be served to accompany muffins. Fresh baked muffins are sold by bakeries, donut shops and some fast food restaurants and coffeehouses. Factory baked muffins are sold at grocery stores and convenience stores and they are also served in some coffee shops and cafeterias.'),
(13, 'Cookies', '13.jpg', 'A cookie is a baked or cooked good that is small, flat, and sweet, usually containing flour, sugar and some type of oil or fat. It may include other ingredients such as raisins, oats, chocolate chips or nuts.\r\nIn most English-speaking countries except for the US and Canada, crisp cookies are called biscuits. Chewier biscuits are sometimes called cookies even in the UK. Some cookies may also be named by their shape, such as date squares or bars.'),
(14, 'Brownies & Bars', '14.jpg', 'A brownie is a square baked dessert. It is a cross between a cake and a soft cookie in texture and comes in a variety of forms. Depending on its density, it may be either fudgy or cakey and may include chocolate chips, nuts, or other ingredients. A variation made with brown sugar and chocolate bits but without melted chocolate in the batter is called a blonde brownie or blondie. The brownie was developed in the United States at the end of the 19th century and popularized in the U.S. and Canada during the first half of the 20th century.\r\n\r\n'),
(15, 'Cake', '15.jpg', 'Cake is a form of sweet dessert that is typically baked. In its oldest forms, cakes were modifications of breads, but cakes now cover a wide range of preparations that can be simple or elaborate, and that share features with other desserts such as pastries, meringues, custards, and pies.'),
(16, 'Pie', '16.jpg', 'A pie is a baked dish which is usually made of a pastry dough casing that covers or completely contains a filling of various sweet or savoury ingredients.'),
(17, 'Fruit Desserts', '17.jpg', 'Dessert  is a course that concludes a main meal. The course usually consists of sweet foods and beverages, such as dessert wine or liqueurs, but may include coffee, cheeses, nuts, or other savory items. In some parts of the world, such as much of central and western Africa, and most parts of China, there is no tradition of a dessert course to conclude a meal.'),
(18, 'Drinks', '18.jpg', 'A drink or beverage is a liquid intended for human consumption. In addition to their basic function of satisfying thirst, drinks play important roles in human culture. Common types of drinks include plain water, milk, juices, coffee, tea, and soft drinks. In addition, alcoholic drinks such as wine, beer, and liquor, which contain the drug ethanol, have been part of human culture and development for 8,000 years.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1' COMMENT '1-user, 0-admin',
  `name` varchar(30) CHARACTER SET utf8 NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1-active, 0-deleted',
  `password` varchar(30) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role`, `name`, `email`, `status`, `password`) VALUES
(1, 1, 'nata', 'nata@gmail.com', 1, 'nata'),
(2, 1, 'olga', 'olga@gmail.com', 1, 'olga'),
(3, 0, 'admin', 'admin@gmail.com', 1, 'admin'),
(4, 1, 'ivan', 'ivan@gmail.com', 1, 'ivan'),
(5, 1, 'alex', 'alex@gmail.com', 1, 'alex'),
(6, 1, 'alla', 'alla@gmail.com', 1, 'alla'),
(7, 1, 'sveta', 'sveta@gmail.com', 1, 'sveta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`),
  ADD KEY `type` (`typeId`);

--
-- Indexes for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id_2` (`recipe_id`,`category_id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `recipe_comment`
--
ALTER TABLE `recipe_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_comment` (`recipe_id`),
  ADD KEY `user_comment` (`user_id`);

--
-- Indexes for table `recipe_ingridient`
--
ALTER TABLE `recipe_ingridient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipe_prepare`
--
ALTER TABLE `recipe_prepare`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id_2` (`recipe_id`,`step`),
  ADD KEY `recipe_id` (`recipe_id`);

--
-- Indexes for table `recipe_rating`
--
ALTER TABLE `recipe_rating`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recipe_id_2` (`recipe_id`,`user_id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `recipe_category`
--
ALTER TABLE `recipe_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `recipe_comment`
--
ALTER TABLE `recipe_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `recipe_ingridient`
--
ALTER TABLE `recipe_ingridient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;
--
-- AUTO_INCREMENT for table `recipe_prepare`
--
ALTER TABLE `recipe_prepare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `recipe_rating`
--
ALTER TABLE `recipe_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `recipe_type` FOREIGN KEY (`typeId`) REFERENCES `type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `recipe_user` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_category`
--
ALTER TABLE `recipe_category`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `category_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`);

--
-- Constraints for table `recipe_comment`
--
ALTER TABLE `recipe_comment`
  ADD CONSTRAINT `comment_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_ingridient`
--
ALTER TABLE `recipe_ingridient`
  ADD CONSTRAINT `ingridient_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_prepare`
--
ALTER TABLE `recipe_prepare`
  ADD CONSTRAINT `prepare_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `recipe_rating`
--
ALTER TABLE `recipe_rating`
  ADD CONSTRAINT `rating_recipe` FOREIGN KEY (`recipe_id`) REFERENCES `recipe` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `rating_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
