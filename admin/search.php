  <?php
  
    ob_start();
 
    session_start();
   
    include 'init.php';

    if(isset($_GET['c'])) {

        $char = $_GET['c'];

        $getResult = $con->prepare("SELECT * FROM  users WHERE username LIKE '$char%'  ");

        $getResult->execute();
         
        //$allResult = $getResult->fetch()

        // $allResult  = $getResult->fetch();

        $count = $getResult->rowCount();
        
        if($count > 0){


            /*foreach($allResult as $result) {


                echo $result['username'];

            }*/ 
            while($allResult = $getResult->fetch()){
                echo $allResult['username'];
            } 
        } else {
                echo '<p> Not Found</p>';
        }
    }

ob_end_flush();