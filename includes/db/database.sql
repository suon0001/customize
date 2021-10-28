DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE Login
(
    login_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NULL,
    password VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE CreditCard
(
    pay_id     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NULL,
    lastname  VARCHAR(255) NULL,
    month     INT          NULL,
    year      INT          NULL,
    valid VARCHAR(20)
) ENGINE = InnoDB;

CREATE TABLE User
(
    user_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name    VARCHAR(255) NULL,
    email   VARCHAR(255) NULL,
    phone   VARCHAR(50),
    login_id INT          NOT NULL,
    pay_id   INT          NOT NULL,
    FOREIGN KEY (login_id) REFERENCES Login (login_id),
    FOREIGN KEY (pay_id) REFERENCES CreditCard (pay_id)
) ENGINE = InnoDB;


CREATE TABLE Customize
(
    custom_id INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    color    VARCHAR(255) NULL,
    part    VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE Product
(
    product_id   INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NULL,
    product_type VARCHAR(255) NULL,
    price       VARCHAR(20),
    custom_id    INT          NOT NULL,
    FOREIGN KEY (custom_id) REFERENCES Customize (custom_id)
) ENGINE = InnoDB;
