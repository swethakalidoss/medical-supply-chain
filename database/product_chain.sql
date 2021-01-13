-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 14, 2020 at 06:41 AM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `product_chain`
--

-- --------------------------------------------------------

--
-- Table structure for table `sc_admin`
--

CREATE TABLE `sc_admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_admin`
--

INSERT INTO `sc_admin` (`username`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `sc_blockchain`
--

CREATE TABLE `sc_blockchain` (
  `id` int(11) NOT NULL default '0',
  `block_id` int(11) NOT NULL,
  `pre_hash` varchar(200) NOT NULL,
  `hash_value` varchar(200) NOT NULL,
  `sdata` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_blockchain`
--

INSERT INTO `sc_blockchain` (`id`, `block_id`, `pre_hash`, `hash_value`, `sdata`) VALUES
(1, 1, '00000000000000000000000000000000', '39635c8c47dca2994d00106c72104b60', '14-03-2020,Company:Company1,Manufacture:12-01-2020,Expiry:12-04-2020,Location:Chennai'),
(2, 1, '39635c8c47dca2994d00106c72104b60', 'cdb0608ad4dcc973f60f9490690872e3', '14-03-2020,Transfer:Tata AC-SS Travel,TN 4521,Location:Tambaram'),
(3, 1, 'cdb0608ad4dcc973f60f9490690872e3', 'ba4ece91113a53f4d83b267858e0dfe7', '--,Supplier:supplier1,Location:,Transport:Tata AC-'),
(4, 1, 'ba4ece91113a53f4d83b267858e0dfe7', '5ac46ce21f580f3454abff71a89d8e67', '14-03-2020,Supplier:supplier1,Location:Chennai,Transport:Tata AC-MM Travel,TN 2245');

-- --------------------------------------------------------

--
-- Table structure for table `sc_cart`
--

CREATE TABLE `sc_cart` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `shop` varchar(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `amount` double NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `sc_category`
--

CREATE TABLE `sc_category` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  UNIQUE KEY `category` (`category`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_category`
--

INSERT INTO `sc_category` (`id`, `category`) VALUES
(3, 'Drops'),
(2, 'Injection'),
(4, 'Ointment'),
(5, 'Syrup'),
(1, 'Tablet');

-- --------------------------------------------------------

--
-- Table structure for table `sc_company`
--

CREATE TABLE `sc_company` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_company`
--

INSERT INTO `sc_company` (`id`, `name`, `address`, `mobile`, `email`, `uname`, `pass`, `rdate`) VALUES
(1, 'Company1', 'Chennai', 9012388432, 'medcom@gmail.com', 'company1', '1234', '22-01-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sc_customer`
--

CREATE TABLE `sc_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `otp` varchar(20) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_customer`
--

INSERT INTO `sc_customer` (`id`, `name`, `address`, `mobile`, `email`, `uname`, `pass`, `otp`, `rdate`) VALUES
(1, 'Murugan', 'Trichy', 9912355321, 'murugan@gmail.com', 'murugan', '1234', '6930', '07-12-2019'),
(2, 'Dinesh', '33,Chennai', 9012388432, 'dinesh@gmail.com', 'dinesh', '1234', '', '8-3-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sc_product`
--

CREATE TABLE `sc_product` (
  `id` int(11) NOT NULL default '0',
  `category` varchar(30) NOT NULL,
  `product` varchar(40) NOT NULL,
  `company` varchar(20) NOT NULL,
  `price` double NOT NULL,
  `psize` varchar(20) NOT NULL default '-',
  `kg` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `location` varchar(50) NOT NULL,
  `mdate` varchar(15) NOT NULL default '-',
  `edate` varchar(15) NOT NULL default '-',
  `pcode` varchar(20) NOT NULL default '-',
  `rdate` varchar(15) NOT NULL default '-',
  `ttype` varchar(20) NOT NULL default '-',
  `transport` varchar(50) NOT NULL default '-',
  `tlocation` varchar(30) NOT NULL default '-',
  `tdate` varchar(15) NOT NULL default '-',
  `supplier` varchar(20) NOT NULL default '-',
  `retailer` varchar(20) NOT NULL default '-',
  `customer` varchar(20) NOT NULL default '-',
  `slocation` varchar(50) NOT NULL default '-',
  `sdate` varchar(15) NOT NULL default '-',
  `exp_st` int(11) NOT NULL default '0',
  `status` int(11) NOT NULL default '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_product`
--

INSERT INTO `sc_product` (`id`, `category`, `product`, `company`, `price`, `psize`, `kg`, `description`, `location`, `mdate`, `edate`, `pcode`, `rdate`, `ttype`, `transport`, `tlocation`, `tdate`, `supplier`, `retailer`, `customer`, `slocation`, `sdate`, `exp_st`, `status`) VALUES
(1, 'Drops', 'abcd', 'company1', 250, '200', 'Gram', 'medicine', 'Chennai', '12-01-2020', '12-04-2020', '0002637669', '14-03-2020', 'Tata AC', 'MM Travel,TN 2245', 'Tambaram', '14-03-2020', 'supplier1', '-', '-', 'Chennai', '14-03-2020', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sc_purchase`
--

CREATE TABLE `sc_purchase` (
  `id` int(11) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `shop` varchar(20) NOT NULL,
  `amount` double NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_purchase`
--

INSERT INTO `sc_purchase` (`id`, `uname`, `shop`, `amount`, `rdate`) VALUES
(1, 'murugan', 'shop1', 20, '09-12-2019'),
(2, 'murugan', 'shop1', 20, '02-01-2020');

-- --------------------------------------------------------

--
-- Table structure for table `sc_shop`
--

CREATE TABLE `sc_shop` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_shop`
--

INSERT INTO `sc_shop` (`id`, `name`, `address`, `mobile`, `email`, `uname`, `pass`, `rdate`) VALUES
(1, 'Krishna Store', '434,Trichy', 9125437893, 'shop@gmail.com', 'shop1', '1234', '07-12-2019');

-- --------------------------------------------------------

--
-- Table structure for table `sc_supplier`
--

CREATE TABLE `sc_supplier` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(40) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_supplier`
--

INSERT INTO `sc_supplier` (`id`, `name`, `address`, `mobile`, `email`, `uname`, `pass`, `rdate`) VALUES
(1, 'Raja', 'Trichy', 9012377511, 'supplier@gmail.com', 'supplier1', '1234', '07-12-2019');

-- --------------------------------------------------------

--
-- Table structure for table `sc_user`
--

CREATE TABLE `sc_user` (
  `id` int(11) NOT NULL,
  `utype` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `uname` varchar(20) NOT NULL,
  `pbkey` varchar(20) NOT NULL,
  `prkey` varchar(20) NOT NULL,
  `status` int(11) NOT NULL,
  `rdate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sc_user`
--

INSERT INTO `sc_user` (`id`, `utype`, `name`, `address`, `mobile`, `email`, `uname`, `pbkey`, `prkey`, `status`, `rdate`) VALUES
(1, 'Manufacturer', 'company1', 'Chennai', 9012388432, 'raj@gmail.com', 'U1', 'f89412c1', '1bdc0ab4', 1, '04-02-2020'),
(2, 'Manufacturer', 'Raj', '11,trichy', 9012388432, 'raj@gmail.com', 'U2', '46848214', '48f0ae24', 0, '05-02-2020'),
(3, 'Manufacturer', 'Raj', '11,trichy', 9976570006, 'raj@gmail.com', 'U3', 'c9603758', '66797bcd', 1, '23-2-2020');
