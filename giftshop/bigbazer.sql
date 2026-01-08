-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 10, 2013 at 04:45 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bigbazer`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE `adminmaster` (
  `adminid` int(11) NOT NULL auto_increment,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`adminid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `adminmaster`
--

INSERT INTO `adminmaster` (`adminid`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categorymaster`
--

CREATE TABLE `categorymaster` (
  `categoryid` int(11) NOT NULL auto_increment,
  `categoryname` varchar(255) NOT NULL,
  PRIMARY KEY  (`categoryid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`categoryid`, `categoryname`) VALUES
(2, 'Motherboards'),
(3, 'Desktops'),
(4, 'Laptops & Notebooks'),
(5, 'processors'),
(7, 'watches');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `detailsid` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `quantity` binary(1) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `orderid` int(11) NOT NULL,
  PRIMARY KEY  (`detailsid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detailsid`, `productid`, `quantity`, `rate`, `amount`, `orderid`) VALUES
(1, 1, '2', '200', '400', 1),
(4, 2, '1', '400', '400', 3);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE `ordermaster` (
  `orderid` int(11) NOT NULL auto_increment,
  `orderdate` datetime NOT NULL,
  `membername` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `cardno` varchar(255) NOT NULL,
  `netamount` varchar(255) NOT NULL,
  PRIMARY KEY  (`orderid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`orderid`, `orderdate`, `membername`, `address`, `email`, `mobileno`, `cardno`, `netamount`) VALUES
(1, '2013-04-20 20:53:57', 'aaa', 'ghg', '888', '666', '676', '400'),
(3, '2013-04-21 16:59:44', '', '', '', '', '', '400');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE `productmaster` (
  `productid` int(11) NOT NULL auto_increment,
  `productname` varchar(255) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL,
  PRIMARY KEY  (`productid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`productid`, `productname`, `rate`, `description`, `imagename`, `categoryid`) VALUES
(1, 'Product Name-1', '200', 'With the amalgamation of a highly experienced team of engineers and high end technical automation services, we provide unparalleled automated assembly equipment solutions.', '0014498001363803115.png', 1),
(2, 'Product Name-2', '400', 'With the amalgamation of a highly experienced team of engineers and high end technical automation services, we provide unparalleled automated assembly equipment solutions.', '0465699001363803127.png', 2),
(3, 'Product Name-3', '451', 'With the amalgamation of a highly experienced team of engineers and high end technical automation services, we provide unparalleled automated assembly equipment solutions.', '0338247001363803142.png', 2),
(4, 'Product Name-4', '678', 'With the amalgamation of a highly experienced team of engineers and high end technical automation services, we provide unparalleled automated assembly equipment solutions.', '0110807001363803155.png', 1),
(5, 'Product Name-5', '580', 'With the amalgamation of a highly experienced team of engineers and high end technical automation services, we provide unparalleled automated assembly equipment solutions.', '0225866001363863749.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingmaster`
--

CREATE TABLE `shoppingmaster` (
  `shoppingid` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL,
  PRIMARY KEY  (`shoppingid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `shoppingmaster`
--

