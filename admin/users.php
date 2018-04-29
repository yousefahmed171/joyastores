<?php
   
    ob_start();
 
     session_start();

    if(isset($_SESSION['username'])){

        $title = 'Joya | Users';

        include 'init.php';
    
    $do = isset($_GET['do']) ? $_GET['do'] : 'manage'; 
       
    if($do == 'manage') {    
    
     
        $stmt = $con->prepare("SELECT * FROM users WHERE groupid != 1  ORDER BY username ASC");

        // execute the stamtent
        $stmt->execute();

        // assign to variable 
        $rows = $stmt->fetchALL();

?>

        <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-users"></i> Users</h2>
                            <div a-user>
                            <!-- <a href="users.php?do=edit">Edit</a> -->
                            <a href="users.php?do=add">Add</a>
                            <!-- <a href="users.php?do=delete">delete</a> -->
                            </div>
                        </header>    
                    </div>
                    
                </div>
            </article>
        </section>
        <br>

                
        
        <!-- <section class="container">
            <section class="search-result">
        <form>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" id="search" class="form-control input-lg" placeholder="Search Users" />
                    <div id="result"></div>
                    <a class="btn btn-lg btn-default input-group-addon"><i class="fa fa-search"></i></a>
                </div>
            </div>
        </form> -->
        
                
                <!-- <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <caption>Search Result</caption>
                        <thead>
                            <tr>
                                <th>N</th>
                                <th>ID</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Tel Number</th>
                                <th>Details &amp; Orders</th>
                            </tr>
                        </thead> -->
                   
                        <section class="container">
                            <div class="">
                            <table id="example" class="table table-striped table-bordered " cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>N</th>
                                            <th>User Name</th>
                                            <th>E-Mail</th>
                                            <th>Tel Phone</th>
                                            <th>Details</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>N</th>
                                            <th>User Name</th>
                                            <th>E-Mail</th>
                                            <th>Tel Phone</th>
                                            <th>Details</th>
                                        </tr>
                                    </tfoot>
                        <?php
                            foreach($rows as $row){
                                echo '<tbody>';
                                    echo '<tr>';   
                                        static $s = 1 ; 
                                        echo '<td>' .  $s++ . '</td>';                
                                        echo '<td> ' . $row['username'] . '</td>';
                                        echo '<td> ' . $row['email'] . '</td>';
                                        echo '<td> ' . $row['phone'] . '</td>';
                                        echo '<td><a href="user-details.php?userid='.$row['userid'].'" class="btn btn-info btn-block" ><i class="fa fa-info-circle"></i> More Info</a></td>';
                            }?>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                        </section>

                <!-- <nav aria-label="Page navigation" class="text-center page-nav-user">
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
        </section> -->
<?php     
     } elseif ($do == 'add'){ //form 
 ?>   
         <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Add New Users</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>
       
         <div class="container">
            <section id="sign-up" class="well">
                <form class="form-horizontal" action="?do=insert" method="post">
                    <header>
                        <h3>Basic information</h3>
                    </header>
                    <div class="form-group has-success has-feedback">
                        <label for="fullName">User Name</label>
                        <input type="text"  name="username" class="form-control" id="fullName" placeholder="Please Enter Full Name" required aria-describedby="inputSuccess">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label for="fullName">Full Name</label>
                        <input type="text"  name="fullname" class="form-control" id="fullName" placeholder="Please Enter Full Name" required aria-describedby="inputSuccess">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group has-warning has-feedback">
                        <label for="telNumber">Tel Number</label>
                        <input type="tel" name="phone" class="form-control" id="telNumber" placeholder="Please Enter Telephone Number" required aria-describedby="inputWarning">
                        <span class="help-block"> - Please enter your telephone number, we will call you on it.</span>
                        <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                        <span id="inputWarning" class="sr-only">(warning)</span>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label for="Email1">Email address</label>
                        <input type="email" name="email" class="form-control" id="Email1" placeholder="Please Enter Email" required aria-describedby="inputError">
                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                        <span id="inputError" class="sr-only">(error)</span>
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="day" class="form-control" placeholder="Day" min="1" max="31">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="month" class="form-control" placeholder="Month" min="1" max="12">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="yaer" class="form-control" placeholder="Year" min="1920" max="2017">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender1">Gender</label>
                        <select  name="gender" id="gender1" class="form-control" required>
                            <option disabled selected value="0">Select Gender</option>
                            <option value="1">male</option>
                            <option value="2">Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Password1">Password</label>
                        <input type="password"  name="password" class="form-control" id="password1" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword1">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword1" placeholder="Password" >
                    </div>
                    <div class="checkbox">
                        <input id="AcheckboxRobot" type="checkbox">
                        <label for="AcheckboxRobot">Check If You Are Not A Robot.</label>
                    </div>
                    
                    <input type="submit" class="btn btn-default" value="Submit" >
                </form>
            </section><!-- /#Product-Panel/.Well -->
        </div><!-- /.Container -->
     
          
       
<?php
    } elseif ($do == 'insert'){ //code

             
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        
          echo '<h1 class="text-center"> Insert Users  </h1>'  ; 
          echo "<div class='container'>" ; 
        
         // GET Variables Form The Form 
      
         $user    = $_POST['username'];
         $name    = $_POST['fullname'];
         $phone   = $_POST['phone'];
         $email   = $_POST['email'];
         $yaer    = $_POST['yaer'];
         $month   = $_POST['month'];
         $day     = $_POST['day'];
         $pass    = $_POST['password'];
         $gender  = $_POST['gender'];
         
        $hashpass = sha1($_POST['password']);
            
            // Validate The Form 
            
           $formerrors = array();

           if (strlen($user) < 4 ){
            
            $formerrors[] =    ' sername Cant Be less than  <strong> 4 char </strong> ';
            
            }
            if (strlen($user) > 20 ){
                
                $formerrors[] = ' username Cant Be more than <strong> 20 char </strong>';
                
                }

           if (empty($user)) {
                
                $formerrors[] = ' username Cant Be Empty <strong> Empty </strong> ';
                
            
            }
        
            if (empty($pass)) {
                
                $formerrors[] = ' password Cant Be Empty <strong> Empty </strong> ';
                
            
            }
            if (empty($email)) {
                
                $formerrors[] = 'email Cant Be Empty <strong> Empty </strong> ';
                
            }

            if (empty($name)) {
                
                $formerrors[] = ' name Cant Be Empty <strong> Empty </strong> ';
                
            }
               // loop into errors array and echo it 
            foreach($formerrors as $error){

                echo '<div class="alert alert-danger">' . $error . '</div>';
            }
        
        // Check if There's No Error Proceed The Update Operation 
        
        if (empty($formerrors)){
        //Check If User exist in databse
        
                $check = checkItem("username", "users", $user);
        
                    if ($check == 1 ) {
                       // echo 'Sorry This User Is exist ';
                        $theMsg = "<div class='alert alert-success'> Sorry This User Is exist  </div>";
                        redirecthome($theMsg, "back" , 3 );
                    } else {
                        //  echo 'good This User Is not exist ';
          
                        // Insert UserInfo  In database
                        $stmt = $con->prepare ("
                                                INSERT INTO `users`(`username`, `lastlname`, `birth-yaer`, `birth-month`, `birth-day`, `password`,  `email`, `phone`, `regstatus`,`gender`) 
                                                            VALUES (:user,:name,:yaer,:month,:day,:pass, :email, :phone, 1 ,:gender) ");
                        
                        $stmt->execute(array(
                             'user'   => $user ,   
                             'name'   => $name ,  
                             'yaer'   => $yaer ,
                             'month'  => $month,   
                             'day'    => $day  ,  
                             'pass'   => $hashpass  , 
                             'email'  => $email ,  
                             'phone'  => $phone ,
                             'gender' => $gender
                        
                        ));
                        
                       
                      
                        //Echo Success Message 
                        echo "<div class='alert alert-success'>" .  $stmt->rowCount() . 'Record Insert </div>'  ;
                        $theMsg = "<div class='alert alert-success'> Hi Mr  . $user .  insert new member  </div>";
                        redirecthome($theMsg,'back' , 3 );
                   }
        }
        
    } else {
        
        $theMsg = "<div class='alert alert-danger'> Sorry You Cant Browse This Page Directly  </div>" ;

        redirecthome($theMsg,'back' , 3 );
    } 
         
        
       echo "</div>";

    } elseif ($do == 'edit'){ //form

 
    //Check If Get Request userid Is Numeric & Get The Integer Value of It 
        
    $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET["userid"]) : 0;
        
     //Select All Data Depend On This ID
        
    $stmt = $con->prepare("SELECT * FROM users WHERE userid = ? LIMIT 1 ");  
         
     // Execute Query 
    $stmt->execute(array($userid));
        
     //Fatch The data 
    $row = $stmt->fetch();
    
    //The row Count 
    $count = $stmt->rowCount();  

     // If There is such id show the form  
    if($stmt->rowCount() > 0 ) { // Page EDIT Member
?>
    
         <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Edit Users</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>
       
         <div class="container">
            <section id="sign-up" class="well">
                <form class="form-horizontal" action="?do=update" method="post">
                <input type="hidden" name="userid" value="<?php echo $userid ?>" />  
                    <header>
                        <h3>Basic information</h3>
                    </header>
                    <div class="form-group has-success has-feedback">
                        <label for="fullName">User Name</label>
                        <input type="text"  name="username" class="form-control" id="fullName" placeholder="Please Enter Full Name" Value="<?php echo $row['username'];  ?>" required aria-describedby="inputSuccess">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group has-success has-feedback">
                        <label for="fullName">Full Name</label>
                        <input type="text"  name="fullname" class="form-control" id="fullName" placeholder="Please Enter Full Name" Value="<?php echo $row['fullname'];  ?>" required aria-describedby="inputSuccess">
                        <span class="glyphicon glyphicon-ok form-control-feedback" aria-hidden="true"></span>
                        <span id="inputSuccess" class="sr-only">(success)</span>
                    </div>
                    <div class="form-group has-warning has-feedback">
                        <label for="telNumber">Tel Number</label>
                        <input type="tel" name="phone" class="form-control" id="telNumber" placeholder="Please Enter Telephone Number" Value="<?php echo $row['phone'];  ?>" required aria-describedby="inputWarning">
                        <span class="help-block"> - Please enter your telephone number, we will call you on it.</span>
                        <span class="glyphicon glyphicon-warning-sign form-control-feedback" aria-hidden="true"></span>
                        <span id="inputWarning" class="sr-only">(warning)</span>
                    </div>
                    <div class="form-group has-error has-feedback">
                        <label for="Email1">Email address</label>
                        <input type="email" name="email" class="form-control" id="Email1" placeholder="Please Enter Email"  Value="<?php echo $row['email'];  ?>" required aria-describedby="inputError">
                        <span class="glyphicon glyphicon-remove form-control-feedback" aria-hidden="true"></span>
                        <span id="inputError" class="sr-only">(error)</span>
                    </div>
                    <div class="form-group">
                        <label>Birthdate</label>
                        <div class="row">
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="day" class="form-control" Value="<?php echo $row['birth-day'];  ?>"  placeholder="Day" min="1" max="31">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="month" class="form-control" Value="<?php echo $row['birth-month'];  ?>" placeholder="Month" min="1" max="12">
                          </div>
                          <div class="col-xs-12 col-sm-4">
                            <input type="number" name="yaer" class="form-control" Value="<?php echo $row['birth-yaer'];  ?>"  placeholder="Year" min="1920" max="2017">
                          </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="gender1">Gender</label>
                        <select name="gender" id="gender1" class="form-control" required>
                          
                            <option value="1"   <?php if ($row['gender'] == 1 ) { echo 'selected'; }    ?>> Male</option>
                            <option value="2" <?php if ($row['gender'] == 2 ) { echo 'selected'; }  ?>> Female</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Password1">Password</label>
                        <input type="password"  name="password" class="form-control" id="password1" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label for="confirmPassword1">Confirm password</label>
                        <input type="password" class="form-control" id="confirmPassword1" placeholder="Password" >
                    </div>
                    <div class="checkbox">
                        <input id="AcheckboxRobot" type="checkbox">
                        <label for="AcheckboxRobot">Check If You Are Not A Robot.</label>
                    </div>
                    
                    <input type="submit" class="btn btn-default" value="Submit" >
                </form>
            </section><!-- /#Product-Panel/.Well -->
        </div><!-- /.Container -->
     
 <?php  
 
        // If Ther is No such Id Else show Error Message
 } else {
        
        echo "<div class='container' >" ;
    
        $theMsg = ' <br><div class="alert alert-danger"> THeres No Such ID </div>';
    
        redirectHome($theMsg);
    
        echo "</div>";

    }


    } elseif ($do == 'update'){ //code
         
      echo'    <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Update Users</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section> ';

   echo "<div class='container'>" ; 
        
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
        
         // GET Variables Form The Form 
         $id      = $_POST['userid'];
         $user    = $_POST['username'];
         $name    = $_POST['fullname'];
         $phone   = $_POST['phone'];
         $email   = $_POST['email'];
         $yaer    = $_POST['yaer'];
         $month   = $_POST['month'];
         $day     = $_POST['day'];
         $pass    = $_POST['password'];
         $gender  = $_POST['gender'];
        
         // password Trick 
            
        
            
            // Validate The Form 
            
           $formerrors = array();

           if (strlen($user) < 4 ){
            
            $formerrors[] =    ' sername Cant Be less than  <strong> 4 char </strong> ';
            
            }
            if (strlen($user) > 20 ){
                
                $formerrors[] = ' username Cant Be more than <strong> 20 char </strong>';
                
                }

           if (empty($user)) {
                
                $formerrors[] = ' username Cant Be Empty <strong> Empty </strong> ';
                
            
            }
            
            if (empty($email)) {
                
                $formerrors[] = 'email Cant Be Empty <strong> Empty </strong> ';
                
            }

            if (empty($name)) {
                
                $formerrors[] = ' name Cant Be Empty <strong> Empty </strong> ';
                
            }
               // loop into errors array and echo it 
            foreach($formerrors as $error){

                echo '<div class="alert alert-danger">' . $error . '</div>';
            }
        
        // Check if There's No Error Proceed The Update Operation 
        
        if (empty($formerrors)){
        
        // Update THe Database With This Info 
        $stmt = $con->prepare("UPDATE users SET `username` = ?, `fullname` = ?, `birth-yaer` = ?, `birth-month` = ?, `birth-day` = ?, `password` = ?, `email` = ?, `phone` = ?, `gender` = ? WHERE userid = ?");
        $stmt->execute(array($user, $name, $yaer, $month, $day, $pass, $email, $phone, $gender, $id ));
                     
                  
        //Echo Success Message 
        $theMsg = "<div class='alert alert-success'>" .  $stmt->rowCount() . 'Record Update </div>'  ;

        redirecthome($theMsg,'',1 );
        
        }
        
    } else {
        
         echo "<div class='container' >" ;
    
        $theMsg = ' <br><div class="alert alert-danger"> THeres No Such ID </div>';
    
        redirectHome($theMsg);
    
        echo "</div>";
    } 
        
    echo "</div>";

    } elseif ($do == 'delete'){ //code 

         echo' <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Delete Users</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>';
    echo "<div class='container'>" ;  

        //Check If Get Request userid Is Numeric & Get The Integer Value of It 
                
        $userid = isset($_GET['userid']) && is_numeric($_GET['userid']) ? intval($_GET["userid"]) : 0;
            
   
            
        //$stmt = $con->prepare("SELECT * FROM users WHERE userid = ? LIMIT 1 "); 
            // Execute Query
        //  $stmt->execute(array($userid));
           //The row Count 
        //$count = $stmt->rowCount();
          //$stmt->rowCount()

       //Select All Data Depend On This ID
        $check = checkItem('userid','users',$userid);

        // If There is such id show the form  

        if($check > 0 ) {   
            
           $stmt = $con->prepare("DELETE FROM users WHERE userid = :zuser ");

           $stmt->bindParam(":zuser" , $userid); 

           $stmt->execute();

           
           $theMsg = "<div class='alert alert-success'>" .  $stmt->rowCount() . 'Delete </div>'  ;
           redirecthome($theMsg);

        } else {

              echo "<div class='container' >" ;
    
        $theMsg = ' <br><div class="alert alert-danger"> THeres No Such ID </div>';
    
        redirectHome($theMsg);
    
        echo "</div>";
        }

       echo '</div>';

    } elseif ($do == 'activate'){ //code

        echo 'Welcom You Are In stats Category Page' ;

    } else {
         
        echo "<div class='container' >" ;
    
        $theMsg = ' <br><div class="alert alert-danger"> Error There Is No Page With This Name </div>';
    
        redirectHome($theMsg);
    
        echo "</div>";
    
    }


       
      
       include $tpl . 'footer.php';
    echo "<script>
    
      $(document).ready(function (){

          $('#search').keyup(function (){
              var char = $(this).val();
		  
		  //ajax
		  // property:value
		 
		  if(char ==''){
			  $('#result').html('');
			  return false;
		  }
		  $.ajax({
			  url:'search.php' ,
			  type:'GET',
			  data:'c=' + char ,
			 // result
			 success: function(result){
				   $('#result').html(result);
				  }
			  });
		  
		  });
	  
	  });
  
  
</script> ";
echo "<script>
$(document).ready(function() {
   $('#example').DataTable();
} );
</script>";
       
    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

  ob_end_flush();
?>
