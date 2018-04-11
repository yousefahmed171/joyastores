<?php 
   
    include 'conc.php';
    //Routes  path 

    $tpl  = 'include/templete/';
    $lang = 'include/languages/';
    $func = 'include/function/';
    $lab  = 'include/libraries/';
    $css  = 'layout/css/';
    $js   = 'layout/js/';


    // Include The inmport file 
    
    include $func . 'function.php';
    include $lang . 'en.php';
    include $tpl  . 'header.php';


    // include navbar all page but page $nonavbar not include

  if (!isset($nonavbar)) { include $tpl . 'navbar.php';}

?>