<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
       <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Contact Us</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="t-and-c" class="well">
                <div class="well">
                    <h1>Customer Services</h1>
                    <hr>
                    <p>E-mail: <a href="mailto:info@joyastores.com?Subject=Hello%20again">customers@joyastores.com</a></p>
                    <p>Telephone Number : &#40; &#43;2 &#41; 01091709070</p>
                    <p>Whatsapp : &#40; &#43;2 &#41; 01099394959</p>
                    <br>
                    <br>
                    <h1>For Orders</h1>
                    <hr>
                    <p>E-mail: <a href="mailto:info@joyastores.com?Subject=Hello%20again">orders@joyastores.com</a></p>
                    <p>Telephone Number : 01093009020</p>
                    <p>Whatsapp : 01099394959</p>
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
