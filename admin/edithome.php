<?php
   
   ob_start();
 
   session_start();

   if(isset($_SESSION['username'])){

        $title = 'Joya - Edithome';

        include 'init.php';
      
         
        $do = isset($_GET['do']) ? $_GET['do'] : 'manage';
  
        // If The Page Is Main Page 

        if ($do == 'manage') {  //form + code 
            
            echo 'Welcom You Are In Manage Category Page' ;
            echo '<a href="page.php?do=add" > Add New Category + </a>';
            
        } elseif ($do == 'imgsliderinsert'){ //form
            
            

            if($_SERVER['REQUEST_METHOD'] == 'POST') {    // Check In Form 

                // Uploade File img Pc englsh 1 
                $pimgenName    = $_FILES['pimg_en']['name'];
                $pimgenSize    = $_FILES['pimg_en']['size'];
                $pimgenTmp     = $_FILES['pimg_en']['tmp_name'];
                $pimgenType    = $_FILES['pimg_en']['type'];

                //List Of allowed File Typed To Upload 

                $pimgenAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $pimgenExtension = strtolower(end(explode(".", $pimgenName)));


                // Uploade File img Pc arabic
                $pimgarName    = $_FILES['pimg_ar']['name'];
                $pimgarSize    = $_FILES['pimg_ar']['size'];
                $pimgarTmp     = $_FILES['pimg_ar']['tmp_name'];
                $pimgarType    = $_FILES['pimg_ar']['type'];

                //List Of allowed File Typed To Upload 

                $pimgarAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $pimgarExtension = strtolower(end(explode(".", $pimgarName)));

                // Uploade File img mobile englsh
                $mpimgenName    = $_FILES['mimg_en']['name'];
                $mpimgenSize    = $_FILES['mimg_en']['size'];
                $mpimgenTmp     = $_FILES['mimg_en']['tmp_name'];
                $mpimgenType    = $_FILES['mimg_en']['type'];

                //List Of allowed File Typed To Upload 

                $mpimgeAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $mpimgeExtension = strtolower(end(explode(".", $mpimgenName)));    


                // Uploade File img mobile arabic
                $mpimgarName    = $_FILES['mimg_ar']['name'];
                $mpimgarSize    = $_FILES['mimg_ar']['size'];
                $mpimgarTmp     = $_FILES['mimg_ar']['tmp_name'];
                $mpimgarType    = $_FILES['mimg_ar']['type'];

                //List Of allowed File Typed To Upload 

                $mpimgarAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $mpimgarExtension = strtolower(end(explode(".", $mpimgarName)));


                // Get From Form 
                $nameslider = $_POST['nameslider'];
                $linkslider = $_POST['linkslider'];

                // Error Validetion
                $formerrors = array(); 

                // Pc englsh
                if( ! empty($pimgenName) && ! in_array($pimgenExtension,$pimgenAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($pimgenName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($pimgenSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }
                // Pc arabic
                if( ! empty($pimgarName) && ! in_array($pimgarExtension,$pimgarAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($pimgarName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($pimgarSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }
                // mobile englsh
                if( ! empty($mpimgenName) && ! in_array($mpimgeExtension,$mpimgeAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($mpimgenName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($mpimgenSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }
                // mobile arabic
                if( ! empty($mpimgarName) && ! in_array($mpimgarExtension,$mpimgarAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($mpimgarName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($mpimgarSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }
        
                foreach($formerrors as $error){

                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }

                if (empty($formerrors)){

                    // Pc englsh 
                    $pimgenNameData = rand(0 , 100000000) . '_' . $pimgenName ;
                    move_uploaded_file($pimgenTmp , "uploades\home-scren\\" . $pimgenNameData);

                    // Pc arabic
                    $pimgarNameData = rand(0 , 100000000) . '_' . $pimgarName ;
                    move_uploaded_file($pimgarTmp , "uploades\home-scren\\" . $pimgarNameData);

                    // mobile englsh
                    $mpimgenNameData = rand(0 , 100000000) . '_' . $mpimgenName ;
                    move_uploaded_file($mpimgenTmp , "uploades\home-scren\\" . $mpimgenNameData);

                    // mobile arabic
                    $mpimgarNameData = rand(0 , 100000000) . '_' . $mpimgarName ;
                    move_uploaded_file($mpimgarTmp , "uploades\home-scren\\" . $mpimgarNameData);

                    // Check if row count > 1 not add 
                    $stmt = $con->prepare("SELECT * FROM `main-slider`");
                    $stmt->execute();
                    $count = $stmt->rowCount();

                        if($count <= 1 ) {

                            $stmt = $con->prepare("INSERT INTO `main-slider`(`pimg_en`, `pimg_ar`, `mimg_en`, `mimg_ar`, `nameslider`, `linkslider`)
                                                            VALUES(:zpimgen, :zpimgar, :zmimgen, :zmimgar, :znameslider, :zlinkslider)");
                            $stmt->execute(array(
                                                    
                                                    'zpimgen'       =>  $pimgenNameData,
                                                    'zpimgar'       =>  $pimgarNameData,
                                                    'zmimgen'       =>  $mpimgenNameData,
                                                    'zmimgar'       =>  $mpimgarNameData,
                                                    'znameslider'   =>  $nameslider,
                                                    'zlinkslider'   =>  $linkslider
                            
                            ));

                                echo '<div class="container">';
                                    $theMsg = "<div class='alert alert-success'>  Insert New Main Slider  </div>";
                                    redirectPage($theMsg,'edit-home.php' , 1 );
                                echo '</div>';

                        } else {

                                echo '<div class="container">';
                                    $theMsg = "<div class='alert alert-danger'>  You Should Delete Row Old Pefore Add New Slide .  </div>";
                                    redirectPage($theMsg,'edit-home.php' , 1 );
                                echo '</div>';

                        }
                }
            }

        } elseif ($do == 'imgsliderdelete'){ //code
            
            echo 'Welcom You Are In imgsliderdelete Page' ;

            // Check Get id 
            $id = isset($_GET['id']) && is_numeric($_GET['id']) ? intval($_GET["id"]) : 0;

            $check = checkItem('id','`main-slider`',$id);

            if($check > 0) {
                $stmt = $con->prepare("DELETE FROM `main-slider` WHERE id = :zid ");
                $stmt->bindparam('zid', $id);
                $stmt->execute();

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  Delete One Main Slider  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';

            } else {

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  This ID is NOt Exist  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';

            }

        } elseif ($do == 'insertstiker'){ //form
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {    // Check In Form 

                // Uploade File img Pc englsh 1 
                $imgenName    = $_FILES['img_en']['name'];
                $imgenSize    = $_FILES['img_en']['size'];
                $imgenTmp     = $_FILES['img_en']['tmp_name'];
                $imgentype    = $_FILES['img_en']['type'];

                //List Of allowed File Typed To Upload 

                $imgenAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $imgenExtension = strtolower(end(explode(".", $imgenName)));


                // Uploade File img Pc arabic
                $imgarName    = $_FILES['img_ar']['name'];
                $imgarSize    = $_FILES['img_ar']['size'];
                $imgarTmp     = $_FILES['img_ar']['tmp_name'];
                $imgarType    = $_FILES['img_ar']['type'];

                //List Of allowed File Typed To Upload 

                $imgarAllowedExtension = array("jpeg", "jpg", "png","gif");

                //Get Images Extension 

                $imgarExtension = strtolower(end(explode(".", $imgarName)));



                // Get From Form 
                $name       = $_POST['name'];
                $link       = $_POST['link'];
                $select     = $_POST['select'];

                // Error Validetion
                $formerrors = array(); 

                // Pc englsh
                if( ! empty($imgenName) && ! in_array($imgenExtension,$imgenAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($imgenName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($imgenSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }
                // Pc arabic
                if( ! empty($imgarName) && ! in_array($imgarExtension,$imgarAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if (empty($imgarName)) {
                    $formerrors[] = 'Images Is  <strong> Required </strong>';
                }
                if ($imgarSize > 4194304){
                    $formerrors[] = 'Images Can\'t Be Larger   <strong> 4MB </strong>';
                }

                foreach($formerrors as $error){

                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }

                if (empty($formerrors)){

                    // Pc englsh 
                    $imgenNameData = rand(0 , 100000000) . '_' . $imgenName ;
                    move_uploaded_file($imgenTmp , "uploades\home-scren\\" . $imgenNameData);

                    // Pc arabic
                    $imgarNameData = rand(0 , 100000000) . '_' . $imgarName ;
                    move_uploaded_file($imgarTmp , "uploades\home-scren\\" . $imgarNameData);


                    // Check if row count > 1 not add 
                    $stmt = $con->prepare("SELECT * FROM `stikers`");
                    $stmt->execute();
                    $count = $stmt->rowCount();

                        if($count <= 3 ) {
                           
                            $stmt = $con->prepare("INSERT INTO `stikers`(`img_en`, `img_ar`, `name`, `link`, `type`)
                                                            VALUES(:zimgen, :zimgar, :zname, :zlink, :ztype)");
                            $stmt->execute(array(
                                                    
                                                    'zimgen'        =>  $imgenNameData,
                                                    'zimgar'        =>  $imgarNameData,
                                                    'zname'         =>  $name,
                                                    'zlink'         =>  $link,
                                                    'ztype'         =>  $select
                            
                            ));

                                echo '<div class="container">';
                                    $theMsg = "<div class='alert alert-success'>  Insert New Main Slider  </div>";
                                    redirectPage($theMsg,'edit-home.php' , 1 );
                                echo '</div>';

                        } else {

                                echo '<div class="container">';
                                    $theMsg = "<div class='alert alert-danger'>  You Should Delete Row Old Pefore Add New Slide .  </div>";
                                    redirectPage($theMsg,'edit-home.php' , 1 );
                                echo '</div>';

                        }
                }
            }
            
        } elseif ($do == 'stikerdelete'){ //code
            
            // Check Get id 
            $idstiker = isset($_GET['idstiker']) && is_numeric($_GET['idstiker']) ? intval($_GET["idstiker"]) : 0;

            $check = checkItem('id','`stikers`',$idstiker);

            if($check > 0) {
                $stmt = $con->prepare("DELETE FROM `stikers` WHERE id = :zid ");
                $stmt->bindparam('zid', $idstiker);
                $stmt->execute();

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  Delete One Stiker  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';

            } else {

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  This ID is NOt Exist  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';

            }
            
        } elseif ($do == 'insertinfo'){ //code 
            
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $web        = $_POST['web'];
                $link       = $_POST['link'];

                $stmt = $con->prepare("INSERT INTO `contact`(`web`, `link`)
                                            VALUES(:zweb, :zlink)");
                $stmt->execute(array(

                        'zweb'         =>  $web,
                        'zlink'        =>  $link
                ));

                echo '<div class="container">';
                    $theMsg = "<div class='alert alert-success'>  Insert One Contact  </div>";
                    redirectPage($theMsg,'edit-home.php' , 1 );
                echo '</div>';

            }

        } elseif ($do == 'deleteinfo'){ //code
            
            // Check Get id 
            $idcontact = isset($_GET['idcontact']) && is_numeric($_GET['idcontact']) ? intval($_GET["idcontact"]) : 0;

            $check = checkItem('id_contact','`contact`',$idcontact);

            if($check > 0) {
                $stmt = $con->prepare("DELETE FROM `contact` WHERE id_contact = :zid ");
                $stmt->bindparam('zid', $idcontact);
                $stmt->execute();

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  Delete One Contact  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';

            } else {

                    echo '<div class="container">';
                        $theMsg = "<div class='alert alert-success'>  This ID is NOt Exist  </div>";
                        redirectPage($theMsg,'edit-home.php' , 1 );
                    echo '</div>';
              }   

        } elseif($do == 'updatephone') {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $phone  = $_POST['phone'];

                $stmt= $con->prepare("UPDATE `server` SET phone = ?"); 
                $stmt->execute(array($phone));

                echo '<div class="container">';
                    $theMsg = "<div class='alert alert-success'>  UPDATE Phone  </div>";
                    redirectPage($theMsg,'edit-home.php' , 1 );
                echo '</div>';


            }

        } elseif($do == 'updateemail') {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {

                $email  = $_POST['email'];

                $stmt= $con->prepare("UPDATE `server` SET email_server = ?"); 
                $stmt->execute(array($email));

                echo '<div class="container">';
                    $theMsg = "<div class='alert alert-success'>  UPDATE Email  </div>";
                    redirectPage($theMsg,'edit-home.php' , 1 );
                echo '</div>';


            }
        } else {
            
            echo 'Error There Is No Page With This Name ';
        }


    }
    else
    {
         header ('Location: index.php');
        
        exit();
    }

ob_end_flush();
?>