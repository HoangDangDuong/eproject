<?php
$sql="SELECT *FROM aquarium";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){
   $title =$_POST['title'];

   $images = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   $location= $_POST['location']; 
   $information =$_POST['information'];

   $sql = "INSERT INTO  aquarium ( title,images,location,information)
  VALUES (?,?,?,?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("ssss",$title,$images,$location,$information);
  $stmt->execute();
  move_uploaded_file($image_tmp, 'img/'.$images);

  header('location: aquarium_db.php?page_layout=ds');
}
?>
<div class="container-fluid">
<div class="card">
    <div class="card-header">
  <h2>Thêm<h2>
    </div>
    <div class="card-body">
<form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Title </label>
          <input type="text" name="title"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Images</label>
          <input type="file" name="image" accept="image/*" class="form-control" required >
        </div>
        <div class="form-group">
          <label for="">Location </label>
          <input type="text" name="location"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Information</label>
          <textarea class="form-control" rows="3"  name="information" required></textarea>
        </div>
       <button type="submid" name="sbm" class="btn btn-success " >Add</button>
</form>    
</div>
</div>  
</div>