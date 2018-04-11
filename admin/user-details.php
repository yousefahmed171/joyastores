<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
     
?>
        
        <section class="head-page-user-details">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-user-secret"></i>&nbsp;&nbsp;User Details</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article class="full-user-details">
                <div class="row">
                    <div class="col-xs-12 text-center">
                        <i class="material-icons">account_circle</i>  
                    </div>
                </div>
                  <?php 
                   $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET['userid']) : 0;
                    
                    $stmt = $con->prepare("SELECT * FROM users WHERE userid = $userid ");
       
                    $stmt->execute(array($userid));
                    
                    $row = $stmt->fetch();
                    
                    $count = $stmt->rowCount();
                    if ($count > 0) {
                  ?>  
                <div class="row user-det-profile">
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons">phone</i> Telephone</p>
                        <p><?php echo $row['phone'] ?></p>
                    </div>
                    
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons">assignment_ind</i> Name</p>
                        <p><?php echo $row['username'] ?></p>
                    </div>

                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons">email</i> E-mail</p>
                        <p><?php echo $row['email'] ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons">date_range</i> Birthday</p>
                        <p><?php echo $row['birth-day']; echo' / ';  echo $row['birth-month']; echo' / ';  echo $row['birth-yaer'];  ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons">face</i> Gender</p>
                        <p><?php echo $row['gender'] ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons"><i class="material-icons">location_on</i></i> Location</p>
                        <p><?php echo $row['country'] ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons"><i class="material-icons">location_on</i></i> Address 1</p>
                        <p>Street Name :    <?php echo $row['street-name'] ?></p>
                        <p>Building No. :   <?php echo $row['building-number'] ?></p>
                        <p>Appartment No. : <?php echo $row['appartment-no'] ?></p>
                        <p>Special Info :   <?php echo $row['specialinfo'] ?></p>
                        <p>City :           <?php echo $row['city'] ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons"><i class="material-icons">location_on</i></i> Address 2</p>
                        <p>Street Name :    <?php echo $row['street-name-2'] ?></p>
                        <p>Building No. :   <?php echo $row['building-number-2'] ?></p>
                        <p>Appartment No. : <?php echo $row['appartment-no-3'] ?></p>
                        <p>Special Info :   <?php echo $row['specialinfo-2'] ?></p>
                        <p>City :           <?php echo $row['city-2'] ?></p>
                    </div>
                    <div class="profile-det col-xs-12 col-sm-4">
                        <p><i class="material-icons"><i class="material-icons">location_on</i></i> Address 3</p>
                        <p>Street Name :    <?php echo $row['street-name-3'] ?></p>
                        <p>Building No. :   <?php echo $row['building-number-3'] ?></p>
                        <p>Appartment No. : <?php echo $row['appartment-no-3'] ?></p>
                        <p>Special Info :   <?php echo $row['specialinfo-3'] ?></p>
                        <p>City :           <?php echo $row['city-3'] ?></p>
                    </div>
                </div>
            </article>
        </section>
        <?php } ?>
        <section class="container">
            <section class="head-page-user-details-order">
                    <div class="row">
                        <div class="col-xs-12">
                            <header>
                                <h2><i class="fa fa-cube"></i>&nbsp;&nbsp;User Orders</h2>
                            </header>    
                        </div>
                    </div>
            </section>
            
            <section class="user-det-order">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>All User Order Details</caption>
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Statue</th>
                                <th>info</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>23</td>
                                <td>20:09</td>
                                <td>24/6/2016</td>
                                <td>120 EGP</td>
                                <td>Delivered</td>
                                <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                                
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>15</td>
                                <td>20:09</td>
                                <td>24/6/2016</td>
                                <td>120 EGP</td>
                                <td>None</td>
                                <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>20</td>
                                <td>20:09</td>
                                <td>24/6/2016</td>
                                <td>120 EGP</td>
                                <td>Accepted</td>
                                <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>27</td>
                                <td>20:09</td>
                                <td>24/6/2016</td>
                                <td>120 EGP</td>
                                <td>Shiped</td>
                                <td>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#orderDetails"><i class="material-icons">assignment</i></button></td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>44</td>
                                <td>20:09</td>
                                <td>24/6/2016</td>
                                <td>120 EGP</td>
                                <td>Delivered</td>
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
                        <li class="active"><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        
                        <li>
                        <a href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>
                        </li>
                    </ul>
                </nav>
            </section>    
        </section>
        
        
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
                    <button type="button" title="Print" class="btn btn-success"><i class="material-icons">print</i></button>
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
