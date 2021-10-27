DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE Login
(
    loginID  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NULL,
    password VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE CreditCard
(
    payID     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NULL,
    lastname  VARCHAR(255) NULL,
    month     INT          NULL,
    year      INT          NULL,
    valid VARCHAR(20)
) ENGINE = InnoDB;

CREATE TABLE User
(
    userID  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name    VARCHAR(255) NULL,
    email   VARCHAR(255) NULL,
    phone   VARCHAR(50),
    loginID INT          NOT NULL,
    payID   INT          NOT NULL,
    FOREIGN KEY (loginID) REFERENCES Login (loginID),
    FOREIGN KEY (payID) REFERENCES CreditCard (payID)
) ENGINE = InnoDB;


CREATE TABLE Customize
(
    customID INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    color    VARCHAR(255) NULL,
    part    VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE Product
(
    ProductID   INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    Title       VARCHAR(255) NULL,
    ProductType VARCHAR(255) NULL,
    Price       VARCHAR(20),
    CustomID    INT          NOT NULL,
    OrderID     INT          NOT NULL,
    FOREIGN KEY (CustomID) REFERENCES Customize (CustomID)
) ENGINE = InnoDB;
