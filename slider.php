<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
  <div class="container">
      <section class="well" id="product-panel">
    <?php 
        $stmt = $con->prepare("SELECT * FROM species LIMIT 5");
        $stmt->execute();
        $allspecies = $stmt->fetchAll();
        foreach ($allspecies as $species) {
            
        $id = $species['id_species'];
    ?>

  
      
        <!--Carousel Large Screen-->
        <div class="row hidden-xs hidden-sm">
          <div class="col-xs-12">
            <?php 
            echo '<h3 class="text-center"><a href="products.php?idspecies='. $species['id_species'] . '&pagename=' . str_replace(' ', '-', $species['name_en']) . '">'.$species['name_en'].'</a> </h3>';
            ?>
          </div>
        </div>
        <div class="carousel-tabs hidden-xs hidden-sm">
            <ul class="nav nav-tabs text-center" role="tablist">
                <?php 
                    $stmt = $con->prepare("SELECT * FROM category WHERE idspecies = $id");
                    $stmt->execute();
                    $allCategory = $stmt->fetchAll();
                    foreach ($allCategory as $category) {
                    $idcat = $category['id_cat'];
                        echo '<li role="presentation"><a href="#" aria-controls="jeans-lg" role="tab" data-toggle="tab">'.$category['name_en'].'</a></li>';
                    }
                ?>  

            </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="t-shirt-lg" role="tabepane1">
              <div class="carousel slide hidden-xs hidden-sm" id="carousel-tab-lg-1" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product ASC LIMIT 4");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
                        ?>
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>">
                                        <?php 
                                            if(empty($catTop['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$catTop['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" ></a>
                                        </div>
                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $catTop['pro_name'] ?></h4>
                                            <p class="price"><?php echo $catTop['pro_price'] ?> EGP</p>
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
                        <?php     } ?>
                    </div>
                  </div>
                  <div class="item">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product DESC LIMIT 4");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
                        ?>
                                <div class="col-md-3">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>">
                                        <?php 
                                            if(empty($catTop['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$catTop['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" ></a>
                                        </div>
                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $catTop['pro_name'] ?></h4>
                                            <p class="price"><?php echo $catTop['pro_price'] ?> EGP</p>
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
                        <?php     } ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-xs-12">
                      <div class="controls">
                        <button class="btn btn-default custom-btn btn-sm" href="#carousel-tab-lg-1" data-slide="prev"><i class="fa fa-chevron-left"></i></button>
                        <button class="btn btn-default custom-btn btn-sm" href="#carousel-tab-lg-1" data-slide="next"><i class="fa fa-chevron-right"></i></button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div><!---->
        </div><!---->

        <!--Carousel Small Screen-->
        <div class="row visible-xs visible-sm">
          <div class="col-xs-12">
            <?php 
                echo '<h3 class="text-center"><a href="products.php?idspecies='. $species['id_species'] . '&pagename=' . str_replace(' ', '-', $species['name_en']) . '">'.$species['name_en'].'</a></h3>';
            ?>
          </div>
        </div>
        <div class="carousel-tabs visible-xs visible-sm">
          <ul class="nav nav-tabs text-center" role="tablist">
            <?php 
                $stmt = $con->prepare("SELECT * FROM category WHERE idspecies = $id");
                $stmt->execute();
                $allCategory = $stmt->fetchAll();
                foreach ($allCategory as $category) {
                $idcat = $category['id_cat'];
                    echo '<li role="presentation"><a href="#" aria-controls="jeans-lg" role="tab" data-toggle="tab">'.$category['name_en'].'</a></li>';
                }
            ?> 
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="t-shirt" role="tabepane1">
              <div class="carousel slide visible-xs visible-sm" id="carousel-tabs-sm-1" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product DESC LIMIT 2");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
                        ?>
                                <div class="col-xs-6 custom-padd-left">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>">
                                        <?php 
                                            if(empty($catTop['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$catTop['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" ></a>
                                        </div>
                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $catTop['pro_name'] ?></h4>
                                            <p class="price"><?php echo $catTop['pro_price'] ?> EGP</p>
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
                        <?php     } ?>
                    </div>
                  </div>
                  <div class="item">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product ASC LIMIT 2");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
                        ?>
                                <div class="col-xs-6 custom-padd-left">
                                    <div class="thumbnail">
                                        <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>">
                                        <?php 
                                            if(empty($catTop['pro_img'])){
                                                echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                            } else {
                                                echo  '<img src="admin/uploades/img-product/'.$catTop['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                            }
                                        ?>
                                        <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                            <a href="product-details.php?proid=<?php echo $catTop['id_product'] . '&pagename=' . str_replace(' ', '-', $catTop['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" 
                                                type="button" ></a>
                                        </div>
                                        <div class="caption">
                                            <h4 class="text-center"><?php echo $catTop['pro_name'] ?></h4>
                                            <p class="price"><?php echo $catTop['pro_price'] ?> EGP</p>
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
                        <?php     } ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="controls text-center">
                    <button class="btn btn-default custom-btn btn-sm" href="#carousel-tabs-sm-1" data-slide="prev"><i class="fa fa-chevron-left"></i></button>
                    <button class="btn btn-default custom-btn btn-sm" href="#carousel-tabs-sm-1" data-slide="next"><i class="fa fa-chevron-right"></i></button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
        <article class="promo-section">
          <div class="row">
            <div class="col-sm-6 hidden-xs">
              <div class="promo-pic">
                <div class="promo-overlay text-center">
                  <h1><?= $species['name_en'] ?></h1>
                  <?= '<a href="products.php?idspecies='. $species['id_species'] . '&pagename=' . str_replace(' ', '-', $species['name_en']) . '" class="btn btn-default">View All</a>';?>
                </div><img class="center-block img-responsive" src="img/mod.jpg" alt="promo-pic" title="promo-pic"/>
              </div>
            </div>
            <div class="col-xs-8 col-xs-offset-2 col-sm-offset-0 col-sm-6">
              <div class="controls"><a class="left fa fa-chevron-left fa-lg" href="#carousel-promo" data-slide="prev"></a><a class="right fa fa-chevron-right fa-lg" href="#carousel-promo" data-slide="next"></a></div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <h2>Hot Deals</h2>
                </div>
              </div>
              <div class="carousel slide" id="carousel-promo" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="item active">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id AND pro_sale > 0 ORDER BY id_product ASC LIMIT 1");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
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
                                        </div></a>
                                    </div>
                                </div><!-- /.Col -->
                        <?php     }  ?>
                    </div>
                  </div>
                  <div class="item">
                    <div class="row">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM product where idspecies = $id AND pro_sale > 0 ORDER BY id_product DESC LIMIT 1");
                            $stmt->execute();
                            $allCatsTop = $stmt->fetchAll();
                            foreach($allCatsTop as $catTop) {
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
                                        </div></a>
                                    </div>
                                </div><!-- /.Col -->
                        <?php     }  ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </article>


        <!--start edit php -->
             
                <div class="row hidden-xs hidden-sm">
                    <div class="col-xs-7">
                        <h3><a href="#">New Arrival <?php echo $species['name_en'] ?></a></h3>
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
                            <?php 
                                $stmt = $con->prepare("SELECT * FROM product where idspecies = $id  ORDER BY id_product DESC LIMIT 4");
                                $stmt->execute();
                                $allCats = $stmt->fetchAll();
                                foreach($allCats as $cat) {
                            ?>
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
                                                    type="button"></a>
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
                            <?php   }  ?>
                        </div><!-- /.Item Active --> 

                        <div class="item">
                            <?php 
                                $stmt = $con->prepare("SELECT * FROM product where idspecies = $id ORDER BY id_product ASC LIMIT 4");
                                $stmt->execute();
                                $allCats = $stmt->fetchAll();
                                foreach($allCats as $cat){
                            ?>
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
                                                    type="button" ></a>
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
                            <?php     } ?>
                        </div><!-- /.Item -->
                    </div><!-- /.Carousel-Inner -->
                </div><!-- /.Carousel-Slider -->
            <!-- end edit php -->
    <?php  } // end species  ?> 

</section>
</div>

<?php
 include $tpl . 'footer.php'; 
 ob_end_flush(); 
 ?>
           