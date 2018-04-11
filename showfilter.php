<?php 
    $page = '';
    if(isset($_GET['page'])){
    $page = $_GET['page'];
    
    }

        if(isset($_POST['submit'])){
                @$cats = $_POST['cat'];
                @$brands = $_POST['brand'];
                @$cat = implode(', ',$cats);
                @$brand = implode(" ",$brands);

?>
        <?php   if(!empty($cat) && !empty($brand)){
                    $stmt = $con->prepare("SELECT * FROM  product WHERE idcat IN ($cat) ");
                    $stmt->execute($cats);
                    $allCats = $stmt->fetchAll();
                    
                    foreach($allCats as $allcat ){ 
                    ?>
                    <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>">
                    <?php 
                    if(empty($allcat['pro_img'])){
                        echo  '<img src="admin/uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                    } else {
                        echo  '<img src="admin/uploades/img-product/'.$allcat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                    }
                    ?>
                    </a>
                    <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                        <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    </div>

                    <div class="caption">
                        <h4 class="text-center"><?php echo $allcat['pro_name'] ?></h4>
                        <p class="price"><?php echo $allcat['pro_price'] ?>  EGP </p>
                        <!-- <p class="star-rating">
                            <i class="colored fa fa-star"></i>
                            <i class="colored fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p> -->
                    </div>
                </div>
            </div><!-- /.Col -->
                <?php } 
            
                }elseif(!empty($cat)){
                    $stmt = $con->prepare("SELECT * FROM  product WHERE idcat IN ($cat) ");
                    $stmt->execute($cats);
                    $allCats = $stmt->fetchAll();
                    
                    foreach($allCats as $allcat ){ 
                    ?>
                    <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>">
                    <?php 
                    if(empty($allcat['pro_img'])){
                        echo  '<img src="admin/uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                    } else {
                        echo  '<img src="admin/uploades/img-product/'.$allcat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                    }
                    ?>
                    </a>
                    <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                        <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>

                    </div>

                    <div class="caption">
                        <h4 class="text-center"><?php echo $allcat['pro_name'] ?></h4>
                        <p class="price"><?php echo $allcat['pro_price'] ?>  EGP </p>
                        <!-- <p class="star-rating">
                            <i class="colored fa fa-star"></i>
                            <i class="colored fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p> -->
                    </div>
                </div>
            </div><!-- /.Col -->
                <?php }
                }

                elseif(!empty($brand)){
                    $stmt = $con->prepare("SELECT * FROM  product WHERE  idbrand IN ($brand) ");
                    $stmt->execute($brands);
                    $allCats = $stmt->fetchAll();
                    
                    foreach($allCats as $allcat ){ 
                    ?>
                    <div class="col-xs-6 col-md-4">
                <div class="thumbnail">
                    <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>">
                    <?php 
                    if(empty($allcat['pro_img'])){
                        echo  '<img src="admin/uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                    } else {
                        echo  '<img src="admin/uploades/img-product/'.$allcat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                    }
                    ?>
                    </a>
                    <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                        <a href="product-details.php?proid=<?php echo $allcat['id_product'] . '&pagename=' . str_replace(' ', '-', $allcat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button" class="btn btn-default"><i class="fa fa-search"></i></a>
                    </div>

                    <div class="caption">
                        <h4 class="text-center"><?php echo $allcat['pro_name'] ?></h4>
                        <p class="price"><?php echo $allcat['pro_price'] ?>  EGP </p>
                        <!-- <p class="star-rating">
                            <i class="colored fa fa-star"></i>
                            <i class="colored fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </p> -->
                    </div>
                </div>
            </div><!-- /.Col -->
                <?php }
                }
                else {
                    echo '<div class="alert alert-warning"> You Should Select One Filter  </div>';
                }
        }
?>

</div>
</div>