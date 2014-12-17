use world;

CREATE TABLE customers (
customerEmail VARCHAR(40) NOT NULL,
lname VARCHAR(25) NOT NULL,
fname VARCHAR(25) NOT NULL,
title ENUM('Mr.', 'Mrs.', 'Miss', 'Ms.','Dr.'),
passwd VARCHAR(40),
PRIMARY KEY (customerEmail)
);

insert into customers (customerEmail, lname, fname, title, passwd)
values ('yo@yo.com', 'perez', 'pepito', 'Dr.', sha('Pepito123'));  