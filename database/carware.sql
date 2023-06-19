-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2023. Máj 17. 13:55
-- Kiszolgáló verziója: 10.5.19-MariaDB-0+deb11u2
-- PHP verzió: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `carware`
--
CREATE DATABASE IF NOT EXISTS `carware` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `carware`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `inventory_list`
--

CREATE TABLE `inventory_list` (
  `id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `quantity` int(30) NOT NULL DEFAULT 0,
  `stock_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `inventory_list`
--

INSERT INTO `inventory_list` (`id`, `product_id`, `quantity`, `stock_date`, `date_created`, `date_updated`) VALUES
(11, 16, 3, '2023-05-07', '2023-05-07 14:10:52', '2023-05-07 14:12:10'),
(13, 18, 4, '2023-05-12', '2023-05-07 15:25:32', '2023-05-12 17:00:51'),
(15, 21, 4, '2023-05-11', '2023-05-12 16:54:05', '2023-05-12 16:54:05'),
(16, 24, 4, '2023-05-04', '2023-05-12 16:54:20', '2023-05-12 16:54:20'),
(17, 26, 10, '2023-05-12', '2023-05-12 16:54:35', '2023-05-12 16:54:35'),
(18, 25, 10, '2023-05-05', '2023-05-12 17:01:17', '2023-05-12 17:01:17'),
(19, 22, 3, '2023-05-12', '2023-05-12 17:01:31', '2023-05-12 17:01:31'),
(20, 23, 6, '2023-05-11', '2023-05-12 17:02:18', '2023-05-12 17:02:18'),
(21, 29, 3, '2023-05-12', '2023-05-12 19:46:38', '2023-05-12 19:46:38');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mechanic_list`
--

CREATE TABLE `mechanic_list` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` text DEFAULT NULL,
  `lastname` varchar(250) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `mechanic_list`
--

INSERT INTO `mechanic_list` (`id`, `firstname`, `middlename`, `lastname`, `status`, `delete_flag`, `date_added`, `date_updated`) VALUES
(5, 'István', '', 'Kovacs', 1, 0, '2023-05-06 16:22:15', '2023-05-07 15:11:38'),
(6, 'István', '', 'Kiss', 1, 1, '2023-05-06 16:41:32', '2023-05-12 20:29:52'),
(8, 'Tamás', '', 'Tóth', 1, 0, '2023-05-07 14:15:31', '2023-05-12 20:24:23');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `product_list`
--

CREATE TABLE `product_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(30) DEFAULT NULL,
  `image_path` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `product_list`
--

INSERT INTO `product_list` (`id`, `name`, `description`, `price`, `image_path`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(16, 'Levegőszűrő - 1 457 433 071', 'BOSCH', 9000, 'uploads/products/16.png?v=1683902259', 1, 0, '2023-05-06 21:04:26', '2023-05-12 19:24:59'),
(18, 'Akkumulátor - EA722', 'Exide Premium EA722 akkumulátor, 12V 72Ah 720A J+ EU, alacsony', 30000, 'uploads/products/18.png?v=1683465870', 1, 0, '2023-05-07 15:24:30', '2023-05-12 19:27:14'),
(21, 'Hátsó féktárcsa - 0 986 479 414', 'BOSCH', 15000, 'uploads/products/21.png?v=1683902396', 1, 0, '2023-05-12 16:39:56', '2023-05-12 19:24:21'),
(22, 'Olajszűrő - 1 457 429 263', 'BOSCH', 3000, 'uploads/products/22.png?v=1683902624', 1, 0, '2023-05-12 16:43:44', '2023-05-12 19:25:13'),
(23, 'Pollenszűrő - 1987432438', 'BOSCH', 14000, 'uploads/products/23.png?v=1683902866', 1, 0, '2023-05-12 16:47:46', '2023-05-12 19:25:35'),
(24, 'Hosszbordás szíj - 1 987 948 393', 'BOSCH', 5500, 'uploads/products/24.png?v=1683902960', 1, 0, '2023-05-12 16:49:20', '2023-05-12 19:24:15'),
(25, 'MOTUL 8100 0W-40 - Motorolaj 5liter', 'MOTUL 8100, X-MAX 109693', 24000, 'uploads/products/25.png?v=1683903116', 1, 0, '2023-05-12 16:51:22', '2023-05-12 19:25:51'),
(26, 'MOTUL 8100 0W-40 - Motorolaj 1liter', 'MOTUL 8100, X-MAX 104531', 3600, 'uploads/products/26.png?v=1683903217', 1, 0, '2023-05-12 16:53:37', '2023-05-12 19:26:00'),
(27, 'Lambdaszonda (katalizátor után) - 0 258 986 602', 'BOSCH', 18240, 'uploads/products/27.png?v=1683911444', 1, 0, '2023-05-12 19:10:44', '2023-05-12 19:24:45'),
(28, 'Vízhűtő - 67107A', 'NISSENS', 0, 'uploads/products/28.png?v=1683912671', 1, 0, '2023-05-12 19:31:11', '2023-05-12 19:31:11'),
(29, 'Fékbetét (első) - 25617.185.1', 'Zimmermann', 17000, 'uploads/products/29.png?v=1683913409', 1, 0, '2023-05-12 19:43:29', '2023-05-12 19:43:29');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `price` int(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `service_list`
--

INSERT INTO `service_list` (`id`, `name`, `description`, `price`, `status`, `delete_flag`, `date_created`, `date_updated`) VALUES
(8, 'Olajcsere', '', 6000, 1, 0, '2023-04-20 16:36:00', '2023-05-12 17:09:25'),
(9, 'Karosszéria elem fényezés', '', 30000, 1, 0, '2023-04-20 16:44:23', '2023-04-20 16:44:23'),
(10, 'Féktárcsa csere', '', 30000, 1, 0, '2023-05-01 21:18:30', '2023-05-01 21:18:30'),
(16, 'Hibakód kiolvasása', '', 12000, 1, 0, '2023-05-07 15:15:39', '2023-05-07 15:15:39'),
(17, ' Levegőszűrő csere', '', 3500, 1, 0, '2023-05-07 15:16:04', '2023-05-12 19:36:40'),
(18, 'Üzemanyagszűrő csere', '', 8000, 1, 0, '2023-05-07 15:16:39', '2023-05-12 19:36:45'),
(20, 'Utastérszűrő csere', '', 5000, 1, 0, '2023-05-12 17:09:55', '2023-05-12 19:37:01'),
(21, 'Hosszbordás szíj csere', '', 10000, 1, 0, '2023-05-12 17:11:28', '2023-05-12 19:36:52'),
(22, 'Akkumulátor csere', '', 5000, 1, 0, '2023-05-12 19:36:08', '2023-05-12 19:36:08'),
(23, 'Fékbetét csere', '', 14000, 1, 0, '2023-05-12 19:46:05', '2023-05-12 19:46:05'),
(24, 'Fékfolyadék csere', '', 14000, 1, 0, '2023-05-12 20:00:41', '2023-05-12 20:00:41');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Carware'),
(6, 'short_name', 'CARWARE'),
(11, 'logo', 'uploads/logo.png?v=1682000835'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1682000835');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(86, 'Admin', 'Adminisztrátor', 'admin', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 1, '2023-05-07 15:09:51', '2023-05-17 13:16:15'),
(87, 'Elek', 'Teszt', 'tesztelek', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 3, '2023-05-07 15:11:18', '2023-05-15 16:34:11'),
(88, 'András', 'Kiss', 'kissandras', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 3, '2023-05-07 16:01:01', '2023-05-15 16:33:25'),
(89, 'Tesztelek', 'Személyzet', 'szemelyzet', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 2, '2023-05-07 16:12:12', '2023-05-15 16:33:58'),
(91, 'Gábor', 'Kovács', 'kovacsgabor', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 3, '2023-05-12 20:13:02', '2023-05-15 16:33:34'),
(94, 'Tamás', 'Tóth', 'tothtamas', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 2, '2023-05-12 20:29:43', '2023-05-15 16:34:22'),
(95, 'István', 'Kovács', 'kovacsistvan', '7fa0bf7e25d992976f8f419a84ee2d6b', NULL, NULL, 2, '2023-05-12 20:30:38', '2023-05-15 16:33:43');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `worksheet_list`
--

CREATE TABLE `worksheet_list` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `mechanic_id` int(30) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `client_name` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `vehicle_name` varchar(100) NOT NULL,
  `plate_number` varchar(100) NOT NULL,
  `amount` int(30) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '\r\n0=Pending,\r\n1=On-Progress,\r\n2=Done,\r\n3=Paid,\r\n4=Cancelled',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `worksheet_list`
--

INSERT INTO `worksheet_list` (`id`, `user_id`, `mechanic_id`, `code`, `client_name`, `contact`, `email`, `address`, `vehicle_name`, `plate_number`, `amount`, `status`, `date_created`, `date_updated`) VALUES
(22, 86, 6, '202305120001', 'Teszt Elek', '+36201122423', 'tesztelek@gmail.com', '1000 Tesztfalva Tesz utca 8.', 'Mercedes-Benz S-500 (W221)', 'ABC-123', 99800, 0, '2023-05-12 17:13:22', '2023-05-12 19:12:21'),
(23, 86, 8, '202305120002', 'Kovács Gábor', '+36201122425', 'kovacs.gabor@gmail.com', '1000 Tesztfalva Teszt köz 10.', 'Honda CR-V 3. gen', 'TKA-123', 12000, 1, '2023-05-12 19:23:14', '2023-05-12 19:23:22'),
(24, 86, 8, '202305120003', 'Kiss András', '+36301122422', 'kiss.andras@gmail.com', '1000 Tesztfalva Tesz út 12.', 'Audi 80', 'EDC-123', 35000, 2, '2023-05-12 19:38:09', '2023-05-12 20:30:08');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `worksheet_products`
--

CREATE TABLE `worksheet_products` (
  `worksheet_id` int(30) NOT NULL,
  `product_id` int(30) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `worksheet_products`
--

INSERT INTO `worksheet_products` (`worksheet_id`, `product_id`, `qty`, `price`) VALUES
(22, 25, 1, 24000),
(22, 26, 3, 3600),
(22, 16, 1, 9000),
(22, 23, 1, 14000),
(22, 24, 1, 5500),
(24, 18, 1, 30000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `worksheet_services`
--

CREATE TABLE `worksheet_services` (
  `worksheet_id` int(30) NOT NULL,
  `service_id` int(30) NOT NULL,
  `price` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `worksheet_services`
--

INSERT INTO `worksheet_services` (`worksheet_id`, `service_id`, `price`) VALUES
(22, 8, 6000),
(22, 17, 3500),
(22, 20, 5000),
(22, 21, 10000),
(22, 16, 12000),
(23, 16, 12000),
(24, 22, 5000);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `inventory_list`
--
ALTER TABLE `inventory_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- A tábla indexei `mechanic_list`
--
ALTER TABLE `mechanic_list`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`) USING HASH;

--
-- A tábla indexei `worksheet_list`
--
ALTER TABLE `worksheet_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `mechanic_id` (`mechanic_id`);

--
-- A tábla indexei `worksheet_products`
--
ALTER TABLE `worksheet_products`
  ADD KEY `transaction_id` (`worksheet_id`),
  ADD KEY `service_id` (`product_id`);

--
-- A tábla indexei `worksheet_services`
--
ALTER TABLE `worksheet_services`
  ADD KEY `transaction_id` (`worksheet_id`),
  ADD KEY `service_id` (`service_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `inventory_list`
--
ALTER TABLE `inventory_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT a táblához `mechanic_list`
--
ALTER TABLE `mechanic_list`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT a táblához `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT a táblához `worksheet_list`
--
ALTER TABLE `worksheet_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `inventory_list`
--
ALTER TABLE `inventory_list`
  ADD CONSTRAINT `product_id_fk_il` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Megkötések a táblához `worksheet_list`
--
ALTER TABLE `worksheet_list`
  ADD CONSTRAINT `mechanic_id_fk_tl` FOREIGN KEY (`mechanic_id`) REFERENCES `mechanic_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_id_fk_tl` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Megkötések a táblához `worksheet_products`
--
ALTER TABLE `worksheet_products`
  ADD CONSTRAINT `product_id_fk_tp` FOREIGN KEY (`product_id`) REFERENCES `product_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_id_fk_tp` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Megkötések a táblához `worksheet_services`
--
ALTER TABLE `worksheet_services`
  ADD CONSTRAINT `service_id_fk_ts` FOREIGN KEY (`service_id`) REFERENCES `service_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `transaction_id_fk_ts` FOREIGN KEY (`worksheet_id`) REFERENCES `worksheet_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
