<?php
require_once('connection.php');
$sql="SELECT*FROM images";
$result=$conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Images</title>

    </head>

    <body>


<div class="container">
  <!-- <hr class="col-lg-4 col-md-6 col-12"> -->
 
  <div class="row">
  <?php foreach($result as $row):  ?>
    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
      <a href="admin1/img/<?php echo $row['images']; ?>" class="mb-0">
        <img class="w-100 shadow-1-strong rounded mb-2"  src="admin1/img/<?php echo $row['images']; ?>"alt="">
      </a>
    </div>
    <?php endforeach ?>
  </div>
</div>

    </body>

</html>
