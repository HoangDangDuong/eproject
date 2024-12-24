<?php 
    $id = intval($_GET['id']?? 0);
    $sql = " DELETE FROM images where id = $id";
    $query = mysqli_query($conn, $sql);
    header('location: images_db.php?page_layout=ds');
?>
