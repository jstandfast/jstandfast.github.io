<!DOCTYPE html>

<?php
  include 'q-functions.php';
?>

<html lang="en">
  <head>
    <title>Support Page - JasonStandfast.com</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/w3.css">
    <link rel="stylesheet" href="../css/q-style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <style>
        body {font-family: "Lato", sans-serif}
      </style>
  </head>
  <body>

    <!-- Navbar -->
    <div class="w3-top">
      <div class="w3-bar w3-black w3-card">
        <a href="../index.html" class="q-uppercase w3-bar-item w3-button w3-padding-large">Home</a>
      </div>
    </div>

    <!-- Page content -->
    <div class="w3-content" style="max-width:2000px;margin-top:46px">

      <!-- Main Support Section -->
      <div class="w3-container w3-content w3-center w3-padding-64" style="max-width:800px" id="support">

        <?php

          $con = connectToDB();

          $name = $_POST['fullname'];
          $email = $_POST['email'];
          $message = htmlspecialchars($_POST['message']);
          $type ="";

          if(isset($_POST['issue']) || isset($_POST['feedback']) || isset($_POST['other'])) {
            if(isset($_POST['issue'])) {
              $type .= "issue*";
            }

            if(isset($_POST['feedback'])) {
              $type .= "feedback*";
            } 

            if(isset($_POST['other'])) {
              $type .= "other*";
            }
            
          } else {
            $type = "default*";
          }

          if(addMessageToDB($con,$name,$email,$message,$type)) {
            echo "<h2 class='q-uppercase w3-wide'>Message Sent</h2>
                <p class='w3-justify w3-center'>Thank you for sending a message. We will respond within 48 hours.</p>
                <p class='w3-justify w3-center'>Here is a transcript of your message to JasonStandfast.com:</p>
                <p><i>". $message . "</i></p>
              </div>";
          } else {
            echo "<h2 class='q-uppercase w3-wide'>Something Went Wrong</h2>
                <p class='w3-justify w3-center'>Thank you for sending a message. We will respond within 48 hours.</p>
                <p class='w3-justify w3-center'>Here is a transcript of your message to JasonStandfast.com:</p>
                <p><i>" . $message . "</i></p>
              </div>";
          }

          $con->close();

        ?>

    <!-- End Page Content -->
    </div>

    <!-- Footer -->
    <footer class="w3-container w3-padding-64 w3-center w3-opacity w3-light-grey w3-xlarge">
      <a href="https://github.com/jstandfast" target="_blank"><i class="fa fa-github w3-hover-opacity"></i></a>
      <a href="https://www.linkedin.com/in/jstandfast/" target="_blank"><i class="fa fa-linkedin w3-hover-opacity"></i></a>
      <a href="https://www.facebook.com/jstandfast" target="_blank"><i class="fa fa-facebook-official w3-hover-opacity"></i></a>
      <p class="w3-medium">Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
    </footer>

  </body>
</html>
