<?php 
    /*
    ** Title Function v1.0 
    ** Title Function that echo The Page Title Case The Page  
    ** Has The Variable $pagetitle And Echo Defult for Other Pages

    */
    
      function getTitle() {
       
      global $title;
      
      if (isset($title)){
          
          echo $title ;
          
      } else {
          
        echo 'Joya Stores';  
      }
      
      
  }

/*
** Redirect Function page  v1.0
** Redirect Function [This Function Accept Parameters ] 
** $errorMsg = echo the error message 
** $seconds = seconds before redirecting 
*/

function redirectPage($theMsg, $url , $seconds = 3) {

    if ($url === null){
        
       $url = 'index.php';

    } else {

     echo $theMsg;
     echo "<div class='alert alert-info'> You Will Be Redirected To Home Page After $seconds </div>";

     header("refresh: $seconds; $url");

     exit();
    }
 }
/*
** Redirect Function home  v2.0
** Redirect Function [This Function Accept Parameters ] 
** $errorMsg = echo the error message 
** $seconds = seconds before redirecting 
*/

	function redirectHome($theMsg, $url = null, $seconds = 3) {

		if ($url === null) {

			$url = 'index.php';

			$link = 'Homepage';

		} else {

			if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {

				$url = $_SERVER['HTTP_REFERER'];

				$link = 'Previous Page';

			} else {

				$url = 'index.php';

				$link = 'Homepage';

			}

		}

		echo $theMsg;

		echo "<div class='alert alert-info'>You Will Be Redirected to $link After $seconds Seconds.</div>";

		header("refresh:$seconds;url=$url");

		exit();

	}
/*
** Check Item Function v1.0
** Function TO Check Item In Database [ function accept parameters]
** $select = the item to select [exampel : user , item , category ]
** $from = the table to select from [exampel : users, items , categorys]
** $value = the value of select [exampel : osama, box , tv ]
*/

    function checkItem($select, $from, $value) {

        global $con ;

        $stmt2 = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");

        $stmt2->execute(array($value));

        $count = $stmt2->rowCount();

        return $count;
    }

/*
** Check Number Of Item Function V1.0
** Function To Count Number Of Items Rows 
** $item = The Item TO Count 
** $table = The Table Chooec
*/

function countItems($item, $table) {

       global $con;

       $stmt2 = $con->prepare("SELECT COUNT($item)  FROM $table");

       $stmt2->execute();


       return $stmt2->fetchColumn();


   }

   /*
   **  Get Latest Record Function V1.0
   ** Function To Get Latest Items From Database [user, Item m comments]
   ** $select = Field To Select 
   ** $table  = The Table To Choose From 
   ** $limit  = Number Of Records To Get 
   */


    function getLatest($select, $table, $order,  $limit = 5 ) {

       global $con ;

       $stmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit ");

       $stmt->execute();

       $rows  = $stmt->fetchAll();

       return $rows;

    }

   /*
   **  Get  All Function V2.0
   ** Function To Get All Record From any Database table
   */


  function getAllFrom($field, $table, $where = NULL , $and = NULL, $orderfield, $ordering = 'DESC') { 

    global $con ;

    $getAll = $con->prepare("SELECT $field FROM  $table $where $and ORDER BY $orderfield  $ordering ");

    $getAll->execute();

    $all  = $getAll->fetchAll();

    return $all;

 }
  /*
 ** Check If USer IS Not Active V1.0
 ** Function To Check The Regestier Of The user 
 */

function checkUserStatus($user) {

    global $con ;
    
    $stmtx = $con->prepare("SELECT `username`, `regstatus` FROM `users` WHERE `username` = ? AND `regstatus` = 0 ");
    $stmtx->execute(array($user));
    $status = $stmtx->rowCount();

    return $status;
  }


     /*
   **  Get  All Function V2.0
   ** Function To Get All Record From any Database table
   */


  function getFromAll($field, $table, $where = NULL , $and = NULL, $orderfield, $ordering = 'DESC') { 

    global $con ;

    $getAll = $con->prepare("SELECT $field FROM  $table $where $and ORDER BY $orderfield  $ordering ");

    $getAll->execute();

    $all  = $getAll->fetch();

    return $all;

 }