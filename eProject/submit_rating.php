<?php
require_once("connection.php");

if(isset($_POST["rating_data"])){
    $user_name=$_POST["user_name"] ?? '';
    $rating=$_POST["rating_data"] ?? '';
    $comments=$_POST["comment"] ?? '';
    $date=time();
   
    $sql="INSERT INTO feedback(user_name,rating,comments,date)
    VALUES(?,?,?,?) ";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("siss",$user_name,$rating,$comments,$date);
    $stmt->execute();
    echo "Successfully";
}   
if(isset($_POST["action"])){
    $avg_rating = 0;
    $total_review = 0;
    $five_star = 0;
    $four_star = 0;
    $three_star = 0;
    $two_star = 0;
    $one_star = 0;
    $total_user_rating=0;
    $review_content = array();

    $sql="SELECT*FROM feedback";
    $result=$conn->query($sql);
    $feedback=$result->fetch_all(MYSQLI_ASSOC); 
    
    foreach($feedback as $row){
        $review_content[] = array(
           'user_name' => $row["user_name"],
           'rating'   => $row["rating"],
           'comments'  => $row["comments"],
           'date'      => date(' F j, Y, h:i A',$row["date"])
        );
        if($row["rating"] == '5'){
            $five_star++;
        }
        if($row["rating"] == '4'){
            $four_star++;
        }
        if($row["rating"] == '3'){
            $three_star++;
        }
        if($row["rating"] == '2'){
            $two_star++;
        }
        if($row["rating"] == '1'){
            $one_star++;
        }
        $total_review++;
        $total_user_rating = $total_user_rating + $row["rating"];
    };
    $avg_rating = $total_user_rating / $total_review;

    $output = array(
        'avg_rating'   => number_format($avg_rating,1),
        'total_review' => $total_review,
        'five_star'    => $five_star,
        'four_star'    => $four_star,
        'three_star'   => $three_star,
        'two_star'     => $two_star,
        'one_star'     => $one_star,
        'review_data'  => $review_content
    );
    echo json_encode($output);
}
?>