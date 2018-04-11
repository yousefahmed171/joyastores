<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
       
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Shipping Policy</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="t-and-c" class="well">
                <div class="well">
                    <h2>When will I Receive my order &#63;</h2>
                    <p>After you have successfully placed your order, our Customer Service team will conduct a verification process and update you as soon as possible by call/SMS.<br><br>
                    
                    <h2>How can I track the status of my order?</h2>
                    <p>At any stage you can track your order status by using the order number in the "Order status" page, which can be accessed through this link <a href=".">(Track order)</a>.</p><br><br>
                    
                    <h2>Delivery Practices</h2>
                    <p>Sealed items cannot be opened to be checked unless payment is processed, hence it is not possible for the customer to open, reject and send orders back with the the same driver. This can only be done before opening the package.<br>
The package must be paid for and received first and then if there are any issues the normal return process will be carried out by contacting the Customer Service.<br><br>
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