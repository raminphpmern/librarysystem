-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2017 at 12:31 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `librarysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_books`
--

CREATE TABLE `tbl_books` (
  `book_id` int(11) NOT NULL,
  `added_by` int(16) NOT NULL,
  `isbn_number` int(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(155) NOT NULL,
  `description` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_books`
--

INSERT INTO `tbl_books` (`book_id`, `added_by`, `isbn_number`, `title`, `author`, `description`, `status`) VALUES
(1, 1, 687687, 'testing', 'test', 'gdhdh', 1),
(2, 1, 687687, 'testing', 'test', 'gdhdh', 1),
(3, 1, 687687, 'testing', 'test', 'gdhdh', 1),
(4, 1, 687687, 'Divine God', 'test', 'gssg', 1),
(5, 1, 687687, 'Divine God', 'test', 'gssg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booksshelf`
--

CREATE TABLE `tbl_booksshelf` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `added_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rating`
--

CREATE TABLE `tbl_rating` (
  `id` int(11) NOT NULL,
  `rate` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `ip_address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_rating`
--

INSERT INTO `tbl_rating` (`id`, `rate`, `user_id`, `book_id`, `ip_address`) VALUES
(1, 4, 0, 0, '837ec5754f503cfaaee0929fd48974e7');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `created`, `modified`) VALUES
(1, 'facebook', '1431466543539745', 'Ramkumar', 'Panjanathan', 'ramkumar87.bca@gmail.com', 'male', 'en_US', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/16427663_1410633288956404_5827766813650220493_n.jpg?oh=571cfd65c111f968e1a19e1e77061e24&oe=596A5E7C', 'https://www.facebook.com/app_scoped_user_id/1431466543539745/', '2017-02-26 06:06:26', '2017-03-06 03:03:53'),
(2, 'facebook', '398399923866230', 'Kumar', 'Ram', 'romeoram87@gmail.com', 'male', 'en_GB', 'https://scontent.xx.fbcdn.net/v/t1.0-1/p50x50/13528694_263417124031178_6096973742884478852_n.jpg?oh=0dadbf73f72253e3f6e2a01b61d48f09&oe=592E9D59', 'https://www.facebook.com/app_scoped_user_id/398399923866230/', '2017-02-27 06:42:01', '2017-02-27 07:07:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_books`
--
ALTER TABLE `tbl_books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_books`
--
ALTER TABLE `tbl_books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_rating`
--
ALTER TABLE `tbl_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
