<?php

    ob_start();  
    
    session_start();

    $title = 'Joya Stores';

    include 'init.php';
?>  

        <!--Main Carousel For Large Screen-->
        <div class="carousel slide hidden-xs" id="carousel-main" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators hidden-xs">
            <li class="active" data-target="#carousel-main" data-slide-to="0"></li>
            <li data-target="#carousel-main" data-slide-to="1"></li>
        </ol>
        <!--Wrapper For Slides-->
        <div class="carousel-inner" role'list-box'>
            <?php 
                $stmt = $con->prepare("SELECT * FROM `main-slider`");
                $stmt->execute();
                $getslider = $stmt->fetchAll();
                $i = 0 ;
                foreach ($getslider as $info) {
                    if($i == 0){
                        echo '<div class="item active">';
                            if(empty($info['pimg_en'])) {
                                echo "<img src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                            } else {
                                echo "<img src='admin/uploades/home-scren/"  . $info['pimg_en'] . "' alt='home-scren1'  />"; 
                            }
                        echo '</div>';
                        $i++; 
                    } else {
                        echo '<div class="item">';
                            if(empty($info['pimg_ar'])) {
                                echo "<img src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                            } else {
                                echo "<img src='admin/uploades/home-scren/"  . $info['pimg_en'] . "' alt='home-scren2'  />"; 
                            }
                        echo '</div>';
                        $i++;
                    }
                }
            ?>
        </div>
        <!--Controls--><a class="left carousel-control" href="#carousel-main" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="right carousel-control" href="#carousel-main" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span><span class="sr-only">Next</span></a>
        </div>

        <!--No Indicators In Small Screen-->
        <!--Wrapper For Slides-->
        <div class="carousel slide visible-xs" id="carousel-main-sm" data-ride="carousel">
            <div class="carousel-inner full-hei-slider" role'list-box'>
                <?php 
                    $stmt = $con->prepare("SELECT * FROM `main-slider` LIMIT 1 ");
                    $stmt->execute();
                    $getslider = $stmt->fetchAll();
                    foreach ($getslider as $info) {
                            echo '<div class="item active">';
                                if(empty($info['pimg_en'])) {
                                    echo "<img src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                                } else {
                                    echo "<img src='admin/uploades/home-scren/"  . $info['mimg_en'] . "' alt='home-scren1'  />"; 
                                }
                            echo '</div>';
                    }
                ?>
            </div>
        </div>


        <section class="site-stikers">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6 col-md-3 custom-padd-right">
                        <?php
                        $stmt = $con->prepare("SELECT * FROM `stikers` WHERE type = 4");
                        $stmt->execute();
                        $stikers4 = $stmt->fetch();
                        if(empty($stikers4['img_en'])) {
                            echo "<img  src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                        } else {
                            
                            echo "<a href='products.php?page=search.php&show=women'><img class='img-responsive center-block' src='admin/uploades/home-scren/"  . $stikers4['img_en'] . "' alt=''  /></a>"; 
                        }
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-3 custom-padd-left">
                        <?php
                        $stmt = $con->prepare("SELECT * FROM `stikers`WHERE type = 3");
                        $stmt->execute();
                        $stikers3 = $stmt->fetch();
                        if(empty($stikers3['img_en'])) {
                            echo "<img class='img-responsive center-block' src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                        } else {
                            echo "<a href='products.php?page=search.php&show=man'><img class='img-responsive center-block' src='admin/uploades/home-scren/"  . $stikers3['img_en'] . "' alt=''  /></a>"; 
                        }?>
                        </div>
                    <div class="col-xs-6 col-md-3 custom-padd-right">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM `stikers`WHERE type = 2");
                            $stmt->execute();
                            $stikers2 = $stmt->fetch();
                            if(empty($stikers2['img_en'])) {
                                echo "<img class='img-responsive center-block' src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                            } else {
                                echo "<a href='products.php?page=search.php&show=girs'><img class='img-responsive center-block' src='admin/uploades/home-scren/"  . $stikers2['img_en'] . "' alt=''  /></a>"; 
                            }
                        ?>
                    </div>
                    <div class="col-xs-6 col-md-3 custom-padd-left">
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM `stikers`WHERE type = 1");
                            $stmt->execute();
                            $stikers1 = $stmt->fetch();
                            if(empty($stikers1['img_en'])) {
                                echo "<img class='img-responsive center-block' src='admin/uploades/home-scren/logo.png' alt='No Images' />";
                            } else {
                                echo "<a href='products.php?page=search.php&show=boys'><img class='img-responsive center-block' src='admin/uploades/home-scren/"  . $stikers1['img_en'] . "' alt=''  /></a>"; 
                            }
                        ?>  
                    </div>
                </div>
            </div>
        </section>
   

        <div class="container hidden">
            <section class="subscribe">
                <div class="row">
                    <div class="col-md-3">
                        <h4 class="text-center">Subscribe Our Newsletter</h4>
                    </div>

                    <div class="col-md-5">
                        <form class="inline-form">
                            <input type="email" class="form-control" placeholder="Enter Your Mail" disabled>
                        </form>
                    </div>

                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <button class="btn btn-male btn-block" type="submit">Male</button>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-female btn-block" type="submit">Female</button>
                            </div>
                        </div>
                    </div>
                </div><!-- Row -->
            </section><!-- /.Subscribe=Section -->
        </div><!-- /.Container -->
    
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
                                            <del class="price"><?php echo $catTop['pro_price'] ?> EGP</del>
                                            <p class="price"><?php echo $catTop['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
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
                                            <del class="price"><?php echo $catTop['pro_price'] ?> EGP</del>
                                            <p class="price"><?php echo $catTop['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
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
                                            <del class="price"><?php echo $catTop['pro_price'] ?> EGP</del>
                                            <p class="price"><?php echo $catTop['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
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
                                             <del class="price"><?php echo $catTop['pro_price'] ?> EGP</del>
                                            <p class="price"><?php echo $catTop['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
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
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>                                            
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
                                            <?php 
                                                $proid = $catTop['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>                                            <article class="discount">
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



    <?php  } // end species  ?> 
            <!--start edit php -->
             
                <div class="row hidden-xs hidden-sm">
                    <div class="col-xs-7">
                        <h3><a href="#">New Arrival </a></h3>
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
                                $stmt = $con->prepare("SELECT * FROM product ORDER BY id_product DESC LIMIT 4");
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
                                                <del class="price"><?php echo $cat['pro_price'] ?> EGP</del>
                                                <p class="price"><?php echo $cat['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $cat['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div><!-- /.Col -->
                            <?php   }  ?>
                        </div><!-- /.Item Active --> 

                        <div class="item">
                            <?php 
                                $stmt = $con->prepare("SELECT * FROM product  ORDER BY id_product ASC LIMIT 4");
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
                                                <del class="price"><?php echo $cat['pro_price'] ?> EGP</del>
                                                <p class="price"><?php echo $cat['pro_after_sale'] ?> EGP</p>
                                            <?php 
                                                $proid = $cat['id_product'];
                                                $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                $stmt->execute();
                                                $getrate = $stmt->fetch();
                                                $rat = $getrate['sum(rate)'];
                                                $count = $getrate['count(user_id)'];
                                                if($count > 0 ) {
                                                    $sum = ($rat / $count);
                                                    echo  '<div class="row">';
                                                    echo  '<p class="star-rating col-xs-6">';
                                                    for ($start = 0 ; $start < $sum ; $start++){
                                                        echo '<i class="colored fa fa-star" ></i>';
                                                    }
                                                    echo '</p>';
                                                    echo '</div>';
                                                } else {
                                                    echo'<p class="star-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </p>';
                                                }
                                            ?>
                                            </div>
                                        </div>
                                    </div><!-- /.Col -->
                            <?php     } ?>
                        </div><!-- /.Item -->
                    </div><!-- /.Carousel-Inner -->
                </div><!-- /.Carousel-Slider -->
                
                
                <div class="row visible-xs visible-sm">
                    <div class="col-xs-7">
                        <h3><a href="#">New Arrival</a></h3>
                    </div>

                    <div class="col-xs-5">
                    <!-- Controls -->
                        <div class="controls pull-right">
                            <button class="btn btn-default custom-btn btn-sm" href="#carousel-new-sm" data-slide="prev">
                                <i class="fa fa-chevron-left"></i>
                            </button>
                            <button class="btn btn-default custom-btn btn-sm" href="#carousel-new-sm" data-slide="next">
                                <i class="fa fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div id="carousel-new-sm" class="carousel slide visible-xs visible-sm" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <?php 
                                    $stmt = $con->prepare("SELECT * FROM product  ORDER BY id_product ASC LIMIT 2");
                                    $stmt->execute();
                                    $allCats = $stmt->fetchAll();
                                    foreach($allCats as $cat){
                                ?>
                                        <div class="col-xs-6 custom-padd-right">
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
                                                    <del class="price"><?php echo $cat['pro_price'] ?> EGP</del>
                                                    <p class="price"><?php echo $cat['pro_after_sale'] ?> EGP</p>
                                                    <?php 
                                                        $proid = $cat['id_product'];
                                                        $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                        $stmt->execute();
                                                        $getrate = $stmt->fetch();
                                                        $rat = $getrate['sum(rate)'];
                                                        $count = $getrate['count(user_id)'];
                                                        if($count > 0 ) {
                                                            $sum = ($rat / $count);
                                                            echo  '<div class="row">';
                                                            echo  '<p class="star-rating col-xs-6">';
                                                            for ($start = 0 ; $start < $sum ; $start++){
                                                                echo '<i class="colored fa fa-star" ></i>';
                                                            }
                                                            echo '</p>';
                                                            echo '</div>';
                                                        } else {
                                                            echo'<p class="star-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </p>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div><!-- /.Col -->
                                <?php     } ?>
                            </div><!-- /.Row -->
                        </div><!-- /.Item-Active -->
                        <div class="item">
                            <div class="row">
                            <?php 
                                    $stmt = $con->prepare("SELECT * FROM product  ORDER BY id_product ASC LIMIT 2");
                                    $stmt->execute();
                                    $allCats = $stmt->fetchAll();
                                    foreach($allCats as $cat){
                                ?>
                                        <div class="col-xs-6 custom-padd-right">
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
                                                    <del class="price"><?php echo $cat['pro_price'] ?> EGP</del>
                                                    <p class="price"><?php echo $cat['pro_after_sale'] ?> EGP</p>
                                                    <?php 
                                                        $proid = $cat['id_product'];
                                                        $stmt = $con->prepare("SELECT sum(rate), count(user_id) FROM rate WHERE pro_id = $proid ");
                                                        $stmt->execute();
                                                        $getrate = $stmt->fetch();
                                                        $rat = $getrate['sum(rate)'];
                                                        $count = $getrate['count(user_id)'];
                                                        if($count > 0 ) {
                                                            $sum = ($rat / $count);
                                                            echo  '<div class="row">';
                                                            echo  '<p class="star-rating col-xs-6">';
                                                            for ($start = 0 ; $start < $sum ; $start++){
                                                                echo '<i class="colored fa fa-star" ></i>';
                                                            }
                                                            echo '</p>';
                                                            echo '</div>';
                                                        } else {
                                                            echo'<p class="star-rating">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                </p>';
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div><!-- /.Col -->
                                <?php     } ?>
                            </div><!-- /.Row -->
                        </div><!-- /.Item -->
                    </div><!-- /.Carousel-Inner -->
                </div><!-- /.Carousel-Slider -->
            <!-- end edit php -->

    </section>
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
</div>

<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>