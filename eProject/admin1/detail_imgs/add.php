<?php
$sql="SELECT *FROM images";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){
   $images = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
   
   $sql = "INSERT INTO  images (images)
  VALUES (?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("s",$images);
  $stmt->execute();
  move_uploaded_file($image_tmp, 'img/'.$images);

  header('location: images_db.php?page_layout=ds');
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
          <label for="">Images</label>
          <input type="file" name="image" accept="image/*" class="form-control" required >
        </div>
       <button type="submid" name="sbm" class="btn btn-success " >Add</button>
</form>    
</div>
</div>  
</div>