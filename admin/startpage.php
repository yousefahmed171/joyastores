<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
  
    
   
       
       
       
       
       
       
       
       
       
       include $tpl . 'footer.php';
        
       
    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

  ob_end_flush();
?>




$cpassword = $_POST['cpassword'];
if($password == $capssword){

...... Your rest of the code

}


<?php

/*
  
  categories => [manage | edit | update | add | insert | delete | stats]
  
*/
/*
   if condition ? TRUE : FALSE 
     $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

     $do = ''; 
     if (isset($_GET['do'])) {
         $do = $_GET['do'];
     } else {
     $do = 'manage';
     }
*/

/*$do = isset($_GET['do']) ? $_GET['do'] : 'manage';

// If The Page Is Main Page 

if ($do == 'manage') {  //form + code 
    
    echo 'Welcom You Are In Manage Category Page' ;
    echo '<a href="page.php?do=add" > Add New Category + </a>';
    
} elseif ($do == 'edit'){ //form
    
    echo 'Welcom You Are In edit Category Page' ;
    
} elseif ($do == 'update'){ //code
    
    echo 'Welcom You Are In update Category Page' ;
    
} elseif ($do == 'add'){ //form
    
    echo 'Welcom You Are In add Category Page' ;
    
} elseif ($do == 'insert'){ //code
    
    echo 'Welcom You Are In insert Category Page' ;
    
} elseif ($do == 'delete'){ //code 
    
    echo 'Welcom You Are In delete Category Page' ;
    
} elseif ($do == 'activate'){ //code
    
    echo 'Welcom You Are In stats Category Page' ;
    
} else {
    
    echo 'Error There Is No Page With This Name ';
}*/



