/* Ordered Products Table */

DROP TABLE IF EXISTS orderedProducts;


CREATE TABLE orderedProducts(
	id INT NOT NULL AUTO_INCREMENT,
	quantity VARCHAR(100) NOT NULL,
	PRIMARY KEY(id)
    FOREIGN KEY(id) REFERENCES inventory(id)
    FOREIGN KEY(id) REFERENCES orders(id)
    UNIQUE KEY(quantity)
);