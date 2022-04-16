-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 09:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idea`
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
(1, 'Solution', '2022-04-28', 1),
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
(16, 'Solution', '2022-06-01', 6),
(26, 'Problem', '2022-06-03', 6),
(29, 'Feedback', '2022-06-03', 6);

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
(4, 'Yes', '2022-03-30', '01:07:48', ''),
(5, 'Agree', '2022-03-30', '01:09:31', ''),
(6, 'Agree', '2022-03-30', '01:09:41', ''),
(7, 'Agree', '2022-03-31', '11:40:27', 'Anonymous'),
(8, 'Sound Great!', '2022-03-31', '11:49:27', ''),
(9, 'My kids will loved it', '2022-03-31', '11:59:26', ''),
(10, 'I know right', '2022-03-31', '12:01:24', 'Anonymous'),
(11, 'Agree', '2022-04-05', '12:01:42', ''),
(12, 'Yes', '2022-04-05', '12:12:23', ''),
(13, 'Not Agree', '2022-04-05', '12:12:53', 'Anonymous'),
(14, 'Agree', '2022-04-05', '12:13:04', 'Anonymous'),
(15, 'Agree', '2022-04-05', '14:12:00', ''),
(16, 'Yes', '2022-04-05', '14:12:12', ''),
(17, 'No Agree', '2022-04-05', '14:12:27', 'Anonymous'),
(18, 'Agree', '2022-04-05', '14:12:33', 'Anonymous'),
(19, 'Not Agree.', '2022-04-05', '14:26:29', 'Anonymous'),
(37, 'Good', '2022-04-17', '01:46:36', 'Anonymous'),
(38, 'Me too!', '2022-04-17', '01:46:52', ''),
(39, 'Not agree', '2022-04-17', '01:47:32', 'Anonymous'),
(40, 'Hiring more intern', '2022-04-17', '01:47:48', ''),
(41, 'Yes', '2022-04-17', '01:48:50', ''),
(42, 'Correct', '2022-04-17', '01:49:03', 'Anonymous'),
(43, 'Thank you', '2022-04-17', '01:50:09', 'Anonymous'),
(44, 'Welcome', '2022-04-17', '01:50:28', 'Anonymous'),
(45, 'I dont think so', '2022-04-17', '01:57:43', 'Anonymous');

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
(1, 'Biomedical Engineering Department', 'images/good.jpg'),
(2, 'IT department', 'images/good.jpg'),
(3, 'Dance ', 'images/good.jpg'),
(4, 'Film', 'images/good.jpg'),
(5, 'History Department', 'images/good.jpg'),
(6, 'Italian Department', 'images/good.jpg');

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
(10, 'FIRST Robotics Competition', 'FIRST Robotics Competition has a unique culture that is built around two values. \"Gracious Professionalism\" embraces the competition inherent in the program, but rejects trash talk and chest-thumping, instead embracing empathy and respect for other teams. \"Coopertition\" emphasizes that teams can cooperate and compete at the same time.The goal of the program is to inspire students to be science and technology leaders.', '2022-03-31', '2022.jpg', '2022-03-01', '12:11:03', NULL, 20, 1),
(11, 'Little Box Challenge', 'The goals of the competition were lower cost solar photovoltaic power, more efficient uninterruptible power supplies, affordable microgrids, and the ability to use an electric vehicle\'s battery as backup power during a power outage. Google also hoped a smaller inverter could make its data centers run more efficiently.', '2022-04-01', 'document/', '2022-03-31', '16:51:20', NULL, 300, 1),
(12, 'Solar car races‎ ', 'The objective of the challenge is to promote the innovation of solar-powered cars. It is a design competition at its core, and every team/car that successfully crosses the finish line is considered successful. Teams from universities and enterprises participate. ', '2022-04-28', 'document/', '2022-03-29', '17:02:50', NULL, 29, 1),
(13, 'Junior Solar Sprint', 'Objectives of JSS are to create the fastest, most interesting, or best crafted vehicle. Skills in science, technology, engineering, and mathematics (STEM) are fostered when designing and constructing the vehicles, as well as principles of alternative fuels, engineering design, and aerodynamics.', '2022-04-28', 'document/', '2022-03-29', '18:56:02', 'anonymous', 16, 2),
(14, '25 Days of Making', '25 Days of making is all about bringing together a community of Makers and let their creativity be shared with those who wish to see it. 25 Days of Making’s goal is to inspire Students, Educators, and other Makers to join 25 Days of Making. They want students, educators and other makers to use the creative and fun ideas to Make their own experiments or even to try out some of the ones shown on the page.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:03:22', 'anonymous', 14, 2),
(15, 'Altoids Flashlight', 'Target Applicant: Pre-University, Undergraduate\r\nMake an LED flashlight using a mint tin.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:04:16', NULL, 0, 2),
(16, 'Academy of Engineering Camp', 'For Gearheads Only- Mechanical Engineering 101 Explore simple machines, wheels, and axels, pulleys, gears and universal joints as we learn the basic principles of mechanical engineering. Design wind cars, working gear trains, and compete to construct the most unique machine. Building the World Around Us- Civil Engineering Basics This unique summer workshop will introduce students to the principles of architecture and urban planning using LEGOs, K’NEX and other materials. Students will be presented with a wide range of modeling, engineering and architectural activities as they map out and build communities. We’ll construct bridges and towers and investigate the impact of earthquakes on structures', '2022-04-29', 'document/', '2022-03-30', '00:05:20', NULL, 16, 2),
(17, 'Adventures in Engineering and Science', 'Adventures in Engineering and Science is a bilingual non-profit outreach program based at the University of Ottawa run jointly through the Faculty of Engineering and the Faculty of Science.Adventures in Engineering offers a wide range of programming, including science and engineering as well as computer and technology based summer day camps, a girls-only weekend science club, and fun and interactive in-school workshops. They also welcome high-school students who would like to complete volunteer hours.', '2022-04-29', 'document/2022.jpg', '2022-03-30', '00:06:43', NULL, 176, 1),
(18, 'Make a snack pulley', 'Left Brain Craft Brain’s pulley for snacks is seriously amazing. The step-by-step directions are easy to follow, and this would make a great parent-child project.', '2022-04-30', 'document/', '2022-03-31', '11:57:44', 'anonymous', 99, 2),
(69, 'Communication', 'Thank you for taking extra effort to make sure the entire team was on the same page. It would have been easy for important details to slip through the cracks, but thanks to you, that didn’t happen.', '2022-04-20', 'document/', '2022-04-16', '07:05:34', NULL, 0, 3),
(70, 'Effort', 'Even though the outcome wasn’t what we wanted, I want to congratulate you on all of the hard work you put in over the past few weeks. If we apply that same effort to our next project, I believe we can win', '2022-04-29', 'document/', '2022-04-30', '07:07:35', 'anonymous', 5, 2),
(71, 'Collaboration', 'Your ability to work across teams and departments is a strength not everyone has. I’m impressed with the way you’re working to dismantle silos. For example, when you drew the marketing team into our conversations, it sharpened our ideas and helped us meet goals faster. Keep up the good work.', '2022-05-01', 'document/', '2022-04-16', '07:13:40', 'anonymous', 1, 3),
(72, 'Problem-solving', 'Thanks to your willingness to take risks and learn from mistakes, we solved a problem that could have cost the company a lot in the long run. Great work!', '2022-05-01', 'document/', '2022-04-16', '22:40:26', NULL, 4, 3),
(73, 'Meeting goals', 'I can tell you’ve learned how to maintain a workload that’s ambitious, yet realistic, because you’ve met all of your goals for the past 3 quarters. Last year we talked about your tendency to take on too many projects at once blocking your success. You’ve really improved, and everyone’s better for it', '2022-05-01', 'document/', '2022-04-16', '22:41:23', NULL, 0, 3),
(74, 'Responding to change', 'I just need to take a second to acknowledge: Change is scary, and not everyone responds with as much positivity as you did. Thank you for helping us move forward on this new initiative', '2022-05-01', 'document/', '2022-04-16', '22:44:14', NULL, 6, 3),
(75, ' Lack of Security Measures', 'Phishing attacks\r\nWeak passwords\r\nUnauthorized access to information', '2022-05-01', 'document/', '2022-04-16', '22:49:25', NULL, 0, 5),
(76, 'Lack of Employee (Internal) Security Measures', 'Phishing attacks\r\nWeak passwords\r\nUnauthorized access to information', '2022-05-01', 'document/', '2022-04-16', '22:50:32', NULL, 1, 5),
(77, 'Outdated Equipment and Software', 'Poor software and outdated hardware', '2022-05-01', 'document/', '2022-04-16', '22:52:53', NULL, 0, 5),
(78, 'Data Loss and Recovery', 'Power outage\r\nCyber attack\r\nEquipment malfunction\r\nHuman error', '2022-05-01', 'document/', '2022-04-16', '22:55:34', NULL, 1, 5),
(79, 'A Lack of Comprehensive Solutions', 'A Lack of Comprehensive Solutions', '2022-05-01', 'document/', '2022-04-16', '22:56:34', NULL, 0, 5),
(80, 'Effective Solutions', 'Effective Solutions', '2022-05-01', 'document/', '2022-04-16', '22:57:25', NULL, 0, 5),
(81, 'Keeping users mobile and secure', 'Mobility is an important strategy to increase productivity for users and improve their work satisfaction by providing more flexibility in the workplace. It gives them the ability to access the company network to securely access back-office systems, documents, and corporate applications outside of the office. But there are risks. IT departments must ensure that the devices users are working on remotely have the necessary security systems in place – including two-factor authentication – in order to protect the corporate network.', '2022-05-01', 'document/', '2022-04-16', '23:01:01', NULL, 0, 5),
(82, 'Run a thorough virus scan', 'It’s obvious, but it’s effective: Fire up your virus-scanning software, launch the deepest and most thorough scan available, and leave it to do its work. Note that the most comprehensive type of scan (which looks at the most files and takes the longest time to complete) may not be the scan that your computer is set to run by default, so check the program settings to see what’s available. You’ll also want to make sure your scanner is up to date first, so it can catch the most recent wave of bad code.\r\n\r\nAntivirus scanners can sometimes miss threats or be disabled by them, so it’s worth getting a second opinion. A lot of antivirus developers make lightweight, on-demand scanners you can install alongside your main security software as a second layer of protection—applications like Kaspersky Security Scan for Windows or macOS, or Microsoft Safety Scanner for Windows, or Emsisoft Emergency Kit for Windows.', '2022-05-01', 'document/', '2022-04-16', '23:04:15', NULL, 0, 4),
(83, 'Customer feedback helps improve products and servi', 'When you initially introduce a new product, brand, or service to market you probably have an idea about customer needs. Market research that you conduct before introduction gives you an idea if potential customers would be willing to buy it and also they can give you some tips on how you could improve it. However, only after your customers use your product or service you can learn about all the advantages, flaws, and their actual experience. On top of that, their needs and expectations evolve with time.', '2022-05-01', 'document/', '2022-04-16', '23:06:54', NULL, 0, 6),
(84, 'Customer feedback helps improve products and servi', 'When you initially introduce a new product, brand, or service to market you probably have an idea about customer needs. Market research that you conduct before introduction gives you an idea if potential customers would be willing to buy it and also they can give you some tips on how you could improve it. However, only after your customers use your product or service you can learn about all the advantages, flaws, and their actual experience. On top of that, their needs and expectations evolve with time.', '2022-05-01', 'document/', '2022-04-16', '23:07:46', NULL, 0, 6),
(85, 'Let’s get physical', 'It’s well-known that physical activity releases endorphins, biological chemicals which behave like an analgesic to calm and improve your mood. Because of its fun nature, dancing in particular produces a euphoria which has been coined a ‘natural high’. When your body is relaxed, your mind is free to explore options it wouldn’t normally consider. Some of the greatest inventions have been harnessed outside of the office or the lab, in a more jovial environment.', '2022-05-01', 'document/', '2022-04-16', '23:10:58', NULL, 1, 7),
(86, ' Between leotards, shoes, and classes, the costs o', 'Unless you’re in a company that provides your pointe shoes, you could be spending upward of $60 for a pair of pointe shoes that only last anywhere from a few classes to a few weeks. And the costs go beyond what you’re actually wearing to class. Most dancers will take open classes outside of their regular training, which can cost $10 to $20 a class. Plus, unlike other people living on a budget, you can’t exist on ramen to save money. Your body needs healthy, quality food and that’s going to be more expensive.', '2022-05-01', 'document/', '2022-04-16', '23:12:03', NULL, 0, 8),
(87, 'Always compliment on something specific, in a form', 'Appreciating the improvement will make you genuine and they will feel very positive about it.', '2022-05-01', 'document/', '2022-04-16', '23:14:30', NULL, 0, 9),
(88, 'Create more movie', 'Create more movie', '2022-05-01', 'document/', '2022-04-16', '23:20:55', NULL, 15, 10),
(89, 'Hiring More Staff', 'Hiring More Staff', '2022-05-01', 'document/', '2022-04-16', '23:21:34', NULL, 12, 11),
(90, 'Good Movie', 'Good movie thank for all the people behind the scene', '2022-05-01', 'document/', '2022-04-16', '23:22:37', NULL, 15, 12),
(91, 'Create more interesting learning way ', 'Create more interesting learning way ', '2022-05-01', 'document/', '2022-04-16', '23:23:32', NULL, 16, 13),
(92, 'The time learning too long', 'The time learning too long', '2022-05-01', 'document/', '2022-04-16', '23:24:39', NULL, 11, 14),
(93, 'Thank you for all the hero', 'Thank you for all the army protect our country', '2022-05-01', 'document/', '2022-04-16', '23:26:06', NULL, 11, 15),
(94, 'Hiring more professional person ', 'Hiring more professional person ', '2022-05-01', 'document/', '2022-04-16', '23:26:47', NULL, 3, 6),
(95, 'Too many style of dance', 'Too many styles of dance', '2022-05-01', 'document/', '2022-04-16', '23:27:41', NULL, 3, 8),
(96, 'Focus on your feet', 'Focus on your feet', '2022-05-01', 'document/', '2022-04-16', '23:30:20', NULL, 1, 9),
(97, 'Replace HDD to SSD', 'Speed up the device performances', '2022-05-01', 'document/', '2022-04-16', '23:37:09', NULL, 0, 4),
(98, 'Learned a new skill', 'Learning from different department', '2022-05-01', 'document/', '2022-04-16', '23:38:25', NULL, 5, 6),
(99, 'Employee reached a goal', 'I know this goal wasn’t easy. How you managed to set it and systematically work towards it until you achieved it truly speaks to your intelligence, tenacity, and perseverance. I’m lucky to have you on my team', '2022-05-01', 'document/', '2022-04-16', '23:40:32', NULL, 0, 6),
(100, 'Upgrade the server', 'Upgrade the server', '2022-05-01', 'document/', '2022-04-16', '23:41:43', NULL, 0, 4),
(101, 'employee learned from a past mistake', 'The way you gave that presentation today really shows me you listened to what I said about the snafu last month. I appreciate your mindful application of feedback', '2022-05-01', 'document/', '2022-04-16', '23:42:56', NULL, 0, 6),
(102, 'employee came to you for help', ' realize it wasn’t easy to admit you were running behind on this project, but I’m so glad you were honest. We can fix this together. If you had kept quiet and failed to meet our deadline, we might be in hot water with the big boss', '2022-05-01', 'document/', '2022-04-16', '23:43:50', NULL, 0, 6),
(103, 'Begin With A Positive Approach', 'When a problem arises, it’s easy to enter panic mode or envision worst-case scenarios. Before you let your mind go there, take a step back and address every problem as simply another situation. It is a challenge that, with the right approach, you can handle. Part of that approach is thinking positively and creatively about the situation.', '2022-05-01', 'document/', '2022-04-16', '23:45:09', NULL, 0, 4),
(104, 'Define The Problem', 'Not only should you clarify what the problem is, but you should also see what caused the problem. If you can’t conclude the cause of the problem, you may need to meet with other parties involved to determine the root before moving forward.', '2022-05-01', 'document/', '2022-04-16', '23:46:02', NULL, 0, 4),
(105, 'Testing', 'Testing', '2022-05-02', 'document/', '2022-04-17', '01:22:38', NULL, 0, 2),
(106, 'Testing2', 'Testing2', '2022-05-02', 'document/', '2022-04-17', '01:23:21', 'anonymous', 0, 2),
(107, 'Learn Different Language', 'Learn Different Language', '2022-05-02', 'document/', '2022-04-17', '01:51:35', NULL, 27, 16),
(108, 'Hard to Learn', 'Hard to Learn', '2022-05-02', 'document/', '2022-04-17', '01:52:12', 'anonymous', 5, 26),
(109, 'Good Learning Way', 'Creativity', '2022-05-02', 'document/', '2022-04-17', '01:57:09', 'anonymous', 15, 29),
(110, 'Good Learning', 'Good Learning ', '2022-05-02', 'document/', '2022-04-17', '02:30:53', 'anonymous', 3, 1);

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
(144, 5, 17, NULL, 53),
(145, 2, 72, NULL, NULL),
(146, 2, 73, NULL, NULL),
(147, 6, 74, NULL, NULL),
(148, 11, 75, NULL, NULL),
(149, 11, 76, NULL, NULL),
(150, 11, 77, NULL, NULL),
(151, 6, 78, NULL, NULL),
(152, 6, 79, NULL, NULL),
(153, 6, 80, NULL, NULL),
(154, 4, 81, NULL, NULL),
(155, 4, 82, NULL, NULL),
(158, 4, 85, NULL, NULL),
(161, 4, 88, NULL, NULL),
(162, 4, 89, NULL, NULL),
(163, 4, 90, NULL, NULL),
(164, 4, 91, NULL, NULL),
(165, 4, 92, NULL, NULL),
(166, 4, 93, NULL, NULL),
(167, 4, 94, NULL, NULL),
(168, 4, 95, NULL, NULL),
(169, 4, 96, NULL, NULL),
(170, 6, 97, NULL, NULL),
(171, 6, 98, NULL, NULL),
(172, 6, 98, NULL, 54),
(173, 6, 99, NULL, NULL),
(174, 9, 100, NULL, NULL),
(175, 9, 101, NULL, NULL),
(176, 9, 102, NULL, NULL),
(177, 9, 103, NULL, NULL),
(178, 9, 104, NULL, NULL),
(179, 9, 74, NULL, 55),
(180, 9, 105, NULL, NULL),
(181, NULL, 106, NULL, NULL),
(182, 5, 90, NULL, 56),
(183, NULL, 90, 37, NULL),
(184, 5, 90, 38, NULL),
(185, 5, 89, NULL, 57),
(186, NULL, 89, 39, NULL),
(187, 5, 89, 40, NULL),
(188, 5, 88, NULL, 58),
(189, 5, 88, 41, NULL),
(190, NULL, 88, 42, NULL),
(191, 5, 91, NULL, 59),
(192, 5, 93, NULL, 60),
(193, NULL, 93, 43, NULL),
(194, NULL, 93, 44, NULL),
(195, 5, 107, NULL, NULL),
(196, NULL, 108, NULL, NULL),
(197, 5, 107, NULL, 61),
(198, NULL, 109, NULL, NULL),
(199, 9, 109, NULL, 62),
(200, NULL, 109, 45, NULL),
(201, 9, 92, NULL, 63),
(202, 9, 88, NULL, 64),
(203, 9, 12, NULL, 65),
(204, 9, 72, NULL, 66),
(205, 9, 95, NULL, 67),
(206, 9, 93, NULL, 68),
(207, NULL, 110, NULL, NULL);

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
(29, 10, 5),
(34, 8, 3),
(36, 12, 8),
(38, 17, 5),
(39, 3, 6),
(40, 1, 2),
(41, 22, 1),
(42, 6, 1),
(43, 54, 1),
(44, 1, 0),
(45, 23, 0),
(46, 20, 0),
(47, 0, 15),
(48, 33, 1),
(49, 1, 0),
(50, 0, 1),
(51, 0, 1),
(53, 0, 1),
(54, 1, 0),
(55, 0, 1),
(56, 9, 0),
(57, 0, 1),
(58, 1, 5),
(59, 7, 1),
(60, 1, 0),
(61, 1, 0),
(62, 0, 1),
(63, 1, 0),
(64, 0, 1),
(65, 1, 0),
(66, 0, 1),
(67, 1, 0),
(68, 1, 0);

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
(1, 'H', 'Chin', 'Yoh', 'Male', '0123456789', 'yy@gmail.com', 'chin123', 'lee.jpg', 'manager', NULL),
(2, 'Y', 'Gemay', 'Ning', 'Female', '0123787466', 'ning@gmail.com', 'ning123', NULL, 'staff', 2),
(3, 'Y', 'Eunice', 'Tan1', 'Female', '0167473321', 'eunicetan1121@gmail.com', 'eunice123', 'Capture.PNG', 'coordinator', NULL),
(4, 'Y', 'Hooi', 'Luan', 'Female', '01147892900', 'hooi@gmail.com', 'hooi123', NULL, 'staff', 5),
(5, 'YU', 'Yong', 'YiLeng', 'Female', '0199831455', 'yileng0114@gmail.com', 'yi123', 'user.png', 'staff', 1),
(6, 'UI', 'Jameson', 'Loh', 'Male', '0167473333', 'loh@gmail.com', 'loh123', NULL, 'staff', 6),
(7, 'Chin', 'Chen', 'Xiang', 'Male', '+60124587965', 'yileng@gmail.com', 'xiang123', 'user.png', 'manager', NULL),
(9, 'Tan', 'Kok', 'Kang', 'Female', '+60124567894', 'peterpanpp00@gmail.com', 'kang123', 'user.png', 'staff', 1),
(10, 'lee', 'Wei', 'Zhe', 'Female', '+60124587469', 'lee@gmail.com', 'zhe123', 'lee.jpg', 'staff', 5),
(11, 'kok', 'Zheng', 'Xian', 'Male', '+60124587495', 'zhengxian0316@gmail.com', 'xian123', '', 'coordinator', 1),
(12, 'jesen', 'tan', 'lin', 'Male', '+60123589465', 'jesen@gmail.com', 'jensen123', 'user.png', 'manager', 1),
(13, 'lim', 'lim', 'lim', 'Female', '+60123458796', 'lim@gmail.com', 'lim123', 'user.png', 'manager', 1),
(15, 'kok', 'kok', 'kok', 'Male', '+60152369852', 'kokokokok@gmail.com', '123456', 'user.png', 'staff', 1);

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
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `ideaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `managedata`
--
ALTER TABLE `managedata`
  MODIFY `dataID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `react`
--
ALTER TABLE `react`
  MODIFY `reactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staffID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
