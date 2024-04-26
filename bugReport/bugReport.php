<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" type="text/css" href="../landing/style.css"/>
  <title>Report Bug / Contact Us</title>

</head>

<body>
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

    <div class="container">
      <h1>Report Bug / Contact Us</h1>
      <?php
        // Define and initialize variables
        $name = $email = $subject = $message = "";
        $nameErr = $emailErr = $subjectErr = $messageErr = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Validate name
          if (empty($_POST["name"])) {
            $nameErr = "Name is required";
          } else {
            $name = test_input($_POST["name"]);
            // Check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
              $nameErr = "Only letters and white space allowed";
            }
          }

          // Validate email
          if (empty($_POST["email"])) {
            $emailErr = "Email is required";
          } else {
            $email = test_input($_POST["email"]);
            // Check if email address is valid
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              $emailErr = "Invalid email format";
            }
          }

          // Validate subject
          if (empty($_POST["subject"])) {
            $subjectErr = "Subject is required";
          } else {
            $subject = test_input($_POST["subject"]);
          }

          // Validate message
          if (empty($_POST["message"])) {
            $messageErr = "Message is required";
          } else {
            $message = test_input($_POST["message"]);
          }
        }

        // test_input function for formatting user inputs
        function test_input($data) {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
        }
      ?>

      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name">
        <span class="error"><?php echo $nameErr;?></span>

        <label for="email">Your Email:</label>
        <input type="text" id="email" name="email">
        <span class="error"><?php echo $emailErr;?></span>

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject">
        <span class="error"><?php echo $subjectErr;?></span>

        <label for="message">Message:</label>
        <textarea id="message" name="message"></textarea>
        <span class="error"><?php echo $messageErr;?></span>

        <input type="submit" name="submit" value="Submit">
      </form>

      <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($subjectErr) && empty($messageErr)) {
          // Send email
          $to = "amanzer@highpoint.edu";
          $subject = "Bug Report / Contact Us - " . $subject;
          $message = "From: " . $name . "\n" . "Email: " . $email . "\n\n" . $message;
          mail($to, $subject, $message);
          echo "<p class='success'>Your message has been sent successfully. We will get back to you as soon as possible.</p>";
        }
      ?>
    </div>
    <footer style="text-align: center; color: white">Copyright &copy; <?php $date = date('Y'); echo $date ?> Alec Manzer, Sam Zito,
      Fernando Moran, Janine Beall, Kennedy Greene</footer>
  </body>
  </html>
