<?php

ob_start();

session_start();

include 'init.php';

    
    $do = isset($_GET['do']) ? $_GET['do'] : 'manage'; 
        if(isset($_GET['proid'])){
        $proidrate      = $_GET['proid'];
        
    }
    if (isset($_SESSION['user'])) {
        $getUser = $con->prepare("SELECT * FROM users WHERE `username` = ? ");
        $getUser->execute(array($sessionuser));
        $infouser = $getUser->fetch();
        $userid = $infouser['userid'];
    }
    if($do == 'insert') {

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_SESSION['user'])) {
                $stmt = $con->prepare("SELECT rate From rate WHERE pro_id = ? And user_id = ?");
                $stmt->execute(array($proidrate, $userid));
                $reasult = $stmt->fetch();
                $row = $stmt->rowCount();
                var_dump($reasult);
                var_dump($row);

                if($row > 0) {

                    $stmt = $con->prepare("DELETE FROM rate WHERE pro_id = :proid AND user_id = :userid ");
                    $stmt->execute(array(':proid' => $proidrate, ':userid' => $userid)); 

                    $rate = $_POST['rating'];
                    $user = $_SESSION['user'];

                    $stmt = $con->prepare("INSERT INTO `rate` (rate, pro_id, user_id) 
                                    VALUES (:zrate, :zproid, :zuser )"); 
                    $stmt->execute(array(
                                    'zrate'   =>  $rate,
                                    'zproid'  =>  $proidrate,
                                    'zuser'   =>  $userid
                                        ));

                    header('Location: ' . $_SERVER["HTTP_REFERER"] );
                } else {
                    $rate = $_POST['rating'];
                    $stmt = $con->prepare("INSERT INTO `rate` (rate, pro_id, user_id) 
                                VALUES (:zrate, :zproid, :zuser )"); 
                    $stmt->execute(array(
                                    'zrate'   =>  $rate,
                                    'zproid'  =>  $proidrate,
                                    'zuser'   =>  $userid
                                        ));

                    header('Location: ' . $_SERVER["HTTP_REFERER"] );
                }
           
            } else {
                header ('Location: login-index.php');
            } 

              
            
        }

    } elseif($do == 'insertreview'){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_SESSION['user'])) {
                $proidcomment   = $_GET['idpro'];
                $stmt = $con->prepare("SELECT comment From comments WHERE pro_id = ? And user_id = ?");
                $stmt->execute(array($proidcomment, $userid));
                $reasult = $stmt->fetch();
                $row = $stmt->rowCount();
                var_dump($reasult);
                var_dump($row);
                var_dump($proidcomment);

                if($row > 0) {

                    $stmt = $con->prepare("DELETE FROM comments WHERE pro_id = :proid AND user_id = :userid ");
                    $stmt->execute(array(':proid' => $proidcomment, ':userid' => $userid)); 

                    $user       = $_SESSION['user'];
                    $comment    = filter_var($_POST['comment'] , FILTER_SANITIZE_STRING);

                    $stmt = $con->prepare("INSERT INTO `comments` (comment, com_data, pro_id, user_id) 
                                                VALUES (:zcomm, NOW(), :zproid, :zuser )"); 
                    $stmt->execute(array(
                            'zcomm'   =>  $comment,
                            'zproid'  =>  $proidcomment,
                            'zuser'   =>  $userid
                                ));
                    header('Location: ' . $_SERVER["HTTP_REFERER"] );
                    exit;
                } else {
                    $comment    = filter_var($_POST['comment'] , FILTER_SANITIZE_STRING);
                    $stmt = $con->prepare("INSERT INTO `comments` (comment, com_data, pro_id, user_id) 
                                        VALUES (:zcomm, NOW(), :zproid, :zuser )"); 
                    $stmt->execute(array(
                            'zcomm'   =>  $comment,
                            'zproid'  =>  $proidcomment,
                            'zuser'   =>  $userid
                                ));
                    header('Location: ' . $_SERVER["HTTP_REFERER"] );
                    exit;
                }   

                
                
            } else {
                header ('Location: login-index.php');
                exit;
            }               
        }
    } else {
        echo "erroe";
    } 

    ob_end_flush();
?>