<?php
$sql= "SELECT *FROM animals ";
$query = mysqli_query($conn,$sql);
require_once('admin.php');
?> 

<div class="container-fluid" >
    <div class="card">
        <div class="card-header">
            <h2>Animals List</h2>
        </div>
        <div class="card-body">
            <table class="table">
<thead class="thead-dark">
<tr>
    <th>#</th>
    <th>Animal Name</th>
    <th>Images</th>
    <th>Describe </th>
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
    <td><?php echo $row['name']; ?></td>
    <td> <img style="width:100px" src="img/<?php echo $row['images']; ?>" >
    <td><?php echo $row['description']; ?></td>

    <td>
        <a href="animals_db.php?page_layout=edit_ani&id=<?php echo $row['id']; ?>"> Edit </a>
    </td>
    <td>
       <a onclick="return Del('<?php echo $row['name']; ?>')" href="animals_db.php?page_layout=delete_ani&id=<?php echo $row['id']; ?>"> Delete</a>
    </td>
</tr>
<?php } ?>
</tbody>
            </table>
            <a class="btn btn-primary" href="animals_db.php?page_layout=add_ani">Add </a>
        </div>
    </div>
</div>
<script>
    function Del(name){
        return confirm( "Are You Sure To Delete:" + name + "? ");
    }
</script>