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
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


-- 17:55, 13th Mar

-- 
-- Add packageImage for table 'packages'
-- 
ALTER TABLE `packages` 
  ADD `packageImage` VARCHAR(255) NOT NULL AFTER `packageDesc`;

-- 
-- Add hotelUid for table 'packages'
-- 
ALTER TABLE `packages` 
  ADD `hotelUid` INT(11) NOT NULL AFTER `packageId`;

-- 
-- Set foreign key for table 'packages'
-- 
ALTER TABLE `packages`
  ADD CONSTRAINT `hotelUid` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);
