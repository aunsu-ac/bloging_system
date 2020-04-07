-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2018 at 01:58 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_blog`
--
CREATE DATABASE IF NOT EXISTS `test_blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test_blog`;

-- --------------------------------------------------------

--
-- Table structure for table `a_login`
--

CREATE TABLE `a_login` (
  `a_id` int(11) NOT NULL,
  `a_fname` varchar(255) NOT NULL,
  `a_uname` varchar(255) NOT NULL,
  `a_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_login`
--

INSERT INTO `a_login` (`a_id`, `a_fname`, `a_uname`, `a_pass`) VALUES
(101, 'Aunsu Chandra', 'aunsu28678', 'aunsu28678'),
(102, 'Jhoti Agarwal', 'jhoti', 'jhoti');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `b_sub` varchar(255) NOT NULL,
  `b_content` varchar(255) NOT NULL,
  `b_date` date NOT NULL,
  `b_time` time NOT NULL,
  `a_fname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `b_sub`, `b_content`, `b_date`, `b_time`, `a_fname`) VALUES
(501, 'First test blog', 'this is a test write blog for insert query testing if PHP don\'t call any error and the query is fully executed then the whole data will be uploaded to the MySql database thank u.', '2018-03-26', '09:30:36', 'Aunsu Chandra'),
(502, 'second test blog', 'this is a test write blog for insert query testing if PHP don\'t call any error and the query is fully executed then the whole data will be uploaded to the MySql database thank u.', '2018-03-26', '09:37:08', 'Jhoti Agarwal'),
(505, 'test sub also updated', 'test last blog from mysite thanks to all', '2018-03-31', '06:58:31', 'Aunsu Chandra'),
(506, 'last blog ', 'test this ... code', '2018-03-31', '07:00:05', 'Aunsu Chandra');

-- --------------------------------------------------------

--
-- Table structure for table `comnt`
--

CREATE TABLE `comnt` (
  `c_id` int(11) NOT NULL,
  `c_cont` varchar(255) NOT NULL,
  `b_id` int(11) NOT NULL,
  `u_fname` varchar(255) NOT NULL,
  `c_date` date NOT NULL,
  `c_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comnt`
--

INSERT INTO `comnt` (`c_id`, `c_cont`, `b_id`, `u_fname`, `c_date`, `c_time`) VALUES
(2001, 'waoo new concept thank u sir', 506, 'Aunsu chandra', '2018-04-09', '19:39:13'),
(2002, 'new ', 505, 'Aunsu Chandra', '2018-04-09', '19:40:28'),
(2003, 'new data', 506, 'shilpi chakraborty', '2018-04-09', '20:13:55'),
(2004, 'new frm me', 506, 'Aunsu Chandra', '2018-04-09', '20:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `r_id` int(11) NOT NULL,
  `r_content` varchar(255) NOT NULL,
  `r_date` date NOT NULL,
  `r_time` time NOT NULL,
  `u_fname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`r_id`, `r_content`, `r_date`, `r_time`, `u_fname`) VALUES
(104, 'holo field', '2018-03-31', '14:15:54', 'Aunsu Chandra'),
(108, 'google glass', '2018-03-31', '14:17:19', 'Aunsu Chandra'),
(110, 'adurino', '2018-03-31', '14:29:32', 'Aunsu Chandra'),
(115, 'new blog on PHP', '2018-04-12', '07:22:24', 'shilpi chakraborty'),
(116, 'new req on show fullname', '2018-04-12', '07:24:19', 'shilpi chakraborty'),
(119, 'new design', '2018-04-12', '07:25:52', 'shilpi chakraborty');

-- --------------------------------------------------------

--
-- Table structure for table `u_login`
--

CREATE TABLE `u_login` (
  `u_id` int(11) NOT NULL,
  `u_fname` varchar(255) DEFAULT NULL,
  `u_uname` varchar(255) DEFAULT NULL,
  `u_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `u_login`
--

INSERT INTO `u_login` (`u_id`, `u_fname`, `u_uname`, `u_pass`) VALUES
(1001, 'Aunsu Chandra', 'aunsu28678', 'aunsu28678'),
(1003, 'shilpi chakraborty', 'shilpi1234', 'shilpi1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `a_login`
--
ALTER TABLE `a_login`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `comnt`
--
ALTER TABLE `comnt`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `u_login`
--
ALTER TABLE `u_login`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `a_login`
--
ALTER TABLE `a_login`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
--
-- AUTO_INCREMENT for table `comnt`
--
ALTER TABLE `comnt`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2005;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
--
-- AUTO_INCREMENT for table `u_login`
--
ALTER TABLE `u_login`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1004;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
