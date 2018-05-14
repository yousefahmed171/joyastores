<?php
   
    ob_start();
    
    session_start();

    if(isset($_SESSION['username'])){

        $title = 'Joya - Dashbord';

        include 'init.php';

    $do = '';
    if (isset($_GET['do'])) {
        $do = $_GET['do'];
    } else {
        $do = 'manage' ;
    }
    
    if($do == 'manage') {
        
        echo '<h1> wlecom in manage page <h1>';
        
    } elseif ($do == 'add') {
        
        // echo '<h1> wlecom in manage page <h1>';
        // form in add-product.php page
        
    } elseif ($do == 'insert') {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            
            echo '<div class="container">';
            echo '<h1 class="text-center"> Welcome In Insert Page <h1>';  
            
            //Upload Files img 1
            $proImg  = $_FILES['pro_img']['name'];
            $proSize = $_FILES['pro_img']['size'];
            $proTmp  = $_FILES['pro_img']['tmp_name'];
            $proType = $_FILES['pro_img']['type'];
            //List Of Allowed File Typed To Upload 
            $imgAllowedExtension = array("jpeg", "jpg", "png","gif");
            // Get Extension
            $imgExtension = strtolower(end(explode(".", $proImg)));

            //Upload Files img 2
            $proImg2  = $_FILES['pro_img2']['name'];
            $proSize2 = $_FILES['pro_img2']['size'];
            $proTmp2  = $_FILES['pro_img2']['tmp_name'];
            $proType2 = $_FILES['pro_img2']['type'];
            //List Of Allowed File Typed To Upload 
            $imgAllowedExtension2 = array("jpeg", "jpg", "png","gif");
            // Get Extension
            $imgExtension2 = strtolower(end(explode(".", $proImg2)));

            //Upload Files img 3
            $proImg3  = $_FILES['pro_img3']['name'];
            $proSize3 = $_FILES['pro_img3']['size'];
            $proTmp3  = $_FILES['pro_img3']['tmp_name'];
            $proType3 = $_FILES['pro_img3']['type'];
            //List Of Allowed File Typed To Upload 
            $imgAllowedExtension3 = array("jpeg", "jpg", "png","gif");
            // Get Extension
            $imgExtension3 = strtolower(end(explode(".", $proImg3)));

            //Upload Files img 4
            $proImg4  = $_FILES['pro_img4']['name'];
            $proSize4 = $_FILES['pro_img4']['size'];
            $proTmp4  = $_FILES['pro_img4']['tmp_name'];
            $proType4 = $_FILES['pro_img4']['type'];
            //List Of Allowed File Typed To Upload 
            $imgAllowedExtension4 = array("jpeg", "jpg", "png","gif");
            // Get Extension
            $imgExtension4 = strtolower(end(explode(".", $proImg4)));

            //Upload Files img 5
            $proImg5  = $_FILES['pro_img5']['name'];
            $proSize5 = $_FILES['pro_img5']['size'];
            $proTmp5  = $_FILES['pro_img5']['tmp_name'];
            $proType5 = $_FILES['pro_img5']['type'];
            //List Of Allowed File Typed To Upload 
            $imgAllowedExtension5 = array("jpeg", "jpg", "png","gif");
            // Get Extension
            $imgExtension5 = strtolower(end(explode(".", $proImg5)));

            // GET Variables From The Form 
            $proname            =  $_POST['pro_name'];
            $proid              =  $_POST['pro_id'];
            $pro_size           =  $_POST['pro_size'];
            $pro_price          =  $_POST['pro_price'];
            $pro_after_sale     =  $_POST['pro_after_sale'];
            $pro_sale           =  $_POST['pro_sale'];
            $pro_seller         =  $_POST['pro_seller'];
            $availability       =  $_POST['availability'];
            $visiblity          =  $_POST['visiblity'];
            $pro_feature_en     =  $_POST['pro_feature_en'];
            $pro_feature_ar     =  $_POST['pro_feature_ar'];
            $pro_additional_en  =  $_POST['pro_additional_en'];
            $pro_additional_ar  =  $_POST['pro_additional_ar'];
            $species            =  $_POST['species'];
            $category           =  $_POST['category'];
            $brandd             =  $_POST['brand'];
            $xs                 =  $_POST['xs'];
            $s                  =  $_POST['s'];
            $m                  =  $_POST['m'];
            $l                  =  $_POST['l'];
            $xl                 =  $_POST['xl'];
            $_2xl               =  $_POST['2xl'];
            $_3xl               =  $_POST['3xl'];
            $_4xl               =  $_POST['4xl'];
            $color              = $_POST['color'];

            //formerrors
            $formerrors = array();
        
            if(!empty($proImg) && ! in_array($imgExtension,$imgAllowedExtension)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>';
            }
            if (empty($proImg)) {
                $formerrors[] = 'img Is  <strong> Required </strong>';
            }
            if ($proSize > 4194304){
                $formerrors[] = 'img Can\'t Be Larger   <strong> 4MB </strong>';
            }
            //2
                if(!empty($proImg2) && ! in_array($imgExtension2,$imgAllowedExtension2)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>';
            }
            if (empty($proImg2)) {
                $formerrors[] = 'img Is  <strong> Required </strong>';
            }
            if ($proSize2 > 4194304){
                    $formerrors[] = 'img Can\'t Be Larger   <strong> 4MB </strong>';
            }
            //3
            if(!empty($proImg3) && ! in_array($imgExtension3,$imgAllowedExtension3)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>';
            }
            if (empty($proImg3)) {
                $formerrors[] = 'img Is  <strong> Required </strong>';
            }
            if ($proSize3 > 4194304){
                    $formerrors[] = 'img Can\'t Be Larger   <strong> 4MB </strong>';
            }
            //4
            if(!empty($proImg4) && ! in_array($imgExtension4,$imgAllowedExtension4)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>';
            }
            if (empty($proImg4)) {
                $formerrors[] = 'img Is  <strong> Required </strong>';
            }
            if ($proSize4 > 4194304){
                    $formerrors[] = 'img Can\'t Be Larger   <strong> 4MB </strong>';
            }
            //5
            if(!empty($proImg5) && ! in_array($imgExtension5,$imgAllowedExtension5)) {
                $formerrors[] = 'The extention is Not <strong> Allowed </strong>';
            }
            if (empty($proImg5)) {
                $formerrors[] = 'img Is  <strong> Required </strong>';
            }
            if ($proSize5 > 4194304){
                    $formerrors[] = 'img Can\'t Be Larger   <strong> 4MB </strong>';
            }
                
                // loop into errors array and echo it 
                foreach($formerrors as $error) {

                    echo '<div class="alert alert-danger">' . $error . '</div>';
                }

                // Check if There's No Error Proceed The Update Operation 
                if (empty($formerrors)) {  

                    $pro_imgdata = rand(0 , 10000000000) . '_' . $proImg ;
                    move_uploaded_file($proTmp, "uploades\img-product\\" . $pro_imgdata);
                    // 2
                    $pro_imgdata2 = rand(0 , 10000000000) . '_' . $proImg2 ;
                    move_uploaded_file($proTmp2, "uploades\img-product\\" . $pro_imgdata2);
                    // 3
                    $pro_imgdata3 = rand(0 , 10000000000) . '_' . $proImg3 ;
                    move_uploaded_file($proTmp3, "uploades\img-product\\" . $pro_imgdata3);
                    // 4
                    $pro_imgdata4 = rand(0 , 10000000000) . '_' . $proImg4 ;
                    move_uploaded_file($proTmp4, "uploades\img-product\\" . $pro_imgdata4);
                    // 5
                    $pro_imgdata5 = rand(0 , 10000000000) . '_' . $proImg5 ;
                    move_uploaded_file($proTmp5, "uploades\img-product\\" . $pro_imgdata5);

                    $stmt = $con->prepare("INSERT INTO `product`(`pro_name`, `pro_id`, `pro_size`, `pro_price`, `pro_after_sale`, `pro_sale`, `pro_seller`, `availability`, `visiblity`, `pro_feature_en`, `pro_feature_ar`, `pro_img`, `pro_img2`, `pro_img3`, `pro_img4`, `pro_img5`, `additional_information_en`, `additional_information_ar`, `xs`, `s`, `m`, `l`, `xl`, `2xl`, `3xl`, `4xl`,`color`, `idspecies`, `idcat`,`idbrand`) 
                    VALUES (:zproname, :zproid, :zpro_size, :zpro_price, :zpro_after_sale, :zpro_sale, :zpro_seller, :zavailability, :zvisiblity, :zpro_feature_en, :zpro_feature_ar, :zproimg, :zproimg2, :zproimg3, :zproimg4, :zproimg5, :zadditional_en, :zadditional_ar, :zxs, :zs, :zm, :zl, :zxl, :z2xl, :z3xl, :z4xl, :zcolor, :zspecies, :zcategory, :zidbrand)
                                            ");
                        $stmt->execute(array(
                            'zproname'           => $proname,
                            'zproid'             => $proid,
                            'zpro_size'          => $pro_size,
                            'zpro_price'         => $pro_price,
                            'zpro_after_sale'    => $pro_after_sale,
                            'zpro_sale'          => $pro_sale,
                            'zpro_seller'        => $pro_seller,
                            'zavailability'      => $availability,
                            'zvisiblity'         => $visiblity,
                            'zpro_feature_en'    => $pro_feature_en,
                            'zpro_feature_ar'    => $pro_feature_ar,
                            'zproimg'            => $pro_imgdata,
                            'zproimg2'           => $pro_imgdata2,
                            'zproimg3'           => $pro_imgdata3,
                            'zproimg4'           => $pro_imgdata4,
                            'zproimg5'           => $pro_imgdata5,
                            'zadditional_en'     => $pro_additional_en,
                            'zadditional_ar'     => $pro_additional_ar,
                            'zxs'                => $xs,
                            'zs'                 => $s, 
                            'zm'                 => $m,
                            'zl'                 => $l, 
                            'zxl'                => $xl, 
                            'z2xl'               => $_2xl, 
                            'z3xl'               => $_3xl, 
                            'z4xl'               => $_4xl,  
                            'zcolor'             => $color,
                            'zspecies'           => $species,
                            'zcategory'          => $category,
                            'zidbrand'           => $brandd  
                        ));

                        $theMsg = "<div class='alert alert-success'>  insert new broduct  </div>";
                        redirectPage($theMsg,'add-product.php' , 1 );
                
                } else {
                    $theMsg = "<div class='alert alert-danger'> Sorry You Cant Browse This Page Directly  </div>" ;

                    redirecthome($theMsg,'back' ,3 );    
                }
                    echo '</div>';
        }  
    } elseif ($do == 'edit') {
        
        echo '<h1> wlecom in edit page <h1>';
        //  $id = 20;
        $getAll = $con->prepare("SELECT pro_sale, pro_price FROM  product ");

        $getAll->execute(array());

        $all  = $getAll->fetchAll();
        
        foreach($all as $a) {
            // echo $a['pro_price']; echo '<br>';
            // echo $a['pro_sale'] ; echo '<br>';
            echo '<hr>';
            $proprice = $a['pro_price'];
            $prosale  = $a['pro_sale'];
            $o = ($a['pro_sale'] * ($a['pro_price']) / 100 );
            echo $o;
            //$o = ($a['pro_sale'] * ($a['pro_price']) / 100 );
            //$proprice = $a['pro_price'];
            // $prosale  = $a['pro_sale'];
            //echo  $proprice;

            // $o = ( * ) / 100 ;
            // echo $o ; 
        }

    } elseif ($do == 'update') {
        echo '<h1> wlecom in update page <h1>';
    } elseif ($do == 'delete') {
        echo '<h1> wlecom in delete page <h1>';
    } else {
        echo '<h1> ERROR <h1>';
    }

        include $tpl . 'footer.php';
    } else {
    
        header ('Location: index.php');
        exit();
    }

    ob_end_flush();
?>