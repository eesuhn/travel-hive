-- Table structure for table `customer`

CREATE TABLE `customer` (
    `custUid` int(11) NOT NULL,
    `custName` varchar(255) NOT NULL,
    `custEmail` varchar(255) NOT NULL,
    `custPwd` varchar(255) NOT NULL,
    `custAge` int(2) NOT NULL,
    `custPlace` varchar(255) NOT NULL,
    `custGender` char(1) NOT NULL
)

ALTER TABLE `customer`
    ADD PRIMARY KEY (`custUid`);

ALTER TABLE `customer`
    MODIFY `custUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


-- Table structure for table `hotel`

CREATE TABLE `hotel` (
    `hotelUid` int(11) NOT NULL,
    `hotelName` varchar(255) NOT NULL,
    `hotelEmail` varchar(255) NOT NULL,
    `hotelPwd` varchar(255) NOT NULL,
    `hotelAdd` varchar(255) NOT NULL,
    `hotelDesc` varchar(255) NOT NULL,
    `hotelImage` varchar(255) NOT NULL
)

ALTER TABLE `hotel`
    ADD PRIMARY KEY (`hotelUid`);

ALTER TABLE `hotel`
    MODIFY `hotelUid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;


-- Table structure for table `packages`

CREATE TABLE `packages` (
    `packageId` int(11) NOT NULL,
    `hotelUid` int(11) NOT NULL,
    `packageName` varchar(255) NOT NULL,
    `packagePrice` double(10,2) NOT NULL,
    `packageDesc` varchar(255) NOT NULL,
    `packageImage` varchar(255) NOT NULL
)

ALTER TABLE `packages`
    ADD PRIMARY KEY (`packageId`);

ALTER TABLE `packages`
    MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Add foreign key for table `packages`
ALTER TABLE `packages`
    ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);


-- Table structure for table `reservation`

CREATE TABLE `reservation` (
    `resId` int(11) NOT NULL,
    `checkInDate` date NOT NULL,
    `checkOutDate` date NOT NULL,
    `packageId` int(11) NOT NULL,
    `hotelUid` int(11) NOT NULL,
    `custUid` int(11) NOT NULL
)

ALTER TABLE `reservation`
    ADD PRIMARY KEY (`resId`);

ALTER TABLE `reservation`
    MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Add foreign key for table `reservation`
ALTER TABLE `reservation`
    ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
    ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`),
    ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`custUid`) REFERENCES `customer` (`custUid`);


-- Table structure for table `room`

CREATE TABLE `room` (
    `roomId` int(11) NOT NULL,
    `roomNum` varchar(255) NOT NULL,
    `packageId` int(11) NOT NULL,
    `hotelUid` int(11) NOT NULL
)

ALTER TABLE `room`
    ADD PRIMARY KEY (`roomId`);

ALTER TABLE `room`
    MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Add foreign key for table `room`
ALTER TABLE `room`
    ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
    ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);


-- 10:00, 17th Mar 23'

-- Add roomId to reservation table
ALTER TABLE `reservation`
    ADD `roomId` int(11) NOT NULL AFTER `custUid`;

-- Add foreign key for table `reservation`
ALTER TABLE `reservation`
    ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`);

-- Drop `packageId` and `hotelUid` from reservation table
-- Drop constraint for `packageId` and `hotelUid` from reservation table
ALTER TABLE `reservation`
    DROP FOREIGN KEY `reservation_ibfk_1`,
    DROP FOREIGN KEY `reservation_ibfk_2`;

ALTER TABLE `reservation`
    DROP `packageId`,
    DROP `hotelUid`;
    

-- 11:00, 17th Mar 23'

-- Table structure for table `payment`

CREATE TABLE `payment` (
    `refNo` int(11) NOT NULL,
    `finalPrice` double(10,2) NOT NULL,
    `payMethod` varchar(255) NOT NULL,
    `payStatus` varchar(255) NOT NULL
)

-- Add primary key for table `payment`
ALTER TABLE `payment`
    ADD PRIMARY KEY (`refNo`);

-- Add auto increment for table `payment`
ALTER TABLE `payment`
    MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- Drop constraint packageId from room table
ALTER TABLE `room`
    DROP FOREIGN KEY `room_ibfk_1`;