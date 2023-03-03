-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pon 27. úno 2023, 11:14
-- Verze serveru: 10.1.31-MariaDB
-- Verze PHP: 7.2.3
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET
  AUTOCOMMIT = 0;

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Databáze: `journal`
--
-- --------------------------------------------------------
--
-- Struktura tabulky `record`
--
CREATE TABLE `record` (
  `id` int(10) NOT NULL,
  `date` date NOT NULL,
  `language` text COLLATE utf8_czech_ci NOT NULL,
  `time_spent` smallint(6) NOT NULL,
  `rating` tinyint(2) NOT NULL,
  `description` text COLLATE utf8_czech_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Vypisuji data pro tabulku `record`
--
INSERT INTO
  `record` (
    `id`,
    `date`,
    `language`,
    `time_spent`,
    `rating`,
    `description`,
    `user_id`
  )
VALUES
  (
    2,
    '2023-02-03',
    'python',
    60,
    4,
    'asd',
    1
  );

-- --------------------------------------------------------
--
-- Struktura tabulky `users`
--
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` text COLLATE  utf8_czech_ci NOT NULL,
  `name` text COLLATE utf8_czech_ci NOT NULL,
  `surname` text COLLATE utf8_czech_ci NOT NULL,
  `email` text COLLATE utf8_czech_ci NOT NULL,
  `password` text COLLATE utf8_czech_ci NOT NULL,
  `IsAdmin` int(11) NOT NULL DEFAULT '0'
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_czech_ci;

--
-- Vypisuji data pro tabulku `users`
--
INSERT INTO
  `users` (
    `id`,
    `username`,
    `name`,
    `surname`,
    `email`,
    `password`,
    `IsAdmin`
  )
VALUES
  (
    1,
    'admin',
    'Štěpán',
    'Hruban',
    'stepanhruban@seznam.cz',
    '98a894c940d3c1532b2d7268372a1dad',
    1
  ),
  (
    2,
    'user',
    'asd',
    'asda',
    'admin@gmail.com',
    '98a894c940d3c1532b2d7268372a1dad',
    0
  );

--
-- Klíče pro exportované tabulky
--
--
-- Klíče pro tabulku `record`
--
ALTER TABLE
  `record`
ADD
  PRIMARY KEY (`id`),
ADD
  INDEX `user_id` (`user_id`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE
  `users`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pro tabulky
--
--
-- AUTO_INCREMENT pro tabulku `record`
--
ALTER TABLE
  `record`
MODIFY
  `id` int(10) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 6;

--
-- AUTO_INCREMENT pro tabulku `users`
--
ALTER TABLE
  `users`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;

--
-- Omezení pro exportované tabulky
--
--
-- Omezení pro tabulku `record`
--
ALTER TABLE
  `record`
ADD
  CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;