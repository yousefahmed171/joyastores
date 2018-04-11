<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
      
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>My Orders</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="shopping-cart" class="well">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Item info</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Subtotal</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <img src="img/product-3.jpg" width="80px" />
                                </td>
                                <td>
                                    <p>T-shirt for girls</p>
                                    <p>Seller : Monte-Blue</p>
                                    <p>Color : red</p>
                                    <p>Size : sm</p>
                                </td>
                                <td>1</td>
                                <td><h4>20 EGP</h4></td>
                                <td style="text-align:right"><h4>20 EGP</h4></td>
                                <td>
                                    <a href="shopping-cart.html" class="btn btn-warning"><i class="fa fa-shopping-cart fa-lg"></i> Re-order</a>
                                </td> 
                            </tr>
                        </tbody> 
                    </table>
                </div><!-- /.table-responsive -->
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