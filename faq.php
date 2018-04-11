<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>FAQs</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="faq" class="well">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingOne">
                            <h4 class="panel-title">
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                &#45; What is Joya Stores ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                            &#45; Joya Stores was established in 2017, and started by contracting Syrian clothing companies to present top quality products and become a pioneer in the field of E-Commerce.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTwo">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                &#45; How to Sign up at Joya Stores ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="panel-body">
                            &#45; By clicking on &#39;Sign Up&#39; on the top of the webpage, click &#39;Create an account&#39;, then filling the forms.<br>
                            &#45; By clicking on &#39;Sign Up&#39; on the top of the webpage, click &#39;Sign Up with Facebook or Google&#39;, then filling the forms.
                            &#45; By clicking on &#39;Sign Up&#39; on the top of the webpage, click &#39;Sign Up with Facebook or Google&#39;, then filling the forms.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingThree">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                &#45; How to Sign in at Joya Stores ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                            <div class="panel-body">
                            &#45; By clicking on &#39;Sign In&#39; on the top of the webpage, then filling in your Sign in form and clicking &#39;Sign In&#39;.<br>
                            &#45; By clicking on &#39;Sign In&#39; on the top of the webpage, then click &#39;Sign In with Facebook or Google&#39;.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFour">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                &#45; What should I do if I forgot my password ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                            <div class="panel-body">
                            &#45; By clicking on “Sign In” on the top of the webpage, then click &#39;Forgot your password&#39;, then fill in your E-mail address which you signed up with, then click &#39;Send link&#39;, and a message will be sent to your E-mail address to proceed on with changing your password.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                &#45; How to search a product ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                            <div class="panel-body">
                            &#45; From the categories on the top of the webpage, then select the section which you want.<br>
                            &#45; From the search tap on the top of the webpage, then write what you want to search for.<br>
                            &#45; By entering any category and filtering options will appear, then choose your filters as you desire<br>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                &#45; How to add a product to my cart ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                            <div class="panel-body">
                            &#45; First Sign In, then open the product which you want to add, then select your size, color and quantity, and then click &#39;add to cart&#39;.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingSeven">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                &#45; How to make an order from Joya Stores ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                            <div class="panel-body">
                            &#45; By signing in and start shopping by adding your product to your cart then opening your cart from your account and continue checkout.<br>
                            &#45; By contacting our orders team by going to &#39;contact us&#39; then call to order.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingEight">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                &#45; What are the payment methods ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                            <div class="panel-body">
                            &#45; The main payment method in Joya Stores is Cash On Delivery &#40;COD&#41; to guarantee the credibility between Joya Stores and their Customers.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingNine">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                &#45; Which countries is Joya Stores available at ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                            <div class="panel-body">
                            &#45; Joya Stores is available only in Arab Republic of Egypt.
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab" id="headingTen">
                            <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                &#45; Where does Joya Stores deliver to ?
                                </a>
                            </h4>
                        </div>
                        <div id="collapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTen">
                            <div class="panel-body">
                            &#45; Delivery is available in all districts in Arab Republic of Egypt.
                            </div>
                        </div>
                    </div>
                </div><!-- /#Accordion -->
                
                <div class="row">
                    <div class="col-xs-12">
                        <a class="btn btn-info" href="index.php">Back to shopping</a>
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