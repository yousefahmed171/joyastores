<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
<section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>About us</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="faq" class="well">
                <p>Joya Stores website is an E-Commerce website aiming at high quality clothing marketing by contracting many featured Syrian agencies. Joya Stores seeks to serve the individual customers needs and provide wholesales demands. Work at Joya Stores website was launched in 2017 to extend later on in several countries.</p>
                
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-info" href="index.php"> Back to shopping</a>
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
 ?>      
        
