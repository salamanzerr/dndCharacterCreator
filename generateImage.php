<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canvas Drawing</title>
    <link rel="stylesheet" type="text/css" href="landing/style.css"/>
    <link rel="stylesheet" href="resources/styleCharCreator.css">
    <style>
        body, html {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        canvas {
            display: block;
            background-color: #404040; /* Set canvas background color */
        }
        #controls {
            position: fixed;
            top: 45px;
            left: 10px;
        }
        #eraseButton, #colorPicker, #saveButton {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            background-color: #333f31;
            border-radius: 25px;
            border-color: #5B9F6B;
            color: white;
            margin-right: 10px;
            margin-top: 35%;
        }
        #eraseButton:hover, #colorPicker:hover, #saveButton:hover {
            background-color: #3f6b4a;
        }

        #eraseButton:active, #colorPicker:active, #saveButton:active {
            transform: translateY(1px); /* Add slight downward movement on click */
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
<main>
<div class="nav-container" style="position: absolute; z-index: 1;">
        <nav>
           <ul>
              <li><a href="landing/index.html">Home</a></li>
              <li><a href="characterCreator/charCreator.php">Create from scratch</a></li>
              <li><a href="generateCharacter.php">Generate using AI</a></li>
              <li><a href="generateImage.php">Generate an image of a character</a></li>
              <li><a href="characterDB/charDB.php">View the character database</a></li>

              <li><a href="bugReport/bugReport.php">Report a bug</a></li>
           </ul>
        </nav>
      </div>
</main>
    <canvas id="myCanvas"></canvas>
    <div id="controls">
        <input type="color" id="colorPicker" value="#000000">
        <button id="eraseButton">Erase</button>
        <button id="saveButton">Save</button>
    </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/110/three.min.js"></script>
    <script src="resources/script.js"></script>
<div id="toggleButton">
        <button id="toggleDiceButton">Toggle Dice</button>
    </div>
    <div id="diceContainer">
        <button id="rollButton">Roll Dice</button>
        <canvas id="diceCanvas"></canvas>
        <div id="diceNumber"></div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var canvas = document.getElementById("myCanvas");
            var ctx = canvas.getContext("2d");

            // Set canvas dimensions to fill the screen
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;

            var drawing = false; // Track if the mouse is down (drawing)
            var currentColor = '#000000'; // Default drawing color

            function startDrawing(e) {
                drawing = true;
                draw(e); // Start drawing
            }

            function draw(e) {
                if (!drawing) return;
                ctx.lineWidth = 5;
                ctx.lineCap = 'round';
                ctx.strokeStyle = currentColor; // Set drawing color

                // Set the line's start point at the last position
                ctx.lineTo(e.clientX, e.clientY);
                ctx.stroke();

                // Begin a new path to allow continuous drawing
                ctx.beginPath();
                ctx.moveTo(e.clientX, e.clientY);
            }

            function stopDrawing() {
                drawing = false;
                ctx.beginPath(); // Begin a new path to avoid continuous lines
            }

            // Mouse Event Listeners
            canvas.addEventListener('mousedown', startDrawing);
            canvas.addEventListener('mousemove', draw);
            canvas.addEventListener('mouseup', stopDrawing);
            canvas.addEventListener('mouseout', stopDrawing); // Stop drawing when mouse leaves the canvas

            // Touch events for mobile compatibility
            canvas.addEventListener('touchstart', function(e) {
                e.preventDefault(); // Prevent scrolling when touching the canvas
                startDrawing(e.touches[0]); // Use the first touch point
            }, { passive: false });

            canvas.addEventListener('touchmove', function(e) {
                e.preventDefault(); // Prevent scrolling when touching the canvas
                draw(e.touches[0]); // Use the first touch point
            }, { passive: false });

            canvas.addEventListener('touchend', stopDrawing);

            // Erase Button Click Event Listener
            document.getElementById('eraseButton').addEventListener('click', function() {
                ctx.clearRect(0, 0, canvas.width, canvas.height); // Clear the canvas
            });

            // Color Picker Change Event Listener
            document.getElementById('colorPicker').addEventListener('change', function() {
                currentColor = this.value; // Update current drawing color
            });

            // Save Button Click Event Listener
            document.getElementById('saveButton').addEventListener('click', function() {
                var image = canvas.toDataURL("image/png").replace("image/png", "image/octet-stream");
                var link = document.createElement('a');
                link.download = 'drawing.png';
                link.href = image;
                link.click();
            });
        });
    </script>
</body>
</html>
