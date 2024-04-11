  /* characterDB.sql i have no idea if im doing this right -J */
CREATE TABLE characters (
  characterID INTEGER PRIMARY KEY AUTO_INCREMENT, /*added auto incrementation to primary keys*/
  race varchar(50) DEFAULT NULL,
  class varchar(50) DEFAULT NULL,
  gender varchar(50) DEFAULT NULL/*,*/  
  /*PRIMARY KEY (characterID)*/
  );

CREATE TABLE abilities (
  /*abilityID INT NOT NULL,*/
  abilityID INTEGER PRIMARY KEY AUTO_INCREMENT,
  strength INT NOT NULL,
  dexterity INT NOT NULL,
  constitution INT NOT NULL,
  intelligence INT NOT NULL,
  wisdom INT NOT NULL,
  charisma INT NOT NULL,
 /* PRIMARY KEY(abilityID),*/
 /* characterID INTEGER,*/ /*foreign keys need to be defined in the table*/
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);

CREATE TABLE skills (
  skillID INTEGER PRIMARY KEY AUTO_INCREMENT, /*added primary key for skills*/
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
  survival INT NOT NULL,
  /*characterID INTEGER,*/ /*foreign keys need to be defined in the table*/
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);
