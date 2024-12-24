<?php 
    $id = intval($_GET['id']?? 0);
    $sql = " DELETE FROM animals where id = $id";
    $query = mysqli_query($conn, $sql);
    header('location: animals_db.php?page_layout=ds_ani');
?>
