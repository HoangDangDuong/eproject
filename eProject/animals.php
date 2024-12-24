<?php
require_once ('connection.php');
$sql="SELECT*FROM animals";
$result=$conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body{
                margin:10px;
            }
        </style>
    </head>
    <body>
        <h2 style="text-align:center;color:blue;">Animals</h2>
        <hr>
        <div style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;The Aquarium was exhibited on a big area with more than 300 typical and valuable marine species (sea turtles , sharks, manta rays, eels, grouper, coral fish, sea fish, lobster,…) serving research, sightseeing as well as community education.</div>
     <hr>
        <?php foreach($result as $row):  ?>
            <div class="row">
                <div class="col-md-4"><img src="admin1/img/<?php echo $row['images']; ?>" width="100%"></div>
                <div class="col-md-8">
                    <h2><?php echo $row['name']; ?></h2>
                   <?php echo $row['description'] ?>
                </div>
            </div>
       
        <hr>
        <?php endforeach ?>
            
        
    </body>

</html>
