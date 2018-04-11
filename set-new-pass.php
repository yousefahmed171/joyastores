<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores';

 include 'init.php';
?>  
       
        <section class="container">
            <div class="well well-top text-center">
                <header>
                    <h2>Set New Password</h2>
                </header>
            </div>
        </section>
        
        <div class="container">
            <section id="new-pass" class="well">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">New Password</h3>
                            </div>
                            <div class="panel-body">
                                <form>
                                    <div class="form-group">
                                        <label for="oldPass">Old Password</label>
                                        <input type="password" class="form-control" id="oldPass" placeholder="Old Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="newPass">New Password</label>
                                        <input type="password" class="form-control" id="newPass" placeholder="New Password">
                                    </div>
                                    <div class="form-group">
                                        <label for="conPass">Confirm New Password</label>
                                        <input type="password" class="form-control" id="conPass" placeholder="Confirm New Password">
                                    </div>
                                    <div class="checkbox">
                                        <input id="setKeep" type="checkbox"> 
                                        <label for="setKeep">Keep me login</label>
                                    </div>
                                    <input type="submit" value="Submit" class="btn btn-default">
                                </form>
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

<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>