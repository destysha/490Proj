/*Make the database*/
CREATE DATABASE IF NOT EXISTS ishop;

/*Create the "admin" user*/
CREATE USER IF NOT EXISTS 'admin'@'localhost' IDENTIFIED BY 'password';

/*Grant privileges*/
GRANT ALL PRIVILEGES ON ishop.* TO 'admin'@'localhost' IDENTIFIED BY 'password';
FLUSH PRIVILEGES;

/*Switch to the new iShop database*/
USE ishop;

/*Create the "business" table if it doesn't already exist on the machine*/
CREATE TABLE IF NOT EXISTS business (
	businessID int(100) NOT NULL UNIQUE, 
	companyName varchar(255) NOT NULL,
	companyLocation varchar(255) NOT NULL,
	email varchar(255) NOT NULL UNIQUE,
	zip varchar(255) NOT NULL,
  	password varchar(255) NOT NULL,
	last_modified int(11) NOT NULL,
	active boolean
);

/*Create the "iShop inventory" table if it doesn't already exist on the machine*/
CREATE TABLE IF NOT EXISTS inventory (
	grp_id int NOT NULL PRIMARY KEY,
	upc14 int(14) NOT NULL,
	upc12 int(12) NOT NULL,
	brand varchar(255) NOT NULL,
	name varchar(255) NOT NULL	
);
/*Create the "Inventory for Business" table if it doesn't already exist on the machine*/
CREATE TABLE IF NOT EXISTS businessInv 
	qty int(255),
	businessID int(100) NOT NULL,
	grp_id int(255) NOT NULL,
	CONSTRAINT FOREIGN KEY fk_busid(businessID) REFERENCES business(businessID),
	CONSTRAINT FOREIGN KEY fk_grpid(grp_id) REFERENCES inventory(grp_id)
);

/* EXIT MYSQL AND GO INTO api FOLDER, THEN ENTER MYSQL AND RUN THIS CODE, MAKE SURE TO BE IN THE DATABASE

LOAD DATA LOCAL INFILE '/api/Grocery_UPC_Database.csv' replace INTO TABLE inventory FIELDS TERMINATED BY ',' ENCLOSED BY '"' LINES TERMINATED BY '\n' IGNORE LINES 1; 

*/