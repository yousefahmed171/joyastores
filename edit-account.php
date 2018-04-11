<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';

  if(isset($_SESSION['user'])) {
      
    $getUser = $con->prepare("SELECT * FROM users WHERE username = ? ");
    $getUser->execute(array($_SESSION['user']));
    $info    = $getUser->fetch();
   
?>  


       <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Edit Account </h2>
                 
                </header>
            </div>
        </section>
        <div class="container">
            <section id="sign-up" class="well">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#basic-info" aria-controls="basic-info" role="tab" data-toggle="tab">Basic Information</a></li>
                    <li role="presentation"><a href="edit-account#address-info" aria-controls="address-info" role="tab" data-toggle="tab">Add Address Information</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="basic-info">
                        <form class="edit" action="editaccount.php?do=updateedit" method="POST">
                            <div class="form-group">
                                <input type="hidden" class="form-control"  name="userid" value="<?php echo $info['userid'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="fullName"> User Name </label>
                                <input type="text" class="form-control" disabled id="username" placeholder="Please Enter Full Name" name="username" value="<?php echo $info['username'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="firstname"> First Name </label>
                                <input type="text" class="form-control" id="firstname" placeholder="Please Enter First Name" name="firstname" value="<?php echo $info['firstname'] ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="lastlName"> Last Name</label>
                                <input type="text" class="form-control" id="lastlName" placeholder="Please Enter Last Name" name="lastlname" value="<?php echo $info['lastlname'] ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="telNumber">Tel Number</label>
                                <input type="tel" class="form-control" id="telNumber" placeholder="Please Enter Telephone Number" name="phone" value="<?php echo $info['phone'] ?>" required>
                                <p class="help-block"> - Please enter your telephone number, we will call you on it.</p>
                            </div>
                            
                            <div class="form-group">
                                <label for="Email1">Email address</label>
                                <input type="email" class="form-control" id="Email1" placeholder="Please Enter Email" name="email" value="<?php echo $info['email'] ?>" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="birthday1">Birthday</label>
                                <div class="row">
                                  <div class="col-xs-12 col-sm-4 b-date">
                                    <input type="number" class="form-control" placeholder="Day" min="1" max="31"  name="day" value="<?php echo $info['birth-day'] ?>">
                                  </div>
                                  <div class="col-xs-12 col-sm-4 b-date">
                                    <input type="number" class="form-control" placeholder="Month" min="1" max="12"  name="month" value="<?php echo $info['birth-month'] ?>">
                                  </div>
                                  <div class="col-xs-12 col-sm-4 b-date">
                                    <input type="number" class="form-control" placeholder="Yaer" min="1920" max="2017"  name="yaer" value="<?php echo $info['birth-yaer'] ?>">
                                  </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="gender1">Gender</label>
                                <select id="gender1" class="form-control" name="gender" required>
                                    <option disabled selected>Select gender</option>
                                    <option  name="gender" <?php if ($info['gender'] == 'Male' ) { echo 'selected'; }  ?> > Male</option>
                                    <option  name="gender" <?php if ($info['gender'] == 'Female' ) { echo 'selected'; }  ?> > Female</option>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="Password1">Password</label>
                                <input type="password" class="form-control" id="password1" name="password1" placeholder="Password" >
                            </div>
                            
                            <div class="form-group">
                                <label for="confirmPassword1">Confirm password</label>
                                <input type="password" class="form-control" id="confirmPassword1" name="password2" placeholder="Password" >
                            </div>
                            
                            <input type="submit" class="btn btn-default" value="Save Change" />
                        </form>
                    </div>
                    <!--  address -->
                    
                    <div role="tabpanel" class="tab-pane" id="address-info">
                          <form class="info" action="editaccount.php?do=updateaddress" method="POST">
                            <div class="col-xs-12">
                                <?php if(isset($_SESSION['message-d-editaccount'])) { ?>
                                    <p class="alert alert-danger <?= isset($error) ? 'error' : '' ?>"> <?= $_SESSION['message-d-editaccount'] ?> </p>
                                <?php  unset($_SESSION['message-d-editaccount']); } ?>
                                <?php if(isset($_SESSION['message-s-editaccount'])) { ?>
                                    <p class="alert alert-success "> <?= $_SESSION['message-s-editaccount'] ?> </p>
                                <?php  unset($_SESSION['message-s-editaccount']); } ?>
                                <?php if(isset($_SESSION['message-w-editaccount'])) { ?>
                                    <p class="alert alert-warning"> <?= $_SESSION['message-w-editaccount'] ?> </p>
                                <?php  unset($_SESSION['message-w-editaccount']); } ?>
                            </div>
                            <div class="form-group">
                              <label for="country">Country</label>
                              <input class="form-control" id="country" name="country" disabled value="EGYPT" type="text" placeholder="Please Enter Country" />
                            </div>
                            <div class="form-group">
                                <label for="cityName">City Name</label>
                                <select id="cityName" class="form-control" name="city" required>
                                    <option disabled selected>Select City</option>
                                    <option  name="city"  > Cairo</option>
                                    <option  name="city"  > Gizeh</option>
                                    <option  name="city"  > Alexandria</option>
                                    <option  name="city"  > Port Said</option>
                                    <option  name="city"  > Suez</option>
                                    <option  name="city"  > Ismailia</option>
                                    <option  name="city"  > Qalyubiya</option>
                                    <option  name="city"  > Sharqia</option>
                                    <option  name="city"  > Monufia</option>
                                    <option  name="city"  > Gharbia</option>
                                    <option  name="city"  > Dakahlia</option>
                                    <option  name="city"  > Beheira</option>
                                    <option  name="city"  > Damietta</option>
                                    <option  name="city"  > Kafr el-Sheikh</option>
                                    <option  name="city"  > Asyut</option>
                                    <option  name="city"  > Sohag</option>
                                    <option  name="city"  > Minya</option>
                                    <option  name="city"  > Beni Suef</option>
                                    <option  name="city"  > Faiyum</option>
                                    <option  name="city"  > Qena</option>
                                    <option  name="city"  > Luxor</option>
                                    <option  name="city"  > Aswan</option>
                                    <option  name="city"  > Red Sea</option>
                                    <option  name="city"  > Matrouh</option>
                                    <option  name="city"  > South Sinai</option>
                                    <option  name="city"  > North Sinai</option>
                                    <option  name="city"  > Abu Simbel</option>
                                    <option  name="city"  > Marsa Alam</option>
                                    <option  name="city"  > Salloum</option>
                                    <option  name="city"  > Halayeb & shlateen</option>
                                </select>
                            </div>
                            <div class="form-group">
                              <label for="regionName">Region Name</label>
                              <input name="userid" value="<?= $info['userid'] ?>" type="hidden" />
                              <input class="form-control" id="regionName" name="region_name"  type="text" placeholder="Please Enter Region Name" required/>
                            </div>
                            <div class="form-group">
                              <label for="streetName">Street Name / Number</label>
                              <input class="form-control" id="streetName" name="street_name"  type="text" placeholder="Please Enter Street Name" required/>
                            </div>
                            <div class="form-group">
                              <label for="buildingNumber">Building Name / Number</label>
                              <input class="form-control" id="buildingNumber" name="building_name"  type="text" placeholder="Please Enter Building Number" required/>
                            </div>
                            <div class="form-group">
                              <label for="appartmentgNumber">Appartment Number</label>
                              <input class="form-control" id="appartmentNumber" name="appartment_number"  type="number" placeholder="Please Enter Appartment Number" required/>
                            </div>
                            <div class="form-group">
                              <label for="specialD">Notes</label>
                              <input class="form-control" id="specialD" name="Notes"  type="text" placeholder="Please Enter Special Delivery Info" required/>
                              <p class="help-block">Like : Super Market, Mosque etc...</p>
                            </div>
                            <div class="row">
                              <div class="col-xs-2">
                                  <button class="form-control btn btn-default" type="submit" name="submit">Save</button>
                              </div>
                            </div>
                            
                         </form>
                    </div>
                    
                </div>
            </section><!-- /#Product-Panel/.Well -->
        </div><!-- /.Container -->
        
<?php   } else {

         echo '<div class="alert alert-warning "> You Should Login -  <a href="login.php"> Login </a> </div>';
         header('Location: login-index.php');
         exit();
        } 
?>
        <!-- <div class="the-errors text-center">  -->
       
        <?php  
            // if (!empty($formError)) {
 
            //     foreach ($formError as $error) {
                    
            //         echo '<div class="msg error">' . $error . '</div>';
 
            //     }
            // }
 
            // if (isset ($succesMsg)) {
 
            //     echo '<div class="msg success">' . $succesMsg . '</div>' ;
            // }
       ?>
        <!-- </div> -->

<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>