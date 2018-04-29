<?php
 ob_start();  
 session_start();

 $title = 'Joya Stores | login';
    if(isset($_SESSION['user'])) {
        header('Location: index.php');
    }
 include 'init.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        if (isset($_POST['login'])) {

            $user = $_POST['username'];
            $pass = $_POST['password'];
            $hashedpass = sha1($pass);

            //check if the user exist in database 

            $stmt = $con->prepare("SELECT  `username`, `password` FROM `users` WHERE `username` = ? AND `password` = ?  ");
            $stmt->execute(array($user,$hashedpass));
            $count = $stmt->rowCount();
            
            if ($count > 0) {

            $_SESSION['user'] = $user;
            
            header('Location: index.php');
            exit();
            }
        } else {

            $username   = $_POST['username'];
            $pass1      = $_POST['password'];
            $pass2      = $_POST['password2'];
            $email      = $_POST['email'];
        
            $formErrors = array();

            if (isset($username)) {

                $filterUser  = filter_var($username , FILTER_SANITIZE_STRING) ;

                if (strlen($filterUser) < 4  ) {

                    $formErrors[] = 'Username Must Be  Larger Than 4 Characters';
                }
            }
            
            if (isset($pass1) && isset($pass2)) {

                if (empty($pass1)) {

                    $formErrors[] =  'Sorry Password Cant Be Empty ';
                }

                if (sha1($pass1) !== sha1($pass2)) {

                    $formErrors[] = 'Sorry Password Is Not Match';

                }

            }

            if (isset($email)) {

                $filterEmail  = filter_var($email , FILTER_SANITIZE_EMAIL) ;

                if (filter_var($filterEmail , FILTER_VALIDATE_EMAIL ) != true) {

                    $formErrors[] = 'This Email Is No\'t Vaild';
                }
            }
            
            // Check if There's No Error Proceed The User Add 

            if (empty($formErrors)){

                //Check If User exist in databse
            
                $check = checkItem("username", "users", $username);
    
                if ($check == 1 ) {
                    
                    $formErrors[] = 'Sorry This User Is exitsis';
                    
                } else {
                
                    // Insert UserInfo  In database
                    
                    $stmt = $con->prepare("INSERT INTO 
                                        users(username, password, email,  regstatus, created) 
                                        VALUES(:zuser, :zpass, :zemail,  0, now()) ");
                    $stmt->execute(array(
                        
                        'zuser'  => $username,
                        'zpass'  => sha1($pass1),
                        'zemail' => $email
                        
                    ));
                    
                    //Echo Success Message 
                    $succesMsg = 'Congrats You Are Now Register User ';

                }

            }
        }
    }
?>   

    <div class="container-fluid">
        <div class="row"> 
            <?php  
                if (!empty($formErrors)) {

                    foreach ($formErrors as $error) {
                    
                        echo '<div class="alert alert-danger">' . $error . '</div>';
                    }
                }

                if (isset($succesMsg)) {

                    echo '<div class="alert alert-success">' . $succesMsg . '</div>' ;
                }
            ?>
        </div>
    </div>

    <div class="container">
        <div class="row reg-modal">
            <div class="col-md-6 col-md-offset-3 col-xs-12">
            <div class="login-tabs">
                <ul class="nav nav-tabs text-center" role="tablist">
                <li class="active" role="presentation"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                <li role="presentation"><a href="#signup" aria-controls="signup" role="tab" data-toggle="tab">Sign Up</a></li>
                </ul>
                <div class="tab-content">
                <div class="tab-pane fade in active" id="login" role="tabpanel"><img class="img-responsive center-block" src="img/logo.png" alt="Joya Stores Logo" title="Joya Stores Logo"/>
                    <h4 class="text-center">Welcome To Joya Stores</h4>
                    <p class="text-center">Sign into your account here:</p>
                    <form class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        <label for="useremail">User Name</label>
                        <input class="form-control injs" id="useremail" type="text" name="username" placeholder="Enter Your User Name "/>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input class="form-control injs" id="password" type="password" name="password" placeholder="Enter Your Password" autocomplete="off"/>
                    </div>
                    <input class="btn btn-primary btn-block sb-btn" name="login" type="submit" value="Login"/>
                    </form> <!--<a class="btn btn-link" href="#">Forgotten password?</a>-->
                    <!-- <div class="row text-center">
                    <p class="bord-r-l">Or login with</p> 
                    <div class="col-xs-6"><a class="btn btn-danger btn-block" href="#"><i class="fa fa-1x fa-google">   Google</i></a></d
                    <div class="col-xs-6"><a class="btn btn-primary btn-block" href="#"><i class="fa fa-1x fa-facebook-official">   Facebook</i></a></div> 
                    </div> -->
                </div>
                 <!-- End Login Form  -->
                 <!-- Start Signup Form -->
                <div class="tab-pane fade" id="signup" role="tabpanel"><img class="img-responsive center-block" src="img/logo.png" alt="Joya Stores Logo" title="Joya Stores Logo"/>
                    <h4 class="text-center"> Welcome To Joya Stores</h4>
                    <p class="text-center">  Create New Account Her:</p>
                    <form class="signup" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <div class="form-group">
                        <label for="usernameu">Username</label>
                        <input class="form-control injs" id="usernameu" type="text" name="username" placeholder="Enter Username" />
                    </div>
                    <div class="form-group">
                        <label for="useremailu">E-mail Address</label>
                        <input class="form-control injs" id="useremailu" type="email" name="email" placeholder="Enter E-mail" />
                    </div>
                    <div class="form-group">
                        <label for="passwordu">password</label>
                        <input class="form-control injs" id="passwordu" type="password" name="password" placeholder="Enter Password" autocomplete="off"/>
                    </div>
                    <div class="form-group">
                        <label for="passwordu2">Confirm password</label>
                        <input class="form-control injs" id="passwordu2" type="password" name="password2" placeholder="Confirm Password" autocomplete="off"/>
                    </div>
                    <input class="btn btn-primary btn-block sb-btn" name="Craete-Account" type="submit" value="Craete Account"/>
                    </form>
                    <!-- <div class="row text-center">
                    <p class="bord-r-l">Or Signup with</p>
                    <div class="col-xs-6"><a class="btn btn-danger btn-block" href="#"><i class="fa fa-1x fa-google">   Google</i></a></div>
                    <div class="col-xs-6"><a class="btn btn-primary btn-block" href="#"><i class="fa fa-1x fa-facebook-official">   Facebook</i></a></div>
                    </div> -->
                </div>
            </div>
            </div>
        </div>
    </div>
</div>


<?php
    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>