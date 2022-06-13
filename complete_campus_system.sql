-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 04:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `complete_campus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `temp_user_tbl`
--

CREATE TABLE `temp_user_tbl` (
  `id` int(10) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `nic_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `payment` int(10) NOT NULL,
  `pay_date` date NOT NULL,
  `tp_no` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `temp_user_tbl`
--

INSERT INTO `temp_user_tbl` (`id`, `std_name`, `nic_no`, `email`, `faculty`, `payment`, `pay_date`, `tp_no`) VALUES
(1, 'Kamal', '200105101033', 'ictisgood123@gmail.com', 'IT', 50000, '2022-06-13', '+94 711758851');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` char(30) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `name_with_latters` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `add1` varchar(255) NOT NULL,
  `add2` varchar(255) NOT NULL,
  `add3` varchar(255) NOT NULL,
  `tp_no` varchar(20) NOT NULL,
  `faculty` varchar(25) NOT NULL,
  `roll` varchar(20) NOT NULL,
  `user_status` int(1) NOT NULL,
  `enroll_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `full_name`, `name_with_latters`, `fname`, `lname`, `email`, `pass`, `add1`, `add2`, `add3`, `tp_no`, `faculty`, `roll`, `user_status`, `enroll_date`) VALUES
('200105101033', '', '', '', '', 'ictisgood123@gmail.com', '1f9192dece215fd36826088652886231', '', '', '', '', 'IT', 'student', 1, '2022-06-13'),
('admin1', 'Admin Admin', 'A.Admin', 'Admin', 'Admin Last', 'jehankandysl@gmail.com', '250cf8b51c773f3f8dc8b4be867a9a02', 'Kandy', 'Katugastota', 'Sri Lanka', '+94 711758851', 'IT', 'admin', 1, '2022-06-13'),
('staff1', 'Staff Staff', 'S.Staff', 'Staff', 'Staff Last', 'learnkandy123@gmail.com', '68053af2923e00204c3ca7c6a3150cf7', 'Kandy', 'Katugastota', 'Sri Lanka', '+94 714881276', 'IT', 'staff', 1, '2022-06-13'),
('teacher1', 'Teacher Teacher Teacher ', 'T.T.Teacher', 'Teacher', 'Teacher Last', 'mkmegodagama@gmail.com', '202cb962ac59075b964b07152d234b70', 'Kandy', 'Katugastota', 'Sri Lanka', '+94 714881276', 'IT', 'teacher', 1, '2022-06-13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temp_user_tbl`
--
ALTER TABLE `temp_user_tbl`
  ADD PRIMARY KEY (`id`,`nic_no`,`email`,`faculty`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`,`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temp_user_tbl`
--
ALTER TABLE `temp_user_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
