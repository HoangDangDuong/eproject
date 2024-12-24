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
        case 'ds_ani':
            require_once 'detail_ani/ds_ani.php';
            break;
        
            case 'add_ani':
                require_once 'detail_ani/add_ani.php';
                break;

            case 'edit_ani':
                require_once 'detail_ani/edit_ani.php';
                break;

            case 'delete_ani':
                require_once 'detail_ani/delete_ani.php';
                break;
        default:
        require_once 'detail_ani/ds_ani.php';
          
            break;
    }
}else {
    require_once 'detail_ani/ds_ani.php';

}
    ?>
 </body>
 </html>