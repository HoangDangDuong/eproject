<?php
$sql="SELECT *FROM animals";
$query = mysqli_query($conn ,$sql);

if(isset($_POST['sbm'])){
   $name =$_POST['name'];

   $images = $_FILES['image']['name'];
   $image_tmp = $_FILES['image']['tmp_name'];

   $description =$_POST['description'];


   $sql = "INSERT INTO  animals ( name, images , description)
  VALUES (?,?,?)";
  $stmt= $conn->prepare($sql);
  $stmt->bind_param("sss",$name,$images,$description);
  $stmt->execute();

  move_uploaded_file($image_tmp, 'img/'.$images);

  header('location: animals_db.php?page_layout=ds_ani');
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
          <label for="">Animal Name </label>
          <input type="text" name="name"  class="form-control" required>
       </div>
       <div class="form-group">
          <label for="">Species Photo   </label>
          <input type="file" name="image" accept="image/*" class="form-control" required >
       </div>
       <div class="form-group">
          <label for="">Describe </label>
          <input type="text" name="description"  class="form-control" required>
       </div>
       
       <button type="submid" name="sbm" class="btn btn-success " >Add</button>
 
</form>    
</div>
    
</div>  

</div>