-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2021 at 01:32 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture`
--

-- --------------------------------------------------------

--
-- Table structure for table `staffmembers`
--

CREATE TABLE `staffmembers` (
  `stf_id` int(10) NOT NULL,
  `stf_firstname` varchar(90) NOT NULL,
  `stf_lastname` varchar(90) NOT NULL,
  `stf_username` varchar(90) NOT NULL,
  `stf_userrole` varchar(90) NOT NULL,
  `stf_email` varchar(100) NOT NULL,
  `stf_telephone` varchar(20) NOT NULL,
  `stf_password` varchar(40) NOT NULL,
  `stf_address` varchar(90) NOT NULL,
  `stf_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staffmembers`
--

INSERT INTO `staffmembers` (`stf_id`, `stf_firstname`, `stf_lastname`, `stf_username`, `stf_userrole`, `stf_email`, `stf_telephone`, `stf_password`, `stf_address`, `stf_status`) VALUES
(1, 'Egide', 'NKURUNZIZA', 'Egide', 'HOD', 'nkurunziza@gmail.com', '788600900', '1234', 'TUMBA', 1),
(2, 'Kamanzi', 'Innocent', 'Innocent', 'Finance', 'kamanziinno@gmail.com', '785300500', '1234', 'Kigali', 1),
(3, 'NDIKUMANA', 'Regis', 'Regis', 'DM', 'ndikumana@gmail.com', '0785300500', '1234', 'HUYE', 1),
(4, 'Kamana', 'Darius', 'Darius', 'DM', 'darius@gmail.com', '0786593026', '12345', 'GISAGARA', 1),
(5, 'Sibomana', 'Daniel', 'Daniel', 'HOD', 'sibomana@gmail.com', '0786593026', '12345', 'NGOMA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminhr`
--

CREATE TABLE `tbl_adminhr` (
  `hr_id` int(10) NOT NULL,
  `hr_username` varchar(90) NOT NULL,
  `hr_firstname` varchar(90) NOT NULL,
  `hr_lastname` varchar(90) NOT NULL,
  `hr_email` varchar(100) NOT NULL,
  `hr_telephone` int(14) NOT NULL,
  `hr_password` varchar(40) NOT NULL,
  `hr_address` varchar(90) NOT NULL,
  `hr_status` tinyint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_adminhr`
--

INSERT INTO `tbl_adminhr` (`hr_id`, `hr_username`, `hr_firstname`, `hr_lastname`, `hr_email`, `hr_telephone`, `hr_password`, `hr_address`, `hr_status`) VALUES
(1, 'Alexandre', 'Alexandre', 'UWIMANA', 'iprchr@gmail.com', 788884400, '12345', 'TUMBA', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `tbl_categoryId` int(11) NOT NULL,
  `tbl_categoryName` varchar(40) NOT NULL,
  `tbl_categoryPhoto` varchar(120) NOT NULL,
  `tbl_categoryStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`tbl_categoryId`, `tbl_categoryName`, `tbl_categoryPhoto`, `tbl_categoryStatus`) VALUES
(1, 'Large Tables', 'arm chari.jpg', 1),
(2, 'Beds', 'bed.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `tbl_customerId` int(11) NOT NULL,
  `tbl_customerFname` varchar(60) NOT NULL,
  `tbl_customerLname` varchar(60) NOT NULL,
  `tbl_customerEmail` varchar(60) NOT NULL,
  `tbl_customerTel` varchar(12) NOT NULL,
  `tbl_customerAddress` text NOT NULL,
  `tbl_customerUserName` varchar(40) NOT NULL,
  `tbl_customerPass` varchar(120) NOT NULL,
  `tbl_customerStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`tbl_customerId`, `tbl_customerFname`, `tbl_customerLname`, `tbl_customerEmail`, `tbl_customerTel`, `tbl_customerAddress`, `tbl_customerUserName`, `tbl_customerPass`, `tbl_customerStatus`) VALUES
(1, 'Geofrey', 'Ngabo', 'geofrey@gmail.com', '0784557411', 'NGOMA', 'Geofrey', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `tbl_modelId` int(11) NOT NULL,
  `tbl_modelName` varchar(60) NOT NULL,
  `tbl_modelStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`tbl_modelId`, `tbl_modelName`, `tbl_modelStatus`) VALUES
(1, 'Woods', 1),
(2, 'Metal', 1),
(3, 'Mixed', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `tbl_orderId` int(11) NOT NULL,
  `tbl_customerId` int(11) NOT NULL,
  `tbl_productId` int(11) NOT NULL,
  `tbl_orderDate` date NOT NULL,
  `tbl_orderQty` float NOT NULL,
  `tbl_orderAmt` float NOT NULL,
  `tbl_orderStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`tbl_orderId`, `tbl_customerId`, `tbl_productId`, `tbl_orderDate`, `tbl_orderQty`, `tbl_orderAmt`, `tbl_orderStatus`) VALUES
(1, 1, 1, '2021-04-01', 50, 40000, 1),
(2, 1, 2, '2021-04-01', 60, 150, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paid_order`
--

CREATE TABLE `tbl_paid_order` (
  `tbl_paid_orderId` int(11) NOT NULL,
  `tbl_paymentId` int(11) NOT NULL,
  `tbl_orderId` int(11) NOT NULL,
  `tbl_paid_orderSlip` varchar(120) NOT NULL,
  `tbl_paid_orderStatus` tinyint(1) NOT NULL,
  `tbl_paid_orderDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paid_order`
--

INSERT INTO `tbl_paid_order` (`tbl_paid_orderId`, `tbl_paymentId`, `tbl_orderId`, `tbl_paid_orderSlip`, `tbl_paid_orderStatus`, `tbl_paid_orderDate`) VALUES
(1, 3, 1, 'mangoes-chopped-and-fresh.jpg', 0, '2021-04-01'),
(2, 1, 2, 'account.jpg', 0, '2021-04-01'),
(3, 1, 2, 'account.jpg', 0, '2021-04-01'),
(4, 4, 2, 'sweet-potato_1200.jpg', 0, '2021-04-01'),
(5, 4, 2, 'sweet-potato_1200.jpg', 0, '2021-04-01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `tbl_paymentId` int(11) NOT NULL,
  `tbl_paymentMethod` varchar(60) NOT NULL,
  `tbl_paymentStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`tbl_paymentId`, `tbl_paymentMethod`, `tbl_paymentStatus`) VALUES
(1, 'Banking(Equity)', 1),
(2, 'Banking(BK)', 1),
(3, 'Banking(BPR)', 1),
(4, 'Banking(CogeBank)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `tbl_productId` int(11) NOT NULL,
  `tbl_productName` varchar(40) NOT NULL,
  `tbl_productPicture` varchar(120) NOT NULL,
  `tbl_productPrice` float NOT NULL,
  `tbl_categoryId` int(11) NOT NULL,
  `tbl_modelId` int(11) NOT NULL,
  `tbl_productQty` float NOT NULL,
  `tbl_productStatus` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`tbl_productId`, `tbl_productName`, `tbl_productPicture`, `tbl_productPrice`, `tbl_categoryId`, `tbl_modelId`, `tbl_productQty`, `tbl_productStatus`) VALUES
(1, 'Ameza yo mu rugo', 'hometable.PNG', 40000, 1, 1, 29, 1),
(2, 'Dining Tables', 'dining table.jpg', 150, 1, 1, 240, 1),
(3, 'WardRobe', 'office chair.jpg', 50500, 1, 1, 50, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `staffmembers`
--
ALTER TABLE `staffmembers`
  ADD PRIMARY KEY (`stf_id`);

--
-- Indexes for table `tbl_adminhr`
--
ALTER TABLE `tbl_adminhr`
  ADD PRIMARY KEY (`hr_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`tbl_categoryId`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`tbl_customerId`),
  ADD UNIQUE KEY `tbl_customerUserName` (`tbl_customerUserName`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`tbl_modelId`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`tbl_orderId`),
  ADD KEY `tbl_customerId` (`tbl_customerId`),
  ADD KEY `tbl_productId` (`tbl_productId`);

--
-- Indexes for table `tbl_paid_order`
--
ALTER TABLE `tbl_paid_order`
  ADD PRIMARY KEY (`tbl_paid_orderId`),
  ADD KEY `tbl_paymentId` (`tbl_paymentId`),
  ADD KEY `tbl_orderId` (`tbl_orderId`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`tbl_paymentId`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`tbl_productId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `staffmembers`
--
ALTER TABLE `staffmembers`
  MODIFY `stf_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_adminhr`
--
ALTER TABLE `tbl_adminhr`
  MODIFY `hr_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `tbl_categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `tbl_customerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `tbl_modelId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `tbl_orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_paid_order`
--
ALTER TABLE `tbl_paid_order`
  MODIFY `tbl_paid_orderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `tbl_paymentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `tbl_productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
