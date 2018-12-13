CREATE DATABASE db;
USE db;

CREATE TABLE Members(
                      Member_ID       INT         NOT NULL AUTO_INCREMENT,
                      Name            VARCHAR(64) NOT NULL,
                      Tel             VARCHAR(15),
                      Email           VARCHAR(254),
                      Extensions_Made INT         NOT NULL,

                      PRIMARY KEY (Member_ID)
);

CREATE TABLE Games(
                    Game_ID      INT         NOT NULL AUTO_INCREMENT,
                    Title        VARCHAR(32) NOT NULL,
                    Genre        VARCHAR(32),
                    Release_Year DATE        NOT NULL,
                    Description  VARCHAR(1024),
                    FormatOfGame VARCHAR(9),
                    Value        INT         NOT NULL,
                    isAvailable  BOOLEAN     NOT NULL,
                    
                        
                    image        VARCHAR(1024),
                    ratings      VARCHAR(255),
                    
                    PRIMARY KEY (Game_ID)

);

CREATE TABLE Rentals(
                      Rental_ID      INT     NOT NULL AUTO_INCREMENT,
                      Member_ID      INT,
                      Game_ID        INT,
                      Start_Date     DATE    NOT NULL,
                      Returned_Date  DATE,
                      Extension_Made BOOLEAN NOT NULL,

                      PRIMARY KEY (Rental_ID),
                      FOREIGN KEY (Member_ID) REFERENCES Members (Member_ID) ON DELETE CASCADE ON UPDATE CASCADE,
                      FOREIGN KEY (Game_ID) REFERENCES Games (Game_ID) ON DELETE CASCADE ON UPDATE CASCADE

);

CREATE TABLE Staff(
                    Staff_ID VARCHAR(64)  NOT NULL,
                    Name     VARCHAR(64)  NOT NULL,
                    Role     VARCHAR(20),
                    Pass     VARCHAR(255) NOT NULL,

                    PRIMARY KEY (Staff_ID)
);

CREATE TABLE Bans(
                   Ban_ID     INT          NOT NULL AUTO_INCREMENT,
                   Rental_ID  INT,
                   Reason     VARCHAR(256) NOT NULL,
                   Start_Date DATE         NOT NULL,
                   End_Date   DATE,

                   PRIMARY KEY (Ban_ID),
                   FOREIGN KEY (Rental_ID) REFERENCES Rentals (Rental_ID)


);

CREATE TABLE Constants(
                  Platform VARCHAR(9) NOT NULL,
             
                  PRIMARY KEY (Platform)                 
);

