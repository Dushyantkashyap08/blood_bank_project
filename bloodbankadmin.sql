-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2023 at 12:22 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bloodbankadmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `Id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`Id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', 'admin@123'),
(2, 'karan@gmail.com', 'karan');

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL,
  `bankname` varchar(200) NOT NULL,
  `contact` int(11) NOT NULL,
  `city` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `bankname`, `contact`, `city`, `status`) VALUES
(1, 'Red Cross Society', 2147483647, 'Mohali', 'Active'),
(2, 'Fortis blood bank', 2147483647, 'Mumbai', 'Inactive'),
(3, 'Arpan blood bank', 2147483647, 'Chandigarh', 'Active'),
(4, 'Ashirwad blood bank', 2147483647, 'Jalandhar', 'Inactive'),
(5, 'Borivali blood bank', 2147483647, 'Indore', 'Inactive'),
(6, 'G.T. hospital blood ', 934784897, 'Raipur', 'Active'),
(7, 'Kem hospital blood bank', 2147483647, 'Udaipur', 'Active'),
(8, 'Naira hospital blood bank', 2147483647, 'ahemadgarh', 'Inactive'),
(9, 'red ray hope', 123456789, 'jodhpur', 'activa'),
(10, 'lifeline blood bank', 123456789, 'amritsar', 'inactive'),
(11, 'carefront blood bank', 123456789, 'raipur', 'active'),
(12, 'amrit blood bank', 123456789, 'solapur', 'active'),
(13, 'gooddeed blood bank', 2147483647, 'kolkata', 'active'),
(14, 'mariyam blood bank', 2147483647, 'nagpur', 'inactive'),
(15, 'anjana blood bank', 2147483647, 'bhubaneshwar', 'active'),
(16, 'ABC blood bank', 2147483647, 'bengaluru', 'active'),
(17, 'XYZ blood bank', 2147483647, 'chennai', 'inactive'),
(18, 'your blood bank', 123456789, 'goa', 'active'),
(19, 'red society blood bank', 2147483647, 'delhi', 'active'),
(20, 'helping hands blood bank', 2147483647, 'agra', 'active'),
(21, 'charitable blood bank', 2147483647, 'muzzafarnagar', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `blooddetails`
--

CREATE TABLE `blooddetails` (
  `id` int(11) NOT NULL,
  `bloodgroup` varchar(20) NOT NULL,
  `quantity` varchar(11) NOT NULL,
  `expirydate` varchar(11) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blooddetails`
--

INSERT INTO `blooddetails` (`id`, `bloodgroup`, `quantity`, `expirydate`, `status`) VALUES
(1, 'A+', '60L', '20Aug,2023', 'In stock'),
(2, 'AB-', '80L', '14oct,2023', 'in stock'),
(3, 'A-', '180L', '17july,2023', 'donated'),
(4, 'B+', '150L', '22dec,2023', 'in stock'),
(5, 'A+', '125L', '16nov,2023', 'in stock'),
(6, 'B+', '130L', '16feb,2023', 'donated'),
(7, 'O-', '80L', '27may,2023', 'donated'),
(8, 'B-', '80L', '11 oct,2023', 'in stock'),
(9, 'AB+', '150L', '7may,2023', 'donated'),
(10, 'O+', '50L', '23nov,2023', 'in stock'),
(11, 'AB-', '120L', '9sept,2023', 'in stock');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` int(11) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`Id`, `name`, `email`, `contact`, `message`) VALUES
(1, 'john', 'John@gmail.com', 123456789, 'hi this is john !'),
(2, 'manish', 'manish@gmail.com', 123456789, 'hi! I need blood urgently'),
(3, 'raj', 'raj@gmail.com', 123456789, 'hi! I need blood urgently'),
(4, 'aman', 'aman@gmail.com', 123456789, 'hi! I want to donate blood '),
(5, 'harshit', 'harshit@gmail.com', 123456789, 'hi! I need blood urgently'),
(6, 'rohit', 'rohit@gmail.com', 123456789, 'hi! I want to donate blood '),
(7, 'rohan', 'rohan@gmail.com', 123456789, 'hi! I need blood urgently'),
(8, 'sonam', 'sonam@gmail.com', 123456789, 'hi! I need blood urgently'),
(9, 'nishant', 'nishant@gmail.com', 123456789, 'hi! I want to donate blood '),
(10, 'nisha', 'nisha@gmail.com', 123456789, 'hi! I need blood urgently '),
(11, 'isha', 'isha@gmail.com', 123456789, 'hi! I want to donate blood ');

-- --------------------------------------------------------

--
-- Table structure for table `donorform`
--

CREATE TABLE `donorform` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `donorform`
--

INSERT INTO `donorform` (`Id`, `name`, `age`, `mobile`, `bloodgroup`, `city`) VALUES
(1, 'Keshav', 22, 123456789, 'O+', 'Ludhiana'),
(2, 'Himanshu', 22, 2147483647, 'A+', 'Amritsar'),
(3, 'Sushil', 35, 123456789, 'B+', 'Kapurthala'),
(4, 'Jasmine', 28, 123456789, 'A-', 'Pune'),
(5, 'Jatin', 24, 123456789, 'Ab-', 'Palampur'),
(6, 'karan', 28, 123456789, 'O+', 'Ahemdabad'),
(7, 'harman', 28, 123456789, 'A-', 'Hydrabad'),
(8, 'raj', 28, 123456789, 'A+', 'Mysore'),
(9, 'john', 45, 123456789, 'AB+', 'Mumbai'),
(19, 'suman', 35, 123456789, 'A+', 'kolkata'),
(20, 'saurav', 40, 123456789, 'B+', 'bengaluru'),
(21, 'gaurav', 24, 123456789, 'AB+', 'chennai'),
(22, 'himani', 28, 123456789, 'O+', 'delhi'),
(23, 'kanika', 30, 123456789, 'B-', 'ludhiana'),
(24, 'kanan', 25, 123456789, 'AB-', 'mumbai');

-- --------------------------------------------------------

--
-- Table structure for table `requestform`
--

CREATE TABLE `requestform` (
  `Id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `mobile` int(11) NOT NULL,
  `bloodgroup` varchar(255) NOT NULL,
  `units` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requestform`
--

INSERT INTO `requestform` (`Id`, `name`, `age`, `mobile`, `bloodgroup`, `units`) VALUES
(1, 'John Abrahm', 28, 21474836, 'AB-', 2),
(2, 'sunil', 37, 2147483647, 'B-', 3),
(3, 'sumit', 23, 2147483647, 'AB-', 4),
(4, 'tejas', 43, 2147483647, 'B+', 1),
(5, 'amren', 27, 2147483647, 'A-', 2),
(6, 'rakesh', 41, 2147483647, 'O-', 3),
(7, 'ajit', 54, 2147483647, 'O+', 1),
(8, 'keshav', 31, 2147483647, 'b+', 3),
(9, 'sumit', 38, 2147483647, 'A-', 2),
(10, 'jatin', 45, 2147483647, 'AB+', 3),
(14, 'sunil', 37, 2147483647, 'B-', 3),
(26, 'tanuj', 25, 2147483647, 'B+', 2),
(27, 'vikas', 26, 2147483647, 'AB+', 4),
(28, 'sunita', 35, 2147483647, 'B-', 3),
(29, 'tanush', 28, 2147483647, 'O+', 2),
(30, 'ajay', 30, 2147483647, 'AB-', 3),
(31, 'ashu', 27, 2147483647, 'A-', 4),
(32, 'raju', 23, 2147483647, 'O-', 2),
(33, 'vikky', 39, 2147483647, 'AB+', 1),
(34, 'satish', 33, 2147483647, 'B+', 3),
(35, 'gaurav', 29, 2147483647, 'A+', 3),
(36, 'jatin', 40, 2147483647, 'O+', 4),
(37, 'tanzeel', 34, 2147483647, 'B-', 1),
(38, 'sujal', 25, 2147483647, 'AB+', 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Id`, `fullname`, `email`, `password`) VALUES
(1, 'dushyant', 'dknov2000@gmail.com', '12345'),
(2, 'himanshu', 'himanshu@gmail.com', '12345'),
(3, 'bhomik', 'bhomik@gmail.com', '12345'),
(4, 'harsh', 'harsh@gmail.com', '12345'),
(5, 'harbans', 'harbans@gmail.com', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blooddetails`
--
ALTER TABLE `blooddetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `donorform`
--
ALTER TABLE `donorform`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `requestform`
--
ALTER TABLE `requestform`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `blooddetails`
--
ALTER TABLE `blooddetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `donorform`
--
ALTER TABLE `donorform`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `requestform`
--
ALTER TABLE `requestform`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
