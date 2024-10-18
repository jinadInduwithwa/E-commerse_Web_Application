-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2023 at 12:34 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Grove`
--

-- --------------------------------------------------------

--
-- Table structure for table `BuyProduct`
--

CREATE TABLE `BuyProduct` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `BuyProduct`
--

INSERT INTO `BuyProduct` (`id`, `user_id`, `product_id`) VALUES
(18, 12, 29),
(21, 12, 24);

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `categoryId` int(11) NOT NULL,
  `categoryTitle` varchar(100) NOT NULL,
  `categoryDiscription` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`categoryId`, `categoryTitle`, `categoryDiscription`) VALUES
(2, 'Film', 'watch films'),
(4, 'Music', 'listning music');

-- --------------------------------------------------------

--
-- Table structure for table `FAQ`
--

CREATE TABLE `FAQ` (
  `faqID` int(11) NOT NULL,
  `faqQuestion` varchar(6000) NOT NULL,
  `faqAnswer` varchar(6000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `FAQ`
--

INSERT INTO `FAQ` (`faqID`, `faqQuestion`, `faqAnswer`) VALUES
(7, 'Q1: How can I purchase music or games from your store?', 'To purchase music or games, simply browse our online store, select the items you want, add them to your cart, and proceed to the checkout. You can make a secure payment using various payment options.'),
(8, 'Q2 Can I download purchased music and games immediately', ' Yes, after a successful purchase, youll receive download links or access to your purchased items. You can start downloading and enjoying them right away.'),
(9, 'Q4: Are the games and music compatible with my device?', ' We provide information about the compatibility of our products. Make sure to check the system requirements and formats before purchasing. Feel free to contact our support team for further assistance.'),
(10, 'Q5: How do I contact customer support if I have an issue with my purchase?', 'You can reach out to our customer support team through the Contact Us section on our website or via email. Were here to assist you with any issues or questions you may have.');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `productId` int(11) NOT NULL,
  `productTitle` varchar(100) NOT NULL,
  `productDiscription` varchar(255) NOT NULL,
  `productKeywords` varchar(255) NOT NULL,
  `category_ID` int(11) NOT NULL,
  `productImage1` varchar(255) NOT NULL,
  `productImage2` varchar(255) NOT NULL,
  `productImage3` varchar(255) NOT NULL,
  `productPrice` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`productId`, `productTitle`, `productDiscription`, `productKeywords`, `category_ID`, `productImage1`, `productImage2`, `productImage3`, `productPrice`, `date`, `status`) VALUES
(24, 'race II', ' While planning and executing one of their biggest heists, the members of a criminal family come across some shocking revelations.', 'race 3', 2, 'race31.jpeg', 'race32.jpeg', 'fastX3.jpeg', '200', '2023-10-16 10:23:35', 'true'),
(25, 'Black X Widow', 'Natasha Romanoff, a member of the Avengers and a former KGB spy, is forced to confront her dark past when a conspiracy involving her old handler arises.', 'Black X Widow', 2, 'blackXwidow.jpeg', 'blackXwidow2.jpeg', 'blackXwidow3.jpeg', '150', '2023-10-15 02:08:08', 'true'),
(26, 'Ant Man', 'Armed with a super-suit with the astonishing ability to shrink in scale but increase in strength, cat burglar Scott Lang must embrace his inner hero and help his mentor, Dr. Hank Pym, pull off a plan that will save the world', 'Ant Man', 2, 'antMan1.jpeg', 'antMan2.jpeg', 'antMan3.jpeg', '300', '2023-10-15 02:08:11', 'true'),
(29, 'Creed II', 'In 1985, Ivan Drago killed Apollo Creed in a tragic boxing match. Under the guidance of his trainer Rocky, Apollo\'s son Adonis confronts Drago\'s son in an ultimate showdown.', 'creed', 2, 'creed2.jpeg', 'creed1.jpeg', 'creed3.jpeg', '350', '2023-10-16 10:23:48', 'true');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `usersFirstName` varchar(100) NOT NULL,
  `usersLastName` varchar(100) NOT NULL,
  `usersEmail` varchar(100) NOT NULL,
  `usersPhoneNumber` int(10) NOT NULL,
  `usersPassword` varchar(1000) NOT NULL,
  `usersHomeNumber` varchar(20) NOT NULL,
  `usersStreet` varchar(100) NOT NULL,
  `usersCity` varchar(100) NOT NULL,
  `usersCountry` varchar(100) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `role` varchar(20) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `usersFirstName`, `usersLastName`, `usersEmail`, `usersPhoneNumber`, `usersPassword`, `usersHomeNumber`, `usersStreet`, `usersCity`, `usersCountry`, `status`, `role`) VALUES
(12, 'JINAD', 'INDUWIDWA', 'kavith@gmail.com', 1, '$2y$10$px9kF9FLcWd4VWqTBrib/.KtqiBWXRhTvP96aERXv4WnXFEOWi8K6', '1', 'Magakuttiya watta, Krimetimulla', 'matara', 'Sri Lanka', 1, 'user'),
(18, 'Admin', 'Admin', 'admin@Groove.com', 1234567890, '$2y$10$q2ETUr//Z2JM3EOeeyP/V.FNKaY3kYzzNwuBRAKITaBYs06owwhrm', '1', 'Magakuttiya watta, Krimetimulla', 'matara', 'Sri Lanka', 1, 'admin'),
(26, 'JINAD', 'INDUWIDWA', 'JINADINDUWIDWA@GMAIL.COM', 723936744, '$2y$10$vNFhHiNNXsbxP9pCh2RYqO/4xQyE9LQtjh9IU9uQzIn4S5kCQ/mz.', '74/A', 'Magakuttiya watta, Krimetimulla', 'matara', 'Sri Lanka', 1, 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `BuyProduct`
--
ALTER TABLE `BuyProduct`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `FAQ`
--
ALTER TABLE `FAQ`
  ADD PRIMARY KEY (`faqID`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `BuyProduct`
--
ALTER TABLE `BuyProduct`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `FAQ`
--
ALTER TABLE `FAQ`
  MODIFY `faqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `BuyProduct`
--
ALTER TABLE `BuyProduct`
  ADD CONSTRAINT `buyproduct_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `buyproduct_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `Product` (`productId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
