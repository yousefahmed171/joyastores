<?php
  // include search and any page not use footer 
   $dsn2    = 'mysql:host=localhost;dbname=joyashop';
   $user2   = 'root';
   $pass2   = '';
   $option2 = array
             (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8');
   
 try {
    $cons = new PDO($dsn2, $user2, $pass2, $option2); 
    $cons->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "you are conected";
 }
catch(PDOException $e){
      
      echo "faild to conected" .$e ->getMessage();
  }