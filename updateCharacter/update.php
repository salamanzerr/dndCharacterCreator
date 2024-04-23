<!-- update.php -->

<?php
require_once('database.php');

// check if characterID is passed
if(isset($_POST['characterID'])){
   $characterID = $_POST['characterID'];

   // Fetch character data
    $queryCharacter = "SELECT * FROM characters WHERE characterID = :characterID";
    $statementCharacter = $db->prepare($queryCharacter);
    $statementCharacter->bindValue(':characterID', $characterID);
    $statementCharacter->execute();
    $character = $statementCharacter->fetch();
    $statementCharacter->closeCursor();   

   // get abilities
   $queryAbilities = "SELECT * FROM abilities WHERE characterID = :characterID";
   $statementAbilities = $db->prepare($queryAbilities);
   $statementAbilities->bindValue(':characterID', $characterID);
   $statementAbilities->execute();
   $abilities = $statementAbilities->fetchAll();
   $statementAbilities->closeCursor();

   // get skills
$querySkills = "SELECT * FROM skills WHERE characterID = :characterID";
$statementSkills = $db->prepare($querySkills);
$statementSkills->bindValue(':characterID', $characterID);
$statementSkills->execute();
$skills = $statementSkills->fetchAll();
$statementSkills->closeCursor();

}
else{
   //redirects back
   header("charDB.php");
   exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Character EDIT</title>
  <link rel="stylesheet" href="styles.css">
</head>
</body>
<h2>Character Information</h2>
<h1>Edit Character</h1>
    <form action="processUpdate.php" method="post">
        <input type="hidden" name="characterID" value="<?php echo htmlspecialchars($character['characterID']); ?>">
        <table>
            <thead>
                <tr>
                    <th>Race</th>
                    <th>Class</th>
                    <th>Gender</th>
                    <th>Strength</th>
                    <th>Dexterity</th>
                    <th>Constitution</th>
                    <th>Intelligence</th>
                    <th>Wisdom</th>
                    <th>Charisma</th>
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
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" name="race" 
                               value="<?php echo htmlspecialchars($character['race']); ?>" required></td>
                    <td><input type="text" name="class" 
                               value="<?php echo htmlspecialchars($character['class']); ?>" required></td>
                    <td><input type="text" name="gender" 
                               value="<?php echo htmlspecialchars($character['gender']); ?>" required></td>
                    <?php foreach ($abilities as $ability) : ?>
                        <td><input type="number" name="strength[]" 
                             value="<?php echo htmlspecialchars($ability['strength']); ?>" min="0" required></td>
                        <td><input type="number" name="dexterity[]" 
                             value="<?php echo htmlspecialchars($ability['dexterity']); ?>" min="0" required></td>
                        <td><input type="number" name="constitution[]" 
                             value="<?php echo htmlspecialchars($ability['constitution']); ?>" min="0" required></td>
                        <td><input type="number" name="intelligence[]" 
                             value="<?php echo htmlspecialchars($ability['intelligence']); ?>" min="0" required></td>
                        <td><input type="number" name="wisdom[]" 
                             value="<?php echo htmlspecialchars($ability['wisdom']); ?>" min="0" required></td>
                        <td><input type="number" name="charisma[]" 
                             value="<?php echo htmlspecialchars($ability['charisma']); ?>" min="0" required></td>
                    <?php endforeach; ?>
                    <?php foreach ($skills as $skill) : ?>
			<td><input type="number" name="acrobatics[]" value="<?php echo htmlspecialchars($skill['acrobatics']); ?>" min="0" required></td>

			<td><input type="number" name="animalHandling[]" value="<?php echo htmlspecialchars($skill['animalHandling']); ?>" min="0" required></td>
			<td><input type="number" name="arcana[]" value="<?php echo htmlspecialchars($skill['arcana']); ?>" min="0" required></td>
			<td><input type="number" name="athletics[]" value="<?php echo htmlspecialchars($skill['athletics']); ?>" min="0" required></td>
			<td><input type="number" name="deception[]" value="<?php echo htmlspecialchars($skill['deception']); ?>" min="0" required></td>
			<td><input type="number" name="history[]" value="<?php echo htmlspecialchars($skill['history']); ?>" min="0" required></td>
			<td><input type="number" name="insight[]" value="<?php echo htmlspecialchars($skill['insight']); ?>" min="0" required></td>
			<td><input type="number" name="intimidation[]" value="<?php echo htmlspecialchars($skill['intimidation']); ?>" min="0" required></td>
			<td><input type="number" name="investigation[]" value="<?php echo htmlspecialchars($skill['investigation']); ?>" min="0" required></td>
			<td><input type="number" name="medicine[]" value="<?php echo htmlspecialchars($skill['medicine']); ?>" min="0" required></td>
			<td><input type="number" name="nature[]" value="<?php echo htmlspecialchars($skill['nature']); ?>" min="0" required></td>
			<td><input type="number" name="perception[]" value="<?php echo htmlspecialchars($skill['perception']); ?>" min="0" required></td>
			<td><input type="number" name="performance[]" value="<?php echo htmlspecialchars($skill['performance']); ?>" min="0" required></td>
			<td><input type="number" name="persuasion[]" value="<?php echo htmlspecialchars($skill['persuasion']); ?>" min="0" required></td>
			<td><input type="number" name="religion[]" value="<?php echo htmlspecialchars($skill['religion']); ?>" min="0" required></td>
			<td><input type="number" name="sleightOfHand[]" value="<?php echo htmlspecialchars($skill['sleightOfHand']); ?>" min="0" required></td>
			<td><input type="number" name="stealth[]" value="<?php echo htmlspecialchars($skill['stealth']); ?>" min="0" required></td>
			<td><input type="number" name="survival[]" value="<?php echo htmlspecialchars($skill['survival']); ?>" min="0" required></td>
                    <?php endforeach; ?>
                </tr>
            </tbody>
        </table>
        <input type="submit" value="Update Character">
    </form>
</body>
</html>
