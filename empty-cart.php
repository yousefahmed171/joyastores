<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
 if(isset($_SESSION['user'])) {
?>  
       
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Shopping Cart</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="empty-shopping" class="well text-center">
                <h1>Your Shopping Cart Is Empty !</h1>
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-info" href="index.html">Continue Shopping</a>
                    </div>
                </div>
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

<?php

include $tpl . 'footer.php'; 
ob_end_flush(); 
} else {
    header('Location: login-index.php');
}
?>
    