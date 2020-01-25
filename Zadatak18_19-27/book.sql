-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 25, 2020 at 08:24 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `book_price` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `book_author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `book_publisher` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `book_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `book_datetime` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_title`, `book_price`, `book_author`, `book_publisher`, `book_status`, `book_datetime`) VALUES
(1, 'Knjiga Naslov 1', '20,5', 'Knjiga Autor 1', 'Knjiga Izdavač 1', 'U pripremi', '12.12.2020'),
(2, 'Knjiga Naslov 2', '10,5', 'Knjiga Autor 2', 'Knjiga Izdavač 2', 'Na stanju', '01.01.2020'),
(3, 'Knjiga Naslov 3', '12', 'Knjiga Autor 3', 'Knjiga Izdavač 3', 'Na stanju', '25.03.2019'),
(4, 'Knjiga Naslov 4', '15,9', 'Knjiga Autor 4', 'Knjiga Izdavač 4', 'U pripremi', '25.03.2020'),
(5, 'Knjiga Naslov 5', '22', 'Knjiga Autor 5', 'Knjiga Izdavač 5', 'Na stanju', '25.03.2019');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
