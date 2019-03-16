-- Make the database
CREATE DATABASE IF NOT EXISTS 'ishop';

-- Create the "admin" user
CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'password';

-- Grant privileges
GRANT ALL PRIVILEGES ON ishop.* TO 'admin'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;

-- Switch to the new iShop database
USE ishop;

-- Create the "business" table if it doesn't already exist on the machine
CREATE TABLE IF NOT EXISTS 'business' (
	'businessID' int(100) NOT NULL PRIMARY AUTO_INCREMENT, 
	'companyName' varchar(255) NOT NULL,
	'companyLocation' varchar(255) NOT NULL,
	'email' varchar(255) NOT NULL UNIQUE,
	'zip' varchar(255) NOT NULL,
  	'password' varchar(255) NOT NULL,
	'last_modified' int(11) NOT NULL,
	'active' boolean
);

--Create the "iShop inventory" table if it doesn't already exist on the machine
CREATE TABLE IF NOT EXISTS 'inventory' (
	'grp_id' int NOT NULL PRIMARY KEY,
	'upc14' int(14) NOT NULL,
	'upc12' int(12) NOT NULL,
	'brand' varchar(255) NOT NULL,
	'name' varchar(255) NOT NULL	
);
--Create the "Inventory for Business" table if it doesn't already exist on the machine
CREATE TABLE IF NOT EXISTS 'businessInv' (
	'businessID' 
	'grp_id'
	'qty' int(500),
	FORGEIN KEY (businessID) REFERENCES business(businessID),
	FORGEIN KEY (grp_id) REFERENCES inventory(grp_id)
);

LOAD DATA INFILE '/api/Grocery_UPC_Database.csv' replace INTO TABLE inventory FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n';