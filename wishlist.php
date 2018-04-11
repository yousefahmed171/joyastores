<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
       
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Wishlist</h2>
                </header>
            </div>
        </section>
        <div class="container">
                <div class="tab-pane" id="tab1" role="tabpanel">
                  <div class="row">
                    <div class="col-xs-12">
                        <?php if(isset($_SESSION['message'])) { ?>
                             <p class="alert alert-danger <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message'] ?> </p>
                        <?php  unset($_SESSION['message']); } ?>
                    </div>
                    <div class="col-xs-12">
                      <h4 class="heading-inline">- You have <strong><?php echo $count ?> items</strong>in your Wishlist</h4>
                    </div>
                  </div>
                  <div class="row wiz-header text-center hidden-sm hidden-xs">
                    <div class="col-md-4">
                      <h5> Item</h5>
                    </div>
                    <div class="col-md-2">
                      <h5> Quantity</h5>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                      <h5> Item Price</h5>
                    </div>
                    <div class="col-md-2">
                      <h5> Total</h5>
                    </div>
                  </div>
                  <?php 
                      if (isset($_SESSION['user'])) {
                        $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
                        $getUser->execute(array($sessionuser));
                        $infouser = $getUser->fetch();
                        $userid = $infouser['userid'];
                      }
                      if(isset($_SESSION['user'])){
                        $stmt = $con->prepare("SELECT cart.*, product.*
                                                FROM  cart
                                                INNER JOIN product
                                                ON product.id_product = cart.idproduct
                                                WHERE iduser = $userid AND `status` = 0
                                                ");
                        $stmt->execute(array($userid));
                        $count = $stmt->rowCount();
                        $getOrder = $stmt->fetchAll();
                      //address update 
                      $stmt2 = $con->prepare("SELECT * FROM `address` WHERE userid =  $userid  ");
                      $stmt2->execute();
                      $address = $stmt2->fetch();

                  ?>
                  <div class="row">
                   
                    <div class="col-md-12 col-sm-6 col-xs-12">
                    <?php foreach($getOrder as $order) { ?>
                      <div class="row text-center">
                        
                        <div class="col-md-4 col-xs-12">
                          <div class="media">
                            <div class="media-left"><a href="#"><?php echo  '<img src="admin/uploades/img-product/'.$order['pro_img'].'" alt="'.$order['pro_name'].'" class="img-responsive" width="80px">' ?></a></div>
                            <div class="media-body">
                              <h5 class="media-heading"><?php echo $order['pro_name'] ?></h5>
                              <div class="product-col"><span>Color :  </span>
                                <div class="form-group product-option color-option active" style="background-color:<?php echo $order['color'] ?>;">
                                  <label>
                                    <input type="radio" name="color" value="#FFAF32"/>
                                  </label>
                                </div>
                              </div>
                              <div class="product-size"><span>Size :</span>
                                <div class="form-group product-option active">
                                  <label><?php echo $order['size'] ?>
                                    <input type="radio" name="size" value="L"/>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 hidden-sm hidden-xs">
                          <div class="input-group number-spinner"><span class="input-group-btn data-dwn">
                              <button class="btn btn-default btn-sm" data-dir="dwn" type="button"><span class="fa fa-minus"></span></button></span>
                            <input class="form-control text-center input-sm" type="text" disabled value="<?php echo $order['quantity'] ?>" min="1" max="7"/><span class="input-group-btn data-up">
                              <button class="btn btn-default btn-sm" data-dir="up" type="button"><span class="fa fa-plus"></span></button></span>
                          </div>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs">
                          <p class="times">X</p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4 mob-padd">
                          <p class="price"><?php echo $order['pro_price'] ?> <span class="times">EGP</span></p>
                        </div>
                        <div class="col-sm-3 col-xs-2 visible-sm visible-xs mob-padd">
                          <p class="times">X</p>
                        </div>
                        <div class="col-sm-5 col-xs-5 visible-sm visible-xs mob-padd">
                          <div class="input-group number-spinner"><span class="input-group-btn data-dwn">
                              <button class="btn btn-default btn-sm" data-dir="dwn" type="button"><span class="fa fa-minus"></span></button></span>
                            <input class="form-control text-center input-sm"  type="text" value="1" min="1" max="7"/><span class="input-group-btn data-up">
                              <button class="btn btn-default btn-sm" data-dir="up" type="button"><span class="fa fa-plus"></span></button></span>
                          </div>
                        </div>
                        <div class="col-md-2 hidden-sm hidden-xs">
                          <p class="price"><?= $order['pro_price'] * $order['quantity'] ?> <span class="times">EGP</span></p>
                        </div> <?php @$payment_total += $order['pro_price'] * $order['quantity'] ?>
                        <div class="col-md-1 hidden-sm hidden-xs"><a href="shopping-cart.php?action=delete&id=<?= $order['id_order'] ?>" class="btn btn-link btn-del" ><i class="fa fa-close"></i></a></div>
                        <div class="col-xs-12 visible-sm visible-xs"><a class="btn btn-link btn-sm pull-left" href="shopping-cart.php?action=delete&id=<?= $order['id_order'] ?>">REMOVE</a></div>
                      </div>
                      <hr/>
                      <?php }  ?>
                    </div>
                    
                    <!-- toltal -->
                  </div>
                  <div class="row">
                    <div class="col-sm-12 hidden-xs">
                      <p class="text-right"><span class="times">Subtotal:   </span><span class="total"><?php  echo @$payment_total;  ?><span class="times">EGP</span></span></p>
                    </div>
                    <div class="checkout-btn-fixed visible-xs">
                      <p class="btn btn-primary btn-lg btn-block">Subtotal: <?php echo $payment_total;  ?> EGP</p>
                    </div>
                  </div>
                </div>
                    <?php } ?>
        
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
  </div>     
<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>