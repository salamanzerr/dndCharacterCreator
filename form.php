<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['race']) && isset($_POST['class']) && isset($_POST['gender'])) {
        // Insert character data
        $race = $_POST['race'];
        $class = $_POST['class'];
        $gender = $_POST['gender'];
        
        $query = 'INSERT INTO characters (race, class, gender) VALUES (:race, :class, :gender)';
        $statement = $db->prepare($query);
        $statement->bindValue(':race', $race);
        $statement->bindValue(':class', $class);
        $statement->bindValue(':gender', $gender);
        $statement->execute();

        // Get the characterID of the newly inserted character
        $characterID = $db->lastInsertId();

        $statement->closeCursor();
    }
    
    if (isset($_POST['strength']) && isset($_POST['dexterity']) && isset($_POST['constitution']) && isset($_POST['intelligence']) && isset($_POST['wisdom']) && isset($_POST['charisma'])) {
        // Insert ability data
        $str = $_POST['strength'];
        $dex = $_POST['dexterity'];
        $con = $_POST['constitution'];
        $int = $_POST['intelligence'];
        $wis = $_POST['wisdom'];
        $char = $_POST['charisma'];
        
        $query = 'INSERT INTO abilities (strength, dexterity, constitution, intelligence, wisdom, charisma, characterID) VALUES (:strength, :dexterity, :constitution, :intelligence, :wisdom, :charisma, :characterID)';
        $statement = $db->prepare($query);
        $statement->bindValue(':strength', $str);
        $statement->bindValue(':dexterity', $dex);
        $statement->bindValue(':constitution', $con);
        $statement->bindValue(':intelligence', $int);
        $statement->bindValue(':wisdom', $wis);
        $statement->bindValue(':charisma', $char);
        $statement->bindValue(':characterID', $characterID);
        $statement->execute();
        $statement->closeCursor();
    }

    if(
      isset($_POST['acrobatics']) && isset($_POST['animalHandling']) && isset($_POST['arcana']) &&
      isset($_POST['athletics']) && isset($_POST['deception']) && isset($_POST['history']) &&
      isset($_POST['insight']) && isset($_POST['intimidation']) && isset($_POST['investigation']) &&
      isset($_POST['medicine']) && isset($_POST['nature']) && isset($_POST['perception']) &&
      isset($_POST['performance']) && isset($_POST['persuasion']) && isset($_POST['religion']) &&
      isset($_POST['sleightOfHand']) && isset($_POST['stealth']) && isset($_POST['survival'])
    ){
     // Insert skill data
    $acrobatics = $_POST['acrobatics'];
    $animalHandling = $_POST['animalHandling'];
    $arcana = $_POST['arcana'];
    $athletics = $_POST['athletics'];
    $deception = $_POST['deception'];
    $history = $_POST['history'];
    $insight = $_POST['insight'];
    $intimidation = $_POST['intimidation'];
    $investigation = $_POST['investigation'];
    $medicine = $_POST['medicine'];
    $nature = $_POST['nature'];
    $perception = $_POST['perception'];
    $performance = $_POST['performance'];
    $persuasion = $_POST['persuasion'];
    $religion = $_POST['religion'];
    $sleightOfHand = $_POST['sleightOfHand'];
    $stealth = $_POST['stealth'];
    $survival = $_POST['survival'];
    
    // bruh this query...
    // it could prob be done better

    $querySkills = 'INSERT INTO skills (acrobatics, animalHandling, arcana, athletics, deception, history, insight, intimidation, investigation, medicine, nature, perception, performance, persuasion, religion, sleightOfHand, stealth, survival, characterID) VALUES (:acrobatics, :animalHandling, :arcana, :athletics, :deception, :history, :insight, :intimidation, :investigation, :medicine, :nature, :perception, :performance, :persuasion, :religion, :sleightOfHand, :stealth, :survival, :characterID)';
    $statementSkills = $db->prepare($querySkills);
    $statementSkills->bindValue(':acrobatics', $acrobatics);
    $statementSkills->bindValue(':animalHandling', $animalHandling);
    $statementSkills->bindValue(':arcana', $arcana);
    $statementSkills->bindValue(':athletics', $athletics);
    $statementSkills->bindValue(':deception', $deception);
    $statementSkills->bindValue(':history', $history);
    $statementSkills->bindValue(':insight', $insight);
    $statementSkills->bindValue(':intimidation', $intimidation);
    $statementSkills->bindValue(':investigation', $investigation);
    $statementSkills->bindValue(':medicine', $medicine);
    $statementSkills->bindValue(':nature', $nature);
    $statementSkills->bindValue(':perception', $perception);
    $statementSkills->bindValue(':performance', $performance);
    $statementSkills->bindValue(':persuasion', $persuasion);
    $statementSkills->bindValue(':religion', $religion);
    $statementSkills->bindValue(':sleightOfHand', $sleightOfHand);
    $statementSkills->bindValue(':stealth', $stealth);
    $statementSkills->bindValue(':survival', $survival);
    $statementSkills->bindValue(':characterID', $characterID); // Assuming you have characterID available
    $statementSkills->execute();
    $statementSkills->closeCursor();
    }


    // Redirect back to the form or any other page after insertion
    header('Location: charCreator.php');
}
?>

