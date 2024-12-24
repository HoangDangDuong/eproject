<?php
$sql="SELECT *FROM home";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){


    $poster = $_FILES['poster']['name'];
    $poster_tmp = $_FILES['poster']['tmp_name'];

    $content =$_POST['content'];

    $images = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];
  
   $sql = "INSERT INTO  home (  poster ,content,images)
  VALUES (?,?,?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("sss",$poster,$content,$images);
  $stmt->execute();


  move_uploaded_file($poster_tmp, 'img/'.$poster);
  move_uploaded_file($images_tmp, 'img/'.$images);
  header('location: home_db.php?page_layout=ds');
  
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
          <label for="">Poster</label>
          <input type="file" name="poster" accept="image/*" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Content</label>
          <textarea class="form-control" rows="3"  name="content"></textarea>
        </div>
        <div class="form-group">
          <label for="">Images</label>
          <input type="file" name="image" accept="image/*" class="form-control">
        </div>
       <button type="submid" name="sbm" class="btn btn-success " >Add</button>
</form>    
</div>
</div>  
</div>