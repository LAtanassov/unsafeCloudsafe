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
date_posted varchar(30) NOT NULL,
time_posted time NOT NULL,
date_edited varchar(30) NOT NULL,
time_edited time NOT NULL,
pulblic varchar(5) NOT NULL,
PRIMARY KEY (id)
);
