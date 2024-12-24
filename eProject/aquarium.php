<?php
require_once('connection.php');
$sql = "SELECT * FROM aquarium";
$query = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aquarium</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="jumbotron text-center">
  <h1>Aquarium</h1>
</div>

    <?php
          while( $row = mysqli_fetch_assoc($query)){?>
<div class="container">
  <div class="row">
    <div class="col">
      <h3 class="tit"><?php echo $row['title']; ?></h3>
      <div> <?php echo $row['information']; ?></div>
      <p class="loca"> <?php echo $row['location']; ?></p>
      <div class="ho"><img  src="admin1/img/<?php echo $row ['images']; ?>" ></div>
      <hr>
   
    </div>
  </div>
</div>
  <?php } ?>   



</body>
</html> 
