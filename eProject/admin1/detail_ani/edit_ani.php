<?php
$id = intval($_GET['id'] ?? 0);
$sql_up = "SELECT * FROM animals where id = $id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);


if(isset($_POST['sbm'])){
 
   $name =$_POST['name'];
    
    if($_FILES['image']['name']==''){
        $images = $row_up['images'];
    }else{
        $images = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, 'img/'.$images);
    }
   $description =$_POST['description'];
  

   $sql = " UPDATE animals SET name = ?, images = ? , description = ?  WHERE id = $id";
 
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("sss",$name,$images,$description);
   $stmt->execute();
 
  header('location: animals_db.php?page_layout=ds_ani');
}
?>
<div class="container-fluid">
<div class="card">
    <div class="card-header">
  <h2>Edit<h2>
    </div>
    <div class="card-body">
<form method="POST" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Animal Name </label>
          <input type="text" name="name"  class="form-control" required value="<?php echo $row_up['name']; ?>">
        </div>
        <div class="form-group">
          <label for="">Animal Photo</label>
          <input type="hidden" name="tmp_name"  value="<?php echo $row_up['images']; ?>" >
          <input type="file" name="image" accept="image/*" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Describe  </label>
          <input type="text" name="description"  class="form-control" required value="<?php echo $row_up['description']; ?>">
        </div>
             <button type="submit" name="sbm" class="btn btn-success " >Edit</button>
       
</form>    
</div>
</div>
</div>