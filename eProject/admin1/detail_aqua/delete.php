<?php 
    $id = intval($_GET['id']?? 0);
    $sql = " DELETE FROM events where id = $id";
    $query = mysqli_query($conn, $sql);
    header('location: aquarium_db.php?page_layout=ds');
?>
