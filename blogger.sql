-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2021 at 06:24 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogger`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postid` int(20) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `description` varchar(2000) CHARACTER SET latin1 NOT NULL,
  `image` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `postedon` datetime NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`postid`, `title`, `description`, `image`, `postedon`, `email`) VALUES
(1, 'Student ', 'THE STUDENT is a valuable assest to the societu..', 'images/.', '2021-04-01 12:26:22', 'pauljames@gmail.com'),
(2, 'Student OF THE SEM', 'ROADMAP TO THE STUDENT OF THE SEM :\r\n\r\n', 'images/.', '2021-04-01 12:33:18', 'pauljames@gmail.com'),
(4, 'NOTHING', 'I am Nothing, He is Nothing, She is Nothing, You are Nothing, We are Nothing.', 'images/.', '2021-04-01 12:51:53', 'tancy@gmail.com'),
(12, 'NEw Post ', 'NEw Post Description', 'images/.7_angel_number-758x426.jpg', '2021-04-08 02:06:22', 'michael@gmail.com'),
(13, 'MY FIRST BLOG', 'This is the My First Blog: The Blog is the best way to write your emotions and thoughts to the world filled with anxiety and depression. The Depression cannot come to one who knows how to enjoy yourself when there is no one around him. The Way things are they has to be as there is no other way of fulfilling your destiny, You can try different methods to complete it but at last you will say \"NO PROBLEM\" , \"LET IT BE\" , \"LET IT GO\". This is because life makes you realize that there is nothing important than moving forward. A person fulfills his destiny when he comes to know that he has gone from the past and is here right now where he cannot go back to change things now. So he come to a conclusion that he must do it right this time any way possible. The Future is always anticipating. \"OUR PRESENT ACTIONS AFFECT OUR FUTURE\". That is why the person moves on from past and concentrate on his present and learn to not do the same mistakes again and again. Then through this one day he concludes that there is nothing more important than his PRESENT. \"AS IN PAST HE CANNOT GO AND FUTURE HE HAS NOT SEEN\". With this i will like to end this blog and wanted to thanks all the readers out there. The one thing i must say if you are in your present doing something you must take rest as well to make it more enhanced and better. \"AS GOOD TODAY IS BETTER TOMORROW. \"THANKYOU!', 'images/.7_angel_number-758x426.jpg', '2021-04-06 11:32:53', 'pauljames@gmail.com'),
(14, 'We are not born now', 'We are all blessed from the ancestors itself.Whatever we do is by the investment of our forefathers who have stored some treasures for us. All time we do work only for getting the reward that we want by making some efforts on our already holded treasure.The money was, is and will be always there for us to invest in our life. The life goes on with what we have and the some extra we have earned. The food is afforded by everyone, everywhere what he/she wants to have.The person never dies of hunger,even he gets what he wants if the existence of the thing is there.The Earth and the Nature gives us everything we need in the form of air,water,light,land,time and much more.', 'images/.', '2021-04-09 02:09:47', 'michael@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `userid` int(20) NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `password` varchar(30) CHARACTER SET latin1 NOT NULL,
  `phone` varchar(20) CHARACTER SET latin1 NOT NULL,
  `img` varchar(250) CHARACTER SET latin1 DEFAULT NULL,
  `regon` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`userid`, `username`, `email`, `password`, `phone`, `img`, `regon`) VALUES
(1, 'Jack Jones', 'jackjones@gmail.com', 'Int220@', '1234567890', 'images/.', '2021-03-18 07:16:25'),
(2, 'Paul James', 'pauljames@gmail.com', 'Int220@', '2345678910', 'images/.', '2021-04-08 01:33:41'),
(3, 'Tancy ', 'tancy@gmail.com', 'Int220@', '3456789101', 'images/.', '2021-04-08 01:35:02'),
(4, 'Nick', 'nikhil@gmail.com', 'Int220@', '4567890123', 'images/.', '2021-04-08 01:36:37'),
(5, 'Michael', 'michael@gmail.com', 'Int220@', '5678901234', 'images/.', '2021-04-08 05:34:49'),
(6, 'Micky Mouse', 'mickymouse@gmail.com', 'Int220@', '6789012345', 'images/.', '2021-04-14 07:25:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postid`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`username`,`email`,`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
