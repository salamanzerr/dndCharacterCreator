<!-- processUpdate.php -->

<?php
require_once('../database.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get character ID
    $characterID = $_POST['characterID'];
    
    // update character info
    $race = $_POST['race'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];

    $queryCharacter = "UPDATE characters SET race = :race, class = :class, gender = :gender
                       WHERE characterID = :characterID";
    $statementCharacter = $db->prepare($queryCharacter);
    $statementCharacter->bindValue(':race', $race);
    $statementCharacter->bindValue(':class', $class);
    $statementCharacter->bindValue(':gender', $gender);
    $statementCharacter->bindValue(':characterID', $characterID);
    $statementCharacter->execute();
    $statementCharacter->closeCursor();

    // Update abilities information
    $strength = $_POST['strength'];
    $dexterity = $_POST['dexterity'];
    $constitution = $_POST['constitution'];
    $intelligence = $_POST['intelligence'];
    $wisdom = $_POST['wisdom'];
    $charisma = $_POST['charisma'];

    foreach ($strength as $index => $value) {
        $queryAbilities = "UPDATE abilities SET strength = :strength, dexterity = :dexterity, 
                           constitution = :constitution, intelligence = :intelligence, 
                           wisdom = :wisdom, charisma = :charisma 
                           WHERE characterID = :characterID";
        $statementAbilities = $db->prepare($queryAbilities);
        $statementAbilities->bindValue(':strength', $strength[$index]);
        $statementAbilities->bindValue(':dexterity', $dexterity[$index]);
        $statementAbilities->bindValue(':constitution', $constitution[$index]);
        $statementAbilities->bindValue(':intelligence', $intelligence[$index]);
        $statementAbilities->bindValue(':wisdom', $wisdom[$index]);
        $statementAbilities->bindValue(':charisma', $charisma[$index]);
        $statementAbilities->bindValue(':characterID', $characterID);
        $statementAbilities->execute();
        $statementAbilities->closeCursor();
    }

    //goes if success
    header("Location: charDB.php");
    exit();
  }
  else{
    // goes to error page
    header("Location: databaseError.php");
    exit();
}
   
?>
