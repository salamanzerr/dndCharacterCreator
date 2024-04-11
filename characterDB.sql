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
  strength INTEGER NOT NULL,
  dexterity INTEGER NOT NULL,
  constitution INTEGER NOT NULL,
  intelligence INTEGER NOT NULL,
  wisdom INTEGER NOT NULL,
  charisma INTEGER NOT NULL,
 /* PRIMARY KEY(abilityID),*/
 /* characterID INTEGER,*/ /*foreign keys need to be defined in the table*/
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);

CREATE TABLE skills (
  skillID INTEGER PRIMARY KEY AUTO_INCREMENT, /*added primary key for skills*/
  acrobatics INTEGER NOT NULL,
  animalHandling INTEGER NOT NULL,
  arcana INTEGER NOT NULL,
  athletics INTEGER NOT NULL,
  deception INTEGER NOT NULL,
  history INTEGER NOT NULL,
  insight INTEGER NOT NULL,
  intimidation INTEGER NOT NULL,
  investigation INTEGER NOT NULL,
  medicine INTEGER NOT NULL,
  nature INTEGER NOT NULL,
  perception INTEGER NOT NULL,
  performance INTEGER NOT NULL,
  persuasion INTEGER NOT NULL,
  religion INTEGER NOT NULL,
  sleightOfHand INTEGER NOT NULL,
  stealth INTEGER NOT NULL,
  survival INTEGER NOT NULL,
  /*characterID INTEGER,*/ /*foreign keys need to be defined in the table*/
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);
