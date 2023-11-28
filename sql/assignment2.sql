-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 28, 2023 at 07:31 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assignment2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankaccount_database`
--

DROP TABLE IF EXISTS `bankaccount_database`;
CREATE TABLE IF NOT EXISTS `bankaccount_database` (
  `Title` varchar(10) NOT NULL,
  `fname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `DOB` date NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Government_ID` varchar(100) NOT NULL,
  `Phone_Number` varchar(15) NOT NULL,
  `Employment_Status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Account_Type` varchar(30) NOT NULL,
  `Annual_Income` varchar(50) NOT NULL,
  `Mailing_Address` varchar(255) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  PRIMARY KEY (`Government_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bankaccount_database`
--

INSERT INTO `bankaccount_database` (`Title`, `fname`, `lname`, `DOB`, `Email`, `Government_ID`, `Phone_Number`, `Employment_Status`, `Account_Type`, `Annual_Income`, `Mailing_Address`, `Username`, `Password`) VALUES
('Mr.', 'Yuvraj', 'Jindal', '2004-10-18', 'jindalyuvraj4@gmail.com', 'J4466-79000-41018', '905-537-0601', 'Student', 'Savings', '$22000', '78 SELKIRK AVE, Hamilton, ON', 'yuvraj455', '83cc31d5fcb7cd9cfcd04ab41151685a06a5ca84eaa9cf614b38777d1773c6c4b812e7355dc92260f0ce0d4b87aa385e9e661bd253710ff7ea0079ea08cb5b29'),
('Ms.', 'Payal', 'Aggarwal', '2001-10-01', 'paggarwal17155@gmail.com', 'J4578-83749-11001', '236-513-0121', 'Government Official', 'Savings', '$60000', '146 Sheridan Street, Brantford, ON', 'payal0121', '59917b616eade0a9151785fd6f7dc8326cbadcc95caaeed3b92d337e2db770b0a01b81b3232b7a512a0b0531b1d40b745b1fcb223d53fedf5c2069f3db119754'),
('Mrs.', 'Monika', 'Aggarwal', '1977-12-27', 'monika11@gmail.com', 'Q6547-78348-77227', '700-982-7155', 'Self-Employed', 'Savings', '$99000', '52 Woodward Ave, Hamilton, ON', 'monika921', '302c32888575612f47a231582b27c6324019d27bd1048f5e7351d4137aa77620fac32d2c998b198680c0ca80d08a2a8d436ddb05103695979acc8b52c3e66b26'),
('Mr.', 'Arun', 'Bansal', '1995-06-07', 'bansal67@gmail.com', 'R7848-82433-30602', '941-764-7455', 'Government Official', 'Current', '$56700', '10 Hillyard St, Milton, ON', 'bansal670', 'af4dc14d60efa2ba71a3e330ac0dfc63420def89817130858cb74c2d5883824cc8d5c1a5e019e7e71522ae8c3e6f0492e9071cea68f25727d77e6939ac9df7ba'),
('Ms.', 'Malaika', 'Garg', '1999-10-12', 'garg783@gmail.com', 'D7347-98353-87113', '987-201-8291', 'Student', 'Savings', '$25000', '11 Queenston Rd, Windsor, ON', 'malaika489', '7e80b87ada490b8299eeb5d7a5de6799f57412ad5e95df29d21fa70b59db1c2bc4f4cb55d46a04dc0e65be39bfc636c7f26965e6c89799ee597846b53f3c71d7'),
('Mr.', 'Puneet', 'Gupta', '2007-07-13', 'puneet5455@gmail.com', 'J8763-54838-10615', '984-210-0455', 'Self-Employed', 'Current', '$120000', '47 Fleetwood Crescent, Brampton, ON', 'puneet5455', '47bdbb92c6fcf03c4dadb0a6e8184f2ff689be162d8dc1c2fba3a19d89f29057d789af6d2e2087d8dd8eacc910ef35610a40b9b10105bf174f9213f4ef8b9cad'),
('Ms.', 'Krishna', 'Singla', '1985-01-01', 'krishna56@gmail.com', 'J9469-58483-65328', '814-635-7555', 'Employed', 'Current', '$65000', '425 Bloor St. E, Toronto, ON', 'krishna123', 'e6a3dd6e68118f74cc2ae74adde6f0e77f356b03666943ef2a7fefa1e2a205da24f071fa4e32136d9b79a89f75859334f827041097c44540b874894848921278'),
('Mrs.', 'Rajshree', 'Khanna', '1997-05-14', 'khanna@gmail.com', 'T8933-84975-85228', '987-262-1913', 'Government Official', 'Savings', '$84387', '78 Earsdale Ave, North York, ON', 'khanna1985', 'e7424da388c9494cc59f1261c87d5839d60341f4851761af22c55e1dc03989f0885f538f2a343ed1988536295f774abcbab3fbd6700ddf4631a492e4b69d6524');

-- --------------------------------------------------------

--
-- Table structure for table `profile_picture`
--

DROP TABLE IF EXISTS `profile_picture`;
CREATE TABLE IF NOT EXISTS `profile_picture` (
  `Government_ID` varchar(100) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`Government_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `profile_picture`
--

INSERT INTO `profile_picture` (`Government_ID`, `Name`, `Image_path`) VALUES
('Q6547-78348-77227', 'Monika.jpg', 'Uploaded_pictures/Monika.jpg'),
('J8763-54838-10615', 'Puneet.jpg', 'Uploaded_pictures/Puneet.jpg'),
('J9469-58483-65328', 'Krishna.png', 'Uploaded_pictures/Krishna.png'),
('J4578-83749-11001', 'Payal.jpg', 'Uploaded_pictures/Payal.jpg'),
('J4466-79000-41018', 'Yuvraj.jpg', 'Uploaded_pictures/Yuvraj.jpg'),
('R7848-82433-30602', 'Arun.jpg', 'Uploaded_pictures/Arun.jpg'),
('D7347-98353-87113', 'Malaika.jpg', 'Uploaded_pictures/Malaika.jpg'),
('T8933-84975-85228', 'Rajshree.jpeg', 'Uploaded_pictures/Rajshree.jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
