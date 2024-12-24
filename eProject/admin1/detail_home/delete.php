<?php 
    $id = intval($_GET['id']?? 0);
    $sql = " DELETE FROM home where id = $id";
    $query = mysqli_query($conn, $sql);
    header('location: home_db.php?page_layout=ds');
?>