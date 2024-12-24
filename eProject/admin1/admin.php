<?php
session_start();
require_once('../connection.php');
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manager</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    </head>

    <body >
    <?php 
       if (isset($_SESSION['username']) && $_SESSION['username']){
           echo 'Welcome '.$_SESSION['username'];
           echo '<a style="margin-left:85%;" href="../logout.php">Logout</a>';
       }   
       ?>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a href="home_db.php" class="nav-link">Home</a>
  </li>
  <li class="nav-item">
    <a id="item" class="nav-link" href="events_db.php">Events</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="animals_db.php">Animals</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="aquarium_db.php">Aquarium</a>
  </li>
  <li class="nav-item">
     <a class="nav-link" href="images_db.php">Images</a>
  </li>
  <li class="nav-item">
     <a class="nav-link" href="contact_db.php">Contact</a>
  </li>
</ul>   
<div > 
    <h2 style="text-align:center; background-color:#ced9e3;">Data Management</h2>
    
   
    </body>

</html>
