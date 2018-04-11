<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Checkout Process</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="checkout-process" class="well">
                <div class="wizard">
                    <div class="wizard-inner">
                        <div class="connecting-line"></div>
                        <ul class="nav nav-tabs" role="tablist">

                            <li role="presentation" class="active">
                                <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="BILLING DETAILS">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-map-marker"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Payment Method">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-shopping-cart"></i>
                                    </span>
                                </a>
                            </li>
                            <li role="presentation" class="disabled">
                                <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Oreder Confirmation">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-ok"></i>
                                    </span>
                                </a>
                            </li>

                            <li role="presentation" class="disabled">
                                <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Order-Received">
                                    <span class="round-tab">
                                        <i class="glyphicon glyphicon-plane"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div><!-- /.Wizard-Inner -->

                    <form role="form">
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="step1">
                                <h3>Billing Details</h3>
                                
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                Use This Address
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <p>Street Name : Tawfik ST</p>
                                                <p>Building Number : 130</p>
                                                <p>Appartment Number : 113</p>
                                                <p>Special Info : Behind Saudi Market</p>
                                                <p>City : Cairo</p>
                                                <button type="button" class="btn btn-primary next-step">Save and continue</button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingTwo">
                                            <h4 class="panel-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                Add Another Adress
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                            <div class="panel-body">
                                                <form>
                                                    <div class="form-group">
                                                        <label for="streetName">Street Name</label>
                                                        <input type="text" class="form-control" id="streetName" placeholder="Please Enter Street Name" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="buildingNumber">Building Number</label>
                                                        <input type="number" class="form-control" id="buildingNumber" min="1" placeholder="Please Enter Building Number" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="appartmentNumber">Appartment Number</label>
                                                        <input type="number" class="form-control" id="appartmentNumber" min="1" placeholder="Please Enter Appartment Number" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="specialD">Special Delivery Info</label>
                                                        <input type="text" class="form-control" placeholder="Please Enter Special Delivery Info" id="specialD" >
                                                        <p class="help-block">Like : Super Market, Mosque etc...</p>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" placeholder="Please Enter your City" required>
                                                    </div>
                                                    <button type="button" class="btn btn-primary next-step">Save and continue</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            
                            
                            <div class="tab-pane" role="tabpanel" id="step2">
                                <div class="row">
                                    <form>
                                        <div class="col-xs-12">
                                            <h3 class="heading-inline heading-with-border-bottom">Select Payment Method</h3>
                                            <div class="checkbox">
                                                <input id="CODA" type="checkbox">
                                                <label for="CODA">Cash on delivery</label>
                                            </div>
                                        </div><!-- Col-XS-12 -->

                                        
                                        <div class="col-xs-12">
                                            <h3 class="heading-inline heading-with-border-bottom">Shopping cart summary</h3>
                                            <div class="row">
                                                <div class="col-xs-8 no-padding-right">
                                                    <div class="media">
                                                        <h4>Product Name Here</h4>
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/product-3.jpg" width="80px" alt="Product-Name-Here">
                                                            </a>
                                                            <div class="visible-xs">
                                                                <p>Size :</p>
                                                                <div class="product-option active">
                                                                    <label>
                                                                        L
                                                                        <input name="size" value="l" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        S
                                                                        <input name="size" value="S" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XL
                                                                        <input name="size" value="XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XXL
                                                                        <input name="size" value="XXL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        3XL
                                                                        <input name="size" value="3XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        4XL
                                                                        <input name="size" value="4XL" type="radio">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="product-quant no-padding-left">
                                                                <p>Quantity :</p>
                                                                <label class="custom-label">
                                                                    <input class="form-control custom-input" type="number" min="1" max="11" required>
                                                                <span class="unit-price">x 250</span>
                                                                </label>
                                                            </div>
                                                            
                                                            <div class="product-col no-padding-left">
                                                                <p>color :</p>
                                                                <div class="form-group product-option color-option active" style="background-color: #FFAF32;">
                                                                    <label>
                                                                        <input name="color" value="orange" type="radio">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-group product-option color-option" style="background-color: #9dcbb3;">
                                                                    <label>
                                                                        <input name="color" value="orange" type="radio">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-xs product-siz-lg">
                                                                <p>Size :</p>
                                                                <div class="product-option active">
                                                                    <label>
                                                                        L
                                                                        <input name="size" value="l" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        S
                                                                        <input name="size" value="S" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XL
                                                                        <input name="size" value="XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XXL
                                                                        <input name="size" value="XXL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        3XL
                                                                        <input name="size" value="3XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        4XL
                                                                        <input name="size" value="4XL" type="radio">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3 no-padding-left no-padding-right custom-pro-det">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6 product-total no-padding-left product-total">
                                                            <p>Total :</p>
                                                            <p style="color:#35495d;font-size:16px;">9765 EGP</p>
                                                        </div>
                                                        <div class="xs-12 col-md-6 product-actions no-padding-left">
                                                            <p>Actions :</p>
                                                            <button type="button" class="btn btn-danger">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr>
                                            
                                            <div class="row">
                                                <div class="col-xs-8 no-padding-right">
                                                    <div class="media">
                                                        <h4>Product Name Here</h4>
                                                        <div class="media-left">
                                                            <a href="#">
                                                                <img class="media-object" src="img/product-3.jpg" width="80px" alt="Product-Name-Here">
                                                            </a>
                                                            <div class="visible-xs">
                                                                <p>Size :</p>
                                                                <div class="product-option active">
                                                                    <label>
                                                                        L
                                                                        <input name="size" value="l" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        S
                                                                        <input name="size" value="S" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XL
                                                                        <input name="size" value="XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XXL
                                                                        <input name="size" value="XXL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        3XL
                                                                        <input name="size" value="3XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        4XL
                                                                        <input name="size" value="4XL" type="radio">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="media-body">
                                                            <div class="product-quant no-padding-left">
                                                                <p>Quantity :</p>
                                                                <label class="custom-label">
                                                                    <input class="form-control custom-input" type="number" min="1" max="11" required>
                                                                <span class="unit-price">x 250</span>
                                                                </label>
                                                            </div>
                                                            
                                                            <div class="product-col no-padding-left">
                                                                <p>color :</p>
                                                                <div class="form-group product-option color-option active" style="background-color: #FFAF32;">
                                                                    <label>
                                                                        <input name="color" value="orange" type="radio">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </label>
                                                                </div>
                                                                <div class="form-group product-option color-option" style="background-color: #9dcbb3;">
                                                                    <label>
                                                                        <input name="color" value="orange" type="radio">
                                                                        <span class="glyphicon glyphicon-ok"></span>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="hidden-xs product-siz-lg">
                                                                <p>Size :</p>
                                                                <div class="product-option active">
                                                                    <label>
                                                                        L
                                                                        <input name="size" value="l" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        S
                                                                        <input name="size" value="S" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XL
                                                                        <input name="size" value="XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        XXL
                                                                        <input name="size" value="XXL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        3XL
                                                                        <input name="size" value="3XL" type="radio">
                                                                    </label>
                                                                </div>
                                                                <div class="product-option">
                                                                    <label>
                                                                        4XL
                                                                        <input name="size" value="4XL" type="radio">
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xs-3 no-padding-left no-padding-right custom-pro-det">
                                                    <div class="row">
                                                        <div class="col-xs-12 col-md-6 product-total no-padding-left product-total">
                                                            <p>Total :</p>
                                                            <p style="color:#35495d;font-size:16px;">9765 EGP</p>
                                                        </div>
                                                        <div class="col-xs-12 col-md-6 product-actions no-padding-left">
                                                            <p>Actions :</p>
                                                            <button type="button" class="btn btn-danger">
                                                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- Col-XS-12 -->
                                        
                                        
                                        <div class="col-xs-12 product-addon">
                                            <hr>
                                            <p class="text-right lead"><span>Delivery Fees:</span> 15 EGP</p>
                                            <hr>
                                            <p class="text-right lead"><span>Cash on Delivery fees:</span> 10 EGP</p>
                                            <hr>
                                            <p class="text-right lead"><span>13&#37; VAT:</span> 5 EGP</p>
                                            <hr>
                                            <p class="text-right lead"><span>Subtotal:</span> 40 EGP</p>
                                            <hr>
                                            <p class="text-right lead" style="color:#31708f;font-size:24px;"><span>Grand Total:</span> 40 EGP</p>
                                        </div>
                                        
                                        <div class="col-xs-12 checkout-btn">
                                            <a type="submit" class="btn btn-primary next-step">Save and continue</a>
                                        </div><!-- Col-XS-12 -->
                                    </form>
                                </div>
                            </div>
                                
                                
                                
                                
                            
                            
                            <div class="tab-pane text-center" role="tabpanel" id="step3">
                                <h3>Order Confirmation</h3>
                                <button type="button" class="btn btn-success btn-info-full next-step">PLACE MY ORDER</button>
                            </div>
                            
                            <div class="tab-pane" role="tabpanel" id="complete">
                                <h2>Tracking Order Now</h2>
                                <p>To Track Your Order Please <a href=".">Click Here</a></p>
                                <hr>
                                <h3>Order Received</h3>
                                <p>Thank you, your order has been received.</p>
                                <div class="row">
                                    <div class="col-sm-3 bill-details-top">
                                        <h4>- Order Number</h4>
                                        <p>1340</p>
                                    </div><!-- /.Col -->
                                    <div class="col-sm-3 bill-details-top">
                                        <h4>- Date</h4>
                                        <p>12-8-1997</p>
                                    </div><!-- /.Col -->
                                    <div class="col-sm-3 bill-details-top">
                                        <h4>- Total</h4>
                                        <p>130 EGP</p>
                                    </div><!-- /.Col -->
                                    <div class="col-sm-3 bill-details-top">
                                        <h4>- Payment Method</h4>
                                        <p>Cash On Delivery</p>
                                    </div><!-- /.Col -->
                                </div><!-- /.Row -->
                                
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="order-details-base">
                                            <h5>- Order Details</h5>
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Item Info</th>
                                                            <th>Quantity</th>
                                                            <th>Unit Price</th>
                                                            <th>Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <p>T-shirt for girls</p>
                                                                <p>Seller : Monte-Blue</p>
                                                                <p>Color : red</p>
                                                                <p>Size : sm</p>
                                                            </td>
                                                            <td>1</td>
                                                            <td>20 EGP</td>
                                                            <td style="text-align:right">20 EGP</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="text-align:right"><h4>Delivery Fees: 110 EGP</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="text-align:right"><h4>Cash on Delivery fees: 10 EGP</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="text-align:right"><h4>13&#37; VAT: 5 EGP</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="text-align:right"><h4>Subtotal: 130 EGP</h4></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="5" style="text-align:right"><h4>Grand Total: 130 EGP</h4></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                            <h5 class="text-primary">- Customer Details</h5>
                                            <p>E-mail : mostafa@gmail.com.</p>
                                            <p>Tel Number : +2010098765.</p>
                                            
                                            <h5 class="text-primary">- Billing Address</h5>
                                            <p> Name : Mostafa Mohammad Mahmoud.</p>
                                            <p>City : Cairo.</p>
                                            <p>Street Name : Tayran Street.</p>
                                            <p>Building Number : 130.</p>
                                            <p>Appartment Number : 113.</p>
                                            <p>Special Info : Behind Saudi Market.</p>
                                            <p>Region : Egypt</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div><!-- /.Wizard -->
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
            