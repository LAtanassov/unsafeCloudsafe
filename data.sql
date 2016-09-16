CREATE DATABASE cloud;

USE cloud;

CREATE TABLE user
(
uid int NOT NULL AUTO_INCREMENT,
username varchar(50) NOT NULL,
password varchar(50) NOT NULL,
PRIMARY KEY (uid)
);

CREATE TABLE data
(
did int NOT NULL AUTO_INCREMENT,
fuid int NOT NULL,
name varchar(50) NOT NULL,
ispublic boolean NOT NULL,
keyword varchar(50) NOT NULL,
type varchar(50) NOT NULL,
size int NOT NULL,
content MEDIUMBLOB NOT NULL,
PRIMARY KEY (did)
);


