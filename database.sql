--
-- Database: `travelhive`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custUid` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custPwd` varchar(255) NOT NULL,
  `custAge` varchar(3) NOT NULL,
  `custPlace` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custUid`, `custName`, `custEmail`, `custPwd`, `custAge`, `custPlace`) VALUES
(9, '123', 'baby@123.com', '123', '0', 'Malaysia');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelUid` int(11) NOT NULL,
  `hotelName` varchar(255) NOT NULL,
  `hotelEmail` varchar(255) NOT NULL,
  `hotelPwd` varchar(255) NOT NULL,
  `hotelAdd` varchar(255) NOT NULL,
  `hotelDesc` varchar(255) NOT NULL,
  `hotelImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelUid`, `hotelName`, `hotelEmail`, `hotelPwd`, `hotelAdd`, `hotelDesc`, `hotelImage`) VALUES
(2, '123', '123@gmail.com', '123', '123', '123123123', '../uploads/0547536d57505cc0528ad4aba8706ce3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packageId` int(11) DEFAULT NULL,
  `packageName` varchar(255) NOT NULL,
  `packagePrice` double(10,2) NOT NULL,
  `packageDesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`custUid`);

--
-- Indexes for table `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotelUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

-- 
-- Add packageImage for table 'packages'
-- 
ALTER TABLE `packages` 
  ADD `packageImage` VARCHAR(255) NOT NULL AFTER `packageDesc`;