/* This table holds user accounts */

DROP TABLE IF EXISTS users;

CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT,
	storeName VARCHAR(100) NOT NULL,
	email VARCHAR(100) NOT NULL,
	hashedpass VARCHAR(255) NOT NULL,
	PRIMARY KEY (id)
);