<?php 

include_once 'connect.php';

include_once 'include/function/function.php';

$title = 'Joya Stores';


if(isset($_GET['show'])){
    $show = $_GET['show'];
}
if($show == 'men'){

            $stmt = $cons->prepare("SELECT * FROM  product WHERE `idspecies` = '25' ");
            $stmt->execute();
            $allMen = $stmt->fetchAll();
            foreach($allMen as $product ) { 
            ?>
            <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>">
                    <?php 
                    if(empty($product['pro_img'])){
                        echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                    } else {
                        echo  '<img src="admin/uploades/img-product/'.$product['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                    }
                    ?>
                    </a>
                    <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                        <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                        <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                            <span data-toggle="modal" data-target=".product-quick-modal">
                                <i class="fa fa-eye"></i>
                            </span>
                        </button>

                        <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                    </div>

                    <div class="caption">
                        <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                        <p class="price"><?php echo $product['pro_price'] ?>  EGP </p>
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
            <?php  
            } ?>
<?php
    } elseif($show == 'women'){
        $stmt = $cons->prepare("SELECT * FROM  product WHERE `idspecies` = '26' ");
        $stmt->execute();
        $allMen = $stmt->fetchAll();
        foreach($allMen as $product ) { 
        ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
                <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>">
                <?php 
                if(empty($product['pro_img'])){
                    echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                } else {
                    echo  '<img src="admin/uploades/img-product/'.$product['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                }
                ?>
                </a>
                <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                        <span data-toggle="modal" data-target=".product-quick-modal">
                            <i class="fa fa-eye"></i>
                        </span>
                    </button>

                    <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                </div>

                <div class="caption">
                    <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                    <p class="price"><?php echo $product['pro_price'] ?>  EGP </p>
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
        <?php  
        } 
        
    } elseif($show == 'boys') {
        $stmt = $cons->prepare("SELECT * FROM  product WHERE `idspecies` = '27' ");
        $stmt->execute();
        $allMen = $stmt->fetchAll();
        foreach($allMen as $product ) { 
        ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
                <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>">
                <?php 
                if(empty($product['pro_img'])){
                    echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                } else {
                    echo  '<img src="admin/uploades/img-product/'.$product['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                }
                ?>
                </a>
                <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                        <span data-toggle="modal" data-target=".product-quick-modal">
                            <i class="fa fa-eye"></i>
                        </span>
                    </button>

                    <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                </div>

                <div class="caption">
                    <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                    <p class="price"><?php echo $product['pro_price'] ?>  EGP </p>
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
        <?php  
        } 

    } elseif($show == 'girs') {
        $stmt = $cons->prepare("SELECT * FROM  product WHERE `idspecies` = '28' ");
        $stmt->execute();
        $allMen = $stmt->fetchAll();
        foreach($allMen as $product ) { 
        ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
                <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>">
                <?php 
                if(empty($product['pro_img'])){
                    echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                } else {
                    echo  '<img src="admin/uploades/img-product/'.$product['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                }
                ?>
                </a>
                <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                        <span data-toggle="modal" data-target=".product-quick-modal">
                            <i class="fa fa-eye"></i>
                        </span>
                    </button>

                    <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                </div>

                <div class="caption">
                    <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                    <p class="price"><?php echo $product['pro_price'] ?>  EGP </p>
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
        <?php  
        } 

    } elseif($show == 'baby') {
        $stmt = $cons->prepare("SELECT * FROM  product WHERE `idspecies` = '29' ");
        $stmt->execute();
        $allMen = $stmt->fetchAll();
        foreach($allMen as $product ) { 
        ?>
        <div class="col-xs-6 col-md-4">
            <div class="thumbnail">
                <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>">
                <?php 
                if(empty($product['pro_img'])){
                    echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                } else {
                    echo  '<img src="admin/uploades/img-product/'.$product['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                }
                ?>
                </a>
                <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    <button data-toggle="tooltip" data-placement="bottom" title="Quick View" class="btn btn-default">
                        <span data-toggle="modal" data-target=".product-quick-modal">
                            <i class="fa fa-eye"></i>
                        </span>
                    </button>

                    <button data-toggle="tooltip" data-placement="bottom" title="Add To Cart" class="btn btn-default"><i class="fa fa-shopping-cart"></i></button>
                </div>

                <div class="caption">
                    <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                    <p class="price"><?php echo $product['pro_price'] ?>  EGP </p>
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
        <?php  
        } 
    } elseif($show == 'search') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $search = $_POST['search'];

            if(empty($search)){
                echo 'you should enter name search';
            } else {

                $stmt = $cons->prepare("SELECT * FROM  product WHERE pro_name LIKE '%$search%' ");
                $stmt->execute();
                $allSearch = $stmt->fetchAll();
                foreach($allSearch as $search ) { 
                ?>
                <div class="col-xs-6 col-md-4"> 
                    <div class="thumbnail">
                        <a href="product-details.php?proid=<?php echo $search['id_product'] . '&pagename=' . str_replace(' ', '-', $search['pro_name'])?>">
                        <?php 
                        if(empty($search['pro_img'])){
                            echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                        } else {
                            echo  '<img src="admin/uploades/img-product/'.$search['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                        }
                        ?>
                        </a>
                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                            <a href="product-details.php?proid=<?php echo $search['id_product'] . '&pagename=' . str_replace(' ', '-', $search['pro_name'])?>" ></a>
                        </div>

                        <div class="caption">
                            <h4 class="text-center"><?php echo $search['pro_name'] ?></h4>
                            <p class="price"><?php echo $search['pro_price'] ?>  EGP </p>
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

<?php
                            } // end foreach
            } // end else 
        } // end if Request

    } elseif($show == 'order') {
       
        if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET["id"]) : 0;

            if (isset($_SESSION['user'])) {
                $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                $getUser->execute(array($sessionuser));
                $infouser = $getUser->fetch();
                $userid = $infouser['userid'];
            }

            if(isset($_SESSION['user'])) {

                @$color       = $_POST['color'];
                $size        = $_POST['size'];
                $quantity    = $_POST['quantity'];

                $formerroes = array();

                if(empty($quantity)){
                    $formerroes[] = 'You should Enter Faild Number';
                }

                if(empty($formerroes)) {
   
                    $stmt = $cons->prepare("INSERT INTO `cart`(`color`, `size`, `quantity`, `iduser`, `idproduct`)
                                                        VALUES(:zcolor, :zsize, :zquantity, :ziduser, :zidproduct)");
                    $stmt->execute(array(
                                    'zcolor'        => $color,
                                    'zsize'         => $size,
                                    'zquantity'     => $quantity,
                                    'ziduser'       => $userid,
                                    'zidproduct'    => $id
                                        ));
                                        
                            header("Location: shopping-cart.php");
                } else {
                        echo '<div class="container">';
                        $theMsg = "<div class='alert alert-danger'>  You Shold delete or edit species  </div>";
                        redirecthome($theMsg,'category.php' , 1 );
                        echo '</div>';
                }
            } else {
                header('Location: login-index.php');
             
            }
        }
    }
?>