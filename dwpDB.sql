DROP DATABASE IF EXISTS dwpDB1;
CREATE DATABASE dwpDB1;
USE dwpDB1;

CREATE TABLE `Postalcode` (
    postalcodeID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    city varchar(255)
);

CREATE TABLE Company (
    companyID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `title` varchar(255),
    `description` varchar(255)
);

CREATE TABLE users (
    users_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    users_email varchar(255) NOT NULL,
    users_uid varchar(255) NOT NULL,
    users_pwd varchar(255) NOT NULL,
    companyID int NOT NULL,
    FOREIGN KEY (companyID) REFERENCES company (companyID)
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
    postalcodeID int NOT NULL,
    FOREIGN KEY (postalcodeID) REFERENCES Postalcode (postalcodeID)
);
CREATE TABLE `Order` (
    OrderID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    total_price int(11) NULL,
    created_at datetime NULL,
    customerID int NOT NULL,
    FOREIGN KEY (customerID) REFERENCES Customer (customerID)
);

CREATE TABLE `OrderLines` (
    OrderID int(8) NOT NULL,
    ID int(8) NOT NULL,
    quantity float NOT NULL,
    constraint PK_OrderLines PRIMARY KEY (ID, OrderID),
    FOREIGN KEY (ID) REFERENCES products (ID),
    FOREIGN KEY (OrderID) REFERENCES `Order` (OrderID)
);

INSERT INTO Company (title, description) VALUES ('Company titel', 'Company description');

INSERT INTO ContactInformation (title, phone, mail, companyID) VALUES ('Contact', 'phonenumber', 'mail', '1');

INSERT INTO Postalcode (city) VALUES ('Esbjerg');

INSERT INTO Customer (first_name, last_name, street, email, postalcodeID) VALUES ('kunde', 'kundeefternavn', 'gade', 'email', '1');

INSERT INTO news (title, description, companyID) VALUES ('News titel', 'News description', '1');

INSERT INTO OpeningHours (title, textfieldOne, textfieldTwo, textfieldThree, companyID) VALUES ('Opening Hours', '10:00-17:00', '09:00-17:00', '09:00-14:00', '1');

INSERT INTO users (users_email, users_uid, users_pwd, companyID) VALUES ('filipahlmann@gmail.com', 'asdf', '$2y$10$PDb69BJlLtomL5kF88dq.OPspJrkk6XsjV2pqjcVCtVDbhL.bamEy', '1');

INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 8', 'EE0001', '', '2499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 7', 'EE0002', '', '2099', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 6', 'EE0003', '', '499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone X', 'EE0004', '', '3499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone Xs', 'EE0005', '', '4499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 11', 'EE0006', '', '5499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 12', 'EE0007', '', '6499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 13', 'EE0008', '', '7499', '1');
INSERT INTO products (name, code, image, price, companyID) VALUES ('iPhone 13 Pro', 'EE0009', '', '8499', '1');