-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 09:57 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zxdata`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(20) NOT NULL,
  `ideaClosureDate` date DEFAULT NULL,
  `departmentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryID`, `categoryName`, `ideaClosureDate`, `departmentID`) VALUES
(1, 'Solution', '2022-04-02', 1),
(2, 'Problem', '2022-04-17', 1),
(3, 'Feedback', '2022-04-21', 1),
(4, 'Solution', '2022-04-25', 2),
(5, 'Problem', '2022-04-27', 2),
(6, 'Feedback', '2022-04-29', 2),
(7, 'Solution', '2022-04-27', 3),
(8, 'Problem', '2022-04-29', 3),
(9, 'Feedback', '2022-04-30', 3),
(10, 'Solution', '2022-04-30', 4),
(11, 'Problem', '2022-04-30', 4),
(12, 'Feedback', '2022-05-18', 4),
(13, 'Solution', '2022-05-19', 5),
(14, 'Problem', '2022-05-20', 5),
(15, 'Feedback', '2022-05-30', 5),
(16, 'Solution', '2022-06-01', 6);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentID` int(11) NOT NULL,
  `commentText` text NOT NULL,
  `commentDate` date NOT NULL,
  `commentTime` time NOT NULL,
  `commentAnonymous` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentID`, `commentText`, `commentDate`, `commentTime`, `commentAnonymous`) VALUES
(1, 'I agreed to held this activity', '2022-03-30', '01:02:15', ''),
(2, 'me too! Sound like interesting!', '2022-03-30', '01:05:25', 'Anonymous'),
(3, 'I am so excited to this event', '2022-03-30', '01:06:40', ''),
(4, 'hurray!!', '2022-03-30', '01:07:48', ''),
(5, 'hurray!!', '2022-03-30', '01:09:31', ''),
(6, 'mehh', '2022-03-30', '01:09:41', ''),
(7, 'yhhhhhhhhhhhhhhh', '2022-03-31', '11:40:27', 'Anonymous'),
(8, 'Sound Great!', '2022-03-31', '11:49:27', ''),
(9, 'My kids will loved it', '2022-03-31', '11:59:26', ''),
(10, 'I know right', '2022-03-31', '12:01:24', 'Anonymous'),
(11, 's', '2022-04-05', '12:01:42', ''),
(12, 'testing', '2022-04-05', '12:12:23', ''),
(13, 'Testing', '2022-04-05', '12:12:53', 'Anonymous'),
(14, 'Testing', '2022-04-05', '12:13:04', 'Anonymous'),
(15, 'hello', '2022-04-05', '14:12:00', ''),
(16, 'hello', '2022-04-05', '14:12:12', ''),
(17, 'hello', '2022-04-05', '14:12:27', 'Anonymous'),
(18, 'hello', '2022-04-05', '14:12:33', 'Anonymous'),
(19, 'hello', '2022-04-05', '14:26:29', 'Anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentID` int(11) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `departmentImage` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentID`, `departmentName`, `departmentImage`) VALUES
(1, 'Biomedical Engineering Department', 'images/2022.jpg'),
(2, 'IT department', 'images/2022.jpg'),
(3, 'Dance ', 'images/2022.jpg'),
(4, 'Film', 'images/2022.jpg'),
(5, 'History Department', 'images/2022.jpg'),
(6, 'Italian Department', 'images/2022.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `ideaID` int(11) NOT NULL,
  `ideaTitle` varchar(50) NOT NULL,
  `ideaText` text NOT NULL,
  `commentClosureDate` date DEFAULT NULL,
  `supportDoc` varchar(200) NOT NULL,
  `postDate` date NOT NULL,
  `postTime` time NOT NULL,
  `anonymous` varchar(10) DEFAULT NULL,
  `view` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `idea`
--

INSERT INTO `idea` (`ideaID`, `ideaTitle`, `ideaText`, `commentClosureDate`, `supportDoc`, `postDate`, `postTime`, `anonymous`, `view`, `categoryID`) VALUES
(10, 'FIRST Robotics Competition', 'FIRST Robotics Competition has a unique culture that is built around two values. \"Gracious Professionalism\" embraces the competition inherent in the program, but rejects trash talk and chest-thumping, instead embracing empathy and respect for other teams. \"Coopertition\" emphasizes that teams can cooperate and compete at the same time.The goal of the program is to inspire students to be science and technology leaders.', '2022-03-31', '2022.jpg', '2022-03-01', '12:11:03', NULL, 19, 1),
(11, 'Little Box Challenge', 'The goals of the competition were lower cost solar photovoltaic power, more efficient uninterruptible power supplies, affordable microgrids, and the ability to use an electric vehicle\'s battery as backup power during a power outage. Google also hoped a smaller inverter could make its data centers run more efficiently.', '2022-04-01', 'document/', '2022-03-31', '16:51:20', NULL, 300, 1),
(12, 'Solar car races‎ ', 'The objective of the challenge is to promote the innovation of solar-powered cars. It is a design competition at its core, and every team/car that successfully crosses the finish line is considered successful. Teams from universities and enterprises participate. ', '2022-04-28', 'document/', '2022-03-29', '17:02:50', NULL, 26, 1),
(13, 'Junior Solar Sprint', 'Objectives of JSS are to create the fastest, most interesting, or best crafted vehicle. Skills in science, technology, engineering, and mathematics (STEM) are fostered when designing and constructing the vehicles, as well as principles of alternative fuels, engineering design, and aerodynamics.', '2022-04-28', 'document/', '2022-03-29', '18:56:02', 'anonymous', 16, 2),
(14, '25 Days of Making', '25 Days of making is all about bringing together a community of Makers and let their creativity be shared with those who wish to see it. 25 Days of Making’s goal is to inspire Students, Educators, and other Makers to join 25 Days of Making. They want students, educators and other makers to use the creative and fun ideas to Make their own experiments or even to try out some of the ones shown on the page.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:03:22', 'anonymous', 14, 2),
(15, 'Altoids Flashlight', 'Target Applicant: Pre-University, Undergraduate\r\nMake an LED flashlight using a mint tin.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:04:16', NULL, 0, 2),
(16, 'Academy of Engineering Camp', 'For Gearheads Only- Mechanical Engineering 101 Explore simple machines, wheels, and axels, pulleys, gears and universal joints as we learn the basic principles of mechanical engineering. Design wind cars, working gear trains, and compete to construct the most unique machine. Building the World Around Us- Civil Engineering Basics This unique summer workshop will introduce students to the principles of architecture and urban planning using LEGOs, K’NEX and other materials. Students will be presented with a wide range of modeling, engineering and architectural activities as they map out and build communities. We’ll construct bridges and towers and investigate the impact of earthquakes on structures', '2022-04-29', 'document/', '2022-03-30', '00:05:20', NULL, 16, 2),
(17, 'Adventures in Engineering and Science', 'Adventures in Engineering and Science is a bilingual non-profit outreach program based at the University of Ottawa run jointly through the Faculty of Engineering and the Faculty of Science.Adventures in Engineering offers a wide range of programming, including science and engineering as well as computer and technology based summer day camps, a girls-only weekend science club, and fun and interactive in-school workshops. They also welcome high-school students who would like to complete volunteer hours.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:06:43', NULL, 169, 1),
(18, 'Make a snack pulley', 'Left Brain Craft Brain’s pulley for snacks is seriously amazing. The step-by-step directions are easy to follow, and this would make a great parent-child project.', '2022-04-30', 'document/', '2022-03-31', '11:57:44', 'anonymous', 98, 2),
(69, 'Hello', 'Hello', '2022-04-20', 'document/', '2022-04-16', '07:05:34', NULL, 0, 3),
(70, 'Hey', 'Hey', '2022-04-29', 'document/', '2022-04-30', '07:07:35', 'anonymous', 4, 2),
(71, 'Try', 'Try', '2022-05-01', 'document/', '2022-04-16', '07:13:40', 'anonymous', 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `managedata`
--

CREATE TABLE `managedata` (
  `dataID` int(11) NOT NULL,
  `staffID` int(11) DEFAULT NULL,
  `ideaID` int(11) NOT NULL,
  `commentID` int(11) DEFAULT NULL,
  `reactID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managedata`
--

INSERT INTO `managedata` (`dataID`, `staffID`, `ideaID`, `commentID`, `reactID`) VALUES
(1, 3, 10, NULL, NULL),
(2, 5, 11, NULL, NULL),
(3, 2, 12, NULL, NULL),
(4, NULL, 13, NULL, NULL),
(5, NULL, 14, NULL, NULL),
(7, 5, 16, NULL, NULL),
(8, 2, 17, NULL, NULL),
(25, 2, 17, NULL, 24),
(26, 2, 17, 1, NULL),
(27, NULL, 17, 2, NULL),
(28, 5, 17, 3, NULL),
(29, 5, 17, 4, NULL),
(30, 5, 17, 5, NULL),
(31, 5, 17, 6, NULL),
(32, NULL, 17, 7, NULL),
(33, 5, 17, 8, NULL),
(38, NULL, 18, NULL, NULL),
(39, 3, 18, NULL, 29),
(40, 3, 18, 9, NULL),
(41, NULL, 18, 10, NULL),
(46, 9, 18, 11, NULL),
(47, 9, 18, 12, NULL),
(48, NULL, 18, 13, NULL),
(49, NULL, 18, 14, NULL),
(50, 9, 18, 15, NULL),
(51, 9, 18, 16, NULL),
(52, NULL, 18, 17, NULL),
(53, NULL, 18, 18, NULL),
(54, NULL, 18, 19, NULL),
(139, 5, 69, NULL, NULL),
(140, NULL, 70, NULL, NULL),
(141, NULL, 71, NULL, NULL),
(142, 5, 70, NULL, 51),
(144, 5, 17, NULL, 53);

-- --------------------------------------------------------

--
-- Table structure for table `react`
--

CREATE TABLE `react` (
  `reactID` int(11) NOT NULL,
  `thumbUp` int(1) NOT NULL,
  `thumbDown` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `react`
--

INSERT INTO `react` (`reactID`, `thumbUp`, `thumbDown`) VALUES
(24, 1, 0),
(29, 1, 0),
(34, 1, 0),
(36, 1, 0),
(38, 1, 0),
(39, 0, 6),
(40, 1, 0),
(41, 0, 1),
(42, 0, 1),
(43, 0, 1),
(44, 1, 0),
(45, 1, 0),
(46, 1, 0),
(47, 0, 1),
(48, 0, 1),
(49, 1, 0),
(50, 0, 1),
(51, 0, 1),
(53, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffID` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `fName` varchar(20) NOT NULL,
  `lName` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phoneNo` varchar(12) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `role` varchar(30) NOT NULL,
  `departmentID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffID`, `username`, `fName`, `lName`, `gender`, `phoneNo`, `email`, `password`, `image`, `role`, `departmentID`) VALUES
(1, 'H', 'Chin', 'Yoh', 'Male', '0123456789', 'yy@gmail.com', 'chin123', NULL, 'manager', NULL),
(2, 'Y', 'Gemay', 'Ning', 'Female', '0123787466', 'ning@gmail.com', 'ning123', NULL, 'staff', 2),
(3, 'Y', 'Eunice', 'Tan1', 'Female', '0167473321', '11@gmail.com', 'eunice123', 'Capture.PNG', 'coordinator', NULL),
(4, 'Y', 'Hooi', 'Luan', 'Female', '01147892900', 'hooi@gmail.com', 'hooi123', NULL, 'staff', 5),
(5, 'YU', 'Yong', 'YiLeng', 'Female', '0199831455', 'yileng0114@gmail.com', '', 'user.png', 'staff', 1),
(6, 'UI', 'Jameson', 'Loh', 'Male', '0167473333', 'loh@gmail.com', 'loh123', NULL, 'staff', 6),
(7, 'Chin', 'Chen', 'Xiang', 'Male', '+60124587965', 'yileng@gmail.com', 'xiang123', 'user.png', 'manager', NULL),
(9, 'Tan', 'Kok', 'Kang', 'Female', '+60124567894', 'shinesky1110@gmail.com', 'kang123', 'user.png', 'staff', 1),
(10, 'lee', 'Wei', 'Zhe', 'Female', '+60124587469', 'lee@gmail.com', 'zhe123', 'lee.jpg', 'staff', 5),
(11, 'kok', 'Zheng', 'Xian', 'Male', '+60124587495', 'yileng0114@gmail.com', 'xian123', 'lee.jpg', 'coordinator', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentID`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentID`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`ideaID`),
  ADD KEY `categoryID` (`categoryID`);

--
-- Indexes for table `managedata`
--
ALTER TABLE `managedata`
  ADD PRIMARY KEY (`dataID`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `reactID` (`reactID`),
  ADD KEY `staffID` (`staffID`),
  ADD KEY `ideaID` (`ideaID`);

--
-- Indexes for table `react`
--
ALTER TABLE `react`
  ADD PRIMARY KEY (`reactID`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffID`),
  ADD KEY `departmentID` (`departmentID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `ideaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `managedata`
--
ALTER TABLE `managedata`
  MODIFY `dataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);

--
-- Constraints for table `managedata`
--
ALTER TABLE `managedata`
  ADD CONSTRAINT `managedata_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comment` (`commentID`),
  ADD CONSTRAINT `managedata_ibfk_2` FOREIGN KEY (`reactID`) REFERENCES `react` (`reactID`),
  ADD CONSTRAINT `managedata_ibfk_3` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`),
  ADD CONSTRAINT `managedata_ibfk_4` FOREIGN KEY (`ideaID`) REFERENCES `idea` (`ideaID`);

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`departmentID`) REFERENCES `department` (`departmentID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
