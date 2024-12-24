<?php
$sql="SELECT *FROM contact";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){
   $location =$_POST['location'];
   $tel=$_POST['tel'];
   $fax =$_POST['fax'];
   $email=$_POST['email'];
   $sql = "INSERT INTO  contact (location, tel, fax, email)
  VALUES (?,?,?,?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("siis",$location,$tel,$fax,$email);
  $stmt->execute();

  header('location: contact_db.php?page_layout=ds');
  
}
?>
<div class="container-fluid">
<div class="card">
    <div class="card-header">
  <h2>Add<h2>
    </div>
    <div class="card-body">
<form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Location </label>
          <input type="text" name="location"  class="form-control" required>
        </div>
          <div class="form-group">
          <label for="">TEL</label>
          <input type="phone" name="tel"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">FAX</label>
          <input type="phone" name="fax"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" name="email"  class="form-control" required>
        </div>
        
       <button type="submid" name="sbm" class="btn btn-success " >Add</button>
</form>    
</div>
</div>  
</div>