<div id="myNav" class="overlay container">
<a href="javascript:void(0)" class="closebtn" onclick="closeSearch()">&times;</a>

<div class="overlay-content">
    <form action="products.php?page=search.php&show=search" method="post" class="form-horizontal" role="search">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <div class="form-group">
                    <div class="input-group text-center">
                        <input type="search" name="search" class="form-control input-lg" placeholder="Search Here">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

<nav class="top">
<div class="container">
    <div class="row">
        <div class="col-xs-7 col-sm-6">
            <ul class="list-inline">
                <li class="hidden-xs"><a href="about-us.php">What's Joya</a> | </li>
                <li class="hidden-xs"><a href="contact-us.php">Need Help</a>  </li>
                <!-- <li><a href="Arabic Version/index.php">Arabic</a></li>  -->
                 <?php if(!isset($_SESSION['user'])) {
                   echo '<li><a class="hidden-md hidden-lg colored" href="login-index.php">LOGIN | SIGN UP</a></li>';
                } ?>
            </ul>
        </div>
        <div class="col-xs-5 col-sm-6">
                         <?php 
                            $stmt = $con->prepare("SELECT * FROM `contact` WHERE web = 'facebook' ");
                            $stmt->execute();
                            $getfacebook = $stmt->fetch();

                            $stmt = $con->prepare("SELECT * FROM `contact` WHERE web = 'twitter' ");
                            $stmt->execute();
                            $gettwitter = $stmt->fetch();

                            $stmt = $con->prepare("SELECT * FROM `contact` WHERE web = 'instagram' ");
                            $stmt->execute();
                            $getinstagram = $stmt->fetch();

                            $stmt = $con->prepare("SELECT * FROM `contact` WHERE web = 'youtube' ");
                            $stmt->execute();
                            $gettyoutube = $stmt->fetch();
                        ?>
            <ul class="list-inline pull-right">
                <li><a href="<?php if($getfacebook['web'] == 'facebook'){echo $getfacebook['link'];} ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="find us on Facebook"><i class="fa fa-facebook fa-lg"></i></a></li>

                <li><a href="<?php if($gettwitter['web'] == 'twitter'){echo $gettwitter['link'];} ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="follow us on Twitter"><i class="fa fa-twitter fa-lg"></i></a></li>

                <li><a href="<?php if($getinstagram['web'] == 'instagram'){echo $getinstagram['link'];} ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="follow us on Instagram"><i class="fa fa-instagram fa-lg"></i></a></li>

                <li><a href="<?php if($gettyoutube['web'] == 'youtube'){echo $gettyoutube['link'];} ?>" target="_blank" data-toggle="tooltip" data-placement="bottom" title="subscribe on YouTube"><i class="fa fa-youtube fa-lg"></i></a></li>
            </ul>
        </div>
    </div>
</div><!-- /.Container -->
</nav><!-- /.Top-Nav -->

<nav class="primary-nav navbar navbar-default">
<div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="img/logo.png" alt="Logo" title="Joya Store" />
            <span class="navbar-text">Joya Stores</span>
        </a>
        <button onclick="openSearch()" class="navbar-toggle">
            <span class="glyphicon glyphicon-search"></span>
        </button>
        <?php if(isset($_SESSION['user'])) {
         echo '<button  class="navbar-toggle" data-toggle="collapse" data-target="#user-menu" aria-expanded="false">';
           echo '<span class="glyphicon glyphicon-user"></span>';
         echo '</button>';
        }?>
    </div>

    <!-- Collect the nav links, forms, and ther content for toggling -->
    <div class="collapse navbar-collapse" id="main-menu"> 

    <ul class="nav navbar-nav visible-sm visible-xs"> <!---->
       <?php
        $allspecies = getAllFrom("*", "species", "", "", "id_species", "ASC");
        foreach($allspecies as $species ) {
        
        ?>                
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $species['name_en']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php
            $idspecies = $species['id_species'] ;
            $stmt = $con->prepare("SELECT * FROM category WHERE idspecies = $idspecies ");
            $stmt->execute(array($idspecies));
            $all = $stmt->fetchAll();
            if(! empty($all) ){
            foreach($all as $cat ) {
            ?>
                <li><a href="products.php?catid=<?php echo $cat['id_cat'] . '&pagename=' . str_replace(' ', '-', $cat['name_en'])  ?>"><?php echo $cat['name_en'];?></a></li>
            
            <?php }
            echo'    <li role="separator" class="divider"></li>';
              echo'  <li><a href="products.php?catid='. $species['id_species'] . '&pagename=' . str_replace(' ', '-', $species['name_en']) . '">Show All</a></li>';
                 } else {
                echo '<li><a href="#">Not Product</a></li>';
                }?> 
            </ul>
        </li>
    <?php } ?>
    </ul>

        <form action="products.php?page=search.php&show=search" method="post" class="navbar-form navbar-left form-inline hidden-xs hidden-sm" role="search">
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" name="search" placeholder="Search">
                    <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </div>
        </form>
                        <?php 
                            $stmt = $con->prepare("SELECT * FROM `server`");
                            $stmt->execute();
                            $getserver = $stmt->fetch();
                        ?>
        <p class="navbar-text navbar-right clearfix hidden-sm hidden-xs"><i class="fa fa-phone fa-lg"></i> : <?php echo $getserver['email_server'] ?> | ( +20 ) <?php echo $getserver['phone'] ?></p>

    </div><!-- /.Navbar-Collapse -->
    <div class="collapse navbar-collapse" id="user-menu">
                    <ul class="nav navbar-nav visible-sm visible-xs">
                        <li><a><i class="fa fa-user fa-lg"></i> Welcome <?php echo $_SESSION['user']; ?></a></li>
                        <li><a href="edit-account.php"><i class="fa fa-cog"></i> My account</a></li>
                        <li><a href="wishlist.php"><i class="fa fa-heart"></i> My wishlist</a></li>
                        <li><a href="my-orders.php"><i class="fa fa-shopping-cart"></i> My orders</a></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
                    </ul>
                </div>
</div><!-- /.Container -->
</nav><!-- /.Second-Nav -->


<nav class="navbar navbar-default hidden-xs hidden-sm">
<div class="container">
    <!-- Collect the nav links, forms, and other content for toggling -->
    <ul class="nav navbar-nav"> <!---->
       <?php
        $allspecies = getAllFrom("*", "species", "", "", "id_species", "ASC");
        foreach($allspecies as $species ) {
        
        ?>                
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $species['name_en']; ?><span class="caret"></span></a>
            <ul class="dropdown-menu">
            <?php
            $idspecies = $species['id_species'] ;
            $stmt = $con->prepare("SELECT * FROM category WHERE idspecies = $idspecies ");
            $stmt->execute(array($idspecies));
            $all = $stmt->fetchAll();
            if(! empty($all) ){
            foreach($all as $cat ) {
            ?>
                <li><a href="products.php?catid=<?php echo $cat['id_cat'] . '&pagename=' . str_replace(' ', '-', $cat['name_en']) ?>"><?php echo $cat['name_en'];?></a></li>
                
            <?php }
              echo '<li role="separator" class="divider"></li>';
              echo '<li><a href="products.php?idspecies='. $species['id_species'].  '&pagename=' . str_replace(' ', '-', $species['name_en']) . '">Show All </a></li>';
              //echo '<li><a href="products.php?page=search.php"> Show </a></li>'; // darict product. section in all page  by e-admin/products.php?page=search.php&show=men
              
              
                 } else {
                echo '<li><a href="#">Not Product</a></li>';
                }?> 
            </ul>
        </li>
    <?php } ?>
    </ul>

    <ul class="nav navbar-nav navbar-right">
        <!-- User Sign-in-sign-up For Large Screen -->
        <?php if(!isset($_SESSION['user'])) {
        echo '<li><a href="login-index.php" >LOGIN | SIGN UP</a></li>';
        }?>
        <?php if(isset($_SESSION['user'])) { ?>
        <!-- User Dropdown For Large Screen -->
        <li class="dropdown">
        <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> Welcome <?php echo $_SESSION['user']; ?> <span class="caret"></span></a>
        <ul class="dropdown-menu">
            <li><a href="edit-account.php"><i class="fa fa-cog"></i> My account</a></li>
            <?php 
                if (isset($_SESSION['user'])) {
                    $username = $_SESSION['user'];
                    $stmt = $con->prepare("SELECT * FROM `users` WHERE username = '{$username}' AND `groupid` = 1 ");
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    if($count >  0) {
                        echo '<li><a href="admin/index.php"><i class="fa fa-users"></i> Admin Panal </a></li> ';
                    } else {
                        echo "";
                    }
                }
            ?>
            <li><a href="wishlist.php"><i class="fa fa-heart"></i> My wishlist</a></li>
            <li><a href="my-orders.php"><i class="fa fa-shopping-cart"></i> My orders</a></li>
            <li><a href="logout.php"><i class="fa fa-sign-out"></i> Sign out</a></li>
        </ul>
        </li>

        <?php
            if (isset($_SESSION['user'])) {
                $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                $getUser->execute(array($sessionuser));
                $infouser = $getUser->fetch();
                $userid = $infouser['userid'];
            }
                if(isset($_SESSION['user'])){
                    $stmt = $con->prepare("SELECT cart.*, product.*
                                            FROM  cart
                                            INNER JOIN product
                                            ON product.id_product = cart.idproduct
                                            WHERE iduser = $userid AND `status` = 1
                                            ");
                    $stmt->execute(array($userid));
                    $count = $stmt->rowCount();
                
                }
        ?>
        
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg"></i> <span class="caret"></span><span class="badge"><?php echo $count; ?></span></a>
        <ul class="dropdown-menu">
            <?php
                if (isset($_SESSION['user'])) {
                    $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                    $getUser->execute(array($sessionuser));
                    $infouser = $getUser->fetch();
                    $userid = $infouser['userid'];
                }
                    if(isset($_SESSION['user'])){
                        $stmt = $con->prepare("SELECT cart.*, product.*
                                                FROM  cart
                                                INNER JOIN product
                                                ON product.id_product = cart.idproduct
                                                WHERE iduser = $userid AND `status` = 1 
                                                ");
                        $stmt->execute(array($userid));
                        $getOrder = $stmt->fetchAll();
                        foreach($getOrder as $order){
                            echo '<li><a href="product-details.php?proid='. $order['id_product'].  '&pagename=' . str_replace(' ', '-', $order['pro_name']) . '">'.$order['pro_name'].'</a> </a></li>';
                        }
                    }
                    ?>
            
            <li role="separator" class="divider"></li>
            <li><a href="shopping-cart.php"><i class="fa fa-cart-arrow-down"></i> View Cart</a></li>
        </ul>
        </li>
    
      

        <?php
                if (isset($_SESSION['user'])) {
                    $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                    $getUser->execute(array($sessionuser));
                    $infouser = $getUser->fetch();
                    $userid = $infouser['userid'];
                }
                    if(isset($_SESSION['user'])){
                        $stmt = $con->prepare("SELECT cart.*, product.*
                                                FROM  cart
                                                INNER JOIN product
                                                ON product.id_product = cart.idproduct
                                                WHERE iduser = $userid AND `status` = 0
                                                ");
                        $stmt->execute(array($userid));
                        $count2 = $stmt->rowCount();
                   
                    }
            ?>
        
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-heart fa-lg"></i> <span class="caret"></span><span class="badge"><?php echo $count2; ?></span></a>
        <ul class="dropdown-menu">
            <?php
                if (isset($_SESSION['user'])) {
                    $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                    $getUser->execute(array($sessionuser));
                    $infouser = $getUser->fetch();
                    $userid = $infouser['userid'];
                }
                    if(isset($_SESSION['user'])){
                        $stmt = $con->prepare("SELECT cart.*, product.*
                                                FROM  cart
                                                INNER JOIN product
                                                ON product.id_product = cart.idproduct
                                                WHERE iduser = $userid AND `status` = 0 
                                                ");
                        $stmt->execute(array($userid));
                        $getOrder = $stmt->fetchAll();
                        foreach($getOrder as $wishlist){
                            echo '<li><a href="product-details.php?proid='. $wishlist['id_product'].  '&pagename=' . str_replace(' ', '-', $wishlist['pro_name']) . '">'.$wishlist['pro_name'].'</a> </a></li>';
                        }
                    }
                    ?>
            
            <li role="separator" class="divider"></li>
            <li><a href="wishlist.php"><i class="fa fa-heart"></i> View wishlist</a></li>
        </ul>
        </li>
    </ul>
       <?php }?>
    </ul>
  
</div><!-- /.Container-Fluid -->

</nav><!-- /.Menu-Nav -->
<?php 
     if(isset($_SESSION['user'])){
        $status = checkUserStatus($_SESSION['user']);
            if ($status > 0) {
            
                echo '<div class="alert alert-warning ">  Your account has been made ,  Please verify it by clicking the activation link that has been  ,  <a href="#">  send to your email </a> </div>';
            }
    }
?>