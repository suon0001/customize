DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE `users`
(
    `id`        int          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username`  varchar(100) NOT NULL,
    `email`     varchar(100) NOT NULL,
    `password`  varchar(100) NOT NULL,
    `user_type` varchar(20)  NOT NULL
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
    country   VARCHAR(255) NULL,
    street    VARCHAR(255) NULL,
    city      VARCHAR(255) NULL,
    postcode  INT          NOT NULL,
    state     VARCHAR(255) NULL,
    phone     VARCHAR(50)  NULL,
    email     VARCHAR(255) NULL
) ENGINE = InnoDB;

CREATE TABLE orderDetails
(
    order_id     INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(255),
    id         INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (id) REFERENCES address (id),
    FOREIGN KEY (product_id) REFERENCES product (product_id)
);
ENGINE = InnoDB;


CREATE VIEW featuredProducts AS
SELECT *
FROM product
WHERE `type` = 'playstation';
CREATE VIEW danishPeople AS
SELECT *
FROM address
WHERE `country` = 'DNK';