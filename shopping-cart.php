<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
 if(isset($_SESSION['user'])) {

   //if(isset($_POST['saveaddress'])) {
     $action = '';
      if(isset($_GET['action']) && $_GET['action'] == 'update') {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $city               = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
        $region_name        = filter_var($_POST['region_name'], FILTER_SANITIZE_STRING);
        $street_name        = filter_var($_POST['street_name'], FILTER_SANITIZE_STRING);
        $building_name      = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
        $appartment_number  = filter_var($_POST['appartment_number'],FILTER_SANITIZE_NUMBER_INT);
        $Notes              = filter_var($_POST['Notes'], FILTER_SANITIZE_STRING);
        $idadress           = $_POST['id_address'];
          
          if(isset($region_name)) {
              if(strlen($region_name) < 2 ) {
                  $formErrors[] = 'StreetName Must Be More Than 2 Character or Number ';
              }
          }  
          if(isset($street_name)) {
              if(strlen($street_name) < 2 ) {
                  $formErrors[] = 'StreetName Must Be More Than 2 Character or Number ';
              }
          }
          if(isset($building_name)) {
          if(strlen($building_name) < 1) {
                  $formErrors[] = 'BuildingNumber Must Be More Than 1 Number';
              }
          }
          if(isset($appartment_number)) {
              if(strlen($appartment_number) < 1 ) {
                  $formErrors[] = 'appartment Must Be More Than 1 Number';
              }
          }
          if(isset($Notes)) {
              if(strlen($Notes) < 10 ) {
                  $formErrors[] = 'Specialinfo Must Be More Than 10 Character';
              }
          }

          if(empty($formErrors)) {
              
              $stmt3 = $con->prepare("UPDATE `address` SET 
                                  `city` = ?, `region_name` = ?, `street_name` = ?, `building_name` = ?, `appartment_number` = ? , `Notes` = ?
                                  WHERE id_address = ?  AND userid = ?");
              $stmt3->execute(array(
                              $city,
                              $region_name,
                              $street_name,
                              $building_name,
                              $appartment_number,
                              $Notes,
                              $idadress,
                              $userid
                          ));

              $row = $stmt3->rowCount();
              if($row > 0) {
                $_SESSION['message2s'] = "Success Update ".$row." Date";
                header('Location: shopping-cart.php');
                session_write_close();
                exit();
              } else {
                $_SESSION['message2w'] = "Soory ".$row." No data entered for update";
                header('Location: shopping-cart.php');
                session_write_close();
                exit();
              }   
          } else {
              foreach ($formErrors as  $error) {
                $_SESSION['message2'] = $error;
                header('Location: shopping-cart.php');
                session_write_close();
                exit();
              }
          }
        }
      }

      // Update Use Address
      if(isset($_GET['action']) && $_GET['action'] == 'updateUseAddress') {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $city               = $_POST['city1'];
        $region_name        = $_POST['region_name1'];
        $street_name        = $_POST['street_name1'];
        $building_name      = $_POST['building_name1'];
        $appartment_number  = $_POST['appartment_number1'];
        $Notes              = $_POST['Notes1'];
        $idadress           = $_POST['idaddress'];

          $stmt3 = $con->prepare("UPDATE `cart` SET 
                              `address` = '$city, $region_name , $street_name , $building_name , $appartment_number, $Notes'
                              WHERE iduser = ?");
          $stmt3->execute(array(
                          $userid
                      ));

          $row = $stmt3->rowCount();
          if($row > 0) {
            $_SESSION['message2s'] = "Success Update ".$row." Date";
            header('Location: shopping-cart.php');
            session_write_close();
            exit();
          } else {
            $_SESSION['message2w'] = "Soory ".$row." No data entered for update";
            header('Location: shopping-cart.php');
            session_write_close();
            exit();
          }   
        }
      }
        
 
           
    // delete 
        if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
        $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
          if($id > 0){
              $sql = 'DELETE FROM cart WHERE id_order = :id';
              $stmt = $con->prepare($sql);
              $foundUser = $stmt->execute(array( ':id' => $id ));
              if($foundUser === true ) {
                  $_SESSION['message'] = "Product Deleted Successfuly";
                  header('Location: shopping-cart.php');
                  session_write_close();
                  exit();
              }
          }
        }
 
?>  
    <section class="container">
      <div class="well well-top text-center">
        <header>
          <h2> Shopping Cart </h2>
        </header>
      </div>
    </section>
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
                                WHERE iduser = $userid AND `status` = 1 
                                ");
        $stmt->execute(array($userid));
        $getCart = $stmt->fetchAll();
        $count = $stmt->rowCount();
      //address update 
      $stmt2 = $con->prepare("SELECT * FROM `address` WHERE userid =  $userid  ");
      $stmt2->execute();
      $getAddress = $stmt2->fetchAll();
  ?>

    <?php if($count == 0 ) { ?>
      <div class="container">
      <section id="empty-shopping" class="well text-center">
          <h1>Your Shopping Cart Is Empty !</h1>
          <div class="row">
              <div class="col-xs-12">
                  <a class="btn btn-info" href="index.php">Continue Shopping</a>
              </div>
          </div>
      </section><!-- /#Product-Panel/.Well -->
    </div>
    <?php } else {?>

    <div class="container">
      <div class="well" id="checkout-process">
        <div class="wizard">
           
          <!-- <form action="shopping-cart.php?action=update" method="post" role="form"> -->
            <div id="rootwizard">
              <div class="navbar">
                <div class="navbar-inner">
                  <ul>
                     
                    <li><a href="#tab1" data-toggle="tab"><i class="glyphicon glyphicon-shopping-cart"></i></a></li>
                    <li><a href="#tab2" data-toggle="tab"><i class="glyphicon glyphicon-map-marker"></i></a></li>
                    <li><a href="#tab3" data-toggle="tab"><i class="glyphicon glyphicon-credit-card"></i></a></li>
                    <li><a href="#tab4" data-toggle="tab"><i class="glyphicon glyphicon-ok"></i></a></li>
                    <li><a href="#tab5" data-toggle="tab"><i class="glyphicon glyphicon-plane"></i></a></li>
                     
                  </ul>
                  
                </div>
                
              </div>
             
              <div class="progress" id="bar">
                <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>
              </div>
              <div class="tab-content">
                <div class="tab-pane" id="tab1" role="tabpanel">
                  <div class="row">
                    <div class="col-xs-12">
                        <?php if(isset($_SESSION['message'])) { ?>
                             <p class="alert alert-danger <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message'] ?> </p>
                        <?php  unset($_SESSION['message']); } ?>

                    </div>
                  
                  
                      
                    </div>
                 
                  
                  <div class="col-xs-12">
                    <h4 class="heading-inline">- You have <strong><?php echo $count ?> items</strong>in your order</h4>
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
                

                  <div class="row">
                   
                    <div class="col-md-12 col-sm-6 col-xs-12">
                    <?php foreach($getCart as $cart) { ?>
                       
                      <div class="row text-center">
                        <div class="col-md-4 col-xs-12">
                          <div class="media">
                            <div class="media-left"><a href="product-details.php?proid=<?php echo $cart['id_product'] . '&pagename=' . str_replace(' ', '-', $cart['pro_name'])?>"><?php echo  '<img src="admin/uploades/img-product/'.$cart['pro_img'].'" alt="'.$cart['pro_name'].'" width="80px">' ?></a></div>
                            <div class="media-body">
                              <h5 class="media-heading"><?php echo $cart['pro_name'] ?></h5>
                              <div class="product-col"><span>Color :  </span>
                                <div class="form-group product-option color-option active" style="background-color:<?php echo $cart['color'] ?>">
                                  <label>
                                    <input type="radio" name="color" value="<?php echo $cart['color'] ?>"/>
                                  </label>
                                </div>
                              </div>
                              <div class="product-size"><span>Size :</span>
                                <div class="form-group product-option active">
                                  <label><?php echo $cart['size'] ?>
                                    <input type="radio" name="size" value="<?php echo $cart['size'] ?>"/>
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-2 hidden-sm hidden-xs">
                          <div class="input-group number-spinner"><span class="input-group-btn data-dwn">
                              <button class="btn btn-default btn-sm" data-dir="dwn" type="button"><span class="fa fa-minus"></span></button></span>
                            <input class="form-control text-center input-sm " type="text" disabled value="<?php echo $cart['quantity'] ?>" min="1" max="7"/><span class="input-group-btn data-up">
                              <button class="btn btn-default btn-sm" data-dir="up" type="button"><span class="fa fa-plus"></span></button></span>
                          </div>
                        </div>
                        <div class="col-md-1 hidden-sm hidden-xs">
                          <p class="times">X</p>
                        </div>
                        <div class="col-md-2 col-sm-4 col-xs-4 mob-padd">
                          <p class="price"><?php echo $cart['pro_price'] ?> <span class="times">EGP</span></p>
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
                          <p class="price"><?= $cart['pro_price'] * $cart['quantity'] ?> <span class="times">EGP</span></p>
                        </div> <?php @$payment_total += $cart['pro_price'] * $cart['quantity'] ?>
                        <div class="col-md-1 hidden-sm hidden-xs"><a href="shopping-cart.php?action=delete&id=<?= $cart['id_order'] ?>" class="btn btn-link btn-del" ><i class="fa fa-close"></i></a></div>
                        <div class="col-xs-12 visible-sm visible-xs"><a class="btn btn-link btn-sm pull-left" href="shopping-cart.php?action=delete&id=<?= $cart['id_order'] ?>">REMOVE</a></div>
                      </div>
                      <hr/>

                      <?php  }  ?>

    
                    </div>
                    
                    <!-- total -->
                  </div>
                  <div class="row">
                   
                    <div class="col-sm-12 hidden-xs">
                      <p class="text-right"><span class="times">Subtotal:   </span><span class="total"><?php  echo @$payment_total;  ?><span class="times">EGP</span></span></p>
                    </div>
                    <div class="checkout-btn-fixed visible-xs">
                      <p class="btn btn-primary btn-lg btn-block">Subtotal: <?php echo @$payment_total;  ?> EGP</p>
                    </div>
                    <?php }?>
                  </div>
                </div>
                   
                <!-- 2 -->
                <div class="tab-pane" id="tab2" role="tabpanel">
                  <div class="row">
                    <div class="col-xs-12">
                        <?php if(isset($_SESSION['message2'])) { ?>
                             <p class="alert alert-danger <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message2'] ?> </p>
                        <?php  unset($_SESSION['message2']); } ?>
                        <?php if(isset($_SESSION['message2s'])) { ?>
                             <p class="alert alert-success "> <?= $_SESSION['message2s'] ?> </p>
                        <?php  unset($_SESSION['message2s']); } ?>
                        <?php if(isset($_SESSION['message2w'])) { ?>
                             <p class="alert alert-warning"> <?= $_SESSION['message2w'] ?> </p>
                        <?php  unset($_SESSION['message2w']); } ?>
                    </div>
                     <?php if($count > 0) {?>
                    <div class="col-xs-12">
                      <h4 class="heading-inline">- Fill the <strong>Shipping</strong> information</h4>
                    </div>
                  </div>
                  <div class="panel-group" id="accordion" role="tablist" multiselectable="true">
                  <?php foreach ($getAddress as $address) {
                   
                  ?>
                    <div class="panel panel-default">
                      <div class="panel-heading" id="haedingOne" role="tab">
                        <h4 class="panel-title"><a href="#collapseOne" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" arai-control="collapseOne">Use This Address</a></h4>
                      </div>
                      <div class="panel-collapse collapse in" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <form class="disabled-address" action="shopping-cart.php?action=updateUseAddress" method="post">
                          <input type="hidden"  name="idaddress" value="<?= $address['id_address']?>">
                          <p>Region Name : <input  type="text" name="region_name1" value="<?= $address['region_name']?>"></p>
                          <p>City : <input  type="text" name="city1" value="<?= $address['city']?>"></p>
                          <p>Street Name / Number :  <input  type="text" name="street_name1" value="<?= $address['street_name']?>"></p>
                          <p>Building Name / Number :<input  type="text" name="building_name1" value="<?= $address['building_name']?>"> </p>
                          <p>Appartment Number :<input  type="text" name="appartment_number1" value="<?= $address['appartment_number']?>"></p>
                          <p>Notes : <input  type="text" name="Notes1" value="<?= $address['Notes']?>"></p>
                          <button class="btn btn-success" type="submit" name="submit">Use This Address</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  <?php } //disabled?>
                  <!-- 
                    <div class="panel panel-default">
                      <div class="panel-heading" id="headingTwo" role="tab">
                        <h4 class="panel-title"><a href="#collapseTwo" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-control="collapseTwo">Change Address</a></h4>
                      </div>
                      <div class="panel-collapse collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                          <form action="shopping-cart.php?action=update" method="post">
                            <div class="form-group">
                              <label for="country">Country</label>
                              <input class="form-control" id="country" name="country" disabled value="EGYPT" type="text" placeholder="Please Enter Country" />
                            </div>
                            <div class="form-group">
                                <label for="cityName">City Name</label>
                                <select id="cityName" class="form-control" name="city" required>
                                    <option disabled selected>Select City</option>
                                    <option  name="city" <?php if ($address['city'] == 'Cairo' ) { echo 'selected'; }  ?> > Cairo</option>
                                    <option  name="city" <?php if ($address['city'] == 'Gizeh' ) { echo 'selected'; }  ?> > Gizeh</option>
                                    <option  name="city" <?php if ($address['city'] == 'Alexandria' ) { echo 'selected'; }  ?> > Alexandria</option>
                                    <option  name="city" <?php if ($address['city'] == 'Port Said' ) { echo 'selected'; }  ?> > Port Said</option>
                                    <option  name="city" <?php if ($address['city'] == 'Suez' ) { echo 'selected'; }  ?> > Suez</option>
                                    <option  name="city" <?php if ($address['city'] == 'Ismailia' ) { echo 'selected'; }  ?> > Ismailia</option>
                                    <option  name="city" <?php if ($address['city'] == 'Qalyubiya' ) { echo 'selected'; }  ?> > Qalyubiya</option>
                                    <option  name="city" <?php if ($address['city'] == 'Sharqia' ) { echo 'selected'; }  ?> > Sharqia</option>
                                    <option  name="city" <?php if ($address['city'] == 'Monufia' ) { echo 'selected'; }  ?> > Monufia</option>
                                    <option  name="city" <?php if ($address['city'] == 'Gharbia' ) { echo 'selected'; }  ?> > Gharbia</option>
                                    <option  name="city" <?php if ($address['city'] == 'Dakahlia' ) { echo 'selected'; }  ?> > Dakahlia</option>
                                    <option  name="city" <?php if ($address['city'] == 'Beheira' ) { echo 'selected'; }  ?> > Beheira</option>
                                    <option  name="city" <?php if ($address['city'] == 'Damietta' ) { echo 'selected'; }  ?> > Damietta</option>
                                    <option  name="city" <?php if ($address['city'] == 'Kafr el-Sheikh' ) { echo 'selected'; }  ?> > Kafr el-Sheikh</option>
                                    <option  name="city" <?php if ($address['city'] == 'Asyut' ) { echo 'selected'; }  ?> > Asyut</option>
                                    <option  name="city" <?php if ($address['city'] == 'Sohag' ) { echo 'selected'; }  ?> > Sohag</option>
                                    <option  name="city" <?php if ($address['city'] == 'Minya' ) { echo 'selected'; }  ?> > Minya</option>
                                    <option  name="city" <?php if ($address['city'] == 'Beni Suef' ) { echo 'selected'; }  ?> > Beni Suef</option>
                                    <option  name="city" <?php if ($address['city'] == 'Faiyum' ) { echo 'selected'; }  ?> > Faiyum</option>
                                    <option  name="city" <?php if ($address['city'] == 'Qena' ) { echo 'selected'; }  ?> > Qena</option>
                                    <option  name="city" <?php if ($address['city'] == 'Luxor' ) { echo 'selected'; }  ?> > Luxor</option>
                                    <option  name="city" <?php if ($address['city'] == 'Aswan' ) { echo 'selected'; }  ?> > Aswan</option>
                                    <option  name="city" <?php if ($address['city'] == 'Red Sea' ) { echo 'selected'; }  ?> > Red Sea</option>
                                    <option  name="city" <?php if ($address['city'] == 'Matrouh' ) { echo 'selected'; }  ?> > Matrouh</option>
                                    <option  name="city" <?php if ($address['city'] == 'South Sinai' ) { echo 'selected'; }  ?> > South Sinai</option>
                                    <option  name="city" <?php if ($address['city'] == 'North Sinai' ) { echo 'selected'; }  ?> > North Sinai</option>
                                    <option  name="city" <?php if ($address['city'] == 'Abu Simbel' ) { echo 'selected'; }  ?> > Abu Simbel</option>
                                    <option  name="city" <?php if ($address['city'] == 'Marsa Alam' ) { echo 'selected'; }  ?> > Marsa Alam</option>
                                    <option  name="city" <?php if ($address['city'] == 'Salloum' ) { echo 'selected'; }  ?> > Salloum</option>
                                    <option  name="city" <?php if ($address['city'] == 'Halayeb & shlateen' ) { echo 'selected'; }  ?> > Halayeb & shlateen</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="regionName">Region Name</label>
                              <input name="id_address" value="<?= $address['id_address']?>" type="hidden" />
                              <input class="form-control" id="regionName" name="region_name" value="<?= $address['region_name']?>" type="text" placeholder="Please Enter Region Name" required/>
                            </div>
                            <div class="form-group">
                              <label for="streetName">Street Name / Number</label>
                              <input class="form-control" id="streetName" name="street_name" value="<?= $address['street_name']?>" type="text" placeholder="Please Enter Street Name" required/>
                            </div>
                            <div class="form-group">
                              <label for="buildingNumber">Building Name / Number</label>
                              <input class="form-control" id="buildingNumber" name="building_name" value="<?= $address['building_name']?>" type="text" placeholder="Please Enter Building Number" required/>
                            </div>
                            <div class="form-group">
                              <label for="appartmentgNumber">Appartment Number</label>
                              <input class="form-control" id="appartmentNumber" name="appartment_number" value="<?= $address['appartment_number']?>" type="number" placeholder="Please Enter Appartment Number" required/>
                            </div>
                            <div class="form-group">
                              <label for="specialD">Notes</label>
                              <input class="form-control" id="specialD" name="Notes" value="<?= $address['Notes']?>" type="text" placeholder="Please Enter Special Delivery Info" required/>
                              <p class="help-block">Like : Super Market, Mosque etc...</p>
                            </div>
                            <div class="row">
                              <div class="col-xs-3">
                                  <button class="form-control btn btn-success" type="submit" name="submit">Save</button>
                              </div>
                            </div>
                            
                         </form>
                        </div>
                      </div>
                    </div>
                     -->
                  </div>
                </div>
             
                <div class="tab-pane" id="tab3" role="tabpanel">
                  <div class="row">
                    <form action="">
                      <div class="col-xs-12">
                        <h4 class="heading-inline">- Plaese Select<strong> Payment Method</strong></h4>
                        <h3 class="panel-title"><i class="fa fa-check-circle"></i> Cash on Delivery</h3>
                        <!-- <div class="">
                           <input id="CODA" type="checkbox" class="fa fa-check-circle"> 
                           <i class="fa fa-check-circle"></i>
                          <label for="CODA">Cash on Delivery</label> 
                        </div> -->
                        <span class="help-block">- Delivery within 5-7 days</span>
                        <hr>
                        <!-- <p class="d-fees">Delivery Fees = <span class="label label-info">+ 120 EGP</span></p><span class="help-block">- Delivery fees depends on location you added</span> -->
                      </div>
                      <div class="checkout-btn-fixed visible-xs">
                        <!-- <p class="btn btn-primary btn-lg btn-block" type="submit">CONFIRMATION</p> -->
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane" id="tab4" role="tabpanel">
                  <div class="row">
                    <form action="shopping-cart.php?action=order" method="post" enctype="multipart/form-data">
                      <div class="col-xs-12">
                        <h4 class="heading-inline"><strong>- Confirm Order</strong></h4>
                      </div>
                      <div class="col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                              <div class="col-xs-8">
                                <h3 class="panel-title"><i class="fa fa-check-circle"></i>Order Summary</h3>
                              </div>
                              <div class="col-xs-4"><a class="btn btn-default pull-right checkout-edit" href="checkout.html#step3">Edit</a></div>
                            </div>
                          </div>
                          <div class="panel-body">
                            <?php foreach($getCart as $order){ ?>
                            <div class="row">
                              
                              <div class="col-sm-9 col-xs-12">
                                
                                <div class="media">
                                  <div class="media-left"><a href="#"><?php echo  '<img src="admin/uploades/img-product/'.$order['pro_img'].'" alt="'.$order['pro_name'].'" width="80px">' ?></a></div>
                                  <div class="media-body">
                                    <h5 class="media-heading"><?php echo $order['pro_name'] ?></h5>
                                    <input type="hidden" name="nameprodect" value="<?= $order['pro_name'] ?>"> <!-- name prodect -->
                                    <input type="hidden" name="proid" value="<?= $order['pro_id'] ?>"> <!-- pro id prodect -->
                                    <input type="hidden" name="price" value="<?= $order['pro_price'] ?>"> <!-- price prodect -->
                                    <input type="hidden" name="quantity" value="<?= $order['quantity'] ?>"> <!-- quantity prodect -->
                                    <input type="hidden" name="iduser" value="<?= $userid ?>"> <!-- userid  -->
                                    <input type="hidden" name="color" value="<?= $order['color'] ?>"><!-- color prodect -->
                                    <input type="hidden" name="size" value="<?=  $order['size'] ?>"><!-- size prodect -->



                                    <input type="hidden" name="idproduct " value="<?= $order['idproduct'] ?>"><!--  id prodect databases table -->
                                    <div class="product-col"><span>Color :</span>
                                      <div class="form-group product-option color-option active" style="background-color:<?php echo $order['color'] ?>">
                                        <label>
                                          <input type="radio" name="colorr" value="<?php echo $order['color'] ?>"><!-- color prodect -->
                                        </label>
                                      </div>
                                    </div>
                                    <div class="product-size"><span>Size :</span>
                                      <div class="form-group product-option active">
                                        <label><?php echo $order['size'] ?>
                                          <input type="radio" name="sizee" value="<?php echo $order['size'] ?>"><!-- size prodect -->
                                        </label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="col-sm-3 col-xs-12">
                                <p class="text-left price"><span>Price :</span> <?= $order['pro_price'] * $order['quantity'] ?><span class="times">EGP</span></p>
                                 <?php  @$payment_total2 += $order['pro_price'] * $order['quantity']; ?>
                              </div>
                            </div>
                            <hr>
                              <?php }?>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                              <div class="col-xs-8">
                                <h3 class="panel-title"><i class="fa fa-check-circle"></i>Billing Summary</h3>
                              </div>
                              <div class="col-xs-4"><a class="btn btn-default pull-right" href="#">Edit</a></div>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-xs-12">
                                <?php 
                                  $stmt = $con->prepare("SELECT cart.*, product.*
                                  FROM  cart
                                  INNER JOIN product
                                  ON product.id_product = cart.idproduct
                                  WHERE iduser = $userid AND `status` = 0
                                  ");
                                  $stmt->execute(array($userid));
                                  $getOrder = $stmt->fetch();
                                 
                                ?>
                               
                                <div class="row">
                                  <div class="col-xs-7 col-sm-4 col-md-3">
                                    <p>Region Name : </p>
                                    <p>City : </p>
                                    <p>Street Name / Number : </p>
                                    <p>Building Name / Number : </p>
                                    <p>Appartment Number : </p>
                                    <p>Notes : </p>
                                  </div>
                                  <div class="col-xs-5 col-sm-3 col-md-2">
                                    <?= str_replace(',', '<p>', $getOrder['address']) .'</p>';  ?>
                                    <input type="hidden" value="<?=$getOrder['address']?>" name="address"> <!-- address user -->
                                  </div>
                                </div>
                    
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="panel panel-default">
                          <div class="panel-heading">
                            <div class="row">
                              <div class="col-xs-8">
                                <h3 class="panel-title"><i class="fa fa-check-circle"></i>Payment Summary</h3>
                              </div>
                              <div class="col-xs-4"><a class="btn btn-default pull-right" href="#">Edit</a></div>
                            </div>
                          </div>
                          <div class="panel-body">
                            <div class="row">
                              <div class="col-xs-12">
                                <h4>Cash on Delivery</h4>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-12 checkout-btn hidden-xs text-center">
                       
                        <button class="btn btn-primary btn-block btn-lg" name="submit" type="submit">Total: <?= @$payment_total2  ?> EGP | PLACE ORDER</button>
                      </div>
                      <div class="checkout-btn-fixed visible-xs">
                        
                        <button class="btn btn-primary btn-lg btn-block" name="submit" type="submit">Total: <?= @$payment_total2 ?> EGP | PLACE ORDER</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!--  -->
                <div class="tab-pane" id="tab5" role="tabpanel">
                  <?php 
                   
                    if(isset($_GET['action'])) {
                      $action = $_GET['action'];
                    }
                      if($action == 'order') {
                        // $name       = $_POST['nameprodect'];
                        // $idpro      = $_POST['proid'];
                        // $price      = $_POST['price'];
                        // $quantity   = $_POST['quantity'];
                        // $color2      = $_POST['color'];
                        // $size2       = $_POST['size'];
                        // $address    = $_POST['address'];

                        // var_dump($name, $idpro, $price ,$quantity , $color2, $size2 , $address);
                       // $userid
                       $stmt6 = $con->prepare("UPDATE `cart` SET `status` = 0  WHERE iduser = ? ");
                      $stmt6->execute(array(
                          $userid
                      ));
                       $row = $stmt6->rowCount();
                        if($row > 0) {
                          $_SESSION['message3s'] = "Success puy Prodect ";  
                          header('Location: shopping-cart.php#tab5');
                          session_write_close();
                          exit();
                          
                        } else {
                          echo 'error';
                          var_dump($userid ,$row);
                        }   
                      } else {
                        echo 'not';
                       
                      }

                  ?>
                </div> 
                 
                <ul class="pager wizard row">
                  <div class="col-xs-2 dir-btn">
                    <li class="previous first" style="display:none;"><a href="#">First</a></li>
                    <li class="previous"><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
                  </div>
                  <div class="col-xs-10 dir-btn">
                    <li class="next last" style="display:none;"><a href="#">Last</a></li>
                    <li class="next"><a href="#">Next <i class="fa fa-angle-double-right"></i></a></li>
                  </div>
                </ul>
                 
              </div>
            
            </div>
          </form>
        </div>
      
      </div>
    </div>
    <?php }} ?>
        


        <!-- end order -->

    <div class="container">
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
    } else {
        header('Location: login-index.php');
    }
?>