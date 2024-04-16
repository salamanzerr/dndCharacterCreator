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

    // Redirect back to the form or any other page after insertion
    header('Location: charCreator.php.php');
}
?>

