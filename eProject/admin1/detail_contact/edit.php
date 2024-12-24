<?php
$id = intval($_GET['id'] ?? 0);
$sql_up = "SELECT * FROM contact where id = $id";
$query_up = mysqli_query($conn, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);


if(isset($_POST['sbm'])){
 
    $location =$_POST['location'];
    $tel=$_POST['tel'];
    $fax =$_POST['fax'];
    $email=$_POST['email'];

   $sql = " UPDATE contact SET location = ?,   tel= ?, fax=? ,email = ? WHERE id = $id";
 
   $stmt= $conn->prepare($sql);
   $stmt->bind_param("siis",$location,$tel,$fax,$email);
   $stmt->execute();
 
  header('location: contact_db.php?page_layout=ds');
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
          <label for="">Location </label>
          <input type="text" name="location" class="form-control" value="<?php echo $row_up['location']; ?>" required>
        </div>
          <div class="form-group">
          <label for="">TEL</label>
          <input type="phone" name="tel"  class="form-control" value="<?php echo $row_up['tel']; ?>" required>
        </div>
        <div class="form-group">
          <label for="">FAX</label>
          <input type="phone" name="fax"  class="form-control" value="<?php echo $row_up['fax']; ?>" required>
        </div>
        <div class="form-group">
          <label for="">EMAIL</label>
          <input type="email" class="form-control"  name="email" value="<?php echo $row_up['email']; ?>" required>
        </div>
             <button type="submit" name="sbm" class="btn btn-success " >Edit</button>
</form>    
</div>
</div>
</div>