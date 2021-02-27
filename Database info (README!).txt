//Database name

"project"

//Create table for dbname="project"

CREATE TABLE users (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30),
last_name VARCHAR(30),
phone_number VARCHAR(30),
email VARCHAR(30),
password VARCHAR(30),
repeat_password VARCHAR(30),
)


CREATE TABLE appointment (
id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
first_name VARCHAR(30),
last_name VARCHAR(30),
phone_number VARCHAR(30),
email VARCHAR(30),
purpose TEXT,
)