--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `custUid` int(11) NOT NULL,
  `custName` varchar(255) NOT NULL,
  `custEmail` varchar(255) NOT NULL,
  `custPwd` varchar(255) NOT NULL,
  `custAge` int(2) NOT NULL,
  `custPlace` varchar(255) NOT NULL,
  `custGender` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`custUid`, `custName`, `custEmail`, `custPwd`, `custAge`, `custPlace`, `custGender`) VALUES
(1, 'Eason', 'eason.yihong@gmail.com', '123', 20, 'Malaysia', 'M');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelUid`, `hotelName`, `hotelEmail`, `hotelPwd`, `hotelAdd`, `hotelDesc`, `hotelImage`) VALUES
(1, 'Alila Hotel', 'alila@yahoo.com', '123', 'Jalan Bangsar', 'A place to sleep', '../uploads/df6d06948b77e4c688fdb77246832953.png'),
(2, 'Four Season', '4season@gmail.com', '123', 'Bangsar', 'A place to sleep without bed', '../uploads/a6b95304a691f4b130c2c19d2f3fc94e.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `packageId` int(11) NOT NULL,
  `hotelUid` int(11) NOT NULL,
  `packageName` varchar(255) NOT NULL,
  `packagePrice` double(10,2) NOT NULL,
  `packageDesc` varchar(255) NOT NULL,
  `packageImage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`packageId`, `hotelUid`, `packageName`, `packagePrice`, `packageDesc`, `packageImage`) VALUES
(1, 1, 'Water Suite', 299.00, 'Single bed', '../uploads/2e08fba661d3df29ee3b980d520481c4.png'),
(2, 1, 'Dionne Suite', 69.00, 'no bed', '../uploads/6c4611a5e01466b844c41671d499d0c3.jpg'),
(3, 1, 'Moon Suite', 12.00, 'no toilet', '../uploads/ee749648bea048be2d6f43e84f589122.png'),
(4, 2, 'Test Suite', 123.00, 'No bed sir No bed', '../uploads/e60bb5abc8d36a2b7e826d5dbfa0def6.png');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `resId` int(11) NOT NULL,
  `checkInDate` date NOT NULL,
  `checkOutDate` date NOT NULL,
  `custUid` int(11) NOT NULL,
  `roomId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`resId`, `checkInDate`, `checkOutDate`, `custUid`, `roomId`) VALUES
(1, '2023-03-17', '2023-03-17', 1, 1),
(2, '2023-03-17', '2023-03-17', 1, 2),
(3, '2023-03-17', '2023-03-17', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomId` int(11) NOT NULL,
  `roomNum` varchar(255) NOT NULL,
  `packageId` int(11) NOT NULL,
  `hotelUid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomId`, `roomNum`, `packageId`, `hotelUid`) VALUES
(1, 'A001', 1, 1),
(2, 'A002', 1, 1),
(3, 'A003', 1, 1),
(4, 'B001', 2, 1),
(5, 'A004', 1, 1);

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
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`packageId`),
  ADD KEY `packages_ibfk_1` (`hotelUid`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`resId`),
  ADD KEY `reservation_ibfk_3` (`custUid`),
  ADD KEY `reservation_ibfk_4` (`roomId`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`roomId`),
  ADD KEY `room_ibfk_1` (`packageId`),
  ADD KEY `room_ibfk_2` (`hotelUid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `custUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotel`
--
ALTER TABLE `hotel`
  MODIFY `hotelUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `packages`
--
ALTER TABLE `packages`
  ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`custUid`) REFERENCES `customer` (`custUid`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
  ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);