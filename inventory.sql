DROP TABLE IF EXISTS inventory;

CREATE TABLE inventory(
	id int(11) NOT NULL AUTO_INCREMENT,
    code varchar(100) NOT NULL,
	category VARCHAR(100) NOT NULL,
	product VARCHAR(100) NOT NULL,
    product_desc tinytext NOT NULL,
	unit INT unsigned NOT NULL,
	price DECIMAL(6,2) NOT NULL,
	stock INT unsigned NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY code (code)
) AUTO_INCREMENT=1 ;



--data for inventory
INSERT INTO inventory (id, code, category, product, product_desc, unit, price, stock) VALUES
(1, 'PD1001', 'Dairy', 'Whole Milk', 1, 7.50, 100);
(2, 'PD1002', 'Produce', 'Corn', 1, 0.25, 250);
(3, 'PD1003', 'Fruit', 'Banana', 5, 3.99, 150);
(4, 'PD1004', 'Seafood', 'Lobster', 1, 7.99, 10);