DROP DATABASE IF EXISTS webshopDB;
CREATE DATABASE webshopDB;
USE webshopDB;

CREATE TABLE Login
(
    login_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username  VARCHAR(255) NULL,
    password  VARCHAR(255) NULL,
    user_type BOOLEAN      NOT NULL
) ENGINE = InnoDB;

CREATE TABLE CreditCard
(
    pay_id    INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(255) NULL,
    lastname  VARCHAR(255) NULL,
    month     INT          NULL,
    year      INT          NULL,
    valid     VARCHAR(20)
) ENGINE = InnoDB;

CREATE TABLE User
(
    user_id  INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name     VARCHAR(255) NULL,
    email    VARCHAR(255) NULL,
    phone    VARCHAR(50),
    login_id INT          NOT NULL,
    pay_id   INT          NOT NULL,
    FOREIGN KEY (login_id) REFERENCES Login (login_id),
    FOREIGN KEY (pay_id) REFERENCES CreditCard (pay_id)
) ENGINE = InnoDB;

CREATE TABLE Images
(
    images_id INT          NOT NULL AUTO_INCREMENT PRIMARY KEY,
    filename  VARCHAR(255) NULL
) ENGINE = InnoDB;


CREATE TABLE Product
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

