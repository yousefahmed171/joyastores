<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>         
        <section class="container">
            <div class="well well-top text-center">
                <ol class="breadcrumb">
                  <li><a href="index.php">Home</a></li>
                  <li class="active"><?php echo  $_GET['pagename']; ?></li>
                </ol>
            </div>
        </section>
        
        
        <div class="container">
            <section id="product-details-panel" class="well">
                    <?php 
                        $proid = isset($_GET['proid']) && is_numeric($_GET['proid']) ? intval($_GET["proid"]) : 0;
                        $stmt = $con->prepare("SELECT * FROM  product WHERE id_product = $proid ");
                        $stmt->execute(array($proid));
                        $allimg = $stmt->fetch();
                    ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="row">
                            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                <!-- Wrapper for slides -->
                                <div class="col-xs-12 col-md-10">
                                    <div class="carousel-inner" role="listbox">

                                    <div class="item active">
                                    <?php
                                        echo  '<a href="#" class="pop"><img id="imageresource" src="admin/uploades/img-product/'.$allimg['pro_img'].'" alt="Joya Stores" class="img-responsive center-block"></a>';
                                    ?>
                                    </div>

                                    <div class="item">
                                    <?php
                                        echo  '<a href="#" class="pop"><img id="imageresource" src="admin/uploades/img-product/'.$allimg['pro_img2'].'" alt="Joya Stores" class="img-responsive center-block"></a>';
                                    ?>
                                    </div>

                                    <div class="item">
                                    <?php
                                        echo  '<a href="#" class="pop"><img id="imageresource" src="admin/uploades/img-product/'.$allimg['pro_img3'].'" alt="Joya Stores" class="img-responsive center-block"></a>';
                                    ?> 
                                    </div>

                                    <div class="item">
                                    <?php
                                        echo  '<a href="#" class="pop"><img id="imageresource" src="admin/uploades/img-product/'.$allimg['pro_img4'].'" alt="Joya Stores" class="img-responsive center-block"></a>';
                                    ?> 
                                    </div>

                                    <div class="item">
                                    <?php
                                        echo  '<a href="#" class="pop"><img id="imageresource" src="admin/uploades/img-product/'.$allimg['pro_img5'].'" alt="Joya Stores" class="img-responsive center-block"></a>';
                                    ?>
                                    </div>    

                                    </div>
                                </div>    


                                <!-- Indicators -->
                                <div class="col-xs-12 col-md-2">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                                            <?php echo '<img src="admin/uploades/img-product/'.$allimg['pro_img'].'" alt="Joya Stores" class="img-responsive "></a>'; ?>
                                        </li>
                                        <li data-target="#carousel-example-generic" data-slide-to="1">
                                            <?php echo '<img src="admin/uploades/img-product/'.$allimg['pro_img2'].'" alt="Joya Stores" class="img-responsive "></a>'; ?>   
                                        </li>
                                        <li data-target="#carousel-example-generic" data-slide-to="2">
                                             <?php echo '<img src="admin/uploades/img-product/'.$allimg['pro_img3'].'" alt="Joya Stores" class="img-responsive "></a>'; ?>     
                                        </li>
                                        <li data-target="#carousel-example-generic" data-slide-to="3">
                                             <?php echo '<img src="admin/uploades/img-product/'.$allimg['pro_img4'].'" alt="Joya Stores" class="img-responsive "></a>'; ?>
                                        </li>
                                        <li data-target="#carousel-example-generic" data-slide-to="4">
                                             <?php echo '<img src="admin/uploades/img-product/'.$allimg['pro_img5'].'" alt="Joya Stores" class="img-responsive "></a>'; ?>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <?php 
                        $proid = isset($_GET['proid']) && is_numeric($_GET['proid']) ? intval($_GET["proid"]) : 0;
                        if(isset($_GET['pagename'])){
                            $pagename = $_GET['pagename'];
                        }               
                    
                        $stmt = $con->prepare("SELECT * FROM  product WHERE id_product = $proid ");
                        $stmt->execute(array($proid));
                        $allCats = $stmt->fetchAll();
                        
                         foreach($allCats as $cat ){    
                        ?>
                    <div class="col-sm-6 product-show-info">
                        <header class="text-center">
                            <h2><?php echo $cat['pro_name']?></h2>
                        </header>
                   
                        <p class="price">Price  : <?php
                                                if(!empty($cat['pro_after_sale'])) {
                                                    echo $cat['pro_after_sale'] . ' EGP ' .'   '. "<del class='del-price'>".$cat['pro_price'].' EGP '."</del>";
                                                } else {
                                                    echo $cat['pro_price'];
                                                }
                        // echo "<del>".$cat['pro_price']."</del>";?>  </p>
                        <p>By : <?php echo $cat['pro_seller'] ?></p>
                        <p>Model : <?php echo $cat['pro_id'] ?></p>
                        <p>Color : Red</p>
                        <?php 
                            $proid = $cat['id_product'];
                            $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                            $stmt->execute();
                            $getrate = $stmt->fetch();
                            $rat = $getrate['sum(rate)'];
                            $count = $getrate['count(user_id)'];
                            if($count > 0 ) {
                                $sum = ($rat / $count);
                                echo  '<p class="star-rating"> Average Rate : ';
                                for ($start = 0 ; $start < $sum ; $start++) {
                                    echo '<i class="colored fa fa-star" ></i>';
                                }
                                echo '<span> (' . round($sum, 2) . ')</span>' ;
                                echo '</p>';
                            } else {
                                echo '<p class="star-rating"> Rate :
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <span> ( 0 ) </span>
                                </p>';
                            }
                        ?>
                        <p>Avalibality : 
                        <?php 
                        if($cat['availability'] == 0 ) {
                            echo 'Yes';
                        }else {
                            echo 'No';
                        }
                         ?></p>
                        <!-- <p><button type="button" class="btn btn-defult" data-toggle="modal" data-target="#sizeModal">Size Giude</button></p>
                        <p class="social-share">Share :

                            <a href="#"><i class="fa fa-facebook-square fa-2x facebook-share"></i></a>
                            <a href="#"><i class="fa fa-twitter-square fa-2x twitter-share"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square fa-2x pinterest-share"></i></a>
                            <a href="#"><i class="fa fa-google-plus-square fa-2x google-share"></i></a>
                        </p> -->
                        
                        <div class="row state-btn">
                                <form action="products.php?page=search.php&show=order&id=<?php echo $cat['id_product']; ?>" method="post" class="form-inline">
                                    <div class="col-xs-12 form-group">
                                        <p>  Color :</p>
                                        <div class="form-group product-option color-option " style="background-color:#800037;">
                                            <label>
                                                <input type="radio" name="color" value="#800037"/><span class="glyphicon glyphicon-ok"></span>
                                            </label>
                                        </div>
                                        <div class="form-group product-option color-option " style="background-color:#808;">
                                            <label>
                                                <input type="radio" name="color" value="#8888"/><span class="glyphicon glyphicon-ok"></span>
                                            </label>
                                        </div>
                                    </div>
                                        <div class="col-xs-12"> <!--radio-->
                                        <p>  Size : </p>
                                        <div class="product-option ">
                                            <label>  X-S
                                                <input type="radio" name="size" value="X-S"/>
                                            </label>
                                        </div>
                                        <div class="product-option">
                                            <label>  S
                                                <input type="radio" name="size" value="S"/>
                                                </label>
                                        </div>
                                        <div class="product-option">
                                            <label>  M
                                                <input type="radio" name="size" value="M"/>
                                            </label>
                                        </div>
                                        <div class="product-option">
                                            <label>  L
                                                    <input type="radio" name="size" value="L"/>
                                            </label>
                                        </div>
                                        <div class="product-option">
                                            <label>  X-L
                                                <input type="radio" name="size" value="X-L"/>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 form-group">
                                    <label class="pro-quantity" for="p-quantity">  Quantity : </label>
                                    <input class="form-control" id="p-quantity" type="number" name="quantity" Value="1" palceholder="Quantity"/>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                    <button class="btn btn-info btn-lg btn-block" type="submit" name="cart"><i class="fa fa-shopping-cart">  Add To Cart</i></button>
                                    </div>
                                    <!-- <div class="col-xs-12 col-md-6">
                                        <button class="btn btn-danger btn-lg btn-block" type="submit" name="wishlist"><i class="fa fa-heart">  Add To Wishlist</i></button>
                                    </div> -->
                                </form>
                         
                    </div>   

                    </div>
                </div>
            </section><!-- /#Product-Panel/.Well -->
        </div><!-- /.Container -->
        
        
        
        <section class="container info-review">
            <div class="well">
                <header class="text-center">
                    <h3>Information &amp; Reviews</h3>
                </header>
                

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#info" aria-controls="info" role="tab" data-toggle="tab">Information</a></li>
                        <li role="presentation"><a href="#review" aria-controls="review" role="tab" data-toggle="tab">Reviews</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in active" id="info">
                            <h4>Features</h4>
                            <ul>
                                <?php echo '<li>'.str_replace(',', '<li>', $cat['pro_feature_en']) .'</li>';  ?>
                            </ul>
                            
                            <h4>Additional Information</h4>
                            <ul>
                            <?php echo '<li>'.str_replace(',', '<li>', $cat['additional_information_en']) .'</li>';  ?>
                                
                            </ul>
                        </div>
                        <?php }?>

                        <div role="tabpanel" class="tab-pane fade" id="review">
                            <div class="row">
                                <div class="col-xs-12 text-center">
                                <fieldset class="rating">
                                    <legend> Rate It Now !<a class="btn btn-link" href="#collapseReview" type="button" data-toggle="collapse" data-target="#collapseReview" aria-expanded="false" aria-controls="collapseReview">   Write a review</a></legend>
                                    <form action="rate.php?do=insert&proid=<?php echo $proid; ?>" method="post" class="row">
                                        <div class="col-xs-12 stars-rate">
                                        <input id="star5" type="radio" name="rating" value="5"/>
                                        <label for="star5"> 5 stars</label>
                                        <input id="star4" type="radio" name="rating" value="4"/>
                                        <label for="star4"> 4 stars</label>
                                        <input id="star3" type="radio" name="rating" value="3"/>
                                        <label for="star3"> 3 stars</label>
                                        <input id="star2" type="radio" name="rating" value="2"/>
                                        <label for="star2"> 2 stars</label>
                                        <input id="star1" type="radio" name="rating" value="1"/>
                                        <label for="star1"> 1 stars</label>
                                        </div>
                                        <div class="row">
                                        <div class="col-xs-4 col-xs-offset-4 col-sm-2 col-sm-offset-5">
                                            <button class="btn btn-warning btn-block" type="submit">   Submit &#33;</button>
                                        </div>
                                        </div>
                                    </form>
                                </fieldset>
                                <?php 
                                    $getAll = $con->prepare("SELECT SUM(rate) , count(user_id) FROM rate WHERE pro_id = $proid AND rate = 5 ");
                                    $getAll->execute();
                                    $all = $getAll->fetch();
                                    $count5 = $all['count(user_id)'];
                                ?>
                                    <p class="star-rating">5 Stars&nbsp;&nbsp;
                                    <i class="colored fa fa-star"></i>
                                    <i class="colored fa fa-star"></i>
                                    <i class="colored fa fa-star"></i>
                                    <i class="colored fa fa-star"></i>
                                    <i class="colored fa fa-star"></i>&nbsp;&nbsp;( <?php if($count5 > 0){echo "$count5"; } else { echo "0";} ?> )
                                    </p>
                                    <?php $getAll = $con->prepare("SELECT SUM(rate) , count(user_id) FROM rate WHERE pro_id = $proid AND rate = 4 ");
                                    $getAll->execute();
                                    $all = $getAll->fetch();
                                    $count4 = $all['count(user_id)']; ?>
                                    <p class="star-rating">4 Stars&nbsp;&nbsp;
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="fa fa-star"></i>&nbsp;&nbsp;( <?php if($count4 > 0){echo "$count4"; } else { echo "0";} ?> )
                                    </p>
                                    <?php $getAll = $con->prepare("SELECT SUM(rate) , count(user_id) FROM rate WHERE pro_id = $proid AND rate = 3 ");
                                    $getAll->execute();
                                    $all = $getAll->fetch();
                                    $count3 = $all['count(user_id)']; ?>

                                    <p class="star-rating">3 Stars&nbsp;&nbsp;
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>&nbsp;&nbsp;( <?php if($count3 > 0){echo "$count3"; } else { echo "0";} ?> )
                                    </p>
                                    <?php $getAll = $con->prepare("SELECT SUM(rate) , count(user_id) FROM rate WHERE pro_id = $proid AND rate = 2 ");
                                    $getAll->execute();
                                    $all = $getAll->fetch();
                                    $count2 = $all['count(user_id)']; ?>
                                    <p class="star-rating">2 Stars&nbsp;&nbsp;
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>&nbsp;&nbsp;( <?php if($count2 > 0){echo "$count2"; } else { echo "0";} ?> )
                                    </p>
                                    <?php $getAll = $con->prepare("SELECT SUM(rate) , count(user_id) FROM rate WHERE pro_id = $proid AND rate = 1 ");
                                    $getAll->execute();
                                    $all = $getAll->fetch();
                                    $count1 = $all['count(user_id)']; ?>

                                    <p class="star-rating">1 Stars&nbsp;&nbsp;
                                        <i class="colored fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>&nbsp;&nbsp;( <?php if($count1 > 0){echo "$count1"; } else { echo "0";} ?> )
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                
            </div><!-- /.Well -->
            
            <div id="reviews-panel">
                <div class="well">
                    <header>
                        <h3>Reviews</h3>
                    </header>
                    <h4 class="hidden">There is no reviews for this product</h4><!-- Visible  it when there is no review -->
                    <?php 
                    $stmt = $con->prepare("SELECT  comments.*,users.username AS name FROM  comments
                    INNER JOIN 
                                users
                    ON 
                                users.userid =  comments.user_id
                    WHERE
                                pro_id = ?  
                    ORDER BY
                            com_id DESC

                    ");

                  // execute the stamtent

                  $stmt->execute(array($proid));

                  // assign to variable 

                  $comments = $stmt->fetchAll();

                  foreach($comments as $comment) {

                  
                  echo   '<h4>'.$comment['name'].'</h4>';
                  echo '<p>'. $comment['comment'] .'</p>';
                 } 
                  
                echo  '<hr>';
                echo  '<p class="star-rating">';
                $stmt = $con->prepare("SELECT  rate.*,users.username AS name FROM  rate
                INNER JOIN users ON users.userid =  rate.user_id
                WHERE  pro_id = ? ");
                
                $stmt->execute(array($proid));
                $rates = $stmt->fetchAll();
                foreach($rates as $rate) {
                    $rated =  $rate['rate'];
                    echo '<div class="row">';
                    echo  '<h4 class="col-xs-2">'.$rate['name'].'</h4>';
                    echo  '<hr>';
                    echo  '<p class="star-rating col-xs-3">';
                    
                    for ($start = 0 ; $start < $rated ; $start++){
                        
                        echo '<i class="colored fa fa-star" ></i>';
                    }
                    
                    echo '</p>';
                    echo '</div>';

                }
               
                 
                ?> 
                </div>
            </div>
            
           
            <div class="collapse" id="collapseReview">
                <div class="well">
                    <header>
                        <h3>Add Review</h3>
                    </header>
                    <form action="rate.php?do=insertreview&idpro=<?php echo $proid  ; ?>" method="post" >
                        <div class="form-group">
                            <textarea class="form-control" name="comment" rows="3" placeholder="Add Your Reveiw Here" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-default">Add Review</button>
                    </form>
                </div>
            </div>
         

        </section><!-- /.Container -->
        
        <!-- 
            <section id="features">
                <div class="row text-center">
                    <div class="col-xs-4 custom-padd-right">
                    <div class="feat-item"><i class="fa fa-truck fa-md"> </i>
                        <h4>Delivery within 5-7 days</h4>
                    </div>
                    </div>
                    <div class="col-xs-4 custom-padd-right custom-padd-left">
                    <div class="feat-item"><i class="fa fa-money fa-md"> </i>
                        <h4>Cash on delivery</h4>
                    </div>
                    </div>
                    <div class="col-xs-4 custom-padd-left">
                    <div class="feat-item"><i class="fa fa-retweet fa-md"> </i>
                        <h4>Free return within 7 days</h4>
                    </div>
                    </div>
                </div>
            </section>
        </section><!-- /.Container -->
        
        <!-- Image-Zoom-Modal -->    
        <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">              
                    <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <img src="" class="imagepreview" style="width: 100%;" >
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Size-Guide-Modal --> 
        <div class="modal fade" id="sizeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Size Guide</h4>
                    </div>
                    <div class="modal-body">
                        <img src="img/weather.png" class="img-responsive center-block">
                    </div>
                </div>
            </div>
        </div>
<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>