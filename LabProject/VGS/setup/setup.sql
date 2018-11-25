
CREATE DATABASE db;
USE db;

CREATE TABLE Members(
	Member_ID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR(64) NOT NULL,
	Tel VARCHAR(15),
	Email VARCHAR(254),
	Extensions_Made INT NOT NULL,

	PRIMARY KEY (Member_ID)
);

CREATE TABLE Games(
	Game_ID INT NOT NULL AUTO_INCREMENT,
	Title VARCHAR(32) NOT NULL,
	Genre VARCHAR(32),
	Release_Year DATE NOT NULL,
	Description VARCHAR(1024),
	FormatOfGame VARCHAR(9),
	Value INT NOT NULL,
    isAvailable BOOLEAN NOT NULL,
    
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
	FOREIGN KEY (Member_ID) REFERENCES Members (Member_ID) ON DELETE CASCADE ON UPDATE CASCADE,
	FOREIGN KEY (Game_ID) REFERENCES Games(Game_ID) ON DELETE CASCADE ON UPDATE CASCADE
	
);

CREATE TABLE Staff(
	Staff_ID INT NOT NULL AUTO_INCREMENT,
	Name VARCHAR(64) NOT NULL,
	Role VARCHAR(20),

	PRIMARY KEY (Staff_ID )
);
CREATE TABLE Bans(
	Ban_ID INT NOT NULL AUTO_INCREMENT,
    Rental_ID INT,
	Reason VARCHAR(256) NOT NULL,
	Start_Date DATE NOT NULL,
	End_Date DATE,
  
	PRIMARY KEY (Ban_ID),
	FOREIGN KEY(Member_ID) REFERENCES Members(Member_ID),
	FOREIGN KEY(Rental_ID) REFERENCES Rentals(Rental_ID)


);

INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Marivel Jones" , "07700 900659" , "marivel@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Dario Johnson" , "07700 900406" , "dario@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Kandra Brown" , "07700 900331" , "kandra@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Adolph Wilson" , "07700 909159" , "adolph@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Tom Williams" , "07700 900199" , "tom@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Kayla Davis" , "07700 900312" , "kayla@gmail.com" , 0);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Steven Bonnell" , "07700 910462" , "steven@gmail.com" , 1);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("George Williams" , "07700 903284" , "george@gmail.com" , 2);
INSERT INTO Members(Name,Tel,Email,Extensions_Made) VALUES("Micheal Harris" , "07700 900312" , "micheal@gmail.com" , 0);


INSERT INTO Games(Title,Genre,Release_Year,Description,FormatOfGame,Value,isAvailable) VALUES('Red Dead Redemption 2', 'Action' , '2018-10-26', 'America, 1899. The end of the Wild West era has begun.','CD',50,true);
INSERT INTO Games(Title,Genre,Release_Year,Description,FormatOfGame,Value,isAvailable) VALUES('Far Cry 5', 'Action' , '2018-03-27', 'The main story revolves around the Project at Eden Gate, a doomsday cult that rules the land under the guise of its charismatic leader, Joseph Seed.', 'CD',25,true);
INSERT INTO Games(Title,Genre,Release_Year,Description,FormatOfGame,Value,isAvailable) VALUES('Assassins Creed Odyssey', "Action" , '2018-10-05', 'It is the eleventh major installment, and twentieth overall, in the Assassins Creed series and the successor to 2017 Assassins Creed Origins','CD',45,true);


INSERT INTO Rentals(Member_ID,Game_ID,Start_Date,Extension_Made) VALUES(1,2,'2018-11-11',false);
INSERT INTO Rentals(Member_ID,Game_ID,Start_Date,Extension_Made) VALUES(2,1,'2018-11-04',false);
INSERT INTO Rentals(Member_ID,Game_ID,Start_Date,Extension_Made) VALUES(5,3,'2018-10-16',false);

INSERT INTO Staff(Name, Role) VALUES(Alice Miller, Secretary);
INSERT INTO Staff(Name, Role) VALUES(Bob Taylor, Volunteer);
INSERT INTO Staff(Name, Role) VALUES(Charlie Smith, Volunteer);

INSERT INTO Bans(Rental_ID, Reason, Start_Date, End_Date) VALUES(1, "Late Return", '2018-11-15', NULL);

