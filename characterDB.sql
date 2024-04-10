/* characterDB.sql i have no idea if im doing this right -J */
CREATE TABLE character (
  characterID NUMERIC(10) NOT NULL,
  raceCode varchar(50) DEFAULT NULL,
  classCode varchar(50) DEFAULT NULL,
  genderCode varchar(50) DEFAULT NULL,  
  PRIMARY KEY (characterID)
  );
