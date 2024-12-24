<?php
session_start();
include('connection.php');

if ($_POST){
    
    // lấy thông tin người dùng
    $username = addslashes($_POST["username"]);
    $password = addslashes($_POST["password"]);
    $username = mysqli_real_escape_string($conn,$username);
    $password = mysqli_real_escape_string($conn,$password);
    if ($username == "" || $password =="") {
        echo "Please enter username and password !";
    }else{
        $password=md5($password);
        
        $sql = "SELECT * FROM admin WHERE user_name = '$username' and pass_word = '$password' ";
        $query=$conn->query($sql);
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0) {
            echo '<script language="javascript">alert("Invalid usemame or password !"); window.location = "login.php";</script>';
           
        }else{
            echo '<script language="javascript">alert("Login successfully !"); window.location = "login.php";</script>';
            $_SESSION['username'] = $username;
            header('location:admin1/home_db.php');exit;
            die();
          
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>LOGIN</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
    body{background: #a6d2d9}.card{border: none;height: 320px}.forms-inputs{position: relative}.forms-inputs span{position: absolute;top:-25px;background-color: #fff;padding: 5px 10px;font-size: 15px}.forms-inputs input{height: 50px;width:100%;border: 2px solid #eee}.forms-inputs input:focus{box-shadow: none;outline: none;border: 2px solid #000}.btn{height: 50px}
    </style>
</head>
<body>
<h1 style="text-align:center;">ADMIN LOGIN</h1>
	<form action="login.php" method="POST">
<div class="container mt-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6"> 
            <div class="card px-5 py-5">
                <div class="form-data" v-if="!submitted">
                    <div class="forms-inputs mb-4"> <span>Username</span> <input type="text" name="username" autocomplete="off" required/>
                        
                    </div>
                    <div class="forms-inputs mb-4"> <span>Password</span> <input  type="password" name="password" autocomplete="off" />
                        
                    </div>
                    <div class="mb-3"> <button  type="submit" class="btn btn-dark w-100">Login</button> </div>
                </div>
                
        </div>
    </div>
</div>
	</form>
</body>
</html>