/* characterDB.sql i have no idea if im doing this right -J */
CREATE TABLE characters (
  characterID INT(10) NOT NULL,
  race varchar(50) DEFAULT NULL,
  class varchar(50) DEFAULT NULL,
  gender varchar(50) DEFAULT NULL,  
  PRIMARY KEY (characterID)
  );

CREATE TABLE abilities (
  abilityID INT NOT NULL,
  strength INT NOT NULL,
  dexterity INT NOT NULL,
  constitution INT NOT NULL,
  intelligence INT NOT NULL,
  wisdom INT NOT NULL,
  charisma INT NOT NULL,
  PRIMARY KEY(abilityID),
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);

CREATE TABLE skills (
  acrobatics INT NOT NULL,
  animalHandling INT NOT NULL,
  arcana INT NOT NULL,
  athletics INT NOT NULL,
  deception INT NOT NULL,
  history INT NOT NULL,
  insight INT NOT NULL,
  intimidation INT NOT NULL,
  investigation INT NOT NULL,
  medicine INT NOT NULL,
  nature INT NOT NULL,
  perception INT NOT NULL,
  performance INT NOT NULL,
  persuasion INT NOT NULL,
  religion INT NOT NULL,
  sleightOfHand INT NOT NULL,
  stealth INT NOT NULL,
  survivial INT NOT NULL,
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);
