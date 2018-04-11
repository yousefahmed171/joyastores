else { // info form 

            // $formerror = array();

            // $user      = $_POST['username'];
            // $name      = $_POST['fullname'];
            // $phone     = $_POST['phone'];
            // $email     = $_POST['email'];
            // $day       = $_POST['day'];
            // $month     = $_POST['month'];
            // $yaer      = $_POST['yaer'];
            // $gender    = $_POST['gender'];
            // $pass1     = $_POST['password1'];
            // $pass2     = $_POST['password2'];

            // if(isset($_POST['username'])) {
            //     $filteruser = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
            //     if(strlen($filteruser) < 4 ) {
            //         $formerror[] = 'UserName Must Be More Than 4 Character';
            //     }
            // }
            // if(isset($_POST['fullname'])) {
            //     $filtername = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING);
            //     if(strlen($filtername) < 6 ) {
            //         $formerror[] = 'FullName Must Be More Than 6 Character';
            //     }
            // }
            // if(isset($_POST['phone'])) {
            //     $filterphone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
            //     if(strlen($filterphone) < 11 ) {
            //         $formerror[] = 'Phone Must Be  11 Number';
            //     }
            // }   
            //     if (isset($_POST['email'])) {
            //         $filterEmail  = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL) ;
            //         if (filter_var($filterEmail , FILTER_VALIDATE_EMAIL ) != true) {
            //             $formError[] = 'This Email Is No\'t Vaild';
            //         }
            //     } 
            // if(isset($_POST['day'])) {
            //     $filterday = filter_var($_POST['day'], FILTER_SANITIZE_STRING);
            //     if(strlen($filterday) > 2) {
            //         $formerror[] = 'day Must Be Filed Number ';
            //     }
            // }
            // if(isset($_POST['month'])) {
            //     $filtermonth = filter_var($_POST['month'], FILTER_SANITIZE_STRING);
            //     if(strlen($filtermonth) > 2) {
            //         $formerror[] = 'month Must Be Filed Number';
            //     }
            // } 
            // if(isset($_POST['yaer'])) {
            //     $filteryaer = filter_var($_POST['yaer'], FILTER_SANITIZE_STRING);
            //     if(strlen($filteryaer) > 4) {
            //         $formerror[] = 'yaer Must Be Filed Number';
            //     }      
            // }
            // if (isset($_POST['password']) && isset($_POST['password2'])) {

            //     if (empty($_POST['password'])) {

            //         $formError[] =  'Password Can\'t Be Embty ';
            //     }

            //     $pass1 = sha1($_POST['password']);
            //     $pass2 = sha1($_POST['password2']);

            //     if ($pass1 !== $pass2 ) {

            //         $formError[] = 'Soory Password Is No\'t Mutch ';
            //     }
            // }

            

            // if (empty($formerror)) {

            //     $check = checkItem("username", "users", "$user");

            //     if ($check == 1 ) {
            //             $formerror[] = 'Soory This user is Exitsis' ;
            //     } else {

            //         $stmt = $con->prepare("INSERT INTO
            //                                users (`username`, `fullname`, `phone`, `email`, `birth-day`, `birth-month`, `birth-yaer`, `gender`, `password`,	`created`  )
            //                                VALUES (:zuser, :zname, :zphone, :zemail, :zday, :zmonth, :zyaer, :zgender, :zpassword, NOW())");
            //         $stmt->execute(array(
                                        
            //                         'zuser'          => $user,
            //                         'zname'          => $name,
            //                         'zphone'         => $phone,
            //                         'zemail'         => $email,
            //                         'zday'           => $day,
            //                         'zmonth'         => $month,
            //                         'zyaer'          => $yaer,
            //                         'zgender'        => $gender,
            //                         'zpassword'      => $pass1
            //                                                  ));

            //                         $theMsg = "<div class='alert alert-success'> Hi Mr  . $user .  insert new member  </div>";
            //                         redirecthome($theMsg,'back' , 3 );
                                                        
            //                         $succesMsg = 'Congrats You Are Now Register User ';
            //     }


        //}
             $theMsg = "<div class='alert alert-danger'> Hi Mr  . $user .  insert new member  </div>";
                            redirecthome($theMsg,'back' , 50 );
                        }             
       }
    }





    //filter 


    //&idbrand=<?php echo $brand['id_brand'] ?>&idcat=<?php echo  $cat['id_cat']  ?>



                        // function url(){
                    //     return sprintf(
                    //         "%s://%s%s",
                    //         isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
                    //         $_SERVER['SERVER_NAME'],
                    //         $_SERVER['REQUEST_URI']
                    //     );
                    // }
                    //$url =  url();
                    
                //header('Location: '.$_SERVER['REQUEST_URI']);
                // echo '<script>
                // location.reload(); 
                // </script>';





                <div id="carousel-new" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php 
                            $stmt = $con->prepare("SELECT * FROM  product ORDER BY 'ASC'");
                            $stmt->execute();
                            $allCats = $stmt->fetchAll();
                            //$count = $stmt->rowCount();
                                //foreach($allCats as $cat ){ 
                               // While($cat){
                               //if($count == 0) {
      
                                $i = 0 ;
                               // if(count($allCats)){
                            foreach($allCats as $cat){
                                        if($i == 0) {?>
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
                               // }
                            ?>



<!--start edit php -->
                <div class="row hidden-xs hidden-sm">
                    <div class="col-xs-7">
                        <h3><a href="#">New Arrival</a></h3>
                    </div>

                    <div class="col-xs-5">
                    <!-- Controls -->
                        <div class="controls pull-right">
                            <a class="left fa fa-chevron-left fa-lg" href="#carousel-new"
                        data-slide="prev"></a>
                            <a class="right fa fa-chevron-right fa-lg" href="#carousel-new"
                        data-slide="next"></a>
                        </div>
                    </div>
                </div>

                <div id="carousel-new" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                    <?php 
                            $stmt = $con->prepare("SELECT * FROM  product ORDER BY 'ASC'");
                            $stmt->execute();
                            $allCats = $stmt->fetchAll();
               
                                $i = 0 ;
                              
                            foreach($allCats as $cat){
                                        if($i == 0) {?>
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
                               // }
                            ?>
                    </div><!-- /.Carousel-Inner -->
                </div><!-- /.Carousel-Slider -->


<!-- end edit php -->


<div class="container">
<div class="row hidden-xs hidden-sm">
                    <div class="col-xs-7">
                        <h3><a href="#">New Arrival</a></h3>
                    </div>

                    <div class="col-xs-5">
                    <!-- Controls -->
                        <div class="controls pull-right">
                            <a class="left fa fa-chevron-left fa-lg" href="#carousel-new"
                        data-slide="prev"></a>
                            <a class="right fa fa-chevron-right fa-lg" href="#carousel-new"
                        data-slide="next"></a>
                        </div>
                    </div>
                </div>

                <div id="carousel-new" class="carousel slide hidden-xs hidden-sm" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">


                                
                            <?php 
                            $stmt = $con->prepare("SELECT * FROM product ORDER BY id_product ASC LIMIT 4");
                            $stmt->execute();
                            $allCat = $stmt->fetchAll();
                            foreach($allCat as $bat){
                            ?>
                            <div class="col-xs-6 col-md-3">
                               <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $bat['id_product'] . '&pagename=' . str_replace(' ', '-', $bat['pro_name'])?>">
                                        <?php 
                                            if(empty($cat['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$bat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $bat['id_product'] . '&pagename=' . str_replace(' ', '-', $bat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                                                <span data-toggle="modal" data-target=".product-quick-modal">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </button>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                                        </div>

                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $bat['pro_name'] ?></h4>
                                            <p class="price"><?php echo $bat['pro_price'] ?> EGP</p>
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
 <?php }?>
                            </div><!-- /.Row -->

                        </div><!-- /.Item-Active -->

                        <div class="item">
                            <div class="row">
<?php 
                            $stmt = $con->prepare("SELECT * FROM product ORDER BY id_product DESC LIMIT 4");
                            $stmt->execute();
                            $allCat = $stmt->fetchAll();
                            foreach($allCat as $bat){
                            ?>
                            <div class="col-xs-6 col-md-3">
                               <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $bat['id_product'] . '&pagename=' . str_replace(' ', '-', $bat['pro_name'])?>">
                                        <?php 
                                            if(empty($cat['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$bat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $bat['id_product'] . '&pagename=' . str_replace(' ', '-', $bat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                                                <span data-toggle="modal" data-target=".product-quick-modal">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                            </button>

                                            <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                                        </div>

                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $bat['pro_name'] ?></h4>
                                            <p class="price"><?php echo $bat['pro_price'] ?> EGP</p>
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
 <?php }?>

                            </div><!-- /.Row -->

                        </div><!-- /.Item -->
                        
                        
                    </div><!-- /.Carousel-Inner -->
                </div><!-- /.Carousel-Slider -->
</div>


        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product ASC LIMIT 1");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
                                if(empty($catTop['pro_sale'])){
                        ?>
                                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                                    <div class="thumbnail"><a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>">
                                        <?php echo  '<img src="admin/uploades/img-product/'.$catTop['pro_img'].'" alt="'.$catTop['pro_name'].'" class="img-responsive">';?>
                                        <div class="caption">
                                        <h4 class="text-center"><?php echo $catTop['pro_name'] ?></h4>
                                        <del class="price"><?php echo $catTop['pro_price'] ?> EGP</del>
                                        <p class="price" style="margin-left:10px;"><?php echo $catTop['pro_after_sale'] ?> EGP</p>
                                        <p class="star-rating"><i class="colored fa fa-star"></i><i class="colored fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i></p>
                                        <article class="discount">
                                            <p><?php echo $catTop['pro_sale'] ?>% Off</p>
                                        </article>
                                        </div></a></div>
                                    </div>
                                </div><!-- /.Col -->
                        <?php     } else {
                            echo "<h1>not </h1>";
                        } } ?>





                        // } elseif ($do = 'updateaddress') {

    // if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //     $street_name        = filter_var($_POST['street-name'], FILTER_SANITIZE_STRING);
    //     $building_number    = filter_var($_POST['building-number'], FILTER_SANITIZE_STRING);
    //     $appartment_no      = filter_var($_POST['appartment-no'],FILTER_SANITIZE_NUMBER_INT);
    //     $specialinfo        = filter_var($_POST['specialinfo'], FILTER_SANITIZE_STRING);
    //     $country            = filter_var($_POST['country'], FILTER_SANITIZE_STRING);
    //     $city               = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
    //     $id                 = $_POST['userid'];
        
    //     if(isset($street_name)) {
    //         if(strlen($street_name) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }
    //     if(isset($building_number)) {
    //     if(strlen($building_number) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }
    //     if(isset($appartment_no)) {
    //         if(strlen($appartment_no) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }
    //     if(isset($specialinfo)) {
    //         if(strlen($specialinfo) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }
    //     if(isset($country)) {
    //         if(strlen($country) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }
    //     if(isset($city)) {
    //         if(strlen($city) < 4 ) {
    //             $formErrors[] = 'UserName Must Be More Than 4 Character';
    //         }
    //     }

    //     if(empty($formErrors)) {
    //         $stmt = $con->prepare("UPDATE users SET 
    //                             `street-name` = ?, `building-number` = ?, `appartment-no` = ?, `specialinfo` = ?, `country` = ?, `city` = ?
    //                              WHERE userid = ? ");
                                    
    //         $stmt->execute(array(
    //                         $street_name,
    //                         $building_number,
    //                         $appartment_no,
    //                         $specialinfo,
    //                         $country,
    //                         $city,
    //                         $id
    //                      ));

    //         header('Location: ' . $_SERVER["HTTP_REFERER"] );   

    //     } else {
    //         foreach ($formErrors as  $error) {
    //              echo "<div class='alert alert-danger'> this error $error </div>";
    //         }
    //     }
    // }
// } else {
//     echo 'error';
// }


        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Shopping Cart</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="shopping-cart" class="well">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Item info</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <?php 
                            if (isset($_SESSION['user'])) {
                                $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                                $getUser->execute(array($sessionuser));
                                $infouser = $getUser->fetch();
                                $userid = $infouser['userid'];
                            }
                                if(isset($_SESSION['user'])){
                                    $stmt = $con->prepare("SELECT orders.*, product.*
                                                            FROM  orders
                                                            INNER JOIN product
                                                            ON product.id_product = orders.idproduct
                                                            WHERE iduser = $userid
                                                            ");
                                    $stmt->execute(array($userid));
                                    $getOrder = $stmt->fetchAll();
                                    foreach($getOrder as $order){
                        ?>
                        <tbody>
                            <tr>
                                <td>
                                <?php 
                                if(empty($order['pro_img'])){
                                    echo  '<img src="admin/uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                } else {
                                    echo  '<img src="admin/uploades/img-product/'.$order['pro_img'].'" alt="Joya Stores" class="img-responsive" width="80px">';
                                }
                                ?>
                                    <!-- <img src="admin/uploades/img-product/" width="80px" /> -->
                                </td>
                                <td>
                                    <p><?php echo $order['pro_name'] ?></p>
                                    <p>Seller : <?php echo $order['pro_seller'] ?></p>
                                    <p>Color : <span class=" product-option color-option active" style="background-color:<?php echo $order['color'] ?>;display: table-cell;"></span></p>
                                    <p>Size : <?php echo $order['size'] ?></p>
                                </td>
                                <td>
                                    <input class="form-control" name="quantity" type="number" value="<?php echo $order['quantity'] ?>" min="0" max="11" required />
                                </td>
                                <td><h4> <?php echo $order['pro_price'] ?> EGP</h4></td>
                                <td style="text-align:right"><h4><?php $subtotal =  $order['pro_price'] * $order['quantity'] ; echo $subtotal;  ?> EGP</h4></td>
                                <td>
                                    <button class="btn btn-danger"><i class="fa fa-trash fa-lg"></i> Delete</button>
                                </td> 
                                <?php 
                                }
                             ?>
                            </tr>

                              <?php 
                            if (isset($_SESSION['user'])) {
                                $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                                $getUser->execute(array($sessionuser));
                                $infouser = $getUser->fetch();
                                $useid = $infouser['userid'];
                            }
                                if(isset($_SESSION['user'])){
                                    $stmt = $con->prepare("SELECT SUM(quantity)  FROM  orders WHERE iduser = $useid ");
                                    $stmt->execute(array($useid));
                                    $SumOrder = $stmt->fetch();
                                    //$pric = $sumorder['SUM(pro_price)'] ; $quant = $sumorder['SUM(quantity)'] ;  $totalsub = $pric * $quant; 
                                    // if(isset($_GET['id'])){
                                    //     $id = $_GET['id'];
                                    // }
                                    // $stmt = $con->prepare("SELECT SUM(pro_price)  FROM  product WHERE id_product = $idpro ");
                                    // $stmt->execute(array($idpro));
                                    // $SumOrderpro = $stmt->fetch();

                                    // echo $SumOrder['SUM(quantity)'];
                                    // echo $SumOrderpro['SUM(pro_price)'];
                                    
                            ?>
                                      
                            <tr>
                                <td colspan="5" style="text-align:right"><h4>Subtotal: <?php    ?> EGP</h4></td>
                            </tr>
                         
                        </tbody> 
                    </table>
                <?php   } } ?>
                </div><!-- /.table-responsive -->
                <div class="row btn-shopping">
                    <div class="col-xs-12 col-sm-6">
                        <a href="index.php" class="btn btn-info btn-lg">Back to shopping</a>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <a href="checkout-process.html" class="btn btn-success btn-lg pull-right">Continue checkout</a>
                    </div>

                </div><!-- /.Row -->
            </section><!-- /#Product-Panel/.Well -->
            
        <hr>



        <!-- UPDATE orders SET `quantity` = `quantity` + 1 WHERE id_order = 18 --> 



        $city               = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $region_name        = filter_var($_POST['region_name'], FILTER_SANITIZE_STRING);
        $street_name        = filter_var($_POST['street_name'], FILTER_SANITIZE_STRING);
        $building_name      = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
        $appartment_number  = filter_var($_POST['appartment_number'],FILTER_SANITIZE_NUMBER_INT);
        $Notes              = filter_var($_POST['Notes'], FILTER_SANITIZE_STRING);
        $idadress           = $_POST['id_address'];