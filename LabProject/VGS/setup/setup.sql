CREATE DATABASE db;
USE db;

CREATE TABLE Members(
	Member_ID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR(64) NOT NULL,
	Tel VARCHAR(15),
	Email VARCHAR(254),
	Extensions_Made INT,

	PRIMARY KEY (Member_ID)
);

CREATE TABLE Games(
	Game_ID INT NOT NULL AUTO_INCREMENT,
	Title VARCHAR(32) NOT NULL,
	Genre VARCHAR(32),
	Release_Year DATE NOT NULL,
	Description VARCHAR(255),
	Format VARCHAR(9),
	Value INT,

	PRIMARY KEY (Game_ID)
);

CREATE TABLE Rentals(
	Rental_ID INT NOT NULL AUTO_INCREMENT,
	Member_ID INT,
	Game_ID INT,
	Start_Date DATE NOT NULL,
	Returned_Date DATE,
	Extension_Made BOOLEAN NOT NULL,

	PRIMARY KEY (Rental_ID),
	FOREIGN KEY (Member_ID) REFERENCES Members (Member_ID),
	FOREIGN KEY (Game_ID) REFERENCES Games(Game_ID)
	
);

CREATE TABLE Staff(
	Staff_ID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR(64) NOT NULL,
	Role VARCHAR(20),

	PRIMARY KEY (Staff_ID )
);
CREATE TABLE Bans(
	Ban_ID INT NOT NULL AUTO_INCREMENT,
    	Member_ID INT,
    	Rental_ID INT,
	Reason VARCHAR(64) NOT NULL,
	Start_Date DATE NOT NULL,
	End_Date DATE,

	PRIMARY KEY (Ban_ID ),
	FOREIGN KEY(Member_ID) REFERENCES Members(Member_ID),
	FOREIGN KEY(Rental_ID) REFERENCES Rentals(Rental_ID)

);

