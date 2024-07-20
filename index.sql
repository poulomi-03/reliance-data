create database reliance-data;

use reliance-data;

CREATE TABLE `admin_credentials` (
  `Id` INT(11) NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(55) NOT NULL,
  `Email` VARCHAR(255) NOT NULL UNIQUE,
  `Password` VARCHAR(100) NOT NULL,  -- Adjust the VARCHAR length based on your password requirements
  PRIMARY KEY (`Id`)
);

INSERT INTO `admin_credentials` (`Name`, `Email`, `Password`) VALUES
('John Doe', 'john@example.com', 'john@123'),
('Jane Smith', 'jane@example.com', 'jane@123'),
('Michael Johnson', 'michael@example.com', 'michael@123'),
('Emily Davis', 'emily@example.com', 'emily@123'),
('Chris Brown', 'chris@example.com', 'chris@123');

