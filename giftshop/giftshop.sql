-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2016 at 04:02 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `giftshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminmaster`
--

CREATE TABLE IF NOT EXISTS `adminmaster` (
`adminid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
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

CREATE TABLE IF NOT EXISTS `categorymaster` (
`categoryid` int(11) NOT NULL,
  `categoryname` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `categorymaster`
--

INSERT INTO `categorymaster` (`categoryid`, `categoryname`) VALUES
(1, 'Bangles'),
(2, 'Accessories'),
(3, 'Kids'),
(4, 'Watches'),
(5, 'Saaries & Dresses'),
(6, 'Bags'),
(7, 'books');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE IF NOT EXISTS `orderdetails` (
`detailsid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` binary(1) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `orderid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`detailsid`, `productid`, `quantity`, `rate`, `amount`, `orderid`) VALUES
(1, 6, 0x32, '2000', '4000', 1),
(2, 7, 0x31, '1000', '1000', 1),
(3, 8, 0x31, '2500', '2500', 1),
(4, 23, 0x31, '1200', '1200', 2),
(5, 24, 0x31, '500', '500', 2),
(6, 1, 0x31, '500', '500', 3),
(7, 6, 0x31, '2000', '2000', 4),
(8, 1, 0x31, '500', '500', 5),
(9, 7, 0x32, '1000', '2000', 7),
(10, 23, 0x31, '1200', '1200', 7),
(11, 5, 0x32, '800', '1600', 9),
(12, 24, 0x31, '500', '500', 9),
(13, 23, 0x31, '1200', '1200', 9);

-- --------------------------------------------------------

--
-- Table structure for table `ordermaster`
--

CREATE TABLE IF NOT EXISTS `ordermaster` (
`orderid` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `membername` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobileno` varchar(255) NOT NULL,
  `cardno` varchar(255) NOT NULL,
  `netamount` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `ordermaster`
--

INSERT INTO `ordermaster` (`orderid`, `orderdate`, `membername`, `address`, `email`, `mobileno`, `cardno`, `netamount`) VALUES
(1, '2015-10-17 15:17:47', 'Harshad Patil', '10,shivratri soc.,mahatma rd,kailas nagar,Nashik.', 'harshad34@gmail.com', '9356187544', 'gyyuy', '7500'),
(9, '2015-10-18 17:11:46', 'Sarita Raje', 'NAshik', 'sarita45@gmail.com', '9784567811', '', '3300');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `productno` int(11) NOT NULL,
  `product` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `desc` text,
  `imagn` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productno`, `product`, `price`, `desc`, `imagn`) VALUES
(1, 'Diamond Bangles', '500', 'This is gold color bangles.Have water color diamonds.', 'bangle1.jpg'),
(2, 'teddy', '200', 'This is pink color teddy.', 't1.jpg'),
(3, 'Aaliya Bangles', '451', 'This is gold color bangles.Have water color diamonds.', 'Aaliyab.jpg'),
(4, 'Bangle', '600', 'This is silver color bangle have gold color designing. ', 'je3.jpg'),
(5, 'Kanjivaram', '800', 'This saari is orange color have golden color design.', '20.jpeg'),
(6, 'Ring', '2000', 'This is a silver color ring have one diamond itlooks too beautiful.', 'je2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `productmaster`
--

CREATE TABLE IF NOT EXISTS `productmaster` (
`productid` int(11) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `rate` decimal(10,0) NOT NULL,
  `description` text NOT NULL,
  `imagename` varchar(255) NOT NULL,
  `categoryid` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `productmaster`
--

INSERT INTO `productmaster` (`productid`, `productname`, `rate`, `description`, `imagename`, `categoryid`) VALUES
(1, 'Diamond Bangle', '300', 'This is gold color bangles.Have water color diamonds.', 'bangle1.jpg', 1),
(2, 'Pink Teddy', '400', 'This is pink color teddy.', 't1.jpg', 3),
(3, 'Aaliya Bangles', '451', 'This is gold color bangles.Have water color diamonds.', 'Aaliyab.jpg', 1),
(4, 'Bangle', '678', 'This is silver color bangle have gold color designing. ', 'je3.jpg', 1),
(5, 'Kanjivaram', '800', 'This saari is orange color have golden color design.', '20.jpeg', 5),
(6, 'Ring', '2000', 'This is a silver color ring have one diamond itlooks too beautiful.', 'je2.jpg', 2),
(7, 'Neckless', '1000', 'This is the set of earrings,Bindi & chain have white color stone.Red and gold color stone.', 'je5.jpg', 2),
(8, 'Ghagra', '2500', 'This saari is black color with gold color floral printing. ', '6.jpeg', 5),
(22, 'Top', '500', 'A beautiful dress have white color and in that the design yellow color.', 'dr.jpg', 5),
(23, 'watch', '1200', 'The color of this watch is white whith white stone,green stone floral design.', 'w1.jpg', 4),
(24, 'Baby Dress', '500', 'A beautiful dress with light blueish and white colour has blueish tie which for 3 to 5 yrs baby girl. ', 'i5.jpg', 3),
(25, 'Ladies Perse', '550', 'The perse made of lather having a pink colour having a golden colour chain.', 'i4.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingmaster`
--

CREATE TABLE IF NOT EXISTS `shoppingmaster` (
`shoppingid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `sessionid` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `shoppingmaster`
--

INSERT INTO `shoppingmaster` (`shoppingid`, `productid`, `quantity`, `sessionid`) VALUES
(2, 2, 5, 'rbtmhavh2jq90k69hsflglnml6'),
(3, 3, 2, 'rbtmhavh2jq90k69hsflglnml6'),
(4, 4, 1, 'rbtmhavh2jq90k69hsflglnml6'),
(5, 1, 1, 'rbtmhavh2jq90k69hsflglnml6'),
(6, 1, 3, '1i0uc9qjrceq8pmmtjf3scnnt0'),
(7, 4, 3, '1i0uc9qjrceq8pmmtjf3scnnt0'),
(8, 7, 1, '1i0uc9qjrceq8pmmtjf3scnnt0'),
(9, 5, 1, '1i0uc9qjrceq8pmmtjf3scnnt0'),
(10, 2, 1, 'sqm18k0ubn4vdk1ojlgfoj6sq1'),
(11, 3, 1, 'sqm18k0ubn4vdk1ojlgfoj6sq1'),
(12, 6, 1, 'sqm18k0ubn4vdk1ojlgfoj6sq1'),
(13, 5, 1, 'sqm18k0ubn4vdk1ojlgfoj6sq1'),
(14, 9, 1, 'sqm18k0ubn4vdk1ojlgfoj6sq1'),
(15, 1, 1, 'eslp9tbcm59rr0i27c563gu5d5'),
(16, 2, 1, '3tr7qbj2vdt4satjk6a41ohnu4'),
(17, 1, 1, '3tr7qbj2vdt4satjk6a41ohnu4'),
(18, 5, 1, '3tr7qbj2vdt4satjk6a41ohnu4'),
(19, 1, 1, '5v09npbitkejlbn6a1uoclrpj1'),
(20, 2, 1, '5v09npbitkejlbn6a1uoclrpj1'),
(21, 8, 1, '5v09npbitkejlbn6a1uoclrpj1'),
(22, 7, 1, '5v09npbitkejlbn6a1uoclrpj1'),
(30, 1, 1, 'hhpftiuoa0cl409coq9gd7n796'),
(31, 1, 3, 'a7rjli8koff7623d2tp4a91cd4'),
(32, 2, 5, 'a7rjli8koff7623d2tp4a91cd4'),
(35, 4, 2, '30eimj203emgnflqpbm3oi06d1'),
(38, 1, 3, 'k81ppcpp4eb9dcs721brt8nc43'),
(39, 1, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminmaster`
--
ALTER TABLE `adminmaster`
 ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `categorymaster`
--
ALTER TABLE `categorymaster`
 ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
 ADD PRIMARY KEY (`detailsid`);

--
-- Indexes for table `ordermaster`
--
ALTER TABLE `ordermaster`
 ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`productno`);

--
-- Indexes for table `productmaster`
--
ALTER TABLE `productmaster`
 ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `shoppingmaster`
--
ALTER TABLE `shoppingmaster`
 ADD PRIMARY KEY (`shoppingid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminmaster`
--
ALTER TABLE `adminmaster`
MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categorymaster`
--
ALTER TABLE `categorymaster`
MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ordermaster`
--
ALTER TABLE `ordermaster`
MODIFY `orderid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `productmaster`
--
ALTER TABLE `productmaster`
MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `shoppingmaster`
--
ALTER TABLE `shoppingmaster`
MODIFY `shoppingid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
