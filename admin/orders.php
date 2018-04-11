<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
  
    
   
       
       
       
?>
        
        <section class="head-page-orders">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="material-icons">shopping_cart</i>&nbsp;&nbsp;Orders</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>

                
        
        <section class="container">
            <section class="search-result">
                <form>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="search" class="form-control input-lg" placeholder="Search Orders">
                            <a class="btn btn-lg btn-default input-group-addon"><i class="material-icons">search</i></a>
                        </div>
                    </div>
                </form>
                
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Search Result</caption>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Name</th>
                                <th>Tel Number</th>
                                <th>Total</th>
                                <th>city</th>
                                <th>Statue</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>374</td>
                                <td>01:04</td>
                                <td>25-04-2017</td>
                                <td>Mostafa Mohammad</td>
                                <td>01009876543</td>
                                <td>50 EGP</td>
                                <td>Cairo</td>
                                <td>None</td>
                                <td>
                                    <button class="btn btn-success" title="Order Shiped" data-toggle="modal" data-target=".ship-order"><i class="material-icons">done_all</i></button>
                                    <a type="button" class="btn btn-info" title="Order Pill" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></a>
                                    <button class="btn btn-warning" title="Order Archived" data-toggle="modal" data-target=".archive-order"><i class="material-icons" >archive</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>864</td>
                                <td>01:04</td>
                                <td>25-04-2017</td>
                                <td>Mahmoud Mohammad</td>
                                <td>01009876543</td>
                                <td>50 EGP</td>
                                <td>Assiut</td>
                                <td>Accepted</td>
                                <td>
                                    <button class="btn btn-success" title="Order Shiped" data-toggle="modal" data-target=".ship-order"><i class="material-icons">done_all</i></button>
                                    <a type="button" class="btn btn-info" title="Order Pill" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></a>
                                    <button class="btn btn-warning" title="Order Archived" data-toggle="modal" data-target=".archive-order"><i class="material-icons" >archive</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>864</td>
                                <td>01:04</td>
                                <td>25-04-2017</td>
                                <td>Mahmoud Mohammad</td>
                                <td>01009876543</td>
                                <td>50 EGP</td>
                                <td>Alex</td>
                                <td>Shiped</td>
                                <td>
                                    <button class="btn btn-success" title="Order Shiped" data-toggle="modal" data-target=".ship-order"><i class="material-icons">done_all</i></button>
                                    <a type="button" class="btn btn-info" title="Order Pill" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></a>
                                    <button class="btn btn-warning" title="Order Archived" data-toggle="modal" data-target=".archive-order"><i class="material-icons" >archive</i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>864</td>
                                <td>01:04</td>
                                <td>25-04-2017</td>
                                <td>Mahmoud Mohammad</td>
                                <td>01009876543</td>
                                <td>50 EGP</td>
                                <td>Cairo</td>
                                <td>Deliverid</td>
                                <td>
                                    <button class="btn btn-success" title="Order Shiped" data-toggle="modal" data-target=".ship-order"><i class="material-icons">done_all</i></button>
                                    <a type="button" class="btn btn-info" title="Order Pill" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></a>
                                    <button class="btn btn-warning" title="Order Archived" data-toggle="modal" data-target=".archive-order"><i class="material-icons" >archive</i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                <nav aria-label="Page navigation" class="text-center page-nav-user">
                    <ul class="pagination">
                        <li>
                        <a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                        </li>
                        
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li class="active"><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        
                        <li>
                        <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    </ul>
                </nav>
            </section>    
        </section>
        
        
        <section class="head-page-orders">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="material-icons">archive</i>&nbsp;&nbsp;Orders Archive</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        
        <section class="container">
            <article class="search-result">
                <section class="search-pro">
                    <form>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="search" class="form-control input-lg" placeholder="Search Prodcuts">
                                <a class="btn btn-lg btn-default input-group-addon"><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                    </form>
                </section>
                
                <section class="search-res">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <caption>Search Result</caption>
                                <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Tel Number</th>
                                    <th>Total</th>
                                    <th>Info</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>374</td>
                                    <td>Mostafa Mohammad</td>
                                    <td>01009876543</td>
                                    <td>50 EGP</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>374</td>
                                    <td>Mostafa Mohammad</td>
                                    <td>01009876543</td>
                                    <td>50 EGP</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>374</td>
                                    <td>Mostafa Mohammad</td>
                                    <td>01009876543</td>
                                    <td>50 EGP</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>374</td>
                                    <td>Mostafa Mohammad</td>
                                    <td>01009876543</td>
                                    <td>50 EGP</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>374</td>
                                    <td>Mostafa Mohammad</td>
                                    <td>01009876543</td>
                                    <td>50 EGP</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <nav aria-label="Page navigation" class="text-center page-nav-user">
                        <ul class="pagination">
                            <li>
                            <a href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>
                            </li>

                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li class="active"><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>

                            <li>
                            <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                            </li>
                        </ul>
                    </nav>
                </section>
            </article>
        </section>
        
        <div class="modal fade archive-order" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want Archive this Order ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade ship-order" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you sure the order is shiped ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="orderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Order Details</h4>
                    </div>
                    
                    <div class="modal-body">
                        <div>
                            <h3 class="text-center">Joyastores</h3>
                            <p>Thank you for shopping from joyastores.com</p>
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
                                    <p>150 EGP</p>
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
                                                        <th>No.</th>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Size</th>
                                                        <th>Color</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th>Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Q875</td>
                                                        <td>T-shirt for girls</td>
                                                        <td>Small</td>
                                                        <td>Red</td>
                                                        <td>3</td>
                                                        <td>20 EGP</td>
                                                        <td>60 EGP</td>
                                                    </tr>
                                                    <tr>
                                                        <td>2</td>
                                                        <td>Q877</td>
                                                        <td>T-shirt for Boys</td>
                                                        <td>Small</td>
                                                        <td>Blue</td>
                                                        <td>2</td>
                                                        <td>25 EGP</td>
                                                        <td>50 EGP</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8" style="text-align:right"><h4>Subtotal: 110 EGP</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8" style="text-align:right"><h4>Delivery Fees: 40 EGP</h4></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="8" style="text-align:right"><h4>Total: 150 EGP</h4></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <h5 class="text-primary">- Customer Details</h5>
                                        <p>E-mail : mostafa@gmail.com.</p>
                                        <p>Tel Number : +2010098765.</p>

                                        <h5 class="text-primary">- Billing Address</h5>
                                        <p>Name : Mostafa Mohammad Mahmoud.</p>
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
                    
                    <div class="modal-footer">
                    <button type="button" title="Order Accepted" class="btn btn-success" data-toggle="modal" data-target=".accept-order"><i class="material-icons">done</i></button>
                    <button type="button" title="Print" class="btn btn-success"><i class="material-icons">print</i></button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade accept-order" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Confirmation</h4>
                    </div>
                    
                    <div class="modal-body">
                        <h5>Are you want to accept this order ?</h5>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Confirm</button>
                    </div>
                </div>
            </div>
        </div>
        
       
       
       
       
       
 <?php      
       include $tpl . 'footer.php';
        
       
    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

  ob_end_flush();
?>