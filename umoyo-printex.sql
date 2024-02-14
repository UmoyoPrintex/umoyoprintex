-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2023 at 05:54 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umoyo-printex`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about_history`
--

CREATE TABLE `tbl_about_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `vision` text NOT NULL,
  `mission` text NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `history_year` year(4) NOT NULL,
  `title` text NOT NULL,
  `description2` text NOT NULL,
  `intro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about_history`
--

INSERT INTO `tbl_about_history` (`id`, `vision`, `mission`, `description`, `image_name`, `history_year`, `title`, `description2`, `intro`) VALUES
(12, 'To Provide the best printing services to our clientele by demonstrating responsiveness, diligence, judgements and building on culture of excellence. In order statisfy our customers.\r\n', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider ', 'Our company core value includes Quality, Client Oriented, Excellence, people leadership', 'About-Name-6068.jpg', 2023, 'Umoyo Printex Establishment', ' Umoyo printex Company Ltd is a building state of the art full service printing company that was established in 2023. it is focused                             on the printing needs of education institution, the corporate sector and geneal public.    ', 'Our company core value includes Quality, Client Oriented, Excellence, people leadership');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(11, 'admin1', 'admin1', 'e00cf25ad42683b3df678c61f42c6bda'),
(12, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `description`, `featured`, `active`) VALUES
(18, 'Branding', 'Service_Category_130.jpg', 'We offer various services at umoyo printex which including, Printing, Graphic Designing, T-shirt branding, Designing of Quotations, Receipt Books, Deleiver Notes, Banners, Posters, Flyers, Business cards, Business Profile, Roll-up banners, Teardrops, Backdrop banners and many more', 'Yes', 'Yes'),
(19, 'Graphic Design', 'Service_Category_695.jpg', 'We offer various services at umoyo printex which including, Printing, Graphic Designing, T-shirt branding, Designing of Quotations, Receipt Books, Deliver Notes, Banners, Posters, Flyers, Business cards, Business Profile, Roll-up banners, Teardrops, Backdrop banners and many more', 'Yes', 'Yes'),
(20, 'Website Design', 'Service_Category_982.jpg', 'We offer Website Designing at Umoyo Printex, We Design both Static Website and Dynamic Website that best suits your business. Static Website is done within seven (7) working days and for the dynamic website it depends with the requirements that are needed.', 'Yes', 'Yes'),
(21, 'Business Cards', 'Service_Category_702.jpg', 'We Design and brand all types of business cards at an affordable price. we print both single sided and double sided.', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `name`, `email`, `phone`, `message`) VALUES
(2, 'Mwaba', 'david@gmail.com', 979760679, 'We work they are of high quality designs.... we offer various products'),
(3, 'Moses Emma', 'moses@gmail.com', 987654324, 'Permanent House, Room 245, Second Floor, Along Cairo Road Lusaka, Zambia.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_coverpage`
--

CREATE TABLE `tbl_coverpage` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_coverpage`
--

INSERT INTO `tbl_coverpage` (`id`, `title`, `description`, `image_name`, `active`) VALUES
(1, 'Build The Future', 'For the Succesful excution of the project, effective planning is enssential. Our team ensure bulding continue to operate', 'Cover Page-6356.jpg', 'Yes'),
(2, ' Professional Team', 'For the successful execution of a project, effective planning is essential. Our team', 'Cover Page-8335.jpg', 'Yes'),
(3, 'Solid Works', ' For the successful execution of a project, effective planning is essential. Our team', 'Cover Page-1303.jpg', 'Yes'),
(5, 'Quality Work', 'We work they are of high quality designs.... we offer various products.', 'Cover Page-7005.jpg', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`id`, `title`, `description`, `image_name`, `category_id`, `featured`, `active`) VALUES
(16, 'BackDrop Design', 'We Design Backdrop for various events, We Design and Print Backdrops for business, functions and many more. With your Ideas we design the backdrop based on your specifications. ', 'Service-Name-9170.jpg', 19, 'Yes', 'Yes'),
(17, 'Banners', 'We Design all types of Banners for various events, We Design and Print Roll-ups banners for business, functions, Birthdays, Wedding and other events With your Ideas we design the pull-up banners based on your specifications. ', 'Service-Name-158.jpg', 18, 'Yes', 'Yes'),
(18, 'Book Branding', 'We Brand Books Covers, for various books, We Design and Print Books. With your Ideas we design the book covers that meets your need. Best cover that defines your book before you even read it. We make it happen.', 'Service-Name-6735.jpg', 19, 'Yes', 'Yes'),
(19, 'Brochure Design', 'We Design Brochures that helps you to advertise your Business easily, Brochure that indicates all the services that your business offers, a brochure that allows people to easily read your services and if interested they can easily contact u. Give us your details and we design the Brochure that best describes your services.', 'Service-Name-7716.jpg', 18, 'Yes', 'Yes'),
(20, 'Business Cards Design', 'We Design Business Cards for Businesses and Individuals, For easy communication between clients, We brand all types of Business cards both Single Sided and Double Sided. We Brand and We Print Business Cards. ', 'Service-Name-63.jpg', 18, 'Yes', 'Yes'),
(21, 'Business Profiles', 'We Design and Print Business Profiles, With your services we design and all types of profile, like construction profiles and many more. Our team design and provide attractive profiles that best represents your business. ', 'Service-Name-672.jpg', 19, 'Yes', 'Yes'),
(22, 'Calendar Design', 'We Design all sizes of calendar, from A3 to Desk Calendar, Customize calendars we design and print. Calendars for school we design. All types of calendars we design.', 'Service-Name-8260.jpg', 19, 'Yes', 'Yes'),
(23, 'Branding Of Capes', 'We Branding all types of capes, We design and print of capes at affordable prices. You provide us with information to be written on the cape and we design and print to meet your need.', 'Service-Name-4090.jpg', 18, 'Yes', 'Yes'),
(24, 'Quotation Printing', 'We design and print Quotations, Receipt Books and Deliver Note. With your information we design and print. Our team design and ensures that they are well printed and numbered ', 'Service-Name-2908.jpg', 18, 'Yes', 'Yes'),
(25, 'Flyer Design', 'We Design Flyers for different events, music events, festivals, Social Media Flyers for business advertisement  and many more. We provide us with information we deliver high quality standard Flyers for your business or events', 'Service-Name-1626.jpg', 19, 'Yes', 'Yes'),
(26, 'T-shirts', 'We Design and Print T-shirts, Corporate T-shirts, Embroidery Printing, Cape printing, Work Suit printing and many other Printing services.', 'Service-Name-8729.jpg', 18, 'Yes', 'Yes'),
(27, 'Pull-Up Banners', 'We Design all types of Pull-up banners, Wall banners, Teardrops and many more. With your information we can design and print you the type of pull-ups, Teardrop or wall banners you need.', 'Service-Name-4237.jpg', 18, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`id`, `name`, `position`, `description`, `image_name`, `active`) VALUES
(16, 'Marvin Simwinga', 'Loan Creditor Officer', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-4466.jpg', 'Yes'),
(17, 'Bwalya Lushinga', 'Secretary', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-8140.jpg', 'Yes'),
(18, 'Mwaba Mwansa', 'Financial Advisor', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-1923.jpg', 'Yes'),
(19, 'Chamanga David', 'Software Dev/ Graphic Design MAnager', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-8703.jpg', 'Yes'),
(20, 'Phillip CHimba', 'Director', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-5888.jpg', 'Yes'),
(21, 'Chismba MWansa', 'CVO', 'We strives to be the highest quality printing company in the country and strives to exceed the expectation of those we partner with by being the best printing service provider', 'Employee-Name-3243.jpg', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about_history`
--
ALTER TABLE `tbl_about_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_coverpage`
--
ALTER TABLE `tbl_coverpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about_history`
--
ALTER TABLE `tbl_about_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_coverpage`
--
ALTER TABLE `tbl_coverpage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
