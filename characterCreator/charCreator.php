<?php
require_once('../database.php');

$query = 'SELECT * FROM characters';
$statement = $db->prepare($query);
//$statement->bindValue(':character_id', $character_id);
$statement->execute();
$chars = $statement->fetchAll();
$statement->closeCursor();

$query2 = 'SELECT * FROM abilities';
$statement2 = $db->prepare($query2);
//$statement->bindValue(':character_id', $character_id);
$statement2->execute();
$abilities = $statement2->fetchAll();
$statement2->closeCursor();


$query3 = 'SELECT * FROM skills';
$statement3 = $db->prepare($query3);
$statement3->execute();
$skills = $statement3->fetchAll();
$statement3->closeCursor();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>HTML5 Boilerplate</title>
  <link rel="stylesheet" href="styles.css">
</head>

<h2>Character Information</h2>
      <h1>Add Character and Abilities</h1>
      <form action="form.php" method="post">
        <label for="race">Race:</label><br>
        <input type="text" id="race" name="race" required><br><br>

        <label for="class">Class:</label><br>
        <input type="text" id="class" name="class" required><br><br>

        <label for="gender">Gender:</label><br>
        <input type="text" id="gender" name="gender" required><br><br>

<!--=====================ABILITY============================================ -->

        <h2>Abilities</h2>
        <label for="strength">Strength:</label><br>
        <input type="number" id="strength" name="strength" min="0" max="20" required><br><br>

        <label for="dexterity">Dexterity:</label><br>
        <input type="number" id="dexterity" name="dexterity" min="0" max="20" required><br><br>

        <label for="constitution">Constitution:</label><br>
        <input type="number" id="constitution" name="constitution" min="0" max="20" required><br><br>

        <label for="intelligence">Intelligence:</label><br>
        <input type="number" id="intelligence" name="intelligence" min="0" max="20" required><br><br>

        <label for="wisdom">Wisdom:</label><br>
        <input type="number" id="wisdom" name="wisdom" min="0" max="20" required><br><br>

        <label for="charisma">Charisma:</label><br>
        <input type="number" id="charisma" name="charisma" min="0" max="20" required><br><br>

<!-- ========================SKILLS==============================================-->

        <h2>Skills</h2>
    <label for="acrobatics">Acrobatics:</label><br>
    <input type="number" id="acrobatics" name="acrobatics" min="0" value="0"><br><br>

    <label for="animalHandling">Animal Handling:</label><br>
    <input type="number" id="animalHandling" name="animalHandling" min="0" value="0"><br><br>

    <label for="arcana">Arcana:</label><br>
    <input type="number" id="arcana" name="arcana" min="0" value="0"><br><br>

    <label for="athletics">Athletics:</label><br>
    <input type="number" id="athletics" name="athletics" min="0"  value="0"><br><br>

    <label for="deception">Deception:</label><br>
    <input type="number" id="deception" name="deception" min="0" value="0"><br><br>

    <label for="history">History:</label><br>
    <input type="number" id="history" name="history" min="0" value="0"><br><br>

    <label for="insight">Insight:</label><br>
    <input type="number" id="insight" name="insight" min="0" value="0"><br><br>

    <label for="intimidation">Intimidation:</label><br>
    <input type="number" id="intimidation" name="intimidation" min="0" value="0"><br><br>

    <label for="investigation">Investigation:</label><br>
    <input type="number" id="investigation" name="investigation" min="0" value="0"><br><br>

    <label for="medicine">Medicine:</label><br>
    <input type="number" id="medicine" name="medicine" min="0" value="0"><br><br>

    <label for="nature">Nature:</label><br>
    <input type="number" id="nature" name="nature" min="0" value="0"><br><br>

    <label for="perception">Perception:</label><br>
    <input type="number" id="perception" name="perception" min="0" value="0"><br><br>

    <label for="performance">Performance:</label><br>
    <input type="number" id="performance" name="performance" min="0" value="0"><br><br>

    <label for="persuasion">Persuasion:</label><br>
    <input type="number" id="persuasion" name="persuasion" min="0" value="0"><br><br>

    <label for="religion">Religion:</label><br>
    <input type="number" id="religion" name="religion" min="0" value="0"><br><br>

    <label for="sleightOfHand">Sleight of Hand:</label><br>
    <input type="number" id="sleightOfHand" name="sleightOfHand" min="0" value="0"><br><br>

    <label for="stealth">Stealth:</label><br>
    <input type="number" id="stealth" name="stealth" min="0" value="0"><br><br>

    <label for="survival">Survival:</label><br>
    <input type="number" id="survival" name="survival" min="0" value="0"><br><br>

        <input type="submit" value="Submit">
      </form>
<body>
  <h1>Class Table</h1>
   <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Race</th>
        <th>Class</th>
        <th>Gender</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($chars as $char) : ?>
  <tr>
     <td><?php echo $char['characterID']; ?></td>
     <td><?php echo $char['race']; ?></td>
     <td><?php echo $char['class']; ?></td>
     <td><?php echo $char['gender']; ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
 
<h2>------------------------------------</h2> 
<h1>Abilities Table</h1>

  <table>
    <thead>
      <tr>
        <th>abilityID</th>
        <th>Str</th>
        <th>Dex</th>
        <th>Con</th>
        <th>int</th>
        <th>wis</th>
        <th>char</th>
        <th>CharID</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($abilities as $ability) : ?>
  <tr>
     <td><?php echo $ability['abilityID']; ?></td>
     <td><?php echo $ability['strength']; ?></td>
     <td><?php echo $ability['dexterity']; ?></td>
     <td><?php echo $ability['constitution']; ?></td>
     <td><?php echo $ability['intelligence']; ?></td>
     <td><?php echo $ability['wisdom']; ?></td>
     <td><?php echo $ability['charisma']; ?></td>
     <td><?php echo $ability['characterID']; ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>

<h2>--------------------------------------------------</h2>

<h1>Skills Table</h1>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Acrobatics</th>
            <th>Animal Handling</th>
            <th>Arcana</th>
            <th>Athletics</th>
            <th>Deception</th>
            <th>History</th>
            <th>Insight</th>
            <th>Intimidation</th>
            <th>Investigation</th>
            <th>Medicine</th>
            <th>Nature</th>
            <th>Perception</th>
            <th>Performance</th>
            <th>Persuasion</th>
            <th>Religion</th>
            <th>Sleight of Hand</th>
            <th>Stealth</th>
            <th>Survival</th>
            <th>Character ID</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($skills as $skill) : ?>
            <tr>
                <td><?php echo $skill['skillID']; ?></td>
                <td><?php echo $skill['acrobatics']; ?></td>
                <td><?php echo $skill['animalHandling']; ?></td>
                <td><?php echo $skill['arcana']; ?></td>
                <td><?php echo $skill['athletics']; ?></td>
                <td><?php echo $skill['deception']; ?></td>
                <td><?php echo $skill['history']; ?></td>
                <td><?php echo $skill['insight']; ?></td>
                <td><?php echo $skill['intimidation']; ?></td>
                <td><?php echo $skill['investigation']; ?></td>
                <td><?php echo $skill['medicine']; ?></td>
                <td><?php echo $skill['nature']; ?></td>
                <td><?php echo $skill['perception']; ?></td>
                <td><?php echo $skill['performance']; ?></td>
                <td><?php echo $skill['persuasion']; ?></td>
                <td><?php echo $skill['religion']; ?></td>
                <td><?php echo $skill['sleightOfHand']; ?></td>
                <td><?php echo $skill['stealth']; ?></td>
                <td><?php echo $skill['survival']; ?></td>
                <td><?php echo $skill['characterID']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


</body>

</html>

