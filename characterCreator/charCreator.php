<!--charCreator.php-->
<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../resources/styleCharCreator.css">
        <link rel="stylesheet" type="text/css" href="../landing/style.css"/>
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
        #footer {
           position: relative;
           bottom: 0;
           width: 100%;
           height: 2.5rem;
           color: white;
        }
    </style>
    </head>
    <body>

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

        <div class="parent">
            <div class="child" id="charName">
                <form action="../characterDB/form.php" method="post">
                    <label for="charName">Character Name:</label>
                    <input type="text" id="charName" name="charName" required><br>
            </div>
            <div class="child" id="background">
                    <label for="race">Race:</label>
                    <input type="text" id="race" name="race" required><br>

                    <label for="class">Class:</label>
                    <input type="text" id="class" name="class" required><br>

                    <label for="gender">Gender:</label>
                    <input type="text" id="gender" name="gender" required><br>
            </div>

            <div class="child" id="abilities">
                <label for="strength">Strength: </label>
                <input type="number" id="strength" name="strength" min="0" max="20" value="0"><br>

                <label for="dexterity">Dexterity: </label>
                <input type="number" id="dexterity" name="dexterity" min="0" max="20" value="0"required><br>

                <label for="constitution">Constitution: </label>
                <input type="number" id="constitution" name="constitution" min="0" max="20" value="0"required><br>

                <label for="intelligence">Intelligence: </label>
                <input type="number" id="intelligence" name="intelligence" min="0" max="20" value="0" required><br>

                <label for="wisdom">Wisdom: </label>
                <input type="number" id="wisdom" name="wisdom" min="0" max="20" value="0" required><br>

                <label for="charisma">Charisma: </label>
                <input type="number" id="charisma" name="charisma" min="0" max="20"  value="0"required><br>
            </div>
            <div class="child" id="skills">
                    <label for="acrobatics">Acrobatics:</label>
                    <input type="number" id="acrobatics" name="acrobatics" min="0" value="0"><br>

                    <label for="animalHandling">Animal Handling:</label>
                    <input type="number" id="animalHandling" name="animalHandling" min="0" value="0"><br>

                    <label for="arcana">Arcana:</label>
                    <input type="number" id="arcana" name="arcana" min="0" value="0"><br>

                    <label for="athletics">Athletics:</label>
                    <input type="number" id="athletics" name="athletics" min="0"  value="0"><br>

                    <label for="deception">Deception:</label>
                    <input type="number" id="deception" name="deception" min="0" value="0"><br>

                    <label for="history">History:</label>
                    <input type="number" id="history" name="history" min="0" value="0"><br>

                    <label for="insight">Insight:</label>
                    <input type="number" id="insight" name="insight" min="0" value="0"><br>

                    <label for="intimidation">Intimidation:</label>
                    <input type="number" id="intimidation" name="intimidation" min="0" value="0"><br>

                    <label for="investigation">Investigation:</label>
                    <input type="number" id="investigation" name="investigation" min="0" value="0"><br>

                    <label for="medicine">Medicine:</label>
                    <input type="number" id="medicine" name="medicine" min="0" value="0"><br>

                    <label for="nature">Nature:</label>
                    <input type="number" id="nature" name="nature" min="0" value="0"><br>

                    <label for="perception">Perception:</label>
                    <input type="number" id="perception" name="perception" min="0" value="0"><br>

                    <label for="performance">Performance:</label>
                    <input type="number" id="performance" name="performance" min="0" value="0"><br>

                    <label for="persuasion">Persuasion:</label>
                    <input type="number" id="persuasion" name="persuasion" min="0" value="0"><br>

                    <label for="religion">Religion:</label>
                    <input type="number" id="religion" name="religion" min="0" value="0"><br>

                    <label for="sleightOfHand">Sleight of Hand:</label>
                    <input type="number" id="sleightOfHand" name="sleightOfHand" min="0" value="0"><br>

                    <label for="stealth">Stealth:</label>
                    <input type="number" id="stealth" name="stealth" min="0" value="0"><br>

                    <label for="survival">Survival:</label>
                    <input type="number" id="survival" name="survival" min="0" value="0"><br>

                    <input type="submit" value="Submit" style="height: 4%; width: 50%">
                </form>
            </div>
        </div>
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
    <div id="footer">
       <footer style="">Copyright &copy; 2024 Alec Manzer, Sam Zito, Fernando Moran, Janine Beall, Kennedy Greene</footer>
    </div>
                    
</body>
</html>
