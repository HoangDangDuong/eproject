<?php
$sql= "SELECT *FROM home ";
$query = mysqli_query($conn,$sql);
require_once('admin.php');
?> 

<div class="container-fluid" >
    <div class="card">
        <div class="card-header">
            <h2>Home List</h2>
        </div>
        <div class="card-body">
            <table class="table">
<thead class="thead-dark">
<tr>
    <th>#</th>
    <th>Poster</th>
    <th>Content</th>
    <th>Images</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
    <?php
       $i=1;
        while( $row = mysqli_fetch_assoc($query)){
  ?>
    <tr>
    <td><?php echo $i++; ?></td>
  
    <td><img style="width:100px" src="img/<?php echo $row['poster']; ?>" ></td>
    <td><?php echo $row['content'] ; ?></td>
    <td><img style="width:100px" src="img/<?php echo $row['images']; ?>" ></td>
    <td>
        <a href="home_db.php?page_layout=edit&id=<?php echo $row['id']; ?>"> Edit </a>
    </td>
    <td>
       <a onclick="return Del()" href="home_db.php?page_layout=delete&id=<?php echo $row['id']; ?>"> Delete</a>
    </td>
</tr>
<?php } ?>
</tbody>
            </table>
            <a class="btn btn-primary" href="home_db.php?page_layout=add">Add </a>
        </div>
    </div>
</div>
<script>
    function Del(){
        return confirm( "Are You Sure To Delete ? ");
    }
</script>