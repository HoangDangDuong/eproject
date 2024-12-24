<?php
require_once('../connection.php');
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   </head>
 <body>
    <?php
if(isset($_GET['page_layout'])){
    switch ($_GET['page_layout']) {
        case 'ds':
            require_once 'detail_imgs/ds.php';
            break;
        
        case 'add':
            require_once 'detail_imgs/add.php';
            break;

        case 'edit':
                require_once 'detail_imgs/edit.php';
                break;

        case 'delete':
                require_once 'detail_imgs/delete.php';
                break;
        default:
        require_once('admin.php/images_db.php') ;
            break;
    }
}else {
    require_once 'detail_imgs/ds.php';

}
    ?>
 </body>
 </html>