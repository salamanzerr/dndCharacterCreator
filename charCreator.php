<?php
require_once('database.php');

$query = 'SELECT * FROM characters';
$statement = $db->prepare($query);
//$statement->bindValue(':character_id', $character_id);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();

$query2 = 'SELECT * FROM abilities';
$statement2 = $db->prepare($query2);
//$statement->bindValue(':character_id', $character_id);
$statement2->execute();
$products2 = $statement2->fetchAll();
$statement2->closeCursor();

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

        <h2>Abilities</h2>
        <label for="strength">Strength:</label><br>
        <input type="text" id="strength" name="strength" required><br><br>

        <label for="dexterity">Dexterity:</label><br>
        <input type="text" id="dexterity" name="dexterity" required><br><br>

        <label for="constitution">Constitution:</label><br>
        <input type="text" id="constitution" name="constitution" required><br><br>

        <label for="intelligence">Intelligence:</label><br>
        <input type="text" id="intelligence" name="intelligence" required><br><br>

        <label for="wisdom">Wisdom:</label><br>
        <input type="text" id="wisdom" name="wisdom" required><br><br>

        <label for="charisma">Charisma:</label><br>
        <input type="text" id="charisma" name="charisma" required><br><br>

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
  <?php foreach ($products as $product) : ?>
  <tr>
     <td><?php echo $product['characterID']; ?></td>
     <td><?php echo $product['race']; ?></td>
     <td><?php echo $product['class']; ?></td>
     <td><?php echo $product['gender']; ?></td>
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
  <?php foreach ($products2 as $product2) : ?>
  <tr>
     <td><?php echo $product2['abilityID']; ?></td>
     <td><?php echo $product2['strength']; ?></td>
     <td><?php echo $product2['dexterity']; ?></td>
     <td><?php echo $product2['constitution']; ?></td>
     <td><?php echo $product2['intelligence']; ?></td>
     <td><?php echo $product2['wisdom']; ?></td>
     <td><?php echo $product2['charisma']; ?></td>
     <td><?php echo $product2['characterID']; ?></td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
  <footer>Copyright &copy; 2024 Alec Manzer, Sam Zito, 
  Fernando Moran, Janine Beall, Kennedy Greene</footer>
</body>

</html>

