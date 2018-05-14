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

            echo '<a href="shopping-cart.php" class="btn btn-danger f-cart-btn" role="button"><i class="fa fa-shopping-cart 2x"></i> <span class="badge">'; echo $count; echo '</span></a>';
        }
?>


<footer> 
      <div class="container">
        <div class="row">
          <div class="col-md-3 hidden-xs hidden-sm"><img class="center-block img-responsive" src="img/foot-logo.png"/>
            <h3 class="text-center">Joya Stores</h3>
          </div>
          <div class="col-md-2 col-xs-12">
            <ul class="list-unstyled">
              <li class="hidden-xs hidden-sm">Main Menu</li>
              <li><a href="index.php">Home</a></li>
              <li><a href="about-us.php">About</a></li>
              <li><a href="contact-us.php">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-2 col-xs-12">
            <ul class="list-unstyled">
              <li class="hidden-xs hidden-sm">Information</li>
              <li><a href="terms-of-use.php">Terms of use</a></li>
              <li><a href="faq.php">FAQs</a></li>
              <li><a href="shipping-policy.php">Shipping Policy</a></li>
            </ul>
          </div>
          <div class="col-md-2 hidden-xs hidden-sm">
            <ul class="list-unstyled">
              <li>Categories</li>
                <?php
                $allspecies = getAllFrom("*", "species", "", "", "id_species", "ASC");
                foreach($allspecies as $species ) {
                    echo '<li><a href="products.php?idspecies='. $species['id_species'] . '&pagename=' . str_replace(' ', '-', $species['name_en']) . '">'.$species['name_en'].'</a></li>';
                    
                }
                ?> 
            </ul>
          </div>
          <div class="col-md-3 hidden-xs hidden-sm">
            <ul class="list-unstyled">
                <?php 
                    $stmt = $con->prepare("SELECT * FROM `server`");
                    $stmt->execute();
                    $getserver = $stmt->fetch();
                ?>
              <li>Contact us</li>
              <li>Tel : ( +20 ) <?php echo $getserver['phone'] ?></li>
              <li>Sat - Thu : 9AM - 9PM</li>
              <li>Fri : 2PM - 10PM</li>
              <li>Follow us
                <p>
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
                <a href="<?php if($getfacebook['web'] == 'facebook'){echo $getfacebook['link'];} ?>" ><i class="fa fa-facebook fa-lg"></i></a>
                <a href="<?php if($gettwitter['web'] == 'twitter'){echo $gettwitter['link'];} ?>" ><i class="fa fa-twitter fa-lg"></i></a>
                <a href="<?php if($getinstagram['web'] == 'instagram'){echo $getinstagram['link'];} ?>" ><i class="fa fa-instagram fa-lg"></i></a>
                <a href="<?php if($gettyoutube['web'] == 'youtube'){echo $gettyoutube['link'];} ?>" ><i class="fa fa-youtube fa-lg"></i></a>
                 </p>
              </li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 text-center copy-info">
            <p>Copyrights &copy; 2017. All Rights Reserved</p>
          </div>
        </div>
      </div>
    </footer>


<!-- jQuery -->
        <script src="<?php echo $js ?>jquery-2.1.4.min.js"></script> 
        <script src="<?php echo $js ?>jquery-ui.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="<?php echo $js ?>bootstrap.min.js"></script>
        <script src="js/jquery.mobile.custom.min.js"></script>
        <!-- <script src="<?php echo $js ?>osamafront.js"></script> -->
        <script src="<?php echo $js ?>jquery.bootstrap.wizard.min.js"></script>
        <!-- <script src="<?php echo $js ?>front.js"></script> -->
        <script src="<?php echo $js ?>script.js"></script>

        
  </body>
</html>