
------------------THE USER TABLE---------------

CREATE table users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    username VARCHAR(100),
    passwords VARCHAR(100)
    
)
------------------THE WORKER TABLE--------------

CREATE table workers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(100),
    lastname VARCHAR(100),
    username VARCHAR(100),
    passwords VARCHAR(100),
    roles VARCHAR(100)
    
)

-----------------THE ORDER TABLE-------------------

CREATE TABLE orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_amount DECIMAL(15, 2), 

    FOREIGN KEY (user_id) REFERENCES users(id)
);
------------------------Product table--------------

CREATE TABLE products (dÐÐ
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(100),
    price DECIMAL(10, 2),
    quantity INT,
    order_id INT,

    FOREIGN KEY (order_id) REFERENCES orders(order_id)
);

INSERT INTO products (product_name, price, quantity, order_id)
VALUES  ('Apple MacBook Air', 999.99, 15, 1),
        ('Iphone 15 Promax', 589.99, 5, 2),
        ('lightblue Long-sleeve Shirt', 87.10, 5, 3),
        ('black Short-Sleeve', 10, 115, 4);
        ('Blue&Orange Long-Sleeve Shirt', 99.99, 19, 5),
        ('khaki Long-Sleeve Shirt', 29.99, 9, 10);

ALTER TABLE your_table_name
ADD COLUMN NewColumn VARCHAR(255);

----------------------THE CART--------------------------
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,  
    product_id INT,
    quantity INT,
    price DECIMAL(10, 2),
    total DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (product_id) REFERENCES products(idp),
    FOREIGN KEY (user_id) REFERENCES users(id)  
);

-- CATEGORY TABLE

CREATE TABLE category (
   id_category INT AUTO_INCREMENT PRIMARY KEY,
   category_name
   CREATED_AT TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
);