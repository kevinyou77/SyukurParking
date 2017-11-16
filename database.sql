CREATE DATABASE SyukurParking

CREATE TABLE MsCustomer (
	ID INT IDENTITY(1,1) NOT NULL PRIMARY KEY CLUSTERED,
    CustomerID AS 'CS' + RIGHT('00000' + CAST(ID AS VARCHAR(5)), 5) PERSISTED,
	CustomerPassword VARCHAR(50),
	CustomerName VARCHAR(50),
	CustomerAddress VARCHAR(100),
	CustomerPhone VARCHAR(15),
	CustomerValidDate DATETIME,
	CustomerEmail VARCHAR(50),
	CustomerTagID VARCHAR(50),
	CustomerProfilePicture VARCHAR(50),
	CustomerBanStatus VARCHAR(10),
)

TRUNCATE TABLE MsCustomer


ALTER TABLE MsCustomer
ADD CustomerPassword VARCHAR(100)

INSERT INTO MsCustomer(CustomerName, CustomerAddress, CustomerPhone, CustomerEmail)
				VALUES ('Kevin', 'Sukaramai', '08121414', 'ADSFAS@GMAIL.COM')

SELECT * FROM MsCustomer
DROP TABLE MsCustomer

INSERT INTO CustomerEmail, CustomerPassword
VALUES ('a', 'a')

CREATE TABLE MsStaff (
	ID INT IDENTITY(1,1) NOT NULL PRIMARY KEY CLUSTERED,
    StaffID AS 'ST' + RIGHT('00000' + CAST(ID AS VARCHAR(5)), 5) PERSISTED,
	StaffName VARCHAR(30),
	StaffKTP VARCHAR(30),
	StaffAddress VARCHAR(100),
	StaffGender VARCHAR(10),
	StaffDob DATETIME,
	StaffJoinDate DATETIME,
	StaffEmail VARCHAR(50),
	StaffPhone VARCHAR(50),
	StaffPassword VARCHAR(150),
	StaffProfilePicture VARCHAR(100),
	StaffRole VARCHAR(20)
)

SELECT * FROM MsStaff

DROP TABLE MsStaff

CREATE TABLE TrParking (
	ParkingID CHAR(7) PRIMARY KEY
	CHECK (ParkingID LIKE 'PK[0-9][0-9][0-9][0-9][0-9]'),
	LocationID CHAR(5)
	CHECK (LocationID LIKE 'LC[0-9][0-9][0-9]'),
	CustomerID CHAR(7) FOREIGN KEY(CustomerID) REFERENCES MsCustomer(CustomerID),
	In DATETIME,
	Out DATETIME,
	VehicleType VARCHAR(50),
	StaffName VARCHAR(50)
)

CREATE TABLE LtParkingLocation (
	LocationID CHAR(5) FOREIGN KEY (LocationID) REFERENCES TrParking(LocationID) PRIMARY KEY,
	LocationName VARCHAR(50),
	ParkingSpace INT
)

CREATE TABLE TrBookingLocation (
	BookingLocationID CHAR(7) PRIMARY KEY
	CHECK(BookingLocationID LIKE 'BL[0-9][0-9][0-9][0-9][0-9]'),
	LocationID CHAR(5) FOREIGN KEY (LocationID) REFERENCES TrParking(LocationID),
	ParkingRow VARCHAR(20),
	ParkingColumn INT
)

CREATE TABLE TrParkingBooking (
	ParkingBookingID
)