-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 10 Mar 2024, 02:59
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `cookingblog`
--
CREATE DATABASE IF NOT EXISTS `cookingblog` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cookingblog`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `type` int(1) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `type`, `photo`) VALUES
(1, 'Breads', 'A staple food worldwide, offering endless varieties from crusty baguettes to fluffy brioche.', 0, 'breads.jpg'),
(2, 'Desserts', ' Indulgent creations ranging from rich chocolate cakes to delicate fruit tarts, satisfying every sweet craving.', 0, 'desserts.jpg'),
(3, 'Fish', ' A versatile protein source, prepared in diverse ways from crispy fried to delicate poached, reflecting coastal cuisines globally. ', 0, 'fish.jpg'),
(4, 'Meat', 'A cornerstone of hearty meals, showcasing succulent steaks, tender roasts, and flavorful stews across cultures.', 0, 'meat.jpg'),
(5, 'Salads', 'Vibrant and refreshing, salads combine fresh greens, vegetables, fruits, and dressings for a nutritious and colorful dish.', 0, 'salads.jpg'),
(6, 'Snacks', 'Quick bites packed with flavor, encompassing everything from crispy chips to savory samosas, perfect for satisfying hunger on the go.', 0, 'snacks.jpg'),
(7, 'Soups', 'Nourishing and comforting, soups span from hearty stews to clear broths, offering warmth and flavor in every spoonful.', 0, 'soups.jpg'),
(8, 'Vege', 'Celebrating the bounty of nature, vegetable dishes range from crisp stir-fries to roasted medleys, providing both nutrition and taste.', 0, 'vege.jpg'),
(9, 'American', 'Reflecting diverse influences, American cuisine encompasses everything from juicy burgers and crispy fried chicken to creamy macaroni and cheese.', 1, 'american.jpg'),
(10, 'Indian', 'Bursting with aromatic spices and bold flavors, Indian cuisine offers a tantalizing array of dishes, from fiery curries to fragrant biryanis.', 1, 'indian.jpg'),
(11, 'Italian', 'Simple yet sophisticated, Italian cuisine delights with its fresh pasta dishes, wood-fired pizzas, and creamy risottos, emphasizing quality ingredients and rustic flavors.\r\n', 1, 'italian.jpg'),
(12, 'Japanese', 'Elegant and refined, Japanese cuisine features delicate sushi, hearty ramen, and exquisite sashimi, showcasing a harmonious balance of flavors and textures.', 1, 'japanese.jpg'),
(13, 'Polish', 'Rich in tradition and flavor, Polish cuisine embraces hearty pierogi, savory kielbasa, and comforting stews, reflecting a history of culinary craftsmanship.', 1, 'polish.jpg'),
(14, 'Spanish', 'Bold and vibrant, Spanish cuisine delights with its array of tapas, paellas, and succulent grilled meats, embodying a zest for life and culinary passion.', 1, 'spanish.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `colormode`
--

CREATE TABLE `colormode` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `color_mode` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `colormode`
--

INSERT INTO `colormode` (`id`, `user_id`, `color_mode`) VALUES
(1, 1, 1),
(2, 2, 0),
(4, 4, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `comments`
--

CREATE TABLE `comments` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `comm_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comm_text`) VALUES
(1, 2, 1, 'Best cake which i ever tried! '),
(2, 1, 1, 'Very easy to make and delicious salad!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `likes`
--

CREATE TABLE `likes` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(7, 3, 4),
(17, 1, 4);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `recipe_text` text NOT NULL,
  `ingridients` text NOT NULL,
  `post_image` varchar(255) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `time_needed` float NOT NULL,
  `portion_amount` int(2) NOT NULL,
  `difficult` int(1) NOT NULL,
  `likes` int(255) NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `title`, `recipe_text`, `ingridients`, `post_image`, `date_time`, `time_needed`, `portion_amount`, `difficult`, `likes`, `category_id`, `user_id`) VALUES
(1, 'Mixed Green Salad', 'Wash and tear the lettuce into bite-sized pieces. Place them in a large salad bowl.&#13;&#10;Add sliced cucumber, diced tomatoes, thinly sliced red onion, chopped bell pepper, and olives to the bowl.&#13;&#10;Sprinkle crumbled feta cheese over the top of the salad.&#13;&#10;Season with salt and pepper to taste.&#13;&#10;Drizzle olive oil and vinegar over the salad for dressing.&#13;&#10;Toss the salad gently until all ingredients are well combined.&#13;&#10;Serve immediately as a side dish or as a light meal on its own.', 'lettuce,1  onion chopped,2 cloves garlic,cherry tomatoes,cucumber,Salt and pepper to taste', '1709338242salad2.jpg', '2024-03-01 01:09:03', 0.5, 4, 2, 1, 5, 1),
(2, 'Chocolate Lava Cake', 'Preheat the oven to 200°C (about 400°F).&#13;&#10;Prepare muffin tins or small cake molds by greasing them with butter and dusting with flour to prevent sticking.&#13;&#10;In a small saucepan over low heat, melt the butter together with the dark chocolate. Stir until smooth and well combined. Set aside to cool slightly.&#13;&#10;In a separate bowl, whisk together the eggs, egg yolks, sugar, and vanilla extract. Add a pinch of salt.&#13;&#10;Combine the egg mixture with the melted chocolate mixture, stirring gently.&#13;&#10;Add the flour and gently fold until well combined.&#13;&#10;Pour the batter into the prepared molds, filling them about 3/4 full.&#13;&#10;Place the molds in the preheated oven and bake for about 10-12 minutes. The edges of the cakes should be set but the centers should remain molten.&#13;&#10;Carefully remove the cakes from the oven and let them cool slightly.&#13;&#10;Before serving, dust the cakes with powdered sugar and garnish with fruits or serve with ice cream if desired.', '115g dark chocolate,115g butter,2 eggs,1/4 cup sugar,1 teaspoon vanilla extract,2 tablespoons all-purpose flour', '1709258243cake.jpg', '2024-03-01 01:57:23', 1.5, 6, 3, 0, 2, 2),
(3, 'Tomato Soup', 'Heat the olive oil in a large pot over medium heat. Add the chopped onion and cook until softened, about 5 minutes.&#13;&#10;Add the minced garlic to the pot and cook for another minute until fragrant.&#13;&#10;Pour in the canned whole tomatoes with their juices. Use a spoon to break up the tomatoes into smaller pieces.&#13;&#10;Add the vegetable broth, sugar, salt, pepper, dried basil, and dried oregano to the pot. Stir to combine.&#13;&#10;Bring the soup to a simmer and let it cook for about 15-20 minutes, stirring occasionally.&#13;&#10;Once the soup has simmered and the flavors have melded together, remove it from the heat.&#13;&#10;If you prefer a smoother consistency, use an immersion blender to puree the soup directly in the pot. Alternatively, you can transfer the soup in batches to a blender and blend until smooth. Be cautious when blending hot liquids.&#13;&#10;Taste the soup and adjust the seasoning if necessary.&#13;&#10;If desired, swirl in some heavy cream to add richness to the soup.&#13;&#10;Ladle the tomato soup into bowls and garnish with fresh basil leaves.&#13;&#10;Serve hot with crusty bread or grilled cheese sandwiches for a comforting meal.', '2 tablespoons olive oil,1  onion chopped,2 cloves garlic,800g (28 oz) canned whole tomatoes,500ml (2 cups) vegetable broth,Salt and pepper to taste,1/2 teaspoon dried basil', '1709259629soup.jpg', '2024-03-01 02:20:29', 2.5, 6, 4, 1, 7, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `token` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `is_admin`, `token`) VALUES
(1, 'administrator@admin.com', 'admin', '$2y$10$iz7hqcd.2HtrkTilVdasmeMkDep88K0rlcRgoJmJPZdhvXYjN/Bd6', 1, 0),
(2, 'firstUser@gmail.com', 'user_01', '$2y$10$MY2f.svsskd6qW5qaqqqxeVmaQIIAxdeHRFbGO85NthyVZUORf6ka', 0, 0),
(4, 'anastazyjka.wierzba@gmail.com', ' anastazja14', '$2y$10$coL8kZtEJuAxzwqX3x7VDeEjSJ3ujwLR3ryWewexJZa9uIFmY0U1O', 0, 0);

--
-- Wyzwalacze `users`
--
DELIMITER $$
CREATE TRIGGER `after_delete_user` AFTER DELETE ON `users` FOR EACH ROW BEGIN
    DELETE FROM colormode WHERE user_id = OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_insert_user` AFTER INSERT ON `users` FOR EACH ROW BEGIN
    INSERT INTO colormode (user_id, color_mode) VALUES (NEW.id, 0);
END
$$
DELIMITER ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `colormode`
--
ALTER TABLE `colormode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blogMode` (`user_id`);

--
-- Indeksy dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blog_comment` (`post_id`),
  ADD KEY `FK_blog_user` (`user_id`);

--
-- Indeksy dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blogPostLike` (`post_id`),
  ADD KEY `FK_blogUserLike` (`user_id`);

--
-- Indeksy dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_blogCategory` (`category_id`),
  ADD KEY `FK_blogAutor` (`user_id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT dla tabeli `colormode`
--
ALTER TABLE `colormode`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `colormode`
--
ALTER TABLE `colormode`
  ADD CONSTRAINT `FK_blogMode` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `FK_blog_comment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_blog_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `FK_blogPostLike` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_blogUserLike` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ograniczenia dla tabeli `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `FK_blogAutor` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_blogCategory` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
