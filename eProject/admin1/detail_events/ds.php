<?php
$sql= "SELECT *FROM events ";
$query = mysqli_query($conn,$sql);
require_once('admin.php');
?> 

<div class="container-fluid" >
    <div class="card">
        <div class="card-header">
            <h2>Events List</h2>
        </div>
        <div class="card-body">
            <table class="table">
<thead class="thead-dark">
<tr>
    <th>#</th>
    <th>Title</th>
    <th>Time</th>
    <th>Specific time</th>
    <th>Images</th>
    <th>Information</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
    <?php
       $i=1;
        while( $row = mysqli_fetch_assoc($query)){?>
    <tr>
    <td><?php echo $i++; ?></td>
    <td><?php echo $row['title']; ?></td>
    <td><?php echo date("d-m-Y", strtotime($row['times'])); ?></td>
    <td><?php echo $row['timing']; ?> </td>
    <td><img style="width:100px" src="img/<?php echo $row['images']; ?>" ></td>
    <td><?php echo $row['information']; ?></td>
    <td>
        <a href="events_db.php?page_layout=edit&id=<?php echo $row['id']; ?>"> Edit </a>
    </td>
    <td>
       <a onclick="return Del('<?php echo $row['title']; ?>')" href="events_db.php?page_layout=delete&id=<?php echo $row['id']; ?>"> Delete</a>
    </td>
</tr>
<?php } ?>
</tbody>
            </table>
            <a class="btn btn-primary" href="events_db.php?page_layout=add">Add </a>
        </div>
    </div>
</div>
<script>
    function Del(title){
        return confirm( "Are You Sure To Delete:" + title + "? ");
    }
</script>