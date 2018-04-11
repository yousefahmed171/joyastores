
<?php 
//     include 'init.php';
// $stmt = $con->prepare("SELECT * FROM `main-slider`");
// $stmt->execute();
// $getinfo = $stmt->fetchAll();
// //return $getinfo;  
// //$data = getContent();  
//  foreach ($getinfo as $row) {
//  echo '<div id="wrapper">
//  <div class="slider-wrapper theme-default">
//  <div id="slider" class="nivoSlider">
//  ';
//    $id = $row['id'];
//    $titulo = $row['titulo'];
//    $descripcion = $row['nameslider'];
//    $link = $row['linkslider'];
//    $imgurl = $row['pimg_en'];
//    //$ultimo_update = $row['ultimo_update']; 
//    $captions = '';   
//  }   
//  echo'
//  <img src="uploades/home-scren/'.$imgurl.'" data-thumb="uploades/home-scren/'.$imgurl.'" data-transition="fold" title="#htmlcaption_'.$id.'" />'; ?>

       <?php /*$captions = '<div id="htmlcaption_'.$id.'" class="nivo-html-caption">
//      '.$titulo.'<br/>'.$descripcion.'<span class="nivoButtonSpan"><a href="'.$link.'" class="btn btn-default" style="color:#000;">Leer más <i class="glyphicon  glyphicon-share-alt"></i></a></span>';*/?>
<!-- //      </div> Close htmlcaption_# -->

     <?php //echo $captions; ?>
<!-- </div> <!-- Close slider -->
<!-- </div>  Close slider-wrapper -->
<!-- </div> Close wrapper -->


Array ( [userid] => 1 [0] => 1 [username] => yousef [1] => yousef [fullname] => yousefahmed [2] => yousefahmed [birth-yaer] => 1994 [3] => 1994 [birth-month] => 12 [4] => 12 [birth-day] => 3 [5] => 3 [password] => 40bd001563085fc35165329ea1ff5c5ecbdbbeef [6] => 40bd001563085fc35165329ea1ff5c5ecbdbbeef [gender] => Male [7] => Male [email] => yousefahmed@gmail.com [8] => yousefahmed@gmail.com [phone] => 1010737793 [9] => 1010737793 [created] => 0000-00-00 00:00:00 [10] => 0000-00-00 00:00:00 [country] => egypt [11] => egypt [city] => cairo [12] => cairo [street-name] => street number 7 [13] => street number 7 [building-number] => 315 [14] => 315 [appartment-no] => 1 [15] => 1 [specialinfo] => butoun Goverment Ouber [16] => butoun Goverment Ouber [street-name-2] => [17] => [building-number-2] => 0 [18] => 0 [appartment-no-2] => 0 [19] => 0 [specialinfo-2] => [20] => [city-2] => [21] => [street-name-3] => [22] => [building-number-3] => 0 [23] => 0 [appartment-no-3] => 0 [24] => 0 [specialinfo-3] => [25] => [city-3] => [26] => [groupid] => 1 [27] => 1 [truststatus] => 0 [28] => 0 [regstatus] => 0 [29] => 0 [admin] => [30] => )







                              <!-- Load Facebook SDK for JavaScript -->
                              <div id="fb-root"></div>
                                <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                                <!-- Your share button code -->
                                <div class="fb-share-button" 
                                    data-href="https://www.your-domain.com/your-page.html" 
                                    data-layout="button_count">
                                </div>
                                
                                <script>
                                window.fbAsyncInit = function() {
                                    FB.init({
                                    appId            : '‏1558224747618827',
                                    autoLogAppEvents : true,
                                    xfbml            : true,
                                    version          : 'v2.11'
                                    });
                                };

                                (function(d, s, id){
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) {return;}
                                    js = d.createElement(s); js.id = id;
                                    js.src = "https://connect.facebook.net/en_US/sdk.js";
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));
                                </script>



header('Location: '.$_SERVER['REQUEST_URI']);




                <form method="POST" name="wishlist" >
					<input type="number" min="0" name="wl_quantity" value="1" />
					<input type="hidden" name="wl_product" value="<?php echo $post->ID; ?>" />
					<input type="submit" value="<?php printf( __( 'add product') ); ?>" />
				</form>

				<?php
					// If user is logged in and has capability 'read'
					if( current_user_can( 'read' ) ) {
						// Create the wishlist array
						$_SESSION[ 'wishlist' ] = array();
					}
					
					// Check if a request for adding product ID to wishlist was made
					if( isset( $_REQUEST[ 'wl_product' ] ) && intval( $_REQUEST[ 'wl_product' ] ) ) {						
						// Add the product ID to the wishlist
						$_SESSION[ 'wishlist' ][ 'product_id' ] = intval( $_REQUEST[ 'wl_product' ] );
					}
					
					// Check if a request for adding product quantity to the wishlist was made
					if( !empty($_REQUEST[ 'wl_quantity' ] ) ) {
						//The wp_quantity value is set, so we want to increment the quantity in the session now
                        // If there's already a value for quantity set in the session, append the new value - else replace it
						if( !empty($_SESSION[ 'wishlist' ][ 'product_quantity' ] ) ) :
							$_SESSION[ 'wishlist' ][ 'product_quantity' ] = $_SESSION[ 'wishlist' ][ 'product_quantity' ] + intval( $_REQUEST[ 'wl_quantity' ] );
						else : 
							$_SESSION[ 'wishlist' ][ 'product_quantity' ] = intval( $_REQUEST[ 'wl_quantity' ] );
endif;
					}
?>




<!-- 
<div class="login-page">
    <div class="container">
         <h1 class="text-center"> <span class="active" data-class="login">Login</span> | <span data-class="signup">Signup</span> </h1>
         <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
             <div class="input-container">
                   <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Type Yuor Username" required="required" />
             </div>
             <div class="input-container">
                  <input class="form-control" type="password" name="password" autocomplete="new-password" placeholder="Type Yuor Password" required="required" />
            </div>
                  <input class="btn btn-primary btn-block"  name="login" type="submit" value="Login">
         </form> 

         <form class="signup" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
             <div class="input-container">
                 <input class="form-control" type="text" name="username" autocomplete="off" placeholder="Type Yuor Username " pattern=".{4,}" title=" Username Can't Be  4 char "   required />
             </div>
             <div class="input-container">
                 <input class="form-control" type="email" name="email"  placeholder="Type Yuor Email  " pattern=".{4,}" title="" required>
             </div>
             <div class="input-container">
                  <input class="form-control" type="password" name="password" autocomplete="new-password" placeholder="Type Yuor Password " minlength="4"   required />
             </div>
             <div class="input-container">
                  <input class="form-control" type="password" name="password2" autocomplete="new-password" placeholder="Type Yuor Password Agin  " minlength="4"  required  />
             </div>
                  <input class="btn btn-success btn-block" name="signup" type="submit" value="signup">

         </form>  
       
        -->

        </div>
        <div class="container">
 <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
        </tbody>
    </table>
 </div>



 <div id="thumbCarousel" class="carousel slide">
        <div class="carousel-inner">
            <?php 
                $i=0; 
                foreach($this->partner_images as $sr){
            ?>
            <?php 
                if($i==0){ 
            ?>
                <div class="item active">
            <?php } ?>
            
            <?php 
                    if($i % 2 == 0){ 
            ?>
                    <div class="item">
            <?php }?>
                        <div class="col-xs-3">
                            <a href="<?php echo $sr['url']; ?>">
                                <img src="<?php echo BASE_URL?>/partner-images/<?php echo $sr['name']?>" />
                            </a>
                        </div>
                              <?php if($i % 4 != 0){ ?></div><?php }?>
                            <?php $i++; } ?>
                       </div>
                      <a class="thumbleft" href="#thumbCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
                      <a class="thumbright" href="#thumbCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span> </a>
           </div>
      </div>



      <?php 
  echo "<div class='item active'>";
  echo "<div class='row'>";
    foreach($arr as $key=>$value)
    {
        //if we can divide $key by six without remainder
        if ($key % 6 == 0) 
        {
            echo "</div>";
            echo "</div>";
            echo "<div class='item'>";
            echo "<div class='row'>";
        }
         echo "<div class='col-md-2'>";
         echo '<a href="#" class="thumbnail" id="carousel-selector-'.$key.'"><img src="images/img'.$value.'.jpg" alt="Image" style="max-width:100%;"></a>';
        echo "</div>";
    }
echo "</div>";  
echo "</div>";?>   



********************************************
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM  product ORDER BY 'ASC'");
                            $stmt->execute();
                            $allCats = $stmt->fetchAll();
                            //$count = $stmt->rowCount();
                                //foreach($allCats as $cat ){ 
                               // While($cat){
                               //if($count == 0) {
      
                                $i = 1 ;
                                if(count($allCats)){
                                    foreach($allCats as $cat){
                                        if($i == 1) {?>
                          <div class="item active">
                                <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>">
                                        <?php 
                                            if(empty($cat['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$cat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                                                <span data-toggle="modal" data-target=".product-quick-modal">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </button>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                                        </div>

                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $cat['pro_name'] ?></h4>
                                            <p class="price"><?php echo $cat['pro_price'] ?> EGP</p>
                                            <p class="star-rating">
                                                <i class="colored fa fa-star"></i>
                                                <i class="colored fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- /.Col -->
                                </div><!-- /.Row -->
                        </div><!-- /.Item Active -->     
   
                                        <?php  $i++;
  
                                        } else { ?>
  
                        <div class="item">
                            <div class="row">
                                <div class="col-xs-6 col-md-3">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>">
                                        <?php 
                                            if(empty($cat['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$cat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                                                <span data-toggle="modal" data-target=".product-quick-modal">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </button>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                                        </div>

                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $cat['pro_name'] ?></h4>
                                            <p class="price"><?php echo $cat['pro_price'] ?> EGP</p>
                                            <p class="star-rating">
                                                <i class="colored fa fa-star"></i>
                                                <i class="colored fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </p>
                                        </div>
                                    </div>
                                </div><!-- /.Col -->
                            </div><!-- /.Row -->
                        </div><!-- /.Item -->

                                       <?php     $i++;
                                        }
                                    }
                                }
                            ?>



                        $getResult = $con->prepare("SELECT * FROM users WHERE username LIKE '%$search%'");

                        $getResult->execute();
                        
                        $count = $getResult->rowCount();
                        
                        if($count > 0){

                            while($allResult = $getResult->fetch()){

                                echo $allResult['username'];
                                echo 

                            } 

                        } else {

                                echo '<p> Not Found</p>';

                        }







                         if(isset($_POST['submit'])) {

                        $search     = $_POST['search'];

                        if(empty($search)){

                        echo '<button class="btn-block alert alert-warning"> Plase Search Here</button>';

                        } else {

                            $stmt = $con->prepare("SELECT * FROM  users WHERE username LIKE '%$search%' ");
                            $stmt->execute(array($search));
                            $allSearch = $stmt->fetchAll();
                            $row = $stmt->rowCount();
                            if($row > 1) {
                                echo '<caption>Search Result</caption>';
                                echo'<thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>User Name</th>
                                        <th>E-Mail</th>
                                        <th>Make Admin</th>
                                    </tr>
                                </thead>';
                                foreach($allSearch as $fatchsearch ) { 
                                    echo '<tbody>';
                                    echo '<tr>';
                                        echo '<td>'; static $s = 1 ;  echo $s++;  echo '</td>';
                                        echo '<td>'.$fatchsearch['username'].'</td>';
                                        echo '<td>'.$fatchsearch['email'].'</td>';

                                        if($fatchsearch['groupid'] == 1 ) {
                                            echo '<td><button  class="btn btn-success disabled btn-block"> Admin</button></td>';
                                        } else {
                                            echo '<form action="settings.php?action=make" method="post">';
                                            
                                            echo '<input type="hidden" name="admin" class="btn btn-info btn-block" value="'.$fatchsearch['userid'].'" >';    
                                            echo '<td><input type="submit" name="submit" class="btn btn-info btn-block" value="Make Admin" ></td>';    
                                            echo '</form>';
                                        }
                                    echo '</tr>';
                                    echo '</tbody>';
                                }
                            } else {
                                    echo '<tr>';
                                        echo '<td colspan="5"><p>Sorry No users To least</p></td>';
                                    echo '</tr>';
                            }

                        }
                    }