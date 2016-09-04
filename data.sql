CREATE TABLE user
(
id int NOT NULL AUTO_INCREMENT,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL,
PRIMARY KEY (id)
);

CREATE TABLE list
(
id int NOT NULL AUTO_INCREMENT,
details text NOT NULL,
user_id int NOT NULL,
public varchar(5) NOT NULL,
PRIMARY KEY (id)
);
