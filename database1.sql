Junita
1. Photo Spelling (Stalled)
2. Spelling Pong
3. Chain game
4. Ready Spaghetti
5. Bubble

Dicky
1. Pop Madness -> Injek injek balon, setiap balon ada kata (nomor)
2. Invinsible Man
3. Dont Drop the Egg
4. Roulette (Stalled)
5. Chubby Bunny (Stalled)

Kevin
1. Dodgeball
2. Hangman -> Participants have to eat before guessing
3. Get it off my face 


CREATE DATABASE SyukurParking

SELECT * FROM MsCustomer
SELECT * FROM MsStaff
SELECT * FROM LtParkingLocation
SELECT * FROM TrParking

DROP TABLE MsCustomer
DROP TABLE MsStaff
DROP TABLE LtParkingLocation
DROP TABLE TrParking

CREATE TABLE MsCustomer (
	ID INT IDENTITY(1,1) NOT NULL,
    CustomerID AS 'CS' + CAST(ID AS VARCHAR(30)) PERSISTED,
	CustomerPassword VARCHAR(50),
	CustomerName VARCHAR(50),
	CustomerAddress VARCHAR(100),
	CustomerPhone VARCHAR(15),
	CustomerValidDate DATETIME,
	CustomerEmail VARCHAR(50) PRIMARY KEY,
	CustomerTagID VARCHAR(50),
	CustomerProfilePicture VARCHAR(50),
	CustomerBanStatus VARCHAR(10),
)

CREATE TABLE MsStaff (
	ID INT IDENTITY(1,1),
	StaffID AS 'ST' + CAST(ID AS VARCHAR(30)) PERSISTED,
	StaffName VARCHAR(30),
	StaffKTP VARCHAR(30),
	StaffAddress VARCHAR(100),
	StaffGender VARCHAR(10),
	StaffDob DATETIME,
	StaffJoinDate DATETIME,
	StaffEmail VARCHAR(50) NOT NULL PRIMARY KEY,
	StaffPhone VARCHAR(50),
	StaffPassword VARCHAR(150),
	StaffProfilePicture VARCHAR(100),
	StaffRole VARCHAR(20)
)

CREATE TABLE LtParkingLocation (
	ID INT IDENTITY(1,1) PRIMARY KEY,
	LocationID AS 'LC' + CAST(ID AS VARCHAR(30)) PERSISTED,
	LocationName VARCHAR(50),
	ParkingSpace INT
)

INSERT INTO LtParkingLocation (LocationName, ParkingSpace)
VALUES ('NEO SOHO', 500)

INSERT INTO LtParkingLocation (LocationName, ParkingSpace)
VALUES ('Binus Syahdan', 500)

CREATE TABLE TrParking (
	ID INT IDENTITY(1,1),
	ParkingID VARCHAR(50) NOT NULL PRIMARY KEY,
	CustomerEmail VARCHAR(50) REFERENCES MsCustomer(CustomerEmail),
	StaffEmail VARCHAR(50) REFERENCES MsStaff(StaffEmail),
	LocationID INT REFERENCES LtParkingLocation(ID),
	InTime DATETIME,
	OutTime DATETIME,
	VehicleType VARCHAR(50),
	StaffName VARCHAR(50)
)

CREATE TABLE TrBookingLocation (
	ID INT IDENTITY(1,1),
	BookingLocatonID AS 'BLC' + CAST(ID AS VARCHAR(30)) PERSISTED,
	LocationID INT REFERENCES LtParkingLocation(ID),
	ParkingLocation VARCHAR(50),
	Taken INT,
	PRIMARY KEY(ID, ParkingLocation) 
)

SELECT * FROM LtParkingLocation
SELECT * FROM TrParking
SELECT * FROM TrBookingLocation
INSERT INTO TrBookingLocation (LocationID, ParkingLocation, Taken)
VALUES  ('1', 'A1', 0)

SELECT a.LocationID, b.LocationName
FROM TrBookingLocation a
INNER JOIN LtParkingLocation b
ON a.LocationID = b.ID

DROP TABLE TrBookingLocation

DROP TABLE Roles

TRUNCATE TABLE MsCustomer
DROP TABLE MsCustomer


ALTER TABLE MsCustomer
ADD CustomerPassword VARCHAR(100)

INSERT INTO MsCustomer(CustomerName, CustomerAddress, CustomerPhone, CustomerEmail)
				VALUES ('Kevin', 'Sukaramai', '08121414', 'ADSFAS@GMAIL.COM')

SELECT * FROM MsCustomer
DROP TABLE MsCustomer

INSERT INTO CustomerEmail, CustomerPassword
VALUES ('a', 'a')



CREATE TABLE Roles (
	ID INT IDENTITY(1,1) NOT NULL,
    StaffID AS 'ST' + RIGHT('00000' + CAST(ID AS VARCHAR(5)), 5) PERSISTED PRIMARY KEY,
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
DROP TABLE MsStaff

INSERT INTO Roles (StaffName) VALUES('lOL')
SELECT * FROM Roles
DROP TABLE Roles
SELECT * FROM MsStaff

DROP TABLE MsStaff



DROP TABLE LtParkingLocation

USE SyukurParking

CREATE TABLE TrParking (
	ParkingID VARCHAR(50) NOT NULL PRIMARY KEY,
	CustomerID VARCHAR(50) REFERENCES MsCustomer(CustomerID),
	StaffID VARCHAR(50) REFERENCES MsStaff(StaffID),
	InTime DATETIME,
	OutTime DATETIME,
	VehicleType VARCHAR(50),
	StaffName VARCHAR(50)
)

SELECT * FROM MsStaff
SELECT * FROM MsCustomer

DROP TABLE TrParking

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