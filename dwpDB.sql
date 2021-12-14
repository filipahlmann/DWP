DROP DATABASE IF EXISTS dwpDB;
CREATE DATABASE dwpDB;
USE dwpDB;

CREATE TABLE `Postalcode` (
    postalcodeID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    city varchar(255)
);

CREATE TABLE Company (
    companyID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255),
    `description` varchar(255)
);

CREATE TABLE ContactInformation (
  contactID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255),
    phone varchar(255),
    mail varchar(255),
    companyID int NOT NULL,
    FOREIGN KEY (companyID) REFERENCES Company (companyID)
);

CREATE TABLE OpeningHours (
    openingHoursID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255),
    textfieldOne varchar(255),
    textfieldTwo varchar(255),
    textfieldThree varchar(255),
    companyID int NOT NULL,
    FOREIGN KEY (companyID) REFERENCES Company (companyID)

);

CREATE TABLE news (
    newsID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255) NOT NULL,
    description text NOT NULL,
    companyID int NOT NULL,
    FOREIGN KEY (companyID) REFERENCES Company (companyID)
);

CREATE TABLE users (
    users_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    users_email varchar(255) NOT NULL,
    users_uid varchar(255) NOT NULL,
    users_pwd varchar(255) NOT NULL,
    companyID int NOT NULL,
    FOREIGN KEY (companyID) REFERENCES company (companyID)
);

CREATE TABLE products (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `product_code` (`code`),
      companyID int NOT NULL,

      FOREIGN KEY (companyID) REFERENCES Company (companyID)
);

CREATE TABLE Customer (
  customerID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name varchar(255) NULL,
    last_name varchar(255) NUll,
    street varchar(255) NULL,
    email varchar(255) NULL,
    postalcode varchar(20) NOT NULL,
    FOREIGN KEY (Postalcode) REFERENCES Postalcode (postalcodeID)
);
CREATE TABLE CustomerOrder (
    customerOrderID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    total_price int(11) NULL,
    created_at datetime NULL,
    customerID int NOT NULL,
    FOREIGN KEY (customerID) REFERENCES Customer (customerID)
);

CREATE TABLE `Order` (
    customerOrderID int(8) NOT NULL,
    ID int(8) NOT NULL,
    quantity float NOT NULL,
    constraint PK_Order PRIMARY KEY (ID, customerOrderID),
    FOREIGN KEY (ID) REFERENCES products (ID),
    FOREIGN KEY (customerOrderID) REFERENCES CustomerOrder (customerOrderID)
);