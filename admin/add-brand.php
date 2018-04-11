<?php

    ob_start();
 
    session_start();

    if(isset($_SESSION['username'])){

       $title = 'Joya - Dashbord';

       include 'init.php';
    
       $do = isset($_GET['do']) ? $_GET['do'] : 'manage';

        // If The Page Is Main Page 
       if($do == 'manage') {// home page in pages any requwst  trinltion in this page 
           
                echo 'Welcom You Are In Manage Category Page' ;
                echo '<a href="page.php?do=add" > Add New Category + </a>';

    } elseif ($do == 'add'){ //form

         // echo 'Welcom You Are In add Category Page' ;
        // form in category.php page 

    } elseif ($do == 'insert'){ //code

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                echo '<h1 class="text-center"> Welcom in Insert Page  </h1>' ;
                echo '<div class="container">';
            
                // Uploade Filels - [ logo ] . 
                $logoName =  $_FILES['logo_img']['name'];
                $logoSize =  $_FILES['logo_img']['size'];
                $logoTmp  =  $_FILES['logo_img']['tmp_name'];
                $logoType =  $_FILES['logo_img']['type'];
            
                // List Of Allowed File Typed To Uploade
                $logoAllowedExtension = array("jpeg", "jpg", "png", "gif");
                
                // Get [ Logo ] Extenstion 
                $logoExtenstion = strtolower(end(explode(".", $logoName)));
                
                // Uploade Filels - [ Guide ] . 
                $guideName =  $_FILES['guide_img']['name'];
                $guideSize =  $_FILES['guide_img']['size'];
                $guideTmp  =  $_FILES['guide_img']['tmp_name'];
                $guideType =  $_FILES['guide_img']['type'];
            
                // List Of Allowed File Typed To Uploade
                $guideAllowedExtension = array("jpeg", "jpg", "png", "gif");
                
                // Get [ Guide ] Extenstion 
                $guideExtenstion = strtolower(end(explode(".", $guideName)));
                
                // Get Variables From the Form 
                $naen   = $_POST['name_en'];
                $naar   = $_POST['name_ar'];
                $infoen = $_POST['info_en'];
                $infoar = $_POST['info_ar'];
                
                // Form Error 
                $formerrors = array();
                
                if (empty($naen)) {
                    
                    $formerrors[] = 'Cant Be Empty';
                }
                if ( ! empty($logoName) && ! in_array($logoExtenstion, $logoAllowedExtension)) {
                    
                    $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if ( empty($logoName)) {
                    
                    $formerrors[] = 'Logo Images Is  <strong> Required </strong>';
                }
                if ($logoSize > 414194304) {
                    
                    $formerrors[] = 'Logo Can\'t Be Larger   <strong> 4MB </strong>';
                }
                if ( ! empty($guideName) && ! in_array($guideExtenstion, $guideAllowedExtension)) {
                    
                    $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if ( empty($guideName)) {
                    
                    $formerrors[] = 'Guide Images Is  <strong> Required </strong>';
                }
                if ($guideSize > 414194304) {
                    
                    $formerrors[] = 'Guide Can\'t Be Larger   <strong> 4MB </strong>';
                }
                 
                foreach($formerrors as $error) {
                    
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            
                // Check For Ther's No Error  Update Opretion
                if(empty($formerrors)) {
                    
                    $logo = rand(0, 100000000) . '_' . $logoName ;
                    
                    move_uploaded_file($logoTmp , "uploades\img\\" . $logo);
                }
                if(empty($formerrors)) {
                    
                    $guide = rand(0, 100000000) . '_' . $guideName ;
                    
                    move_uploaded_file($guideTmp , "uploades\img\\" . $guide);
                }
                 
                // Check If brands exist in databse
                $check = checkItem("name_en", "brands", $naen);
                if ($check == 1 ) {
                    
                    $theMsg = "<div class='alert alert-info'> Sorry This Brand Is exist  </div>";
                    redirecthome($theMsg, "back" , 3 );
                    
                } else {
                    
                    // Insert Brand In database 
                  $stmt = $con->prepare("INSERT INTO 
                                       brands(`name_en`, `name_ar`, `info_en`, `info_ar`, `logo_img`, `guide_img`)
                                       VALUES(:znaen, :znaar, :zinfoen, :zinfoar, :zlogo, :zguide)");
                  $stmt->execute(array(
                                   
                                  'znaen'      => $naen,
                                  'znaar'      => $naar,
                                  'zinfoen'    => $infoen,
                                  'zinfoar'    => $infoar,
                                  'zlogo'      => $logo,
                                  'zguide'     => $guide
                                  ));
                     
                 echo "<script>
                        alert('Brand Created Succesfully');
                        window.location = 'category.php#add-brand';
                       </script>"; 
                }
            
                 echo '</div>';
           }

    } elseif ($do == 'edit'){ //form

                //  echo 'Welcom You Are In edit Category Page' ;
               
                $id_brand = isset($_GET['id_brand']) && is_numeric($_GET['id_brand']) ? intval($_GET["id_brand"]) : 0;
       
                $stmt = $con->prepare("SELECT * FROM brands WHERE id_brand = ? ");  

                 // Execute Query 
                $stmt->execute(array($id_brand));

                 //Fatch The data 
                $row = $stmt->fetch();
           ?>
            <div class="container">
               <form action="?do=update" method="post" enctype="multipart/form-data"> 
                 <!--heding input -->
                <input type="hidden" name="id_brand" value="<?php echo $id_brand ?>" />
                <div class="form-group">
                    English Name : <input name="name_en"class="form-control" type="text" placeholder="English Name" required 
                                          Value="<?php echo $row['name_en'];?>" />
                </div>
                <div class="form-group">
                    Arabic Name : <input name="name_ar" class="form-control" type="text" placeholder="Arabic Name" value="<?php echo $row['name_ar']; ?>" /> required>
                </div>
                <div class="form-group">
                    English Information : <textarea name="info_en"class="form-control" type="text" placeholder="English Information" required 
                                                     ><?php echo $row['info_en']; ?></textarea>
                </div>
                <div class="form-group">
                    Arabic Information : <textarea  name="info_ar"class="form-control" type="text" placeholder="Arabic Information" required 
                                                    ><?php echo $row['info_en']; ?></textarea>
                </div>
                <div class="form-group">
                    Logo Pic : <input name="logo_img" class="form-control" type="file" placeholder="Logo Pic" required>
                </div>
                <div class="form-group">
                    Guide Pic : <input name="guide_img" class="form-control" type="file" placeholder="Guide Pic" required>
                </div>
                <div class="form-group">
                     <input name="submit" class="btn btn-success" type="submit" value="submit" >
                </div>
              </div>
            </form>
<?php
    } elseif ($do == 'update'){ //code
                
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
                echo '<h1 class="text-center"> Welcom in Update Page  </h1>' ;
                echo '<div class="container">';
            
                // Uploade Filels - [ logo ] . 
                $logoName =  $_FILES['logo_img']['name'];
                $logoSize =  $_FILES['logo_img']['size'];
                $logoTmp  =  $_FILES['logo_img']['tmp_name'];
                $logoType =  $_FILES['logo_img']['type'];
            
                // List Of Allowed File Typed To Uploade
                $logoAllowedExtension = array("jpeg", "jpg", "png", "gif");
                
                // Get [ Logo ] Extenstion 
                $logoExtenstion = strtolower(end(explode(".", $logoName)));
                
                // Uploade Filels - [ Guide ] . 
                $guideName =  $_FILES['guide_img']['name'];
                $guideSize =  $_FILES['guide_img']['size'];
                $guideTmp  =  $_FILES['guide_img']['tmp_name'];
                $guideType =  $_FILES['guide_img']['type'];
            
                // List Of Allowed File Typed To Uploade
                $guideAllowedExtension = array("jpeg", "jpg", "png", "gif");
                
                // Get [ Guide ] Extenstion 
                $guideExtenstion = strtolower(end(explode(".", $guideName)));
                
                // Get Variables From the Form 
                $naen    = $_POST['name_en'];
                $naar    = $_POST['name_ar'];
                $infoen  = $_POST['info_en'];
                $infoar  = $_POST['info_ar'];
                $idbrand = $_POST['id_brand'];
                
                // Form Error 
                $formerrors = array();
                
                if (empty($naen)) {
                    
                    $formerrors[] = 'Cant Be Empty';
                }
                if ( ! empty($logoName) && ! in_array($logoExtenstion, $logoAllowedExtension)) {
                    
                    $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if ( empty($logoName)) {
                    
                    $formerrors[] = 'Logo Images Is  <strong> Required </strong>';
                }
                if ($logoSize > 414194304) {
                    
                    $formerrors[] = 'Logo Can\'t Be Larger   <strong> 4MB </strong>';
                }
                if ( ! empty($guideName) && ! in_array($guideExtenstion, $guideAllowedExtension)) {
                    
                    $formerrors[] = 'The extention is Not <strong> Allowed </strong>' ;
                }
                if ( empty($guideName)) {
                    
                    $formerrors[] = 'Guide Images Is  <strong> Required </strong>';
                }
                if ($guideSize > 414194304) {
                    
                    $formerrors[] = 'Guide Can\'t Be Larger   <strong> 4MB </strong>';
                }
                 
                foreach($formerrors as $error) {
                    
                    echo '<div class="alert alert-danger">'.$error.'</div>';
                }
            
                // Check For Ther's No Error  Update Opretion
                if(empty($formerrors)) {
                    
                    $logo = rand(0, 100000000) . '_' . $logoName ;
                    
                    move_uploaded_file($logoTmp , "uploades\img\\" . $logo);
                }
                if(empty($formerrors)) {
                    
                    $guide = rand(0, 100000000) . '_' . $guideName ;
                    
                    move_uploaded_file($guideTmp , "uploades\img\\" . $guide);
                }
                 
                // Check If brands exist in databse
                $check = checkItem("name_en", "brands", $naen);
                if ($check == 1 ) {
                    
                    $theMsg = "<div class='alert alert-info'> Sorry This Brand Is exist  </div>";
                    redirecthome($theMsg, "back" , 1 );
                    
                } else {
                    
                    // Insert Brand In database 
                  $stmt = $con->prepare("UPDATE brands 
                                SET `name_en` = ?, `name_ar` = ?, `info_en` = ?,         `info_ar` = ?, `logo_img` = ?, `guide_img` = ?
                                WHERE id_brand = ?       ");
                  $stmt->execute(array(
                                   $naen,
                                   $naar,
                                   $infoen,
                                   $infoar,
                                   $logo,
                                   $guide,
                                   $idbrand
                                  ));
                     
                 echo "<script>
                        alert('Brand Created Succesfully');
                        window.location = 'category.php#add-brand';
                       </script>"; 
                }
            
                 echo '</div>';
           }
                  

    } elseif ($do == 'delete'){ //code 
                echo '<div class="container">';  
                echo '<h1> You Are Delete brand Here </h1>' ;
                echo '</div>';
        
                $id = $_GET['id_brand'];
        
                $stmt = $con->prepare("DELETE FROM brands WHERE id_brand = :zid ");

                $stmt->bindParam(":zid" , $id); 

                $stmt->execute();

                echo "<script>
                        alert('Brand Delete Succesfully');
                        window.location = 'category.php#add-brand';
                       </script>"; 
    } else {

                echo 'Error There Is No Page With This Name ';
      }

       include $tpl . 'footer.php';
    }
    else {
   
                header ('Location: index.php');
        
                exit();
    }

   ob_end_flush();
?>