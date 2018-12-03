-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 05:50 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `minor_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bike_det`
--

CREATE TABLE `bike_det` (
  `id` int(10) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `user` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `mileage` varchar(10) NOT NULL,
  `price` int(10) NOT NULL,
  `availability` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bike_det`
--

INSERT INTO `bike_det` (`id`, `pic`, `user`, `name`, `mileage`, `price`, `availability`) VALUES
(7, '', 'tanucool174@gmail.com', 'Hero honda', '', 0, 1),
(8, '', 'tanucool174@gmail.com', 'kawasaki', '', 0, 1),
(9, '', 'tanucool174@gmail.com', 'yolo', '', 0, 1),
(10, '../images/image_bikes/home_bg_1.jpeg', 'tanucool174@gmail.com', 'splender', '40', 250, 1),
(13, '../images/image_bikes/merge_from_ofoct (1).jpg', 'tanucool174@gmail.com', 'motki', '25', 150, 0);

-- --------------------------------------------------------

--
-- Table structure for table `buyer_register`
--

CREATE TABLE `buyer_register` (
  `ID` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyer_register`
--

INSERT INTO `buyer_register` (`ID`, `name`, `address`, `age`, `gender`, `phone`, `mail`, `password`) VALUES
(3, 'Anubhav Anand', 'HGhag@hs.com', 0, 'female', '2147483647', '', 'abcd'),
(4, 'yatygh', '3sdjhsdh', 65, 'female', '2147483647', 'shghdf@dd.cd', 'abcde'),
(5, 'hero', 'ghdsdb6677', 67, 'male', '2147483647', 'ahgsh@gssh.vo', 'abcde'),
(6, 'Anubhav Anand', 'Karuvally road, Cusat', 20, 'female', '2147483647', 'djfbdj@dfjdkf.vp', 'abcde'),
(7, '$fname', '$address', 0, '$gender', '$phone', '$mail', '$pwd'),
(8, '$fname', '$address', 0, '$gender', '$phone', '$mail', '$pwd'),
(9, '$fname', '$address', 43, '$gender', '38734837', '$mail', '$pwd'),
(12, 'Anubhav Anand', '26/543, MANOPILLY HOUSE, MANOPILLY NAGAR ROAD, BEHIND CUSAT GROUND, NEAR IPC CARMEL CHURCH, COCHIN U', 65, 'female', '8787878556', 'tanucool174@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_buyer`
--

CREATE TABLE `feedback_buyer` (
  `id` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `feedback_renter`
--

CREATE TABLE `feedback_renter` (
  `id` int(10) NOT NULL,
  `user` varchar(30) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `rating` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `image_uploads`
--

CREATE TABLE `image_uploads` (
  `id` int(11) NOT NULL,
  `url` text NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_uploads`
--

INSERT INTO `image_uploads` (`id`, `url`, `user`) VALUES
(3, 'images/WhatsApp Image 2018-09-19 at 1.41.46 AM.jpeg', 'tanucool174@gmail.com'),
(4, 'images/WhatsApp Image 2018-09-19 at 1.41.46 AM.jpeg', 'akshaykumarbarahaiya@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `login_buyer`
--

CREATE TABLE `login_buyer` (
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_buyer`
--

INSERT INTO `login_buyer` (`email`, `password`) VALUES
('tanucool174@gmail.com', 'abcd');

-- --------------------------------------------------------

--
-- Table structure for table `login_renter`
--

CREATE TABLE `login_renter` (
  `email` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login_renter`
--

INSERT INTO `login_renter` (`email`, `password`) VALUES
('akshaykumarbarahaiya@gmail.com', 'abcdef'),
('anand_anubhav@yahoo.in', 'abcde'),
('tanucool174@gmail.com', 'tanuabcd');

-- --------------------------------------------------------

--
-- Table structure for table `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`, `user`) VALUES
(15, 'splender', 'cusat', 9.914685, 76.261436, 'Budget', 'tanucool174@gmail.com'),
(14, 'yolo', 'cochin', 9.932102, 76.258690, 'Premium', 'tanucool174@gmail.com'),
(13, 'kawasaki', 'hdhakj', 9.935484, 76.267273, 'Luxury', 'tanucool174@gmail.com'),
(12, 'Hero honda', 'CUSAT', 10.045041, 76.330948, 'Budget', 'tanucool174@gmail.com'),
(18, 'motki', 'ug', 9.939491, 76.280815, 'Budget', 'tanucool174@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `renter_register`
--

CREATE TABLE `renter_register` (
  `ID` int(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `age` int(10) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `renter_register`
--

INSERT INTO `renter_register` (`ID`, `name`, `address`, `age`, `gender`, `phone`, `mail`, `password`) VALUES
(1, 'fname', '$address', 0, '$gender', '0', '$mail', '$pwd'),
(2, 'Anubhav', 'Karuvally road, Cusat', 23, 'on', '2147483647', 'abc@d.com', 'Abc@1234'),
(3, 'Anubhav', 'Karuvally road, Cusat', 71, 'male', '2147483647', 'abcd@d.com', 'Abc@1234'),
(4, '', 'abcd@ts.com', 23, 'on', '2147483647', '', 'Abcd@1234'),
(5, '', 'abc@hja.vom', 76, 'male', '2147483647', '', 'Abcd@1234'),
(11, 'agsasbn', 'uhdsjdj37678', 76, 'male', '2147483647', 'ahsgah@ds.vdo', 'abcde'),
(12, 'hero kuma', 'jdskjhhud76778u', 7678, 'female', '2147483647', 'ajbh@hdsj.vm', 'abcde'),
(13, 'Anubhav Anand', 'Karuvally road, Cusat', 18544, 'female', '2147483647', 'hsg@hsd.dj', 'abcde'),
(14, '$fname', '$address', 32, '$gender', '2147483647', '$mail', '$pwd'),
(15, 'asahgh', 'sghgw6yg', 72, 'female', '2222222222', 'affg@ds.ss', 'abcde'),
(16, 'hsdhd7', 'shdhsdghggsh', 98, 'female', '9999999993', 'sha@sds.cs', 'abcd'),
(17, 'uyeuhj', '7uhwhjhjk', 76, 'female', 'jhjsdsdsdn', 'gsgh@kds.com', 'abcde'),
(33, 'Anubhav Anand', '26/543, MANOPILLY HOUSE, MANOPILLY NAGAR ROAD, BEHIND CUSAT GROUND, NEAR IPC CARMEL CHURCH, COCHIN U', 67, 'male', '7646567877', 'tanucool174@gmail.com', 'tanuabcd'),
(34, 'Raj kumar', 'Megallium', 55, 'male', '7884048683', 'anand_anubhav@yahoo.in', 'abcde'),
(35, 'Akshay', 'Megallium', 67, 'male', '8743877930', 'akshaykumarbarahaiya@gmail.com', 'abcdef');

-- --------------------------------------------------------

--
-- Table structure for table `verification_buyer`
--

CREATE TABLE `verification_buyer` (
  `ID` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `OTP` varchar(10) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verification_buyer`
--

INSERT INTO `verification_buyer` (`ID`, `email`, `OTP`, `flag`) VALUES
(12, 'tanucool174@gmail.com', '699831', 1);

-- --------------------------------------------------------

--
-- Table structure for table `verification_renter`
--

CREATE TABLE `verification_renter` (
  `ID` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `OTP` varchar(10) NOT NULL,
  `flag` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `verification_renter`
--

INSERT INTO `verification_renter` (`ID`, `email`, `OTP`, `flag`) VALUES
(1, '$email', '000000', 0),
(33, 'tanucool174@gmail.com', '952899', 1),
(34, 'anand_anubhav@yahoo.in', '987644', 1),
(35, 'akshaykumarbarahaiya@gmail.com', '821881', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bike_det`
--
ALTER TABLE `bike_det`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyer_register`
--
ALTER TABLE `buyer_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `feedback_buyer`
--
ALTER TABLE `feedback_buyer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback_renter`
--
ALTER TABLE `feedback_renter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `image_uploads`
--
ALTER TABLE `image_uploads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_renter`
--
ALTER TABLE `login_renter`
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `renter_register`
--
ALTER TABLE `renter_register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `verification_buyer`
--
ALTER TABLE `verification_buyer`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `verification_renter`
--
ALTER TABLE `verification_renter`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bike_det`
--
ALTER TABLE `bike_det`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buyer_register`
--
ALTER TABLE `buyer_register`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `feedback_buyer`
--
ALTER TABLE `feedback_buyer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feedback_renter`
--
ALTER TABLE `feedback_renter`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `image_uploads`
--
ALTER TABLE `image_uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `renter_register`
--
ALTER TABLE `renter_register`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
