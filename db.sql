CREATE TABLE Users(
	id int PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255) UNIQUE,
    password varchar(255)
);
CREATE TABLE Categories(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255)
);
CREATE TABLE Artists(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255)
);
CREATE TABLE Musique(
	id int PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    song varchar(255),
    Add_the date,
    duration int,
    name_Artist int,
    Category int
);