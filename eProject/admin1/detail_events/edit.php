<?php
$id = intval($_GET['id'] ?? 0);
$sql_up = "SELECT * FROM events where id = $id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);


if(isset($_POST['sbm'])){
 
   $title =$_POST['title'];
   $times=$_POST['times'];
   $timing=$_POST['timing'];
    if($_FILES['image']['name']==''){
        $images = $row_up['images'];
    }else{
        $images = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        move_uploaded_file($image_tmp, 'img/'.$images);
    }
   
   $information =$_POST['information'];

   $sql = " UPDATE events SET title = ?,  times = ?, timing=? ,images = ? , information = ? WHERE id = $id";
 
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("sssss",$title,$times,$timing,$images,$information);
   $stmt->execute();
 
  header('location: events_db.php?page_layout=ds');
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
          <label for="">Title </label>
          <input type="text" name="title" class="form-control" value="<?php echo $row_up['title']; ?>" required>
        </div>
          <div class="form-group">
          <label for="">Time</label>
          <input type="datetime" name="times"  class="form-control" value="<?php echo $row_up['times']; ?>" required>
        </div>
        <div class="form-group">
          <label for="">Specific time</label>
          <input type="time" name="timing"  class="form-control" value="<?php echo $row_up['timing']; ?>" required>
        </div>
        <div class="form-group">
          <label for="">Images</label>
          <input type="hidden" name="tmp_name"  value="<?php echo $row_up['images']; ?>" >
          <input type="file" name="image" accept="image/*" class="form-control" >
        </div>
        <div class="form-group">
          <label for="">Information</label>
          <input type="text" class="form-control"  name="information" value="<?php echo $row_up['information']; ?>" required>
        </div>
             <button type="submit" name="sbm" class="btn btn-success " >Edit</button>
</form>    
</div>
</div>
</div>