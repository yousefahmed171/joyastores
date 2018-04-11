<?php
ob_start();  

session_start();

$title = 'Joya Stores';

include 'init.php';

$do = '';
if(isset($_GET['do'])) {
    $do = $_GET['do'];
}

if($do == 'updateedit') {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        $id        = $_POST['userid'];
        $firstname = $_POST['firstname'];
        $lastlname = $_POST['lastlname'];
        $phone     = $_POST['phone'];
        $email     = $_POST['email'];
        $day       = $_POST['day'];
        $month     = $_POST['month'];
        $yaer      = $_POST['yaer'];
        $gender    = $_POST['gender'];
        $pass1     = $_POST['password1'];
        $pass2     = $_POST['password2'];

        $formError = array();

        if(isset($_POST['firstname'])) {
            $filteruser = filter_var($_POST['firstname'], FILTER_SANITIZE_STRING);
            if(strlen($filteruser) < 4 ) {
                $formError[] = 'Firstname Must Be More Than 4 Character';
            }
        }
        if(isset($_POST['lastlname'])) {
            $filtername = filter_var($_POST['lastlname'], FILTER_SANITIZE_STRING);
            if(strlen($filtername) < 4 ) {
                $formError[] = 'LastlName Must Be More Than 6 Character';
            }
        }
        if(isset($_POST['phone'])) {
            $filterphone = filter_var($_POST['phone'], FILTER_SANITIZE_NUMBER_INT);
            if(strlen($filterphone) < 11 ) {
                $formError[] = 'Phone Must Be  11 Number';
            }
        }   
        if (isset($_POST['email'])) {
            $filterEmail  = filter_var($_POST['email'] , FILTER_SANITIZE_EMAIL) ;
            if (filter_var($filterEmail , FILTER_VALIDATE_EMAIL ) != true) {
                $formError[] = 'This Email Is No\'t Vaild';
            }
        } 
        if(isset($_POST['day'])) {
            $filterday = filter_var($_POST['day'], FILTER_SANITIZE_NUMBER_INT);
            if(strlen($filterday) > 2) {
                $formError[] = 'day Must Be Filed Number ';
            }
        }
        if(isset($_POST['month'])) {
            $filtermonth = filter_var($_POST['month'], FILTER_SANITIZE_NUMBER_INT);
            if(strlen($filtermonth) > 2) {
                $formError[] = 'month Must Be Filed Number';
            }
        } 
        if(isset($_POST['yaer'])) {
            $filteryaer = filter_var($_POST['yaer'], FILTER_SANITIZE_NUMBER_INT);
            if(strlen($filteryaer) > 4) {
                $formError[] = 'yaer Must Be Filed Number';
            }      
        }
        if(isset($_POST['password1']) && !empty($_POST['password1'])) {
            $filterpassword = filter_var($_POST['password1'], FILTER_SANITIZE_NUMBER_INT);
            if(strlen($filterpassword) < 6) {
                $formError[] = 'You Must password greater than 6 number';
            }      
        }
        if (isset($_POST['password1']) && isset($_POST['password2'])) {
            $pass1 = sha1($_POST['password1']);
            $pass2 = sha1($_POST['password2']);

            if ($pass1 !== $pass2 ) {

                $formError[] = 'Soory Password Is No\'t Mutch ';
            }
        }
        
        if(!empty($formError)) {
        
            foreach($formError as $error) {

                echo '<div class="container">';
                $theMsg = '<div class="alert alert-danger">' . $error . '</div>';
                redirectPage($theMsg, 'edit-account.php#basic-info' , 4);
                echo '</div>';
            }

        } else {

            if(isset($_SESSION['user'])) { 
                $stmt = $con->prepare("UPDATE users SET 
                                        `firstname` = ?, `lastlname` = ?, `phone` = ?, `email` = ?, `birth-day` = ?, `birth-month` = ?, 
                                        `birth-yaer` = ?, `gender` = ?, `password` = ? where userid = ? ");
                $stmt->execute(array(
                                $firstname,
                                $lastlname,
                                $phone,
                                $email,
                                $day,
                                $month,
                                $yaer,
                                $gender,
                                sha1($pass1),
                                $id
                            ));

                $row = $stmt->rowCount();
                if($row > 0) {
                    echo '<div class="container">';
                    $theMsg = "<div class='alert alert-success'> Success Update ".$row." Date  </div>";
                    redirectPage($theMsg, 'edit-account.php#basic-info' , 3);
                    echo '</div>';
                } else {
                    echo '<div class="container">';
                    $theMsg = "<div class='alert alert-warning'> Soory ".$row." No data entered for update </div>";
                    redirectPage($theMsg, 'edit-account.php#basic-info' , 2);
                    echo '</div>';
                }
                    //header('Location: ' . $_SERVER["HTTP_REFERER"] );            
            }
        }
    }

} elseif ($do == 'updateaddress') {

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

          $city               = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
          $region_name        = filter_var($_POST['region_name'], FILTER_SANITIZE_STRING);
          $street_name        = filter_var($_POST['street_name'], FILTER_SANITIZE_STRING);
          $building_name      = filter_var($_POST['building_name'], FILTER_SANITIZE_STRING);
          $appartment_number  = filter_var($_POST['appartment_number'],FILTER_SANITIZE_NUMBER_INT);
          $Notes              = filter_var($_POST['Notes'], FILTER_SANITIZE_STRING);
          $userid             = $_POST['userid'];
          
        if(isset($region_name)) {
            if(strlen($region_name) < 2 ) {
                $formErrors[] = 'StreetName Must Be More Than 2 Character or Number ';
            }
        }  
        if(isset($street_name)) {
            if(strlen($street_name) < 2 ) {
                $formErrors[] = 'StreetName Must Be More Than 2 Character or Number ';
            }
        }
        if(isset($building_name)) {
        if(strlen($building_name) < 1) {
                $formErrors[] = 'BuildingNumber Must Be More Than 1 Number';
            }
        }
        if(isset($appartment_number)) {
            if(strlen($appartment_number) < 1 ) {
                $formErrors[] = 'appartment Must Be More Than 1 Number';
            }
        }
        if(isset($Notes)) {
            if(strlen($Notes) < 10 ) {
                $formErrors[] = 'Specialinfo Must Be More Than 10 Character';
            }
        }

        if(empty($formErrors)) {
            
            $stmt3 = $con->prepare("INSERT INTO  `address` SET 
                                 `country` = 'EGYPT', `city` = ?, `region_name` = ?, `street_name` = ?, `building_name` = ?, `appartment_number` = ? , `Notes` = ?, `userid` = ?
                                 ");
            $stmt3->execute(array(
                            $city,
                            $region_name,
                            $street_name,
                            $building_name,
                            $appartment_number,
                            $Notes,
                            $userid
                         ));

            $row = $stmt3->rowCount();
            if($row > 0) {
              $_SESSION['message-s-editaccount'] = "Success Insert ".$row." Date";
              header('Location: edit-account.php');
              session_write_close();
              exit();
            } else {
              $_SESSION['message-w-editaccount'] = "Soory ".$row." No data entered for update";
              header('Location: edit-account.php');
              session_write_close();
              exit();
            }   
        } else {
            foreach ($formErrors as  $error) {
              $_SESSION['message-d-editaccount'] = $error;
              header('Location: edit-account.php');
              session_write_close();
              exit();
            }
        }
        
    }
} else {
    echo 'error';
}

    include $tpl . 'footer.php'; 
    ob_end_flush(); 
?>