<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
       
  
    
   
?>     

      <section class="head-page-dashboard">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="material-icons">dashboard</i>&nbsp;&nbsp;Dashboard</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
        <section class="container">
            <article id="dashboard">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <section class="visitors">
                            <header>
                                <h5>Visitors</h5>
                            </header>
                            <article>
                                <ul class="list-unstyled list-inline">
                                    <li><i class="material-icons">face</i></li>
                                    <li>256</li>
                                    <li><i class="material-icons">trending_up</i></li>
                                </ul>
                                <p>5&#37; Growth Rate</p>
                            </article>
                            <button><i class="material-icons">add_circle</i></button>
                        </section>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <section class="new-acc">
                            <header>
                                <h5> Accounts</h5>
                            </header>
                            <article>
                                <ul class="list-unstyled list-inline">
                                    <li><i class="material-icons">account_circle</i></li>
                                    <li><span> <a href="users.php"> <?php echo countItems('userid ',' users') ?> </a></span></li>
                                    <li><i class="material-icons">trending_down</i></li>
                                </ul>
                                <p>9&#37; Decrease Rate</p>
                            </article>
                            <button><i class="material-icons">add_circle</i></button>
                        </section>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <section class="reve">
                            <header>
                                <h5>Revenue</h5>
                            </header>
                            <article>
                                <ul class="list-unstyled list-inline">
                                    <li><i class="material-icons">swap_vert</i></li>
                                    <li>465</li>
                                    <li><i class="material-icons">trending_up</i></li>
                                </ul>
                                <p>2,5&#37; Growth Rate</p>
                            </article>
                            <button><i class="material-icons">add_circle</i></button>
                        </section>
                    </div>
                    
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <section class="sold">
                            <header>
                                <h5>Items Sold</h5>
                            </header>
                            <article>
                                <ul class="list-unstyled list-inline">
                                    <li><i class="material-icons">add_shopping_cart</i></li>
                                    <li>986</li>
                                    <li><i class="material-icons">trending_up</i></li>
                                </ul>
                                <p>7&#37; Growth Rate</p>
                            </article>
                            <button><i class="material-icons">add_circle</i></button>
                        </section>
                    </div>
                </div><!-- /.Row -->
            </article><!-- /#Pro-Add -->
        </section><!-- /.Container -->
       
       
       
       
       
       
       
       
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

