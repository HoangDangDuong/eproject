<?php 
require_once('connection.php');
$sql="SELECT*FROM contact";
$result=$conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    
  </head>
  <body>
    <section id="contact">
       <div class="container">
           <h3 class="text-center text-uppercase">contact us</h3>
           <p class="text-center w-75 m-auto">If you have any questions, please feel free to contact us for immediate answers</p>
           <div class="row">
           <?php foreach($result as $a): ?>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-phone fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">call us</h4>
                    <p><i class="fas fa-phone me-3"></i>+<?php echo $a['tel']; ?></p>
                    <p><i class="fas fa-print me-3"></i>+<?php echo $a['fax']; ?></p>
                  </div>
                </div>
             </div>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-map-marker fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">loaction</h4>
                   <address><?php echo $a['location']; ?></address>
                  </div>
                </div>
             </div>
             
             <div class="col-sm-12 col-md-6 col-lg-3 my-5">
               <div class="card border-0">
                  <div class="card-body text-center">
                    <i class="fa fa-globe fa-5x mb-3" aria-hidden="true"></i>
                    <h4 class="text-uppercase mb-5">email</h4>
                    <p><?php echo $a['email']; ?></p>
                  </div>
                </div>
             </div>
             <?php endforeach ?>
             <div class="col-sm-12 col-md-6 col-lg-3 my-5" id="map" style="width:500px;height:500px;">
             <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24418.596973846325!2d-74.07079829919334!3d40.0904747327792!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c1872349a32337%3A0xa87e7ca4e2de4968!2sPoint%20Pleasant%20Beach!5e0!3m2!1svi!2s!4v1659519209877!5m2!1svi!2s" width="300" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" ></iframe>
              </div>
           </div>
       </div>
    </section>
  </body>
</html>