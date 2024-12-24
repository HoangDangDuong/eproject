
<?php
require_once('connection.php');
$sql = "SELECT * FROM events";
$query = mysqli_query($conn,$sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Calendar</title>
    <link rel="stylesheet" href="style.css" />
  <style>
       
  </style>
  </head>
 
  <body>
        <div class="event-container" >
          <h3 class="topic">Events</h3>
   <?php
                while( $row = mysqli_fetch_assoc($query)){?>
          <div class="event">
            <div class="event-left">
              <div class="event-date">
                <div class=" event-img">
                <img  src="admin1/img/<?php echo $row ['images']; ?>" >
                </div>
                
                <div class=year><?php echo date("F j, Y", strtotime($row['times'])); ?></div>
              </div>
            </div>

            <div class="event-right">
              <h3 class="event-title"><?php echo $row['title']; ?>
                </h3>

              <div class="event-description">
                <?php echo $row['information']; ?>
              </div>

              <div class="event-timing">
              Start time: <?php  echo date("H:i A", strtotime($row['timing']));?>
              </div>
            </div>
          </div>
          <?php } ?>
        </div>
  </body>
</html>