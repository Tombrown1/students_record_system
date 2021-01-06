-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 06, 2021 at 10:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `students`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(100) DEFAULT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `admin_phone` varchar(20) DEFAULT NULL,
  `gender_id` char(2) DEFAULT NULL,
  `created_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `password`, `admin_phone`, `gender_id`, `created_at`) VALUES
(1, 'Tombrown Godspower', 'godspowertom@yahoo.com', '', '07033391353', '1', '2020-12-03'),
(2, 'Emmanuel Etim', 'e.etim@gmail.com', '', '07024310931', '1', '2020-12-03'),
(3, 'Edikan Etim', 'edikan@yahoo.com', '', '08043280833', '2', '2020-12-17'),
(4, 'Edikan Etim', 'edikan@yahoo.com', '', '08043280833', '2', '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attend_id` int(11) NOT NULL,
  `course_name` varchar(30) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `admin_id` int(11) DEFAULT NULL,
  `arrival_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(30) DEFAULT NULL,
  `std_id` int(11) DEFAULT NULL,
  `duration_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `std_id`, `duration_id`) VALUES
(1, 'Graphics Designs', 10, 1),
(2, 'Graphics Designs', 10, 1),
(3, 'Database Administrator', 25, 2),
(4, 'Programming', 25, 2),
(5, 'Graphics Designs', 32, 2),
(6, 'Database Administrator', 37, 2);

-- --------------------------------------------------------

--
-- Table structure for table `duration`
--

CREATE TABLE `duration` (
  `duration_id` int(11) NOT NULL,
  `duration_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duration`
--

INSERT INTO `duration` (`duration_id`, `duration_name`) VALUES
(1, '5 Weeks'),
(2, '2 Months'),
(3, '3 Months'),
(4, '4 Months'),
(5, '8 Weeks');

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `gender_id` int(11) NOT NULL,
  `gender_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gender`
--

INSERT INTO `gender` (`gender_id`, `gender_name`) VALUES
(1, 'Male'),
(2, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `std_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `duration_id` int(11) DEFAULT NULL,
  `pay_type_id` int(11) DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `std_id`, `course_id`, `duration_id`, `pay_type_id`, `payment_date`, `amount`) VALUES
(1, 20, 8, 2, 2, '2020-12-02', '100000'),
(2, 6, 2, 1, 1, '2020-12-02', '50000'),
(3, 9, 3, 1, 2, '2020-12-02', '50,000'),
(4, 11, 4, 0, 2, '2020-12-02', '50,000'),
(5, 25, 4, 2, 3, '2020-12-05', '100,000'),
(6, 31, 1, 5, 4, '2020-12-06', '50,000'),
(7, 45, 1, 2, 1, '2020-12-31', '100,000'),
(8, 43, 1, 2, 1, '2020-12-31', '100,000');

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE `payment_type` (
  `pay_type_id` int(11) NOT NULL,
  `payment_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_type`
--

INSERT INTO `payment_type` (`pay_type_id`, `payment_type`) VALUES
(1, 'CASH'),
(2, 'TRANSFER'),
(3, 'POS'),
(4, 'CHECK');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `sponsor_id` int(11) NOT NULL,
  `sponsor_name` varchar(30) DEFAULT NULL,
  `std_id` int(11) NOT NULL,
  `relationship` varchar(20) DEFAULT NULL,
  `sponsor_email` varchar(30) DEFAULT NULL,
  `sponsor_phone` varchar(30) DEFAULT NULL,
  `sponsor_address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsor`
--

INSERT INTO `sponsor` (`sponsor_id`, `sponsor_name`, `std_id`, `relationship`, `sponsor_email`, `sponsor_phone`, `sponsor_address`) VALUES
(1, 'Saturday Tombrown', 20, 'Father', 'saturdaytom@gmail.com', '09032452365', 'Ikot Akam Ibesit'),
(2, 'Dick Ezekiel', 22, 'Father', 'dickezekiel@yahoo.com', '09087658654', 'Aya Obio Akpa'),
(3, 'Etim Essien', 25, 'Father', 'etim.essien@yahoo.com', '09032547685', 'Eliozu, Portharcourt'),
(4, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(5, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(6, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(7, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(8, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(9, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(10, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(11, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(12, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(13, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(14, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(15, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(16, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(17, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(18, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State'),
(19, 'Christopher Ezemgbu', 26, 'Guidance', 'c.ezemgbu@gmail.com', '08032140984', 'Enugu State');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `std_id` int(11) NOT NULL,
  `std_name` varchar(50) DEFAULT NULL,
  `std_email` varchar(30) DEFAULT NULL,
  `std_phone` varchar(30) DEFAULT NULL,
  `course_id` int(50) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `sponsor_id` int(11) DEFAULT NULL,
  `duration_id` int(11) DEFAULT NULL,
  `pay_type_id` int(11) DEFAULT NULL,
  `payment_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`std_id`, `std_name`, `std_email`, `std_phone`, `course_id`, `gender_id`, `sponsor_id`, `duration_id`, `pay_type_id`, `payment_id`, `image`) VALUES
(6, 'Charity Ekanem', 'ekanem@yahoo.com', '09043872398', 4, 1, 3, 2, 4, 5, ''),
(9, 'Nkechi Eluwa', 'eluwankechi@gmail.com', '08043240987', 3, 2, 2, 3, 4, 0, ''),
(10, 'Emmanuel Essien', 'emmaessien@yahho.com', '09043240942', 1, 1, 3, 5, 4, 6, ''),
(11, 'Emmanuel Essien etim', 'emmaessien@yahho.com', '09043240942', 1, 1, 3, 1, 2, 8, ''),
(12, 'Anthony Egesie', 'anthonyegesie@gmail.com', '09032449823', 3, 2, 3, 3, 3, 0, ''),
(13, 'Chimezie Emmanuel', 'chimenauel@yahoo.com', '08143263498', 2, 2, 1, 3, 3, 0, ''),
(14, 'Amanze Enac', 'amanze@yahoo.com', '08198355487', 2, 1, 0, 1, 0, 0, ''),
(15, 'Amanze Enac', 'amanze@yahoo.com', '08198355487', 4, 1, 3, 2, 3, 0, ''),
(16, 'Amanze Enac', 'amanze@yahoo.com', '08198355487', 2, 0, 0, 1, 0, 0, ''),
(17, 'Ebenezer Alex', 'ebenezer@yahoo.com', '09034129821', 2, 0, 0, 3, 4, 0, ''),
(20, 'Tombrown Godwin', 'godwintombrown@yahoo.com', '08198355487', 8, 1, 20, 1, 1, 1, ''),
(21, 'Tombrown Godwin Udoka', 'godwintombrown@yahoo.com', '08198355487', 4, 1, 1, 4, 2, 0, ''),
(22, 'David Ezekiel', 'davidezekiel@gmail.com', '09065437687', 1, 1, 1, 1, 0, 0, ''),
(23, 'Anieka Etim', 'aniekan.etim@gmail.com', '08142124284', 1, 0, 2, 1, 4, 0, ''),
(25, 'Rachel Essien', 'rachelessien@gmail.com', '08132549853', 1, 2, 3, 1, 4, 6, ''),
(26, 'Endurance Nkanang', 'nkanang@yahoo.com', '07054327534', 1, 2, 2, 2, 4, 0, ''),
(27, 'Rachel Essien', 'rachelessien@gmail.com', '08132549853', 1, 2, 3, 1, 3, 6, ''),
(28, 'Rachel Essien', 'rachelessien@gmail.com', '08132549853', 3, 1, 2, 2, 1, 5, ''),
(31, 'Amanze Enac', 'amanze@yahoo.com', '09034129821', 2, 1, 3, 1, 1, 4, ''),
(32, 'Chibuike Eluwa', 'chieluwa@gmail.com', '08021349802', 6, 1, 3, 3, 1, 8, ''),
(33, 'Ikenna Zion', 'ikezion@gmail.com', '09102873290', 1, 1, 1, 1, 3, 4, ''),
(34, 'Osilem Endwell', 'eosilem@gmail.com', '07032120932', 4, 1, 6, 4, 2, 5, ''),
(35, 'Ekere Alexander', 'ekere.alex@yahoo.com', '08108327432', 5, 2, 1, 5, 1, 3, '5.jpg'),
(36, 'Edward Nnamdi', 'edward@yahoo.com', '09121983099', 4, 1, 3, 3, 2, 5, '1.jpg'),
(37, 'Ebenezer Alex', 'alex.eben@yahoo.com', '08132149854', 1, 1, 3, 3, 3, 4, '1.jpg'),
(38, 'Israel Akpan', 'akpan.isreal@gmail.com', '08109214984', 5, 1, 2, 5, 2, 5, '2.jpg'),
(39, 'Davido Adeleke', 'davido@gmail.com', '08132843845', 5, 1, 4, 1, 2, 5, '1.jpg'),
(40, 'Chikezie Onuoha', 'chikezie@yahoo.com', '09054329844', 3, 1, 5, 2, 1, 6, '4.jpg'),
(41, 'Sifon Udoudo', 'sifonudo@gmail.com', '08143082844', 1, 2, 4, 5, 1, 6, ''),
(42, 'Ebube Chima', 'ebube@yahoo.com', '09132982343', 4, 1, 5, 4, 1, 5, '1.jpg'),
(43, 'Chika Ike', 'chikaike@gmail.com', '09032120943', 4, 2, 16, 4, 2, 5, '5.jpg'),
(44, 'Austine Ezekiel', 'ezekielaustine@yahoo.com', '07021093298', 1, 1, 2, 1, 1, 7, '1.jpg'),
(46, 'Edidiong Ibanga', 'edidiong@gmail.com', '09032120932', 3, 2, 13, 3, 1, 8, 'inspires.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(41) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`) VALUES
(1, 'Tombrown', 'tom@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(2, 'emma', 'emma@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
(3, 'Achigbo Daniel', 'dan@gmail.com', '12345'),
(4, 'Ebenezer Ukpanah', 'ebenezer@gmail.com', 'password'),
(5, 'Aniekan Etim', 'aniekan.etim@gmail.com', ''),
(6, 'Aniekan Etim', 'aniekan.etim@gmail.com', '12345'),
(7, 'Ebenezer Ukpanah', 'Ebeukpanah@gmial.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attend_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `duration`
--
ALTER TABLE `duration`
  ADD PRIMARY KEY (`duration_id`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`gender_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
  ADD PRIMARY KEY (`pay_type_id`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `duration`
--
ALTER TABLE `duration`
  MODIFY `duration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `gender_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
  MODIFY `pay_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `sponsor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
