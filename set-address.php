<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>          
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Create Account</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="sign-up" class="well">
                <form>
                    <header>
                        <h3>Address Information <small>Please Fill your Address Info</small></h3>
                    </header>
                    <div class="form-group">
                        <label for="streetName">Street Name</label>
                        <input type="text" class="form-control" id="streetName" placeholder="Please Enter Street Name" required>
                    </div>
                    <div class="form-group">
                        <label for="buildingNumber">Building Number</label>
                        <input type="number" class="form-control" id="buildingNumber" placeholder="Please Enter Building Number" required>
                    </div>
                    <div class="form-group">
                        <label for="appartmentNumber">Appartment Number</label>
                        <input type="number" class="form-control" id="appartmentNumber" placeholder="Please Enter Appartment Number" required>
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
                    <a href="#" type="submit" class="btn btn-default">Save</a>
                </form>
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