-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2018 at 08:22 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

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
(17, 'The D in David', 'The D in David Short Film by Michelle Yi and Yaron Farkash from Ringling college of art and design.\r\nWhen the Statue of David is humiliated by the other artworks for being naked, David leaves his podium to escape the museum.', 'https://www.youtube.com/watch?v=o2kPSAYS2wQ', '2018-01-11', 1, 'Michelle Yi, Yaron Farkash', 'Comedy'),
(19, 'The Date', 'Two guys meet on a first date. But it\'s not the type of date you might expect.', 'https://www.youtube.com/watch?v=AZedaEwqzak', '2018-03-20', 1, 'Dani Prados', 'Romance'),
(20, 'Different', 'A deaf girl comes across a boy who is paralyzed from the waist-down, but neither of them know about each other\'s differences.', 'https://www.youtube.com/watch?v=yu24PZIbkoY', '2018-03-20', 1, 'Tahneek Rahman', 'Romance'),
(21, 'The Call', 'This Shortfilm is about a call between father and daughter. During the call you can feel the deep and emotional relationship between them. Due to a shocking incidence the call gets a sudden turn, which unfortunately had to suffer a lot of families all over the world.', 'https://www.youtube.com/watch?v=QLbAMN1fc6o', '2018-03-20', 1, 'Ammar Sonderberg', 'Drama'),
(22, 'Strangers Creek', '', 'https://www.youtube.com/watch?v=5Ho2PXvqxBM', '2018-03-20', 1, 'Martin Neveu', 'Drama'),
(23, 'Kiss Me Softly', 'The son of a schlager singer wants to sing the song his own way.', 'https://www.youtube.com/watch?v=2ipAtH2TNVg', '2018-03-20', 1, 'Anthony Schatteman', 'Drama'),
(24, 'Marc & Jordi', 'On the night of the 18th August, 2013, Barcelona\'s skyline was illuminated by the passing of Roses\' Comet, a spectacle that will not be seen again for several hundred years. Six love stories that occurred over the course of the evening are played out in the movie as the comet draws ever closer towards Barcelona. Over the course of the night, each character experiences the challenges that come with opening their heart.\r\n\r\nIn this video we tell you just one of these stories â€“ that of Jordi and Marc, team-mates in a local soccer team. Jordi has been offered a lucrative contract with one of the biggest soccer clubs in the world. Should he accept it?', 'https://www.youtube.com/watch?v=NXLoC0FbNc0', '2018-03-20', 1, '', 'Romance'),
(25, 'Spellbound', '\"Spell Bound\" is an animated short film about a lonely girl, Rene, who is jealous of her perfect sister Sunny but must save her after writing negative thoughts in her diary that unexpectedly transform into monsters.', 'https://www.youtube.com/watch?v=W_B2UZ_ZoxU', '2018-03-20', 1, 'Ying Wu, Lizzia Xu', 'Drama'),
(26, 'Andy', 'After being horribly bullied throughout high school, a mistake at a party leads Andy into getting back at an old friend of his... by outing her relationship with a teacher...', 'https://www.youtube.com/watch?v=WtJN9PGN3Qk', '2018-03-20', 1, 'Michael J. Murphy', 'Drama'),
(27, 'Reasons Why I Love You', '', 'https://www.youtube.com/watch?v=82i7hc5sPiw', '2018-03-20', 1, '', 'Romance'),
(28, 'Love, Her', 'A writer stuck on his last story takes on a journey to meet a girl who he converses with through a series of letters.', 'https://www.youtube.com/watch?v=q99iTvwq3BM', '2018-03-20', 1, 'Joel Thottan, Manish Khushalani, Gaurav Dharmani and Debdeep Mukherjee.', 'Romance'),
(29, 'I Miss You', 'Love at first sight isn\'t always what it seems, but it\'s perfect while it lasts.', 'https://www.youtube.com/watch?v=4F5oD7G40ng', '2018-03-20', 1, 'Anton Sheptooha, Nick L\'Barrow', 'Romance'),
(30, 'Sea Side', 'Olivia skips school to go down to the seaside where she plays with her older brother Jordan.\nAs she spends more time with her brother she notices that he begins to distance himself from her.', 'https://www.youtube.com/watch?v=wZj_RpVsD8o', '2018-03-20', 1, 'Sebastian Cox', 'Adventure'),
(31, 'I\'m Truly Sorry', '', 'https://www.youtube.com/watch?v=qcvTsFqptS8', '2018-03-20', 1, '', 'Drama'),
(32, 'Listen To Me', 'This is the story about a deaf girl who has been bullied to the point where she is completely broken and decides to try to end her life. A student worker sees her and must now try to save her life.', 'https://www.youtube.com/watch?v=ctbI3RftTNk', '2018-03-20', 1, 'Touacha Her', 'Drama'),
(33, 'Picture Day', 'It\'s the morning before Kari\'s school pictures and her mom might not let her leave the house because of what she is wearing.', 'https://www.youtube.com/watch?v=7tronhPRNM0', '2018-03-20', 1, 'Conner Evert', 'Drama');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
