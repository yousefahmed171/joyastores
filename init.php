<?php 

    ini_set('display-errprs', 'on');
    error_reporting(E_ALL);

    include 'conc.php';

    //session global
    $sessionuser = '';
    if (isset($_SESSION['user'])) {
        $sessionuser = $_SESSION['user'];
    }

    $sessionuCart = '';
    if(isset($_SESSION['cart'])) {
        $sessionuCart = $_SESSION['cart'];
    }

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
    include $tpl  . 'navbar.php';

?>