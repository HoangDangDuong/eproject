<?php
require_once('connection.php');

    $sql="SELECT*FROM home where id=1";
    $result=$conn->query($sql);
    $result->fetch_all(MYSQLI_ASSOC);
    $sql="SELECT*FROM home";
    $rs2=$conn->query($sql);
    $rs2->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"/>
    
</head>
<body>
<div>
    <?php foreach($result as $a): ?>
    <img src="admin1/img/<?php echo $a['poster']; ?>" width="100%">
    <?php endforeach ?>
</div>
<div id="intro">
    <h4 id="title">WELCOME TO</h4>
    <h2 id="title">JENKINSON SEA LIFE</h2>  
        <?php foreach($result as $a): ?>
            <div> 
            &nbsp; &nbsp; &nbsp;<?php echo $a['content']; ?>
            </div>
        <?php endforeach ?>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="row">
            <?php foreach($rs2 as $a): ?>
            <img src="admin1/img/<?php echo $a['images']; ?>" class="w-100 mb-2 mb-md-4 shadow-1-strong rounded">
     
            <?php endforeach ?>
        </div>
     </div>
</div>
      <hr>
<div id="">
    <h2 style="text-align:center;">Visitor reviews and ratings</h2>
<div class="row" >
    <div class="col-sm-4 text-center">
        <h1 class="text-warning mt-4 mb-4">
            <b><span id="avg_rating">0.0</span>/5</b>
        </h1>
        <div class="mb-3">
            <i class="fas fa-star star-light mr-1 main_star"></i>
            <i class="fas fa-star star-light mr-1 main_star "></i>
            <i class="fas fa-star star-light mr-1 main_star "></i>
            <i class="fas fa-star star-light mr-1 main_star "></i>
            <i class="fas fa-star star-light mr-1 main_star "></i>
        </div>
        <h3><span id="total_review">0</span>Review</h3>
    </div>
    <div class="col-sm-4">
        <p>
        <div class="progress-label-left"><b>5</b><i class="fas fa-star text-warning"></i></div>
        <div class="progress-label-right">(<span id="total_five_star">0</span>)</div>
        <div class="progress">
            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" arie-valuemin="0"
                aria-valuemax="100" id="five_star_p"></div>
        </div>
        </p>
        <p>  <div class="progress-label-left"><b>4</b><i class="fas fa-star text-warning"></i></div>
            <div class="progress-label-right">(<span id="total_four_star">0</span>)</div>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" arie-valuemin="0"
                    aria-valuemax="100" id="four_star_p"></div>
            </div></p>
        <p>  <div class="progress-label-left"><b>3</b><i class="fas fa-star text-warning"></i></div>
            <div class="progress-label-right">(<span id="total_three_star">0</span>)</div>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" arie-valuemin="0"
                    aria-valuemax="100" id="three_star_p"></div>
            </div></p>
        <p>  <div class="progress-label-left"><b>2</b><i class="fas fa-star text-warning"></i></div>
            <div class="progress-label-right">(<span id="total_two_star">0</span>)</div>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" arie-valuemin="0"
                    aria-valuemax="100" id="two_star_p"></div>
            </div></p>
        <p>  <div class="progress-label-left"><b>1</b><i class="fas fa-star text-warning"></i></div>
            <div class="progress-label-right">(<span id="total_one_star">0</span>)</div>
            <div class="progress">
                <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" arie-valuemin="0"
                    aria-valuemax="100" id="one_star_p"></div>
            </div></p>
    </div>
    <div class="col-sm-4 text-center">
        <h3 class="mt-4 mb-3">Write Review Here</h3>
        <button type="button" name="add_review" id="add_review" class="btn btn-primary">Review</button>
    </div>
</div>
    <div style="  border: 1px solid black;
                  width: 90%;
                  height: 300px;
                  overflow: auto;
                  margin-left: 5%;">
        <div class="col" id="review_content"></div>   
    </div>
</div>
<hr>
</body>
</html>
<!--  -->
<div id="review_modal" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Submit Review</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
<div>
    <h4 class="text-center mt-2 mb-4">
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating ="1"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating ="2"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating ="3"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating ="4"></i>
        <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating ="5"></i>
    </h4>
    <div class="form-group">
        <label for="user_name"></label>
        <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter Your Name" required>
    </div>
    <div class="form-group">
        <label for="comment">Comment</label>
        <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
    </div>
    <div class="form-group">
        <button type="button" class="btn btn-info" id="save_review">Save Review</button> 
    </div>
</div>

<script>
    $(document).ready(function () {
        var rating_data = 0 ;
        $('#add_review').click(function(){
            $('#review_modal').modal('show');
        });
        $(document).on('mouseenter','.submit_star',function(){
            var rating=$(this).data('rating');
            reset_background();
            for(var count=1;count<=rating;count++){
                $('#submit_star_'+count).addClass('text-warning');
            }
        });
        function reset_background(){
            for(var count =1;count <= 5; count++){
                $('#submit_star_'+count).addClass('star-light');
                $('#submit_star_'+count).removeClass('text-warning');
            }
        };
        // $(document).on('mouseleave','.submit_star',function(){
        //     reset_background();
        // });

        $(document).on('click', '.submit_star',function(){
           rating_data = $(this).data('rating');
        
        });
        $('#save_review').click(function(){
            var user_name = $('#user_name').val();
            var comment = $('#comment').val();
            if(user_name =='' || comment ==''){
                alert("Please fill both field!");
                return false;
            }else{
            $.ajax({
                url:"submit_rating.php",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, comment:comment},
                success:function(data){
                    $('#review_modal').modal('hide');
                    load_rating();
                    alert(data);
                }
            })
            }
        });
    });
    load_rating();

    function load_rating() {
        $.ajax({
            url:"submit_rating.php",
            method:"POST",
            data:{action:'load_data'},
            dataType:"JSON",
            success:function(data){
               $('#avg_rating').text(data.avg_rating);
               $('#total_review').text(data.total_review);
               var count_star = 0;
               $('.main_star').each(function(){
                  count_star++;
                  if(Math.ceil(data.avg_rating) >= count_star){
                    $(this).addClass('text-warning');
                    $(this).addClass('star-light');
                  }
               });
               $('#total_five_star').text(data.five_star);
               $('#total_four_star').text(data.four_star);
               $('#total_three_star').text(data.three_star);
               $('#total_two_star').text(data.two_star);
               $('#total_one_star').text(data.one_star);

               $('#five_star_p').css('width',data.five_star/data.total_review *100 + '%') ;
               $('#four_star_p').css('width',data.four_star/data.total_review *100 + '%') ;
               $('#three_star_p').css('width',data.three_star/data.total_review *100 + '%') ;
               $('#two_star_p').css('width',data.two_star/data.total_review *100 + '%') ;
               $('#one_star_p').css('width',data.one_star/data.total_review *100 + '%') ;

               if(data.review_data.length >0){
                var html ='';

                for(var count=0; count< data.review_data.length; count++){
                    html += '<div class="row mb-2">';
                    html += '<div class="col-sm-1 col-3"><div class="rounded-circle bg-danger text-white pt-2 "><h3 class="text-center">' 
                    +data.review_data[count].user_name.charAt(0)+'</h3></div></div>';
                    html += '<div class="col-sm-12">';
                    html += '<div class="card">';
                    html += '<div class="card-header"><b>'+data.review_data[count].user_name+'</b></div>';
                    html += '<div class="card-body">';
                    for(var star=1; star <=5; star++){
                        var class_name='';
                        if(data.review_data[count].rating >=star){
                            class_name='text-warning';
                        }else{
                            class_name='star-light';
                        }
                        html += '<i class="fas fa-star '+class_name+' mr-1"></i>';
                    }
                    html += '<br/>';
                    html += data.review_data[count].comments ;

                    html += '</div>';
                    html += '<div class"card-footer text-right ">On'+data.review_data[count].date+'</div>';
                    html += '</div>';
                    html += '</div>';
                    html += '</div>';
                }
                $('#review_content').html(html);
               }
            }
        })
    }
</script>
