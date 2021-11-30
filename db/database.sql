DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE `users`
(
    `id`       int(11)      NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` varchar(100) NOT NULL,
    `email`    varchar(100) NOT NULL,
    `password` varchar(100) NOT NULL,
    `user_type`  varchar(20) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE creditCard
(
    pay_id     INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    cardholder VARCHAR(255) NULL,
    cardnumber VARCHAR(255) NULL,
    month      INT          NULL,
    year       INT          NULL,
    valid      VARCHAR(20)
) ENGINE = InnoDB;

CREATE TABLE Images
(
    images_id INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filename  VARCHAR(255) NULL
) ENGINE = InnoDB;


CREATE TABLE product
(
    product_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title       VARCHAR(255) NULL,
    type        VARCHAR(255) NULL,
    description VARCHAR(255) NULL,
    category    VARCHAR(100) NULL,
    color       VARCHAR(50)  NULL,
    price       DECIMAL(8, 2),
    stock       INT(11)      NOT NULL,
    image       VARCHAR(255) NULL,
    time_date   TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB;

CREATE TABLE address
(
    id        INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(255) NULL,
    lastName  VARCHAR(255) NULL,
    company   VARCHAR(255) NULL,
    country   VARCHAR(244) NULL,
    street    VARCHAR(244) NULL,
    city      VARCHAR(244) NULL,
    postcode  INT          NOT NULL,
    state     VARCHAR(244) NULL,
    phone     VARCHAR(244) NULL,
    email     VARCHAR(244) NULL
) ENGINE = InnoDB;
