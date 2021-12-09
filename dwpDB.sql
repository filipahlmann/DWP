DROP DATABASE IF EXISTS dwpDB;
CREATE DATABASE dwpDB;
USE dwpDB;

CREATE TABLE Webshop (
    webshopID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `name` varchar(255),
    description varchar(255)
);

CREATE TABLE Payment (
  paymentID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    payment_type varchar(255)
);

CREATE TABLE OrderDetails (
  orderdetailsID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    webshop_adress varchar(255),
    order_date DATE
);

CREATE TABLE Customer (
  customerID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    customer_name varchar(255),
    customer_adress varchar(255),
    customer_city varchar(255),
    customer_phone varchar(255),
    customer_mail varchar(255)
);

CREATE TABLE ContactInformation (
  contactID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255),
    contact_phone varchar(255),
    mail varchar(255),
    phone varchar(255),
    webshopID int NOT NULL,
    FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)
);

CREATE TABLE OpeningHours (
    openingHoursID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    title varchar(255),
    textfieldOne varchar(255),
    textfieldTwo varchar(255),
    textfieldThree varchar(255),
    webshopID int NOT NULL,
    FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)

);

CREATE TABLE NewsSection (
    newsSectionID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name varchar(255) NOT NULL,
    product_img text NOT NULL,
    product_price double(10,2) NOT NULL,
    webshopID int NOT NULL,
    FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)
);

CREATE TABLE DailySpecialOffer (
    DailySpecialOfferID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    product_name varchar(255) NOT NULL,
    product_img text NOT NULL,
    product_price double(10,2) NOT NULL,
    webshopID int NOT NULL,
    FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)
);

CREATE TABLE Users (
    usersID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    usersName varchar(255) NOT NULL,
    usersEmail varchar(255) NOT NULL,
    usersUid varchar(255) NOT NULL,
    usersPWd varchar(255) NOT NULL
    webshopID int NOT NULL,
    FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)
);

CREATE TABLE Products (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
`condition` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `product_code` (`code`)
      webshopID int NOT NULL,

      FOREIGN KEY (Webshop) REFERENCES Webshop (webshopID)
);

CREATE TABLE Order (
    orderID int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    totalprice varchar(255),
    paymentID int NOT NULL,
    customerID int NOT NULL,
    orderdetailsID int NOT NULL
    FOREIGN KEY (Payment) REFERENCES Payment (PaymentID)
    FOREIGN KEY (Customer) REFERENCES Customer (CustomerID)
    FOREIGN KEY (OrderDetails) REFERENCES OrderDetails (OrderDetailsID)
);

CREATE TABLE Ordered (
    orderID int NOT NULL,
    productID int NOT NULL,
    quantity float NOT NULL,
    constraint PK_Ordered PRIMARY KEY (productID, orderID)
    FOREIGN KEY (Product) REFERENCES Product (webshopID)
    FOREIGN KEY (Order) REFERENCES Order (orderID)
)g