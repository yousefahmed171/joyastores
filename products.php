<?php

    ob_start();  
    
    session_start();

    $title = 'Joya Stores';

    include 'init.php';
 
?>
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>  <?php if(isset($_GET['pagename'])){
                        echo str_replace('-', ' ', $_GET['pagename']);
                    }  else {
                        echo '<h2>  </h2>';
                    }
                    ?>
                    </h2>
                </header>
            </div>
        </section>

        <div class="container">
            <section id="products-search" class="well">
                <div class="row">
                    <div class="col-sm-3">
                        <nav class="nav" data-spy="affix" data-offset-top="205">
                            <header>
                                <h4 class="hidden-xs"><i class="fa fa-filter"></i> Filters</h4>
                                <h4 class="hidden-sm hidden-md hidden-lg filter-fixed" style="cursor:pointer" onclick="openNav()"><i class="fa fa-filter"></i> Filters</h4>
                            </header>


                            <!-- SIDE-NAV-FILTERS-FOR-SMALL-SCREEN
                            =================================================
                            =================================================-->
                            <form>
                            <div id="mySidenav" class="sidenav">
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseBrand" aria-expanded="false" aria-controls="collapseBrand">
                                    Brand Name <i class="fa fa-caret-down pull-right"></i>
                                    </button>
                                    <div class="collapse" id="collapseBrand">
                                    <div class="well">  
                                        <?php 
                                        $allbrand = getAllFrom("*", "brands", "" , "", "id_brand","ASC");
                                        foreach($allbrand as $brand){
                                            echo '<div class="checkbox">';
                                                echo '<input id="checkbox1" type="checkbox">';
                                                echo '<label for="checkbox1">'.  $brand['name_en']. '</label>';
                                            echo    '</div>';
                                     } ?>
                                       </div> <!-- /.Well -->
                                   </div> <!-- /.Collapse -->
                                
                                </div><!-- /.Filters -->

                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseClothType" aria-expanded="false" aria-controls="collapseClothType">
                                    Cloth Type <i class="fa fa-caret-down pull-right"></i>
                                    </button>

                                    <div class="collapse" id="collapseClothType">
                                        <div class="well">
                                         <?php 
                                         $allCats = getAllFrom("*", "category", "" , "", "id_cat","ASC");
                                         
                                             foreach($allCats as $cat){
                                           echo '<div class="checkbox">';
                                              echo  '<input id="checkboxS" type="checkbox">';
                                               echo  '<label for="checkboxS">'.$cat['name_en'].'</label>';
                                           echo '</div>';
                                             }?>
                                        </div><!-- /.Well -->
                                    </div><!-- /.Collapse -->
                                </div><!-- /.Filters -->

                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseSlider" aria-expanded="false" aria-controls="collapseSlider">
                                    Price <i class="fa fa-caret-down pull-right"></i>
                                    </button>

                                    <div class="collapse" id="collapseSlider">
                                        <div class="well text-center">
                                            <input type="text" class="amount" readonly style="border:0; color:#575757; font-weight:bold; text-align:center; margin-bottom:10px;">
                                            <div class="slider-range"></div>
                                        </div><!-- /.Well -->
                                    </div><!-- /.Collapse -->
                                </div><!-- /.Filters -->

                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseColor" aria-expanded="false" aria-controls="collapseColor">
                                    Colors <i class="fa fa-caret-down pull-right"></i>
                                    </button>

                                    <div class="collapse" id="collapseColor">
                                        <div class="well">
                                            <div class="checkbox">
                                                <input id="checkboxC1" type="checkbox">
                                                <label for="checkboxC1">Red</label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxC2" type="checkbox">
                                                <label for="checkboxC2">Blue</label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxC3" type="checkbox">
                                                <label for="checkboxC3">Green</label>
                                            </div>
                                        </div><!-- /.Well -->
                                    </div><!-- /.Collapse -->
                                </div><!-- /.Filters -->


                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseSize" aria-expanded="false" aria-controls="collapseSize">
                                    Size <i class="fa fa-caret-down pull-right"></i>
                                    </button>

                                    <div class="collapse" id="collapseSize">
                                        <div class="well">
                                            <div class="checkbox">
                                                <input id="checkboxXs" type="checkbox">
                                                <label for="checkboxXs">X-small</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkboxSm" type="checkbox">
                                                <label for="checkboxSm">Small</label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxMd" type="checkbox">
                                                <label for="checkboxMd">Medium</label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxLg" type="checkbox">
                                                <label for="checkboxLg">Medium</label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkboxXl" type="checkbox">
                                                <label for="checkboxXl">X-large</label>
                                            </div>
                                        </div><!-- /.Well -->
                                    </div><!-- /.Collapse -->
                                </div><!-- /.Filters -->

                                <div class="filters">
                                    <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseRate" aria-expanded="false" aria-controls="collapseRate">
                                    Rate <i class="fa fa-caret-down pull-right"></i>
                                    </button>

                                    <div class="collapse" id="collapseRate">
                                        <div class="well">
                                            <div class="checkbox">
                                                <input id="checkboxRate1" type="checkbox">
                                                <label for="checkboxRate1">
                                                    <p class="star-rating">
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                    </p>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkboxRate2" type="checkbox">
                                                <label for="checkboxRate2">
                                                    <p class="star-rating">
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxRate3" type="checkbox">
                                                <label for="checkboxRate3">
                                                    <p class="star-rating">
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <input id="checkboxRate4" type="checkbox">
                                                <label for="checkboxRate4">
                                                    <p class="star-rating">
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <input id="checkboxRate5" type="checkbox">
                                                <label for="checkboxRate5">
                                                    <p class="star-rating">
                                                        <i class="colored fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </p>
                                                </label>
                                            </div>
                                        </div><!-- /.Well -->
                                    </div><!-- /.Collapse -->
                                </div><!-- /.Filters -->
                                <input type="submit" class="btn btn-info btn-block filter-btn" value="Filter" />
                            </div>
                            </form>                         

                            <!-- SIDE-NAV-FILTERS-FOR-MEDIUM & LARGE-SCREEN
                            =================================================
                            =================================================-->   
                            <form action="products.php?page=showfilter.php" method="post" enctype=""> 
                            <div class="filters hidden-xs">
                                <button class="btn btn-default btn-block" type="button" data-toggle="collapse" data-target="#collapseBrandA" aria-expanded="false" aria-controls="collapseBrandA">
                                Brand Name <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseBrandA">
                                    <div class="well">
                                    <?php 
                                    $allbrand = getAllFrom("*", "brands", "" , "", "id_brand","ASC");
                                    foreach($allbrand as $brand){

                                        // echo '<ul>
                                        //     <li>
                                        //         <a href="?page=showfilter.php&idbrand=' . $brand['id_brand']. '" value="' . $brand['id_brand']. '">
                                        //             <input type="checkbox" name="brand"  >
                                        //             <span>' . $brand['name_en']. ' </span>
                                        //         </a>
                                        //     </li>
                                        // </ul>';
                                        // //echo '<input type="hidden" name="idbrand" value="' . $brand['id_brand']. '" >';
                                        //echo '<p><a href="?' . $brand['id_brand']. '" type="checkbox" name="idbrand" value="' . $brand['id_brand']. '" > '.' <span></span> ' . $brand['name_en']. '</p>';
                                       echo '<div class="check-yousef">';
                                            //echo '<input type="hidden" name="idbrand">';
                                            echo '<input  name="brand[]" value="'.$brand['id_brand'] .'" id="Acheckbox" type="checkbox">';
                                            echo '<label for="Acheckbox">'.  $brand['name_en']. '</label>';
                                        echo    '</div>';

                                        
                                 } ?>

    

                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->

                            <div class="filters hidden-xs">
                                <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseClothTypeA" aria-expanded="false" aria-controls="collapseClothTypeA">
                                Cloth Type <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseClothTypeA">
                                    <div class="well">
                                    <?php 
                                    $allCats = getAllFrom("*", "category", "" , "", "id_cat","ASC");
                                    
                                        foreach($allCats as $cat){
                                            // echo '<input type="hidden" name="idcat" value="' . $cat['id_cat']. '" >';
                                            // echo '<p><input type="checkbox" name="idcat" value="' . $cat['id_cat']. '" > '.' <span></span> ' . $cat['name_en']. '</p>';   
                                      echo '<div class="chec-yousef">';
                                            //echo '<input value="1" type="hidden" name="idcat">';
                                             echo  '<input name="cat[]"  value="'.$cat['id_cat'].'" id="Acheckbox" type="checkbox">';
                                            echo  '<label for="Acheckbox" >'.$cat['name_en'].'</label>';
                                      echo '</div>';
                                        }?>

                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->

                            <div class="filters hidden-xs">
                                <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseSliderA" aria-expanded="false" aria-controls="collapseSliderA">
                                Price <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseSliderA">
                                    <div class="well text-center">
                                        <input type="text" class="amount" readonly style="border:0; color:#575757; font-weight:bold; text-align:center; margin-bottom:10px;">
                                        <div class="slider-range"></div>
                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->

                            <div class="filters hidden-xs">
                                <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseColorA" aria-expanded="false" aria-controls="collapseColorA">
                                Colors <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseColorA">
                                    <div class="well">
                                        <div class="checkbox">
                                            <input id="AcheckboxC1" type="checkbox">
                                            <label for="AcheckboxC1">Red</label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxC2" type="checkbox">
                                            <label for="AcheckboxC2">Blue</label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxC3" type="checkbox">
                                            <label for="AcheckboxC3">Green</label>
                                        </div>
                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->


                            <div class="filters hidden-xs">
                                <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseSizeA" aria-expanded="false" aria-controls="collapseSizeA">
                                Size <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseSizeA">
                                    <div class="well">
                                        <div class="checkbox">
                                            <input id="AcheckboxXs" type="checkbox">
                                            <label for="AcheckboxXs">X-small</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="AcheckboxSm" type="checkbox">
                                            <label for="AcheckboxSm">Small</label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxMd" type="checkbox">
                                            <label for="AcheckboxMd">Medium</label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxLg" type="checkbox">
                                            <label for="AcheckboxLg">Large</label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="AcheckboxXl" type="checkbox">
                                            <label for="AcheckboxXl">X-large</label>
                                        </div>
                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->

                            <div class="filters hidden-xs">
                                <button class="btn btn-defult btn-block" type="button" data-toggle="collapse" data-target="#collapseRateA" aria-expanded="false" aria-controls="collapseRateA">
                                Rate <i class="fa fa-caret-down pull-right"></i>
                                </button>

                                <div class="collapse" id="collapseRateA">
                                    <div class="well">
                                        <div class="checkbox">
                                            <input id="AcheckboxRate1" type="checkbox">
                                            <label for="AcheckboxRate1">
                                                <p class="star-rating">
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                </p>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="AcheckboxRate2" type="checkbox">
                                            <label for="AcheckboxRate2">
                                                <p class="star-rating">
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxRate3" type="checkbox">
                                            <label for="AcheckboxRate3">
                                                <p class="star-rating">
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                            </label>
                                        </div>

                                        <div class="checkbox">
                                            <input id="AcheckboxRate4" type="checkbox">
                                            <label for="AcheckboxRate4">
                                                <p class="star-rating">
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                            </label>
                                        </div>
                                        <div class="checkbox">
                                            <input id="AcheckboxRate5" type="checkbox">
                                            <label for="AcheckboxRate5">
                                                <p class="star-rating">
                                                    <i class="colored fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </p>
                                            </label>
                                        </div>
                                    </div><!-- /.Well -->
                                </div><!-- /.Collapse -->
                            </div><!-- /.Filters -->
                            <input type="submit" name="submit" class="btn btn-info btn-block filter-btn hidden-xs" value="Filter" />
                           
                        </nav>
                    </div><!-- /.Col -->
                 </form>

                 <!-- <div class="col-sm-9">
                        <div class="row"> 
                            <?php

                        // $idbrand = isset($_GET['idbrand']) && is_numeric($_GET['idbrand']) ? intval($_GET["idbrand"]) : 0;
                        // $idcat   = isset($_GET['idcat']) && is_numeric($_GET['idcat']) ? intval($_GET["idcat"]) : 0;

                        

                        // if(isset($_GET['page']))
                        // {
                        //     switch($_GET['page']):
                        //         case '1'    :    echo  'Product' ;    break;
                        //     endswitch;
                        // } else
                        // {
                        //         echo 'Not Product'; 
                        // }
                        // ?>
                        // <div class="panel-body">
                        // <?php
                        //     if(isset($_GET['page'])){
                        //     $url =  $_GET['page'];
                        //     include_once($url);
                        //     }else{
                        //         echo ''; 
                        //     }
                        // ?>
                        </div>
                        </div> -->
                      
                        




                    <!-- ****** -->
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-xs-12">
                                <ol class="breadcrumb">
                                  <li><a href="index.php">Home</a></li>
                                  <li class="active"><?php  if(isset($_GET['pagename'])){
                                                            echo str_replace('-', ' ', $_GET['pagename']);
                                                        }  else {
                                                            echo '<h2>  </h2>';
                                                        }  ?></li>
                                </ol>
                            </div>
                            <?php 
                            if(isset($_GET['catid'])){
                            $catid = $_GET['catid'];
                            $stmt = $con->prepare("SELECT * FROM  product WHERE idcat = $catid ");
                            $stmt->execute(array($catid));
                            $allCats = $stmt->fetchAll();
                        
                             foreach($allCats as $cat ){ 
                                 
                            ?>
                                    
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>">
                                    <?php 
                                    if(empty($cat['pro_img'])){
                                        echo  '<img src="uploades/img-product/foot-logo.png"  alt="Joya Stores" class="img-responsive">';
                                    } else {
                                        echo  '<img src="admin/uploades/img-product/'.$cat['pro_img'].'" alt="Dress-pic" class="img-responsive">';
                                    }
                                    ?>
                                    </a>
                                    <div class="btn-group after-hover hidden-sm hidden-xs" role="group">
                                        <a href="product-details.php?proid=<?php echo $cat['id_product'] . '&pagename=' . str_replace(' ', '-', $cat['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button"></a>
                                    </div>

                                    <div class="caption">
                                        <h4 class="text-center"><?php echo $cat['pro_name'] ?></h4>
                                        <del class="price"><?php echo $cat['pro_price'] ?> EGP</del>
                                        <p class="price"><?php echo $cat['pro_after_sale'] ?>  EGP </p>
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
                       <?php } } else { 
                           
                            if(isset($_GET['idspecies'])){
                                $idspecies   = $_GET['idspecies'];
                            }
                            $stmt = $con->prepare("SELECT * FROM  product WHERE `idspecies` = $idspecies ");
                            $stmt->execute(array($idspecies));
                            $allproduct = $stmt->fetchAll();

                            foreach($allproduct as $product ) { 
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
                                    <a href="product-details.php?proid=<?php echo $product['id_product'] . '&pagename=' . str_replace(' ', '-', $product['pro_name'])?>" data-toggle="tooltip" data-placement="bottom" title="Full Details" type="button"></a>
                                </div>

                                <div class="caption">
                                    <h4 class="text-center"><?php echo $product['pro_name'] ?></h4>
                                    <del class="price"><?php echo $product['pro_price'] ?> EGP</del>
                                    <p class="price"><?php echo $product['pro_after_sale'] ?>  EGP </p>
                                    <?php 
                                    $proid = $product['id_product'];
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
                     <?php  } }
                           ?>
                          </div><!-- /.Row -->

                    </div><!-- /.Col -->

                    <div class="col-sm-9">   
                        <?php
                            if(isset($_GET['page']))
                            {
                            switch($_GET['page']):
                                case 'search.php'    :    echo  '' ;    break;

                            endswitch;
                            } else
                            {
                                    echo ''; 
                            }
                        ?>
                         <div class="col-sm-12">
                        <?php
                            if(isset($_GET['page'])){
                                $url = $_GET['page'];
                                include_once($url);
                                
                            } else {
                                echo '';
                            }
                        ?>
                        </div>
                        </div>

                </div><!-- /.Row -->
            </section><!-- /#Product-Panel/.Well -->
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
        </div><!-- /.Container -->


        <a class="btn btn-danger f-cart-btn" role="button"><i class="fa fa-shopping-cart 2x"></i> <span class="badge">0</span></a>

        <div class="modal fade product-quick-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">

                    <div class="modal-body">
                        <section id="product-details-panel" class="well">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                            <!-- Wrapper for slides -->
                                            <div class="col-xs-12 col-md-10">
                                                <div class="carousel-inner" role="listbox">

                                                <div class="item active">
                                                    <a href="#" class="pop"><img id="imageresource" src="img/product-9.jpg" class="img-responsive center-block"></a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" class="pop"><img id="imageresource" src="img/product-9.jpg" class="img-responsive center-block"></a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" class="pop"><img id="imageresource" src="img/product-9.jpg" class="img-responsive center-block"></a>
                                                </div>

                                                <div class="item">
                                                    <a href="#" class="pop"><img id="imageresource" src="img/product-9.jpg" class="img-responsive center-block"></a>
                                                </div>


                                                <div class="item">
                                                    <a href="#" class="pop"><img id="imageresource" src="img/product-9.jpg" class="img-responsive"></a>
                                                </div>

                                                </div>
                                            </div>


                                            <!-- Indicators -->
                                            <div class="col-xs-12 col-md-2">
                                                <ol class="carousel-indicators">
                                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active">
                                                        <img src="img/product-9.jpg" class="img-responsive">
                                                    </li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="1">
                                                        <img src="img/product-9.jpg" class="img-responsive">
                                                    </li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="2">
                                                        <img src="img/product-9.jpg" class="img-responsive">
                                                    </li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="3">
                                                        <img src="img/product-9.jpg" class="img-responsive">
                                                    </li>
                                                    <li data-target="#carousel-example-generic" data-slide-to="4">
                                                        <img src="img/product-9.jpg" class="img-responsive center-block">
                                                    </li>
                                                </ol>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 product-show-info">
                                    <header class="text-center">
                                        <h2>Product Name Here</h2>
                                    </header>
                                    <p>Price : 100 EGP</p>
                                    <p>By : Monte-Blue</p>
                                    <p class="star-rating">Rate :
                                        <i class="colored fa fa-star"></i>
                                        <i class="colored fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i> ( 10 )
                                    </p>
                                    <p>Avalibality : Yes</p>

                                    <div class="row state-btn">
                                        <form>
                                            <div class="col-xs-12 col-md-6">
                                                <select class="form-control input-lg" name="size" required>
                                                    <option disabled selected>Select Size</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>
                                                </select>
                                            </div>
                                            <div class="col-xs-12 col-md-6">
                                                <input type="number" name="quantity" min="1" max="12" class="form-control input-lg" placeholder="Quantity" required>
                                            </div>

                                            <div class="col-xs-12 col-md-6">
                                                <button type="submit" class="btn btn-info btn-lg btn-block"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
                                            </div>

                                            <div class="col-xs-12 col-md-6">
                                                <button class="btn btn-danger btn-lg btn-block"><i class="fa fa-heart"></i> Add To Wishlist</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- /.Row -->
                        </section><!-- /#Product-Panel/.Well -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="product-details.html" type="button" class="btn btn-info">Full Details <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>