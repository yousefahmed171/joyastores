<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>         
        <nav class="navbar navbar-default hidden-xs hidden-sm">
            <div class="container">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Women Clothing <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Action</a></li>
                                <li><a href="#">Another action</a></li>
                                <li><a href="#">Something else here</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Separated link</a></li>
                            </ul>
                        </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Men Clothing <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kids Clothing <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Baby Clothing <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle user-drop" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i> Welcome Adel! <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><i class="fa fa-cog"></i> My Account</a></li>
                        <li><a href="#"><i class="fa fa-sign-out"></i> Sign out</a></li>
                    </ul>
                    </li>
                    
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fa-lg"></i> <span class="caret"></span><span class="badge">3</span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"></a></li>
                        <li><a href="#">Product Name 1</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#"><i class="fa fa-cart-arrow-down"></i> View Cart</a></li>
                    </ul>
                    </li>
                </ul>
            </div><!-- /.Container-Fluid -->
        </nav><!-- /.Menu-Nav -->
        
        
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>My Account</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="my-acc" class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Basic Information</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li>&#45; Full Name: Mustafa Mohammad Tarek</li>
                                    <li>&#45; Tel Number: &#40;+20&#41; 1009777967</li>
                                    <li>&#45; E-mail Address: adeltalat93@gmail.com</li>
                                    <li>&#45; Birthday: 12/8/1993</li>
                                    <li>&#45; Gender: Male</li>
                                    <li>&#45; E-mail Address: adeltalat93@gmail.com</li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="edit-account.html" class="btn btn-info">Edit</a>
                                <a href="set-new-pass.html" class="btn btn-warning">Set new password</a>
                            </div>
                        </div>
                        
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Address 1</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-unstyled">
                                    <li>&#45; Street Name: Tayran st</li>
                                    <li>&#45; Building Number: 15</li>
                                    <li>&#45; Appartment Number: 8</li>
                                    <li>&#45; Special Delivery Info: Super Market Name</li>
                                    <li>&#45; Country: Egypt</li>
                                    <li>&#45; City: Cairo</li>
                                </ul>
                            </div>
                            <div class="panel-footer">
                                <a href="edit-account.html" class="btn btn-info">Edit</a>
                                <a href="set-address.html" class="btn btn-warning">Add another address</a>
                            </div>
                        </div>
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
        
        <a href="shopping-cart.php" class="btn btn-danger f-cart-btn" role="button"><i class="fa fa-shopping-cart 2x"></i> <span class="badge">0</span></a>
        

<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>