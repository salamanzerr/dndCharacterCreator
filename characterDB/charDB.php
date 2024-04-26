<!-- charDB.php -->

<?php
require_once('../database.php');

$query = 'SELECT characters.characterID, charName, race, class, gender,
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
   <link rel="stylesheet" type="text/css" href="../landing/style.css"/>
   <link rel="stylesheet" href="../resources/styleCharCreator.css">
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      /*background-color: white;*/
      margin: 1%;
      text-decoration: none;
      color: black;
      background-color:#161717;
      height: 15px;
      opacity: 0.8;
    }

    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      /*background-color: white;*/
    }

    .edit-button {
      display: block;
      margin: 0 auto;
    }
    table tr:nth-child(odd) {
    background-color: #f2f2f2; /* Light gray for odd rows */
    }

    table tr:nth-child(even) {
    background-color: #ffffff; /* White for even rows */
    }

  </style>

</head>

<body>

<h1>Character Information</h2>

  <h1>Class Table</h1>

<main>
 <div class="nav-container">
      <nav>
         <ul>
            <li><a href="../characterCreator/charCreator.php">Create from scratch</a></li>
            <li><a href="generateCharacter.php">Generate using AI</a></li>
            <li><a href="generateImage.php">Generate an image of a character</a></li>
            <li><a href="../characterDB/charDB.php">View the character database</a></li>

            <li><a href="../bugReport/bugReport.php">Report a bug</a></li>
         </ul>
      </nav>
    </div>
</main>
   <div style="overflow-x: auto;">
   <table>
    <thead>
      <tr>
         <th>ID</th>
        <th>Name</th>
        <th>Race</th>
        <th>Class</th>
        <th>Gender</th>
        <!--<th>Ability ID</th>-->
        <th>Strength</th>
        <th>Dexterity</th>
        <th>Constitution</th>
        <th>Intelligence</th>
        <th>Wisdom</th>
        <th>Charisma</th>
        <!--<th>Skill ID</th>-->
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
     <td><?php echo $product['charName']; ?></td>
     <td><?php echo $product['race']; ?></td>
     <td><?php echo $product['class']; ?></td>
     <td><?php echo $product['gender']; ?></td>
     <!--<td><?php //echo $product['abilityID']; ?></td>-->
     <td><?php echo $product['strength']; ?></td>
     <td><?php echo $product['dexterity']; ?></td>
     <td><?php echo $product['constitution']; ?></td>
     <td><?php echo $product['intelligence']; ?></td>
     <td><?php echo $product['wisdom']; ?></td>
     <td><?php echo $product['charisma']; ?></td>
     <!--<td><?php //echo $product['skillID']; ?></td>-->
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
        <form action="../updateCharacter/update.php" method="post">
                <input type="hidden" name="characterID"
                       value="<?php echo htmlspecialchars($product['characterID']); ?>">
                <input type="submit" value="Edit">
            </form>
     </td>
  </tr>
  <?php endforeach; ?>
  </tbody>
  </table>
</div

</body>

</html>
