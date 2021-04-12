-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 10:33 AM
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
(1, 'Student ', 'THE STUDENT is a valuable assest to the societu..', 'images/.my_pic.jpg', '2021-04-01 12:26:22', 'bishab@gmail.com'),
(2, 'Student OF THE YEAR', 'ROADMAP TO THE STUDENT OF THE YEAR :\r\n\r\n', 'images/.1.jpg', '2021-04-01 12:33:18', 'bishab@gmail.com'),
(3, 'Ni Ni C23a Tang', 'NI NI CHA is the original name of Spider Woman.', 'images/.7_angel_number-758x426.jpg', '2021-04-04 07:41:46', 'gurjeets1024@gmail.com'),
(4, 'NOTHING', 'I am Nothing, He is Nothing, She is Nothing, You are Nothing, We are Nothing.', 'images/.0.png', '2021-04-01 12:51:53', 'biggu1234@gmail.com'),
(7, 'MYSELF', 'I AM GURJEET SINGH. I AM WEB DEVELOPER( FRONT END+ BACK END). I AM AN ENGINEER.I AM PURSING B.TECH CSE FROM LPU,PUNJAB.', 'images/.IMG_20210222_114323.jpg', '2021-04-01 01:52:47', 'nikhil@gmail.com'),
(10, 'My New Blog 23', 'The Blog is this this this and that.', 'images/.7_angel_number-758x426.jpg', '2021-04-05 04:59:07', 'gurjeets1024@gmail.com'),
(11, 'The Final Blog', 'DREAMS: \r\n\r\n1.)Dreams comes  true people says this to you.\r\n\r\nBUT Is It true?\r\n\r\n2.Yes,Maybe it is true because Dreams have the human mind or brain data which thinks only the situations which he or she has saw throughout his or her life.\r\n\r\n3.No Illusion or an Imagination which is based on irrelevant thought becomes true,it is just illusion always.\r\n\r\n4.Dreams have two types:\r\nA:The Type of Dream in which we think about ourselves and do basically everything for us.\r\n\r\nB:The Type of Dream which we think about others and help them to get their Dreams come true.\r\n\r\n5.The Type of Person  you are will be base of what you dream.It is written by birth that how a human will be in his life,so dreams get formed based upon this.\r\n\r\n6.Do mind and brain plays any role in Dreams Fullfilling? Yes! A big role is of our thought process and its architecture made by our mind.Thoughts are atomic components of our Big Dreams.\r\n\r\n7.When you feel it is enough now? You feel it happened when there is no new imagination or any new thought in your brain which requires your attention for further success of your dreams.\r\n\r\n8.Overwhemling Dreams: These dreams are little bit difficult to achieve as theu require a lot of hardwork and sacrifices of oneself.\r\n\r\n9.Irrelevant Dreams: These are the dreams which happens to not occur in our mind basically.But, if it occurs accidently they will be for example,Getting killed by someone,Becoming God,Murdering Someone and harming someone.\r\n\r\n10.Revelant Dreams: They dont require much more thoughts as they are already correct to have,and are easy to achieve.\r\n\r\n11.WHY WE SHOULD DREAM :) \r\n\r\nThis is my favourite question,as the life passes by the faith of every person changes accordingly. If a person does not like his or her journey or the thing he wished to God to be in very present time. He or she starts dreaming for good and helps them for having a BIG HOPE in their life and solve problems to smaller parts.Dream do/does depends upon a person presecptive of ', 'images/.1.jpg', '2021-04-08 01:40:24', 'gurjeets1024@gmail.com'),
(12, 'NEw Post 2', 'NEw Post 2 Description', 'images/.', '2021-04-04 07:38:58', 'nikhil@gmail.com'),
(13, 'MY FIRST BLOG', 'This is the My First Blog: The Blog is the best way to write your emotions and thoughts to the world filled with anxiety and depression. The Depression cannot come to one who knows how to enjoy yourself when there is no one around him. The Way things are they has to be as there is no other way of fulfilling your destiny, You can try different methods to complete it but at last you will say \"NO PROBLEM\" , \"LET IT BE\" , \"LET IT GO\". This is because life makes you realize that there is nothing important than moving forward. A person fulfills his destiny when he comes to know that he has gone from the past and is here right now where he cannot go back to change things now. So he come to a conclusion that he must do it right this time any way possible. The Future is always anticipating. \"OUR PRESENT ACTIONS AFFECT OUR FUTURE\". That is why the person moves on from past and concentrate on his present and learn to not do the same mistakes again and again. Then through this one day he concludes that there is nothing more important than his PRESENT. \"AS IN PAST HE CANNOT GO AND FUTURE HE HAS NOT SEEN\". With this i will like to end this blog and wanted to thanks all the readers out there. The one thing i must say if you are in your present doing something you must take rest as well to make it more enhanced and better. \"AS GOOD TODAY IS BETTER TOMORROW. \"THANKYOU!', 'images/.7_angel_number-758x426.jpg', '2021-04-06 11:32:53', 'gurjeets40@gmail.com');

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
(1, 'Gurjeet S', 'gurjeets40@gmail.com', 'Angrybirds4@', '8423335350', 'images/.IMG_20210222_114258.jpg', '2021-03-18 07:16:25'),
(2, 'Bishab Pokhrael', 'bishab@gmail.com', 'Angrybirds4@', '7842733545', 'images/.', '2021-04-08 01:33:41'),
(3, 'Bigyan timilsina', 'biggu1234@gmail.com', 'Angrybirds4@', '7628498994', 'images/.', '2021-04-08 01:35:02'),
(4, 'Nikhil Tanwar', 'nikhil@gmail.com', 'Angrybirds4@', '9835052744', 'images/.', '2021-04-08 01:36:37'),
(5, 'Gurjeet Singh Sehdev', 'gurjeets1024@gmail.com', 'Angrybirds4@', '8427335450', 'images/.IMG_20210222_114346.jpg', '2021-04-08 02:00:30');

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
  MODIFY `postid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `userid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
