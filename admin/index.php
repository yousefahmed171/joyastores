<?php
    ob_start(); 
    session_start();
    $nonavbar = '';
    $title = 'Joya - Index';
     //befor any thing check user 1
    if(isset($_SESSION['username'])){
       header('Location: dashboard.php'); 

       
    }

    include  'init.php';

     //check if user coming in form http or net 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
     
      $username = $_POST['username'];
      $password = $_POST['password'];
      $hashedpass = sha1($password);
    
      //check if th user exist in database 
    
      $stmt = $con->prepare("SELECT userid, username, password 
                           FROM users                            
                           WHERE username =? AND password =? AND groupid =1 LIMIT 1 ");
      $stmt->execute(array($username, $hashedpass));
      $row   = $stmt->fetch();
      $count = $stmt->rowCount();
        
        
       //check if count > 0 this mean the database record about user name 
      if($count > 0 ) {
          
        $_SESSION['username'] = $username ;
        $_SESSION['id'] = $row['userid']   ;
        header('Location: dashboard.php');
        
          
       }  
    
}   
  
   ?>  

        
        <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-sm-offset-3">
                        <header>
                            <h2><i class="fa fa-users"></i>&nbsp;&nbsp;Login</h2>
                        </header>    
                    </div>
                </div>
            </article>
        </section>
       <section class="container">
            <section class="row">
                <div class="col-xs-12 col-sm-6 col-sm-offset-3 search-result">
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <label for="inputName">User Name</label>
                            <input type="text" class="form-control" id="inputName" placeholder="User Name" name="username">
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>
                </div>
            </section>    
        </section>
    
   





   
      
<?php 
include $tpl  . 'footer.php';
ob_end_flush();
?>                          
        