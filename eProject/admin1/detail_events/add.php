<?php
$sql="SELECT *FROM events";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){
   $title =$_POST['title'];
   $times=$_POST['times'];

   $images = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];
  
   $information =$_POST['information'];
   $timing=$_POST['timing'];
   $sql = "INSERT INTO  events ( title, times ,images,information,timing)
  VALUES (?,?,?,?,?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("sssss",$title,$times,$images,$information,$timing);
  $stmt->execute();

  move_uploaded_file($image_tmp, 'img/'.$images);
  header('location: events_db.php?page_layout=ds');
  
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
          <label for="">Title </label>
          <input type="text" name="title"  class="form-control" required>
        </div>
          <div class="form-group">
          <label for="">Time</label>
          <input type="date" name="times"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Specific time</label>
          <input type="time" name="timing"  class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">Images</label>
          <input type="file" name="image" accept="image/*" class="form-control" required >
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