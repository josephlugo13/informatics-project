DROP TABLE IF EXISTS inventory;

CREATE TABLE inventory(
	id int unsigned NOT NULL AUTO_INCREMENT,
	category VARCHAR(100) NOT NULL,
	product VARCHAR(100) NOT NULL,
	unit INT unsigned NOT NULL,
	price DECIMAL(6,2) NOT NULL,
	stock INT unsigned NOT NULL,
	PRIMARY KEY (id)
);



--data for inventory
INSERT INTO inventory(category, product, unit, price, stock) VALUES ('Dairy', 'Whole Milk', 1, 7.50, 100);
INSERT INTO inventory(category, product, unit, price, stock) VALUES ('Produce', 'Corn', 1, 0.25, 250);
INSERT INTO inventory(category, product, unit, price, stock) VALUES ('Fruit', 'Banana', 5, 3.99, 150);
INSERT INTO inventory(category, product, unit, price, stock) VALUES ('Seafood', 'Lobster', 1, 7.99, 10);