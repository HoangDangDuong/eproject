<?php
$sql= "SELECT *FROM contact ";
$query = mysqli_query($conn,$sql);
require_once('admin.php');
?> 

<div class="container-fluid" >
    <div class="card">
        <div class="card-header">
            <h2>contact List</h2>
        </div>
        <div class="card-body">
            <table class="table">
<thead class="thead-dark">
<tr>
 
    <th>Locaton</th>
    <th>TEL</th>
    <th>FAX</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>
<tbody>
    <?php
        while( $row = mysqli_fetch_assoc($query)){?>
    <tr>
   
    <td><?php echo $row['location']; ?></td>
    <td><?php echo $row['tel']; ?></td>
    <td><?php echo $row['fax']; ?> </td>
    <td><?php echo $row['email']; ?></td>
    <td>
        <a href="contact_db.php?page_layout=edit&id=<?php echo $row['id']; ?>"> Edit </a>
    </td>
    <td>
       <a onclick="return Del()" href="contact_db.php?page_layout=delete&id=<?php echo $row['id']; ?>"> Delete</a>
    </td>
</tr>
<?php } ?>
</tbody>
            </table>
            <a class="btn btn-primary" href="contact_db.php?page_layout=add">Add </a>
        </div>
    </div>
</div>
<script>
    function Del(){
        return confirm( "Are You Sure To Delete ? ");
    }
</script>