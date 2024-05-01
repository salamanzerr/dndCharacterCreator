<!-- update.php -->

<?php
require_once('../database.php');

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
  <link rel="stylesheet" href="../landing/style.css">
  <style>

  body{
  background-image: url("../resources/dndbackground.jpg");
}

  input, select, textarea {
    width: auto;       /* Makes the form elements take the full width of their container */
    height: 50px;      /* Sets a specific height for input fields and selects */
    /*padding: 10px;*/     /* Adds space inside the form elements around the content */
    font-size: 16px;   /* Increases the text size inside the form elements */
    border: 1px solid #ccc;  /* Optionally adds a border */
    box-sizing: border-box;  /* Includes padding and border in the width and height */
}

textarea {
    height: 50px;     /* Larger height for text areas to accommodate more text */
}

  </style>
  <style>
        body {
           /* margin: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
            position: relative;
            background-color: black;*/
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            justify-content: center;
            align-items: center;
            display: block;
            margin: 0% auto; /* Center the button horizontally */
            background-color: #333f31;
            border-radius: 25px;
            border-color: #5B9F6B;
        }


button:hover {
    background-color: #3f6b4a; /* Darker green */
    border-radius: 25px;
}

button:active {
    transform: translateY(1px); /* Add slight downward movement on click */
}
        #toggleButton {
            position: fixed;
            bottom: 10px;
            right: 10px;
        }
        #diceContainer {
            display: none;
            position: fixed;
            bottom: 10%;
            right: 0%;
            background-color: #292E28;
            border: 1px solid #5B9F6B;
            border-radius: 5px;
            padding: 0%;
            margin: 1%;
            text-align: center;
        }
        #diceCanvas {
            width: auto;
            height: auto;
            display: block;
            margin: 0 auto; /* Center the canvas horizontally */
        }
        #diceNumber {
            font-size: 24px;
            text-align: center;
            margin-top: 10px;
            color:  white;
            margin-bottom: 1%;
        }
        #rollButton{
            margin-top: 2%;
            margin-right: auto;
            margin-bottom: 0%;
            margin-left: auto;
            color: white;

        }
        #toggleDiceButton{
            color: white;
        }
    </style>

</head>
<body>

<h1>Character Information</h2>
<h1>Edit Character</h1>

<main>
 <div class="nav-container" style="margin: 2%">
      <nav>
         <ul>
            <li><a href="../landing/index.html">Home</a></li>
            <li><a href="../characterCreator/charCreator.php">Create from scratch</a></li>
            <li><a href="../generateCharacter.php">Generate using AI</a></li>
            <li><a href="../generateImage.php">Generate an image of a character</a></li>
            <li><a href="../characterDB/charDB.php">View the character database</a></li>

            <li><a href="../bugReport/bugReport.php">Report a bug</a></li>
         </ul>
      </nav>
    </div>
</main>


<div style="overflow-x: auto; margin: 2%">
    <form action="processUpdate.php" method="post">
        <input type="hidden" name="characterID" value="<?php echo htmlspecialchars($character['characterID']); ?>">
        <table>
            <thead style="color: white; text-decoration: none;
                   background-color:#161717;
                   border-radius: 25px;
                   border: 2px solid #74d68e;
                   width: auto;
                   height: 2%;
                   opacity: 0.8;
                   font-size: 1.5em">
                <tr>
                    <th>Name</th>
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
                    <td><input type="text" name="charName"
                               value="<?php echo htmlspecialchars($character['charName']); ?>" required></td>
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
        <input type="submit" value="Update Character" style="width: auto; border-radius: 15px">
    </form>
<div style="overflow-x: auto;">

</div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script>
    <script src="../resources/script.js"></script>
<div id="toggleButton">
        <button id="toggleDiceButton">Toggle Dice</button>
    </div>
    <div id="diceContainer">
        <button id="rollButton">Roll Dice</button>
        <canvas id="diceCanvas"></canvas>
        <div id="diceNumber"></div>
    </div>

</body>
</html>
