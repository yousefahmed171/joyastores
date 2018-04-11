<?php
   
   ob_start();
    
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Add-Species';

       include 'init.php';
       
    
  $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

// If The Page Is Main Page 

if ($do == 'manage') {  //form + code 
    
        echo "<div class='container' >" ;
    
        $theMsg = ' <br><div class="alert alert-danger"> can\'t such here </div>';
    
        redirectHome($theMsg,'',0.50);
    
        echo "</div>";
    
    
} elseif ($do == 'add'){ //form
    
    echo 'Welcom You Are In edit Category Page' ;
    
} elseif ($do == 'insert'){ //code
    
         echo' <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> insert species</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>';
     
       $stmt2 = $con->prepare("SELECT COUNT('id_species')  FROM species  ");
 
       $stmt2->execute();


        $rows = $stmt2->fetchColumn();
       
         
     //  $row = $stmt2->rowCount();
      
      if($_SERVER['REQUEST_METHOD'] == 'POST') {

       $naen = $_POST['name_en'];
       $naar = $_POST['name_ar'];
       
       if($rows <= 4 ){
       $stmt = $con->prepare("INSERT INTO species(`name_en`,`name_ar`, `dataed`)
                                           VALUES(:znan, :znar,  now())");
       $stmt->execute(array(

           'znan' => $naen,
           'znar' => $naar
       ));
        
            
            echo '<div class="container">';
            $theMsg = "<div class='alert alert-success'>  success insert species  </div>";
            redirectPage($theMsg,'category.php' , 1 );
            echo '</div>';
           
        } else {
           
            echo '<div class="container">';
            $theMsg = "<div class='alert alert-danger'>  You Shold delete or edit species  </div>";
            redirecthome($theMsg,'category.php' , 1 );
            echo '</div>';
           
         }  
         
      }
                              
    
} elseif ($do == 'edit'){ //form 
    
    //Check If Get Request userid Is Numeric & Get The Integer Value of It 
        
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET["id"]) : 0;
        
     //Select All Data Depend On This ID
        
    $stmt = $con->prepare("SELECT * FROM species WHERE id_species = ?  ");  
         
     // Execute Query 
    $stmt->execute(array($id));
        
     //Fatch The data 
    $row = $stmt->fetch();
    
    //The row Count 
    $count = $stmt->rowCount();  

     // If There is such id show the form  
    if($count > 0 ) { // Page EDIT Member


?>
    
     <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> insert Species</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>

        <div class="container">
        <form action="?do=updeat" method="post">
        <input name="id"  type="hidden" value="<?php echo $id ?>" >    
        <th>English Name : <input name="name_en" class="form-control" type="text" placeholder="English Name"  value="<?php echo $row['name_en'] ?>" required></th>
        <th>Arabic Name  : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name"   value="<?php echo $row['name_ar'] ?>" required> <br></th>
        <th colspan="2"><input class="btn btn-success btn-block"type="submit" value="edit"/></th>
        </form> </div>

<?php 
     // If Ther is No such Id Else show Error Message
   } else {
        
        echo "<div class='container' >" ;
    
     //   $theMsg = ' <br><div class="alert alert-danger"> THeres No Such ID </div>';
    
      //  redirectHome($theMsg);
    
        echo "</div>";

  }
   
} elseif ($do == 'updeat'){ //code
    
    echo' <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> Updeat Species</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>';
       
    

      
      if($_SERVER['REQUEST_METHOD'] == 'POST') {
       
       $id   = $_POST['id'];
       $naen = $_POST['name_en'];
       $naar = $_POST['name_ar'];
       
          
       
           
           $stmt = $con->prepare("UPDATE species SET `name_en` = ?, `name_ar` = ?  WHERE `id_species` = ? "); 
          
           $stmt->execute(array($naen, $naar, $id));                                    


            echo '<div class="container">';

            $theMsg = "<div class='alert alert-success'>  success insert Species  </div>";
            redirectPage($theMsg,'category.php' , 1 );
            echo '</div>';
           
        
         
      }
    
    
    
} elseif ($do == 'delete'){ //code 
    
         echo' <section class="head-page-users">
            <article class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <header>
                            <h2><i class="fa fa-add"></i> DELETE Species</h2>
                       </header>    
                    </div>
                    
                </div>
                </br>
            </article>
        </section>';
     
    
     $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET["id"]) : 0;
       //Select All Data Depend On This ID
      //  $check = checkItem('id_species','species',$id);

        // If There is such id show the form  

        /*if($check > 0 ) {  */ 
            
           $stmt = $con->prepare("DELETE FROM species WHERE id_species = :zuser ");

           $stmt->bindParam("zuser" , $id); 

           $stmt->execute();
          
           echo '<div class="container">';

            $theMsg = "<div class='alert alert-danger'>  success Delete " .  $stmt->rowCount() . " species  </div>";
            redirectPage($theMsg,'category.php' , 1 );
            
            echo '</div>';
           
         
/*
        } else {
            
            echo '<div class="container">';
            
            $theMsg = "<div class='alert alert-danger'>This ID is NOt Exist  </div>"  ;

            redirecthome($theMsg);
            echo '</div>';
        }

      */
    
    
} else {
    
        echo '<div class="container">';
            
        $theMsg = "<div class='alert alert-danger'>Error There Is No Page With This Name  </div>"  ;

        redirecthome($theMsg);
        echo '</div>';
    
    
}
    

       include $tpl . 'footer.php';
        
       
    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

  ob_end_flush();
?>