-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2023 at 05:30 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--
CREATE DATABASE IF NOT EXISTS `news-site` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `news-site`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `get_categories`$$
CREATE DEFINER=`` PROCEDURE `get_categories` ()   BEGIN
  SELECT * FROM category;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`, `age`) VALUES
(30, 'Heart', 1, 18),
(31, 'Headache', 0, 0),
(32, 'Diabetes', 2, 0),
(33, 'COVID-19', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(36, 'Heart Pain', 'Heart disease is a term used to describe a range of conditions that affect the heart. It is a leading cause of death worldwide and can result in serious health complications if left untreated. Heart disease can take many forms, including coronary artery disease, heart failure, arrhythmias, and heart valve problems.\r\n\r\nCoronary artery disease occurs when the blood vessels that supply the heart with oxygen and nutrients become narrow or blocked, which can lead to chest pain or a heart attack. Heart failure happens when the heart cannot pump enough blood to meet the body\'s needs. Arrhythmias are irregular heartbeats that can cause the heart to beat too fast or too slow, while heart valve problems can interfere with the normal flow of blood through the heart.\r\n\r\nRisk factors for heart disease include high blood pressure, high cholesterol, smoking, obesity, physical inactivity, diabetes, and a family history of heart disease. Treatment options may include lifestyle changes, medications, surgery, or other medical procedures.\r\n\r\nPrevention is key when it comes to heart disease, and individuals can take steps to reduce their risk by maintaining a healthy weight, eating a healthy diet, getting regular exercise, quitting smoking, and managing any underlying health conditions. Regular check-ups with a healthcare provider can also help detect and manage any early signs of heart disease.', '30', '10 Apr, 2023', 24, 'blog-p-1.jpg'),
(37, 'Malaria: The Contigious disease', 'Malaria is a life-threatening disease caused by Plasmodium parasites that are transmitted to people through the bites of infected female Anopheles mosquitoes. Malaria is prevalent in tropical and subtropical regions, particularly in sub-Saharan Africa, but it also occurs in parts of South Asia, Central America, and South America.\r\n\r\nThere are several medicines used to treat malaria, including:\r\n\r\nChloroquine: It is a widely used antimalarial drug that interferes with the parasite\'s ability to break down and digest hemoglobin. This results in the accumulation of toxic heme in the parasite, leading to its death.\r\n\r\nArtemisinin-based combination therapies (ACTs): ACTs are a group of drugs that combine artemisinin, a natural compound derived from the sweet wormwood plant, with other antimalarial drugs. This combination therapy is highly effective in treating uncomplicated malaria caused by Plasmodium falciparum.', '32', '10 Apr, 2023', 24, 'blog-p-2.jpg'),
(38, 'The affect of Crohn DIsease', 'Crohn\'s Disease is a chronic inflammatory bowel disease that affects millions of people worldwide. Although the exact cause of Crohn\'s disease is unknown, research suggests that it is caused by a combination of genetic, environmental, and immunological factors. Common symptoms of Crohn\'s disease include abdominal pain, diarrhea, weight loss, and fatigue. Treatment for Crohn\'s disease typically involves medication to reduce inflammation and manage symptoms, as well as dietary and lifestyle changes to promote healing and prevent flare-ups. If left untreated, Crohn\'s disease can lead to serious complications, including bowel obstruction, abscesses, and malnutrition. By understanding the causes and symptoms of Crohn\'s disease and working closely with your healthcare provider, you can better manage your symptoms and live a healthy, fulfilling life.', '32', '19 Apr, 2023', 26, 'blog-p-6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Ahmed', 'Awan', 'A', '900150983cd24fb0d6963f7d28e17f72', 1),
(26, 'Hamza', 'Khan', 'B', '900150983cd24fb0d6963f7d28e17f72', 0),
(27, 'Sohaib', 'Ahmed', 'Kimi wa dare', '900150983cd24fb0d6963f7d28e17f72', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
