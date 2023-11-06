-- phpMyAdmin SQL Dump
-- version 5.2.1deb1ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 06, 2023 at 11:09 AM
-- Server version: 8.0.35-0ubuntu0.23.10.1
-- PHP Version: 8.2.10-2ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nota`
--

-- --------------------------------------------------------

--
-- Table structure for table `wiki_sections`
--

CREATE TABLE `wiki_sections` (
  `id` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(230) NOT NULL,
  `url` varchar(240) NOT NULL,
  `picture` varchar(240)  DEFAULT NULL,
  `abstract` varchar(256) NOT NULL
) ENGINE=InnoDB;

--
-- Dumping data for table `wiki_sections`
--

INSERT INTO `wiki_sections` (`id`, `date_created`, `title`, `url`, `picture`, `abstract`) VALUES
(1, '2023-11-06 15:18:16', '\nCommons', '//commons.wikimedia.org/', NULL, '\nFreely usable photos &amp; more'),
(2, '2023-11-06 15:18:16', '\nWikivoyage', '//www.wikivoyage.org/', NULL, '\nFree travel guide'),
(3, '2023-11-06 15:18:16', '\nWiktionary', '//www.wiktionary.org/', NULL, '\nFree dictionary'),
(4, '2023-11-06 15:18:16', '\nWikibooks', '//www.wikibooks.org/', NULL, '\nFree textbooks'),
(5, '2023-11-06 15:18:16', '\nWikinews', '//www.wikinews.org/', NULL, '\nFree news source'),
(6, '2023-11-06 15:18:16', '\nWikidata', '//www.wikidata.org/', NULL, '\nFree knowledge base'),
(7, '2023-11-06 15:18:16', '\nWikiversity', '//www.wikiversity.org/', NULL, '\nFree course materials'),
(8, '2023-11-06 15:18:16', '\nWikiquote', '//www.wikiquote.org/', NULL, '\nFree quote compendium'),
(9, '2023-11-06 15:18:16', '\nMediaWiki', '//www.mediawiki.org/', NULL, '\nFree &amp; open wiki application'),
(10, '2023-11-06 15:18:16', '\nWikisource', '//www.wikisource.org/', NULL, '\nFree library'),
(11, '2023-11-06 15:18:16', '\nWikispecies', '//species.wikimedia.org/', NULL, '\nFree species directory'),
(12, '2023-11-06 15:18:16', '\nWikifunctions', '//www.wikifunctions.org/', NULL, '\nFree function library'),
(13, '2023-11-06 15:18:16', '\nMeta-Wiki', '//meta.wikimedia.org/', NULL, '\nCommunity coordination &amp; documentation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wiki_sections`
--
ALTER TABLE `wiki_sections`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `url` (`url`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wiki_sections`
--
ALTER TABLE `wiki_sections`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
