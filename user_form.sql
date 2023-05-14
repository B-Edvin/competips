-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Máj 14. 13:47
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `reg_db`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `user_form`
--

CREATE TABLE `user_form` (
  `user_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user',
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `images` varchar(255) NOT NULL,
  `video_name` varchar(255) NOT NULL,
  `game` varchar(140) NOT NULL,
  `rank` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `user_form`
--

INSERT INTO `user_form` (`user_id`, `name`, `user_type`, `email`, `password`, `images`, `video_name`, `game`, `rank`) VALUES
(40, 'Felhasználó', 'user', 'felhasznalo@gmail.com', '123456', 'wallhaven-qdood5.png', '', '', ''),
(41, 'Oktató', 'admin', 'oktato@gmail.com', '0000', 'trynd.jpg', 'lolvideo.mp4', 'League of Legends', 'Challenger'),
(42, 'Benedek', 'admin', 'beni@gmail.com', 'valami', '', '', 'CS:GO', 'Legendary Eagle'),
(43, 'John', 'admin', 'johndoe@gmail.com', '8888', '', '', 'BrawlHalla', 'Diamond'),
(44, 'Phoenix', 'admin', 'val@gmail.com', '5555', 'th.jpg', '', 'Valorant', 'Radiant');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`user_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `user_form`
--
ALTER TABLE `user_form`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
