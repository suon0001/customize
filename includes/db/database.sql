DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE Login
(
    LoginID  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Username VARCHAR(255) NULL,
    Password VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE CreditCard
(
    PayID     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(255) NULL,
    LastName  VARCHAR(255) NULL,
    Month     INT          NULL,
    Year      INT          NULL,
    ValidCode VARCHAR(20)
) ENGINE = InnoDB;

CREATE TABLE User
(
    UserID  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Name    VARCHAR(255) NULL,
    Email   VARCHAR(255) NULL,
    Phone   VARCHAR(50),
    LoginID INT          NOT NULL,
    PayID   INT          NOT NULL,
    FOREIGN KEY (LoginID) REFERENCES Login (LoginID),
    FOREIGN KEY (PayID) REFERENCES CreditCard (PayID)
) ENGINE = InnoDB;


CREATE TABLE Customize
(
    CustomID INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Color    VARCHAR(255) NULL,
    Part    VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE Orders
(
    OrderID   INT      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    OrderDate DATETIME NULL
) ENGINE = InnoDB;

CREATE TABLE Product
(
    ProductID   INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title       VARCHAR(255) NULL,
    ProductType VARCHAR(255) NULL,
    Price       VARCHAR(20),
    CustomID    INT          NOT NULL,
    OrderID     INT          NOT NULL,
    FOREIGN KEY (CustomID) REFERENCES Customize (CustomID),
    FOREIGN KEY (OrderID) REFERENCES Orders (OrderID)
) ENGINE = InnoDB;



CREATE TABLE Receipt
(
    ReceiptID   INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Description VARCHAR(255)
) ENGINE = InnoDB;

insert into Login (LoginID, Username, Password)
values (null, 'akillby0', '91GIvsRP');
insert into Login (LoginID, Username, Password)
values (null, 'iespley1', 'ThCzxBko');
insert into Login (LoginID, Username, Password)
values (null, 'wdolton2', 'fqfU1En9u');

insert into CreditCard (PayID, FirstName, LastName, Month, Year, ValidCode)
values (null, 'Burton', 'Houlton', 03, 23, 576);
insert into CreditCard (PayID, FirstName, LastName, Month, Year, ValidCode)
values (null, 'Leann', 'Durrington', 01, 23, 395);
insert into CreditCard (PayID, FirstName, LastName, Month, Year, ValidCode)
values (null, 'Hedwig', 'McDougald', 10, 24, 852);

insert into User (UserID, Name, Email, Phone, LoginID, PayID) values (null, 'Coriss', 'crosenfeld0@lycos.com', '958-525-3587', 1, 1);
insert into User (UserID, Name, Email, Phone, LoginID, PayID) values (null, 'Anya', 'adooland1@berkeley.edu', '117-118-3893', 2, 2);
insert into User (UserID, Name, Email, Phone, LoginID, PayID) values (null, 'Keriann', 'kstourton2@businessinsider.com', '908-513-8983', 3, 3);

insert into Customize (CustomID, Color, Part) values (null, 'Teal', 'Body');
insert into Customize (CustomID, Color, Part) values (null, 'Violet', 'Triggers');
insert into Customize (CustomID, Color, Part) values (null, 'Deep Pink', 'D-Pad');
insert into Customize (CustomID, Color, Part) values (null, 'Mineral Blue', 'ABXY');
insert into Customize (CustomID, Color, Part) values (null, 'white', 'Thumbsticks');
insert into Customize (CustomID, Color, Part) values (null, 'Yellow', 'Bumpers');