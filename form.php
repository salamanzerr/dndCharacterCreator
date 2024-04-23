<?php
require_once('database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['race']) && isset($_POST['class']) && isset($_POST['gender'])) {
        // Insert character data
        $race = htmlspecialchars($_POST['race']);
        $class = htmlspecialchars($_POST['class']);
        $gender = htmlspecialchars($_POST['gender']);
        
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
        $str = htmlspecialchars($_POST['strength']);
        $dex = htmlspecialchars($_POST['dexterity']);
        $con = htmlspecialchars($_POST['constitution']);
        $int = htmlspecialchars($_POST['intelligence']);
        $wis = htmlspecialchars($_POST['wisdom']);
        $char = htmlspecialchars($_POST['charisma']);
        
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
    $acrobatics = htmlspecialchars($_POST['acrobatics']);
    $animalHandling = htmlspecialchars($_POST['animalHandling']);
    $arcana = htmlspecialchars($_POST['arcana']);
    $athletics = htmlspecialchars($_POST['athletics']);
    $deception = htmlspecialchars($_POST['deception']);
    $history = htmlspecialchars($_POST['history']);
    $insight = htmlspecialchars($_POST['insight']);
    $intimidation = htmlspecialchars($_POST['intimidation']);
    $investigation = htmlspecialchars($_POST['investigation']);
    $medicine = htmlspecialchars($_POST['medicine']);
    $nature = htmlspecialchars($_POST['nature']);
    $perception = htmlspecialchars($_POST['perception']);
    $performance = htmlspecialchars($_POST['performance']);
    $persuasion = htmlspecialchars($_POST['persuasion']);
    $religion = htmlspecialchars($_POST['religion']);
    $sleightOfHand = htmlspecialchars($_POST['sleightOfHand']);
    $stealth = htmlspecialchars($_POST['stealth']);
    $survival = htmlspecialchars($_POST['survival']);
    
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

