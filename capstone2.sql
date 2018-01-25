-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2018 at 07:11 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `profile_picture` longblob NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `lastname`, `profile_picture`, `role`) VALUES
(1, 'darryl', 'password', 'darryl.amposta@gmail.com', 'Darryl', 'Amposta', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `synopsis` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `date_uploaded` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `filmmaker` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `synopsis`, `url`, `date_uploaded`, `user_id`, `filmmaker`, `category`) VALUES
(3, 'In A Heartbeat', '\"In a Heartbeat\" - Animated Short Film by Beth David and Esteban Bravo\n\nA closeted boy runs the risk of being outed by his own heart after it pops out of his chest to chase down the boy of his dreams.', 'https://www.youtube.com/watch?v=2REkk9SCRn0', '2017-11-13', 1, 'Beth David, Esteban Bravo', 'Romance'),
(6, 'Camila', 'CGI Animated CAMILA Short Film by LÃ©o Rezende, Nico Taro, Paloma Casado, Tabata Milene and Tiago Toshio. Featured on http://www.cgmeetup.net/home/camila-s...\n\nProduced at Faculdade Melies.', 'https://www.youtube.com/watch?v=KLZzdwZRvN4', '2017-11-13', 1, 'Leo Rezende, Nico Taro, Paloma Casado, Tabata Milene', 'Horror'),
(7, 'Alike', 'In a busy life,Copi is a father who tries to teach the right way to his son,Paste. But... what is the correct path?', 'https://vimeo.com/194276412', '2017-11-13', 1, 'Daniel MartÃ­nez Lara & Rafa Cano MÃ©ndez', 'Comedy'),
(8, 'The Artist and The Kid', 'A frustrated artist looking for inspiration in the mountainous valley of India is unknowingly led into a journey by a mysterious kid', 'https://www.youtube.com/watch?v=McUIRVe9Zqo', '2017-11-13', 1, 'Sasank Dhulipudi', 'Adventure'),
(9, 'Little Darling', 'Set inside an automaton clock, Little Darling tells an enduring love story between two characters who are confined within the clockâ€™s mechanism. When the boy stumbles upon a method to free himself, he must go on a dangerous adventure to save the one he lovesâ€¦', 'https://www.youtube.com/watch?v=kvgn9RKXip8', '2017-11-13', 1, 'Damian Smith', 'Romance'),
(10, 'The Wishgranter', 'Set in a world where wishes are granted by mythical beings that live under fountains, an apathetic wish granter is forced to go above ground to grant a wish of love.', 'https://www.youtube.com/watch?v=zON0wDD7VJY', '2017-11-15', 1, 'Echo Wu, Kal Athannassov, John Mcdonald', 'Romance'),
(13, 'Ah Boy', 'A story about mother and son who lives in a poor village . The poor kid need to work every morning to get paid to support his mother who is sick.', 'https://www.youtube.com/watch?v=As76MHuh1sU', '2018-01-11', 1, 'Kevin Lim, Zhong Fei, Jane Lim, Ginny Kek', 'Drama'),
(15, 'Teens Like Phil', 'Inspired by the alarming increase in real-life tragedies involving high school bullying and suicide, TEENS LIKE PHIL tells the story of a gay teen, Phil, and his former friend, Adam, who brutally bullies him. The film explores the complicated and painful circumstances surrounding this relationship in an effort to better understand the roots of bullying.', 'https://www.youtube.com/watch?v=mBI4-Jd0IM4', '2018-01-11', 1, 'Dominic Haxton', 'Drama'),
(17, 'The D in David', 'The D in David Short Film by Michelle Yi and Yaron Farkash from Ringling college of art and design.\r\nWhen the Statue of David is humiliated by the other artworks for being naked, David leaves his podium to escape the museum.', 'https://www.youtube.com/watch?v=o2kPSAYS2wQ', '2018-01-11', 1, 'Michelle Yi, Yaron Farkash', 'Comedy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
