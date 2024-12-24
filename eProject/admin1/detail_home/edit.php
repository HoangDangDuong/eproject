<?php
$id = intval($_GET['id'] ?? 0);
$sql_up = "SELECT * FROM home where id = $id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if(isset($_POST['sbm'])){
 
    if($poster = $_FILES['poster']['name']==''){
      $poster= $row_up['poster'];
    }else{
      $poster = $_FILES['poster']['name'];
      $poster_tmp = $_FILES['poster']['tmp_name'];
      move_uploaded_file($poster_tmp, 'img/'.$poster); 
    };
    $content =$_POST['content'];

    if($_FILES['image']['name']==''){
        $images = $row_up['images'];
    }else{
        $images = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, 'img/'.$images);
    };
   
   $content =$_POST['content'];

   $sql = " UPDATE home SET   poster = ?, content = ? ,images = ?  WHERE id = $id";
 
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("sss",$poster,$content,$images);
   $stmt->execute();
 
  header('location: home_db.php');
}
?>
<div class="container-fluid">
<div class="card">
    <div class="card-header">
  <h2>Edit <h2>
    </div>
    <div class="card-body">
<form method="POST" enctype="multipart/form-data">
<div class="form-group">
         
        <div class="form-group">
          <label for="">Poster</label>
          <input type="hidden" name="tmp_name"  value="<?php echo $row_up['poster'] ?? ''; ?>" >
          <input type="file" name="poster"  accept="image/*" class="form-control" >
        </div>

        <div class="form-group">
          <label for="">Content</label>
          <input type="text" class="form-control"  name="content" value="<?php echo $row_up['content'] ?? ''; ?>" >
        </div>

        <div class="form-group">
          <label for="">Images</label>
          <input type="hidden" name="tmp_name"  value="<?php echo $row_up['images']; ?>" >
          <input type="file" name="image" accept="image/*" class="form-control" >
        </div>
             <button type="submit" name="sbm" class="btn btn-success " >Edit</button>
</form>    
</div>
</div>
</div>