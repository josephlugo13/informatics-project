/* This table holds user accounts */

DROP TABLE IF EXISTS customers;

CREATE TABLE customers (
	id INT NOT NULL AUTO_INCREMENT,
	customerName VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	hashedpass VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);