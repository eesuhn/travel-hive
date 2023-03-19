CREATE TABLE `customer` (
    `custUid` int(11) NOT NULL,
    `custName` varchar(255) NOT NULL,
    `custEmail` varchar(255) NOT NULL,
    `custPwd` varchar(255) NOT NULL,
    `custAge` int(2) NOT NULL,
    `custPlace` varchar(255) NOT NULL,
    `custGender` char(1) NOT NULL
);

CREATE TABLE `hotel` (
    `hotelUid` int(11) NOT NULL,
    `hotelName` varchar(255) NOT NULL,
    `hotelEmail` varchar(255) NOT NULL,
    `hotelPwd` varchar(255) NOT NULL,
    `hotelAdd` varchar(255) NOT NULL,
    `hotelDesc` varchar(255) NOT NULL,
    `hotelImage` varchar(255) NOT NULL
);

CREATE TABLE `packages` (
    `packageId` int(11) NOT NULL,
    `hotelUid` int(11) NOT NULL,
    `packageName` varchar(255) NOT NULL,
    `packagePrice` double(10,2) NOT NULL,
    `packageDesc` varchar(255) NOT NULL,
    `packageImage` varchar(255) NOT NULL,
    `isDeleted` boolean NOT NULL DEFAULT false
);

CREATE TABLE `room` (
    `roomId` int(11) NOT NULL,
    `roomNum` varchar(255) NOT NULL,
    `packageId` int(11) NOT NULL,
    `hotelUid` int(11) NOT NULL,
    `isDeleted` boolean NOT NULL DEFAULT false
);

CREATE TABLE `reservation` (
    `resId` int(11) NOT NULL,
    `checkInDate` date NOT NULL,
    `checkOutDate` date NOT NULL,
    `custUid` int(11) NOT NULL,
    `roomId` int(11) NOT NULL
);

CREATE TABLE `payment` (
    `refNo` int(11) NOT NULL,
    `finalPrice` double(10,2) NOT NULL,
    `payMethod` varchar(255) NOT NULL,
    `payStatus` varchar(255) NOT NULL
);


-- Add PRIMARY KEY
ALTER TABLE `customer`
    ADD PRIMARY KEY (`custUid`);

ALTER TABLE `hotel`
    ADD PRIMARY KEY (`hotelUid`);

ALTER TABLE `packages`
    ADD PRIMARY KEY (`packageId`);

ALTER TABLE `room`
    ADD PRIMARY KEY (`roomId`);

ALTER TABLE `reservation`
    ADD PRIMARY KEY (`resId`);

ALTER TABLE `payment`
    ADD PRIMARY KEY (`refNo`);


-- Add AUTO_INCREMENT
ALTER TABLE `customer`
    MODIFY `custUid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `hotel`
    MODIFY `hotelUid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `packages`
    MODIFY `packageId` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `room`
    MODIFY `roomId` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `reservation`
    MODIFY `resId` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `payment`
    MODIFY `refNo` int(11) NOT NULL AUTO_INCREMENT;


-- Add FOREIGN KEY
ALTER TABLE `packages`
    ADD CONSTRAINT `packages_ibfk_1` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);

ALTER TABLE `room`
    ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`packageId`) REFERENCES `packages` (`packageId`),
    ADD CONSTRAINT `room_ibfk_2` FOREIGN KEY (`hotelUid`) REFERENCES `hotel` (`hotelUid`);

ALTER TABLE `reservation`
    ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`custUid`) REFERENCES `customer` (`custUid`),
    ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`roomId`) REFERENCES `room` (`roomId`);