<?php 
require_once('connection.php');
$sql="SELECT*FROM contact";
$result=$conn->query($sql);
$result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Jenkinson Sea Life</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
      
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular-route.js"></script>
        <link rel="stylesheet" href="home.css">
    </head>

    <body ng-app="myApp">

        <nav class="navbar navbar-expand-sm navbar-light" style="background-color: #e3f2fd;">
            <!-- Brand -->
            <a class="navbar-brand" href="#">
                <img src="imgs/logo.png" style="width: 130px;">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="item" class="nav-link" href="#!">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a id="item" class="nav-link" href="#!events">EVENTS</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="item" class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                            EXPLORE
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#!aquarium">Aquarium</a>
                            <a class="dropdown-item" href="#!animals">Animals</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a id="item" class="nav-link" href="#!images">IMAGES</a>
                    </li>
                    <li class="nav-item">
                        <a id="item" class="nav-link" href="#!contact">CONTACT</a>
                    </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div ng-view></div>
        <script>
            var app = angular.module("myApp", ["ngRoute"]);
            app.config(function ($routeProvider) {
                $routeProvider
                    .when("/", {
                        templateUrl: "home.php",
                    })
                    .when("/events", {
                        templateUrl: "events.php",
                    })
                    .when("/aquarium", {
                        templateUrl: "aquarium.php",
                    })
                    .when("/animals", {
                        templateUrl: "animals.php",
                    })
                    .when("/images", {
                        templateUrl: "images.php",
                    })
                    .when("/contact", {
                        templateUrl: "contact.php",
                    })
                    .otherwise({
                        template: "<h1 style='color:red'>404</h1>",
                    });
            });

        </script>
        
        <footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

    </section>
    <!-- Section: Social media -->
  </div>
  <?php foreach($result as $a): ?>
  <div class="col-md-4 col-lg-6 mx-auto mb-md-0 mb-6">
          <!-- Links -->
          <p><i class="fas fa-home me-3"></i><?php echo $a['location']; ?></p>
          <p>
            <i class="fas fa-envelope me-3"></i>
            <?php echo $a['email']; ?>
          </p>
          <p><i class="fas fa-phone me-3"></i> +<?php echo $a['tel']; ?></p> 
 </div>
 <?php endforeach ?>
  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2022 Copyright:
    <a class="text-white" href="#">Jenkinson.com</a>
    <a href="index.php">  |Home|</a>
  </div>
  <!-- Copyright -->
</footer>
    </body>

</html>
