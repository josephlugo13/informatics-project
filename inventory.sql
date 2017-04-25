DROP TABLE IF EXISTS inventory;

CREATE TABLE inventory(
	id int(11) NOT NULL AUTO_INCREMENT,
	category VARCHAR(100) NOT NULL,
	product VARCHAR(100) NOT NULL,
    product_desc tinytext NOT NULL,
	unit INT unsigned NOT NULL,
	price DECIMAL(6,2) NOT NULL,
	stock INT unsigned NOT NULL,
    PRIMARY KEY (id),
    UNIQUE KEY(product)
) AUTO_INCREMENT=1 ;



--data for inventory
INSERT INTO inventory (id, category, product, product_desc, unit, price, stock) VALUES
(1, 'Dairy', 'Whole Milk', 1, 7.50, 100);
(2, 'Produce', 'Corn', 1, 0.25, 250);
(3, 'Fruit', 'Banana', 5, 3.99, 150);
(4, 'Seafood', 'Lobster', 1, 7.99, 10);