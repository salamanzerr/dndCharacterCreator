<!-- charDB.php -->

<?php
require_once('database.php');

$query = 'SELECT characters.characterID, race, class, gender, 
          abilityID, strength, dexterity, constitution, intelligence, wisdom, charisma,
          skillID, acrobatics, animalHandling, arcana, athletics, deception,
          history, insight, intimidation, investigation, medicine,
          nature, perception, performance, persuasion, religion,
          sleightOfHand, stealth, survival
          FROM characters
          JOIN abilities ON characters.characterID = abilities.characterID
          JOIN skills ON characters.characterID = skills.characterID';

$statement = $db->prepare($query);
$statement->execute();
$products = $statement->fetchAll();
$statement->closeCursor();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Character</title>
  <link rel="stylesheet" href="styles.css">

  <style>
    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }
    
    .edit-button {
      display: block;
      margin: 0 auto;
    }
  </style>

</head>

<h2>Character Information</h2>

<body>
  <h1>Class Table</h1>
   <table>
    <thead>
      <tr>
         <th>ID</th>
        <th>Race</th>
        <th>Class</th>
        <th>Gender</th>
        <th>Ability ID</th>
        <th>Strength</th>
        <th>Dexterity</th>
        <th>Constitution</th>
        <th>Intelligence</th>
        <th>Wisdom</th>
        <th>Charisma</th>
        <th>Skill ID</th>
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
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
  <?php foreach ($products as $product) : ?>
  <tr>
     <td><?php echo $product['characterID']; ?></td>
     <td><?php echo $product['race']; ?></td>
     <td><?php echo $product['class']; ?></td>
     <td><?php echo $product['gender']; ?></td>
     <td><?php echo $product['abilityID']; ?></td>
     <td><?php echo $product['strength']; ?></td>
     <td><?php echo $product['dexterity']; ?></td>
     <td><?php echo $product['constitution']; ?></td>
     <td><?php echo $product['intelligence']; ?></td>
     <td><?php echo $product['wisdom']; ?></td>
     <td><?php echo $product['charisma']; ?></td>
     <td><?php echo $product['skillID']; ?></td>
     <td><?php echo $product['acrobatics']; ?></td>
     <td><?php echo $product['animalHandling']; ?></td>
     <td><?php echo $product['arcana']; ?></td>
     <td><?php echo $product['athletics']; ?></td>
     <td><?php echo $product['deception']; ?></td>
     <td><?php echo $product['history']; ?></td>
     <td><?php echo $product['insight']; ?></td>
     <td><?php echo $product['intimidation']; ?></td>
     <td><?php echo $product['investigation']; ?></td>
     <td><?php echo $product['medicine']; ?></td>
     <td><?php echo $product['nature']; ?></td>
     <td><?php echo $product['perception']; ?></td>
     <td><?php echo $product['performance']; ?></td>
     <td><?php echo $product['persuasion']; ?></td>
     <td><?php echo $product['religion']; ?></td>
     <td><?php echo $product['sleightOfHand']; ?></td>
     <td><?php echo $product['stealth']; ?></td>
     <td><?php echo $product['survival']; ?></td>
     <td>
        <form action="update.php" method="post">
                <input type="hidden" name="characterID" 
                       value="<?php echo htmlspecialchars($product['characterID']); ?>">
                <input type="submit" value="Edit">
            </form>
     </td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>


</body>

</html>

