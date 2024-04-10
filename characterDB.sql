/* characterDB.sql i have no idea if im doing this right -J */
CREATE TABLE characters (
  characterID NUMERIC(10) NOT NULL,
  race varchar(50) DEFAULT NULL,
  class varchar(50) DEFAULT NULL,
  gender varchar(50) DEFAULT NULL,  
  PRIMARY KEY (characterID)
  );

CREATE TABLE abilities (
  strength NUMERIC NOT NULL,
  dexterity NUMERIC NOT NULL,
  constitution NUMERIC NOT NULL,
  intelligence NUMERIC NOT NULL,
  wisdoom NUMERIC NOT NULL,
  charisma NUMERIC NOT NULL,
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);

CREATE TABLE skills (
  acrobatics NUMERIC NOT NULL,
  animalHandling NUMERIC NOT NULL,
  arcana NUMERIC NOT NULL,
  athletics NUMERIC NOT NULL,
  deception NUMERIC NOT NULL,
  history NUMERIC NOT NULL,
  insight NUMERIC NOT NULL,
  intimidation NUMERIC NOT NULL,
  investigation NUMERIC NOT NULL,
  medicine NUMERIC NOT NULL,
  nature NUMERIC NOT NULL,
  perception NUMERIC NOT NULL,
  performance NUMERIC NOT NULL,
  persuasion NUMERIC NOT NULL,
  religion NUMERIC NOT NULL,
  sleightOfHand NUMERIC NOT NULL,
  stealth NUMERIC NOT NULL,
  survivial NUMERIC NOT NULL,
  FOREIGN KEY (characterID) REFERENCES characters(characterID)
);
